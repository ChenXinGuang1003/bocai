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
@include_once($C_Patch."/live/agid.php");
$uid = $_SESSION['userid'];


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?=$web_site['web_name']?></title>
    <link href="/css/css_1.css" rel="stylesheet" type="text/css" />
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
<link href="/member/zhenren/newindex/haier2.css" rel="stylesheet" type="text/css">
<link href="/member/zhenren/newindex/haier.css" rel="stylesheet" type="text/css">
<body id="zhuce_body" style="padding: 0x;margin:0;min-width:1000px;background:#004531;">
<div id="bg_000">
    <div id="zhuce_top">
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
            $(window.parent.parent.document).find("#mainFrame").height(500);
        </script>
        <div style="display:none;">
            <script type="text/javascript">
			function gamelook()
				{
					alert("由于人数众多,观看帐号容易掉线,请及时注册.");
					loginlive0.submit();
                    return true;
				}
			function gametry()
				{
					alert("您获得2000游戏试玩点数.");
					loginlive1.submit();
                    return true;
				}
			function gamereal()
				{
					loginlive2.submit();
                    return true;
				}
        </script>
        <form name="loginlive0" id="loginlive0" action="/live/Default.php" method="post" target="_blank"><input name="type" id="type" type="hidden" value="0" /></form>
		<form name="loginlive1" id="loginlive1" action="/live/Default.php" method="post" target="_blank"><input name="type" id="type" type="hidden" value="1" /></form>
		<form name="loginlive2" id="loginlive2" action="/live/Default.php" method="post" target="_blank"><input name="type" id="type" type="hidden" value="2" /></form>
        </div>
        <div id="game_classify">
            <ul>
                <li class="icon_title">温馨提示：</li>
                <li class="icon_line">1、<?=$web_site['web_name']?>正式开通百家乐、龙虎斗、轮盘、骰宝等真人娱乐</li>
                <li class="icon_line">2、进入真人娱乐前请先进行额度转换，点击 <a href="javascript:void(0);" onclick="zhuanhuan()" title="额度转换">额度转换</a> 选择【主账户->AG娱乐场】</li>
                <li class="icon_line">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;或【主账户->AG娱乐场】马上转换额度</li>
                <li class="icon_line">3、额度转换提交后，系统会自动完成转账；用户进入 <a href="javascript:void(0);" onclick="zhuanhuan()" title="额度转换">额度转换</a> 点击【查询转账记录】可查询额度转换的最新结果</li>
                <li class="icon_line">4、如有其它疑问，也可直接联系24小时在线客服进行咨询</li>
            </ul>
        </div>
        <div class="clear"></div>
		<?
		//!------------------------------------------------------------
		if($bbinid!="")
		{
		?>
        <div class="ele-live-wrap clearfix">
        <style>
        /* livehall */
        .ele-live-hall,
        .ele-live-bb,
        .ele-live-ag {
            width: 852px;
            height: 439px;
        }
        .ele-live-hall {
            margin: 20px auto 0;
            position: relative;
            background: url(/cl/tpl/template/images/element/live_hall/zh-cn/live_login_bg.png) no-repeat 50% 0;
            background-size: 852px 439px;
        }
        .ele-live-bb {
            background: url(/cl/tpl/template/images/element/live_hall/zh-cn/live_login_bb.png) no-repeat 50% 0;
            background-size: 852px 439px;
        }
        .ele-live-ag {
            background: url(/cl/tpl/template/images/element/live_hall/zh-cn/live_login_ag.png) no-repeat 50% 0;
            background-size: 852px 439px;
        }
        .ele-live-bb,
        .ele-live-ag {
            position: absolute;
            display: none;
        }
        .ele-livehall-bblive, .ele-livehall-aglive {
            float: left;
            position: relative;
            z-index: 2;
            width: 426px;
        height: 439px;
        }
        /* ag-live login */
        #ele-aglogin-overlay {
            position: fixed;
            z-index: 2000;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('/cl/tpl/template/images/element/live_hall/modal_bg.png') repeat;
        }
		#ele-aglogin-overlay_start {
            position: fixed;
            z-index: 2000;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('/cl/tpl/template/images/element/live_hall/modal_bg.png') repeat;
        }
        #ele-aglogin-content {
            background-color: #FFF;
            position: fixed;
            z-index: 3;
            top: 50%;
            left: 50%;
            margin: -160px 0 0 -310px;
            padding: 10px;
        }

		#ele-aglogin-content_try {
            background-color: #FFF;
            position: fixed;
            z-index: 3;
            top: 50%;
            left: 50%;
            margin: -160px 0 0 -310px;
            padding: 10px;
			cursor: pointer;
        }

		#ele-aglogin-content_start {
            background-color: #FFF;
            position: fixed;
            z-index: 3;
            top: 50%;
            left: 50%;
            margin: -160px 0 0 -10px;
            padding: 10px;
			cursor: pointer;
        }

		#ele-aglogin-content_close {
            position: fixed;
            z-index: 3;
            top: 50%;
            left: 50%;
            margin: -160px 0 0 -10px;
            padding: 0px;

        }

        #ele-aglogin-close {
            background: url('/cl/tpl/template/images/element/live_hall/modal_close.png') #666 50% 50% no-repeat;
            position: absolute;
            top: 0;
            right: -60px;
            width: 60px;
            height: 60px;
            cursor: pointer;
        }
        #ele-aglogin-close:hover {
            background-color: #606060;
        }

		#ele-aglogin-close_start {
            background: url('/cl/tpl/template/images/element/live_hall/modal_close.png') #666 50% 50% no-repeat;
            position: absolute;
            top: 0;
            right: -380px;
            width: 60px;
            height: 60px;
            cursor: pointer;
        }
        #ele-aglogin-close_start:hover {
            background-color: #606060;
        }
    </style>

    <div class="ele-live-hall" id="ele-livehall-wrap">
        <div class="ele-live-bb"></div>
        <div class="ele-live-ag"></div>
        <a id="ele-game-open" class="ele-livehall-bblive" href="###"></a>
		<?
	if($uid==""){	
	?>
        <a href="###" onclick="agLogin()" class="ele-livehall-aglive"></a>
		<?
		}else{	
	?>
		<a href="###" onclick="agLogin2()" class="ele-livehall-aglive"></a>
	<?
	}
	?>
    </div>
    <div id="ele-aglogin-overlay" style="display:none">
        <div id="ele-aglogin-content">
            <div id="ele-aglogin-close"></div>
            <img src="/cl/tpl/template/images/element/live_hall/zh-cn/login-ag.png">
        </div>
    </div>

	<div id="ele-aglogin-overlay_start" style="display:none">
        <div id="ele-aglogin-content_try">
            <img src="/cl/tpl/template/images/element/live_hall/zh-cn/ag_try.png">
        </div>
		<div id="ele-aglogin-content_start">
            <img src="/cl/tpl/template/images/element/live_hall/zh-cn/ag_start.png">
        </div>
		<div id="ele-aglogin-content_close">
			<div id="ele-aglogin-close_start"></div>
        </div>
    </div>

    <script>
        $(".ele-livehall-bblive")
            .mouseenter(function(){
                $(".ele-live-bb").show();
            })
            .mouseleave(function(){
                $(".ele-live-bb").hide();
            });

        $(".ele-livehall-aglive")
            .mouseenter(function(){
                $(".ele-live-ag").show();
            })
            .mouseleave(function(){
                $(".ele-live-ag").hide();
            });

        function agLogin(){
            $("#ele-aglogin-overlay").show();
        }
        $("#ele-aglogin-overlay").click(function(){
            $(this).hide();
        });
		function agLogin2(){
            $("#ele-aglogin-overlay_start").show();
        }
        $("#ele-aglogin-close_start").click(function(){
            $("#ele-aglogin-overlay_start").hide();
        })
		$("#ele-aglogin-content_try").click(function(){
            f_com.bm('/live/Default.php?type=1','aglive',{resizable:'yes'})
        })
		$("#ele-aglogin-content_start").click(function(){
            f_com.bm('/live/Default.php?type=2','aglive',{resizable:'yes'})
        })
    </script>
