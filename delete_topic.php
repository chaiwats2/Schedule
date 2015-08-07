<?
     include("config/connect.php");
	 include("config/function_db.php");
	 include("config/function_gen.php");
  	 //$id=$_GET['id'];
  echo $id = $_REQUEST['id'];
	 $sql_s="select Topic_Content from $table_topic where Topic_id='$id' ";
	 $query=mysql_query($sql_s) or die("Error");
	 $row = mysql_fetch_array($query);
	// $pic=$row['Topic_Content'];
	 //unlink("file_lession/$pic");
	 
 	// $sql="delete from $table_topic where Topic_id='$id' ";
	// $result=mysql_query($sql) or die ("Error sql delete");
	// if($result)
	// {
	 //	echo "y";
	// }
	 
	echo $sql="delete from $table_topic where Topic_id='$id' ";
	 $result=mysql_query($sql) or die ("Error sql delete");
	 if($result){
	fn_refresh(0,"index.php?frm=delete_topic");}
?>