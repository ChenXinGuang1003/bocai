<?
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");
include "../app/member/include/com_chk.php";
include "../app/member/include/address.mem.php";
include "../app/member/cache/website.php";
include_once($C_Patch . "/app/member/class/sys_announcement.php");
$msg = sys_announcement::getOneAnnouncement();


include_once("../newag2/config.php");


include_once("../app/member/class/user.php");

include_once("../newag2/api.class.php");

$userinfo = user::getinfo($uid);
$username = $userinfo['user_name'];

$sql = "select * from user_list where user_id='$userid' limit 1";
$query = $mysqli->query($sql);
$rs = $query->fetch_array();
$bb_username = $rs['bb_username'];
$ag_username = $rs['ag_username'];
$username = $rs['user_name'];


?>


<!DOCTYPE html>
<html class="first zh-cn isLoginN ">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="/cl/tpl/commonFile/css/standard.css" rel="stylesheet"/>
    <link href="/cl/tpl/starball/ver1/css/starball.css" rel="stylesheet"/>
    <script src="/cl/js/jquery-1.7.2.min.js"></script>
    <script src="/cl/js/common.js?v=2.0"></script>
    <script src="/cl/js/tools/upup.js"></script>
    <script src="/cl/js/tools/float.js"></script>
    <script src="/cl/js/pluging/swfobject.js"></script>
    <script src="/cl/js/pluging/jquery.cookie.js"></script>
    <script src="/cl/tpl/starball/ver1/js/starball.js"></script>
    <script src="/cl/js/tools/ScrollPic.js"></script>
    <style>
        input {
            outline: none;
        }
    </style>
    <!--[if IE 6]>
    <style type="text/css">
        html {
            overflow-x: hidden;
        }

        body {
            padding-right: 1em;
        }
    </style>
    <script src="/cl/js/pluging/jquery.ifixpng.js"></script>
    <script>
        $(function () {
            $('img[src$=".png?_=171"],img[src$=".png"],.blk_29 .LeftBotton, .blk_29 .RightBotton').ifixpng();
        });
        //修正ie6 bug
        try {
            document.execCommand("BackgroundImageCache", false, true);
        } catch (err) {
        }
    </script>
    <![endif]-->
    <script>
        <!--
        //Global variable for calculating page generation time
        var PageInitTime = new Date();
        var GameType = '';


        function _getYear(d) {
            var yr = d.getYear();
            if (yr < 1000) yr += 1900;
            return yr;
        }
        function dateAdd(dateObj, days) {
            var tempDate = dateObj.valueOf();
            tempDate = tempDate - days * 24 * 60 * 60 * 1000;
            tempDate = new Date(tempDate);
            return tempDate;
        }
        function tick() {
            function initArray() {
                for (i = 0; i < initArray.arguments.length; i++) this[i] = initArray.arguments[i];
            }

            var isnDays = new initArray("星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六", "星期日");
            var todayy = new Date();
            var today = dateAdd(todayy, 0.5);
            var hrs = today.getHours();
            var _min = today.getMinutes();
            var sec = today.getSeconds();
            var clckh = "" + ((hrs > 12) ? hrs - 12 : hrs);
            var clckm = ((_min < 10) ? "0" : "") + _min;
            clcks = ((sec < 10) ? "0" : "") + sec;
            var clck = (hrs >= 12) ? "下午" : "上午";

            //document.getElementById("t_2_1").innerHTML = _getYear(today)+"/"+(today.getMonth()+1)+"/"+today.getDate()+"&nbsp;"+clckh+":"+clckm+":"+clcks+"&nbsp;"+clck+"&nbsp;"+isnDays[today.getDay()];
            document.getElementById("t_2_1").innerHTML = "美东时间:" + _getYear(today) + "/" + (today.getMonth() + 1) + "/" + today.getDate() + "&nbsp;" + clck + clckh + ":" + clckm + ":" + clcks;

            window.setTimeout("tick()", 100);
        }

        function HotNewsHistory() {
            window.open('/app/member/help/noticle.php', 'newwindow', 'menubar=no,status=yes,scrollbars=yes,top=150,left=408,toolbar=no,width=575,height=550');
        }


        // -->
        function i(ur, w, h) {
            document.write('<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="' + w + '" height="' + h + '"> ');
            document.write('<param name="movie" value="' + ur + '">');
            document.write('<param name="quality" value="high"> ');
            document.write('<param name="wmode" value="transparent"> ');
            document.write('<param name="menu" value="false"> ');
            document.write('<embed src="' + ur + '" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="' + w + '" height="' + h + '" wmode="transparent"></embed> ');
            document.write('</object> ');
        }
    </script>
