<?php
include("connect.php");

$title = $_GET['title'];
$action =  $_GET['action'];

$sql = "INSERT into specialties (title) VALUES ('$title')";
$result = mysqli_query($con, $sql);
if($result)
{
    if($_GET['action']=="edit-commitee")
    {
        $id = $_GET['id'];
        header("location:../edit-commitee.php?id=$id");
    }
    else if($_GET['action']=="add-commitee")
    {
        header("location:../add-commitee.php");
    }
    else if($_GET['action']=="edit-staff")
    {
        $id = $_GET['id'];
        header("location:../edit-staff.php?id=$id");
    }
    else if($_GET['action']=="add-staff")
    {
        header("location:../add-staff.php");
    }
}

?>