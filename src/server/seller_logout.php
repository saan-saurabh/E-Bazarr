<?php
session_start();
if(isset($_SESSION['seller_id']))
{
  session_destroy();
header("Location: ../../index.php");
}
else
{
  header("Location: ../../index.php");
}
?>