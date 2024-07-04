<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdaca80e5266e1b99f3bbf822a61c40b1
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'GoingNext\\LaravelStudio\\' => 24,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'GoingNext\\LaravelStudio\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitdaca80e5266e1b99f3bbf822a61c40b1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdaca80e5266e1b99f3bbf822a61c40b1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdaca80e5266e1b99f3bbf822a61c40b1::$classMap;

        }, null, ClassLoader::class);
    }
}
