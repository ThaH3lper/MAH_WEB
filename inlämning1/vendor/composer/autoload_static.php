<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit120571d9d0aa2fbd7f15eec699df7ae8
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
    );

    public static $prefixesPsr0 = array (
        'U' => 
        array (
            'Unirest\\' => 
            array (
                0 => __DIR__ . '/..' . '/mashape/unirest-php/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit120571d9d0aa2fbd7f15eec699df7ae8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit120571d9d0aa2fbd7f15eec699df7ae8::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit120571d9d0aa2fbd7f15eec699df7ae8::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
