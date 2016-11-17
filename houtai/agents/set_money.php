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

check_quanxian("加款扣款");
if($_GET["action"]=="save"){
	include_once("../../app/member/class/money_agents.php");
	$uname	=	$_POST["aname"];
	$money	=	floatval($_POST["m_value"]);
	$about	=	$_POST["about"];
    $order	=	date("YmdHis")."_".$uname;
	
	$sql	 =	"select money from agents_list where agents_name='".$uname."' limit 0,1"; //取汇款前会员余额
	$query	 =	$mysqli->query($sql);
	$rows	 =	$query->fetch_array();
	$assets	 =	$rows['money'];
	
	if($_POST["type"]=="add"){ //加钱
        $reason = "对代理名".$uname."的账户金额增加了".$money.",理由".$about;
        
        $sql_check	 =	"select id,edtime from manage_log where edlog='$reason' order by edtime desc limit 0,1";
        $query_check	 =	$mysqli->query($sql_check);
        $rows_check	 =	$query_check->fetch_array();
        if($rows_check && $rows_check["id"]){
            $time_diff = time()-strtotime($rows_check["edtime"]);
            if($time_diff<21){
                message('加钱失败，不允许在20秒内对同一个账号加相同数额的金钱。');
            }
        }

		if(moneyAgents::chongzhi($uname,$order,$money,$assets,1,$about."[管理员结算]")){
            
			message('加钱成功','../fund/domoney.php?username='.$uname);
		}else{
			message('加钱失败');
		}
	}else{//扣钱
		if(moneyAgents::tixian($uname,$money,$assets,$web_site['web_name'],'888888','美国',$web_site['web_name'],$order,1,$about."[管理员结算]")){	
           
			message('扣钱成功','../fund/domoney.php?username='.$uname);
		}else{
			message('扣钱失败');
		}
	}
}
$sql	=	"select agents_name from agents_list where agents_name='".$_GET["agentsname"]."' limit 1";
$query	=	$mysqli->query($sql);
$t		=	$query->fetch_array();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户手工结算金额</title>
<link href="../images/css1/css.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.STYLE3 {color: #FF0000}
-->
</style>
</head>
<style type="text/css">
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
.STYLE5 {color: #999999}
</style>
<body>
 <table align="center"  width="100%" >
  <tr>
    <td height="24" nowrap background="../images/06.gif"><font >&nbsp;代理余额手工结算</font></td>
  </tr>
  <tr>
    <td height="24" align="center" nowrap bgcolor="#FFFFFF">
    <form name="form1"  method="post" action="<?=$_SERVER['PHP_SELF']?>?action=save">
  
    <table width="116%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >
  <tr>
    <td width="16%" height="45" align="right">代理名：</td>
    <td width="84%" align="left"><font color="Red"><?=$t["agents_name"]?></font><input  type="hidden" name="uid" value="<?=$_GET["agentsname"]?>"/>
      <input name="aname" type="hidden" id="aname" value="<?=$t["agents_name"]?>" /></td>
  </tr>
  <tr>
    <td height="49" align="right">类型：</td>
    <td align="left">
    <input name="type" type="radio" value="add" <?=$_GET['type']=='add' ? 'checked="checked"' : ''?>/><span style="color:#009900">加钱</span>&nbsp;&nbsp;&nbsp;&nbsp; 
    <input type="radio" name="type" value="min" <?=$_GET['type']=='min' ? 'checked="checked"' : ''?>/><span style="color:#FF0000">扣钱</span></td>
  </tr>
  <tr>
     <td height="47" align="right">金额：</td>
     <td align="left"><input name="m_value" type="text" size="10" maxlength="10" />     
       <span class="STYLE3">*</span><span class="STYLE5">必须为数字</span></td>
  </tr>
    <tr>
     <td height="44" align="right">理由：</td>
     <td align="left"> <input name="about" type="text" size="40" maxlength="255" /> 注释：理由如果包含 "用于活动" 字眼，则此次加/扣钱的金额不会在'代理存取报表'中体现。</td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
    </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="left"><input name="submit" type="submit" style="width:100px;"  onclick="return confirm('确定提交?');" value="确定"/></td>
  </tr>
</table>  
    </form>
</td>
  </tr>
</table>
</body>
</html>