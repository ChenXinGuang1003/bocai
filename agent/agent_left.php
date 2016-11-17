<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");
$quanxian=$_SESSION["purview"];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>left</title>
<link href="images/css1/left_css.css" rel="stylesheet" type="text/css">
</head>
<SCRIPT language=JavaScript>
function showsubmenu(sid)
{
whichEl = eval("submenu" + sid);
if (whichEl.style.display == "none")
{
eval("submenu" + sid + ".style.display=\"\";");
}
else
{
eval("submenu" + sid + ".style.display=\"none\";");
}
}
</SCRIPT>
<body bgcolor="16ACFF">
<table width="98%" border="0" cellpadding="0" cellspacing="0" background="Images/tablemde.jpg">

  <tr>
    <td height="5" background="images/tableline_top.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <tr>
    <td height="8">
	
<TABLE class=leftframetable cellSpacing=1 cellPadding=1 width="97%" align=right 
border=0>
      <TBODY>
        <TR>
          <TD height="25" style="background:url(Images/left_tt.gif) no-repeat"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <TD width="20"></TD>
          <TD class=STYLE1 height=25>系统信息</TD>
            </tr>
          </table></TD>
          </TR>
        <TR>
          <TD 
      height=105><span class="STYLE2"><IMG src="Images/closed.gif">版权所有：<?=$web_site['web_name']?><br>
              <IMG src="Images/closed.gif">设计制作：<?=$web_site['web_name']?><br>
              <IMG src="Images/closed.gif">技术支持：<?=$conf_www?><br>
            <IMG src="Images/closed.gif">系统版本：3.0</span></TD>
        </TR>
      </TBODY>
    </TABLE>	</td>
  </tr>
  <tr>
    <td height="5" background="images/tableline_bottom.jpg"></td>
  </tr>
</table>
</body></html>
