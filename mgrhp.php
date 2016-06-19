<?php
    session_start();
    require "validatemanager.php";

    $var = $_POST['submit'];

    if($var == 'Employee Report'){
        require 'memployeereport.php';
    }
    elseif($var == 'Products Report'){
        require 'mproductsreport.php';
    }
    elseif($var == 'Special Sales Report'){
        require 'msalesreport.php';
    }
    elseif($var == 'Purchases Report'){
        require 'mordersreport.php';
    }
    elseif($var == 'Back'){
        require "login.php";
        exit;}
    elseif($var == 'Logout'){
        session_destroy();
        require "login.php";
        exit;}
    else{
        require 'mgrhp.html';
    }
?>