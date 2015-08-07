<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style_css.css" />
<script language="javascript" type="text/javascript" src="date_picker.js"></script>
<link rel="stylesheet" type="text/css" href="style_date_picker.css" />
<script type="text/javascript">
function check_input()
{
    if(isNaN(document.frm_manage_schedule.generation.value))
    {
		alert('ป้อนได้เฉพาะตัวเลข');
			document.frm_manage_schedule.generation.focus();
		return false;
	}
	if(document.frm_manage_schedule.generation.value == "")
	{
		alert('กรุณาป้อนรุ่น');
		document.frm_manage_schedule.generation.focus();
		return false;
	}
	  
	if(document.frm_manage_schedule.date.value == "")
	{
		alert('กรุณาเลือกวัน เดือน ปี ที่เริ่มสอน');
		document.frm_manage_schedule.date.focus();
		return false;
	}
	 
	if(document.frm_manage_schedule.day1.value != '' || document.frm_manage_schedule.day1.value != '')
	{
	 if(document.frm_manage_schedule.day1.value > document.frm_manage_schedule.day2.value)
	 {	
		alert('กรุณาตรวจสอบวันที่เลือก');
		document.frm_manage_schedule.day1.focus();
		return false;
	 }
	}
	  
	if(document.frm_manage_schedule.place.value == "")
	{
		alert('กรุณาเลือกสถานที่');
		document.frm_manage_schedule.place.focus();
		return false;
	}
	
}
</script>
</head>

<body>
<?
ini_set('max_execution_time', 300); //300 seconds = 5 minutes
include("config/connect.php");
include("config/function_db.php");
include("config/function_gen.php");


$query = select($table_place);
?>
<form method="post" name="frm_manage_schedule" onSubmit="return check_input();" >
  <dl>
     <dt><label>ตารางสอนของรุ่นที่ :</label></dt>
     <dd><input type="text" name="generation" id="generation" size="40"  class="text"/></dd>
  </dl>
     <dl>
     <dt><label>วัน/เดือน/ปี ที่เรียน :</label></dt>
     <dd><input type="text" name="dat1" id="dat1" size="20" class="text" /> 
     <a href="javascript:displayDatePicker('dat1')">
<img border="0" src="images/formcal.gif" width="16" height="16"></a></dd>
  </dl>
  <dl>
      <dt><label for="">วันที่เปิดสอน :</label></dt>
      <dd><table border="0" height="30">
          <tr><td width="94"><input type="checkbox" disabled checked/> 
          วันเสาร์</td><td width="39">กับ</td>
		  <td width="117"><input type="checkbox" disabled checked/> 
		  วันอาทิตย์</td>
		  </tr>
		  <tr>
		  <? //<td colspan="3"><font color="#FF0000">ถ้าสอนเพียงวันเดียวไม่ต้องป้อนข้อมูลวัน</font></td> ?>
		  </tr>
		  </table>
     </dd>
   </dl>  
  <dl><dt><label for="type_teahcer">เลือกสถานที่</label></dt>
                        <dd>
						<table border="0">
						<tr>
						<?
						$que = select("$table_place");
						while($rw = mysql_fetch_array($que)) { 
						?>
						<td><input type="checkbox" name="place[]" value="<?=$rw['id']; ?>" id="place[]"/></td>
						<td><?=$rw['location_name']; ?></td>
						</tr>
						<? } ?>
						</table>
                        </dd>
                    </dl>

 <dl class="submit">
      <input type="submit" name="btnsubmit" id="btnsubmit" value="จัดตารางสอน" class="NFButton"/>
 </dl>  
 </form>
  <?
include("ck.php");

