<?php
 include "../db_con.php";
 session_start();

 if(isset($_REQUEST['user_update'])){
    $user_name = $user_email = $user_phone = "";

    $user_id = $_SESSION['user_id'];
    $user_name = $_REQUEST['name'];
    $user_email = $_REQUEST['email'];
    $user_phone = $_REQUEST['phone'];

    $query = "UPDATE users SET user_name='$user_name', user_phone='$user_phone', user_email='$user_email' WHERE user_id ='$user_id'";

    $result = $con->query($query);

    if($result){
        $_SESSION['update_msg'] = "data updates successfully";
        header("location: ../../templates/views/user_profile.php");
    }
    else{
        $_SESSION['update_msg'] = "Not Updated";
    }
 }
 if(isset($_REQUEST['delete_key'])){
    $user_id = $_SESSION['user_id'];
    $query = "UPDATE users SET active_status=0 WHERE user_id ='$user_id'";
    $result = $con->query($query);
    if($result){
        echo "<script>window.location='user_logout.php'</script>";
    }
 }

 ?>