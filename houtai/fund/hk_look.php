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
include_once($C_Patch."/app/member/cache/website.php");

check_quanxian("财务审核");

if($_GET["action"]){
	$status = $_POST["hf_status"];
	$id		= intval($_POST["hf_id"]);
	$zsjr	= 0;
	$num	= 0;
	if($_POST['sxf_bl'] && is_numeric($_POST['sxf_bl']) && $_POST['is_zsjr']==1){
		$zsjr	= floor($_POST['hf_money']*$_POST['sxf_bl'])*1;
	}
	$msg	=	'失败';
	if($status == "1"){
		$sql	=	"update user_list,money set user_list.money=user_list.money+money.order_value+$zsjr,money.status='成功',zsjr=$zsjr,money.balance=user_list.money+money.order_value+$zsjr where user_list.user_id=money.user_id and money.id=$id and money.`status`='未结算'";
        $mysqli->query($sql);
        $q1			=	$mysqli->affected_rows;
        if($q1 != 2){
            message('更新金额失败，操作失败');
            exit;
        }
        $sql	=	"select money.*,user_list.money as u_balance from money,user_list where user_list.user_id=money.user_id and money.status='成功' and money.id=$id";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        $order = $row["order_num"];
        $pay_value = $row["order_value"]+$row["zsjr"];
        $balance = $row["u_balance"];
        $assets = $balance - $pay_value;
        $uid = $row["user_id"];

        $sql  =   "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$uid','$order','".""."',now(),'用户汇款成功','$pay_value','$assets',$balance);";
        $mysqli->query($sql);
        $q3		=	$mysqli->affected_rows;
        if($q3 != 1){
            $sql	=	"update money,user_list set money.status='未结算',money.update_time=now(),money.about='".""."',user_list.money=user_list.money-money.order_value,money.balance=user_list.money-money.order_value where user_list.user_id=money.user_id and money.status='成功' and money.id=$id";
            $mysqli->query($sql);
            message('插入金钱记录失败，操作失败');
            exit;
        }

		$msg	=	'成功';
		$num	= 	2;
	}else{
		$sql	=	"update money set `status`='失败',balance=assets where id=$id and `status`='未结算'";
        $mysqli->query($sql);
		$num	= 	1;
        $q1			=	$mysqli->affected_rows;
        if($q1 != 1){
            message('操作失败');
            exit;
        }
	}

    $msg_log = "审核了编号为".$id."的汇款单,".$msg;
    admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],$msg_log,session_id(),"",$bj_time_now);
    message('操作成功','huikuan.php?status=未结算');
}

$id		=	$_GET["id"];
$sql	=	"select hk.*,u.user_name,u.pay_name from `money` hk,`user_list` u where hk.user_id=u.user_id and hk.id=$id";
$query	=	$mysqli->query($sql);
$rs		=	$query->fetch_array();
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE></TITLE>
<link href="../images/css1/css.css" rel="stylesheet" type="text/css">
 
<style type="text/css">
.STYLE2 {font-size: 12px}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
td{font:13px/120% "宋体";padding:3px;}
a{

	color:#F37605;

	text-decoration: none;

}
.t-title{background:url(../images/06.gif);height:24px;}
.t-tilte td{font-weight:800;}
</STYLE>
</HEAD>
<script type="text/javascript">
function check($v){
	document.getElementById("hf_status").value = $v;
	document.getElementById("form1").submit(); 
}
</script>
<body>
<form name="form1" id="form1" method="post" action="hk_look.php?action=true">
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap background="../images/06.gif"><font >&nbsp;<span class="STYLE2">汇款管理：查看用户汇款信息</span></font></td>
  </tr>
  <tr>
    <td height="24" align="left" nowrap bgcolor="#FFFFFF"><input name="hf_status" type="hidden" id="hf_status">
      <input name="hf_id" type="hidden" id="hf_id" value="<?=$id?>"><input name="hf_money" type="hidden" id="hf_money" value="<?=$rs["order_value"]?>"></td>
  </tr>
