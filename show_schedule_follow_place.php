<? session_start(); ?>
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
$sql= "select 	id_place,generation,location_name,status from schedule,place where place.id = schedule.id_place and schedule.status!=3 group by generation ";
$query = mysql_query($sql);
$j=0;
while($row = mysql_fetch_array($query))
{
	if($row['status']==1||$row['status']==0){
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
<? 
	$sql2= "select * from schedule where generation='$generation[$k]' AND status=1";
	$query2 = mysql_query($sql2);
	$num = mysql_num_rows($query2);
	
//show_schedule.php?>
<a href="show_schedule.php?mode=<?=$generation[$k]; ?> " target="_blank">ตารางสอนหลักสูตรครูสมาธิ  รุ่นที่  <?=$generation[$k]; ?> จำนวน  
<? $sql3= "select sum_place from schedule where generation='$generation[$k]'";
	$query3 = mysql_query($sql3);while($row3 = mysql_fetch_array($query3))
{echo " ".$row3['sum_place']." "; break;}?>สถานที่</a> 
</td>
<td><a href="index.php?frm=show_schedule_follow_place&generation=<?=$generation[$k] ?>" onClick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?');"><img src="images/trash.png" alt="" title="" border="0" /></a>
</td>
<td>
<?
if($num !=0 ){ echo "<font color=#ff0000>(ยังไม่ได้ยืนยันการจัดตารางสอน)</font>";}
?>
</td>
</tr>
<? }?> 

<?
if($_REQUEST['generation'] != '')
{
	//$ge=0;
	 $generation = $_REQUEST['generation'];
 /*	 $sql="select * from schedule where generation='$generation' ";
	 $query = mysql_query($sql);
	 while($row = mysql_fetch_array($query)){
		 $id_g[$ge]=$row['ID'];
		 $ge++;
		 }
	for($g=0;$g<count($id_g);$g++){
		$idDel=$id_g[$g];*/
		$sql="update schedule set status=3,generation=0 where generation='$generation' ";
		$result=mysql_query($sql);
	 	
	//	}	 
		 
	 window_location("index.php?frm=show_schedule_follow_place");
}
?>
</table>
</body>
</html>
