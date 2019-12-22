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
      
    background-image: url("images/3.jpg");  
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
  
  <span style="font-size:30px;cursor:pointer;color: white;" onclick="openNav()">&#9776; </span>



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
<div class="container">
  <h3 style="text-align: center;color: #ffc107;font-size: 30px;"><b> Approve Request</b></h3><br>
  <form class="approve" method="POST" action="">
    <select name="approve" class="form-control"  required="">
      <option>Yes</option>
    </select><br>
    <input type="text" name="issue" class="form-control" placeholder="Issue date yyyy-mm-dd" required="" value="<?php echo date('Y-m-d');?>"><br>

    <input type="date" name="return" class="form-control" placeholder="Return Date yyyy-mm-dd" required="" min="<?php echo date('Y-m-d');?>"><br><br>

    <button class="btn btn-default" type="submit" name="submit" style="background-color: #ffc107;color: black;">Submit</button>
    
  </form>
  
</div>
</div>
<?php
  if(isset($_POST['submit']))
  {
    mysqli_query($db,"UPDATE  `issue_book` SET  `approve` =  '$_POST[approve]', `issue` =  '$_POST[issue]', `return` =  '$_POST[return]' WHERE uname='$_SESSION[name]' and bid='$_SESSION[bid]';");

    mysqli_query($db,"UPDATE books SET quantity = quantity-1 where bid='$_SESSION[bid]' ;");

    $res=mysqli_query($db,"SELECT quantity from `books` where bid='$_SESSION[bid];");

   while($row=mysqli_fetch_assoc($res)){

         if($row['quantity']==0)
      {
        mysqli_query($db,"UPDATE books SET status='not-available' where bid='$_SESSION[bid]';");
      }
    }
    
    ?>
      <script type="text/javascript">
        alert("Updated successfully.");
        window.location="admin_request.php"
      </script>
    <?php
  }
?>
</body>
</html>