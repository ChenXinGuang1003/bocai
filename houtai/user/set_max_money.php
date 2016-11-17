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
include_once($C_Patch."/app/member/class/user.php");
include_once("../class/admin.php");
include_once($C_Patch."/app/member/class/user_group.php");

check_quanxian("修改会员");

$page	=	$_GET["page"];
$go		=	$_GET["go"];
$arr = array();
if($_POST['uid']){
    $arr = $_POST['uid'];
}
$uid	=	'';
$i		=	0; //会员个数
foreach($arr as $k=>$v){
    $uid .= $v.',';
    $i++;
}

$uid	=	rtrim($uid,',');
$uid_save = $uid;
if($_POST["uid_save"]){
    $uid_save = $_POST["uid_save"];
}

$max_money = $_POST["max_money"];

if(@$_GET["action"]=="save"){
    $sql = "update user_list set allow_total_money=$max_money  where user_id in ($uid_save)";
    $mysqli->query($sql);
    message('操作完成','list.php?page='.$page);
}
 ?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>设置当期最大下注金额</TITLE>
<link rel="stylesheet" href="Images/CssAdmin.css">
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
<script language="javascript">
function check_sub(){
    var max_money = document.getElementById("max_money").value;
	if(!max_money){
 		alert('请输入金额。');
		return false;
	}
	return true;
}
 </script>
<body>
<table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0"
       style="border-collapse: collapse; color: #225d9c;" id=editProduct idth="100%">
    <tr>
        <td height="24" nowrap background="../images/06.gif"><font>&nbsp;<span class="STYLE2">用户管理：设置当期最大下注金额</span></font>
        </td>
    </tr>
    <tr>
        <td height="24" align="center" nowrap bgcolor="#FFFFFF">
            <form action="?action=save" method="post" name="form1"
                  onSubmit="return check_sub();">
                <p>&nbsp;</p>
                <table width="661" border="1" align="center" bordercolor="#333333"
                       style="border-collapse:collapse;color:#000;">
                    <tr>
                        <td bgcolor="#F0FFFF">最大下注金额</td>
                        <td>
                            <input type="text" name="max_money" id="max_money"/>(设置为0表示不限制)
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#F0FFFF">操作</td>
                        <td>
                            <input type="hidden" name="uid_save" value="<?=$uid_save?>"/>
                            <input type="submit" value="提交"/>
                        </td>

                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>
</body>
</html>
<?php
$mysqli ->close();
?>