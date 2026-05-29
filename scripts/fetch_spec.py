#!/usr/bin/env python3
"""
Fetch the public OpenAPI spec, its SHA256 sidecar, and metadata sidecar.

Verifies the downloaded spec checksum matches the sidecar. Compares the
downloaded spec against the committed `specs/public.yaml` and signals via
the `changed` output whether the workflow needs to continue.

Inputs (CLI flags, all optional — sensible CloudFront defaults):
    --spec-url       URL or file:// path for public-openapi.yaml
    --sha256-url     URL or file:// path for the .sha256 sidecar
    --metadata-url   URL or file:// path for spec-metadata.json
    --staging-dir    Where to write the staged spec (default: .sdk-update/)
    --committed-spec Path to the committed spec to diff against
                     (default: specs/public.yaml)

URLs are restricted to the CloudFront docs host or file:// paths.

Outputs (written to $GITHUB_OUTPUT if set, also printed to stdout):
    changed=true|false       — true if the new spec differs from committed
    source_commit=<sha>      — from spec-metadata.json
    generated_at=<timestamp> — from spec-metadata.json
    checksum_sha256=<hash>   — from the .sha256 sidecar
    staged_spec_path=<path>  — absolute path of the staged spec on disk
    resolved_spec_url=<url>  — the spec URL actually used (override or default)

Exit codes:
    0  Success (regardless of `changed` value).
    1  Bad input (URL not allowlisted, missing file, etc.).
    2  Checksum mismatch — spec content does not match the .sha256 sidecar.
    3  Network or HTTP failure.
"""

from __future__ import annotations

import argparse
import hashlib
import json
import os
import re
import sys
import urllib.error
import urllib.request
from pathlib import Path
from typing import Final

CLOUDFRONT_HOST: Final = "https://d40bgjb2zs35x.cloudfront.net"
DEFAULT_SPEC_URL: Final = f"{CLOUDFRONT_HOST}/main/latest/docs/openapi/public-openapi.yaml"
DEFAULT_SHA256_URL: Final = f"{DEFAULT_SPEC_URL}.sha256"
DEFAULT_METADATA_URL: Final = (
    f"{CLOUDFRONT_HOST}/main/latest/docs/openapi/spec-metadata.json"
)

# Allow either the CloudFront docs host or a local file:// path. Anything else
# is rejected so a manual workflow_dispatch override can't be pointed at an
# arbitrary domain.
ALLOWED_URL_RE: Final = re.compile(
    rf"^(?:{re.escape(CLOUDFRONT_HOST)}/.+|file://.+)$"
)


def fail(code: int, message: str) -> None:
    print(f"fetch_spec: {message}", file=sys.stderr)
    sys.exit(code)


def validate_url(url: str, label: str) -> None:
    if not ALLOWED_URL_RE.match(url):
        fail(
            1,
            f"{label} not on the allowlist (CloudFront docs host or file://): {url}",
        )


def download(url: str, label: str) -> bytes:
    validate_url(url, label)
    try:
        with urllib.request.urlopen(url) as response:  # noqa: S310 — allowlisted above
            return response.read()
    except urllib.error.HTTPError as http_error:
        fail(3, f"HTTP {http_error.code} fetching {label} from {url}")
    except urllib.error.URLError as url_error:
        fail(3, f"network error fetching {label} from {url}: {url_error.reason}")
    raise AssertionError("unreachable")  # for type-checkers


def parse_sha256_sidecar(content: bytes) -> str:
    """Sidecar may be plain `<hash>` or coreutils-style `<hash>  filename`."""
    text = content.decode("ascii", errors="strict").strip()
    return text.split()[0].lower()


def emit_output(key: str, value: str) -> None:
    line = f"{key}={value}"
    print(line)
    output_path = os.environ.get("GITHUB_OUTPUT")
    if output_path:
        with open(output_path, "a", encoding="utf-8") as handle:
            handle.write(line + "\n")


def parse_args() -> argparse.Namespace:
    parser = argparse.ArgumentParser(description=__doc__)
    parser.add_argument("--spec-url", default=DEFAULT_SPEC_URL)
    parser.add_argument("--sha256-url", default=DEFAULT_SHA256_URL)
    parser.add_argument("--metadata-url", default=DEFAULT_METADATA_URL)
    parser.add_argument("--staging-dir", default=".sdk-update")
    parser.add_argument("--committed-spec", default="specs/public.yaml")
    return parser.parse_args()


def main() -> int:
    args = parse_args()

    spec_bytes = download(args.spec_url, "spec")
    sha256_bytes = download(args.sha256_url, "sha256 sidecar")
    metadata_bytes = download(args.metadata_url, "metadata sidecar")

    expected_hash = parse_sha256_sidecar(sha256_bytes)
    actual_hash = hashlib.sha256(spec_bytes).hexdigest()
    if actual_hash != expected_hash:
        fail(
            2,
            f"checksum mismatch: sidecar says {expected_hash}, "
            f"downloaded spec hashes to {actual_hash}",
        )

    try:
        metadata = json.loads(metadata_bytes)
    except json.JSONDecodeError as decode_error:
        fail(1, f"metadata sidecar is not valid JSON: {decode_error}")

    source_commit = metadata.get("source_commit", "")
    generated_at = metadata.get("generated_at", "")

    staging = Path(args.staging_dir)
    staging.mkdir(parents=True, exist_ok=True)
    staged_spec = staging / "public.yaml"
    staged_spec.write_bytes(spec_bytes)

    # Diff against the committed spec. Bytewise comparison — same content
    # always produces the same SHA256, so this is also redundant with the
    # checksum we already verified, but it's the cheapest way to detect
    # "nothing changed" without re-running the generator.
    committed = Path(args.committed_spec)
    changed = (
        not committed.exists() or committed.read_bytes() != spec_bytes
    )

    emit_output("changed", "true" if changed else "false")
    emit_output("source_commit", source_commit)
    emit_output("generated_at", generated_at)
    emit_output("checksum_sha256", expected_hash)
    emit_output("staged_spec_path", str(staged_spec.resolve()))
    emit_output("resolved_spec_url", args.spec_url)

    if not changed:
        print("fetch_spec: spec unchanged from committed copy; downstream steps should skip.")

    return 0


if __name__ == "__main__":
    sys.exit(main())
