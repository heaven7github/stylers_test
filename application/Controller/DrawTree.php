<?php

/**
 * Class Controller_DrawTree
 */
class Controller_DrawTree extends ControllerAbstract
{
    /**
     * index action
     *
     * @return void
     */
    public function indexAction()
    {
        try {
            $tree = new Model_Tree();
            $treeArray = $tree->getTree(0);
            $this->_renderer->render('tree_page',
                [
                    'tree' => $treeArray
                ]
            );
        }  catch (Exception $e) {
            $this->_session->addError($e->getMessage());
            $this->_renderer->render('tree_page');
        }
    }
}
