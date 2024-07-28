<?php
include("connect.php");
$sql="select * from users where id=".$_GET['id'];
$result=mysqli_query($con,$sql);
$row = mysqli_fetch_array($result, MYSQLI_BOTH);
$imagePath = "../img/users/".$row['pic'];
 
if(unlink($imagePath))
{
    $sql="delete from users where id =".$_GET['id'];
    $result=mysqli_query($con,$sql);
    header("location:../users.php");
}

?>