<?php

include("connect.php");

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

$sql="select * from users where id=".$id;
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_BOTH);
$pic = $row['pic'];
$imagePath = "../img/users/".$pic;


if(!empty($_FILES['image']['name'])) 
{
  // Get file info 
  $fileName = basename($_FILES["image"]["name"]);
  $tempName = $_FILES['image']['tmp_name'];    
  $folder = "../img/users/".$fileName;

  // Allow certain file formats 
  $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
    $allowTypes = array('jpg','png','jpeg','gif'); 
  if(in_array($fileType, $allowTypes))
    {
       
      // Now let's move the uploaded image into the folder: image
      if(move_uploaded_file($tempName, $folder))
      {
         $sql = "UPDATE users set name='$name', email='$email', username='$username', password='$password', role='$role', pic='$fileName' where id='$id'";
         $result = mysqli_query($con, $sql);
         if($result)
         {
            unlink($imagePath);
            $statusMsg = "Image uploaded successfully";
            header("location:../users.php");
         }
         else
         {
            $statusMsg = "Error: " . $sql . "" . mysqli_error($con);
         }
       }
       else
       {
          $statusMsg = "File upload failed, please try again."; 
       }
   }
   else
   {
      $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
   }
   
}
else
{
   $sql = "UPDATE users set name='$name', email='$email', username='$username', password='$password', role='$role', pic='$pic' where id='$id'";
   $result = mysqli_query($con, $sql);
   header("location:../users.php");
}





// $sql="update users set name=$name, email=$email, username=$username, password=$password where id=$id";
// $result = mysqli_query($con, $sql);

// //header("location:../users.php");

// if($result)
// {
//    echo "done";
// }
// else{
//    echo "error";

//    echo "<br>$id <br> $name <br> $email <br> $username <br> $password <br>";
//    echo $sql."<br>";
//    printf("Connect failed: %s\n", mysqli_connect_error());
// }



?>