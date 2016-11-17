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
include_once($C_Patch."/app/member/class/user.php");
include_once($C_Patch."/app/member/class/user_group.php");
include_once($C_Patch."/include/newpage.php");
include_once("../class/admin.php");

if(@$_GET["action"]=="savedl"){
	$id	=	intval($_GET["id"]);
	$sql	=	"update agents_list set agents_pass='".md5($_POST["dl_pwd1"])."' where id=$id";
	$mysqli->autocommit(FALSE);
	$mysqli->query("BEGIN"); //事务开始
	try{
		$mysqli->query($sql);
		$q1		=	$mysqli->affected_rows;
		if($q1 == 1){
			$mysqli->commit(); //事务提交
			
//            $msg_info = "修改了用户ID为".$uid."的密码";
//            admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],$msg_info,session_id(),"",$bj_time_now);
    		message('操作完成');
		}else{
			$mysqli->rollback(); //数据回滚
			message('操作失败');
		}
	}catch(Exception $e){
		$mysqli->rollback(); //数据回滚
		message('操作失败');
	}
}
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>设置注单为无效</TITLE>
<link rel="stylesheet" href="images/CssAdmin.css">
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
.t-title{background:url(../images/06.gif);height:24px;}
.t-tilte td{font-weight:800;}
</STYLE>
</HEAD>
<?php
$sql	=	"select id,agents_name,agents_pass from agents_list where id=".intval($_GET["id"])." limit 1";
$query	=	$mysqli->query($sql);
$rows	=	$query->fetch_array();
?>
<script language="javascript">
function check_sub2(){
	var p1 = document.getElementById("dl_pwd").value;
	var p2 = document.getElementById("dl_pwd1").value;
	if(p1.length < 1){
 		alert('请输入代理密码');
		document.getElementById("dl_pwd").focus();
		return false;
	}
 
	if(p1 != p2){
 		alert("两次密码输入不一致");
		document.getElementById("dl_pwd1").select();
 		return false;
	} 
	
	return true;
}
 </script>
<body>
<table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >
  <tr>
    <td height="24" nowrap background="../images/06.gif"><font >&nbsp;<span class="STYLE2">设置密码</span></font></td>
  </tr>
  <tr>
    <td height="24" align="center" nowrap bgcolor="#FFFFFF">
        <form action="set_pwd.php?action=savedl&id=<?=$rows["id"]?>" method="post"  name="form1" onSubmit="return check_sub2();">
      <p>&nbsp;</p>
      <table width="661" border="1" align="center" bordercolor="#333333"  style="border-collapse:collapse;color:#000;">
  <tr>
    <td bgcolor="#F0FFFF">代理名</td>
    <td><?=$rows["agents_name"]?></td>
  </tr>
  <tr>
    <td width="172" bgcolor="#F0FFFF">代理密码</td>
    <td width="473"><input name="dl_pwd" type="password" id="dl_pwd" value=""/></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">代理密码</td>
    <td><input  name="dl_pwd1" type="password" id="dl_pwd1" value=""/></td>
  </tr>
    <tr>
    <td bgcolor="#F0FFFF">操作</td>
    <td><input type="submit" value="提交"/></td>
  </tr>
</table>
</form></td>
  </tr>
</table>
</body>
</html>