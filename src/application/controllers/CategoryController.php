<?php
/**
 * Info sur les routes :
 * Le fait de faire une méthode exempleAction crée une route du type /category/exemple
 * 
 * @author Jordane
 *
 */
class CategoryController extends Zend_Controller_Action
{
    private $category;

    public function indexAction()
    {
        $this->view->categoryList = $this->category()->getList();
    }

    public function showAction()
    {
        $categoryId = (int) $this->getRequest()->getParam('categoryId');
        $this->view->category = $this->category()->read($categoryId);

        if (!$this->view->category) {
            throw new Zend_Controller_Action_Exception(
                'Catégorie inexistante', '404'
            );
        }
    }
    
    /**
     * Ajoute une catégorie
     */
    public function addAction()
    {
        $form = new Form_Category_Add;
        $form->setAction('');
        
        if ($this->getRequest()->isPost()) {
            
            if ($form->isValid($this->getRequest()->getPost())) {
                $this->category()->create($form->getValue('name'));
                $this->view->message = 'Catégorie crée';
                $form->reset();
            }
            
        }
        
        $this->view->form = $form;
    }
   

    /**
     * Crée un nouvel objet Service_Category
     * @return Service_Category
     */
    private function category()
    {
        if (NULL === $this->category) {
            $this->category = new Service_Category;
        }
        return $this->category;
    }


}