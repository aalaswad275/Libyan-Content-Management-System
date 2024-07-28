<?php

include("connect.php");

$username = $_POST['username'];  
$password = $_POST['password'];  

$sql = "select *from users where username = '$username' and password = '$password'"; 

$result = mysqli_query($con, $sql); 
 
$row = mysqli_fetch_array($result, MYSQLI_BOTH);
$count = mysqli_num_rows($result);
 
if($count == 1) 
{
    $_SESSION['role']=$row['role'];
    $_SESSION['pic']=$row['pic'];

    header("location:./index.php");
}
else
{
    $message = "خطأ: اسم المستخدم او كلمة المرور غير صحيحة ";
}
?>