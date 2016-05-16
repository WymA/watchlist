<?php


class Auth
{
    
<<<<<<< HEAD
    public static function handleLogin(){

=======
    public static function handleLogin()
    {
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0
        @session_start();
        $logged = $_SESSION['username'];
        if ($logged == "") {
            session_destroy();
            header('location: ../login');
            exit;
        }
    }
<<<<<<< HEAD

    public static function handleAuth( $required ){

        @session_start();
        $role = $_SESSION['role'];

        foreach ( $required as $req )
            if ($role != $req) 
                continue ;
            else 
                return true ;

        header('location: '. URL .'error/noPermission');
    }
=======
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0
    
}