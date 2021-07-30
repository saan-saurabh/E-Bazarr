<?php include "../../src/db_con.php"; session_start();?>

<?php
if(isset($_SESSION['admin_id'])){
 include "../includes/header.php";
 include "../includes/admin_sidebar.php";  
?>
<section class="main_view mt-4 d-flex justify-content-center">
  <div class="container">
    <div class="row gy-3">
        <?php
          $users=$con->prepare("SELECT * FROM users");
          $userE=$users->execute();

          $sellers=$con->prepare("SELECT * FROM sellers");
          $sellersE=$sellers->execute();

          $products=$con->prepare("SELECT * FROM products");
          $productsE=$products->execute();

          $total_sells=$con->prepare("SELECT * FROM user_orders");
          $total_sellE=$total_sells->execute();

          $admins=$con->prepare("SELECT * FROM admin");
          $adminE=$admins->execute();
        ?>
       <div class="col-sm-4">
          <div class="card text-center bg-info">
             <div class="card-body">
                <h4 class="card-title font-weight-bold"><?php echo $users->rowCount(); ?></h4>
                <p class="card-title font-weight-bold">Users</p>
             </div>
          </div>
       </div>

       <div class="col-sm-4">
            <div class="card text-center bg-danger">
              <div class="card-body">
                 <h4 class="card-title font-weight-bold"><?php echo $sellers->rowCount(); ?></h4>
                 <p class="card-title font-weight-bold">Seller</p>
              </div>
            </div>
       </div>

       <div class="col-sm-4">
           <div class="card text-center bg-primary">
             <div class="card-body">
                <h4 class="card-title font-weight-bold"><?php echo $products->rowCount(); ?></h4>
                <p class="card-title font-weight-bold">Products</p>
             </div>
           </div>
       </div>

       <div class="col-sm-4">
           <div class="card text-center bg-success">
              <div class="card-body">
                <h4 class="card-title font-weight-bold"><?php echo $total_sells->rowCount(); ?></h4>
                <p class="card-title font-weight-bold">Total Sell Products</p>
              </div>
           </div>
       </div>

       <div class="col-sm-4">
           <div class="card text-center bg-warning">
              <div class="card-body">
                <h4 class="card-title font-weight-bold"><?php echo $admins->rowCount(); ?></h4>
                <p class="card-title font-weight-bold">Admins</p>
              </div>
           </div>
       </div>

    </div>
  </div>
</section>

<?php include "admin_footer.php" ?>
<?php
}
  else{
    header("Location:admin.php");
}
?>