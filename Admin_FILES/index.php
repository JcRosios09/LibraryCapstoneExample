<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Online Library Management System
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<style type="text/css">

	.logo img	
	{	
		height: 80px;
		width: 80px;
		margin-top: 23px;
	}

	.wrapper
{
	height: 2863px;
	width: 1349px;
}
section
{
	height: 100vh;
	width: 1349px;
	background-color: grey;
}
.logo
{
	float :left;
	padding-left: 20px;

}
header
{
    height: 130px;
    width: 1349px;
    background-color: #800000;

}
section .sec_img
{
	height: 100vh;
	width: 100%;
	background-image: url("images/CCCtoCTUweb.jpg");
	background-size: cover;
	background-position: center;

}

.box
{
	height: 300px;
	width: 450px;
	background-color: #030002;
	margin: 110px auto;
	opacity: .7;
	color: white;
}


nav{
	margin-top: 35px;
	position: relative;
	float: right;
	width: 590px;
	height: 50px;
	background: #800000;
	border-radius: 8px;
	font-size: 0;
}
nav a{
	font-size: 15px;
	text-transform: uppercase;
	color: white;
	text-decoration: none;
	line-height: 50px;
	position: relative;
	z-index: 1;
	display: inline-block;
	text-align: center;
}
nav .animation{
	position: absolute;
	height: 50px;
	top: 0;
	z-index: 0;
	background: #fe9503;
	border-radius: 8px;
	transition: all .5s ease 0s;
}
nav a:nth-child(1){
	width: 100px;
}
nav .start-home, a:nth-child(1):hover~.animation{
	width: 100px;
	left: 0;
}
nav a:nth-child(2){
	width: 110px;
}
nav a:nth-child(2):hover~.animation{
	width: 110px;
	left: 100px;
}
nav a:nth-child(3){
	width: 100px;
}
nav a:nth-child(3):hover~.animation{
	width: 100px;
	left: 210px;
}
nav a:nth-child(4){
	width: 160px;
}
nav a:nth-child(4):hover~.animation{
	width: 160px;
	left: 310px;
}
nav a:nth-child(5){
	width: 120px;
}
nav a:nth-child(5):hover~.animation{
	width: 120px;
	left: 470px;
}
#slider {
	overflow: hidden;
}
#slider figure {
	position: relative;
	width: 500%;
	margin: 0;
	left: 0;
	animation: 25s slider infinite;
}
#slider figure img {
	width: 20%;
	float: left;
	height: 100vh;
}

@keyframes slider {
	0% {
		left: 0;
	}
	20% {
		left: 0;
	}
	25% {
		left: -100%;
	}
	45% {
		left: -100%;
	}
	50% {
		left: -200%;
	}
	70% {
		left: -200%;
	}
	75% {
		left: -300%;
	}
	95% {
		left: -300%;
	}
	110% {
		left: -400%;
	}
}
.linebar
{
	height: 80px;
	width: 100%;
	background-color: #800000;
}
.linebar h1
{
	padding-top: 20px;
	color: #d4b050;
	text-align: center;
	font-size: 40px;
}
.linebar1
{
	padding-top: 20px;
	height: 80px;
	width: 100%;
	background-color: #800000;
	color: #d4b050;
	font-size: 40px;
	text-align: center;
}
.linebar2
{
	padding-top: 20px;
	height: 80px;
	width: 100%;
	background-color: #800000;
	color: #d4b050;
	font-size: 40px;
	text-align: center;
}

.column {
  float: left;
  width: 310px;
  padding: 5px;
  padding-top: 110px;
  margin-left: 22px;
  box-shadow: 0 4rem 8rem rgba(0, 0, 0, 0.9);
  background-color: #80000063;

}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
  height: 100px;
}


