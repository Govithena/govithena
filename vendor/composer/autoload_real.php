<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitf56e4158a11fc8bae0ca87554f1b6433
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

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitf56e4158a11fc8bae0ca87554f1b6433', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitf56e4158a11fc8bae0ca87554f1b6433', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitf56e4158a11fc8bae0ca87554f1b6433::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
