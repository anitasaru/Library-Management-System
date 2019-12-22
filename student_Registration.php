<?php
include "connection.php";
include "navbar1.php";
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  
  <title>student registration</title>
  <style type="text/css">
   
    body{
      background-image: url("images/3.jpg");
      height: 650px;
       }
      .loginbox{
    width: 400px;
    height: 520px;
    background: rgb(52, 58, 64);
    color: #fff;
    top: 58%;
    left: 50%;
    position: absolute;
    transform:translate(-50%,-50%);
    box-sizing: border-box;
    padding: 30px 30px;
    border-radius: 20px;}

   
.loginbox p{
  margin: 0;
  padding: 0;
  font-weight: bold;
}
.loginbox input{
  width: 100%;
  margin-bottom: 20px;

}
.loginbox input[type="text"],input[type="password"]{
  border:none;
  border-bottom: 1px solid #fff;
  background: transparent;
  outline: none;
  height: 20px;
  color: #fff;
  font-size: 16px;
}
.loginbox input[type="submit"]{
  border:none;
  outline: none;
  height: 30px;
  background:yellow;
  color: black;
  font-size: 18px;
  border-radius: 20px;
    background: #ffc107;

}
.loginbox input[type="submit"].hover{
  cursor: pointer;
  background: #ffc107;
  color: black;
}

    </style>


</head>

<body>

  <div class="register">

  <div class="loginbox">
    <h3 style="color: #ffc107; text-align: center; size: 30px;" ><B>Student Registration Form</B></h3>
   
   
    <form name="Registration" action="" method="POST">
      <div class="form-group">
       <p>First name</p>
      <input type="text" class="form-control" id="firstn"  name="first" placeholder="Enter firstname"  autocomplete="off" required="" pattern="[a-zA-Z\s]+" title=" Please enter on alphabets only." ></div>
      

       <p>Last name</p>
      <input type="text" class="form-control" id="last" name="last" placeholder="Enter last name" required="" autocomplete="off" pattern="[a-zA-Z\s]+" title=" Please enter on alphabets only.">

      <p>Username</p>
      <input type="text" class="form-control" id="username" name="uname" placeholder="Enter username" required="" autocomplete="off" pattern="^[a-z0-9_-]{3,15}$" title="Please enter more than three characters." >

      <p>Password</p>
      <input type="password"  class="form-control" id="pass" name="password" placeholder="Enter password" required="" autocomplete="off" pattern=".{5,}" title="Please enter five or more than five characters." >

      <p>Email</p>
      <input type="text"  class="form-control" id="email" name="email" placeholder="Enter email" required="" autocomplete="off"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3,}$" title="Please enter the format as *****@*****.***" >

      <p>Faculty</p>
      
      
      <select name="faculty" style="color: black;">
      
        <option>BSC csit</option>
            <option>BCA</option>
        <option>BBM</option>
        <option>BBS</option>
      </select><br><br>
      <input type="submit" class="submit" name="submit" value="Register"><br>
      
    </form>

  </div>
  
</div>


<?php

      if(isset($_POST['submit']))
      {
        $count=0;
        $sql="SELECT uname from `student`";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['uname']==$_POST['uname'])
          {
            $count=$count+1;
          }
        }
        if($count==0)
        {
          mysqli_query($db,"INSERT INTO `STUDENT` VALUES('$_POST[first]', '$_POST[last]', '$_POST[uname]', '$_POST[password]', '$_POST[email]', '$_POST[faculty]','admin.jpg');");
        ?>
          <script type="text/javascript">
           alert("Registration successful");
          </script>
        <?php
        }
        else
        {

          ?>
            <script type="text/javascript">
              alert("The username already exist.");
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
  
</body>
</html>