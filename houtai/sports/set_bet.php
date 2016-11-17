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
include_once("get_point.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>设置结算比分</title>
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

$status=intval($_GET["status"]);
$bid=intval($_GET["bid"]);
$MB_Inball=$_GET["MB_Inball"];
$TG_Inball=$_GET["TG_Inball"];
if($MB_Inball=="" || $TG_Inball=="")
{
	echo "<script>alert('操作失败,比分为空'),refash();</script>";
	return;
}
$sql_bet =	"select match_type,match_showtype,match_rgg,match_dxgg,match_nowscore,point_column from k_bet where lose_ok=1 and `status`=0 and id='$bid' limit 0,1 ";
$result	 =	$mysqli->query($sql_bet); //单式
$rows = $result->fetch_array();
$column=$rows["point_column"];
$bcss	=	array("match_bmdy","match_bgdy","match_bhdy","match_bho","match_bao","match_bdpl","match_bxpl"); //半场赛事
if(in_array($column,$bcss)){
	$t=make_point($column,"","",$MB_Inball,$TG_Inball,$rows["match_type"],$rows["match_showtype"],$rows["match_rgg"],$rows["match_dxgg"],$rows["match_nowscore"]);
}else{
	$t=make_point($column,$MB_Inball,$TG_Inball,"","",$rows["match_type"],$rows["match_showtype"],$rows["match_rgg"],$rows["match_dxgg"],$rows["match_nowscore"]);
}


$msg=bet::set($bid,$t["status"],$MB_Inball,$TG_Inball);
$sql = "select order_num from k_bet where id='$bid'";
$query	=	$mysqli->query($sql);
$rows	 =	$query->fetch_array();
$order_num=$rows["order_num"];
admin::insert_log($_SESSION["login_name"],get_ip(),$bj_time_now,$msg."[".$order_num."]",session_id(),"",$bj_time_now);
echo "<script>alert('操作成功'),refash();</script>";

?>
</body>
</html>