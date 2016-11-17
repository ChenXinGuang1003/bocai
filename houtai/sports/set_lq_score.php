<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");


$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");

include_once($C_Patch."/app/member/include/config.inc.php");

include_once($C_Patch."/app/member/common/function.php");

include_once("../class/admin.php");

include_once("../common/login_check.php"); 

check_quanxian("手工录入体育比分");

$mid				=	$_POST["mid"][0];
if($_GET['action'] == 'save'){
	$mid			=	$_GET["mid"];
	$MB				=	$_GET['MB_Inball_OK'];
	$TG				=	$_GET['TG_Inball_OK'];
	 
	$sql			=	"select Match_Master,match_name,Match_Guest from lq_match where Match_ID=$mid limit 1";
	$query			=	$mysqli->query($sql);
	$rows			=	$query->fetch_array();
	
	$match_name		=	$rows["match_name"];
	$Match_Master	=	$rows["Match_Master"];
	$Match_Guest	=	$rows["Match_Guest"];
	$Match_Date		=	$_GET["date"];
	
	$sql			=	"select Match_ID from lq_match where match_name='$match_name' and Match_Master='$Match_Master' and Match_Guest='$Match_Guest' and Match_Date='".$Match_Date."'";
	$query			=	$mysqli->query($sql);
	$mid			=	"";
	while($rows		=	$query->fetch_array()){
		$mid .= $rows["Match_ID"].",";
	}
	$mid			=	rtrim($mid,",");
	$value			=	"";
	if($MB!="" && $TG!=""){ //保存
		
		$mb_inball	=	'MB_Inball'; //默认全场
		$tg_inball	=	'TG_Inball'; //默认全场
		$preg1		=	"/第[1-4]节/";
		if(strpos($Match_Master,'上半') && strpos($Match_Guest,'上半')){
			$mb_inball		=	'MB_Inball_HR'; //上半场
			$tg_inball		=	'TG_Inball_HR'; //上半场
		}elseif(preg_match($preg1,$Match_Master,$num) && preg_match($preg1,$Match_Guest,$num)){
			if(strpos($num[0],'1')){
				$mb_inball	=	'MB_Inball_1st'; //第1节
				$tg_inball	=	'TG_Inball_1st'; //第1节
			}elseif(strpos($num[0],'2')){
				$mb_inball	=	'MB_Inball_2st'; //第2节
				$tg_inball	=	'TG_Inball_2st'; //第2节
			}elseif(strpos($num[0],'3')){
				$mb_inball	=	'MB_Inball_3st'; //第3节
				$tg_inball	=	'TG_Inball_3st'; //第3节
			}elseif(strpos($num[0],'4')){
				$mb_inball	=	'MB_Inball_4st'; //第4节
				$tg_inball	=	'TG_Inball_4st'; //第4节
			}
		}elseif(strpos($Match_Master,'下半') && strpos($Match_Guest,'下半')){
			$mb_inball		=	'MB_Inball_ER'; //下半场
			$tg_inball		=	'TG_Inball_ER'; //下半场
		}elseif(strpos($Match_Master,'加时') && strpos($Match_Guest,'加时')){
			$mb_inball		=	'MB_Inball_ADD'; //加时
			$tg_inball		=	'TG_Inball_ADD'; //加时
		}
	
	
		$sql		=	"update lq_match set $mb_inball='$MB',$tg_inball='$TG',MB_Inball_OK='$MB',TG_Inball_OK='$TG' where match_id in($mid)";
		$mysqli->query($sql);
		
		//保存所有全场单式注单比分
		$sql		=	"select id from k_bet where lose_ok=1 and status=0 and match_id in($mid) order by id desc ";
		$result		=	$mysqli->query($sql); //单式
		$bid		=	"";
		while($rows	=	$result->fetch_array()){
			$bid	.=	$rows["bid"].",";
		}
		if($bid != ""){ //全场
			$bid	=	rtrim($bid,",");
			$sql	=	"update k_bet set MB_Inball='$MB',TG_Inball='$TG' where id in($bid)";
			$mysqli->query($sql);
		}
		
		//保存所有全场串关注单比分
		$sql		=	"select id from k_bet_cg where status=0 and match_id in($mid) order by id desc";
		$result_cg	=	$mysqli->query($sql); //串关
		$bid		=	"";
		while($rows	=	$result_cg->fetch_array()) {
			$bid	.=	$rows["bid"].",";
		}
		if($bid != ""){
			$bid	=	rtrim($bid,",");
			$sql	=	"update k_bet_cg set mb_inball='$MB',tg_inball='$TG' where id in($bid)";
			$mysqli->query($sql);
		}

		admin::insert_log($_SESSION["login_name"],get_ip(),$bj_time_now,"(结算后)编辑了篮球赛事ID为[".$mid."]的比分:[".$MB.":".$TG."]比分",session_id(),"",$bj_time_now);
	}
	message('本次录入完成',"lqbf_yjs.php");
}
$sql		=	"select Match_Master,Match_Guest,Match_Name,MB_Inball_OK,TG_Inball_OK,Match_Date from lq_match where Match_ID=$mid limit 1";
$query		=	$mysqli->query($sql);
$rows		=	$query->fetch_array();
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>设置比分</title>
<link href="../Images/css1/css.css" rel="stylesheet" type="text/css">
<script language="javascript">
function check_sub(){
	var mb=document.getElementById("MB_Inball_OK").value;
	var tg=document.getElementById("TG_Inball_OK").value;
	if(mb.length < 1){
		alert('请填主队进球');
		return false;
	}
	if(tg.length < 1){
		alert('请填客队进球');
		return false;
	}
	return true;
}
</script>
</head>
<body bgcolor="#EAFFD7">
<form action="set_lq_score.php" method="get" name="form1" id="form1" onsubmit="return check_sub();">
<table width="500"  border="1" align="center" cellpadding="4" cellspacing="0" bgcolor="#E8DCC4">
  <tr align="center">
    <td colspan="2" style="background:#986032; color: #FFFFFF;font-weight: bold;">设置结算比分
      <input name="mid" type="hidden" id="mid" value="<?=$mid?>" />
      <input name="action" type="hidden" id="action" value="save" />
	  <input name="date" type="hidden" id="date" value="<?=$rows["Match_Date"]?>" /></td>
  </tr>
  <tr style="background: #C0AB58; color: #9C4945;font-weight: bold;">
    <td colspan="2" align="center"><?=$rows["Match_Name"]?></td>
    </tr>
  <tr style="font-size:14px; text-align:center">
    <td width="239" align="center"><?=$rows["Match_Master"]?></td>
    <td width="239" align="center"><?=$rows["Match_Guest"]?></td>
  </tr>
  <tr style="font-size:14px; text-align:center">
    <td align="center"><input  name="MB_Inball_OK" type="text"  id="MB_Inball_OK" value="<?=$rows["MB_Inball_OK"]?>" size="10" maxlength="10"/></td>
    <td align="center"><input  name="TG_Inball_OK" type="text" id="TG_Inball_OK" value="<?=$rows["TG_Inball_OK"]?>" size="10" maxlength="10"/></td>
  </tr>
  <tr align="center">
    <td colspan="2"><input type="submit" value="提交" />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
       <input type="button" onclick="javascript:history.go(-1);" value="返回" /></td>
  </tr>
</table>
</form>
</body>
</html>