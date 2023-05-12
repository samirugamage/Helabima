<?php
session_start();
require('config.php'); 
include('functions.php');

/* Remove a seler from system. Only admin can access this function.*/
if(isset($_SESSION['account']) && $_SESSION['account'] == "admin")
{
	$sid = $_GET['sid'];

/*delete images and records related to the seller*/
    $sql02 = "SELECT * FROM ads WHERE user_id = '$sid'";
    $sAdRslt = mysqli_query ($con, $sql02);
    if ($sAdRslt && mysqli_num_rows($sAdRslt) > 0)
    {
    	while ($sAd_data = mysqli_fetch_assoc($sAdRslt))
        {
            $adid = $sAd_data['adID'];
            $oldImg = $sAd_data['img'];
			$oldDes = "img/".$adid.".".$oldImg;
			if(file_exists($oldDes))
			{
				unlink($oldDes);
			}
        }
    }

/*delete seller records*/
	$sql10 = "DELETE FROM sellers WHERE user_id = '$sid'";
	mysqli_query ($con, $sql10);
	$con->close();
	msgSuc("Delete Succsesful.");
	header("refresh:1;url=adminViewAllSellers.php");
	die;
}
else
{
	msgErr("Access Denied: You don’t have permission to access");
	header("refresh:1;url=index.php");
	die;
}
?>