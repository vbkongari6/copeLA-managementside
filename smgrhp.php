<?php
session_start();
require "validatesalesmanager.php";
$var = $_POST['submit'];
$var5 = $_POST['submit5'];

if($var5 == 'Back'){
    require "login.php";
    exit;
}
elseif($var5 == 'Logout'){
    session_destroy();
    require "login.php";
    exit;
}

if($var == 'Add Product Category'){
    require 'saddproductcategory.html';
}
elseif($var == 'Add Product'){	
    $sql = "select categoryId from productcategory";
    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){die('Could not be able to connect to  mysql');}
    mysql_select_db('hwdb', $con);
    $res = mysql_query($sql);
    while ($rows = mysql_fetch_assoc($res)){
            $resultlist[] = $rows;
    }
    require 'saddproduct.html';
    foreach ($resultlist as $id) {
    	echo "<option value=".$id['categoryId'].">".$id['categoryId']."</option>";
    }
    require "saddproduct2.html";
}
elseif($var == 'Add Special Sales'){
    $sql = "select productId from product";
    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){die('Could not be able to connect to  mysql');}
    mysql_select_db('hwdb', $con);
    $res = mysql_query($sql);
    while ($rows = mysql_fetch_assoc($res)){
            $resultlist[] = $rows;
    }
    require 'saddspecialsales.html';
    foreach ($resultlist as $id) {
    	echo "<option value=".$id['productId'].">".$id['productId']."</option>";
    }
    require "saddspecialsales2.html";
}
elseif($var == 'Edit Product Category'){
    require "sreqeditproductcategory.php";
}
elseif($var == 'Edit Product'){
    require "sreqeditproduct.php";
}
elseif($var == 'Edit Special Sales'){
    require "sreqeditspecialsales.php";
}
elseif($var == 'Delete Product Category'){
    require "sreqdeleteproductcategory.php";
}
elseif($var == 'Delete Product'){
    require "sreqdeleteproduct.php";
}
elseif($var == 'Delete Special Sales'){
    require "sreqdeletespecialsales.php";
}
else{
    //$username = "";
    require 'smgrhp.html';
}
?>
