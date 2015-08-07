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
include("ck.php");
$mode = $_REQUEST['mode'];
 $id_place = $_REQUEST['id_place'];

if($_REQUEST['id_teacher']=='')
{
$sql ="select * from schedule,topic where (schedule.topic_id = topic.Topic_id) AND generation='$mode' AND schedule.status=0 ORDER BY  topic.Topic_id ASC ";
$query = mysql_query($sql) or die("Error");
}


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

$sqlM= "select sum_place from schedule where generation='$mode' AND status='0'";
$queryM = mysql_query($sqlM);while($rowM = mysql_fetch_array($queryM))
{$S=$rowM['sum_place']; break;} 

$j=0;
$sqlP= "select * from topic";
$queryP = mysql_query($sqlP);
while($rowP = mysql_fetch_array($queryP)){
	$topic[$j]=$rowP['Topic_id']; 
	  $j++;
	} 
$sql6= "select sum_place from schedule where generation='$mode' AND status='0'";
$query6 = mysql_query($sql6);while($row6 = mysql_fetch_array($query6))
{$S=$row6['sum_place']; break;}
$a=0;
$sqlQ="select * from schedule where generation='$mode' AND status='0' AND (id_place='0' AND topic_id='0') ";
	$qureyQ=mysql_query($sqlQ);
	while($rowQ=mysql_fetch_array($qureyQ)){
		$dateQ[$a]=$rowQ['date_teach'];
		//list($dayQ,$numQ,$monQ,$yearQ)=explode("/",$rowQ['date_teach']); 
	$a++;	
		}

$sqlPP= "select location_name from place where id='$id_place'";
$queryPP = mysql_query($sqlPP);
$rwPP = mysql_fetch_array($queryPP);
?>
<table width="705" align="center" border="0" class="table2">
<tr>
<th  align="right"><a href="download_schedule2.php?mode=<?=$mode; ?>&id_place=<?=$id_place; ?>" target="_blank"><img src="images/download_wodrd.gif" width="20" height="20" title="ดาวน์โหลด"/></a></th>
</tr>
</table>
<br>
<table border="0" width="700" cellpadding="2" cellspacing="2" border="0" align="center" class="table">
<tr>
<td colspan="6" align="center" height="100" class="table4">สถาบันพลังจิตตานุภาพในภาคใต้<br>ตารางสอนหลักสูตรครูสมาธิ  รุ่นที่  <?=$rww['generation']; ?>   ณ <?=$rwPP['location_name']; ?></td>
</tr>
<tr align="center" align="center" height="40">
<td rowspan="2" width="90" class="table4">วัน เดือน ปี</td>
<td rowspan="2" width="300" class="table4">หัวข้อ</td>
<td class="table4">สถานที่</td>


</tr>
<tr>
<td align="center" class="table4"><?=$rwPP['location_name']; ?></td>

<tr><? $R=0;$q=0;$D=0;$E=0;
for($x=0;$x<count($topic);$x++){//echo $y;
	 echo "</tr>";//for($y<$S;$y++){
	$sqlS="select * from schedule where (generation='$mode' AND status='0') AND (id_place='$id_place' AND topic_id='$topic[$x]'OR (date_teach='$dateQ[$q]')  )";
	$qureyS=mysql_query($sqlS);
	while($rowS1=mysql_fetch_array($qureyS)){
		
		$dateS=$rowS1['date_teach'];
		list($day,$numD,$mon,$year)=explode("/",$rowS1['date_teach']); 
	    $date=$numD."/".$mon."/".$year;
		$id_t=$rowS1['id_teacher'];	
		$sum=$rowS1['sum_place'];
		break;
		//$y++;
		//if($y==$S){break;}
		}
	
	
	//list($dayQ,$numQ,$monQ,$yearQ)=explode("/",$dateQ[$q]); 
		
//		$dateQA=$numQ."/".$monQ."/".$yearQ;
//		echo check_dateQ($date,$dateQA);
	//if(check_dateQ($date,$dateQA)>0){
	//	$day=$dayQ;$q++;
	//	echo  $day.$dateQA;
	//	}
	if($day=="Sat"){	
	//if($R==0){$R=$R+1;
	$E=0;
		if($D==0){
						echo "<td rowspan=\"3\" align=\"center\">";
						
						echo "ส. ".$date; $D=$D+1;
						echo "</td>";
						
						}
		if($D==2){$D=0;}
	//}
	//else if($y==1){$$y+1;}
	// if($R==2){ $R=0;}
		$sqlTop="select * from topic where Topic_id='$topic[$x]'";
		$queryTop=mysql_query($sqlTop);
		$rwTop=mysql_fetch_array($queryTop);echo "<td>";
		echo $rwTop['Book_id'].".".$rwTop['Topic_Topicid'].".".$rwTop['Topic_Lessonid']." ".$rwTop['Topic_Name'];
			
		echo "</td>";
		$sqlTe="select * from teacher where ID='$id_t'";
		$queryTe=mysql_query($sqlTe);
		$rwTe=mysql_fetch_array($queryTe);
		echo "<td align=\"center\">";
		echo $rwTe['T_name'];
		echo "</td>";
		echo "</tr>";
	}else if($day=="Sun"){
	
		$D=0;
			if($E==0){
						echo "<td rowspan=\"2\" align=\"center\">";
						
						echo "อ. ".$date; $E=$E+1;
						echo "</td>";
						
						}	
			if($E==2){$E=0;}
		$sqlTop="select * from topic where Topic_id='$topic[$x]'";
		$queryTop=mysql_query($sqlTop);
		$rwTop=mysql_fetch_array($queryTop);echo "<td>";
		echo $rwTop['Book_id'].".".$rwTop['Topic_Topicid'].".".$rwTop['Topic_Lessonid']." ".$rwTop['Topic_Name'];
			
		echo "</td>";
		$sqlTe="select * from teacher where ID='$id_t'";
		$queryTe=mysql_query($sqlTe);
		$rwTe=mysql_fetch_array($queryTe);
		echo "<td align=\"center\">";
		echo $rwTe['T_name'];
		echo "</td>";
		echo "</tr>";
	
	}	else if($day=="Sunday"||$day=="Saturday"){
	
		echo "<td align=\"center\">";
						if($day=="Sunday"){echo "อ. ".$date;}
						else if ($day=="Saturday"){echo "ส. ".$date;}
						
						echo "</td>";
						echo "  <td colspan=3 align=\"center\" >";
						//$dateHo=$rowS['date_teach'];
						$sqlHo="select * from holiday where Date_begin='$date' or Date_end='$date'";
						$queryHo = mysql_query($sqlHo);
						while ($rowHo = mysql_fetch_array($queryHo)){
							echo $rowHo['Name_holiday'];
							break;
							}$q++;$x--;$D=0;$E=0;
						echo "</td>";
	}
	
	
	//}
	}
?>

</table>
</body>
</html>
