<? header("content-Type: text/html; charset=utf-8");?>
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

require_once("Mobaopay.Config.php");
require_once("lib/MobaoPay.class.php");
/* *
 功能：智付页面跳转同步通知页面
 版本：3.0
 日期：2013-08-01
 说明：
 以下代码仅为了方便商户安装接口而提供的样例具体说明以文档为准，商户可以根据自己网站的需要，按照技术文档编写。

 * */

$sql_pay="select * from pay_set where b_start=1 limit 1";
$query_pay	=	$mysqli->query($sql_pay);

$rows_pay	=	$query_pay->fetch_array();
if($rows_pay["pay_type"]!=11){
    echo "支付失败，请联系管理员";
    $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'魔宝','类型不对')";
    $mysqli->query($sql);
    exit;
}

$pfxFile    =	"http://".$rows_pay["pay_domain"]."/php/mbpay/私钥.pfx";
$pubFile	=	"http://".$rows_pay["pay_domain"]."/php/mbpay/epay.crt";

$data = "";
$data['apiName']=$_REQUEST["apiName"];
$data['notifyTime']=$_REQUEST["notifyTime"];
$data['tradeAmt']=$_REQUEST["tradeAmt"];
$data['merchNo']=$_REQUEST["merchNo"];
$data['merchParam']=$_REQUEST["merchParam"];
$data['orderNo']=$_REQUEST["orderNo"];
$data['tradeDate']=$_REQUEST["tradeDate"];
$data['accNo']=$_REQUEST["accNo"];
$data['accDate']=$_REQUEST["accDate"];
$data['orderStatus']=$_REQUEST["orderStatus"];
$data['signMsg']=$_REQUEST["signMsg"];

    $all_par = "apiName:".$data['apiName'].";notifyTime:".$data['notifyTime'].";tradeAmt:".$data['tradeAmt']
    .";merchNo:".$data['merchNo'].";merchParam:".$data['merchParam'].";orderNo:".$data['orderNo']
    .";tradeDate:".$data['tradeDate'].";accNo:".$data['accNo'].";accDate:".$data['accDate']
    .";orderStatus:".$data['orderStatus'].";signMsg:".$data['signMsg']
    .";pfxFile:".$pfxFile.";pubFile:".$pubFile.";pfxPwd:".$rows_pay["pay_key"];

$sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$all_par',now(),'魔宝','信息反馈')";
$mysqli->query($sql);



//$cMbPay = new MbPay($pfxFile, $pubFile, md5($rows_pay["pay_key"]));
$cMbPay = new MbPay(md5($rows_pay["pay_key"]));

$str_to_sign = $cMbPay->prepareSign($data);
if ($cMbPay->verify($str_to_sign, $data['signMsg']) )
{
    if ($data['orderStatus'] == "1"){

        $order_no = $data['orderNo'];
        $order_array_2 = explode("_",$order_no);
        $extra_return_param = $order_array_2[0];
        $order_amount = $data['tradeAmt'];
        $merchant_code	= $data['merchNo'];

        $sql="select user_id,user_name,money from user_list where user_name='$extra_return_param' limit 1";
        $query	=	$mysqli->query($sql);
        $rows	 =	$query->fetch_array();
        $cou	=	$query->num_rows;
        if($cou<=0){
            echo "返回信息错误!";
            $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$extra_return_param',now(),'魔宝','返回信息错误')";
            $mysqli->query($sql);
            exit;
        }
        $assets	 =	$rows['money'];
        $uid	 =	$rows['user_id'];
        $username=	$rows['user_name'];

        $sql="select count(*) as s from money where order_num = '".$order_no."'";
        $query	=	$mysqli->query($sql);
        //$cou	=	$query->num_rows;
        $cou	 =	$query->fetch_array();
        if ($cou['s']==0){
            $sql		=	"insert into money(user_id,order_value,order_num,status,assets,balance) values($uid,$order_amount,'$order_no','确认',$assets,$assets)";
            $mysqli->query($sql);
            $m_id = $mysqli->insert_id;

            $sql="select user_id,order_num from money where order_num='$order_no' limit 1";
            $query	=	$mysqli->query($sql);
            $rows	 =	$query->fetch_array();
            $user_id	 =	$rows['user_id'];
            $order_array_2 = explode("_",$rows["order_num"]);

            $sql="select user_name from user_list where user_id=$user_id limit 1";
            $query	=	$mysqli->query($sql);
            $rows	 =	$query->fetch_array();
            $username=	$rows['user_name'];

            if(str_replace(" ","",strtolower($order_array_2[0]))==str_replace(" ","",strtolower($username)) || str_replace(" ","",strtolower($order_array_2[1]))==str_replace(" ","",strtolower($username))){

            }else{
                $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'智付3','类型不对27-$extra_return_param-$username-".$rows["order_num"]."')";
                $mysqli->query($sql);
                $sql = "delete from money where id=$m_id";
                $mysqli->query($sql);
                exit;
            }

            $sql	=	"update money,user_list set money.status='成功',money.update_time=now(),user_list.money=user_list.money+money.order_value,money.about='该订单在线冲值操作成功',money.sxf=money.order_value/100,money.balance=user_list.money+money.order_value where money.user_id=user_list.user_id and money.id=$m_id and money.`status`='确认'";
            $mysqli->query($sql);
            $q1			=	$mysqli->affected_rows;
            if($q1 != 2){
                echo "更新用户金额失败";
                $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('更新用户金额失败',now(),'魔宝','更新用户金额失败')";
                $mysqli->query($sql);
                exit;
            }
            $balance = $assets+$order_amount;
            $sql  =   "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$uid','$order_no','".""."',now(),'在线冲值操作成功','$order_amount','$assets','$balance');";
            $mysqli->query($sql);
            $q3		=	$mysqli->affected_rows;
            if($q3 != 1){
                $sql		=	"update money,user_list set money.status='未结算',money.update_time=now(),user_list.money=user_list.money-money.order_value,money.about='该订单在线冲值操作失败',money.sxf=money.order_value/100,money.balance=user_list.money-money.order_value where money.user_id=user_list.user_id and money.id=$m_id and money.`status`='成功'";
                $mysqli->query($sql);
                echo "支付失败，插入金钱记录失败";
                $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('支付失败，插入金钱记录失败',now(),'魔宝','支付失败，插入金钱记录失败')";
                $mysqli->query($sql);
                exit;
            }
            $sql = "DROP TRIGGER BeforeUpdatePayset;";
            $mysqli->query($sql);
            $mysqli->query("update pay_set set money_Already=money_Already+".$order_amount." where pay_id='".$merchant_code."'");
            $sql = "   CREATE TRIGGER `BeforeUpdatePayset` BEFORE update ON `pay_set`
                              FOR EACH ROW BEGIN
                                insert into pay_set(id) values (old.id);
                              END;
                        ";
            $mysqli->query($sql);
        }
        echo "pay success";
    }else{
        $sql = "insert into pay_error_log (sign_info,update_time,pay_type) values('状态出错',now(),'魔宝')";
        $mysqli->query($sql);
        echo "pay error";
    }
    return true;
}
else
{
    print_r("verify error");
    $sql = "insert into pay_error_log (sign_info,update_time,pay_type) values('签名不一致',now(),'魔宝')";
    $mysqli->query($sql);
    return false;
}

?>