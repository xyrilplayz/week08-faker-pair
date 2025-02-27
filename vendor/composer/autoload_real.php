<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit06a246fb7fd541d754d977d9b5f184ae
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit06a246fb7fd541d754d977d9b5f184ae', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit06a246fb7fd541d754d977d9b5f184ae', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit06a246fb7fd541d754d977d9b5f184ae::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
