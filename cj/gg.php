<?php
include_once("db.php");
include_once("pub_library.php");
include_once("http.class.php");
include_once("mysqli.php");
include_once("function.php");
header("Content-type: text/html; charset=utf-8");
$langx	=	'zh-cn';
	$data=gg($webdb["datesite"],$webdb["cookie"],$langx);
	$data = str_replace('&quot;','', $data);
$data = str_replace('&gt;','', $data);	
$data = str_replace('&lt;','', $data);	
	$data = str_replace('/tr','|', $data); 
	$data = str_replace('/td','&', $data); 
	$pb=explode('table border=0 cellspacing=0 cellpadding=4 class=game',$data);
	$th=array('class','color_bg2','style','display',':','onMouseOver','overbars','\'','(',')',',','this','color_bg3','onMouseOut','outbars','width=70','width=40','m_cen','m_lef','color_bg1','tr','td',';','=','/',' ');
      $qu = str_replace($th,'', $pb[2]);
	$q=explode('table',$qu);
	$h=explode('|',$q[0]);
	$c=count($h);

	$end_time = date("Y-m-d",strtotime("+3 days"))." 00:00:00";  // 结束时间
	for ($i=$c;$i>=0;$i--){
			$x=explode('&',$h[$i]);
			$create_date='20'.$x[1].' 00:00:00';
			$msg=$x[2];
			$sqlq = "select * from  sys_announcement where content = '".$msg."'";
                $dataResult = $mysqli->query($sqlq);
				if(!$dataResult->fetch_array()){ 
			$sql		=	"insert into sys_announcement(content,end_time,is_show,`sort`) values ('$msg','$end_time','1','1')";
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
</style>
</head>
<body>
<script> 
<!-- 
var limit="500";
if (document.images){ 
	var parselimit=limit
} 

function beginrefresh(){ 
if (!document.images) 
	return 
if (parselimit==1) 
	window.location.href="";
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
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td align="left">
    <input type=button name=button value="刷新" onClick="window.location.href='';">
    <?=$c?>公告！
        <span id="timeinfo"></span>
        </td>
  </tr>
</table>

</body>
</html>