<?php
session_start();
require "validatesalesmanager.php";
$startdate = $_POST['editstartdate'];
$enddate = $_POST['editenddate'];
$discount = $_POST['editdiscount%'];
$productid = $_POST['editproductid'];
$editingsale = $_POST['inputsaleid'];
$errormsg = "";
$var14 = $_POST['submit14'];

if($var14 == 'Back'){
    require "sreqeditspecialsales.php";
    exit;}
elseif($var14 == 'Logout'){
    session_destroy();
    require "login.php";
    exit;}

if (strlen(trim($startdate)) == 0 || strlen(trim($enddate)) == 0 || strlen(trim($discount)) == 0 || strlen(trim($productid)) == 0 || strlen(trim($editingsale)) == 0) { 
    $errormsg = "Sorry, all input fields are mandatory! Try again :)"; 
}
if (strlen(trim($startdate)) == 0 && strlen(trim($enddate)) == 0 && strlen(trim($discount)) == 0 && strlen(trim($productid)) == 0 && strlen(trim($editingsale)) == 0) {
    $errormsg = "";
}
if (strlen(trim($startdate)) > 0 && strlen(trim($enddate)) > 0 && strlen(trim($discount)) > 0 && strlen(trim($productid)) > 0 && strlen(trim($editingsale)) > 0) {
    $sql = "update specialsales set startDate ='".$startdate."', endDate ='".$enddate."', discountPercentage='".$discount."', productId='".$productid."' where saleId ='".$editingsale."'";
    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){die('Could not be able to connect to  mysql');}
    mysql_select_db('hwdb', $con);
    $res = mysql_query($sql);
}

$sql1 = "select productId from product";
$con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
if(!$con){die('Could not be able to connect to  mysql');}
mysql_select_db('hwdb', $con);
$res1 = mysql_query($sql1);
while ($rows1 = mysql_fetch_assoc($res1)){
        $resultlist1[] = $rows1;
}            
if (strlen($errormsg) > 0) {    
    echo '<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Edit Special Sales Page</title>
        <link href="copela.css" type="text/css" rel="stylesheet"/>
        <script type="text/javascript" src="copela.js"></script>
    </head>
    <body>
        <div class="titlebgadmin"><label class="titleinadmin">copeLA</label><sup class="titlereginadmin">&reg</sup></div>
        <form method="POST" action="seditingspecialsales.php" onsubmit="return editemployeepageform()">
            <div align="left" style="padding:6px; float:left"><input type="submit" name="submit14" value="Back"></div>
            <div align="right" style="padding:6px;"><input type="submit" name="submit14" value="Logout"></div>
            <div align="center" style="padding-top:60px">
                <fieldset class="fieldset-auto-width">
                    <legend class="addemptitle">Edit Special Sale</legend>
                    <table class="tableinaddemp">                            
                        <tr><td class="padinaddemptable">Start Date</td>
                            <td class="padinaddemptable"><input type="date" id="editstartdate" name="editstartdate" class="inputfieldsinaddemp" value="'.$startdate.'"/></td></tr>
                        <tr><td class="padinaddemptable">End Date</td>
                            <td class="padinaddemptable"><input type="date" id="editenddate" name="editenddate" class="inputfieldsinaddemp" value="'.$enddate.'"/></td></tr>
                        <tr><td class="padinaddemptable">Price Discout %</td>
                            <td class="padinaddemptable"><input type="number" placeholder="discount % please*" id="editdiscount%" name="editdiscount%" class="inputfieldsinaddemp" value="'.$discount.'" step="any" min="0" max="70"/></td></tr>                        
                        <tr><td class="padinaddemptable">Product ID</td>
                            <td class="padinaddemptable">
                            <select id="editproductid" name="editproductid" class="inputfieldsinaddemp">';
                                foreach ($resultlist1 as $id) {
                                    if($productid == $id['productId']){
                                        echo "<option value=".$id['productId']." selected>".$id['productId']."</option>";
                                    }
                                    else{
                                        echo "<option value=".$id['productId'].">".$id['productId']."</option>";
                                    }
                                } 
                       echo'</select></td></tr>                                         
                        <input type="text" name="inputsaleid" id="inputsaleid" value="'.$editingsale.'" hidden/>
                        <tr><td class="padinaddemptable"></td>
                            <td class="padinaddemptable"><input type="submit" value="Edit this sale" name="editsale" id="editsale" style="width:100px"/></td></tr> 
                            <span style="color:red">
                        <label id="editstartdateerror" ></label>
                        <label id="editenddateerror" ></label>   
                        <label id="editcompdateerror" ></label>
                        <label id="editdiscounterror" ></label> 
                        <label class="erradd">'.$errormsg.'</label>     </span>   
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
        <title>Edit Special Sales Page</title>
        <link href="copela.css" type="text/css" rel="stylesheet"/>
        <script type="text/javascript" src="copela.js"></script>
    </head>
    <body>
        <div class="titlebgadmin"><label class="titleinadmin">copeLA</label><sup class="titlereginadmin">&reg</sup></div>
        <form method="POST" action="seditingspecialsales.php" onsubmit="return editemployeepageform()">
            <div align="left" style="padding:6px; float:left"><input type="submit" name="submit14" value="Back"></div>
            <div align="right" style="padding:6px;"><input type="submit" name="submit14" value="Logout"></div>
            <div align="center" style="padding-top:60px">
                <fieldset class="fieldset-auto-width">
                    <legend class="addemptitle">Edit Special Sale</legend>
                    <table class="tableinaddemp">                            
                        <tr><td class="padinaddemptable">Start Date</td>
                            <td class="padinaddemptable"><input type="date" id="editstartdate" name="editstartdate" class="inputfieldsinaddemp" value="'.$startdate.'"/></td></tr>
                        <tr><td class="padinaddemptable">End Date</td>
                            <td class="padinaddemptable"><input type="date" id="editenddate" name="editenddate" class="inputfieldsinaddemp" value="'.$enddate.'"/></td></tr>
                        <tr><td class="padinaddemptable">Price Discout %</td>
                            <td class="padinaddemptable"><input type="number" placeholder="discount % please*" id="editdiscount%" name="editdiscount%" class="inputfieldsinaddemp" value="'.$discount.'" step="any" min="0" max="70"/></td></tr>                        
                        <tr><td class="padinaddemptable">Product ID</td>
                            <td class="padinaddemptable">
                            <select id="editproductid" name="editproductid" class="inputfieldsinaddemp">';
                                foreach ($resultlist1 as $id) {
                                    if($productid == $id['productId']){
                                        echo "<option value=".$id['productId']." selected>".$id['productId']."</option>";
                                    }
                                    else{
                                        echo "<option value=".$id['productId'].">".$id['productId']."</option>";
                                    }
                                } 
                       echo'</select></td></tr>                                         
                        <input type="text" name="inputsaleid" id="inputsaleid" value="'.$editingsale.'" hidden/>
                        <tr><td class="padinaddemptable"></td>
                            <td class="padinaddemptable"><input type="submit" value="Edit this sale" name="editsale" id="editsale" style="width:100px"/></td></tr> 
                        <span style="color:red">
                        <label id="editstartdateerror" ></label>
                        <label id="editenddateerror" ></label>   
                        <label id="editcompdateerror" ></label>
                        <label id="editdiscounterror" ></label></span>   
                    </table>
                </fieldset>
            </div>
        </form>
    </body>
</html>';
}
elseif ($res){
    require "sreqeditspecialsales.php";
    echo '<div align="center"><label class="successaddlabel">Successfully Edited the Sale</label></div>';
}
?>
