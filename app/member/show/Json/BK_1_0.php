<?php
session_start();
header("Expires: Mon, 26 Jul 1970 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");          
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header('Content-type: text/json; charset=utf-8');
include_once "../../include/com_chk.php";
include_once("../../common/function.php");
$callback="";
$callback=@$_GET['callback'];
include_once("../../cache/lqgq.php");

if(time()-$lasttime > 120){ //超时
	$json["dh"]	=	0;
	$json["fy"]["p_page"] = "0";
	echo $callback."(".json_encode($json).");";
	exit;
}

if($count == 0){ //没数据
		$json["dh"]	=	0;
		$json["fy"]["p_page"] = "0";
		echo $callback."(".json_encode($json).");";
		exit;
	}
$bk			=	50; //每页显示记录总个数
$this_page	=	0; //当前页
if(intval($_GET["CurrPage"])>0) $this_page	=	$_GET["CurrPage"];
$this_page++;
$start		=	($this_page-1)*$bk; //本页记录开始位置，数组从0开始
$end		=	$this_page*$bk-1; //本页记录结束位置，数组从0开始，所以要减1

$match_names=	array();
$info_array	=	array();

if(isset($lqgq) && !empty($lqgq)){
	$zqcount = count($lqgq);
	for($i=0; $i<$zqcount; $i++){
		$rows[] = $lqgq[$i];      ////保留所有的数据
		$match_names[] = $lqgq[$i]['Match_Name'];    ////只保留联赛名
	}
}

$match_name_array = array_values(array_unique($match_names));
if(@$_GET["leaguename"]<>""){
	$leaguename = explode("$",urldecode($_GET["leaguename"]));
	$nums_arr = count($rows);
	for($i=0; $i<$nums_arr; $i++){
		if(in_array($rows[$i]["Match_Name"],$leaguename)){
			$info1[] = $rows[$i];
		}
	}
	$rows = $info1;
}


$count_num = count($rows);
if($count_num == "0"){
	$json["dh"]	=	0;
	$json["fy"]["p_page"]	=	0;
}else{		
	$json["fy"]["p_page"]	=	ceil($count_num/$bk); //总页数
	$json["fy"]["page"] 	=	$this_page-1;
	//联赛名字
	$i	=	0;
	$lsm=	'';
	foreach($match_name_array as $t){
		$lsm	.=	urlencode($t).'|';
		$i++;
	}
	$json["lsm"]=	rtrim($lsm,'|');
	$json["dh"]	=	ceil($i/2)*30; //窗口高度 px 值
	if($end > $count_num-1) $end = $count_num-1;
	$i	=	0;
	for($b=$start; $b<=$end; $b++){ 
		$json["db"][$i]["Match_ID"]			=	$rows[$b]["Match_ID"];
		$json["db"][$i]["Match_Master"]		=	$rows[$b]["Match_Master"];
		$json["db"][$i]["Match_Guest"]		=	$rows[$b]["Match_Guest"];
		$json["db"][$i]["Match_Name"]		=	$rows[$b]["Match_Name"];
		$json["db"][$i]["Match_Time"]		=	$rows[$b]["Match_Time"];
		$json["db"][$i]["Match_Ho"]			=	$rows[$b]["Match_Ho"];
		$json["db"][$i]["Match_DxDpl"]		=	$rows[$b]["Match_DxDpl"];
		$json["db"][$i]["Match_Ao"]			=	$rows[$b]["Match_Ao"];
		$json["db"][$i]["Match_DxXpl"]		=	$rows[$b]["Match_DxXpl"];
		$json["db"][$i]["Match_BzM"]		=	$rows[$b]["Match_BzM"];
		$json["db"][$i]["Match_BzG"]		=	$rows[$b]["Match_BzG"];
		$json["db"][$i]["Match_BzH"]		=	$rows[$b]["Match_BzH"];
		$json["db"][$i]["Match_RGG"]		=	$rows[$b]["Match_RGG"];
		$rows[$b]["Match_DxGG"]<>""?$m="大".$rows[$b]["Match_DxGG"]:$m='';
		$json["db"][$i]["Match_DxGG1"]		=	$m;
		$json["db"][$i]["Match_ShowType"]	=	$rows[$b]["Match_ShowType"];
		$rows[$b]["Match_DxGG"]<>""?$n="小".$rows[$b]["Match_DxGG"]:$n='';
		$json["db"][$i]["Match_DxGG2"]		=	$n;
		$i++;
	}
}
echo $callback."(".json_encode($json).");";
?>