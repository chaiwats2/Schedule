<? session_start(); ?>
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
</head>
<body>
<div class="valid_box">
  <b>แสดงตารางการสอนของมูลอาจารย์รายบุคคล</b>
     </div>
 <div>
 </div>
<table width="620"  cellpadding="2" cellspacing="2" border="0" bordercolor="#CCCCCC" >
   	  <tr height="40" bgcolor="#87d9fa">
            <th scope="col" class="rounded">รหัส</th>
            <th scope="col" class="rounded">ชื่อ-นามสกุล</th>
            <th scope="col" class="rounded">เลขที่บัตรประจำตัวประชาชน</th>
			<th scope="col" class="rounded">วัน-เดือน-ปี เกิด</th>
            <th scope="col" class="rounded">ประเภทอาจารย์</th>
			<th scope="col" class="rounded" align="center">ประวัติการสอน</th>
        </tr>
<?
	include("config/connect.php");
	include("config/function_db.php");
	$que2 = select("$table_easy_place");
	$l=0;
	while($rww = mysql_fetch_array($que2))
	{
	 $Tid[$l] = $rww['T_id'];
	 $Pid[$l] = $rww['P_id']; 	
	 $l++;
	}
	$c = $l+1;
	$que3 = select("$table_place");
	
	$e=0;
	while($rw = mysql_fetch_array($que3))
	{
	 $Pl_id[$e] = $rw['id'];
	 $L_na[$e] = $rw['location_name']; 	
	 $e++;
	}
	$start =$_REQUEST[start];
	$limit =$_REQUEST[limit];
	if(!isset($start))
			{
			$start = 0;
			}
			$limit = 15; // แสดงผลหน้าละกี่หัวข้อ
			/* หาจำนวน record ทั้งหมด
			ปล. อันนี้ต้องใช้กับตัวแบ่งนะ ห้ามเอาออก*/
			$Qtotal = select("$table_teacher");; //คิวรี่ คำสั่ง
			$total = mysql_num_rows($Qtotal);
	
	$query = mysql_query("select * from $table_teacher ORDER BY ID ASC LIMIT $start,$limit ");
	$i=1; 
	while($row = mysql_fetch_array($query))
	{
			$str_b="<table cellspacing=2 cellpadding=2 border=0  width=300 class=tbl  bgcolor=#FFFFFF>";
			$str_pic="<tr><td colspan=2 align=center> <img src=picture_teacher/$row[T_Pic]  width=70 hieght=200 /><br/>ชื่อรูป : $row[T_Pic]</</td></tr>";
			$str="<tr><td>รหัสอาจารย์ :</td><td>".$row['ID']."</td></tr>";
			$str1="<tr><td>ชื่อ-นามสกุล :</td><td>".$row['T_name']." ". $row['T_surname']."</td></tr>";
			$str2="<tr><td>เลขที่ประจำตัวประชารชน :</td><td>".$row['T_IDcard']."</td></tr>";
			$str3="<tr><td >วัน เดือน ปี เกิด :</td><td>".$row['T_Birth']."</td></tr>";
			$str4="<tr><td>ชื่อล็อกอิน :</td><td>".$row['T_username']."</td></tr>";
			$str5="<tr><td >รหัสผ่าน :</td><td>".$row['T_password']."</td></tr>";
			$str6="<tr><td >รหัสประจำตัวประชารชน :</td><td>".$row['T_password']."</td></tr>";
			$str8="<tr><td >ที่อยู่ :</td><td>".$row['T_Add']."</td></tr>";
			$str9="<tr><td >อีเมลล์ :</td><td>".$row['T_Email']."</td></tr>";
			$str10="<tr><td>โทรศัพท์ :</td><td>".$row['T_Phone']."</td></tr>";
			$str11="<tr><td>รุ่นศึกษา :</td><td>".$row['T_Study']."</td></tr>";
			//$str12="<tr><td>รุ่นธุดงค์ :</td><td>".$row['T_Thudong']."</td></tr>";
			//$str13="<tr><td>รุ่นอาจาริยสา :</td><td>".$row['T_Ajariyasa']."</td></tr>";
			if($row['T_Type'] =='TM'){$type_t="อาจารย์เชี่ยวชาญ";}if($row['T_Type'] =='TC'){$type_t="อาจารย์ปานกลาง";}if($row['T_Type'] =='TS'){$type_t="อาจารย์มาใหม่";}
			$str14="<tr><td>ประเภท :</td><td>".$type_t."</td>";
			$str15="<tr><td rowspan=".$c." valign=top>สถานที่สะดวกสอน :</td></tr>";	
					
			for($k=0;$k<$l;$k++)
			{
			  if($Tid[$k] == $row['ID'])
			  {
			  	for($p=0;$p<$e;$p++)
				{
					if($Pid[$k] == $Pl_id[$p])
			  		{
			  		   $str16=$str16."<tr><td>".$L_na[$p]."</td></tr>";
					}
				}
			  }
			}
			$str_l="</table>";
			$tb1="<table cellspacing=2 cellpadding=2 border=0  width=200 class=tbl height=200 bgcolor=#FFFFFF>";
			$tb2="<tr><td align=center> <img src=picture_teacher/$row[T_Pic]  width=200 hieght=200 /><br/>ชื่อรูป : $row[T_Pic]</</td></tr>";
			$tb3="</table>";
//$str_cmp=$str_b.$str.$str1.$str2.$str3.$str4.$str5.$str6.$str7.$str8.$str9.$str10.$str11.$str12.$str13.$str14.$str15.$str16.$str_l;
$table2 =$tb1.$tb2.$tb3;
//$str16='';
?>
    	<tr  height="30"  bgcolor="#d8ffca">
            <td align="center"><a href="#" onMouseover="showhint('<? echo $table2;?>', this, event, '150px')" style="text-decoration:none"><? echo $row['ID'];?></a></td>
            <td><? echo $row['T_name']." ".$row['T_surname'];?></td>
            <td><? echo $row['T_IDcard'];?></td>
			<td><? echo $row['T_Birth'];?></td>
			<td><? if($row['T_Type'] =='TM'){echo"อาจารย์เชี่ยวชาญ";}if($row['T_Type'] =='TC'){echo"อาจารย์ปานกลาง";}if($row['T_Type'] =='TS'){echo"อาจารย์มาใหม่";}?></td>
            <td align="center"><a href="index.php?frm=show_self&id=<? echo $row['ID']; ?>" onMouseover="showhint('<? echo $str_cmp;?>', this, event, '150px')"><img src="images/add.png" alt="" title="" border="0" /></a></td>
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
				if($_REQUEST[page]==$i)
				{ //ถ้าตัวแปล page ตรง กับ เลขที่วนได้
					echo "<font color='#ff0000'>[<a href='?frm=show_self_teacher&start=".$limit*($i-1)."&page=$i' style='text-decoration:none;'><B>$i</B></a>]</font>"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 1
				}
				else
				{
					echo "[<a href='?frm=show_self_teacher&start=".$limit*($i-1)."&page=$i' style='text-decoration:none;'>$i</a>]"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 2
				}
			}
?>    
</td>
</tr>
</table>

</body>
</html>
