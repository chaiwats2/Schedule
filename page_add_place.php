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
</script> 
</head>
<body>
<div class="valid_box">
   <b>เพิ่มข้อมูลสถานที่สอนสมาธิ</b>
     </div>
<div class="form">
       <fieldset>
         <form action="" method="get" class="niceform"  name="frm_address">
                    <dl>
                        <dt><label for="nametample">ชื่อสถานที่เปิดสอน:</label></dt>
                        <dd><input type="text" name="location_name" id="location_name" size="54"/></dd>
                    </dl>
				    <dl>
                        <dt><label for="comments">ที่อยุ่ :</label></dt>
                        <dd><textarea name="address" id="address" rows="5" cols="45"></textarea></dd>
                    </dl>
                     <dl class="submit">
                    <input type="button" name="btnsubmit" id="btnsubmit" value="บันทึก" onClick="return check_input();"/>
					<input type="reset" name="reset" id="reset" value="ล้างข้อมูล"/>
                     </dl>         
         </form>
		       </fieldset>   
         </div> 
		 <span id="output"></span>
<script type="text/javascript">
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
		    xmlhttp.open("GET","add_place.php?location_name="+document.getElementById("location_name").value+
			"&address="+document.getElementById("address").value,true);
			xmlhttp.send(null);
			xmlhttp.onreadystatechange = function()
			{
			    if(xmlhttp.readyState == 4)
				{
						if(xmlhttp.responseText = 'y')
						{
						        alert("บันทึกข้อมูลเสร็จเรียบร้อย");
							    document.getElementById("location_name").value= null;
							  	document.getElementById("address").value=null;
								window.location="index.php?frm=add_place";
						}	
						
				}
			}
		}
}
</script> 

</body>
</html>
