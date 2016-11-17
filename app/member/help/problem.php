<?php
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/com_chk.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/class/sys_announcement.php");
include_once($C_Patch."/app/member/cache/website.php");
$msg = sys_announcement::getOneAnnouncement();
$display	=	'block';
if(intval($_COOKIE['f'])) $display	= 'none';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        <?=$web_site['web_name']?>
    </title>
    <link href="/css/css_1.css" rel="stylesheet" type="text/css" />
    <link href="/cl/css/bcss.css" rel="stylesheet" type="text/css" />
    <script language="javascript" src="/js/jquery-1.7.1.js"></script>
    <script src="/cl/js/common.js"></script>
    <style>
        .fontcolor {
            float: left;
            background: url(images/yes.jpg) no-repeat left;
            line-height: 25px;
            width: 360px;
            padding: 0 0 0 26px;
            height: 25px;
            color: #000;
        }
        .zhuce_03 {
            float: left;
            background: url(images/no.jpg) no-repeat left;
            line-height: 25px;
            width: 360px;
            padding: 0 0 0 26px;
            height: 25px;
            color: #000;
        }
    </style>
</head>
<script language="javascript">
    function HotNewsHistory(){
        window.open('/app/member/help/noticle.php','newwindow','menubar=no,status=yes,scrollbars=yes,top=150,left=408,toolbar=no,width=575,height=550');
    }
</script>
<script language="javascript">
    if(self==top){
        top.location='/index.php';
    }
    function menu_click(id){
        parent.topFrame.document.getElementById("textGlitter"+id).click();
    }
    function page_click(id){
        window.parent.document.getElementById(id).click();
    }
    $(window.parent.parent.document).find("#mainFrame").height(1700);
