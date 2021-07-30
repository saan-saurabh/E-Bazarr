
<?php 
$con= mysqli_connect("localhost", "id16099468_capstone", "Pd@123456789", "id16099468_ebazar")or die($mysqli_error($con));
?>

<?php include "../includes/header.php" ?>

<?php $index="../../index.php"; $path="../../"; include "../includes/navbar.php" ?>

<!--seller details  Start-->  
 <div class="container-fluid product_page">
    <div class="row">
                    <div class="col-12 col-lg-12 product_sec">  
                     <div class="card">
             <div class="card-header" style="display: flex; justify-content:space-between;">
                 <div><h5>OUR USER'S VIEW!</h5></div>
                 <div><button class="btn btn-warning btn-md text-bold"> + </button></div>
            </div>
           <div class="card-body p-4">
  <!-- loop this module using php so that all the product that has been new order and pending can be listed here-->
           <div class="row">
                       <?php
              $query="SELECT substr(users.user_name,1,1) as sub,users.user_name, customer_feedbacks.feedback FROM customer_feedbacks inner join users on customer_feedbacks.user_id=users.user_id";
              $result = mysqli_query($con, $query)or die($mysqli_error($con));
              $num = mysqli_num_rows($result);
              $row = mysqli_fetch_array($result);
               while($row=mysqli_fetch_array($result))
                {
              ?>
             <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
                  <div class="card p-4" style="background-color:#feff9e" >
                      <div style="display:flex; justify-content:space-between; margin-bottom:10px;">
                          <div style="background-color:#FCF4A3; border-radius:5px; padding:6px 10px 3px 10px; letter-spacing:1px;">
                              <h5 class="text-dark"><strong> <?php echo $row['user_name']; ?></strong></h5>
                          </div>
                          <div style="background-color:#EEDC82; border-radius:50%;width:40px; height:40px;padding:4px 12px;">
                             <h4><span class="text-primary"><strong><?php echo $row['sub'];?></strong></span></h4>
                          </div>
                      </div>
                      <div style="background-color:#fffdd0; padding:6px;border-radius:10px; letter-spacing:1px;height:150px;">
                      <p class="text-danger" style="font-family: 'Pattaya', sans-serif;">" <strong><?php echo $row['feedback'];?></strong> "</p>
                         
                      </div>
                  </div>
                   
               </div>
               <?php
                }
                   ?>
              
             
               </div>
               

             <!-- code ended that should be kept in loop-->
           
          
         </div>
  
       </div>
  
    </div>

  <!--Product Page Row End-->  
 </div>
  <div class="row">
             <div class="col-12 col-lg-12 product_sec">      
         <div class="card">
             <div class="card-header" style="display: flex; justify-content:space-between;">
                 <div><h5>OUR SELLER'S VIEW!</h5></div>
                 <div><button class="btn btn-warning btn-md"> + </button></div>
                 </div>
                            <div class="card-body p-4">
  <!-- loop this module using php so that all the product that has been new order and pending can be listed here-->
           <div class="row">
                       <?php
              $query="SELECT substr(sellers.shop_name,1,1) as subb,sellers.shop_name, seller_feedbacks.feedback FROM seller_feedbacks inner join sellers on seller_feedbacks.seller_id=sellers.seller_id";
              $result = mysqli_query($con, $query)or die($mysqli_error($con));
              $num = mysqli_num_rows($result);
              $row = mysqli_fetch_array($result);
               while($row=mysqli_fetch_array($result))
                {
              ?>
             <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
                  <div class="card p-4" style="background-color:#cce00e">
                      <div style="display:flex; justify-content:space-between; margin-bottom:10px;">
                          <div style="background-color:#FCF4A3; border-radius:5px; padding:6px 10px 3px 10px; letter-spacing:1px;">
                              <h5 class="text-dark"><strong> <?php echo $row['shop_name']; ?></strong></h5>
                          </div>
                          <div style="background-color:#EEDC82; border-radius:50%;width:40px; height:40px;padding:4px 12px;">
                             <h4><span class="text-primary"><strong><?php echo $row['subb'];?></strong></span></h4>
                          </div>
                      </div>
                      <div style="background-color:#fffdd0; padding:6px;border-radius:10px; letter-spacing:1px; height:150px;">
                      <p class="text-danger">" <strong><?php echo $row['feedback'];?></strong> "</p>
                         
                      </div>
                  </div>
                   
               </div>
               <?php
                }
                   ?>
              
             
               </div>
               

             <!-- code ended that should be kept in loop-->
           
          
         </div>
            
           
 
       </div>
 
    </div>
  <!--Product Page Row End-->  
 </div>
 </div>
<!--Product Page End-->  
<?php include "../includes/footer.php" ?>