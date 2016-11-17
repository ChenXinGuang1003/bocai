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

check_quanxian("修改代理");

if($_GET["id"]){
    $id = $_GET["id"];
}
if($_GET["s_time"]){
    $s_time = $_GET["s_time"];
}
if($_GET["e_time"]){
    $e_time = $_GET["e_time"];
}

$sql_lottery	=	"SELECT SUM(IF(sub.bet_money>0,IF(sub.is_win!=2,sub.bet_money,0),0)) bet_money_total,SUM(IF(sub.is_win=1,sub.win+sub.fs,IF(is_win=0,fs,0))) win_total,u.top_id
                    FROM agents_list a,user_list u,order_lottery o ,order_lottery_sub sub
                    WHERE a.id=$id AND a.id=u.top_id AND u.top_id!=0 AND o.status!='0' AND o.status!='3' AND u.user_id=o.user_id AND o.order_num=sub.order_num
                    ";
if($s_time) $sql_lottery.=" and o.bet_time>='".$s_time." 00:00:00' ";
if($e_time) $sql_lottery.=" and o.bet_time<='".$e_time." 23:59:59' ";
$sql_lottery .= " GROUP BY u.top_id ORDER BY a.regtime DESC ";
$query_lottery	=	$mysqli->query($sql_lottery);
$rows_lottery = $query_lottery->fetch_array();

$sql_six	=	"SELECT SUM(IF(sub.bet_money>0,IF(sub.is_win!=2,sub.bet_money,0),0)) bet_money_total,SUM(IF(sub.is_win=1,sub.win+sub.fs,IF(is_win=0,fs,0))) win_total,u.top_id
                    FROM agents_list a,user_list u,six_lottery_order o ,six_lottery_order_sub sub
                    WHERE a.id=$id AND a.id=u.top_id AND u.top_id!=0 AND o.status!='0' AND o.status!='3' AND u.user_id=o.user_id AND o.order_num=sub.order_num
                    ";
if($s_time) $sql_six.=" and o.bet_time>='".$s_time." 00:00:00' ";
if($e_time) $sql_six.=" and o.bet_time<='".$e_time." 23:59:59' ";
$sql_six .= " GROUP BY u.top_id ORDER BY a.regtime DESC ";
$query_six	=	$mysqli->query($sql_six);
$rows_six = $query_six->fetch_array();

$sql_ds	=	"SELECT SUM(IF(k.bet_money>0,k.bet_money,0)) bet_money_total,SUM(IF(k.win>0,k.win,0)+IF(k.fs>0,k.fs,0)) win_total,u.top_id
                    FROM agents_list a,user_list u,k_bet k
                    WHERE a.id=$id AND a.id=u.top_id AND u.top_id!=0 AND k.status!=0 AND k.status!=3 AND k.check!=0 AND u.user_id=k.user_id
                    ";
if($s_time) $sql_ds.=" and k.bet_time>='".$s_time." 00:00:00' ";
if($e_time) $sql_ds.=" and k.bet_time<='".$e_time." 23:59:59' ";
$sql_ds .= " GROUP BY u.top_id ORDER BY a.regtime DESC ";
$query_ds	=	$mysqli->query($sql_ds);
$rows_ds = $query_ds->fetch_array();

$sql_cg	=	"SELECT SUM(IF(k.bet_money>0,k.bet_money,0)) bet_money_total,SUM(IF(k.win>0,k.win,0)+IF(k.fs>0,k.fs,0)) win_total,u.top_id
                    FROM agents_list a,user_list u,k_bet_cg_group k
                    WHERE a.id=$id AND a.id=u.top_id AND u.top_id!=0 AND k.status!=0 AND k.status!=3 AND k.check=1 AND u.user_id=k.user_id
                    ";
if($s_time) $sql_cg.=" and k.bet_time>='".$s_time." 00:00:00' ";
if($e_time) $sql_cg.=" and k.bet_time<='".$e_time." 23:59:59' ";
$sql_cg .= " GROUP BY u.top_id ORDER BY a.regtime DESC ";
$query_cg	=	$mysqli->query($sql_cg);
$rows_cg = $query_cg->fetch_array();

$sql_live	=	"SELECT SUM(IF(lo.bet_money>0,lo.bet_money,0)) bet_money_total,SUM(IF(lo.live_win is not null,lo.live_win,0)) win_total,u.top_id
                    FROM agents_list a,user_list u,live_user l,live_order lo
                    WHERE a.id=$id AND a.id=u.top_id AND u.top_id!=0 AND l.user_id=u.user_id AND l.live_username=lo.live_username
                    ";
if($s_time) $sql_live.=" and lo.order_time>='".$s_time." 00:00:00' ";
if($e_time) $sql_live.=" and lo.order_time<='".$e_time." 23:59:59' ";
$sql_live .= " GROUP BY u.top_id ORDER BY a.regtime DESC ";
$query_live	=	$mysqli->query($sql_live);
$rows_live = $query_live->fetch_array();

$lottery_bet_money = 0;
$lottery_win = 0;
if($rows_lottery){
    $lottery_bet_money += $rows_lottery["bet_money_total"];
    $lottery_win += ($rows_lottery["bet_money_total"] - $rows_lottery["win_total"]);
}
if($rows_six){
    $lottery_bet_money += $rows_six["bet_money_total"];
    $lottery_win += ($rows_six["bet_money_total"] - $rows_six["win_total"]);
}
if($rows_ds){
    $lottery_bet_money += $rows_ds["bet_money_total"];
    $lottery_win += ($rows_ds["bet_money_total"] - $rows_ds["win_total"]);
}
if($rows_cg){
    $lottery_bet_money += $rows_cg["bet_money_total"];
    $lottery_win += ($rows_cg["bet_money_total"] - $rows_cg["win_total"]);
}
if($rows_live){
    $lottery_bet_money += $rows_live["bet_money_total"];
    $lottery_win += (0 - $rows_live["win_total"]);
}
echo $lottery_bet_money.",".$lottery_win;