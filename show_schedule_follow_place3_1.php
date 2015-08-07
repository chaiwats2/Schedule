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
$sql= "select 	date_teach,id_place,generation,location_name,status from schedule,place where place.id = schedule.id_place  group by generation ";
$query = mysql_query($sql);
$j=0;
while($row = mysql_fetch_array($query))
{
	if($row['status']==0){
	$date_teach[$j] = $row['date_teach'];
//echo	$date_teach[$j] ;
 $generation[$j] = $row['generation'];
// echo $generation[$j];
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
	list($da,$tday,$tmonth,$tyear)=explode("/",$date_teach[$k]); 
	//echo $tyear." - ".date('Y');
 
if($tyear>=date('Y')){
	$sql2= "select * from schedule where generation='$generation[$k]' AND status=0";
	$query2 = mysql_query($sql2);
	$num = mysql_num_rows($query2);
	
//show_schedule.php?>
<a href="show_schedule3.php?mode=<?=$generation[$k]; ?> " target="_blank">ตารางสอนหลักสูตรครูสมาธิ  รุ่นที่  <?=$generation[$k]; ?> จำนวน  
<? $sql3= "select sum_place from schedule where generation='$generation[$k]'";
	$query3 = mysql_query($sql3);while($row3 = mysql_fetch_array($query3))
{echo " ".$row3['sum_place']." "; break;}?>สถานที่</a> 
<? } ?>
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
