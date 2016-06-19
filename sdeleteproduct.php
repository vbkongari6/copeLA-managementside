<?php
session_start();
require "validatesalesmanager.php";
$errrmsg = "";
$var16 = $_POST['submit16'];

if($var16 == 'Back'){
    require "smgrhp.php";
    exit;}
elseif($var16 == 'Logout'){
    session_destroy();
    require "login.php";
    exit;}
    
if(!empty($_POST['delete'])) {
    foreach($_POST['delete'] as $producid) {
        $sql = "delete from product where productId = '".$producid."';";
        $sql1 = "delete from specialsales where productId = '".$producid."';";
        $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
        if(!$con){die('Could not be able to connect to  mysql');}
        mysql_select_db('hwdb', $con);
        $res = mysql_query($sql);
        $res1 = mysql_query($sql1);
    }
}
else{$errrmsg = "--*You should select atleast one user to delete.--";}

if (strlen($errrmsg) > 0) {
    require "sreqdeleteproduct.php";
    echo '<div align="center"><label class="erradd">'.$errrmsg.'</label></div>';
}
elseif (!$res) {    
    require "sreqdeleteproduct.php";
}
elseif ($res){
    require "sreqdeleteproduct.php";
    echo '<div align="center" style="padding-top:10px"><label class="successaddlabel">Successfully Deleted the Product and its attached special sale</label></div>';
}
?>
