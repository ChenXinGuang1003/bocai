<?php
header('Content-Type:text/html; charset=utf-8');
include ("../mysqli.php");


$html_data = file_get_contents("http://www.cp686.cc/shssl/getHistoryData.do?count=12");

$data = json_decode($html_data,true);

//print_r($html_data);

$all = array();

foreach ($data['rows'] as $k => $v) {
	 
	$qishu = str_replace('-', '', $v['termNum']);

	$time = $v['lotteryTime']; 
if(empty($v['lotteryNum'])) continue;
	$one = array($qishu,$time,array($v['n1'],$v['n2'],$v['n3']));
	$all[] = $one;
}

//最新一期数据
$qishu = $all[0][0];
$time = $all[0][1];
$num1 = $all[0][2][0];
$num2 = $all[0][2][1];
$num3 = $all[0][2][2];
$c_time 	= date('Y-m-d H:i:s',time());
$jstime 	= substr($v[1],0,10);
echo $time;
foreach ($all as $k => $v) {
	$sql="select qishu from lottery_result_t3 where qishu='".$v[0]."' ";
	$tquery = $mysqli->query($sql);
	$tcou = $mysqli->affected_rows;
	if($tcou==0)
	{
		$sql = "insert into lottery_result_t3(qishu,ball_1,ball_2,ball_3,datetime,create_time) values ('".$v[0]."','".$v[2][0]."','".$v[2][1]."','".$v[2][2]."','".$v[1]."','".$c_time."')";
		$mysqli->query($sql);
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
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td align="left">
       <input type=button name=button value="刷新" onClick="window.location.reload()">
      上海时时乐(<?=$qishu?>期:<?="$num1,$num2,$num3"?>):
      <span id="timeinfo"></span>
      </td>
  </tr>
</table>
<iframe src="/zj6k6/Lottery/result/B3/autojs.php?qi=<?=$qishu?>&jsType=0&type=%E4%B8%8A%E6%B5%B7%E6%97%B6%E6%97%B6%E4%B9%90&gtype=t3&s_time=<?=$jstime?>" frameborder="0" scrolling="no" height="0" width="0"></iframe>  
</body>
</html>