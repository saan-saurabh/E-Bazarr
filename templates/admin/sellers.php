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
              <th>Owner</th>
              <th>Shop Name</th>
              <th>Seller Email</th>
              <th>Seller Phone</th>
              <th>Seller Address</th>
          </tr>
      </thead>
      <tbody>
          <?php
           $result=$con->prepare("SELECT * FROM sellers");
           $result->execute();
           while($row=$result->fetch(PDO::FETCH_ASSOC)){
          ?>
          <tr>
              <td><?php echo $row['seller_id'] ?></td>
              <td><?php echo $row['owner'] ?></td>
              <td><?php echo $row['shop_name'] ?></td>
              <td><?php echo $row['seller_email'] ?></td>
              <td><?php echo $row['seller_phone'] ?></td>
              <td><?php echo $row['seller_city']."-".$row['seller_state']; ?></td>
          </tr>
          <?php
           }
          ?>
      </tbody>
   </table>
</div>  
</section>

<?php include "admin_footer.php" ?>
<?php
}
else{
    header("Location:admin.php");
}
?>