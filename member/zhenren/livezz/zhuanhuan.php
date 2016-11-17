<?php
session_start();
include_once("../include/config.php"); 
include_once("../common/login_check.php");
include_once("../common/logintu.php");
include_once("../include/mysqli.php");
include_once("../class/user.php");
include_once("../common/function.php");

$uid=$_SESSION['uid'];
$loginid=$_SESSION['user_login_id'];
renovate($uid,$loginid); //验证是否登陆
$userinfo=user::getinfo($_SESSION["uid"]);

if(@$_GET["action"]=="save")
{
	if($userinfo['ag_zr_is']=="0")
	{
		message("未开通真人业务，不能转账。");
		exit;
	}
    $zz_type=intval($_POST["zz_type"]);
    $zz_money=intval($_POST["zz_money"]);
	switch ($zz_type)
	{
		case 1:
			$zz_type="d";
			break;
		case 2:
			$zz_type="vd";
			break;
		case 3:
			$zz_type="w";
			break;
		case 4:
			$zz_type="vw";
			break;
	}
    if($zz_money<=0)
    {
        message("转账金额必须大于0，请重新输入。");
    }
    else
    {
        $username=$userinfo['username'];
        $zr_username=$userinfo['ag_zr_username'];
        $zz_time=date("Y-m-d H:i:s");
        $sql="insert into ag_zhenren_zz(live_type,zz_type,uid,username,zr_username,zz_money,ok,result,zz_num,zz_time) values ('AG','$zz_type',$uid,'$username','$zr_username',$zz_money,0,'转账中',0,'$zz_time')";
		$mysqli->query($sql);
        message('转账申请已经提交，请稍后查询转账记录。','../livezz/zz_jilu.php?1=1');
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <style type="text/css">
        html{
            margin:0px auto;
        }
        body{
            width:100%;
            padding:0;
            margin:0px auto;
            font-family:Arial, Helvetica, sans-serif;
            font-size:12px;
        }
    </style>
</head>
<body>
<table border="0" cellspacing="10" cellpadding="0" width="800">
    <form action="zhuanhuan.php?action=save" method="post" name="form1">
    <tr>
        <td align="right" style="color:#ff0000;"><b>钱包转账：</b></td>
        <td>
            <a href="zz_jilu.php?1=1">查询转账记录</a>
        </td>
    </tr>
    <tr>
        <td align="right">
            用户账号：
        </td>
        <td>
            <?=$userinfo["username"]?>
        </td>
    </tr>
    <tr>
        <td align="right">
            主账户余额：
        </td>
        <td>
            <?=$userinfo["money"]?>
        </td>
    </tr>
    <tr>
        <td align="right">
            真人账户(普通厅)余额：
        </td>
        <td>
            <?=$userinfo["ag_zr_money"]?> <font color="#353535">(请进入真人娱乐场查询)</font>
        </td>
    </tr>
    <tr>
        <td align="right">
            真人账户(VIP厅)余额：
        </td>
        <td>
            <?=$userinfo["ag_zr_vipmoney"]?> <font color="#353535">(请进入真人娱乐场查询)</font>
        </td>
    </tr>
    <tr>
        <td align="right" width="150">
            转账选择：
        </td>
        <td>
            <select name="zz_type" id="zz_type">
                <option value="1">主账户->真人(普通厅)</option>
                <option value="2">主账户->真人(VIP厅)</option>
                <option value="3">真人(普通厅)->主账户</option>
                <option value="4">真人(VIP厅)->主账户</option>
            </select>
        </td>
    </tr>
    <tr>
        <td align="right">
            转账金额：
        </td>
        <td>
            <input type="text" name="zz_money" id="zz_money" onkeyup="if(isNaN(value))execCommand('undo')" />
        </td>
    </tr>
    <tr>
        <td align="right"></td>
        <td>
            <input type="submit" value="确认转账" />
        </td>
    </tr>
    </form>
</table>
</div>
</body>
</html>