<script>
    $('#ele-game-open').on('click', function(){
        f_com.bm('/live/Default.php?type=3', 'LiveGame', {resizable:'yes'})
    })
</script>
		<?
		//!------------------------------------------------------------
		}else{
			?>
        <div id="area-1" class="game-list clearfix">
            <div class="game-item pngfix">
                <a href="javascript:void(0);" onclick="return submitlive();" class="game-img">
                    <img src="/member/zhenren/newindex/Game_3001_1.png" alt="百家乐" width="130" height="90" title="百家乐" class="pngfix" />
                </a>
                <div class="clear"></div>
                <h4 class="game-name" title="百家乐">百家乐</h4>
                <div class="game-link">
				<a href="javascript:void(0);" onclick="return gamelook();" class="rule pngfix">观看大厅</a>
                    <a href="/member/zhenren/rule/bjl.php" target="_blank" class="rule pngfix">规则说明</a>
                </div>
				<!-------手工操作补丁3(开始)-----------添加试玩连接-------------------------------------------------------->
				<div class="game-link2">
					<?
					if($uid!="")
					{
					?>
					<a href="javascript:void(0);" onclick="return gametry();" class="rule pngfix">游戏试玩</a>
					<a href="javascript:void(0);" onclick="return gamereal();" class="rule pngfix">开始投注</a>
					<?
					}
					?>
                </div>
				<!-------手工操作补丁3(结束)-----------添加试玩连接-------------------------------------------------------->
            </div>
            <div class="game-item pngfix">
                <a href="javascript:void(0);" onclick="return submitlive();" class="game-img">
                    <img src="/member/zhenren/newindex/Game_3007_1.png" alt="轮盘" width="130" height="90" title="轮盘" class="pngfix" />
                </a>
                <div class="clear"></div>
                <h4 class="game-name" title="轮盘">轮盘</h4>
                 <div class="game-link">
				<a href="javascript:void(0);" onclick="return gamelook();" class="rule pngfix">观看大厅</a>
                    <a href="/member/zhenren/rule/lp.php" target="_blank" class="rule pngfix">规则说明</a>
                </div>
				<!-------手工操作补丁4(开始)-----------添加试玩连接-------------------------------------------------------->
				<div class="game-link2">
					<?
					if($uid!="")
					{
					?>
					<a href="javascript:void(0);" onclick="return gametry();" class="rule pngfix">游戏试玩</a>
					<a href="javascript:void(0);" onclick="return gamereal();" class="rule pngfix">开始投注</a>
					<?
					}
					?>
                </div>
				<!-------手工操作补丁4(结束)-----------添加试玩连接-------------------------------------------------------->
            </div>
            <div class="game-item pngfix">
                <a href="javascript:void(0);" onclick="return submitlive();" class="game-img">
                    <img src="/member/zhenren/newindex/Game_3008_1.png" alt="骰宝" width="130" height="90" title="骰宝" class="pngfix" />
                </a>
                <div class="clear"></div>
                <h4 class="game-name" title="骰宝">骰宝</h4>
                <div class="game-link">
				<a href="javascript:void(0);" onclick="return gamelook();" class="rule pngfix">观看大厅</a>
                    <a href="/member/zhenren/rule/sb.php" target="_blank" class="rule pngfix">规则说明</a>
                </div>
				<!-------手工操作补丁5(开始)-----------添加试玩连接-------------------------------------------------------->
				<div class="game-link2">
					<?
					if($uid!="")
					{
					?>
					<a href="javascript:void(0);" onclick="return gametry();" class="rule pngfix">游戏试玩</a>
					<a href="javascript:void(0);" onclick="return gamereal();" class="rule pngfix">开始投注</a>
					<?
					}
					?>
                </div>
				<!-------手工操作补丁5(结束)-----------添加试玩连接-------------------------------------------------------->
            </div>
            <div class="game-item pngfix">
                <a href="javascript:void(0);" onclick="return submitlive();" class="game-img">
                    <img src="/member/zhenren/newindex/Game_3003_1.png" alt="龙虎斗" width="130" height="90" title="龙虎斗" class="pngfix" />
                </a>
                <div class="clear"></div>
                <h4 class="game-name" title="龙虎斗">龙虎斗</h4>
                <div class="game-link">
				<a href="javascript:void(0);" onclick="return gamelook();" class="rule pngfix">观看大厅</a>
                    <a href="/member/zhenren/rule/lhd.php" target="_blank" class="rule pngfix">规则说明</a>
                </div>
				<!-------手工操作补丁6(开始)-----------添加试玩连接-------------------------------------------------------->
				<div class="game-link2">
					<?
					if($uid!="")
					{
					?>
					<a href="javascript:void(0);" onclick="return gametry();" class="rule pngfix">游戏试玩</a>
					<a href="javascript:void(0);" onclick="return gamereal();" class="rule pngfix">开始投注</a>
					<?
					}
					?>
                </div>
				<!-------手工操作补丁6(结束)-----------添加试玩连接-------------------------------------------------------->
            </div>
        </div>
		<?
		}
				?>
    </div>
    <script type="text/javascript" language="javascript" src="/js/left_mouse.js"></script>
</body>
</html><?
$mysqli->close();
?>