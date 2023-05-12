<?php
$dbhost = "localhost";
$dbuser = "root"; 
$dbpass = "";
$dbname = "helabima";

//The connection object
$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if($con->connect_error)
{
	die("Connection failed: " . $con->connect_error);
}
?>