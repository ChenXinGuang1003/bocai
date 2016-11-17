<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once("../common/login_check.php");
include_once($C_Patch."/app/member/class/user.php");
include_once($C_Patch."/include/newpage.php");
include_once("../class/admin.php");

$page	=	$_GET["page"];
$go		=	$_GET["go"];
$arr	=	$_POST['uid'];
$uid	=	'';
$i		=	0; //会员个数
foreach($arr as $k=>$v){
	$uid .= $v.',';
	$i++;
}
$uid	=	rtrim($uid,',');

$sql = "select user_name from user_list where user_id in($uid)";
$query = $mysqli->query($sql);
$list = array();
while ($rows = $query->fetch_array()) {
    $list[] = $rows;
}
$user_name_list = "";
foreach($list as $key => $value){
    $user_name_list .= $value["user_name"].",";
}
$user_name_list	=	rtrim($user_name_list,',');

if($go == 1){ //停用
	$sql = "UPDATE user_list set status='停用',remark=concat_ws('，',remark,'管理员：".$_SESSION['login_name']." 停用此账户') where user_id in ($uid) and status='正常'";
    $mysqli->query($sql);
    $msg_info = "管理员：".$_SESSION['login_name']." 停用这些账户:".$user_name_list;
    admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],$msg_info,session_id(),"",$bj_time_now);
}else if($go == 0){ //启用
	$sql = "UPDATE user_list set status='正常' where user_id in ($uid) and (status='停用' or status='异常')";
    $mysqli->query($sql);
    $msg_info = "管理员：".$_SESSION['login_name']." 启用这些账户:".$user_name_list;
    admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],$msg_info,session_id(),"",$bj_time_now);
    foreach($arr as $k=>$v){
        $sql = "select user_name,money from user_list where user_id='$v'";
        $query = $mysqli->query($sql);
        $row = $query->fetch_array();
        $datereg=	date("YmdHis")."_".$row["user_name"];
        $assets = $row["money"];
        $balance = $assets;
        $sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`)
            VALUES ('$v','$datereg','启用会员插入0金钱',now(),'启用会员','0','$assets','$balance');";
        $mysqli->query($sql);
    }

}else if($go == 3){ //踢线
    $sql = "update user_list set `online`=0,Oid='' where user_id in ($uid)";
    $mysqli->query($sql);
}else if($go == 4){//暂时未处理
	$sql = "update user_list set is_daili=0 where user_id in ($uid) and is_daili=1";
    $mysqli->query($sql);
}else if($go == 9){ //允许转账到真人
    $sql = "UPDATE user_list set is_allow_live='1' where user_id in ($uid)";
    $mysqli->query($sql);
    $msg_info = "管理员：".$_SESSION['login_name']." 执行了允许转账到真人，这些账户是:".$user_name_list;
    admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],$msg_info,session_id(),"",$bj_time_now);
}else if($go == 10){//不允许转账到真人
    $sql = "UPDATE user_list set is_allow_live='2',remark=concat_ws('，',remark,'管理员：".$_SESSION['login_name']." 不允许转账到真人') where user_id in ($uid)";
    $mysqli->query($sql);
    $msg_info = "管理员：".$_SESSION['login_name']." 执行了不允许转账到真人，这些账户是::".$user_name_list;
    admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],$msg_info,session_id(),"",$bj_time_now);
}else if($go == 12){//清空会员投注额
    $sql = "UPDATE k_bet set status='3' where user_id in ($uid)";
    $mysqli->query($sql);
    $sql = "UPDATE k_bet_cg_group set status='3' where user_id in ($uid)";
    $mysqli->query($sql);
    $sql = "UPDATE order_lottery set status='3' where user_id in ($uid)";
    $mysqli->query($sql);
    $sql = "UPDATE six_lottery_order set status='3' where user_id in ($uid)";
    $mysqli->query($sql);
    $msg_info = "管理员：".$_SESSION['login_name']." 清空会员投注额，这些账户是::".$user_name_list;
    admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],$msg_info,session_id(),"",$bj_time_now);
}

$msg	=	'操作成功！';
message($msg,'list.php?page='.$page);
?>