<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<? function check_da($dayC,$monthC,$yearC)
{
//echo $dayC.$monthC.$yearC;	
 if(checkdate($monthC,$dayC,$yearC)){return 1; 
 }else{
 return 2;
 }

}

function check_day($td,$tm,$ty)
{
 $count=0;
	//echo "11111111111";
	$lt1=$ty."-".$tm."-".$td;
	//echo "<br/>";
	$tda=$td+1;
	$tma=$tm+1;
	$tya=$ty+1;
	$tdt=1;
	$tmt=1;
	if (checkdate($tm,$tda,$ty)){
	  $lt2=$ty."-".$tm."-".$tda;
		}// if check
	else if (!checkdate($tm,$tda,$ty)){ 
			if(checkdate($tma,$tdt,$ty)){$lt2=$ty."-".$tma."-".$tdt;}
	else if(!checkdate($tma,$tda,$ty)){$lt2=$tya."-".$tmt."-".$tdt;}
	
	}
//  echo "<br/>";
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
	$count++;
	}
	else
	{
	$intWorkDay++;
	}
	$strStartDate = date ("Y-m-d", strtotime("+1 day", strtotime($strStartDate)));
	}//while
	
	

//echo $cccc="01"+"02";

//for($d=$td;$d<=31;$d++){
	if ($count==2){ return "Sat";}
	else if($count==1){ return "Sun";}
	

}




function check_holiday($tday,$tmonth,$tyear){
include("config/connect.php");	
	
$holidayC=$tday."/".$tmonth."/".$tyear;
$x=0;
$sql ="select * from holiday";
$query = mysql_query($sql) or die("Error");	
while($row =mysql_fetch_array($query))
{
 $begin = $row['Date_begin'];
 $end = $row['Date_end'];
if($holidayC==$begin||$holidayC==$end){ $x++;}
  
}
if($x>0){return "T";}
else return "F";
}
	/*
function c_A($idT){
include("config/connect.php");
//include("config/function_db.php");
		$sqlA ="select * from teacher where ID='$idT'";
		$queA =mysql_query($sqlA) or die("Error");	
		while($rwA = mysql_fetch_array($queA)) {
					//if($rwA['ID']==$idT){
					list($tda1,$tda2)=explode("-",$rwA['T_Day']);	
					if($tda1==1){$t_da="Sat";}else if($tda2==1){$t_da="Sun";}
					//}	
		}//while
return $t_da;
}
	
function c_B($idT){
	$x2=0;
include("config/connect.php");
//include("config/function_db.php");
	$sqlP ="select * from easy_place where T_id='$idT'";
	$queP =mysql_query($sqlP) or die("Error");
	
	while($rwP = mysql_fetch_array($queP)) {
				//if($rwP['T_id']==$idT){
				if($placeT==$rwP['P_id']){
				$x2++;
				}
			//}			
		}//echo "<br/>";
return	$x2;
}///
	
function c_C($idT){
include("config/connect.php");
//include("config/function_db.php");
$x3=0;
		$sqlT ="select * from aptitude where T_id='$idT'";
		$queT =mysql_query($sqlT) or die("Error");
		//$queT = select("$table_aptitude");
		while($rwT = mysql_fetch_array($queT)) {
					//if($rwT['T_id']==$idT){
						if($topicT==$rwT['Topic_id']){
									$x3++;
										}
								// }			
				}//echo "<br/>";
	return		$x3;			
	}
function check_dateQ($date1,$date2){
$count=0;
	//echo "11111111111";
	list($day1,$mon1,$year1)=explode("/",$date1); 
	list($day2,$mon2,$year2)=explode("/",$date2); 
	$lt1=$year1."-".$mon1."-".$day1;
	$lt2=$year2."-".$mon2."-".$day2;
		
//  echo "<br/>";
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
	$count++;
	}
	else
	{
	$intWorkDay++;
	}
	$strStartDate = date ("Y-m-d", strtotime("+1 day", strtotime($strStartDate)));
	}//while
		
	return $count;
	
	}	*/
?>