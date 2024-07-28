<?php

  include("connect.php");
  $statusMsg = ''; 

   $name = $_POST['name'];
   $email = $_POST['email'];
   $username = $_POST['username'];  
   $password = $_POST['password']; 
   $role = $_POST['role']; 

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
            $sql = "INSERT into users (name,username, email, password, role, pic) VALUES ('$name','$username','$email', '$password', '$role','$fileName')";
            $result = mysqli_query($con, $sql);
            if($result)
            {
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
	    $statusMsg = 'Please select an image file to upload.'; 
    }


    echo "<br>".$statusMsg;
?>