<?php
include "connection.php";
include "admin_navbar1.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
</head>
<style type="text/css">
	body{
		background-color: grey;
		height: 650px;
	
		background-image: url("images/3.jpg");

	}

	.change{
    width: 300px;
    height: 370px;
    background: rgb(52, 58, 64);
    color: #fff;
    top: 55%;
    left: 50%;
    position: absolute;
   transform:translate(-50%,-50%);
    box-sizing: border-box;
    padding: 30px 30px;
    border-radius: 20px;

}
    .change p{
	margin: 0;
	padding: 0;
	font-weight: bold;
	
}
.change input{
	width: 100%;
	margin-bottom: 20px;

}
.change input[type="text"],input[type="password"]{
	border:none;
	border-bottom: 1px solid #fff;
	background: transparent;
	outline: none;
	height: 40px;
	color: #fff;
	font-size: 16px;
}
.change input[type="submit"]{
	border:none;
	outline: none;
	height: 30px;
	background:yellow;
	color: black;
	font-size: 18px;
	border-radius: 20px;
    background: #ffc107;

}
.change input[type="submit"].hover{
	cursor: pointer;
	background: #ffc107;
	color: black;
}
.change a{
  text-decoration: none;
  font-size: 12px;
  line-height: 20px;
  color: darkgrey;
}
.change a:hover{
  color: #ffc107;
}
</style>
<body>
	<div class="container-fluid wrapper">
		<div class="change">
			<h4 style="color: #ffc107; font-size: 22px; text-align: center;"><u>Change Your Password</u></h4>
			<form name="change" action="" method="POST">
			<p>Username</p>
			<input type="text" class="form-control" name="uname" placeholder=" Username" required="">
			<p>Email</p>
			<input type="text"  class="form-control" name="email" placeholder="Email" required="">

			<p>New Password</p>
			<input type="text"  class="form-control" name="password" placeholder="New Password" required="" pattern=".{5,}" title="Please enter five or more than five characters.">

			<input type="submit" name="submit" type="submit" value="UPDATE"><br>
		
	</div>
</form>
</div>
<?php
if(isset($_POST['submit'])){
	if(mysqli_query($db,"UPDATE admin SET password='$_POST[password]' WHERE uname='$_POST[uname]'AND email='$_POST[email]';")){
		?>
		<script type="text/javascript">
			alert("The password updated successfully");
		</script>
		<?php
	}

}
?>

</body>
</html>