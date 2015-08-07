<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style_css.css" />
<script type="text/javascript">
function check_number(ch){
		var len, digit;
		if(ch == " "){ 
					return false;
					var len=0;
					}else{ var len = ch.length;}
	for(var i=0 ; i<len ; i++)
	{
	var	digit = ch.charAt(i)
			if(digit >="0" && digit <="9"||digit=="-"){; }else{ return false; } 
		} 
return true;
}

function check_input()
{
	var emailFilter=/^.+@.+\..{2,3}$/;
	var str=document.page_add_teacher.T_Email.value;

	if(document.page_add_teacher.T_username.value == "")
	{
		alert('กรุณาป้อนข้อมูลชื่อผูู้ใช้');
		document.page_add_teacher.T_username.focus();
		return false;
	}  
	if(document.page_add_teacher.T_password.value == "")
	{
		alert('กรุณาป้อนรหัสผ่าน');
		document.page_add_teacher.T_password.focus();
		return false;
	}   
	if(document.page_add_teacher.T_IDcard.value == "")
	{
		alert('กรุณาป้อนข้อมูลเลขบัตรประจำตัวประชาชน');
		document.page_add_teacher.T_IDcard.focus();
		return false;
	} 
	
	if(!check_number(document.page_add_teacher.T_IDcard.value) || document.page_add_teacher.T_IDcard.value == "" )
		{
		alert("กรุณาป้อนข้อมูลเลขบัตรประจำตัวประชาชนเป็นตัวเลขเท่านั้น ");
		document.page_add_teacher.T_IDcard.focus();
		return false;
		}
	if(document.page_add_teacher.T_IDcard.value.length != 17){
		alert("กรุณาป้อนข้อมูลเลขบัตรประจำตัวประชาชน 13 หลัก");
		document.page_add_teacher.T_IDcard.focus();
		return false;
		}
	
	//var re5digit="/^\d{5}$-/"; //regular expression defining a 5 digit number
//	if (document.page_add_teacher.T_IDcard.value.search(re5digit)==-1) {//if match failed
	//	alert("กรุณาป้อนข้อมูลเลขบัตรประจำตัวประชาชนเป็นตัวเลขเท่านั้น ")
		//document.page_add_teacher.T_IDcard.focus();
		//return false;
	//	}
	
	if(document.page_add_teacher.prefix_name.value == "")
	{
		alert('กรุณาป้อนข้อมูลคำนำหน้าชื่อ');
		document.page_add_teacher.prefix_name.focus();
		return false;
	} 
	if(document.page_add_teacher.T_name.value == "")
	{
		alert('กรุณาป้อนข้อมูลชื่ออาจารย์');
		document.page_add_teacher.T_name.focus();
		return false;
	} 
	if(document.page_add_teacher.T_surname.value == "")
	{
		alert('กรุณาป้อนข้อมูลนามสกุล');
		document.page_add_teacher.T_surname.focus;
		return false;
	} 
	if(document.page_add_teacher.day.value == "" || document.page_add_teacher.mount.value == "" || document.page_add_teacher.year.value == "" )
	{
		alert('กรุณาตรวจสอบวันเกิด');
		document.page_add_teacher.day.focus;
		return false;
	}
	if(document.page_add_teacher.T_Add.value == "")
	{
		alert('กรุณาป้อนที่อยู่');
		document.page_add_teacher.T_Add.focus;
		return false;
	} 
	if(document.page_add_teacher.T_Email.value == "" || !(emailFilter.test(str)) )
	{
		alert('กรุณาตรวจสอบอีเมลล์');
		document.page_add_teacher.T_Email.focus;
		return false;
	} 
	if(document.page_add_teacher.T_Phone.value == "")
	{
		alert('กรุณาป้อนเบอร์โทรศัพท์');
		document.page_add_teacher.T_Phone.focus;
		return false;
	} 
	
	
	if(!check_number(document.page_add_teacher.T_Phone.value) || document.page_add_teacher.T_Phone.value == "" )
		{
		alert("กรุณาป้อนเบอร์โทรศัพท์เป็นตัวเลขเท่านั้น ");
		document.page_add_teacher.T_Phone.focus();
		return false;
		}
		
		
	if(document.page_add_teacher.T_Study.value == "")
	{
		alert('กรุณาป้อนรุ่นศึกษา');
		document.page_add_teacher.T_Study.focus;
		return false;
	} 
	
	if(document.page_add_teacher.T_Type.value == "")
	{
		alert('กรุณาเลือกประเภทอาจารย์');
		document.page_add_teacher.T_Type.focus;
		return false;
	}
	//if(document.page_add_teacher.place.checked == false )
	//	{
	//	alert('กรูณาเลือกสถานที่สะดวกสอน');
		//return false;
	//}  
	
	//var ckk = document.getElementById('idplace[0]');
	//if(ckk.checked == false){
	//alert('กรูณาเลือกสถานที่สะดวกสอน');
	//return false;
	//}
	var a=new Array();
	a=document.getElementsByName("place[]");
	//alert("Length:"+a.length); // แสดงค่าจำนวน Checkbox ที่มีทั้งหมดในแบบฟอร์ม
	var p=0;
	for(i=0;i<a.length;i++){
		if(a[i].checked){
			//alert(a[i].value); // แสดงค่าที่ถูกเลือกไว้
		var	p=1;
		}
	}
	if (p==0){
		alert('กรูณาเลือกสถานที่สะดวกสอน');
		return false;
	}


	if(document.page_add_teacher.T_Day1.checked == false && document.page_add_teacher.T_Day2.checked == false)
		{
		alert('กรูณาเลือกวันที่สะดวกสอน');
		return false;
	}  
	if(document.page_add_teacher.picture.value == "")
	{
		alert('กรุณาเพิ่มรูปภาพประจำตัว');
		document.page_add_teacher.T_Type.focus;
		return false;
	}
	document.page_add_teacher.submit();
}
</script> 

