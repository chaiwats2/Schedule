<?
//header('Content-type: application/ms-word');
//header('Content-Disposition: attachment; filename="test.doc"')
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style type="text/css">
.table
{
border-collapse:collapse;
}
.table2 
{
border:none;
font-size:15px;
}
table, td
{
border:1px solid black;
font-size:15px;
}
</style>
</head>
<body style="font-family:Arial, Helvetica, sans-serif; font-size:8px;">
<?
include("config/connect.php");
$mode = $_REQUEST['mode'];

$sql ="select * from schedule,topic where (schedule.topic_id = topic.Topic_id) AND generation='$mode' ORDER BY  topic.Topic_id ";
$query = mysql_query($sql) or die("Error");

$sql2 ="select DISTINCT(location_name) from schedule,place where schedule.id_place = place.id AND generation='$mode' ";
$query2 = mysql_query($sql2) or die("Error");
$rw = mysql_fetch_array($query2);


$sql3 ="select DISTINCT(generation) from schedule,place where schedule.id_place = place.id AND generation='$mode' ";
$query3 = mysql_query($sql3) or die("Error");
$rww = mysql_fetch_array($query3);

$sql4 ="select * from teacher";
$query4 = mysql_query($sql4) or die("Error");
$i=0;
while($row4 =mysql_fetch_array($query4))
{
  $T_id[$i] = $row4['T_id'];
  $T_name[$i] = $row4['T_name'];
  $i++;
}


$sql_date ="select DISTINCT(date_teach) from schedule,place where schedule.id_place = place.id AND generation='$mode' ";
$query_date = mysql_query($sql_date) or die("Error");
$v=0;
while($rw_date = mysql_fetch_array($query_date))
{
$date_teach[$v] = $rw_date['date_teach'];
$v++;
} 
?>

<br>
<table border="0" width="800" cellpadding="2" cellspacing="2" border="0" align="center" class="table">
<tr>
<td colspan="5" align="center" height="100">สถาบันพลังจิตตานุภาพ  สาขา ๕  <br>ตารางสอนหลักสูตรครูสมาธิ  รุ่นที่  <?=$rww['generation']; ?>   ณ <?=$rw['location_name']; ?></td>
</tr>
<tr align="center" align="center" height="40">
<td>วัน เดือน ปี</td>
<td>วิชาที่สอน</td>
<td>อาจารย์หลัก</td>
<td> อาจารย์ฝึกสอน</td>
<td>อาจารย์ฝึกสรุป</td>
</tr>
<? 
$kk=1;
$v=0;
while($row=mysql_fetch_array($query)) 
{ 
if($kk == 1)
{
?>
<tr>
		<td rowspan="3"><?=$date_teach[$v]; ?></td>
</tr>
<?
} 
?>
<tr>
		<td><?=$row[Book_id].".".$row[Topic_Topicid].".".$row[Topic_Lessonid]." ".$row[Topic_Name]; ?></td>
		<td><? for($j=0;$j<$i;$j++) { if($row[id_teacher_m] == $T_id[$j] ) { echo  $T_name[$j]; break; } }?></td>
		<td><? for($j=0;$j<$i;$j++) { if($row[id_teacher_c] == $T_id[$j] ) { echo  $T_name[$j]; break; }}?> </td>
		<td><? for($j=0;$j<$i;$j++){ if($row[id_teacher_s] == $T_id[$j] ) { echo  $T_name[$j]; break; }} ?></td>
</tr>
<?
  if($kk==2)
  {
  	$kk=0;
	$v++;
  }
$kk++;
}
?>
</table>
</body>
</html>
