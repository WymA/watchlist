<?php

class View {

    function __construct() 
    {
        //TODO This is a view
    }

    public function render($name)
    {
        require 'views/' . $name . '.php';    
    }

}