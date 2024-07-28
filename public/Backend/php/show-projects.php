<?php
include("connect.php");
// Insert image content into database 
$sql = "SELECT * FROM projects";
$projects = mysqli_query($con, $sql);
?>