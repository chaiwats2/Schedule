<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style_css.css" />
<script type="text/javascript">
function check_input()
{
	var emailFilter=/^.+@.+\..{2,3}$/;
	var str=document.page_add_admin.Email.value;

	if(document.page_add_admin.Username.value == "")
	{
		alert('กรุณาป้อนชื่อผู้ใช้');
		document.page_add_admin.Username.focus();
		return false;
	}
	if(document.page_add_admin.Password.value == "")
	{
		alert('กรุณาป้อนรหัสผ่าน');
		document.page_add_admin.Password.focus();
		return false;
	}
	if(document.page_add_admin.prefix_name.value == "")
	{
		alert('กรุณาป้อนคำนำหน้า');
		document.page_add_admin.prefix_name.focus();
		return false;
	}
	if(document.page_add_admin.Name.value == "")
	{
		alert('กรุณาป้อนชื่อผู้ดูแลระบบระดับสาขา');
		document.page_add_admin.Name.focus();
		return false;
	}
	if(document.page_add_admin.Surname.value == "")
	{
		alert('กรุณาป้อนนามสกุลผู้ดูแลระบบระดับสาขา');
		document.page_add_admin.Surname.focus();
		return false;
	}
	if(document.page_add_admin.Email.value == "" || !(emailFilter.test(str)) )
	{
		alert('กรุณาตรวจสอบอีเมลล์');
		document.page_add_admin.Email.focus;
		return false;
	} 
	
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
		    xmlhttp.open("GET","check_username_admin.php?Username="+document.getElementById("Username").value,true);
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
   <b>แก้ไขข้อมูลผู้ดูแลระบบระดับสาขา</b>
 </div>
<?
	include("config/connect.php");
	include("config/function_db.php");
	include("config/function_gen.php");
	$id = $_REQUEST['id'];
	$sql="select * from admin where ID='$id' ";
	$query=mysql_query($sql);
	$rw=mysql_fetch_array($query);
?>
<div class="form">
       <fieldset>
         <form action="" method="post" class="niceform" enctype="multipart/form-data" onSubmit="return check_input();" name="page_add_admin">
                    
                    <dl>
                        <dt><label for="T_username">ชื่อบัญชีผู้ดูแลระบบ :</label></dt>
                        <dd><input type="text" name="Username" id="Username" size="40" onChange="processdata();"  class="text" value="<? echo $rw['Username']; ?>"/><span id="display"></span></dd>
                    </dl>
                    <dl>
                        <dt><label for="T_password">รหัสผ่าน :</label></dt>
                        <dd><input type="password" name="Password" id="Password" size="40"  class="text" value="<? echo $rw['Password']; ?>"/></dd>
                    </dl>
					<dl>
                  <dt><label for="T_name">คำนำหน้าชื่อ :</label></dt>
                        <dd><input type="text" name="prefix_name" id="prefix_name" size="40"  class="text" value="<? echo $rw['prefix_name']; ?>"/></dd>
                    </dl>
					<dl>
                        <dt>
                  <label for="T_name">ชื่อผู้ดูแลระบบ :</label></dt>
                        <dd><input type="text" name="Name" id="Name" size="40"  class="text" value="<? echo $rw['Name']; ?>"/></dd>
                    </dl>
					<dl>
                        <dt>
                        <label for="T_surname">นามสกุลผู้ดูแลระบบ :</label></dt>
                        <dd><input type="text" name="Surname" id="Surname" size="40"  class="text" value="<? echo $rw['Surname']; ?>"/></dd>
					</dl>
					<dl>
            <dt><label for="T_Email">อีเมลล์ :</label></dt>
                        <dd><input type="text" name="Email" id="Email" size="40"  class="text" value="<? echo $rw['Email']; ?>"/></dd>
                    </dl>
					<dl>
                        <dt>
                          <input type="submit" name="submit" id="submit" value="บันทึก" class="NFButton"/>
                     </dt>
					</dl>
                   <input type="hidden" name="idT" value="<? echo $rw['ID']; ?>" />
</form>
		       </fieldset>   
         </div>  
</body>
<?
if($_POST['submit'] != ''){
	//$test
 $id=$_REQUEST['idT'];
	$Username=$_REQUEST['Username'];
	$Password=$_REQUEST['Password'];
	$prefix_name=$_REQUEST['prefix_name'];
	$Name=$_REQUEST['Name'];
	$Surname=$_REQUEST['Surname'];
	$Email=$_REQUEST['Email'];
		 $sql="update admin set ID='$id',Username='$Username',Password='$Password',prefix_name='$prefix_name',Name='$Name',Surname='$Surname',Email='$Email' where ID='$id' ";
	  $result_edit_admin = mysql_query($sql) or die("Error update topic");
			}
?>
</html>
