<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>

  <title>Student Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  
  <style type="text/css">
    section
    {
      margin-top: -20px;
    }
    .log_img
{
  height: 100vh;
  margin-top: 0px;
  background-image: url("images/CTU-Background.png");
  background-repeat: no-repeat;
  width: 100%;
}
.box1
{
  height: 450px;
  width: 450px;
  background-color: black;
  margin: 70px auto;
  opacity: .9;
  color: white;
  padding: 20px;
  box-shadow: 5px 10px 8px #888888;
}
form .login
{
  margin: auto 50px;
}
input
{
  height: 25px;
  width: 300px;

}
.animate-charcter
{
  text-transform: uppercase;
  background-image: linear-gradient(
    -225deg,
    #800000 0%,
    #800000 29%,
    #ff1361 67%,
    #fff800 100%
  );
  background-size: auto auto;
  background-clip: border-box;
  background-size: 200% auto;
  color: #fff;
  background-clip: text;
  text-fill-color: transparent;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: textclip 3s linear infinite;
  display: inline-block;
  font-size: 190px;
}

@keyframes textclip {
  to {
    background-position: 200% center;
  }
}
  </style>   
</head>
<body>

<section>
  <div class="log_img">
   <br>
    <div class="box1">
        <h1 class="animate-charcter" style="text-align: center; font-size: 25px;font-family: Montserrat, sans-serif;font-weight: 800;  text-transform: uppercase;">CTU CONSOLACION CAMPUS</h1>
        <h1 style="text-align: center; font-size: 23px;font-family: arial;">Book Monitoring System</h1>
        <h1 style="text-align: center; font-size: 20px;">Admin Login Form</h1><br>
      <form  name="login" action="" method="post">
        
        <div class="login">
          <input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
          <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
          <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width: 90px; height: 35px;background-color: #800000;color: #fff;"> 
        </div>
      
      <p style="color: white; padding-left: 15px;">
        <br><br>
        <a style="color:#d4b050; text-decoration: none;" href="update_password.php">Forgot password?</a> &nbsp &nbsp &nbsp &nbsp &nbsp 
        Not yet Registered?<a style="color: #d4b050; text-decoration: none;" href="registration.php">&nbspSign Up</a>
      </p>
    </form>
    </div>
  </div>
</section>

  <?php

    if(isset($_POST['submit']))
    {
      $count=0;
      $res=mysqli_query($db,"SELECT * FROM `admin` WHERE username='$_POST[username]' && password='$_POST[password]';");
      
      $row= mysqli_fetch_assoc($res);
      $count=mysqli_num_rows($res);

      if($count==0)
      {
        ?>
          <div class="alert alert-danger" style="width: 600px; margin-left: 370px; background-color: #de1313; color: white">
            <strong>The username and password doesn't match</strong>
          </div>    
        <?php
      }
      else
      {
        $_SESSION['login_user'] = $_POST['username'];
        $_SESSION['pic']= $row['pic'];
        $_SESSION['username']='';

        ?>
          <script type="text/javascript">
            window.location="profile.php"
          </script>
        <?php
      }
    }

  ?>

</body>
</html>