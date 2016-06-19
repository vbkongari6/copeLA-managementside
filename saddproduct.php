<?php
session_start();
require "validatesalesmanager.php";
$selectedcategoryid = $_POST['selectcategoryid'];
$productname = $_POST['addproductname'];
$productdescription = $_POST['addproductdescription'];
$productimage = $_POST['addproductimage'];
$productimage2 = $_POST['addproductimage2'];
$productimage3 = $_POST['addproductimage3'];
$productimage4 = $_POST['addproductimage4'];
$productprice = $_POST['addproductprice'];
$var7 = $_POST['submit7'];

if($var7 == 'Back'){
    require "smgrhp.php";
    exit;}
elseif($var7 == 'Logout'){
    session_destroy();
    require "login.php";
    exit;}

$errormsg = "";
if ( strlen(trim($selectedcategoryid)) == 0 || strlen(trim($productname)) == 0 || strlen(trim($productdescription)) == 0 || strlen(trim($productimage)) == 0 || strlen(trim($productimage2)) == 0 || strlen(trim($productimage3)) == 0 || strlen(trim($productimage4)) == 0 || strlen(trim($productprice)) == 0) { 
    $errormsg = "Sorry, all fields are mandatory! Try again :)"; 
}
if ( strlen(trim($selectedcategoryid)) == 0 && strlen(trim($productname)) == 0 && strlen(trim($productdescription)) == 0 && strlen(trim($productimage)) == 0 && strlen(trim($productimage2)) == 0 && strlen(trim($productimage3)) == 0 && strlen(trim($productimage4)) == 0 && strlen(trim($productprice)) == 0) {
    $errormsg = "";
}
if ( strlen(trim($selectedcategoryid)) > 0 && strlen(trim($productname)) > 0 && strlen(trim($productdescription)) > 0  && strlen($productimage) > 0 && strlen($productimage2) > 0 && strlen($productimage3) > 0 && strlen($productimage4) > 0 && strlen(trim($productprice)) > 0) {
    $sql1 = "select productName from product";
    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){ echo "no con";
        die('Could not be able to connect to  mysql'); }
    mysql_select_db('hwdb', $con);
    $res1 = mysql_query($sql1);
    if ((mysql_num_rows($res1))!=0){
        while ($rows = mysql_fetch_assoc($res1)){
                $resultlist[] = $rows; }
        foreach ($resultlist as $rows) {
            if ($rows['productName']==trim($productname)) {
                $err = "";
                $errormsg = "Specified product name was already taken. Try different name.";
                break;} 
            else{ $err = "no err"; }
        }
    }
    if ($err == "no err" || mysql_num_rows($res1) == 0 ) {
        $sql = "insert into product values (NULL, '".$productname."', '".$productdescription."', '".$productimage."', '".$productimage2."', '".$productimage3."', '".$productimage4."', '".$selectedcategoryid."', '".$productprice."')";
        $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
        if(!$con){die('Could not be able to connect to  mysql');}
        mysql_select_db('hwdb', $con);
        $res = mysql_query($sql);
    }
}
if (strlen($errormsg) > 0) {
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
    echo '<label class="erradd">'.$errormsg.'</label></span></table></fieldset></div></form></body></html>';    
}
elseif (!$res) {
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
    echo '</span></table></fieldset></div></form></body></html>';
}
elseif ($res){
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
    echo '<label class="successaddlabel">Successfully Added the Product</label>';
    echo '</span></table></fieldset></div></form></body></html>';
}
?>
