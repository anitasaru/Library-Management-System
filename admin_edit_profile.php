<?php
include "connection.php";
include "admin_navbar1.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
	<style type="text/css">
		body{
			background-image: url("images/3.jpg");
		}
		.form-control{
			width: 280px;
			height: 35px;
			margin: 0px auto;
			
		
			
		}
		
		label{
			color: white;
			margin-left:-200px;

		}
	</style>
</head>
<body>
	<br><br>
	<h2 style="text-align: center;color: #ffc107;">Edit Information</h2><br>
	
	<?php
	$sql="SELECT * FROM admin WHERE uname='$_SESSION[login_user]' ";
	$result=mysqli_query($db,$sql);
	while ($row=mysqli_fetch_assoc($result)) {
		$first=$row['first'];
		$last=$row['last'];
		$uname=$row['uname'];
		$password=$row['password'];
		$email=$row['email'];
	}

	?>






	<div class="profile_info" style="text-align: center;">

	<form class="pfrl" action="" method="POST" name="form" enctype="multipart/form-data">
          <label><b>Profile Pic:</b></label>
          <input class="form-control" type="file" name="file" accept="image/*">

		<label><b>First Name:</b></label>
       <input type="text" name="first" class="form-control" value="<?php echo $first; ?>">
       	<label><b>Last Name:</b></label>
       <input type="text" name="last" class="form-control" value="<?php echo $last; ?>">
       	<label><b>UserName:</b></label>
       <input type="text" name="uname" class="form-control" value="<?php echo  $uname; ?>">
       	<label><b>Password:</b></label>
       <input type="text" name="password" class="form-control" value="<?php echo  $password; ?>">
       	<label style="margin-left: -230px;"><b>Email:</b></label>
       <input type="text" name="email" class="form-control" value="<?php echo  $email; ?>"><br>

       <input type="submit" name="Save" value="Save" class="form-control" style="font-size: 18px;width: 100px;background-color: #ffc107;color: black;">
      
	</form>
	</div>
	<?php
	if(isset($_POST['Save']))
		{

			move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);

			$first=$_POST['first'];
			$last=$_POST['last'];
			$uname=$_POST['uname'];
			$password=$_POST['password'];
			$email=$_POST['email'];
		    $pic=$_FILES['file']['name'];

			$sql1= "UPDATE admin SET pic='$pic', first='$first', last='$last', uname='$uname', password='$password', email='$email' WHERE uname='".$_SESSION['login_user']."';";

			if(mysqli_query($db,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
							window.location="admin_profile.php";
						
					</script>
				<?php
			}
		}
	?>

</body>
</html>