<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");

include_once("../class/admin.php");
include_once("../common/login_check.php");
include_once("../class/admin.php");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

check_quanxian("修改代理");

$id	            =	$_POST["id"];
$money	        =	$_POST["money"];
$s_time	        =	$_POST["s_time"];
$e_time		    =	$_POST["e_time"];
$ledger		    =	$_POST["ledger"];
$profig	        =	$_POST["profig"];
$ratio		    =	$_POST["ratio"];

$sql = "select s_time,e_time from agents_money_log where agents_id=$id";
$query	=	$mysqli->query($sql);
$list = array();
while ($rows = $query->fetch_array()) {
    $list[] = $rows;
}
foreach($list as $key => $value){
    if($value["s_time"]<=$s_time && $s_time<=$value["e_time"]){
        message("开始时间已经有结算过，请查询后再结算。");
        exit;
    }
    if($value["s_time"]<=$e_time && $e_time<=$value["e_time"]){
        message("结束时间已经有结算过，请查询后再结算。");
        exit;
    }
}

$sql = "insert into agents_money_log(agents_id,money,s_time,e_time,do_time,ledger,profig,ratio)
            values('$id','$money','$s_time','$e_time','$bj_time_now','$ledger','$profig','$ratio')";
$mysqli->query($sql);

message('操作成功!',"list.php");