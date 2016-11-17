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
$sql	=	"SELECT ID,Match_Date,Match_Time,Match_Master,Match_Guest,Match_Name,Match_IsLose,Match_Bmdy,Match_BHo,Match_Bdpl,Match_Bgdy, Match_BAo,Match_Bxpl,Match_Bhdy,Match_BRpk,Match_Hr_ShowType,Match_Bdxpk FROM bet_match WHERE Match_Type=1 and match_date='".date("m-d",$et_time)."' AND Match_CoverDate>'".$et_time_now."' and (Match_BHo+Match_BAo<>0 or Match_Bdpl+Match_Bxpl<>0) and Match_IsShowb=1 and match_name='".$name."' order by Match_CoverDate,iPage,match_name,Match_Master,Match_ID,iSn";

$query	=	$mysqli->query($sql);
$row	=	$query->fetch_array();

header("Content-type: text/vnd.wap.wml");
echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.3//EN" "http://www.wapforum.org/DTD/wml13.dtd">
<wml><head>
<meta http-equiv="Cache-Control" content="max-age=0" />
</head>
	<card title="足球上半场">
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
			if($row["Match_BHo"]<>"" && $row["Match_BHo"]<>0){
				echo $row['Match_Master'].'-[上半]';
				if($row['Match_Hr_ShowType'] == 'H') echo '('.$row['Match_BRpk'].')'; //主让
				echo ' <a href="zqsbc_bet.php?matchname='.urlencode($name).'&amp;matchid='.$row['ID'].'&amp;type=Match_BHo" title="'.double_format($row["Match_BHo"]).'">'.double_format($row["Match_BHo"]).'</a><br/>';
				echo $row['Match_Guest'].'-[上半]';
				if($row['Match_Hr_ShowType'] == 'C') echo '('.$row['Match_BRpk'].')'; //客让
				echo ' <a href="zqsbc_bet.php?matchname='.urlencode($name).'&amp;matchid='.$row['ID'].'&amp;type=Match_BAo" title="'.double_format($row["Match_BAo"]).'">'.double_format($row["Match_BAo"]).'</a><br/>';
			}else{
			?>
			<?=$row['Match_Master'].'-[上半]'?><br/>
			<?=$row['Match_Guest'].'-[上半]'?><br/>
			<?php
			}
			if($row["Match_Bdpl"]<>"" && $row["Match_Bdpl"]<>0){
			?>
			大(<?=$row["Match_Bdxpk"]?>) <a href="zqsbc_bet.php?matchname=<?=urlencode($name)?>&amp;matchid=<?=$row['ID']?>&amp;type=Match_Bdpl" title="<?=double_format($row["Match_Bdpl"])?>"><?=double_format($row["Match_Bdpl"])?></a><br/>
			小(<?=$row["Match_Bdxpk"]?>) <a href="zqsbc_bet.php?matchname=<?=urlencode($name)?>&amp;matchid=<?=$row['ID']?>&amp;type=Match_Bxpl" title="<?=double_format($row["Match_Bxpl"])?>"><?=double_format($row["Match_Bxpl"])?></a><br/>
			<?php
			}
			if($row["Match_Bmdy"]<>"" && $row["Match_Bmdy"]<>0){
			?>
			主胜 <a href="zqsbc_bet.php?matchname=<?=urlencode($name)?>&amp;matchid=<?=$row['ID']?>&amp;type=Match_Bmdy" title="<?=double_format($row["Match_Bmdy"])?>"><?=double_format($row["Match_Bmdy"])?></a><br/>
			<?php
			}
			if($row["Match_Bgdy"]<>"" && $row["Match_Bgdy"]<>0){
			?>
			客胜 <a href="zqsbc_bet.php?matchname=<?=urlencode($name)?>&amp;matchid=<?=$row['ID']?>&amp;type=Match_Bgdy" title="<?=double_format($row["Match_Bgdy"])?>"><?=double_format($row["Match_Bgdy"])?></a><br/>
			<?php
			}
			if($row["Match_Bhdy"]<>"" && $row["Match_Bhdy"]<>0){
			?>
			和局 <a href="zqsbc_bet.php?matchname=<?=urlencode($name)?>&amp;matchid=<?=$row['ID']?>&amp;type=Match_Bhdy" title="<?=double_format($row["Match_Bhdy"])?>"><?=double_format($row["Match_Bhdy"])?></a><br/>
			<?php
			}
			?>
			<br/>
<?php
	}while($row	= $query->fetch_array());
}
?>
			<a href="bet_zqsbc.php?matchname=<?=urlencode($name)?>" title="刷新">刷新</a> <a href="zqsbc.php" title="返回">返回</a><br/>
			<a href="../main.php" title="返回菜单">返回菜单</a>
		</p>
	</card>
</wml>