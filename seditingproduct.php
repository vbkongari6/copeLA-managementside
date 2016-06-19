<?php
session_start();
require "validatesalesmanager.php";
$productname = $_POST['editproductname'];
$productdescription = $_POST['editproductdescription'];
$imageurl = $_POST['editimageurl'];
$imageurl2 = $_POST['editimageurl2'];
$imageurl3 = $_POST['editimageurl3'];
$imageurl4 = $_POST['editimageurl4'];
$categoryid = $_POST['editproductcategoryid'];
$price = $_POST['editproductprice'];
$editingproduct = $_POST['inputproductid'];
$errormsg = "";
$var12 = $_POST['submit12'];

if($var12 == 'Back'){
    require "sreqeditproduct.php";
    exit;}
elseif($var12 == 'Logout'){
    session_destroy();
    require "login.php";
    exit;}

if (strlen(trim($productname)) == 0 || strlen(trim($productdescription)) == 0 || strlen(trim($imageurl)) == 0 || strlen(trim($imageurl2)) == 0 || strlen(trim($imageurl3)) == 0 || strlen(trim($imageurl4)) == 0 || strlen(trim($categoryid)) == 0 || strlen(trim($price)) == 0 || strlen(trim($editingproduct)) == 0) { 
    $errormsg = "Sorry, all input fields are mandatory! Try again :)"; 
}
if ( strlen(trim($productname)) == 0 && strlen(trim($productdescription)) == 0 && strlen(trim($imageurl)) == 0 && strlen(trim($imageurl2)) == 0 && strlen(trim($imageurl3)) == 0 && strlen(trim($imageurl4)) == 0 && strlen(trim($categoryid)) == 0 && strlen(trim($price)) == 0 && strlen(trim($editingproduct)) == 0) {
    $errormsg = "";
}
if (strlen(trim($productname)) > 0 && strlen(trim($productdescription)) > 0 && strlen(trim($imageurl)) > 0 && strlen(trim($imageurl2)) > 0 && strlen(trim($imageurl3)) > 0 && strlen(trim($imageurl4)) > 0 && strlen(trim($categoryid)) > 0 && strlen(trim($price)) > 0 && strlen(trim($editingproduct)) > 0) {
    $sql = "update product set productName ='".$productname."', productDescription ='".$productdescription."', productImage='".$imageurl."', productImage2='".$imageurl2."', productImage3='".$imageurl3."', productImage4='".$imageurl4."', productCategoryId='".$categoryid."', productPrice='".$price."' where productId ='".$editingproduct."'";
    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){die('Could not be able to connect to  mysql');}
    mysql_select_db('hwdb', $con);
    $res = mysql_query($sql);
}