*
{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

section .sec_img4
{
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
	background: #2c0101;

}

.box4
{
	position: relative;
	width: 200px;
	height: 200px;
	transform-style: preserve-3d;
	animation: animate 20s linear infinite;
}
.box4 span
{
	position: absolute;
	top: 0;
	left:0;
	width: 100%;
	height: 100%;
	transform-origin: center;
	transform-style: preserve-3d;
	transform: rotateY(calc(var(--i) * 73deg)) translateZ(400px);
	-webkit-box-reflect: below 0px linear-gradient(transparent,transparent,#0004);
}
.box4 span img
{
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	
}
.sec_img4 h1
{
	display: inline-block;
	color: #d4b050; 
	text-align: center;
	position: absolute;	
	margin-top: 190px;
	font-size: 35px;
	font-family: Montserrat, sans-serif;
	font-weight: 800;  
	text-transform: uppercase;
	-webkit-box-reflect: below 0px linear-gradient(transparent,transparent,#0004);
}
@keyframes animate{
	0%
	{
		transform:perspective(1000px) rotateY(0deg);
	}
	100%
	{
		transform:perspective(1000px) rotateY(360deg);
	}
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
		<header>
		<div class="logo">
			<img src="images/CTU_new_logo.png">	
				
		</div>
<h1 style="color: #d4b050; font-size: 20px;display: inline-block; margin-top: 53px; padding-left: 5px;">CTU-CONSOLACION BOOK MONITORING SYSTEM</h1>	
		<?php
		if(isset($_SESSION['login_user']))
		{
			?>
				<nav>					
					<a href="index.php">HOME</a>
					<a href="books.php">BOOKS</a>
					<a href="logout.php">LOGOUT</a>
					<a href="profile.php">PROFILE</a>
					<a href="faq.php">FAQs</a>
					<div class="animation start-home"></div>			
				</nav>
			<?php
		}
		else
		{
			?>
				<nav>							
					<a href="index.php">HOME</a>
					<a href="books.php">BOOKS</a>
					<a href="../login.php">LOGIN</a>
					<a href="registration.php">SIGN-UP</a>
					<a href="faq.php">FAQs</a>
					<div class="animation start-home"></div>
				</nav>
			<?php
		}
			
		?>

			
		</header>
		<section>
		<div class="sec_img">		
			<br><br><br>
			<div class="box">
				<br><br><br><br>
				<h1 style="text-align: center; font-size: 35px;">Welcome to CTU-library</h1><br><br>
				<h1 style="text-align: center;font-size: 25px;">Opens at: 8:00 A.M </h1><br>
				<h1 style="text-align: center;font-size: 25px;">Closes at: 5:00 P.M </h1><br>
			</div>

					
		</div>
		<div class="linebar">
			<h1>LIBRARY INSIGHT</h1>
		</div>
		<div id="slider">		
			<figure>
			<img src="images/libraryinsight1.jpg">
			<img src="images/libraryinsight2.jpg">
			<img src="images/libraryinsight3.jpg">
			<img src="images/libraryinsight4.png">
		</figure>
		</div>
		<div class="linebar1">
			<h1>VMGO</h1>
		</div>

<div class="row" style="background-image: url(images/297-2976475_high-resolution-wood-hd-background-id-high-resolution.jpg);">
  <div class="column">
    <img src="images/Vission.jpg" alt="Snow" style="width:300px; height: 400px;">
  </div>
  <div class="column">
    <img src="images/Mission.jpg" alt="Forest" style="width:300px; height: 400px;">
  </div>
  <div class="column">
    <img src="images/Goals.jpg" alt="Mountains" style="width:300px; height: 400px;">
  </div>
  <div class="column">
    <img src="images/Outcomes.jpg" alt="Mountains" style="width:300px; height: 400px;">
  </div>
</div>
<div class="linebar2">
			<h1>ADMINS</h1>
		</div>
<div class="sec_img4">
				<h1 class="animate-charcter">CTU LIBRARY ADMINS</h1>
			<div class="box4">
				
				<span style="--i:1;"><img src="images/johncloydrosios.jpg"></span>
				<span style="--i:2;"><img src="images/yvonie.jpg"></span>
				<span style="--i:3;"><img src="images/315528726_676124340841715_8186013758715279154_n.jpg"></span>
				<span style="--i:4;"><img src="images/mers.jpg"></span>
				<span style="--i:5;"><img src="images/316592936_1330440474357633_746240729638373037_n.jpg"></span>
				
			</div>
		</div>	

		
		</section>
		

	</div>
	<?php  

		include "footer.php";
	?>
</body>
</html>