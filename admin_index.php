<?php

session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="style.css" rel="stylesheet" type="text/css">
  <title>Library Management System</title>
  <style type="text/css">
    ul li a {
      color: white !important;
      text-decoration: none;
      display: inline-block;
      size: 20px;


    }
    

    nav li a:hover {
      color: yellow !important;
      text-decoration: none;
      opacity: 0.7;
    }

    nav li {
      display: inline-block !important;
      line-height: 80px;
      margin-right: 5px;

    }
    .footer{
      background-color:#343a40;
      height: 100px;
    }
  </style>


</head>

<body>
  <body>
    
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand logo" href="#">
      <img src="images/logo.png" class="d-inline-block align-top" alt="" style="width:150px; height:90px;"><br>
      BernHardt Library Management System
    </a>
    <?php
    if(isset($_SESSION['login_user']))
   { ?>


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon "></span>
    </button>
    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">

      <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
          <a class="nav-link" href="main.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin_book.php">BOOKS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin_logout.php">LOGOUT</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="admin_feedback.php">FEEDBACK</a>
        </li>

      </ul>
    </div>
  </nav>
  <?php
}
else
{
  ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon "></span>
    </button>
    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">

      <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
          <a class="nav-link" href="main.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin_book.php">BOOKS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin_login.php">ADMIN-LOGIN</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="admin_feedback.php">FEEDBACK</a>
        </li>

      </ul>
    </div>
  </nav>

  <?php 
}

?>
  

 

  
  <div class="container-fluid section_img"><br><br>

    <div class="box">
      <br><br>
      <h1 style="text-align: center; font-size: 30px; color: white;">
        Welcome To Library
      </h1><br><br>
      <h1 style="text-align: center; font-size: 20px; color: white;">Feel Free To Visit</h1><br><br>
      <h1 style="text-align: center; font-size: 15px; color: white;">Thanks!!</h1>


    </div>

  </div>
  <div class="container-fluid footer">

    <p style="color: white; text-align: center;"><br>
      Email: &nbsp www.kbc.edu.np <br>
      Mobile: &nbsp 014672506
    </p>
  </div>
  
  </div>

  
  

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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