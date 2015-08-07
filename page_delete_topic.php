<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<div class="warning_box">
  <b>ลบข้อมูลหัวข้อสมาธิ</b>
     </div> 
<table width="620"  cellpadding="2" cellspacing="2" border="0" bordercolor="#CCCCCC">
    	<tr align="center" height="40" bgcolor="#87d9fa">
			 <th scope="col" class="rounded" >หัวข้อที่</th>
			<th scope="col" class="rounded">ชื่อหัวข้อ</th>
            <th scope="col" class="rounded">ลบ</th>
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
			$Qtotal = select("$table_topic");; //คิวรี่ คำสั่ง
			$total = mysql_num_rows($Qtotal);
	
	$query = mysql_query("select * from $table_topic ORDER BY Topic_id ASC LIMIT $start,$limit "); 
	//$query = select("$table_topic");

	$i=1;
  while($row = mysql_fetch_array($query))
  {
?>
    	<tr  height="30"  bgcolor="#d8ffca">
            <td align="center"><?=$row['Book_id'].".".$row['Topic_Topicid'].".". $row['Topic_Lessonid'];?></td>
			<td><? echo $row['Topic_Name'];?></td>
            <td align="center"> <a href="delete_topic.php?id=<? echo $row['Topic_id']; ?>" onClick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?');"><img src="images/trash.png" alt="" title="" border="0" /></a></td>
           <? /* <td align="center"><a href="#" onClick="return delete_data(<? echo $row['Topic_id']; ?>);"><img src="images/trash.png" alt="" title="" border="0" /></a></td> */?>
        </tr>
<?
$i++;
  }
?>  
<td colspan="6">
<br>
<?
  printf("มีหัวข้อ %d หัวข้อ / ",$total);
			printf("แสดงหน้าละ %d หัวข้อ <br />",$limit);
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
					echo "<font color='#ff0000'>[<a href='?frm=delete_topic&start=".$limit*($i-1)."&page=$i' style='text-decoration:none;'><B>$i</B></a>]</font>"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 1
				}
				else
				{
					echo "[<a href='?frm=delete_topic&start=".$limit*($i-1)."&page=$i' style='text-decoration:none;'>$i</a>]"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 2
				}
			}
?>    
</td>
</tr>
<span id="output"></span>  <? /*     
<script type="text/javascript">
function delete_data(id)
{
 var result=confirm('คุณต้องการลบข้อมูลหรือไม่ ?');
 if(result ==true)
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
		    xmlhttp.open("GET","delete_topic.php?id="+id,true);
			xmlhttp.send(null);
			xmlhttp.onreadystatechange = function()
			{
			    if(xmlhttp.readyState == 4)
				
				{
				
						if(xmlhttp.responseText = 'y')
						{
						      window.location="index.php?frm=delete_topic";
						}		
				}
			}
		}
	}
}
</script> */ ?>
</table>
</body>
</html>
