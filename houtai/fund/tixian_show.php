<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once("../common/login_check.php");
include_once("../class/admin.php");
include_once($C_Patch."/include/newpage.php");
include_once($C_Patch."/app/member/class/user.php");
include_once($C_Patch."/app/member/cache/hacker_list.php");

//echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

check_quanxian("财务审核");

?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>用户提现处理</TITLE>
<link href="../images/css1/css.css" rel="stylesheet" type="text/css">
<style type="text/css">
.STYLE1 {font-size: 10px}
.STYLE2 {font-size: 12px}
body {	margin: 0px;}
td{font:13px/120% "宋体";padding:3px;}
a{color:#FFA93E;}
.t-title{background:url(../images/06.gif);height:24px;}
.t-tilte td{font-weight:800;}
</STYLE>
<script language="JavaScript" src="/js/jquery-1.7.1.js"></script>
<script language="javascript">   
function chang(){
	var type	=	$("input[name='status']:checked").val();
	if(type == 1){
		$("#d_txt").html('请填写本次汇款的实际手续费');
		$("#d_text").html("<input name=\"sxf\" type=\"text\" value=\"0\" id=\"sxf\" size=\"20\" maxlength=\"20\">&nbsp;元&nbsp;&nbsp;&nbsp;&nbsp;理由：<input name=\"about\" id=\"about\" size=\"30\"  value=\"<?=$rows["about"]?>\">");
	}else if(type == 0){
		$("#d_txt").html('请填写未支付原因');
		$("#d_text").html("<textarea name=\"about\" id=\"about\" cols=\"45\" rows=\"5\"><?=$rows["about"]?></textarea>");
	}else{
		$("#d_txt").html('&nbsp;');
		$("#d_text").html('&nbsp;');
	}
}

function check(){
	var type	=	$("input[name='status']:checked").val();
	if(type == 1){
		if($("#sxf").val().length < 1){
			alert('请您填写本次汇款的实际手续费');
			$("#sxf").focus();
			return false;
		}else{
			var sxf = $("#sxf").val()*1;
			if(sxf<0){
				alert('请输入正确的手续费');
				$("#sxf").select();
				return false;
			}
		}
	}else{
		if($("#about").val().length < 4){
			alert('请填写未支付原因');
			$("#about").focus();
			return false;
		}
	}
	return true;
}
</script>
</HEAD>

<body>
<?php
if($_GET["action"]=="save"){
	$m_id	=	intval($_GET["m_id"]);
	$msg	=	'';
	$num	=	0;
	
	if($_POST["status"] == 1){
		$sxf	=	trim($_POST["sxf"]);
    	$sql	=	"update money set `status`='成功',about='".$_POST["about"]."',update_time=now(),sxf=$sxf where `status`='未结算' and id=$m_id";
		$msg	=	"审核了编号为".$m_id."的提款单,已支付";
		$num	=	1;
        $mysqli->query($sql);
        $q1			=	$mysqli->affected_rows;
        if($q1 != 1){
            message('操作失败');
            exit;
        }

	}elseif($_POST["status"]==0){
		if(strpos($_POST['order_num'],'代理额度')){ //代理申请额度失败，要把申请额度记录删除
			$sql	=	"update money set `status`=0,update_time=now(),about='".$_POST["about"]."' where `status`='未结算' and id=$m_id";
			$num	=	1;
		}else{ //会员正常取款失败，得还款到账户上
			$sql	=	"update money,user_list set money.status='失败',money.update_time=now(),money.about='".$_POST["about"]."',user_list.money=user_list.money-money.order_value,money.balance=user_list.money-money.order_value where user_list.user_id=money.user_id and money.status='未结算' and money.id=$m_id";
			$num	=	2;
			$msg	=	"审核了编号为".$m_id."的提款单,未支付,原因".$_POST["about"];
            $mysqli->query($sql);
            $q1			=	$mysqli->affected_rows;
            if($q1 != 2){
                message('更新金额失败，操作失败');
                exit;
            }
            $sql	=	"select money.*,user_list.money as u_balance from money,user_list where user_list.user_id=money.user_id and money.status='失败' and money.id=$m_id";
            $query	=	$mysqli->query($sql);
            $row    =	$query->fetch_array();
            $order = $row["order_num"];
            $pay_value = 0-$row["order_value"];
            $balance = $row["u_balance"];
            $assets = $balance - $pay_value;
            $pay_value_log = 0-$pay_value;
            $uid = $row["user_id"];

            $sql  =   "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$uid','$order','".$_POST["about"]."',now(),'用户提现失败','$pay_value_log','$assets',$balance);";
            $mysqli->query($sql);
            $q3		=	$mysqli->affected_rows;
            if($q3 != 1){
                $sql	=	"update money,user_list set money.status='未结算',money.update_time=now(),money.about='".""."',user_list.money=user_list.money+money.order_value,money.balance=user_list.money+money.order_value where user_list.user_id=money.user_id and money.status='失败' and money.id=$m_id";
                $mysqli->query($sql);
                message('插入金钱记录失败，操作失败');
                exit;
            }
            if($num==2 && $_POST["about"]!=""){
                user::msg_add($_POST['uid'],$web_site['web_name'],$_POST['title'],$_POST["about"]);
            }
		}
	}else{
		message('操作无效');
	}

    admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],$msg,session_id(),"",$bj_time_now);
    message('操作成功','tixian.php?status=未结算');
	
}
?>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap background="../images/06.gif"><font >&nbsp;账单详细查看</font></td>
  </tr>
  <tr>
    <td height="24" align="center" nowrap bgcolor="#FFFFFF">
