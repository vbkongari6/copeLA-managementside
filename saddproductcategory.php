<?php
session_start();
require "validatesalesmanager.php";
$categoryname = $_POST['addcategoryname'];
$categorydescription = $_POST['addcategorydescription'];
$categoryimage = $_POST['addcategoryimage'];
$errormsg = "";
$var6 = $_POST['submit6'];

if($var6 == 'Back'){
    require "smgrhp.php";
    exit;}
elseif($var6 == 'Logout'){
    session_destroy();
    require "login.php";
    exit;}

if (strlen(trim($categoryname)) == 0 || strlen(trim($categorydescription)) == 0 || strlen(trim($categoryimage)) == 0) { 
    $errormsg = "Sorry, All input fields are must! Try again :)"; 
}
if (strlen(trim($categoryname)) == 0 && strlen(trim($categorydescription)) == 0 && strlen(trim($categoryimage)) == 0) {
    $errormsg = "";
}
if (strlen(trim($categoryname)) > 0 && strlen(trim($categorydescription)) > 0 && strlen(trim($categoryimage)) > 0) {
    $sql1 = "select categoryName from productcategory";
    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){ echo "no con";
        die('Could not be able to connect to  mysql'); }
    mysql_select_db('hwdb', $con);
    $res1 = mysql_query($sql1);
    if ((mysql_num_rows($res1))!=0){
        while ($rows = mysql_fetch_assoc($res1)){
                $resultlist[] = $rows; }
        foreach ($resultlist as $rows) {
            if ($rows['categoryName']==trim($categoryname)) {
                $err = "";
                $errormsg = "The category name you specified was already taken. Please try other category name";
                break;} 
            else{ $err = "no err"; }
        }
    }
    if ($err == "no err" || mysql_num_rows($res1) == 0 ) {
        $sql = "insert into productcategory values (NULL,'".$categoryname."', '".$categorydescription."', '".$categoryimage."')";
        $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
        if(!$con){die('Could not be able to connect to  mysql');}
        mysql_select_db('hwdb', $con);
        $res = mysql_query($sql);
    }
}

if (strlen($errormsg) > 0) {
    require "saddproductcategory.html";
    echo $errormsg.'</span></div></table></fieldset></div></form></body></html>';    
}
elseif (!$res) {
    require "saddproductcategory.html"; 
    echo '</span></div></table></fieldset></div></form></body></html>';
}
elseif ($res){
    require "saddproductcategory.html"; 
    echo '<label class="successaddlabel">Successfully Added the Product Category</label></span></div></table></fieldset>
        </div></form></body></html>';
}
?>
