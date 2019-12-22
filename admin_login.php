<?php
include "connection.php";
include "admin_navbar1.php";

?>
<!doctype html>
<html lang="en">

<head>
 
	<style type="text/css">
	 ul li a {
      color: white !important;
      text-decoration: none;
      display: inline-block;
      size: 20px;


    }
    

    nav li a:hover {
      color: yellow !important;
      text-decoration: none;
      opacity: 0.7;
    }

    nav li {
      display: inline-block !important;
      line-height: 80px;
      margin-right: 5px;

    }
		.avatar{

    width: 90px;
    height: 90px;
    border-radius: 50%;
   position: absolute;
    top: -40px;
    left: calc(50% - 50px);
}
.loginbox{
    width: 320px;
    height: 420px;
    background: rgb(52, 58, 64);
    color: #fff;
    top: 63%;
    left: 50%;
    position: absolute;
   transform:translate(-50%,-50%);
    box-sizing: border-box;
    padding: 70px 30px;
    border-radius: 20px;

    
}
h1{
	margin: 0;
	padding: 0 0 20px;
	text-align: center;
	font-size: 22px;

}
.loginbox p{
	margin: 0;
	padding: 0;
	font-weight: bold;
}
.loginbox input{
	width: 100%;
	margin-bottom: 20px;

}
.loginbox input[type="text"],input[type="password"]{
	border:none;
	border-bottom: 1px solid #fff;
	background: transparent;
	outline: none;
	height: 40px;
	color: #fff;
	font-size: 16px;
}
.loginbox input[type="submit"]{
	border:none;
	outline: none;
	height: 40px;
	background:yellow;
	color: black;
	font-size: 18px;
	border-radius: 20px;
    background: #ffc107;

}
.loginbox input[type="submit"].hover{
	cursor: pointer;
	background: #ffc107;
	color: black;
}
.loginbox a{
  text-decoration: none;
  font-size: 12px;
  line-height: 20px;
  color: darkgrey;
}
.loginbox a:hover{
  color: #ffc107;
}
body{
    
    background-image: url("images/library.jpg");
    
     
   }

	</style>
	</head>

<body>
  
<div class="container-fluid ">
	
	<div class="loginbox">
		<img src="images/avatar.png" class="avatar">
		<h1 style="color: #ffc107;">Admin Login Form</h1>
		<form name="login" action="" method="POST">
			<p>Username</p>
			<input type="text" class="form-control" name="uname" placeholder="Enter username" required="" autocomplete="off">
			<p>Password</p>
			<input type="password"  class="form-control" name="password" placeholder="Enter password" required="">
			<input type="submit" name="submit" value="Login"><br>
			<a href="admin_update_password.php"> Forget Password?</a><br>
			<a href="admin_Registration.php">New to site? Create Account</a>
		</form>

	</div>
   </div>
	 

   <?php
   if(isset($_POST['submit']))
   {
    $count=0;
   $res=mysqli_query($db,"SELECT * FROM `admin` WHERE uname='$_POST[uname]' AND password='$_POST[password]';");
   $row=mysqli_fetch_assoc($res);
   $count=mysqli_num_rows($res);

   if($count==0)
   {
    ?>
    <!--
    <script type="text/javascript">
      alert("The username and password doesnot match.");
    </script> -->
    <div class="alert alert-danger" style="width: 500px; margin-left: 400px; background-color: #e50404; color: white; text-align: center;border-radius: 12px;">
      <strong>The username and password doesn't match!!</strong>
   
    
  
   <?php
    
   }
else{
  /*----- if username and password matches----*/
$_SESSION['login_user']=$_POST['uname'];
$_SESSION['pic']=$row['pic'];
  ?>
  <script type="text/javascript">
    window.location="admin_index.php"
  </script>
  <?php
}
 }
   ?>
   </div>



	
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>


</body>
</html>