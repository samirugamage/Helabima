<?php
session_start();

if(isset($_SESSION['userid']) && isset($_SESSION['account']))
{
	unset($_SESSION['userid']);
	unset($_SESSION['account']);
	header("Location: index.php");
}
else
{
	echo "<script>alert('Your are not logged in.');</script>";
	header("Location: BorS.php");
}
die;
?>