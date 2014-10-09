<?php
class FilmController extends Zend_Controller_Action
{
    private $film;
    
    public function indexAction()
    {       
        $this->view->filmList = $this->film()->getList(null, null, 10);
    }
    
    public function showAction()
    {
        $filmId = (int) $this->getRequest()->getParam('filmId');
        $this->view->film = $this->film()->read($filmId);
        // Récupérer les catégories iva un service (autre méthode)
        //$this->view->categories = $this->film()->getCategoriesByFilm();
        if (!$this->view->film) {
            throw new Zend_Controller_Action_Exception(
                'Film inexistant', '404'
            );
        }
    }
    
    /**
     * Supprime un film
     */
    public function deleteAction()
    {
        $filmId = (int) $this->getRequest()->getParam('filmId');
        $this->film()->delete($filmId);
        $this->_redirect('/');
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