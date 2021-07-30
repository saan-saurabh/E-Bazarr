<?php include "src/db_con.php" ?>
<?php include "templates/includes/header.php" ?>
<!--<script type="text/javascript">
   function validation()
   {
   var x= document.forms["myform"]["userlogin"].value;
   var y= document.forms["myform"]["userpassword"].value;
   var emailRegex=/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
   var passwordRegex=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;
   var emailResult=emailRegex.test(x);
   var passwordResult=passwordRegex.test(y);
   if(x=="" && y=="")
   {

   alert("EMAIL is required\nPASSWORD is required");
   window.location.href="userLogin.php";

   }
   else if(x=="")
   {
    alert('NAME is required');
    window.location.href="userLogin.php";
   }
   else if(y=="")
   {
    alert("PASSWORD is required");
    window.location.href="userLogin.php";
   }
   /*else if(y.length<8)
   {
   alert("PASSWORD must be 8 character long");
   window.location.href="userLogin.php";
   }*/
   else if(emailResult== false)
   {
       alert("EMAIL should be valid one");
       window.location.href="userLogin.php";
   }
   else if(passwordResult== false)
   {
       alert("PASSWORD should be minimum 8 character consisting of numbers and alphabets");
       window.location.href="userLogin.php";
   }

   }
</script>
-->
<div class="container">
          <div class="row text-right mt-3">
             <a href="index.php"><button class="btn btn-primary btn-md"><i class="fa fa-home"></button></i></a>
         </div>
    <div class="row" style="padding-top:8%;">
        <div class="col-lg-5" style="margin:0 auto;">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <h4>User Login</h4>
                </div>
                <br/>
                <div class="card-body">
<form name="myform"  action="src/server/user_signup_login.php" method="POST" onsubmit="validation()">
             <div class="form-group">
              <input type="text" name="userlogin" class="form-control" placeholder="Email Or Phone">
            </div>

            <div class="form-group">
              <input type="password" name="userpassword" class="form-control"
              placeholder="Password">
            </div>

            <button type="submit" name="login" class="btn btn-primary btn-block btn-md">Login</button></div>
            <p class="text-center text-danger"><?php if(isset($_SESSION['loginmsg'])){ echo $_SESSION['loginmsg']; }?></p>
          </form>
          </div>
          <div class="card-footer bg-primary text-light text-right">
              <p>Don't have an Account?<a href="userSignup.php"><span class="text-warning"> SignUp</span></a></p>
          </div>
          </div>
          </div>
          </div>
          </div>
</body>
</html>