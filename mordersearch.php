<?php
    session_start();
    require "validatemanager.php";
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $productcategory = $_POST['productcategory'];
    $product = $_POST['product'];
    $specialsale = $_POST['specialsale'];
    $orderquantity = $_POST['orderquantity'];
    $price = $_POST['price'];
    $sortby = $_POST['sortby'];    
    
    $var19 = $_POST['submit19'];

    if($var19 == 'Back'){
        require "mgrhp.php";
        exit;}
    elseif($var19 == 'Logout'){
        session_destroy();
        require "login.php";
        exit;}

    if(strlen(trim($startdate))==0 && strlen(trim($enddate))==0 && strlen(trim($product))==0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))==0){
        require 'mordersreport.php';
    }

    if(strlen(trim($startdate))>0 || strlen(trim($enddate))>0 || strlen(trim($product))>0 || strlen(trim($specialsale))>0 || strlen(trim($orderquantity))>0){
        if ($sortby=="ASC"){
            if(strlen(trim($startdate))>0 && strlen(trim($enddate))>0 && strlen(trim($product))>0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId where o.orderDate between '".$startdate."' and '".$enddate."' group by pc.categoryName, p.productName order by o.orderDate, sum(od.quantity), sum(od.price), pc.categoryName, p.productName ASC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))>0 && strlen(trim($product))>0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))==0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId where o.orderDate between '".$startdate."' and '".$enddate."' group by pc.categoryName order by o.orderDate, sum(od.price), pc.categoryName, p.productName ASC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))>0 && strlen(trim($product))>0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId where o.orderDate between '".$startdate."' and '".$enddate."' group by pc.categoryName order by o.orderDate, sum(od.quantity), sum(od.price), pc.categoryName, p.productName ASC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))>0 && strlen(trim($product))>0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))==0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId where o.orderDate between '".$startdate."' and '".$enddate."' group by pc.categoryName order by o.orderDate, sum(od.price), pc.categoryName, p.productName ASC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))>0 && strlen(trim($product))==0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId where o.orderDate between '".$startdate."' and '".$enddate."' group by pc.categoryName order by o.orderDate, sum(od.quantity), sum(od.price), pc.categoryName ASC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))>0 && strlen(trim($product))==0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId where o.orderDate between '".$startdate."' and '".$enddate."' group by pc.categoryName order by o.orderDate, sum(od.quantity), sum(od.price), pc.categoryName ASC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))>0 && strlen(trim($product))==0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))==0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId where o.orderDate between '".$startdate."' and '".$enddate."' group by pc.categoryName order by o.orderDate, sum(od.price), pc.categoryName ASC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))>0 && strlen(trim($product))==0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))==0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId where o.orderDate between '".$startdate."' and '".$enddate."' group by pc.categoryName order by o.orderDate, sum(od.price), pc.categoryName ASC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))==0 && strlen(trim($product))>0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId where o.orderDate >= '".$startdate."' group by pc.categoryName, p.productName order by o.orderDate, sum(od.quantity), sum(od.price), pc.categoryName, p.productName ASC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))==0 && strlen(trim($product))>0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))==0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId where o.orderDate >= '".$startdate."' group by pc.categoryName, p.productName order by o.orderDate, sum(od.price), pc.categoryName, p.productName ASC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))==0 && strlen(trim($product))>0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId where o.orderDate >= '".$startdate."' group by pc.categoryName, p.productName order by o.orderDate, sum(od.price), sum(od.quantity), pc.categoryName, p.productName ASC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))==0 && strlen(trim($product))==0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId where o.orderDate >= '".$startdate."' group by pc.categoryName order by o.orderDate, sum(od.price), sum(od.quantity), pc.categoryName ASC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))==0 && strlen(trim($product))>0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))==0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId where o.orderDate >= '".$startdate."' group by pc.categoryName, p.productName order by o.orderDate, sum(od.price), pc.categoryName, p.productName ASC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))==0 && strlen(trim($product))==0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))==0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId where o.orderDate >= '".$startdate."' group by pc.categoryName order by o.orderDate, sum(od.price), pc.categoryName ASC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))==0 && strlen(trim($product))==0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId where o.orderDate >= '".$startdate."' group by pc.categoryName order by o.orderDate, sum(od.price), sum(od.quantity), pc.categoryName ASC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))==0 && strlen(trim($product))==0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))==0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId where o.orderDate>='".$startdate."' group by pc.categoryName, sum(od.price) order by o.orderDate, sum(od.price), pc.categoryName ASC;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))>0 && strlen(trim($product))>0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId where o.orderDate <= '".$enddate."' group by pc.categoryName, p.productName order by o.orderDate, sum(od.quantity), sum(od.price), pc.categoryName, p.productName ASC ;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))>0 && strlen(trim($product))>0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))==0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId where o.orderDate <= '".$enddate."' group by pc.categoryName, p.productName order by o.orderDate, sum(od.price), pc.categoryName, p.productName ASC ;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))>0 && strlen(trim($product))>0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId where o.orderDate <= '".$enddate."' group by pc.categoryName, p.productName order by o.orderDate, sum(od.quantity), sum(od.price), pc.categoryName, p.productName ASC ;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))>0 && strlen(trim($product))>0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))==0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId where o.orderDate <= '".$enddate."' group by pc.categoryName, p.productName order by o.orderDate, sum(od.price), pc.categoryName, p.productName ASC ;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))>0 && strlen(trim($product))==0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId where o.orderDate <= '".$enddate."' group by pc.categoryName order by o.orderDate, sum(od.quantity), sum(od.price), pc.categoryName ASC ;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))>0 && strlen(trim($product))==0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))==0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId where o.orderDate <= '".$enddate."' group by pc.categoryName order by o.orderDate, sum(od.price), pc.categoryName ASC ;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))>0 && strlen(trim($product))==0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId where o.orderDate <= '".$enddate."' group by pc.categoryName order by o.orderDate, sum(od.quantity), sum(od.price), pc.categoryName ASC ;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))>0 && strlen(trim($product))==0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))==0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId where o.orderDate <= '".$enddate."' group by pc.categoryName order by o.orderDate, sum(od.price), pc.categoryName ASC ;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))==0 && strlen(trim($product))>0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId group by pc.categoryName, p.productName order by o.orderDate, sum(od.quantity), sum(od.price), pc.categoryName, p.productName ASC ;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))==0 && strlen(trim($product))>0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))==0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId group by pc.categoryName, p.productName order by o.orderDate, sum(od.price), pc.categoryName, p.productName ASC ;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))==0 && strlen(trim($product))>0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId group by pc.categoryName, p.productName order by o.orderDate, sum(od.price), pc.categoryName, p.productName ASC ;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))==0 && strlen(trim($product))>0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))==0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId group by pc.categoryName, p.productName order by o.orderDate, sum(od.price), pc.categoryName, p.productName ASC ;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))==0 && strlen(trim($product))==0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId group by pc.categoryName order by o.orderDate, sum(od.quantity), sum(od.price), pc.categoryName ASC ;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))==0 && strlen(trim($product))==0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))==0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId group by pc.categoryName order by o.orderDate, sum(od.price), pc.categoryName ASC ;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))==0 && strlen(trim($product))==0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId group by pc.categoryName order by o.orderDate, sum(od.quantity), sum(od.price), pc.categoryName ASC ;";
            }
        }

        elseif ($sortby=="DSC"){
            
            if(strlen(trim($startdate))>0 && strlen(trim($enddate))>0 && strlen(trim($product))>0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId where o.orderDate between '".$startdate."' and '".$enddate."' group by pc.categoryName, p.productName order by o.orderDate, sum(od.quantity), sum(od.price), pc.categoryName, p.productName DESC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))>0 && strlen(trim($product))>0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))==0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId where o.orderDate between '".$startdate."' and '".$enddate."' group by pc.categoryName order by o.orderDate, sum(od.price), pc.categoryName, p.productName DESC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))>0 && strlen(trim($product))>0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId where o.orderDate between '".$startdate."' and '".$enddate."' group by pc.categoryName order by o.orderDate, sum(od.quantity), sum(od.price), pc.categoryName, p.productName DESC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))>0 && strlen(trim($product))>0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))==0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId where o.orderDate between '".$startdate."' and '".$enddate."' group by pc.categoryName order by o.orderDate, sum(od.price), pc.categoryName, p.productName DESC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))>0 && strlen(trim($product))==0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId where o.orderDate between '".$startdate."' and '".$enddate."' group by pc.categoryName order by o.orderDate, sum(od.quantity), sum(od.price), pc.categoryName DESC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))>0 && strlen(trim($product))==0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId where o.orderDate between '".$startdate."' and '".$enddate."' group by pc.categoryName order by o.orderDate, sum(od.quantity), sum(od.price), pc.categoryName DESC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))>0 && strlen(trim($product))==0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))==0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId where o.orderDate between '".$startdate."' and '".$enddate."' group by pc.categoryName order by o.orderDate, sum(od.price), pc.categoryName DESC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))>0 && strlen(trim($product))==0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))==0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId where o.orderDate between '".$startdate."' and '".$enddate."' group by pc.categoryName order by o.orderDate, sum(od.price), pc.categoryName DESC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))==0 && strlen(trim($product))>0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId where o.orderDate >= '".$startdate."' group by pc.categoryName, p.productName order by o.orderDate, sum(od.quantity), sum(od.price), pc.categoryName, p.productName DESC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))==0 && strlen(trim($product))>0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))==0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId where o.orderDate >= '".$startdate."' group by pc.categoryName, p.productName order by o.orderDate, sum(od.price), pc.categoryName, p.productName DESC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))==0 && strlen(trim($product))>0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId where o.orderDate >= '".$startdate."' group by pc.categoryName, p.productName order by o.orderDate, sum(od.price), sum(od.quantity), pc.categoryName, p.productName DESC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))==0 && strlen(trim($product))==0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId where o.orderDate >= '".$startdate."' group by pc.categoryName order by o.orderDate, sum(od.price), sum(od.quantity), pc.categoryName DESC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))==0 && strlen(trim($product))>0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))==0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId where o.orderDate >= '".$startdate."' group by pc.categoryName, p.productName order by o.orderDate, sum(od.price), pc.categoryName, p.productName DESC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))==0 && strlen(trim($product))==0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))==0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId where o.orderDate >= '".$startdate."' group by pc.categoryName order by o.orderDate, sum(od.price), pc.categoryName DESC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))==0 && strlen(trim($product))==0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId where o.orderDate >= '".$startdate."' group by pc.categoryName order by o.orderDate, sum(od.price), sum(od.quantity), pc.categoryName DESC ;";
            }
            elseif(strlen(trim($startdate))>0 && strlen(trim($enddate))==0 && strlen(trim($product))==0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))==0){

                
                

                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId where o.orderDate >= '".$startdate."' group by pc.categoryName, sum(od.price) order by o.orderDate, sum(od.price), pc.categoryName DESC;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))>0 && strlen(trim($product))>0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId where o.orderDate <= '".$enddate."' group by pc.categoryName, p.productName order by o.orderDate, sum(od.quantity), sum(od.price), pc.categoryName, p.productName DESC ;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))>0 && strlen(trim($product))>0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))==0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId where o.orderDate <= '".$enddate."' group by pc.categoryName, p.productName order by o.orderDate, sum(od.price), pc.categoryName, p.productName DESC ;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))>0 && strlen(trim($product))>0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId where o.orderDate <= '".$enddate."' group by pc.categoryName, p.productName order by o.orderDate, sum(od.quantity), sum(od.price), pc.categoryName, p.productName DESC ;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))>0 && strlen(trim($product))>0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))==0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId where o.orderDate <= '".$enddate."' group by pc.categoryName, p.productName order by o.orderDate, sum(od.price), pc.categoryName, p.productName DESC ;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))>0 && strlen(trim($product))==0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId where o.orderDate <= '".$enddate."' group by pc.categoryName order by o.orderDate, sum(od.quantity), sum(od.price), pc.categoryName DESC ;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))>0 && strlen(trim($product))==0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))==0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId where o.orderDate <= '".$enddate."' group by pc.categoryName order by o.orderDate, sum(od.price), pc.categoryName DESC ;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))>0 && strlen(trim($product))==0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId where o.orderDate <= '".$enddate."' group by pc.categoryName order by o.orderDate, sum(od.quantity), sum(od.price), pc.categoryName DESC ;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))>0 && strlen(trim($product))==0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))==0){
 







                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId where o.orderDate <= '".$enddate."' group by pc.categoryName order by o.orderDate, sum(od.price), pc.categoryName DESC ;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))==0 && strlen(trim($product))>0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId group by pc.categoryName, p.productName order by o.orderDate, sum(od.quantity), sum(od.price), pc.categoryName, p.productName DESC ;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))==0 && strlen(trim($product))>0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))==0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId group by pc.categoryName, p.productName order by o.orderDate, sum(od.price), pc.categoryName, p.productName DESC ;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))==0 && strlen(trim($product))>0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId group by pc.categoryName, p.productName order by o.orderDate, sum(od.price), pc.categoryName, p.productName DESC ;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))==0 && strlen(trim($product))>0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))==0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId group by pc.categoryName, p.productName order by o.orderDate, sum(od.price), pc.categoryName, p.productName DESC ;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))==0 && strlen(trim($product))==0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId group by pc.categoryName order by o.orderDate, sum(od.quantity), sum(od.price), pc.categoryName DESC ;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))==0 && strlen(trim($product))==0 && strlen(trim($specialsale))>0 && strlen(trim($orderquantity))==0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId inner join specialsales ss on ss.productId=p.productId group by pc.categoryName order by o.orderDate, sum(od.price), pc.categoryName DESC ;";
            }
            elseif(strlen(trim($startdate))==0 && strlen(trim($enddate))==0 && strlen(trim($product))==0 && strlen(trim($specialsale))==0 && strlen(trim($orderquantity))>0){
                $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId group by pc.categoryName order by o.orderDate, sum(od.quantity), sum(od.price), pc.categoryName DESC ;";
            }
        }

        $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
        if(!$con){ echo "no con";
            die('Could not be able to connect to  mysql');}
        mysql_select_db('hwdb', $con);
        $res = mysql_query($sql);
        
        if((mysql_num_rows($res))==0){require "mordersreport.html"; echo "<div style='color:red; padding:6px'>No Product special sale after the date specified.</div>";}//no rows retrieved. bad login
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
    }












