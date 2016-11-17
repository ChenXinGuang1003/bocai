<?php
session_start();
header("Expires: Mon, 26 Jul 1970 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");          
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header('Content-type: text/json; charset=utf-8');
include_once "../include/com_chk.php";
include_once("../common/function.php");
include_once("../class/volleyball_match.php");
//这里要进行时间判断
sessionBet($uid);
if($uid=='')
{
	echo "<script>alert('您未登录,请先登录!')</script>";
	session_destroy();
	echo "<script>location.href='/app/member/logout.php';</script>";
	exit;
}
 
$rows=bet_match::getmatch_info(intval($_POST["match_id"]),$_POST["point_column"]);

$touzhuxiang	=	$_POST["touzhuxiang"];
$temp_array		=	explode("-",$touzhuxiang);
if($temp_array[0]=="让分"){
	$touzhuxiang = preg_replace("/[0-9\.\/]{1,}-/i",$rows["match_rgg"]."-",$touzhuxiang);
}
if($temp_array[0]=="大小"){
	$touzhuxiang = preg_replace("/[0-9.]{1,}/i",$rows["match_dxgg"],$touzhuxiang);
}
?>
<div class="match_msg"> 
<input type="hidden" name="ball_sort[]" value="<?=$_POST["ball_sort"]?>" />
<input type="hidden" name="point_column[]" value="<?=$_POST["point_column"]?>" />
<input type="hidden" name="match_id[]" value="<?=$_POST["match_id"]?>" />
<input type="hidden" name="match_name[]" value="<?=$rows["match_name"]?>"  />
<input type="hidden" name="match_showtype[]" value="<?=$rows["match_showtype"]?>"  />
<input type="hidden" name="match_rgg[]" value="<?=$rows["match_rgg"]?>"  />
<input type="hidden" name="match_dxgg[]" value="<?=$rows["match_dxgg"]?>"  />
<input type="hidden" name="match_nowscore[]" value="<?=$rows["Match_NowScore"]?>"  />
<input type="hidden" name="match_type[]" value="<?=$rows["match_type"]?>"  />
<input type="hidden" name="touzhuxiang[]" value="<?=$temp_array[0]?>"  />
<input type="hidden" name="master_guest[]"  value="<?=$rows["match_master"]?>VS.<?=$rows["match_guest"]?>"/>
<input type="hidden" name="bet_info[]"  value="<?=$touzhuxiang?>@<?=$rows[$_POST["point_column"]]?>"/> 
<input type="hidden" name="bet_point[]" value="<?=double_format($rows[$_POST["point_column"]])?>" />
<input type="hidden" name="match_time[]"  value="<?=$rows["match_time"]?>"/>
<input type="hidden" name="ben_add[]"  value="<?=$_POST["ben_add"]?>"/>
<input type="hidden" name="match_endtime[]"  value="<?=$rows["Match_CoverDate"]?>"/>
<div class="match_sort"><?=$_POST["ball_sort"]?><div class="tiTimer" onClick="refresh_order();"><span id="ODtimer">10</span><input type="checkbox" id="checkOrder" name="checkOrder" onClick="onclickReloadTime()" <?=$_POST["checked"]?> value="10"></div></div>
<div class="match_name"><?=$rows["match_name"]?>&nbsp;<?=$rows["match_time"]?></div>
<div class="match_master"><?=$rows["match_master"]?><span class="match_vs"> VS. </span><span class="match_guest"><?=$rows["match_guest"]?></span></div>
<?php
if($temp_array[0]=="让分"){ //让分
?>
<div class="match_info">
	盘口：<?=$rows["match_showtype"]=="H" ? '主让' : '客让'?>(<?=$rows["match_rgg"]?>)
</div>    
<?php
}
?>
<div class="match_info">
	<span class="match_master1"><?=$_POST["xx"]?></span>&nbsp;@&nbsp;
	<span style="color:#D90000;"><?=double_format($rows[$_POST["point_column"]])?></span>&nbsp;&nbsp;&nbsp;&nbsp;<img src="/images/x.gif" alt="取消赛事" width="8" height="8" border="0" onclick="javascript:del_bet(this)" style="cursor:pointer;" />
	</div>
</div>
<?php
$sql_group	=	"SELECT sports_bet,sports_bet_reb,sports_lower_bet FROM user_group where group_id='".@$_SESSION["group_id"]."' limit 0,1";
	$query_group	=	$mysqli->query($sql_group);
	$group_db	=	$query_group->fetch_array();
?>
<script>
bet_file="volleyball_match";
$("#min_point_span").html('<?=$group_db['sports_lower_bet'] ? $group_db['sports_lower_bet'] : '0'?>');
$("#user_money").html('<?=$_SESSION["user_money"]?>');
waite();
</script>
<?
$mysqli->close();
?>