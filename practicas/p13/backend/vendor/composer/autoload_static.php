<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit27a0832dcf23813eb5e864f7cbb1c5c0
{
    public static $prefixLengthsPsr4 = array (
        't' => 
        array (
            'tecweb\\MyApi\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'tecweb\\MyApi\\' => 
        array (
            0 => __DIR__ . '/../..' . '/myapi',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit27a0832dcf23813eb5e864f7cbb1c5c0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit27a0832dcf23813eb5e864f7cbb1c5c0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit27a0832dcf23813eb5e864f7cbb1c5c0::$classMap;

        }, null, ClassLoader::class);
    }
}