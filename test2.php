<? session_start(); ?>
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
.table3 
{
border:none;
font-size:18px;
}
.table4
{
border:1px solid black;
font-size:18px;
}
</style>
</head>
<body style="font-family:Arial, Helvetica, sans-serif; font-size:15px;">
<?
include("config/connect.php");
$mode = $_REQUEST['mode'];


$sql ="select * from schedule,topic where (schedule.topic_id = topic.Topic_id) AND generation='$mode' AND (schedule.status=0 OR schedule.status=1)ORDER BY  topic.Topic_id ASC ";
$query = mysql_query($sql) or die("Error");

$sql_nchk ="select * from schedule,topic where (schedule.topic_id = topic.Topic_id) AND generation='$mode' AND schedule.status=1 ORDER BY  topic.Topic_id ASC";
$query_nchk = mysql_query($sql_nchk) or die("Error");
$num_ncnfrm=mysql_num_rows($query_nchk);

$sql_chk ="select * from schedule,topic where (schedule.topic_id = topic.Topic_id) AND generation='$mode' AND schedule.status=0 ORDER BY  topic.Topic_id ASC";
$query_chk = mysql_query($sql_chk) or die("Error");
$num_cnfrm=mysql_num_rows($query_chk);

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
  $T_id[$i] = $row4['ID'];
  $T_name[$i] = $row4['T_name'];
  $i++;
}
$sql3= "select sum_place from schedule where generation='$mode' AND status='1'";
	$query3 = mysql_query($sql3);while($row3 = mysql_fetch_array($query3))
{$S=$row3['sum_place']; break;}
echo $P=3+$S;
$d=0;
$sql4 ="select * from schedule where generation='$mode'";
$query4 = mysql_query($sql4) or die("Error");
while($row4 = mysql_fetch_array($query4))
{
	$Plac[$d]=$row4['id_place']; 
	$d++;
	if($d==$S){break;}
}
/*echo count($Plac);
for($ch=0;$ch<count($Plac);$ch++){
	echo $Plac[$ch]." ";
	}
*/
$sqlP= "select * from place ";
$queryP = mysql_query($sqlP);
$cP=0;
while($rowP = mysql_fetch_array($queryP))
{
 $placeS[$cP] = $rowP['id'];
 $cP++;
}
$dT=510+(130*$S);
?>
<br>

<table border="0" <? echo "width=$dT"; ?>cellpadding="2" cellspacing="2" border="0" align="center" class="table">
<tr>
<? //<td colspan="5" align="center" height="100">
echo "   <td colspan=$P align=\"center\" height=\"80\" class=\"table3\"> "; ?>
สถาบันพลังจิตตานุภาพภาคใต้<br>ตารางสอนหลักสูตรครูสมาธิ  รุ่นที่  <?=$rww['generation']; ?>   จำนวน  
<? $sql3= "select sum_place from schedule where generation='$mode'";
	$query3 = mysql_query($sql3);while($row3 = mysql_fetch_array($query3))
{echo " ".$row3['sum_place']." "; break;}?>สถานที่ </td>
</tr>
<tr align="center" align="center" height="40">
<td width="80" rowspan="2" align="center" class="table4">วัน/เดือน/ปี</td>
<td width="90" rowspan="2" align="center" class="table4">หัวข้อ</td>
<? //<td colspan="2" align="center">สถานที่</td>
 echo "   <td colspan=$S align=\"center\" class=\"table4\">สถานที่</td>"; ?>
<? if($num_ncnfrm != 0) { ?>
<td width="20" rowspan="2" align="center" class="table4">จัดการ</td>
<? } ?>

</tr>
 <tr>
 <? for($tS=0;$tS<$S;$tS++){
	 $sqlP= "select * from place where  id='$Plac[$tS]'";
$queryP = mysql_query($sqlP);
while($rowP = mysql_fetch_array($queryP))
 {  echo "<td width=\"130\" align=\"center\">";
  echo $rowP['location_name'];
 echo "</td>";
 }// while
 }//for
  // echo "<td  align=\"center\">&nbsp;</td>";
 ?>  
  </tr>
 
