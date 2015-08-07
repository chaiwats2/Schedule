<? session_start(); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" media="all" href="niceforms-default.css" />
<script language="javascript" type="text/javascript" src="niceforms.js"></script>
<script type="text/javascript">
function check_input()
{
	if(document.frm_add_topic.Book_id.value == "")
	{
		alert('กรุณาเลือกเล่มหนังสือ');
		document.frm_add_topic.Book_id.focus;
		return false;
	}
	
	if(document.frm_add_topic.Topic_Topicid.value == "")
	{
		alert('กรุณาป้อนข้อมูลบทที่');
		document.frm_add_topic.Topic_Topicid.focus;
		return false;
	}  
	if(document.frm_add_topic.Topic_Lessonid.value == "")
	{
		alert('กรุณาป้อนข้อมูลหัวข้อที่');
		document.frm_add_topic.Topic_Lessonid.focus;
		return false;
	}   
	if(document.frm_add_topic.Topic_Name.value == "")
	{
		alert('กรุณาป้อนข้อมูลชื่อหัวข้อ');
		document.frm_add_topic.Topic_Name.focus;
		return false;
	}  
}
</script> 
</head>
<body bgcolor="#FFFFFF">
<div class="valid_box">
   <b>เพิ่มข้อมูลหัวข้อสมาธิ</b>
</div>
<div class="form">
       <fieldset>
        		 <form action="" method="POST" class="niceform" enctype="multipart/form-data" name="frm_add_topic" onSubmit="return check_input();">    
                    <dl>
                        <dt><label for="Book_id">เล่มหนังสือ :</label></dt>
                        <dd>
                            <select name="Book_id" id="Book_id">
								<option value="">- - - เลือกเล่มหนังสือ - - -</option>
                                <option value="1" <? if($_SESSION['Book_id'] == 1){echo "selected"; }  ?> > เล่ม 1</option>
                                <option value="2" <? if($_SESSION['Book_id'] == 2){echo "selected"; }  ?> > เล่ม 2</option>
								<option value="3" <? if($_SESSION['Book_id'] == 3){echo "selected"; }?> > เล่ม 3</option>
								
                            </select>
                        </dd>
                    </dl>
					<dl>
                        <dt><label for="Topic_Topicid">บทที่ :</label></dt>
                        <dd><input type="text" name="Topic_Topicid" id="Topic_Topicid" size="40" value="<?=$_SESSION['Topic_Topicid']; ?>"/></dd>
                    </dl>
                    <dl>
                        <dt><label for="Topic_Lessonid">หัวข้อที่ :</label></dt>
                        <dd><input type="text" name="Topic_Lessonid" id="Topic_Lessonid" size="40" value="<?=$_SESSION['Topic_Lessonid']; ?>"/></dd>
                    </dl>
					 <dl>
                        <dt><label for="Topic_Name">ชื่อหัวข้อ :</label></dt>
                        <dd><input type="text" name="Topic_Name" id="Topic_Name" size="40" value="<?=$_SESSION['Topic_Name']; ?>"/></dd>
                    </dl>
					
                    <dl class="submit">
                    	<input type="submit" name="btnsubmit" id="btnsubmit" value="บันทึก"/>
						<input type="reset" name="reset" id="reset" value="ล้างข้อมูล" />
                     </dl>         
         </form>
		       </fieldset>   
         </div>  
<?
include("config/connect.php");
include("config/function_db.php");
include("config/function_gen.php");


$Book_id=$_POST['Book_id'];
$Topic_Topicid=$_POST['Topic_Topicid'];
$Topic_Lessonid=$_POST['Topic_Lessonid'];
$Topic_Name=$_POST['Topic_Name'];
$Brief_subject=$_POST['Brief_subject'];

 	  $photo=$_FILES['Topic_Content_file']['tmp_name'];
	  $Topic_Content=$_FILES['Topic_Content_file']['name'];
	  $photo_size=$_FILES['Topic_Content_file']['size'];
	  $photo_type=$_FILES['Topic_Content_file']['type'];
	  
if($_POST['btnsubmit'] != '')
{
	$sql="select * from $table_topic where Book_id='$Book_id' AND Topic_Topicid='$Topic_Topicid' AND Topic_Lessonid='$Topic_Lessonid' ";
	$query = mysql_query($sql) or die ("error");
	$num=mysql_num_rows($query);
	if($num>0)
	{
	 $_SESSION['Book_id']=$Book_id;
	 $_SESSION['Topic_Topicid']=$Topic_Topicid;
	 $_SESSION['Topic_Lessonid']=$Topic_Lessonid;
	 $_SESSION['Topic_Name']=$Topic_Name;
	 echo "<script>alert('หัวข้อที่ป้อนซ้ำกัน');window.location='index.php?frm=add_topic';</script>";
	}
	else
	{
	if($_FILES['Topic_Content_file']['name'] !='')
	{
	  $Topic_Content = date("Y-m-d")."-".$Topic_Content;
	  copy($photo,"file_lession/".$Topic_Content); 
	 }
	  unset($_SESSION['Book_id']);
	 unset($_SESSION['Topic_Topicid']);
	 unset($_SESSION['Topic_Lessonid']);
	 unset($_SESSION['Topic_Name']);
	$result=adddata($table_topic);
	}
}
?>
</body>
</html>
