<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8d468500c0225b699df790ed9b062868
{
    public static $files = array (
        '1a70a632f6af70a927e2f0f77386ad28' => __DIR__ . '/../..' . '/helper/setting.php',
        '23a19307e303bb6f16e3b9928f1e1854' => __DIR__ . '/../..' . '/helper/helperFunc.php',
    );

    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'App\\Application' => __DIR__ . '/../..' . '/app/Application.php',
        'Firebase\\JWT\\BeforeValidException' => __DIR__ . '/..' . '/firebase/php-jwt/src/BeforeValidException.php',
        'Firebase\\JWT\\ExpiredException' => __DIR__ . '/..' . '/firebase/php-jwt/src/ExpiredException.php',
        'Firebase\\JWT\\JWK' => __DIR__ . '/..' . '/firebase/php-jwt/src/JWK.php',
        'Firebase\\JWT\\JWT' => __DIR__ . '/..' . '/firebase/php-jwt/src/JWT.php',
        'Firebase\\JWT\\SignatureInvalidException' => __DIR__ . '/..' . '/firebase/php-jwt/src/SignatureInvalidException.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8d468500c0225b699df790ed9b062868::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8d468500c0225b699df790ed9b062868::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8d468500c0225b699df790ed9b062868::$classMap;

        }, null, ClassLoader::class);
    }
}
