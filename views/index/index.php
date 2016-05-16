<?php 

@session_start() ;
if (Session::get('username') == "" ) 
    header("Location: login") ;
else
    header("Location: monitor/index") ;

?>
