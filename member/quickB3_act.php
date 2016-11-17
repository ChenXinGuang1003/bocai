<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/utils/login_check.php");
include_once($C_Patch."/app/member/utils/error_handle.php");
include_once($C_Patch."/app/member/utils/convert_name.php");
include_once($C_Patch."/app/member/utils/time_util.php");
include_once($C_Patch."/app/member/class/lottery_normal.php");
include_once($C_Patch."/app/member/class/odds_lottery_normal.php");
include_once($C_Patch."/app/member/class/lottery_schedule.php");
include_once($C_Patch."/app/member/class/user_group.php");
include_once($C_Patch."/app/member/cache/ltConfig.php");
include_once($C_Patch."/app/member/class/common_class.php");

//*************前期各种判断*******************
$goldArray = $_POST["gold"];
$aOddsArray = $_POST["aOdds"];
$aConcedeArray = $_POST["aConcede"];
$rType = $_POST["MyRtype"];
$gType = $_POST["gtype"];

if(in_array($gType,array("TJ","CQ","JX"))){
    include_once($C_Patch."/member/b5/b5_util.php");
}elseif(in_array($gType,array("D3","P3","T3"))){
    include_once($C_Patch."/member/b3/b3_util.php");
}

//验证money_log是否存在错误
$sql = "select assets,balance,order_value from money_log where user_id='".$_SESSION["userid"]."' order by id desc limit 0,2";
$query	=	$mysqli->query($sql);
$rs = array();
while($row = $query->fetch_array()){
    $rs[] = $row;
}
/*if(count($rs)>1){
    if($rs[0]["assets"]!=$rs[1]["balance"]){
        error2("账号金额异常，请联系管理人员。");
    }
}*/

$bet_money = 0;
$bet_win = 0;
for($i=0;$i<sizeof($goldArray);$i++){
    if($goldArray[$i]<0 || intval($goldArray[$i])<0){
        error2("下注金额为负数或不正常,请联系客服!");
    }
    $bet_money = $bet_money + $goldArray[$i];
    $bet_win = $bet_win + $goldArray[$i]*$aOddsArray[$i];
}

if($rType=="WP"){
    $explode_wp = explode("*",$aConcedeArray[0]);
    $wpm_count = 0;
    $wpc_count = 0;
    $wpu_count = 0;
    foreach($explode_wp as $key => $value){
        if(strpos($value,"WPM")!==false){
            $wpm_count += 1;
        }
        if(strpos($value,"WPC")!==false){
            $wpc_count += 1;
        }
        if(strpos($value,"WPU")!==false){
            $wpu_count += 1;
        }
    }
    if($wpm_count>1 || $wpc_count>1 || $wpu_count>1){
        error2("数据异常，请重新投注。(一字过关)");
    }
}

global $mysqli;
if(is_numeric($bet_money) && is_int($bet_money*1)){
    $bet_money	=	$bet_money*1;
    //会员余额
    $balance	=	0;//投注后
    $assets		=	0;//投注前
    $sql		= 	"select money from user_list where user_id='$userid' limit 1";
    $query 		=	$mysqli->query($sql);
    $rs			=	$query->fetch_array();
    if($rs['money']){
        $assets	=	round($rs['money'],2);
        $balance=	$assets-$bet_money;
    }else{
        error2("账户异常,请联系客服!");
    }
    if($balance<0){ //投注后，用户余额不能小于0
        error1("账户余额不足!");
    }

    if($is_close){
        error2("改投注已过时,请联系客服!");
    }
    $bet_time = $bj_time_now;

    $bet_money_total = $bet_money;
    $max_money = common_class::getMaxMoney($userid);
    $max_money_already = common_class::getMaxMoneyAlready($userid,$gType,$qishu);

    if($max_money > 0 && ($max_money_already+$bet_money_total)>$max_money){
        echo '<script type="text/javascript">alert("超过当期下注最大金额，请联系管理人员。");</script>';
        exit;
    }

    if(lottery_normal::add_order($userid,$bet_money,$balance,$bet_win,$assets,
                        $lottery_name,$rTypeName,$rType,$gType,
                        $goldArray,$aOddsArray,$aConcedeArray,
                        $qishu,$bet_time)){
//        $mysqli->close();
//        msgok($bet_info,"交易成功",$balance);
    }else{
        error2("交易失败");
    }
}else{
    error1("交易金额错误!");
}
$mysqli->close();
echo $balance;
exit;