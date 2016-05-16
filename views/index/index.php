<<<<<<< HEAD
<?php 

@session_start() ;
if (Session::get('username') == "" ) 
    header("Location: login") ;
else
    header("Location: monitor/index") ;

?>
=======
<h1>Index</h1>

<p>
This is the main page welcome!
</p>
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0