<script type="text/javascript">
function autoTab(obj){

   /* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น
   
   1. รูปแบบเลขที่บัตรประชาชน เช่น 4-2215-54125-6-12 ก็สามารถกำหนดเป็น  _-____-_____-_-__
   2. รูปแบบเบอร์โทรศัพท์ เช่น 08-4521-6521 กำหนดเป็น __-____-____
   3. รูปแบบกำหนดเวลา เช่น 12:45:30 กำหนดเป็น __:__:__
   
   ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน
   */

      var pattern=new String("_-____-_____-__-_"); // กำหนดรูปแบบในนี้
      var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
      var returnText=new String("");
      var obj_l=obj.value.length;
      var obj_l2=obj_l-1;
      for(i=0;i<pattern.length;i++){         
         if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){
            returnText+=obj.value+pattern_ex;
            obj.value=returnText;
         }
      }
      if(obj_l>=pattern.length){
         obj.value=obj.value.substr(0,pattern.length);         
      }
}
</script>
<script type="text/javascript">
function autoTabT(obj){
      var pattern=new String("__-____-____"); // กำหนดรูปแบบในนี้
      var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
      var returnText=new String("");
      var obj_l=obj.value.length;
      var obj_l2=obj_l-1;
      for(i=0;i<pattern.length;i++){         
         if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){
            returnText+=obj.value+pattern_ex;
            obj.value=returnText;
         }
      }
      if(obj_l>=pattern.length){
         obj.value=obj.value.substr(0,pattern.length);         
      }
}
</script>
<script type="text/javascript">
function processdata()
{
 var xmlhttp=null;
 if(window.ActiveObject)
  		xmlhttp = new ActiveObject("Microsoft.XMLHTTP");
  else if(window.XMLHttpRequest)
  		xmlhttp = new XMLHttpRequest();
  else 
       alert("browser dose not suppost AJAX");
	   
        if(xmlhttp != null)
		{
		    xmlhttp.open("GET","check_username.php?T_username="+document.getElementById("T_username").value,true);
			xmlhttp.send(null);
			xmlhttp.onreadystatechange = function()
			{
			    if(xmlhttp.readyState == 4)
				{
						document.getElementById("display").innerHTML = xmlhttp.responseText ;
					
				}
			}
		}
}
</script>
</head>
<body>
 <div class="valid_box">
   <b>เพิ่มข้อมูลอาจารย์</b>
 </div>
<?
	include("config/connect.php");
	include("config/function_db.php");
	include("config/function_gen.php");
