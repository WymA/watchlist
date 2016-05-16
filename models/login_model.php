<?php

class Login_Model extends Model{

<<<<<<< HEAD
    protected $adminEmail ;
=======
    protected $adminEmail = "cshjin@comp.polyu.edu.hk" ;
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0

    public function __construct() {

        parent::__construct();
<<<<<<< HEAD

        try{

            $email = $this->db->prepare("SELECT * FROM `ADMIN` WHERE `state` = 1") ;
            $email->execute() ;
            $res = $email->fetch() ;

            $this->adminEmail = $res['email'] ;

        }catch(PDOException $e ){

            echo $e->getMessage() ;
        }

=======
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0
    }

    public function run(){


<<<<<<< HEAD
        $sth = $this->db->prepare("SELECT * FROM USER WHERE username = :username AND password = :password");
=======
        $sth = $this->db->prepare("SELECT * FROM USER WHERE 
                username = :username AND password = :password");
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0

        $sth->execute(array(

            ':username' => $_POST['username'],
            ':password' => Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)
        ));

        
        $data = $sth->fetch();
        
        $count =  $sth->rowCount();

        if ( $count == 1 ) {

            // set the session
            Session::init();
            Session::set('role', $data['role']);
            Session::set('username', $data['username']);
<<<<<<< HEAD
            Session::set('email', $data['email']);   
 
            $url = "home/index";
=======
            Session::set('email', $data['email']);

            if ($data['role'] == 'passport')
                $url = "monitor/index";
            else
                $url = "dashboard/index";
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0

            $res = array('status' => true, 'msg' => "login succeed", 'url' => $url) ;


            if ( $data['activate'] == false )
                $res = array('status' => false, 'msg' => "Your account has not been activated yet!") ;

        } else {

            $res = array('status' => false, 'msg' => "Invalide username or password..") ;
        }

        echo json_encode($res);
        
    }
    
    public function register(){

        try {

            $reg = $this->db->prepare("INSERT INTO USER ( `username`, `password`, `email`, `activate`, `role` )".
<<<<<<< HEAD
				      " VALUE( :username, :password, :email, false, :role )") ;

            if ( $_POST['occupation'] == "Watch List Officer" )
                $role = "watchlist";
            else if ($_POST['occupation'] == "Passport Officer")
=======
            " VALUE( :username, :password, :email, false, :role )") ;

            if ( $_POST['occupation'] == "Watch List Officer" )
                $role = "watchlist";
            else if ($_POST['occupation'] == "Ceckport Officer")
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0
                $role = "passport" ;

            $reg->execute( array(
                ':username' => $_POST['username'],
                ':password' => Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY),
                ':email'    => $_POST['email'],
                ':role'     => $role
            )) ;

            $to = $this->adminEmail;
<<<<<<< HEAD
	    
=======
	 
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0
            $subject = "Account Registration For ".$role." Officer ";

            $message = "Dear Administrator,\n\t";
            $message .= "\n\t";
<<<<<<< HEAD
            $message .= "Below is a new account application.\n\t";
            $message .= "\n\t";
            $message .= "User Name: ".$_POST['username']."\n\t";
            $message .= "User Email: ".$_POST['email']."\n\t";
            $message .= "User Role: ".$role."\n\t";
=======
            $message .= "Below is the new account application.\n\t";
            $message .= "\n\t";
            $message .= "User Name: ".$_POST['username']."\n\t";
            $message .= "User Email: ".$_POST['email']."\n\t";
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0
            $message .= "\n\t";
            $message .= "Please click below link to activate the New ".$role." Officer Account:\n\t";

            $message .= URL."login/activateAcct?username=".$_POST['username'];
            $message .= "\n\t\nBest Regards";

<<<<<<< HEAD
	    
=======
	 
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0
            $from = "csajaykr@comp.polyu.edu.hk";
            $headers = "From:" . $from;

            mail($to,$subject,$message,$headers);

<<<<<<< HEAD
            $res = array( 'status' => true, 
                'msg' => "Please wait for our amdin to activate your account" ) ;

