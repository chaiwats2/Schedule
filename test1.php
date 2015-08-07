<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body><? 
$test="admin";
 echo strlen($test);
?>
<table width="418" border="1">
  <tr>
    <td width="69" rowspan="2" align="center">วัน/เดือน/ปี</td>
    <td width="56" rowspan="2" align="center">หัวข้อ</td>
    <td colspan="3" align="center">สถานที่</td>
    <td width="49" rowspan="2" align="center">จัดการ</td>
  </tr>
  <tr>
    <td width="51" align="center">&nbsp;</td>
    <td width="72" align="center">&nbsp;</td>
    <td width="81" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td rowspan="3">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<? /*
echo count($_REQUEST['place']);
$t=$_REQUEST['place'];
for($i=0;$i<count($_REQUEST['place']);$i++){
	echo $t[$i]."<br/>";
	}

$a=0;
do {
	
	if($a==20){$KK=1;}
	echo $a."<br/>";
	$a++;
	
	}while($KK==0);
*/
include("config/connect.php");
$admin="admin";
$x=0;
$sql="SELECT * FROM s_admin WHERE Username='$admin'  "; 
$query=mysql_query($sql);
		
					if(mysql_num_rows($query)==0){echo "no";}
					if(mysql_num_rows($query)==1){echo "have";}
					
/*
						do{	
							$KK++;
							$x2=0;$x3=0;
							$tda1=0;
							$tda2=0;
							$sqlA ="select * from teacher where ID='$teacherS[$d]'";
							$queA =mysql_query($sqlA) or die("Error");	
							while($rwA = mysql_fetch_array($queA)) {
							//if($rwA['ID']==$idT){
										list($tda1,$tda2)=explode("-",$rwA['T_Day']);	
										if($tda1==1&&$tda2==0){$t_da="Sat";}else if($tda1==0&&$tda2==1){$t_da="Sun";}
										else if($tda1==1&&$tda2==1){$t_da=1;}
										//}	
							}//while
							
							$sqlP ="select * from easy_place where T_id='$teacherS[$d]'";
							$queP =mysql_query($sqlP) or die("Error");
							while($rwP = mysql_fetch_array($queP)) {
										//if($rwP['T_id']==$idT){
										if($placeS[$y]==$rwP['P_id']){
										$x2++;
										}
									//}			
								}//echo "<br/>";
							
							$sqlT ="select * from aptitude where T_id='$teacherS[$d]'";
							$queT =mysql_query($sqlT) or die("Error");
							//$queT = select("$table_aptitude");
							while($rwT = mysql_fetch_array($queT)) {
										//if($rwT['T_id']==$idT){
											if($topicS[$x]==$rwT['Topic_id']){
														$x3++;
															}
													// }			
									}
									//$KK=1;
									//echo $t_da;
									if($t_da==1){
										if($x2>0&&$x3>0){ 
										$final=$teacherS[$d];
										$KK=0;
										echo "1";
										//	echo $n.$m;
										for($n1=$x-1;$n1<$x+1;$n1++){//echo "11111";
												for($m1=0;$m1<$y;$m1++){
													//echo $m1;
													if($final==$s_con[$n1][$m1]){
														 $KK=0;//echo "0";
													//echo	$s_con[$n1][$m1]." - ".$final."<br/>";
														}//if
													}//for 2
													//echo "<br/>";
												}//for 1
										}//if $x2 && $x3
										$t_da=0;
										//echo $t_da."<br/>";
									}else if($t_da!=1){
										if($s_da==$t_da&&$x2>0&&$x3>0){}// if
										$final=$teacherS[$d];
										$KK=0;
											//echo $t_da."<br/>";
									}//else if
						
							$d++;
						}while($KK>0);//echo "<br/>";
						*/