?>
<div class="form">
       <fieldset>
         <form action="" method="post" class="niceform" enctype="multipart/form-data" onSubmit="return check_input();" name="page_add_teacher" >
                    
                    <dl>
                        <dt><label for="T_username">ชื่อบัญชีผู้ใช้ :</label></dt>
                        <dd><input type="text" name="T_username" id="T_username" size="40" onChange="processdata();"  class="text"/><span id="display"></span></dd>
                    </dl>
                    <dl>
                        <dt><label for="T_password">รหัสผ่าน :</label></dt>
                        <dd><input type="password" name="T_password" id="T_password" size="40"  class="text"/></dd>
                    </dl>

					<dl>
                        <dt><label for="T_IDcard">เลขที่บัตรประชาชน:</label></dt>
                        <dd><input type="text" name="T_IDcard" id="T_IDcard" size="40"  onkeyup="autoTab(this)"  class="text"/></dd>
                    </dl>
					<dl>
                        <dt><label for="T_name">คำนำหน้าชื่อ :</label></dt>
                        <dd><input type="text" name="prefix_name" id="prefix_name" size="40"  class="text"/></dd>
                    </dl>
					<dl>
                        <dt><label for="T_name">ชื่ออาจารย์ :</label></dt>
                        <dd><input type="text" name="T_name" id="T_name" size="40"  class="text"/></dd>
                    </dl>
					<dl>
                        <dt><label for="T_surname">นามสกุลอาจารย์ :</label></dt>
                        <dd><input type="text" name="T_surname" id="T_surname" size="40"  class="text"/></dd>
                    </dl>
					<dl>
                        <dt><label>วัน เดือน ปี เกิด:</label></dt>
                        <dd>
							<table>	
							<tr>
                          	 <td><select name="day" id="day">
							 	 <option value="">วัน</option>
							     <? for($day=1;$day<=31;$day++) {?>
                           		 <option value="<? echo $day; ?>"><? echo $day; ?></option>
								 <? } ?>
                         		 </select>
							  </td>
							  <td><select name="mount" id="mount">
							   <option value="">เดือน</option>
							    <? for($mount=1;$mount<=12;$mount++) {?>
                           		 <option value="<? if($mount<=9){echo "0".$mount;}else{echo $mount;} ?>"><?=$Mount[$mount] ?></option>
								 <? } ?>
                         		 </select></td>
							 <td><select name="year" id="year">
							 	<option value="">ปี พ.ศ.</option>
								<?  $y=date("Y")+543;
								   // echo date("j-m-$y");
								 ?>
							 	<? for($year=2500;$year<=$y;$year++) {?>
                           		 <option value="<? echo $year; ?>"><? echo $year; ?></option>
								  <? } ?>
                         		 </select>
								</td>
							 </tr>
						  </table>
 
						</dd>
					</dl>
					<dl>
                        <dt><label for="T_Add">ที่อยู่ :</label></dt>
                        <dd><textarea rows="5" cols="45" name="T_Add" id="T_Add"></textarea></dd>
                    </dl>
					<dl>
                        <dt><label for="T_Email">อีเมลล์ :</label></dt>
                        <dd><input type="text" name="T_Email" id="T_Email" size="40"  class="text"/></dd>
                    </dl>
					<dl>
                        <dt><label for="T_Phone">เบอร์โทรศัพท์ :</label></dt>
                        <dd><input type="text" name="T_Phone" id="T_Phone" size="40"  onkeyup="autoTabT(this)"  class="text"/></dd>
                    </dl>
					<dl>
                        <dt><label for="T_Study">รุ่นศึกษา สถาบันใหญ่ :</label></dt>
                        <dd><input type="text" name="T_Study" id="T_Study" size="40"  class="text"/></dd>
                    </dl>
					
                   	<dl>
                        <dt><label for="type_teahcer">ประเภทอาจารย์ :</label></dt>
                        <dd>
                            <select name="T_Type" id="T_Type" style="height:25px; width:230px;">
						        <option value="" selected>- - - - - กรุณาเลือกผู้ใช้ระบบ - - - - - </option>
								<option value="TM"  >อาจารย์เชี่ยวชาญ</option>
                                <option value="TC"  >อาจารย์ปานกลาง</option>
                                <option value="TS"  >อาจารย์มาใหม่</option>
                      		 </select>
                        </dd>
                    </dl>
					<dl>
                        <dt><label for="type_teahcer">เลือกสถานที่สะดวกสอน :</label></dt>
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
                    <dl>
                        <dt><label for="T_Study">วันที่สะดวกสอน :</label></dt>
                        <dd><input type="checkbox"  checked name="T_Day1" id="T_Day1" /> วันเสาร์ <br/><input type="checkbox" checked name="T_Day2" id="T_Day2"  /> วันอาทิตย์ </dd>
                    </dl>
					<dl>
                        <dt><label for="picture">รูปภาพอาจารย์ :</label></dt>
                        <dd><input type="file" name="picture" id="picture"/></dd>
                    </dl>
                     <dl class="submit">
                    <input type="submit" name="submit" id="submit" value="บันทึก" class="NFButton" />
                     </dl>         
         </form>
		       </fieldset>   
         </div>  
