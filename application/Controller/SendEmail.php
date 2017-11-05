<?php

/**
 * Class Controller_SendEmail
 */
class Controller_SendEmail extends ControllerAbstract
{
    /**
     * index action
     *
     * @return void
     */
    public function indexAction()
    {
        $this->_renderer->render(
            'email'
        );
    }

    /**
     * send email action
     *
     * @return void
     */
    public function sendAction()
    {
        try {
            $tree = new Model_Tree();
            $message = $tree->getSolution();

            $email = new Model_Email();
            $email->send($message);

            $this->_session->addSuccess('E-mail sikeresen elküldve.');

        } catch (Exception $e) {
            $this->_session->addError($e->getMessage());
        }

        $this->redirect('sendEmail');
    }

}