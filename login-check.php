<?php

session_start();

$username = $_POST['username'];


$password = $_POST['password'];


// user name = mental && password =12345678

$link = mysqli_connect("localhost","root","","codemanbd");

$username = $_POST['username'];
$query = " SELECT * FROM user_registration   where username ='$username' && password='$password'";

$result=mysqli_query($link,$query);

if(mysqli_num_rows($result)>0){

    $_SESSION['username'] = $username;
    header("Location: dashbaord.php");
}
else{
    header("Location: login.php?msg=sorry, some things missing");
}

// if($username=="mental" &&  $password=="12345678"){


//     $_SESSION['username'] = $username;

//     header("Location: dashbaord.php");
// }

// else{
//     header("Location: login.php?msg=sorry, some things missing");
// }




?>