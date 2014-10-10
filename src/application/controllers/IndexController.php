<?php
class IndexController extends Zend_Controller_Action
{
    private $film;
    
    public function indexAction()
    {       
        $this->view->lastFilms = $this->film()->getList(null, 'film_id DESC', 10);
    }
    
    /**
     * Crée un nouvel objet Service_Film
     * @return Service_Film
     */
    private function film()
    {
        if (NULL === $this->film) {
            $this->film = new Service_Film;
        }
        return $this->film;
    }    
    
}