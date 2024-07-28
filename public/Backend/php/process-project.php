<?php
session_start();

include("connect.php");
$statusMsg = ''; 

if(isset($_GET['delete']))
{
  $sql="select * from projects where id=".$_GET['delete'];
  $result=mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result, MYSQLI_BOTH);
  $imagePath = "../img/projects/".$row['logo'];
  
  if(unlink($imagePath))
  {
      $sql="delete from projects where id =".$_GET['delete'];
      $result=mysqli_query($con,$sql);
      header("location:../projects.php");
  }
}
else if(isset($_POST['save']))
{
   $title = $_POST['title'];
   $description = $_POST['description'];
   $supervisor = $_POST['supervisor'];  

   //if(empty($title)) $statusMsg = "لم يتم إدخال أسم المشروع"; 
   
   if(!empty($_FILES['logo']['name'])) 
   { 
      // Get file info 
      $fileName = basename($_FILES["logo"]["name"]);
      $tempName = $_FILES['logo']['tmp_name'];    
      $folder = "../img/projects/".$fileName;

      // Allow certain file formats 
      $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
		  $allowTypes = array('jpg','png','jpeg','gif'); 
      if(in_array($fileType, $allowTypes))
		  {
        // Now let's move the uploaded image into the folder: image
        if(move_uploaded_file($tempName, $folder))
        {
          $sql = "INSERT into projects (title,description, supervisor,logo) VALUES ('$title','$description','$supervisor','$fileName')";
          $result = mysqli_query($con, $sql) or die();
            if($result){
              $statusMsg = "تم إضافة المشروع بنجاح";
              header("location:../projects.php");
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
    header("location:../add-project.php");

}
else if(isset($_POST['edit']))
{
  $id=$_POST['id'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $supervisor = $_POST['supervisor'];
 // $fileName = basename($_FILES["logo"]["name"]);  

  

  if(!empty($_FILES['logo']['name'])) 
  {
    $sql="select * from projects where id=".$id;
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_BOTH);
    $logo = $row['logo'];
    $imagePath = "../img/projects/".$logo;

    // Get file info 
    $fileName = basename($_FILES["logo"]["name"]);
    $tempName = $_FILES['logo']['tmp_name'];    
    $folder = "../img/projects/".$fileName;

    //echo "$id <br> $title <br> $description <br>  $supervisor<br> $logo <br> $fileName";

    // Allow certain file formats 
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
    $allowTypes = array('jpg','png','jpeg','gif'); 
    if(in_array($fileType, $allowTypes))
    {
      // Now let's move the uploaded image into the folder: image
      if(move_uploaded_file($tempName, $folder))
      {
        $sql = "UPDATE projects set title='$title', description='$description', supervisor='$supervisor', logo='$fileName' where id='$id'";
         $result = mysqli_query($con, $sql);
         if($result)
         {
            unlink($imagePath);
            $statusMsg = "تم تعديل المشروع بنجاح";
            header("location:../projects.php");
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
    $sql = "UPDATE projects set title='$title', description='$description', supervisor='$supervisor' where id='$id'";
    $result = mysqli_query($con, $sql);
    header("location:../projects.php");
  }

}
   
?>