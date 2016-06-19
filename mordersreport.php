<?php
    session_start();
   require "validatemanager.php";
    $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId group by pc.categoryName order by sum(od.price), pc.categoryName DESC";
    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){ echo "no con";
        die('Could not be able to connect to  mysql');}
    mysql_select_db('hwdb', $con);
    $res = mysql_query($sql);
    if((mysql_num_rows($res))==0){require "mordersreport.html"; echo "no rows";}//no rows retrieved. bad login
    else{
        while ($rows = mysql_fetch_assoc($res)){
            $resultlist[] = $rows;
        }
        require "mordersreport.html";
        foreach ($resultlist as $rows) {
            echo "<td>".$rows['orderId']."</td>";
            echo "<td>".$rows['orderDate']."</td>";
            echo "<td>".$rows['sum']."</td>";
            echo "<td>".$rows['orderprice']."</td>";
            echo "<td>".$rows['categoryName']."</td>";
            echo "<td>".$rows['productName']."</td>";
            echo "<td>".$rows['quantity']."</td>";
            echo "<td>".$rows['price']."</td></tr>";
        }
        echo '</tbody></table></div>
            
        <div align="center"><span style="color:red"><label id="editerror"></label></style></div></body></html>';
    }
?>
