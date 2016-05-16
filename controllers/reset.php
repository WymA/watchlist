<?php

class Reset extends Controller {

    function __construct() {

        parent::__construct();
    }

    
    function index() {


        $this->view->render('header');
        $this->view->render('reset/index');
        $this->view->render('footer');

    }

    function reset(){


	$out = $this->model->reset( $_GET['username'], $_GET['reset'] ) ;

	if ($out['status'] == true ){

	    $this->index() ;
	}else{

	    $this->view->render('header') ;
	    echo "Permission Denied!";
	    $this->view->render('footer') ;
	}
    }

    function resetPassword(){

	$this->model->resetPassword() ;

    }

}
