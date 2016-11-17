<?php
header('Content-Type:text/html; charset=utf-8');
include ("../mysqli.php");
require ("curl_http.php");
$curl = new Curl_HTTP_Client();
$html_data = $curl->fetch_url("http://kaijiang.aicai.com/open/difangIssueDetailByKc.do?gameIndex=329&province=beijing");
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
	$qishu		= $v[1];
	$qishu		= floatval($qishu);
	$time 		= $v[2];
	$tim=substr($time,0,10).' '.substr($time,10,14);
	$time=date('Y-m-d H:i:s',strtotime($tim));
	$ball_1		=   intval($v[3],10); 
	$ball_2		=  $v[4]; 
	$ball_3	    =  $v[5]; 
	$ball_4		=  $v[6]; 
    $ball_5		=  $v[7]; 
	$ball_6		=  $v[8]; 
	$ball_7		=  $v[9]; 
	$ball_8		=  $v[10]; 
	$ball_9		=  $v[11]; 
	$ball_10	=  $v[12];
	$c_time 	= date('Y-m-d H:i:s',time());
	$jstime=substr($time,0,10);
	//print_r($v);exit;
	//echo $tim;
	if(strlen($qishu)>0){
		//print_r($v);
		$sql="select * from lottery_result_bjpk where qishu='".$qishu."' ";
        	$tquery = $mysqli->query($sql);
		    $tcou	= $mysqli->affected_rows;

	//echo $tcou;
		if($tcou==0)
	{
		$sql	=	"insert into lottery_result_bjpk(qishu,create_time,datetime,ball_1,ball_2,ball_3,ball_4,ball_5,ball_6,ball_7,ball_8,ball_9,ball_10) values ('".$qishu."','".$c_time."','".$time ."','".$ball_1."','".$ball_2."','".$ball_3."','".$ball_4."','".$ball_5."','".$ball_6."','".$ball_7."','".$ball_8."','".$ball_9."','".$ball_10."')";
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
<? $limit= rand(15,25);?>
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
      北京赛车PK拾<br>(<?=$qishu?>期:<?="$ball_1,$ball_2,$ball_3,$ball_4,$ball_5,$ball_6,$ball_7,$ball_8,$ball_9,$ball_10"?>)<br><span id="timeinfo"></span>
	  </td>
      
  </tr>
</table>
<iframe runat="server" src="/zj6k6/Lottery/result/BJPK/autojs.php?qi=<?=$qishu?>&jsType=0&s_time=<?=$jstime?>" width="1000" height="1000" frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="no" allowtransparency="yes"></iframe>
</body>
</html>