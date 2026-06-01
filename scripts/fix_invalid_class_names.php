#!/usr/bin/env php
<?php
/**
 * fix_invalid_class_names.php — work around an openapi-generator PHP bug.
 *
 * Background
 * ----------
 * When a spec contains inline schemas that lack a `title` field AND the
 * enclosing operation lacks a clean `operationId`, openapi-generator
 * invents a name by hashing the operation. For Python it emits something
 * like `_3958585c861325ea7a2cd30a8c74f042_request` — the leading
 * underscore makes the name a valid Python identifier. For PHP it strips
 * the underscore and emits raw hex like `3958585c861325ea7a2cd30a8c74f042Request`,
 * which is a PHP **syntax error** at parse time (`unexpected integer "3958585"`).
 *
 * Affected lines look like:
 *   lib/Model/1d64402ee192568adbd5e3179a91e6e2RequestInner.php
 *     class 1d64402ee192568adbd5e3179a91e6e2RequestInner extends ...
 *
 * This script
 * -----------
 *   1. Finds every `lib/Model/<digit>*.php` file.
 *   2. For each, renames the class to `_<original>` (matching the convention
 *      Python's generator follows) and renames the file to match.
 *   3. Rewrites cross-references throughout `lib/`, `test/`, and `docs/`:
 *        - `BhrSdk\Model\1d64...` → `BhrSdk\Model\_1d64...`
 *        - bare `1d64...::class` → `_1d64...::class`
 *        - `'1d64...'` in serializer maps (ObjectSerializer / etc.)
 *
 * Run as a post-generation step from the Makefile. Re-running is safe:
 * once a class has been prefixed with `_` it no longer starts with a
 * digit, so the next pass leaves it alone.
 *
 * If/when upstream openapi-generator fixes the PHP target's inline-schema
 * naming (or the source spec adds proper `title` / `operationId` values),
 * this script can be deleted and removed from the Makefile.
 */

declare(strict_types=1);

const MODEL_DIR = __DIR__ . '/../lib/Model';
const SCAN_ROOTS = [
    __DIR__ . '/../lib',
    __DIR__ . '/../test',
    __DIR__ . '/../docs',
];

function findBrokenModels(string $dir): array {
    if (!is_dir($dir)) {
        return [];
    }
    $broken = [];
    foreach (scandir($dir) as $entry) {
        if (preg_match('/^([0-9][A-Za-z0-9_]*)\.php$/', $entry, $matches)) {
            $broken[] = $matches[1];  // class name without .php
        }
    }
    return $broken;
}

function rewriteFile(string $path, array $renames): bool {
    $original = file_get_contents($path);
    if ($original === false) {
        fwrite(STDERR, "  WARN: unreadable: $path\n");
        return false;
    }
    $updated = $original;
    foreach ($renames as $oldName => $newName) {
        // Replace the bare token wherever it appears as an identifier.
        // Word boundaries (\b) keep us from clobbering substrings of
        // longer hex hashes (e.g. a 32-char hash that happens to contain
        // a 30-char hash as a prefix).
        $updated = preg_replace(
            '/\b' . preg_quote($oldName, '/') . '\b/',
            $newName,
            $updated
        );
    }
    if ($updated === $original) {
        return false;
    }
    file_put_contents($path, $updated);
    return true;
}

function walkPhpFiles(string $dir, callable $fn): void {
    if (!is_dir($dir)) {
        return;
    }
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    foreach ($iterator as $file) {
        if ($file->getExtension() === 'php' || $file->getExtension() === 'md') {
            $fn($file->getPathname());
        }
    }
}

// ---- main -----------------------------------------------------------------

$broken = findBrokenModels(MODEL_DIR);

if (empty($broken)) {
    echo "fix_invalid_class_names: no models with digit-prefixed names found, nothing to do.\n";
    exit(0);
}

echo "fix_invalid_class_names: found " . count($broken) . " digit-prefixed class(es):\n";
foreach ($broken as $name) {
    echo "  - $name\n";
}

// Build rename map: oldName => newName
$renames = [];
foreach ($broken as $name) {
    $renames[$name] = '_' . $name;
}

// 1. Rename files in lib/Model/ and rewrite their internal references.
foreach ($renames as $oldName => $newName) {
    $oldPath = MODEL_DIR . "/$oldName.php";
    $newPath = MODEL_DIR . "/$newName.php";
    if (!file_exists($oldPath)) {
        fwrite(STDERR, "  WARN: expected file missing: $oldPath\n");
        continue;
    }
    // Rewrite class name inside before renaming the file.
    rewriteFile($oldPath, [$oldName => $newName]);
    if (!rename($oldPath, $newPath)) {
        fwrite(STDERR, "  ERROR: rename failed: $oldPath -> $newPath\n");
        exit(1);
    }
    echo "  Renamed $oldName -> $newName\n";
}

// 2. Update cross-references everywhere else (other models, API classes,
//    serializer maps, docs, tests).
$touched = 0;
foreach (SCAN_ROOTS as $root) {
    walkPhpFiles($root, function (string $path) use ($renames, &$touched): void {
        if (rewriteFile($path, $renames)) {
            $touched++;
        }
    });
}
echo "fix_invalid_class_names: updated references in $touched file(s).\n";

// 3. Patch .openapi-generator/FILES so the cleanup script doesn't think the
//    renamed files are "obsolete" on the next run.
$filesManifest = __DIR__ . '/../.openapi-generator/FILES';
if (file_exists($filesManifest)) {
    if (rewriteFile($filesManifest, $renames)) {
        echo "fix_invalid_class_names: patched .openapi-generator/FILES manifest.\n";
    }
}
