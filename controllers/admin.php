<?php

class Admin extends Controller {

    function __construct() {

        parent::__construct();
        Auth::handleLogin();
        Auth::handleAuth(array('admin')) ;
        $this->view->js = array("admin/js/admin.js");

    }
    
    function index() 
    {

        $this->view->render('header');
        $this->view->render('admin/index');
        $this->view->render('footer');

    }

    function changeEmail(){

	$this->model->changeEmail() ;
    }
 
}
