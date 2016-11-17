<?php
session_start();
include_once('../include/config.php');
include_once('../include/function.php');
check_login(); //验证用户是否已登陆

$name	=	'';
if($_GET['matchname']==""){
	msg('参数错误，请返回');
}else{
	$name=$_GET['matchname'];
}
$sql	=	"SELECT ID,Match_Date,Match_Time,Match_Master,Match_Guest,Match_RGG,Match_DxDpl,Match_DxXpl, Match_DxGG,Match_Ho,Match_Ao,Match_ShowType,Match_DsDpl,Match_DsSpl FROM lq_match WHERE Match_Type=3 AND Match_CoverDate>'".$et_time_now."' AND Match_Date='".date("m-d",$et_time)."' and match_name='".$name."' order by Match_CoverDate,iPage,iSn,Match_ID,match_name,Match_Master";
$query	=	$mysqli->query($sql);
$row	=	$query->fetch_array();

header("Content-type: text/vnd.wap.wml");
echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.3//EN" "http://www.wapforum.org/DTD/wml13.dtd">
<wml><head>
<meta http-equiv="Cache-Control" content="max-age=0" />
</head>
	<card title="篮球单节">
		<p>
			<?=$name?>
			<br/>
			<br/>
<?php
if(!$row){
?>
			暂无赛事
			<br/>
<?php
}else{
	do{
		$row['Match_Guest']		=	str_replace("&","&amp;",$row['Match_Guest']);
		$row['Match_Master']	=	str_replace("&","&amp;",$row['Match_Master']);
?>
			<?=$row['Match_Date'].' '.$row['Match_Time']?><br/>
			<?php
			if($row["Match_Ho"]<>"" && $row["Match_Ho"]<>0){
				echo $row['Match_Master'];
				if($row['Match_ShowType'] == 'H') echo '('.$row['Match_RGG'].')'; //主让
				echo '<a href="lqdj_bet.php?matchname='.urlencode($name).'&amp;matchid='.$row['ID'].'&amp;type=Match_Ho" title="'.double_format($row["Match_Ho"]).'">'.double_format($row["Match_Ho"]).'</a><br/>';
				echo $row['Match_Guest'];
				if($row['Match_ShowType'] == 'C') echo '('.$row['Match_RGG'].')'; //客让
				echo '<a href="lqdj_bet.php?matchname='.urlencode($name).'&amp;matchid='.$row['ID'].'&amp;type=Match_Ao" title="'.double_format($row["Match_Ao"]).'">'.double_format($row["Match_Ao"]).'</a><br/>';
			}else{
			?>
			<?=$row['Match_Master']?><br/>
			<?=$row['Match_Guest']?><br/>
			<?php
			}
			if($row["Match_DxDpl"]<>"" && $row["Match_DxDpl"]<>0){
			?>
			大(<?=$row["Match_DxGG"]?>) <a href="lqdj_bet.php?matchname=<?=urlencode($name)?>&amp;matchid=<?=$row['ID']?>&amp;type=Match_DxDpl" title="<?=double_format($row["Match_DxDpl"])?>"><?=double_format($row["Match_DxDpl"])?></a><br/>
			小(<?=$row["Match_DxGG"]?>) <a href="lqdj_bet.php?matchname=<?=urlencode($name)?>&amp;matchid=<?=$row['ID']?>&amp;type=Match_DxXpl" title="<?=double_format($row["Match_DxXpl"])?>"><?=double_format($row["Match_DxXpl"])?></a><br/>
			<?php
			}if($row["Match_DsDpl"]<>"" && $row["Match_DsDpl"]<>0){
			?>
			单 <a href="lqdj_bet.php?matchname=<?=urlencode($name)?>&amp;matchid=<?=$row['ID']?>&amp;type=Match_DsDpl" title="<?=double_format($row["Match_DsDpl"])?>"><?=double_format($row["Match_DsDpl"])?></a><br/>
			双 <a href="lqdj_bet.php?matchname=<?=urlencode($name)?>&amp;matchid=<?=$row['ID']?>&amp;type=Match_DsSpl" title="<?=double_format($row["Match_DsSpl"])?>"><?=double_format($row["Match_DsSpl"])?></a><br/>
			<?php
			}
			?>
			<br/>
<?php
	}while($row	=	$query->fetch_array());
}
?>
			<a href="bet_lqdj.php?matchname=<?=urlencode($name)?>" title="刷新">刷新</a> <a href="lqdj.php" title="返回">返回</a><br/>
			<a href="../main.php" title="返回菜单">返回菜单</a>
		</p>
	</card>
</wml>