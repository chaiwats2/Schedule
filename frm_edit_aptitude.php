<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
.txt
{
	border:1px #CCCCCC solid; vertical-align:middle; font:12px/15px Arial, Helvetica, sans-serif;
	background:none;
	height:25px;
	-moz-border-radius: 5px;
-webkit-border-radius: 5px;
-khtml-border-radius: 5px;
}
.btn
{
	background:#2daebf;
	font-family:Tahoma, Geneva, sans-serif;
	font-size:14px;  
	padding: 5px 10px 5px 10px;
	color: #fff;
	font-weight: bold;
	-moz-border-radius: 6px;
	-webkit-border-radius: 6px;
	-moz-box-shadow: 0 1px 3px rgba(0,0,0,0.5);
	-webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.5);
	text-shadow: 0 -1px 1px rgba(0,0,0,0.25);
	border-bottom: 1px solid rgba(0,0,0,0.25);
	cursor: pointer;
	border-left:none;
	border-top:none;
	margin:10px 0 10px 0;
}

</style>
<title>Untitled Document</title>
</head>
<body>
<div class="valid_box">
  <b>แก้ไขข้อมูลความถนัดอาจารย์</b>
</div> 
<?
include("config/connect.php");
include("config/function_db.php");
include("config/function_gen.php");
if($_REQUEST['id'] != '')
{
	$id = $_REQUEST['id'];
 	$condition="ID='$id'"; 
	$que=select_condition($table_teacher,$condition);
	$row=mysql_fetch_array($que);	
	
	$teacher_id = $row['T_id'];
	
	$query = select("$table_topic");
	$query2 = select("$table_aptitude");
	
	$l=0;
	while($rww = mysql_fetch_array($query2))
	{
		$tpc_th[$l]=$rww['T_id'];
		$tpc_id[$l]=$rww['Topic_id'];
		$src_ap[$l]=$rww['score_aptitude'];
		$l++;
	}
}
?>
<div class="form">
	   <form class="niceform" action="" method="post">
       <fieldset>
  					 <dl>
                        <dt><label for="T_id">รหัสอาจารย์ :</label></dt>
						<input type="hidden" value="<?=$row['T_id']; ?>" name="id_teacher" id="id_teacher"/>
                        <dd><input type="text" name="T_id" id="T_id" size="40" value="<?=$row['T_id']; ?>" disabled="disabled" class="txt"/></dd>
                    </dl>
                    <dl>
                        <dt><label for="T_username">ชื่อ-นามสกุล :</label></dt>
                        <dd><input type="text" name="T_username" id="T_username" size="40" value="<?=$row['T_name']." ".$row['T_surname']; ?>" disabled="disabled" class="txt"/></dd>
                    </dl>
					 <dl>
					 <? if($row['T_Type'] =='TM'){$type_t="อาจารย์เชี่ยวชาญ";}if($row['T_Type'] =='TC'){$type_t="อาจารย์ปานกลาง";}if($row['T_Type'] =='TS'){$type_t="อาจารย์มาใหม่";} ?>
                        <dt><label for="T_username">ประเภทอาจารย์ :</label></dt>
                        <dd><input type="text" name="" id="" size="40" value="<?=$type_t; ?>" disabled="disabled" class="txt"/></dd>
                    </dl>
					    <dl>
                        <dt><label for="interests">เลือกความถนัด :</label></dt>
                        <dd>
						
						<table width="400" border="0" cellpadding="2" cellpadding="2">
						<? $num =1; ?>
						 <? while($rw = mysql_fetch_array($query)) {
							for($k=0;$k<$l;$k++)
							{
							if($rw['Topic_id'] == $tpc_id[$k] && $tpc_th[$k] == $row['T_id'])
							{
						 ?>
                            <tr><td width="5"><input type="checkbox" name="interests[]"  value="<?=$rw['Topic_id']; ?>" checked="checked"/> 
							<?
							?> </td>
							<td width="495"><?=$rw['Book_id'].".".$rw['Topic_Topicid'].".".$rw['Topic_Lessonid']." ".$rw['Topic_Name']; ?></td></tr> 
						<? 
							break;
							}
							}
						} ?>
						</table>
						
                        </dd>
                    </dl>
					  </dl>
                     <dl class="submit">
                    <input type="submit" name="btnsubmit" id="btnsubmit" value="บันทึก" class="btn"/>
                     </dl>   
		 </fieldset>  
		 </form> 
</div>  
<?
if($_POST['btnsubmit'] != '' )
{
	$T_id = $_POST['id_teacher'];
	for($p=0;$p<$l;$p++)
	{
		if( $tpc_th[$p] == $T_id )
		{
		 $sql="delete from $table_aptitude where T_id='$T_id' ";
		 mysql_query($sql) or die ("Error sql delete"); 
		}
	}
 for($i=0;$i<count($_POST["interests"]);$i++)
 {
	if(trim($_POST["interests"][$i]) != "")
	{
	
		$Topic_id =	$_POST["interests"][$i];
		$id = '';
		adddata($table_aptitude);
	}
 }
		 fn_alert('แก้ไขข้อมูลเสร็จเรียบร้อย');
		window_location("index.php?frm=edit_aptitude");
}
?>
</body>
</html>
