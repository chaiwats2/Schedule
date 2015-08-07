<?
     include("config/connect.php");
	 include("config/function_db.php");
	include("config/function_gen.php");
	// $id=$_REQUEST['id'];
  	 //$id=$_GET['id'];
//echo "111111111111111111111111111111111111";
 //	 $sql="delete from $table_place where id='$id' ";
	// $result=mysql_query($sql) or die ("Error sql delete");
	 
	 
	 
//	 if($_REQUEST['id'] != '')
 // {
  	$id = $_REQUEST['id'];
	$sql="delete from $table_place where id='$id' ";
	$result=mysql_query($sql) or die ("Error sql delete");
	if($result){
		
		
		
	fn_refresh(0,"index.php?frm=delete_place");}
	
//	}
	/* if($result)
	 {
	 	echo "y";
	 }*/
?>