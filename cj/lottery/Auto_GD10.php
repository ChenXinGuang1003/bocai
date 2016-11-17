<?php
header('Content-Type:text/html; charset=utf-8');
include ("../mysqli.php");
require ("curl_http.php");

$curl = new Curl_HTTP_Client();
$html_data = $curl->fetch_url("http://kl10.icaile.com/");
	   $content= htmlspecialchars($html_data);
	   $content = str_replace('&quot;','', $content);  
	    //echo $content;exit;
		$t=explode('&lt;th class=\'kaijiang\' colspan=8 rowspan=2&gt;',$content);
		//echo $t[1];exit;
		$w=explode('&lt;/th&gt;',$t[1]);
		$y=explode('&lt;tr class=chart-hr&gt;',$w[27]);
	   $th=array('&lt;','&gt;','class','/','=','chart-bg-qh','chart-bg-hmfb','chart-bg-kjhm','dqhm',' ','trtd');
        $quu = str_replace($th,'', $y[0]);
		$quu = str_replace('tdtr','|', $quu);
		$quu = str_replace('tdtd',',', $quu);
		$quu =preg_replace('|[a-zA-Z/]+|','',$quu);
		$x=explode('|',$quu);
		//echo $quu;exit;

	  $cou=count($x)-1;
$i=0;
	if ($cou>0){
		for ($i=$cou;$i>0;$i--){
		$v=explode(',',$x[$i]);
	//print_r ($v);
 
	$qishu      ='20'.$v[0];
    $qishu =preg_replace('/[^\d]/','',$qishu);
    //$qishu = floatval($qishu);
	//$qishu = strval($qishu);
	//$time 		= $v[2];
	//$tim=substr($time,0,10).' '.substr($time,10,14);
	//$time=date('Y-m-d H:i:s',strtotime($tim));
	$hm1		= intval($v[1],10); 
	$hm2		= $v[2];
	$hm3		= $v[3];
	$hm4		= $v[4];
	$hm5		= $v[5];
	$hm6		= $v[6];
	$hm7		= $v[7];
	$hm8		= $v[8];
	$c_time 	= date('Y-m-d H:i:s',time());
	$jstime 	= substr($time,0,10);
	//echo $time;
	if(strlen($qishu)>0){
		$sql="select id from lottery_result_gdsf where qishu='".$qishu."'";
		$tquery = $mysqli->query($sql);
		$tcou	= $mysqli->affected_rows;
		if($tcou==0){
			$sql = "insert into lottery_result_gdsf(qishu,create_time,datetime,ball_1,ball_2,ball_3,ball_4,ball_5,ball_6,ball_7,ball_8) values ('".$qishu."','".$c_time ."','".$c_time ."','".$hm1."','".$hm2."','".$hm3."','".$hm4."','".$hm5."','".$hm6."','".$hm7."','".$hm8."')";
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
<!-- 
<? $limit= rand(15,35);?>
var limit="<?=$limit?>" 
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
      广东快乐10分<br>(<?=$qishu?>期<?="$hm1,$hm2,$hm3,$hm4,$hm5,$hm6,$hm7,$hm8"?>)
      <span id="timeinfo"></span>
      </td>
  </tr>
</table> 
<iframe runat="server" src="/zj6k6/Lottery/result/GDSF/autojs.php?qi=<?=$qishu?>&jsType=0&s_time=<?=$jstime?>" width="1000" height="1000" frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="no" allowtransparency="yes"></iframe>
</body>
</html>