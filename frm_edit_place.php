<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" media="all" href="niceforms-default.css" />
<script language="javascript" type="text/javascript" src="niceforms.js"></script>
<script language=Javascript>
function dochange(src, val)
{
     var req = Inint_AJAX();
     req.onreadystatechange = function ()
	 { 
          if (req.readyState==4) {
               if (req.status==200) {
                    document.getElementById(src).innerHTML=req.responseText; //รับค่ากลับมา
               } 
          }
     };
     req.open("GET", "provin/locale.php?data="+src+"&val="+val); //สร้าง connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
     req.send(null); //ส่งค่า
}
window.onLoad=dochange('province', -1);

function check_input()
{
	if(document.frm_address.location_name.value == "")
	{
		alert('กรุณาป้อนข้อมูลชื้อสถานที่สอนสมาธิ');
		document.frm_address.location_name.focus;
		return false;
	}
	if(document.frm_address.address.value == "")
	{
		alert('กรุณาป้อนข้อมูลสถานที่สอนสมาธิ');
		document.frm_address.location_name.focus;
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
		    xmlhttp.open("GET","edit_place.php?location_name="+document.getElementById("location_name").value
			+"&address="+document.getElementById("address").value
			+"&id_place="+document.getElementById("id_place").value,true);
			xmlhttp.send(null);
			xmlhttp.onreadystatechange = function()
			{
			    if(xmlhttp.readyState == 4)
				{
						if(xmlhttp.responseText = 'y')
						{
						        alert("แก้ไขข้อมูลเสร็จเรียบร้อย");
								window.location="index.php?frm=edit_place";
							   
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
	$que=select_condition($table_place,$condition);
	$row=mysql_fetch_array($que);
	
	$id_place = $row['id'];
	$location = $row['location_name'];
	$address_temple = $row['address'];
}
?>
<div class="valid_box">
  <b>แก้ไขข้อมูลสถานที่สอนสมาธิ</b>
     </div> 
<div class="form">
       <fieldset>
         <form method="get" class="niceform"  name="frm_address">
		 			<input type="hidden" name="id_place" id="id_place" size="54" value="<? echo $id_place; ?>"/>
                    <dl>
                        <dt><label for="nametample">ชื่อวัดที่เปิดสอนสมาธิ:</label></dt>
                        <dd><input type="text" name="location_name" id="location_name" size="54" value="<? echo $location;  ?>"/></dd>
                    </dl>
				    <dl>
                        <dt><label for="comments">ที่อยุ่ :</label></dt>
                        <dd><textarea name="address" id="address" rows="5" cols="45"><? echo $address_temple; ?></textarea></dd>
                    </dl>
                     <dl class="submit">
                    <input type="button" name="button" id="button" value="บันทึก" onClick="return check_input();"/>
					<input type="reset" name="reset" id="reset" value="ล้างข้อมูล"/>
                     </dl>         
         </form>
		     </fieldset>   
         </div> 
</body>
</html>
