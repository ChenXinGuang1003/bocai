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

check_quanxian("手工结算注单");
include_once("get_point.php");

$array	=	$_POST["mid"];
$mid	=	"";
for($i=0; $i<count($array); $i++){
	$mid	.=	$array[$i].",";
}
$mid	=	rtrim($mid,",");

$sql	=	"select k_bet.*,user_list.user_name from k_bet left join user_list on k_bet.user_id=user_list.user_id where k_bet.lose_ok=1 and k_bet.status=0 and k_bet.match_id in($mid) order by k_bet.id desc ";
$result	=	$mysqli->query($sql); //单式

$sql	=	"select k_bet_cg.*,user_list.user_name from k_bet_cg left join user_list on k_bet_cg.user_id=user_list.user_id where k_bet_cg.status=0 and match_id in($mid) order by k_bet_cg.id desc";

$result_cg	=	$mysqli->query($sql); //串关

//赛事比分
$sql	=	"select Match_ID,MB_Inball_HR,TG_Inball_HR from bet_match where Match_ID in($mid)";
$re		=	$mysqli->query($sql);
$m		=	array();
while($rows = $re->fetch_array()){
	$m[$rows["Match_ID"]]["MB_Inball_HR"] = $rows["MB_Inball_HR"];
	$m[$rows["Match_ID"]]["TG_Inball_HR"] = $rows["TG_Inball_HR"];
}
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>设置注单无效</TITLE>
<link rel="stylesheet" href="../images/control_main.css" type="text/css">
<style type="text/css">
<!--
body {
	FONT-SIZE: 12px;
	margin-left: 4px;
	margin-top: 0px;
	margin-right: 0px;
	PADDING-RIGHT: 0px; PADDING-LEFT: 0px; SCROLLBAR-FACE-COLOR: #59D6FF; PADDING-BOTTOM: 0px; SCROLLBAR-HIGHLIGHT-COLOR: #ffffff; SCROLLBAR-SHADOW-COLOR: #ffffff; SCROLLBAR-3DLIGHT-COLOR: #007BC6; SCROLLBAR-DARKSHADOW-COLOR: #007BC6; SCROLLBAR-ARROW-COLOR: #007BC6; PADDING-TOP: 0px; SCROLLBAR-TRACK-COLOR: #009ED2;
}
.STYLE3 {color: #FF0000; font-weight: bold; }
-->
</style>
<script type="text/javascript" charset="utf-8" src="/js/jquery.js" ></script>
<script language="javascript">
function go(value){
	location.href=value;
}

function check(){
    if(confirm('确定结算')){
	    $("#js").css({display:"none"});
		$("#login").css({display:""});
	    return true;
	}else{
	    return false;
	}
}
</script>
</HEAD>
<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" vlink="#0000FF" alink="#0000FF">
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap background="../images/06.gif">&nbsp; 注单管理：批量结算 </td>
  </tr>
</table>
<form action="ft_auto.php?type=<?=$_GET['type']?>&php=<?=$_GET['php']?>" method="post" name="form1" onSubmit="return check();">
<input type="hidden" name="match_id" id="match_id" value="<?=$mid?>" />
  <table   border="0" cellspacing="1" cellpadding="0"  bgcolor="006255" width="900" height="41">
    <tr class="m_title_ft">
        <td width="150" height="24"><strong>联赛名</strong></td>
        <td width="160"><strong>编号/主客队</strong></td>
        <td width="282"><strong>投注详细信息</strong></td>
        <td width="50"><strong>下注</strong></td>
        <td width="50"><strong>结果</strong></td>
		<td width="50"><strong>反水</strong></td>
        <td width="100"><strong>投注/开赛时间</strong></td>
        <td width="100"><strong>投注账号</strong></td>
    </tr>
<?php
	  $ds_php	=	'sgjsds.php';
	  $cg_php	=	'cg_list.php';
	  $save = "1";
      while ($rows = $result->fetch_array()) {
	 // $bet_money+=$rows["bet_money"];
	 // $win+=$rows["win"];
	 	$MB_Inball = $TG_Inball = $MB_Inball_HR = $TG_Inball_HR = "";
		$arr_sb	= array("match_bmdy","match_bgdy","match_bhdy","match_bho","match_bao","match_bdpl","match_bxpl");
	 	if(in_array($rows["point_column"],$arr_sb) || strpos($rows["point_column"],"match_hr_bd")){
			$MB_Inball_HR = $rows["MB_Inball"];
			$TG_Inball_HR = $rows["TG_Inball"];
		}else{
			$MB_Inball    = $rows["MB_Inball"];
			$TG_Inball    = $rows["TG_Inball"];
			$MB_Inball_HR = $m[$rows["match_id"]]["MB_Inball_HR"];
			$TG_Inball_HR = $m[$rows["match_id"]]["TG_Inball_HR"];
		}
		$color = "";
	 	if($rows["MB_Inball"]=="" || $rows["TG_Inball"]==""){ //有一场未结算
	 		$color = "style=\"color:#FF0000;\"";
	 		$save = "0";
	 	}
      	?>     <tr class="m_cen" <?=$color?> align="center" onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#ffffff'">
	          <td  align="center" ><a href="<?=$ds_php?>?tf_id=<?=$rows["order_num"]?>" target="_blank"><?=$rows["order_num"]?> 
	          </a>
			    <br/>
			    <a href="<?=$ds_php?>?match_id=<?=$rows["match_id"]?>" target="_blank"><?=$rows["match_id"]?> </a>
			    <br/>
		      <?=$rows["match_name"]?> </td>
              <td> 
<?php
if(strpos($rows["master_guest"],'VS.')) echo str_replace("VS.","<br/>",$rows["master_guest"]);
else  echo str_replace("VS","<br/>",$rows["master_guest"]);
?></td>
              <td><?=$rows["ball_sort"]?> - 单式<br/>
			  <font style="color:#FF0033">
			  <?=str_replace("-","<br/>",$rows["bet_info"])?>
			  </font>
			<!--[<?=$rows["MB_Inball"]?>:<?=$rows["TG_Inball"]?>]-->			</td>
              <td><?=$rows["bet_money"]?></td>
	          <td> 	
              <? 
			  $all_bet_money+=$rows["bet_money"];
			  $column=$rows["point_column"];		 
		       echo $rows["bet_money"];
			  $all_win+=$rows["bet_money"];
			  ?>
              <input type="hidden" name="bid[]" value="<?=$rows["id"]?>"/>
              <input type="hidden" name="uid[]" value="<?=$rows["user_id"]?>"/>
              <input type="hidden" name="win[]" value="<?=$win?>" />
              <input type="hidden" name="status[]" value="3" /> 
              <input type="hidden" name="mb_inball[]" value="-1" /> 
              <input type="hidden" name="tg_inball[]" value="-1" />      </td>
			  <td>0</td>
      <td><?=substr($rows["bet_time"],5)?><br/><?=substr($rows["match_endtime"],5)?></td>
              <td><a href="orderlist.php?username=<?=$rows["user_name"]?>" target="_blank"><?=$rows["user_name"]?></a><br /><span style="color:#999999"><?=$rows["www"]?></span></td>
        </tr>
     <tr>
       <td height="35" colspan="8" align="left" valign="middle" bgcolor="#FFFFFF"><img src="http://<?=$pic_url?>/<?=substr($rows["order_num"],0,8)?>/<?=$rows["order_num"]?>.jpg" /></td>
     </tr>
      	<?
      } 
      ?>
	  <?php
      while ($rows=$result_cg->fetch_array()) {
	 // $bet_money+=$rows["bet_money"];
	 // $win+=$rows["win"];
	 	$MB_Inball = $TG_Inball = $MB_Inball_HR = $TG_Inball_HR = "";
		if(strpos($rows["ball_sort"],"上半场") || strpos($rows["bet_info"],"上半场")){
			$MB_Inball_HR = $rows["MB_Inball"];
			$TG_Inball_HR = $rows["TG_Inball"];
		}else{
			$MB_Inball    = $rows["MB_Inball"];
			$TG_Inball    = $rows["TG_Inball"];
			$MB_Inball_HR = $m[$rows["match_id"]]["MB_Inball_HR"];
			$TG_Inball_HR = $m[$rows["match_id"]]["TG_Inball_HR"];
		}
		
		$color = "";
	 	if($rows["MB_Inball"]=="" || $rows["TG_Inball"]==""){ //有一场未结算
	 		$color = "style=\"color:#FF0000;\"";
	 		$save = "0";
	 	}
      	?>     <tr class="m_cen" <?=$color?> align="center" onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#ffffff'">
	          <td  align="center" ><a href="<?=$cg_php?>?gid=<?=$rows["gid"]?>" target="_blank"><?=$rows["gid"]?></a>
			   <br/>
		      <?=$rows["match_name"]?> </td>
              <td> 
<?php
if(strpos($rows["master_guest"],'VS.')) echo str_replace("VS.","<br/>",$rows["master_guest"]);
else  echo str_replace("VS","<br/>",$rows["master_guest"]);
?></td>
              <td><?=$rows["ball_sort"]?> - 串关<br/>
			  <font style="color:#FF0033">
			  <?=str_replace("-","<br/>",$rows["bet_info"])?>
			  </font>
			<!--[<?=$rows["MB_Inball"]?>:<?=$rows["TG_Inball"]?>]--> </td>
              <td><?=$rows["bet_money"]?></td>
	          <td> 	
              <? 
			  $all_bet_money+=$rows["bet_money"];
			  $column=$rows["point_column"];		 
			   echo 0;
			  //$all_win+=0;
			  ?>
			  <td>0</td>
              <input type="hidden" name="bid_cg[]" value="<?=$rows["id"]?>"/>
              <input type="hidden" name="win_cg[]" value="<?=$win?>" />
              <input type="hidden" name="status_cg[]" value="3" /> 
              <input type="hidden" name="mb_inball_cg[]" value="-1" /> 
              <input type="hidden" name="tg_inball_cg[]" value="-1" />      </td>
      <td><?=substr($rows["bet_time"],5)?><br/><?=substr($rows["match_endtime"],5)?></td>
              <td><a href="orderlist.php?username=<?=$rows["user_name"]?>" target="_blank"><?=$rows["user_name"]?></a></td>
        </tr>
        	
      	<?
      } 
      ?>
     <tr class="m_cen" align="center" onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#ffffff'">
	          <td colspan="2"  align="right" >*串关反水和结果,要全部结算完才有</td>
			  <td colspan="1"  align="right" >结果统计:</td>
              <td><font color="#FF0000"><?=$all_bet_money?></font></td>
	          <td colspan="2"><font color="#FF0000"><?=$all_win?></font></td>
              <td colspan="2">结果包含反水</td>
    </tr>
     <tr><td height="28" colspan="8" align="center" valign="middle"><div id="js"><input type="submit" value="确定"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <input type="button" onClick="javascript:history.go(-1)"  value="返回"/>
       <input name="hf_save" type="hidden" id="hf_save" value="<?=$save?>"></div>
       <div id="login" style="color:#FFFFFF; display:none;"><strong>系统结算中，请等待...</strong></div></td></tr>
  </table>
<p>&nbsp;</p>
</form>
</body>
</html>