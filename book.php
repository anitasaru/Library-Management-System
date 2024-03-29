<?php
  include "connection.php";
  include "navbar1.php";
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
</script>





  <!--__________________________search bar________________________-->

  <div class="srch">
    <form class="navbar-form" method="post" name="form1">
      
        <input class="form-control" type="text" name="search" placeholder="search books.." required="" autocomplete="off"><button style="background-color:#ffc107; " type="submit" name="submit" class="btn btn-default">
          <span class="glyphicon glyphicon-search"></span>
        </button>

      
    </form>
  
  <!---__________________________________Request Book___________________-->

    <form class="navbar-form" method="post" name="form1">
      
        <input class="form-control" type="number" name="bid" placeholder="Enter Book ID.." required=""><button style="background-color:#ffc107; " type="submit" name="submit1" class="btn btn-default">
        Request
        </button>

      
    </form>
  </div><br><br>



  <?php

    if(isset($_POST['submit']))
    {
      $q=mysqli_query($db,"SELECT * from books where name like '%$_POST[search]%' ");

      if(mysqli_num_rows($q)==0)
      {
        echo "<p>Sorry! No book found. Try searching again.</p>";
      }
      else
      {
        echo"<h2 style='text-align: center;'>List Of Books</h2>";
    echo "<table class='table table-bordered table-hover' >";
      echo "<tr style='background-color: #ffc107;'>";
        //Table header
        echo "<th>"; echo "ID"; echo "</th>";
        echo "<th>"; echo "Book-Name";  echo "</th>";
        echo "<th>"; echo "Authors Name";  echo "</th>";
        echo "<th>"; echo "Edition";  echo "</th>";
        echo "<th>"; echo "Status";  echo "</th>";
        echo "<th>"; echo "Quantity";  echo "</th>";
        echo "<th>"; echo "Department";  echo "</th>";
      echo "</tr>"; 

      while($row=mysqli_fetch_assoc($q))
      {
        echo "<tr>";
        echo "<td>"; echo $row['bid']; echo "</td>";
        echo "<td>"; echo $row['name']; echo "</td>";
        echo "<td>"; echo $row['authors']; echo "</td>";
        echo "<td>"; echo $row['edition']; echo "</td>";
        echo "<td>"; echo $row['status']; echo "</td>";
        echo "<td>"; echo $row['quantity']; echo "</td>";
        echo "<td>"; echo $row['department']; echo "</td>";

        echo "</tr>";
      }
    echo "</table>";
      }
    }
      /*if button is not pressed.*/
    else
    {
      $res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name` ASC;");

    echo "<table class='table table-bordered table-hover' >";
      echo "<tr style='background-color: #ffc107;'>";
        //Table header
        echo "<th>"; echo "ID"; echo "</th>";
        echo "<th>"; echo "Book-Name";  echo "</th>";
        echo "<th>"; echo "Authors Name";  echo "</th>";
        echo "<th>"; echo "Edition";  echo "</th>";
        echo "<th>"; echo "Status";  echo "</th>";
        echo "<th>"; echo "Quantity";  echo "</th>";
        echo "<th>"; echo "Department";  echo "</th>";
      echo "</tr>"; 

      while($row=mysqli_fetch_assoc($res))
      {
        echo "<tr>";
        echo "<td>"; echo $row['bid']; echo "</td>";
        echo "<td>"; echo $row['name']; echo "</td>";
        echo "<td>"; echo $row['authors']; echo "</td>";
        echo "<td>"; echo $row['edition']; echo "</td>";
       if($row['quantity'] == '0') 
        {
          echo "<td>"; echo "Not-Available"; echo "</td>";
        }
       else{
        echo "<td>"; echo $row['status']; echo"</td>";
      }
        echo "<td>"; echo $row['quantity']; echo "</td>";
        echo "<td>"; echo $row['department']; echo "</td>";

        echo "</tr>";
      }
    echo "</table>";
    }

    if (isset($_POST['submit1'])) {
      if (isset($_SESSION['login_user'])) {
        mysqli_query($db,"INSERT into issue_book VALUES ('$_SESSION[login_user]', '$_POST[bid]', '', '', '');");
        ?>
        <script type="text/javascript">
          window.location="request.php";
        </script>
        <?php
        
      }
      else{
        ?>
        <script type="text/javascript">
          alert("You need to login first to Request a book..");
        </script>
        <?php
      }
      
    }

  ?>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
</div>
</body>
</html>