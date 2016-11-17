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


	$parter=$UserId;
	$katype=$_REQUEST["sel_card"];
	$cardno=$_REQUEST["cardNo"];
	$cardpwd=$_REQUEST["cardPwd"];
	$Money=$_REQUEST["sel_price"];
	$orderid=getOrderId();
	$callbackurl=$result_url;
	$textmsg="";//�Զ��巵�ز������Ϊ��
	$preEncodeStr="type=".$katype."&parter=".$parter."&cardno=".$cardno."&cardpwd=".$cardpwd."&value=".$Money."&restrict=0&orderid=".$orderid."&callbackurl=".$callbackurl;
	$P_PostKey=md5($preEncodeStr.$SalfStr);
	
	//������Զ���������Ᵽ��

	header("Location:".$CardUrl."?".$preEncodeStr."&sign=".$P_PostKey."&textmsg=".textmsg);

function getOrderId()
{
	return rand(100000,999999)."".date("YmdHis");
}

?>