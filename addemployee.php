<?php
session_start();
require "validateadmin.php";
$username = $_POST['addusername'];
$password = $_POST['addpassword'];
$firstname = $_POST['addfirstname'];
$lastname = $_POST['addlastname'];
$age = $_POST['addage'];
$salary = $_POST['addsalary'];
$usertype = $_POST['addusertype'];
$var1 = $_POST['submit1'];
$errormsg = "";

if($var1 == 'Back'){
    require "adminhp.php";
    exit;
}
elseif($var1 == 'Logout'){
    session_destroy();
    require "login.php";
    exit;
}

if ( strlen(trim($username)) == 0 || strlen(trim($password)) == 0 || strlen(trim($firstname)) == 0 || strlen(trim($lastname)) == 0 || strlen(trim($age)) == 0 || strlen(trim($salary)) == 0 || strlen($usertype) == 0) { 
    $errormsg = "Sorry, input doesn't match the specifications! You have to fill all the fields :)"; 
}
if ( strlen(trim($username)) == 0 && strlen(trim($password)) == 0 && strlen(trim($firstname)) == 0 && strlen(trim($lastname)) == 0 && strlen(trim($age)) == 0 && strlen(trim($salary)) == 0 && strlen($usertype) == 0) {
    $errormsg = "";
}
if ( strlen(trim($username)) > 0 && strlen(trim($password)) > 0 && strlen(trim($firstname)) > 0 && strlen($lastname) > 0 && strlen($age) > 0 && strlen(trim($salary)) > 0 && strlen($usertype) > 0) {
    $sql1 = "select username from users";
    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){ echo "no con";
        die('Could not be able to connect to  mysql'); }
    mysql_select_db('hwdb', $con);
    $res1 = mysql_query($sql1);
    if ((mysql_num_rows($res1))!=0){
        while ($rows = mysql_fetch_assoc($res1)){
                $resultlist[] = $rows; }
        foreach ($resultlist as $rows) {
            if ($rows['username']==trim($username)) {
                $errormsg = "Specified username was already taken. Try different name.";
                break;} 
            else{ $err = "no err"; }
        }
    }
    if ($err == "no err" || mysql_num_rows($res1) == 0 ) {
    $sql = "insert into users values ('".$username."', '".$password."', '".$firstname."', '".$lastname."', '".$age."', '".$usertype."', '".$salary."')";
    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){die('Could not be able to connect to  mysql');}
    mysql_select_db('hwdb', $con);
    $res = mysql_query($sql); }
}

if (strlen($errormsg) > 0) {
    require "addemployee.html";
    echo '<div align="center" style="padding:6px"><label class="erradd">'.$errormsg.'</label></div></span></table></fieldset></div></form></body></html>';
}
elseif (!$res) {
    require "addemployee.html";
    echo '</span></table></fieldset></div></form></body></html>';
}
elseif ($res){
    require "addemployee.html";
    echo '<label class="successaddlabel">Successfully Added the Employee</label></table></fieldset></div></form></body></html>';
}
?>
