<?php


class Auth
{
    
    public static function handleLogin()
    {
        @session_start();
        $logged = $_SESSION['username'];
        if ($logged == "") {
            session_destroy();
            header('location: ../login');
            exit;
        }
    }
    
}