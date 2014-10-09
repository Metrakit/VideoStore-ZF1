<?php

class ErrorController extends Zend_Controller_Action
{
    public function errorAction()
    {
        $errorHandler = $this->_getParam('error_handler');
        $exception = $errorHandler->exception;
        if ($exception->getcode() == 404) {
            $this->getResponse()->setHttpResponseCode(404);
        }
        $this->view->message = $exception->getMessage();
        $this->view->code = $exception->getCode();
    }
}