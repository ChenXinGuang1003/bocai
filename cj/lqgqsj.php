<?php
include_once("db.php");
include_once("pub_library.php");
include_once("http.class.php");
include_once("mysqli.php");
include_once("function.php");
header("Content-type: text/html; charset=utf-8");

$langx	=	'zh-cn';
$t_page	=	1;
$msg	=	0;
$data=theif_data($webdb["datesite"],$webdb["cookie"],'BK','re_all',$langx,0);
if (sizeof(explode("gamount",$data))>1){
	preg_match_all("/g\((.+?)\);/is",$data,$matches);
	$cou	=	sizeof($matches[0]);
	for($i=0;$i<$cou;$i++){
		$messages		=	$matches[0][$i];
		$messages=str_replace("g([","Array(",$messages);
		$messages=str_replace("]);",")",$messages);
		$messages		=	str_replace("cha(9)","",$messages);
		$datainfo		=	eval("return $messages;");
		$datainfo[5]	=	ereg_replace("<[^>]*>","",$datainfo[5]);
		$datainfo[6]	=	ereg_replace("<[^>]*>","",$datainfo[6]);
		$datainfo[8]	=	str_replace(' ','',$datainfo[8]);
		$datainfo[11]	=	str_replace(' ','',$datainfo[11]);
		$datainfo[11]	=	substr($datainfo[11],1,strlen($datainfo[11])-1);
		$datainfo[32]	=	substr($datainfo[32],0,5);
		if( !$datainfo[9])	$datainfo[9]	 =	0;
		if( !$datainfo[10])	$datainfo[10]	 =	0;
		if( !$datainfo[13])	$datainfo[13]	 =	0;
		if( !$datainfo[14])	$datainfo[14]	 =	0;
		if( !$datainfo[18])	$datainfo[18]	 =	0;
		if( !$datainfo[19])	$datainfo[19]	 =	0;
		$CoverDate		=	date("Y-m-d").' '.cdate($datainfo[1]);
		$HgDate			=	date("m-d").' '.$datainfo[1];
		$sql			=	"select id from `lq_match` where Match_ID='$datainfo[0]'";
		$mysqli->query($sql);
		if($mysqli->affected_rows){ //有数据，更新
			 $sql		=	"update lq_match set Match_Time='$datainfo[1]',Match_Type=2,Match_ShowType='$datainfo[7]',Match_Ho='$datainfo[9]',Match_Ao='$datainfo[10]',Match_RGG='$datainfo[8]',Match_DxGG='$datainfo[11]',Match_DxDpl='$datainfo[14]',Match_DxXpl='$datainfo[13]',Match_MasterID='$datainfo[3]',Match_GuestID='$datainfo[4]',Match_LstTime=now() WHERE Match_ID='$datainfo[0]' AND Match_StopUpdateg=0";
		}else{ //没数据，插入
			$sql		=	"insert into lq_match(Match_ID,Match_Time,Match_Date,Match_Name,Match_Master,Match_Guest,Match_Type,Match_ShowType,Match_Ho,Match_Ao,Match_RGG,Match_DxGG,Match_DxDpl,Match_DxXpl,Match_CoverDate,Match_MatchTime,Match_MasterID,Match_GuestID,Match_LstTime,iPage,iSn) values ('$datainfo[0]','$datainfo[1]','".date("m-d")."','$datainfo[2]','$datainfo[5]','$datainfo[6]',2,'$datainfo[7]','$datainfo[9]','$datainfo[10]','$datainfo[8]','$datainfo[11]','$datainfo[14]','$datainfo[13]','$CoverDate','$HgDate','$datainfo[3]','$datainfo[4]',now(),1,".($i+1).")";
		}
		$mysqli->query($sql);
		$msg++;
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
<!-- 
var limit="12" 
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
    <input type=button name=button value="刷新" onClick="window.location.reload()">
    <?=$msg?> 条篮球滚球！
        <span id="timeinfo"></span>
      </td>
  </tr>
</table>
</body>
</html>