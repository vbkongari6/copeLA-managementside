<?php
    session_start();
    require "validatemanager.php";
    $employeetype = $_POST['emptype'];
    $min = $_POST['minpay'];
    $max = $_POST['maxpay'];
    $var18 = $_POST['submit18'];

    if($var18 == 'Back'){
        require "mgrhp.php";
        exit;}
    elseif($var18 == 'Logout'){
        session_destroy();
        require "login.php";
        exit;}
        
        if(strlen(trim($employeetype))==0 && strlen(trim($min))==0 && strlen(trim($max))==0){
            require 'memployeereport.php';
        }

    if(strlen(trim($employeetype))>0){
        $sql= "select * from users where usertype='".$employeetype."';";
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
            require "memployeereport.html";
            foreach ($resultlist as $rows) {
                //echo '<tr><td><input type="radio" name="edit" id="'.$k.'" value="'.$rows['categoryId'].'"/></td>';
                echo "<td>".$rows['firstname']."</td>";
                echo "<td>".$rows['lastname']."</td>";
                echo "<td>".$rows['age']."</td>";
                echo "<td>".$rows['usertype']."</td>";
                echo "<td>".$rows['salary']."</td>";
                echo "<td>".$rows['username']."</td>";
                echo "<td>".$rows['password']."</td></tr>";
            }
            echo '</tbody></table></div>            
            <div align="center"><span style="color:red"><label id="editerror"></label></style></div></body></html>';
        }
    }


    elseif(strlen(trim($min))>0 && strlen(trim($max))==0){
        $sql= "select * from users where salary >= ".$min.";";
        $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
        if(!$con){ echo "no con";
            die('Could not be able to connect to  mysql');}
        mysql_select_db('hwdb', $con);
        $res = mysql_query($sql);
        if((mysql_num_rows($res))==0){require "memployeereport.html"; echo "<div style='color:red; padding:6px'>No employee with such salary</div>";}//no rows 
        else{
            while ($rows = mysql_fetch_assoc($res)){
                $resultlist[] = $rows;
            }
            require "memployeereport.html";
            foreach ($resultlist as $rows) {
                echo "<td>".$rows['firstname']."</td>";
                echo "<td>".$rows['lastname']."</td>";
                echo "<td>".$rows['age']."</td>";
                echo "<td>".$rows['usertype']."</td>";
                echo "<td>".$rows['salary']."</td>";
                echo "<td>".$rows['username']."</td>";
                echo "<td>".$rows['password']."</td></tr>";
            }
            echo '</tbody></table></div>            
            <div align="center"><span style="color:red"><label id="editerror"></label></style></div></body></html>';
        }
    }

    elseif(strlen(trim($min))==0 && strlen(trim($max))>0){
        $sql= "select * from users where salary <= ".$max.";";
        $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
        if(!$con){ echo "no con";
            die('Could not be able to connect to  mysql');}
        mysql_select_db('hwdb', $con);
        $res = mysql_query($sql);
        if((mysql_num_rows($res))==0){require "memployeereport.html"; echo "<div style='color:red; padding:6px'>No employee with such salary</div>";}//no rows 
        else{
            while ($rows = mysql_fetch_assoc($res)){
                $resultlist[] = $rows;
            }
            require "memployeereport.html";
            foreach ($resultlist as $rows) {
                echo "<td>".$rows['firstname']."</td>";
                echo "<td>".$rows['lastname']."</td>";
                echo "<td>".$rows['age']."</td>";
                echo "<td>".$rows['usertype']."</td>";
                echo "<td>".$rows['salary']."</td>";
                echo "<td>".$rows['username']."</td>";
                echo "<td>".$rows['password']."</td></tr>";
            }
            echo '</tbody></table></div>            
            <div align="center"><span style="color:red"><label id="editerror"></label></style></div></body></html>';
        }
    }

    elseif(strlen(trim($min))>0 && strlen(trim($max))>0){
        $sql= "select * from users where salary between ".$min." and ".$max.";";
        $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
        if(!$con){ echo "no con";
            die('Could not be able to connect to  mysql');}
        mysql_select_db('hwdb', $con);
        $res = mysql_query($sql);
        if((mysql_num_rows($res))==0){require "memployeereport.html"; echo "<div style='color:red; padding:6px'>No employee with such salary</div>";}//no rows 
        else{
            while ($rows = mysql_fetch_assoc($res)){
                $resultlist[] = $rows;
            }
            require "memployeereport.html";
            foreach ($resultlist as $rows) {
                echo "<td>".$rows['firstname']."</td>";
                echo "<td>".$rows['lastname']."</td>";
                echo "<td>".$rows['age']."</td>";
                echo "<td>".$rows['usertype']."</td>";
                echo "<td>".$rows['salary']."</td>";
                echo "<td>".$rows['username']."</td>";
                echo "<td>".$rows['password']."</td></tr>";
            }
            echo '</tbody></table></div>            
            <div align="center"><span style="color:red"><label id="editerror"></label></style></div></body></html>';
        }
    }
?>           
