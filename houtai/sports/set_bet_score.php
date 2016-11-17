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

$mid	=	$_POST["mid"][0];
 
$sql	=	"select Match_Date,Match_Time,match_name,Match_Master,Match_Guest, MB_Inball,TG_Inball,MB_Inball_HR,TG_Inball_HR from bet_match where match_id=$mid limit 1";
$query	=	$mysqli->query($sql);
$m		=	$query->fetch_array();
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>设置比分</title>
<link href="../Images/css1/css.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="#EAFFD7">
<form id="form1"  action="ft_list_save.php" method="get" name="form1">
<input type="hidden" name="mid" value="<?=$mid?>" />
<table bgcolor="#E8DCC4" cellspacing="0" cellpadding="4"  border="1" align="center">
  <tr align="center">
    <td colspan="4" style="background:#986032; color: #FFFFFF;font-weight: bold;">输入球队比分</td>
  </tr>
  <tr style="background: #C0AB58; color: #9C4945;font-weight: bold;">
    <td colspan="4" align="center"><input name="hf_match_name" type="hidden" id="hf_match_name" value="<?=$m["match_name"]?>" />
      <input name="hf_Match_Master" type="hidden" id="hf_Match_Master" value="<?=$m["Match_Master"]?>" />
      <input name="hf_Match_Guest" type="hidden" id="hf_Match_Guest" value="<?=$m["Match_Guest"]?>" />
      <input name="hf_Match_Date" type="hidden" id="hf_Match_Date" value="<?=$m["Match_Date"]?>" />      <?=$m["match_name"]?></td>
    </tr>
  <tr style="font-size:14px; text-align:center">
    <td>&nbsp;</td>
    <td>上半场</td>
    <td>全场</td>
	<td>开赛时间</td>
  </tr>
  <tr style="font-size:14px; text-align:center">
    <td width="208" align="right"><?=$m["Match_Master"]?>：</td>
    <td width="203"><input  id="MB_Inball2" type="text" value="<?=$m["MB_Inball_HR"]?>"  name="MB_Inball_HR"/></td>
    <td width="209"><input  id="MB_Inball" type="text" value="<?=$m["MB_Inball"]?>"  name="MB_Inball"/></td>
	 <td width="94"><?=$m["Match_Date"]?></td>
  </tr>
  <tr style="font-size:14px; text-align:center">
    <td align="right"><?=$m["Match_Guest"]?>：</td>
    <td><input id="TG_Inball2" type="text" value="<?=$m["TG_Inball_HR"]?>"  name="TG_Inball_HR"/></td>
    <td><input id="TG_Inball" type="text" value="<?=$m["TG_Inball"]?>"  name="TG_Inball"/></td>
   <td><?=$m["Match_Time"]?></td>
  </tr>
  <tr align="center">
    <td colspan="4"><input type="submit" name="Submit" value="保存" />
      &nbsp;&nbsp;&nbsp;&nbsp;<input type="button" onclick="javascript:window.history.go(-1);" value="取消" /></td></tr>
</table>
</form>
</body>
</html>