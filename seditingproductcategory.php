<?php
session_start();
require "validatesalesmanager.php";
$categoryname = $_POST['editcategoryname'];
$categorydescription = $_POST['editcategorydescription'];
$imageurl = $_POST['editimageurl'];
$editingcategory = $_POST['inputcategoryid'];
$errormsg = "";

$var10 = $_POST['submit10'];
if($var10 == 'Back'){
    require "sreqeditproductcategory.php";
    exit;}
elseif($var10 == 'Logout'){
    session_destroy();
    require "login.php";
    exit;}

if ( strlen(trim($categoryname)) == 0 || strlen(trim($categorydescription)) == 0 || strlen(trim($imageurl)) == 0 || strlen(trim($editingcategory)) == 0 ) { 
    $errormsg = "Sorry, your input does not match the specifications! Try again :)"; 
}
if ( strlen(trim($categoryname)) == 0 && strlen(trim($categorydescription)) == 0 && strlen(trim($imageurl)) == 0 && strlen(trim($editingcategory)) == 0) {
    $errormsg = "";
}
if (strlen(trim($categoryname)) > 0 && strlen(trim($categorydescription)) > 0 && strlen(trim($imageurl)) > 0 && strlen(trim($editingcategory)) > 0 ) {
    $sql = "update productcategory set categoryName ='".$categoryname."', categoryDescription ='".$categorydescription."', categoryImage='".$imageurl."' where categoryId ='".$editingcategory."'";
    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){die('Could not be able to connect to  mysql');}
    mysql_select_db('hwdb', $con);
    $res = mysql_query($sql);
}

if (strlen($errormsg) > 0) {    
    echo '<html lang="en">
        <head>
            <meta charset="utf-8" />
            <title>Edit Product Category Page</title>
            <link href="copela.css" type="text/css" rel="stylesheet"/>
            <script type="text/javascript" src="copela.js"></script>
        </head>
        <body>
            <div class="titlebgadmin"><label class="titleinadmin">copeLA</label><sup class="titlereginadmin">&reg</sup>
            <form method="POST" action="seditingproductcategory.php">
                <div align="left" style="padding:6px; float:left"><input type="submit" name="submit10" value="Back"></div>
                <div align="right" style="padding:6px;"><input type="submit" name="submit10" value="Logout"></div>
                <div align="center" style="padding:60px">
                    <fieldset class="fieldset-auto-width">
                        <legend class="addemptitle">Edit Product Catergry</legend>
                        <table class="tableinaddemp">                            
                            <tr><td class="padinaddemptable">Category Name</td>
                                <td class="padinaddemptable"><input type="text" placeholder="category name please*" id="editcategoryname" name="editcategoryname" class="inputfieldsinaddemp" maxlength="20" value="'.$categoryname.'"/></td></tr>
                            <tr><td class="padinaddemptable">Category Description</td>
                                <td class="padinaddemptable"><textarea id="editcategorydescription" name="editcategorydescription" class="inputfieldsinaddemp" rows="4" cols="30">'.$categorydescription.'</textarea></td></tr>
                            <tr><td class="padinaddemptable">Category Image</td>
                                <td class="padinaddemptable"><input type="text" placeholder="image url please*" id="editimageurl" name="editimageurl" class="inputfieldsinaddemp" maxlength="20" value="'.$imageurl.'"/></td></tr>
                            <input type="text" name="inputcategoryid" id="inputcategoryid" value="'.$editingcategory.'" hidden/></td></div></tr>
                            <tr><td></td><td class="padinaddemptable"><input type="submit" value="Edit this product category" name="editproductcategory" onclick="return editproductcategoryform2()" id="editproductcategory" style="width:175px"/></td></tr>
                            <span style="color:red"> 
                            <label id="editcategorynameerror" ></label>
                            <label id="editcategorydescriptionerror" ></label>   
                            <label id="editcategoryimageerror" ></label>
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
            <title>Edit Product Category Page</title>
            <link href="copela.css" type="text/css" rel="stylesheet"/>
            <script type="text/javascript" src="copela.js"></script>
        </head>
        <body>
            <div class="titlebgadmin"><label class="titleinadmin">copeLA</label><sup class="titlereginadmin">&reg</sup>
            <form method="POST" action="seditingproductcategory.php" >
                <div align="left" style="padding:6px; float:left"><input type="submit" name="submit10" value="Back"></div>
                <div align="right" style="padding:6px;"><input type="submit" name="submit10" value="Logout"></div>
                <div align="center" style="padding:60px">
                    <fieldset class="fieldset-auto-width">
                        <legend class="addemptitle">Edit Product Catergry</legend>
                        <table class="tableinaddemp">                            
                            <tr><td class="padinaddemptable">Category Name</td>
                                <td class="padinaddemptable"><input type="text" placeholder="category name please*" id="editcategoryname" name="editcategoryname" class="inputfieldsinaddemp" maxlength="20" value="'.$categoryname.'"/></td></tr>
                            <tr><td class="padinaddemptable">Category Description</td>
                                <td class="padinaddemptable"><textarea id="editcategorydescription" name="editcategorydescription" class="inputfieldsinaddemp" rows="4" cols="30">'.$categorydescription.'</textarea></td></tr>
                            <tr><td class="padinaddemptable">Category Image</td>
                                <td class="padinaddemptable"><input type="text" placeholder="image url please*" id="editimageurl" name="editimageurl" class="inputfieldsinaddemp" maxlength="20" value="'.$imageurl.'"/></td></tr>
                            <input type="text" name="inputcategoryid" id="inputcategoryid" value="'.$editingcategory.'" hidden/></td></div></tr>
                            <tr><td></td><td class="padinaddemptable"><input type="submit" value="Edit this product category" onclick="return editproductcategoryform2()" name="editproductcategory" id="editproductcategory" style="width:175px"/></td></tr>
                            <span style="color:red"> 
                            <label id="editcategorynameerror" ></label>
                            <label id="editcategorydescriptionerror" ></label>   
                            <label id="editcategoryimageerror" ></label></span>        
                        </table>
                    </fieldset>
                </div>
            </form>
        </body>
    </html>';
}
elseif ($res){
    require "sreqeditproductcategory.php";
    echo '<div align="center"><label class="successaddlabel">Successfully Edited the Product Category</label></div>';
}
?>
