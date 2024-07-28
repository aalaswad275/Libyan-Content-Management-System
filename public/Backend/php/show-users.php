<?php
include("connect.php");
// Insert image content into database 
$sql = "SELECT * FROM users";
$result = mysqli_query($con, $sql);
?>