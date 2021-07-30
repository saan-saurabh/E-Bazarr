
<!--Header Start-->
<div class="sticky-top">
<?php if(!isset($_SESSION['seller_id'])){
?>    
<!--Sidebar--> 
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="width: 200px;">
  <div class="offcanvas-header bg-primary">
    <a href="<?php echo $path ?>" style="text-decoration: none;"><h5 class="offcanvas-title text-light" id="offcanvasExampleLabel">E-BAZAR</h5></a>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
  <?php
    if(!isset($_SESSION['user_id'])){
  ?>
    <a href="<?php echo $path ?>userLogin.php" style="text-decoration: none;">
      <div class="btn-group w-100" role="group" aria-label="Basic outlined example">
       <button type="button" class="btn btn-outline-primary w-100"><i class="fa fa-user"></i> LOGIN / SIGNUP</button>
      </div><br><br>
    </a>
  <?php
  }
  else{
   ?>
   <a href="<?php echo $path; ?>templates/views/user_profile.php" style="text-decoration: none;">
      <div class="btn-group w-100" role="group" aria-label="Basic outlined example">
       <button type="button" class="btn btn-outline-primary w-100"><i class="fa fa-user"></i>Your Profile</button>
      </div><br><br>
   </a>
  <?php 
  }
  ?>  
    <div>
     <h5h3>All Category</h5>
     <ul class="list-group list-group-flush">
       <li class="list-group-item"><a href="<?php echo $path ?>templates/views/products_page.php?product_key=man">Man</a></li>
       <li class="list-group-item"><a href="<?php echo $path ?>templates/views/products_page.php?product_key=women">Women</a></li>
       <li class="list-group-item"><a href="<?php echo $path ?>templates/views/products_page.php?product_key=kids">Kids</a></li>
       <li class="list-group-item"><a href="<?php echo $path ?>templates/views/products_page.php?product_key=mobile">Mobiles</a></li>
       <li class="list-group-item"><a href="<?php echo $path ?>templates/views/products_page.php?product_key=electronics">Electronics</a></li>
       <li class="list-group-item"><a href="<?php echo $path ?>templates/views/products_page.php?product_key=fruites">Fruits & Vegetables</a></li>
       <li class="list-group-item"><a href="<?php echo $path ?>templates/views/products_page.php?product_key=dairy">Dairy & Bakery</a></li>
       <li class="list-group-item"><a href="<?php echo $path ?>templates/views/products_page.php?product_key=grocery">Grocery</a></li>
     </ul>
    </div>
  </div>
</div>
<!--Sidebar-->
<?php
}
?>
<header class="navbar bg-primary w-100"> 
<?php if(!isset($_SESSION['seller_id'])){
?> 
    <!--Icon and Logo Section Start-->
        <ul class="nav">
            <li class="nav-item">
                <button class="bg-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
                </button>
            </li>

            <li class="nav-item ">
                <a class="navbar-brand ml-lg-3 ml-lg-4" href="<?php echo $path ?>"><h4><strong>E-Bazar</strong></h4></a>
             </li>
         </ul>
    <!--Icon and Logo Section End-->
<?php
}
?>
    <!--SignIn/SignUp and Cart Section Start-->
      <ul class="nav ml-auto order-sm-last mr-lg-5 rc">
        <?php 
           if(isset($_SESSION['user_id'])){
              $user_id=$_SESSION['user_id'];
              $query="SELECT product_id FROM cart WHERE user_id='$user_id'";
              $result=$con->prepare($query);
              $result->execute();
              $cart_count=$result->rowCount();
             ?>
          
               <li class="nav-item dropleft">
                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
               
               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                 <a class="dropdown-item" href="#"><?php echo $_SESSION['user_name']; ?></a>  
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="<?php echo $path; ?>templates/views/user_profile.php">Your Profile</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="<?php echo $path; ?>templates/views/user_orders.php">My Orders</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="<?php echo $path; ?>src/server/user_logout.php">Logout</a>
               </div>
               </li>   
        <?php
           }
           else if(isset($_SESSION['seller_id'])){
               ?>
               <li class="nav-item dropleft">
                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
               
               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                 <a class="dropdown-item" href="#"><?php echo $_SESSION['seller_email']; ?></a> 
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="<?php echo $path; ?>src/server/seller_logout.php">Logout</a>
               </div>
               </li>  
        <?php       
           }
           else{
             ?>
           <li class="nav-item">
               <a class="nav-link" href="<?php echo $path ?>userLogin.php"><i class="fa fa-user"></i> <span class="lc">Login</span></a>
           </li> 
        <?php     
           } 
        ?>
        <?php if(!isset($_SESSION['seller_id'])){
        ?> 
            <li class="nav-item">
               <a class="nav-link" href="<?php echo $path ?>templates/views/user_cart.php"><i class="fa fa-shopping-cart"></i> <span class="lc">Cart<sup class="text-danger"><sup style="font-size:10px;"><?php if(isset($cart_count)){echo $cart_count;} ?></sup></a>
            </li>
        <?php } ?>        
         </ul>


    <!--SignIn/SignUp and Cart Section End-->
<?php if(!isset($_SESSION['seller_id'])){
?> 
    <!--Search Bar Section Start-->
        <ul class="nav mr-auto ml-md-3">
            <li class="nav-item">
                <form name="form" class="form-inline my-2 my-lg-0">
                    <input class="form-control" name="search" value="" type="search" placeholder="Search" onkeyup="searchEvent()">
                </form>
                <ul id="data" class="search-list">
                </ul>
            </li>
         </ul>
    <!--Search Bar Section End-->
<?php
}
?>
    </header>
 </div>


