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
 * This script
 * -----------
 *   1. Finds every `lib/Model/<digit>*.php`.
 *   2. For each, locates the associated derived files:
 *        - `lib/Model/<name>.php`   (the class)
 *        - `docs/Model/<name>.md`   (the doc page)
 *        - `test/Model/<name>Test.php` (only when --global-property
 *          modelTests is not false — we set it false, so usually absent)
 *      and renames them to `_<name>.…`.
 *   3. Rewrites every cross-reference in the rest of the SDK:
 *        - `BhrSdk\Model\1d64...` and bare `1d64...::class`
 *        - markdown link text and link targets like `[1d64...](1d64...md)`
 *        - entries in `.openapi-generator/FILES` (both `.php` and `.md`
 *          paths) so the obsolete-cleanup pass on the next regen doesn't
 *          think the renamed files are stale
 *        - the top-level `README.md`, which openapi-generator regenerates
 *          and which links to every model under `docs/Model/`.
 *
 * Re-running is safe: once a class has been prefixed with `_` it no
 * longer starts with a digit, so the scanner finds nothing on the next
 * pass.
 *
 * If/when upstream openapi-generator fixes the PHP target's inline-schema
 * naming (or the source spec adds proper `title` / `operationId` values),
 * this script can be deleted and removed from the Makefile.
 */

declare(strict_types=1);

const PROJECT_ROOT = __DIR__ . '/..';
const MODEL_DIR    = PROJECT_ROOT . '/lib/Model';
const DOCS_MODEL_DIR = PROJECT_ROOT . '/docs/Model';
const TEST_MODEL_DIR = PROJECT_ROOT . '/test/Model';
const FILES_MANIFEST = PROJECT_ROOT . '/.openapi-generator/FILES';
const README         = PROJECT_ROOT . '/README.md';

// Directories whose .php and .md content we rewrite via the renames map.
// README.md is added explicitly below (it's a single top-level file, not
// a directory tree, so the recursive walker doesn't naturally see it).
const SCAN_ROOTS = [
    PROJECT_ROOT . '/lib',
    PROJECT_ROOT . '/test',
    PROJECT_ROOT . '/docs',
];

/**
 * Discover every digit-prefixed model basename in lib/Model/.
 *
 * Returns an array of class names (without the .php extension).
 */
function findBrokenModels(string $dir): array {
    if (!is_dir($dir)) {
        return [];
    }
    $broken = [];
    foreach (scandir($dir) as $entry) {
        if (preg_match('/^([0-9][A-Za-z0-9_]*)\.php$/', $entry, $matches)) {
            $broken[] = $matches[1];
        }
    }
    sort($broken);
    return $broken;
}

/**
 * Apply a {oldName => newName} substitution to a single file. Returns
 * true iff the file actually changed.
 *
 * Uses \b word boundaries so a short token can't accidentally match
 * inside a longer one — e.g. when both `1d64aRequest` and
 * `1d64aRequestInner` need renaming, processing one won't clobber the
 * other (the `r` ↔ `I` transition between them is word-char ↔ word-char,
 * no boundary).
 */
