<?php
include('index.php');

$newadmission = new admission();



$newadmission->std_admisssion();

echo "</br>".$newadmission->std_name;

?>