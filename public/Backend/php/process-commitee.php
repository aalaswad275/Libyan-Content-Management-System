<?php
session_start();

include("connect.php");
$statusMsg = ''; 

if(isset($_GET['delete']))
{
  $sql="select * from commitee where id=".$_GET['delete'];
  $result=mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result, MYSQLI_BOTH);
  $imagePath = "../img/commitee/".$row['pic'];
  
  if(unlink($imagePath))
  {
      $sql="delete from commitee where id =".$_GET['delete'];
      $result=mysqli_query($con,$sql);
      header("location:../commitee.php");
  }
}
else if(isset($_POST['save']))
{
    
   $name = $_POST['name'];
   $degree = $_POST['degree'];
   $specialty = $_POST['specialty'];  
   $field = $_POST['field'];
   $email = $_POST['email'];  
   $role = $_POST['role']; 
   
   //echo "$name <br> $degree <br> $specialty <br> $field <br>  $role <br>".basename($_FILES["image"]["name"]);
   if(!empty($_FILES['image']['name'])) 
   { 
      // Get file info 
      $fileName = basename($_FILES["image"]["name"]);
      $tempName = $_FILES['image']['tmp_name'];    
      $folder = "../img/commitee/".$fileName;

      // Allow certain file formats 
      $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
		  $allowTypes = array('jpg','png','jpeg','gif'); 
      if(in_array($fileType, $allowTypes))
		  {
        // Now let's move the uploaded image into the folder: image
        if(move_uploaded_file($tempName, $folder))
        {
          $sql = "INSERT into commitee (name,degree, specialty,field,email,role,pic) VALUES ('$name','$degree','$specialty','$field','$email','$role','$fileName')";
          $result = mysqli_query($con, $sql) or die();
            if($result){
              $statusMsg = "تم إضافة المشروع بنجاح";
             header("location:../commitee.php");
             exit;
            }
            else{
              $statusMsg = "خطاء في إدخال البيانات";
            }
        }
        else{
          $statusMsg = "لم يتم تحميل الصورة بنجاح"; 
        }
      }
      else{
        $statusMsg = "عذرًا ، يُسمح فقط بتحميل ملفات JPG و JPEG و PNG و GIF"; 
      }
    }
    else
    {
	    $statusMsg = "يجب إضافة شعار المشروع" ;
    }
}
else if(isset($_POST['edit']))
{
  $id = $_POST['id'];
  $name = $_POST['name'];
  $degree = $_POST['degree'];
  $specialty = $_POST['specialty'];  
  $field = $_POST['field'];  
  $email = $_POST['email'];
  $role = $_POST['role'];  

  //echo "$name <br> $degree <br> $specialty <br> $field <br>  $role <br>".basename($_FILES["image"]["name"]);
  if(!empty($_FILES['image']['name'])) 
  {
    $sql="select * from commitee where id=".$id;
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_BOTH);
    $pic = $row['pic'];
    $imagePath = "../img/commitee/".$pic;

    // Get file info 
    $fileName = basename($_FILES["image"]["name"]);
    $tempName = $_FILES['image']['tmp_name'];    
    $folder = "../img/commitee/".$fileName;

    // Allow certain file formats 
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
    $allowTypes = array('jpg','png','jpeg','gif'); 
    if(in_array($fileType, $allowTypes))
    {
      // Now let's move the uploaded image into the folder: image
      if(move_uploaded_file($tempName, $folder))
      {
        $sql = "UPDATE commitee set name='$name', degree='$degree', specialty='$specialty', email='$email', field='$field',role='$role',pic='$fileName' where id='$id'";
         $result = mysqli_query($con, $sql);
         if($result)
         {
            unlink($imagePath);
            $statusMsg = "تم تعديل المشروع بنجاح";
            header("location:../commitee.php");
         }
         else
         {
          $statusMsg = "خطاء في إدخال البيانات";
         }
      }
      else
      {
        $statusMsg = "لم يتم تحميل الصورة بنجاح"; 
      }
    }
    else
    {
      $statusMsg = "عذرًا ، يُسمح فقط بتحميل ملفات JPG و JPEG و PNG و GIF";
    }
  }
  else
  {
    $sql = "UPDATE commitee set name='$name', degree='$degree', specialty='$specialty', field='$field', email='$email',role='$role' where id='$id'";
    $result = mysqli_query($con, $sql);
    if($result)
    {
      header("location:../commitee.php");
    }
    
  }

}
   
?>