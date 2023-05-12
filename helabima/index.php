<?php
session_start();
require('config.php'); 
include('functions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="stylesheet" type="text/css" href="src/styles/main.css">
  <link rel="stylesheet" type="text/css" href="src/styles/index.css">

  <title>Helabiam Lands</title>

</head>

<body>

<!--header start-->
    <div class="header"> 

      <a href="index.php"><img id="icon" alt="Helabima Lands Icon" src="src/img/02.jpeg" width="250px" height="auto" /></a>

<!--display user name if user is logged in or display link to login page-->
      <?php
        $logOut = "<a href='logout.php' id='logout'>Log Out</a>";

        if(isset($_SESSION['account']) && $_SESSION['account'] == "buyer")
        {
          $userData = checkLogin($con);
          echo($logOut);
          echo("<a id='username' href='buyerIndex.php'>". $userData['user_name']. "</a>");

        }
        elseif(isset($_SESSION['account']) && $_SESSION['account'] == "seller")
        {
          $userData = checkLogin($con);
          echo($logOut);
          echo("<a id='username' href='sellerIndex.php'>". $userData['user_id']. "</a>");
        }
        elseif(isset($_SESSION['account']) && $_SESSION['account'] == "admin")
        {
          echo($logOut);
          echo("<a id='username' href='adminIndex.php'> Admin </a>");
        }
        else
        {
          echo("<a href='BorS.php'><img id='profile' alt='profile' src='src/img/profile.png' width='50px' height='auto' /></a>");
        }
      ?>

      <a class="nav"  href="aboutus.php"> <img id="aboutus" alt="aboutus" src="src/img/aboutus.jpg" height="50px" width="auto" /></a>
      <a class="nav"  href="lands.php"> <img id="lands" alt="lands" src="src/img/lands.jpg" height="50px" width="auto" /></a>
      <a class="nav"  href="index.php"> <img id="home" alt="home" src="src/img/home.jpg" height="50px" width="auto" /></a>

  </div>
<!--header end-->

    <hr width="100%">

    <div class="mainImg">
      <img src="src/img/slide01.jpg"  alt="Beachfront" width="101%" height="auto" />
    </div>

    

<!--content start-->
    <div class="content">

      <br/>

      <div class="square" >
        <div><img src="src/img/01.jpeg"  width="15%" height="auto" ></div>
        <br/>
        <h1> Helabima Lands </h1> 
        <p>Find your dream land to suit all your needs and preferences for the best experience. We undertake making your dream a reality. Sri Lanka's leading real estate listing platform, for all your needs. </p>
      </div>

      <br/>
      <br/>

      <div class="contact">
        <h1 align="center" id="contact">Contact Us</h1>
        <br/>
        <table >
          <tr>
            <th> Email </th>
            <th> Telephone Number </th>
            <th> Address </th>
          </tr>
          <tr>
            <td> helabimalk@gmail.com  </td>
            <td> +011 2530662 </td>
            <td> No. 7, Main Road, Kegalle, Sabaragamuwa, Sri Lanka </td>
          </tr>
        </table>
      </div>

    </div>
<!--content end-->

    <br/>
    <br/>
    <br/>

<!--footer start-->
    <div class="footer">

      <img id="icon" alt="Helabima Lands Icon" src="src/img/02.jpeg" width="250px" height="auto" />
      <a class="nav" id="contact" href="index.php#contact"> Contact Us </a>
      <a class="nav" id="aboutus"  href="aboutus.php">About Us</a>
      <a class="nav" id="lands" href="lands.php"> Lands </a>
      <a class="nav" id="home" href="index.php"> Home </a>
      
    </div>
<!--footer end-->

</body>            
</html>