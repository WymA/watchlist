<?php

class Dashboard extends Controller {

    function __construct() {

        parent::__construct();
        Auth::handleLogin();
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