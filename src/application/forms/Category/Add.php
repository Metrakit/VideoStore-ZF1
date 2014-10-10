<?php

class Form_Category_Add extends Zend_Form
{
    /**
     * Initialisation d'un formulaire
     * @see Zend_Form::init()
     */
    public function init()
    {
        $this->addElement('text', 'name', array(
            'label'       => 'Nom',
            'placeholder' => 'ex: horreur',
            'description' => 'Nom de moins de 25 caractères',
            'required'    => true,
            'class'       => 'form-control',
        ));        
        $this->getElement('name')
             ->addValidator(
                 new Zend_Validate_StringLength(
                     array('max' => 25)
                 )
             )
            ->addValidator(new Zend_Validate_Alnum())
            ->addFilter(new Zend_Filter_StripTags());
        
        $this->addElement('button', 'add', array(
            'type'        => 'submit',            
            'label'       => 'Enregistrer',
            'class'       => 'btn btn-success'
        ));
    }
}