</script>
<script language="javascript" src="/js/xhr.js"></script>
<script language="javascript" src="/js/zhuce.js"></script>
<body>
<div class="sidebar">
        <div class="sideba">
            <ul id="sideba_all">
                <li>
                    <img alt="" src="/images/shouquan.gif"></li>
                <li><a class="htm_sidbar_lottory" onclick="click_url('/member/lottery/Cqssc.php?1=1')" href="javascript:void(0);">
                    <img alt="" src="/images/cp.jpg"></a></li>
                <li><a class="htm_sidbar_delar" onclick="click_url('/member/zhenren/mylive.php')" href="javascript:void(0);">
                    <img alt="" src="/images/zr.jpg"></a></li>
                <li><a class="htm_sidbar_SportsBook" onclick="click_url('/app/member/sport.php')" href="javascript:void(0);">
                    <img alt="" src="/images/ty.jpg"></a></li>
                <li><a onclick="click_url('/member/lt/')" href="javascript:void(0);">
                    <img alt="" src="/images/yh.jpg"></a></li>
            </ul>
        </div>
   </div>
    <div id="sub">
                <script language="javascript" src="/images/swfobject_source.js"></script>
                <div class="turn" id="turn">
					 <script type=text/javascript>
                       var focus_width=744;
                       var focus_height=220;
                       var pics='/images/1.jpg|/images/2.jpg|/images/3.jpg|/images/4.jpg'; 
                       var links='|||'; 
                       var s1 = new SWFObject("/images/focusFlash_fp.swf", "mymovie1", focus_width, focus_height, "4", "#ffffff");
                       s1.addParam("wmode", "transparent");
                       s1.addParam("AllowscriptAccess", "sameDomain");
                       s1.addVariable("bigSrc", pics);               
                       s1.addVariable("href", links);
                       s1.addVariable("width", focus_width);
                       s1.addVariable("height", focus_height);
                       s1.write("turn");
                    </script>
                  </div>
        <div id="direction">
            <div id="articles">
                <h3>负责任博彩</h3>
                <div class="redborder">
                    <p>
                        一. 未满博彩年龄<br/>

                        　　<?=$web_site['web_name']?>积极推行负责任博彩，并极力拒绝未成年玩家使用我们的软件进行网上娱乐。同时，我们更透过专业人员及各种有效方法，以防止问题博彩的发生。 一旦发现使用该本网站的客户未满18岁，我们将会没收所有赢取的彩金并保留立即终止客户的投注户口操作的权利。<br/>

                        　　如您的计算机被未满18岁的人士使用， 我们建议您设定计算机数据保密以防止帐户号码/用户名称被盗用。父母或者监护人可以使用一系列的第三方软件来监控或者限制计算机的互联网使用：<br/>
                        1. Net Nanny过滤软件防止儿童浏览不适宜的网站内容: www.netnanny.com<br/>
                        2. CYBERsitter过滤软件允许父母增加自定义过滤网站: www.cybersitter.com<br/>


                        二. 博彩责任<br/>

                        　　本公司希望客户高兴与满意本公司提供的网上博彩服务。我们会为客户在博彩自律方面提供多方面的帮助。如您担心博彩会严重影响您或他人的生活，我们建议：<br/>

                        a) 在登录我们的系统时，不要让未成年人士在荧光幕显示范围内观看或停留。<br/>

                        b) 如果用户需要离开系统的操作范围，请谨记使用密码锁住计算机。<br/>

                        c) 各用户务必将<?=$web_site['web_name']?>帐户及密码放置在安全地方。<br/>

                        d) 请于计算机使用年龄保护软件，以限制未成年用户到访特定网站及使用相关程序。<br/>

                        e) 切勿与未成年人士分享信用卡或帐户等相关信息 。<br/>

                        f) 当用户从他人计算机登入<?=$web_site['web_name']?>软件时，或从远程位置(无线网吧、机场、酒店或其他公共场所)进行登录及娱乐活动时，请留意是否已隔离任何未成年人士。<br/>


                        三. 严重博彩引发的问题<br/>

                        1.     您会否因为博彩而不上班或不上学？<br/>

                        2.     您博彩是否为了逃避烦闷或不愉快的生活？<br/>

                        3.     当您博彩花光钱时，您是否感到失望甚至绝望，并且希望马上能再进行赌博？<br/>

                        4.     您会否博彩到最后一分钱彩罢休？<br/>

                        5.     您有否曾经用谎言掩饰您花在博彩上的时间和金钱？<br/>

                        6.     您博彩是不是因为争执，沮丧或失望？<br/>

                        7.     您有没有因为博彩而感到失落甚至轻生？<br/>

                        8.     您是否对您的家人，朋友或爱好失去了兴趣？<br/>

                        9.     您输了之后，是否马上想把输的钱赢回来？<br/>

                        在这些问题中您回答的‘是’越多，您就越接近具备严重博彩问题。<br/>


                        四. 以下提示也许能帮助您控制博彩问题：<br/>

                        10.   博彩只是一种娱乐，不应被视为赚钱的方法<br/>

                        11.   避免有把输的钱赢回来的想法<br/>

                        12.   只投注您付得起的金额<br/>

                        13.   时刻记着花在博彩上的时间和金钱<br/>


                        五. 责任感和正直诚信<br/>

                        　　<?=$web_site['web_name']?>，致力提高服务水平，并承诺向客户履行最大程度上的责任，包括诚信、透明度、合法性等各方面。如客户遇上任何有关负责任博彩的问题，可24小时向我们的客户服务部联络。我们承诺会于一年365日，不间断地为用户提供技术支持及相关问题解答服务。<br/>


                        条款与规则<br/>

                        14.   每个客户只能拥有一个账号，如发现客户拥有多个账号，本公司有权冻结客户的账号以及取消该账号内所有胜出的投注。本公司有权保留取消任何因素导致账号结余不正确的金额。此外如发现账号持有人与亲属共同使用多个不同账号，本公司有权限制客户每人各保留最多一个账号。<br/>

                        15.   用户有义务保障本身的用户名称和密码的隐私安全，并且不应允许任何第三方以任何形式，通过该用户名称和密码使用本网站之所有游戏，否则，一切责任需由该使用者全部承担。<br/>

                        16.   用户在进行游戏前应核实其所在地区进行在线游戏是否符合当地法律。<br/>

                        17.   <?=$web_site['web_name']?>站时间均为美东时间。<br/>

                        18.   本网站只向符合法定年龄的使用者提供服务，客户在进行投注时必须年满18岁。<br/>

                        19.   本网站有权拒绝或不接受任何使用者以任何不正当方式登入或参与本网站所有游戏之权利。<br/>

                        20.   因人为或系统发生不能预测因素所导致的失误，本公司管理层保留最终决定权。<br/>

                        21.   因发生不可抗拒的灾害或人为入侵破坏行为，所造成的网站故障或数据损坏等情况，以本网站最终数据为最后的处理数据，所以各会员应尽量保留或打印数据，本网站才接受跟进投诉。<br/>

                        22.   为避免任何争议，各用户在参与本网站所有游戏过程中或在结束游戏前，务必检查该会员帐户的资料，如发现任何异常情况，应立即与代理商联系查证，否则该用户将被视为同意并且接受。其帐户之一切数据或历史数据，以本公司数据库中的数据为准，用户不得异议。<br/>

                        23.   本公司保留所有规则的修改权，并且无须事先公布。<br/>

                        24.   不论在任何情况下，本公司都有最终决定权。</p>
                </div>
                <p>&nbsp; </p>
            </div>
        </div>
        <div style="clear:both"></div>
    </div>
    <div style="clear:both"></div>
</div>
</div>
</body>
</html>
