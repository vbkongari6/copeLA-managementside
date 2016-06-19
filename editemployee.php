<?php
session_start();
require "validateadmin.php";
$val = $_POST['edit'];

$var2 = $_POST['submit2'];
$errormsg = "";

if($var2 == 'Back'){
    require "adminhp.php";
    exit;
}
elseif($var2 == 'Logout'){
    session_destroy();
    require "login.php";
    exit;
}

if(strlen($val) > 0){
    $sql = "select * from users where username = '".$val."';";
    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){die('Could not be able to connect to  mysql');}
    mysql_select_db('hwdb', $con);
    $res = mysql_query($sql);
    if((mysql_num_rows($res))==0){echo "<div align='center' style='color:red'>No Data</div>";}
} 
else{$errrmsg = "--*You should select an user to edit.--";}

if (strlen($errrmsg) > 0) {
    require "reqeditemp.php";
    echo '<div align="center"><label class="erradd">'.$errrmsg.'</label></div>';
}
elseif (!$res) { 
    require "editingemppage.html";
    require "reqeditemp.php";
}
elseif ($res){
    //require "reqeditemp.php";
    $rows = mysql_fetch_assoc($res);    
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
                <div align="center" style="padding:45px">
                    <fieldset class="fieldset-auto-width">
                        <legend class="addemptitle">Edit Employee</legend>
                        <table class="tableinaddemp">
                            <tr><td class="padinaddemptable">Username</td>
                                <td class="padinaddemptable"><input type="text" placeholder="username please*" id="editusername" name="editusername" class="inputfieldsinaddemp" maxlength="20" value="'.$rows['username'].'"/></td></tr>
                            <tr><td class="padinaddemptable">Password</td>
                                <td class="padinaddemptable"><input type="password" placeholder="password please*" id="editpassword" name="editpassword" class="inputfieldsinaddemp" maxlength="20" value="'.$rows['password'].'"/></td></tr>
                            <tr><td class="padinaddemptable">First Name</td>
                                <td class="padinaddemptable"><input type="text" placeholder="first name please*" id="editfirstname" name="editfirstname" class="inputfieldsinaddemp" maxlength="50" value="'.$rows['firstname'].'"/></td></tr>
                            <tr><td class="padinaddemptable">Last Name</td>
                                <td class="padinaddemptable"><input type="text" placeholder="last name please*" id="editlastname" name="editlastname" class="inputfieldsinaddemp" maxlength="20" value="'.$rows['lastname'].'"/></td></tr>
                            <tr><td class="padinaddemptable">Age</td>
                                <td class="padinaddemptable"><input type="number" placeholder="age please*" id="editage" name="editage" class="inputfieldsinaddemp" value="'.$rows['age'].'"/></td></tr>
                            <tr><td class="padinaddemptable">Salary</td>
                                <td class="padinaddemptable"><input type="number" placeholder="salary please*" id="editsalary" name="editsalary" class="inputfieldsinaddemp" value="'.$rows['salary'].'"/></td></tr>
                            <tr><td class="padinaddemptable">Usertype</td>
                                <td class="padinaddemptable">
                                    <input type="radio" id="admin" name="editusertype" value="administrator"';
                                    if($rows['usertype'] == "administrator"){echo "checked";} 
                                        echo '/>Administrator
                                    <input type="radio" id="salesmgr" name="editusertype" value="salesmanager"';
                                    if($rows['usertype'] == "salesmanager"){echo "checked";} 
                                        echo '/>Sales Manager
                                    <input type="radio" id="mgr" name="editusertype" value="manager"';
                                    if($rows['usertype'] == "manager"){echo "checked";} 
                                        echo '/>Manager</td></tr>
                            <input type="text" name="inputuname" id="inputuname" value="'.$val.'" hidden/>
                            <tr><td></td><td class="padinaddemptable"><input type="submit" value="Edit" name="editemployee" id="editemployee" style="width:100px"/></td></tr> 
                            <span style="color:red"><label id="editusernameerror" ></label>
                            <label id="editpassworderror" ></label>   
                            <label id="editfirstnameerror" ></label>
                            <label id="editlastnameerror" ></label> 
                            <label id="editageerror" ></label>
                            <label id="editusertypeerror" ></label></span> 
                        </table>
                    </fieldset>
                </div>
            </form>
        </body>
    </html>';
}
?>
