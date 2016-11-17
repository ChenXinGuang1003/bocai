<?php
include_once("db.php");
include_once("pub_library.php");
include_once("http.class.php");
include_once("mysqli.php");
include_once("function.php");
header("Content-type: text/html; charset=utf-8");

$langx	=	'zh-cn';
$scend	=	3;
$msg	=	$_GET['msg'] ? $_GET['msg']*1 : 0;
$t_page	=	$_GET['t_page'] ? $_GET['t_page']*1 : 1;
$pages	=	$_GET['pages'] ? $_GET['pages']*1 : 0;
$show_pages	=	$pages+1;
$show_msg	=	$msg;
if($pages<$t_page){
//for($pages=0;$pages<$t_page;$pages++){
	$data=theif_data($webdb["datesite"],$webdb["cookie"],'FU','hr',$langx,$pages);
	//echo $data;exit;
	$pb=explode('t_page=',$data);
	$pb=explode(';',$pb[1]);
	$t_page=$pb[0]*1;
	
	if (sizeof(explode("gamount",$data))>1){
		$k=0;
		preg_match_all("/g\((.+?)\);/is",$data,$matches);
		$cou=sizeof($matches[0]);
		for($i=0;$i<$cou;$i++){
			$messages=$matches[0][$i];
			$messages=str_replace("g([","Array(",$messages);
		$messages=str_replace("]);",")",$messages);
			$messages=str_replace("cha(9)","",$messages);
			$datainfo=eval("return $messages;");

			if($datainfo[0]+0!=0){
				$datainfo[8]	=	str_replace(' ','',$datainfo[8]);
				$datainfo[11]	=	str_replace(' ','',$datainfo[11]);
				
				$datainfo[11]	=	substr($datainfo[11],1,strlen($datainfo[11])-1); //去UO
				
				if( !$datainfo[9])	$datainfo[9]	 =	0;
				if( !$datainfo[10])	$datainfo[10]	 =	0;
				if( !$datainfo[13])	$datainfo[13]	 =	0;
				if( !$datainfo[14])	$datainfo[14]	 =	0;
				if( !$datainfo[15])	$datainfo[15]	 =	0;
				if( !$datainfo[16])	$datainfo[16]	 =	0;
				if( !$datainfo[17])	$datainfo[17]	 =	0;


				$dx	=	array();
				$dx	=	get_HK_ior($datainfo[9],$datainfo[10]);
				$datainfo[9]	=	$dx[0];
				$datainfo[10]	=	$dx[1];
				$dx	=	get_HK_ior($datainfo[13],$datainfo[14]);
				$datainfo[13]	=	$dx[0];
				$datainfo[14]	=	$dx[1];
				
				$sql	=	"Update bet_Match set Match_Hr_ShowType='$datainfo[7]',Match_BRpk='$datainfo[8]',Match_BHo=$datainfo[9],Match_BAo=$datainfo[10],Match_Bdxpk='$datainfo[11]',Match_Bxpl=$datainfo[13],Match_Bdpl=$datainfo[14],Match_Bmdy=$datainfo[15],Match_Bgdy=$datainfo[16],Match_Bhdy=$datainfo[17],Match_LstTime=now(),Match_MasterID='$datainfo[3]',Match_GuestID='$datainfo[4]' WHERE Match_HalfId='$datainfo[0]' AND Match_StopUpdateb=0";
				//echo $sql."<br>";
				$mysqli->query($sql);
				$msg++;
			}
		}
	}
	$show_msg	=	$msg;
	$pages++;
}else{
	$show_pages--;
	$scend	=	120;
	$t_page	=	0;
	$pages	=	0;
	$msg	=	0;
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
<link href="/style/style.css" rel="stylesheet" type="text/css">
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
var limit="<?=$scend?>";
if (document.images){ 
	var parselimit=limit
} 

function beginrefresh(){ 
if (!document.images) 
	return 
if (parselimit==1) 
	window.location.href="?t_page=<?=$t_page?>&msg=<?=$msg?>&pages=<?=$pages?>";
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
    <input type=button name=button value="刷新" onClick="window.location.href='?';">
    <?=$show_pages?>页<?=$show_msg?>条足早上半场！
        <span id="timeinfo"></span>
        </td>
  </tr>
</table>
<?php
if($scend == 120){
?>
<script language="javascript">
window.parent.zqzc_sbc = <?=$show_msg?>;
</script>
<?php
}
?>
</body>
</html>