<br>
<?
$sql	=	"select money.*,user_list.user_name,user_list.pay_name,user_list.remark from money left join user_list on money.user_id=user_list.user_id  where money.id=".intval($_GET["id"]);
$query	=	$mysqli->query($sql);
$rows	=	$query->fetch_array();
?>
<form action="<?=$_SERVER['PHP_SELF']?>?action=save&m_id=<?=$rows["id"]?>" method="post" name="form1" id="form1" onSubmit="return check();">
<table width="90%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" align="center">
  <tr>
    <td bgcolor="#F0FFFF">用户名</td>
    <td><a href="../hygl/user_show.php?id=<?=$rows['user_id']?>"><?=$rows["user_name"]?>
      <input name="uid" type="hidden" id="uid" value="<?=$rows['user_id']?>">
    </a></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">订单号</td>
    <td> 
      <?=$rows["order_num"]?>
      <input name="m_order" type="hidden" id="m_order" value="<?=$rows["order_num"]?>"></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">开户行</td>
    <td><?=$rows["pay_card"]?></td>
  </tr>
  <tr>
    <td width="172" bgcolor="#F0FFFF">卡号</td>
    <td width="473"><?=$rows["pay_num"]?></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">开户姓名</td>
    <td><?=$rows["pay_name"]?></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">开户地址</td>
    <td><?=$rows["pay_address"]?></td>
  </tr>
    <tr>
        <td bgcolor="#F0FFFF">备注</td>
        <td><?=$rows["remark"]?></td>
    </tr>
  <tr>
    <td bgcolor="#F0FFFF">取款前余额</td>
    <td><span style="color:#999999;"><?=$rows["assets"]?></span></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">金额</td>
    <td><?=abs($rows["order_value"])?>
      <input name="title" type="hidden" id="title" value="您于：<?=$rows["update_time"]?> 申请的提款：<?=abs($rows["order_value"])?> 失败了！"></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">取款后余额</td>
    <td><span style="color:#999999;"><?=$rows["balance"]?></span></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">申请时间</td>
    <td><?=$rows["update_time"]?></td>
  </tr>
 <? if($rows["status"]=='未结算'){ ?>
  <tr>
    <td bgcolor="#F0FFFF">操作</td>
    <td>
      <input name="status" type="radio" id="status" onClick="chang()" value="1" checked><span style="color:#009900">已支付</span>
	  &nbsp;
	  <input type="radio" name="status" id="radio" onClick="chang()" value="0"><span style="color:#FF0000">未支付</span></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF"><div id="d_txt">请填写本次汇款的实际手续费</div></td>
    <td><div id="d_text">
            <input name="sxf" type="text" id="sxf" size="20" maxlength="20" value="0">&nbsp;元
            &nbsp;&nbsp;&nbsp;&nbsp;理由：<input name="about" id="about" size="30" value="<?=$rows["about"]?>">
        </div></td>
  </tr>
  <?
  }
  if($rows["status"]=='未结算'){
      $userid = $rows['user_id'];
      $sql_last_money = "select update_time,order_value from money where `type` in('后台充值','银行汇款','在线支付') and `status`='成功' and user_id='$userid' order by update_time desc limit 0,1";
      $query_last_money	=	$mysqli->query($sql_last_money);
      $rows_last_money	=	$query_last_money->fetch_array();
      $end_time = $rows_last_money["update_time"];

      $s_time = date('Y-m-d');
      $sql_today_tk_cs = "select count(id) today_tk_cs from money where `type`='用户提款' and `status`='成功' and user_id='$userid' and update_time>='".$s_time." 00:00:00"."' limit 0,1";
      $query_today_tk_cs	=	$mysqli->query($sql_today_tk_cs);
      $rows_today_tk_cs	=	$query_today_tk_cs->fetch_array();
      $today_tk_cs = $rows_today_tk_cs["today_tk_cs"];

      $sql_total_tk_cs = "select count(id) total_tk_cs from money where `type`='用户提款' and `status`='成功' and user_id='$userid' limit 0,1";
      $query_total_tk_cs	=	$mysqli->query($sql_total_tk_cs);
      $rows_total_tk_cs	=	$query_total_tk_cs->fetch_array();
      $total_tk_cs = $rows_total_tk_cs["total_tk_cs"];

      $sql		=	"SELECT sum(bet_money) as s FROM `k_bet` where user_id='$userid' and bet_time>'$end_time' and status in('1','2','4','5')";
      $query		=	$mysqli->query($sql);
      $rs1			=	$query->fetch_array();
      if(!$rs1 || !$rs1["s"]){
          $touzhu1 = 0;
      }else{
          $touzhu1 = $rs1["s"];
      }

      $sql		=	"SELECT sum(bet_money) as s FROM `order_lottery` where user_id='$userid' and bet_time>'$end_time' and status in('1','2')";
      $query		=	$mysqli->query($sql);
      $rs2			=	$query->fetch_array();
      if(!$rs2 || !$rs2["s"]){
          $touzhu2 = 0;
      }else{
          $touzhu2 = $rs2["s"];
      }

      $sql		=	"SELECT sum(bet_money_total) as s FROM `six_lottery_order` where user_id='$userid' and bet_time>'$end_time' and status in('1','2')";
      $query		=	$mysqli->query($sql);
      $rs3			=	$query->fetch_array();
      if(!$rs3 || !$rs3["s"]){
          $touzhu3 = 0;
      }else{
          $touzhu3 = $rs3["s"];
      }

      $sql		=	"SELECT sum(bet_money) as s FROM `k_bet_cg_group` where user_id='$userid' and bet_time>'$end_time' and status in('1','2')";
      $query		=	$mysqli->query($sql);
      $rs4			=	$query->fetch_array();
      if(!$rs4 || !$rs4["s"]){
          $touzhu4 = 0;
      }else{
          $touzhu4 = $rs4["s"];
      }


      $sql		=	"SELECT live_username FROM `live_user` where user_id='$userid' and live_type='AG'";
      $query		=	$mysqli->query($sql);
      $rs			=	$query->fetch_array();

      $sql		=	"SELECT sum(bet_money) as s FROM `live_order` where live_username='".$rs["live_username"]."' and order_time>'$end_time'";
      $query		=	$mysqli->query($sql);
      $rs5			=	$query->fetch_array();
      if(!$rs5 || !$rs5["s"]){
          $touzhu5 = 0;
      }else{
          $touzhu5 = $rs5["s"];
      }

      $tz_money	=	sprintf("%.2f",($touzhu1+$touzhu2+$touzhu3+$touzhu4+$touzhu5));
  ?>
  <tr>
      <td bgcolor="#F0FFFF">提示</td>
      <td>
          今日提款次数：<?=$today_tk_cs?>，总提款次数：<?=$total_tk_cs?>。
          <br/>最后一笔存款时间：<?=$rows_last_money["update_time"]?>。最后一笔存款金额：<?=$rows_last_money["order_value"]?>。最后一笔存款后的投注总额：<?=$tz_money?>。
          <br/>(该数据仅供参考，请核对会员数据再进行提款操作。)
      </td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">操作</td>
    <td>
        <? if(in_array($rows["pay_name"],$hacker_list)){

        ?>
            该用户在黑客、不诚信、恶意用户名单中，请谨慎提交该提款 <input type="submit" value="继续提交(后果自负)"/>
            <a target="_blank" href="../../app/member/Cache/hacker_look.php?id=1">查看非法用户</a>
        <? }else{
        ?>
            <input type="submit" value="提交"/>
            <a target="_blank" href="../../app/member/Cache/hacker_look.php?id=1">查看非法用户</a>
        <?
        }?>
    </td>
  </tr>
<? } else { ?>
  <tr>
    <td bgcolor="#F0FFFF">状态</td>
    <td><? if($rows["status"]=='成功') echo '<span style="color:#006600;">成功</span>'; else echo '<span style="color:#FF0000;">失败</span>';?></td>
  </tr>
    <tr>
    <td bgcolor="#F0FFFF">处理时间</td>
    <td><?=$rows["update_time"]?></td>
  </tr>
<tr>
    <td bgcolor="#F0FFFF">手续费</td>
    <td><?=$rows["sxf"]?></td>
  </tr>
<tr>
    <td bgcolor="#F0FFFF">原因</td>
    <td><?=$rows["about"]?></td>
  </tr>
<? } ?>
</table>
</form>
</td>
  </tr>
</table>
</body>
</html>