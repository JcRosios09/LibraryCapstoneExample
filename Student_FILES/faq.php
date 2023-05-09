<?php
  session_start();
  include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>
	</title>

	  <link rel="stylesheet" type="text/css" href="style.css">
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style type="text/css">
  nav{
    background: #800000;
    }

*{
 padding: 0;
 margin: 0;
 box-sizing: border-box;
 font-family: 'Roboto', sans-serif;
} 
.wrapper{
  max-width: 75%;
  margin: auto;
} 
.wrapper > p,
.wrapper > h1{
	margin: 1.5rem 0;
	text-align: center;
} 
.wrapper > h1{
	letter-spacing: 3px;
}
.accordion{
	background-color: white;
	color: rgba(0,0,0,0.8);
	cursor: pointer;
	font-size: 1.4rem;
	width: 100%;
	padding: 2rem 2.5rem;
	border:none;
	outline: none;
	transition: 0.4s;
	display: flex;
	justify-content: space-between;
	align-items: center;
	font-weight: bold;
}
.accordion i{
	font-size: 1.6rem;
}
.active, 
.accordion:hover{
background-color: #f1f7f5;
}
.pannel{
	padding: 0 2rem 2.5rem 2rem;
	background-color: white;
	overflow: hidden;
	background-color: #f1f7f5;
	display: none;
}
.pannel p{
	color: rgba(0,0,0,0.7);
	font-size: 2.2rem;
	line-height: 1.4;
}
.faq{
	border: 1px solid rgba(0,0,0,0.2);
	margin: 10px 0;
}
.faq.active{
	border: none;
}
</style>

</head>
<body>

<?php
if(isset($_SESSION['login_user']))
{
  $r=mysqli_query($db,"SELECT COUNT(status) as total FROM message where status='no' and username='$_SESSION[login_user]' and sender='admin';");
  $c=mysqli_fetch_assoc($r);
//-------------------timer-----------------
  $b=mysqli_query($db,"SELECT * from issue_book where username='$_SESSION[login_user]' and approve='Yes' ORDER BY `return` ASC limit 0,1;");
  $var1=mysqli_num_rows($b);

  $bid=mysqli_fetch_assoc($b);
  $t=mysqli_query($db,"SELECT * from `timer` where name='$_SESSION[login_user]' and bid='$bid[bid]' ;");
  $res=mysqli_fetch_assoc($t);

?>
	    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
          <div class="navbar-header">
            <a href="index.php" class="navbar-brand">A WEB BASED BOOK MONITORING SYSTEM</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="index.php">HOME</a></li>
            <li><a href="books.php">BOOKS</a></li>
            <li><a href="feedback.php">FEEDBACK</a></li>
          </ul>
          <?php
            if($var1==1)
            {

            
          ?>

      <!---------------TIMER----------------->
      <script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $res['tm']; ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>

      <!----------------TIMER------------------>
    <?php } ?>
                <ul class="nav navbar-nav">
                  <li><a href="profile.php">PROFILE</a></li>
                  <li><a href="faq.php">FAQs</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li><a><p style="color: #ff1503; font-size: 20px;" id="demo"></p></a></li>
                  <li><a href="message.php"><span class="glyphicon glyphicon-envelope"></span>
                    <span class="badge bg-green">
                      <?php echo $c['total'];?>
                    </span></a></li>
                  <li><a href="profile.php">
                    <div style="color: white">
                      <?php
                        echo "<img class='img-circle profile_img' height=30 width=30 src='images/".$_SESSION['pic']."'>";
                        echo " ".$_SESSION['login_user'];
                      ?>
                    </div>
                  </a></li>
                  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
                </ul>        
      </div>
    </nav>
    <?php
      if(isset($_SESSION['login_user']))
      {
        $day=0;

        $exp='<p style="color:yellow; background-color:red;">EXPIRED</p>';
        $res= mysqli_query($db,"SELECT * FROM `issue_book` where `username` ='$_SESSION[login_user]' and approve ='$exp' ;");
      
      while($row=mysqli_fetch_assoc($res))
      {
        $d= strtotime($row['return']);
        $c= strtotime(date("Y-m-d"));
        $diff= $c-$d;

        if($diff>=0)
        {
          $day= $day+floor($diff/(60*60*24)); 
        } //Days
        
      }
      $_SESSION['fine']=$day*.10;
    }
  }
  else
  {
  ?>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
          <div class="navbar-header">
            <a href="index.php" class="navbar-brand">A WEB BASED BOOK MONITORING SYSTEM</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="index.php">HOME</a></li>
            <li><a href="books.php">BOOKS</a></li>
            <li><a href="feedback.php">FEEDBACK</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">

                <li><a href="../login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
                
                <li><a href="../registration.php"><span class="glyphicon glyphicon-user"> SIGN UP</span></a></li>
              </ul>
        </div>
      </nav>
  <?php
  }  
    ?>
