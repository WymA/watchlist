<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Department of Computing, The Hong Kong Polytechnic
University</title>


<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/themes/sunny/jquery-ui.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script
src="https://maxcdn.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script
src="<?php echo URL;?>public/js/validation.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/pure-min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/base-min.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/modal.css" />

<meta name="viewport" content="width=device-width, initial-scale=1" />


<!--[if lte IE 8]>
<link rel="stylesheet" href="<?php echo URL;?>public/css/pricing-old-ie.css">
<![endif]-->
<!--[if gt IE 8]><!-->
<link rel="stylesheet" href="<?php echo URL;?>public/css/pricing.css">
<!--<![endif]-->



<?php 
if (isset($this->js)) 
{
foreach ($this->js as $js)
{
echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';
}
}
Session::init(); 
?>


</head>


<body>

<script>
$(function(){

var pathname = window.location.pathname;
var res = pathname.split("/");
$("#"+res[2]+"-link").addClass("pure-menu-selected") ;


});
</script>


<div class="pure-menu pure-menu-open pure-menu-horizontal">

  <ul>
    <li id="index-link"><a href="#">Home</a></li>
    <?php if(Session::get('role') != 'passport' ){ ?>
    <li id="dashboard-link">
    <a href="<?php echo URL;?>dashboard/index">Dashboard</a>
    </li>
    <li id="upload-link" ><a href="<?php echo
    URL;?>upload/index">Upload</a></li>
    <?php } ?>
    <li id="monitor-link" ><a href="<?php echo URL;?>monitor/index">Monitor</a></li>
    <li id="contact-link"><a href="#check-contact" data-toggle="modal">Contact</a></li>
  </ul>
</div>



<div align="center">
  <p>
  <img src="<?php echo URL;?>public/images/header.png"
  alt="Automated Watchlist Identification System" width="963" height="75" />
  </p>
</div>


