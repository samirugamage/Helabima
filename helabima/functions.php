<?php 

/*function to check login and return user data*/
function checkLogin($con)
{
	if(isset($_SESSION['userid']) && isset($_SESSION['account']))
	{
		$id = $_SESSION['userid'];

		if($_SESSION['account'] == 'buyer')
		{
			$sql = "select * from buyers where user_id = '$id' limit 1";
			$result = mysqli_query ($con, $sql);
			if ($result && mysqli_num_rows($result) > 0)
			{
				$buyer_data = mysqli_fetch_assoc($result);
				return $buyer_data;
				$con->close();
			}
		}
		elseif ($_SESSION['account'] == 'seller') 
		{
			$sql = "select * from sellers where user_id = '$id' limit 1";
			$result = mysqli_query ($con, $sql);
			if ($result && mysqli_num_rows($result) > 0)
			{
				$seller_data = mysqli_fetch_assoc($result);
				return $seller_data;
				$con->close();
			}
		}
	}
	else
	{
		return 0;
	}
	die;
}

/*function to assign user id to buyers*/
function useridB()
{
	$text = "B";

	for ($i=0; $i<20; $i++)
	{
		$text .= rand(0, 9);
	}

	return $text;
}

/*function to assign user id to sellers */
function useridS()
{
	$text = "S";
	
	for ($i=0; $i<4; $i++)
	{
		$text .= rand(0, 9);
	}

	return $text;
}

/*function to assign id to advertisement*/
function adId()
{
	$text = "A";
	
	for ($i=0; $i<5; $i++)
	{
		$text .= rand(0, 9);
	}

	return $text;
}

/*function to assign id to advertisement*/
function payId()
{
	$text = "P";
	
	for ($i=0; $i<5; $i++)
	{
		$text .= rand(0, 9);
	}

	return $text;
}

/*function to show error messages*/
function msgErr($msg)
{
	echo ("<div style='display:block;color:#D8000C;background:#FFD2D2;padding:0.5%;width:99%;font-family: Garamond, serif;font-size: 15px;'>");
	echo ("&#9888; &nbsp;".$msg."<span style='float: right;'>&#10006;</span></div><br/>");
}

/*function to show success messages*/
function msgSuc($msg)
{
	echo ("<div style='display:block;color:#4F8A10;background:#DFF2BF;padding:0.5%;width:99%;font-family: Garamond, serif;font-size: 15px;'>");
	echo ("&#10004; &nbsp;".$msg."<span style='float: right;'>&#10006;</span></div><br/>");
}



?>