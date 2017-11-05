<?php

/**
 * Class TemplateRenderer
 */
class TemplateRenderer{

    /**
     * @var Session
     */
    protected $_session;

    public function render($template, $data = []) {
        if (is_file('application/View/'.$template.'.php')) {
            extract($data, 1);
            $session = $this->_session;
            require 'application/View/'.$template.'.php';
        }
    }

    /**
     * set session
     *
     * @param Session $session session
     *
     * @return void
     */
    public function setSession($session)
    {
        $this->_session = $session;
    }
}