<?php
session_start();
    require "validatesalesmanager.php";
    $sql= "select * from product";
    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){ echo "no con";
        die('Could not be able to connect to  mysql');}
    mysql_select_db('hwdb', $con);
    $res = mysql_query($sql);
    if((mysql_num_rows($res))==0){require "sdeleteproduct.html"; echo "<div align='center'>No products available to delete</div>";}//no rows retrieved. bad login
    else{
        while ($rows = mysql_fetch_assoc($res)){
            $resultlist[] = $rows;
        }
        require "sdeleteproduct.html";
        $k = 0;
        foreach ($resultlist as $rows) {
            echo '<tr><td><input type="checkbox" name="delete[]" id="'.$k.'" value="'.$rows['productId'].'"/></td>';
            echo "<td>".$rows['productId']."</td>";
            echo "<td>".$rows['productName']."</td>";
            echo "<td>".$rows['productDescription']."</td>";
            echo "<td>".$rows['productImage']."</td>";
            echo "<td>".$rows['productCategoryId']."</td>";
            echo "<td>".$rows['productPrice']."</td></tr>";
            $k++;
        }
        echo '</tbody></table></div>
            <div align="center" style="padding:10px"><input type="submit" value="Delete" onclick="return deleteproductform('.$k.')"/></div>
        </form><div align="center" style="padding:10px"><label id="deleteerror" style="color:red"></label></div></body></html>';
    }
?>
