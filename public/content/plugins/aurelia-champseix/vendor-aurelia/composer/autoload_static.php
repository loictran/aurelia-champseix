<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6f32e52686a547247944c6978d51fff5
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Aurelia\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Aurelia\\' => 
        array (
            0 => __DIR__ . '/../..' . '/class',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6f32e52686a547247944c6978d51fff5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6f32e52686a547247944c6978d51fff5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6f32e52686a547247944c6978d51fff5::$classMap;

        }, null, ClassLoader::class);
    }
}
