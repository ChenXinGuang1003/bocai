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

check_quanxian("手工录入体育比分");

if($_GET["action"]=="add"){
	$sql	=	"insert into t_guanjun_team(team_name,point,xid) values('".$_POST["team_name"]."','".floatval($_POST["point"])."','".intval($_GET["id"])."')";
	$mysqli->query($sql);
}

$sql	=	"select * from t_guanjun where x_id=".intval($_GET["id"])." limit 1";
$query	=	$mysqli->query($sql);
$rows	=	$query->fetch_array();
if(!$rows){
	message("系统未找到您查找的赛事。");
}
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>冠军项目新增</TITLE>
<link href="../Images/css1/css.css" rel="stylesheet" type="text/css">
<style type="text/css">
.STYLE1 {font-size: 10px}
.STYLE2 {font-size: 12px}
body {	margin: 0px;}
td{font:13px/120% "宋体";padding:3px;}
a{

	color:#F37605;
	text-decoration: none;

}
.t-title{background:url(/super/images/06.gif);height:24px;}
.t-tilte td{font-weight:800;}
.inputguanjun { width:300px;}
</STYLE>
</HEAD>

<body>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap background="../images/06.gif"><font >&nbsp;<span class="STYLE2">冠军管理：查看冠军项目</span></font></td>
  </tr>
  <tr>
    <td height="24" align="center" nowrap bgcolor="#FFFFFF"><table width="90%" align="center" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;">
  <tr>
    <td bgcolor="#F0FFFF">联赛名称</td>
    <td colspan="3"><?=$rows["x_title"]?></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">项目名称</td>
    <td colspan="3"><?=$rows["match_name"]?></td>
  </tr>
  <tr>
    <td width="373" bgcolor="#F0FFFF">结束日期</td>
    <td colspan="3"><?=$rows["match_date"]?></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">结束时间</td>
    <td colspan="3"><?=$rows["match_time"]?></td>
  </tr>
    <tr>
    <td bgcolor="#F0FFFF">封盘时间</td>
    <td colspan="3"><?=$rows["match_coverdate"]?></td>
  </tr>
    <tr>
    <td bgcolor="#F0FFFF">比赛结果</td>
    <td ><? if($rows["x_result"]=="") echo "暂无结果";else echo $rows["x_result"]?></td>
    <td width="261" align="center"><a href="team_del.php?xid=<?=$_GET["id"]?>&type=1" onClick="return confirm('您确定要清除结果')">清除结果</a></td>
    </tr>
   <tr>
    <td colspan="4" bgcolor="#F0FFFF" align="right">&nbsp; 结算&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
<?php
$sql	=	"select team_name,point,tid from t_guanjun_team where xid=".$_GET["id"];
$query	=	$mysqli->query($sql);
while($rows = $query->fetch_array()){
?>
	<tr align="center" onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#ffffff'" style="background-color:#FFFFFF;">
    <td align="left" bgcolor="#F0FFFF"><?=$rows["team_name"]?></td>
    <td width="367" align="center"><?=$rows["point"]?></td>
    <td colspan="2" align="center"><a onClick="return confirm('确定把该项设为结果');" href="set_resultcmd.php?xid=<?=$_GET["id"]?>&amp;tid=<?=$rows["tid"]?>">设为结果</a></td>
	</tr>
<?php
}
?>
</table></td>
  </tr>
</table>
</body>
</html>