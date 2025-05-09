<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0266a78101ac4d6bc90658d6288502f9
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Cristyanhenrich\\AsaasSdk\\' => 25,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Cristyanhenrich\\AsaasSdk\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit0266a78101ac4d6bc90658d6288502f9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0266a78101ac4d6bc90658d6288502f9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0266a78101ac4d6bc90658d6288502f9::$classMap;

        }, null, ClassLoader::class);
    }
}
