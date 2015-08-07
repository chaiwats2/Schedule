<?
function select_condition($table,$condition)
{
 $sql="select * from $table where $condition ";
 $query=mysql_query($sql) or die("error sql in function_condition");
 return $query;
}

function select($table)
{
 $sql="select * from $table";
 $query=mysql_query($sql) or die("error sql in function_select");
 return $query;
}

function adddata($tbname) 
{
$QUERY=mysql_query("SHOW FIELDS FROM ".$tbname) or die(mysql_error());
while($FIELD=mysql_fetch_row($QUERY)){
global ${$FIELD[0]};
$TEXTSAVE=${$FIELD[0]};
if (count($TEXTSAVE)>1){$TEXTSAVE=join("",$TEXTSAVE);}
	$input.="'$TEXTSAVE',";
}
$input=substr($input, 0, strlen($input)-1);
$sql="insert into $tbname values($input)";
$re=mysql_query($sql);
return $re;
mysql_free_result($re);
}
function update_tb($tbname,$whereSet) 
{
$QUERY2=mysql_query("SHOW FIELDS FROM ".$tbname) or die(mysql_error());
		while($FIELD=mysql_fetch_row($QUERY2)){
  		global ${$FIELD[0]};
  		$TEXTSAVE=${$FIELD[0]};
		  if (count($TEXTSAVE)>1){$TEXTSAVE=join("",$TEXTSAVE);}
	 		$input2.="$FIELD[0]='$TEXTSAVE',"; 
	}
	$input2=substr($input2, 0, strlen($input2)-1);
	$data2=$input2." where $whereSet";
	mysql_free_result($QUERY2);
	$sql="update  $tbname set $data2"; 
	
	$re=mysql_query($sql);
	return $re;
	mysql_free_result($re);
}

?>