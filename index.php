<?php

require 'config.php';
require 'util/Auth.php';

<<<<<<< HEAD

=======
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0
function __autoload($class) {
    require LIBS . $class .".php";
}

date_default_timezone_set("Asia/Shanghai"); 

// Load the Bootstrap!
$bootstrap = new Bootstrap();

// Optional Path Settings
//$bootstrap->setControllerPath();
//$bootstrap->setModelPath();
//$bootstrap->setDefaultFile();
//$bootstrap->setErrorFile();

<<<<<<< HEAD
$bootstrap->init();
=======
$bootstrap->init();
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0
