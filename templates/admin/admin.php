<?php session_start(); ?>
<?php include "../../src/db_con.php"; ?>
<?php  
  if(!isset($_SESSION['admin_id'])){
?>
<?php include "../includes/header.php" ?>
<section>
  <div class="container mt-5 d-flex justify-content-center">
     <div class="card w-50">
        <div class="header">
          <h4 class="card-title mt-2 ml-3">Admin Login</h4>
          <?php  
          if(isset($_SESSION['admin_msg'])) 
          {
              
        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
           <?php echo $_SESSION['admin_msg']; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php     
          }
        ?>
        </div>
        <div class="card-body">
           <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
             <div class="mb-3">
               <label for="email" class="form-label">Email</label>
               <input type="email" name="admin_email" value="" class="form-control" id="email" aria-describedby="emailHelp">
               <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
             </div>

             <div class="mb-3">
               <label for="password" class="form-label">Password</label>
               <input type="password" name="admin_password" value="" class="form-control" id="password" aria-describedby="passwordHelp">
             </div>

             <div class="mb-3">
               <button type="submit" name="admin_login" class="btn btn-primary w-100">Login</button>
             </div>
           </form>
        </div>
     </div>
  </div>
</section>

<?php include "admin_footer.php" ?>

<?php
 
 if(isset($_REQUEST['admin_login'])){
     $admin_email=$admin_password="";

     $admin_email=$_REQUEST['admin_email'];
     $admin_password=$_REQUEST['admin_password'];

     if(empty($admin_email)||empty($admin_password)){
         $_SESSION['admin_msg']="Please Fill All Details";
         echo "<script>window.location='admin.php'</script>";
     }
     else{
        $query="SELECT * FROM admin WHERE admin_email='$admin_email' AND admin_password='$admin_password'";
        $result=$con->prepare($query);
        $result->execute();
        $row=$result->fetch(PDO::FETCH_ASSOC);
        if($row)
        {
           if($row>0 && $row['active_status']==1)
           {
             $_SESSION['admin_id']=$row['admin_id'];
             $_SESSION['admin_name']=$row['admin_name'];
             $_SESSION['admin_email']=$row['admin_email'];
             echo "<script>window.location='admin_dashboard.php'</script>";
           }
           else{
             echo "<script type='text/javascript'>alert('Your Account Is Disable');window.location.href='admin.php';</script>";
           }
        }
        else
        {
             echo "<script type='text/javascript'>alert('Not a valid userId and Password');window.location.href='admin.php';</script>";
        }
     }
 }
?>
<?php
}
  else{
    header("Location:admin_dashboard.php");
}
?>