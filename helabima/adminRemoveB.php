<?php
session_start();
require('config.php'); 
include('functions.php');

/* Remove a buyer from system. Only admin can access this function.*/
if(isset($_SESSION['account']) && $_SESSION['account'] == "admin")
{
	$bid = $_GET['bid'];

	$sql10 = "DELETE FROM buyers WHERE user_id = '$bid'";
	mysqli_query ($con, $sql10);
	$con->close();
	msgSuc("Delete Succsesful.");
	header("refresh:1;url=adminViewAllBuyers.php");
	die;
}
else
{
	msgErr("Access Denied: You don’t have permission to access");
	header("refresh:1;url=index.php");
	die;
}
?>