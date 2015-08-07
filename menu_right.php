<? session_start(); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?

	include("config/connect.php");
	$sql="select * from $table_place";
	$query = mysql_query($sql) or die("error");
	if($_SESSION['type_user'] =='s_admin'){
?>
 <div class="sidebarmenu">
 				<? if($_SESSION['type_user'] == 's_admin') { ?>
                <a class="menuitem submenuheader" href="">จัดการข้อมูลอาจารย์</a>
                <div class="submenu">
                    <ul>
                    <li><a href="index.php?frm=add_teacher">เพิ่มข้อมูลอาจารย์</a></li>
                    <li><a href="index.php?frm=edit_teacher">แก้ไขข้อมูลอาจารย์</a></li>
                    <li><a href="index.php?frm=delete_teacher">ลบข้อมูลอาจารย์</a></li>
                    </ul>
                </div>
                
				<a class="menuitem" href="index.php?frm=add_aptitude">จัดการความถนัด</a>
                <a class="menuitem submenuheader" href="">จัดการข้อมูลสถานที่สอนสมาธิ</a>
                <div class="submenu">
                    <ul>
                    <li><a href="index.php?frm=add_place">เพิ่มข้อมูลสถานที่</a></li>
                    <li><a href="index.php?frm=edit_place">แก้ไขข้อมูลสถานที่</a></li>
                    <li><a href="index.php?frm=delete_place">ลบข้อมูลสถานที่</a></li>
                    </ul>
                </div>
                <a class="menuitem submenuheader" href="">จัดการข้อมูลหัวข้อสมาธิ</a>
                <div class="submenu">
                    <ul>
                    <li><a href="index.php?frm=add_topic">เพิ่มข้อมูลหัวข้อมูลสมาธิ</a></li>
                    <li><a href="index.php?frm=edit_topic">แก้ไขข้อมูลหัวข้อสมาธิ</a></li>
                    <li><a href="index.php?frm=delete_topic">ลบข้อมูลหัวข้อสมาธิ</a></li>
                    </ul>
                </div>
				<a class="menuitem submenuheader" href="">จัดการข้อมูลวันหยุด</a>
                <div class="submenu">
                    <ul>
                    <li><a href="index.php?frm=add_holiday">เพิ่มข้อมลวันหยุด</a></li>
                    <li><a href="index.php?frm=edit_holiday">แก้ไขข้อมูลวันหยุด</a></li>
                    <li><a href="index.php?frm=delete_holiday">ลบข้อมูลวันหยุด</a></li>
                    </ul>
                </div>
				<a class="menuitem submenuheader" href="">จัดการตารางสอน</a>
                <div class="submenu">
                    <ul>
                    <li><a href="index.php?frm=manage_schedule">จัดตารางสอน</a></li>
                    <li><a href="index.php?frm=show_schedule_follow_place">แก้ไขตารางสอน</a></li>
                     
                    </ul>
                </div>
                <a class="menuitem submenuheader" href="">ตารางสอน</a>
                <div class="submenu">
                    <ul>
                    
                    <li><a href="index.php?frm=show_self_teacher">ดูตารางสอนอาจารย์รายบุคคล</a></li>
                    <li><a href="index.php?frm=show_self_all">ดูตารางสอนอาจารย์ทั้งหมด</a></li>
                     <li><a href="index.php?frm=History">ประวัติการสอน</a></li>
                    </ul>
                </div>
                
				<? } 
                
  ?>      
				<? if($_SESSION['type_user'] == 'teacher' || $_SESSION['type_user']=='admin'||$_SESSION['type_user'] == 's_admin') { ?>
				<a class="menuitem submenuheader" href="">แสดงข้อมูลตารางสอน</a>
                <div class="submenu">
                    <ul>
					<? while($row=mysql_fetch_array($query)){ ?>
                    	<li><a href="index.php?frm=show_schedule_teacher&id_place=<?=$row['id'] ?>"><? echo $row['location_name']; ?></a></li>
					<? } ?>
					</ul>
                </div>
				<? } ?>
                <a class="menuitem submenuheader" href="">จัดการข้อมูลผู้ดูแลระบบ</a>
                <div class="submenu">
                    <ul>
                    <li><a href="index.php?frm=add_admin">เพิ่มข้อมูล</a></li>
                    <li><a href="index.php?frm=edit_admin">แก้ไขข้อมูล</a></li>
                    <li><a href="index.php?frm=delete_admin">ลบข้อมูล</a></li>
                    </ul>
                </div>
  		</div>
        <? }  else if ($_SESSION['type_user'] =='admin'){/////////ผู้ดูแลระบบระดับสาขา
			
?>
 <div class="sidebarmenu">
 				
                <a class="menuitem submenuheader" href="">จัดการข้อมูลอาจารย์</a>
                <div class="submenu">
                    <ul>
                    <li><a href="index.php?frm=add_teacher">เพิ่มข้อมูลอาจารย์</a></li>
                    <li><a href="index.php?frm=edit_teacher">แก้ไขข้อมูลอาจารย์</a></li>
                    <li><a href="index.php?frm=delete_teacher">ลบข้อมูลอาจารย์</a></li>
                    </ul>
                </div>
				<a class="menuitem" href="index.php?frm=add_aptitude">จัดการความถนัด</a>
                
				
				<a class="menuitem submenuheader" href="">จัดการตารางสอน</a>
                <div class="submenu">
                    <ul>
                    <li><a href="index.php?frm=show_self_teacher">ดูตารางสอนอาจารย์รายบุคคล</a></li>
                   
                    <li><a href="index.php?frm=show_schedule_follow_place">ดูตารางสอนทั้งหมด</a></li>
                    </ul>
                </div>
                <a class="menuitem submenuheader" href="">จัดการประวัติการสอน</a>
                <div class="submenu">
                    <ul>
                    <li><a href="index.php?frm=add_topic">ดูประวัติการสอน</a></li>
                    </ul>
                </div>
			
	
  		</div>
		
		<?
			
			
			}else if ($_SESSION['type_user'] =='teacher'){ //// อาจารย์
				
				
				
?>
 <div class="sidebarmenu">
 				
                <a class="menuitem submenuheader" href="">จัดการข้อมูล</a>
                <div class="submenu">
                    <ul>
                    <li><a href="index.php?frm=edit_teacher">แก้ไขข้อมูลสว่นตัว</a></li>
                    </ul>
                </div>
				<a class="menuitem submenuheader" href="">จัดการตารางสอน</a>
                <div class="submenu">
                    <ul>
                    <li><a href="index.php?frm=view_self">ดูตารางสอนตัวเอง</a></li>
                    <li><a href="index.php?frm=view_all">ดูตารางสอนทั้งหมด</a></li>
                    </ul>
                </div>
                <a class="menuitem submenuheader" href="">จัดการประวัติการสอน</a>
                <div class="submenu">
                    <ul>
                    <li><a href="index.php?frm=view_history">ดูประวัติการสอน</a></li>
                    </ul>
                </div>
				
			
                
      
  		</div>
        <?
				
				
				
				}  ?>
        
</body>
</html>
