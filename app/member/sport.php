<?
session_start();
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");
include_once "include/address.mem.php";
include_once "include/config.inc.php";
include_once "include/com_chk.php";
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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=7"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>sport</title>
    <script language="javascript">
        var time_s = 121;  		//自动刷新
    </script>
    <script language="javascript" src="js/common.js"></script>
    <style>
        #bg_000 .main_bg{ width:100%; height:287px; background:url(/imgs/ttt.png) repeat-x center -20px; }
        #bg_000 .about_bg{ width:100%; background:url(/imgs/about_bg.png) repeat-x; }
        #bg_000 .about_main_w{ width:1080px; margin:0 auto; position:relative; padding-top:65px; }
        .about_main_w .about_top{ width:1080px; height:240px; background:url(/imgs/about_top.png) no-repeat center top; position:absolute; top:-100px; }
        .about_main_w .about_main{ width:1080px; background:url(/imgs/about_bg02.png) repeat-y center top; }
        .about_main_top{
            background: url(../imgs/about_bg01.png) no-repeat center 0px;
            height: 89px;
            color: #fff;
            padding-left: 125px;
        }
        .pic_list div{ width:990px; height:254px; margin:20px auto 0; overflow:hidden; }
        div.list_1{ background:url(/imgs/1.png) no-repeat center top; margin-top:0; }
        div.list_2{ background:url(/imgs/2.png) no-repeat center top; }
        div.list_3{ background:url(/imgs/3.png) no-repeat center top; }
        .pic_list div a{ display:block; float:left; width:50%; height:100%; }
    </style>
</head>
<script>
    window.parent.parent.document.getElementById("mainFrame").height = 620;
</script>
<body onload="loaded(document.getElementById('league').value,0);">
<div id="bg_000">
    <div class="main_bg"></div>
    <div class="about_bg">
        <div class="about_main_w">
            <div class="about_top">
                <div style="clear: both;width:620px; height:30px; position:absolute; left:265px;top:130px; overflow:hidden;">
                    <div style="padding: 10px auto; height: 25px; float: left; width: 100px; text-align: center; color: yellow; line-height: 25px;vertical-align: middle;">
                        <marquee onclick="HotNewsHistory();" style="cursor:pointer;color:white;" scrollamount="2" width='620px' height='30px'><?=$msg;?></marquee>
                    </div>
                    <div style="float: left; width: 900px; height: 25px; line-height: 25px;vertical-align: middle;color:#fff;"></div>
                </div>
            </div>
            <div class="about_main">
                <div style="width:100%;height:89px;background:url(/imgs/about_bg01.png) no-repeat center top">

                </div>
                <div style="height:8px;"></div>
                <div style="width:1000px;margin:0 auto;">
                    <center>
                        <iframe id="bottomFrame" name="bottomFrame" frameBorder="0" scrolling="yes" width="1000" src="<?= BROWSER_IP ?>/app/member/show/FT_1_1.html"
                                allowtransparency="true" height="410"></iframe>
                    </center>
                </div>
                <div style="clear:both;height:18px;"></div>
                <div style="width:1080px;height:38px;margin:0 auto;background:url(/imgs/about_bg03.png) no-repeat center top;"></div>
            </div>
        </div>
    </div>
</div>
</body>



</html>

