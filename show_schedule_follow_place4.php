<? session_start(); ?>
<html>
<head>
<title>ตารางสอน</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?
$s_teacher_id=$_SESSION['s_teacher_id'];
include("config/connect.php");
include("config/function_db.php");
include("config/function_gen.php");
 $sql= "select 	date_teach,id_place,generation,location_name,status,id_teacher from schedule,place where place.id = schedule.id_place and schedule.status=0 and schedule.id_teacher='$s_teacher_id' group by generation ";
$query = mysql_query($sql);
$j=0;
while($row = mysql_fetch_array($query))
{
	if($row['status']==1||$row['status']==0){
		$date_teach[$j] = $row['date_teach'];
 $generation[$j] = $row['generation'];
//echo $sum_place[$j] = $row['sum_place'];
 $location_name[$j] = $row['location_name'];
 $j++;}
}

?>
<div class="valid_box">
  <b>แสดงตารางสอนสถาบันพลังจิตตานุภาพในภาคใต้  </b>
</div> 
<table width="600" border="0" align="left" cellpadding="5" cellspacing="5">
<? for($k=0;$k<$j;$k++) { ?>
<tr>
<td>
<? list($da,$tday,$tmonth,$tyear)=explode("/",$date_teach[$k]); 
	//echo $tyear." - ".date('Y');
 
if($tyear>=date('Y')){
	$sql2= "select * from schedule where generation='$generation[$k]' AND status=1";
	$query2 = mysql_query($sql2);
	$num = mysql_num_rows($query2);
	
//show_schedule.php?>
<a href="show_schedule4.php?mode=<?=$generation[$k]; ?> " target="_blank">ตารางสอนหลักสูตรครูสมาธิ  รุ่นที่  <?=$generation[$k]; ?> จำนวน  
<? $sql3= "select sum_place from schedule where generation='$generation[$k]'";
	$query3 = mysql_query($sql3);while($row3 = mysql_fetch_array($query3))
{echo " ".$row3['sum_place']." "; break;}?>สถานที่</a> 
<? } ?>
</td>
</td>
<td>

</td>
</tr>
<? }?> 

<?

?>
</table>
</body>
</html>
