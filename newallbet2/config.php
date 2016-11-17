<?php

$top_pre = "b2";
$comId   = "yl66y";
$comKey  = "123456";
$apiKey  = "9b4de1e006739412";
$pre = "yl66y";
$agpassword = 'sighf65409';
$report_url = 'http://47.88.8.241:741/index.php/Reports/index/create_ab_json/?dl='.$comId.'&t=';

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