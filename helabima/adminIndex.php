<?php
session_start();
require('config.php'); 
include('functions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="stylesheet" type="text/css" href="src/styles/main.css">
  <link rel="stylesheet" type="text/css" href="src/styles/admin.css">

  <title>Admin Index - Helabiam Lands</title>

</head>

<body>

<!--header start-->
  <div class="header"> 

    <a href="index.php"><img id="icon" alt="Helabima Lands Icon" src="src/img/02.jpeg" width="250px" height="auto" /></a>

<!--display link to a login page or display user name if user is logged in-->
    <?php
      $logOut = "<a href='logout.php' id='logout'>Log Out</a>";

      if(isset($_SESSION['account']) && $_SESSION['account'] == "admin")
      {
        echo($logOut);
        echo("<a id='username' href='adminIndex.php'> Admin </a>");
      }
      elseif(isset($_SESSION['account']) && $_SESSION['account'] == "buyer")
      {
        header("Location: buyerIndex.php");
      }
      elseif(isset($_SESSION['account']) && $_SESSION['account'] == "seller")
      {
        header("Location: sellerIndex.php");
      }
      else
      {
        header("Location: index.php");
      }
    ?>

    <a class="nav"  href="aboutus.php"> <img id="aboutus" alt="aboutus" src="src/img/aboutus.jpg" height="50px" width="auto" /></a>
    <a class="nav"  href="lands.php"> <img id="lands" alt="lands" src="src/img/lands.jpg" height="50px" width="auto" /></a>
    <a class="nav"  href="index.php"> <img id="home" alt="home" src="src/img/home.jpg" height="50px" width="auto" /></a>

  </div>
<!--header end-->

  <hr width="100%">

<!--content start-->
    <div class="content">

      <div class="adminpanel">
        <a id="mngads" href="adminViewAllAds.php"> Manage all advertisement </a>
        <a id="mngb" href="adminViewAllBuyers.php">Manage all buyers</a>
        <a id="mngs" href="adminViewAllSellers.php">Manage all sellers</a>
        <a id="mngp" href="adminViewAllPayments.php">Manage all payments</a>
      </div>

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