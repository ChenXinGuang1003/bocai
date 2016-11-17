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
check_quanxian("财务审核");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员历史银行信息</title>
</head>
<link href="../images/css1/css.css" rel="stylesheet" type="text/css">
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
</STYLE>
<body>
<table width="100%" border="0">
<form id="form1" name="form1" method="get" action="lsyhxx.php">
  <tr>
    <td width="15%">请输入会员名称：</td>
    <td width="70%"><textarea name="username" cols="80" rows="3" id="username"><?=$_GET['username']?></textarea> 
    多个会员用 , 隔开    </td>
    <td width="15%" align="center"><a href="lshyxx_add.php">添加银行历史信息</a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><input type="submit" name="Submit" value="查找" />
      <input name="action" type="hidden" id="action" value="1" /></td>
  </tr>
    </form>
</table>
<br />
<table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >       <tr style="background-color: #EFE" class="t-title"  align="center">
    <td width="10%"><strong>开户人</strong></td>
    <td width="12%"><strong>开户行</strong></td>
    <td width="16%"><strong>银行卡号</strong></td>
    <td width="26%"><strong>开户地址</strong></td>
    <td width="13%"><strong>添加日期</strong></td>
    <td width="13%"><strong>会员名称</strong></td>
    <td width="10%"><strong>操作</strong></td>
  </tr>
<?php
if($_GET['action'] == 1 && isset($_GET['username'])){
	$username		=	'';
	$arr_un			=	explode(',',$_GET['username']);
	foreach($arr_un as $k=>$v){
		$username .= "'".$v."',";
	}
	if($username){
		$username	=	rtrim($username,",");
		$sql		=	"SELECT * FROM history_bank where username in($username) order by uid asc,id desc";
		$query		=	$mysqli->query($sql);
		$arr_bank	=	array();
		while($row	=	$query->fetch_array()){
?>
  <tr onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#FFFFFF'" style="background-color:#FFFFFF;">
    <td height="30" align="center"><?=$row['pay_name']?></td>
    <td align="center"><?=$row['pay_card']?></td>
    <td align="center"><?=$row['pay_num']?></td>
    <td align="center"><?=$row['pay_address']?></td>
    <td align="center"><?=$row['addtime']?></td>
    <td align="center"><a href="user_show.php?id=<?=$row['uid']?>" target="_blank"><?=$row['username']?></a></td>
    <td align="center"><a style="color: #F37605;" href="lshyxx_add.php?id=<?=$row['id']?>&user_name=<?=$row['username']?>">编辑</a></td>
  </tr>
<?php
		}
	}
}
?>
</table>
</body>
</html>