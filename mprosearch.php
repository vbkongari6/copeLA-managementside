<?php
    session_start();
    require "validatemanager.php";
    $prodname = $_POST['productname'];
    $categid = $_POST['categoryid'];
    $min = $_POST['minprice'];
    $max = $_POST['maxprice'];
    $var19 = $_POST['submit19'];

    if($var19 == 'Back'){
        require "mgrhp.php";
        exit;}
    elseif($var19 == 'Logout'){
        session_destroy();
        require "login.php";
        exit;}

    if(strlen(trim($prodname))==0 && strlen(trim($categid))==0 && strlen(trim($min))==0 && strlen(trim($max))==0){
        require 'mproductsreport.php';
    }

    if(strlen(trim($prodname))>0){
        $sql= "select * from product where productName like '%".$prodname."%';";
        $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
        if(!$con){ echo "no con";
            die('Could not be able to connect to  mysql');}
        mysql_select_db('hwdb', $con);
        $res = mysql_query($sql);
        if((mysql_num_rows($res))==0){require "mproductsreport.html"; echo "<div style='color:red; padding:6px'>No Products with such letters in its name.</div>";}//no rows retrieved. bad login
        else{
            while ($rows = mysql_fetch_assoc($res)){
                $resultlist[] = $rows;
            }
            require "mproductsreport.html";
            foreach ($resultlist as $rows) {
                echo "<td>".$rows['productId']."</td>";
                echo "<td>".$rows['productName']."</td>";
                echo "<td>".$rows['productDescription']."</td>";
                echo "<td>".$rows['productImage']."</td>";
                echo "<td>".$rows['productCategoryId']."</td>";
                echo "<td>".$rows['productPrice']."</td></tr>";
            }
            echo '</tbody></table></div>            
            <div align="center"><span style="color:red"><label id="editerror"></label></style></div></body></html>';
        }
    }

    if(strlen(trim($categid))>0){
        $sql= "select * from product where productCategoryId like '%".$categid."%';";
        $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
        if(!$con){ echo "no con";
            die('Could not be able to connect to  mysql');}
        mysql_select_db('hwdb', $con);
        $res = mysql_query($sql);
        if((mysql_num_rows($res))==0){require "mproductsreport.html"; echo "<div style='color:red; padding:6px'>No Products with such id.</div>";}//no rows retrieved. bad login
        else{
            while ($rows = mysql_fetch_assoc($res)){
                $resultlist[] = $rows;
            }
            require "mproductsreport.html";
            foreach ($resultlist as $rows) {
                echo "<td>".$rows['productId']."</td>";
                echo "<td>".$rows['productName']."</td>";
                echo "<td>".$rows['productDescription']."</td>";
                echo "<td>".$rows['productImage']."</td>";
                echo "<td>".$rows['productCategoryId']."</td>";
                echo "<td>".$rows['productPrice']."</td></tr>";
            }
            echo '</tbody></table></div>            
            <div align="center"><span style="color:red"><label id="editerror"></label></style></div></body></html>';
        }
    }


    elseif(strlen(trim($min))>0 && strlen(trim($max))==0){
        $sql= "select * from product where productPrice >= ".$min.";";
        $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
        if(!$con){ echo "no con";
            die('Could not be able to connect to  mysql');}
        mysql_select_db('hwdb', $con);
        $res = mysql_query($sql);
        if((mysql_num_rows($res))==0){require "mproductsreport.html"; echo "<div style='color:red; padding:6px'>No product with such price</div>";}//no rows 
        else{
            while ($rows = mysql_fetch_assoc($res)){
                $resultlist[] = $rows;
            }
            require "mproductsreport.html";
            foreach ($resultlist as $rows) {
                echo "<td>".$rows['productId']."</td>";
                echo "<td>".$rows['productName']."</td>";
                echo "<td>".$rows['productDescription']."</td>";
                echo "<td>".$rows['productImage']."</td>";
                echo "<td>".$rows['productCategoryId']."</td>";
                echo "<td>".$rows['productPrice']."</td></tr>";
            }
            echo '</tbody></table></div>            
            <div align="center"><span style="color:red"><label id="editerror"></label></style></div></body></html>';
        }
    }

    elseif(strlen(trim($min))==0 && strlen(trim($max))>0){
        $sql= "select * from product where productPrice <= ".$max.";";
        $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
        if(!$con){ echo "no con";
            die('Could not be able to connect to  mysql');}
        mysql_select_db('hwdb', $con);
        $res = mysql_query($sql);
        if((mysql_num_rows($res))==0){require "mproductsreport.html"; echo "<div style='color:red; padding:6px'>No Product with such price</div>";}//no rows 
        else{
            while ($rows = mysql_fetch_assoc($res)){
                $resultlist[] = $rows;
            }
            require "mproductsreport.html";
            foreach ($resultlist as $rows) {
                echo "<td>".$rows['productId']."</td>";
                echo "<td>".$rows['productName']."</td>";
                echo "<td>".$rows['productDescription']."</td>";
                echo "<td>".$rows['productImage']."</td>";
                echo "<td>".$rows['productCategoryId']."</td>";
                echo "<td>".$rows['productPrice']."</td></tr>";
            }
            echo '</tbody></table></div>            
            <div align="center"><span style="color:red"><label id="editerror"></label></style></div></body></html>';
        }
    }

    elseif(strlen(trim($min))>0 && strlen(trim($max))>0){
        $sql= "select * from product where productPrice between ".$min." and ".$max.";";
        $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
        if(!$con){ echo "no con";
            die('Could not be able to connect to  mysql');}
        mysql_select_db('hwdb', $con);
        $res = mysql_query($sql);
        if((mysql_num_rows($res))==0){require "mproductsreport.html"; echo "<div style='color:red; padding:6px'>No Product with such Price</div>";}//no rows 
        else{
            while ($rows = mysql_fetch_assoc($res)){
                $resultlist[] = $rows;
            }
            require "mproductsreport.html";
            foreach ($resultlist as $rows) {
                echo "<td>".$rows['productId']."</td>";
                echo "<td>".$rows['productName']."</td>";
                echo "<td>".$rows['productDescription']."</td>";
                echo "<td>".$rows['productImage']."</td>";
                echo "<td>".$rows['productCategoryId']."</td>";
                echo "<td>".$rows['productPrice']."</td></tr>";
            }
            echo '</tbody></table></div>            
            <div align="center"><span style="color:red"><label id="editerror"></label></style></div></body></html>';
        }
    }
?>           
