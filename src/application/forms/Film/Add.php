<?php

class Form_Film_Add extends Zend_Form
{
    /**
     * Initialisation d'un formulaire
     * @see Zend_Form::init()
     */
    public function init()
    {
        $film = new Model_Film();
        $language = new Service_Language();
        $languages = $language->getListToArray();
        $actors = new Service_Actor;
        $categories = new Service_Category;               
         
        // Titre
        $this->addElement('text', 'title', array(
            'label'       => 'Titre',
            'placeholder' => 'ex: Expendables 1',
            'description' => 'Titre de moins de 255 caractères',
            'required'    => true,
            'class'       => 'form-control',
        ));        
        $this->getElement('title')
             ->addValidator(
                 new Zend_Validate_StringLength(
                     array('max' => 255)
                 )
             )
            ->addFilter(new Zend_Filter_StripTags());
        
        
        // Description
        $this->addElement('textarea', 'description', array(
            'label'       => 'Description',
            'placeholder' => 'ex: Film d\'action regroupant pas mal de célébrités',
            'description' => 'Desription détaillée du film',
            'required'    => true,
            'class'       => 'form-control',
            'rows'         => 8,
        ));
        $this->getElement('description')
        ->addFilter(new Zend_Filter_StripTags());        
        
        
        // Anné de sortie
        $this->addElement('text', 'releaseYear', array(
            'label'       => 'Anné de sortie',
            'placeholder' => 'ex: 2010',
            'description' => 'Anné de sortie du film',
            'required'    => true,
            'class'       => 'form-control',
        ));
        $this->getElement('releaseYear')
        ->addValidator(new Zend_Validate_Int())
        ->addFilter(new Zend_Filter_StripTags());      

        
        // Language du film
        $this->addElement('select', 'language', array(
            'label'       => 'Language du film',
            'description' => 'Sélectionnez un language',
            'required'    => true,
            'class'       => 'form-control',
        ));
        $this->getElement('language')
        ->addMultiOptions($languages)
        ->addValidator(new Zend_Validate_Int())
        ->addFilter(new Zend_Filter_StripTags());        
           
        
        // Version Originale du film
        $this->addElement('select', 'originalLanguage', array(
            'label'       => 'Version Orginale du film',
            'description' => 'Sélectionnez un language',
            'required'    => true,
            'class'       => 'form-control',
        ));
        $this->getElement('originalLanguage')
        ->addMultiOptions($languages)
        ->addValidator(new Zend_Validate_Int())
        ->addFilter(new Zend_Filter_StripTags());

        
        // Anné de sortie
        $this->addElement('text', 'rentalDuration', array(
            'label'       => 'Durée de location',
            'placeholder' => 'ex: 80 jours',
            'description' => 'Veuillez préciser une durée',
            'required'    => true,
            'class'       => 'form-control',
        ));
        $this->getElement('rentalDuration')
        ->addValidator(new Zend_Validate_Int())
        ->addFilter(new Zend_Filter_StripTags());
                
        
        // Taux de location
        $this->addElement('text', 'rentalRate', array(
            'label'       => 'Tarif de location',
            'placeholder' => 'ex: 4.99€',
            'description' => 'Veuillez préciser un prix',
            'required'    => true,
            'class'       => 'form-control',
        ));
        $this->getElement('rentalRate')
        ->addValidator(new Zend_Validate_Float(array('locale' => 'us')))
        ->addFilter(new Zend_Filter_StripTags());   

        
        // Durée du film
        $this->addElement('text', 'length', array(
            'label'       => 'Durée du film',
            'placeholder' => 'ex: 80 minutes',
            'description' => 'Veuillez préciser une durée',
            'required'    => true,
            'class'       => 'form-control',
        ));
        $this->getElement('length')
        ->addValidator(new Zend_Validate_Int())
        ->addFilter(new Zend_Filter_StripTags());

        
        // Prix de remplacement
        $this->addElement('text', 'replacementCost', array(
            'label'       => 'Prix de remplacement',
            'placeholder' => 'ex: 99.99€',
            'description' => 'Veuillez préciser un prix',
            'required'    => true,
            'class'       => 'form-control',
        ));
        $this->getElement('replacementCost')    
        ->addValidator(new Zend_Validate_Float(array('locale' => 'us')))
        ->addFilter(new Zend_Filter_StripTags());      
          
        
        // PEGI
        $this->addElement('select', 'rating', array(
            'label'       => 'PEGI',
            'description' => 'Sélectionnez un classement',
            'required'    => true,
            'class'       => 'form-control',
        ));
        $this->getElement('rating')
        ->addMultiOptions($film->getPEGI())
        ->addFilter(new Zend_Filter_StripTags());
        
        
        // Type du film     
        $this->addElement('multiselect', 'specialFeatures', array(
            'label'       => 'Type',
            'description' => 'Sélectionnez un type',
            'required'    => true,
            'class'       => 'form-control',
        ));
        $this->getElement('specialFeatures')
        ->addMultiOptions($film->getLabels())
        ->addValidator(new Zend_Validate_Int())
        ->addFilter(new Zend_Filter_StripTags());
        
        
        // Catégories du film    
        $this->addElement('multiselect', 'categories', array(
            'label'       => 'Catégories',
            'description' => 'Sélectionnez des catégories',
            'required'    => true,
            'class'       => 'form-control',
        ));  
        $this->getElement('categories')
        ->addMultiOptions($categories->getListToArray())
        ->addValidator(new Zend_Validate_Int())
        ->addFilter(new Zend_Filter_StripTags());        
        
        
        // Acteurs du film
        $this->addElement('multiselect', 'actors', array(
            'label'       => 'Acteurs',
            'description' => 'Sélectionnez des acteurs',
            'required'    => true,
            'class'       => 'form-control',
        ));
        $this->getElement('actors')
        ->addMultiOptions($actors->getListToArray())
        ->addValidator(new Zend_Validate_Int())
        ->addFilter(new Zend_Filter_StripTags());        


        $this->addElement('button', 'add', array(
            'type'        => 'submit',            
            'label'       => 'Enregistrer',
            'class'       => 'btn btn-success'
        ));
    }
}