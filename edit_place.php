<?
include("config/connect.php");

    $location_name = $_GET['location_name'];
	$address = $_GET['address'];
	$id_place = $_GET['id_place'];
	
	$sql="update $table_place set location_name = '$location_name',address = '$address' where id='$id_place' ";
	$result=mysql_query($sql) or die ("error");
	if($result)
	{
		echo "y";
	}	 
?> 