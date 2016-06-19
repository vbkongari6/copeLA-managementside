<?php
session_start();
require "validateadmin.php";
$var = $_POST['submit'];
if($var == 'Add Employee'){
    require 'addemployee.html';
    echo '</span></table></fieldset></div></form></body></html>';
}
elseif($var == 'Edit Employee'){
    require "reqeditemp.php";
}
elseif($var == 'Delete Employee'){
    require "reqdelemp.php";
}
elseif($var == 'Back'){
    require "login.php";
    exit;
}
elseif($var == 'Logout'){
	session_destroy();
    require "login.php";
    exit;
}
else{
    require 'adminhp.html';
}
?>