<?php 
//Session start
session_start();

//Config php
require_once 'config.php';

// Helper file include
require_once 'helpers/system_helper.php';

// Autoload classes

 function __autoload($class_name){
    require_once 'lib/' . $class_name . '.php';
 }

