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

if(@$_GET["action"]=="save"){
	$uid	=	intval($_GET["uid"]);
	$group_id_post	=	intval($_POST["group_select"]);

    $isPassValidate = "false";
    $groups_validate	=	user_group::getAllGroup();
    foreach($groups_validate as $key => $value){
        $group_id_validate = $value["group_id"];
        if($group_id_validate == $group_id_post){
            $isPassValidate = "true";
        }
    }

    if($isPassValidate == "true"){
        $sql = "update user_list set group_id='$group_id_post' where user_id='$uid'";
        $mysqli->query($sql);
        message('操作完成','list.php');
    }
}
 ?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>设置注单为无效</TITLE>
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
<?php
$sql	=	"select u.user_id,u.user_name,g.group_name from user_list u,user_group g where u.group_id=g.group_id and u.user_id=".intval($_POST["uid"][0])." limit 1";
$query	=	$mysqli->query($sql);
$rows	=	$query->fetch_array();

$groups	=	user_group::getAllGroup();
$select_sub = '';
foreach($groups as $key => $value){
    $group_name = $value["group_name"];
    $group_id = $value["group_id"];
    if($key==0){
        $select_sub .= "<option value='$group_id' selected='selected'>$group_name</option>";
    }else{
        $select_sub .= "<option value='$group_id'>$group_name</option>";
    }
}
?>
<script language="javascript">
function check_sub(){
    var group_value = document.getElementById("group_select").value;
	if(!group_value){
 		alert('数据错误，请联系管理员');
		return false;
	}

	return true;
}

 </script>
<body>
<table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0"
       style="border-collapse: collapse; color: #225d9c;" id=editProduct idth="100%">
    <tr>
        <td height="24" nowrap background="../images/06.gif"><font>&nbsp;<span class="STYLE2">用户管理：设置会员组</span></font>
        </td>
    </tr>
    <tr>
        <td height="24" align="center" nowrap bgcolor="#FFFFFF">
            <form action="set_usergroup.php?action=save&uid=<?= $rows["user_id"] ?>" method="post" name="form1"
                  onSubmit="return check_sub();">
                <p>&nbsp;</p>
                <table width="661" border="1" align="center" bordercolor="#333333"
                       style="border-collapse:collapse;color:#000;">
                    <tr>
                        <td bgcolor="#F0FFFF">用户名</td>
                        <td><?= $rows["user_name"] ?></td>
                    </tr>
                    <tr>
                        <td width="172" bgcolor="#F0FFFF">当前会员组</td>
                        <td width="473"><?= $rows["group_name"] ?></td>
                    </tr>
                    <tr>
                        <td bgcolor="#F0FFFF">设置会员组</td>
                        <td>
                            <select name="group_select" id="group_select">
                                <?= $select_sub ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#F0FFFF">操作</td>
                        <td><input type="submit" value="提交"/></td>
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