function rewriteFile(string $path, array $renames): bool {
    $original = @file_get_contents($path);
    if ($original === false) {
        fwrite(STDERR, "  WARN: unreadable: $path\n");
        return false;
    }
    $updated = $original;
    foreach ($renames as $oldName => $newName) {
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

/**
 * Recurse `$dir` and call `$fn($absPath)` for each .php / .md file.
 */
function walkSourceFiles(string $dir, callable $fn): void {
    if (!is_dir($dir)) {
        return;
    }
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    foreach ($iterator as $file) {
        $ext = strtolower($file->getExtension());
        if ($ext === 'php' || $ext === 'md') {
            $fn($file->getPathname());
        }
    }
}

/**
 * Rename `$oldPath` to `$newPath` if `$oldPath` exists. Returns true on
 * actual rename, false if the source file wasn't present (which is fine
 * — not every model has every kind of derived file).
 */
function renameIfExists(string $oldPath, string $newPath): bool {
    if (!file_exists($oldPath)) {
        return false;
    }
    if (!rename($oldPath, $newPath)) {
        fwrite(STDERR, "  ERROR: rename failed: $oldPath -> $newPath\n");
        exit(1);
    }
    return true;
}

// ---- main -----------------------------------------------------------------

// Sanity guard: this fix targets lib/Model/ only. Digit-prefixed names come
// from inline request/response schemas that openapi-generator hashes when
// they lack a `title`; those always land in lib/Model/. API classes
// (lib/Api/) are named from OpenAPI tags, which are human-readable and never
// hashed, so a digit-prefixed API class should be impossible. If that
// assumption ever breaks, fail loudly here rather than letting smoke_test.php
// (which autoloads lib/Api/ too) surface it as a confusing autoload error.
$brokenApis = findBrokenModels(PROJECT_ROOT . '/lib/Api');
if (!empty($brokenApis)) {
    fwrite(STDERR, "fix_invalid_class_names: ERROR — digit-prefixed class(es) found in lib/Api/:\n");
    foreach ($brokenApis as $name) {
        fwrite(STDERR, "  - $name\n");
    }
    fwrite(
        STDERR,
        "This script only handles lib/Model/. API classes were assumed to be\n"
        . "tag-derived and never hash-named — that assumption no longer holds.\n"
        . "Extend this script to cover lib/Api/ (+ docs/Api/, test/Api/).\n"
    );
    exit(1);
}

$broken = findBrokenModels(MODEL_DIR);

if (empty($broken)) {
    echo "fix_invalid_class_names: no models with digit-prefixed names found, nothing to do.\n";
    exit(0);
}

echo "fix_invalid_class_names: found " . count($broken) . " digit-prefixed class(es):\n";
foreach ($broken as $name) {
    echo "  - $name\n";
}

// Build the token-rename map applied to file *contents* (class
// declarations, `use` statements, type hints, markdown links, manifest
// paths). For each broken model we always rename the model class token.
//
// Model test stubs (emitted only when --global-property modelTests isn't
// false) are named `<name>Test`, and that class ALSO starts with a digit.
// It needs its own entry because rewriteFile()'s \b boundary cannot match
// the `<name>` token inside `<name>Test`: the join is t→T, word-char to
// word-char, so there's no boundary for `\b<name>\b` to anchor on. A lone
// `<name>` entry would leave `class <name>Test`, its `<name>Test` manifest
// path, and any `<name>Test::class` references digit-prefixed — still a
// PHP syntax error.
//
// Entry order is irrelevant: every key is matched with \b on both ends,
// so `<name>` can never match inside the longer `<name>Test` token and
// vice-versa, regardless of which is substituted first.
$renames = [];
foreach ($broken as $name) {
    $renames[$name] = '_' . $name;
    if (file_exists(TEST_MODEL_DIR . "/{$name}Test.php")) {
        $renames["{$name}Test"] = "_{$name}Test";
    }
}

// Step 1: Physically rename the derived files for each broken model — the
// PHP class itself + its markdown doc + its optional test stub. Iterate
// $broken (one model => one set of files) rather than $renames, since
// $renames now also contains the `<name>Test` content-token which has no
// independent file of its own. The class file is guaranteed to exist (we
// found it via scandir above); the doc and test files are best-effort.
$renamedCount = ['php' => 0, 'md' => 0, 'test' => 0];
foreach ($broken as $name) {
    $newName = '_' . $name;
    if (renameIfExists(MODEL_DIR . "/$name.php", MODEL_DIR . "/$newName.php")) {
        $renamedCount['php']++;
    }
    if (renameIfExists(DOCS_MODEL_DIR . "/$name.md", DOCS_MODEL_DIR . "/$newName.md")) {
        $renamedCount['md']++;
    }
    if (renameIfExists(TEST_MODEL_DIR . "/{$name}Test.php", TEST_MODEL_DIR . "/{$newName}Test.php")) {
        $renamedCount['test']++;
    }
}
echo "fix_invalid_class_names: renamed {$renamedCount['php']} .php / "
   . "{$renamedCount['md']} .md / {$renamedCount['test']} test file(s).\n";

// Step 2: Rewrite cross-references across lib/, test/, docs/. This pass
// updates: the renamed class file's internal `class …` declaration,
// `use` statements in importers, type hints, markdown link text, and
// markdown link targets. Walks .php and .md.
$touched = 0;
foreach (SCAN_ROOTS as $root) {
    walkSourceFiles($root, function (string $path) use ($renames, &$touched): void {
        if (rewriteFile($path, $renames)) {
            $touched++;
        }
    });
}

// Step 3: Top-level README.md is regenerated by openapi-generator and
// links into docs/Model/. It's outside SCAN_ROOTS, so handle it
// explicitly. Skipping silently if absent (some setups may .ignore it).
if (file_exists(README) && rewriteFile(README, $renames)) {
    $touched++;
}

echo "fix_invalid_class_names: updated references in $touched file(s).\n";

// Step 4: Patch the FILES manifest so the obsolete-cleanup pass on the
// NEXT regen doesn't think the underscored paths are missing files. The
// manifest contains both .php and .md paths, both of which must move in
// lockstep with the actual renames above.
if (file_exists(FILES_MANIFEST) && rewriteFile(FILES_MANIFEST, $renames)) {
    echo "fix_invalid_class_names: patched .openapi-generator/FILES manifest.\n";
}
