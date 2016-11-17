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

$id = $_POST['id'];
$user_id = $_POST['user_id'];
if(!$user_id){
    exit;
}
$sql = "update live_log set status=1,result='转账请求被拒绝。',do_time=now() where id='".intval($id)."' ";
$query	 =	$mysqli->query($sql);

$sql = "select status,zz_money,user_id,do_time,live_type,live_username,order_num
                    from live_log where id ='".intval($id)."' limit 0,1";
$query	=	$mysqli->query($sql);
$row    =	$query->fetch_array();
$zz_money = $row["zz_money"];
$datereg = $row["order_num"];
$sql = "select money from user_list where user_id='$user_id' limit 0,1";
$query	=	$mysqli->query($sql);
$row    =	$query->fetch_array();
$assets = $row["money"];
$balance = $assets + $zz_money;
$sql	=	"update user_list set money=$assets+$zz_money where user_id='$user_id'";//加钱
$mysqli->query($sql);
$sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`)
                            VALUES ('$user_id','$datereg','转入AG 普通厅',now(),'真人转账拒绝','$zz_money','$assets','$balance');";
$mysqli->query($sql);

echo 1;
