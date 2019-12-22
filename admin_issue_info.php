<?php
  include "connection.php";
  include "admin_navbar1.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Approve Request</title>
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
.container{
  height: 400px;
  width: 350px;
  background-color: black;
  opacity: .6;
  color: white;
}
.approve{
  margin: 0px auto;
  width: 200px;
}

.btn-default{
  background-color: #ffc107;
  color: black;
  
  font-size: 20px;
}
.scroll{
  width: 100%;
  height:350px;
  overflow: auto;

}
th,td{
  width: 10%;

}
element.style{
  color: black;
  background-color: red;
}
p{
  font-size: 15px;
  text-align: center;
  margin-top: 0px;
  color: white;
  background-color: red;
}
.glyphicon-search{
  font-size: 20px;

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
  
  <span style="font-size:30px;cursor:pointer;" onclick="openNav()">&#9776; </span>



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





  <div class="container-fluid">


  

  <?php
  $c=0;

  if (isset($_SESSION['login_user'])) {

    $sql="SELECT student.uname,faculty,books.bid,name,authors,edition,issue,issue_book.return FROM student inner join issue_book ON student.uname=issue_book.uname inner join books ON issue_book. bid=books.bid WHERE issue_book.approve ='Yes' ORDER BY `issue_book`.`return` ASC";
        $res=mysqli_query($db,$sql);

        
        
      echo" <h2 style='text-align: center; color: black;'>Information Of Issued Books</h2>";
    
     echo "<table class='table table-bordered' style='width:100%' >";
      echo "<tr style='background-color: #ffc107'>";
        //Table header
        
        echo "<th>"; echo "Username";  echo "</th>";
        echo "<th>"; echo "Faculty";  echo "</th>";
        echo "<th>"; echo "BID";  echo "</th>";
        echo "<th>"; echo "Book Name";  echo "</th>";
        echo "<th>"; echo "Authors Name";  echo "</th>";
        echo "<th>"; echo "Edition";  echo "</th>";
        echo "<th>"; echo "Issue Date";  echo "</th>";
        echo "<th>"; echo "Return Date";  echo "</th>";
        
      echo "</tr>";
      echo "</table>";

        echo "<div class='scroll'>";
        echo "<table class='table table-bordered' >";

       while($row=mysqli_fetch_assoc($res))
      {
        $d=date("Y-m-d");
        if ($d > $row['return'] ) {
          $c=$c+1;
          $var='<p>EXPIRED</p>';

          mysqli_query($db,"UPDATE issue_book SET approve='$var' WHERE `return`='$row[return]' and approve='Yes' limit $c;");
            echo $d."</br>";
          # code...
        }
      


        echo "<tr>";
        echo "<td>"; echo $row['uname']; echo "</td>";
        echo "<td>"; echo $row['faculty']; echo "</td>";
        echo "<td>"; echo $row['bid']; echo "</td>";
        echo "<td>"; echo $row['name']; echo "</td>";
        echo "<td>"; echo $row['authors']; echo "</td>";
        echo "<td>"; echo $row['edition']; echo "</td>";
        echo "<td>"; echo $row['issue']; echo "</td>";
        echo "<td>"; echo $row['return']; echo "</td>";
        
        
        echo "</tr>";
      }
     
    echo "</table>";
     echo "</div>";
   }
   else{
    ?>
     <br><br><br><br><br>
    <h2 style="text-align: center; color: red;font-size: 30px;"><B>Please! Login to see Information Of Borrowed Books</B></h2><br>
    <?php
   }
  ?>
</div>
</div>
</body>
</html>



