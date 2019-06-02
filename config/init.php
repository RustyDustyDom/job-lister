<?php 
//Config php

require_once 'config.php';

// Autoload classes

 function __autoload($class_name){
    require_once 'lib/' . $class_name . '.php';
 }

