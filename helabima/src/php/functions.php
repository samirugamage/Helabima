<?php 

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
			}
		}
	}
	else
	{
		return 0;
	}
	die;
}


function useridB()
{
	$text = "B";

	for ($i=0; $i<20; $i++)
	{
		$text .= rand(0, 9);
	}

	return $text;
}

function useridS()
{
	$text = "S";
	
	for ($i=0; $i<4; $i++)
	{
		$text .= rand(0, 9);
	}

	return $text;
}

function alert($msg)
{
	echo "<script>alert('$msg');</script>";
}
?>
