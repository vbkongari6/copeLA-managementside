<?php
session_start();
require "validatesalesmanager.php";
$selectedproductid = $_POST['selectproductid'];
$startdate = $_POST['addstartdate'];
$enddate = $_POST['addenddate'];
$discount = $_POST['adddiscount%'];
$errormsg = "";
$var8 = $_POST['submit8'];

if($var8 == 'Back'){
    require "smgrhp.php";
    exit;}
elseif($var8 == 'Logout'){
    session_destroy();
    require "login.php";
    exit;}

if ( strlen(trim($selectedproductid)) == 0 || strlen(trim($startdate)) == 0 || strlen(trim($enddate)) == 0 || strlen(trim($discount)) == 0) { 
    $errormsg = "Sorry, must fill all fields! Try again :)"; 
}
if ( strlen(trim($selectedproductid)) == 0 && strlen(trim($startdate)) == 0 && strlen(trim($enddate)) == 0 && strlen(trim($discount)) == 0) {
    $errormsg = "";
}
if ( strlen(trim($selectedproductid)) > 0 && strlen(trim($startdate)) > 0 && strlen(trim($enddate)) > 0  && strlen($discount) > 0) {
    $sql = "insert into specialsales values (NULL, '".$startdate."', '".$enddate."', '".$discount."', '".$selectedproductid."')";
    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){die('Could not be able to connect to  mysql');}
    mysql_select_db('hwdb', $con);
    $res = mysql_query($sql);
}

if (strlen($errormsg) > 0) {
    $sql = "select productId from product";
    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){die('Could not be able to connect to  mysql');}
    mysql_select_db('hwdb', $con);
    $res = mysql_query($sql);
    while ($rows = mysql_fetch_assoc($res)){
            $resultlist[] = $rows;
    }
    require 'saddspecialsales.html';
    foreach ($resultlist as $id) {
        echo "<option value=".$id['productId'].">".$id['productId']."</option>";
    }
    require "saddspecialsales2.html";
    echo '<label class="erradd">'.$errormsg.'</label></span>
                </table>
            </fieldset>
        </div>        
        </form>
    </body>
</html>';    
}
elseif (!$res) {
    $sql = "select productId from product";
    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){die('Could not be able to connect to  mysql');}
    mysql_select_db('hwdb', $con);
    $res = mysql_query($sql);
    while ($rows = mysql_fetch_assoc($res)){
            $resultlist[] = $rows;
    }
    require 'saddspecialsales.html';
    foreach ($resultlist as $id) {
        echo "<option value=".$id['productId'].">".$id['productId']."</option>";
    }
    require "saddspecialsales2.html";
    echo '</span></table></fieldset></div></form></body></html>';
}
elseif ($res){
    $sql = "select productId from product";
    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){die('Could not be able to connect to  mysql');}
    mysql_select_db('hwdb', $con);
    $res = mysql_query($sql);
    while ($rows = mysql_fetch_assoc($res)){
            $resultlist[] = $rows;
    }
    require 'saddspecialsales.html';
    foreach ($resultlist as $id) {
        echo "<option value=".$id['productId'].">".$id['productId']."</option>";
    }
    require "saddspecialsales2.html";
    echo '<label class="successaddlabel">Successfully Added the Sale</label></span></table></fieldset></div></form></body></html>';
}
?>
