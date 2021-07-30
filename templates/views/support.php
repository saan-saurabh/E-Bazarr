<?php 
$con= mysqli_connect("localhost", "id16099468_capstone", "Pd@123456789", "id16099468_ebazar")or die($mysqli_error($con));
?>

<?php include "../includes/header.php" ?>

<?php $index="../../index.php"; $path="../../"; include "../includes/navbar.php" ?>
<div class="container">
<div class="row" style="padding-top:8%;">
        <div class="col-lg-5" style="margin:0 auto;">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <h4>Write Us..</h4>
                </div>
                <br/>
                <div class="card-body">

			<form action="dishUpdateScript.php?id=<?php echo $id;?>" method="POST">
				<div class="form-group">
				<input class="form-control" type="email" name="email" placeholder="Your Email" required="true"/>
			    </div>
				<div class="form-group">
				<textarea class="form-control" rows=5 cols=5 placeholder="Whart can we do.." required="true"></textarea>
				</div>

				<div class="form-group">
				<button class="btn btn-block btn-primary" type="submit" value="Register">Submit</button>
				</div>

			</form>
		  </div>
	    </div>
       </div>
     </div>
    </div>

   <?php include "../includes/footer.php" ?>