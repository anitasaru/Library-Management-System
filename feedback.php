<?php
include "connection.php";
include "navbar1.php"

?>
<!DOCTYPE html>
<html>
<head>
	

	<title>Feedback</title>
	
	<style type="text/css">
		body{
			background-image: url("images/3.jpg");
			height: 500px;
		}
		.wrapper{
			padding: 10px;
			margin: 10px auto;
			width: 700px;
			height: 500px;
			background-color: black;
			opacity: .8;
			color: white;
			border-radius: 8px;

		}
		.form-control{
			height: 70px;
			width: 100%;
		}
		.scroll
    	{
    		width: 100%;
    		height: 250px;
    		overflow: auto;
    	}
    	.btn-default{
    		height: 40px;
    		width: 100px;
    		background-color:#ffc107;;
    		color: black;
    		

    	}
    	.table{
    		color: white;
    	}
    	.btn-default:hover{
    		color: white;
    		background-color: #ffc107;
    	}
    	h2{
    		text-align: center;
    		color: white;
    	}
	</style>
</head>
<body>
	

<?php
		 if(isset($_SESSION['login_user'])){

		 	
		 
		 	echo "<div class='wrapper'>";
		echo "<h4 style='text-align: center; color: #ffc107;'>If you have any suggestion or question please! comment below.</h4><br>";
		echo "<form style='' action='' method='POST'>";
		echo "<input class='form-control' type='text' name='comment' placeholder='Write something..''><br>";
		echo"	<input class='btn btn-default' type='submit' name='submit' value='Comment' style='width: 100px; height: 35px;'>	";	
		echo"</form>";
	
echo"<br><br>";
echo"<div class='scroll'>";
	
			if(isset($_POST['submit']))
			{
				$sql="INSERT INTO `comments` VALUES('','$_SESSION[login_user]','$_POST[comment]');";
				if(mysqli_query($db,$sql))
				{
					$q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
					$res=mysqli_query($db,$q);

					echo "<table class='table table-bordered'>";
					while ($row=mysqli_fetch_assoc($res)) 
					{
						echo "<tr>";
						echo "<td>"; echo $row['uname']; echo "</td>";
							echo "<td>"; echo $row['comment']; echo "</td>";
						echo "</tr>";
					}
				}

			}

			else
			{
				$q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC"; 
					$res=mysqli_query($db,$q);

					echo "<table class='table table-bordered'>";
					while ($row=mysqli_fetch_assoc($res)) 
					{
						echo "<tr>";
						    echo "<td>"; echo $row['uname']; echo "</td>";
							echo "<td>"; echo $row['comment']; echo "</td>";
						echo "</tr>";
					}
			}
		}
		else{
			echo"</br></br></br></br></br></br></br></br></br>";
    
    	echo "<h2 style='font-size:30px;'><b>Please! Login first to send any comment..</b></h2>";
 
    
		}
		echo"</div>";
	echo"</div>";
		?>
	</div>
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