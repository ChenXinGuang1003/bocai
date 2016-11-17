<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
@include_once($C_Patch."/app/member/include/address.mem.php");
@include_once($C_Patch."/app/member/include/com_chk.php");
@include_once($C_Patch."/app/member/common/function.php");
@include_once($C_Patch."/app/member/class/user.php");
include_once($C_Patch."/app/member/class/sys_announcement.php");
$msg = sys_announcement::getOneAnnouncement();

$uid = $_SESSION['userid'];
$display	=	'block';
if(!intval($_COOKIE['f'])) $display	= 'none';

$sql = "select live_username,live_password from live_user where live_type='AG' and user_id='$uid'";
$query	=	$mysqli->query($sql);
$row    =	$query->fetch_array();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?=$web_site['web_name']?></title>
    <link href="/css/css_1.css" rel="stylesheet" type="text/css" />
    <link href="/cl/css/bcss.css" rel="stylesheet" type="text/css" />
    <style>
        .fontcolor{float: left;
            background: url(images/yes.jpg) no-repeat left;
            line-height: 25px;
            width: 360px;
            padding: 0 0 0 26px;
            height: 25px;
            color: #000;}

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
    if(self==top){
        top.location='/index.php';
    }

</script>

<script language="javascript" src="/js/jquery-1.7.1.js"></script>
<script language="javascript" src="/js/xhr.js"></script>
<script language="javascript" src="/js/zhuce.js"></script>
<script language="javascript" src="/js/top.js"></script>
<script language="javascript" src="/cl/js/common.js"></script>
<link href="/member/zhenren/newindex/standard.css?_=171" rel="stylesheet" type="text/css" />

<link href="/member/zhenren/newindex/haier.css" rel="stylesheet" type="text/css">
<body id="zhuce_body" style="padding-left: 0px;background:transparent;min-width:1000px;">
<div class="bannerimg" style="margin: 0 auto;width:1000px;background:url(/images/banner-live.jpg) no-repeat scroll center top;">
</div>
<div class="first_news">
    <marquee width="800" height="44" style="cursor: pointer;" onclick="HotNewsHistory();" onmouseout="this.start();" onmouseover="this.stop();" id="msgNews" direction="left" scrolldelay="150" scrollamount="3"><?=$msg?></marquee>
</div>
<div id="bg_000" style="background:#490004;">
    <div id="zhuce_top" style="width:1000px;height:480px;">
        <style type="text/css">
            #game_classify
            {
                width:960px;
                height:auto;
                margin:0px auto;
            }
            .icon_title
            {
                float:left;
                width:100%;
                height:28px;
                color:#FFCC99;
                font-size:16px;
                font-weight:bold;
            }
            .icon_line
            {
                float:left;
                width:100%;
                height:24px;
                color:#ffffff;
                font-size:14px;
                font-weight:bold;
            }
            .icon_line a
            {
                color:#ff0000;
                text-decoration:under-line;
            }
        </style>
        <script type="text/javascript">
            function zhuanhuan()
            {
                var myuid = '<?=$uid?>';
                if(!myuid || myuid<=0)
                {
                    alert('请先登录！');
                    return false;
                }
                else
                {
                    f_com.MGetPager('MACenterView','moneyView');
                    return false;
                }
            }
            $(window.parent.parent.document).find("#mainFrame").height(680);
        </script>
        <div style="display:none;">
            <?php
            $userinfo=user::getinfo($uid);
            ?>
            <form name="loginlive" id="loginlive" action="http://aglive.cc066.com/" method="post" target="_blank">
                <input name="username" id="username" value="<?=$row['live_username'] ? $userinfo['user_name'] : ""?>" />
                <input name="password" id="password" value="<?=$row['live_username'] ? $userinfo['user_pass'] : ""?>" />
                <input name="username_ag" id="username_ag" type="hidden" value="<?=$row['live_username']?>" />
                <input name="password_ag" id="password_ag" type="hidden" value="<?=$row['live_password']?>" />
                <form>
                    <script type="text/javascript">
                        function submitlive()
                        {
                            if ($("#username").val()=="" || $("#password").val()=="")
                            {
								alert("您还没有加入真人娱乐,只能观看!\r\n充值后自动加入.");
                                window.open("http://aglive.cc066.com/","_blank");
                                return false;
                            }

                            if (!$("#username_ag").val() ||  !$("#password_ag").val())
                            {
                                alert("您还没有加入真人娱乐,请充值后自动加入.");
                                window.open("http://aglive.cc066.com/","_blank");
                                return false;
                            }else{
                                loginlive.submit();
                                return true;
                            }


                        }
                    </script>
        </div>
        <div id="game_classify">
            <ul>
                <li class="icon_title">温馨提示：</li>
                <li class="icon_line">1、<?=$web_site['web_name']?>正式开通百家乐、龙虎斗、轮盘、骰宝等真人娱乐</li>
                <li class="icon_line">2、进入真人娱乐前请先进行额度转换，点击 <a href="javascript:void(0);" onclick="zhuanhuan()" title="额度转换">额度转换</a> 选择【主账户->真人(普通厅)】</li>
                <li class="icon_line">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;或【主账户->真人(VIP厅)】马上转换额度</li>
                <li class="icon_line">3、额度转换提交后，系统会自动完成转账；用户进入 <a href="javascript:void(0);" onclick="zhuanhuan()" title="额度转换">额度转换</a> 点击【查询转账记录】可查询额度转换的最新结果</li>
                <li class="icon_line">4、如有其它疑问，也可直接联系24小时在线客服进行咨询</li>
            </ul>
        </div>
        <div class="clear"></div>
        <ul class="glist">
	    <li>
		    <img class="g-img" src="/images/1.jpg">
			<div class="glist-r">
			    <p class="glist-r-bp">百家乐</p><a href="/member/zhenren/rule/bjl.php" target="_blank"><img src="/images/glist-m1.gif"></a><a href="javascript:void(0);" onclick="return submitlive();"><img src="/images/glist-m2.gif"></a>
			</div>
		</li>
		<li>
		    <img class="g-img" src="/images/2.jpg">
			<div class="glist-r">
			    <p class="glist-r-bp">轮盘</p><a href="/member/zhenren/rule/lp.php" target="_blank"><img src="/images/glist-m1.gif"></a><a href="javascript:void(0);" onclick="return submitlive();"><img src="/images/glist-m2.gif"></a>
			</div>
		</li>
		<li>
		    <img class="g-img" src="/images/3.jpg">
			<div class="glist-r">
			    <p class="glist-r-bp">骰宝</p><a href="/member/zhenren/rule/sb.php" target="_blank"><img src="/images/glist-m1.gif"></a><a href="javascript:void(0);" onclick="return submitlive();"><img src="/images/glist-m2.gif"></a>
			</div>
		</li>
		<li>
		    <img class="g-img" src="/images/4.jpg">
			<div class="glist-r">
			    <p class="glist-r-bp">龙虎斗</p><a href="/member/zhenren/rule/lhd.php" target="_blank"><img src="/images/glist-m1.gif"></a><a href="javascript:void(0);" onclick="return submitlive();"><img src="/images/glist-m2.gif"></a>
			</div>
		</li>
	</ul>
    </div>
    <script type="text/javascript" language="javascript" src="/js/left_mouse.js"></script>
</body>
</html>