<?
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
include "./app/member/include/config.inc.php";

$C_Patch = $_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch . "/app/member/Cache/website.php");
if ($web_site['close']) {
    header("location:/close_index.php");
    exit();
}
$agent = $_SERVER['HTTP_USER_AGENT'];
if (strpos($agent, "comFront") || strpos($agent, "iPhone") || strpos($agent, "MIDP-2.0") || strpos($agent, "Opera Mini") || strpos($agent, "UCWEB") || strpos($agent, "Android") || strpos($agent, "Windows CE") || strpos($agent, "SymbianOS"))
//header("Location:/wap.php");

    if ($_GET["intr"]) {
        $sql = "select agents_name from agents_list where id='" . intval($_GET["intr"]) . "'";
        $query = $mysqli->query($sql);
        $rs = $query->fetch_array();
        if ($rs && $rs["agents_name"]) {
            $_SESSION["agent_name"] = $rs["agents_name"];
            $_SESSION["agent_id"] = $_GET["intr"];
        } else {
            $_SESSION["agent_name"] = "";
            $_SESSION["agent_id"] = "";
        }
    }/*else{
    $_SESSION["agent_name"] = "";
    $_SESSION["agent_id"] = "";
}*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?= $web_site['web_name'] ?></title>
    <meta name="description" content="<?= $web_site['web_name'] ?>"/>
    <meta name="keywords" content="<?= $web_site['web_name'] ?>"/>
    <link rel="canonical" href="http://<?= $web_url ?>/"/>
    <link href="/cl/tpl/commonFile/css/standard.css" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="ico.ico">
    <script src="/cl/js/jquery-1.7.2.min.js"></script>
    <script src="/cl/js/common.js"></script>
    <script src="/cl/js/tools/upup.js" data-ltl="Y" id="upupjs"></script>
    <script src="/cl/js/tools/float.js"></script>
    <script src="/cl/js/pluging/swfobject.js"></script>
    <script src="/cl/js/pluging/jquery.cookie.js"></script>
    <script src="/cl/tpl/starball/ver1/js/starball.js"></script>
    <script src="/cl/js/tools/ScrollPic.js"></script>
    <script src="/cl/js/pluging/jquery.ifixpng.js"></script>
    <script src="/cl/js/tools/tab.js"></script>

    <script type="text/javascript">
        if (/AppleWebKit.*mobile/i.test(navigator.userAgent) || (/MIDP|SymbianOS|NOKIA|SAMSUNG|LG|NEC|TCL|Alcatel|BIRD|DBTEL|Dopod|PHILIPS|HAIER|LENOVO|MOT-|Nokia|SonyEricsson|SIE-|Amoi|ZTE/.test(navigator.userAgent))) {
            if (window.location.href.indexOf("?mobile") < 0) {
                try {
                    if (/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
                        window.location.href = "http://m.yl00853.com";
                    } else if (/iPad/i.test(navigator.userAgent)) {
                        window.location.href = "http://m.yl00853.com";
                    } else {
                        window.location.href = "http://m.yl00853.com"
                    }
                } catch (e) {
                }
            }
        }
    </script>


    <style type="text/css">
        body {
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            font-size: 12px;
            /*     background: url("/pic/bg01_x.jpg") no-repeat scroll center top; */
            /*background:url("/images/bodybg.png") repeat-x scroll 0 0 #9E7B27;*/
        }

        #mainFrameDiv {
            margin: 0px auto;
            width: 100%;
        }

        #bottomFrameDiv {
            margin: 0px auto;
            width: 100%;
            height: 410px;
            background: #291b0d;
        }

        .TplFloatSet a {
            display: block;
            margin: 0 auto;
            text-align: center;
        }

        .TplFloatSet img {
            vertical-align: bottom;
        }

        .TplFloatSet li {
            list-style: none;
            font-size: 0px;
        }

        #cleft_box {
            margin: 0;
            overflow: hidden;
            padding: 0;
            position: absolute;
            right: 0;
            top: 200px;
            width: 172px;
        }

        .cleft_inner {
            margin: 0;
            overflow: hidden;
            padding: 0;
            width: 197px;
        }

        .inner_btn {
            color: #FFFFFF;
            cursor: pointer;
            float: left;
            font-size: 14px;
            font-weight: bold;
            margin-top: 35px;
            padding-top: 35px;
            text-align: center;
            background: url("/images/kf-right.png") no-repeat scroll 0 0;
            height: 342px;
            width: 50px;
        }

        .inner_info {
            background: none repeat scroll 0 0;
            float: right;
            overflow: hidden;
            width: 146px;
        }

        .inner_tit {
            height: 31px;
            margin: 0 auto;
            overflow: hidden;
            padding-left: 20px;
            width: 128px;
        }

        .inner_list {
            background: url("/images/leftcontentbg.png") repeat-y scroll 0 0;
            text-align: center;
            width: 146px;
        }

        .inner_btm a {
            background: url("/images/leftbt.png") no-repeat scroll left top;
            display: block;
            height: 12px;
            width: 146px;
        }

        .inner_list {
            background: url("/images/leftcontentbg.png") repeat-y scroll 0 0;
            text-align: center;
            width: 128px;
        }

    </style>
    <script language="javascript">
        function BBOnlineService() {
            window.open('http://chat7.livechatvalue.com/chat/chatClient/chatbox.jsp?companyID=730742&configID=52682&jid=9975465860', '', 'menubar=no,status=yes,scrollbars=yes,top=150,left=400,toolbar=no,width=805,height=695');
        }
        //關閉效果
        function FloatClose(t) {
            event.cancelBubble = true;
            $(t).parents('.TplFloatSet').hide();
        }
        var left_top = 150, right_top = 150, float_list = [];
        $(window).load(function () {
            // 廳主自改 - 浮動圖V2 -2013.7.19
            float_list['0'] = $('#TplFloatPic_0');
            float_list['1'] = $('#TplFloatPic_1');
            for (var i in float_list) {
                var self = float_list[i],
                    picfloat = (self.attr('picfloat') == 'right') ? 1 : 0;
                self.show().Float({'floatRight': picfloat, 'topSide': ((picfloat == 1) ? right_top : left_top)});
                var w = 0;
                $.each(self.find('img'), function () {
                    var width = $(this).width();
                    w = (width > w) ? width : w;//取圖片最大寬度
                    $(this).attr({
                        'width': width,
                        'height': $(this).height()
                    });
                });
                self.css('width', w);
                if (picfloat) {
                    right_top = right_top + 10 + (self.height() || 250);
                } else {
                    left_top = left_top + 10 + (self.height() || 250);
                }

                $('a', self).each(function () {
                    $(this).css({
                        'width': $(this).find('img:first').width(),
                        'height': $(this).find('img:first').height()
                    });
                    $(this).hover(function () {
                        $(this).find('img:first').hide();
                        $(this).find('img:last').show();
                    }, function () {
                        $(this).find('img:last').hide();
                        $(this).find('img:first').show();
                    });
                });
            }
        });

        $(document).ready(function () {
            $(window).scroll(function () {
                nowtop = parseInt($(document).scrollTop());
                $('#cleft_box').css('top', nowtop + 80 + 'px')
            })
            $('#cleft_box').hover(function () {
                $(this).css('width', '178px');
            }, function () {
                $(this).css('width', '50px');
            })
            $('#toTop').click(function () {
                $(document).scrollTop(0);
            })
        })

    </script>

