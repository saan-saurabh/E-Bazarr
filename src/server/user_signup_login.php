<?php
 session_start();
 include "../db_con.php";
//Code For SignUp Data
  $regex_name= "/^[a-zA-Z ]*$/";
  $regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
  $regex_num = "/^[6789][0-9]{9}$/";
  $regex_pass="/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/";
 if(isset($_REQUEST['submit']))
 {
    if(($_REQUEST['username']=="")||($_REQUEST['useremail']=="")||($_REQUEST['userphone']=="")||($_REQUEST['userpassword']=="")||($_REQUEST['userconfirmpassword']==""))
    {
      // header("location:../../index.php");
      // $_SESSION['signmsg']="Fill All The Details";
      echo "<script type='text/javascript'>alert('Fill All The Details, All the fields are mandatory!');window.location.href='../../userSignup.php';</script>";
    }
   else if (!preg_match($regex_name, $_REQUEST['username'])) {
  echo "<script type='text/javascript'>alert('NAME should be a valid and contan only alphabets!');window.location.href='../../userSignup.php';</script>";

  }
  else if (!preg_match($regex_email, $_REQUEST['useremail'])) {
  echo "<script type='text/javascript'>alert('EMAIL should be a valid one!');window.location.href='../../userSignup.php';</script>";

  }
    else if (!preg_match($regex_num, $_REQUEST['userphone'])) {
      echo "<script type='text/javascript'>alert('PHONE NO. should be 10 digit and a valid one!');window.location.href='../../userSignup.php';</script>"; 
     
  }
  else if(!preg_match($regex_pass, $_REQUEST['userpassword'])) {
   echo "<script type='text/javascript'>alert('PASSWORD should be min 8 character with one Upper case letter and one Lower case letter and a Number!');window.location.href='../../userSignup.php';</script>";
}
 else if($_REQUEST['userpassword']!=$_REQUEST['userconfirmpassword']){
    echo "<script type='text/javascript'>alert('PASSWORD and CONFIRM PASSWORD did not match!');window.location.href='../../userSignup.php';</script>"; 
  }
    
    else
    {
        $username=$_REQUEST['username'];
        $useremail=$_REQUEST['useremail'];
        $userphone=$_REQUEST['userphone'];
        $userpassword=$_REQUEST['userpassword'];
        $active_status=1;

        $query="SELECT * FROM users WHERE user_email='$useremail' or user_phone='$userphone' ";
        $result=$con->prepare($query);
        $result->execute();
        $num=$result->rowCount();
        if($num>0)
        {
          echo "<script type='text/javascript'>alert('EMAIL already exist!');window.location.href='../../userSignup.php';</script>";
       } 
 
        else
        {
          $query="INSERT INTO users(user_name,user_phone,user_email,user_pass,active_status) VALUES(?,?,?,?,?)";
          $result=$con->prepare($query);
          $result->execute(array($username,$userphone,$useremail,$userpassword,$active_status));

          if($result)
          {
            $query="SELECT user_id FROM users WHERE user_email='$useremail'";
            $result=$con->prepare($query);
            $result->execute();
            $row=$result->fetch(PDO::FETCH_ASSOC);
             $_SESSION['user_id']=$row['user_id'];
             $_SESSION['user_name']=$username;
             $_SESSION['user_email']=$useremail;
             echo "<script>window.location='../../index.php'</script>";
          }
          else
          {
            echo "<script type='text/javascript'>alert('Incorrect User data!');window.location.href='../../userSignup.php';</script>"; 
          }
        }

    }
}

 //code For Login DATA
if(isset($_REQUEST['login']))
{
    if(($_REQUEST['userlogin']=="")||($_REQUEST['userpassword']==""))
    {
      // header("location:../../index.php");
      // $_SESSION['loginmsg']="Fill All The Details";
       echo "<script type='text/javascript'>alert('Fill All The Details');window.location.href='../../userLogin.php';</script>";
    }
    else if(!preg_match($regex_email, $_REQUEST['userlogin']))
    {
        echo "<script type='text/javascript'>alert('EMAIL should be valid one');window.location.href='../../userLogin.php';</script>";
    }
    else{
    $userlogin=$_REQUEST['userlogin'];
    $userpassword=$_REQUEST['userpassword'];

    $query="SELECT * FROM users WHERE (user_email='$userlogin' OR user_phone='$userlogin') AND user_pass='$userpassword'";
    $result=$con->prepare($query);
    $result->execute();
    $row=$result->fetch(PDO::FETCH_ASSOC);
    if($row)
    {
       if($row>0 && $row['active_status']==1)
       {
         $_SESSION['user_name']=$row['user_name'];
         $_SESSION['user_id']=$row['user_id'];
         $_SESSION['user_email']=$row['user_email'];
         header("location: ../../index.php");
       }
       else{
         echo "<script type='text/javascript'>alert('Your Account Is Disable');window.location.href='../../userLogin.php';</script>";
       }
    }
    else
    {
        //header("location:../../index.php");
        //$_SESSION['loginmsg']="Invalid Login Details";
         echo "<script type='text/javascript'>alert('Not a valid userId and Password');window.location.href='../../userLogin.php';</script>";
    }
 }

}
?>
