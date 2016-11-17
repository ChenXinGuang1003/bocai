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

$sql_pay="select * from pay_set where b_start=1 limit 1";
$query_pay	=	$mysqli->query($sql_pay);

$rows_pay	=	$query_pay->fetch_array();
if($rows_pay["pay_type"]!=12){
    echo "支付失败，请联系管理员";
    $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'魔宝','类型不对')";
    $mysqli->query($sql);
    exit;
}

$version = $_POST["version"];
$charset = $_POST["charset"];
$language = $_POST["language"];
$signType = $_POST["signType"];
$tranCode = $_POST["tranCode"];
$merchantID = $_POST["merchantID"];
$merOrderNum = $_POST["merOrderNum"];
$tranAmt = $_POST["tranAmt"];
$feeAmt = $_POST["feeAmt"];
$frontMerUrl = $_POST["frontMerUrl"];
$backgroundMerUrl = $_POST["backgroundMerUrl"];
$tranDateTime = $_POST["tranDateTime"];
$tranIP = $_POST["tranIP"];
$respCode = $_POST["respCode"];
$msgExt = $_POST["msgExt"];
$orderId = $_POST["orderId"];
$gopayOutOrderId = $_POST["gopayOutOrderId"];
$bankCode = $_POST["bankCode"];
$tranFinishTime = $_POST["tranFinishTime"];
$merRemark1 = $_POST["merRemark1"];
$merRemark2 = $_POST["merRemark2"];
$signValue = $_POST["signValue"];
     
      


$signValue = $_POST["signValue"];

//ע��md5���ܴ���Ҫ����ƴװ���ܺ����ȡ�������Ĵ�������ǩ
$signValue2='version=['.$version.']tranCode=['.$tranCode.']merchantID=['.$merchantID.']merOrderNum=['.$merOrderNum.']tranAmt=['.$tranAmt.']feeAmt=['.$feeAmt.']tranDateTime=['.$tranDateTime.']frontMerUrl=['.$frontMerUrl.']backgroundMerUrl=['.$backgroundMerUrl.']orderId=['.$orderId.']gopayOutOrderId=['.$gopayOutOrderId.']tranIP=['.$tranIP.']respCode=['.$respCode.']gopayServerTime=[]VerficationCode=['.$rows_pay["pay_key"].']';
//VerficationCode���̻�ʶ����Ϊ�û���Ҫ��Ϣ�����Ʊ���
//ע��������ʱ��Ҫ�޸����ֵΪ������


$signInfo = $signValue2;
$sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'国付宝','测试中')";
$mysqli->query($sql);
$signValue2 = md5($signValue2);

if($signValue==$signValue2){
	if($respCode=='0000'){
        $extra_return_param = $_POST["buyerName"];
        $order_no = $_POST['merOrderNum'];
        $order_amount = $_POST['tranAmt'];
        $merchant_code	= $_POST['merchantID'];

        //验签成功
        /**
        此处进行商户业务操作
        业务结束
         */

        $sql="select user_id,user_name,money from user_list where user_name='$extra_return_param' limit 1";
        $query	=	$mysqli->query($sql);
        $rows	 =	$query->fetch_array();
        $cou	=	$query->num_rows;
        if($cou<=0){
            echo "返回信息错误!";
            $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'国付宝','返回信息错误')";
            $mysqli->query($sql);
            exit;
        }
        $assets	 =	$rows['money'];
        $uid	 =	$rows['user_id'];
        $username=	$rows['user_name'];

//				echo "支付成功".'<br>';
        //echo "商家号=".$merchant_code.'<br>';
//				echo "订单号=".$order_no.'<br>';
//				echo "金额=".$order_amount.'<br>';
        //echo "币种=".$m_ocurrency.'<br>';
        //echo ".................";
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
                $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'国付宝','类型不对27-$extra_return_param-$username-".$rows["order_num"]."')";
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
                $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'国付宝','更新用户金额失败')";
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
                $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'国付宝','支付失败，插入金钱记录失败')";
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
        echo "SUCCESS";
        exit;
    }
	else{
        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'国付宝','respCode不为000')";
        $mysqli->query($sql);
    }
}else{
    $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'国付宝','签名不一致')";
    $mysqli->query($sql);
}
?>
		
		
		
	







