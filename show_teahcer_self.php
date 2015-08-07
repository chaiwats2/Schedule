<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<br>
<?
include("config/connect.php");
$sql3= "select * from topic ";
$query3 = mysql_query($sql3);
$c3=0;
while($row3 = mysql_fetch_array($query3))
{
 $topicS[$c3] = $row3['Topic_id'];
 $c3++;
}
 $sql_g ="select distinct(generation),location_name,id_teacher,status,id_place from schedule,place where schedule.id_place = place.id AND schedule.id_teacher='$s_teacher_id' ORDER by generation ASC";
 $query_g = mysql_query($sql_g) or die ("error");
 while($rww=mysql_fetch_array($query_g))
 {
 $generation=$rww['generation'];
  $id_placeS=$rww['id_place'];
 //echo $rww['status'];
 if($rww['status']==1){
?>
   <table width="630">
  <tr>
  <td ><strong>ตารางสอนหลักสูตรครูสมาธิ รุ่นที่ 
    <?=$rww['generation']; ?> ณ <?=$rww['location_name']; ?>
  </strong></td>
  <td align="right"><? if($rww['status']==1){echo "<font color=#ffffff>111111111111</font>"."<font color=#ff0000>(ยังไม่ได้ยืนยันการจัดตารางสอน)</font>";}?></td>
  </tr>
  </table>


<table width="630"  cellpadding="1" cellspacing="1" border="0" bordercolor="#CCCCCC">
  <tr align="center" height="40" bgcolor="#87d9fa">
     <td width="120"><b>วัน เดือน ปี</b> </td>
     <td ><b>หัวข้อที่สอน</b></td>
     
  </tr>
<?
// $sql_t="select * from schedule,topic,teacher where schedule.generation='$generation' AND topic.Topic_id = schedule.topic_id AND schedule.id_teacher='$id_teacher' AND teacher.ID = schedule.id_teacher";
 $sql_t="select * from schedule where id_teacher='$s_teacher_id' AND generation='$generation' AND status!='3' AND id_place='$id_placeS'";
 $query=mysql_query($sql_t);
 while($rw=mysql_fetch_array($query)) 
{ list($dat,$dayS,$monS,$yearS)=explode("/",$rw['date_teach']);
		$dateS=$dayS."/".$monS."/".$yearS;
		$topic=$rw['topic_id'];
?>
 	<tr height="30" height="30"  bgcolor="#d8ffca">
		<td align="center"><? if($dat=="Sat"){echo "ส. ".$dateS;}else if ($dat=="Sun"){echo "อ. ".$dateS;}?></td>
		<td><? $sql_Top="select * from topic where Topic_id='$topic' " ;
				 $queryTop=mysql_query($sql_Top);
 while($rwT=mysql_fetch_array($queryTop)){ 
				echo $rwT['Book_id'].".".$rwT['Topic_Topicid'].".".$rwT['Topic_Lessonid']." ".$rwT['Topic_Name']; break;}?></td>
		
   </tr>
<?  
}//end if rw

?>
<tr align="center" height="20" bgcolor="#87d9fa">
     <td width="120">&nbsp;</td>
    <td >&nbsp;</td>
     
  </tr>
</table>
<br>
<? }}?>
<? /*
if($s_type  =='TM')
{
 $sql_g ="select distinct(generation),location_name,id_teacher_m from schedule,place where schedule.id_place = place.id AND schedule.id_teacher_m='$s_teacher_id' ";
 $query_g = mysql_query($sql_g) or die ("error");
 while($rww=mysql_fetch_array($query_g))
 {
 $generation=$rww['generation'];
 $id_teacher_m=$rww['id_teacher_m'];
?>
   <table>
  <tr>
  <td>ตารางสอนหลักสูตรครูสมาธิ รุ่นที่ <?=$rww['generation']; ?> ณ <?=$rww['location_name']; ?></td>
  </tr>
  </table>
  <table width="650"  cellpadding="2" cellspacing="2" border="0" bordercolor="#CCCCCC">
  <tr align="center" height="40" bgcolor="#87d9fa">
     <td>วัน เดือน ปี </th>
     <td>วิชาที่สอน</th>
     <td>อ.หลัก</th>
  </tr>
<?
 $sql_t="select * from schedule,topic,teacher where schedule.generation='$generation' AND topic.Topic_id = schedule.topic_id AND schedule.id_teacher_m='$id_teacher_m' AND teacher.T_id = schedule.id_teacher_m";
 $query=mysql_query($sql_t);
 while($rw=mysql_fetch_array($query)) 
{ 
?>
 	<tr height="30" height="30"  bgcolor="#d8ffca">
		<td><?=$rw[date_teach]; ?></td>
		<td><?=$rw[Book_id].".".$rw[Topic_Topicid].".".$rw[Topic_Lessonid]." ".$rw[Topic_Name]; ?></td>
		<td><?=$rw[T_name] ?> </td>
   </tr>
<?  
}//end if rw
}//end if rww
?>
</table>
<br><br>
<?
}//if(teahcer TM)


if($s_type=='TC')
{
 $sql_g ="select distinct(generation),location_name,id_teacher_c from schedule,place where schedule.id_place = place.id AND schedule.id_teacher_c='$s_teacher_id' ";
 $query_g = mysql_query($sql_g) or die ("error");
 while($rww=mysql_fetch_array($query_g))
 {
 $generation=$rww['generation'];
 $id_teacher_c=$rww['id_teacher_c'];
?>
  <table>
  <tr>
  <td>ตารางสอนหลักสูตรครูสมาธิ รุ่นที่ <?=$rww['generation']; ?> ณ <?=$rww['location_name']; ?></td>
  </tr>
  </table>
  <table width="650"  cellpadding="2" cellspacing="2" border="0" bordercolor="#CCCCCC">
  <tr align="center" height="40" bgcolor="#87d9fa">
     <td>วัน เดือน ปี </th>
     <td>วิชาที่สอน</th>
     <td>อ.ฝึกสอน</th>
  </tr>
<?
 $sql_t="select * from schedule,topic,teacher where schedule.generation='$generation' AND topic.Topic_id = schedule.topic_id AND schedule.id_teacher_c='$id_teacher_c' AND teacher.T_id = schedule.id_teacher_c";
 $query=mysql_query($sql_t);
 while($rw=mysql_fetch_array($query)) 
{ 
?>
   <tr height="30" height="30"  bgcolor="#d8ffca">
		<td><?=$rw[date_teach]; ?></td>
		<td><?=$rw[Book_id].".".$rw[Topic_Topicid].".".$rw[Topic_Lessonid]." ".$rw[Topic_Name]; ?></td>
		<td><?=$rw[T_name] ?> </td>
   </tr>
<?  
} //end if rw
}//end if rww
?>
<tr>
</table>
<br><br>
<?
}//end if Teacher TC


if($s_type =='TS')
{
 $sql_g ="select distinct(generation),location_name,id_teacher_s from schedule,place where schedule.id_place = place.id AND schedule.id_teacher_s='$s_teacher_id' ";
 $query_g = mysql_query($sql_g) or die ("error");
 while($rww=mysql_fetch_array($query_g))
 {
 $generation=$rww['generation'];
 $id_teacher_s=$rww['id_teacher_s'];
?>
  <table>
  <tr>
  <td>ตารางสอนหลักสูตรครูสมาธิ รุ่นที่ <?=$rww['generation']; ?> ณ <?=$rww['location_name']; ?></td>
  </tr>
  </table>
  <table width="650"  cellpadding="2" cellspacing="2" border="0" bordercolor="#CCCCCC">
  <tr align="center" height="40" bgcolor="#87d9fa">
     <td>วัน เดือน ปี </th>
     <td>วิชาที่สอน</th>
     <td>อ.ฝึกสรุป</th>
  </tr>
<?
 $sql_t="select * from schedule,topic,teacher where schedule.generation='$generation' AND topic.Topic_id = schedule.topic_id AND schedule.id_teacher_s='$id_teacher_s' AND teacher.T_id = schedule.id_teacher_s";
 $query=mysql_query($sql_t);
 while($rw=mysql_fetch_array($query)) 
{ 
?>
   <tr height="30" height="30"  bgcolor="#d8ffca">
		<td><?=$rw[date_teach]; ?></td>
		<td><?=$rw[Book_id].".".$rw[Topic_Topicid].".".$rw[Topic_Lessonid]." ".$rw[Topic_Name]; ?></td>
		<td><?=$rw[T_name] ?> </td>
   </tr>
<?  
}//end while $rw
}//end while $rww
?>
</table>
<?
}//end if Teahcer TS
*/
?>
</body>
</html>
