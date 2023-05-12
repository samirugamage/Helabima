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

  <title>View all advertisement - Helabiam Lands</title>

</head>

<body>

<!--header start-->
  <div class="header">

    <a href="index.php"><img id="icon" alt="Helabima Lands Icon" src="src/img/02.jpeg" width="250px" height="auto" /></a>

<!--display user name if user is logged as admin in or redirect-->
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
    
    <br>
    
    <div class="back2">
      <a href="adminIndex.php"> <<< &nbsp;Back </a>
    </div>
    
    <br>

<!--advertisement table start-->
    <div class="adlist">
      <table id="adTbl">
        <tr style="background-color:#f1f1f1;pointer-events: none;">
          <th>Advertisement ID</th>
          <th>Heading </th>
          <th>Seller</th>
          <th>Published Date</th>
          <th></th> 
        </tr>
<!--display all records in advertisment table-->
        <?php
          $sql01 = "SELECT * FROM ads";
          $adRslt = mysqli_query ($con, $sql01);
          if ($adRslt && mysqli_num_rows($adRslt) > 0)
          {
            while ($ad_data = mysqli_fetch_assoc($adRslt))
            {
              echo ("<tr id='".$ad_data['adID']."'>");
              echo ("<td><a id='viewAd' href='viewAd.php?adid=".$ad_data['adID']."'>".$ad_data['adID']."</a></td>");
              echo ("<td>".$ad_data['heading']." </td>");
              echo ("<td><a href='adminViewAllSellers.php#".$ad_data['user_id']."'>".$ad_data['user_id']." </td>");
              echo ("<td> ".$ad_data['pub_date']." </td>");
              echo ("<td><a id='edtAd' href='adminRemoveAd.php?adid=".$ad_data['adID']."'>Remove Advertisement</a></td>");
              echo ("</tr>");
            }
            $con->close();
          }
        ?>
      </table>
    </div>
<!--advertisement table end-->

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