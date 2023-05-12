<?php
session_start();
require('config.php'); 
include('functions.php');

$userData = checkLogin($con);

/* edit data */
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update']))
{
  $userid = $_SESSION['userid'];
  $username = $_POST["username-input"]; 
  $email = $_POST["email-input"]; 
  $oldpassword = $_POST["old-password-input"];
  $newpassword = $_POST["new-password-input"];

/* edit username */
  if($username != $userData['user_name'])
  {
    $sql01 = "UPDATE buyers SET user_name = '$username' WHERE user_id = '$userid'";
    mysqli_query ($con, $sql01);
    msgSuc("Update Succsesful.");
  }

/* edit email */
  if($email != $userData['email'])
  {
    $sql02 = "UPDATE buyers SET email = '$email' WHERE user_id = '$userid'";
    mysqli_query ($con, $sql02);
    msgSuc("Update Succsesful.");
  }

/* edit password ------------------------------------------*/
  if(!empty($oldpassword) && !empty($newpassword) && $oldpassword === $userData['password'] && $newpassword != $userData['password'])
  {
    $sql03 = "UPDATE buyers SET password = '$newpassword' WHERE user_id = '$userid'";
    mysqli_query ($con, $sql03);
    msgSuc("Update Succsesful.");
  }
  elseif (!empty($oldpassword) && $oldpassword != $userData['password'])
  {
    msgErr('Update unsuccsesful. Incorrect Password');
  }

  $con->close();
  header("refresh:1;url=buyerEditProfile.php");
  die;  
}
/* update account ----------------------------------------------------------*/
elseif ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['delete']))
{
  $username = $_POST['username-input-4dlt']; 
  $password = $_POST['password-input-4dlt'];

  if ($username == $userData['user_name'] && $password === $userData['password'])
  {
    $sql05 = "DELETE FROM buyers WHERE user_name = '$username'";
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
  <link rel="stylesheet" type="text/css" href="src/styles/buyer.css">
  <script type="text/javascript"  src="src/js/script.js"></script>

  <title>Edit Profile - Helabiam Lands</title>

</head>

<body>

<!--header start-->
  <div class="header"> 
    <a href="index.html"><img id="icon" alt="Helabima Lands Icon" src="src/img/02.jpeg" width="250px" height="auto" /></a>
      
<!--display user name if user is logged in or redirect-->
  <?php
       $logOut = "<a href='' id='logout'>Log Out</a>";

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
      
    <a class="nav" href="" > <img id="aboutus" alt="aboutus" src="src/img/aboutus.jpg" height="50px" width="auto" /></a>
    <a class="nav" href="" > <img id="lands" alt="lands" src="src/img/lands.jpg" height="50px" width="auto" /></a>
    <a class="nav" href="" > <img id="home" alt="home" src="src/img/home.jpg" height="50px" width="auto" /></a>

  </div>
<!--header end-->

  <hr width="100%">

<!--content start-->
  <div class="content">

    <div class="editProf-container">

      <div class="back2">
        <a href="buyerIndex.php"> <<< &nbsp;Back </a>
      </div>

<!--buyer edit profile start-->
      <div class="editProf" style="margin-top:0px;margin-bottom: 10px;">
        <form name="editProfB" action="" method="post">

          <label id="title" style="padding-left: 160px;">Edit Profile</label>
          <br/> <br/> <br/>

          <label id="username-Label">Username</label>
          <input type="text" id="username-input" name="username-input" value="<?php echo $userData['user_name']; ?>">

          <label id="email-Label">Email</label>
          <input type="email" id="email-input" name="email-input" value="<?php echo $userData['email']; ?>">

          <label id="password-Label">Old Password</label>
          <input type="password" id="password-input" name="old-password-input" placeholder="Enter your old password.." >

          <label id="password-Label">New Password</label>
          <input type="password" id="password-input" name="new-password-input" placeholder="Enter your new password..">

          <input id="submitEditProf" name="update" type="submit" value="Submit Changes">

        </form>
      </div>
<!--buyer edit profile end-->

      <br/><br/>

<!--buyer delete profile start-->
      <a id="dltProf" onclick="showNDhide('dltProfB')" href="#dltProf">Delete Account</a>

      <div id="dltProfB" class="dltProf" style="display: none;">
        <form  name="dltProfB" method="post">
        <br/>
        <label id="username-Label">Username</label>
        <input type="text" id="username-input" name="username-input-4dlt" placeholder='Username..'>
    
        <label id='password-Label'>Password</label>
        <input type='password' id='password-input' name='password-input-4dlt' placeholder='Password..'>

        <input id="submitEditProf" name="delete" type="submit" value="Submit">
        </form>
      </div>
<!--buyer delete profile end-->

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