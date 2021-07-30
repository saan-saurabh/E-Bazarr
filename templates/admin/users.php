<?php session_start(); ?>
<?php include "../../src/db_con.php";?>
<?php
if(isset($_SESSION['admin_id'])){
?>
<?php include "../includes/header.php"; ?>
<?php include "../includes/admin_sidebar.php"; ?>
<section class="main_view mt-5">
<div class="container">    
   <table id="example" class="table table-striped" style="width:100%">
      <thead>
          <tr>
              <th>#</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Status</th>
              <th>Actions</th>
          </tr>
      </thead>
      <tbody>
          <?php
           $result=$con->prepare("SELECT * FROM users");
           $result->execute();
           while($row=$result->fetch(PDO::FETCH_ASSOC)){
          ?>
          <tr>
              <td><?php echo $row['user_id'] ?></td>
              <td><?php echo $row['user_name'] ?></td>
              <td><?php echo $row['user_phone'] ?></td>
              <td><?php echo $row['user_email'] ?></td>
              <td><?php echo $row['active_status'] ?></td>
              <td><form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                <input type="hidden" name="active_status" value="<?php echo $row['active_status']; ?>">
                <button type="submit" name="change_status" class="btn btn-danger">Change</button>
              </form></td>
          </tr>
          <?php
           }
          ?>
      </tbody>
   </table>
</div>  
</section>

<?php
 if(isset($_REQUEST['change_status'])){
     $request_status="";
     $user_id=$_REQUEST['user_id'];
     $status=$_REQUEST['active_status'];
     if($status==0){
        $request_status=1;
     }
     if($status==1){
        $request_status=0;
     }
    
     $query1 = "UPDATE users SET active_status='$request_status' WHERE user_id ='$user_id'";
     $result1 = $con->query($query1);
     if($result1){
        echo "<script>window.location='users.php'</script>";
    }
 }
?>

<?php include "admin_footer.php" ?>
<?php
}
else{
    header("Location:admin.php");
}
?>