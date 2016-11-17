<?php
error_reporting(1);
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

//echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/utils/convert_name.php");
include_once($C_Patch."/app/member/class/sys_config.php");

include_once("../class/admin.php");
include_once("../common/login_check.php");
include_once($C_Patch."/app/member/class/user.php");
check_quanxian("手工结算注单");
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>设置注单为无效</TITLE>
<script language="javascript">
function refash()
{
var win = top.window;
 try{// 刷新.
  	if(win.opener)  win.opener.location.reload();
 }catch(ex){
  // 防止opener被关闭时代码异常。
 }
  window.close();
}
</script>
<style type="text/css">
<STYLE>
BODY {
SCROLLBAR-FACE-COLOR: rgb(255,204,0);
 SCROLLBAR-3DLIGHT-COLOR: rgb(255,207,116);
 SCROLLBAR-DARKSHADOW-COLOR: rgb(255,227,163);
 SCROLLBAR-BASE-COLOR: rgb(255,217,93)
}
.STYLE1 {font-size: 10px}
.STYLE2 {font-size: 12px}
body {	margin: 0px;}
td{font:13px/120% "宋体";padding:3px;}
a{color:#FFA93E;}
.t-tilte td{font-weight:800;}
</STYLE>
</HEAD>
<?php

if($_GET["action"]=="save"){
	$bid		=	intval($_GET["bid"]);
	$uid		=	intval($_GET["uid"]);
	$order_num		=	$_GET["order_num"];
	$why		=	trim($_POST["sys_about"]);
	$num		=	0;
	if($_POST["back_bet_money"]=="1"){

		$sql_m = "select user_list.money from k_bet left join user_list on k_bet.user_id=user_list.user_id where k_bet.id=".$bid." and k_bet.status=0 limit 0,1";
		$query	=	$mysqli->query($sql_m);
		if(!$query)
		{
			message('操作失败',$_SERVER['HTTP_REFERER']);
		}
		$rows	 =	$query->fetch_array();
        $assets = $rows["money"];

		$num	=	2;
    	$sql	=	"update user_list,k_bet set user_list.money=user_list.money+k_bet.bet_money,k_bet.win=k_bet.bet_money,k_bet.status=3,k_bet.sys_about='".($why ? $why : '手工无效')."',k_bet.update_time=now() where k_bet.status=0 and user_list.user_id=k_bet.user_id and k_bet.id=$bid";

		
	}else{
		$num	=	1;
		$sql	=	"update k_bet set status=3,sys_about='$why',update_time=now() where `status`=0 and k_bet.id=$bid";
	}

	$mysqli->query($sql);
	$q1	=	$mysqli->affected_rows;
	if($q1 > 0){
		if($num==2)
		{
			admin::insert_log($_SESSION["login_name"],get_ip(),$bj_time_now,"设置了注单ID为[".$bid."]单号为[".$order_num."]的注单无效,并退还本金",session_id(),"",$bj_time_now);

			$sql = "select k_bet.order_num,k_bet.win,k_bet.fs,user_list.money,user_list.user_id from k_bet left join user_list on k_bet.user_id=user_list.user_id where k_bet.id=".$bid." and k_bet.status!=0 limit 0,1";
			$query	=	$mysqli->query($sql);
			if(!$query)
			{
				message('操作失败',$_SERVER['HTTP_REFERER']);
			}
			$rows	 =	$query->fetch_array();
			$win = round($rows["win"],2);
            $order_num = $rows["order_num"];
            $user_id = $rows["user_id"];
            $balance = $rows["money"];


            $sql = "select balance from money_log where user_id='".$user_id."' order by id desc limit 0,1";
			$query	=	$mysqli->query($sql);
			$rows	 =	$query->fetch_array();
            $balance_2 = $rows["balance"];
			$allmoney=round($assets + $win,2);

			if (floatval($assets) != floatval($balance_2) || floatval($allmoney) != floatval($balance))
			{
				$sql = "update user_list set online=0,Oid='',status='异常',remark='体育(".$order_num.")手工设置注单无效后资金异常' where user_id='".$user_id."'";
				$mysqli->query($sql);
			}
			$sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('".$user_id."','".$order_num."','体育单式',now(),'手工设置注单无效-退还本金','".$win."','".$assets."','".$balance."');";
	
			$mysqli->query($sql);
		
		}else{
		admin::insert_log($_SESSION["login_name"],get_ip(),$bj_time_now,"设置了注单ID为[".$bid."]单号为[".$order_num."]的注单无效,并没收本金",session_id(),"",$bj_time_now);
		}

		user::msg_add($uid,"结算中心",$_POST["master_guest"]."_注单已取消",$_POST["master_guest"].'<br/>'.$_POST["order_num"].'<br/>'.$_POST["bet_info"].'<br/>'.$why);
		echo "<script>alert('操作成功');\r\n";
	if(@$_GET['new']) echo "refash();</script>";
	else echo "location.href='".$_SERVER['HTTP_REFERER']."';</script>";
	}
	
	

message('操作失败',$_SERVER['HTTP_REFERER']);

}
?>
<body>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap background="../images/06.gif"><font >&nbsp;<span class="STYLE2">注单管理：该注单设为无效（所有时间以美国东部标准为准）</span></font></td>
  </tr>
  <tr>
    <td height="24" align="center" nowrap bgcolor="#FFFFFF"></td>
  </tr>
</table>
<br>
<?php
$sql	=	"select bet_time_et,match_name,master_guest,bet_info,bet_point,bet_money,bet_win,match_id,ball_sort,bet_time,id,user_id from k_bet where id=".intval($_GET["bid"])." limit 1";
$query	=	$mysqli->query($sql);
$rows	=	$query->fetch_array();
?>
<form action="<?=$_SERVER['PHP_SELF']?>?action=save&bid=<?=$rows["id"]?>&uid=<?=$rows["user_id"]?>&new=<?=$_GET['new']?>&order_num=<?=$_GET['order_num']?>" method="post" enctype="multipart/form-data" name="form1">
<table width="90%" align="center" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;">
  <tr>
    <td bgcolor="#F0FFFF">联赛名称</td>
    <td><?=$rows["match_name"]?></td>
  </tr>
  <tr>
    <td width="172" bgcolor="#F0FFFF">主客队</td>
    <td width="473"><?=$rows["master_guest"]?></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">投注详细信息</td>
    <td><?=$rows["bet_info"]?></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">盘口赔率</td>
    <td><?=$rows["bet_point"]?></td>
  </tr>
    <tr>
    <td bgcolor="#F0FFFF">投注金额</td>
    <td><?=$rows["bet_money"]?></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">最高可赢</td>
    <td><?=$rows["bet_win"]?></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">联赛编号</td>
    <td><?=$rows["match_id"]?></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">联赛类别</td>
    <td><?=$rows["ball_sort"]?></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">下注时间(北京)<br>下注时间(美东) </td>
    <td><?=$rows["bet_time"]?><br><?=$rows["bet_time_et"]?></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">退还投注金额</td>
    <td><select name="back_bet_money">
    <option value="1">退还投注金额</option>
      <option value="0">不退还投注金额</option>
    </select></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">无效原因</td>
    <td><label><input name="bet_info" type="hidden" value="<?=$rows["bet_info"]?>">
	<input name="master_guest" type="hidden" value="<?=$rows["master_guest"]?>">
      <textarea name="sys_about" id="textarea" cols="45" rows="5"></textarea>
    </label></td>
  </tr>
    <tr>
    <td bgcolor="#F0FFFF">操作</td>
    <td><input type="submit" value="提交"/></td>
  </tr>
</table>
</form>
</body>
</html>