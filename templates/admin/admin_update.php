<?php include "../../src/db_con.php";session_start(); ?>
<?php
 if(isset($_REQUEST['admin_update']))
    $admin_id=$_SESSION['admin_id'];
    $admin_name=$_REQUEST['name'];
    $admin_phone=$_REQUEST['phone'];
    $admin_email=$_REQUEST['email'];
    
    $query = "UPDATE admin SET admin_name='$admin_name', admin_phone='$admin_phone', admin_email='$admin_email' WHERE admin_id ='$admin_id'";

    $result = $con->query($query);

    if($result){
        $_SESSION['update_msg'] = "data updates successfully";
        header("location:profile.php");
    }
    else{
        $_SESSION['update_msg'] = "Not Updated";
    }
?>