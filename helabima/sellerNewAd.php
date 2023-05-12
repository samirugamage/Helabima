<?php
session_start();
require('config.php'); 
include('functions.php');

$userData = checkLogin($con);
$adid = adId();
$imgStatus = 0;

/* publish a new advertisement */
if ($_SERVER['REQUEST_METHOD'] == "POST")
{   
// load image
  $size = $_FILES['adImg']['size'];
  $img = $_FILES['adImg']['name'];
  $extension = pathinfo($img, PATHINFO_EXTENSION);
  $destination = 'img/'.$adid.'.'.$extension;
  $filename = $_FILES['adImg']['tmp_name'];

  if (!empty($img) && move_uploaded_file($filename, $destination))
  {
    $imgStatus = $extension;
  }
  else
  {
    msgErr("ERROR: Please Try again");
  }

// load data
  $heading = $_POST["heading-input"];
  $type = $_POST["type-input"]; 
  $area = $_POST["area-input"]; 
  $price = $_POST["price-input"]; 
  $province = $_POST["province-input"]; 
  $district = $_POST["district-input"]; 
  $address = $_POST["address-input"];
  $desc = $_POST["desc-input"];
  $user_id  = $userData['user_id'];
  $amount = $_POST["amount-input"];
  $cardType = $_POST["ctype-input"];
  $cardNumber = $_POST["cnum-input"];
  $expireDate =  $_POST["xdate-input"];

  $sql05 = "INSERT into ads (adID, heading, type, area, price, address, district, province, description, img, user_id) VALUES('$adid', '$heading', '$type', '$area', '$price', '$address', '$district', '$province', '$desc', '$imgStatus', '$user_id')";

  $payId = payId();
  $sqpay = "INSERT INTO payment (payID, cardType, cardNumber, expireDate, amount, adID) VALUES('$payId', '$cardType', '$cardNumber', '$expireDate', '$amount', '$adid')";

  if($imgStatus != 0)
  {
    mysqli_query($con, $sql05); 
    mysqli_query($con, $sqpay); 
    $con->close();
    header("Location: sellerIndex.php");
    die;
  }
  else
  {
    msgErr("ERROR: Please Try again");
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="stylesheet" type="text/css" href="src/styles/main.css">
  <link rel="stylesheet" type="text/css" href="src/styles/ads.css">

  <title>Post a new ad - Helabiam Lands</title>

</head>


<body>

<!--header start-->
  <div class="header"> 

    <a href="index.php"><img id="icon" alt="Helabima Lands Icon" src="src/img/02.jpeg" width="250px" height="auto" /></a>

<!--display user name if user is logged in as a seller or redirect-->      
    <?php
        $logOut = "<a href='logout.php' id='logout'>Log Out</a>";

        if(isset($_SESSION['account']) && $_SESSION['account'] == "seller")
        {
          echo($logOut);
          echo("<a id='username' href='sellerIndex.php'>". $userData['user_id']. "</a>");
        }
        elseif(isset($_SESSION['account']) && $_SESSION['account'] == "buyer")
        {
         header("Location: buyerIndex.php");
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
      
    <a class="nav" href="aboutus.php"> <img id="aboutus" alt="aboutus" src="src/img/aboutus.jpg" height="50px" width="auto" /></a>
    <a class="nav" href="lands.php"> <img id="lands" alt="lands" src="src/img/lands.jpg" height="50px" width="auto" /></a>
    <a class="nav" href="index.php"> <img id="home" alt="home" src="src/img/home.jpg" height="50px" width="auto" /></a>

  </div>
<!--header end-->

  <hr width="100%">

<!--content start-->
  <div class="content">

    <div class="postad-container">

      <div class="back2">
        <a href="sellerIndex.php"> <<< &nbsp;Back </a>
      </div>
      
<!--post a new ad start--> 
      <div class="postad">
        <form name="postad" action="" method="post" enctype="multipart/form-data">
          
          <label id="title" style="padding-left: 110px;">Post a New advertisement</label>
          <br/> <br/> <br/>

          <label class="label">Heading</label>
          <input type="text" class="input" name="heading-input" placeholder="Enter a heading.." required>

          <label class="label">Type</label>
          <input type="text" class="input" name="type-input" placeholder="Enter type.." required>

          <label class="label">Area (in Perch)</label>
          <input type="number" class="input" name="area-input" min="0" max="" step="1" required>

          <label class="label">Price (in LKR)</label>
          <input type="number" class="input" name="price-input" min="0" max="" step="1" required>

          <label class="label">Province</label>
           <select class="input" name="province-input" required>
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

          <label class="label">District</label>
          <select class="input" name="district-input" required>
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

          <label class="label">Address</label>
          <textarea class="input" name="address-input" wrap="soft" placeholder="Enter address.." maxlength="200" required></textarea>

          <label class="label">Description</label>
          <textarea class="input" name="desc-input" rows="6" wrap="soft" placeholder="Enter description.." maxlength="1000" required></textarea>

          <label class="label">Image (< 2MB)</label><br/>
          <input class="btnFile" type="file" name="adImg" value="">

          <br/>
          <br/>

          <label class="label">Amount to be paid (in LKR)</label>
          <input type="number" class="input" name="amount-input" min="0" max="" step="0.5" value="200" readonly>

          <label class="label">Card type</label>
          <input type="text" class="input" name="ctype-input" placeholder="Enter a Card type.." required>

          <label class="label">Card Number</label>
          <input type="text" class="input" name="cnum-input" placeholder="Enter a Card Number.." required>

          <label class="label">Expire Date</label>
          <input type="date" class="input" name="xdate-input" placeholder="Enter a Expire Date.." required>

          <input class="button" type="submit" name="submit" value="Submit">
          <input class="button" type="reset" name="reset" value="Reset">
          
        </form>
      </div>
<!--post a new ad end--> 

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