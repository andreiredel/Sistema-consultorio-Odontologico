<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit610741554fe583e2ec100da885c7889f
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit610741554fe583e2ec100da885c7889f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit610741554fe583e2ec100da885c7889f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}