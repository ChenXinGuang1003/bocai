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
    include_once("../../app/member/class/user.php");

    $msg_title	=	trim($_POST["msg_title"]);
    $msg_info	=	trim($_POST["msg_info"]);
    $msg_from	=	trim($_POST["msg_from"]);
    if($_POST["type"]){
        $sql		=	'';
        if($_POST["type"] == "login"){ //所有在线会员
            $sql	=	"select user_id from user_list where `online`>0";
        }elseif($_POST["type"] == "all"){ //所有会员
            $sql	=	"select user_id from user_list";
        }elseif($_POST["type"] == "user_g"){ //所有会员
            $sql	=	"select user_id from user_list where group_id='".$_POST['group']."'";
        }
        if($sql){
            $query	=	$mysqli->query($sql);
            while($rows = $query->fetch_array()){
                user::msg_add($rows["user_id"],$msg_from,$msg_title,$msg_info);
            }
        }
        message('发送成功',$_SERVER['PHP_SELF']);
    }else{
        $arr_un = explode(',',rtrim(trim($_POST["user_name"]),','));
        $un		= '';
        foreach($arr_un as $k=>$v){
            $un	.= "'".$v."',";
        }
        if($un != ''){
            $un		=	rtrim($un,',');
            $sql	=	"select user_id from user_list where user_name in ($un)";
            $query	=	$mysqli->query($sql);
            while($rows = $query->fetch_array()){
                user::msg_add($rows['user_id'],$msg_from,$msg_title,$msg_info);
            }
            message('发送成功',$_SERVER['PHP_SELF']);
        }
        message('没有这个用户名',$_SERVER['PHP_SELF']);
    }
}
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>发布短消息</title>
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
            alert("请输入短消息标题");
            $("#msg_title").select();
            return false;
        }
        if($("#msg_info").val()==""){
            alert("请输入短消息内容");
            $("#msg_info").select();
            return false;
        }
        var len = $(":radio:checked").length;
        if(len==0 && $("#user_name").val()==""){
            alert("请输入会员名称");
            $("#user_name").select();
            return false;
        }
		if($(":radio:checked").val()=="user_g" && $("#group").val()==0 && $("#user_name").val()==""){
            alert("请选择会员组");
            return false;
        }
        return true;
    }
</script>
<body>
<table width="100%" >
    <tr>
        <td height="24" background="../images/06.gif"><font >&nbsp;给网站会员发布短消息</font></td>
    </tr>
    <tr>
        <td height="24" bgcolor="#FFFFFF">
            <form name="form1"   method="post" action="<?=$_SERVER['PHP_SELF']?>?action=add" onsubmit="return check();">
                <table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" >
                    <tr>
                        <td>消息标题：</td>
                        <td align="left"><input name="msg_title" id="msg_title" type="text" style="width:600px;" value="<?=@$_GET['title']?>"/></td>
                    </tr>
                    <tr>
                        <td>消息内容：</td>
                        <td  align="left"><textarea name="msg_info" id="msg_info" rows="9" style="width:600px;"></textarea></td>
                    </tr>
                    <tr>
                        <td>用户名：</td>
                        <td align="left">
                            <textarea name="user_name" rows="3" id="user_name" style="width:600px;"><?=@$_GET["user_name"]?></textarea>
                            多个会员用 , 隔开
                            <br/>
                            <input type="radio" name="type" value="login" />
                            在线会员&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="type" value="all" />
                            所有会员&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="radio" name="type" value="user_g" />
                            会员组：<select name="group" id="group">
                                <option value="0">请选择会员组</option>
                                <?php
                                $sql	=	"SELECT group_id,group_name FROM user_group order by id asc";
                                $query	=	$mysqli->query($sql);
                                while($rows = $query->fetch_array()){
                                    ?>
                                    <option value="<?=$rows["group_id"]?>"><?=$rows["group_name"]?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="12%">发布者：</td>
                        <td width="88%" align="left"><input type="text" name="msg_from"  value="<?=$web_site['web_name']?>" /></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center">&nbsp;</td>
                        <td align="left"><input name="submit" type="submit" value="发布"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="msg_list.php?1=1">查看短消息记录</a></td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>
</body>
</html>