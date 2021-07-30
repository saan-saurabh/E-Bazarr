<?php include "src/db_con.php" ?>
<?php session_start();?>
<?php include "templates/includes/header.php" ?> 

     <div class="container">
         <div class="row text-right mt-3">
             <a href="index.php"><button class="btn btn-primary btn-md"><i class="fa fa-home"></button></i></a>
         </div>
    <div class="row" style="padding-top:8%;">
        <div class="col-lg-5" style="margin:0 auto;">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <h4>Seller Login</h4>
                </div>
                <br/>
            <div class="card-body">
            <form  action="src/server/seller_login_script.php" method="POST">
            <div class="form-group">
              <input type="email" name="email" class="form-control" placeholder="Email">
            </div>

            <div class="form-group">
              <input type="password" name="password" class="form-control"
              placeholder="Password">
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block btn-md">Login</button></button><br/></div>

          </form>
                    
          </div>
          <div class="card-footer bg-primary text-light text-right">
              <p>Don't have an Account?<a href="sellerSignup.php"><span class="text-warning"> SignUp</span></a></p>
          </div>
          </div>
          </div>
          </div>
          </div>
</body>
</html>