////////////////////////////////////////////////////////////////////////////
/*
function check_con($topicT,$placeT,$l_y,$dayA){
include("config/connect.php");
	
	$sql2= "select * from teacher ";

$c2=0;
$c21=0;
$c22=0;
$c23=0;

$query2 = mysql_query($sql2);
while($row2 = mysql_fetch_array($query2))
{
 $teacherS[$c2] = $row2['ID'];
 
 if($row2['T_Type']=='TM'){
	 						$t_m[$c21]=$row2['ID'];$c21=$c21+1;
} else if($row2['T_Type']=='TC'){
							$t_c[$c22]=$row2['ID'];$c22++;
} else if($row2['T_Type']=='TS'){
							$t_s[$c23]=$row2['ID'];$c23++; 
			}// lose if
 $c2++;
}// while
$A=0;
$toc=$topicT+1;
if(($toc>=1&&$toc<=9)||($toc>=11&&$toc<=29)||($toc>=86&&$toc<=94)||$toc>94){
	//echo $toc." ";
for($d=0;$d<$c2;$d++){	
$x3=0;$x2=0;
	$queA = select("$table_teacher");
	while($rwA = mysql_fetch_array($queA)) {
		if($rwA['ID']==$teacherS[$d]){
			list($tda1,$tda2)=explode("-",$rwA['T_Day']);	
			if($tda1==1){$t_da="Sat";}else if($tda2==1){$t_da="Sun";}
			//$s_place[$x1]=$rwP['P_id'];
			//	echo " ";
				}	
		}//while
		
	//echo 	$t_da." ";	
	$queP = select("$table_easy_place");
	while($rwP = mysql_fetch_array($queP)) {
				if($rwP['T_id']==$teacherS[$d]){
					if($placeT==$rwP['P_id']){
						$x2++;
						}
			//$s_place[$x1]=$rwP['P_id'];
			//	echo " ";
				}			
					
		}//echo "<br/>";
	//echo 	$x2." ";
	$queT = select("$table_aptitude");
	while($rwT = mysql_fetch_array($queT)) {
				if($rwT['T_id']==$teacherS[$d]){
					if($topicT==$rwT['Topic_id']){
							$x3++;
						}
			   //$s_topic[$x2]=$rwT['Topic_id'];
				//echo " ";
				
					}			
		}//echo "<br/>";
		//echo 	$x3." ";
		//echo "111 ";
	if($dayA==$t_da&&$x2>0&&$x3>0){return $teacherS[$d];
		//$check_conT=check_conF($teacherS[$d],$d,$l_y,$dayA);$x2=0;$x3=0;
	//if($check_conT==true){return $teacherS[$d];}
		}	
		//echo "<br/>";
}//for check techer
		
		
	}// if
else if (($toc>=30&&$toc<=66)||$toc==10){
	
	}// if
else if ($toc>=67&&$toc<=85){
	
	}// if
	

	
}	// function con
*/
/*

function check_conF($tea_S,$sum_x,$sum_y,$t_dat){
	$checkF=0;
	if($sum_x==0){$sum_xx=$sum_x;}
	else {$sum_xx=$sum_x-1;}
	for($n=$sum_xx;$n<=$sum_x+1;$n++){
		for($m=0;$m<=$sum_y;$m++){
			if($tea_S==$s_con[$n][$m]){
				$checkF++;
				}//if
			}//for 2
		}//for 1
		if($checkF>0){return false;
		}else {return true;}
	}// function
*/
///////////////////////////////////////////////////////////////////////////
/*


echo "อาจารย์ ".$c2."<br/>";
echo "อาจารย์เชี่ยชาญ ".count($t_m)."<br/>";
for($x=0;$x<count($t_m);$x++){
	echo $t_m[$x]." "."<br/>" ;
	}
echo "อาจารย์ปานกลาง ".count($t_c)."<br/>";
for($x=0;$x<count($t_c);$x++){
	echo $t_c[$x]." "."<br/>" ;
	}
echo "อาจารย์มาใหม่ ".count($t_s)."<br/>";
for($x=0;$x<count($t_s);$x++){
	echo $t_s[$x]." "."<br/>" ;
	}
*/
	
/* for($x=0;$x<$c2;$x++){
	
	//echo $teacherS[$x]." = ";
	$x1=0;
	$queP = select("$table_easy_place");
	while($rwP = mysql_fetch_array($queP)) {
				if($rwP['T_id']==$teacherS[$x]){
			$s_place[$x1]=$rwP['P_id'];
			//	echo " ";
					$x1++;
					}			
					
		}//echo "<br/>";
	
	
	$x2=0;
	$queT = select("$table_aptitude");
	while($rwT = mysql_fetch_array($queT)) {
				if($rwT['T_id']==$teacherS[$x]){
			   $s_topic[$x2]=$rwT['Topic_id'];
				//echo " ";
					$x2++;
					}			
					
		}//echo "<br/>";
	}*/
	
	
		//echo "Max".$max.count($teacher_id);
//else check
//echo $cccc="01"+"02";

//for($d=$td;$d<=31;$d++){
	//if ($count>1){echo "$count"."วันเสาร์";}
	
	
	
	//}





/////////////////////////////////////////////////////
/*
list($tday1,$tmonth1,$tyear1)=explode("/",$_POST['dat1']); 
//list($tday2,$tmonth2,$tyear2)=explode("/",$_POST['dat2']);  
echo $lt1=$tyear1."-".$tmonth1."-".$tday1;
$tyear2=$tyear1+1;
echo "<br/>".$lt2=$tyear2."-".$tmonth1."-".$tday1;
$strStartDate = "$lt1";
$strEndDate = "$lt2";
$intWorkDay = 0;
$intHoliday = 0;
$dt=0;
$intTotalDay = ((strtotime($strEndDate) - strtotime($strStartDate))/  ( 60 * 60 * 24 )) + 1;
 
while (strtotime($strStartDate) <= strtotime($strEndDate)&&$dt==0) {
$DayOfWeek = date("w", strtotime($strStartDate));
if($DayOfWeek == 0 or $DayOfWeek ==6)  // 0 = Sunday, 6 = Saturday;
{
$intHoliday++;
//echo "$strStartDate = <font color=red>Holiday</font><br>";


}
else
{
$intWorkDay++;
//echo "$strStartDate = <b>Work Day</b><br>";



}
//$DayOfWeek = date("l", strtotime($strStartDate)); // return Sunday, Monday,Tuesday....
$strStartDate = date ("Y-m-d", strtotime("+1 day", strtotime($strStartDate)));
}
echo "<hr>";
echo "<br>Total Day = $intTotalDay";
echo "<br>Work Day = $intWorkDay";
echo "<br>Holiday = $intHoliday";
*/

/*
 list($tday,$tmonth,$tyear)=explode("/",$_POST['dat']);   
echo $lt=$tday."-".$tmonth."-".$tyear;
 $time = strtotime("$tday-$tmonth-$tyear 00:00:00");
 $adate = getdate($time);   */

// var_dump($adate);
//for($j=1;$j<11;$j++){
//	echo "$adate[$j]"."<br/>";
	//}

 
 
 /*$dat="31/11/2008";

if(checkdate($tmonth,$tday,$tyear)=="Tue"){
print "มีวันันที่ ".$tday."ในปี ".$tyear."อยู่จริง";
 }else{
 print" ไม่มีวันที่".$tday."ในปี ".$tyear;
 }*/
?>
</body>
</html>