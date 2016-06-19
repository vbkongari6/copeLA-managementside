<?php
session_start();
require "validateadmin.php";

$var4 = $_POST['submit4'];
if($var4 == 'Back'){
    require "adminhp.php";
    exit;
}
elseif($var4 == 'Logout'){
    session_destroy();
    require "login.php";
    exit;
}
$errrmsg = "";
if(!empty($_POST['delete'])) {
    foreach($_POST['delete'] as $usrname) {
        $sql = "delete from users where username = '".$usrname."';";
        $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
        if(!$con){die('Could not be able to connect to  mysql');}
        mysql_select_db('hwdb', $con);
        $res = mysql_query($sql);
    }
}
else{$errrmsg = "--*You should select atleast one user to delete.--";}

if (strlen($errrmsg) > 0) {
    require "reqdelemp.php";
    echo '<br><div align="center" style="padding-top:10px"><label class="erradd">'.$errrmsg.'</label></div>';
}
elseif (!$res) {    
    require "reqdelemp.php";
}
elseif ($res){
    require "reqdelemp.php";
    echo '<div align="center" style="padding-top:10px" ><label class="successaddlabel">Successfully Deleted the Employee</label></div>';
}
?>
