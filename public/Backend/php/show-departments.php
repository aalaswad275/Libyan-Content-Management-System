<?php
include("connect.php");
// Insert image content into database 
$sql = "SELECT * FROM departments";
$departments = mysqli_query($con, $sql);
?>