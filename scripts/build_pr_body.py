#!/usr/bin/env python3
"""
Compose the markdown body for the auto/sdk-update PR.

This is pure composition — all git/oasdiff/classifier work happens in the
workflow before this runs, and the results are passed in as files. That
makes the script trivially testable: feed it sample inputs, diff stdout
against a fixture.

Inputs (all optional, but most produce richer output when provided):
    --classification    Path to classify_semver.sh stdout (line 1: level,
                        line 2+: "Reason: ..." and any --apply line).
    --changelog-md      Path to `oasdiff changelog -f markdown` output.
    --spec-metadata     Path to spec-metadata.json (source_commit, generated_at, url).
    --source-repo-url   Base URL of the spec source repo. Default points
                        at BambooHR/main on github.com.
    --since-last-review Path to a pre-computed delta-vs-existing-branch text
                        file. Pass --since-last-review="" (or omit) to
                        render the "Initial PR" placeholder.
    --generation-status One of: success, quality-issues, generation-failed.
                        Each tier shows a different banner (or none) at the
                        top of the PR body.
    --old-version       Previous version (e.g. 1.0.0).
    --new-version       Bumped version (e.g. 1.1.0); pass equal to old to
                        skip the version-bump section.

Output: markdown on stdout.
"""

from __future__ import annotations

import argparse
import json
import sys
from pathlib import Path

# GitHub caps PR body length at 65,536 characters; gh pr create/edit fails
# the whole call if we go over. Aim for a budget below that to leave
# headroom for trailing newlines, gh's own formatting, and any unicode
# expansion in the GraphQL payload.
GITHUB_PR_BODY_LIMIT = 65_536
SAFE_BUDGET = 60_000


def read_optional(path: str | None) -> str:
    if not path:
        return ""
    file_path = Path(path)
    if not file_path.exists():
        return ""
    return file_path.read_text(encoding="utf-8")


def truncate_at_line(content: str, max_chars: int, suffix: str = "") -> str:
    """Truncate `content` to at most `max_chars` (counting `suffix`).

    Slices on a line boundary so we never cut mid-line, then appends
    `suffix`. If `content` already fits, returns it unchanged. If the
    suffix alone is bigger than `max_chars`, returns just the suffix
    (better to surface the truncation notice than silently drop it).
    """
    if len(content) <= max_chars:
        return content
    if len(suffix) >= max_chars:
        return suffix
    target = max_chars - len(suffix)
    head = content[:target]
    last_newline = head.rfind("\n")
    if last_newline > 0:
        head = head[:last_newline]
    return head + suffix


def parse_classification(text: str) -> tuple[str, str]:
    """Returns (level, reason). Tolerant of empty input."""
    if not text.strip():
        return ("", "")
    lines = [line for line in text.splitlines() if line.strip()]
    level = lines[0].strip() if lines else ""
    reason = ""
    for line in lines[1:]:
        if line.startswith("Reason:"):
            reason = line[len("Reason:"):].strip()
            break
    return (level, reason)


