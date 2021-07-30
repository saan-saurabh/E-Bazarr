<?php include "../../src/db_con.php";session_start(); ?>



<?php
 if(isset($_SESSION['admin_id'])){
    include "../includes/header.php";
    include "../includes/admin_sidebar.php";
    $admin_id=$_SESSION['admin_id'];
    $result=$con->prepare("SELECT * FROM admin WHERE admin_id='$admin_id'");
    $result->execute();
    $row=$result->fetch(PDO::FETCH_ASSOC);
?>
<section class="admiin_profile d-flex justify-content-center mt-5">
      <div class="card w-50">
         <div class="card-header">
           <h4 class="card-title">Admin Profile</h4>
           <?php  
          if(isset($_SESSION['update_msg'])) 
          {
          ?>
           <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['update_msg']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>
        <?php     
          }
        ?>
         </div>
         <div class="card-body">
            <p class="card-text"><?php echo $row['admin_name']; ?></p>
            <p class="card-text"><?php echo $row['admin_email']; ?></p>
            <p class="card-text"><?php echo $row['admin_phone']; ?></p>
            <div class="btn-group w-100" role="group" aria-label="Basic outlined example">
               <form class="w-100" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"><button type="submit" name="update_your_profile" class="btn btn-outline-primary w-100">Update Your Profile</button></form>
            </div>
         </div>
      </div>
   </section>

<?php
 if(isset($_REQUEST['update_your_profile']))
 {
?>
   <section class="update_user_profile d-flex justify-content-center mt-5">
      <div class="card w-50">
         <div class="card-header">
           <h4 class="card-title">Update Profile</h4>
         </div>
         <div class="card-body">
            <form action="admin_update.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" value="<?php echo $row['admin_name']; ?>" class="form-control" id="name" required/>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" value="<?php echo $row['admin_email']; ?>" class="form-control" id="email" required/>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" value="<?php echo $row['admin_phone']; ?>" class="form-control" id="phone" required/>
            </div>

            <div class="mb-3">
                <button type="submit" name="admin_update" class="btn btn-primary">UPDATE</button>
            </div>
            </form>
         </div>
      </div>
   </section>
<?php
 }
?>


<?php include "admin_footer.php" ?>
<?php
 if(isset($_SESSION['update_msg'])){
    unset($_SESSION['update_msg']);
 }
?>
<?php
 }
 else{
   header("Location:admin.php");
}
?>