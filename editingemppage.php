<?php
session_start();
require "validateadmin.php";
$username = $_POST['editusername'];
$password = $_POST['editpassword'];
$firstname = $_POST['editfirstname'];
$lastname = $_POST['editlastname'];
$age = $_POST['editage'];
$salary = $_POST['editsalary'];
$usertype = $_POST['editusertype'];
$editinguser = $_POST['inputuname'];

$var3 = $_POST['submit3'];
$errormsg = "";

if($var3 == 'Back'){
    require "editemployee.php";
    exit;
}
elseif($var3 == 'Logout'){
    session_destroy();
    require "login.php";
    exit;
}

if ( strlen(trim($username)) == 0 || strlen(trim($password)) == 0 || strlen(trim($firstname)) == 0 || strlen(trim($lastname)) == 0 || strlen(trim($age)) == 0 || strlen(trim($salary)) == 0 || strlen(trim($usertype)) == 0) { 
    $errormsg = "Sorry, all input fields must be filled :)"; 
}
if ( strlen(trim($username)) == 0 && strlen(trim($password)) == 0 && strlen(trim($firstname)) == 0 && strlen(trim($lastname)) == 0 && strlen(trim($age)) == 0 && strlen(trim($salary)) == 0 && strlen(trim($usertype)) == 0) {
    $errormsg = "";
}
if ( strlen(trim($username)) > 0 && strlen(trim($password)) > 0 && strlen(trim($firstname)) > 0 && strlen(trim($lastname)) > 0 && strlen(trim($age)) > 0 && strlen(trim($salary)) > 0 && strlen(trim($usertype)) > 0) {
    $sql = "update users set username ='".$username."', password ='".$password."', firstname ='".$firstname."', lastname='".$lastname."', age='".$age."', usertype='".$usertype."', salary='".$salary."' where username ='".$editinguser."'";
    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){die('Could not be able to connect to  mysql');}
    mysql_select_db('hwdb', $con);
    $res = mysql_query($sql);
}

