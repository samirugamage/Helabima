<?php
session_start();
require('config.php'); 
include('functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="src/styles/main.css">
  <link rel="stylesheet" type="text/css" href="src/styles/aboutus.css">
    <title>Helabiam Lands</title>
</head>

<body>
    <div class="header"> 
      <a href="index.php">
        <img id="icon" alt="Helabima Lands Icon" src="src/img/02.jpeg" width="250px" height="auto" />
      </a>

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
    <!-- end of header -->

    <!-- questions -->
<hr width="100%">

    <h2> Customer support </h2>
   
    <!-- collapse blocks -->

<button type="button" class="collapse">&#10004; Report an Advertisment</button>
<div class="content">
  <p>To report an Advertisment please E-mail us the advertisement link to <a href= "https://www.gmail.com">helabimalk@gmail.com</a> </p>
</div>
<br><br>

<button type="button" class="collapse">&#10004; Manage wishlist</button>
<div class="content">
  <p>Click on the Buyers ID on the top right corner, buyer dashboard will appear then goto wishlistt section.<br>
    you can add or remove posts from wishlist</a> </p>
</div>
<br><br>

<button type="button" class="collapse">&#10004; Edit the profile</button>
<div class="content">
  <p>Click on the Username on the top right corner, a page will appear then goto edit profile.</a> </p>
</div>
<br><br>

<button type="button" class="collapse">&#10004; Edit contact information</button>
<div class="content">
  <p>Click on the Seller ID on the top right corner, seller dashboard will appear then goto edit profile.<br>
    Then update the phone number.</a> </p>
</div>
<br><br>

<button type="button" class="collapse">&#10004; Edit posts</button>
<div class="content">
  <p>Click on the Seller ID on the top right corner, seller dashboard will appear then goto advertisement section.<br>
    Then update the relavant advertisement.</a> </p>
</div>






<!-- from w3 schools -->
<script>
var coll = document.getElementsByClassName("collapse");
var i;
for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>
        
     
<br> <br> <br> <br>

    <div class="footer">
        <img id="icon" alt="Helabima Lands Icon" src="src/img/02.jpeg" width="250px" height="auto" />
        <a class="nav" id="contact" href="index.php#contact"> Contact Us </a>
        <a class="nav" id="aboutus"  href="aboutus.php">About Us</a>
        <a class="nav" id="lands" href="lands.php"> Lands </a>
        <a class="nav" id="home" href="index.php"> Home </a>
    </div>


</body>            
</html>