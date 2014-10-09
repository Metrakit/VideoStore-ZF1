<?php
class ActorController extends Zend_Controller_Action
{
    private $actor;

    public function indexAction()
    {
        $this->view->actorList = $this->actor()->getList(null, null, 10);
    }

    public function showAction()
    {
        $actorId = (int) $this->getRequest()->getParam('actorId');
        $this->view->actor = $this->actor()->read($actorId);

        if (!$this->view->actor) {
            throw new Zend_Controller_Action_Exception(
                'Acteur inexistant', '404'
            );
        }
    }

    /**
     * Supprime un acteur
     */
    public function deleteAction()
    {
        $actorId = (int) $this->getRequest()->getParam('actorId');
        $this->actor()->delete($actorId);
        $this->_redirect('/');
    }

    /**
     * Crée un nouvel objet Service_Actor
     * @return Service_Actor
     */
    private function actor()
    {
        if (NULL === $this->actor) {
            $this->actor = new Service_Actor;
        }
        return $this->actor;
    }


}