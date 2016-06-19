<?php
session_start();
    require "validatesalesmanager.php";
    $sql= "select * from specialsales";
    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){ echo "no con";
        die('Could not be able to connect to  mysql');}
    mysql_select_db('hwdb', $con);
    $res = mysql_query($sql);
    if((mysql_num_rows($res))==0){require "seditspecialsales.html"; echo "<div align='center'>No special sales available</div>";}//no rows retrieved. bad login
    else{
        while ($rows = mysql_fetch_assoc($res)){
            $resultlist[] = $rows;
        }
        require "seditspecialsales.html";
        $k = 0;
        foreach ($resultlist as $rows) {
            echo '<tr><td><input type="radio" name="edit" id="'.$k.'" value="'.$rows['saleId'].'"/></td>';
            echo "<td>".$rows['saleId']."</td>";
            echo "<td>".$rows['startDate']."</td>";
            echo "<td>".$rows['endDate']."</td>";
            echo "<td>".$rows['discountPercentage']."</td>";
            echo "<td>".$rows['productId']."</td></tr>";
            $k++;
        }
        echo '</tbody></table></div>
            <div align="center" style="padding:10px"><input type="submit" value="Edit this sale" class="edituserbutton" onclick="return editspecialsalesform1()"/></div>
        </form><div align="center"><label id="editerror"  style="color:red"></label></div></body></html>';
    }
?>
