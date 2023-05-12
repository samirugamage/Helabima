<?php
session_start();
require('config.php'); 
include('functions.php');

$userData = checkLogin($con);
$bid = $userData['user_id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="stylesheet" type="text/css" href="src/styles/main.css">
  <link rel="stylesheet" type="text/css" href="src/styles/buyer.css">

  <title>Buyer Index - Helabiam Lands</title>

</head>

<body>

<!--header start-->
  <div class="header"> 

    <a href="index.php"><img id="icon" alt="Helabima Lands Icon" src="src/img/02.jpeg" width="250px" height="auto" /></a>

<!--display user name if user is logged in as a buyer or redirect-->
    <?php
      $logOut = "<a href='logout.php' id='logout'>Log Out</a>";

      if(isset($_SESSION['account']) && $_SESSION['account'] == "buyer")
      {
        echo($logOut);
        echo("<a id='username' href='buyerIndex.php'>". $userData['user_name']. "</a>");
      }
      elseif(isset($_SESSION['account']) && $_SESSION['account'] == "seller")
      {
        header("Location: sellerIndex.php");
      }
      elseif(isset($_SESSION['account']) && $_SESSION['account'] == "admin")
      {
        header("Location: adminIndex.php");
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

<!--user details start-->
      <div class="user-details">
        <span> Username &nbsp;: <?php echo $userData['user_name']; ?> </span>
        <a id="editProf" href="buyerEditProfile.php"> Edit Profile </a>
      </div>
<!--user details end-->

<!--wishlist start-->
      <div class="wishlist">
         <table id="wishlst">
          <tr style="background-color:#f1f1f1;pointer-events: none;">
            <th>Advertisement ID</th>
            <th>Heading </th>
            <th>Date Added</th>
            <th></th> 
            <th></th>
          </tr>
<!--display all records in wishlist table related to this buyer-->
          <?php
            $sql01 = "SELECT w.adID, a.heading, w.date FROM wishlist w, ads a WHERE w.user_id = '$bid' and a.adID = w.adID ORDER BY w.date DESC";
            $adRslt = mysqli_query ($con, $sql01);
            if ($adRslt && mysqli_num_rows($adRslt) > 0)
            {
              while ($ad_data = mysqli_fetch_assoc($adRslt))
              {
                echo ("<tr>");
                echo ("<td id='".$ad_data['adID']."'>".$ad_data['adID']." </td>");
                echo ("<td>".$ad_data['heading']." </td>");
                echo ("<td> ".$ad_data['date']." </td>");
                echo ("<td><a id='viewAd' href='viewAd.php?adid=".$ad_data['adID']."'>View Advertisement</a></td>");
                echo ("<td><a id='rmvAd' href='buyerRemoveFromWishlist.php?adid=".$ad_data['adID']."'>Remove Advertisement</a></td>");
                echo ("</tr>");
              }
              $con->close();
            }
          ?>
        </table>
      </div>
<!--wishlist end-->

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
<!--footer start-->

</body>            
</html>