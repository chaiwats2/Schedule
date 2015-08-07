<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<div class="warning_box">
  <b>ลบข้อมูลวันหยุด</b>
     </div> 
   <table width="620"  cellpadding="2" cellspacing="2" border="0" bordercolor="#CCCCCC">
    	<tr align="center" height="40" bgcolor="#87d9fa">
            <th scope="col" class="rounded" width="10">ลำดับ</th>
            <th scope="col" class="rounded">วันเริ่มต้น</th>
            <th scope="col" class="rounded">วันสิ้นสุด</th>
			<th scope="col" class="rounded">ชื่อวันหยุด</th>
            <th scope="col" class="rounded">ลบ</th>
        </tr>

<?
	include("config/connect.php");
	include("config/function_db.php");
	
	$query = select("$table_holiday");
	$i=1;
	while($row = mysql_fetch_array($query))
	{
?>
    	   <tr  height="30"  bgcolor="#d8ffca">
            <td align="center"><? echo $i;?></td>
            <td><? echo $row['Date_begin'];?></td>
            <td><? echo $row['Date_end'];?></td>
			<td><? echo $row['Name_holiday'];?></td>
            <td align="center"> <a href="delete_holiday.php?id=<? echo $row['id']; ?>" onClick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?');"><img src="images/trash.png" alt="" title="" border="0" /></a></td>
            <? /* ?><td align="center"><a href=""  onclick="return delete_data(<? echo $row['id']; ?>);"><img src="images/trash.png" alt="" title="" border="0" /></a></td> <? */?>
        </tr>

<?
$i++;
  }
?>         
</table>
 <? /*
<script type="text/javascript">
function delete_data(id)
{
 var result = confirm('คุณต้องการลบข้อมูลหรือไม่ ?');
 if(result == true)
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
		    xmlhttp.open("GET","delete_holiday.php?id="+id,true);
			xmlhttp.send(null);
			xmlhttp.onreadystatechange = function()
			{
			    if(xmlhttp.readyState == 4)
				{
						if(xmlhttp.responseText == 'y')
						{
						      window.location="index.php?frm=delete_holiday";
						
						}	
						
				}
			}
		}
	}
}
</script> */ ?>
</body>
</html>
