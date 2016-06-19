<?php
    session_start();
    require "validatemanager.php";
    
    $sql= "select saleId, productName, s.productId, productCategoryId, productPrice, discountPercentage, startDate, endDate from specialsales s inner join product p on s.productId = p.productId";
    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){ echo "no con";
        die('Could not be able to connect to  mysql');}
    mysql_select_db('hwdb', $con);
    $res = mysql_query($sql);
    if((mysql_num_rows($res))==0){require "msalesreport.html"; echo "<div align='center'>No special sales on any products</div>";}//no rows retrieved. bad login
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
?>           