<?	$t=1;
	$sc=1;
	$sp=2+$S;
	$tp=1;
	$sqlT= "select * from topic ";
	$queryT = mysql_query($sqlT);
	while($rowT = mysql_fetch_array($queryT)){
		$id_topic[$tp]=$rowT['Topic_id'];
		$tp++;
		}
	$sqlS= "select * from schedule where generation='$mode' AND status='1'";
	$queryS = mysql_query($sqlS);
	while($rowS = mysql_fetch_array($queryS)){
		//$id_s[$sc]=$rowS['ID'];
		$dat[$sc]=$rowS['date_teach'];
		$top[$sc]=$rowS['topic_id'];
		$id_place[$sc]=$rowS['id_place'];
		$sc++;
		}
		$s1=0;
	$sqlS1= "select * from schedule where generation='$mode' AND status='1'";
	$queryS1 = mysql_query($sqlS1);
	while($rowS1 = mysql_fetch_array($queryS1)){
		$id_s[$s1]=$rowS1['ID'];
		$s1++;
		}
	
$b=0;
$D=0;$E=0;
$F=0;
for($y=1;$y<=count($dat);$y=$y+$S){//$D=0;
		list($day,$numD,$mon,$year)=explode("/",$dat[$y]); 
		$date=$numD."/".$mon."/".$year;
		echo "<tr>";
		//echo $rowS['date_teach'];
		if($day=="Sat"){
			$E=0;
						if($D==0){
						echo "<td rowspan=\"3\">";
						
						echo "ส. ".$date;echo $D=$D+1;
						echo "</td>";
						
						}
						if($D==2){$D=0;}
						
						for($top=$t;$top<$t+$S;$top=$top+$S){
						$sqlTP= "select * from topic where Topic_id='$id_topic[$t]'";	
						$queryTP = mysql_query($sqlTP);
						while($rowTP = mysql_fetch_array($queryTP)){
							echo "<td>";
							echo $rowTP['Book_id'].".".$rowTP['Topic_Topicid'].".".$rowTP['Topic_Lessonid'].". ".$rowTP['Topic_Name'];
							echo "</td>";
							for($sh=0;$sh<$S;$sh++){//echo $sh." ".$b." ".$S." ".$id_s[$b]." "."<br/>";
								$sqlSH= "select * from schedule where ID='$id_s[$b]'";	
								$querySH = mysql_query($sqlSH);
								while($rowSH = mysql_fetch_array($querySH)){
										echo "<td align=\"center\">";
										
										$id_t=$rowSH['id_teacher'];
											$sqlTS= "select * from teacher where ID='$id_t'";	
											$queryTS = mysql_query($sqlTS);
											while($rowTS = mysql_fetch_array($queryTS)){
										echo $rowTS['T_name'];break;
												}
										echo "</td>";
										break;
										}// while
									//	break;
							
							$b++;
								
							}// for
								
							 ?>
						<td align="center"><a href="#"  onClick="window.open('frm_add_schedule.php?id_topic=<?=$id_topic[$t]; ?>&id_date=<?=$date; ?>', 'joe',config='height=600,width=500,menubar=0,resizable=0')"><img src="images/edit.png" alt="" title="" border="0" /></a></td>
						<?	
							break;
							
							}//while
						
							//$b=$b+1;
						
						
						}// for topic 
						//$a=0;
					$t++;
				//	$D=$D+1;
					}// if date = sat
					
	/**/	else if ($day=="Sun"){
							
						$D=0;
						if($E==0){
						echo "<td rowspan=\"2\">";
						
						echo "อ. ".$date;echo $E=$E+1;
						echo "</td>";
						
						}
						if($E==2){$E=0;}
						for($top=$t;$top<$t+$S;$top=$top+$S){
						$sqlTP= "select * from topic where Topic_id='$id_topic[$t]'";	
						$queryTP = mysql_query($sqlTP);
						while($rowTP = mysql_fetch_array($queryTP)){
							echo "<td>";
							echo $rowTP['Book_id'].".".$rowTP['Topic_Topicid'].".".$rowTP['Topic_Lessonid'].". ".$rowTP['Topic_Name'];
							echo "</td>";
							for($sh=0;$sh<$S;$sh++){
								$sqlSH= "select * from schedule where ID='$id_s[$b]'";	
								$querySH = mysql_query($sqlSH);
								while($rowSH = mysql_fetch_array($querySH)){
										echo "<td align=\"center\">";
										
										$id_t=$rowSH['id_teacher'];
											$sqlTS= "select * from teacher where ID='$id_t'";	
											$queryTS = mysql_query($sqlTS);
											while($rowTS = mysql_fetch_array($queryTS)){
												echo $rowTS['T_name'];//break;
												}
										echo "</td>";
										//break;
										}// while
										$b++;
								}// for
							 ?>
						<td align="center"><a href="#"  onClick="window.open('frm_add_schedule.php?id_topic=<?=$row[Topic_id] ?>&id_sch=<?=$row[ID] ?>&id_place=<?=$row[id_place]; ?>', 'joe',config='height=600,width=500,menubar=0,resizable=0')"><img src="images/edit.png" alt="" title="" border="0" /></a></td>
						<?	
							break;
							
							}//while
						}// for topic 
						//$a=0;
					$t++;
					}
		else if($day=="Sunday"||$day=="Saturday"){ 
			//echo"111";
						$h=2+$S;
						echo "<td>";
						if($day=="Sunday"){echo "อ. ".$date;}
						else if ($day=="Saturday"){echo "ส. ".$date;}
						
						echo "</td>";
						echo "  <td colspan=$h align=\"center\" >";
						//$dateHo=$rowS['date_teach'];
						$sqlHo="select * from holiday where Date_begin='$date' or Date_end='$date'";
						$queryHo = mysql_query($sqlHo);
						while ($rowHo = mysql_fetch_array($queryHo)){
							echo $rowHo['Name_holiday'];
							break;
							}
						echo "</td>"; $y=$y-($S-1);$h=0;$D=$D-1;$E=$E-1;$b++;
			}
		
		
		
		echo "</tr>";
		//$a=0;
		}// for all
