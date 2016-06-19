<?php
session_start();
//step 1: connection to sql
//$con = mysql_connect(cs-server.usc.edu:19714,'root',);
//if(!con){die('Could not be able to connect to  mysql');}

//step 2: connection to database
//mysql_select_db('assignment', $con);

//step 3: issuing sql
//$res = mysql_query(/*any valid sql statement*/);
//res is resource variable, it gets status i.e if sql statement is insert, if it worked it gets number of rows get affected, if not worked, it gets not worked

//step 4: if sql is SELECT
// if only 1 row expected: if()
// if multiple rows possible: while()
// while($row = mysql_fectch_array($res) or mysql_fectch_assoc($res)){
//    echo '<p>abcd' .$row['userid'] .'def</p>';
//    }

$un = htmlentities($_POST['username'],ENT_QUOTES);
$pw = htmlentities($_POST['password'],ENT_QUOTES);
$errmsg = ""; $res = "";
if(strlen(trim($un))==0){$errmsg = 'Invalid login';}
if(strlen(trim($pw))==0){$errmsg = 'Invalid login';}
if(strlen(trim($un))==0 && strlen(trim($pw))==0){$errmsg = "";}//errmsg is empty, if either un and pw are blank or both have a value
if(strlen(trim($un))>0 && strlen(trim($pw))>0){//if both are not empty go to database to validate
    $usertype="";
    $sql= "select usertype from users where username='".$un."'and password='".$pw."'";
    //ex: un=hello, pw= world
    //select usertype from users where username='hello' and password='world';
    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){die('Could not be able to connect to  mysql');}
    mysql_select_db('hwdb', $con);
    $res = mysql_query($sql);
    if(!($row = mysql_fetch_assoc($res))){$errmsg='Invalid login';}//no rows retrieved. bad login
    else{
        $usertype = $row['usertype']; 
        $_SESSION['usertype'] = $usertype;
    }
} //End of if(strlen($un)>0 && strlen($pw)>0)
if(strlen($errmsg)>0){    //go to login page with error message
    require 'prelogin.html';
    echo '<label class="echo">'; echo $errmsg; echo'</label><br>';
    require 'postlogin.html'; }
elseif(!$res){     //res is 0 if we didn't talk to database //i.e no un and pw provided by user
    require 'prelogin.html'; require 'postlogin.html'; }
else{    // valid un and pw, so display appropriate page
    if ($usertype == 'administrator') { require 'adminhp.php'; } 
    elseif ($usertype == 'salesmanager') { require 'smgrhp.html'; }
    elseif ($usertype == 'manager') { require 'mgrhp.html'; }
    }
?>
