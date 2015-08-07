<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style_css.css" />
<script language="javascript" type="text/javascript" src="date_picker.js"></script>
<link rel="stylesheet" type="text/css" href="style_date_picker.css" />
<style type="text/css">
table
{
border-collapse:collapse;
}
table, td
{
border:1px solid black;
font-size:15px;
}
</style>
</head>
<body style="font-family:Arial, Helvetica, sans-serif; font-size:12px">
<?
include("config/connect.php");
include("config/function_db.php");
$id_date = $_REQUEST['id_date'];
$id_topic = $_REQUEST['id_topic'];
$mode = $_REQUEST['genaration'];
$sum = $_REQUEST['sum'];
//$rdo[]={"rdo1",""}
$type1="TM";
$type2="TC";
$type3="TS";
$j=0;
$sqlS= "select * from schedule where generation='$mode' AND status='1'";
$queryS = mysql_query($sqlS);
while($rowS = mysql_fetch_array($queryS)){
		$place[$j]=$rowS['id_place'];
		$j++;
		if($j==$sum){break;}
		}
	$a=0;	
$sqlC="select * from schedule where generation='$mode' AND status='1'";		
$queryC = mysql_query($sqlC);
while($rowC = mysql_fetch_array($queryC)){
	$id_dateT=$rowC['date_teach'];
	$id_topicT=$rowC['topic_id'];
	if($id_dateT==$id_date&&$id_topicT==$id_topic){
	$id_t[$a]=$rowC['id_teacher']; 
	$a++;
	}
	if($a==$sum){break;}
	}
//for($x=0;$x<$sum;$x++){
//	echo $id_t[$x]."  ";
//	}

list($dat,$day,$mo,$ye)=explode("/",$id_date);
$id_dateS=$day."/".$mo."/".$ye;