</head>
<body>
<iframe id="topFrame" name="topFrame" frameborder="0" scrolling="no" width="100%" src="/cl/top.php"
        allowtransparency="true" height="183"></iframe>


<div id="mainFrameDiv">
    <center>
        <iframe allowtransparency="true" id="mainFrame" name="mainFrame" frameBorder="0" scrolling="no" width="100%"
                src="/cl/main.php" height="847" onload="this.height=mainFrame.document.body.scrollHeight"
                style="background: transparent;"></iframe>
    </center>
</div>

<div id="bottomFrameDiv"
<center>
    <iframe id="bottomFrame" name="bottomFrame" frameBorder="0" scrolling="no" width="1000" src="/cl/bottom.php"
            allowtransparency="true" height="410"></iframe>
</center>
</div>

<style>
    #zc {
        width: 101px;
        height: 30px;
        position: fixed;
        top: 342px;
        right: 23px;
        border-radius: 20px;
    }

    #zc1 {
        width: 101px;
        height: 30px;
        position: fixed;
        top: 381px;
        right: 23px;
        border-radius: 20px;
    }

    #zc2 {
        width: 101px;
        height: 30px;
        position: fixed;

        top: 419px;
        right: 23px;
        border-radius: 20px;
    }

    #zc3 {
        width: 101px;
        height: 30px;
        position: fixed;

        top: 456px;
        right: 23px;
        border-radius: 20px;
    }

