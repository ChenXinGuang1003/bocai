<?php
session_start();
include_once('../include/config.php');
include_once('../include/function.php');
check_login(); //验证用户是否已登陆
include_once('../cache/lqgq.php');

$name	=	'';
if($_GET['matchname']==""){
	msg('参数错误，请返回');
}else{
	$name=$_GET['matchname'];
}
$i		=	0;
$rows	=	array();

if(time()-$lasttime > 10){ //超时
	if($count > 0){ //有数据重新采集一次，看是否有数据
		msg("赔率发生改变,重新下注.[702]");
	}
}


if(time()-$lasttime <= 10){ //3秒内更新，才是最新滚球数据
	foreach($lqgq as $k=>$v){
		if($name == $v['Match_Name']){ //属于用户选择的联赛下的赛事
			$rows[$i++]	=	$lqgq[$k];
		}
	}
}

header("Content-type: text/vnd.wap.wml");
echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.3//EN" "http://www.wapforum.org/DTD/wml13.dtd">
<wml><head>
<meta http-equiv="Cache-Control" content="max-age=0" />
</head>
	<card title="篮球滚球">
		<p>
			<?=$name?>
			<br/>
			<br/>
<?php
if(count($rows) < 1){
?>
			暂无赛事
			<br/>
<?php
}else{
	foreach($rows as $k=>$row){
		$row['Match_Guest']		=	str_replace("&","&amp;",$row['Match_Guest']);
		$row['Match_Master']	=	str_replace("&","&amp;",$row['Match_Master']);
?>
			开赛时间:<?=$row['Match_Time']?><br/>
			<?php
			if($row["Match_Ho"]!=0.00){
				echo $row['Match_Master'];
				if($row['Match_ShowType'] == 'H') echo '('.$row['Match_RGG'].')'; //主让
				echo '<a href="lqgq_bet.php?matchname='.urlencode($name).'&amp;matchid='.$row['Match_ID'].'&amp;type=Match_Ho" title="'.$row["Match_Ho"].'">'.$row["Match_Ho"].'</a><br/>';
				echo $row['Match_Guest'];
				if($row['Match_ShowType'] == 'C') echo '('.$row['Match_RGG'].')'; //客让
				echo '<a href="lqgq_bet.php?matchname='.urlencode($name).'&amp;matchid='.$row['Match_ID'].'&amp;type=Match_Ao" title="'.$row["Match_Ao"].'">'.$row["Match_Ao"].'</a><br/>';
			}else{
			?>
			<?=$row['Match_Master']?><br/>
			<?=$row['Match_Guest']?><br/>
			<?php
			}
			if($row["Match_DxDpl"]!=0.00){
			?>
			大(<?=$row["Match_DxGG"]?>)<a href="lqgq_bet.php?matchname=<?=urlencode($name)?>&amp;matchid=<?=$row['Match_ID']?>&amp;type=Match_DxDpl" title="<?=$row["Match_DxDpl"]?>"><?=$row["Match_DxDpl"]?></a><br/>
			小(<?=$row["Match_DxGG"]?>)<a href="lqgq_bet.php?matchname=<?=urlencode($name)?>&amp;matchid=<?=$row['Match_ID']?>&amp;type=Match_DxXpl" title="<?=$row["Match_DxXpl"]?>"><?=$row["Match_DxXpl"]?></a><br/>
			<?php
			}
			?>
			<br/>
<?php
	}
}
?>
			<a href="bet_lqgq.php?matchname=<?=urlencode($name)?>" title="刷新">刷新</a> <a href="lqgq.php" title="返回">返回</a><br/>
			<a href="../main.php" title="返回菜单">返回菜单</a>
		</p>
	</card>
</wml>