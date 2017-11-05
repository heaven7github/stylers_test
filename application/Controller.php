<?php

/**
 * Class Controller
 */
class Controller
{
    /**
     * init
     *
     * @param TemplateRenderer $renderer renderer
     * @param Session          $session  session
     *
     * @return void
     */
    public function init($renderer, $session)
    {
        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        $controller = isset($get['c']) && '' != $get['c'] ? ucfirst($get['c']) : 'Index';
        $controllerClass = "Controller_" . $controller;
        $action = isset($get['a']) && '' != $get['a'] ? $get['a'] : 'index';
        $actionMethod = $action . "Action";

        /** @var ControllerAbstract $controllerInstance */
        $controllerInstance = new $controllerClass();
        $controllerInstance->setRenderer($renderer);
        $renderer->setSession($session);
        $controllerInstance->setSession($session);

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $controllerInstance->setPost($_POST);

        $controllerInstance->$actionMethod($get);
    }
}