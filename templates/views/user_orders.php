<?php include "../../src/db_con.php" ?>
<?php session_start(); ?>
<?php 
 if(isset($_SESSION['user_id'])){
?>
<?php include "../includes/header.php" ?>
<?php  $index="../../index.php"; $path="../../"; include "../includes/navbar.php" ?>

<section class="user_orders mt-4">
  <div class="container">
    <div class="card">
      <div class="card-body">
      <?php
       $user_id=$_SESSION['user_id'];
       $query="SELECT product_id FROM user_orders WHERE user_id='$user_id'";
       $result=$con->prepare($query);
       $result->execute();
       while($row=$result->fetch(PDO::FETCH_ASSOC)){
         $product_id=$row['product_id'];
         $query="SELECT * FROM products WHERE product_id='$product_id'";
         $result1=$con->prepare($query);
         $result1->execute();
         $row1=$result1->fetch(PDO::FETCH_ASSOC);
         $tempimg = $row1['product_images'];
         $img = explode(",",$tempimg);
      ?>
        <div class="row d-flex justify-content-start" style="margin: 0;">
            <div class="col-4 col-md-2 col-lg-2 text-center">
                <img src="../../public/images/products/<?php echo $img['0'] ?>" alt="...">           
            </div>
            <div class="col-8 col-md-3 col-lg-4">
                <h5 class="card-title font-weight-bold"><?php echo $row1['product_name'];?></h5>
                <h6 class="text-muted product-size">Size: L</h6>
                <h6 class="text-muted product-seller">Seller: Anand</h6>  
            </div>
            <div class="col-md-2 col-lg-2 hide-on-small">
                <h5><span class="product-price font-weight-bold">₹402</span></h5>
            </div>
            <div class="col-md-5 col-lg-4 hide-on-small">
               <h5>We Will Reach You Soon</h5>
            </div>
        </div><hr>
    <?php
     }
    ?>    
      </div>
    </div>
  </div>
</section>



<?php include "../includes/footer.php" ?>
<?php
}
else{
    header("location: ../../index.php");
}
?>