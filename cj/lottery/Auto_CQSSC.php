<?php
header('Content-Type:text/html; charset=utf-8');
include ("../mysqli.php");
require ("curl_http.php");
$curl = new Curl_HTTP_Client();
$html_data = $curl->fetch_url("http://kaijiang.aicai.com/cqssc/");
       //$data=explode("</ul>",strtolower($html_data));
	   $content= htmlspecialchars($html_data);
	   $content = str_replace('&quot;','', $content);  
		$t=explode('&lt;tbody id=jq_body_kc_result&gt;',$content);
		$w=explode('&lt;/tbody&gt;',$t[1]);
		$th=array('style=color:red','class=bg','&nbsp;','&lt;','&gt;',' ','&nbsp;','/tr','/td','right');
      $quu = str_replace($th,'', $w[0]);
      $qu = preg_replace('/([\x80-\xff]*)/i','',$quu);
	  $h=explode('tr',$qu);
	  $cou=count($h)-1;
	if ($cou>0){
		for ($i=$cou;$i>0;$i--){
        $vv = str_replace('td',',', $h[$i]);
		$v=explode(',',$vv);
		$t=explode('|',$v[4]);
	$qishu		= $v[1];
	$qishu = str_replace('-','', $qishu);
    $qishu = floatval($qishu);
	$qishu = strval($qishu);
	$time 		= $v[3];
	$tim=substr($time,0,10).' '.substr($time,10,14);
	$time=date('Y-m-d H:i:s',strtotime($tim));
	$hm1		=  $t[0]; 
	$hm2		= $t[1];
	$hm3		= $t[2];
	$hm4		= $t[3];
	$hm5		= $t[4];
	$c_time 	= date('Y-m-d H:i:s',time());
	$jstime=substr($time,0,10);
	//print_r($v);exit;
	//echo $tim;
	if(strlen($qishu)>0){
		//print_r($v);
		$sql="select id from lottery_result_cq where qishu='".$qishu."' ";
		$tquery = $mysqli->query($sql);
		$tcou	= $mysqli->affected_rows;
		if($tcou==0)
	{
			$sql = "insert into lottery_result_cq(qishu,datetime,create_time,ball_1,ball_2,ball_3,ball_4,ball_5) values ('".$qishu."','".$time."','".$c_time."','".$t[0]."','".$t[1]."','".$t[2]."','".$t[3]."','".$t[4]."')";
			//echo $sql;
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
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td align="left">
      <input type=button name=button value="刷新" onClick="window.location.reload()">
      重庆时时彩(<?=$qishu?>期<?=$hm1,$hm2,$hm3,$hm4,$hm5?>):
      <span id="timeinfo"></span>
      </td>
  </tr>
</table>
<iframe runat="server" src="/zj6k6/Lottery/result/B5/autojs.php?qi=<?=$qishu?>&jsType=0&type=%E9%87%8D%E5%BA%86%E6%97%B6%E6%97%B6%E5%BD%A9&gtype=cq&s_time=<?=$jstime?>" width="0" height="0" frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="no" allowtransparency="yes"></iframe>
</body>
</html>