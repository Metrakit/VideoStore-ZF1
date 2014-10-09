<?php
/**
 * 
 * @author Jordane
 * Test d'un Plugin
 * /!\ Il faut absolutement que la classe commence par "Plugin_*" pour l'autoloading
 *
 */
class Plugin_Test extends Zend_Controller_Plugin_Abstract
{
    /**
     * Fonction éxecutée après le routage !
     * Il faut mettre le typage de l'objet dans la fonction en paramètre
     * @see Zend_Controller_Plugin_Abstract::routeShutdown()
     */
    public function routeShutdown(Zend_Controller_Request_Abstract $request)
    {
        if ($request->getActionName() == 'index') {
            //echo '<p>Action index détectée</p>';
        }
    }
}