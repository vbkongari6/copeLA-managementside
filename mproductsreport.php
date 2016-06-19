<?php
    session_start();
    require "validatemanager.php";
    $sql= "select * from product";
    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){ echo "no con";
        die('Could not be able to connect to  mysql');}
    mysql_select_db('hwdb', $con);
    $res = mysql_query($sql);
    if((mysql_num_rows($res))==0){require "mproductsreport.html"; echo "no rows";}//no rows retrieved. bad login
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
?>           