</head>
<body>
<div id="mainBody_bg">
    <div id="mainBody">


        <div class="block">

            <div id="header">

                <div id="header-logo">
                    <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
                            codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"
                            width="425" height="130">
                        <param name="movie" value="http://180.178.50.154/tpl/amyl/images/logo.swf">
                        <param name="FlashVars" value="prizeResult=3">
                        <param name="quality" value="high">
                        <param name="menu" value="false">
                        <param name="wmode" value="transparent">
                        <param name="allowScriptAccess" value="always">
                        <embed src="logo.swf" autoplay="true" flashvars="prizeResult=3" allowscriptaccess="always"
                               wmode="transparent" menu="false" quality="high" width="425" height="130"
                               type="application/x-shockwave-flash" pluginspage="http://get.adobe.com/cn/flashplayer/"
                               name="FlashZhuan">
                    </object>
                </div>
                <div id="headtop">
                    <!--  <div id="hdselect">
                        <a href="javascript:f_com.setHomepage('<?= BROWSER_IP ?>');">设为首页</a>&nbsp;|&nbsp;<a href="javascript:f_com.bookmarksite('<?= BROWSER_IP ?>','<?= $web_site['web_name'] ?>');">收藏本站</a>&nbsp;|&nbsp;语言
                     </div> -->
                    <div id="hdselect" style="width:497px;"><a onclick="click_url('/member/lottery/Cqssc1.php')"
                                                               style="cursor:pointer;">手机专区</a>&nbsp;|&nbsp;<a
                            href="javascript:click_url('/app/member/help/dlhz4.php');">存款帮助</a>&nbsp;|&nbsp;<a
                            href="javascript:click_url('/app/member/help/dlhz5.php');">取款帮助</a>&nbsp;|&nbsp;<a
                            href="javascript:click_url('/app/member/help/dlhz3.php');">代理合作</a>&nbsp;|&nbsp;<a
                            href="javascript:click_url('/app/member/help/dlhz6.php');">常见问题</a>
                    </div>


                    <?
                    //如果未登入
                    if (!$uid) {
                        ?>
                        <div class="mainBoxs">
                            <div id="loginbox3" style="position:absolute;top:5px;right:8px;">
                                <div id="idxreg"><a onclick="click_url('/cl/reg.php')" href="javascript:void(0);"></a>
                                </div>
                                <!--  <div id="idxkefu"><a onclick="BBOnlineService();" href="javascript://"></a></div> 联系客服-->
                            </div>
                            <form name="LoginForm" id="LoginForm" onsubmit="return false;">
                                <div id="loginbox1">
                                    <div class="login_ip" style="position:absolute;top:10px;left:25px;">
                                        <input style="text-indent:10px;" type="text"
                                               onfocus="if(this.value=='账号'){this.value='';}"
                                               onblur="if(this.value==''){this.value='账号';document.getElementById('mockpass').focus();}else{document.getElementById('mockpass').focus();}"
                                               value="账号" class="login_input01" maxlength="20" tabindex="1"
                                               id="username" name="username">
                                    </div>
                                    <div class="login_ip" style="position:absolute;top:10px;left:205px;">
                                        <input type="text" class="login login_input01" id="mockpass" value="密码"
                                               onfocus="document.getElementById('mockpass').style.display='none'; document.getElementById('passwd').style.display=''; document.getElementById('passwd').focus();">
                                        <input type="password" style="display: none;"
                                               onblur="if(this.value=='') {document.getElementById('passwd').style.display='none'; document.getElementById('mockpass').style.display='';}"
                                               class="login login_input01" id="passwd" name="passwd">
                                    </div>
                                    <div class="login_ip" style="position:absolute;top:43px;left:20px;">
                                        <input type="text" value="验证码"
                                               onblur="if(this.value=='') {this.value=this.defaultValue}"
                                               class="rmNum  login_input02" id="rmNum" maxlength="4" name="rmNum"
                                               style="width:95px;">
                                        <img width="50" height="23" border="0" align="absmiddle" src="/yzm.php"
                                             onclick="getKey();" id="vPic">
                                    </div>
                                </div>
                                <div id="loginbox2">
                                    <input style="position:absolute;top:40px;left:177px;opacity:0;" type="submit"
                                           id="ibtnLogin" name="formsub" onclick="aLeftForm1Sub();">
                                    <a style="position:absolute;top:45px;left:258px;" class="forpwd"
                                       href="javascript:alert('请联系客服咨询！');"></a>
                                </div>
                            </form>
                        </div>

                        <?
                    } else {
                        ?>
                        <div style="    width: 480px;
    height: 80px;
    float: right;
    text-align: right;
    margin-right: -60px;
    background: url(login_h.png);
    margin-top: 10px;">
                            <div id="top_login">
                                <ul>
                                    <li>帐号:<font size="2"><b><?php echo $username; ?></b></font></li>

                                    <li>账户余额:<font size="2" id="user_money">0</font></li>


                                </ul>
                            </div>
                            <div id="mp3"></div>
                            <div id="SU-Menual-first">
                                <ul>
                                    <li><a id="su-macenter"
                                           href="javascript: f_com.MGetPager('MACenterView','memberData');"
                                           title="会员中心">会员中心</a> &nbsp;|&nbsp; </li>
                                    <li><a id="su-deposite"
                                           href="javascript: f_com.MGetPager('MACenterView','bankSavings');"
                                           title="线上存款">线上存款</a> &nbsp;|&nbsp; </li>
                                    <li><a id="su-withdraw"
                                           href="javascript: f_com.MGetPager('MACenterView','bankTake');" title="线上取款">线上取款</a>
                                        &nbsp;|&nbsp; </li>
                                    <li><a id="su-switch"
                                           href="javascript: f_com.MGetPager('MACenterView','moneyView');" title="额度转换">额度转换</a>
                                        &nbsp;|&nbsp; </li>
                                    <li><a id="su-account"
                                           href="javascript: f_com.MGetPager('MACenterView','ballRecord');"
                                           title="往来记录">往来记录</a> &nbsp;|&nbsp; </li>
                                    <li><a id="su-msg" href="javascript: f_com.MGetPager('MACenterView','msg');"
                                           title="未读讯息"><span id="msg_num_total">未读讯息(<span id="msg_num"></span>)</span>
                                            &nbsp;</a> |&nbsp; </li>
                                    <li><a id="su-logout" href="javascript: f_com.logoff('/app/member/logout.php');"
                                           title="登出">退出</a></li>
                                </ul>
                            </div>
                        </div>
                    <? } ?>
                </div>
            </div>

            <div class="clear"></div>
            <div class="blank4"></div>
            <div id="menu">
                <div style="position: absolute;z-index: 2;left: 660px;top: -7px;"><img src="/images/re.gif"></div>
                <ul>
                    <li class="normal"><a class="pngfix" onclick="click_url('/cl/main.php')" href="javascript:void(0);">首页</a>
                    </li>
                    <li class="normal"><a class="pngfix " target="_self" onclick="click_url('/app/member/sport.php')"
                                          href="javascript:void(0);">体育赛事</a></li>

                    <li class="normal"><a class="pngfix " onclick="click_url('/member/zhenren/mylive.php')"
                                          href="javascript:void(0);">真人视讯</a></li>

                    <li class="normal"><a class="pngfix " onclick="javascript: window.open('/live/ag.php?gameType=500')"
                                          href="javascript:void(0);">AG电子游艺</a></li>
                    <li class="normal"><a class="pngfix " onclick="javascript: window.open('/live/ag.php?gameType=6')"
                                          href="javascript:void(0);">AG捕鱼</a></li>
                    <li class="normal"><a class="pngfix " onclick="javascript: window.open('/live/bbin.php?site=game')"
                                          href="javascript:void(0);">BB电子游艺</a></li>


                    <li class="normal LS-ltlottery"><a class="pngfix "
                                                       onclick="click_url('/member/lottery/Cqssc.php?1=1')"
                                                       href="javascript:void(0);">彩票游戏</a></li>
                    <script>
                        $(".LS-ltlottery").click(function () {
                            var user = "<?php echo $_SESSION['um'];?>";
                            //    alert(user);
                            if (user != '') {
                                $.post("../../ycApi/Login_check.php", {"user": user}, function (data) {
                                    //   console.log(data);
                                    //  alert(data);
                                }, 'text');
                            }


                        })

                    </script>
                    <li class="normal"><a class="pngfix " onclick="click_url('/member/lt/?rtype=SPbside',1)"
                                          href="javascript:void(0);">六合彩</a></li>
                    <li class="normal"><a target="_self" onclick="click_url('/cl/offer.php')" href="javascript:void(0);"
                                          id="textGlitter">优惠活动</a></li>
                    <li class="normal"><!-- <a class="pngfix" target="_blank" href="/member/mobile/mobile.html"> --><a
                            class="pngfix " onclick="click_url('/member/lottery/Cqssc1.php')"
                            href="javascript:void(0);">手机投注</a></li>
                    <li class="normal"><a href="JavaScript:;"
                                          onclick="javascript: window.open('http://api.pop800.com/chat/242093','','menubar=no,status=yes,scrollbars=yes,top=150,left=400,toolbar=no,width=705,height=520')"
                                          target="_self">在线客服</a></li>
                    <!-- <li class="normal"><a href="/member/check/speed.php" target="_blank">备用网址</a></li> -->
                    <!-- <li class="normal"><a <? if (!$uid) { ?> href="javascript:alert('请先会员登录后在充值!');" <?php } else { ?> href="javascript: f_com.MGetPager('MACenterView','bankSavings');" <?php } ?>>在线存款<span class="kf_rr"></span></a></li> -->
                </ul>
            </div>
            <!--<div class="blank1"></div>-->
            <!--  <div style="clear: both;width:1000px; height:30px;margin-top:5px; overflow:hidden;"><div style="padding: 10px auto; height: 25px; float: left; width: 100px; text-align: center; color: yellow; line-height: 25px;vertical-align: middle;">最新消息:</div><div style="float: left; width: 900px; height: 25px; line-height: 25px;vertical-align: middle;color:#fff;"><marquee onclick="HotNewsHistory();" style="cursor:pointer;" scrollamount="2"><?= $msg; ?></marquee></div></div> -->
        </div>

    </div>
