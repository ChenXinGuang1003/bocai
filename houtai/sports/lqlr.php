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
$val				=	explode("|||",$_POST["value"]);
$mid				=	intval($val[3]);

if($mid){
	 $MB			=	$val[0];
     $TG			=	$val[1];

	 
	 $sql			=	"select Match_Master,match_name,Match_Guest from lq_match where Match_ID='$mid' limit 1";
	 $query			=	$mysqli->query($sql);
	 $rows			=	$query->fetch_array();
	 
	 $match_name	=	$rows["match_name"];
	 $Match_Master	=	$rows["Match_Master"];
	 $Match_Guest	=	$rows["Match_Guest"];
	 $Match_Date	=	$val[2];
	 
	 $sql			=	"select Match_ID from lq_match where match_name='$match_name' and Match_Master='$Match_Master' and Match_Guest='$Match_Guest' and Match_Date='".$Match_Date."'";
	 $query			=	$mysqli->query($sql);
	 $mid			=	"";
	 while($rows	=	$query->fetch_array()){
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
		$q				=	$mysqli->affected_rows;
		if($q>0)
		 {
			admin::insert_log($_SESSION["login_name"],get_ip(),$bj_time_now,"编辑了蓝球赛事ID为[".$mid."]的[".$MB.":".$TG."]比分",session_id(),"",$bj_time_now);
		}
		//保存所有全场单式注单比分
		$sql		=	"select id from k_bet where lose_ok=1 and `status`=0 and match_id in($mid) order by id desc ";
		$result		=	$mysqli->query($sql); //单式
		$bid		=	"";
		while($rows	=	$result->fetch_array()){
		    $bid	.=	$rows["id"].",";
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
			$bid	.=	$rows["id"].",";
		}
		if($bid != ""){
			$bid	=	rtrim($bid,",");
			$sql	=	"update k_bet_cg set mb_inball='$MB',tg_inball='$TG' where id in($bid)";
			$mysqli->query($sql);
		}
		
		echo "1,$mb_inball,$tg_inball";
		exit;
	 }
}else{
	echo 3;
	exit;
}
?>