<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit870b3320ed1d94f48bffb242e3d400e1
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Dewa\\Webbakrie\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Dewa\\Webbakrie\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit870b3320ed1d94f48bffb242e3d400e1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit870b3320ed1d94f48bffb242e3d400e1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit870b3320ed1d94f48bffb242e3d400e1::$classMap;

        }, null, ClassLoader::class);
    }
}
