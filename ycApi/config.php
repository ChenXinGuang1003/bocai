<?php
	//DES密钥,8位,开户后请替换
	$ks="a1234567";
	
	//web_key,站点KEY,开户后请替换
	$web_key="DJBhwBzfGOWm5U/ql1sIf4yLH/I0uUsJ91k8MkjxqV3R7XYCjhw45g==";
	         
	
	// 内嵌彩票网页地址
	$web_url="http://ycweb.ylottery-api.com/";
	// 请求地址
	$api_url="http://ycapi.ylottery-api.com/YCInterface.svc/";
	
	
	$aas=  str_replace('+','%2B',$web_key);
	
	//引入彩票地址
	$c_url=$web_url."Lottery/forwardGame?TokenID=";
	
	
	
	//用户注册接口
	$speed=$api_url."SpeedReg?u=";
	
	//用户登录接口
	$login=$api_url."Login?u=";
	
	//获取用户子钱包接口
	$sonb=$api_url."GetSonBalance?TokenID=";
	
	//加钱接口
	$plus=$api_url."PlusPoint?u=";
	
	//减钱接口
	$minus=$api_url."MinusPoint?u=";
	
	//彩票引入页面js
	$js_url=$web_url."Scripts/converstwo.js";
	
	//下注明细接口
	$History=$api_url."GetBetHistory?aa=";
	
	//转账记录
	$accounts=$api_url."QueryLimite?aa=";
	
	//base64混淆
	$base64_blur='KwId3';
?>