$sql1 = "select categoryId from productcategory";
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
        <title>Edit Product Page</title>
        <link href="copela.css" type="text/css" rel="stylesheet"/>
        <script type="text/javascript" src="copela.js"></script>
    </head>
    <body>
        <div class="titlebgadmin"><label class="titleinadmin">copeLA</label><sup class="titlereginadmin">&reg</sup>
        <form method="POST" action="seditingproduct.php" onsubmit="return editemployeepageform()">
            <div align="left" style="padding:6px; float:left"><input type="submit" name="submit12" value="Back"></div>
            <div align="right" style="padding:6px;"><input type="submit" name="submit12" value="Logout"></div>
            <div  align="center" style="padding-top:60px">
                <fieldset class="fieldset-auto-width">
                    <legend class="addemptitle">Edit Product</legend>
                    <table class="tableinaddemp">
                        <tr><td class="padinaddemptable">Product Name</td>
                            <td class="padinaddemptable"><input type="text" placeholder="product name please*" id="editproductname" name="editproductname" class="inputfieldsinaddemp" maxlength="50" value="'.$productname.'"/></td></tr>
                        <tr><td class="padinaddemptable">Product Description</td>
                            <td class="padinaddemptable"><textarea id="editproductdescription" name="editproductdescription" class="inputfieldsinaddemp" rows="4" cols="30">'.$productdescription.'</textarea></td></tr>
                        <tr><td class="padinaddemptable">Product Image 1</td>
                            <td class="padinaddemptable"><input type="text" placeholder="image1 url please*" id="editimageurl" name="editimageurl" class="inputfieldsinaddemp" value="'.$imageurl.'"/></td></tr> 
                        <tr><td class="padinaddemptable">Product Image 2</td>
                            <td class="padinaddemptable"><input type="text" placeholder="image2 url please*" id="editimageurl2" name="editimageurl2" class="inputfieldsinaddemp" value="'.$imageurl2.'"/></td></tr> 
                        <tr><td class="padinaddemptable">Product Image 3</td>
                            <td class="padinaddemptable"><input type="text" placeholder="image3 url please*" id="editimageurl3" name="editimageurl3" class="inputfieldsinaddemp" value="'.$imageurl3.'"/></td></tr> 
                        <tr><td class="padinaddemptable">Product Image 4</td>
                            <td class="padinaddemptable"><input type="text" placeholder="image4 url please*" id="editimageurl4" name="editimageurl4" class="inputfieldsinaddemp" value="'.$imageurl4.'"/></td></tr>                        
                        <tr><td class="padinaddemptable">Product Category ID</td>
                            <td class="padinaddemptable">
                                <select id="selectcategoryid" name="selectcategoryid" class="inputfieldsinaddemp">';                          
                                    foreach ($resultlist1 as $id) {
                                        if($categoryid == $id['categoryId']){
                                            echo "<option value=".$id['categoryId']." selected>".$id['categoryId']."</option>";
                                        }
                                        else{
                                            echo "<option value=".$id['categoryId'].">".$id['categoryId']."</option>";
                                        }
                                    } 
                        echo'</select></td></tr>
                        <tr><td class="padinaddemptable">Product Price</td>
                            <td class="padinaddemptable"><input type="number" placeholder="price please*" id="editproductprice" name="editproductprice" class="inputfieldsinaddemp" value="'.$price.'" step="any"/></td></tr>
                        <input type="text" name="inputproductid" id="inputproductid" value="'.$editingproduct.'" hidden/>
                        <tr><td></td><td class="padinaddemptable"><input type="submit" value="Edit this product" name="editproduct" id="editproduct" style="width:125px"/></td></tr> 
                        <span style="color:red"><label id="editusernameerror" ></label>
                        <label id="editproductnameerror" ></label>
                        <label id="editproductdescriptionerror" ></label>   
                        <label id="editproductimageerror" ></label>
                        <label id="editproductpriceerror" ></label> 
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
        <title>Edit Product Page</title>
        <link href="copela.css" type="text/css" rel="stylesheet"/>
        <script type="text/javascript" src="copela.js"></script>
    </head>
    <body>
        <div class="titlebgadmin"><label class="titleinadmin">copeLA</label><sup class="titlereginadmin">&reg</sup>
        <form method="POST" action="seditingproduct.php" onsubmit="return editemployeepageform()">
            <div align="left" style="padding:6px; float:left"><input type="submit" name="submit12" value="Back"></div>
            <div align="right" style="padding:6px;"><input type="submit" name="submit12" value="Logout"></div>
            <div  align="center" style="padding-top:60px">
                <fieldset class="fieldset-auto-width">
                    <legend class="addemptitle">Edit Product</legend>
                    <table class="tableinaddemp">
                        <tr><td class="padinaddemptable">Product Name</td>
                            <td class="padinaddemptable"><input type="text" placeholder="product name please*" id="editproductname" name="editproductname" class="inputfieldsinaddemp" maxlength="50" value="'.$productname.'"/></td></tr>
                        <tr><td class="padinaddemptable">Product Description</td>
                            <td class="padinaddemptable"><textarea id="editproductdescription" name="editproductdescription" class="inputfieldsinaddemp" rows="4" cols="30">'.$productdescription.'</textarea></td></tr>
                        <tr><td class="padinaddemptable">Product Image</td>
                            <td class="padinaddemptable"><input type="text" placeholder="image url please*" id="editimageurl" name="editimageurl" class="inputfieldsinaddemp" value="'.$imageurl.'"/></td></tr>
                        <tr><td class="padinaddemptable">Product Image 2</td>
                            <td class="padinaddemptable"><input type="text" placeholder="image2 url please*" id="editimageurl2" name="editimageurl2" class="inputfieldsinaddemp" value="'.$imageurl2.'"/></td></tr> 
                        <tr><td class="padinaddemptable">Product Image 3</td>
                            <td class="padinaddemptable"><input type="text" placeholder="image3 url please*" id="editimageurl3" name="editimageurl3" class="inputfieldsinaddemp" value="'.$imageurl3.'"/></td></tr> 
                        <tr><td class="padinaddemptable">Product Image 4</td>
                            <td class="padinaddemptable"><input type="text" placeholder="image4 url please*" id="editimageurl4" name="editimageurl4" class="inputfieldsinaddemp" value="'.$imageurl4.'"/></td></tr>                        
                        <tr><td class="padinaddemptable">Product Category ID</td>
                            <td class="padinaddemptable">
                            <select id="selectcategoryid" name="selectcategoryid" class="inputfieldsinaddemp">';                          
                                foreach ($resultlist1 as $id) {
                                    if($categoryid == $id['categoryId']){
                                        echo "<option value=".$id['categoryId']." selected>".$id['categoryId']."</option>";
                                    }
                                    else{
                                        echo "<option value=".$id['categoryId'].">".$id['categoryId']."</option>";
                                    }
                                } 
                       echo'</select></td></tr>
                        <tr><td class="padinaddemptable">Product Price</td>
                            <td class="padinaddemptable"><input type="number" placeholder="price please*" id="editproductprice" name="editproductprice" class="inputfieldsinaddemp" value="'.$price.'" step="any"/></td></tr>
                        <input type="text" name="inputproductid" id="inputproductid" value="'.$editingproduct.'" hidden/>
                        <tr><td></td><td class="padinaddemptable"><input type="submit" value="Edit this product" name="editproduct" id="editproduct" style="width:125px"/></td></tr> 
                        <span style="color:red"><label id="editusernameerror" ></label>
                        <label id="editproductnameerror" ></label>
                        <label id="editproductdescriptionerror" ></label>   
                        <label id="editproductimageerror" ></label>
                        <label id="editproductpriceerror" ></label></span>          
                    </table>
                </fieldset>
            </div>
        </form>
    </body>
</html>';
}
elseif ($res){
    require "sreqeditproduct.php";
    echo '<div align="center"><label class="successaddlabel">Successfully Edited the Product</label></div>';
}
?>
