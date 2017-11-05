<?php

/**
 * Class App
 */
class App
{
    /**
     * @var object
     */
    protected static $_app = false;

    /**
     * Constructor
     */
    public function __construct()
    {
        static::getInstance();
    }

    /**
     * Get application instance
     *
     * @return object|null
     */
    public static function getInstance()
    {
        return isset(static::$_app) ? static::$_app : null;
    }

    /**
     * run
     *
     * @return void
     */
    public function run()
    {
        $this->init();
    }

    /**
     * init
     *
     * @return void
     */
    public function init()
    {
        $controller = new Controller();

        $session = new Session();

        $renderer = new TemplateRenderer();
        $controller->init($renderer, $session);

    }
}