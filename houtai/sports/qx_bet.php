<?php
error_reporting(1);
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

//echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/utils/convert_name.php");
include_once($C_Patch."/app/member/class/sys_config.php");

include_once("../class/admin.php");
include_once("../common/login_check.php");

check_quanxian("手工结算注单");
include_once("bet.php");
//注单取消审核
$bid		=	intval($_GET["bid"]);
$status		=	intval($_GET["status"]);
$msg		=	bet::qx_bet($bid,$status) ? '操作成功' : '操作失败';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>重新审核</title>
<script language="javascript">
function refash()
{
var win = top.window;
 try{// 刷新.
  	if(win.opener)  win.opener.location.reload();
 }catch(ex){
  // 防止opener被关闭时代码异常。
 }
  window.close();
}
</script>
</head>
<body>
<?php
echo "<script>alert('".$msg."'),refash();</script>";
?>
</body>
</html>