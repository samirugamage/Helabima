<?php
session_start();
require('config.php'); 
include('functions.php');

$userData = checkLogin($con);
$adid = $_GET['adid'];

// load ad data
$asql = "SELECT * FROM ads WHERE adID = '$adid'";
$adR = mysqli_query ($con, $asql);
if ($adR && mysqli_num_rows($adR) > 0)
{
  $adDt = mysqli_fetch_assoc($adR);
}

// load image data
$Img = $adDt['img'];
$Des = "img/".$adid.".".$Img;

// load seller data
$sid = $adDt['user_id'];
$ssql = "SELECT * FROM sellers WHERE user_id = '$sid'";
$sR = mysqli_query ($con, $ssql);
if ($sR && mysqli_num_rows($sR) > 0)
{
  $sDt = mysqli_fetch_assoc($sR);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="src/styles/main.css">
  <link rel="stylesheet" type="text/css" href="src/styles/vad.css">

    <title><?php echo $adid; ?> - Helabiam Lands</title>
</head>

<body>

<!--header start-->
    <div class="header"> 

      <a href="index.php">
        <img id="icon" alt="Helabima Lands Icon" src="src/img/02.jpeg" width="250px" height="auto" />
      </a>

<!--display user name if user is logged in or display link to login page-->
      <?php
        $logOut = "<a href='logout.php' id='logout'>Log Out</a>";

        if(isset($_SESSION['account']) && $_SESSION['account'] == "buyer")
        {
          echo($logOut);
          echo("<a id='username' href='buyerIndex.php'>". $userData['user_name']. "</a>");

        }
        elseif(isset($_SESSION['account']) && $_SESSION['account'] == "seller")
        {
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

<!--content start-->
    <div class="content">

<!--advertisement start--> 
      <h1 id="heading"> <?php echo $adDt['heading']; ?> </h1>

      <center>
        <img id="image" src="<?php echo $Des;?>" width="50%" height="auto"><br/>
      </center>
      
      <center>
      <table id="adDtls" width="auto" height="auto">
        <tr>
          <th>Type</th>
          <td><b> : </b> <?php echo $adDt['type']; ?></td>
          <th>Address</th>
          <td><b> : </b> <?php echo $adDt['address']; ?></td>
        </tr>
        <tr>
          <th>Area</th>
          <td><b> : </b> <?php echo $adDt['area']; ?> Perches</td>
          <th>District</th>
          <td><b> : </b> <?php echo $adDt['district']; ?></td>
        </tr>
        <tr>
          <th>Price</th>
          <td><b> : </b> Rs: <?php echo $adDt['price']; ?></td>
          <th>Provine</th>
          <td><b> : </b> <?php echo $adDt['province']; ?></td>
        </tr>
       </table>
      </center>

      <center>
      <p id="desc" align="left"><?php echo $adDt['description']; ?></p>
      </center>

<!--display add to wishlist button if user is logged in as a buyer or display link to login page-->
      <br/>
      <center> 
        <?php 
          if(isset($_SESSION['account']) && $_SESSION['account'] == "buyer")
          {
            $bid = $_SESSION['userid'];
            $sqlW = "SELECT adID FROM wishlist WHERE adID = '$adid' AND user_id = '$bid'";
            $rW = mysqli_query($con, $sqlW);
            if($rW && mysqli_num_rows($rW) > 0)
            {
              echo ("<a id='addToWishlist' href='buyerIndex.php#".$adid."'>&#10060; Remove from wishlist </a>");
            }
            else
            {
              echo ("<a id='addToWishlist' href='buyerAddToWishlist.php?adid=".$adid."'>&#x1F90D; Add to wishlist </a>");
            }
          }
          else
          {
           echo ("<a id='addToWishlist' style='pointer-events:none;'>&#x1F90D; Add to wishlist </a>");
           echo ("<p style='font-size: 20px;'>You need be logged in as a buyer to use this function. <a href='buyerLogin.php'>Click here to login</a></P>");
          }
          ?>
      </center>

<!--display contact details of the seller if user is logged in or display link to login page-->
      <br/><br/>
      <center>   
      <table id="sCtDtls" width="auto" height="auto" style="padding: 10px;">
        <tr > 
          <th colspan="2" align="center" style="border: 1px solid grey;padding: 5px;background-color: #008080;">
           Contact Details of the Seller &nbsp;&#9742;
         </th>
        </tr>
        <tr height="20px" ></tr>
      <?php  
        if(isset($_SESSION['account']))
        {
          echo("<tr>");
          echo("<th>Seller name</th>");
          echo("<td><b> : </b>".$sDt['name']."</td>");
          echo("</tr>");

          echo("<tr>");
          echo("<th>Email</th>");
          echo("<td><b> : </b>".$sDt['email']."</td>");
          echo("</tr>");
      
          echo("<tr>");
          echo("<th>Mobile Number</th>");
          echo("<td><b> : </b> ".$sDt['mobilenum']."</td>");
          echo("</tr>");
        } 
        else
        {
          echo("<tr>");
          echo ("<td>You need be logged in to see contact Details of the Seller. <a href='BorS.php'>Click here to login</a></td>");
          echo("</tr>");
        }
      ?>
      </table>
      </center>
<!--advertisement end--> 

    </div> 
<!--content end--> 

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