<?php
$con= mysqli_connect("localhost", "id16099468_capstone", "Pd@123456789", "id16099468_ebazar")or die($mysqli_error($con));
session_start();

$email = $_POST['email'];
$email = mysqli_real_escape_string($con, $email);
$password = $_POST['password'];
$password = mysqli_real_escape_string($con, $password);
$regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";


if(($_REQUEST['email']=="")||($_REQUEST['password']==""))
    {
       //header("location:../../userLogin.php");
       //$_SESSION['loginmsg']="Fill All The Details";
      echo "<script type='text/javascript'>alert('Fill All The Details');window.location.href='../../sellerLogin.php';</script>";
    }
    else if(!preg_match($regex_email, $_REQUEST['email']))
    {
        echo "<script type='text/javascript'>alert('EMAIL should be valid one');window.location.href='../../sellerLogin.php';</script>";
    }
    else{
	$query = "SELECT seller_id,seller_email,seller_password from sellers WHERE seller_email='" . $email . "' AND seller_password='" . $password . "'";
    $result = mysqli_query($con, $query)or die($mysqli_error($con));
    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);


     if ($num == 1) { 
    $_SESSION['seller_email'] = $email;
    $_SESSION['seller_id'] = $row['seller_id'];
    echo "<script>window.location='../../templates/views/seller_landing_page.php';</script>";
     } 

     else{
     echo "<script type='text/javascript'>alert('Not a valid sellerId and Password');window.location.href='../../sellerLogin.php';</script>";

}
}
?>