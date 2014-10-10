<?php

class Form_Actor_Add extends Zend_Form
{
    /**
     * Initialisation d'un formulaire
     * @see Zend_Form::init()
     */
    public function init()
    {
        $this->addElement('text', 'firstName', array(
            'label'       => 'Prénom',
            'placeholder' => 'ex: Chuck',
            //'description' => 'Prénom de moins de 45 caractères',
            'required'    => true,
            'class'       => 'form-control',
        ));        
        $this->getElement('firstName')
             ->addValidator(
                 new Zend_Validate_StringLength(
                     array('max' => 45)
                 )
             )
            ->addValidator(new Zend_Validate_Alpha())
            ->addFilter(new Zend_Filter_StripTags());
        
        $this->addElement('text', 'lastName', array(
            'label'       => 'Nom',
            'placeholder' => 'ex: Norris',
            //'description' => 'Nom de moins de 45 caractères',
            'required'    => true,
            'class'       => 'form-control',
        ));
        $this->getElement('lastName')
        ->addValidator(
            new Zend_Validate_StringLength(
                array('max' => 45)
            )
        )
        ->addValidator(new Zend_Validate_Alpha())
        ->addFilter(new Zend_Filter_StripTags());        
        
        $this->addElement('button', 'add', array(
            'type'        => 'submit',            
            'label'       => 'Enregistrer',
            'class'       => 'btn btn-success',
        ));
    }
}