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
include_once("common/login_check.php");

function getColor_u($num){
	if($num == 0) return '#009900';
	else if($num == 1) return '#FF9900';
	else if($num == 2) return '#FF99FF';
	else if($num == 3) return '#0099FF';
}

$temp1	=	array();
$sql	=	"select `loginurl` from user_list where (`online`='1' or `online`='是') and Oid<>''"; //当前会员在线人数
$query	=	$mysqli->query($sql);
while($rows	= $query->fetch_array()){
	$temp1[$rows['loginurl']]++;
}

$sum	=	0;
$arr	=	array();
$temp2	=	array();
foreach($temp1 as $www=>$num){
	$arr[$sum]['www']	=	$www;
	$arr[$sum]['num']	=	$num;
	$temp2[$sum]		=	$num;
	$sum++;
}
arsort($temp2);
$temp	=	array();
$i		=	0;
foreach($temp2 as $k=>$v){
	$temp[$i++] = $k;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="60">
<title>会员在线分析</title>
</head>
<body>
<div style="text-align:center; height:250px;"><object width="550" height="250" align="middle" id="OrderGeneral" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
          <param value="&amp;dataXML=&lt;graph caption='<?=array_sum($temp2)?> 个会员在线' decimalPrecision='2' showPercentageValues='0' showNames='1' showValues='1' showPercentageInLabel='0' pieYScale='45' pieBorderAlpha='40' pieFillAlpha='70' pieSliceDepth='15' pieRadius='100' outCnvBaseFontSize='13' baseFontSize='12'&gt;<?php
foreach($temp as $i=>$k){
	if($i < 1){
		echo "&lt;set value='".$arr[$k]['num']."' name='".$arr[$k]['www']."' color='".substr(getColor_u($i%4),1)."' /&gt;";
	}else{
		echo "&lt;set value='".$arr[$temp[$sum-$i]]['num']."' name='".$arr[$temp[$sum-$i]]['www']."' color='".substr(getColor_u($i%4),1)."' /&gt;";
	}
	$i++;
}
		  ?>&lt;/graph&gt;" name="FlashVars">
          <param value="images/pie3d.swf?chartWidth=550&amp;chartHeight=250" name="movie">
          <param value="high" name="quality">
          <param value="#FFFFFF" name="bgcolor">
          <param value="opaque" name="wmode">
          <embed width="550" height="250" align="middle" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="OrderGeneral" wmode="opaque" bgcolor="#FFFFFF" quality="high" flashvars="&amp;dataXML=&lt;graph caption='<?=array_sum($temp2)?> 个会员在线' decimalPrecision='2' showPercentageValues='0' showNames='1' showValues='1' showPercentageInLabel='0' pieYScale='45' pieBorderAlpha='40' pieFillAlpha='70' pieSliceDepth='15' pieRadius='100' outCnvBaseFontSize='13' baseFontSize='12'&gt;<?php
foreach($temp as $i=>$k){
	if($i < 1){
		echo "&lt;set value='".$arr[$k]['num']."' name='".$arr[$k]['www']."' color='".substr(getColor_u($i%4),1)."' /&gt;";
	}else{
		echo "&lt;set value='".$arr[$temp[$sum-$i]]['num']."' name='".$arr[$temp[$sum-$i]]['www']."' color='".substr(getColor_u($i%4),1)."' /&gt;";
	}
	$i++;
}
		  ?>&lt;/graph&gt;" src="images/pie3d.swf?chartWidth=550&amp;chartHeight=250">
          </object></div>
</body>
</html>