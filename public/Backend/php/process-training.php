<?php
session_start();

include("connect.php");
$statusMsg = ''; 

if(isset($_GET['delete']))
{
  $sql="delete from training where id =".$_GET['delete'];
  $result=mysqli_query($con,$sql);
  header("location:../training.php");
}
else if(isset($_POST['save']))
{
   $title = $_POST['title'];
   $description = $_POST['description'];
   $length = $_POST['length'];  
           
    $sql = "INSERT into training (title,description, length) VALUES ('$title','$description','$length')";
    $result = mysqli_query($con, $sql) or die();
    if($result)
    {
        $statusMsg = "تم إضافة المشروع بنجاح";
        header("location:../training.php");
        exit;
    }
    else{
        $statusMsg = "خطاء في إدخال البيانات";
    }
    $_SESSION['message'] = $statusMsg;
    header("location:../add-training.php");

}
else if(isset($_POST['edit']))
{
  $id=$_POST['id'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $length = $_POST['length'];
  
  $sql = "UPDATE training set title='$title', description='$description', length='$length' where id='$id'";
  $result = mysqli_query($con, $sql);
  if($result)
  {
    $statusMsg = "تم تعديل المشروع بنجاح";
    header("location:../training.php");
  }
  else
  {
    $statusMsg = "خطاء في إدخال البيانات";
  }
}
   
?>