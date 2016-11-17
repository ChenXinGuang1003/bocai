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
include_once($C_Patch."/app/member/class/user_group.php");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";
check_quanxian("查看会员信息");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>危险手机号码</title>
</head>
<link href="../images/css1/css.css" rel="stylesheet" type="text/css">
<style type="text/css">

body {
	margin: 0px;
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
<table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >       <tr style="background-color: #EFE" class="t-title"  align="center">
    <td><strong>手机号码</strong></td>
    <td><strong>会员个数</strong></td>
  </tr>
<?php
$sql	=	"SELECT DISTINCT count(id) AS s,tel FROM user_list GROUP BY tel";
$query	=	$mysqli->query($sql);
while($row = $query->fetch_array()){
	if($row['s'] > 1){
?>
  <tr onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#FFFFFF'" style="background-color:#FFFFFF;">
    <td align="center"><a href="list.php?selecttype=tel&likevalue=<?=$row['tel']?>"><?=$row['tel']?></a></td>
    <td align="center"><?=$row['s']?></td>
  </tr>
<?php
	}
}
?>
</table>
</body>
</html>
