<?
header('Content-Type:text/html; charset=utf-8');
include ("../mysqli.php");
require ("curl_http.php");

	$curl = new Curl_HTTP_Client();
	$url = "http://www.bwlc.gov.cn/bulletin/prevpk3.html";
	$html_data 	= strtolower($curl->fetch_url($url));
	preg_match_all("/\<table class=\"tb\" width=\"100%\">(.+?)\<\/table>/is",$html_data,$matches);
	$data=explode("</tr>",strtolower($matches[1][0]));
	$cou = count($data);
	//print_r($data);exit;
for($i=$cou;$i>0;$i--){
	$score=explode("</td>",$data[$i]);

	if (sizeof($score)==7){
		$qihao=substr($score[0],-7);
		$time = strtotime('2015-05-17  20:25:00');
		$tsc  = $qihao-2015130;
		$date = date('Y-m-d',$time+$tsc*24*3600);
		$temp = explode('<td>',$score[1]);
		$hm1  = $temp[1];
		$temp = explode('<td>',$score[2]);
		$hm2  = $temp[1];
		$temp = explode('<td>',$score[3]);
		$hm3=$temp[1];
		$temp = explode('<td>',$score[4]);
		$hm4=$temp[1];
		$c_time 	= date('Y-m-d H:i:s',time());
		$sql = "select * from lottery_result_d3 where qishu='$qihao'";
		$result = $mysqli->query($sql);
		$cou = $mysqli->affected_rows;
	    $jstime 	= substr($hm4,0,10);
		$ball_1=$hm1;$ball_2=$hm2;$ball_3=$hm3;
			if($cou==1){}else{
						$mysql = "insert into lottery_result_d3 set qishu='$qihao',create_time='$c_time ',datetime='$hm4',ball_1='$ball_1',ball_2='$ball_2',ball_3='$ball_3'";
						//echo $mysql;
						$mysqli->query($mysql) or die ("操作失败!!!".$sql);
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
var limit="300" 
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
      福彩3D(<?=$qihao?>期:<?=$ball_1?>,<?=$ball_2?>,<?=$ball_3?>):
      <span id="timeinfo"></span>
      </td>
  </tr>
</table>
<iframe src="/zj6k6/Lottery/result/B3/autojs.php?qi=<?=$ball_qishu?>&jsType=0&type=3D%E5%BD%A9&gtype=d3&s_time=<?=$jstime?>" frameborder="0" scrolling="no" height="0" width="0"></iframe>
</body>
</html>