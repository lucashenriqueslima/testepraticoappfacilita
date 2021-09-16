<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb4c9468d1881f67eda6a07f87bd9f9be
{
    public static $files = array (
        'e8d58f0e9cd50856f2532c141bcbc001' => __DIR__ . '/../..' . '/source/Config.php',
        '69fdfaeb23885f1c2a41ce341c6f0333' => __DIR__ . '/../..' . '/source/Helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Source\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Source\\' => 
        array (
            0 => __DIR__ . '/../..' . '/source',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb4c9468d1881f67eda6a07f87bd9f9be::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb4c9468d1881f67eda6a07f87bd9f9be::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb4c9468d1881f67eda6a07f87bd9f9be::$classMap;

        }, null, ClassLoader::class);
    }
}
