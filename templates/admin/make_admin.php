<?php include "../../src/db_con.php";session_start(); ?>
<?php
 if(isset($_REQUEST['submit_admin']))
    
    $admin_name=$_REQUEST['name'];
    $admin_email=$_REQUEST['email'];
    $admin_phone=$_REQUEST['phone'];
    $admin_password=$_REQUEST['password'];
    $active_status=1;
    
      $query="SELECT * FROM admin WHERE admin_email='$admin_email' or admin_phone='$admin_phone' ";
      $result=$con->prepare($query);
      $result->execute();
      $num=$result->rowCount();
        if($num>0)
        {
           echo "<script type='text/javascript'>alert('EMAIL already exist!');window.location.href='admin_details.php';</script>";
        } 
        else
        {
          $query="INSERT INTO admin(admin_name,admin_email,admin_phone,admin_password,active_status) VALUES(?,?,?,?,?)";
          $result=$con->prepare($query);
          $result->execute(array($admin_name,$admin_email,$admin_phone,$admin_password,$active_status));

          if($result)
          {
            echo "<script type='text/javascript'>alert('Admin Added Seccefully');window.location.href='admin_details.php';</script>";
          }
        }
?>