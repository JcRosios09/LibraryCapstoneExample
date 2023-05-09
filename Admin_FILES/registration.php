 <?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>

  <title>Admin Registration</title>
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
    .reg_img
{
  height: 100vh;
  margin-top: 0px;
  background-image: url("images/CTU-Background.png");
  background-repeat: no-repeat;
  padding-top: 10px;
}
.box2
{
  height: 550px;
  width: 450px;
  background-color: black;
  opacity: .9;
  margin: 40px auto;
  color: white;
  box-shadow: 5px 10px 8px #888888;
  padding: 20px;
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
  <div class="reg_img">
    <div class="box2">
        <h1 class="animate-charcter" style="text-align: center; font-size: 25px;font-family: Montserrat, sans-serif;font-weight: 800;  text-transform: uppercase;">CTU CONSOLACION CAMPUS</h1>
        <h1 style="text-align: center; font-size: 23px;font-family: arial;">Book Monitoring System</h1>
        <h1 style="text-align: center; font-size: 20px;">Admin Registration Form</h1>

      <form name="Registration" action="" method="post">
        
        <div class="login">
          <input class="form-control" type="text" name="first" placeholder="First Name" required=""> <br>
          <input class="form-control" type="text" name="last" placeholder="Last Name" required=""> <br>
          <input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
          <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
          <input class="form-control" type="text" name="email" placeholder="Email" required=""><br>
          <input class="form-control" type="text" name="contact" placeholder="Contact No." required=""><br>

          <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black; width: 90px; height: 35px;background-color: #8f8888;color:#fff;"> </div>
      </form>
     
    </div>
  </div>
</section>
    <?php

      if(isset($_POST['submit']))
      {
        $count=0;
        $sql="SELECT username from `admin`";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['username']==$_POST['username'])
          {
            $count=$count+1;
          }
        }
        if($count==0)
        {
          mysqli_query($db,"INSERT INTO `admin` VALUES('', '$_POST[first]', '$_POST[last]', '$_POST[username]', '$_POST[password]', '$_POST[email]', '$_POST[contact]', 'User-Profile-PNG-File.png', '');");
        ?>
          <script type="text/javascript">
            window.location="../login.php"
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

</body>
</html>