</body>
<?
	//$test
	//$T_id=$_POST['T_id'];
	
	$T_username=$_POST['T_username'];
	
	$T_password=$_POST['T_password'];
	$T_IDcard=$_POST['T_IDcard'];
	$prefix_name=$_POST['prefix_name'];
	$T_name=$_POST['T_name'];
	$T_surname=$_POST['T_surname'];
	$T_Add=$_POST['T_Add'];
	$T_Email=$_POST['T_Email'];
	$T_Phone=$_POST['T_Phone'];
	$T_Study=$_POST['T_Study'];
	$T_Type=$_POST['T_Type'];
	if($_POST['T_Day1']==NULL&&$_POST['T_Day2']!=NULL){	$T_Day='0'.'-'.'1';}
	else if ($_POST['T_Day1']!=NULL&&$_POST['T_Day2']==NULL){ $T_Day='1'.'-'.'0';}
	else if($_POST['T_Day1']!=NULL&&$_POST['T_Day2']!=NULL){ $T_Day='1'.'-'.'1';}
	$day=$_POST['day'];
	$mount=$_POST['mount'];
	$year=$_POST['year'];
	  $pic="ไม่มี";
if($_POST['submit'] != '')
{
	 $c=0;
	$f_type=$_FILES["picture"]["type"];
	$fnam=time()."_".rand(1,9999);
	
	if($f_type=="image/x-png"||$f_type=="image/png"){$T_Pic="$fnam.png";}
	else if(($f_type=="image/pjpeg")||($f_type=="image/jpeg")){$T_Pic="$fnam.jpg";}
	else if($f_type=="image/gif"){$T_Pic="$fnam.gif";}
	else {$c++; }
	
	$sqlT="select * from teacher where T_username='$T_username'";
	$queryT=mysql_query($sqlT);
	$num_n=mysql_num_rows($queryT);
	if($num_n != 0) { 
	 echo '
<SCRIPT language=JavaScript>  alert("ชื่อบัญชีผู้ใช้ซ้ำกัน ! ลองใหม่...");  </script>
';
	}
	else if ($c>0){echo '
<SCRIPT language=JavaScript>  alert("กรุณาตรวจสอบรูปภาพใส่รูปภาพ .GIF, .PNG, .JPG ");  </script>
';}else {
	if($_FILES['picture']['name'] !='')
	{/*
			$ftp_server = "std.csit.sci.tsu.ac.th";
			$ftp_username   = "s532021286";
			$ftp_password   =  "film18014";
			//setup of connection
			$conn_id = ftp_connect($ftp_server) or die("could not connect to $ftp_server");
			//login
			if(@ftp_login($conn_id, $ftp_username, $ftp_password))
			  {
			  echo "conectd as $ftp_username@$ftp_server\n";
			}
			else {
			  echo "could not connect as $ftp_username\n";
			}
			$file = $T_Pic;
			//echo "<br/>"."File1".$file."<br/>";
			//echo "File2".$_FILES['picture']['name']."<br/>";
			$remote_file_path = "/public_html/schedule/picture_teacher/".$file;
			$qut=ftp_put($conn_id, $remote_file_path, $_FILES["picture"]["tmp_name"], FTP_ASCII);
			if(!$qut){echo "Fail3"."<br/>";}else{echo "Yes";}
			
			ftp_close($conn_id);
		*/
		//ftp_put($conn_id, $remote_file_path, ,
        //FTP_ASCII);
		//if($f_type=="image/x-png"){$T_Pic="$fnam.pdf";
		//$T_Pic = date("Y/m/d")."-".$T_Pic;
		//}
		//$f_type=$_FILES["picture"]["type"];
		
	    //$T_Pic = date("Y/m/d")."-".$T_Pic;
		copy($_FILES["picture"]["tmp_name"],"picture_teacher/$T_Pic");
	   // copy($photo,"picture_teacher/".$T_Pic); 
	}
	 $T_Birth=$day."-".$mount."-".$year;
	$result_add_teacher=adddata($table_teacher);
	 
	
	$max=0;
	 $que = select("$table_teacher");
	$ll=0;
	while($rww = mysql_fetch_array($que))
	{
		$teacher_id[$ll]=$rww['ID'];
		$ll++;
	}
	for($tes=0;$tes<count($teacher_id);$tes++){
		if($max<$teacher_id[$tes]){$max=$teacher_id[$tes];}
		}
	
	 $T_id=$max;
    for($i=0;$i<count($_POST["place"]);$i++)
 	{
		if(trim($_POST["place"][$i]) != "")
		{
			$P_id = $_POST["place"][$i];
	adddata($table_easy_place);
		}
	 }
	
	}//else
	
}
?>
</html>
