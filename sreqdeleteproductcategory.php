<?php
session_start();
    require "validatesalesmanager.php";
    $sql= "select * from productcategory";
    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){ echo "no con";
        die('Could not be able to connect to  mysql');}
    mysql_select_db('hwdb', $con);
    $res = mysql_query($sql);
    if((mysql_num_rows($res))==0){$errmsg='Invalid login'; echo "no rows";}//no rows retrieved. bad login
    else{
        while ($rows = mysql_fetch_assoc($res)){
            $resultlist[] = $rows;
        }
        require "sdeleteproductcategory.html";
        $k = 0;
        foreach ($resultlist as $rows) {
            echo '<tr><td><input type="checkbox" name="delete[]" id="'.$k.'" value="'.$rows['categoryId'].'"/></td>';
            echo "<td>".$rows['categoryId']."</td>";
            echo "<td>".$rows['categoryName']."</td>";
            echo "<td>".$rows['categoryDescription']."</td>";
            echo "<td>".$rows['categoryImage']."</td></tr>";
            $k++;
        }
        echo '</tbody></table></div>
            <div align="center" style="padding:10px"><input type="submit" value="Delete" class="deleteuserbutton" onclick="return deleteproductcategoryform('.$k.')"/></div>
        </form><div align="center" style="padding:10px"><span style="color:red"><label id="deleteerror" ></label></span></div></body></html>';
    }
?>
