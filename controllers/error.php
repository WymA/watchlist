<?php

class Error extends Controller {

    function __construct() {
        parent::__construct(); 
    }
    
    function index() {
        $this->view->title = '404 Error';
        $this->view->msg = 'This page doesnt exist';
        
        $this->view->render('header');
        $this->view->render('error/index');
        $this->view->render('footer');
    }

    function noPermission(){

        $this->view->title = '403 Forbidden';
        $this->view->msg = 'You don\'t have the permission to access this page';
        
        $this->view->render('header');	
        $this->view->render('error/index');
        $this->view->render('footer');
    }

}