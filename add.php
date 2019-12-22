<?php
  include "connection.php";
  include "admin_navbar1.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Books</title>
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
.img-circle{
  margin-left: 20px;
}
.book{
  width: 280px;
  margin: 0px auto;
}
.form-control{
  color: black;
}
.btn-default{
  background-color: #ffc107;
  color: black;
  width: 100px; 
  height: 40px; 
  font-size: 20px;
}
.btn-default:hover{
  color: #222;
  background-color: #ffc107
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



<div id="main" >
  
  <span style="font-size:30px;cursor:pointer;color: white;" onclick="openNav()">&#9776; </span>
  <div class="container-fluid" style="text-align: center;">
 <h2 style="color: #ffc107;font-family: Lucida Console;text-align: center;"><b> Add New Books</b></h2>

  <form class="book" action="" method="POST">
    
    <input type="text" name="name" class="form-control" placeholder="Book Name" autocomplete="off" required="" pattern="[a-zA-Z\s]+" title=" Please enter on alphabets only."><br>

    <input type="text" name="authors" class="form-control" placeholder="Author's Name" required="" pattern="[a-zA-Z\s]+" title="" Please enter on alphabets only."><br>
    
    <select name="edition" class="form-control" placeholder="Edition" required="" value="Edition">
<option>1st edition</option>
<option>2nd edition</option>
<option>3rd edition</option>
<option>4th edition</option>
<option>5th edition</option>
      </select><br>
    <select name="status" class="form-control" placeholder="Status" required="">
      <option>Available</option>
    </select><br>
    <input type="number" name="quantity" class="form-control" placeholder="Quantity" required=""><br>
    
     <select name="department" class="form-control" required="" style="color: black;">
     
        <option>BSC csit</option>
        <option>BCA</option>
        <option>BBM</option>
        <option>BBS</option>
      </select><br><br>
         
    <button class="btn btn-default" name="submit" value="submit">ADD</button><br>
</form>

</div>

<?php
    if(isset($_POST['submit']))
    {
      if(isset($_SESSION['login_user']))
      {
        mysqli_query($db,"INSERT INTO books VALUES ('', '$_POST[name]', '$_POST[authors]', '$_POST[edition]', '$_POST[status]', '$_POST[quantity]', '$_POST[department]') ;");
        ?>
          <script type="text/javascript">
            alert("Book Added Successfully.");
          </script>

        <?php

      }
      else
      {
        ?>
          <script type="text/javascript">
            alert("You need to login first.");
          </script>
        <?php
      }
    }
?>
</div>
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


</body>
</html>