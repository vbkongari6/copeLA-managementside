<?php
    session_start();
    require "validatemanager.php";
    
    $prodname = $_POST['productname'];
    $categid = $_POST['categoryid'];
    $min = $_POST['minprice'];
    $max = $_POST['maxprice'];
    $minidiscount = $_POST['mindiscount'];
    $maxidiscount = $_POST['maxdiscount'];
    $starts = $_POST['startdate'];
    $ends = $_POST['enddate'];
    $var20 = $_POST['submit20'];

    if($var20 == 'Back'){
        require "mgrhp.php";
        exit;}
    elseif($var20 == 'Logout'){
        session_destroy();
        require "login.php";
        exit;}

    if(strlen(trim($prodname))==0 && strlen(trim($categid))==0 && strlen(trim($min))==0 && strlen(trim($max))==0 && strlen(trim($minidiscount))==0 && strlen(trim($maxidiscount))==0 && strlen(trim($starts))==0 && strlen(trim($ends))==0 ){
        require 'msalesreport.php';
    }

    if(strlen(trim($prodname))>0){
        $sql= "select s.saleId, p.productName, s.productId, p.productCategoryId, p.productPrice, s.discountPercentage, s.startDate, s.endDate from specialsales s inner join product p on s.productId = p.productId where p.productName like '%".$prodname."%'";
        $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
        if(!$con){ echo "no con";
            die('Could not be able to connect to  mysql');}
        mysql_select_db('hwdb', $con);
        $res = mysql_query($sql);
        if((mysql_num_rows($res))==0){require "msalesreport.html"; echo "<div style='color:red; padding:6px'>No Speical Sale Products with such letters in its name.</div>";}//no rows retrieved. bad login
        else{
            while ($rows = mysql_fetch_assoc($res)){
                $resultlist[] = $rows;
            }
            require "msalesreport.html";
            foreach ($resultlist as $rows) {
                echo "<td>".$rows['saleId']."</td>";
                echo "<td>".$rows['productName']."</td>";
                echo "<td>".$rows['productId']."</td>";
                echo "<td>".$rows['productCategoryId']."</td>";
                echo "<td>".$rows['productPrice']."</td>";
                echo "<td>".$rows['discountPercentage']."</td>";
                echo "<td>".$rows['startDate']."</td>";
                echo "<td>".$rows['endDate']."</td></tr>";
            }
            echo '</tbody></table></div>            
            <div align="center"><span style="color:red"><label id="editerror"></label></style></div></body></html>';
        }
    }

    if(strlen(trim($categid))>0){
        $sql= "select s.saleId, p.productName, s.productId, p.productCategoryId, p.productPrice, s.discountPercentage, s.startDate, s.endDate from specialsales s inner join product p on s.productId = p.productId where p.productCategoryId like '%".$categid."%';";
        $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
        if(!$con){ echo "no con";
            die('Could not be able to connect to  mysql');}
        mysql_select_db('hwdb', $con);
        $res = mysql_query($sql);
        if((mysql_num_rows($res))==0){require "msalesreport.html"; echo "<div style='color:red; padding:6px'>No Products with such id in special sale.</div>";}//no rows retrieved. bad login
        else{
            while ($rows = mysql_fetch_assoc($res)){
                $resultlist[] = $rows;
            }
            require "msalesreport.html";
            foreach ($resultlist as $rows) {
                echo "<td>".$rows['saleId']."</td>";
                echo "<td>".$rows['productName']."</td>";
                echo "<td>".$rows['productId']."</td>";
                echo "<td>".$rows['productCategoryId']."</td>";
                echo "<td>".$rows['productPrice']."</td>";
                echo "<td>".$rows['discountPercentage']."</td>";
                echo "<td>".$rows['startDate']."</td>";
                echo "<td>".$rows['endDate']."</td></tr>";
            }
            echo '</tbody></table></div>            
            <div align="center"><span style="color:red"><label id="editerror"></label></style></div></body></html>';
        }
    }


    elseif(strlen(trim($min))>0 && strlen(trim($max))==0){
        $sql= "select s.saleId, p.productName, s.productId, p.productCategoryId, p.productPrice, s.discountPercentage, s.startDate, s.endDate from specialsales s inner join product p on s.productId = p.productId where p.productPrice >= ".$min.";";
        $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
        if(!$con){ echo "no con";
            die('Could not be able to connect to  mysql');}
        mysql_select_db('hwdb', $con);
        $res = mysql_query($sql);
        if((mysql_num_rows($res))==0){require "msalesreport.html"; echo "<div style='color:red; padding:6px'>No product with such price</div>";}//no rows 
        else{
            while ($rows = mysql_fetch_assoc($res)){
                $resultlist[] = $rows;
            }
            require "msalesreport.html";
            foreach ($resultlist as $rows) {
                echo "<td>".$rows['saleId']."</td>";
                echo "<td>".$rows['productName']."</td>";
                echo "<td>".$rows['productId']."</td>";
                echo "<td>".$rows['productCategoryId']."</td>";
                echo "<td>".$rows['productPrice']."</td>";
                echo "<td>".$rows['discountPercentage']."</td>";
                echo "<td>".$rows['startDate']."</td>";
                echo "<td>".$rows['endDate']."</td></tr>";
            }
            echo '</tbody></table></div>            
            <div align="center"><span style="color:red"><label id="editerror"></label></style></div></body></html>';
        }
    }

    elseif(strlen(trim($min))==0 && strlen(trim($max))>0){
        $sql= "select s.saleId, p.productName, s.productId, p.productCategoryId, p.productPrice, s.discountPercentage, s.startDate, s.endDate from specialsales s inner join product p on s.productId = p.productId where p.productPrice <= ".$max.";";
        $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
        if(!$con){ echo "no con";
            die('Could not be able to connect to  mysql');}
        mysql_select_db('hwdb', $con);
        $res = mysql_query($sql);
        if((mysql_num_rows($res))==0){require "msalesreport.html"; echo "<div style='color:red; padding:6px'>No Product with such price</div>";}//no rows 
        else{
            while ($rows = mysql_fetch_assoc($res)){
                $resultlist[] = $rows;
            }
            require "msalesreport.html";
            foreach ($resultlist as $rows) {
                echo "<td>".$rows['saleId']."</td>";
                echo "<td>".$rows['productName']."</td>";
                echo "<td>".$rows['productId']."</td>";
                echo "<td>".$rows['productCategoryId']."</td>";
                echo "<td>".$rows['productPrice']."</td>";
                echo "<td>".$rows['discountPercentage']."</td>";
                echo "<td>".$rows['startDate']."</td>";
                echo "<td>".$rows['endDate']."</td></tr>";
            }
            echo '</tbody></table></div>            
            <div align="center"><span style="color:red"><label id="editerror"></label></style></div></body></html>';
        }
    }

    elseif(strlen(trim($min))>0 && strlen(trim($max))>0){
        $sql= "select s.saleId, p.productName, s.productId, p.productCategoryId, p.productPrice, s.discountPercentage, s.startDate, s.endDate from specialsales s inner join product p on s.productId = p.productId where p.productPrice between ".$min." and ".$max.";";
        $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
        if(!$con){ echo "no con";
            die('Could not be able to connect to  mysql');}
        mysql_select_db('hwdb', $con);
        $res = mysql_query($sql);
        if((mysql_num_rows($res))==0){require "msalesreport.html"; echo "<div style='color:red; padding:6px'>No Product with such Price</div>";}//no rows 
        else{
            while ($rows = mysql_fetch_assoc($res)){
                $resultlist[] = $rows;
            }
            require "msalesreport.html";
            foreach ($resultlist as $rows) {
                echo "<td>".$rows['saleId']."</td>";
                echo "<td>".$rows['productName']."</td>";
                echo "<td>".$rows['productId']."</td>";
                echo "<td>".$rows['productCategoryId']."</td>";
                echo "<td>".$rows['productPrice']."</td>";
                echo "<td>".$rows['discountPercentage']."</td>";
                echo "<td>".$rows['startDate']."</td>";
                echo "<td>".$rows['endDate']."</td></tr>";
            }
            echo '</tbody></table></div>            
            <div align="center"><span style="color:red"><label id="editerror"></label></style></div></body></html>';
        }
    }

    elseif(strlen(trim($minidiscount))>0 && strlen(trim($maxidiscount))==0){
        $sql= "select s.saleId, p.productName, s.productId, p.productCategoryId, p.productPrice, s.discountPercentage, s.startDate, s.endDate from specialsales s inner join product p on s.productId = p.productId where s.discountPercentage >= ".$minidiscount.";";
        $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
        if(!$con){ echo "no con";
            die('Could not be able to connect to  mysql');}
        mysql_select_db('hwdb', $con);
        $res = mysql_query($sql);
        if((mysql_num_rows($res))==0){require "msalesreport.html"; echo "<div style='color:red; padding:6px'>No product with in such discount range</div>";}//no rows 
        else{
            while ($rows = mysql_fetch_assoc($res)){
                $resultlist[] = $rows;
            }
            require "msalesreport.html";
            foreach ($resultlist as $rows) {
                echo "<td>".$rows['saleId']."</td>";
                echo "<td>".$rows['productName']."</td>";
                echo "<td>".$rows['productId']."</td>";
                echo "<td>".$rows['productCategoryId']."</td>";
                echo "<td>".$rows['productPrice']."</td>";
                echo "<td>".$rows['discountPercentage']."</td>";
                echo "<td>".$rows['startDate']."</td>";
                echo "<td>".$rows['endDate']."</td></tr>";
            }
            echo '</tbody></table></div>            
            <div align="center"><span style="color:red"><label id="editerror"></label></style></div></body></html>';
        }
    }

    elseif(strlen(trim($minidiscount))==0 && strlen(trim($maxidiscount))>0){
        $sql= "select s.saleId, p.productName, s.productId, p.productCategoryId, p.productPrice, s.discountPercentage, s.startDate, s.endDate from specialsales s inner join product p on s.productId = p.productId where s.discountPercentage <= ".$maxidiscount.";";
        $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
        if(!$con){ echo "no con";
            die('Could not be able to connect to  mysql');}
        mysql_select_db('hwdb', $con);
        $res = mysql_query($sql);
        if((mysql_num_rows($res))==0){require "msalesreport.html"; echo "<div style='color:red; padding:6px'>No Product with in such discount range</div>";}//no rows 
        else{
            while ($rows = mysql_fetch_assoc($res)){
                $resultlist[] = $rows;
            }
            require "msalesreport.html";
            foreach ($resultlist as $rows) {
                echo "<td>".$rows['saleId']."</td>";
                echo "<td>".$rows['productName']."</td>";
                echo "<td>".$rows['productId']."</td>";
                echo "<td>".$rows['productCategoryId']."</td>";
                echo "<td>".$rows['productPrice']."</td>";
                echo "<td>".$rows['discountPercentage']."</td>";
                echo "<td>".$rows['startDate']."</td>";
                echo "<td>".$rows['endDate']."</td></tr>";
            }
            echo '</tbody></table></div>            
            <div align="center"><span style="color:red"><label id="editerror"></label></style></div></body></html>';
        }
    }

    elseif(strlen(trim($minidiscount))>0 && strlen(trim($maxidiscount))>0){
        $sql= "select s.saleId, p.productName, s.productId, p.productCategoryId, p.productPrice, s.discountPercentage, s.startDate, s.endDate from specialsales s inner join product p on s.productId = p.productId where s.discountPercentage between ".$minidiscount." and ".$maxidiscount.";";
        $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
        if(!$con){ echo "no con";
            die('Could not be able to connect to  mysql');}
        mysql_select_db('hwdb', $con);
        $res = mysql_query($sql);
        if((mysql_num_rows($res))==0){require "msalesreport.html"; echo "<div style='color:red; padding:6px'>No Product with in such discount range</div>";}//no rows 
        else{
            while ($rows = mysql_fetch_assoc($res)){
                $resultlist[] = $rows;
            }
            require "msalesreport.html";
            foreach ($resultlist as $rows) {
                echo "<td>".$rows['saleId']."</td>";
                echo "<td>".$rows['productName']."</td>";
                echo "<td>".$rows['productId']."</td>";
                echo "<td>".$rows['productCategoryId']."</td>";
                echo "<td>".$rows['productPrice']."</td>";
                echo "<td>".$rows['discountPercentage']."</td>";
                echo "<td>".$rows['startDate']."</td>";
                echo "<td>".$rows['endDate']."</td></tr>";
            }
            echo '</tbody></table></div>            
            <div align="center"><span style="color:red"><label id="editerror"></label></style></div></body></html>';
        }
    }

    elseif(strlen(trim($starts))>0){
        $sql= "select s.saleId, p.productName, s.productId, p.productCategoryId, p.productPrice, s.discountPercentage, s.startDate, s.endDate from specialsales s inner join product p on s.productId = p.productId where s.startDate >= '".$starts."';";
        $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
        if(!$con){ echo "no con";
            die('Could not be able to connect to  mysql');}
        mysql_select_db('hwdb', $con);
        $res = mysql_query($sql);
        if((mysql_num_rows($res))==0){require "msalesreport.html"; echo "<div style='color:red; padding:6px'>No Product special sale after the date specified.</div>";}//no rows 
        else{
            while ($rows = mysql_fetch_assoc($res)){
                $resultlist[] = $rows;
            }
            require "msalesreport.html";
            foreach ($resultlist as $rows) {
                echo "<td>".$rows['saleId']."</td>";
                echo "<td>".$rows['productName']."</td>";
                echo "<td>".$rows['productId']."</td>";
                echo "<td>".$rows['productCategoryId']."</td>";
                echo "<td>".$rows['productPrice']."</td>";
                echo "<td>".$rows['discountPercentage']."</td>";
                echo "<td>".$rows['startDate']."</td>";
                echo "<td>".$rows['endDate']."</td></tr>";
            }
            echo '</tbody></table></div>            
            <div align="center"><span style="color:red"><label id="editerror"></label></style></div></body></html>';
        }
    }

    elseif(strlen(trim($ends))>0){
        $sql= "select s.saleId, p.productName, s.productId, p.productCategoryId, p.productPrice, s.discountPercentage, s.startDate, s.endDate from specialsales s inner join product p on s.productId = p.productId where s.startDate <= '".$ends."';";
        $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
        if(!$con){ echo "no con";
            die('Could not be able to connect to  mysql');}
        mysql_select_db('hwdb', $con);
        $res = mysql_query($sql);
        if((mysql_num_rows($res))==0){require "msalesreport.html"; echo "<div style='color:red; padding:6px'>No Product special sale after the date specified.</div>";}//no rows 
        else{
            while ($rows = mysql_fetch_assoc($res)){
                $resultlist[] = $rows;
            }
            require "msalesreport.html";
            foreach ($resultlist as $rows) {
                echo "<td>".$rows['saleId']."</td>";
                echo "<td>".$rows['productName']."</td>";
                echo "<td>".$rows['productId']."</td>";
                echo "<td>".$rows['productCategoryId']."</td>";
                echo "<td>".$rows['productPrice']."</td>";
                echo "<td>".$rows['discountPercentage']."</td>";
                echo "<td>".$rows['startDate']."</td>";
                echo "<td>".$rows['endDate']."</td></tr>";
            }
            echo '</tbody></table></div>            
            <div align="center"><span style="color:red"><label id="editerror"></label></style></div></body></html>';
        }
    }

?>           
