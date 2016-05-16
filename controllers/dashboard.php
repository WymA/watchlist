<?php

class Dashboard extends Controller {

    function __construct() {

        parent::__construct();
        Auth::handleLogin();
<<<<<<< HEAD
        Auth::handleAuth(array('admin', 'watchlist')) ;
=======
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0
        $this->view->js = array("dashboard/js/dashboard.js");

    }
    
    function index() 
    {

        $this->view->render('header');
        $this->view->render('dashboard/index');
        $this->view->render('footer');

    }
    
    function logout()
    {

        Session::destroy();
        header('location: ' . URL .  'login');
        exit;
    }

    function getAllSuspects(){

        $this->model->getAllSuspects() ;
    }
    
    function search(){

        $this->model->search() ;
    }

    function getDetails(){

        $this->model->getDetails() ;
    }

    function deleteImg(){

        $this->model->deleteImg() ;
    }
 
}