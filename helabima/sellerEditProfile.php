<?php
session_start();
require('config.php'); 
include('functions.php');

$userData = checkLogin($con);
$userid = $_SESSION['userid'];

/* edit data */
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update']))
{
  $name = $_POST["name-input"]; 
  $email = $_POST["email-input"]; 
  $mnum = $_POST["mnum-input"];
  $oldpassword = $_POST["old-password-input"];
  $newpassword = $_POST["new-password-input"];

/* edit username */
  if($name != $userData['name'])
  {
    $sql01 = "UPDATE sellers SET name = '$name' WHERE user_id = '$userid'";
    mysqli_query ($con, $sql01);
    msgSuc("Update Succsesful.");
  }

/* edit email */  
  if($email != $userData['email'])
  {
    $sql02 = "UPDATE sellers SET email = '$email' WHERE user_id = '$userid'";
    mysqli_query ($con, $sql02);
    msgSuc("Update Succsesful.");
  }

/* edit mobile number */
  if($mnum != $userData['mobilenum'])
  {
    $sql04 = "UPDATE sellers SET mobilenum = '$mnum' WHERE user_id = '$userid'";
    mysqli_query ($con, $sql04);
    msgSuc("Update Succsesful.");
  }

/* edit password */
  if(!empty($oldpassword) && !empty($newpassword) && $oldpassword === $userData['password'] && $newpassword != $userData['password'])
  {
    $sql03 = "UPDATE sellers SET password = '$newpassword' WHERE user_id = '$userid'";
    mysqli_query ($con, $sql03);
    msgSuc("Update Succsesful.");
  }
  elseif (!empty($oldpassword) && $oldpassword != $userData['password'])
  {
    msgErr('Update unsuccsesful. Incorrect Password');
  }

  $con->close();
  header("refresh:1;url=sellerEditProfile.php");
  die;
}
/* delete account */
elseif ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['delete']))
{
  $sid = $_POST['sellerid-input-4dlt']; 
  $password = $_POST['password-input-4dlt'];

  if ($sid == $userData['user_id'] && $password === $userData['password'])
  {
    $sql05 = "DELETE FROM sellers WHERE user_id = '$sid'";
    mysqli_query ($con, $sql05);
    $con->close();
    header("Location: logout.php");
    die;
  }
  else
  {
    msgErr('Delete unsuccsesful. Incorrect ID or Password');
    header("refresh:1;url=sellerEditProfile.php");
    die;
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="stylesheet" type="text/css" href="src/styles/main.css">
  <link rel="stylesheet" type="text/css" href="src/styles/seller.css">
  <script type="text/javascript"  src="src/js/script.js"></script>

    <title>Edit <?php echo $_SESSION['userid']; ?> - Helabiam Lands</title>

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
          echo("<a id='username' href='sellerIndex.php'>".$userid. "</a>");
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
    <div class="editProf-container">
     
     <div class="back2">
        <a href="sellerIndex.php"> <<< &nbsp;Back </a>
      </div>

<!--seller edit profile start-->
      <div class="editProf">
        <form name="editProfS" action="" method="post">
          <label id="title">Edit Profile</label>
          <br/> <br/> <br/>

          <label id="name-Label">Full Name</label>
          <input type="text" id="name-input" name="name-input" value="<?php echo $userData['name']; ?>" >

          <label id="password-Label">Old Password</label>
          <input type="password" id="password-input" name="old-password-input" placeholder="Enter your old password.." >

          <label id="password-Label">New Password</label>
          <input type="password" id="password-input" name="new-password-input" placeholder="Enter your new password..">

          <label id="email-Label">Email</label>
          <input type="email" id="email-input" name="email-input" value="<?php echo $userData['email']; ?>"> 

          <label id="mnum-Label">Mobile Number</label>
          <input type="tel" id="mnum-input" name="mnum-input" value="<?php echo $userData['mobilenum']; ?>" >

          <input id="submitEditProf" name="update" type="submit" value="Submit Changes">
        </form>
      </div>
<!--seller edit profile end-->

<!--seller delete profile start-->
      <br/><br/>
      <a id="dltProf" onclick="showNDhide('dltProfB')" href="#dltProf">Delete Account</a>

      <div id="dltProfB" class="dltProf" style="display: none;">
        <form  name="dltProfB" method="post">
        <br/>
        <label id="sellerid-Label">Seller ID</label>
        <input type="text" id="sellerid-input-4dlt" name="sellerid-input-4dlt" placeholder='Seller ID..'>
    
        <label id='password-Label'>Password</label>
        <input type='password' id='password-input-4dlt' name='password-input-4dlt' placeholder='Password..'>

        <input id="submitEditProf" name="delete" type="submit" value="Submit">
        </form>
      </div>
<!--seller delete profile end-->

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