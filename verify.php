<?php

session_start();
$otpcode = $_GET['otpcode'];


$link = mysqli_connect("localhost","root","","codemanbd");

$query = "UPDATE user_registration SET status=1  where otpcode =$otpcode";

$result=mysqli_query($link,$query);

echo "Email Verified Done";





?>