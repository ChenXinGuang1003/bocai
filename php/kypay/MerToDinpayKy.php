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

$payid=intval($_GET["payid"]);

$sql_pay="select * from pay_set where id=".$payid;
$query_pay	=	$mysqli->query($sql_pay);
$cou_pay	=	$query_pay->num_rows;
if($cou_pay<=0){
    echo "<script>alert(\"非常抱歉，在线支付暂时无法使用！\");location.href='http://".$conf_www."/';</script>";
    exit();
}
$rows_pay	=	$query_pay->fetch_array();
$m_id		=	$rows_pay["pay_id"];

$s_name		=	$_REQUEST['cust_param'];
$sql_user="select id from user_list where user_name='$s_name'";
$query_user	=	$mysqli->query($sql_user);
$cou	=	$query_user->num_rows;
if($cou<=0){
    $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$s_name',now(),'快银','用户名不正确')";
    $mysqli->query($sql);
    echo "<script>alert(\"请登录后再进行存款和提款操作\");location.href='/cl/reg.php';</script>";
    exit();
}
$m_oamount	=	intval($_REQUEST["amount"]);

if($m_oamount<$rows_pay["money_Lowest"] || $m_oamount==0)
{
    echo "<script>alert(\"对不起！充值金额错误！最低充值".$rows_pay["money_Lowest"]."元!\");location.href='http://".$conf_www."/';</script>";
    exit();
}
if(strlen($_REQUEST['bank_code'])>10){
    exit;
}

if (isset($m_id)){
    $kypay = array();
    #目前网关版本固定为1.0.0
    $kypay['version']      = '1.0.0';
    #银行代码 招商银行CMB
    $kypay['bank_code']    = $_REQUEST['bank_code'];
    #支付金额 精确到小数点后两位，如0.10,10.00
    $kypay['amount']       = number_format($_REQUEST['amount'], 2, '.', '');
    #商户ID
    $kypay['merchant_id']  = $m_id;
    #订单时间 格式为：yyyyMMddHHmmss
    $kypay['order_time']   = date('YmdHis');
    #商户生成该订单号并上送快银，唯一标识该笔订单
    $kypay['order_id']     = time().rand(1000, 9999);
    #商户用于接收支付结果通知的一个URL地址
    $kypay['merchant_url'] = "http://".$rows_pay["pay_domain"]."/php/kypay/pay_callback.php";//交易结果回调页面（推荐使用IP形式）

    #自定义字段
    $kypay['cust_param']   = $_REQUEST['cust_param'];

    #去除数组中值为空的数据(参数为空时，不参与签名。)
    $sign_kypay = array_diff($kypay, array(''));
    ksort($sign_kypay);
    $str_sign = '';
    foreach($sign_kypay as $k=>$v){
        $str_sign .=$k.'='.$v.'&';
    }

    $key = $rows_pay["pay_key"];
    $sign_msg  = md5(urlencode($str_sign.'key='.$key));

    #拼接要传送的数据
    $ky_str = '';
    foreach($kypay as $k=>$v){
        $ky_str .=$k.'='.$v.'&';
    }
    $ky_pay_str  = $ky_str.'sign_msg='.$sign_msg;

    $req_url = "http://payment.kuaiyinpay.com/Payment";

    #打开连接 ,需开启curl服务插件
    $ch = curl_init() ;
    #设置url,post的数据类型，post的值
    curl_setopt($ch, CURLOPT_URL,$req_url) ;
    #启用时会发送一个常规的POST请求，类型为：application/x-www-form-urlencoded，就像表单提交的一样。
    curl_setopt($ch, CURLOPT_POST,count($ky_pay_str));
    curl_setopt($ch, CURLOPT_AUTOREFERER,1);
    #在HTTP中的"POST"操作。如果要传送一个文件，需要一个@开头的文件名
    curl_setopt($ch, CURLOPT_POSTFIELDS,$ky_pay_str);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_exec($ch);
    curl_close($ch);
    exit();
}