<?php include "../../src/db_con.php" ?>
<?php session_start(); ?>
<?php 
 if(isset($_SESSION['user_id'])){
?>
<?php include "../includes/header.php" ?>
<?php  $index="../../index.php"; $path="../../"; include "../includes/navbar.php" ?>

   <section class="user_profile d-flex justify-content-center mt-4">
      <div class="card w-50">
         <div class="card-header">
           <h4 class="card-title">Profile</h4>
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
            <?php
            $user_id=$_SESSION['user_id'];
            $query="SELECT * FROM users WHERE user_id='$user_id'";
            $result=$con->prepare($query);
            $result->execute();
            $row=$result->fetch(PDO::FETCH_ASSOC);
            ?>
            <p class="card-text"><?php echo $row['user_name']; ?></p>
            <p class="card-text"><?php echo $row['user_email']; ?></p>
            <p class="card-text"><?php echo $row['user_phone']; ?></p>
            <div class="btn-group w-100" role="group" aria-label="Basic outlined example">
               <form class="w-100" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"><button type="submit" name="update_your_profile" class="btn btn-outline-primary w-100">Update Your Profile</button></form>
               <form class="w-100" action=""><button type="button" class="btn btn-outline-primary w-100" onclick="confirmation()">Delete Your Accoutn</button></form>
               <script>
                function confirmation(){
                   var res = confirm("are you sure to delete your account");
                   if(res===true){
                     window.location = '../../src/server/user_update.php?delete_key=<?php echo $row['user_id']; ?>';
                   }
                }
               </script>
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
            <form action="../../src/server/user_update.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" value="<?php echo $row['user_name']; ?>" class="form-control" id="name" required/>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" value="<?php echo $row['user_email']; ?>" class="form-control" id="email" required/>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" value="<?php echo $row['user_phone']; ?>" class="form-control" id="phone" required/>
            </div>

            <div class="mb-3">
                <button type="submit" name="user_update" class="btn btn-primary">UPDATE</button>
            </div>
            </form>
         </div>
      </div>
   </section>
<?php
 }
?>
<?php include "../includes/footer.php" ?>
<?php unset($_SESSION['update_msg']); ?>
<?php
}
else{
    header("location: ../../index.php");
}
?>