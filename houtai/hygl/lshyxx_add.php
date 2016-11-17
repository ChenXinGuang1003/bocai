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
include_once("../class/admin.php");
include_once("../common/login_check.php");
check_quanxian("财务审核");

if($_GET["action"]=="add"){
	$username		=	trim($_POST["username"]);
	$pay_card		=	trim($_POST["pay_card"]);
	$pay_num		=	trim($_POST["pay_num"]);
	$pay_address	=	trim($_POST["pay_address"]);
    $pay_name		=	trim($_POST["pay_name"]);
	
	$sql			=	"select user_id from user_list where user_name='$username' limit 1";
	$query			=	$mysqli->query($sql);
	$row			=	$query->fetch_array();
	if($row['user_id'] > 0){
        if($_POST["id"]){
            $sql		=	"update history_bank set pay_card='$pay_card',pay_num='$pay_num',pay_address='$pay_address',pay_name='$pay_name' where id=".intval($_POST["id"])."";
            $mysqli->query($sql);
            if($mysqli->affected_rows == 1){
                $msg_info = "管理员：".$_SESSION['login_name']."编辑了会员：".$username." 历史银行卡信息。id：".$mysqli->insert_id;
                admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],$msg_info,session_id(),"",$bj_time_now);

                message('修改历史银行卡信息成功','lsyhxx.php?action=1&username='.$username);
            }else{
                message('修改历史银行卡信息失败');
            }
        }else{
            $sql		=	"insert into history_bank (uid,username,pay_card,pay_num,pay_address,pay_name) values (".$row['user_id'].",'$username','$pay_card','$pay_num','$pay_address','$pay_name')";
            $mysqli->query($sql);
            if($mysqli->affected_rows == 1){
                $msg_info = "管理员：".$_SESSION['login_name']."新增了会员：".$username." 历史银行卡信息。id：".$mysqli->insert_id;
                admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],$msg_info,session_id(),"",$bj_time_now);

                message('新增历史银行卡信息成功','lsyhxx.php?action=1&username='.$username);
            }else{
                message('新增历史银行卡信息失败');
            }
        }
    }else{
		message('新增历史银行卡信息失败，没有这个会员');
    }	
}elseif($_GET["id"]){
    $sql		=	"SELECT * FROM history_bank where id=".intval($_GET["id"])."";
    $query		=	$mysqli->query($sql);
    $row_history	=	$query->fetch_array();
}else{
    $row_history = array();
}
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>新增会员银行历史信息</TITLE>
<link href="../images/css1/css.css" rel="stylesheet" type="text/css">
<style type="text/css">
.STYLE1 {font-size: 10px}
.STYLE2 {font-size: 12px}
body {	margin: 0px;}
td{font:13px/120% "宋体";padding:3px;}
a{

	color:#F37605;
	text-decoration: none;

}
.t-title{background:url(../images/06.gif);height:24px;}
.t-tilte td{font-weight:800;}
.inputguanjun { width:300px;}
</STYLE>
<script>
function check(){
	var username = document.getElementById("username").value;
	if(username.length < 1){
		document.getElementById("username").focus();
		return false;
	}
	var pay_name = document.getElementById("pay_name").value;
	if(pay_name.length < 1){
		document.getElementById("pay_name").focus();
		return false;
	}
	var pay_card = document.getElementById("pay_card").value;
	if(pay_card.length < 1){
		document.getElementById("pay_card").focus();
		return false;
	}
	var pay_num = document.getElementById("pay_num").value;
	if(pay_num.length < 1){
		document.getElementById("pay_num").focus();
		return false;
	}
	var pay_address = document.getElementById("pay_address").value;
	if(pay_address.length < 1){
		document.getElementById("pay_address").focus();
		return false;
	}
	return true;
}
</script>
</HEAD>

<body>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap background="../images/06.gif"><font >&nbsp;<span class="STYLE2">新增会员银行历史信息</span></font></td>
  </tr>
  <tr>
    <td height="24" align="center" nowrap bgcolor="#FFFFFF">
<br>
<form action="lshyxx_add.php?action=add" method="post" name="form1" onSubmit="return check();">
<table width="90%" align="center" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;">
  <tr>
    <td bgcolor="#F0FFFF">会员名称</td>
    <td><input  name="username" type="text" id="username" size="40" maxlength="20" value="<?=$_GET["user_name"]?>" <?if($_GET["id"]){echo "readonly";}?>/></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">开户人</td>
    <td><input  name="pay_name" type="text" id="pay_name" size="40" maxlength="20" value="<?=$row_history["pay_name"]?>"/></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">开户行</td>
    <td>
        <select id="pay_card" name="pay_card">
            <option value="中国工商银行" <?=$row_history['pay_card']=='中国工商银行' ? 'selected' : ''?>>中国工商银行</option>
            <option value="中国招商银行" <?=$row_history['pay_card']=='中国招商银行' ? 'selected' : ''?>>中国招商银行</option>
            <option value="中国农业银行" <?=$row_history['pay_card']=='中国农业银行' ? 'selected' : ''?>>中国农业银行</option>
            <option value="中国建设银行" <?=$row_history['pay_card']=='中国建设银行' ? 'selected' : ''?>>中国建设银行</option>
            <option value="中国民生银行" <?=$row_history['pay_card']=='中国民生银行' ? 'selected' : ''?>>中国民生银行</option>
            <option value="中国交通银行" <?=$row_history['pay_card']=='中国交通银行' ? 'selected' : ''?>>中国交通银行</option>
            <option value="中国民生银行" <?=$row_history['pay_card']=='中国民生银行' ? 'selected' : ''?>>中国民生银行</option>
            <option value="深圳发展银行" <?=$row_history['pay_card']=='深圳发展银行' ? 'selected' : ''?>>深圳发展银行</option>
            <option value="广东发展银行" <?=$row_history['pay_card']=='广东发展银行' ? 'selected' : ''?>>广东发展银行</option>
            <option value="光大银行" <?=$row_history['pay_card']=='光大银行' ? 'selected' : ''?>>光大银行</option>
            <option value="平安银行" <?=$row_history['pay_card']=='平安银行' ? 'selected' : ''?>>平安银行</option>
            <option value="中国邮政" <?=$row_history['pay_card']=='中国邮政' ? 'selected' : ''?>>中国邮政</option>
            <option value="兴业银行" <?=$row_history['pay_card']=='兴业银行' ? 'selected' : ''?>>兴业银行</option>
            <option value="中信银行" <?=$row_history['pay_card']=='中信银行' ? 'selected' : ''?>>中信银行</option>
            <option value="中国银行" <?=$row_history['pay_card']=='中国银行' ? 'selected' : ''?>>中国银行</option>
            <option value="其他" <?=$row_history['pay_card']=='其他' ? 'selected' : ''?>>其他</option>
        </select>
    </td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">银行卡号</td>
    <td><input  name="pay_num" type="text" id="pay_num" size="40" maxlength="20" value="<?=$row_history["pay_num"]?>"/></td>
  </tr>
  <tr>
    <td width="220" bgcolor="#F0FFFF">开户地址</td>
    <td width="783"><input  name="pay_address" type="text" id="pay_address" size="40" maxlength="20" value="<?=$row_history["pay_address"]?>"/></td>
  </tr>
    <tr>
    <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#F0FFFF">操作</td>
      <td>
          <input name="id" type="hidden" value="<?=$_GET["id"]?>"/>
          <input name="submit" type="submit" value="添加"/>
      </td>
    </tr>
</table>
</form></td>
  </tr>
</table>
</body>
</html>