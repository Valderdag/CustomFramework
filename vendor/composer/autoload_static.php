<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5863b2f99e482ca9524a53dc0ba8f10f
{
    public static $prefixLengthsPsr4 = array (
        'w' => 
        array (
            'wfm\\' => 4,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
        'R' => 
        array (
            'RedBeanPHP\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'wfm\\' => 
        array (
            0 => __DIR__ . '/..' . '/wfm',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'RedBeanPHP\\' => 
        array (
            0 => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5863b2f99e482ca9524a53dc0ba8f10f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5863b2f99e482ca9524a53dc0ba8f10f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5863b2f99e482ca9524a53dc0ba8f10f::$classMap;

        }, null, ClassLoader::class);
    }
}