if (strlen($errormsg) > 0) {    
    echo '<html lang="en">
        <head>
            <meta charset="utf-8" />
            <title>Edit Employee Page</title>
            <link href="copela.css" type="text/css" rel="stylesheet"/>
            <script type="text/javascript" src="copela.js"></script>
        </head>
        <body>
            <div class="titlebgadmin"><label class="titleinadmin">copeLA</label><sup class="titlereginadmin">&reg</sup></div>
            <form method="POST" action="editingemppage.php" onsubmit="return editemployeepageform2()">
                <div align="left" style="padding:6px; float:left"><input type="submit" name="submit3" value="Back"></div>
                <div align="right" style="padding:6px;"><input type="submit" name="submit3" value="Logout"></div>
                <div class="addempdiv">
                    <fieldset class="fieldset-auto-width">
                        <legend class="addemptitle">Edit Employee</legend>
                        <table class="tableinaddemp">
                            <tr><td class="padinaddemptable">Username</td>
                                <td class="padinaddemptable"><input type="text" placeholder="username please*" id="editusername" name="editusername" class="inputfieldsinaddemp" maxlength="20" value="'.$username.'"/></td></tr>
                            <tr><td class="padinaddemptable">Password</td>
                                <td class="padinaddemptable"><input type="text" placeholder="password please*" id="editpassword" name="editpassword" class="inputfieldsinaddemp" maxlength="20" value="'.$password.'"/></td></tr>
                            <tr><td class="padinaddemptable">First Name</td>
                                <td class="padinaddemptable"><input type="text" placeholder="first name please*" id="editfirstname" name="editfirstname" class="inputfieldsinaddemp" maxlength="50" value="'.$firstname.'"/></td></tr>
                            <tr><td class="padinaddemptable">Last Name</td>
                                <td class="padinaddemptable"><input type="text" placeholder="last name please*" id="editlastname" name="editlastname" class="inputfieldsinaddemp" maxlength="20" value="'.$lastname.'"/></td></tr>
                            <tr><td class="padinaddemptable">Age</td>
                                <td class="padinaddemptable"><input type="number" placeholder="age please*" id="editage" name="editage" class="inputfieldsinaddemp" value="'.$age.'"/></td></tr>
                            <tr><td class="padinaddemptable">Salary</td>
                                <td class="padinaddemptable"><input type="number" placeholder="salary please*" id="editsalary" name="editsalary" class="inputfieldsinaddemp" value="'.$salary.'"/></td></tr>
                            <tr><td class="padinaddemptable">Usertype</td>
                                <td class="padinaddemptable">
                                    <input type="radio" id="admin" name="editusertype" value="administrator"';
                                    if($usertype == "administrator"){echo "checked";} 
                                        echo '/>Administrator
                                    <input type="radio" id="salesmgr" name="editusertype" value="salesmanager"';
                                    if($usertype == "salesmanager"){echo "checked";} 
                                        echo '/>Sales Manager
                                    <input type="radio" id="mgr" name="editusertype" value="manager"';
                                    if($usertype == "manager"){echo "checked";} 
                                        echo '/>Manager</td></tr>
                            <input type="text" name="inputuname" id="inputuname" value="'.$editinguser.'" hidden/>
                            <tr><td></td><td class="padinaddemptable"><input type="submit" value="Edit" name="editemployee" id="editemployee" style="width:100px"/></td></tr> 
                            <span style="color:red"><label id="editusernameerror" ></label>
                            <label id="editpassworderror" ></label>   
                            <label id="editfirstnameerror" ></label>
                            <label id="editlastnameerror" ></label> 
                            <label id="editageerror" ></label>
                            <label id="editsalaryerror" ></label>
                            <label id="editusertypeerror" ></label> 
                            <label class="erradd">'.$errormsg.'</label></span>      
                        </table>
                    </fieldset>
                </div>
            </form>
        </body>
    </html>';
}
elseif (!$res) {
    echo '<html lang="en">
        <head>
            <meta charset="utf-8" />
            <title>Edit Employee Page</title>
            <link href="copela.css" type="text/css" rel="stylesheet"/>
            <script type="text/javascript" src="copela.js"></script>
        </head>
        <body>
            <div class="titlebgadmin"><label class="titleinadmin">copeLA</label><sup class="titlereginadmin">&reg</sup></div>
            <form method="POST" action="editingemppage.php" onsubmit="return editemployeepageform2()">
                <div align="left" style="padding:6px; float:left"><input type="submit" name="submit3" value="Back"></div>
                <div align="right" style="padding:6px;"><input type="submit" name="submit3" value="Logout"></div>
                <div class="addempdiv">
                    <fieldset class="fieldset-auto-width">
                        <legend class="addemptitle">Edit Employee</legend>
                        <table class="tableinaddemp">
                            <tr><td class="padinaddemptable">Username</td>
                                <td class="padinaddemptable"><input type="text" placeholder="username please*" id="editusername" name="editusername" class="inputfieldsinaddemp" maxlength="20" value="'.$username.'"/></td></tr>
                            <tr><td class="padinaddemptable">Password</td>
                                <td class="padinaddemptable"><input type="text" placeholder="password please*" id="editpassword" name="editpassword" class="inputfieldsinaddemp" maxlength="20" value="'.$password.'"/></td></tr>
                            <tr><td class="padinaddemptable">First Name</td>
                                <td class="padinaddemptable"><input type="text" placeholder="first name please*" id="editfirstname" name="editfirstname" class="inputfieldsinaddemp" maxlength="50" value="'.$firstname.'"/></td></tr>
                            <tr><td class="padinaddemptable">Last Name</td>
                                <td class="padinaddemptable"><input type="text" placeholder="last name please*" id="editlastname" name="editlastname" class="inputfieldsinaddemp" maxlength="20" value="'.$lastname.'"/></td></tr>
                            <tr><td class="padinaddemptable">Age</td>
                                <td class="padinaddemptable"><input type="number" placeholder="age please*" id="editage" name="editage" class="inputfieldsinaddemp" value="'.$age.'"/></td></tr>
                            <tr><td class="padinaddemptable">Salary</td>
                                <td class="padinaddemptable"><input type="number" placeholder="salary please*" id="editsalary" name="editsalary" class="inputfieldsinaddemp" value="'.$salary.'"/></td></tr>
                            <tr><td class="padinaddemptable">Usertype</td>
                                <td class="padinaddemptable">
                                    <input type="radio" id="admin" name="editusertype" value="administrator"';
                                    if($usertype == "administrator"){echo "checked";} 
                                        echo '/>Administrator
                                    <input type="radio" id="salesmgr" name="editusertype" value="salesmanager"';
                                    if($usertype == "salesmanager"){echo "checked";} 
                                        echo '/>Sales Manager
                                    <input type="radio" id="mgr" name="editusertype" value="manager"';
                                    if($usertype == "manager"){echo "checked";} 
                                        echo '/>Manager</td></tr>
                            <input type="text" name="inputuname" id="inputuname" value="'.$editinguser.'" hidden/>
                            <tr><td></td><td class="padinaddemptable"><input type="submit" value="Edit" name="editemployee" id="editemployee" style="width:100px"/></td></tr> 
                            <span style="color:red"><label id="editusernameerror" ></label>
                            <label id="editpassworderror" ></label>   
                            <label id="editfirstnameerror" ></label>
                            <label id="editlastnameerror" ></label> 
                            <label id="editageerror" ></label>
                            <label id="editsalaryerror" ></label>
                            <label id="editusertypeerror" ></label></span>        
                        </table>
                    </fieldset>
                </div>
            </form>
        </body>
    </html>';
}
elseif ($res){
    require "reqeditemp.php";
    echo '<div align="center"><label class="successaddlabel">Successfully Edited the Employee</label></div>';
}
?>
