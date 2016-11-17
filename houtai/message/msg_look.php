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

$sql	=	"select k.*,u.user_name from user_msg k,user_list u where k.user_id=u.user_id and msg_id='".intval($_GET["id"])."'";
$query	=	$mysqli->query($sql);
$rows	=	$query->fetch_array();
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>查看短消息</TITLE>
<link href="../images/css1/css.css" rel="stylesheet" type="text/css">
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
</HEAD>

<body>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap background="../images/06.gif"><font >&nbsp;查看短消息</font></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   
  <tr>
    <td height="24" nowrap bgcolor="#FFFFFF">
    
<table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >
	        <tr align="center">
	          <td width="14%" align="right"><strong>标题：</strong></td>
              <td width="86%" align="left"><?=$rows["msg_title"]?></td>
          </tr>
	        <tr align="center">
	          <td align="right"><strong>添加时间：</strong></td>
	          <td align="left"><?=$rows['msg_time']?></td>
        </tr>
	        <tr align="center">
	          <td align="right"><strong>接收人：</strong></td>
	          <td align="left"><a href="../hygl/user_show.php?id=<?=$rows["user_id"]?>"><?=$rows['user_name']?></a></td>
        </tr>
	        <tr align="center">
	          <td align="right"><strong>发送人：</strong></td>
	          <td align="left"><?=$rows['msg_from']?></td>
        </tr>
	        <tr align="center">
	          <td align="right"><strong>内容：</strong></td>
	          <td align="left"><?=str_replace("\r\n","<br>",$rows["msg_info"])?></td>
        </tr>
	        <tr align="center">
	          <td>&nbsp;</td>
	          <td align="left"><a href="#" onClick="javascript:history.go(-2);">返回上一页</a></td>
        </tr>
    </table>
    </td>
  </tr>
</table>
</body>
</html>