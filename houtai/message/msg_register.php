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

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

check_quanxian("消息管理");

if(@$_GET["action"]=="add"){
    $msg_title	=	trim($_POST["msg_title"]);
    $msg_info	=	trim($_POST["msg_info"]);
    $msg_type	=	$_POST["type"];
    $sql		=	'';
    $sql	=	"update config_p set parameter_value='$msg_type' where `parameter_key`='REGSTER_ENABLE'";
    $query	=	$mysqli->query($sql);
    $sql	=	"update config_p set parameter_value='$msg_title' where `parameter_key`='REGSTER_TITLE'";
    $query	=	$mysqli->query($sql);
    $sql	=	"update config_p set parameter_value='$msg_info' where `parameter_key`='REGSTER_CONTENT'";
    $query	=	$mysqli->query($sql);
    message('保存成功',$_SERVER['PHP_SELF']);
}

$sql	=	"select parameter_key,parameter_value from config_p where `parameter_key`='REGSTER_ENABLE' or `parameter_key`='REGSTER_TITLE' or `parameter_key`='REGSTER_CONTENT'";
$query	=	$mysqli->query($sql);

while($rows = $query->fetch_array()){
    if($rows['parameter_key']=="REGSTER_ENABLE"){
        $enable = $rows['parameter_value'];
    }elseif($rows['parameter_key']=="REGSTER_TITLE"){
        $title = $rows['parameter_value'];
    }elseif($rows['parameter_key']=="REGSTER_CONTENT"){
        $content = $rows['parameter_value'];
    }
}
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>给注册会员发布站内信息</title>
    <link href="../Images/css1/css.css" rel="stylesheet" type="text/css">
</head>
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
<script language="javascript" src="/js/jquery-1.7.1.js"></script>
<script>
    function check(){
        if($("#msg_title").val()==""){
            alert("请输入标题");
            $("#msg_title").select();
            return false;
        }
        if($("#msg_info").val()==""){
            alert("请输入内容");
            $("#msg_info").select();
            return false;
        }
        return true;
    }
</script>
<body>
<table width="100%" >
    <tr>
        <td height="24" background="../images/06.gif"><font >&nbsp;给注册会员发布站内信息</font></td>
    </tr>
    <tr>
        <td height="24" bgcolor="#FFFFFF">
            <form name="form1"   method="post" action="<?=$_SERVER['PHP_SELF']?>?action=add" onsubmit="return check();">
                <table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" >
                    <tr>
                        <td>消息标题：</td>
                        <td align="left"><input name="msg_title" id="msg_title" type="text" style="width:600px;" value="<?=$title?>"/></td>
                    </tr>
                    <tr>
                        <td>消息内容：</td>
                        <td  align="left"><textarea name="msg_info" id="msg_info" rows="9" style="width:600px;"><?=$content?></textarea></td>
                    </tr>
                    <tr>
                        <td>用户名：</td>
                        <td align="left">
                            <input type="radio" name="type" <? if($enable=="enable_false"){echo "checked";}?> value="enable_false" />
                            关闭自动发送&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="type" <? if($enable=="enable_true"){echo "checked";}?> value="enable_true" />
                            开启自动发送&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td align="center">&nbsp;</td>
                        <td align="left"><input name="submit" type="submit" value="保存"/></td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>
</body>
</html>