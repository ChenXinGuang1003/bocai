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
	$data=theif_data($webdb["datesite"],$webdb["cookie"],'FU','pd',$langx,$pages);
	
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
			
			$time			=	explode('<br>',strtolower($datainfo[1]));
			$isLose			=	isset($time[2]) ? '1' : '0';
			$CoverDate		=	date("Y").'-'.$time[0].' '.cdate($time[1]);
			
			for($num=8;$num<=33;$num++) if( !$datainfo[$num])	$datainfo[$num]	 =	0;
			
			if($datainfo[0]+0!=0){
				$sql	=	"select id from `bet_match` where Match_ID='".$datainfo[0]."'";
				$mysqli->query($sql);
				if($mysqli->affected_rows){ //有数据，更新
					$sql	=	"Update `bet_Match` set Match_Bd10=$datainfo[8],Match_Bd20=$datainfo[9],Match_Bd21=$datainfo[10],Match_Bd30=$datainfo[11],Match_Bd31=$datainfo[12],Match_Bd32=$datainfo[13],Match_Bd40=$datainfo[14],Match_Bd41=$datainfo[15],Match_Bd42=$datainfo[16],Match_Bd43=$datainfo[17],Match_Bd00=$datainfo[18],Match_Bd11=$datainfo[19],Match_Bd22=$datainfo[20],Match_Bd33=$datainfo[21],Match_Bd44=$datainfo[22],Match_Bdup5=$datainfo[23],Match_Bdg10=$datainfo[24],Match_Bdg20=$datainfo[25],Match_Bdg21=$datainfo[26],Match_Bdg30=$datainfo[27],Match_Bdg31=$datainfo[28],Match_Bdg32=$datainfo[29],Match_Bdg40=$datainfo[30],Match_Bdg41=$datainfo[31],Match_Bdg42=$datainfo[32],Match_Bdg43=$datainfo[33],Match_Type=0,Match_LstTime=now() where Match_ID='$datainfo[0]' AND Match_StopUpdatebd=0";
				}else{ //没有数据，添加
					$sql	=	"insert into `bet_Match` (Match_ID,Match_Date,Match_Time,Match_Name,Match_Master,Match_Guest,Match_IsLose,Match_Bd10,Match_Bd20,Match_Bd21,Match_Bd30,Match_Bd31,Match_Bd32,Match_Bd40,Match_Bd41,Match_Bd42,Match_Bd43,Match_Bd00,Match_Bd11,Match_Bd22,Match_Bd33,Match_Bd44,Match_Bdup5,Match_Bdg10,Match_Bdg20,Match_Bdg21,Match_Bdg30,Match_Bdg31,Match_Bdg32,Match_Bdg40,Match_Bdg41,Match_Bdg42,Match_Bdg43,Match_CoverDate,Match_MasterID,Match_GuestID,Match_Type,Match_LstTime,iPage,iSn) values ('$datainfo[0]','$time[0]','$time[1]','$datainfo[2]','$datainfo[5]','$datainfo[6]','$isLose',$datainfo[8],$datainfo[9],$datainfo[10],$datainfo[11],$datainfo[12],$datainfo[13],$datainfo[14],$datainfo[15],$datainfo[16],$datainfo[17],$datainfo[18],$datainfo[19],$datainfo[20],$datainfo[21],$datainfo[22],$datainfo[23],$datainfo[24],$datainfo[25],$datainfo[26],$datainfo[27],$datainfo[28],$datainfo[29],$datainfo[30],$datainfo[31],$datainfo[32],$datainfo[33],'$CoverDate','$datainfo[3]','$datainfo[4]',0,now(),".($pages+1).",".($i+1).")";
				}
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
    <?=$show_pages?>页<?=$show_msg?>条足早波胆！
        <span id="timeinfo"></span>
        </td>
  </tr>
</table>
<?php
if($scend == 120){
?>
<script language="javascript">
window.parent.zqzc_bd = <?=$show_msg?>;
</script>
<?php
}
?>
</body>
</html>