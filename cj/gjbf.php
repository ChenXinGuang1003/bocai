<?php
ini_set("display_errors","yes");
include_once("db.php");
include_once("pub_library.php");
include_once("http.class.php");
include_once("mysqli.php");
include_once("function.php");
header("Content-type: text/html; charset=utf-8");
if(intval(date('H'))<12)
{
	$bdate=date("m-d",strtotime("-1 days"));//判断详细时间
    $today = date("Y-m-d",strtotime("-1 days"));//接收日期
}
else
{
	$bdate=date("m-d",strtotime("-0 days"));//判断详细时间
    $today = date("Y-m-d",strtotime("-0 days"));//接收日期
}

//echo $today;exit;

$base_url =  $webdb["datesite"]."app/member/result/result.php?game_type=FT&uid=".$webdb["cookie"]."&langx=zh-cn";
$thisHttp = new cHTTP();
$thisHttp->setReferer($base_url);
$filename = $webdb["datesite"]."app/member/result/result_fs.php?game_type=FT&list_date=".$today."&uid=".$webdb["cookie"]."&langx=zh-cn";
$thisHttp->getPage($filename);
$msg = $thisHttp->getContent();
$msg = strtolower($msg);
$msg=htmlspecialchars($msg);

$msg = str_replace('&quot;','', $msg);
$msg = str_replace('&gt;','',$msg);
$msg = str_replace('&lt;','',$msg);
$msg=preg_replace('/width=(\d+)/','',$msg);
$msg=preg_replace('/color=#cc(\d+)/','',$msg);
$a=explode('/table',$msg);
$th=array('/td','/h2','table','class','time','/th','/tr','b_cen','/font','align','center','font','=',' ',')');
$msg = str_replace($th,'',$a[2]);
$msg = str_replace('-br','td',$msg);
$msg = htmlspecialchars(str_replace('br','<br>',$msg));
$b=explode('tr',$msg);
$ts=count($b);
$m=0;
for ($i=0;$i<=$ts;$i++){
	$c=explode('td',$b[$i]);
	$ds=count($c);
	//print_r($c);
	//echo '<br><br><br>';
	if ($ds >2){
		$v=explode('br',$c[1]);
		$x=explode('br',$c[2]);
		$match_date = substr($v[0],0,strlen($v[0])-4); 
		$match_time = substr($v[1],4,strlen($v[1])); 
		$x_title = substr($x[1],4,strlen($x[1]));
        $match_name = $c[3];
        $win 		= $c[5];
if($win){
		$sql	=	"update t_guanjun set x_result='$win' where x_title='".$x_title."' and match_name='".$match_name."' and match_date='".$match_date."' and match_time='".$match_time."' and match_type=1";
		//echo $sql;
		$mysqli->query($sql);
		$m++;
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
</style>
</head>
<script>
<!--
var limit="200"
if (document.images){
	var parselimit=limit
}
function beginrefresh(){
if (!document.images)
	return
if (parselimit==1)
	self.location.reload()
else{
	parselimit-=1
	curmin=Math.floor(parselimit)
	if (curmin!=0)
		curtime=curmin+"秒后获取数据！"
	else
		curtime=cursec+"秒后获取数据！"

		timeinfo.innerText=curtime
		setTimeout("beginrefresh()",1000)
	}
}

window.onload=beginrefresh

function killerrors() {
	return true;
}
window.onerror = killerrors; 

</script>
<body >
<table width="100%" height="100" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100%" height="100" align="center"><input type=button name=button value="刷新" onClick="window.location.reload()"><?=$today?>日<?=$m?> 条足球冠军比分<br><span id="timeinfo"></span>
      </td>
  </tr>
</table>
</body>
</html>