<?php
session_start();
require('config.php'); 
include('functions.php');

/* Remove an advertisement from system. Only admin can access this function.*/
if(isset($_SESSION['account']) && $_SESSION['account'] == "admin")
{
	$adid = $_GET['adid'];
	
/*delete record*/
	$asql = "SELECT * FROM ads WHERE adID = '$adid'";
	$adR = mysqli_query ($con, $asql);
	if ($adR && mysqli_num_rows($adR) > 0)
	{
  		$adDt = mysqli_fetch_assoc($adR);
	}
	
	$oldImg = $adDt['img'];
	$oldDes = "img/".$adid.".".$oldImg;

	$sql10 = "DELETE FROM ads WHERE adID = '$adid'";
	mysqli_query ($con, $sql10);
	$con->close();

/* delete img .*/
	if(file_exists($oldDes))
	{
		unlink($oldDes);
	}

	msgSuc("Delete Succsesful.");
	header("refresh:1;url=adminViewAllAds.php");
	die;
}
else
{
	msgErr("Access Denied: You don’t have permission to access");
	header("refresh:1;url=index.php");
	die;
}
?>