/*

    if(strlen(trim($startdate))>0 || strlen(trim($enddate))>0){
        if(strlen(trim($startdate))>0 && strlen(trim($enddate))==0){
            $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId where o.orderDate>='".$startdate."';";
        }   
        elseif(strlen(trim($enddate))>0 && strlen(trim($startdate))==0){
            $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId where o.orderDate<='".$enddate."';";
        }
        elseif(strlen(trim($enddate))>0 && strlen(trim($startdate))>0){
            $sql= "select o.*, od.*, sum(od.quantity) as sum, sum(od.price) as orderprice, pc.categoryName from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId inner join productcategory pc on pc.categoryId=p.productCategoryId where o.orderDate between '".$startdate."' and '".$enddate."';";
        }
        $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
        if(!$con){ echo "no con";
            die('Could not be able to connect to  mysql');}
        mysql_select_db('hwdb', $con);
        $res = mysql_query($sql);
        if((mysql_num_rows($res))==0){require "mordersreport.html"; echo "<div style='color:red; padding:6px'>No Product special sale after the date specified.</div>";}//no rows retrieved. bad login
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
    }*/
/*
    if(strlen(trim($prodname))>0){
        $sql= "select * from product where productName like '%".$prodname."%';";
        $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
        if(!$con){ echo "no con";
            die('Could not be able to connect to  mysql');}
        mysql_select_db('hwdb', $con);
        $res = mysql_query($sql);
        if((mysql_num_rows($res))==0){require "mordersreport.html"; echo "<div style='color:red; padding:6px'>No Products with such letters in its name.</div>";}//no rows retrieved. bad login
        else{
            while ($rows = mysql_fetch_assoc($res)){
                $resultlist[] = $rows;
            }
            require "mordersreport.html";
            foreach ($resultlist as $rows) {
                echo "<td>".$rows['productId']."</td>";
                echo "<td>".$rows['productName']."</td>";
                echo "<td>".$rows['productDescription']."</td>";
                echo "<td>".$rows['productImage']."</td>";
                echo "<td>".$rows['productCategoryId']."</td>";
                echo "<td>".$rows['productPrice']."</td></tr>";
            }
            echo '</tbody></table></div>            
            <div align="center"><span style="color:red"><label id="editerror"></label></style></div></body></html>';
        }
    }

    if(strlen(trim($categid))>0){
        $sql= "select * from product where productCategoryId like '%".$categid."%';";
        $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
        if(!$con){ echo "no con";
            die('Could not be able to connect to  mysql');}
        mysql_select_db('hwdb', $con);
        $res = mysql_query($sql);
        if((mysql_num_rows($res))==0){require "mordersreport.html"; echo "<div style='color:red; padding:6px'>No Products with such id.</div>";}//no rows retrieved. bad login
        else{
            while ($rows = mysql_fetch_assoc($res)){
                $resultlist[] = $rows;
            }
            require "mordersreport.html";
            foreach ($resultlist as $rows) {
                echo "<td>".$rows['productId']."</td>";
                echo "<td>".$rows['productName']."</td>";
                echo "<td>".$rows['productDescription']."</td>";
                echo "<td>".$rows['productImage']."</td>";
                echo "<td>".$rows['productCategoryId']."</td>";
                echo "<td>".$rows['productPrice']."</td></tr>";
            }
            echo '</tbody></table></div>            
            <div align="center"><span style="color:red"><label id="editerror"></label></style></div></body></html>';
        }
    }*/
?>           
