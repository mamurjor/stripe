<?php


$id = $_GET['id'];

$username = $_POST['username'];

$email = $_POST['email'];


$cell = $_POST['cell'];


$address = $_POST['address'];








$link = mysqli_connect("localhost","root","","codemanbd");

$query = "UPDATE user_registration SET username='$username',email='$email',cell='$cell',address='$address' where id =$id";


$result=mysqli_query($link,$query);

if($result==true){

    header("Location: all-user.php?msg=Updaet done");

}
else{
    header("Location: all-user.php?msg=Update Not done");

}

?>