            echo json_encode($res) ;
=======
            $res = array( 'status' => true, 'msg' => "Please wait for our amdin to activate your account" ) ;
            echo $res ;
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0

        }catch( Exception $e ){

            $responce = array( 'status' => false, 'msg' => $e->getMessage() ) ;
<<<<<<< HEAD
            echo json_encode( $responce ) ;
=======
            echo $responce ;
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0
        }

    }

    public function activateAcct(){
        
        
        try {

            $username = $_GET["username"] ;

            $res = $this->db->select("SELECT * FROM USER WHERE username=:username ",
<<<<<<< HEAD
				     array(
					 ':username' => $username
				     ));
=======
            array(
                ':username' => $username
            ));
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0
            
            if ( $res[0]['activate'] == true ){

                $res = array( 'status' => true, 'msg' => "The account has already been activated!" ) ;
                return $res ;
            }
                
<<<<<<< HEAD
    	    $update = $this->db->prepare("UPDATE `USER` SET `activate`=true WHERE username=:username") ;
                
                $update->execute(
    		array(
    		    ":username" =>$username
    		));


            $to = $res[0]['email'];
	    
=======
        
            $this->db->update("USER", array(
                'activate' => true
            ),
            "username = '$username' ") ;


            $to = $res[0]['email'];
	 
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0
            $subject = "Your Account has been activated successfully";


            $message = "Dear Officer,\n\t";
            $message .= "\n\t";
            $message .= "Below is your new account.\n\t";
            $message .= "\n\t";
            $message .= "User Name: ".$res[0]['username']."\n\t";
            $message .= "User Email: ".$res[0]['email']."\n\t";
            $message .= "Has been activated.";
            $message .= "\n\n";
            $message .= "Best Regards";

<<<<<<< HEAD
	    
=======
	 
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0
            $from = "csajaykr@comp.polyu.edu.hk";
            $headers = "From:" . $from;

            mail($to,$subject,$message,$headers);
            $res = array( 'status' => true, 'msg' => "Activation Succeed!" ) ;
            return $res ;

        }catch( Exception $e ){

            $responce = array( 'status' => false, 'msg' => $e->getMessage() ) ;
            return $responce ;
        }
        
        
    }


<<<<<<< HEAD

    function forgetPassword(){ 

        try {

            $res = $this->db->prepare("SELECT * FROM USER WHERE email=:email ") ;
    	    $res->execute( array(
    		':email' => $_POST['fog-email']
    	    ));

    	    $data = $res->fetch() ;
    	    
    	    if ( $res->rowCount() != 0 ){

    		$to = $data['email'];
    		
    		$subject = "Your Password Resetting.";

    		$message = "Dear Officer,\n\t";
    		$message .= "\n\t";
    		$message .= "Please check the below link to reset your password.\n\t";
    		$message .= "\n\t";
    		$message .= URL."reset/reset?username=".$data['username']."&reset=".$data['password'];
    		$message .= "\n\n";
    		$message .= "Best Regards";

    		
    		$from = "csajaykr@comp.polyu.edu.hk";
    		$headers = "From:" . $from;

    		mail($to,$subject,$message,$headers);
    		$res = array( 'status' => true, 'msg' => "You should receive a email soon for you to reset your password!" ) ;

    	    }
                echo json_encode( $res ) ;

            }catch( Exception $e ){

                $responce = array( 'status' => false, 'msg' => $e->getMessage() ) ;
    	    echo json_encode($responce) ;
        }

	
    } 

    
}
=======
    /* public function forgetPassword(){ */

    /*     try { */

    /*         if ( isset( $_POST['email']) ){ */
                
    /*             $res = $this->db->select("SELECT * FROM USER WHERE email=:email ", */
    /*             array( */
    /*                 ':email' => $_POST['email'] */
    /*             )); */

    /*         } */
            

    /*         $to = $adminEmail ; */
	 
    /*         $subject = "A/An ".$res[0]['role']." Officer Forget-password Application"; */

    /*         $message = "Dear Administrator,\n\t"; */
    /*         $message .= "\n\t"; */
    /*         $message .= "Below officer:\n\t"; */
    /*         $message .= "\n\t"; */
    /*         $message .= "User Name: ".$res[0]['username']."\n\t"; */
    /*         $message .= "User Email: ".$res[0]['email']."\n\t"; */
    /*         $message .= "Forgot his/her password and applied for a modification.\n\t"; */
    /*         $message .= "Please check this link to approve this application: \n\t" ; */
    /*         $message .= URL."login/approveForget?username=".$res[0]['username'] ; */
    /*         $message .= "\n\n"; */
    /*         $message .= "Best Regards"; */

	 
    /*         $from = "csajaykr@comp.polyu.edu.hk"; */
    /*         $headers = "From:" . $from; */

    /*         mail($to,$subject,$message,$headers); */
    /*         $res = array( 'status' => true, 'msg' => "Activation Succeed!" ) ; */
    /*         return $res ; */

    /*     }catch( Exception $e ){ */

    /*         $responce = array( 'status' => false, 'msg' => $e->getMessage() ) ; */
    /*         return $responce ; */
    /*     } */

        
    /* } */
    
}
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0
