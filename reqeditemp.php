<?php
    session_start();
    require "validateadmin.php";
    $sql= "select * from users";
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
        require "editemployee.html";
        $k = 0;
        foreach ($resultlist as $rows) {
            echo '<tr><td><input type="radio" name="edit" id="'.$k.'" value="'.$rows['username'].'"/></td>';
            echo "<td>".$rows['username']."</td>";
            echo "<td>".$rows['password']."</td>";
            echo "<td>".$rows['firstname']."</td>";
            echo "<td>".$rows['lastname']."</td>";
            echo "<td>".$rows['age']."</td>";
            echo "<td>".$rows['usertype']."</td>";
            echo "<td>".$rows['salary']."</td></tr>";
            $k++;
        }
        echo '</tbody></table></div>
            <div align="center" style="padding:10px"><input type="submit" class="edituserbutton" value="Edit this user" onclick="return editemployeepageform1()"/></div>
        </form><div align="center"><span style="color:red"><label id="editerror"></span></div></label></body></html>';
    }
?>
