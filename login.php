<? session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ระบบจัดตารางสอนแบบมีผู้สอนหลายคน : กรณีศุึกษา สถาบันพลังจิตตานุภาพ สาขา ๕ หาดใหญ่</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="ddaccordion.js"></script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix", "<img src='images/plus.gif' class='statusicon' />", "<img src='images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>

<script type="text/javascript" src="jconfirmaction.jquery.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
	
</script>
<script language="javascript" type="text/javascript" src="niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="niceforms-default.css" />

</head>
<body>
<div id="main_container">

	<div class="header_login">
   
    <div class="right_left">ระบบสนับสนุนการจัดตารางสอนเพื่อสถาบันพลังจิตตานุภาพในภาคใต้</div>
    </div>

     
         <div class="login_form">
         
         <h3>เข้าสู่ระบบ</h3>
         
         <form action="login.php" method="post" class="niceform">
         
                <fieldset>
					 <dl>
                        <dt><label for="type_user">ประเภทผู้ใช้ระบบ:</label></dt>
                        <dd>
                            <select size="1" name="type_user" id="type_user">
						        <option value="no_type" selected>- - - - - - - - กรุณาเลือกผู้ใช้ระบบ - - - - - - - -</option>
                                <option value="s_admin"  >ผู้ดูแลระบบระดับภาค</option>
                                <option value="admin"  >ผู้ดูแลระบบระดับสาขา</option>
                                <option value="teacher"  >อาจารย์</option>
                      		 </select>
                        </dd>
                    </dl>
                    <dl>
                        <dt><label for="Username">Username:</label></dt>
                        <dd><input type="text" name="Username" id="Username" size="40" /></dd>
                    </dl>
                    <dl>
                        <dt><label for="password">Password:</label></dt>
                        <dd><input type="password" name="Password" id="Password" size="40" /></dd>
                    </dl>
                    
                   
                    
                     <dl class="submit">
                    <input type="submit" name="btnsubmit" id="btnsubmit" value="ลงชื่อเข้า" />
                     </dl>
                    
                </fieldset>
                
         </form>
         </div>  
          
	
    
    <div class="footer_login">
    
    	<div class="left_footer_login"></div>
    	<div class="right_footer_login"></div>
    
    </div>
</div>		

<?
include("config/connect.php");
include("config/function_db.php");
include("config/function_gen.php");
	
$type_user = $_POST['type_user'];
$Username = $_POST['Username'];
$Password = $_POST['Password'];
$_SESSION['ce'] = $Username;
if($_POST['btnsubmit'] != '')
{
	if($_POST['type_user'] =='no_type' or $_POST['Username'] == '' or $_POST['Password'] == '')
	{
	  	fn_alert("กรุณาตรวจสอบการป้อนข้อมูล");
	}
	else if($type_user =='s_admin')
	{
    $condition="(Username='$Username') AND (Password='$Password')"; 
	$query=select_condition($type_user,$condition);
	$row = mysql_fetch_array($query);
	$name_login = "คุณ ".$row['Name']." ".$row['Surname'];
	$_SESSION['type_user'] = 's_admin';
	$_SESSION['update_user'] = $Username;
	$sqlO="select * from s_admin where Username='$Username'";
	$queryO=mysql_query($sqlO);
	$rowO = mysql_fetch_array($queryO);
	$IDO=$rowO['ID'];						
	$UsernameO=$rowO['Username'];
	$PasswordO=$rowO['Password'];
	$NameO=$rowO['Name'];
	$SurnameO=$rowO['Surname'];
	$EmailO=$rowO['Email'];
	$s_statusO=1;
	$sqlU="update s_admin set ID='$IDO',Username='$UsernameO',Password='$PasswordO',Name='$NameO',Surname='$SurnameO',Email='$EmailO',s_status='$s_statusO'";
	 $update_s_admin= mysql_query($sqlU);
	}
	else if($type_user =='admin')
	{
		
    $condition="(Username='$Username') AND (Password='$Password')"; 
	$query=select_condition($type_user,$condition);
	$row = mysql_fetch_array($query);
	$name_login = "คุณ ".$row['Name']." ".$row['Surname'];
	$_SESSION['type_user'] = 'admin';
	
	$sqlO1="select * from s_admin ";
	$queryO1=mysql_query($sqlO1);
	$rowO1 = mysql_fetch_array($queryO1);
	$status_s=$rowO1['s_status'];
	if($status_s=="1"){
		echo '<SCRIPT language=JavaScript>  alert("ปิดปรับปรุง!! กรุณาลองใหม่ทุก 1 ขั่วโมง...");  </script>';session_destroy();break; 
		}
	}
else if($type_user =='teacher'){
	$Username = $_SESSION['ce'];
	//echo "11111111111111111111111111111111".$Username;
	$sqlO2="select * from s_admin  ";
	$queryO2=mysql_query($sqlO2);
	$rowO2 = mysql_fetch_array($queryO2);
	$status_s2=$rowO2['s_status'];
	if($status_s2=="1"){
		echo '<SCRIPT language=JavaScript>  alert("ปิดปรับปรุง!! กรุณาลองใหม่ทุก 1 ขั่วโมง...");  </script>';session_destroy();break; 
		}
	$condition="(T_username ='$Username') AND (T_password ='$Password')"; 
	$query=select_condition($type_user,$condition);
	$row = mysql_fetch_array($query);
	$name_login = "คุณ ".$row['T_name']." ".$row['T_surname'];
	$_SESSION['s_teacher_id'] = $row['ID'];
	$_SESSION['s_type'] = $row['T_Type'];
	$_SESSION['type_user'] = 'teacher';
	
	}
	$num = mysql_num_rows($query);
		if($num!= ''){	
			$_SESSION['user_login'] = $name_login;
			fn_refresh(0,"index.php");
		}
		else{ fn_alert("รหัสผ่านไม่ถูกต้อง");	}
	
	
}
?>
</body>
</html>