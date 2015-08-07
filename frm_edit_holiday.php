<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" media="all" href="niceforms-default.css" />
<script language="javascript" type="text/javascript" src="niceforms.js"></script>
<script language="javascript" type="text/javascript" src="date_picker.js"></script>
<link rel="stylesheet" type="text/css" href="style_date_picker.css" />
<script language="javascript">
function check_input()
{
	if(document.frm_add_holiday.Date_begin.value == "")
	{
		alert('กรุณาป้อนข้อมูลวันหยุดเริ่มต้น');
		document.frm_add_holiday.Date_begin.focus;
		return false;
	}
	if(document.frm_add_holiday.Date_end.value == "")
	{
		alert('กรุณาป้อนข้อมูลวันหยุดสิ้นสุด');
		document.frm_address.Date_end.focus;
		return false;
	} 
	if(document.frm_add_holiday.Name_holiday.value == "")
	{
		alert('กรุณาป้อนข้อมูลชื่อวันหยุด');
		document.frm_address.Name_holiday.focus;
		return false;
	}

	var xmlhttp=null;
 	if(window.ActiveObject)
  		xmlhttp = new ActiveObject("Microsoft.XMLHTTP");
  	else if(window.XMLHttpRequest)
  		xmlhttp = new XMLHttpRequest();
  	else 
       alert("browser dose not suppost AJAX");
	   
	   

        if(xmlhttp != null)
		{
		    xmlhttp.open("GET","edit_holiday.php?Date_begin="+document.getElementById("Date_begin").value+
			"&Date_end="+document.getElementById("Date_end").value+"&Name_holiday="+document.getElementById("Name_holiday").value
			+"&id_date="+document.getElementById("id_date").value,true);
			xmlhttp.send(null);
			xmlhttp.onreadystatechange = function()
			{
			    if(xmlhttp.readyState == 4)
				{
						if(xmlhttp.responseText = 'y')
						{
						     alert("แก้ไขข้อมูลเสร็จเรียบร้อย");
							 window.location="index.php?frm=edit_holiday";
						}	
		
				}
			}
		} 
}  
</script>
</head>
<body>
<?
include("config/connect.php");
include("config/function_db.php");
if($_REQUEST['id'] != '')
{
	$id = $_REQUEST['id'];
 	$condition="id='$id'"; 
	$que=select_condition($table_holiday,$condition);
	$row=mysql_fetch_array($que);
}
?>
<div class="valid_box">
   <b>แก้ไขข้อมูลวันหยุด</b>
</div>
<div class="form">
       <fieldset>
         <form class="niceform" name="frm_add_holiday" onSubmit="">
		 <input type="hidden" name="id_date" id="id_date" size="30" value="<? echo $row['id']; ?>"/>
                    <dl>
                        <dt><label for="date_begin">วันเริ่มต้น :</label></dt>
                        <dd><input type="text" name="Date_begin" id="Date_begin" size="30" value="<? echo $row['Date_begin']; ?>"/> <a href="javascript:displayDatePicker('Date_begin')">
<img border="0" src="images/formcal.gif" width="16" height="16"></a></dd>
                    </dl>
                    <dl>
                        <dt><label for="date_end">วันสิ้นสุด :</label></dt>
                        <dd><input type="text" name="Date_end" id="Date_end" size="30" value="<? echo $row['Date_end']; ?>"/> <a href="javascript:displayDatePicker('Date_end')">
<img border="0" src="images/formcal.gif" width="16" height="16"></a></dd>
                    </dl>
				    <dl>
                        <dt><label for="name_holiday">ชื่อวันหยุด :</label></dt>
                        <dd><input type="text" name="Name_holiday" id="Name_holiday" size="54" value="<? echo $row['Name_holiday']; ?>" /></dd>
                    </dl>
                     <dl class="submit">
                    	<input type="button" name="btnsubmit" id="btnsubmit" value="บันทึก" onClick="return check_input();"/>
						<input type="reset" name="reset" id="reset" value="ล้างข้อมูล"/>
                     </dl>         
         </form>
		       </fieldset>   
         </div>  

</body>
</html>



