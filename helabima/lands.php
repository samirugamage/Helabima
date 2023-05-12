<?php
session_start();
require('config.php'); 
include('functions.php');

$sqlAds = "SELECT * FROM ads ORDER BY pub_date ASC";

/* search lands */
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit']))
{
  $heading = $_POST["heading-input"]; 
  $type = $_POST["type-input"]; 
  $minarea = $_POST["min-area-input"];
  $maxarea = $_POST["max-area-input"]; 
  $minprice = $_POST["min-price-input"];
  $maxprice = $_POST["max-price-input"];
  $district = $_POST["district-input"];
  $province = $_POST["province-input"]; 

  $sqlAds = "SELECT * FROM ads";

  if(!empty($heading) || !empty($type) || !empty($district) || !empty($province) || !empty($minarea) || !empty($maxarea) || !empty($minprice) || !empty($maxprice))
  {
    $sqlAds = "SELECT * FROM ads WHERE 1=1";
  }

/* search by heading */
  if(!empty($heading))
  {
    $sqlH = " and type like ('$heading%')";
    $sqlAds .= $sqlH;
  }

/* search by area */
  if(!empty($minarea))
  {
    $sqlH = " and area >= $minarea";
    $sqlAds .= $sqlH;
  }

  if(!empty($maxarea))
  {
    $sqlH = " and area <= $maxarea";
    $sqlAds .= $sqlH;
  }

/* search by price */
  if(!empty($minprice))
  {
    $sqlH = " and price >= $minprice";
    $sqlAds .= $sqlH;
  }

  if(!empty($maxprice))
  {
    $sqlH = " and price <= $maxprice";
    $sqlAds .= $sqlH;
  }

/* search by type */
  if(!empty($type))
  {
    $sqlT = " and type like ('$type%')";
    $sqlAds .= $sqlT;
  }

/* search by district */
  if(!empty($district))
  {
    $sqlD = " and district like ('$district%')";
    $sqlAds .= $sqlD;
  }

/* search by province */
  if(!empty($province))
  {
    $sqlP = " and province like ('$province%')";
    $sqlAds .= $sqlP;
  }
  
  $sqlAds .= " ORDER BY pub_date ASC";

  $heading = ""; 
  $type = "";
  $minarea = "";
  $maxarea = "";
  $minprice = "";
  $maxprice = "";
  $district = "";
  $province = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="src/styles/main.css">
  <link rel="stylesheet" type="text/css" href="src/styles/lands.css">
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

<!--content start-->
    <div class="content">

<!--search box start-->
      <div class="search-box">
        <form name="search-box" method="post" >
          
          <div class="inputs">
          <label class="label">Heading</label>
          <input type="text" value="<?php if(!empty($heading)) {echo $heading;} ?>" class="input" name="heading-input" placeholder="Enter heading..">
          </div>

          <div class="inputs">
           <label class="label">Type</label>
           <select class="input" name="type-input">
            <option value="">Choose..</option>
<!--select and display availabel land types from the database-->
             <?php 
                $sqlType = "SELECT DISTINCT type FROM ads";
                $rType = mysqli_query($con, $sqlType);
                if($rType && mysqli_num_rows($rType) > 0)
                {
                  while($ad_types = mysqli_fetch_assoc($rType))
                  {
                    echo "<option value=".$ad_types['type'].">".$ad_types['type']."</option>";
                  }
               }
             ?>
            </select>
          </div>
          
          <div class="inputs">
          <label class="label">Area (in Perch)</label>
          <input type="number" value="<?php if(!empty($minarea)) {echo $minarea;} ?>" class="input" name="min-area-input" min="0" style=" padding: 5px;margin: 5px 0px 5px 0px;" placeholder="Min..">
          <input type="number" value="<?php if(!empty($maxarea)) {echo $maxarea;} ?>" class="input" name="max-area-input" min="0" style=" padding: 5px;margin: 5px 0px 5px 0px;" placeholder="Max..">
          </div>
          
          <div class="inputs" id="container">
          <label class="label">Price (in LKR)</label>
          <input type="number" value="<?php if(!empty($minarea)) {echo $minarea;} ?>" class="input" name="min-price-input"  min="0" style=" padding: 5px;margin: 5px 0px 5px 0px;" placeholder="Min..">
          <input type="number" value="<?php if(!empty($maxarea)) {echo $maxarea;} ?>" class="input" name="max-price-input" min="0" style=" padding: 5px;margin: 5px 0px 5px 0px;" placeholder="Max..">
          </div>
          
          <div class="inputs">
            <label class="label">Province</label>
            <select class="input" name="province-input">
              <option value="">Choose..</option>
              <option value="Central">Central</option>
              <option value="Eastern">Eastern</option>
              <option value="North Central">North Central</option>
              <option value="North Western">North Western</option>
              <option value="Northern">Northern</option>
              <option value="Sabaragamuwa">Sabaragamuwa</option>
              <option value="Southern">Southern</option>
              <option value="Uva">Uva</option>
              <option value="Western">Western</option>
            </select>
          </div>
          
          <div class="inputs">
          <label class="label">District</label>
          <select class="input" name="district-input">
            <option value="">Choose..</option>
            <optgroup label="Central">
              <option value="Kandy">Kandy</option>
              <option value="Matale">Matale</option>
              <option value="Nuwara Eliya">Nuwara Eliya</option>
            <optgroup label="Eastern">
              <option value="Ampara">Ampara</option>
              <option value="Batticaloa">Batticaloa</option>
              <option value="Trincomalee">Trincomalee</option>
            <optgroup label="North Central">
              <option value="Anuradhapura">Anuradhapura</option>
              <option value="Polonnaruwa">Polonnaruwa</option>
            <optgroup label="North Western">
              <option value="Kurunegala">Kurunegala</option>
              <option value="Puttalam">Puttalam</option>
            <optgroup label="Northern">
              <option value="Jaffna">Jaffna</option>
              <option value="Kilinochchi">Kilinochchi</option>
              <option value="Mannar">Mannar</option>
              <option value="Mullaitivu">Mullaitivu </option>
              <option value="Vavuniya">Vavuniya</option>
            <optgroup label="Sabaragamuwa">
              <option value="Kegalle">Kegalle</option>
              <option value="Ratnapura">Ratnapura</option>
            <optgroup label="Southern">
              <option value="Galle">Galle</option>
              <option value="Hambantota">Hambantota</option>
              <option value="Matara">Matara</option>
            <optgroup label="Uva">
              <option value="Badulla">Badulla</option>
              <option value="Monaragala">Monaragala</option>
            <optgroup label="Western">
              <option value="Colombo">Colombo</option>
              <option value="Gampaha">Gampaha</option>
              <option value="Kalutara">Kalutara</option>
         </select>
          </div>

          <div class="inputs">
          <input class="button" type="submit" name="submit" value="Submit">
          <input class="button" type="reset" name="reset" value="Reset">
          </div>
        </form>
        
      </div> 
<!--search box end-->

      <hr width="100%">
      <br/>

<!--view lands start-->
      <div class="viewOffers">
        <?php
        
        $rslt = mysqli_query($con, $sqlAds);
        if($rslt && mysqli_num_rows($rslt) > 0)
        {
          while ($ads_data = mysqli_fetch_assoc($rslt))
          { 
            echo ("<div class='ofr'>");
            echo ("<img src='img/".$ads_data['adID'].".".$ads_data['img']."' width='100%' height='auto'>");
            echo("<a id='adTitle' href='viewAd.php?adid=".$ads_data['adID']."'>".$ads_data['heading']."</a>");
            echo ("</div>");
          }
        }
        ?>
      </div>
<!--view lands end-->

    </div>
<!--content end-->

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