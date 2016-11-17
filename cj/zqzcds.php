<?php
header("Content-type: text/html; charset=utf-8");
include_once("db.php");
include_once("pub_library.php");
include_once("http.class.php");
include_once("mysqli.php");
include_once("function.php");

$langx	=	'zh-cn';
$scend	=	3;
$msg	=	$_GET['msg'] ? $_GET['msg']*1 : 0;
$t_page	=	$_GET['t_page'] ? $_GET['t_page']*1 : 1;
$pages	=	$_GET['pages'] ? $_GET['pages']*1 : 0;
$show_pages	=	$pages+1;
$show_msg	=	$msg;
if($pages<$t_page){
	$data=theif_data($webdb["datesite"],$webdb["cookie"],'FU','r',$langx,$pages);
	//print_r($data);exit;
	$pb=explode('t_page=',$data);
	$pb=explode(';',$pb[1]);
	$t_page=$pb[0]*1;
	
	if(sizeof(explode("gamount",$data))>1){
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
				$datainfo[24]	=	str_replace(' ','',$datainfo[24]);
				$datainfo[27]	=	str_replace(' ','',$datainfo[27]);
			
				$datainfo[11]	=	substr($datainfo[11],1,strlen($datainfo[11])-1); //去UO
				$datainfo[27]	=	substr($datainfo[27],1,strlen($datainfo[27])-1); //去UO
				
				if( !$datainfo[9])	$datainfo[9]	 =	0;
				if( !$datainfo[10])	$datainfo[10]	 =	0;
				if( !$datainfo[13]) $datainfo[13]	 =	0;
				if( !$datainfo[14])	$datainfo[14]	 =	0;
				if( !$datainfo[20])	$datainfo[20]	 =	0;
				else $datainfo[20]	 -=	0.01;
				if( !$datainfo[21])	$datainfo[21]	 =	0;
				else $datainfo[21]	 -=	0.01;
				if( !$datainfo[25])	$datainfo[25]	 =	0;
				if( !$datainfo[26])	$datainfo[26]	 =	0;
				if( !$datainfo[29]) $datainfo[29]	 =	0;
				if( !$datainfo[30])	$datainfo[30]	 =	0;
				if( !$datainfo[34])	$datainfo[34]	 =	0;
				if( !$datainfo[15])	$datainfo[15]	 =	0;
				if( !$datainfo[16])	$datainfo[16]	 =	0;
				if( !$datainfo[17])	$datainfo[17]	 =	0;
				if( !$datainfo[31])	$datainfo[31]	 =	0;
				if( !$datainfo[32])	$datainfo[32]	 =	0;
				if( !$datainfo[33])	$datainfo[33]	 =	0;
				
				$dx	=	array();
				$dx	=	get_HK_ior($datainfo[9],$datainfo[10]);
				$datainfo[9]	=	$dx[0];
				$datainfo[10]	=	$dx[1];
				$dx	=	get_HK_ior($datainfo[13],$datainfo[14]);
				$datainfo[13]	=	$dx[0];
				$datainfo[14]	=	$dx[1];
				
				$time			=	explode('<br>',strtolower($datainfo[1]));
				$isLose			=	isset($time[2]) ? '1' : '0';
				$CoverDate	=	date("Y").'-'.$time[0].' '.cdate($time[1]);
				
				$sql	=	"select id from `bet_match` where Match_ID='".$datainfo[0]."'";
				$mysqli->query($sql);
				if($mysqli->affected_rows){ //有数据，更新
					$sql	=	"update bet_Match set Match_HalfId='$datainfo[22]',Match_MasterID='$datainfo[3]',Match_GuestID='$datainfo[4]',Match_Date='$time[0]',Match_Time='$time[1]',Match_IsLose='$isLose',Match_Type=0,Match_ShowType='$datainfo[7]',Match_Ho=$datainfo[9],Match_Ao=$datainfo[10],Match_RGG='$datainfo[8]',Match_BzM=$datainfo[15],Match_BzG=$datainfo[16],Match_BzH=$datainfo[17],Match_DxGG='$datainfo[11]',Match_DxDpl=$datainfo[14],Match_DxXpl=$datainfo[13],Match_DsDpl=$datainfo[20],Match_DsSpl=$datainfo[21],Match_Hr_ShowType='$datainfo[23]',Match_BRpk='$datainfo[24]',Match_BHo=$datainfo[25],Match_BAo=$datainfo[26],Match_Bdpl=$datainfo[30],Match_Bxpl=$datainfo[29],Match_BDxpk='$datainfo[27]',Match_Bmdy=$datainfo[31],Match_Bgdy=$datainfo[32],Match_Bhdy=$datainfo[33],Match_TypePlay=$datainfo[34],Match_CoverDate='$CoverDate',Match_LstTime=now(),iPage=".($pages+1).",iSn=".($i+1)." WHERE Match_ID='$datainfo[0]' AND Match_StopUpdatezc=0";
				}else{ //没数据，插入
					$sql	=	"insert into Bet_Match(Match_ID,Match_HalfId,Match_Date,Match_Time,Match_Name,Match_Master,Match_Guest,Match_IsLose,Match_Type,Match_ShowType,Match_Ho,Match_Ao,Match_RGG,Match_BzM,Match_BzG,Match_BzH,Match_DxGG,Match_DxDpl,Match_DxXpl,Match_DsDpl,Match_DsSpl,Match_Hr_ShowType,Match_BRpk,Match_BHo,Match_BAo,Match_Bdpl,Match_Bxpl,Match_BDxpk,Match_CoverDate,Match_MasterID,Match_GuestID,Match_Bmdy,Match_Bgdy,Match_Bhdy,Match_TypePlay,Match_MatchTime,Match_LstTime,iPage,iSn) values ('$datainfo[0]','$datainfo[22]','$time[0]','$time[1]','$datainfo[2]','$datainfo[5]','$datainfo[6]','$isLose',0,'$datainfo[7]',$datainfo[9],$datainfo[10],'$datainfo[8]',$datainfo[15],$datainfo[16],$datainfo[17],'$datainfo[11]',$datainfo[14],$datainfo[13],$datainfo[20],$datainfo[21],'$datainfo[23]','$datainfo[24]',$datainfo[25],$datainfo[26],$datainfo[30],$datainfo[29],'$datainfo[27]','$CoverDate','$datainfo[3]','$datainfo[4]',$datainfo[31],$datainfo[32],$datainfo[33],$datainfo[34],'".$time[0].' '.$time[1]."',now(),".($pages+1).",".($i+1).")";
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
    <?=$show_pages?>页<?=$show_msg?>条足早单式！
        <span id="timeinfo"></span>
        </td>
  </tr>
</table>
<?php
if($scend == 120){
?>
<script language="javascript">
window.parent.zqzc_ds = <?=$show_msg?>;
</script>
<?php
}
?>
</body>
</html>