<?php

$top_pre = "b2";
$pre = "hg";   // 玩家前缀
$comId = "hg66g";       //商户ID
$comKey = "ef581bfe4a526d7c";   //商户密钥
$agpassword = "78041sodf4s5de";
$gamePlatform = "AGIN"; //平台名称
$report_url = 'http://47.88.8.241:741/index.php/Reports/index/create_ag_json/?dl='.$comId.'&t=';

unset($mysqli);
$mysqli	=	new MySQLi("localhost","root","LOVEbaby1218!@#$","yl66y");
$mysqli->query("set names utf8");

function randomnames($length)
{
 $pattern='1234567890abcdefghijklmnopqrstuvwxyz';
 for($i=0;$i<$length;$i++)
 {
   $key .= $pattern{mt_rand(0,35)}; 
 }
 return $key;
}
?>