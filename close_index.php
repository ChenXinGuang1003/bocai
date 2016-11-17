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

$sql	=	"select * from sys_config limit 0,1";
$query	=	$mysqli->query($sql);
$rows	=	$query->fetch_array();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>网站更新启示</title>
    <style>
        body{
            background: #1B110D;
        }
    </style>
    <link rel="shortcut icon" href="/cl/tpl/starball/ver1/image/logo.ico" type="image/x-icon"/>    <link href="/cl/tpl/commonFile/css/standard.css" rel="stylesheet"/>
    <link href="/TPL/template/style/upup.css" rel="stylesheet"/>
</head>
<body class="zh-cn">
<div id="maintain-box">
    <div id="maintain" class="pngclass">
        <div id="maintain-top"><span class="notice">网站系统公告</span><div class="noticeIcon"></div></div>
        <div id="maintain-logo"><img src="/cl/tpl/starball/ver1/image/upup/160X160.png" class="pngclass"/></div>
        <div id="maintain-content">
            <p class="text-body">
                目前网站进行系統維護中，如有不便之处，敬请见谅！
            </p>
            <p class="text-notice">Access to the site is not available due to scheduled maintenance,<br/>
                we apologize for any inconvenience caused.</p>
            <p class="text-date">--   预计于 <span>北京时间 <?=$rows["end_close_time"]?></span> 完成！   --</p>
            <p class="text-info">
            </p>
            <p class="text-upup">客戶：<?=$rows["service_email"]?>&nbsp;&nbsp;&nbsp;&nbsp;推廣：<?=$rows["generalize_email"]?>&nbsp;&nbsp;&nbsp;&nbsp;投訴：<?=$rows["complain_email"]?></p>
        </div>
    </div>
</div>

</body>
</html>