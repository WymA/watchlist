<?php

class Login_Model extends Model{

    protected $adminEmail = "cshjin@comp.polyu.edu.hk" ;

    public function __construct() {

        parent::__construct();
    }

    public function run(){


        $sth = $this->db->prepare("SELECT * FROM USER WHERE 
                username = :username AND password = :password");

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
            Session::set('email', $data['email']);

            if ($data['role'] == 'passport')
                $url = "monitor/index";
            else
                $url = "dashboard/index";

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
            " VALUE( :username, :password, :email, false, :role )") ;

            if ( $_POST['occupation'] == "Watch List Officer" )
                $role = "watchlist";
            else if ($_POST['occupation'] == "Ceckport Officer")
                $role = "passport" ;

            $reg->execute( array(
                ':username' => $_POST['username'],
                ':password' => Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY),
                ':email'    => $_POST['email'],
                ':role'     => $role
            )) ;

            $to = $this->adminEmail;
	 
            $subject = "Account Registration For ".$role." Officer ";

            $message = "Dear Administrator,\n\t";
            $message .= "\n\t";
            $message .= "Below is the new account application.\n\t";
            $message .= "\n\t";
            $message .= "User Name: ".$_POST['username']."\n\t";
            $message .= "User Email: ".$_POST['email']."\n\t";
            $message .= "\n\t";
            $message .= "Please click below link to activate the New ".$role." Officer Account:\n\t";

            $message .= URL."login/activateAcct?username=".$_POST['username'];
            $message .= "\n\t\nBest Regards";

	 
            $from = "csajaykr@comp.polyu.edu.hk";
            $headers = "From:" . $from;

            mail($to,$subject,$message,$headers);

            $res = array( 'status' => true, 'msg' => "Please wait for our amdin to activate your account" ) ;
            echo $res ;

        }catch( Exception $e ){

            $responce = array( 'status' => false, 'msg' => $e->getMessage() ) ;
            echo $responce ;
        }

    }

    public function activateAcct(){
        
        
        try {

            $username = $_GET["username"] ;

            $res = $this->db->select("SELECT * FROM USER WHERE username=:username ",
            array(
                ':username' => $username
            ));
            
            if ( $res[0]['activate'] == true ){

                $res = array( 'status' => true, 'msg' => "The account has already been activated!" ) ;
                return $res ;
            }
                
        
            $this->db->update("USER", array(
                'activate' => true
            ),
            "username = '$username' ") ;


            $to = $res[0]['email'];
	 
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