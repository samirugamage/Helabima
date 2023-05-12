<?php
session_start();
require('config.php'); 
include('functions.php');

/* remove an advertisement from wishlist. Only buyer can access this function.*/
if(isset($_SESSION['account']) && $_SESSION['account'] == "buyer")
{
	$adid = $_GET['adid'];
	$bid = $_SESSION['userid'];

	$asql = "DELETE FROM wishlist WHERE adID = '$adid' AND user_id = '$bid'";
	$adR = mysqli_query ($con, $asql);
	$con->close();

	msgSuc("Succsesfully removed.");
	header("refresh:1;url=buyerIndex.php");
	die;
}
else
{
	msgErr("Access Denied: You don’t have permission to access");
	header("refresh:1;url=index.php");
	die;
}
?>