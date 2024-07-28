<?php
include("connect.php");
// Insert image content into database 
$sql = "SELECT * FROM training";
$training = mysqli_query($con, $sql);
?>