if(($id_topic>=1&&$id_topic<=9)||($id_topic>=11&&$id_topic<=29)||($id_topic>=86&&$id_topic<=94)||$id_topic>94){
$t_da=0;
$sqlT ="select * from teacher where T_Type='$type1'";
$queryT = mysql_query($sqlT) or die("Error");
$i=0;
while($rowT =mysql_fetch_array($queryT)){$h=0;$ch=0;
	$t_id=$rowT['ID'];
		for($x=0;$x<count($id_t);$x++){
			if($id_t[$x]==$t_id){$ch++;break;}
			}
if($ch==0){			
		$sqlT1 ="select * from teacher where ID='$t_id'";
		$queT1 =mysql_query($sqlT1) or die("Error1");	
		while($rwT1 = mysql_fetch_array($queT1)) {
				list($tda1,$tda2)=explode("-",$rwT1['T_Day']);	
				if($tda1==1&&$tda2==0){$t_da="Sat";}else if($tda1==0&&$tda2==1){$t_da="Sun";}
				else if($tda1==1&&$tda2==1){$t_da=1;}
		}//while
								
		$sqlT1="select Topic_id from aptitude where T_id='$t_id' AND Topic_id='$id_topic'";
		$queT1=mysql_query($sqlT1) or die("Error2");
		for($z=0;$z<$sum;$z++){
		$sqlP1="select P_id from easy_place where T_id='$t_id' AND P_id='$place[$z]'"; //
		$queP1=mysql_query($sqlP1) or die("Error3");
		while($rwP1 = mysql_fetch_array($queP1)) {
			$h++;
			if($h==$sum){break;}
			}
		}
		if($t_da==1){
					if($h==$sum&&mysql_num_rows($queT1)!=0){ 
					$teacherM[$i]=$t_id;
					$i++;
					}
		}else if($t_da!=1){
					if($dat==$t_da&&$h==$sum&&mysql_num_rows($queT1)!=0){
					$teacherM[$i]=$t_id;
					$i++;
					}// if
		}//else if
	//$i++;
}
	}// hard teacher
	
	$t_da1=0;//$i1=0;
$sqlT1 ="select * from teacher where T_Type='$type2'";
$queryT1 = mysql_query($sqlT1) or die("Error");
$i1=0;
while($rowT1 =mysql_fetch_array($queryT1)){$h1=0;$ch=0;
	$t_id1=$rowT1['ID'];
	for($x=0;$x<count($id_t);$x++){
			if($id_t[$x]==$t_id1){$ch++;break;}
			}
if($ch==0){	
		$sqlT2 ="select * from teacher where ID='$t_id1'";
		$queT2 =mysql_query($sqlT2) or die("Error1");	
		while($rwT2 = mysql_fetch_array($queT2)) {
				list($tda1,$tda2)=explode("-",$rwT2['T_Day']);	
				if($tda1==1&&$tda2==0){$t_da1="Sat";}else if($tda1==0&&$tda2==1){$t_da1="Sun";}
				else if($tda1==1&&$tda2==1){$t_da1=1;}
		}//while
								
		$sqlT2="select Topic_id from aptitude where T_id='$t_id1' AND Topic_id='$id_topic'";
		$queT2=mysql_query($sqlT2) or die("Error2");
		for($z=0;$z<$sum;$z++){
		$sqlP2="select P_id from easy_place where T_id='$t_id1' AND P_id='$place[$z]'"; //
		$queP2=mysql_query($sqlP2) or die("Error3");
		while($rwP2 = mysql_fetch_array($queP2)) {
			$h1++;
			if($h1==$sum){break;}
			}
		}
		if($t_da1==1){
					if($h1==$sum&&mysql_num_rows($queT2)!=0){ 
					$teacherC[$i1]=$t_id1;
					$i1++;
					}
		}else if($t_da1!=1){
					if($dat==$t_da1&&$h1==$sum&&mysql_num_rows($queT2)!=0){
					$teacherC[$i1]=$t_id1;
					$i1++;
					}// if
		}//else if
}
	//$i++;
}// medium teacher
$t_da2=0;//$i2=0;
$sqlT2 ="select * from teacher where T_Type='$type3'";
$queryT2= mysql_query($sqlT2) or die("Error");
$i2=0;
while($rowT2 =mysql_fetch_array($queryT2)){$h2=0;$ch=0;
	$t_id2=$rowT2['ID'];
	for($x=0;$x<count($id_t);$x++){
			if($id_t[$x]==$t_id2){$ch++;break;}
			}
if($ch==0){	
		$sqlT3 ="select * from teacher where ID='$t_id2'";
		$queT3 =mysql_query($sqlT3) or die("Error1");	
		while($rwT3 = mysql_fetch_array($queT3)) {
				list($tda1,$tda2)=explode("-",$rwT3['T_Day']);	
				if($tda1==1&&$tda2==0){$t_da2="Sat";}else if($tda1==0&&$tda2==1){$t_da2="Sun";}
				else if($tda1==1&&$tda2==1){$t_da2=1;}
		}//while
								
		$sqlT3="select Topic_id from aptitude where T_id='$t_id2' AND Topic_id='$id_topic'";
		$queT3=mysql_query($sqlT3) or die("Error2");
		for($z=0;$z<$sum;$z++){
		$sqlP3="select P_id from easy_place where T_id='$t_id2' AND P_id='$place[$z]'"; //
		$queP3=mysql_query($sqlP3) or die("Error3");
		while($rwP3 = mysql_fetch_array($queP3)) {
			$h2++;
			if($h2==$sum){break;}
			}
		}
		if($t_da2==1){
					if($h2==$sum&&mysql_num_rows($queT3)!=0){ 
					$teacherA[$i2]=$t_id2;
					$i2++;
					}
		}else if($t_da2!=1){
					if($dat==$t_da2&&$h2==$sum&&mysql_num_rows($queT3)!=0){
					$teacherA[$i2]=$t_id2;
					$i2++;
					}// if
		}//else if
	//$i++;
}
	}// new teacher		
}else if (($id_topic>=30&&$id_topic<=66)||$id_topic==10){
$t_da=0;
$sqlT ="select * from teacher where T_Type='$type1'";
$queryT = mysql_query($sqlT) or die("Error");
$i=0;
while($rowT =mysql_fetch_array($queryT)){$h=0;$ch=0;
	$t_id=$rowT['ID'];
	for($x=0;$x<count($id_t);$x++){
			if($id_t[$x]==$t_id){$ch++;break;}
			}
if($ch==0){	
		$sqlT1 ="select * from teacher where ID='$t_id'";
		$queT1 =mysql_query($sqlT1) or die("Error1");	
		while($rwT1 = mysql_fetch_array($queT1)) {
				list($tda1,$tda2)=explode("-",$rwT1['T_Day']);	
				if($tda1==1&&$tda2==0){$t_da="Sat";}else if($tda1==0&&$tda2==1){$t_da="Sun";}
				else if($tda1==1&&$tda2==1){$t_da=1;}
		}//while
								
		$sqlT1="select Topic_id from aptitude where T_id='$t_id' AND Topic_id='$id_topic'";
		$queT1=mysql_query($sqlT1) or die("Error2");
		for($z=0;$z<$sum;$z++){
		$sqlP1="select P_id from easy_place where T_id='$t_id' AND P_id='$place[$z]'"; //
		$queP1=mysql_query($sqlP1) or die("Error3");
		while($rwP1 = mysql_fetch_array($queP1)) {
			$h++;
			if($h==$sum){break;}
			}
		}
		if($t_da==1){
					if($h==$sum&&mysql_num_rows($queT1)!=0){ 
					$teacherM[$i]=$t_id;
					$i++;
					}
		}else if($t_da!=1){
					if($dat==$t_da&&$h==$sum&&mysql_num_rows($queT1)!=0){
					$teacherM[$i]=$t_id;
					$i++;
					}// if
		}//else if
	//$i++;
}
	}// hard teacher	
	$t_da1=0;//$i1=0;
$sqlT1 ="select * from teacher where T_Type='$type2'";
$queryT1 = mysql_query($sqlT1) or die("Error");
$i1=0;
while($rowT1 =mysql_fetch_array($queryT1)){$h1=0;$ch=0;
	$t_id1=$rowT1['ID'];
	for($x=0;$x<count($id_t);$x++){
			if($id_t[$x]==$t_id1){$ch++;break;}
			}
if($ch==0){	
		$sqlT2 ="select * from teacher where ID='$t_id1'";
		$queT2 =mysql_query($sqlT2) or die("Error1");	
		while($rwT2 = mysql_fetch_array($queT2)) {
				list($tda1,$tda2)=explode("-",$rwT2['T_Day']);	
				if($tda1==1&&$tda2==0){$t_da1="Sat";}else if($tda1==0&&$tda2==1){$t_da1="Sun";}
				else if($tda1==1&&$tda2==1){$t_da1=1;}
		}//while
								
		$sqlT2="select Topic_id from aptitude where T_id='$t_id1' AND Topic_id='$id_topic'";
		$queT2=mysql_query($sqlT2) or die("Error2");
		for($z=0;$z<$sum;$z++){
		$sqlP2="select P_id from easy_place where T_id='$t_id1' AND P_id='$place[$z]'"; //
		$queP2=mysql_query($sqlP2) or die("Error3");
		while($rwP2 = mysql_fetch_array($queP2)) {
			$h1++;
			if($h1==$sum){break;}
			}
		}
		if($t_da1==1){
					if($h1==$sum&&mysql_num_rows($queT2)!=0){ 
					$teacherC[$i1]=$t_id1;
					$i1++;
					}
		}else if($t_da1!=1){
					if($dat==$t_da1&&$h1==$sum&&mysql_num_rows($queT2)!=0){
					$teacherC[$i1]=$t_id1;
					$i1++;
					}// if
		}//else if
}
	//$i++;
	}// medium teacher
}else if ($id_topic>=67&&$id_topic<=85){
$t_da=0;
$sqlT ="select * from teacher where T_Type='$type1'";
$queryT = mysql_query($sqlT) or die("Error");
$i=0;
while($rowT =mysql_fetch_array($queryT)){$h=0;$ch=0;
	$t_id=$rowT['ID'];
	for($x=0;$x<count($id_t);$x++){
			if($id_t[$x]==$t_id){$ch++;break;}
			}
if($ch==0){	
		$sqlT1 ="select * from teacher where ID='$t_id'";
		$queT1 =mysql_query($sqlT1) or die("Error1");	
		while($rwT1 = mysql_fetch_array($queT1)) {
				list($tda1,$tda2)=explode("-",$rwT1['T_Day']);	
				if($tda1==1&&$tda2==0){$t_da="Sat";}else if($tda1==0&&$tda2==1){$t_da="Sun";}
				else if($tda1==1&&$tda2==1){$t_da=1;}
		}//while
								
		$sqlT1="select Topic_id from aptitude where T_id='$t_id' AND Topic_id='$id_topic'";
		$queT1=mysql_query($sqlT1) or die("Error2");
		for($z=0;$z<$sum;$z++){
		$sqlP1="select P_id from easy_place where T_id='$t_id' AND P_id='$place[$z]'"; //
		$queP1=mysql_query($sqlP1) or die("Error3");
		while($rwP1 = mysql_fetch_array($queP1)) {
			$h++;
			if($h==$sum){break;}
			}
		}
		if($t_da==1){
					if($h==$sum&&mysql_num_rows($queT1)!=0){ 
					$teacherM[$i]=$t_id;
					$i++;
					}
		}else if($t_da!=1){
					if($dat==$t_da&&$h==$sum&&mysql_num_rows($queT1)!=0){
					$teacherM[$i]=$t_id;
					$i++;
					}// if
		}//else if
	//$i++;

	}// hard teacher
	}
}
		$sqlTop ="select * from topic where Topic_id='$id_topic'";
		$queTop =mysql_query($sqlTop) or die("Error1");	
		while($rwTop = mysql_fetch_array($queTop)) {
			$Book_id=$rwTop['Book_id'];
			$Topic_Topicid=$rwTop['Topic_Topicid'];
			$Topic_Lessonid=$rwTop['Topic_Lessonid'];
			$Topic_Name=$rwTop['Topic_Name'];
			break;
			}
	

