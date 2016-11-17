<?php 
include_once('config.inc.php');
$sql	=	"select close,web_name,why,conf_www from sys_config limit 0,1";
$query	=	$mysqli->query($sql);
$row	=	$query->fetch_array();

if($row['close']==1)
	{
$is_close=1;
}else{
$is_close=0;
}

$why=$row['why'];
$web_name=$row['web_name'];
$conf_www=$row['conf_www'];
?>