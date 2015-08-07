<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
  <b>เพิ่มข้อมูลความถนัดอาจารย์</b>
</div> 
<table width="620"  cellpadding="2" cellspacing="2" border="0" bordercolor="#CCCCCC" >
    	<tr align="center" height="40" bgcolor="#87d9fa">
            <th scope="col" class="rounded">รหัส</th>
            <th scope="col" class="rounded">ชื่อ-นามสกุล</th>
            <th scope="col" class="rounded">เลขที่บัตรประจำตัวประชาชน</th>
			<th scope="col" class="rounded">วัน-เดือน-ปี เกิด</th>
            <th scope="col" class="rounded">ประเภทอาจารย์</th>
			<th scope="col" class="rounded" >เพิ่ม</th>
        </tr>
<?
	include("config/connect.php");
	include("config/function_db.php");
	$start =$_REQUEST[start];
	$limit =$_REQUEST[limit];
	if(!isset($start))
			{
			$start = 0;
			}
			$limit = '15'; // แสดงผลหน้าละกี่หัวข้อ
			/* หาจำนวน record ทั้งหมด
			ปล. อันนี้ต้องใช้กับตัวแบ่งนะ ห้ามเอาออก*/
			$Qtotal = select("$table_teacher");; //คิวรี่ คำสั่ง
			$total = mysql_num_rows($Qtotal);
	
	$query = mysql_query("select * from $table_teacher ORDER BY ID ASC LIMIT $start,$limit ");
	//$query = select("$table_teacher");
	
	$que = select("$table_aptitude");
	
	$que2 = select("$table_topic");
	$l=0;
	while($rww = mysql_fetch_array($que2))
	{
	 $Tpc_n[$l] = $rww['Topic_Name'];
	 $Tpc_tid[$l] = $rww['Topic_id']; 	
	 $TpcM[$l]= $rww['Topic_Topicid'];
	  $TpcL[$l]= $rww['Topic_Lessonid'];
	  $Book_id[$l]= $rww['Book_id'];
	 $l++;
	}
	
	$j=0;
	while($rw = mysql_fetch_array($que))
	{
	 $Tpc_id[$j] = $rw['Topic_id'];
	 $Tch_id[$j] = $rw['T_id'];
	 $j++;
	}
		$c = $j+1;
	$i=1;
	while($row = mysql_fetch_array($query))
	{
			$str_b="<table cellspacing=2 cellpadding=2 border=0  width=250 class=tbl  bgcolor=#FFFFFF>";
			$str_pic="<tr><td colspan=2 align=center> <img src=picture_teacher/$row[T_Pic]  width=70 hieght=200 /><br/>ชื่อรูป : $row[T_Pic]</</td></tr>";
			$str="<tr hieght=500><td>รหัสอาจารย์ :</td><td>".$row['ID']."</td></tr>";
			$str1="<tr><td>ชื่อ-นามสกุล :</td><td>".$row['T_name']." ". $row['T_surname']."</td></tr>";
			$str2="<tr><td>เลขที่ประจำตัวประชารชน :</td><td>".$row['T_IDcard']."</td></tr>";
			$str3="<tr><td>รุ่นศึกษา :</td><td>".$row['T_Study']."</td></tr>";
			
			$str6="<tr><td rowspan=".$c ." valign=top>หัวข้อที่ถนัด :</td></tr>";

			for($k=0;$k<$j;$k++)
			{
			  if($Tch_id[$k] == $row['ID'])
			  {
			  	for($p=0;$p<$l;$p++)
				{
					if($Tpc_id[$k] == $Tpc_tid[$p])
			  		{
			  		$str7=$str7."<tr><td>".$Book_id[$p].".".$TpcM[$p].".".$TpcL[$p]." ".$Tpc_n[$p]."</td></tr>";
					$topic_id[] = $Tpc_id[$k];
					}
				}
			  }
			}
			if($row['T_Type'] =='TM'){$type_t="อาจารย์เชี่ยวชาญ";}if($row['T_Type'] =='TC'){$type_t="อาจารย์ปานกลาง";}if($row['T_Type'] =='TS'){$type_t="อาจารย์มาใหม่";}
			$str14="<tr><td>ประเภท :</td><td>".$type_t."</td></tr>";
			$str_l="</table>";
			$str_cmp=$str_b.$str_pic.$str.$str1.$str2.$str3.$str4.$str5.$str6.$str7.$str8.$str_l;
			$str7='';
?>
    	<tr  height="30"  bgcolor="#d8ffca">
            <td align="center">
			<?
			 $sql_ap="select * from aptitude where T_id='$row[ID]' ";
			 $query_ap = mysql_query($sql_ap) or die("error");
			 $num = mysql_num_rows($query_ap);
				$alert="<table bgcolor=#FFFFFF><tr><td>ยังไม่ป้อนข้อมูลความถนัด</td></tr></tabel>";
				if($num ==0)
				{
				echo "<a href\"#\" onMouseover=\"showhint('$alert', this, event, '150px','100px')\"><font color=#FF0000>".$row['ID']."</font></a>";
				}
				else
				{
				echo $row['ID'];
				}
			?>
			</td>
            <td>
			<? 
	
				if($num ==0)
				{
				echo "<a href\"#\" onMouseover=\"showhint('$alert', this, event, '150px','100px')\"><font color=#FF0000>".$row['T_name']." ".$row['T_surname']."</font></a>";
				}
				else
				{
				echo $row['T_name']." ".$row['T_surname'];
				}
			?>
			</td>
            <td>
			<? 
				if($num ==0)
				{
				echo "<a href\"#\" onMouseover=\"showhint('$alert', this, event, '150px','100px')\"><font color=#FF0000>".$row['T_IDcard']."</font></a>";
				}
				else
				{
				echo $row['T_IDcard'];
				}
			?>
			</td>
			<td>
			<? 
				if($num ==0)
				{
				echo "<a href\"#\" onMouseover=\"showhint('$alert', this, event, '150px','100px')\"><font color=#FF0000>".$row['T_Birth']."</font></a>";
				}
				else
				{
				echo $row['T_Birth'];
				}
			?>
			</td>
			<td><? 
				if($row['T_Type'] =='TM')
				{
					if($num ==0)
					{
						echo "<a href\"#\" onMouseover=\"showhint('$alert', this, event, '150px','100px')\"><font color=#FF0000>อาจารย์เชี่ยวชาญ</font></a>";
					}
					else
					{
						echo"อาจารย์เชี่ยวชาญ";
					}
				}
				if($row['T_Type'] =='TC')
				{
					if($num ==0)
					{
						echo "<a href\"#\" onMouseover=\"showhint('$alert', this, event, '150px','100px')\"><font color=#FF0000>อาจารย์ปานกลาง</font></a>";
					}
					else
					{
						echo"อาจารย์ปานกลาง";
					}
				}
				if($row['T_Type'] =='TS')
				{
					if($num ==0)
					{
						echo "<a href\"#\" onMouseover=\"showhint('$alert', this, event, '150px','100px')\"><font color=#FF0000>อาจารย์มาใหม่</font></a>";
					}
					else
					{
						echo"อาจารย์มาใหม่";
					}
	
				}?></td>
            <td align="center"><a href="index.php?frm=frm_add_aptitude&id=<?=$row['ID']; ?> " onMouseover="showhint('<? echo $str_cmp;?>', this, event, '150px')"><img src="images/add.png" alt="" title="" border="0" /></a></td>
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
					echo "<font color='#ff0000'>[<a href='?frm=add_aptitude&start=".$limit*($i-1)."&page=$i' style='text-decoration:none;'><B>$i</B></a>]</font>"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 1
				}
				else
				{
					echo "[<a href='?frm=add_aptitude&start=".$limit*($i-1)."&page=$i' style='text-decoration:none;'>$i</a>]"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 2
				}
			}
?>    
</td>
</tr>   
</table>
</body>
</html>
