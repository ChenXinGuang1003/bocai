<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");

include_once($C_Patch."/app/member/include/config.inc.php");

include_once($C_Patch."/app/member/common/function.php");

include_once("../class/admin.php");

include_once("../common/login_check.php"); 
check_quanxian("手工录入体育比分");
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>重新结算</TITLE>
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
<script type="text/javascript" charset="utf-8" src="../js/jquery-1.7.2.min.js" ></script>
<script type="text/javascript">
function check(){
    if(confirm('确定重新结算')){
	    $("#js").css({display:"none"});
		$("#login").css({display:""});
	    return true;
	}else{
	    return false;
	}
}
</script>
</HEAD>
<?php


$array	=	$_POST["mid"];
$mid	=	"";
for($i=0; $i<count($array); $i++){
	$mid.= $array[$i].",";
}
$mid	=	rtrim($mid,",");

if($_GET["action"]=="re"){
	include_once("bet.php");
	$mid	=	$_GET['mid'];
	//单式重新结算开始
    if(count($_GET['bid'])>0){
		foreach($_GET['bid'] as $i=>$bid){
			bet::qx_bet($bid,$_GET['status'][$i]);
			$sql = "select order_num from k_bet where id='$bid'";
			$query	=	$mysqli->query($sql);
			$rows	 =	$query->fetch_array();
			$order_num=$rows["order_num"];
			admin::insert_log($_SESSION["login_name"],get_ip(),$bj_time_now,"重新结算了单号为[".$order_num."]的注单",session_id(),"",$bj_time_now);
		}
	}
	//串关重新结算开始
	if(count($_GET['bid_cg'])>0){
		foreach ($_GET['bid_cg'] as $i=>$bid){
			bet::qx_cgbet($bid);
			$sql = "select order_num from k_bet where id='$bid'";
			$query	=	$mysqli->query($sql);
			$rows	 =	$query->fetch_array();
			$order_num=$rows["order_num"];
			admin::insert_log($_SESSION["login_name"],get_ip(),$bj_time_now,"重新结算了单号为[".$order_num."]的串关注单",session_id(),"",$bj_time_now);
		}
	}
	//赛事重新结算设置
	$table	=	$_GET['type'] ? $_GET['type'] : 'bet_match';
	$set	=	$table=="bet_match" ? ',match_sbjs=0' : '';
	$sql	=	"update $table set match_js=0$set where match_id in($mid)";
	$mysqli->query($sql);
	
	if($_GET["bid"] && $_GET["bid_cg"])
	{
		$ds_str	=	implode(',',$_GET["bid"]);
		$cg_str	=	implode(',',$_GET["bid_cg"]);

		admin::insert_log($_SESSION["login_name"],get_ip(),$bj_time_now,"手工重新结算,单式[".$ds_str."],串关[".$cg_str."]",session_id(),"",$bj_time_now);
	}

	$php	=	$_GET['php'] ? $_GET['php'] : 'zqbf';
	message('本次重新结算结算完成',"$php.php");
} 
	  
$sql		=	"select k_bet.*,user_list.user_name from k_bet left join user_list on k_bet.user_id=user_list.user_id where k_bet.lose_ok=1 and k_bet.status not in(0,6,7) and match_id in($mid) order by  k_bet.id desc"; //单式
$result		=	$mysqli->query($sql);

$sql		=	"select k_bet_cg.*,user_list.user_name,k_bet_cg_group.win,k_bet_cg_group.www from k_bet_cg left join user_list on k_bet_cg.user_id=user_list.user_id left join k_bet_cg_group on k_bet_cg_group.id=k_bet_cg.gid where match_id in($mid) and k_bet_cg.status not in(0) order by k_bet_cg.id desc";
$result_cg	=	$mysqli->query($sql); //串关 
?>
<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" vlink="#0000FF" alink="#0000FF">
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap background="../images/06.gif">&nbsp; 注单管理：重新结算 </td>
  </tr>
</table>
<form action="re_jiesuan.php" method="GET" name="form1" onSubmit="return check();">
<input type="hidden" name="action" id="action" value="re" />
<input name="type" type="hidden" id="type" value="<?=$_GET['type']?>" />
<input name="php" type="hidden" id="php" value="<?=$_GET['php']?>" />
<input type="hidden" name="mid" id="mid" value="<?=$mid?>" />
  <table border="0" cellspacing="1" cellpadding="0"  bgcolor="006255" width="900" height="41">
    <tr class="m_title_ft">
        <td width="150" height="24"><strong>联赛名</strong></td>
        <td width="160"><strong>编号/主客队</strong></td>
        <td width="282"><strong>投注详细信息</strong></td>
        <td width="50"><strong>下注</strong></td>
        <td width="50"><strong>结果</strong></td>
		<td width="50"><strong>反水</strong></td>
        <td width="250"><strong>投注/开赛时间</strong></td>
        <td width="100"><strong>投注账号</strong></td>
    </tr>