<section> 
<div class="wrapper">
	<p>Education is the key to success in life.</p>
	<h1>Frequently Asked Questions</h1>

	<div class="faq"> 
		<button class="accordion">
			Q: What are the requirements for registration/admission of new students?
			<i class="fa-solid fa-chevron-down"></i>
		</button>
		<div class="pannel">
			<p>
				A: Requirements for admission will be forwarded once you completed the online application.
			</p>
		</div>
	</div>

	<div class="faq"> 
		<button class="accordion">
			Q: When is the deadline for online application?
			<i class="fa-solid fa-chevron-down"></i>
		</button>
		<div class="pannel">
			<p>
				A: The system automatically closes once the number of applicants for each program is reached.
			</p>
		</div>
	</div>

		<div class="faq"> 
		<button class="accordion">
			Q: When is the admission test schedule for AY 2020-2021?
			<i class="fa-solid fa-chevron-down"></i>
		</button>
		<div class="pannel">
			<p>
				A: Admission test is waived due to the recent COVID-19 pandemic.
			</p>
		</div>
	</div>

		<div class="faq"> 
		<button class="accordion">
			Q: What are the requirements for enrollment of new students?
			<i class="fa-solid fa-chevron-down"></i>
		</button>
		<div class="pannel">
			<p>
				A: You may refer to https://www.ctu.edu.ph/admission/.
			</p>
		</div>
	</div>

		<div class="faq"> 
		<button class="accordion">
			Q: What are the requirements for enrollment of old students?
			<i class="fa-solid fa-chevron-down"></i>
		</button>
		<div class="pannel">
			<p>
				A: You may bring your ID and Certificate of Registration (COR).
			</p>
		</div>
	</div>

		<div class="faq"> 
		<button class="accordion">
			Q: When is the start of enrollment for Academic Year 2020 – 2021?
			<i class="fa-solid fa-chevron-down"></i>
		</button>
		<div class="pannel">
			<p>
				A: Enrollment schedules for AY 2020-2021 starts on August 3rd.
			</p>
		</div>
	</div>

		<div class="faq"> 
		<button class="accordion">
			Q: What are the requirements for enrollment of Senior High School students?
			<i class="fa-solid fa-chevron-down"></i>
		</button>
		<div class="pannel">
			<p>
				A: For Senior High School graduates of schools outside CTU, you may submit the following:

<br>-Original copy of grade 12 report card as of 1st semester signed by school principal

<br>-Original copy of grade 11 report card if you don’t have Math, English and Science in Grade 12 (esp. Engineering applicants)

<br>-Original copy of Certificate of Good Moral Character

<br>-1 piece recent 2×2 colored picture with white background and nametag.
			</p>
		</div>
	</div>

			<div class="faq"> 
		<button class="accordion">
			Q: Who can avail of the free tuition policy?
			<i class="fa-solid fa-chevron-down"></i>
		</button>
		<div class="pannel">
			<p>
				A: Only undergraduate students from 1st to 5th year college can avail of  the free tuition policy.  
			</p>
		</div>
	</div>

			<div class="faq"> 
		<button class="accordion">
			Q:  What are the undergraduate courses offered in CTU?
			<i class="fa-solid fa-chevron-down"></i>
		</button>
		<div class="pannel">
			<p>
				A: You may refer to https://www.ctu.edu.ph/undergraduate-studies/ .
			</p>
		</div>
	</div>

			<div class="faq"> 
		<button class="accordion">
			Q:  What are the graduate courses offered in CTU?
			<i class="fa-solid fa-chevron-down"></i>
		</button>
		<div class="pannel">
			<p>
				A: You may refer to https://www.ctu.edu.ph/graduate-studies/
			</p>
		</div>
	</div>

			<div class="faq"> 
		<button class="accordion">
			Q: Can a graduate of the old basic education curriculum enroll for a college degree for AY 2020 – 2021?
			<i class="fa-solid fa-chevron-down"></i>
		</button>
		<div class="pannel">
			<p>
				A: Graduates of the old curriculum should enroll for Senior High School program.
			</p>
		</div>
	</div>

			<div class="faq"> 
		<button class="accordion">
			Q: What are the tracks/strands offered for Senior High School?
			<i class="fa-solid fa-chevron-down"></i>
		</button>
		<div class="pannel">
			<p>
				A: You may refer to order.ctu.edu.ph/admission.
			</p>
		</div>
	</div>

	<div class="faq"> 
		<button class="accordion">
			Q: What are the requirements in requesting for scholastic documents?
			<i class="fa-solid fa-chevron-down"></i>
		</button>
		<div class="pannel">
			<p>
				A: You may refer to order.ctu.edu.ph/admission.
			</p>
		</div>
	</div>

	<div class="faq"> 
		<button class="accordion">
			Q: How long does it take for a TOR to be released from the date of request?
			<i class="fa-solid fa-chevron-down"></i>
		</button>
		<div class="pannel">
			<p>
				A: Releasing of documents will take 7-14 business days.
			</p>
		</div>
	</div>



 <script>
      var acc = document.getElementsByClassName("accordion");
      var i;

      for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
          this.classList.toggle("active");
          this.parentElement.classList.toggle("active");

          var pannel = this.nextElementSibling;

          if (pannel.style.display === "block") {
            pannel.style.display = "none";
          } else {
            pannel.style.display = "block";
          }
        });
      }
    </script>

</section>
<?php  

	include "footer.php";
?>
</body>
</html>