def build(args: argparse.Namespace) -> str:
    sections: list[str] = []

    # --- Banner keyed off the three-tier generation status -----------------
    if args.generation_status == "generation-failed":
        sections.append(
            "> [!CAUTION]\n"
            "> **`make generate` failed on this run.**\n"
            "> The committed tree contains the spec update but no regenerated\n"
            "> SDK — the package is not buildable as-is. Reproduce locally\n"
            "> with `make generate` and resolve the underlying error before\n"
            "> merging."
        )
    elif args.generation_status == "quality-issues":
        sections.append(
            "> [!WARNING]\n"
            "> **Generation succeeded, but one or more quality checks failed.**\n"
            "> The regenerated SDK is structurally valid; one or more of\n"
            "> `make format` / `make lint` / `make smoke-test` / `make test`\n"
            "> reported issues. See the workflow run for per-step details and\n"
            "> reproduce locally with the failing target before merging."
        )

    # --- Spec source metadata ----------------------------------------------
    metadata_text = read_optional(args.spec_metadata)
    if metadata_text:
        try:
            metadata = json.loads(metadata_text)
        except json.JSONDecodeError:
            metadata = {}
        source_commit = metadata.get("source_commit", "unknown")
        generated_at = metadata.get("generated_at", "unknown")
        spec_url = metadata.get("url", "")
        commit_link = (
            f"[`{source_commit[:12]}`]({args.source_repo_url}/commit/{source_commit})"
            if source_commit and source_commit != "unknown"
            else "`unknown`"
        )
        meta_block = [
            "## Spec source",
            "",
            f"- **Source commit:** {commit_link}",
            f"- **Generated at:** `{generated_at}`",
        ]
        if spec_url:
            meta_block.append(f"- **Spec URL:** {spec_url}")
        sections.append("\n".join(meta_block))

    # --- Semver classification ---------------------------------------------
    classification_text = read_optional(args.classification)
    level, reason = parse_classification(classification_text)
    if level:
        sections.append(
            "\n".join(
                [
                    "## Semver classification",
                    "",
                    f"**Bump level:** `{level}`",
                    "",
                    f"**Reason:** {reason or '_(no reason supplied)_'}",
                ]
            )
        )

    # --- Version bump section ----------------------------------------------
    if args.old_version and args.new_version and args.old_version != args.new_version:
        sections.append(
            "\n".join(
                [
                    "## Version bump",
                    "",
                    f"`{args.old_version}` → `{args.new_version}`",
                ]
            )
        )

    # --- Changes since last review -----------------------------------------
    delta = read_optional(args.since_last_review).strip()
    if delta:
        delta_section = (
            "<details>\n"
            "<summary><strong>Changes since last review</strong></summary>\n\n"
            "```diff\n"
            f"{delta}\n"
            "```\n"
            "</details>"
        )
    else:
        delta_section = (
            "## Changes since last review\n\n_Initial PR — no prior review baseline._"
        )

    # --- Footer -------------------------------------------------------------
    footer = (
        "---\n"
        "_This PR was opened automatically by the `sdk-update` workflow._\n"
        "_Trigger: `workflow_dispatch`._"
    )

    # --- oasdiff markdown changelog (size-budgeted) -------------------------
    # We build this LAST so we can size it against the remaining budget. The
    # changelog is the dominant size in practice (an oasdiff markdown for a
    # major spec rewrite can be 100+ KB, well over GitHub's 65,536-char PR
    # body limit). Everything before/after the changelog has a stable upper
    # bound, so we treat the rest of the body as "fixed cost" and give the
    # changelog whatever budget is left.
    changelog_md = read_optional(args.changelog_md).strip()
    fixed_sections = sections + [delta_section, footer]
    # +2 chars per join boundary, +1 for the trailing newline we add at the
    # bottom of the final body. Keep this estimation conservative — the
    # cost of under-allocating is a softer notice; the cost of
    # over-allocating is a hard PR-create failure.
    fixed_size = sum(len(s) for s in fixed_sections) + 2 * len(fixed_sections) + 1

    if changelog_md:
        wrapper_overhead = (
            "<details>\n"
            "<summary><strong>API changelog</strong> (from oasdiff)</summary>\n\n"
            "\n"
            "</details>"
        )
        # Reserve room for the wrapper plus the joiner between this section
        # and the next one.
        budget_for_changelog_content = (
            SAFE_BUDGET - fixed_size - len(wrapper_overhead) - 2
        )
        if budget_for_changelog_content > 0 and len(changelog_md) > budget_for_changelog_content:
            suffix = (
                "\n\n_…changelog truncated to fit GitHub's PR body size limit."
            )
            if args.run_url:
                suffix += (
                    f" Full changelog available as `.sdk-update/analysis/changelog.md`"
                    f" in the workflow run: {args.run_url}"
                )
            else:
                suffix += (
                    " Full changelog available as `.sdk-update/analysis/changelog.md`"
                    " in the workflow run logs."
                )
            suffix += "_"
            changelog_md = truncate_at_line(
                changelog_md, budget_for_changelog_content, suffix=suffix
            )
        if budget_for_changelog_content > 0:
            sections.append(
                "<details>\n"
                "<summary><strong>API changelog</strong> (from oasdiff)</summary>\n\n"
                f"{changelog_md}\n"
                "</details>"
            )
        else:
            # Pathological: even the wrapper doesn't fit. Skip the changelog
            # rather than fail the PR create.
            note = (
                "_API changelog omitted to fit GitHub's PR body size limit._"
            )
            if args.run_url:
                note = (
                    f"_API changelog omitted to fit GitHub's PR body size limit."
                    f" See workflow run: {args.run_url}_"
                )
            sections.append(note)

    sections.append(delta_section)
    sections.append(footer)

    return "\n\n".join(sections) + "\n"


def parse_args() -> argparse.Namespace:
    parser = argparse.ArgumentParser(description=__doc__)
    parser.add_argument("--classification", default="")
    parser.add_argument("--changelog-md", default="")
    parser.add_argument("--spec-metadata", default="")
    parser.add_argument("--source-repo-url", default="https://github.com/BambooHR/main")
    parser.add_argument("--since-last-review", default="")
    parser.add_argument(
        "--generation-status",
        choices=["success", "quality-issues", "generation-failed"],
        default="success",
    )
    parser.add_argument("--old-version", default="")
    parser.add_argument("--new-version", default="")
    parser.add_argument(
        "--run-url",
        default="",
        help=(
            "URL of this workflow run, used in the truncation notice when "
            "the oasdiff changelog is too big to fit in the PR body. "
            "Typically passed as ${{ github.server_url }}/${{ github.repository "
            "}}/actions/runs/${{ github.run_id }}."
        ),
    )
    return parser.parse_args()


def main() -> int:
    sys.stdout.write(build(parse_args()))
    return 0


if __name__ == "__main__":
    sys.exit(main())
