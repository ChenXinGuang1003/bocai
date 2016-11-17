<?php
set_time_limit(0);
include_once("db.php");
include_once("pub_library.php");
include_once("curl_http.php");
include_once("function.php");
header("Content-type: text/html; charset=utf-8");
$curl = new Curl_HTTP_Client();
$curl->store_cookies("tmp/cookies.txt"); 
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
$curl->set_user_agent("Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
$v='http://180.94.224.40/';
$login=array();
$login['username']=$webdb["user"];
$login['passwd']=$webdb["pawd"];
$login['langx']="zh-cn";
$curl->set_referrer("".$v."");
$html_date=$curl->fetch_url("".$v."/app/member/","",5);
$html_date=$curl->send_post_data("".$v."/app/member/new_login.php",$login,"",5);

//preg_match("/top.uid = '([^']+)/si",$html_date,$new_uid);
$new_uid=explode("|",$html_date);
/*preg_match("/location.href = '([^']+)/si",$html_date,$turl);
$curl->set_referrer("".$v."/app/member/login.php");
$tdate=$curl->fetch_url($turl[1]);
preg_match("/action='([^']+)/si",$tdate,$wurl);
$v=$wurl[1];

if(!$v)$v=$webdb["datesite"];*/
//$v='http://www.hg7088.com/';
if(strlen($new_uid[3])>20  ){
	$uid=$new_uid[3];
	$cache	= "<?php\r\n";
	$cache .= "\$webdb['cookie']		=	'".$uid."';\r\n";
	$cache .= "\$webdb['datesite']		=	'".$v."';\r\n";
	$cache .= "\$webdb['user']			=	'".$webdb['user']."';\r\n";
	$cache .= "\$webdb['pawd']			=	'".$webdb['pawd']."';\r\n";
	$cache .= "\$webdb['uid']			=	'1';\r\n?>";
	$hg	= "<?php\r\n";
	$hg .= "\$hguid		=	'".$uid."';\r\n";
	$hg .= "\$hgweb		=	'".$v."';\r\n";
	$hg	.= "?>\r\n";
	if(!write_file("db.php",$cache)){ //写入缓存失败
		$meg	=	"缓存文件写入失败！请先设db.php文件权限为：0777";
	}
	
		write_file($C_Patch."/app/member/Cache/uid.php",$hg);
}
	if($new_uid[3]){
		echo '成功獲取繁體的uid: '.$uid.'<br>';
	}else{
		echo "繁體登陸錯誤!\\請檢查繁體用戶名和密碼!!<br><br>";	
	}
	echo $webdb['user'].'<br />'.$v;
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>UID接收</title>
<?php
if(!$uid[1] ||(strlen($uid)<20&&strlen($uid)>12)){
?>
<meta http-equiv="refresh" content="5"> 
<?php
 } 
?>
<style type="text/css">
<!--
body {
	background-color: #CCCCCC;
	margin-left: 0px;
	margin-top: 0px;
}
-->
</style>
</head>
<script> 
<!-- 
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
		curtime=curmin+"秒后自动获取UID!" 
	else 
		curtime=cursec+"秒后自动获取UID!" 
		ShowTime.innerText=curtime 
		setTimeout("beginrefresh()",1000) 
	} 
} 

window.onload=beginrefresh 
-->
</script>
<body onLoad="TimeClose();" bgcolor="#999999">
<table width="150" height="100" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="150" height="100" align="center">
      <span id="ShowTime"></span><br><br>
      <input type=button name=button value="重新登陆" onClick="window.location.reload()"></td>
  </tr>
</table>
</body>
</html>
