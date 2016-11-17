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
include_once("../class/admin.php");

check_quanxian("删除会员");

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
if($go == 6){ //delete

	$msg	=	'操作失败！';
	$mysqli->autocommit(FALSE);
	$mysqli->query("BEGIN"); //事务开始

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
    $msg_info = "管理员：".$_SESSION['login_name']." 删除这些账户:".$user_name_list;
    admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],$msg_info,session_id(),"",$bj_time_now);

    $username="";
    $sql = "select user_name from user_list where user_id in ($uid)";
    $query	=	$mysqli->query($sql);
    while($rows = $query->fetch_array()){
        $username=$username."'".$rows['username']."',";
    }
    $username=rtrim($username,',');

    $sql = "DROP TRIGGER BeforeDeleteUserList;";
    $mysqli->query($sql);

    $sql = "delete from user_list where user_id in ($uid)";
    $mysqli->query($sql);
    $q1		=	$mysqli->affected_rows;

    $sql = "delete from history_bank where uid in ($uid)";
    $mysqli->query($sql);

    $sql = "delete from history_login where uid in ($uid)";
    $mysqli->query($sql);

    $sql = "delete from money where user_id in ($uid)";
    $mysqli->query($sql);

    $sql = "delete from k_bet where user_id in ($uid)";
    $mysqli->query($sql);

    $sql	=	"select order_lottery_sub.id from order_lottery,order_lottery_sub where order_lottery.order_num=order_lottery_sub.order_num and order_lottery.user_id in ($uid)"; //彩票
    $query	=	$mysqli->query($sql);
    while ($rows = $query->fetch_array()) {
        $sub_id = $rows['id'];
        $sql = "delete from order_lottery_sub where id=$sub_id";
        $mysqli->query($sql);
    }
    $sql = "delete from order_lottery where user_id in ($uid)";
    $mysqli->query($sql);

    $sql	=	"select six_lottery_order_sub.id from six_lottery_order,six_lottery_order_sub where six_lottery_order.order_num=six_lottery_order_sub.order_num and six_lottery_order.user_id in ($uid)"; //彩票
    $query	=	$mysqli->query($sql);
    while ($rows = $query->fetch_array()) {
        $sub_id = $rows['id'];
        $sql = "delete from six_lottery_order_sub where id=$sub_id";
        $mysqli->query($sql);
    }
    $sql = "delete from six_lottery_order where user_id in ($uid)";
    $mysqli->query($sql);

    $sql = "delete from user_msg where user_id in ($uid)";
    $mysqli->query($sql);

    $sql = "delete from k_bet_cg where user_id in ($uid)";
    $mysqli->query($sql);

    $sql = "delete from k_bet_cg_group where user_id in ($uid)";
    $mysqli->query($sql);

    $sql = "DROP TRIGGER BeforeDeleteUserList;";
    $mysqli->query($sql);
    $sql = "delete from money_log where user_id in ($uid)";
    $mysqli->query($sql);
    $sql = "
			CREATE TRIGGER `BeforeDeleteMoneyLog` BEFORE delete ON `money_log`
			  FOR EACH ROW BEGIN
				insert into money_log(id) values (old.id);
			  END;
			";
    $mysqli->query($sql);

    $sql = "delete from live_user where user_id in ($uid)";
    $mysqli->query($sql);

    $sql = "delete from user_log where user_id in ($uid)";
    $mysqli->query($sql);

    $sql = "delete from user_msg where user_id in ($uid)";
    $mysqli->query($sql);

    $sql = "
			CREATE TRIGGER `BeforeDeleteUserList` BEFORE delete ON `user_list`
			  FOR EACH ROW BEGIN
				insert into user_list(id) values (old.id);
			  END;
			";
    $mysqli->query($sql);

    $msg	=	'操作成功！';
}

message($msg,'list.php?page='.$page);
?>