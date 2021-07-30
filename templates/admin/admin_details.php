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
          </tr>
      </thead>
      <tbody>
          <?php
           $result=$con->prepare("SELECT * FROM admin");
           $result->execute();
           while($row=$result->fetch(PDO::FETCH_ASSOC)){
          ?>
          <tr>
              <td><?php echo $row['admin_id'] ?></td>
              <td><?php echo $row['admin_name'] ?></td>
              <td><?php echo $row['admin_phone'] ?></td>
              <td><?php echo $row['admin_email'] ?></td>
              <td><?php echo $row['active_status'] ?></td>
          </tr>
          <?php
           }
          ?>
      </tbody>
   </table>
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="float-right">
       <button type="submit" name="make_admin" class="btn btn-danger">Make Admin</button>
     </form>
</div>  
</section>

<?php
if(isset($_REQUEST['make_admin'])){
?>
 
 <section class="d-flex justify-content-center mt-5">
      <div class="card w-50">
         <div class="card-header">
           <h4 class="card-title">Make Admin</h4>
         </div>
         <div class="card-body">
            <form action="make_admin.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" value="" class="form-control" id="name" required/>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" value="" class="form-control" id="email" required/>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" value="" class="form-control" id="phone" required/>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" value="" class="form-control" id="password" required/>
            </div>

            <div class="mb-3">
                <button type="submit" name="submit_admin" class="btn btn-primary">Submit</button>
            </div>
            </form>
         </div>
      </div>
   </section>

<?php    
}
?>
<?php include "admin_footer.php"; ?>
<?php
}
else{
    header("Location:admin.php");
}
?>