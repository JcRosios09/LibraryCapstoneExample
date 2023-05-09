<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>

  <title>Student Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >

  <style type="text/css">
section
{
  margin-top: -20px;
  height: 660px;
  width: 1349px;
  background-image: url("images/CTU-Background.png");
  background-repeat: no-repeat;
}
.box
{
  height: 400px;
  width: 450px;
  background-color: black;
  margin: 0px auto;
  opacity: .9;
  color: white;
  padding: 20px;
  box-shadow: 5px 10px 8px #888888;
  padding-top: 50px;
}
label{
  font-weight: 600;
  font-size: 18px;
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

label
{
  font-size: 18px;
  font-weight: 600;
}

</style>
<section><br><br><br><br><br><br>
  <div class="box">
    <h1 class="animate-charcter" style="text-align: center; font-size: 25px;font-family: Montserrat, sans-serif;font-weight: 800;  text-transform: uppercase;">CTU CONSOLACION CAMPUS</h1>
    <form  name="signup" action="" method="post">
      <br><br><br>
        <b><p style="padding-left: 50px; font-size: 15px">Sign Up as:</p></b>
        <input style="margin-left: 50px; width: 18px;" type="radio" name="user" id="admin" value="admin">
        <label for="admin">Admin</label>
        <input style="margin-left: 50px; width: 18px;" type="radio" name="user" id="student" value="student" checked="">
        <label for="student">User</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

        <button class="btn btn-default" type="submit" name="submit3" style="color: black; font-weight: 700; width: 70px; height: 30px;">OK</button>
      </form>
  </div>
  <?php 
    if(isset($_POST['submit3']))
    {
      if($_POST['user']=='admin')
      {
        ?>
          <script type="text/javascript">
            window.location="Admin_FILES/registration.php"
          </script>
        <?php
      }
      else
      {
        ?>
          <script type="text/javascript">
            window.location="Student_FILES/registration.php"
          </script>
        <?php
      }
    }
   ?>
</section>
</body>
</html>