<?php
  include "connection.php";
  include "navbar1.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
    
    p{
      color: red;
      font-size: 18px;
      text-align: left;
      margin-top: 10px;
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
h2{
	color: red;
	text-align: center;
}

  </style>
</head>
<body>
	<!--__________________________sidenav________________________-->
 
  
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
<div style="color: white; margin-left: 60px; font-size: 22px;">
                      <?php
                    if(isset($_SESSION['login_user'])){
              
                        # code...
                     
                      echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
                      echo "</br>";
                        echo " Welcome,".$_SESSION['login_user']; 
                   }
                      ?>
                    </div><br>

 <a href="book.php">Books</a>
 <a href="request.php">Book Request</a>
  <a href="issue_info.php">Borrowed Information</a>
  <a href="student_expired.php">Expired List</a>
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
</script><br><br>
 <?php

    if(isset($_SESSION['login_user']))
    {
      $q=mysqli_query($db,"SELECT * from issue_book where uname='$_SESSION[login_user]' ");

      if(mysqli_num_rows($q)==0)
      {
        echo "<p>There is no pending request.</p>";
      }
      else
      {
    echo "<table class='table table-bordered table-hover' >";
      echo "<tr style='background-color: #ffc107;'>";
        //Table header
        echo "<th>"; echo "Book-ID"; echo "</th>";
        echo "<th>"; echo "Approve Status";  echo "</th>";
        echo "<th>"; echo "Request Date";  echo "</th>";
        echo "<th>"; echo "return date";  echo "</th>";
        
      echo "</tr>"; 

      while($row=mysqli_fetch_assoc($q))
      {
        echo "<tr>";
        echo "<td>"; echo $row['bid']; echo "</td>";
        echo "<td>"; echo $row['approve']; echo "</td>";
        echo "<td>"; echo $row['issue']; echo "</td>";
        echo "<td>"; echo $row['return']; echo "</td>";
        

        echo "</tr>";
      }
    echo "</table>";
      }
    }
    else{
    	echo"</br></br></br></br></br>";
    
    	echo "<h2 style='font-size:30px;'><b>Please! Login first to see the request..</b></h2>";
 
    }
    ?>

</body>
</html>