<? session_start();
if(!isset($_SESSION['user_login']))
{
?>
<script>window.location="login.php";</script>
<?
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ระบบสนับสนุนการจัดตารางสอนเพื่อสถาบันพลังจิตตานุภาพในภาคใต้</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="shortcut icon" type="image/x-icon" href="images/schedule.gif" />
<link rel="stylesheet" type="text/css" media="all" href="niceforms-default.css" />
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
</head>
<body>
<div id="main_container">
	<div class="header">
	<div class="logo"><a href="index.php"><img src="images/schedule.gif" alt="" title="" border="0"/></a> </div>
    <div class="left_header">&nbsp;ระบบสนับสนุนการจัดตารางสอนเพื่อสถาบันพลังจิตตานุภาพในภาคใต้</div>
    <div class="right_header"><? echo $_SESSION['user_login'] ?> | <a href="index.php?logount=sign_ount" class="logout" style="text-decoration:none">ออกจากระบบ</a></div>
</div>
<!-- HTML codes by Quackit.com -->
<div class="main_content">
    
            <div class="menu">
                    <ul>
                    <li><a class="current" href="index.php">หน้าหลัก</a></li>
                    <li><a href="">Contact</a></li>
                    </ul>
            </div> 
                    
<div class="center_content">  

    <div class="left_content">
           <?
		   include "menu_right.php";
		   ?>
	</div>  
<div class="right_content">   
<?
if($_SESSION['type_user']=='s_admin'){//if all s_admin
if($_REQUEST['frm'] == '')
{
 echo "<b><font size=2>ยินดีต้อนรับ เข้าสู่ระบบสนับสนุนการจัดตารางสอนเพื่อสถาบันพลังจิตตานุภาพในภาคใต้</font> </b><br>";
 
 $s_teacher_id=$_SESSION['s_teacher_id'];
 $s_type=$_SESSION['s_type'];
 if($_SESSION['s_type'] != '')
 {
 	include("show_teahcer_self.php");
 }
}
if($_REQUEST['frm']=="add_teacher")
{
include "page_add_teacher.php";
}
if($_REQUEST['frm']=="edit_teacher")
{
include "page_edit_teacher.php";
}
if($_REQUEST['frm']=="delete_teacher")
{
include "page_delete_teacher.php";
}
if($_REQUEST['frm']=="add_place")
{
include "page_add_place.php";
}
if($_REQUEST['frm']=="edit_place")
{
include "page_edit_place.php";
}
if($_REQUEST['frm']=="delete_place")
{
include "page_delete_place.php";
}
if($_REQUEST['frm']=="add_topic")
{
include "page_add_topic.php";
}
if($_REQUEST['frm']=="edit_topic")
{
include "page_edit_topic.php";
}
if($_REQUEST['frm']=="delete_topic")
{
include "page_delete_topic.php";
}
if($_REQUEST['frm']=="add_holiday")
{
include "page_add_holiday.php";
}
if($_REQUEST['frm']=="edit_holiday")
{
include "page_edit_holiday.php";
}
if($_REQUEST['frm']=="delete_holiday")
{
include "page_delete_holiday.php";
}
if($_REQUEST['frm']=="manage_schedule")
{
include "page_manage_schedule.php";
}
if($_REQUEST['frm']=="frm_edit_place")
{
include "frm_edit_place.php";
}
if($_REQUEST['frm']=="frm_edit_topic")
{
include "frm_edit_topic.php";
}
if($_REQUEST['frm']=="frm_edit_holiday")
{
include "frm_edit_holiday.php";
}
if($_REQUEST['frm']=="frm_edit_teacher")
{
include "frm_edit_teacher.php";
}
if($_REQUEST['frm']=="frm_edit_admin")
{
include "frm_edit_admin.php";
}
if($_REQUEST['frm']=="add_aptitude")
{
include "page_add_aptitude.php";
}
if($_REQUEST['frm']=="frm_add_aptitude")
{
include "frm_add_aptitude.php";
}
if($_REQUEST['frm']=="edit_aptitude")
{
include "page_edit_aptitude.php";
}
if($_REQUEST['frm']=="frm_edit_aptitude")
{
include "frm_edit_aptitude.php";
}
if($_REQUEST['frm']=="manage_schedule")
{
include "frm_manage_schedule.php";
}
if($_REQUEST['frm']=="show_manage_schedule")
{
include "show_manage_schedule.php";
}
if($_REQUEST['frm']=="show_schedule_follow_place")
{
include "show_schedule_follow_place.php";
}
if($_REQUEST['frm']=="show_manage_schedule")
{
include "show_manage_schedule.php";
}
if($_REQUEST['frm']=="show_schedule_teacher")
{
include "show_schedule_teacher.php";
}
if($_REQUEST['frm']=="add_admin")
{
include "page_add_admin.php";
}
if($_REQUEST['frm']=="edit_admin")
{
include "page_edit_admin.php";
}
if($_REQUEST['frm']=="delete_admin")
{
include "page_delete_admin.php";
}
if($_REQUEST['frm']=="show_self_teacher")
{
include "page_show_self_teacher.php";
}
if($_REQUEST['frm']=="show_self")
{
include "show_schedule_follow_place_showS.php";
}
if($_REQUEST['frm']=="show_self_all")
{
include "show_schedule_follow_place3_1.php";
}
if($_REQUEST['frm']=="History")
{
include "show_schedule_follow_place3.php";
}
?>
     </div><!-- end of right content-->
                             
</div>   <!--end of center content -->               
                    
<?
include "footer.php";
if($result_t)//result of frm add data 
{
		fn_alert('บันทึกข้อมูลเสร็จเรียบร้อย');
		window_location("index.php?frm=add_holiday");
}
if($result)//result of frm add data 
{
		fn_alert('บันทึกข้อมูลเสร็จเรียบร้อย');
		window_location("index.php?frm=add_topic");
}
if($result_edit)//result of frm add data 
{
		fn_alert('แก้ไขข้อมูลเสร็จเรียบร้อย');
		window_location("index.php?frm=edit_topic");
}
if($result_edit_teacher)//result of frm add data 
{
		fn_alert('แก้ไขข้อมูลเสร็จเรียบร้อย');
		window_location("index.php?frm=edit_teacher");
}
if($result_edit_admin)//result of frm add data 
{
		fn_alert('แก้ไขข้อมูลเสร็จเรียบร้อย');
		window_location("index.php?frm=edit_admin");
}
if($result_add_teacher)//result of frm add data 
{
		fn_alert('บันทึกข้อมูลเสร็จเรียบร้อย');
		window_location("index.php?frm=add_teacher");
}
if($result_add_admin)//result of frm add data 
{
		fn_alert('บันทึกข้อมูลเสร็จเรียบร้อย');
		window_location("index.php?frm=add_admin");
}

if($result_aptitude)//result of frm add data 
{
		fn_alert('บันทึกข้อมูลเสร็จเรียบร้อย');
		window_location("index.php?frm=add_aptitude");
}
if($result_edit_aptitude)//result of frm add data 
{
		fn_alert('แก้ไขข้อมูลเสร็จเรียบร้อย');
		window_location("index.php?frm=edit_aptitude");
}
if($result_add_schedule)//result of frm add data 
{
		fn_alert('จัดตารางสอนเสร็จเรียบร้อย');
		window_location("index.php?frm=show_schedule_follow_place");
		
}

if($_REQUEST['logount'] != '')
{
	$Username=$_SESSION['update_user'];
	$sqlO="select * from s_admin where Username='$Username'";
	$queryO=mysql_query($sqlO);
	$rowO = mysql_fetch_array($queryO);
	$IDO=$rowO['ID'];						
	$UsernameO=$rowO['Username'];
	$PasswordO=$rowO['Password'];
	$NameO=$rowO['Name'];
	$SurnameO=$rowO['Surname'];
	$EmailO=$rowO['Email'];
	$s_statusO=0;
	$sqlU="update s_admin set ID='$IDO',Username='$UsernameO',Password='$PasswordO',Name='$NameO',Surname='$SurnameO',Email='$EmailO',s_status='$s_statusO'";
	 $update_s_admin= mysql_query($sqlU);
session_destroy();
echo "<meta http-equiv='refresh' content='0;url=login.php'>";
}
}// if close s_admin


if($_SESSION['type_user']=='admin'){//if all admin
if($_REQUEST['frm'] == '')
{
 echo "<b><font size=2>ยินดีต้อนรับ เข้าสู่ระบบสนับสนุนการจัดตารางสอนเพื่อสถาบันพลังจิตตานุภาพในภาคใต้่</font> </b><br>";
 
 $s_teacher_id=$_SESSION['s_teacher_id'];
 $s_type=$_SESSION['s_type'];
 if($_SESSION['s_type'] != '')
 {
 	include("show_teahcer_self.php");
 }
}
if($_REQUEST['frm']=="add_teacher")
{
include "page_add_teacher.php";
}
if($_REQUEST['frm']=="edit_teacher")
{
include "page_edit_teacher.php";
}
if($_REQUEST['frm']=="delete_teacher")
{
include "page_delete_teacher.php";
}
if($_REQUEST['frm']=="add_place")
{
include "page_add_place.php";
}
if($_REQUEST['frm']=="edit_place")
{
include "page_edit_place.php";
}
if($_REQUEST['frm']=="delete_place")
{
include "page_delete_place.php";
}
if($_REQUEST['frm']=="add_topic")
{
include "show_schedule_follow_place3.php";
}
if($_REQUEST['frm']=="edit_topic")
{
include "page_edit_topic.php";
}
if($_REQUEST['frm']=="delete_topic")
{
include "page_delete_topic.php";
}
if($_REQUEST['frm']=="add_holiday")
{
include "page_add_holiday.php";
}
if($_REQUEST['frm']=="edit_holiday")
{
include "page_edit_holiday.php";
}
if($_REQUEST['frm']=="delete_holiday")
{
include "page_delete_holiday.php";
}
if($_REQUEST['frm']=="manage_schedule")
{
include "page_manage_schedule.php";
}
if($_REQUEST['frm']=="frm_edit_place")
{
include "frm_edit_place.php";
}
if($_REQUEST['frm']=="frm_edit_topic")
{
include "frm_edit_topic.php";
}
if($_REQUEST['frm']=="frm_edit_holiday")
{
include "frm_edit_holiday.php";
}
if($_REQUEST['frm']=="frm_edit_teacher")
{
include "frm_edit_teacher.php";
}
if($_REQUEST['frm']=="add_aptitude")
{
include "page_add_aptitude.php";
}
if($_REQUEST['frm']=="frm_add_aptitude")
{
include "frm_add_aptitude.php";
}
if($_REQUEST['frm']=="edit_aptitude")
{
include "page_edit_aptitude.php";
}
if($_REQUEST['frm']=="frm_edit_aptitude")
{
include "frm_edit_aptitude.php";
}
if($_REQUEST['frm']=="manage_schedule")
{
include "frm_manage_schedule.php";
}
if($_REQUEST['frm']=="show_manage_schedule")
{
include "show_manage_schedule.php";
}
if($_REQUEST['frm']=="show_schedule_follow_place")
{
include "show_schedule_follow_place2.php";
}
if($_REQUEST['frm']=="show_manage_schedule")
{
include "show_manage_schedule.php";
}
if($_REQUEST['frm']=="show_schedule_teacher")
{
include "show_schedule_teacher.php";
}
if($_REQUEST['frm']=="show_self_teacher")
{
include "page_show_self_teacher.php";
}
if($_REQUEST['frm']=="show_self")
{
include "show_schedule_follow_place_showS.php";
}
?>
     </div><!-- end of right content-->
                             
</div>   <!--end of center content -->               
                    
<?
include "footer.php";
if($result_t)//result of frm add data 
{
		fn_alert('บันทึกข้อมูลเสร็จเรียบร้อย');
		window_location("index.php?frm=add_holiday");
}
if($result)//result of frm add data 
{
		fn_alert('บันทึกข้อมูลเสร็จเรียบร้อย');
		window_location("index.php?frm=add_topic");
}
if($result_edit)//result of frm add data 
{
		fn_alert('แก้ไขข้อมูลเสร็จเรียบร้อย');
		window_location("index.php?frm=edit_topic");
}
if($result_edit_teacher)//result of frm add data 
{
		fn_alert('แก้ไขข้อมูลเสร็จเรียบร้อย');
		window_location("index.php?frm=edit_teacher");
}
if($result_add_teacher)//result of frm add data 
{
		fn_alert('บันทึกข้อมูลเสร็จเรียบร้อย');
		window_location("index.php?frm=add_teacher");
}
if($result_aptitude)//result of frm add data 
{
		fn_alert('บันทึกข้อมูลเสร็จเรียบร้อย');
		window_location("index.php?frm=add_aptitude");
}
if($result_edit_aptitude)//result of frm add data 
{
		fn_alert('แก้ไขข้อมูลเสร็จเรียบร้อย');
		window_location("index.php?frm=edit_aptitude");
}
if($result_add_schedule)//result of frm add data 
{
		fn_alert('จัดตารางสอนเสร็จเรียบร้อย');
		window_location("index.php?frm=show_schedule_follow_place");
		
}

if($_REQUEST['logount'] != '')
{
session_destroy();
echo "<meta http-equiv='refresh' content='0;url=login.php'>";
}
}// if close admin



if($_SESSION['type_user']=='teacher'){//if all teacher
if($_REQUEST['frm'] == '')
{
 echo "<b><font size=2>ยินดีต้อนรับ เข้าสู่ระบบสนับสนุนการจัดตารางสอนเพื่อสถาบันพลังจิตตานุภาพในภาคใต้</font> </b><br>";
 
 $s_teacher_id=$_SESSION['s_teacher_id'];
 $s_type=$_SESSION['s_type'];
 if($_SESSION['s_type'] != '')
 {
 	include("show_teahcer_self.php");
 }
}
if($_REQUEST['frm']=="edit_teacher")
{
include "frm_edit_teacher.php";
}
if($_REQUEST['frm']=="view_self")
{
include "show_schedule_follow_place4.php";
}
if($_REQUEST['frm']=="view_all")
{
include "show_schedule_follow_place5.php";
}
if($_REQUEST['frm']=="view_history")
{
include "show_schedule_follow_place5_1.php";
}

?>
     </div><!-- end of right content-->
                             
</div>   <!--end of center content -->               
                    
<?
include "footer.php";
if($result_t)//result of frm add data 
{
		fn_alert('บันทึกข้อมูลเสร็จเรียบร้อย');
		window_location("index.php?frm=add_holiday");
}
if($result)//result of frm add data 
{
		fn_alert('บันทึกข้อมูลเสร็จเรียบร้อย');
		window_location("index.php?frm=add_topic");
}
if($result_edit)//result of frm add data 
{
		fn_alert('แก้ไขข้อมูลเสร็จเรียบร้อย');
		window_location("index.php?frm=edit_topic");
}
if($result_edit_teacher)//result of frm add data 
{
		fn_alert('แก้ไขข้อมูลเสร็จเรียบร้อย');
		window_location("index.php?frm=edit_teacher");
}
if($result_add_teacher)//result of frm add data 
{
		fn_alert('บันทึกข้อมูลเสร็จเรียบร้อย');
		window_location("index.php?frm=add_teacher");
}
if($result_aptitude)//result of frm add data 
{
		fn_alert('บันทึกข้อมูลเสร็จเรียบร้อย');
		window_location("index.php?frm=add_aptitude");
}
if($result_edit_aptitude)//result of frm add data 
{
		fn_alert('แก้ไขข้อมูลเสร็จเรียบร้อย');
		window_location("index.php?frm=edit_aptitude");
}
if($result_add_schedule)//result of frm add data 
{
		fn_alert('จัดตารางสอนเสร็จเรียบร้อย');
		window_location("index.php?frm=show_schedule_follow_place");
		
}
if($_REQUEST['logount'] != '')
{
session_destroy();
echo "<meta http-equiv='refresh' content='0;url=login.php'>";
}
}// if close teacher


?>	
</body>
</html>