<?php

/**
 * Class Autoload
 */
class Autoload
{
    /**
     * @var Autoload
     */
    static protected $_instance;

    /**
     * Class constructor
     */
    public function __construct()
    {
        //empty construct
    }

    /**
     * Register SPL autoload function
     *
     * @return void
     */
    static public function register()
    {
        spl_autoload_register(array(self::instance(), 'autoload'));
    }

    /**
     * Load class source code
     *
     * @param string $class
     *
     * @return void
     */
    public function autoload($class)
    {
        if ('' == $class) {
            return;
        }

        $classFile = str_replace(' ', DIRECTORY_SEPARATOR, ucwords(str_replace('_', '/', $class)));
        $classFile .= '.php';
        if (!file_exists('application/' . $classFile)) {
            header("Location: " . INSTALLATION_DIRECTORY ."/index.php");
        }

        return include $classFile;
    }

    /**
     * Singleton pattern implementation
     *
     * @return Autoload
     */
    static public function instance()
    {
        if (!self::$_instance) {
            self::$_instance = new Autoload();
        }
        return self::$_instance;
    }
}