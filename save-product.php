<?php

$product_name = $_POST['product_name'];

$product_catid = $_POST['product_catid'];

$product_brandid = $_POST['product_brandid'];

$product_sellprice = $_POST['product_sellprice'];




include("config.php");

$query ="INSERT INTO product(product_name,product_catid,product_brandid,product_sellprice) 
VALUES ('$product_name',$product_catid,$product_brandid,'$product_sellprice')";

DataSave($link,$query);


?>