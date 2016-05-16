<?php

class Login extends Controller {

    function __construct() {

        parent::__construct();    
        $this->view->js = array("login/js/user.js");
    }
    
    function index() {    

        $this->view->title = 'Login';
        
        $this->view->render('header');
        $this->view->render('login/index');
        $this->view->render('footer');
    }
<<<<<<< HEAD

    function resetPage(){

        $this->view->render('header') ;
        $this->view->render('login/reset') ;
        $this->view->render('footer') ;
    }
=======
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0
    
    function run() {
        
        $this->model->run() ;
    }

    function register(){

        $this->model->register() ;
    }

    function activateAcct(){

        $res = $this->model->activateAcct() ;

        $this->view->render('header') ;
        $this->view->msg = $res['msg'] ;

        $this->view->render('home/index') ;
<<<<<<< HEAD
	
=======
 
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0
        $this->view->render('footer') ;
    }

    function forgetPassword() {

        $this->model->forgetPassword() ;
    }
    

<<<<<<< HEAD
}
=======
    /* function approveForget(){ */

    /*     if ( isset($_GET['username']) ){ */


    /*     }else{ */

    /*     } */
    /* } */


}
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0
