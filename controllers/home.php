<?php

class Home extends Controller {

    function __construct() {

        parent::__construct();
        Auth::handleLogin();
        Auth::handleAuth(array('admin', 'watchlist')) ;
    }
    
    function index() 
    {

        $this->view->render('header');
        $this->view->render('home/index');
        $this->view->render('footer');

    }
    
    function logout()
    {

        Session::destroy();
        header('location: ' . URL .  'login');
        exit;
    }
 
}