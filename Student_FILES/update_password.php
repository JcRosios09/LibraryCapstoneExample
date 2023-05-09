<?php 
	include "connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>

	<style type="text/css">
		body
		{
			height: 100vh;
			background-image: url("images/CTU-Background.png");
			background-repeat: no-repeat;
		}
		.wrapper
		{
			width: 400px;
			height: 400px;
			margin:100px auto;
			background-color: black;
			opacity: .9;
			color: white;
			padding: 27px 15px;
			box-shadow: 5px 10px 8px #888888;
		}
		.form-control
		{
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
	<div class="wrapper">
		<div style="text-align: center;">
			<h1 class="animate-charcter" style="text-align: center; font-size: 30px;font-family: Montserrat, sans-serif;font-weight: 800;  text-transform: uppercase;">Change Password</h1><br><br><br>
		</div>
		<div style="padding-left: 30px; ">
		<form action="" method="post" >
			<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
			<input type="text" name="email" class="form-control" placeholder="Email" required=""><br>
			<input type="text" name="password" class="form-control" placeholder="New Password" required=""><br>
			<button class="btn btn-default" type="submit" name="submit" style="color: black; width: 90px; height: 35px;background-color: #8f8888;color:#fff;">Update</button>
		</form>

	</div>
	
	<?php

		if(isset($_POST['submit']))
		{
			if(mysqli_query($db,"UPDATE student SET password='$_POST[password]' WHERE username='$_POST[username]'
			AND email='$_POST[email]' ;"))
			{
				?>
					<script type="text/javascript">
                alert("The Password Updated Successfully.");
              </script> 

				<?php
			}
			
		}
	?></div>
</body>
</html>