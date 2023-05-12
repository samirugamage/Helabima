<?php
session_start();
require('config.php'); 
include('functions.php');

$userData = checkLogin($con);

$adid = $_GET['adid'];

/* load data */
$asql = "SELECT * FROM ads WHERE adID = '$adid'";
$adR = mysqli_query ($con, $asql);
if ($adR && mysqli_num_rows($adR) > 0)
{
  $adDt = mysqli_fetch_assoc($adR);
}

$oldImg = $adDt['img'];
$oldDes = "img/".$adid.".".$oldImg;

/* edit data */
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update']))
{   
  $heading = $_POST["heading-input"];
  $type = $_POST["type-input"]; 
  $area = $_POST["area-input"]; 
  $price = $_POST["price-input"];
  $address = $_POST["address-input"]; 
  $district = $_POST["district-input"];
  $province = $_POST["province-input"]; 
  $desc = $_POST["desc-input"];

/* edit heading */
  if($heading != $adDt['heading'])
  {
    $sql01 = "UPDATE ads SET heading = '$heading' WHERE adID = '$adid'";
    mysqli_query ($con, $sql01);
    msgSuc("Update Succsesful.");
  }

/* edit type */
  if($type != $adDt['type'])
  {
    $sql02 = "UPDATE ads SET type = '$type' WHERE adID = '$adid'";
    mysqli_query ($con, $sql02);
    msgSuc("Update Succsesful.");
  }

/* edit area */
  if($area != $adDt['area'])
  {
    $sql03 = "UPDATE ads SET area = '$area' WHERE adID = '$adid'";
    mysqli_query ($con, $sql03);
    msgSuc("Update Succsesful.");
  }

/* edit price */
  if($price != $adDt['price'])
  {
    $sql04 = "UPDATE ads SET price = '$price' WHERE adID = '$adid'";
    mysqli_query ($con, $sql04);
    msgSuc("Update Succsesful.");
  }

/* edit address */
  if($address != $adDt['address'])
  {
    $sql05 = "UPDATE ads SET address = '$address' WHERE adID = '$adid'";
    mysqli_query ($con, $sql05);
    msgSuc("Update Succsesful.");
  }

/* edit district */
  if($district != $adDt['district'])
  {
    $sql06 = "UPDATE ads SET district = '$district' WHERE adID = '$adid'";
    mysqli_query ($con, $sql06);
    msgSuc("Update Succsesful.");
  }

/* edit province */
  if($province != $adDt['province'])
  {
    $sql07 = "UPDATE ads SET province = '$province' WHERE adID = '$adid'";
    mysqli_query ($con, $sql07);
    msgSuc("Update Succsesful.");
  }

/* edit description */
  if($desc != $adDt['description'])
  {
    $sql08 = "UPDATE ads SET description = '$desc' WHERE adID = '$adid'";
    mysqli_query ($con, $sql08);
    msgSuc("Update Succsesful.");
  }

/* edit image */
  $img = $_FILES['adImg']['name'];
  $extension = pathinfo($img, PATHINFO_EXTENSION);
  $destination = 'img/'.$adid.'.'.$extension;
  $filename = $_FILES['adImg']['tmp_name'];

  if (!empty($img))
  {
    if(file_exists($oldDes))
    {
      unlink($oldDes);
    }
    
    if (move_uploaded_file($filename, $destination))
    {
      $imgStatus = $extension; 
      $sql09 = "UPDATE ads SET img = '$imgStatus' WHERE adID = '$adid'";
      mysqli_query ($con, $sql09);
      msgSuc("Update Succsesful.");
    }
    else
    {
      msgErr("Update unsuccsesful.");
    }
  }

  $con->close();
  header("refresh:1;url=sellerEditAd.php?adid=$adid");
  die;
}
/* delete advertisement */
elseif ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['delete']))
{
  $sid = $_POST['sellerid-input-4dlt']; 
  $password = $_POST['password-input-4dlt'];

  if ($sid == $userData['user_id'] && $password === $userData['password'])
  {
    $sql10 = "DELETE FROM ads WHERE adID = '$adid'";
    mysqli_query ($con, $sql10);
    $con->close();
    if(file_exists($oldDes))
    {
      unlink($oldDes);
    }
    header("Location: sellerIndex.php");
  }
  else
  {
    msgErr('Delete unsuccsesful. Incorrect ID or Password');
    header("refresh:1;url=sellerEditAd.php?adid=$adid");
    die;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="stylesheet" type="text/css" href="src/styles/main.css">
  <link rel="stylesheet" type="text/css" href="src/styles/ads.css">
  <script type="text/javascript"  src="src/js/script.js"></script>

  <title>Edit <?php echo $adid;?> - Helabiam Lands</title>

</head>

<body>

<!--header start-->
  <div class="header"> 
    <a href="index.php"><img id="icon" alt="Helabima Lands Icon" src="src/img/02.jpeg" width="250px" height="auto" /></a>

<!--display user name if user is logged in as a seller or redirect-->
    <?php
        $logOut = "<a href='logout.php' id='logout'>Log Out</a>";

        if(isset($_SESSION['account']) && $_SESSION['account'] == "seller" && $_SESSION['userid'] == $adDt['user_id'])
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

    <div class="editad-container">

      <div class="back2">
        <a href="sellerIndex.php"> <<< &nbsp;Back </a>
      </div>

<!--seller edit advertisement start-->
      <div class="editad">
        <form name="editad" action="" method="post" enctype="multipart/form-data">
          
          <label id="title">Edit advertisement</label>
          <br/> <br/> <br/>

          <label class="label">Heading</label>
          <input type="text" class="input" name="heading-input" value="<?php echo $adDt['heading'] ?>" >

          <label class="label">Type</label>
          <input type="text" class="input" name="type-input" value="<?php echo $adDt['type'] ?>" >

          <label class="label">Area (in Perch)</label>
          <input type="number" class="input" name="area-input" min="0" max="" step="1" value="<?php echo $adDt['area'] ?>">

          <label class="label">Price (in LKR)</label>
          <input type="number" class="input" name="price-input" min="0" max="" step="1" value="<?php echo $adDt['price'] ?>">

          <label class="label">Province</label>
          <select class="input" name="province-input">
              <option value=""><?php echo $adDt['province'] ?></option>
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
            <option value=""><?php echo $adDt['district'] ?></option>
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
          <textarea class="input" name="address-input" wrap="soft" maxlength="200" ><?php echo $adDt['address'] ?></textarea>

          <label class="label">Description</label>
          <textarea class="input" name="desc-input" rows="6" wrap="soft" maxlength="5000" ><?php echo $adDt['description'] ?></textarea>

          <label class="label">Image (< 2MB)</label> <a href="<?php echo $oldDes; ?>">Link to the old image</a> 
          <br/>
          <input class="btnFile" type="file" name="adImg" accept=".png, .jpg, .jpeg">

          <input class="button" type="submit" name="update" value="Submit">
          <input class="button" type="reset" name="reset" value="Reset">
          
        </form>
      </div>
<!--seller edit advertisement end-->

<!--seller delete advertisement start-->
      <br/><br/>
      <a id="dltProf" onclick="showNDhide('dltProfB')" href="#dltProf">Delete Advertisement</a>

      <div id="dltProfB" class="dltProf" style="display: none;">
        <form  name="dltProfB" method="post">
        <br/>
        <label id="sellerid-Label">Seller ID</label>
        <input type="text" id="sellerid-input-4dlt" name="sellerid-input-4dlt" placeholder='Seller ID..'>
    
        <label id='password-Label'>Password</label>
        <input type='password' id='password-input-4dlt' name='password-input-4dlt' placeholder='Password..'>

        <input id="" class="button" name="delete" type="submit" value="Submit">
        </form>
      </div>
<!--seller delete advertisement end-->

    </div>

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