?>
<fieldset>
<form method="post">
  <table width="462" border="1" align="center" cellpadding="2" cellspacing="2">
  <tr>
<td width="129">วัน/เดือน/ปี ที่สอน</td>
<input type="hidden" name="id_sch" id="id_sch" value="<?=$id_date ?>"/>
<td width="313" ><input type="text" name="Date" id="Date" size="50" class="text" value="<?=$id_dateS; ?>"/> <a href="javascript:displayDatePicker('Date')">
<img border="0" src="images/formcal.gif" width="16" height="16"></a></td>
</tr>
<tr>
<td>วิชา</td>
<td ><input type="text" name="Date_begin" id="Date_begin" size="50" class="text" value="<?=$Book_id.".".$Topic_Topicid.".".$Topic_Lessonid." ".$Topic_Name; ?>"/></td>
</tr>
<tr>
  <td colspan="2" align="center" valign="top"><table width="474" border="1">
      <tr>
        <td <? echo "colspan=$sum" ?> align="center"><strong>สถานที่</strong></td>
        </tr>
      <tr>
        <? $d=474/$sum; for($l=0;$l<$sum;$l++){ ?>
        <td align="center" <? echo "width=$d"?> ><?  //$pl=
	  $sqlPl ="select * from place where id='$place[$l]'";
		$quePl=mysql_query($sqlPl) or die("Error1");	
		while($rwPl = mysql_fetch_array($quePl)) {echo $rwPl['location_name'];} ?></td>
        <? }?>
        </tr>
      <tr>
