
<?php 
$con= mysqli_connect("localhost", "id16099468_capstone", "Pd@123456789", "id16099468_ebazar")or die($mysqli_error($con));
?>

<?php include "../includes/header.php" ?>

<?php $index="../../index.php"; $path="../../"; include "../includes/navbar.php" ?>
<div class="container">
    <div class="row text-center mb-3 mt-5">
        <h2>THIS WEBSITE IS CONTRIBUTED BY</h2>
    </div>
    <div class="row mb-5">
        <?php
        $developerName= array("Abhay Kumar","Prabhakar","Rishab Mishra","Saurabh Kumar");
        for($i=0;$i<4;$i++)
        {
            ?>
        <div class="col-sm-3 mb-3">
        <div class="card">
                     <div class="box">
                       <div class="thumbnail">
                                <img class="img-thumbnail" src="avtar.png" alt="img">
                                <div class="caption text-center">
                                    <h3 style="color:blue;"><?php echo $developerName[$i];?></h3>
                                    <p style="text-align:center"> B.Tech,CSE(Lovely Professional University)</p>
                                </div>
                            </div> 
                     </div>
                  </div>
</div>
 <?php
        }
        ?>
</div>
    </div>
   
    <?php include "../includes/footer.php" ?>
