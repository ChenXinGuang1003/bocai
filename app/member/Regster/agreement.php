<?
session_start();
header ("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
include "../include/config.inc.php";
include "../cache/website.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
        <p>立即开通<?=$web_site['web_name']?>账户，享受最优惠的各项红利!</p>
    <ul>
        <li><?=$web_site['web_name']?>只接受合法博彩年龄的客户申请。同时我们保留要求客户提供其年龄证明的权利。</li>
        <li>在<?=$web_site['web_name']?>进行注册时所提供的全部信息必须在各个方面都是准确和完整的。在使用借记卡或信用卡时，持卡人的姓名必须与在网站上注册时的一致。</li>
        <li>在开户后进行一次有效存款，恭喜您成为<?=$web_site['web_name']?>有效会员!</li>
        <li>存款免手续费，开户最低入款金额<?=$web_site['$web_low_money']?>，最高单次入款金额<?=$web_site['$web_max_money']?>。</li>
        <li>成为<?=$web_site['web_name']?>有效会员后，客户有责任以电邮、联系在线客服、在<?=$web_site['web_name']?>网站上留言等方式，随时向本公司提供最新的个人资料。</li>
        <li>经<?=$web_site['web_name']?>发现会员有重复申请账号行为时，有权将这些账户视为一个联合账户。我们保留取消、收回会员所有优惠红利，以及优惠红利所产生的盈利之权利。每位玩家、每一住址、每一电子邮箱、每一电话号码、相同支付卡/信用卡号码，以及共享计算机环境 (例如:网吧、其他公共用计算机等)只能够拥有一个会员账号，各项优惠只适用于每位客户在<?=$web_site['web_name']?>唯一的账户。</li>
        <li><?=$web_site['web_name']?>是提供互联网投注服务的机构。请会员在注册前参考当地政府的法律，在博彩不被允许的地区，如有会员在投注程序注册、下注，为会员个人行为，<?=$web_site['web_name']?>不负责、承担任何相关责任。</li>
        <li>无论是个人或是团体，如有任何威胁、滥用<?=$web_site['web_name']?>优惠的行为，<?=$web_site['web_name']?>保留杈利取消、收回由优惠产生的红利，并保留权利追讨最高50%手续费。</li>
        <li>所有<?=$web_site['web_name']?>的优惠是特别为玩家而设，在玩家注册信息有争议时，为确保双方利益、杜绝身份盗用行为，<?=$web_site['web_name']?>保留权利要求客户向我们提供充足有效的文件， 并以各种方式辨别客户是否符合资格享有我们的任何优惠。</li>
        <li>客户一经注册开户，将被视为接受所有颁布在<?=$web_site['web_name']?>网站上的规则与条例。 </li>
    </ul>

    </body>
<script type="text/javascript">
    $('#Dialog').dialog({'height' : '480'});
</script>
</html>