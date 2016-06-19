<?php
session_start();
require "validatesalesmanager.php";
$val = $_POST['edit'];
$errrmsg = "";

$var9 = $_POST['submit9'];
if($var9 == 'Back'){
    require "smgrhp.php";
    exit;}
elseif($var9 == 'Logout'){
    session_destroy();
    require "login.php";
    exit;}

if(strlen($val) > 0){
    $sql = "select * from productcategory where categoryId = '".$val."';";
    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){die('Could not be able to connect to  mysql');}
    mysql_select_db('hwdb', $con);
    $res = mysql_query($sql);
    if((mysql_num_rows($res))==0){require "sreqeditproductcategory.php"; echo "<div align='center'>No Product Categories available</div>";}
} 
else{$errrmsg = "--*You should select a product category in order to edit.--";}

if (strlen($errrmsg) > 0) {
    require "sreqeditproductcategory.php";
    echo '<div align="center"><label class="erradd">'.$errrmsg.'</label></div>';
}
elseif ($res){
    $rows = mysql_fetch_assoc($res);
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
                                    <td class="padinaddemptable"><input type="text" placeholder="category name please*" id="editcategoryname" name="editcategoryname" class="inputfieldsinaddemp" maxlength="20" value="'.$rows['categoryName'].'"/></td></tr>
                                <tr><td class="padinaddemptable">Category Description</td>
                                    <td class="padinaddemptable"><textarea id="editcategorydescription" name="editcategorydescription" class="inputfieldsinaddemp" rows="4" cols="30">'.$rows['categoryDescription'].'</textarea></td></tr>
                                <tr><td class="padinaddemptable">Category Image</td>
                                    <td class="padinaddemptable"><input type="text" placeholder="image url please*" id="editimageurl" name="editimageurl" class="inputfieldsinaddemp" maxlength="20" value="'.$rows['categoryImage'].'"/></td></tr>                        
                                <input type="text" name="inputcategoryid" id="inputcategoryid" value="'.$val.'" hidden/>
                                <tr><td></td><td class="padinaddemptable"><input type="submit" value="Edit this product category" onclick="return editproductcategoryform2()" name="editproductcategory" id="editproductcategory" style="width:175px"/></td></tr>
                                <span style="color:red"> 
                                <label id="editcategorynameerror" ></label>
                                <label id="editcategorydescriptionerror" ></label>   
                                <label id="editcategoryimageerror" ></label>
                                </span>
                            </table>
                        </fieldset>
                    </div>
                </form>
            </body>
        </html>';
}
?>