if($_REQUEST['btnsubmit'] != '')
{
$c2=0;
$c21=0;
$c22=0;
$c23=0;
$sql2= "select * from teacher ";
$query2 = mysql_query($sql2);
while($row2 = mysql_fetch_array($query2)){
	$teacherS[$c2] = $row2['ID'];
	if($row2['T_Type']=='TM'||$row2['T_Type']=='TC'){$t_m[$c21]=$row2['ID'];$c21++;
	}
	 if($row2['T_Type']=='TM'){$t_s[$c23]=$row2['ID'];$c23++; 
	}// lose if
	$c2++;
}// while	
	
$sql1= "select * from place ";
$query1 = mysql_query($sql1);
$c1=0;
while($row1 = mysql_fetch_array($query1))
{
 $placeS[$c1] = $row1['id'];
 $c1++;
}
/////////////////////////////////////////////////////////////////////////////

//echo count($t_m)." ".count($t_s);
/*for($i=0;$i<count($t_m);$i++){
	echo $k=rand($t_m[$i],$t_m[count($t_m)])."<br/>";
	}
	for($i=0;$i<count($t_m);$i++){
	echo $t_m[$i]."<br/>";
	}
*/
$sql3= "select * from topic ";
$query3 = mysql_query($sql3);
$c3=0;
while($row3 = mysql_fetch_array($query3))
{
 $topicS[$c3] = $row3['Topic_id'];
 $c3++;
}

$placeS=$_POST['place'];
$c_place=count($placeS);	
$generation=$_POST['generation'];
for($i=0;$i<count($placeS);$i++){
	echo $placeS[$i];
	$que1 = select("$table_place");
						while($rw1 = mysql_fetch_array($que1)) {
							if($rw1['id']==$placeS[$i]){
								echo " ".$rw1['location_name']."<br/>";
								}
							 }
		
	}//for

/////////////////////// date /////////////////////////
//list($td,$tm,$ty)=explode("/",$_POST['dat1']); 
list($tday1,$tmonth1,$tyear1)=explode("/",$_POST['dat1']); 
$lt3=$tyear1."-".$tmonth1."-".$tday1;
$tyear2=$tyear1+1;
$lt4=$tyear2."-".$tmonth1."-".$tday1;
$strStartDate = "$lt3";
$strEndDate = "$lt4";
$intWorkDay = 0;
$intHoliday = 0;
$dt=0;
$v=0;
$z=0;

$intTotalDay = ((strtotime($strEndDate) - strtotime($strStartDate))/  ( 60 * 60 * 24 )) + 1;
 
while (strtotime($strStartDate) <= strtotime($strEndDate)&&$dt==0) {$SS="T";
$DayOfWeek = date("w", strtotime($strStartDate));
if($DayOfWeek == 0 or $DayOfWeek ==6)  // 0 = Sunday, 6 = Saturday;
{
$intHoliday++;
//echo "$strStartDate = <font color=red>Holiday</font><br>";
	if($SS=="T"){	list($tyear,$tmonth,$tday)=explode("-",$strStartDate); 
			if (check_day($tday,$tmonth,$tyear)=="Sat"){
				 if(check_holiday($tday,$tmonth,$tyear)=="T"){
					 $s_day[$v]="Saturday"."-"."day-li-ho";
					 $SS="T";
					 }// เช็ควันซ้ำ หรือ วันหยุด
				else {
							$s_day[$v]="Sat"."-".$strStartDate;				
							$z=$z+3;
					}
											}
			else if (check_day($tday,$tmonth,$tyear)=="Sun"){
				 if(check_holiday($tday,$tmonth,$tyear)=="T"){
					 $s_day[$v]="Sunday"."-"."day-li-ho";
					 $SS="T";
					 }// เช็ควันซ้ำ หรือ วันหยุด
				else {
				
							$s_day[$v]="Sun"."-".$strStartDate;		
							$z=$z+2;	
					}
										}
										$v++; // นับวันทั้งหมดที่สอน
	}// หาวัน เสา หรืออาทิตย์
	if($z>=$c4){$SS="F";}
	if($v>60){break;}
}
//$DayOfWeek = date("l", strtotime($strStartDate)); // return Sunday, Monday,Tuesday....
$strStartDate = date ("Y-m-d", strtotime("+1 day", strtotime($strStartDate)));
}

for($y=0;$y<count($s_day);$y++){
	//echo $y;
	list($da1,$tyL1,$tmL1,$tdL1)=explode("-", $s_day[$y]); 
	$s_day[$y]=$da1."/".$tdL1."/".$tmL1."/".$tyL1;
	//echo $s_day[$y]."<br/>";
	}//

$x=0;
$y=0;	
$z1=0;
$f=0;
$g=0;
$go=0;
$z2=0;
$status=1;
//echo $c3;

for($x=0;$x<$c3;$x++){$go=0;
 	list($dat1,$day,$mo,$ye)=explode("/",$s_day[$z1]);
	 if($dat1=="Sat"){
		 			$s_da=$dat1;$f++;
	 				}
	 else if ($dat1=="Sun"){
			 			 $s_da=$dat1;$g++;
	 				}	
	else if($dat1=="Sunday"||$dat1=="Saturday"){ $z1++;$go=1;
	}	
	else {$z1++;$x--;
	}		 
	if($go==0){	
			 $toc=$x+1;
			 //if($z1==0){$z2=$z1;}
			//else if($z1!=0){$z2=$z1-1;}
			 for($y=0;$y<$c_place;$y++){
////////////////////////////////////////////////////////////////////////////////////////////////
					
							if(($toc>=1&&$toc<=9)||($toc>=11&&$toc<=29)||($toc>=86&&$toc<=94)||$toc>94){
//////////////////////////////////////////////////////////////// if 1 ///////////////////////////////////////////////////////////////////////////////////////							
						
					$A1=0;
						for($T1=0;$T1<$c2;$T1++){
							$sqlD1="select * from patform where dateS='$s_day[$z1]' AND T_id='$teacherS[$T1]' ";
							$queD1=mysql_query($sqlD1) or die("Error");
							
							$tda1=0;
							$tda2=0;$t_da=0;
							if(mysql_num_rows($queD1)!=0){}//if queD
							else if(mysql_num_rows($queD1)==0){
							$sqlA1="select * from teacher where ID='$teacherS[$T1]'";
							$queA1=mysql_query($sqlA1) or die("Error");	
							while($rwA1 = mysql_fetch_array($queA1)) {
								list($tda1,$tda2)=explode("-",$rwA1['T_Day']);	
										if($tda1==1&&$tda2==0){$t_da="Sat";}else if($tda1==0&&$tda2==1){$t_da="Sun";}
										else if($tda1==1&&$tda2==1){$t_da=1;}
											
							}//while
							
								
							$sqlT1="select Topic_id from aptitude where T_id='$teacherS[$T1]' AND Topic_id='$topicS[$x]'";
							$queT1=mysql_query($sqlT1) or die("Error");
						    
							$sqlP1="select P_id from easy_place where T_id='$teacherS[$T1]' AND P_id='$placeS[$y]'";
							$queP1=mysql_query($sqlP1) or die("Error");
							
									if($t_da==1){
										if(mysql_num_rows($queP1)!=0&&mysql_num_rows($queT1)!=0){ 
										$final[$A1]=$teacherS[$T1];
										$A1++;
										//$final=$teacherS[$T];
									}
										
									}else if($t_da!=1){
										if($s_da==$t_da&&mysql_num_rows($queP1)!=0&&mysql_num_rows($queT1)!=0){
											$final[$A1]=$teacherS[$T1];
											//$final=$teacherS[$T];
										$A1++;
											}// if
									}//else if
							}//else queD
						}// for T
						
						$chek=mt_rand($final[0],$final[count($final)]);
						//$chek=$final;
						$sqlS1="insert into patform values ('','$s_day[$z1]','$chek')";
						$queryS1=mysql_query($sqlS1);
						$sqlSave1="insert into schedule values ('','$s_day[$z1]','$topicS[$x]','$chek','$placeS[$y]','$generation','$status','$c_place')";
						$querySave1=mysql_query($sqlSave1);
						}// if toc
							else if (($toc>=30&&$toc<=66)||$toc==10){
//////////////////////////////////////////////////////////////// if 2 ///////////////////////////////////////////////////////////////////////////////////////	
					$A2=0;
					for($T2=0;$T2<$c21;$T2++){
							$sqlD2="select * from patform where dateS='$s_day[$z1]' AND T_id='$t_m[$T2]' ";
							$queD2=mysql_query($sqlD2) or die("Error");
														
							$tda1=0;
							$tda2=0;
							$t_da=0;
							if(mysql_num_rows($queD2)!=0){}//if queD
							else if(mysql_num_rows($queD2)==0){
							$sqlA2="select * from teacher where ID='$t_m[$T2]'";
							$queA2=mysql_query($sqlA2) or die("Error");	
							while($rwA2 = mysql_fetch_array($queA2)) {
								list($tda1,$tda2)=explode("-",$rwA2['T_Day']);	
										if($tda1==1&&$tda2==0){$t_da="Sat";}else if($tda1==0&&$tda2==1){$t_da="Sun";}
										else if($tda1==1&&$tda2==1){$t_da=1;}
							}//while
							
								
							$sqlT2="select Topic_id from aptitude where T_id='$t_m[$T2]' AND Topic_id='$topicS[$x]'";
							$queT2=mysql_query($sqlT2) or die("Error");
							
							$sqlP2="select P_id from easy_place where T_id='$t_m[$T2]' AND P_id='$placeS[$y]'";
							$queP2=mysql_query($sqlP2) or die("Error");
							
									if($t_da==1){
										if(mysql_num_rows($queP2)!=0&&mysql_num_rows($queT2)!=0){ 
										$final[$A2]=$t_m[$T2];
										$A2++;
										//$final=$t_m[$T];
										}
									}else if($t_da!=1){
										if($s_da==$t_da&&mysql_num_rows($queP2)!=0&&mysql_num_rows($queT2)!=0){
											$final[$A2]=$t_m[$T2];
										$A2++;
										//$final=$t_m[$T];
											}// if
									}//else if
							}//else queD
									
							}// for T
						
						$chek=mt_rand($final[0],$final[count($final)]);
						//$chek=$final;
						$sqlS2="insert into patform values ('','$s_day[$z1]','$chek')";
						$queryS2=mysql_query($sqlS2);
						$sqlSave2="insert into schedule values ('','$s_day[$z1]','$topicS[$x]','$chek','$placeS[$y]','$generation','$status','$c_place')";
						$querySave2=mysql_query($sqlSave2);
							}// iftoc
							else if ($toc>=67&&$toc<=85){
//////////////////////////////////////////////////////////////// if 3 ///////////////////////////////////////////////////////////////////////////////////////									
						$A3=0;
						for($T3=0;$T3<$c23;$T3++){
							$sqlD3="select * from patform where dateS='$s_day[$z1]' AND T_id='$t_s[$T3]' ";
							$queD3=mysql_query($sqlD3) or die("Error");
														
							$tda1=0;
							$tda2=0;$t_da=0;
							if(mysql_num_rows($queD3)!=0){}//if queD
							else if(mysql_num_rows($queD3)==0){
							$sqlA3 ="select * from teacher where ID='$t_s[$T3]'";
							$queA3 =mysql_query($sqlA3) or die("Error");	
							while($rwA3 = mysql_fetch_array($queA3)) {
								list($tda1,$tda2)=explode("-",$rwA3['T_Day']);	
										if($tda1==1&&$tda2==0){$t_da="Sat";}else if($tda1==0&&$tda2==1){$t_da="Sun";}
										else if($tda1==1&&$tda2==1){$t_da=1;}
							}//while
								
							$sqlT3="select Topic_id from aptitude where T_id='$t_s[$T3]' AND Topic_id='$topicS[$x]'";
							$queT3=mysql_query($sqlT3) or die("Error");
							
							$sqlP3="select P_id from easy_place where T_id='$t_s[$T3]' AND P_id='$placeS[$y]'";
							$queP3=mysql_query($sqlP3) or die("Error");
							
							if($t_da==1){
										if(mysql_num_rows($queP3)!=0&&mysql_num_rows($queT3)!=0){ 
										$final[$A3]=$t_s[$T3];
										$A3++;
										//$final=$t_s[$T];
										}
							}else if($t_da!=1){
										if($s_da==$t_da&&mysql_num_rows($queP3)!=0&&mysql_num_rows($queT3)!=0){
											$final[$A3]=$t_s[$T3];
										$A3++;
										//$final=$t_s[$T];
											}// if
									}//else if
							}//else queD
									
						}// for T
						$chek=mt_rand($final[0],$final[count($final)]);
						//$chek=$final;
						$sqlS3="insert into patform values ('','$s_day[$z1]','$chek')";
						$queryS3=mysql_query($sqlS3);
						$sqlSave3="insert into schedule values ('','$s_day[$z1]','$topicS[$x]','$chek','$placeS[$y]','$generation','$status','$c_place')";
						$querySave3=mysql_query($sqlSave3);
								}// if toc
////////////////////////////////////////////////////////////////// end if all ////////////////////////////////////////////////////////////////////////////////////////					
					}//for y
				
			}else if($go==1){$z3=$z1-1;
				$sqlSaveA="insert into schedule values ('','$s_day[$z3]','0','0','0','$generation','0','$c_place')";
						$querySaveA=mysql_query($sqlSaveA);
						$x--;$go=0;
						//$z1++;
						$f=0;$g=0;
						}// else go
		if($f==3){$z1++;$f=0;$g=0;}	
		if($g==2){$z1++;$f=0;$g=0;}			
	}//for topic x 
//echo $z1;
/**/

$sqlDel="delete from patform "; 
$queryDel=mysql_query($sqlDel);
$result_add_schedule=$queryDel;
 }// if bnt	
 mysql_close();
?>
</body>
</html>