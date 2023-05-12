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

  <title>View all sellers - Helabiam Lands</title>

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

<!--seller table start-->
    <div class="adlist">
      <table id="adTbl">
        <tr style="background-color:#f1f1f1;pointer-events: none;">
          <th>User ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Mobile Number</th>
          <th>Published Advertisement</th>
          <th>Registered Date</th>
          <th></th> 
        </tr>
<!--display all records in sellers table-->
        <?php
          $sql01 = "SELECT * FROM sellers";
          $sRslt = mysqli_query ($con, $sql01);
          if ($sRslt && mysqli_num_rows($sRslt) > 0)
          {
            while ($s_data = mysqli_fetch_assoc($sRslt))
            {
              echo ("<tr id='".$s_data['user_id']."'>");
              echo ("<td>".$s_data['user_id']."</td>");
              echo ("<td>".$s_data['name']." </td>");
              echo ("<td>".$s_data['email']." </td>");
              echo ("<td>".$s_data['mobilenum']." </td>");
              echo ("<td>");
/*display all advertisements related to the seller*/
              $sid = $s_data['user_id'];
              $sql02 = "SELECT * FROM ads WHERE user_id = '$sid'";
              $sAdRslt = mysqli_query ($con, $sql02);
              if ($sAdRslt && mysqli_num_rows($sAdRslt) > 0)
              {
                while ($sAd_data = mysqli_fetch_assoc($sAdRslt))
                {
                  echo ("<a href='adminViewAllAds.php#".$sAd_data['adID']."'>".$sAd_data['adID']."</a> &nbsp");
                }
              } else { echo ("Unable to retrieve data."); }
 
              echo ("</td>");
              echo ("<td> ".$s_data['date']." </td>");
              echo ("<td><a id='edtAd' href='adminRemoveS.php?sid=".$s_data['user_id']."'>Remove User</a></td>");
              echo ("</tr>");
            }
            $con->close();
          }
        ?>
      </table>
    </div>
<!--seller table end-->

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