?>
 </table>
<? /* for($i=0;$i<count($dat);$i++){
	echo $dat[$i]."<br/>";
	}*/

?>
<br>
<? if($num_ncnfrm != 0) { ?>
<center><a href="" onClick="return confirm('คุณต้องการยืนยันตารางสอนหรือไม่ ?');">ยืนยัน</a></center>
<? } ?>
<? if($num_cnfrm != 0) { ?>
<center><a href="" onClick="return confirm('คุณต้องการแก้ไขตารางสอนหรือไม่ ?');">แก้ไขตารางสอน</a></center>
<? } ?>
<?
if($_REQUEST['confirm'] == 1 && $_REQUEST['mode'] != '')
{
	$mode = $_REQUEST['mode'];
	$sql="update schedule set status=0 where generation='$mode' ";
	mysql_query($sql);
	echo "<script>self.opener.location.reload();window.close();</script>";
}
if($_REQUEST['confirm'] == 2 && $_REQUEST['mode'] != '')
{
	$mode = $_REQUEST['mode'];
	$sql="update schedule set status=1 where generation='$mode' ";
	mysql_query($sql);
	echo "<script>self.opener.location.reload();window.close();</script>";
}
?>
</body>
</html><? /*

	$a=0;
	list($day,$numD,$mon,$year)=explode("/",$dat[$y]); 
	if($day=="Sat"&&$top[$y]){
		if($a==$S){	}
		
		
		$a++;
		}//if saturday
	}// for
*/
/*
		*/?>