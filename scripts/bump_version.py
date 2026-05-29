#!/usr/bin/env python3
"""
Bump the project version in composer.json and the Makefile's PACKAGE_VERSION
per a semver classification.

Per SPN-2933 (mirror of SPN-2931 for PHP), only `minor` and `patch` levels
actually mutate files. `major` is skipped (a human takes that decision), and
`none` is a no-op.

Both files are kept in sync deliberately. The Makefile's PACKAGE_VERSION
value is passed to openapi-generator as artifactVersion and re-stamped into
the regenerated composer.json on every `make generate`, so if we only bumped
one and not the other, the next regen would silently undo the bump.

Usage:
    bump_version.py LEVEL [--composer PATH] [--makefile PATH] [--dry-run]

LEVEL must be one of: major, minor, patch, none.

Outputs (written to $GITHUB_OUTPUT if set, also printed to stdout):
    bumped=true|false       — whether the version values were rewritten
    old_version=X.Y.Z       — version before this script ran
    new_version=X.Y.Z       — version after this script ran (== old when bumped=false)

Exit codes:
    0  Success.
    1  Bad arguments, files missing, or version values out of sync between
       composer.json and Makefile (refuse to bump in that case — would
       paper over a deeper drift).
"""

from __future__ import annotations

import argparse
import json
import os
import re
import sys
from pathlib import Path

VALID_LEVELS = {"major", "minor", "patch", "none"}
SEMVER_RE = re.compile(r"^(\d+)\.(\d+)\.(\d+)$")
# Match `PACKAGE_VERSION = X.Y.Z` allowing surrounding whitespace; preserve
# everything else on the line (comments, trailing whitespace).
MAKEFILE_VERSION_RE = re.compile(
    r"^(PACKAGE_VERSION\s*=\s*)(\d+)\.(\d+)\.(\d+)(\s*.*)$",
    re.MULTILINE,
)


def emit_output(key: str, value: str) -> None:
    line = f"{key}={value}"
    print(line)
    output_path = os.environ.get("GITHUB_OUTPUT")
    if output_path:
        with open(output_path, "a", encoding="utf-8") as handle:
            handle.write(line + "\n")


def parse_args() -> argparse.Namespace:
    parser = argparse.ArgumentParser(description=__doc__)
    parser.add_argument("level", choices=sorted(VALID_LEVELS))
    parser.add_argument("--composer", default="composer.json")
    parser.add_argument("--makefile", default="Makefile")
    parser.add_argument("--dry-run", action="store_true")
    return parser.parse_args()


def read_composer_version(path: Path) -> str:
    if not path.exists():
        raise SystemExit(f"bump_version: composer.json not found: {path}")
    try:
        data = json.loads(path.read_text(encoding="utf-8"))
    except json.JSONDecodeError as exc:
        raise SystemExit(f"bump_version: composer.json is not valid JSON: {exc}")
    version = data.get("version")
    if not isinstance(version, str) or not SEMVER_RE.match(version):
        raise SystemExit(
            f"bump_version: composer.json `version` missing or not semver: {version!r}"
        )
    return version


def read_makefile_version(path: Path) -> tuple[str, re.Match[str], str]:
    if not path.exists():
        raise SystemExit(f"bump_version: Makefile not found: {path}")
    content = path.read_text(encoding="utf-8")
    match = MAKEFILE_VERSION_RE.search(content)
    if not match:
        raise SystemExit(
            f"bump_version: no `PACKAGE_VERSION = X.Y.Z` line found in {path}"
        )
    version = f"{match.group(2)}.{match.group(3)}.{match.group(4)}"
    return version, match, content


def write_composer_version(path: Path, new_version: str, dry_run: bool) -> None:
    if dry_run:
        return
    raw = path.read_text(encoding="utf-8")
    # Surgical replace on the `"version":` line so we don't reformat the
    # rest of composer.json (json.dump would normalize indentation and key
    # order, producing a noisy diff).
    new_raw, count = re.subn(
        r'("version"\s*:\s*")\d+\.\d+\.\d+(")',
        rf"\g<1>{new_version}\g<2>",
        raw,
        count=1,
    )
    if count != 1:
        raise SystemExit(
            "bump_version: failed to find `\"version\": \"X.Y.Z\"` "
            f"in {path} (file may use unusual formatting)"
        )
    path.write_text(new_raw, encoding="utf-8")


def write_makefile_version(
    path: Path, content: str, match: re.Match[str], new_version: str, dry_run: bool
) -> None:
    if dry_run:
        return
    prefix = match.group(1)
    suffix = match.group(5)
    new_content = (
        content[: match.start()]
        + f"{prefix}{new_version}{suffix}"
        + content[match.end():]
    )
    path.write_text(new_content, encoding="utf-8")


def bump(version: str, level: str) -> str:
    major, minor, patch = (int(p) for p in version.split("."))
    if level == "minor":
        return f"{major}.{minor + 1}.0"
    if level == "patch":
        return f"{major}.{minor}.{patch + 1}"
    # major / none — caller handles skip semantics
    return version


def main() -> int:
    args = parse_args()

    composer_path = Path(args.composer)
    makefile_path = Path(args.makefile)

    composer_version = read_composer_version(composer_path)
    makefile_version, makefile_match, makefile_content = read_makefile_version(
        makefile_path
    )

    if composer_version != makefile_version:
        print(
            f"bump_version: refusing to bump — composer.json ({composer_version}) "
            f"and Makefile PACKAGE_VERSION ({makefile_version}) are out of sync. "
            "Reconcile manually before re-running.",
            file=sys.stderr,
        )
        return 1

    old_version = composer_version
    new_version = bump(old_version, args.level)

    if new_version == old_version:
        emit_output("bumped", "false")
        emit_output("old_version", old_version)
        emit_output("new_version", old_version)
        return 0

    write_composer_version(composer_path, new_version, args.dry_run)
    write_makefile_version(
        makefile_path, makefile_content, makefile_match, new_version, args.dry_run
    )

    emit_output("bumped", "true")
    emit_output("old_version", old_version)
    emit_output("new_version", new_version)
    return 0


if __name__ == "__main__":
    sys.exit(main())
