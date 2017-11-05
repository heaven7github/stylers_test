<?php

/**
 * Class Session
 */
class Session
{
    /**
     * Session constructor
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * set data
     *
     * @param string $key   key
     * @param string $value value
     *
     * @return void
     */
    public function setData($key, $value = null)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * get data
     *
     * @param string $key key
     * @return string
     */
    public function getData($key='')
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : false;;
    }

    /**
     * @param string $key key
     *
     * @return void
     */
    public function unsetData($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    /**
     * add error
     *
     * @param string $error error
     *
     * @return void
     */
    public function addError($error)
    {
        $this->setData('error', $error);
    }

    /**
     * get error
     *
     * @return string
     */
    public function getError()
    {
        $error = $this->getData('error');
        $this->unsetData('error');
        return $error;
    }

    /**
     * add notice
     *
     * @param string $notice notice
     *
     * @return void
     */
    public function addNotice($notice)
    {
        $this->setData('notice', $notice);
    }

    /**
     * get notice
     *
     * @return string
     */
    public function getNotice()
    {
        $notice = $this->getData('notice');
        $this->unsetData('notice');
        return $notice;
    }

    /**
     * add success
     *
     * @param string $success success
     *
     * @return void
     */
    public function addSuccess($success)
    {
        $this->setData('success', $success);
    }

    /**
     * get success
     *
     * @return string
     */
    public function getSuccess()
    {
        $success = $this->getData('success');
        $this->unsetData('success');
        return $success;
    }
}