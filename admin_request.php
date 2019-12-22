<?php
  include "connection.php";
  include "admin_navbar1.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Request</title>
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
h2{
	color: red;
	text-align: center;
}
.form-control{

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
</script><br>
<div class="container-fluid">
  <?php
      if(isset($_SESSION['login_user']))
      {
        ?>


  


  
 <?php
 if(isset($_SESSION['login_user'])){
  $sql="SELECT student.uname,faculty,books.bid,name,authors,edition,status FROM student inner join issue_book ON student.uname=issue_book.uname inner join books ON issue_book.bid=books.bid WHERE issue_book.approve =''";
  $res=mysqli_query($db,$sql);

       if(mysqli_num_rows($res)!=0)
{

  
}


       if(mysqli_num_rows($res)==0)
      {
        echo "<br><br><br><br><br>";
        echo "<h2><b>";
        echo "There's no pending request.";
        echo "</h2></b>";
      }
      else
    {
         echo  "<div class='srch'>";
    echo"<form method='post' action='' name='form1'>";
     echo" <input type='text' name='uname' class='form-control' placeholder='Username' required=''>";
     echo "<input type='number' name='bid' class='form-control' placeholder='Book Id' required=''>";
      echo "<button class='btn btn-default' name='submit' type='submit' style='background-color: #ffc107;color: black;'>Submit</button>";
      echo "&nbsp"; echo "&nbsp";echo "&nbsp";echo "&nbsp";
      echo "<button class='btn btn-default' name='cancel' type='submit' style='background-color: #ffc107;color: black;'>Cancel Request</button>";

    echo "</form>";
      echo "<br>";
  echo "</div>";
 echo "<h2 style='text-align: center; color: black;'> Request Of Books </h2>";


      echo "<table class='table table-bordered mt-5' >";
      echo "<tr style='background-color: #ffc107'>";
        //Table header
        
        echo "<th>"; echo "Username";  echo "</th>";
        echo "<th>"; echo "Faculty";  echo "</th>";
        echo "<th>"; echo "BID";  echo "</th>";
        echo "<th>"; echo "Book Name";  echo "</th>";
        echo "<th>"; echo "Authors Name";  echo "</th>";
        echo "<th>"; echo "Edition";  echo "</th>";
        echo "<th>"; echo "Status";  echo "</th>";
        
      echo "</tr>"; 

      while($row=mysqli_fetch_assoc($res))
      {
        echo "<tr>";
        echo "<td>"; echo $row['uname']; echo "</td>";
        echo "<td>"; echo $row['faculty']; echo "</td>";
        echo "<td>"; echo $row['bid']; echo "</td>";
        echo "<td>"; echo $row['name']; echo "</td>";
        echo "<td>"; echo $row['authors']; echo "</td>";
        echo "<td>"; echo $row['edition']; echo "</td>";
        echo "<td>"; echo $row['status']; echo "</td>";
        
        
        echo "</tr>";
      }
    echo "</table>";
    }
 }
}
 else
 {
  ?>
  <br><br><br><br><br>
  <h3 style="text-align: center; color: red;font-size: 30px;"> <b><B>You need to login first to see the request<B></b></h3><br>

 

  <?php
 }
 if (isset($_POST['submit'])) {
  $_SESSION['name']=$_POST['uname'];
  $_SESSION['bid']=$_POST['bid'];
  ?>
  <script type="text/javascript">
    window.location="approve.php"
  </script>

<?php
  
 }

    ?>
    

    <?php
    if (isset($_POST['cancel'])) {
       $_SESSION['name']=$_POST['uname'];
  $_SESSION['bid']=$_POST['bid'];
   
  mysqli_query($db,"UPDATE `issue_book` SET `approve` = 'No', `issue` = '-', `return` ='-' WHERE uname='$_SESSION[name]' and bid='$_SESSION[bid]';");

 

 mysqli_query($db,"DELETE FROM 'admin_request' WHERE uname='$_SESSION[name]' and bid='$_SESSION[bid]'; ");

  ?>
  <script type="text/javascript">
        alert("Request cancelled!!");
        window.location="admin_request.php"
      </script>
      <?php
    }
    ?>

 


  </div>
</div>
</body>
</html>