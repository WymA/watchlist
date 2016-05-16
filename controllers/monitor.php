<?php

class Monitor extends Controller {


    function __construct() {

	@session_start() ;
        parent::__construct();
        $this->view->js = array("monitor/js/monitor.js");

    }
    
    function index() {

        $this->view->render('header');
        $this->view->render('monitor/index');
        $this->view->render('footer');

    }

    function getChecking(){

	$this->model->getChecking() ;
    }

    function getMessage(){

	$this->model->getMessage() ;
    }
    
    public function getDetails(){

	$this->model->getDetails() ;
    }

    function check(){
	
	$this->model->check() ;
    }

    function ignore(){
	$this->model->ignore() ;
    }

    function deleteItem(){

        $this->model->deleteItem() ;
    }

}
