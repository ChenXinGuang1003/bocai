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
$val	=	explode("|||",$_POST["value"]);
$mid	=	intval($val[3]);
$table	=	$val[4];

if($mid){
	 $MB_Inball		=	$val[0];
     $TG_Inball		=	$val[1];

	 
	 $sql			=	"select Match_Master,match_name,Match_Guest from $table where Match_ID='$mid' limit 1";
	 $query			=	$mysqli->query($sql);
	 $rows			=	$query->fetch_array();
	 
	 $match_name	=	$rows["match_name"];
	 $Match_Master	=	$rows["Match_Master"];
	 $Match_Guest	=	$rows["Match_Guest"];
	 $Match_Date	=	$val[2];
	 
	 $sql			=	"select Match_ID from $table where match_name='$match_name' and Match_Master='$Match_Master' and Match_Guest='$Match_Guest' and Match_Date='".$Match_Date."'";
	 $query			=	$mysqli->query($sql);
	 $mid			=	"";
	 while($rows	=	$query->fetch_array()){
	 	$mid .= $rows["Match_ID"].",";
	 }
	 $mid			=	rtrim($mid,",");
	 $value			=	"";
	 if($table=="volleyball_match")
	{
		$type_str="排球";
	 }
	 if($table=="tennis_match")
	{
		$type_str="网球";
	 }
	 if($table=="other_match")
	{
		$type_str="其他";
	 }
	 if($MB_Inball!="" && $TG_Inball!=""){ //保存全场
	 	$sql		=	"update $table set mb_inball='$MB_Inball',tg_inball='$TG_Inball' where match_id in($mid)";
		$mysqli->query($sql);
		$q				=	$mysqli->affected_rows;
		if($q>0)
		 {
			admin::insert_log($_SESSION["login_name"],get_ip(),$bj_time_now,"编辑了".$type_str."赛事ID为[".$mid."]的[".$MB_Inball.":".$TG_Inball."]比分",session_id(),"",$bj_time_now);
		}
		//保存所有全场单式注单比分
		$sql		=	"select id from k_bet where lose_ok=1 and status=0 and match_id in($mid) order by id desc ";
		$result		=	$mysqli->query($sql); //单式
		$bid		=	"";
		while($rows	=	$result->fetch_array()){
		    $bid	.=	$rows["id"].",";
		}
		if($bid != ""){ //全场
			$bid	=	rtrim($bid,",");
			$sql	=	"update k_bet set MB_Inball='$MB_Inball',TG_Inball='$TG_Inball' where id in($bid)";
			$mysqli->query($sql);
		}
		
		echo 1;
		exit;
	 }
}else{
	echo 3;
	exit;
}
?>