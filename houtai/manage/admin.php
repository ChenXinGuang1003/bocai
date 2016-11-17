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
check_quanxian("管理员管理");

$qx_str="查看会员信息|修改会员|删除会员|查看代理信息|添加代理|删除代理|修改代理|查看财务信息|加款扣款|财务审核|会员返利|查看注单|手工结算注单|手工录入体育比分|手工录入彩票结果|修改网站信息|修改在线支付|查看报表|管理员管理|编辑体育赛事|修改彩票赔率|修改体育赔率|游戏开关|消息管理|真人娱乐|数据管理";
if(@$_GET["action"]=="save"){

	if(trim($_POST['onlylogin'])==1 || trim($_POST['onlylogin'])=="on"){
	$c=1;
	}
	else{
	$c=0;
	}
	
	$quanxian_str	=	implode('|',$_POST["quanxian"]);
	$quanxian_str="|".$quanxian_str."|";

	if(trim(@$_POST["login_name"]) !="" && trim(@$_POST["login_pwd"]) !="")
	{
		$sql			=	"select count(*) as c from sys_manage where manage_name='".trim($_POST['login_name'])."'";
		$query	=	$mysqli->query($sql);
		$rows	 =	$query->fetch_array();
		$cou=$rows["c"];
		if($cou>0)
		{
		$msg="添加失败,已存在该管理员名称!";
		}else{
		$msg="添加成功";
		//新增
		$sql			=	"insert into sys_manage(manage_name,manage_pass,login_one,purview) values('".trim($_POST['login_name'])."','".md5(md5($_POST['login_pwd']))."','$c','$quanxian_str')"; 
		}

	}else{
		if(@$_POST["login_pwd"] !="")
		{
		$sql			=	"update sys_manage set purview='$quanxian_str',manage_pass='".md5(md5($_POST['login_pwd']))."',login_one='".$c."' where id='".$_GET["id"]."'";
		}
		else
		{
		$sql			=	"update sys_manage set purview='$quanxian_str',login_one='".$c."' where id='".$_GET["id"]."'";
		}
		
		$msg="修改成功";
	}
	
	$mysqli->query($sql);
	admin::insert_log($_SESSION["login_name"],get_ip(),$bj_time_now,"编辑了管理员的信息,管理员ID为".$_GET["id"],session_id(),"",$bj_time_now);

	message($msg,'list.php');
}
if(@$_GET["action"]=="del"){

	$sql			=	"select count(*) as c from sys_manage";
	$query	=	$mysqli->query($sql);
	$rows	 =	$query->fetch_array();
	$cou=$rows["c"];
	if($cou>1)
	{
		$sql			=	"delete from sys_manage where id='".$_GET["id"]."'"; 
		$mysqli->query($sql);
		admin::insert_log($_SESSION["login_name"],get_ip(),$bj_time_now,"删除了管理员,管理员ID为".$_GET["id"],session_id(),"",$bj_time_now);

		message('删除成功','list.php');
	}else{
		message('只有一个管理员,不可删除','list.php');
	}
	
}

if(@$_GET["action"]=="add"){
	$manage_str="<input name=\"login_name\" type=\"text\" size=\"30\"/>";
	$myqx="";
}
else
{
	$sql	=	"select * from sys_manage where id='".intval($_GET["id"])."' limit 1";
	$query	=	$mysqli->query($sql);
	$rows	=	$query->fetch_array();

	$myqx=$rows["purview"];

	$manage_str=$rows["manage_name"];
}
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE></TITLE>
<style type="text/css">
.STYLE2 {font-size: 12px}
body {	margin: 0px;}
td{font:13px/120% "宋体";padding:3px;}
a{color:#FFA93E;}
.t-tilte td{font-weight:800;}
.STYLE3 {color: #999999}
</STYLE>
</HEAD>

<body>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap><font ><span class="STYLE2">管理：编辑管理员</span></font></td>
  </tr>
  <tr>
    <td height="24" align="center" nowrap bgcolor="#FFFFFF"></td>
  </tr>
</table>
<br>
<?php

$qx=explode('|',$qx_str);
?>
<form action="<?=$_SERVER['PHP_SELF']?>?action=save&id=<?=$rows["id"]?>" method="post"  name="form1">
<table width="90%" align="center" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;">
  <tr>
    <td width="172" bgcolor="#F0FFFF">登陆名称</td>
    <td width="473"><?=$manage_str?></td>
  </tr>
  <tr>
    <td width="172" bgcolor="#F0FFFF">登陆密码</td>
    <td width="473"><input name="login_pwd" type="text" size="30"/></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">权限设置</td>
    <td>
     <?
	 $temp_i=0;
     foreach($qx as $key => $t)
	 {
		$temp_i++;
	 ?>
      <input type="checkbox" name="quanxian[]"  <? if(strpos($myqx,$t)){?> checked  <? }?>  value="<?=$t?>"> <?=$t?>
   <?php
    if($temp_i%5==0) echo "<br />";
   } ?> </td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">登陆限制</td>
    <td><input type="checkbox" name="onlylogin"  <? if($rows["login_one"]==1){?> checked  value="<?=$rows["login_one"]?><? }?>  ">只允许一个地方登陆 
      </td>
  </tr>
    <tr>
    <td bgcolor="#F0FFFF">操作</td>
    <td><input type="submit" value="提交"/> 
      &nbsp;   &nbsp;
      <input type="button" value="取消"  onClick="javascript:history.go(-1);"/></td>
  </tr>
</table>
</form>
</body>
</html>