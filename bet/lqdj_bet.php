<?php
session_start();
include_once('../include/config.php');
include_once('../include/function.php');
check_login(); //验证用户是否已登陆

$name	=	'';
$type	=	'';
$id		=	'';
$tn		=	'';
$pk		=	'';
if($_GET['matchname']=="" || $_GET['matchid']=="" || $_GET['type']==""){
	msg('参数错误，请返回');
}else{
	$name	=	$_GET['matchname'];
	$type	=	$_GET['type'];
	$id		=	intval($_GET['matchid']);
}
//账户金额
$sql	=	"select money from user_list where user_id='".$_SESSION["userid"]."'";
$query	=	$mysqli->query($sql);
$row	=	$query->fetch_array();
$money	=	double_format($row['money']);

$sql	=	'';
if($type=="Match_Ho" || $type=="Match_Ao"){ //全场让球
	$sql=	',Match_RGG,Match_ShowType';
}
if($type=="Match_DxDpl" || $type=="Match_DxXpl"){ //全场大小
	$sql=	',Match_DxGG';
}

$sql	=	"SELECT Match_ID,Match_Master,Match_Guest,".$type.$sql." FROM lq_Match WHERE ID='$id'";
$query	=	$mysqli->query($sql);
$row	=	$query->fetch_array();

$row['Match_Guest']		=	str_replace("&","&amp;",$row['Match_Guest']);
$row['Match_Master']	=	str_replace("&","&amp;",$row['Match_Master']);

header("Content-type: text/vnd.wap.wml");
echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.3//EN" "http://www.wapforum.org/DTD/wml13.dtd">
<wml><head>
<meta http-equiv="Cache-Control" content="max-age=0" />
</head>
	<card title="篮球单节">
		<onevent type="ontimer">
			<go href="bet_lqdj.php?matchname=<?=urlencode($name)?>"/>
		</onevent>
		<timer value="200"/>
		<onevent type="onenterforward"><refresh><setvar name="money" value="" /></refresh></onevent>
		<p>
		账户金额：<?=$money?><br/>
		<?=$name?><br/>
<?php
if($type=="Match_Ho" || $type=="Match_Ao"){ //全场让球
	$tn		=	'让球';
	$pk		=	'<postfield name="pk" value="'.$row['Match_RGG'].'" />';
	if($row['Match_ShowType'] == 'H'){ //主让
		echo $row['Match_Master'].'('.$row['Match_RGG'].')'.$row['Match_Guest'].'<br/>';
	}else{
		echo $row['Match_Guest'].'('.$row['Match_RGG'].')'.$row['Match_Master'].'<br/>';
	}
	if($type=="Match_Ho"){ //选择主队
		echo $row['Match_Master'];
	}else{ //选择客队
		echo $row['Match_Guest'];
	}
}else{
	echo $row['Match_Master'].' VS '.$row['Match_Guest'].'<br/>';
	if($type=="Match_DxDpl" || $type=="Match_DxXpl"){ //全场大小
		$tn		=	'大小';
		$pk		=	'<postfield name="pk" value="'.$row['Match_DxGG'].'" />';
		if($type=="Match_DxDpl"){ //选择大
			echo '大';
		}else{ //选择小
			echo '小';
		}
		echo $row['Match_DxGG'];
	}elseif($type=="Match_DsDpl"){ //选择单
		$tn		=	'单双';
		echo '单';
	}elseif($type=="Match_DsSpl"){ //选择双
		$tn		=	'单双';
		echo '双';
	}
}
echo ' @ '.double_format($row[$type]).'<br/>';
$sql_group	=	"SELECT sports_bet,sports_bet_reb,sports_lower_bet FROM user_group where group_id='".@$_SESSION["group_id"]."' limit 0,1";
$query_group	=	$mysqli->query($sql_group);
$group_db	=	$query_group->fetch_array();
?>
		交易金额：<input name="money" size="5" maxlength="5" />
		<br/>
		<a href="lqdj_bet.php?matchname=<?=urlencode($name)?>&amp;type=<?=$type?>&amp;matchid=<?=$id?>&amp;<?=rand()?>" title="刷新">刷新</a> <anchor title="交易">交易<go href="bet.php" method="post"><postfield name="money" value="$(money)" /><postfield name="type" value="<?=$type?>" /><postfield name="pl" value="<?=double_format($row[$type])?>" /><postfield name="id" value="<?=$row['Match_ID']?>" /><postfield name="matchname" value="<?=$name?>" /><postfield name="sort" value="篮球单节" /><?=$pk?></go></anchor><br/>最低限额：<?=$group_db['sports_lower_bet']?><br/>

		<br/>
		<a href="bet_lqdj.php?matchname=<?=urlencode($name)?>" title="继续交易">继续交易</a><br/>
		<a href="../main.php" title="返回菜单">返回菜单</a>
		</p>
	</card>
</wml>