<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?
//$host='localhost';
//$user='s532021286';
//$pass='film18014';
//$database='db532021286';
$host='localhost';
$user='root';
$pass='1234';
$database='schedule';
$con=mysql_connect("$host","$user","$pass");
if(!$con)
{
	echo "Database connection is not.";
}
mysql_select_db("$database");
mysql_query("SET character_set_results=UTF8");
mysql_query("SET character_set_client=UTF8");
mysql_query("SET character_set_connection=UTF8");

//table in data base
$table_place = 'place';
$table_holiday = 'holiday';
$table_topic = 'topic';
$table_teacher = 'teacher';
$table_aptitude = 'aptitude';
$table_easy_place = 'easy_place';
$table_s_admin = 's_admin';
$table_schedule = 'schedule';
$table_admin = 'admin';

$day=array("จันทร์","อังคาร"," พุธ","พฤหัสบดี","ศุกร์","เสาร์","อาทิตย์");
$Mount[1]='มกราคม';
$Mount[2]='กุมภาพันธ์';
$Mount[3]='มีนาคม';
$Mount[4]='เมษายน';
$Mount[5]='พฤษภาคม';
$Mount[6]='มิถุนายน';
$Mount[7]='กรกฏาคม';
$Mount[8]='สิงหาคม';
$Mount[9]='กันยายน';
$Mount[10]='ตุลาคม';
$Mount[11]='พฤษจิกายน';
$Mount[12]='ธันวาคม';
?>