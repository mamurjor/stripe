<?php

session_start();
$username = $_POST['username'];


$password = $_POST['password'];


if($username=="mental" && $password=="12345678"){
    

  
    $_SESSION['username'] = "hadi is a bad boy ";
    header("Location: dashboard.php");
}


?>