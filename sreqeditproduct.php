<?php
session_start();
    require "validatesalesmanager.php";
    $sql= "select * from product";
    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){ echo "no con";
        die('Could not be able to connect to  mysql');}
    mysql_select_db('hwdb', $con);
    $res = mysql_query($sql);
    if((mysql_num_rows($res))==0){require "seditproduct.html"; echo "<div align='center'>No Products available to edit</div>";}//no rows retrieved. bad login
    else{
        while ($rows = mysql_fetch_assoc($res)){
            $resultlist[] = $rows;
        }
        require "seditproduct.html";
        $k = 0;
        foreach ($resultlist as $rows) {
            echo '<tr><td><input type="radio" name="edit" id="'.$k.'" value="'.$rows['productId'].'"/></td>';
            echo "<td>".$rows['productId']."</td>";
            echo "<td>".$rows['productName']."</td>";
            echo "<td>".$rows['productDescription']."</td>";
            echo "<td>".$rows['productImage']."</td>";
            echo "<td>".$rows['productImage2']."</td>";
            echo "<td>".$rows['productImage3']."</td>";
            echo "<td>".$rows['productImage4']."</td>";
            echo "<td>".$rows['productCategoryId']."</td>";
            echo "<td>".$rows['productPrice']."</td></tr>";
            $k++;
        }
        echo '</tbody></table></div>
            <div align="center" style="padding:10px"><input type="submit" value="Edit this product" class="edituserbutton" onclick="return editproductform1()"/></div>
        </form><div align="center"><label id="editerror" style="color:red"></label></div></body></html>';
    }
?>
