<?
session_start();
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");
$C_Patch = $_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch . "/app/member/include/address.mem.php");
include_once($C_Patch . "/app/member/include/com_chk.php");
include_once($C_Patch . "/app/member/common/function.php");
include_once($C_Patch . "/app/member/class/sys_announcement.php");
$msg = sys_announcement::getOneAnnouncement();
echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'\n;</script>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>regster</title>
<style>
    body{
        margin: 0px;
        height: 100%;
    }
    .about_bg{ width:100%; background:url(/imgs/about_bg.png) repeat-x; }
    .about_main_w{ width:1080px; margin:0 auto; position:relative; padding-top:65px; }
    .about_top{ width:1250px; height:240px; background:url(/imgs/about_top.png) no-repeat center top; position:absolute; top:270px;left: -100px }
</style>
</head>
<body>
<div class="main_bg"></div>
<div class="about_main_w">
    <div class="about_top">
        <div style="clear: both;width:620px; height:30px; position:absolute; left:350px;top:130px; overflow:hidden;">
            <div style="padding: 10px auto; height: 25px; float: left; width: 100px; text-align: center; color: yellow; line-height: 25px;vertical-align: middle;">
                <marquee onclick="HotNewsHistory();" style="cursor:pointer;color:white;" scrollamount="2" width='620px' height='30px'><?=$msg;?></marquee>
            </div>
            <div style="float: left; width: 900px; height: 25px; line-height: 25px;vertical-align: middle;color:#fff;"></div>
        </div>
    </div>
</div>

<iframe allowtransparency="true" name="mbody" width="100%" height="100%" scrolling="no" frameborder="0" src="/app/member/Regster" onload="this.height=mbody.document.body.scrollHeight+100">

</iframe>

</body>
</html>
