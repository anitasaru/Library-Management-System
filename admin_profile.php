<?php
include "connection.php";
include "admin_navbar1.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<style type="text/css">
		body{
			background-image: url("images/3.jpg");
		}
		.btn-default{
			float: right;
			width: 70px;
			background-color: #ffc107;
		}
		.wrapper{
			width: 400px;
			margin: 0 auto;
			color: white;
			font-size: 15px;
            }
            .btn-default:hover{
            	background-color: #ffc107;
            }
            td{
            	font-size: 17px;
            }


	</style>
</head>
<body>
	<div class="container-fluid">
		<form action="" method="POST">
			<button class="btn btn-default"  name="submit1" type="submit"> Edit</button>
		</form>
		<div class="wrapper">
			<?php
if (isset($_POST['submit1'])) {

	?>
	<script type="text/javascript">
		window.location="admin_edit_profile.php";
	</script>
	<?php
	
}

			$q=mysqli_query($db,"SELECT * from admin where uname='$_SESSION[login_user]' ;");
			?>
			<h2 style="text-align: center; color: #ffc107;">My Profile</h2>

			<?php

			$row=mysqli_fetch_assoc($q);
			echo "<div style='text-align:center;' >
			<img class='img-circle profile-img' height=110 width=120 src='images/".$_SESSION['pic']."'' ></div>";
			?><br>
           <div style="text-align: center;font-size: 20px; "><B>WELCOME</B> 
      <h4 style="text-align: center; font-size: 18px ;">
      	<?php
      	echo $_SESSION['login_user'];
      	?>
      </h4>
		</div>
		<?php
		echo "<b>";
		echo "<table class='table table-bordered'>";
		   echo "<tr>";

		   echo "<td>"; 
		   echo"<b> First Name:</b>"; 
		   echo "</td>";

		    echo "<td>"; 
		    echo $row['first']; 
		    echo "</td>";
		   echo "</tr>";

		    echo "<tr>";

		    echo "<td>"; 
		    echo"<b> Last Name:</b>";
		    echo "</td>";

		    echo "<td>";
		    echo $row['last'];
		     echo "</td>";
		   echo "</tr>";

		    echo "<tr>";
		    echo "<td>"; 
		    echo "<b>Username:</b>";
		    echo "</td>";
		    echo "<td>"; 
            echo $row['uname'];
		    echo "</td>";
		   echo "</tr>";

		    echo "<tr>";
		    echo "<td>"; 
               echo "<b>Password:</b>";
		    echo "</td>";
		    echo "<td>"; 
             echo $row['password'];
		    echo "</td>";
		   echo "</tr>";
		

		    echo "<tr>";
		    echo "<td>"; 
             echo "<b> Email:</b>";
		    echo "</td>";
		    echo "<td>"; 
             echo $row['email'];
		    echo "</td>";
		   echo "</tr>";

		  
         
         echo "</table>";
         echo "</b>";
		   
		?>
		
	</div>
	</div>

</body>
</html>
