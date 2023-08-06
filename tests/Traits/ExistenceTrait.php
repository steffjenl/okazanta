<?php

declare(strict_types=1);

namespace Tests\Traits;

use CallbackFilterIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ReflectionClass;

/**
 * This is the existence trait.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
trait ExistenceTrait
{
    abstract protected static function getSourcePath();

    /**
     * @dataProvider provideFilesToCheck
     */
    public function testExistence($class, $test)
    {
        $this->assertTrue(class_exists($class) || interface_exists($class) || trait_exists($class), "Expected {$class} to exist.");

        if (class_exists($class)) {
            $this->assertTrue(class_exists($test), "Expected there to be tests for {$class}.");
        }
    }

    public static function provideFilesToCheck()
    {
        $source = static::getSourceNamespace();
        $tests = static::getTestNamespace();
        $path = static::getSourcePath();
        $len = strlen($path);

        $files = new CallbackFilterIterator(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path)), function ($file) {
            return $file->getFilename()[0] !== '.' && !$file->isDir();
        });

        return array_map(function ($file) use ($len, $source, $tests) {
            $name = str_replace('/', '\\', strtok(substr($file->getPathname(), $len), '.'));
            return ["{$source}{$name}", "{$tests}{$name}Test"];
        }, iterator_to_array($files));
    }

    protected static function getSourceNamespace()
    {
        return str_replace('Tests\\Feature', 'CachetHQ\\Cachet', static::getTestNamespace());
    }

    protected static function getTestNamespace()
    {
        return (new ReflectionClass(static::class))->getNamespaceName();
    }
}
