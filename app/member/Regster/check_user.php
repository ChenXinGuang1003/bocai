<?php
session_start();
header ("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
include "../include/address.mem.php";
include "../include/config.inc.php";

//检查会员账户是否存在
if($_GET["a_username"])
{
	$username	=	$_GET["a_username"];
	$sql		=	"select user_name from user_list where user_name='".$_GET["a_username"]."' limit 1";
	$query		=	$mysqli->query($sql);
	$rs			=	$query->fetch_array();
	if($rs['user_name']){
		echo "";//空標示已經存在
	}else
	{
		echo "ok";
	}
}

//检查電話是否存在
if($_GET["a_tel"])
{
	$username	=	$_GET["a_tel"];
	$sql		=	"select tel from user_list where user_name='".$_GET["a_tel"]."' limit 1";
	$query		=	$mysqli->query($sql);
	$rs			=	$query->fetch_array();
	if($rs['tel']){
		echo "";//空標示已經存在
	}else
	{
		echo "ok";
	}
}

//检查真實姓名是否存在
if($_GET["a_real_name"])
{
	$username	=	$_GET["a_real_name"];
	$sql		=	"select pay_name from user_list where user_name='".$_GET["a_real_name"]."' limit 1";
	$query		=	$mysqli->query($sql);
	$rs			=	$query->fetch_array();
	if($rs['pay_name']){
		echo "";//空標示已經存在
	}else
	{
		echo "ok";
	}
}

//检查真EMAIL是否存在
if($_GET["a_email"])
{
	$username	=	$_GET["a_email"];
	$sql		=	"select email from user_list where user_name='".$_GET["a_email"]."' limit 1";
	$query		=	$mysqli->query($sql);
	$rs			=	$query->fetch_array();
	if($rs['email']){
		echo "";//空標示已經存在
	}else
	{
		echo "ok";
	}
}
?>