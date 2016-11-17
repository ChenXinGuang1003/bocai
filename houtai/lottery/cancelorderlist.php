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
include_once($C_Patch."/app/member/utils/convert_name.php");
include_once($C_Patch."/app/member/class/sys_config.php");
include_once($C_Patch."/app/member/cache/website.php");

include_once("../class/admin.php");
include_once("../common/login_check.php");
include_once("getContentName.php");


$arr = array();
if($_POST['uid']){
    $arr = $_POST['uid'];
}

$isdelete = ($_GET['action']=="delete");

foreach($arr as $k=>$v){
    $id	=	$v;
	if($isdelete){
		/*$sql	=	"SELECT o.user_id, o.order_num, o.Gtype,o_sub.order_sub_num,
                    o_sub.bet_money,
                    u.money
                    FROM user_list u,order_lottery_sub o_sub, order_lottery o
                    WHERE o_sub.id='".$id."' and o.order_num=o_sub.order_num and u.user_id=o.user_id limit 0,1";
		$query	=	$mysqli->query($sql);*/
	}
	else{
    $sql	=	"SELECT o.user_id, o.order_num, o.Gtype,o_sub.order_sub_num,
                    o_sub.bet_money,
                    u.money
                    FROM user_list u,order_lottery_sub o_sub, order_lottery o
                    WHERE o_sub.id='".$id."' and o.order_num=o_sub.order_num and u.user_id=o.user_id limit 0,1";
    $query	=	$mysqli->query($sql);
    if($query){
        $row    =	$query->fetch_array();
        $userid = $row["user_id"];
        $datereg = $row["order_sub_num"];
        $lottery_name = getZhPageTitle($row["Gtype"]);
        $bet_money_total = $row["bet_money"];
        $assets = $row["money"];
        $balance = $bet_money_total + $assets;
    }

	

    $sql	=	"SELECT count(id) m_count_id
                    FROM `money_log` where `order_num`='$datereg' ";
    $query	=	$mysqli->query($sql);
    if($query){
        $row    =	$query->fetch_array();
        if($row && $row["m_count_id"]=='0'){

            $sql =	"update user_list u,order_lottery_sub o_sub, order_lottery o
				   set u.money=u.money+o_sub.bet_money, o_sub.status=3
				   where o_sub.id='".$id."' and o.order_num=o_sub.order_num and u.user_id=o.user_id  ";
            $mysqli->query($sql);

            $sql	=	"SELECT count(id) count_id
							FROM order_lottery_sub where order_num=(select order_num from order_lottery_sub where id='".$id."') AND STATUS!='3' ";
            $query	=	$mysqli->query($sql);
            if($query){
                $row    =	$query->fetch_array();
                if($row && $row["count_id"]=='0'){
                    $sql =	"update user_list u,order_lottery_sub o_sub, order_lottery o
					   set o.status='3'
					   where o_sub.id='".$id."' and o.order_num=o_sub.order_num and u.user_id=o.user_id  ";
                    $mysqli->query($sql);
                }
            }

            //插入金钱记录
            $sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`)
								VALUES ('$userid','$datereg','$lottery_name',now(),'作废订单加钱','$bet_money_total','$assets','$balance');";
            $mysqli->query($sql) or die ("作废订单插入金钱记录失败!!!id=".$id);

            $sql	=	"SELECT count(id) count_id_2
							FROM `money_log` where `order_num`='$datereg' and `user_id`='$userid' ";
            $query	=	$mysqli->query($sql);
            $row    =	$query->fetch_array();
            if($row && $row["count_id_2"]=='0'){
                $sql =	"update user_list u,order_lottery_sub o_sub, order_lottery o
					   set u.money=u.money-o_sub.bet_money, o_sub.status=0
					   where o_sub.id='".$id."' and o.order_num=o_sub.order_num and u.user_id=o.user_id  ";
                $mysqli->query($sql);


                $sql =	"update user_list u,order_lottery_sub o_sub, order_lottery o
					   set o.status='0'
					   where o_sub.id='".$id."' and o.order_num=o_sub.order_num and u.user_id=o.user_id  ";
                $mysqli->query($sql);
            }else{
                include_once("../class/admin.php");
                admin::insert_log($_SESSION["login_name"],get_ip(),$bj_time_now," 作废了彩票id=$id"."。理由是：".$_GET["cancel_reason"]."。",session_id(),"",$bj_time_now);
            }
        }
    }
}
}
message('操作完成'.$aaaa,'orderlist.php?js=0');