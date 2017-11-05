<?php

/**
 * Class Controller_DataRead
 */
class Controller_DataRead extends ControllerAbstract
{
    /**
     * index action
     *
     * @return void
     */
    public function indexAction()
    {
        $this->_renderer->render(
            'data_read'
        );
    }

    /**
     * start action
     *
     * @return void
     */
    public function startAction()
    {
        try {
            $jsonReader = new Model_JSONReader();
            $array = $jsonReader->getArray();

            $tree = new Model_Tree();
            $tree->createDb();
            $tree->createTable();
            $tree->truncateTable();
            $tree->saveTree($array);

            $this->_session->addSuccess('Az adatok sikeresen elmentődtek az adatbázisba.');

        } catch (Exception $e) {
            $this->_session->addError($e->getMessage());
        }

        $this->redirect('dataRead');
    }
}