</div>
</body>
</html>
<script src="/cl/js/tools/tab.js"></script>
<script src="/pt/assets/js/lib/sound.js"></script>
<script>
    (function () {
        $('#rmNum').on('focus', function () {
            $('#vPic').attr('src', '/yzm.php?' + Math.random());
            if (this.value == this.defaultValue) {
                this.value = '';
            }
        });

    })();

    //最新消息
    $.ajax({
        type: 'POST',
        url: '?module=MGetData&method=GetHotNews&_r=' + Math.random(),
        cache: false,
        success: function (data) {
            $('#msgNews').html(data.replace(/<\s*br\/*>/gi, "&nbsp;&nbsp;"));
        }
    });
    // 密碼驗證
    $('input[name=passwd]').LoginPW({
        // 'Upper': '提醒：密码须为小写，大写锁定启用中',
        'Short': '密码长度不能少于6个字元',
        'Long': '密码长度不能多于20个字元'
        //'False': '密码须符合0~9及a~z字元'
    });
    function inputCheck() {
        if (document.LoginForm.username.value == "") {
            alert('请输入帐号!!');
            document.LoginForm.username.focus();
            return false;
        } else if (document.LoginForm.passwd.value == "") {
            alert('请输入密码!!');
            document.LoginForm.passwd.focus();
            return false;
        } else if (document.LoginForm.passwd.value.length > 0 && document.LoginForm.passwd.value.length < 6) {
            alert('密码长度不能少于6个字元');
            document.LoginForm.passwd.focus();
            return false;
        } else if (document.LoginForm.rmNum.value == "") {
            alert('请输入验证码!!');
            document.LoginForm.rmNum.focus();
            return false;
        }
        return true;
    }
    function Go_forget_pwd() {
        window.open("/app/member/forget_pwd.php?uid=guest", "Go_forget_pwd", "width=350,height=250,status=no");
    }

    function Language(langx) {
        parent.location = '".BROWSER_IP."';
    }

    function getKey() {
        $("#vPic").attr("src", '/yzm.php?' + Math.random());
        $("#vPic").css("display", "inline");
        $("#crPic").css("display", "inline");
        $("input[name='rmNum']").val("");
    }

    //下載版JS
    function downloadvwin() {
        window.open('/cl/?module=MRule&method=InstallationInstruction&type=download', 'downloadnew', 'width=1024,height=640,status=no,scrollbars=yes');
    }

    //文字閃爍
    new toggleColor('#textGlitter', ['#DD1B20', '#FDEB65'], 500);

    //按鈕特效
    $('.hover_fade > a, .hover_fade > span, #event a, #joinUs a, #welcome div').hover(
        function () {
            $(this).stop().animate({'opacity': 0}, 650);
        }, function () {
            $(this).stop().animate({'opacity': 1}, 650);
        }
    );

    $("li.LS-live, li.LS-game").subTabs();

    //表單效果
    $("#LoginForm label").InputLabels();


    //設為首頁
    f_com.setHomepage = function (url) {
        if (document.all) {
            document.body.style.behavior = 'url(#default#homepage)';
            document.body.setHomePage(url);
        } else {
            alert("您的浏览器未支援此功能!");
        }
    };

    // 加入最愛
    f_com.bookmarksite = function (url, title) {
        if (window.sidebar || window.opera) {
            // for firfox
            window.sidebar.addPanel(title, url, "");
        } else if (document.all) {
            // for IE
            window.external.AddFavorite(url, title);
        } else {
            alert("您的浏览器未支援此功能!");
        }
    };
    //-->
</script>

<?php if ($uid) { ?>
    <script language="javascript">
        function top_money() {
            $.getJSON("/app/member/getdata.php?callback=?", function (json) {
                    if (json.close == 1) {
                        parent.location.href = '/close.php';
                    }
                    $("#tz_money").html(json.tz_money);
                    $("#user_money").html(json.user_money);
                    $("#live_money").html(json.live_money);

                    $("#generalA").html(json.ag_money);
                    $("#generalB").html(json.bb_money);


                    if (json.unread_count && json.unread_count > 0) {
                        $("#msg_num").html(json.unread_count);
                        shake($("#msg_num_total"), "red", 5);
                        $("#mp3").html("<embed src='/images/new_info.mp3' width='0' height='0'></embed>");
                    } else {
                        $("#msg_num").html(0);
                    }

                }
            );
            setTimeout("top_money()", 5000);
        }

        function refresh_zr_money() {
            $.getJSON("/newbbin2/cha2.php?u=<?php echo $bb_username; ?>", function (json) {

            });
        }
        refresh_zr_money();
        top_money();
        function shake(ele, cls, times) {
            var i = 0, t = false, o = ele.attr("class") + " ", c = "", times = times || 2;
            if (t) return;
            t = setInterval(function () {
                i++;
                c = i % 2 ? o + cls : o;
                ele.attr("class", c);
                if (i == 2 * times) {
                    clearInterval(t);
                    ele.removeClass(cls);
                }
            }, 200);
        }
        ;
    </script>
<? } ?>


<!-- END ProvideSupport.com Custom Images Chat Button Code --><!--[if IE 6]>
<div id="ie6-infoBar">
    <span></span>
    <a id="ie6-boxclose" href="###">關閉</a>
    系统侦测到您使用旧版的浏览器,为维持最佳的浏览品质建议立即前往<a href="javascript:downloadvwin();">下载区</a>升级你的浏览器,建议使用较新版本的IE8,IE9,IE10,BB浏览器
    <iframe class="ie6-zindexHack"></iframe>
</div>
<script type="text/javascript">
    window.downloadvwin || (window.downloadvwin = function () {
        window.open('http://windows.microsoft.com/zh-CN/internet-explorer/products/ie/home', 'download', 'top=0,left=0,width=1000,height=600,location=yes,menubar=no,resizable=yes,scrollbars=yes,status=no,toolbar=no');
    })
    $(function () {
        var ie6InfoDiv = $("#ie6-infoBar");
        ie6InfoDiv.width($(window).width());
        $("#ie6-boxclose").click(function (e) {
            e.preventDefault();
            ie6InfoDiv.slideUp();
        });
        setTimeout(function () {
            ie6InfoDiv.slideToggle(800);
        }, 20000);

        ie6InfoDiv.slideToggle(800);
    });
</script>
<style type="text/css">
    * html {
        text-overflow: ellipsis;
    }

    #ie6-boxclose {
        float: right;
        padding-right: 20px;
        height: 25px;
    }

    #ie6-infoBar {
        display: none;
        font-size: 12px;
        width: 100%;
        position: absolute;
        top: expression(eval(document.documentElement.scrollTop));
        bottom: auto;
        left: 0px;
        color: #000;
        z-index: 9999;
        font-weight: 600;
        text-align: left;
        overflow: hidden;
        background: #DDD;
        height: 30px;
        line-height: 30px;
    }

    .ie6-zindexHack {
        position: absolute;
        width: 100%;
        height: 100%;
        z-index: -1; /*讓iframe在div下方*/
        filter: alpha(opacity=0); /*一定要使背景透明*/
    }

    #ie6-infoBar span {
        background: url(/cl/tpl/commonFile/images/warning.png) 0 0 no-repeat;
        width: 15px;
        height: 15px;
        margin: 6px 5px 0 5px;
        float: left;
    }

    #ie6-infoBar a {
        color: #F57900;
    }

    #ie6-infoBar a:hover {
        color: #FF9A37;
    }
</style>
<![endif]-->