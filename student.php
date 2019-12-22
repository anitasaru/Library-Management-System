<?php
  include "connection.php";
  include "admin_navbar1.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Information</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		 p{
      color: red;
      font-size: 30px;
      text-align: center;
      margin-top: 50px;
    }
    .srch{
      float: right;
    
    }
     body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
  margin-top: 51px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #ffc107;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle{
  margin-left: 20px;
}
   

	</style>
</head>
<body>
	<!--__________________________sidenav________________________-->
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
<div style="color: white; margin-left: 60px; font-size: 22px;">
                      <?php
                      echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
                      echo "</br>";
                        echo " Welcome,".$_SESSION['login_user']; 
                      ?>
                    </div><br><br>

  
  <a href="add.php">Add Books</a>
  <a href="admin_request.php">Book Request</a>
  <a href="admin_issue_info.php">Issue Information</a>
  <a href="expired.php">Expired List</a>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
	<!--__________________________search bar________________________-->

	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="search" placeholder="Student username.." required="">
				<button style="background-color: #ffc107;" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
	</div>

	<h2 style="text-align: center;">List Of Students</h2>
	<?php

		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT first,last,uname,email,faculty FROM `student` where uname like '%$_POST[search]%' ");

			if(mysqli_num_rows($q)==0)
			{
				echo "<p>Sorry! No student found with that username. Try searching again.</p>";
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #ffc107;'>";
				//Table header
				echo "<th>"; echo "First Name";	echo "</th>";
				echo "<th>"; echo "Last Name";  echo "</th>";
				echo "<th>"; echo "Username";  echo "</th>";
				echo "<th>"; echo "Email";  echo "</th>";
				echo "<th>"; echo "Faculty";  echo "</th>";
				
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['first']; echo "</td>";
				echo "<td>"; echo $row['last']; echo "</td>";
				echo "<td>"; echo $row['uname']; echo "</td>";
				echo "<td>"; echo $row['email']; echo "</td>";
				echo "<td>"; echo $row['faculty']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
			}
		}
			/*if button is not pressed.*/
		else
		{
			$res=mysqli_query($db,"SELECT first,last,uname,email,faculty FROM `student`;");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #ffc107;'>";
				//Table header
				echo "<th>"; echo "First Name";	echo "</th>";
				echo "<th>"; echo "Last Name";  echo "</th>";
				echo "<th>"; echo "Username";  echo "</th>";
				echo "<th>"; echo "Email";  echo "</th>";
				echo "<th>"; echo "Faculty";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				
				echo "<td>"; echo $row['first']; echo "</td>";
				echo "<td>"; echo $row['last']; echo "</td>";
				echo "<td>"; echo $row['uname']; echo "</td>";
				echo "<td>"; echo $row['email']; echo "</td>";
				echo "<td>"; echo $row['faculty']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
		}

	?>
</div>

</body>
</html>