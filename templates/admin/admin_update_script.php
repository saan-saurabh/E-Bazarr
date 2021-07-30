<?php
$con= mysqli_connect("localhost", "id16099468_capstone", "Pd@123456789", "id16099468_ebazar")or die($mysqli_error($con));
session_start();
$id=$_SESSION['admin_id'];

  $name = $_POST['admin_name'];
  $name = mysqli_real_escape_string($con, $name);

  $email = $_POST['admin_email'];
  $email = mysqli_real_escape_string($con, $owner);

  $contact=$_POST['admin_phone'];
  $contact= mysqli_real_escape_string($con, $contact);
  

  $query = "UPDATE admin SET admin_name ='$name', admin_email='$email',admin_phone='$contact' WHERE admin_id = '$id'";
   mysqli_query($con, $query) or die($mysqli_error($con));
echo "<script type='text/javascript'>alert('seller information updated Successfully');window.location.href='./profile.php';</script>";
   ?>