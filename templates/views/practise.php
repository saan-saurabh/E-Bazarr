<?php 
$con= mysqli_connect("localhost", "id16099468_capstone", "Pd@123456789", "id16099468_ebazar")or die($mysqli_error($con));
?>
<?php
              $query="SELECT users.user_name, feedbacks.feedback FROM feedbacks inner join users on feedbacks.user_id=users.user_id";
              $result = mysqli_query($con, $query)or die($mysqli_error($con));
              $num = mysqli_num_rows($result);
              $row = mysqli_fetch_array($result);
               while($row=mysqli_fetch_array($result))
                {
                    echo $row['user_name'];
                    echo $row['feedback'];
}
              ?>