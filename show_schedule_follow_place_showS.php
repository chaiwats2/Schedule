<? session_start(); ?>
<html>
<head>
<title>ตารางสอน</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style_css.css" />
</head>
<body>
<?
$s_teacher_id=$_REQUEST['id'];
//echo "11111111111111111".$s_teacher_id;

include("config/connect.php");
include("config/function_db.php");
include("config/function_gen.php");
$sqlS="select * from teacher where ID='$s_teacher_id'";
$queryS = mysql_query($sqlS);
$rowSA = mysql_fetch_array($queryS);

$sql= "select date_teach,id_place,generation,location_name,status,id_teacher from schedule,place where place.id = schedule.id_place and schedule.status=0 and schedule.id_teacher='$s_teacher_id' group by generation ";
$query = mysql_query($sql);
$j=0;
while($row = mysql_fetch_array($query))
{//echo "1";
	if($row['status']==1||$row['status']==0){
		$date_teach[$j] = $row['date_teach'];
 $generation[$j] = $row['generation'];
//echo $sum_place[$j] = $row['sum_place'];
 $location_name[$j] = $row['location_name'];
 $j++;}
}
//echo $j;
?>
<div class="valid_box">
  <b>แสดงตารางสอนสถาบันพลังจิตตานุภาพในภาคใต้  </b>
</div> 
<div><hr/></div>
<div>
<table width="566">
<tr>
<td width="122" align="right"><b>ชื่ออาจารย์ : </b> </td>
<td width="113"><input type="text" name="name" disabled size="20" class="text" value="<? echo " ".$rowSA['prefix_name'].$rowSA['T_name']; ?>"/></td>
	<td width="32"></td>
    <td width="122" align="right"><b>นามสกุลอาจารย์ : </b></td>
    <td width="153"><input type="text" disabled name="name2" size="20" class="text" value="<? echo " ".$rowSA['T_surname']; ?>" /></td>
</tr>
<tr>
	<td align="right"><b>วัน เดือน ปี เกิด :</b></td>
    <td><input type="text" name="name" disabled size="20" class="text" value="<? 
	list($da,$tm,$ty)=explode("-",$rowSA['T_Birth']); 
	echo " ".$da;
	//for($i=1;$i<=9;$i++){
		if($tm=="01"){$tm=1;}
		else if($tm=="02"){$tm=2;}
		else if($tm=="03"){$tm=3;}
		else if($tm=="04"){$tm=4;}
		else if($tm=="05"){$tm=5;}
		else if($tm=="06"){$tm=6;}
		else if($tm=="07"){$tm=7;}
		else if($tm=="08"){$tm=8;}
		else if($tm=="09"){$tm=9;}
		
	//	}
	echo " ".$Mount[$tm];
	echo " "."พ.ศ. ".$ty;?>"/></td>
	<td width="32"> </td>
    <td width="122" align="right"><b>เบอโทรศัพท์ :</b></td>
    <td width="153"> <input type="text" name="name2" disabled size="20" class="text" value="<? echo " ".$rowSA['T_Phone']; ?>"/></td>
</tr>
<tr>
<td width="122" align="right"><b>ประเภทอาจารย์ : </b></td>
    <td width="113"><input type="text" name="name2" disabled size="20" class="text" value="<? 
	if($rowSA['T_Type']=="TM"){echo " "." อาจารย์เชี่ยวชาญ";}
	else if($rowSA['T_Type']=="TC"){echo " "." อาจารย์ปานกลาง";}
	else if($rowSA['T_Type']=="TS"){echo " "." อาจารย์มาใหม่";}
	
	?>"/></td>
<td width="32"></td>
	<td align="right"><b>E-mail :</b> </td>
    <td><input type="text" name="name" size="30" disabled class="text" value="<? echo " ".$rowSA['T_Email']; ?>"/></td>
	
    </tr>
</table>
</div>
<div><hr/></div>
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
<a href="show_schedule4_1.php?mode=<?=$generation[$k]; ?> &s_teacher_id=<? echo $s_teacher_id; ?>" target="_blank">ตารางสอนหลักสูตรครูสมาธิ  รุ่นที่  <?=$generation[$k]; ?> จำนวน  
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
