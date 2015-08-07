<?
function fn_alert($str) {
echo '
<SCRIPT language=JavaScript>  alert("'.$str.'");  </script>
';
}//end function fn_alert

//=========================================================================================//
function fn_refresh($t,$str) {
echo "<meta http-equiv=\"refresh\" content=\"$t;URL=$str\">";
}//end function fn_alert

function window_location($str)
{
echo '<script language=JavaScript>window.location="'.$str.'"</script>';
}
?>