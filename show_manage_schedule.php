<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script language="javascript">
function load_page(mode)
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
		    xmlhttp.open("GET","show_schedule.php?mode="+mode,true);
			xmlhttp.send(null);
			xmlhttp.onreadystatechange = function()
			{
			    if(xmlhttp.readyState == 4)
				{
					document.getElementById("display").innerHTML = xmlhttp.responseText ;
				}
			}
		} 
}  
</script>
</head>
<?
$m = $_REQUEST['m'];
?>
<body onLoad="load_page(<?=$m ?>);">
<span id="display"></span>
</body>
</html>
