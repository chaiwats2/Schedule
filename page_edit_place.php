<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Untitled Document</title>
</head>
<body>
<div class="valid_box">
  <b>แก้ไขข้อมูลสถานที่สอนสมาธิ</b>
     </div> 
                   
<table width="620"  cellpadding="2" cellspacing="2" border="0" bordercolor="#CCCCCC">
    	<tr  height="40" bgcolor="#87d9fa">
            <th scope="col" class="rounded" width="10">ลำดับ</th>
            <th scope="col" class="rounded" width="200">ชื่อสถานที่</th>
            <th scope="col" class="rounded" width="400">ที่อยู่</th>
            <th scope="col" class="rounded" width="10">แก้ไข</th>
        </tr>
<?
	include("config/connect.php");
	include("config/function_db.php");
	
	$query = select("$table_place");
	$i=1;
	while($row = mysql_fetch_array($query))
	{
?>
    	<tr  height="30"  bgcolor="#d8ffca">
            <td  align="center"><? echo $i;?></td>
            <td><? echo $row['location_name'];?></td>
            <td><? echo $row['address'];?></td>

            <td align="center" ><a href="index.php?frm=frm_edit_place&id=<? echo $row['id']; ?>"><img src="images/user_edit.png" alt="" title="" border="0" /></a></td>
        </tr>
<?
$i++;
  }
?>     
    </tbody>
</table>
</body>
</html>
