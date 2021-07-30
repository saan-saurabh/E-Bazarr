<?php
$con= mysqli_connect("localhost", "id16099468_capstone", "Pd@123456789", "id16099468_ebazar")or die($mysqli_error($con));
session_start();
$error="";

  $name = $_POST['shopname'];
  $name = mysqli_real_escape_string($con, $name);

  $email = $_POST['selleremail'];
  $email = mysqli_real_escape_string($con, $email);
  
  $contact = $_POST['sellercontact'];
  $contact = mysqli_real_escape_string($con, $contact);

  $password = $_POST['password'];
  $password = mysqli_real_escape_string($con, $password);

  $confirmPassword = $_POST['confirmpassword'];
  $confirmPassword = mysqli_real_escape_string($con, $confirmPassword);

  $regex_name= "/^[a-zA-Z ]*$/";
  $regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
  $regex_num = "/^[6789][0-9]{9}$/";
  $regex_pass="/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/";
  
  $query = "SELECT shop_name,seller_email,seller_phone,seller_password from sellers WHERE seller_email='$email'";
  $result = mysqli_query($con, $query)or die($mysqli_error($con));
  $num = mysqli_num_rows($result);
  
  if(($_REQUEST['shopname']=="")||($_REQUEST['selleremail']=="")||($_REQUEST['sellercontact']=="")||($_REQUEST['password']=="")||($_REQUEST['confirmpassword']==""))
    {
       //header("location:../../userSignup.php");
       //$_SESSION['signmsg']="Fill All The Details";
       echo "<script type='text/javascript'>alert('Fill All The Details, All the fields are mandatory!');window.location.href='../../sellerSignup.php';</script>";
    }
    
  else if($num != 0)
  {
  echo "<script type='text/javascript'>alert('EMAIL already exist!');window.location.href='../../sellerSignup.php';</script>";
  } 
  else if (!preg_match($regex_name, $name)) {
  echo "<script type='text/javascript'>alert('NAME should contain only alphabets!');window.location.href='../../sellerSignup.php';</script>";

  }
  else if (!preg_match($regex_email, $email)) {
  echo "<script type='text/javascript'>alert('EMAIL should be a valid one!');window.location.href='../../sellerSignup.php';</script>";

  }
   else if (!preg_match($regex_num, $contact)) {
      echo "<script type='text/javascript'>alert('PHONE NO. should be 10 digit and a valid one!');window.location.href='../../sellerSignup.php';</script>"; 
     
  }
  else if(!preg_match($regex_pass, $password)) {
   echo "<script type='text/javascript'>alert('PASSWORD should be min 8 character with one Upper case letter and one Lower case letter and a Number!');window.location.href='../../sellerSignup.php';</script>";
}
  else if($password!=$confirmPassword){
    echo "<script type='text/javascript'>alert('PASSWORD and CONFIRM PASSWORD did not match!');window.location.href='../../sellerSignup.php';</script>"; 
  }
  else {
      $own="NA";
      $address="NA";
      $city="NA";
      $state="NA";
      $pincode="NA";
    
    $query = "INSERT INTO sellers(shop_name, owner, seller_email, seller_phone, seller_password, seller_address, seller_city, seller_state, seller_pincode)VALUES('" . $name . "','" . $own . "','" . $email . "','" . $contact . "','" . $password . "','" . $address . "','" . $city . "','" . $state . "','" . $pincode. "')";
    mysqli_query($con, $query) or die(mysqli_error($con));
    $seller_id = mysqli_insert_id($con);
    $_SESSION['seller_email'] = $email;
    $_SESSION['seller_id'] = $seller_id;
    echo "<script>window.location='../../templates/views/seller_landing_page.php';</script>";
  }
?>