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
include_once($C_Patch."/include/newpage.php");

check_quanxian("查看会员信息");
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登陆IP列表页面</title>
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
<script language="javascript" src="/js/jquery-1.7.1.js"></script>
<script>
function check(){
	if($("#ip").val()=="" && $("#username").val()==""){
		alert("登陆IP 和 会员名称 至少要填一样");
		return false;
	}
	return true;
}
</script>
<body>
<form id="form1" name="form1" method="get" action="login_ip.php" onsubmit="return check();">
<table width="100%" border="0">
  <tr>
    <td width="17%">请您输入要查询的IP地址：</td>
    <td width="83%"><textarea name="ip" cols="80" rows="2" id="ip"><?=@$_GET['ip']?></textarea>
      多个IP可以用 , 隔开</td>
  </tr>
  <tr>
    <td>请您输入要查询的会员名称：</td>
    <td><label>
      <textarea name="username" cols="80" rows="2" id="username"><?=@$_GET['username']?></textarea>
    多个会员可以用 , 隔开</label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="查询" /></td>
  </tr>
</table>
</form>
<br>
<table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >       <tr style="background-color: #EFE" class="t-title"  align="center">
    <td width="29%"><strong>IP地址</strong></td>
    <td width="26%"><strong>登陆时间</strong></td>
    <td width="22%"><strong>会员名称</strong></td>
    <td width="23%"><strong>登陆网址</strong></td>
</tr>
<?php
if(isset($_GET["ip"]) || isset($_GET["username"])){
	$ip		=	'';
	$un		=	'';
	$where	=	'';
	$arr_ip	=	explode(',',rtrim(trim($_GET["ip"]),','));
	foreach($arr_ip as $k=>$v){
		if($v != ''){
			$ip	.=	"'".$v."',";
		}
	}
	if($ip != ''){
		$ip 	=	rtrim($ip,',');
		$where	=	"ip in ($ip)";
	}
	$arr_un	=	explode(',',rtrim(trim($_GET["username"]),','));
	foreach($arr_un as $k=>$v){
		if($v != ''){
			$un	.=	"'".$v."',";
		}
	}
	if($un != ''){
		$un = rtrim($un,',');
		if($where == ''){
			$where	=	"username in ($un)";
		}else{
			$where	.=	" and username in ($un)";
		}
	}
	
	$sql	=	"SELECT ip,uid,username,ip_address,login_time,www FROM history_login where $where order by login_time desc";
	$query	=	$mysqli->query($sql);
	while($row = $query->fetch_array()){
        include_once($C_Patch."/app/member/ip.php");
        include_once($C_Patch."/app/member/city.php");

        $ClientSity = iconv("GB2312","UTF-8",convertip($row['ip']));   //取出IP所在地
?>
  <tr onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#FFFFFF'" style="background-color:#FFFFFF;">
    <td align="center"><?=$row['ip']?><br/><?=$ClientSity?></td>
    <td align="center"><?=$row['login_time']?></td>
    <td align="center"><a href="../hygl/user_show.php?id=<?=$row['uid']?>"><?=$row['username']?></a></td>
    <td align="center"><?=$row['www']?></td>
  </tr>
<?php
	}
}
?>
</table>
<?php
if(!isset($_GET["ip"]) && !isset($_GET["username"])){
?>
<br />
<br />
<br />
<br />
<br />
<script type="text/javascript">
function SetCwinHeight(){
	var luFrame=document.getElementById("luFrame"); //iframe id
	if(document.getElementById){
		if(luFrame && !window.opera){
			if (luFrame.contentDocument && luFrame.contentDocument.body.offsetHeight){
				luFrame.height = luFrame.contentDocument.body.offsetHeight;
			}else if(luFrame.Document && luFrame.Document.body.scrollHeight){
				luFrame.height = luFrame.Document.body.scrollHeight;
			}
		}
	}
}
</script>
<iframe src="login_user.php" name="luFrame" id="luFrame" title="luFrame" frameborder=0 width="100%" scrolling=no height=250 onload="Javascript:SetCwinHeight()" ></iframe>
<?php
}
?>
</body>
</html>