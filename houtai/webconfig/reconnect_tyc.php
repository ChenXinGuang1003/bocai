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
include_once($C_Patch."/app/member/class/sys_config.php");
include_once("../class/admin.php");
include_once($C_Patch."/app/member/cache/website.php");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

check_quanxian("修改网站信息");

if($_GET["action"]=="save"){
    $sql = "update tyc_status set code='".$_POST["code"]."' where id is not null";
    $mysqli->query($sql);
    message("保存成功，请稍等片刻再查询连接状态。","index.php");
}

$sql = "select * from tyc_status limit 0,1";
$query = $mysqli->query($sql);
$row = $query->fetch_array();
if($row && $row["status"]!="0"){
    $status = "已连接 (无需重新连接)";
    $disable = "disabled=\"disabled\"";
}else{
    $status = "未连接";
    $disable = "";
}
?>
<HTML>
<HEAD>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
    <TITLE>重新连接太阳城</TITLE>
    <link href="../images/css1/css.css" rel="stylesheet" type="text/css">

    <style type="text/css">
        .STYLE2 {font-size: 12px}
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
        .STYLE4 {
            color: #FF0000;
            font-size: 12px;
        }
    </STYLE>
</HEAD>
<script>

</script>
<body>

<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tbody>
    <tr>
        <td height="24" nowrap background="../images/06.gif"><font >&nbsp;<span class="STYLE2">系统设置：重新连接太阳城</span></font></td>
    </tr>
    <form action="?action=save" method="post" name="form1" id="form1" >
        <tr>
            <td height="24" nowrap bgcolor="#FFFFFF">
                <table width="100%" border="0" cellpadding="0" cellspacing="0" id=editProduct idth="100%">
                    <tr>
                        <td height="24" width="200" align="right"> 太阳城连接状态：</td>
                        <td>
                            <?=$status?>
                        </td>
                    </tr>
                    <tr>
                        <td height="24" width="200" align="right"> 请输入图片内容并点击保存：</td>
                        <td>
                            <input name="code" type="text" class="textfield" id="code" size="6">
                            <img src="/secureImg.jpg"   style="vertical-align:middle">
                        </td>
                    </tr>
                    <tr>
                        <td height="24" align="right">&nbsp;</td>
                        <td valign="bottom">
                            <input name="submitSaveEdit" type="submit" class="button"  id="submitSaveEdit" value="保存" <?=$disable?> style="width: 60;" >
                        </td>
                    </tr>
                    <tr>
                        <td height="20" align="right">&nbsp;</td>
                        <td valign="bottom">&nbsp;</td>
                    </tr>
                </table></td>
        </tr>
    </form>
    </tbody>
</table>
</body>
</html>

<?php
$mysqli->close();
?>