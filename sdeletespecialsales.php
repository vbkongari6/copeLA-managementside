<?php
session_start();
require "validatesalesmanager.php";
$errrmsg = "";
$var17 = $_POST['submit17'];

if($var17 == 'Back'){
    require "smgrhp.php";
    exit;}
elseif($var17 == 'Logout'){
    session_destroy();
    require "login.php";
    exit;}

if(!empty($_POST['delete'])) {
    foreach($_POST['delete'] as $salid) {
        $sql = "delete from specialsales where saleId = '".$salid."';";
        $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
        if(!$con){die('Could not be able to connect to  mysql');}
        mysql_select_db('hwdb', $con);
        $res = mysql_query($sql);
    }
}
else{$errrmsg = "--*You should select atleast one sale to delete.--";}

if (strlen($errrmsg) > 0) {
    require "sreqdeletespecialsales.php";
    echo '<div align="center"><label class="erradd">'.$errrmsg.'</label></div>';
}
elseif (!$res) {    
    require "sreqdeletespecialsales.php";
}
elseif ($res){
    require "sreqdeletespecialsales.php";
    echo '<div align="center" style="padding-top:10px"><label class="successaddlabel">Successfully Deleted the Sale</label></div>';
}
?>
