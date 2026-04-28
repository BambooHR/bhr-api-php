#!/usr/bin/env php
<?php
/**
 * Smoke test: validates all generated classes can be autoloaded without errors.
 * Run after `make generate` to confirm the generated output is structurally sound.
 */

$autoload = __DIR__ . '/../vendor/autoload.php';
if (!file_exists($autoload)) {
    fwrite(STDERR, "Error: vendor/autoload.php not found. Run `composer install` first.\n");
    exit(1);
}
require_once $autoload;

$dirs = [
    __DIR__ . '/../lib/Api',
    __DIR__ . '/../lib/Model',
];

$errors = [];
$loaded = 0;

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        fwrite(STDERR, "Warning: directory not found: $dir\n");
        continue;
    }
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    foreach ($iterator as $file) {
        if ($file->getExtension() !== 'php') {
            continue;
        }
        try {
            require_once $file->getPathname();
            $loaded++;
        } catch (Throwable $throwable) {
            $errors[] = $file->getPathname() . ': ' . $throwable->getMessage();
        }
    }
}

if ($errors) {
    fwrite(STDERR, "Smoke test FAILED — " . count($errors) . " error(s):\n");
    foreach ($errors as $error) {
        fwrite(STDERR, "  $error\n");
    }
    exit(1);
}

echo "Smoke test passed — $loaded files loaded successfully.\n";
exit(0);
