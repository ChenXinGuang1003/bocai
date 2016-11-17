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
<body id="zhuce_body" style="padding: 0x;margin:0;min-width:1000px;">
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
            $(window.parent.parent.document).find("#mainFrame").height(1150);
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
        <style>
#zhuce_top{width:1000px; padding:0px;}
.first-jp-wrap {float:left;height:43px;margin-left:250px;position:relative;width:488px;background:url("/pic/prize_bg.png") no-repeat scroll left top;}
.first-jp-wrap .ele-jackpot-wrap {cursor:pointer;font-size:22px;height:35px;left:121px;line-height:35px;position:absolute;text-align:center;top:7px;width:241px;color: #FDDA52;}
.ele-jackpot-wrap span{letter-spacing:2px; font-weight:bolder;}
				
.games-hd-menu{height:120px; width:1000px;margin:50px auto 0px auto; z-index:10; cursor:pointer;}
.games-hd-menu li{cursor:pointer; display:inline; float:left; height:120px; text-indent:-9999em; width:250px;}
.dh_agby{background:url(/pic/games_spirits.png) no-repeat;background-position:-0px -174px; float:left; height:120px;width:333.333px;}
.dh_bbin{background:url(/pic/games_spirits.png) no-repeat;background-position:-333.333px -174px; float:left; height:120px;width:333.333px;}
.dh_agyx{background:url(/pic/games_spirits.png) no-repeat;background-position:-666.666px -174px; float:left; height:120px;width:333.333px;}
.dh1{background:url(/pic/games_spirits.png) no-repeat;background-position:-0px 0; float:left; height:120px;width:333.333px;}
.dh2{background:url(/pic/games_spirits.png) no-repeat;background-position:-333.333px 0; float:left; height:120px;width:333.333px;}
.dh3{background:url(/pic/games_spirits.png) no-repeat;background-position:-666.666px 0; float:left; height:120px;width:333.333px;}
.zryl2{width:1000px; height:3100px; margin:0 auto;/*  padding-top:265px; */  overflow:hidden;}
.zryl2{width:1000px; height:6500px; margin:0 auto;/*  padding-top:265px; */  overflow:hidden;}
.zryl1{width:1000px; height:1000px; margin:0 auto;/*  padding-top:265px; */  overflow:hidden;}
.zryl iframe{margin-left:-10px;}

        </style>
        <div id="game_classify">
        	<img width="1000" height="217" src="/pic/title_welcome.png" class="pngfix">
            <div class="first-jp-wrap">
                <div class="ele-jackpot-wrap">
                            <span class="js-ele-JP1">6,994,039.03</span>
                </div>               
            </div>
            
            
            
            <div class="clear"></div>
        </div>
       
      <!---->
<div class="games-hd-menu">
	<div class="dh1" id="dh_agby" onclick="$(window.parent.parent.document).find('#mainFrame').height(1150);show('tab1')"></div>
	<div class="dh_bbin" id="dh_bbin" onclick="$(window.parent.parent.document).find('#mainFrame').height(6950);show('tab2')"></div>
    <div class="dh_agyx" id="dh_agyx" onclick="$(window.parent.parent.document).find('#mainFrame').height(3500);show('tab3')"></div>
</div>

<div class="zryl1" id="n_agby">
	<iframe frameborder=0 width=1000 height=1000 marginheight=0 marginwidth=0 scrolling=no src="/newag2/agby/index.php"></iframe>
</div>
<div class="zryl2" id="n_bbin" style="display:none">
	<iframe frameborder=0 width=1000 height=6500 marginheight=0 marginwidth=0 scrolling=no src="/newbbin2/game_02.php"></iframe>
</div>
<div class="zryl3" id="n_agyx" style="display:none">
	<iframe frameborder=0 width=1000 height=3100 marginheight=0 marginwidth=0 scrolling=no src="/newag2/agyx/index.php"></iframe>
</div>  
 
<script type="text/javascript">
	function show(ss){
		var agby= document.getElementById('dh_agby');
		var bbin= document.getElementById('dh_bbin');
		var agyx= document.getElementById('dh_agyx');
		if(ss=='tab1'){
			document.getElementById('n_agby').style.display = "block";
			document.getElementById('n_bbin').style.display = "none";
			document.getElementById('n_agyx').style.display = "none";
			document.getElementById('dh_agby').className="dh1";
			document.getElementById('dh_bbin').className="dh_bbin";
			document.getElementById('dh_agyx').className="dh_agyx";
		}
		if(ss=='tab2'){
			document.getElementById('n_agby').style.display = "none";
			document.getElementById('n_bbin').style.display = "block";
			document.getElementById('n_agyx').style.display = "none";
			document.getElementById('dh_agby').className="dh_agby";
			document.getElementById('dh_bbin').className="dh2";
			document.getElementById('dh_agyx').className="dh_agyx";

		}
		if(ss=='tab3'){
			document.getElementById('n_agby').style.display = "none";
			document.getElementById('n_bbin').style.display = "none";
			document.getElementById('n_agyx').style.display = "block";
			document.getElementById('dh_agby').className="dh_agby";
			document.getElementById('dh_bbin').className="dh_bbin";
			document.getElementById('dh_agyx').className="dh3";

		}
	}           
	
</script>       
       
	  <!---->

    </div>
    <script type="text/javascript" language="javascript" src="/js/left_mouse.js"></script>
</body>
</html><?
$mysqli->close();
?>