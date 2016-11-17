<?php
header('Content-Type:text/html; charset=utf-8');
include ("../mysqli.php");
require ("curl_http.php");

$curl = new Curl_HTTP_Client();
$html_data = $curl->fetch_url("http://kaijiang.aicai.com/open/difangIssueDetailByKc.do?gameIndex=308&province=beijing");
       //$data=explode("</ul>",strtolower($html_data));
	   $content= htmlspecialchars($html_data);
	   $content = str_replace('&quot;','', $content);  
		$t=explode('&lt;tbody id=jq_body_kc_result&gt;',$content);
		$w=explode('&lt;/tbody&gt;',$t[1]);
		$th=array('style=color:red','class=bg','&nbsp;','&lt;','&gt;',' ','&nbsp;','/tr','/td','class','=','right');
      $quu = str_replace($th,'', $w[0]);

      $qu = preg_replace('/([\x80-\xff]*)/i','',$quu);
	  $h=explode('tr',$qu);
	  $cou=count($h)-1;
	if ($cou>0){
		for ($i=$cou;$i>0;$i--){
        $vv = str_replace('td',',', $h[$i]);
		$vv = str_replace('|',',', $vv);
		$vv = str_replace('br/',',', $vv);
		$vv = str_replace('color:red','', $vv);
		$v=explode(',',$vv);
	//print_r ($v);

	$qishu		= $v[1];
	$qishu = str_replace('-','', $qishu);
    $qishu = floatval($qishu);
	$qishu = strval($qishu);
	$time 		= $v[2];
	$tim=substr($time,0,10).' '.substr($time,10,14);
	$time=date('Y-m-d H:i:s',strtotime($tim));
	//print_r ($v);
	$hm1		= intval($v[4],10); 
	$hm2		= $v[5];
	$hm3		= $v[6];
	$hm4		= $v[7];
	$hm5		= $v[8];
	$hm6		= $v[9];
	$hm7		= $v[10];
	$hm8		= $v[11];
	$hm9		= $v[12];
	$hm10		= $v[13];
	$hm11		= $v[14];
	$hm12		= $v[15];
	$hm13		= $v[16];
	$hm14		= $v[17];
	$hm15		= $v[18];
	$hm16		= $v[19];
	$hm17		= $v[20];
	$hm18		= $v[21];
	$hm19		= $v[22];
	$hm20		= substr($v[23],0,2);

	$c_time 	= date('Y-m-d H:i:s',time());
	$jstime 	= substr($time,0,10);
	//echo $time;
	if(strlen($qishu)>0){
		$sql="select id from lottery_result_bjkn where qishu='".$qishu."'";
		$tquery = $mysqli->query($sql);
		$tcou	= $mysqli->affected_rows;
		if($tcou==0){
			$sql = "insert into lottery_result_bjkn(qishu,create_time,datetime,ball_1,ball_2,ball_3,ball_4,ball_5,ball_6,ball_7,ball_8,ball_9,ball_10,ball_11,ball_12,ball_13,ball_14,ball_15,ball_16,ball_17,ball_18,ball_19,ball_20) values ('".$qishu."','".$c_time."','".$time."','".$hm1."','".$hm2."','".$hm3."','".$hm4."','".$hm5."','".$hm6."','".$hm7."','".$hm8."','".$hm9."','".$hm10."','".$hm11."','".$hm12."','".$hm13."','".$hm14."','".$hm15."','".$hm16."','".$hm17."','".$hm18."','".$hm19."','".$hm20."')";
		$mysqli->query($sql); 
		}
	}
	}}
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
var limit="18" 
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
      北京快乐8(<?=$qishu?>期:<?="$hm1,$hm2,$hm3,$hm4,$hm5,$hm6,$hm7,$hm8,$hm9,$hm10,$hm11,$hm12,$hm13,$hm14,$hm15,$hm16,$hm17,$hm18,$hm19,$hm20"?>):
      <span id="timeinfo"></span>
      </td>
  </tr>
</table>
<iframe src="/zj6k6/Lottery/result/BJKN/autojs.php?qi=<?=$qishu?>&jsType=0&s_time=<?=$s_time?>" frameborder="0" scrolling="no" height="0" width="0"></iframe>
</body>
</html>