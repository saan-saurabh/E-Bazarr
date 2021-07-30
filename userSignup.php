<?php include "src/db_con.php" ?>
<?php include "templates/includes/header.php" ?>
<!--<script type="text/javascript">
   function validation()
   {
   var x= document.forms["myform"]["username"].value;
   var y= document.forms["myform"]["useremail"].value;
   var z= document.forms["myform"]["userphone"].value;
   var u= document.forms["myform"]["userpassword"].value;
   var v= document.forms["myform"]["userconfirmpassword"].value;
   
   var emailRegex=/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
   var passwordRegex=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;
   var phoneRegex=/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
   var emailResult=emailRegex.test(y);
   var passwordResult=passwordRegex.test(u);
   var phoneResult= phoneRegex.test(z);
   if(x=="" && y=="" && z=="" && u=="" && v=="")
   {

   alert("NAME is required\nEMAIL is required\nPHONE is required\nPASSWORD is required");
   return false;
   window.location.href="userSignup.php";

   }
   else if(x=="")
   {
    alert('NAME is required');
       return false;
    window.location.href="userSignup.php";

   }
   else if(y=="")
   {
    alert("EMAIL is required");
       return false;
    window.location.href="userSignup.php";

   }
   else if(z=="")
   {
    alert("PHONE NO. is required");
       return false;
    window.location.href="userSignup.php";

   }
   else if(u=="")
   {
    alert("PASSWORD is required");
       return false;
    window.location.href="userSignup.php";

   }
   else if(v=="")
   {
    alert("CONFIRM PASSWORD is required");
       return false;
    window.location.href="userSignup.php";

   }

   else if(emailResult== false)
   {
       alert("EMAIL should be valid one");
          return false;
       window.location.href="userSignup.php";
   }
   else if(passwordResult== false)
   {
       alert("PASSWORD should be minimum 8 character consisting of numbers and alphabets");
          return false;
       window.location.href="userSignup.php";
   }
   else if(phoneResult== false)
   {
       alert("PHONE NO. should be valid one");
          return false;
       window.location.href="userSignup.php";
   }
   else if(u!=v)
   {
       alert("PASSWORD and CONFIRM PASSWORD does not match");
          return false;
       window.location.href="userSignup.php";
   }
   else
   {
       return true;
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
                    <h4>User Signup</h4>
                </div>
                <br/>
                <div class="card-body">
<form name="myform" action="src/server/user_signup_login.php" method="POST" onsubmit="return validation()">

            <div class="form-group">
              <input type="text" name="username" class="form-control" placeholder="Name">
            </div>

            <div class="form-group">
              <input type="email" name="useremail" class="form-control"
              placeholder="Email">
            </div>

            <div class="form-group">
              <input type="tel" name="userphone" class="form-control"
              placeholder="Phone">
            </div>

            <div class="form-group">
              <input type="password" name="userpassword" class="form-control"
              placeholder="Password">
            </div>

            <div class="form-group">
              <input type="password" name="userconfirmpassword" class="form-control"
              placeholder="Confirm Password">
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-block btn-md">Register</button></button></div>
            <p class="text-center text-danger"><?php if(isset($_SESSION['signmsg'])){ echo $_SESSION['signmsg']; }?></p>
          </form>
          </div>
          <div class="card-footer bg-primary text-light text-right">
              <p>Already have an Account?<a href="userLogin.php"><span class="text-warning"> Login</span></a></p>
          </div>
          </div>
          </div>
          </div>
          </div>
</body>
</html>