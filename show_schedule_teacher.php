<html>
<head>
<title>ตารางสอน</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?
include("config/connect.php");
include("config/function_db.php");
include("config/function_gen.php");
$id_place = $_REQUEST['id_place'];
$sql= "select 	date_teach,id_place,generation,location_name from schedule,place where place.id = schedule.id_place AND place.id='$id_place' AND schedule.status=0 group by generation ";
$query = mysql_query($sql) or die ("Error sql");
$j=0;
while($row = mysql_fetch_array($query))
{
	$date_teach[$j] = $row['date_teach'];
 $generation[$j] = $row['generation'];
 $location_name[$j] = $row['location_name'];
 $j++;
}
?>
<div class="valid_box">
  <b>แสดงตารางสอนสถาบันพลังจิตตานุภาพในภาคใต้</b>
</div> 
<table width="400" border="0" align="left" cellpadding="5" cellspacing="5">
<? for($k=0;$k<$j;$k++) { ?>
<tr>
<td><? 
list($da,$tday,$tmonth,$tyear)=explode("/",$date_teach[$k]); 
	//echo $tyear." - ".date('Y');
 
if($tyear>=date('Y')){?>
<a href="show_schedule2.php?mode=<?=$generation[$k]; ?>&id_place=<?=$id_place?> " target="_blank">ตารางสอนหลักสูตรครูสมาธิ  รุ่นที่  <?=$generation[$k]; ?> ณ <?=$location_name[$k]?></a>
<? }?>
</td>
</tr>
<? }?> 

</table>
</body>
</html>
