<?php
session_start();
require('config.php'); 
include('functions.php');

/* login */
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
  $username = $_POST['username-input']; 
  $password = $_POST['password-input'];

  if ($username == "admin")
  {
    $_SESSION['userid'] = "Admin";
    $_SESSION['account'] = "admin";
    header("Location: adminIndex.php");
    die;
  }
  else
 {
    $sql = "SELECT * FROM buyers WHERE user_name = '$username' AND password = '$password'";
    $result = mysqli_query ($con, $sql);

    if ($result && mysqli_num_rows($result) > 0)
    {
      $buyer_data = mysqli_fetch_assoc($result);
      $_SESSION['userid'] = $buyer_data['user_id'];
      $_SESSION['account'] = "buyer";
      header("Location: buyerIndex.php");
      die;
    }
    else
    {
      msgErr("Login unsuccsesful.");
    }  
  }    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="stylesheet" type="text/css" href="src/styles/main.css">
  <link rel="stylesheet" type="text/css" href="src/styles/buyer.css">

  <title>Buyer Login - Helabima Lands</title>

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

<!--login start-->
    <div class="login-container">
      <div class="login">
        <form name="loginB" action="" method="POST">

          <label id="title">Log In</label>
          <br/> <br/> <br/>

          <label id="username-Label">Username</label>
          <input type="text" id="username-input" name="username-input" placeholder="Username.." required>

          <label id="password-Label">Password</label>
          <input type="password" id="password-input" name="password-input" placeholder="Password.." required>

          <label id="para">Don't have an account yet? <a href="buyerSignup.php#signup">Sign Up</a></label>
          <br/>

          <input id="submitlogin" type="submit" value="Login">

        </form>
      </div>
    </div>
<!--login end-->

  </div>
<!--content end--> 

  <br/>

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