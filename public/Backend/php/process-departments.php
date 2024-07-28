<?php
session_start();

include("connect.php");
$statusMsg = ''; 

if(isset($_GET['delete']))
{
  $sql="select * from departments where id=".$_GET['delete'];
  $result=mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result, MYSQLI_BOTH);
  $imagePath = "../img/departments/".$row['img'];
  
  if(unlink($imagePath))
  {
      $sql="delete from departments where id =".$_GET['delete'];
      $result=mysqli_query($con,$sql);
      header("location:../departments.php");
  }
}
else if(isset($_POST['save']))
{
   $title = $_POST['title'];
   $description = $_POST['description'];
  
   //if(empty($title)) $statusMsg = "لم يتم إدخال أسم المشروع"; 
   
   if(!empty($_FILES['img']['name'])) 
   { 
      // Get file info 
      $fileName = basename($_FILES["img"]["name"]);
      $tempName = $_FILES['img']['tmp_name'];    
      $folder = "../img/departments/".$fileName;

      // Allow certain file formats 
      $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
		  $allowTypes = array('jpg','png','jpeg','gif'); 
      if(in_array($fileType, $allowTypes))
	  {
        // Now let's move the uploaded image into the folder: image
        if(move_uploaded_file($tempName, $folder))
        {
          $sql = "INSERT into departments (title,description,img) VALUES ('$title','$description','$fileName')";
          $result = mysqli_query($con, $sql) or die();
            if($result){
              $statusMsg = "تم إضافة النخصص بنجاح";
              header("location:../departments.php");
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
    $_SESSION['message'] = $statusMsg;
    header("location:../add-department.php");

}
else if(isset($_POST['edit']))
{
  $id=$_POST['id'];
  $title = $_POST['title'];
  $description = $_POST['description'];
 
 // $fileName = basename($_FILES["logo"]["name"]);  

  

  if(!empty($_FILES['img']['name'])) 
  {
    $sql="select * from departments where id=".$id;
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_BOTH);
    $logo = $row['img'];
    $imagePath = "../img/departments/".$logo;

    // Get file info 
    $fileName = basename($_FILES["img"]["name"]);
    $tempName = $_FILES['img']['tmp_name'];    
    $folder = "../img/departments/".$fileName;

    //echo "$id <br> $title <br> $description <br>  $supervisor<br> $logo <br> $fileName";

    // Allow certain file formats 
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
    $allowTypes = array('jpg','png','jpeg','gif'); 
    if(in_array($fileType, $allowTypes))
    {
      // Now let's move the uploaded image into the folder: image
      if(move_uploaded_file($tempName, $folder))
      {
        $sql = "UPDATE departments set title='$title', description='$description', img='$fileName' where id='$id'";
         $result = mysqli_query($con, $sql);
         if($result)
         {
            unlink($imagePath);
            $statusMsg = "تم تعديل التخصص بنجاح";
            header("location:../departments.php");
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
    $sql = "UPDATE departments set title='$title', description='$description' where id='$id'";
    $result = mysqli_query($con, $sql);
    header("location:../departments.php");
  }

}
   
?>