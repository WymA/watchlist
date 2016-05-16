<?php


class Auth
{
    
    public static function handleLogin(){

        @session_start();
        $logged = $_SESSION['username'];
        if ($logged == "") {
            session_destroy();
            header('location: ../login');
            exit;
        }
    }

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
    
}