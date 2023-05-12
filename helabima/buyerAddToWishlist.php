<?php
session_start();
require('config.php'); 
include('functions.php');

/* add an advertisement to wishlist. Only buyer can access this function.*/
if(isset($_SESSION['account']) && $_SESSION['account'] == "buyer")
{
	$adid = $_GET['adid'];
	$bid = $_SESSION['userid'];

	$asql = "INSERT INTO wishlist (adID, user_id) VALUES ('$adid', '$bid')";
	$adR = mysqli_query ($con, $asql);
	$con->close();

	msgSuc("Succsesfully added.");
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