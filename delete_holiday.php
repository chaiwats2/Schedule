<?
     include("config/connect.php");
	 include("config/function_db.php");
	 include("config/function_gen.php");
  	// $id=$_GET['id'];

 	// $sql="delete from $table_holiday where id='$id' ";
	// $result=mysql_query($sql) or die ("Error sql delete");
	// if($result)
	// {
	// 	echo "y";
	// }
	 
	 
	 $id = $_REQUEST['id'];
	 $sql="delete from $table_holiday where id='$id' ";
	 $result=mysql_query($sql) or die ("Error sql delete");
	 if($result){
	fn_refresh(0,"index.php?frm=delete_holiday");}
?>