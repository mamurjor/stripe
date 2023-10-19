<?php

include("config.php");

 $name = $_POST['name'];

 $code = $_POST['code'];


  $query ="INSERT INTO category(name,code) 
 VALUES ('$name','$code')";

 DataSave($link,$query);

 




?>