<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<div class="valid_box">
   <b>แก้ไขข้อมูลวันหยุด</b>
</div>
                    
                    
<table width="620"  cellpadding="2" cellspacing="2" border="0" bordercolor="#CCCCCC">
    	<tr align="center" height="40" bgcolor="#87d9fa">
            <th scope="col" class="rounded" width="10">ลำดับ</th>
            <th scope="col" class="rounded">วันเริ่มต้น</th>
            <th scope="col" class="rounded">วันสิ้นสุด</th>
			<th scope="col" class="rounded">ชื่อวันหยุด</th>
            <th scope="col" class="rounded">แก้ไข</th>
        </tr>
<?
	include("config/connect.php");
	include("config/function_db.php");
	
	$query = select("$table_holiday");
	$i=1;
	while($row = mysql_fetch_array($query))
	{
?>
    	<tr height="30"  bgcolor="#d8ffca">
            <td align="center"><? echo $i;?></td>
            <td><? echo $row['Date_begin'];?></td>
            <td><? echo $row['Date_end'];?></td>
			<td><? echo $row['Name_holiday'];?></td>
            <td align="center" ><a href="index.php?frm=frm_edit_holiday&id=<? echo $row['id']; ?>"><img src="images/user_edit.png" alt="" title="" border="0" /></a></td>
        </tr>
<?
	$i++;
  }
?>         

</table>
</body>
</html>
