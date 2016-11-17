<?php
date_default_timezone_set(PRC);
//平台商户ID，需要更换成自己的商户ID
//$UserId="1234";


//接口密钥，需要更换成你自己的密钥，要跟后台设置的一致
//登录API平台，商户管理-->安全设置-->密钥设置，这里自己设置密钥

//$SalfStr="F344CD36ADE16448956B4C4829927F4E";


//银行网关地址，要更新成你所在的平台网关地址

$BankUrl="http://do.jftpay.net/chargebank.aspx";

//卡类网关地址，要更新成你所在的平台网关地址

$CardUrl="http://do.jftpay.net/cardReceive.aspx";
//充值结果后台通知地址

$result_url="http://".$_SERVER["HTTP_HOST"]."/php/jftpay/result_url.php";


//充值结果用户在网站上的转向地址

$notify_url="http://".$_SERVER["HTTP_HOST"]."/php/jftpay/notify_Url.php";
?>