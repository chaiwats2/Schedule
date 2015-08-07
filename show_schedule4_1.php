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
$s_teacher_id=$_REQUEST['s_teacher_id'];
$mode = $_REQUEST['mode'];
$f=0;
$sqlA ="select distinct(id_place),id_place from schedule where generation='$mode' AND status=0 AND id_teacher='$s_teacher_id' ";
$queryA = mysql_query($sqlA) or die("Error");
while($rowA =mysql_fetch_array($queryA)){
	$id_p[$f]=$rowA['id_place'];
	$f++;
	}
//for($c=0;$c<count($id_p);$c++){
	//echo $id_p[$c]."<br/>";
//	}

$sql ="select * from schedule,topic where (schedule.topic_id = topic.Topic_id) AND generation='$mode' AND (schedule.status=0 OR schedule.status=1)ORDER BY  topic.Topic_id ASC ";
$query = mysql_query($sql) or die("Error");

$sql_nchk ="select * from schedule where generation='$mode' AND status=1";
$query_nchk = mysql_query($sql_nchk) or die("Error");
 $num_ncnfrm=mysql_num_rows($query_nchk);

$sql_chk ="select * from schedule where generation='$mode' AND status=0";
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
$sql3= "select sum_place from schedule where generation='$mode' AND (status='1' or status='0')";
$query3 = mysql_query($sql3);while($row3 = mysql_fetch_array($query3))
{$S=$row3['sum_place']; break;}
$P=3+$S;
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
$dT=580;
?>

<? if($num_ncnfrm == 0) { ?>
<table <? echo "width=$dT"; ?>  align="center" border="0" class="table2">
<tr>

<th  align="right"><a href="download_schedule4_1.php?mode=<?=$mode ?>&s_teacher_id=<? echo $s_teacher_id; ?>" target="_blank"><img src="images/download_wodrd.gif" width="20" height="20" title="ดาวน์โหลด"/></a></th>
</tr>
</table><br>
<table <? echo "width=$dT"; ?>  align="center" border="0" class="table2">
<tr>

<th  align="right"><? 
$sqlPT= "select * from teacher where ID='$s_teacher_id' ";
$queryPT = mysql_query($sqlPT);
$rwT= mysql_fetch_array($queryPT); 
echo $rwT['prefix_name'].$rwT['T_name']." ".$rwT['T_surname'];;
?></th>
</tr>
</table><br>
<? }?>
<table border="0" <? echo "width=$dT"; ?> cellpadding="2" cellspacing="2" border="0" align="center" class="table">
<tr>
<? //<td colspan="5" align="center" height="100">
echo "   <td colspan=$P align=\"center\" height=\"80\" class=\"table3\"> "; ?>
สถาบันพลังจิตตานุภาพภาคใต้<br>ตารางสอนหลักสูตรครูสมาธิ  รุ่นที่  <?=$rww['generation']; ?>   จำนวน  
<? $sql3= "select sum_place from schedule where generation='$mode'";
	$query3 = mysql_query($sql3);while($row3 = mysql_fetch_array($query3))
{echo " ".$row3['sum_place']." "; break;}?>สถานที่ </td>
</tr>
<? for($x=0;$x<count($id_p);$x++){ ?>
<tr>
<td colspan="2"><b> สถานที่ : <? 
	$sqlPA= "select * from place where id='$id_p[$x]'";
	$queryPA = mysql_query($sqlPA);
	$rwPA=mysql_fetch_array($queryPA);
	echo $rwPA['location_name'];
	?></b></td>
</tr>
<tr>
<td width="120" align="center"><b>วัน/เดือน/ปี</b></td>
<td align="center"><b>หัวข้อที่สอน</b></td>
</tr>
<? $sqlSS= "select * from schedule where generation='$mode' AND status=0 AND id_teacher='$s_teacher_id' AND id_place=$id_p[$x]";
	$querySS = mysql_query($sqlSS);while($rowSS = mysql_fetch_array($querySS))
{$topicID=$rowSS['topic_id'];
	
	?><tr>
        <td align="center">
        <?  
		list($day,$numD,$mon,$year)=explode("/",$rowSS['date_teach']); 
		$date=$numD."/".$mon."/".$year;
		if($day=="Sat"){
			echo "ส. ".$date;
			}
		else if($day=="Sun"){
			echo "อ. ".$date;
			}
		
		?>
        </td>
        
        <td>
     <?   
        $sqlTP= "select * from topic where Topic_id='$topicID'";	
						$queryTP = mysql_query($sqlTP);
						while($rowTP = mysql_fetch_array($queryTP)){
							
							echo $rowTP['Book_id'].".".$rowTP['Topic_Topicid'].".".$rowTP['Topic_Lessonid'].". ".$rowTP['Topic_Name'];
							}
        ?>
        </td>
        </tr>
 <? } ?>       

<? }// for x?>
 </table>


<br>

</body>
</html>