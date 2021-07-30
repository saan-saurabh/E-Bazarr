<?php  session_start(); ?>
<?php include "../../src/db_con.php" ?>

<?php include "../includes/header.php" ?>

<?php  $index="../../index.php"; $path="../../"; include "../includes/navbar.php" ?>

<!--Product Details Section Start-->
<section class="product_details mt-5">

  <div class="container-fluid">
    <div class="row">
  
  <!--Product Images Part Start-->  
      <div class="col-md-12 col-lg-5">
         <div class="card">

           <div class="row no-gutters text-center hide-on-small">
             <div class="col-md-2">
               <?php
                $product_id=$_REQUEST['product_key'];
               $query="SELECT products.*,sellers.* FROM products INNER JOIN sellers ON products.seller_id=sellers.seller_id WHERE product_id='$product_id'";
                $result=$con->prepare($query);
                $result->execute();
                $row=$result->fetch(PDO::FETCH_ASSOC);
                  $tempimg = $row['product_images'];
                  $img = explode(",",$tempimg);
                  for($i=0;$i<sizeof($img);$i++){
               ?>
               <img class="list-item p-1 small-img" src="../../public/images/products/<?php echo $img[$i]; ?>"  onmouseover="chngimg(this)">
              <?php 
                }
             ?> 
             </div>
             <div class="col-md-10">
              <img src="../../public/images/products/<?php echo $img[0]; ?>" class="img-fluid p-1 big-img" id="bigimg">
             </div>
           </div>
  <!--Carousel Start-->
        <div id="carouselExampleIndicators" class="carousel slide text-center ml-3 d-none d-sm-block d-md-none show-on-small" data-ride="carousel">
              <ol class="carousel-indicators">
               <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li> 
                <?php
                    for($i=1;$i<sizeof($img);$i++){
                  ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i ?>"></li>
                <?php
                 }
                ?>
              </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="../../public/images/products/<?php echo $img[0]; ?>" class="d-block w-100" alt="...">
              </div>
              <?php
                    for($i=1;$i<sizeof($img);$i++){
              ?>
              <div class="carousel-item">
                <img src="../../public/images/products/<?php echo $img[$i]; ?>" class="d-block w-100" alt="...">
              </div>
              <?php
                }
              ?>
           </div>
         </div>

           <!--Carousel End-->
          <div class="card-footer">
            <form action="../../src/server/add_to_cart.php?product_key=<?php echo $row['product_id'];?>" method="post">
              <div class="row">
                <div class="col-sm-12 col-md-5 pt-2">
                 <a href="../../src/server/add_to_cart.php?product_key=<?php echo $row['product_id']; ?>"> <button type="submit" class="btn btn-lg btn-success w-100" name="add_to_cart"><i class="fa fa-shopping-cart"></i> <span>ADD TO CARD</span></button></a>
                </div>
                <div class="col-sm-12 col-md-5 pt-2">
                  <button type="submit" class="btn btn-lg btn-danger w-100" name="buy_now"><i class="fa fa-bolt"></i> <span>BUY NOW</span></button>
                </div>
                <div class="col-sm-12 col-md-2">
                <a href="https://api.whatsapp.com/send?phone=<?php echo $row['seller_phone'];?>" data-toggle="tooltip" data-placement="top" title="Want to get info regarding this product from seller :) CHAT DIRECTLY WITH SELLER "><img src="../../public/images/whatsappicon.png" alt="wappicon" style="width:60px; height:60px;"></a>
                </div>
              </div>                                
            </form>
          </div>

         </div>
      </div>
    <!--Product Images Part End-->  

    <!--Product Details Part Start--> 
      <div class="col-md-12 col-lg-7 product-details-part">
          <div class="card d-flex justify-content-start">
             <div class="card-body">
               <h5 class="text-muted product-seller"><?php echo $row['shop_name']; ?></h5>  
               <h4 class="product-title"><?php echo $row['product_name']; ?></h4>
               <h6 class="text-success font-weight-bold">Special Price</h6>
               <h4 class="product-price"> <span class="main-price">₹<?php $x=$row['product_price'];$y=$row['product_discount']; $money=($x-($x*$y)/100); echo $money; ?></span> <del class="text-muted">₹<?php echo $row['product_price']; ?></del> <span class="text-success discount"><?php echo $row['product_discount']; ?>% off</span></h4>
               <h5 class="product-color mb-5">
                   <span class="float-left">Color</span>
                   <?php
                     $tempcolor = $row['product_color'];
                     $color = explode(",",$tempcolor);
                     for($i=0;$i<sizeof($color);$i++){
                   ?> 
                   <div class="circle ml-2 mt-1" id="product_color" style="background-color: <?php echo $color[$i]; ?>;"></div>
                   <?php
                     }
                   ?>
                </h5>

                <h5 class="product-size mb-5">
                   <span class="float-left">Size</span>
                   <?php
                     $tempsize = $row['product_size'];
                     $size = explode(",",$tempsize);
                     for($i=0;$i<sizeof($size);$i++){
                   ?> 
                    <div><?php echo $size[$i]; ?></div>
                   <?php
                     }
                   ?>
                </h5><br>
               
               <hr>
               <div class="product-more mt-4" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Poduct Details <span><i class="fa fa-plus float-right text-muted"></i></span></div>
               <div class="collapse" id="collapseExample">
                  <div class="card card-body" style="border: none;">
                     <?php echo $row['product_details']; ?>
                  </div>
               </div>
               <hr>
             </div>
          </div>
      </div>
    <!--Product Details Part End-->    
    </div>
  </div>

</section>
<!--Product Details Section End-->

<!--Owl Carousel Section Start-->
<section class="container-fluid owl mt-1">
  <div class="card">
     <div class="card-header">
        <a href="#" class="float-right"><button class="btn btn-primary">View All</button></a>
        Similar Products
     </div>
      <?php $owlpath="../../"; $product_cat=$row['product_cat']; $page_link="product_detail.php"; $product_col="product_id"; include "../includes/owlcarousel.php" ?>
  </div>
</section>
<!--Owl Carousel Section End-->

<script type="text/javascript">
    function chngimg(myvar)
    { 
         var fullimg=document.getElementById("bigimg");
         fullimg.src=myvar.src;
    }
 </script> 
<?php include "../includes/footer.php" ?>