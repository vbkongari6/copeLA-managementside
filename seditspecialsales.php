<?php
session_start();
require "validatesalesmanager.php";
$val = $_POST['edit'];
$errrmsg = "";
$var13 = $_POST['submit13'];

if($var13 == 'Back'){
    require "smgrhp.php";
    exit;}
elseif($var13 == 'Logout'){
    session_destroy();
    require "login.php";
    exit;}

if(strlen($val) > 0){
    $sql = "select * from specialsales where saleId = '".$val."';";
    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){die('Could not be able to connect to  mysql');}
    mysql_select_db('hwdb', $con);
    $res = mysql_query($sql);
    if((mysql_num_rows($res))==0){$errmsg='Invalid login'; echo "no rows";}
} 
else{$errrmsg = "--*You should select a sale to edit.--";}

if (strlen($errrmsg) > 0) {
    require "sreqeditspecialsales.php";
    echo '<div align="center"><label class="erradd">'.$errrmsg.'</label></div>';
}
elseif ($res){
    $rows = mysql_fetch_assoc($res);
    echo '<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Edit Special Sales Page</title>
        <link href="copela.css" type="text/css" rel="stylesheet"/>
        <script type="text/javascript" src="copela.js"></script>
    </head>
    <body>
        <div class="titlebgadmin"><label class="titleinadmin">copeLA</label><sup class="titlereginadmin">&reg</sup>
        <form method="POST" action="seditingspecialsales.php" onsubmit="return editspecialsalesform2()">
            <div align="left" style="padding:6px; float:left"><input type="submit" name="submit14" value="Back"></div>
            <div align="right" style="padding:6px;"><input type="submit" name="submit14" value="Logout"></div>
            <div align="center" style="padding-top:60px">
                <fieldset class="fieldset-auto-width">
                    <legend class="addemptitle">Edit Special Sale</legend>
                    <table class="tableinaddemp">
                        <tr><td class="padinaddemptable">Start Date</td>
                            <td class="padinaddemptable"><input type="date" id="editstartdate" name="editstartdate" class="inputfieldsinaddemp" value="'.$rows['startDate'].'"/></td></tr>
                        <tr><td class="padinaddemptable">End Date</td>
                            <td class="padinaddemptable"><input type="date" id="editenddate" name="editenddate" class="inputfieldsinaddemp" value="'.$rows['endDate'].'"/></td></tr>
                        <tr><td class="padinaddemptable">Price Discout %</td>
                            <td class="padinaddemptable"><input type="number" placeholder="discount % please*" id="editdiscount%" name="editdiscount%" class="inputfieldsinaddemp" value="'.$rows['discountPercentage'].'" step="any" min="0" max="70"/></td></tr>                  
                        <tr><td class="padinaddemptable">Product ID</td>
                            <td class="padinaddemptable">
                            <select id="editproductid" name="editproductid" class="inputfieldsinaddemp">';
                                $sql1 = "select productId from product";
                                $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
                                if(!$con){die('Could not be able to connect to  mysql');}
                                mysql_select_db('hwdb', $con);
                                $res1 = mysql_query($sql1);
                                while ($rows1 = mysql_fetch_assoc($res1)){
                                        $resultlist1[] = $rows1;
                                }                                
                                foreach ($resultlist1 as $id) {
                                    if($rows['productId'] == $id['productId']){
                                        echo "<option value=".$id['productId']." selected>".$id['productId']."</option>";
                                    }
                                    else{
                                        echo "<option value=".$id['productId'].">".$id['productId']."</option>";
                                    }
                                } 
                       echo'</select></td></tr>                                
                        <input type="text" name="inputsaleid" id="inputsaleid" value="'.$val.'" hidden/>
                        <tr><td></td><td class="padinaddemptable"><input type="submit" value="Edit this sale" name="editsale" id="editsale" style="width:100px"/></td></tr> 
                        <span style="color:red">
                        <label id="editstartdateerror" ></label>
                        <label id="editenddateerror" ></label>   
                        <label id="editcompdateerror" ></label>
                        <label id="editdiscounterror" ></label></span>        
                    </table>
                </fieldset>
            </div>
        </form>
    </body>
</html>';
}
?>
