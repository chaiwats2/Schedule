<div class="warning_box">
  <b>ลบข้อมูลสถานที่สอนสมาธิ</b>
     </div> 
<table width="620"  cellpadding="2" cellspacing="2" border="0" bordercolor="#CCCCCC">
    	<tr align="center"  height="40" bgcolor="#87d9fa">
            <th scope="col" class="rounded" width="10">ลำดับ</th>
            <th scope="col" class="rounded" width="200">ชื่อสถานที่</th>
            <th scope="col" class="rounded" width="400">ที่อยู่</th>
            <th scope="col" class="rounded" width="10">ลบ</th>
        </tr>
<?
	include("config/connect.php");
	include("config/function_db.php");
	include("config/function_gen.php");
	
	$query = select("$table_place");
	$i=1;
	while($row = mysql_fetch_array($query))
	{
?>
    	<tr  height="30"  bgcolor="#d8ffca">
            <td align="center"><? echo $i;?></td>
            <td><? echo $row['location_name'];?></td>
            <td><? echo $row['address'];?></td>
<td align="center"> <a href="delete_place.php?id=<? echo $row['id']; ?>" onClick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?');"><img src="images/trash.png" alt="" title="" border="0" /></a></td>
           <? /*?> <td align="center"><a href="" onclick="return delete_data(<? echo $row['id']; ?>);"><img src="images/trash.png" alt="" title="" border="0" /></a></td> <? */?>
        </tr>
<?
 $i++;
  }
?>  
        
    </tbody>

<? 
 ?> 
</table>
 <? /*
<script type="text/javascript">
function delete_data(id)
{
 var result=confirm('คุณต้องการลบข้อมูลหรือไม่ ?');
 if(result == true)
 {
 var xmlhttp=null;
 if(window.ActiveObject){
  		xmlhttp = new ActiveObject("Microsoft.XMLHTTP");}
  else if(window.XMLHttpRequest){
  		xmlhttp = new XMLHttpRequest();}
  else{ 
       alert("browser dose not suppost AJAX");}
	   
        if(xmlhttp != null)
		{
		    xmlhttp.open("GET","delete_place.php?id="+id,true);
			xmlhttp.send(null);
			xmlhttp.onreadystatechange = function()
			{
			    if(xmlhttp.readyState == 4)
				{
				
				
				
						if(xmlhttp.responseText = 'y')
						{
						      window.location="index.php?frm=delete_place";
						
						}
						else { window.location="test.php";}	
						
				}
			}
		}
   }
}
</script> 
*/ ?>