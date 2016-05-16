<?php

class Error extends Controller {

    function __construct() {
        parent::__construct(); 
    }
    
    function index() {
        $this->view->title = '404 Error';
<<<<<<< HEAD
        $this->view->msg = 'This page doesnt exist';
        
        $this->view->render('header');
        $this->view->render('error/index');
        $this->view->render('footer');
    }

    function noPermission(){

        $this->view->title = '403 Forbidden';
        $this->view->msg = 'You don\'t have the permission to access this page';
        
        $this->view->render('header');	
=======
        $this->view->msg = $_GET['url'].'This page doesnt exist';
        
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0
        $this->view->render('error/index');
        $this->view->render('footer');
    }

}