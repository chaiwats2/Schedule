<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Untitled Document</title>
<head>
<style type="text/css">
#hintbox{ /*CSS for pop up hint box */
position:absolute;
top: 0;
background-color: none;
width: 150px; /*Default width of hint.*/
padding: 0px 250px 0px 0px;
font:normal 11px Verdana;
visibility: hidden;
margin: 5px;
}

.hintanchor{ /*CSS for link that shows hint onmouseover*/
font-weight: bold;
color: navy;
margin: 3px 8px;
}

</style>
<script language="javascript" type="text/javascript" src="script_showhint.js"></script>
</head><body>
<div class="valid_box">
  <b>แก้ไขข้อมูลผู้ดูแลระบบระดับสาขา</b>
     </div> 
<table width="620"  cellpadding="2" cellspacing="2" border="0" bordercolor="#CCCCCC" >
    	<tr height="40" bgcolor="#87d9fa">
            <th scope="col" class="rounded">รหัส</th>
            <th scope="col" class="rounded">ชื่อผู้ใช้</th>
            <th scope="col" class="rounded">ชื่อ-นามสกุล</th>
            <th scope="col" class="rounded">อีเมลล์</th>
			<th scope="col" class="rounded" align="center">แก้ไข</th>
        </tr>
<?
	include("config/connect.php");
	include("config/function_db.php");
	
	
	if(!isset($start))
			{
			$start = 0;
			}
			$limit = '15'; // แสดงผลหน้าละกี่หัวข้อ
			/* หาจำนวน record ทั้งหมด
			ปล. อันนี้ต้องใช้กับตัวแบ่งนะ ห้ามเอาออก*/
			$Qtotal = select("$table_admin");; //คิวรี่ คำสั่ง
			$total = mysql_num_rows($Qtotal);
	
	$query = mysql_query("select * from $table_admin ORDER BY ID ASC LIMIT $start,$limit ");
	$i=1; 
	while($row = mysql_fetch_array($query))
	{
			
?>
    	<tr  height="30"  bgcolor="#d8ffca">
            <td align="center"><? echo $row['ID'];?></td>
             <td><? echo $row['Username'];?></td>
            <td><? echo $row['prefix_name'].$row['Name']." ".$row['Surname'];?></td>
            <td><? echo $row['Email'];?></td>
			
			
            <td align="center"><a href="index.php?frm=frm_edit_admin&id=<? echo $row['ID']; ?>" ><img src="images/user_edit.png" alt="" title="" border="0" /></a></td>
        </tr>
<?
	$i++;
  }
?>
<tr>
<td colspan="6">
<br>
<?
  printf("มีอาจารย์ %d ท่าน / ",$total);
			printf("แสดงหน้าละ %d ท่าน<br />",$limit);
			echo "<hr />";
			
			/* วนลูปข้อมูล */
			
			echo "<hr>";
			
			/* ตัวแบ่งหน้า */
				$page = ceil($total/$limit);
			
			 // เอา record ทั้งหมด หารด้วย จำนวนที่จะแสดงของแต่ละหน้า
			
			/* เอาผลหาร มาวน เป็นตัวเลข เรียงกัน เช่น สมมุติว่าหารได้ 3 เอามาวลก็จะได้ 1 2 3 */
			for($i=1;$i<=$page;$i++)
			{
				if($_GET['page']==$i)
				{ //ถ้าตัวแปล page ตรง กับ เลขที่วนได้
					echo "<font color='#ff0000'>[<a href='?frm=edit_admin&start=".$limit*($i-1)."&page=$i' style='text-decoration:none;'><B>$i</B></a>]</font>"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 1
				}
				else
				{
					echo "[<a href='?frm=edit_admin&start=".$limit*($i-1)."&page=$i' style='text-decoration:none;'>$i</a>]"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 2
				}
			}
?>    
</td>
</tr>
</table>

</body>
</html>
