<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		.srch
		{
			padding-left: 1000px;

		}
		
		body {
  background-image: url(images/cebu-technological-university.jpg);
  width: 100%;
  height: 100vh;
  background-repeat: no-repeat;
  background-size: cover;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #d4b050;
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
.img-circle
{
	margin-left: 20px;
}
.h:hover
{
	color:white;
	width: 300px;
	height: 50px;
	background-color: #800000;
}

.book
{
    width: 400px;
    margin: 0px auto;
}
.form-control
{
  background-color: #080707;
  color: white;
  height: 40px;
}

	</style>


</head>
<body>
	<!--_________________sidenav_______________-->
	<div class="log_img1">

  </div>
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 60px; font-size: 20px;">

                <?php
                if(isset($_SESSION['login_user']))

                { 	echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['login_user']; 
                }
                ?>
            </div><br><br>



 <div class="h"> <a href="add.php">Add Books</a> </div> 
  <div class="h"> <a href="request.php">Book Request</a></div>
  <div class="h"> <a href="issue_info.php">History</a></div>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer; color: black;" onclick="openNav()">&#9776; open</span>
  <div class="container" style="text-align: center;">
    <h2 style="font-family: Montserrat, sans-serif;font-weight: 900;text-transform: uppercase;color: black;font-size: 35px; margin-top: 0px;"><b>Add New Books</b></h2>



    <form class="book" action="" method="post" enctype="multipart/form-data">

        <input type="file" name="image" id="image" class="form-control"><br> 

        <input type="text" name="bid" class="form-control" placeholder="Book No." required=""><br>
        <input type="text" name="name" class="form-control" placeholder="Book Title" required=""><br>
        <input type="text" name="authors" class="form-control" placeholder="Authors Name" required=""><br>
        <input type="text" name="edition" class="form-control" placeholder="Edition" required=""><br>
        <input type="text" name="status" class="form-control" placeholder="Status" required=""><br>
        <input type="text" name="quantity" class="form-control" placeholder="Quantity" required=""><br>
        <input type="text" name="department" class="form-control" placeholder="Department" required=""><br>

        <button style="background-color: #8f8888;color:#fff; width: 90px;" class="btn btn-default" type="submit" name="submit">ADD</button>

    </form>
  </div>
<?php
    if(isset($_POST['submit']))
    {

      if(isset($_SESSION['login_user']))
      {
      
        
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
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "#fff";
}
</script>

</body>
</html>

<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, 'library');

if (isset($_POST['submit'])) {
  $file =  addslashes(file_get_contents($_FILES['image']['tmp_name']));
  $bid = $_POST['bid']; 
  $name = $_POST['name'];
  $authors = $_POST['authors'];
  $edition = $_POST['edition'];
  $status = $_POST['status'];
  $quantity = $_POST['quantity'];
  $department = $_POST['department'];

  $query = "INSERT INTO `books`( `image`,`bid`, `name`, `authors`, `edition`,`status`,`quantity`,`department`) VALUES ('$file','$bid','$name','$authors','$edition','$status','$quantity','$department')";
  $query_run = mysqli_query($connection,$query);

  if ($query_run) {
    echo '<script type="text/javascript">alert("Book image uploaded")</script>';
  }else{
    echo '<script type="text/javascript">alert("Book image Not uploaded")</script>';
  }
}
?>