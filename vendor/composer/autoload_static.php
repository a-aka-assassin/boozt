<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdb7c138abf6da38f766238dd9e226ebf
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MyApp\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MyApp\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdb7c138abf6da38f766238dd9e226ebf::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdb7c138abf6da38f766238dd9e226ebf::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdb7c138abf6da38f766238dd9e226ebf::$classMap;

        }, null, ClassLoader::class);
    }
}
