<?
include("config/connect.php");

    $Date_begin = $_GET['Date_begin'];
	$Date_end = $_GET['Date_end'];
	$Name_holiday = $_GET['Name_holiday'];
	$id_date = $_GET['id_date'];
	
	$sql="update $table_holiday set Date_begin = '$Date_begin',Date_end = '$Date_end',Name_holiday='$Name_holiday' where id='$id_date' ";
	$result=mysql_query($sql) or die ("error");
	if($result)
	{
		echo "y";
	}	 
?> 