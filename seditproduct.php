<?php
session_start();
require "validatesalesmanager.php";
$val = $_POST['edit'];
$errrmsg = "";
$var11 = $_POST['submit11'];

if($var11 == 'Back'){
    require "smgrhp.php";
    exit;}
elseif($var11 == 'Logout'){
    session_destroy();
    require "login.php";
    exit;}

if(strlen($val) > 0){
    $sql = "select * from product where productId = '".$val."';";
    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){die('Could not be able to connect to  mysql');}
    mysql_select_db('hwdb', $con);
    $res = mysql_query($sql);
    if((mysql_num_rows($res))==0){$errmsg='Invalid login'; echo "no rows";}
} 
else{$errrmsg = "--*You should select a product to edit.--";}

if (strlen($errrmsg) > 0) {
    require "sreqeditproduct.php";
    echo '<div align="center"><label class="erradd">'.$errrmsg.'</label></div>';
}
elseif ($res){
    $rows = mysql_fetch_assoc($res);
    echo '<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Edit Product Page</title>
        <link href="copela.css" type="text/css" rel="stylesheet"/>
        <script type="text/javascript" src="copela.js"></script>
    </head>
    <body>
        <div class="titlebgadmin"><label class="titleinadmin">copeLA</label><sup class="titlereginadmin">&reg</sup>
        <form method="POST" action="seditingproduct.php" onsubmit="return editproductform2()">
            <div align="left" style="padding:6px; float:left"><input type="submit" name="submit12" value="Back"></div>
            <div align="right" style="padding:6px;"><input type="submit" name="submit12" value="Logout"></div>
            <div align="center" style="padding-top:60px">
                <fieldset class="fieldset-auto-width">
                    <legend class="addemptitle">Edit Product</legend>
                    <table class="tableinaddemp">                        
                        <tr><td class="padinaddemptable">Product Name</td>
                            <td class="padinaddemptable"><input type="text" placeholder="product name please*" id="editproductname" name="editproductname" class="inputfieldsinaddemp" maxlength="50" value="'.$rows['productName'].'"/></td></tr>
                        <tr><td class="padinaddemptable">Product Description</td>
                            <td class="padinaddemptable"><textarea id="editproductdescription" name="editproductdescription" class="inputfieldsinaddemp" rows="4" cols="30">'.$rows['productDescription'].'</textarea></td></tr>
                        <tr><td class="padinaddemptable">Product Image 1</td>
                            <td class="padinaddemptable"><input type="text" placeholder="image1 url please*" id="editimageurl" name="editimageurl" class="inputfieldsinaddemp" value="'.$rows['productImage'].'"/></td></tr>                        
                        <tr><td class="padinaddemptable">Product Image 2</td>
                            <td class="padinaddemptable"><input type="text" placeholder="image2 url please*" id="editimageurl2" name="editimageurl2" class="inputfieldsinaddemp" value="'.$rows['productImage2'].'"/></td></tr>                        
                        <tr><td class="padinaddemptable">Product Image 3</td>
                            <td class="padinaddemptable"><input type="text" placeholder="image3 url please*" id="editimageurl3" name="editimageurl3" class="inputfieldsinaddemp" value="'.$rows['productImage3'].'"/></td></tr>                        
                        <tr><td class="padinaddemptable">Product Image 4</td>
                            <td class="padinaddemptable"><input type="text" placeholder="image4 url please*" id="editimageurl4" name="editimageurl4" class="inputfieldsinaddemp" value="'.$rows['productImage4'].'"/></td></tr>
                        <tr><td class="padinaddemptable">Product Category ID</td>
                            <td class="padinaddemptable">
                            <select id="editproductcategoryid" name="editproductcategoryid" class="inputfieldsinaddemp">';
                                $sql1 = "select categoryId from productcategory";
                                $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
                                if(!$con){die('Could not be able to connect to  mysql');}
                                mysql_select_db('hwdb', $con);
                                $res1 = mysql_query($sql1);
                                while ($rows1 = mysql_fetch_assoc($res1)){
                                        $resultlist1[] = $rows1;
                                }                                
                                foreach ($resultlist1 as $id) {
                                    if($rows['productCategoryId'] == $id['categoryId']){
                                        echo "<option value=".$id['categoryId']." selected>".$id['categoryId']."</option>";
                                    }
                                    else{
                                        echo "<option value=".$id['categoryId'].">".$id['categoryId']."</option>";
                                    }
                                } 
                       echo'</select></td></tr>
                        <tr><td class="padinaddemptable">Product Price</td>
                            <td class="padinaddemptable"><input type="number" placeholder="price please*" id="editproductprice" name="editproductprice" class="inputfieldsinaddemp" value="'.$rows['productPrice'].'" step="any"/></td></tr>
                        <input type="text" name="inputproductid" id="inputproductid" value="'.$val.'" hidden/>
                        <tr><td></td><td class="padinaddemptable"><input type="submit" value="Edit this product" name="editproduct" id="editproduct" style="width:125px"/></td></tr> 
                        <span style="color:red">
                        <label id="editproductnameerror" ></label>
                        <label id="editproductdescriptionerror" ></label>   
                        <label id="editproductimageerror" ></label>
                        <label id="editproductpriceerror" ></label> </span>  
                    </table>
                </fieldset>
            </div>
        </form>
    </body>
</html>';
}
?>
