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
$x_ic		=	$result	=	'';
$str		=	"结算失败";
$sql		=	"select x_result,x_id from t_guanjun where match_id='".$_GET["match_id"]."'"; //取出要经结算的赛事
$query		=	$mysqli->query($sql);
while($row	=	$query->fetch_array()){
	$x_id	=	$row["x_id"];
	$result	=	$row["x_result"];
}

if($result){ //有比分结果赛事数据
	$sql		=	"select id,bet_info from k_bet where id='".$_GET["bid"]."' and `status`=0"; //取出的注单
	$query		=	$mysqli->query($sql);
	while($row	=	$query->fetch_array()){
		$sql	=	"";
		$bool	=	2;
		$jg		=	explode("<br>",$result);

		for($i=0;$i<count($jg);$i++){
			if(strrpos($row["bet_info"],$jg[$i])!==false){
				$bool	=	1;
				break;
			}
		}

		$str		=	bet::set($row["id"],$bool,$result,"");

	}
}else{
	$str	=	"赛事未设置结果，不能结算！\\n请设置完赛事结果，再来结算本注单！";
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
echo "<script>alert('".$str."'),refash();</script>";
?>
</body>
</html>