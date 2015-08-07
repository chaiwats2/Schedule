<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?
	include("config/connect.php");
	include("config/function_db.php");
	$Username=$_GET['Username'];
	$condition="(Username='$Username')"; 
	$query=select_condition($table_admin,$condition);
	$num=mysql_num_rows($query);
	if($num == 0)
	{
	echo "ชื่อนี้ใช้ได้";
	}
	else
	{
	echo "<font color=#FF0000>ชื่อผู้ใช้ซ้ำกัน</font>";
	}
?>
</body>
</html>