</table>

<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   
  <tr>
    <td height="24" valign="top" nowrap bgcolor="#FFFFFF">
    
<table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >
	        <tr align="center">
	          <td align="right">汇款流水号：</td>
	          <td align="left"><?=$rs["order_num"]?></td>
          </tr>
	        <tr align="center">
	          <td width="22%" align="right">汇款用户：</td>
              <td width="78%" align="left"><?=$rs["user_name"]?></td>
          </tr>
	        <tr align="center">
	          <td align="right">汇款前余额：</td>
	          <td align="left"><span style="color:#999999;"><?=$rs["assets"]?></span></td>
          </tr>
	        <tr align="center">
	          <td align="right">汇款金额：</td>
	          <td align="left"><?=$rs["order_value"]?></td>
          </tr>
	        <tr align="center">
	          <td align="right">汇款后余额：</td>
	          <td align="left"><span style="color:#999999;"><?=$rs["balance"]?></span></td>
          </tr>
	        <tr align="center">
	          <td align="right">汇款日期：</td>
	          <td align="left"><?=$rs["date"]?></td>
          </tr>
	        <tr align="center">
	          <td align="right">汇款银行：</td>
	          <td align="left"><?=$rs["pay_card"]?></td>
          </tr>
	        <tr align="center">
	          <td align="right">汇款方式：</td>
	          <td align="left"><?=$rs["manner"]?></td>
          </tr>
	        <tr align="center">
	          <td align="right">汇款地点：</td>
	          <td align="left"><?=$rs["pay_address"]?></td>
          </tr>
	        <tr align="center">
	          <td align="right">提交时间：</td>
	          <td align="left"><?=$rs["update_time"]?></td>
          </tr>
	        <tr align="center">
	          <td align="right">当前状态：</td>
	          <td align="left"><?php
			  if($rs["status"]=='成功') echo "汇款成功";
			  else if($rs["status"]=='失败') echo "汇款失败";
			  else echo "审核中";
			  ?></td>
          </tr>
	        <tr align="center">
	          <td align="right">赠送手续费：</td>
	          <td align="left"><?php
			  if($rs['status']=='成功'){
			  	echo $rs['zsjr'].' 元';
			  }else{
			  ?>
			  <label>
	            <input name="is_zsjr" type="checkbox" id="is_zsjr" value="1" checked>
	          勾选则赠送，不勾则不赠送。同城同行汇款不赠送。</label>
                  <br/>手续费比例：<input name="sxf_bl" type="text" id="sxf_bl" value="<?=$web_site['hk_sxf']>0?$web_site['hk_sxf']:0.00?>" size="3"/>说明：如果用户充值100，比例为0.02。用户得到手续费2=100*0.02
			  <?php }?>
			  </td>
          </tr>
	        <tr align="center">
	          <td colspan="2" align="right">&nbsp;</td>
          </tr>
	        <tr align="center">
	          <td colspan="2" align="center">
                  <?php
                  if($rs['status']=='未结算' && !in_array($rs["pay_name"],$hacker_list)){
                  ?>
	             <input type="button" name="Submit2" value="充值成功" onClick="check('1');">
	             <input type="button" name="Submit3" value="充值失败" onClick="check('2');">　
                  <?php
                  }else{
                      ?>
                      该用户在黑客、不诚信、恶意用户名单中，请谨慎提交该提款 <input type="button" name="Submit2" value="继续提交(后果自负)" onClick="check('1');">
                      <input type="button" name="Submit3" value="充值失败" onClick="check('2');">　
                  <?php
                  }
                  ?>
	            <input type="button" name="Submit" value="返回" onClick="javascript:window.history.go(-1);"> <a target="_blank" href="../../app/member/Cache/hacker_look.php?id=1">查看非法用户</a>
	          </td>

          </tr>
    </table>
    </td>
  </tr>
</table>
</form>
</body>
</html>