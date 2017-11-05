<?php

/**
 * Class Model_Email
 */
class Model_Email
{
    public function __construct()
    {
        //empty constructor
    }

    /**
     * send e-mail
     *
     * @param string $message message
     *
     * @return bool
     *
     * @throws Exception
     */
    public function send($message)
    {
        if (mail(EMAIL_ADDRESS, 'Stylers test feladat megoldása', $message)) {
            return true;
        } else {
            throw new Exception('E-mail küldés sikertelen.');
        }
    }

}