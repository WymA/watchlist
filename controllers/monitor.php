<?php

class Monitor extends Controller {

    function __construct() {

        parent::__construct();
        $this->view->js = array("monitor/js/monitor.js");

    }
    
    function index() {

        $this->view->render('header');
        $this->view->render('monitor/index');
        $this->view->render('footer');

    }

    function update(){

        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');

        $time = date('r');
        echo "data: The server time is: {$time}\n\n";
        flush();
    }
    

}