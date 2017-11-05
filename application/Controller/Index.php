<?php

/**
 * Class Controller_Index
 */
class Controller_Index extends ControllerAbstract
{
    /**
     * index action
     *
     * @return void
     */
    public function indexAction()
    {
        $this->_renderer->render('index');
    }
}