<?  
	   
	    for($l=0;$l<$sum;$l++){ ?>
        <td>&nbsp;<? // for($t=0;$t<$sum;$t++){ 
		if(($id_topic>=1&&$id_topic<=9)||($id_topic>=11&&$id_topic<=29)||($id_topic>=86&&$id_topic<=94)||$id_topic>94){
			shuffle($teacherM);
			shuffle($teacherC);
			shuffle($teacherA);
			 $sqlTe ="select * from teacher where ID='$id_t[$l]'";
		$queTe=mysql_query($sqlTe) or die("Error1");	
		while($rwTe = mysql_fetch_array($queTe)){
			$type_t=$rwTe['T_Type'];break;
			}
		if($type_t=="TM"){
			$teacherM[0]=$id_t[$l];
						echo "อาจารย์เชี่ยวชาญ"."<br/>";?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherM[0]\" checked ";?> ><? $sqlTS ="select * from teacher where ID='$teacherM[0]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>";break;}?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherM[1]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherM[1]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>";break;}?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherM[2]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherM[2]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>"."<br/>";break;}?>
						
				
						<? echo "อาจารย์ปานกลาง"."<br/>"; ?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherC[0]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherC[0]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>";break;}?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherC[1]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherC[1]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>";break;}?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherC[2]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherC[2]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>"."<br/>";break;}?>
						
						<? echo "อาจารย์มาใหม่"."<br/>"; ?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherA[0]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherA[0]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>";break;}?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherA[1]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherA[1]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>";break;}?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherA[2]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherA[2]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>"."<br/>";break;}?>
		<?
		}else if($type_t=="TC"){
			$teacherC[0]=$id_t[$l];
						echo "อาจารย์เชี่ยวชาญ"."<br/>";?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherM[0]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherM[0]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>";break;}?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherM[1]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherM[1]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>";break;}?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherM[2]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherM[2]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>"."<br/>";break;}?>
						
				
						<? echo "อาจารย์ปานกลาง"."<br/>"; ?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherC[0]\" checked ";?> ><? $sqlTS ="select * from teacher where ID='$teacherC[0]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>";break;}?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherC[1]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherC[1]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>";break;}?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherC[2]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherC[2]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>"."<br/>";break;}?>
						
						<? echo "อาจารย์มาใหม่"."<br/>"; ?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherA[0]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherA[0]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>";break;}?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherA[1]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherA[1]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>";break;}?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherA[2]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherA[2]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>"."<br/>";break;}?>
		<?
		
		
		}else if ($type_t=="TS"){
		 $sqlTe ="select * from teacher where ID='$id_t[$l]'";
		$queTe=mysql_query($sqlTe) or die("Error1");	
		while($rwTe = mysql_fetch_array($queTe)){
			$type_t=$rwTe['T_Type'];break;
			}				
						$teacherA[0]=$id_t[$l];
						echo "อาจารย์เชี่ยวชาญ"."<br/>";?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherM[0]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherM[0]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>";break;}?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherM[1]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherM[1]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>";break;}?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherM[2]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherM[2]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>"."<br/>";break;}?>
						
				
						<? echo "อาจารย์ปานกลาง"."<br/>"; ?>
						<input <? echo "name=\"rdo_{$l}]\" type=\"radio\" value=\"$teacherC[0]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherC[0]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>";break;}?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherC[1]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherC[1]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>";break;}?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherC[2]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherC[2]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>"."<br/>";break;}?>
						
						<? echo "อาจารย์มาใหม่"."<br/>"; ?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherA[0]\"  checked";?>  ><? $sqlTS ="select * from teacher where ID='$teacherA[0]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>";break;}?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherA[1]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherA[1]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>";break;}?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherA[2]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherA[2]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>"."<br/>";break;}?>
		<?
		}
		
		
		
			
		}else if (($id_topic>=30&&$id_topic<=66)||$id_topic==10){
			shuffle($teacherM);
			shuffle($teacherC);
			 $sqlTe ="select * from teacher where ID='$id_t[$l]'";
		$queTe=mysql_query($sqlTe) or die("Error1");	
		while($rwTe = mysql_fetch_array($queTe)){
			$type_t=$rwTe['T_Type'];break;
			}	
			if($type_t=="TM"){
						$teacherM[0]=$id_t[$l];
						echo "อาจารย์เชี่ยวชาญ"."<br/>";?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherM[0]\"  checked ";?>><? $sqlTS ="select * from teacher where ID='$teacherM[0]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>";break;}?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherM[1]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherM[1]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>";break;}?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherM[2]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherM[2]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>"."<br/>";break;}?>
						
				
						<? echo "อาจารย์ปานกลาง"."<br/>"; ?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherC[0]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherC[0]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>";break;}?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherC[1]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherC[1]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>";break;}?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherC[2]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherC[2]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>"."<br/>";break;}?>
						
	<?				
		}else if($type_t=="TC"){
					$teacherC[0]=$id_t[$l];
						echo "อาจารย์เชี่ยวชาญ"."<br/>";?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherM[0]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherM[0]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>";break;}?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherM[1]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherM[1]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>";break;}?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherM[2]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherM[2]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>"."<br/>";break;}?>
						
				
						<? echo "อาจารย์ปานกลาง"."<br/>"; ?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherC[0]\" checked ";?> ><? $sqlTS ="select * from teacher where ID='$teacherC[0]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>";break;}?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherC[1]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherC[1]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>";break;}?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherC[2]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherC[2]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>"."<br/>";break;}?>
						
						
		<?
		}
			
			
		}else if ($id_topic>=67&&$id_topic<=85){
			shuffle($teacherM);
				 $sqlTe ="select * from teacher where ID='$id_t[$l]'";
		$queTe=mysql_query($sqlTe) or die("Error1");	
		while($rwTe = mysql_fetch_array($queTe)){
			$type_t=$rwTe['T_Type'];break;
			}	
			if($type_t=="TM"){
				$teacherM[0]=$id_t[$l];
						 echo "อาจารย์เชี่ยวชาญ"."<br/>"; ?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherM[0]\" checked ";?>  ><? $sqlTS ="select * from teacher where ID='$teacherM[0]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>";break;}?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherM[1]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherM[1]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>";break;}?>
						<input <? echo "name=\"rdo_{$l}\" type=\"radio\" value=\"$teacherM[2]\"  ";?> ><? $sqlTS ="select * from teacher where ID='$teacherM[2]'";
		$queTS=mysql_query($sqlTS) or die("Error1");while($rwTS = mysql_fetch_array($queTS)){echo $rwTS['T_name']."<br/>"."<br/>";break;}?>
		<?
						
						
						
					
		}
		}// end if
		
		
		 //}?>
         </td>
     
         <? }?>
        </tr>
    
    </table></td>
</tr>
<tr>
  <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="บันทึก"/></td>
</tr>
</table>
</form>
</fieldset>
<? if($_REQUEST['btnsubmit'] != '')
{
for($x=0;$x<$sum;$x++){
$ra[$x]=$_REQUEST['rdo_'.$x];
}
//echo $id_date." ".$id_topic;

for($x=0;$x<$sum;$x++){
//	echo $place[$x]." ";
 // $ra[$x];
$sql =" update schedule set date_teach='$id_date',topic_id='$id_topic',id_teacher='$ra[$x]',id_place='$place[$x]',generation='$mode',status='1',sum_place='$sum' where (generation='$mode' AND status='1') AND (topic_id='$id_topic' AND id_teacher='$id_t[$x]') ";
$result = mysql_query($sql);
}
 echo "<script>alert('แก้ไขข้อมุลเสร็จเรียบร้อย');self.opener.location.reload();window.close();</script>";
}/*
$Date = $_REQUEST['Date'];
$id_teacher_m = $_REQUEST['id_teacher_m'];
$id_teacher_c = $_REQUEST['id_teacher_c'];
$id_teacher_s = $_REQUEST['id_teacher_s'];


 

}*/
?>
</body>
</html>
