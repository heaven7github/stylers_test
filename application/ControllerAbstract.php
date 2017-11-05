<?php

/**
 * Class ControllerAbstract
 */
abstract class ControllerAbstract
{
    /**
     * @var TemplateRenderer
     */
    protected $_renderer;

    /**
     * @var Session
     */
    protected $_session;

    /**
     * @var post
     */
    protected $_post;

    /**
     * set renderer
     *
     * @param object $renderer renderer
     *
     * @return void
     */
    public function setRenderer($renderer)
    {
        $this->_renderer = $renderer;
    }

    /**
     * redirect
     * @param string $path        path
     * @param array  $paramsArray params array
     *
     * @return void
     */
    public function redirect($path, $paramsArray = [])
    {
        $pathArray = explode('/', $path);
        $controller = $pathArray[0];
        $action = $pathArray[1];
        $params = '';
        foreach ($paramsArray as $key => $value) {
            $params .= "&" . $key . "=" . $value;
        }
        header("Location: " . INSTALLATION_DIRECTORY ."/index.php?c=" . $controller . '&a=' . $action . $params);
        die();
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

    /**
     * set post
     *
     * @param array $post post
     *
     * @return void
     */
    public function setPost($post)
    {
        $this->_post = $post;
    }
}