</style>

<!--<ul id="TplFloatPic_1" class="TplFloatSet png_fix" style="position:absolute;cursor:pointer;display:none;"
    picfloat="right">


    <li><a onclick="BBOnlineService();return false;">
            <img src="/kefu/r_01.png" align="center" alt="" class="png_fix"/>
            <img src="/kefu/r_01.png" align="center" style="display:none;" alt="" class="png_fix"/>
        </a></li>
    <li><a target="_self" onclick="click_url('/cl/reg.php')" href="javascript:void(0);">
            <img src="/kefu/r_02.png" align="center" alt="" class="png_fix"/>
            <img src="/kefu/r_02.png" align="center" style="display:none;" alt="" class="png_fix"/>
        </a></li>
    <li><a target="_self" onclick="click_url('/ag.html')" href="javascript:void(0);">
            <img src="/kefu/r_03.png" align="center" alt="" class="png_fix"/>
            <img src="/kefu/r_03.png" align="center" style="display:none;" alt="" class="png_fix"/>
        </a></li>
    <li><a target="_self" onclick="click_url('/member/check/speed.php')" href="javascript:void(0);">
            <img src="/kefu/r_04.png" align="center" alt="" class="png_fix"/>
            <img src="/kefu/r_04.png" align="center" style="display:none;" alt="" class="png_fix"/>
        </a></li>
    <li><a target="_self" onclick="click_url('/cl/offer.php')" href="javascript:void(0);">
            <img src="/kefu/r_05.png" align="center" alt="" class="png_fix"/>
            <img src="/kefu/r_05.png" align="center" style="display:none;" alt="" class="png_fix"/>
        </a></li>
    <li><a onclick="qqOnlineService();return false;">
            <img src="/kefu/r_06.png" align="center" alt="" class="png_fix"/>
            <img src="/kefu/r_06.png" align="center" style="display:none;" alt="" class="png_fix"/>
        </a></li>

    <li><a onclick="FloatClose(this);">
            <img src="/kefu/r_07.png" align="center" width=102 alt="" class="png_fix"/>
            <img src="/kefu/r_07.png" align="center" width=102 style="display:none;" alt="" class="png_fix"/>
        </a></li>
    <li class="removes"></li>
</ul>


<ul id="TplFloatPic_0" class="TplFloatSet png_fix" style="position:absolute;cursor:pointer;display:none;"
    picfloat="left">
    <li>
    <li><a onclick="BBOnlineService();return false;">
            <img src="/kefu/l_01.png" align="center" alt="" class="png_fix"/>
            <img src="/kefu/l_01.png" align="center" style="display:none;" alt="" class="png_fix"/>
        </a>
    </li>
    <li>
    <li><a onclick="BBOnlineService();return false;">
            <img src="/kefu/l_02.png" align="center" alt="" class="png_fix"/>
            <img src="/kefu/l_02.png" align="center" style="display:none;" alt="" class="png_fix"/>
        </a>
    </li>
    <li>
    <li><a onclick="BBOnlineService();return false;">
            <img src="/kefu/l_03.png" align="center" alt="" class="png_fix"/>
            <img src="/kefu/l_03.png" align="center" style="display:none;" alt="" class="png_fix"/>
        </a>
    </li>
    <li><a onclick="FloatClose(this);">
            <img src="/kefu/l_04.png" align="center" width=102 alt="" class="png_fix"/>
            <img src="/kefu/l_04.png" align="center" width=102 style="display:none;" alt="" class="png_fix"/>
        </a></li>
    <li class="removes"></li>
</ul>-->


</body>
</html>
<?
$mysqli->close();
?>
