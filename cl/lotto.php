<?
session_start();
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

echo "<script>if(self == top) parent.location='".BROWSER_IP."'\n;</script>";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=7" />
    <title>lotto</title>
    <script type="text/javascript" src="/cl/js/commjs/ieupdate.js"></script>
</head>

<frameset cols="*,1024,*" framespacing="0" frameborder="no" border="0">
    <frame src="about:blank"></frame>
    <frameset rows="*" framespacing="0" frameborder="no" border="0">
        <frame src="/member/lt"></frame>
    </frameset>
    <frame src="about:blank" framespacing="0" frameborder="no" border="0"></frame>
</frameset>
</html>

