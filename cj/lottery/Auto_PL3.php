<?
header('Content-Type:text/html; charset=utf-8');
include ("../mysqli.php");
require ("curl_http.php");

	$curl = new Curl_HTTP_Client();
	$url = "http://www.lottery.gov.cn/lottery/pls/History.aspx";
	$html_data 	= strtolower($curl->fetch_url($url));
	if($html_data){
		$html_data = str_replace('#f4f4f4', '#ffffff', $html_data);  
		$array		= explode('<tr align="center" bgcolor="#ffffff">',$html_data);
		$cou        = count($array);
		for  ($i=$cou;$i>0;$i--){
		$v 			= explode('</td>',$array[$i]);
		$pl3_qihao 	= '20'.trim(strip_tags($v[0]));
		$jg			= explode("&nbsp;&nbsp;&nbsp;&nbsp;",strip_tags($v[1]));
		$pl3_hm1 	= intval($jg[0]);
		$pl3_hm2 	= intval($jg[1]);
		$pl3_hm3 	= intval($jg[2]);
		$t	 	 	= explode('<td>',$v[9]);
		$date	 	= trim($t[1]);
		$jstime 	= substr($date,0,10);
		$c_time 	= date('Y-m-d H:i:s',time());

        $sql = "select * from lottery_result_p3 where qishu='$pl3_qihao'";
		$result = $mysqli->query($sql);
		$cou = $mysqli->affected_rows;

			if($cou==1){}else{
				 if (preg_match("/[\x7f-\xff]/", $pl3_qihao)) {}else{ 
						$mysql = "insert into lottery_result_p3 set qishu='$pl3_qihao',create_time='$c_time ',datetime='$date',ball_1='$pl3_hm1',ball_2='$pl3_hm2',ball_3='$pl3_hm3'";
						//echo $mysql;
						$mysqli->query($mysql) or die ("操作失败!!!".$sql);
			}}
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
      排列三(<?=$pl3_qihao?>期:<?=$pl3_hm1?>,<?=$pl3_hm2?>,<?=$pl3_hm3?>)
      <span id="timeinfo"></span>
      </td>
  </tr>
</table>
<iframe src="/zj6k6/Lottery/result/B3/autojs.php?qi=<?=$pl3_qihao?>&jsType=0&type=%E6%8E%92%E5%88%97%E4%B8%89&gtype=p3&s_time=<?=$jstime?>" frameborder="0" scrolling="no" height="0" width="0"></iframe>
</body>
</html>