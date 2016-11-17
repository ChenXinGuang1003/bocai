<?php
header('Content-Type:text/html; charset=utf-8');
include ("../mysqli.php");
require ("curl_http.php");

$curl = new Curl_HTTP_Client();
$html_data = $curl->fetch_url("http://baidu.lecai.com/lottery/draw/view/543");
//$data=explode("</ul>",strtolower($html_data));
		preg_match_all("/latest_draw_result = \{(.+?)\}/is",$html_data,$t);
		$temp = (str_replace("latest_draw_result = ","",$t[0][0]));
		$array['num'] = json_decode($temp)->red;
		preg_match_all("/latest_draw_time = \'(.+?)\'/is",$html_data,$t);
		$array['time'] = $t[1][0];
		preg_match_all("/latest_draw_phase = \'(.+?)\'/is",$html_data,$t);
		$dd[$t[1][0]] = $array;
		preg_match_all("/phasedata = \{(.+?)\};/is",$html_data,$data);
		$temp= (str_replace("phaseData = ","",$data[0][0]));
		$a = (json_decode(substr($temp,0,strlen($temp)-1)));
		foreach ((array)$a as $val){
			foreach ($val as $k=>$vv){
				$dd[$k] = array('num'=>$vv->result->red,'time'=>$vv->open_time);
			}
		}
foreach ($dd as $k=>$val){
	$v 			= $val['num'];
	$time 		= $val['time'];
	$qihao		= $k;
	$hm1		= $v[0];
	$hm2		= $v[1];
	$hm3		= $v[2];
	$hm4		= $v[3];
	$hm5		= $v[4];
	$hm6		= $v[5];
	$hm7		= $v[6];
	$hm8		= $v[7];
	$hm9		= $v[8];
	$hm10		= $v[9];
	$hm11		= $v[10];
	$hm12		= $v[11];
	$hm13		= $v[12];
	$hm14		= $v[13];
	$hm15		= $v[14];
	$hm16		= $v[15];
	$hm17		= $v[16];
	$hm18		= $v[17];
	$hm19		= $v[18];
	$hm20		= $v[19];
	$c_time 	= date('Y-m-d H:i:s',time());
	$s_time 	= date('Y-m-d',time());
	if(strlen($qihao)>0){
		$sql="select id from lottery_result_bjkn where qishu='".$qihao."'";
		$tquery = $mysqli->query($sql);
		$tcou	= $mysqli->affected_rows;
		if($tcou==0){
			$sql = "insert into lottery_result_bjkn(qishu,create_time,datetime,ball_1,ball_2,ball_3,ball_4,ball_5,ball_6,ball_7,ball_8,ball_9,ball_10,ball_11,ball_12,ball_13,ball_14,ball_15,ball_16,ball_17,ball_18,ball_19,ball_20) values ('".$qihao."','".$c_time."','".$time."','".$hm1."','".$hm2."','".$hm3."','".$hm4."','".$hm5."','".$hm6."','".$hm7."','".$hm8."','".$hm9."','".$hm10."','".$hm11."','".$hm12."','".$hm13."','".$hm14."','".$hm15."','".$hm16."','".$hm17."','".$hm18."','".$hm19."','".$hm20."')";
		$mysqli->query($sql);
		}
	}
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
<style type="text/css">
<!--
body,td,th {
    font-size: 12px;
}
body {
    margin-left: 0px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
}
-->
</style></head>
<body>
<script> 
var limit="10" 
if (document.images){ 
	var parselimit=limit
} 
function beginrefresh(){ 
if (!document.images) 
	return 
if (parselimit==1) 
	window.location.reload() 
else{ 
	parselimit-=1 
	curmin=Math.floor(parselimit) 
	if (curmin!=0) 
		curtime=curmin+"秒后自动获取!" 
	else 
		curtime=cursec+"秒后自动获取!" 
		timeinfo.innerText=curtime 
		setTimeout("beginrefresh()",1000) 
	} 
} 

window.onload=beginrefresh 
</script>
<table width="100%"border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td align="left">
      <input type=button name=button value="刷新" onClick="window.location.reload()">
      北京快乐8(<?=$qihao?>期:<?="$hm1,$hm2,$hm3,$hm4,$hm5,$hm6,$hm7,$hm8,$hm9,$hm10,$hm11,$hm12,$hm13,$hm14,$hm15,$hm16,$hm17,$hm18,$hm19,$hm20"?>):
      <span id="timeinfo"></span>
      </td>
  </tr>
</table>
<iframe src="/zj6k6/Lottery/result/BJKN/autojs.php?qi=<?=$qihao?>&jsType=0&s_time=<?=$s_time?>" frameborder="0" scrolling="no" height="0" width="0"></iframe>
</body>
</html>