<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><title>管理中心</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"></head>
<frameset rows="59,*" frameborder="no" border="0" framespacing="0">
	<frame src="agent_top.php" noresize="noresize" frameborder="0" name="topFrame" marginwidth="0" marginheight="0" scrolling="no">
<frameset rows="*" cols="195,*" id="frame">
	<frame src="agent_left.php" name="leftFrame" noresize="noresize" marginwidth="0" marginheight="0" frameborder="0" scrolling="auto">
	<frame src="agents_user/report.php?id=<?=$_SESSION["agent_id"]?>" name="main" marginwidth="0" marginheight="0" frameborder="0" scrolling="yes">
</frameset>
<frame src="" noresize="noresize" frameborder="0" name="bottomFrame" marginwidth="0" marginheight="0" scrolling="no">
<noframes>
	<body></body>
</noframes>
</frameset>
</html>