<?php
$ds_php	=	'sgjsds.php';
$cg_php	=	'cg_list.php';
while($rows = $result->fetch_array()){
	  $bet_money	+=	$rows["bet_money"];
	  $win			+=	$rows["win"];
?>     <tr class="m_cen" align="center" onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#ffffff'">
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
              <td><?=$rows["ball_sort"]?> - 单式
                <input name="bid[]" type="hidden" id="bid[]" value="<?=$rows["id"]?>">
                <input name="status[]" type="hidden" id="status[]" value="<?=$rows["status"]?>">
                <br/>
			  <font style="color:#FF0033">
			  <?=str_replace("-","<br/>",$rows["bet_info"])?>
			  </font>
			<? if($rows["status"]!=3){?>[<?=$rows["MB_Inball"]?>:<?=$rows["TG_Inball"]?>]<? }?></td>
              <td><?=$rows["bet_money"]?></td>
	          <td><?=$rows["win"]?></td>
			  <td><?=$rows["fs"]?></td>
      <td>北京:<?=substr($rows["bet_time"],5)?><br/>美东:<?=substr($rows["bet_time_et"],5)?><br/>开赛<?=substr($rows["match_endtime"],5)?></td>
              <td><a href="orderlist.php?username=<?=$rows["user_name"]?>" target="_blank"><?=$rows["user_name"]?></a><br /><span style="color:#999999"><?=$rows["www"]?></span></td>
        </tr>
     <tr>
       <td height="35" colspan="8" align="left" valign="middle" bgcolor="#FFFFFF"><img src="http://<?=$pic_url?>/<?=substr($rows["order_num"],0,8)?>/<?=$rows["order_num"]?>.jpg" /></td>
     </tr>
      	<?
      } 
      ?>
<?php
while($rows = $result_cg->fetch_array()){
	  $bet_money	+=	$rows["bet_money"];
	  //$win			+=	$rows["win"];
      	?>     <tr class="m_cen" align="center" onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#ffffff'">
	          <td  align="center" ><a href="<?=$cg_php?>?gid=<?=$rows["gid"]?>" target="_blank"><?=$rows["gid"]?></a>
			   <br/>
		      <?=$rows["match_name"]?> </td>
              <td>
<?php
if(strpos($rows["master_guest"],'VS.')) echo str_replace("VS.","<br/>",$rows["master_guest"]);
else  echo str_replace("VS","<br/>",$rows["master_guest"]);
?></td>
              <td><?=$rows["ball_sort"]?> - 串关<input name="bid_cg[]" type="hidden" id="bid_cg[]" value="<?=$rows["id"]?>">
              <br/>
			  <font style="color:#FF0033">
			  <?=str_replace("-","<br/>",$rows["bet_info"])?>
			  </font>
			<? if($rows["status"]!=3){?>[<?=$rows["MB_Inball"]?>:<?=$rows["TG_Inball"]?>]<? }?></td>
              <td><?=$rows["bet_money"]?></td>
	          <td>--</td>
			  <td>--</td>
      <td>北京:<?=substr($rows["bet_time"],5)?><br/>美东:<?=substr($rows["bet_time_et"],5)?><br/>开赛<?=substr($rows["match_endtime"],5)?></td>
             <td><a href="orderlist.php?username=<?=$rows["user_name"]?>" target="_blank"><?=$rows["user_name"]?></a><br /><span style="color:#999999"><?=$rows["www"]?></span></td>
        </tr>
<?php
} 
?>
     <tr class="m_cen" align="center" onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#ffffff'">
	          <td colspan="2"  align="right" >*串关反水和结果,要全部结算完才有</td>
			  <td colspan="1"  align="right" >结果统计:</td>
              <td><font color="#FF0000"><?=$all_bet_money?></font></td>
	          <td colspan="2"><font color="#FF0000"><?=$all_win?></font></td>
              <td colspan="2">结果包含反水</td>
    </tr>
     <tr><td colspan="7" align="center"><div id="js"><input name="re" type="submit" id="re" value="重新结算"/>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <input type="button" onClick="javascript:location.href='<?=$_SERVER['HTTP_REFERER']?>';"  value="返回"/></div>
	   <div id="login" style="color:#FFFFFF; display:none;"><strong>系统重新结算中，请等待...</strong></div></td></tr>
  </table>
</form>
</body>
</html>