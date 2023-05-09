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
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
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
  color:#d4b050;
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

	</style>

</head>
<body>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
	<!--___________________search bar________________________-->

	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="search" placeholder="search books.." required="">
				<button style="background-color: #8f8888;color:#fff;" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
	</div>
	<!--___________________request book__________________-->
	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="bid" placeholder="Enter Book No." required="">
				<button style="background-color: #8f8888;color:#fff;" type="submit" name="submit1" class="btn btn-default">Request
				</button>
		</form>
	</div>


	<h2>LIST OF BOOKS</h2>
	<?php

		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT * from books where name like '%$_POST[search]%' ");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No book found. Try searching again.";
			}
			else
			{

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #800000;color:#d4b050;'>";
				//Table header
				echo "<th>"; echo "Book No.";	echo "</th>";
				echo "<th>"; echo "Book Image";  echo "</th>";
				echo "<th>"; echo "Book Title";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Quantity";  echo "</th>";
				echo "<th>"; echo "Department";  echo "</th>";
			echo "</tr>";	

			$connection = mysqli_connect("localhost","root","");
			$db = mysqli_select_db($connection,'library');

			$query = "SELECT * FROM `books`";
			$query_run = mysqli_query($connection,$query);

			while ($row = mysqli_fetch_array($q)) 
			{
				?>
				<tr>
					
					<td> <?php echo $row['bid']; ?></td>
					<td> <?php echo '<img src="data:images/;base64,'.base64_encode($row['image']).'  alt="Image" style="height:110px; width:120px;" ">';  ?></td>
					<td> <?php echo $row['name']; ?></td>
					<td> <?php echo $row['authors']; ?></td>
					<td> <?php echo $row['edition']; ?></td>
					<td> <?php echo $row['status']; ?></td>
					<td> <?php echo $row['quantity']; ?></td>
					<td> <?php echo $row['department']; ?></td>
				</tr>
				<?php
			}
		echo "</table>";
			}
		}
			/*if button is not pressed.*/
		else
		{
			

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #800000;color:#d4b050;'>";
				//Table header
			
 		
 			
				echo "<th>"; echo "Book No.";	echo "</th>";
				echo "<th> "; echo "Book Image" ;  echo "</th>";
				echo "<th>"; echo "Book Title";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Quantity";  echo "</th>";
				echo "<th>"; echo "Department";  echo "</th>";

			echo "</tr>";	

			$connection = mysqli_connect("localhost","root","");
			$db = mysqli_select_db($connection,'library');

			$query = "SELECT * FROM `books`";
			$query_run = mysqli_query($connection,$query);

			while ($row = mysqli_fetch_array($query_run)) 
			{
				?>
				<tr>
						
					<td> <?php echo $row['bid']; ?> </td>
					<td> <?php echo '<img src="data:images/;base64,'.base64_encode($row['image']).'  alt="Image" style="height:110px; width:120px;" ">';  ?></td>
					<td> <?php echo $row['name']; ?></td>
					<td> <?php echo $row['authors']; ?></td>
					<td> <?php echo $row['edition']; ?></td>
					<td> <?php echo $row['status']; ?></td>
					<td> <?php echo $row['quantity']; ?></td>
					<td> <?php echo $row['department']; ?></td>
				</tr>
				<?php
			}
		echo "</table>";
		}

		if(isset($_POST['submit1']))
		{
			if(isset($_SESSION['login_user']))
			{
				mysqli_query($db,"INSERT INTO issue_book Values('$_SESSION[login_user]', '$_POST[bid]', '', '', '');");
				?>
					<script type="text/javascript">
						window.location="request.php"
					</script>
				<?php
			}
			else
			{
				?>
					<script type="text/javascript">
						alert("You must login to Request a book");
					</script>
				<?php
			}
		}

	?>
</div>
</body>
</html>