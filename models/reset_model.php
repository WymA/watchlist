<?php

class Reset_Model extends Model {


    public function __construct() {

	@session_start() ; 
	parent::__construct(); 
    }

    public function resetPassword(){

	try{

            $reg = $this->db->prepare("UPDATE `USER` SET password=:password WHERE username=:username ") ;

            $res = $reg->execute( array(
                ':username' => Session::get('username'),
                ':password' => Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)
            )) ;
	    
	    if ( $res )
		$output = array('status' => true, 'msg' => 'Reset Successfully.') ;
	    else
		$output = array('status' => false, 'msg' => 'You dont have such authority') ;


	}catch( Exception $e ){

	    $output = array('status' => false, 'msg' => $e->getMessage() ) ;
	}

	echo json_encode($output) ;

    }

    public function reset( $username, $password ){

	try{

	    $reset = $this->db->prepare("SELECT * FROM `USER` WHERE username=:username AND password=:password ") ;
	    $reset->execute(array(
		':username' => $username,
		':password' => $password
	    )) ;
	    
	    if ( $reset->rowCount() != 0 ) {

		Session::set('username', $username) ;
		$output = array('status' => true ) ;
	    }else{

		$output = array('status' => false, 'msg' => 'You dont have such authority to do this' ) ;
	    }
	    
	    

	}catch(Exception $e ){

	    $output = array('status' => false, 'msg' => $e->getMessage() ) ;
	}

	return $output ;
    }


}

