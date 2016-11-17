<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";


$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");

include_once($C_Patch."/app/member/include/config.inc.php");

include_once($C_Patch."/app/member/common/function.php");

include_once($C_Patch."/app/member/ip.php");

include_once("../class/admin.php");

include_once("../common/login_check.php"); 

check_quanxian("管理员管理");

$session_=$_GET["ssid"];
$admin_=$_GET["admin"];
$sql = "delete from sys_manage_online where session_str='$session_'";//刪除超時用戶
$mysqli->query($sql);

admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],"踢出管理员[".$admin_."][".$session_."]",$session_str,"",$bj_time_now);

message('踢出管理员成功!','online.php');
?>
