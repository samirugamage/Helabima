<?php
session_start();
require('config.php'); 
include('functions.php');

$userid = useridS();

/* signup */ 
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
  $name = $_POST["name-input"]; 
  $email = $_POST["email-input"]; 
  $mnum = $_POST["mnum-input"];
  $password = $_POST["password-input"];

  $sql = "INSERT into sellers (user_id, name, email, mobilenum, password) VALUES ('$userid', '$name', '$email', '$mnum', '$password')";
  mysqli_query ($con, $sql);
  $con->close();
  header("Location: sellerLogin.php");
  die;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="stylesheet" type="text/css" href="src/styles/main.css">
  <link rel="stylesheet" type="text/css" href="src/styles/seller.css">

  <title>Sign up - Helabiam Lands</title>

</head>

<body>

<!--header start-->
  <div class="header"> 

    <a href="index.php"><img id="icon" alt="Helabima Lands Icon" src="src/img/02.jpeg" width="250px" height="auto" /></a>

<!--display link to login page or redirect if user is logged in-->      
    <?php
        if(isset($_SESSION['userid']) && isset($_SESSION['account']))
        {
          if($_SESSION['account'] == "buyer")
          {
            header("Location: buyerIndex.php");
          }
          elseif($_SESSION['account'] == "seller")
          {
            header("Location: sellerIndex.php");
          } 
          elseif($_SESSION['account'] == "admin")
          {
            header("Location: adminIndex.php");
          }
        }
        else
        {
          echo("<a href='BorS.php'><img id='profile' alt='profile' src='src/img/profile.png' width='50px' height='auto' /></a>");
        }
      ?>
      
    <a class="nav" href="aboutus.php"> <img id="aboutus" alt="aboutus" src="src/img/aboutus.jpg" height="50px" width="auto" /></a>
    <a class="nav" href="lands.php"> <img id="lands" alt="lands" src="src/img/lands.jpg" height="50px" width="auto" /></a>
    <a class="nav" href="index.php"> <img id="home" alt="home" src="src/img/home.jpg" height="50px" width="auto" /></a>

  </div>
<!--header end-->

  <hr width="100%">

<!--content start-->
  <div class="content">

<!--signup start--> 
    <div class="signup-container">
     <span id="signup">&nbsp; </span>
      <div class="signup">
        <form name="signupB" action="" method="post">
          <label id="title">Sign Up</label>
          <br/> <br/> <br/>

          <label id="name-Label">Full Name</label>
          <input type="text" id="name-input" name="name-input" placeholder="Full Name.." required>

          <label id="email-Label">Email</label>
          <input type="email" id="email-input" name="email-input" placeholder="Email.." required> 

          <label id="mnum-Label">Mobile Number</label>
          <input type="tel" id="mnum-input" name="mnum-input" placeholder="Mobile Number.." required>

          <label id="password-Label">Password</label>
          <input type="password" id="password-input" name="password-input" placeholder="Password.." required>

          <label id="para">Already have an account? <a href="sellerLogin.php">Log In</a></label>
          <br/>
          <input id="submit" type="submit" value="Sign Up">
        </form>
      </div>
    </div>
<!--signup end-->

  </div>
<!--content end-->

<!--footer start--> 
    <div class="footer" >

      <img id="icon" alt="Helabima Lands Icon" src="src/img/02.jpeg" width="250px" height="auto" />
      <a class="nav" id="contact" href="index.php#contact"> Contact Us </a>
      <a class="nav" id="aboutus"  href="aboutus.php">About Us</a>
      <a class="nav" id="lands" href="lands.php"> Lands </a>
      <a class="nav" id="home" href="index.php"> Home </a>

    </div>
<!--footer end--> 

</body>            
</html>