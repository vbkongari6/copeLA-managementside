<?php
session_start();
    require "validatesalesmanager.php";
    $sql= "select * from productcategory";
    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){ echo "no con";
        die('Could not be able to connect to  mysql');}
    mysql_select_db('hwdb', $con);
    $res = mysql_query($sql);
    if((mysql_num_rows($res))==0){require "seditproductcategory.html"; echo "<div align='center'>no rows</div>";}//no rows retrieved. bad login
    else{
        while ($rows = mysql_fetch_assoc($res)){
            $resultlist[] = $rows;
        }
        require "seditproductcategory.html";
        $k = 0;
        foreach ($resultlist as $rows) {
            echo '<tr><td><input type="radio" name="edit" id="'.$k.'" value="'.$rows['categoryId'].'"/></td>';
            echo "<td>".$rows['categoryId']."</td>";
            echo "<td>".$rows['categoryName']."</td>";
            echo "<td>".$rows['categoryDescription']."</td>";
            echo "<td>".$rows['categoryImage']."</td></tr>";
            $k++;
        }
        echo '</tbody></table></div>
            <div align="center" style="padding:10px"><input type="submit" value="Edit this product category" class="edituserbutton" onclick="return editproductcategoryform1()"/></div>
        </form><div align="center"><span style="color:red"><label id="editerror"></label></style></div></body></html>';
    }
?>
