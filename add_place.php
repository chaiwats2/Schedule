<?
include("config/connect.php");
include("config/function_db.php");
include("config/function_gen.php");

$location_name =$_GET['location_name'];
$address =$_GET['address'];

	$result=adddata($table_place);
	if($result)
	{
		echo "y";
	}
	 
?> 