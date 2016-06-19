<?php
session_start();
require "validatesalesmanager.php";
$errrmsg = "";
$var15 = $_POST['submit15'];

if($var15 == 'Back'){
    require "smgrhp.php";
    exit;}
elseif($var15 == 'Logout'){
    session_destroy();
    require "login.php";
    exit;}

if(!empty($_POST['delete'])) {
    foreach($_POST['delete'] as $categid) {
        $sql = "delete from productcategory where categoryId = '".$categid."';";
        $sql1 = "delete from product where productCategoryId ='".$categid."';";
        $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
        if(!$con){die('Could not be able to connect to  mysql');}
        mysql_select_db('hwdb', $con);
        $res = mysql_query($sql);
        $res1 = mysql_query($sql1);
    }
}
else{$errrmsg = "--*You should select atleast one product category in order to delete.--";}

if (strlen($errrmsg) > 0) {
    require "sreqdeleteproductcategory.php";
    echo '<div align="center"><label class="erradd">'.$errrmsg.'</label></div>';
}
elseif (!$res) {    
    require "sreqdeleteproductcategory.php";
}
elseif ($res){
    require "sreqdeleteproductcategory.php";
    echo '<div align="center" style="padding-top:10px"><label class="successaddlabel">Successfully Deleted the Product Category and its products</label></div>';
}
?>
