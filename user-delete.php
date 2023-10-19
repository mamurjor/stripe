<?php

$id =  $_GET['id'];


$link = mysqli_connect("localhost","root","","codemanbd");

$query = "DELETE FROM user_registration WHERE id=$id";

    $sql = mysqli_query($link,$query);

    if($sql==true){

        header("Location: all-user.php?msg=detete done");

    }
    else{
        header("Location: all-user.php?msg=detete Not done");

    }

?>