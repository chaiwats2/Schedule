<? session_start(); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" media="all" href="niceforms-default.css" />
<script language="javascript" type="text/javascript" src="niceforms.js"></script>
<script language="javascript" type="text/javascript" src="date_picker.js"></script>
<link rel="stylesheet" type="text/css" href="style_date_picker.css" />
</head>
<body>
<div class="valid_box">
   <b>เพิ่มข้อมูลวันหยุด</b>
     </div>
<div class="form">
       <fieldset>
         <form class="niceform" name="frm_add_holiday"  action="" method="post">
                    <dl>
                        <dt><label for="date_begin">วันเริ่มต้น:</label></dt>
                        <dd><input type="text" name="Date_begin" id="Date_begin" size="30" value="<?=$_SESSION['DateB'] ?>"/> <a href="javascript:displayDatePicker('Date_begin')">
<img border="0" src="images/formcal.gif" width="16" height="16"></a></dd>
                    </dl>
                    <dl>
                        <dt><label for="date_end">วันสิ้นสุด :</label></dt>
                        <dd><input type="text" name="Date_end" id="Date_end" size="30" value="<?=$_SESSION['DateE'] ?>"/> <a href="javascript:displayDatePicker('Date_end')">
<img border="0" src="images/formcal.gif" width="16" height="16"></a></dd>
                    </dl>
				    <dl>
                        <dt><label for="name_holiday">ชื่อวันหยุด :</label></dt>
                        <dd><input type="text" name="Name_holiday" id="Name_holiday" size="54" value="<?=$_SESSION['NameH'] ?>"/></dd>
                    </dl>
                     <dl class="submit">
                    	<input type="submit" name="btnsubmit" id="btnsubmit" value="บันทึก"/>
						<input type="reset" name="reset" id="reset" value="ล้างข้อมูล"/>
                     </dl>         
         </form>
		       </fieldset>   
         </div>  
<?
include("config/connect.php");
include("config/function_db.php");
include("config/function_gen.php");

$Date_begin=$_POST['Date_begin'];
$Date_end=$_POST['Date_end'];
$Name_holiday=$_POST['Name_holiday'];


if($_REQUEST['btnsubmit'] != '')
{
   $db = explode("/",$Date_begin);
   $de = explode("/",$Date_end);
if(empty($Date_begin))
{
	echo "<script>alert('กรุณาป้อนข้อมูลวันเริ้มต้น');window.location='index.php?frm=add_holiday';</script>";
}
else if(empty($Date_end))
{
	$_SESSION['DateB']=$Date_begin;
	echo "<script>alert('กรุณาป้อนข้อมูลวันสิ้นสุด');window.location='index.php?frm=add_holiday';</script>";
}
else if(empty($Name_holiday))
{
	$_SESSION['DateE']=$Date_end;
	echo "<script>alert('กรุณาป้อนข้อมูลวันหยุด');window.location='index.php?frm=add_holiday';</script>";
}
else
{
   if($db[0]>$de[0] || $db[1] > $de[1] || $db[2] > $de[2])
   {
   	 $_SESSION['NameH']=$Name_holiday;
	 unset($_SESSION['DateB']);
	 unset($_SESSION['DateE']);
     echo "<script>alert('กรุณาตรวจสอบวัน เดือน ปี ที่ป้อน (วัน เดือน ปี เริ่มต้น ต้องมากกว่า วัน เดือน ปี สิ้นสุด)');window.location='index.php?frm=add_holiday';</script>";
   }
   else
   {
	$query=select($table_holiday);
	while($row = mysql_fetch_array($query))
	{
	  $dbdateb=explode("/",$row['Date_begin']);	
	  $dbdatee=explode("/",$row['Date_end']);	
	  if( ($db[0]>=$dbdateb[0]&&$db[1]>=$dbdateb[1]&&$db[2]>=$dbdateb[2]) && ($de[0]<=$dbdatee[0]&&$de[1]<=$dbdatee[1]&&$de[2]<=$dbdatee[2]) )
	  {
	  	$_SESSION['NameH']=$Name_holiday;
	  	echo "<script>alert('วัน เดือน ปี ที่ป้อนซ้ำกัน');window.location='index.php?frm=add_holiday';</script>";
		$k=1;
	  }
	}
		if($k!=1)
		{
			unset($_SESSION['NameH']);
			unset($_SESSION['DateB']);
			unset($_SESSION['DateE']);
			$result_t=adddata($table_holiday);
		}
	}
}
}
?>
</body>
</html>



