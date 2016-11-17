<?php
	error_reporting(E_ALL ^ E_NOTICE);
	header("Content-type:text/html;charset=utf-8");
	unset($mysqli);
	$mysqli	=	new MySQLi("localhost","root","root","bmydata1_db");
	$mysqli->query("set names utf8");
	include("config.php");
	include("Apiyc.class.php");
	$a=new Apiyc();
	$user=$_POST['ycTokenID'];

	$url=$sonb.$user."";
	
	$arr=json_decode($a->https_request($url),TRUE);

	echo $arr['msg'];
?>