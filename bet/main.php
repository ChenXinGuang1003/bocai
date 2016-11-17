<?php
//ini_set('display_errors', 'on');
session_start();
include_once('include/address.mem.php');
include_once('include/config.php');
include_once('include/function.php');
check_login(); //验证用户是否已登陆

$userid=intval($_SESSION["userid"]);
$sql	=	"select money from user_list where user_id='".$userid."' limit 0,1";
$query	=	$mysqli->query($sql);
$row	=	$query->fetch_array();

header("Content-type: text/vnd.wap.wml");
echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.3//EN" "http://www.wapforum.org/DTD/wml13.dtd">
<wml><head>
<meta http-equiv="Cache-Control" content="max-age=0" />
</head>
	<card title="<?=$web_name?>">
		<p>
			账号：<?=$_SESSION["username"]?>
			<br/>
			金额：<?=double_format($row['money'])?>
			<br/>
			<br/>
<?php
$num	=	0;
$sql	=	"select id from bet_match WHERE Match_Type=1 AND Match_CoverDate>'".$et_time_now."' AND Match_Date='".date("m-d",$et_time)."' group by match_name order by match_id asc"; //足球单式联赛总个数
$query	=	$mysqli->query($sql);
while($row	=	$query->fetch_array()){
	$num++;
}
?>
			<a href="bet/zqds.php" title="足球单式">足球单式</a>(<?=$num?>)
			<br/>
<?php
$num	=	0;
$sql	=	"select id from bet_match WHERE Match_Type=1 and match_date='".date("m-d",$et_time)."' AND Match_CoverDate>'".$et_time_now."' and (Match_BHo+Match_BAo<>0 or Match_Bdpl+Match_Bxpl<>0) and Match_IsShowb=1 group by match_name order by match_id asc"; //足球上半场联赛总个数
$query	=	$mysqli->query($sql);
while($row	=	$query->fetch_array()){
	$num++;
}
?>
			<a href="bet/zqsbc.php" title="足球上半场">足球上半场</a>(<?=$num?>)
			<br/>
<?php
include_once("cache/zqgq.php");
$match_names = array();
if(isset($zqgq) && !empty($zqgq) && time()-$lasttime < 30){
	for($i=0; $i<$count; $i++){
		$match_names[] = $zqgq[$i]['Match_Name'];    ////只保留联赛名
	}
}
$match_name_array = array_values(array_unique($match_names));
?>
			<a href="bet/zqgq.php" title="足球滚球">足球滚球</a>(<?=count($match_name_array)?>)
			<br/>
<?php
$num	=	0;
$sql	=	"select id from lq_match WHERE Match_Type!=3 AND Match_CoverDate>'".$et_time_now."' AND Match_Date='".date("m-d",$et_time)."' group by match_name order by match_id asc"; //足球上半场联赛总个数
$query	=	$mysqli->query($sql);
while($row	=	$query->fetch_array()){
	$num++;
}
?>
			<a href="bet/lqds.php" title="篮球单式">篮球单式</a>(<?=$num?>)
			<br/>
<?php
$num	=	0;
$sql	=	"select id from lq_match WHERE Match_Type=3 AND Match_CoverDate>='".$et_time_now."' AND Match_Date='".date("m-d",$et_time)."' group by match_name order by match_id asc"; //篮球单节联赛总个数
$query	=	$mysqli->query($sql);
while($row	=	$query->fetch_array()){
	$num++;
}
?>
			<a href="bet/lqdj.php" title="篮球单节">篮球单节</a>(<?=$num?>)
			<br/>
<?php
include_once("cache/lqgq.php");
$match_names = array();
if(isset($lqgq) && !empty($lqgq) && time()-$lasttime < 30){
	$zqcount = count($lqgq);
	for($i=0; $i<$count; $i++){
		$match_names[] = $lqgq[$i]['Match_Name'];    ////只保留联赛名
	}
}
$match_name_array = array_values(array_unique($match_names));
?>
			<a href="bet/lqgq.php" title="篮球滚球">篮球滚球</a>(<?=count($match_name_array)?>)
			<br/>
			<br/>
			<a href="history_account.php" title="账户历史">账户历史</a>
			<br/>
			<a href="menus.php" title="交易状况">交易状况</a>
			<br/>
			<br/>
			<a href="logout.php" title="退出">退出</a>
		</p>
	</card>
</wml>