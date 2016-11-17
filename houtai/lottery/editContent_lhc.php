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
include_once($C_Patch."/app/member/ip.php");
include_once($C_Patch."/app/member/utils/convert_name.php");
include_once("../common/login_check.php");

if(strpos($quanxian,'修改彩票赔率')){
    $id = $_POST["id"];
    $betInfo = $_POST["betInfo"];

    global $mysqli;
    $sql	=	"select number from six_lottery_order_sub WHERE id='$id'";
    $query	=	$mysqli->query($sql);
    $row    =	$query->fetch_array();

    $log_info = "投注内容：".$row["number"]." 修改为：".$betInfo."。";

    $sql = "DROP TRIGGER BeforeUpdateSixLotteryOrderSub;";
    $mysqli->query($sql);
    $sql	=	"UPDATE six_lottery_order_sub
                  SET number='$betInfo'
                  WHERE id='$id'";
    $result = $mysqli->query($sql);
    $sql = "
			CREATE TRIGGER `BeforeUpdateSixLotteryOrderSub` BEFORE update ON `six_lottery_order_sub`
			  FOR EACH ROW BEGIN
				   set new.number  = old.number;
                 set new.bet_rate  = old.bet_rate;
                 set new.bet_money  = old.bet_money;
			  END;
			";
    $mysqli->query($sql);
    if(!$result){
        echo '保存失败';
        exit;
    }

    $sql	=	"INSERT INTO six_lottery_log(id_sub,log_type,log_info,create_time) VALUES('$id','修改投注内容','$log_info',now())";
    $mysqli->query($sql);

    echo '保存成功';
}