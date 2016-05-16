<?php

class Monitor extends Controller {

<<<<<<< HEAD

    function __construct() {

	@session_start() ;
=======
    function __construct() {

>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0
        parent::__construct();
        $this->view->js = array("monitor/js/monitor.js");

    }
    
    function index() {

        $this->view->render('header');
        $this->view->render('monitor/index');
        $this->view->render('footer');

    }

<<<<<<< HEAD
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
=======
    function update(){

        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');

        $time = date('r');
        echo "data: The server time is: {$time}\n\n";
        flush();
    }
    

}
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0
