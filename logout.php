<?php
  session_start();
  if (isset($_SESSION['login_user'])) {
  	# code...
  	unset($_SESSION['login_user']);
  }
  header("location:index.php");
?>

