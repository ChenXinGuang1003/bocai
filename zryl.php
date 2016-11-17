<?php
@session_start();
//print_r($_COOKIE);
$uid		= @$_SESSION["uid"];
	include_once("include/mysqli.php");
	include_once("include/mysqlis.php");
	include_once("common/logintu.php");
	
	
	//投注金额 
	if($uid && $uid>0){ //已登陆
		$sql		=	"SELECT sum(bet_money) as s FROM `k_bet` where uid=$uid and status=0";
		$query		=	$mysqli->query($sql);
		$rs			=	$query->fetch_array();
		$tz_money	=	$rs['s'];
		
		$sql		=	"select sum(bet_money) as s from k_bet_cg_group where uid=$uid and status=0";
		$query		=	$mysqli->query($sql);
		$rs			=	$query->fetch_array();
		$tz_money	+=	$rs['s'];
		
		
		$sql		=	"select count(*) as s from k_user_msg where uid=$uid and islook=0"; //未查看消息
		$query		=	$mysqli->query($sql);
		$rs			=	$query->fetch_array();
		$user_num	=	$rs['s'];
		
		$sql		=	"select money as s from k_user where uid=$uid limit 1";
		$query		=	$mysqli->query($sql);
		$rs			=	$query->fetch_array();
		$user_money	=	sprintf("%.2f",$rs['s']);
	}
	unset($mysqlis);
	$action=$_REQUEST['action'];
	if(strlen($action)>0){
		$mainurl=$action;
	}else{
		$mainurl='show/ft_danshi.html';
	}	
	$msg	=	"";
	$sql	=	"select msg from k_notice where end_time>now() and is_show=1 order by `sort` desc,nid desc limit 0,5";
	$query	=	$mysqli->query($sql); 
	while($rs = $query->fetch_array()){
		$msg	.=	$rs['msg']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	}	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="first zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />

<title>皇冠国际</title>
<link href="/css/standard.css" rel="stylesheet" type="text/css" />
<link href='/css/monaco.css' rel="stylesheet" type="text/css" />

<script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/js/common.js"></script>
<script type="text/javascript" src="/js/swfobject.js"></script>
<script type="text/javascript" src="/js/top.js"></script>
<script type="text/javascript" src="/js/float2.js"></script>
<!--[if IE 6]>
<style type="text/css">
    html { overflow-x: hidden; }
</style>
<script src="/js/jquery.ifixpng.js"></script>
<script type="text/javascript">
    $(function(){
        $('img[src$=".png"],img[src$=".png"],#firstBTN a').ifixpng();
    });
    // 修正ie6 bug
    try {
        document.execCommand("BackgroundImageCache", false, true);
    } catch(err) {}
</script>
<![endif]-->
<!-- revised -->


<style type="text/css">
<!--
td { font-size: 9pt
; font-style: normal}
a { font-size: 9pt
; color: #000000; text-decoration: none}
a:hover {color: #FF0000; position: relative;}
table        { font-size: 9pt
; color: #000000 }
*{padding:0;margin:0}
table{ font-size: 9pt
; color: #000000 }
TD{font-size:9pt
;color: #000000;}
.title_283
{color:ffffff;text-align:center;font-size: 13px;background-color: 0460BB;}
.main_760
{border: 1px solid #d2d3d9;padding: 2;text-align:center;font-size: 14px;padding-left:8;}
.first-jp-wrap {
    background: url("../../images/prize_bg.png") no-repeat scroll left top;
}
.first-jp-wrap {
    float: left;
    height: 43px;
    margin-left: 250px;
    position: relative;
    width: 488px;
}
.first-jp-wrap .ele-jackpot-wrap {
    cursor: pointer;
    font-size: 22px;
    height: 35px;
    left: 121px;
    line-height: 35px;
    position: absolute;
    text-align: center;
    top: 7px;
    width: 241px;
}
.ele-jackpot-wrap {
    color: #FDDA52;
    cursor: pointer;
    font-size: 25px;
    font-weight: bold;
    height: 50px;
    line-height: 50px;
    text-align: right;
    width: 200px;
}
.ele-jackpot span {
    letter-spacing: 2px;
}
-->
</style>
<script type="text/javascript">
$(window.parent.parent.document).find("#mainFrame").height(890);
</script>
<base target="_blank">
</head>
<body>
<div style="width:1000px;height:264px;margin:0 auto 35px;" class="header-bottom-inner">
	<img width="1000" height="217" src="../../../images/title_welcome.png" tppabs="http://www.hg6656.com/images/title_welcome.png" class="pngfix">
    <div class="first-jp-wrap">
            <div class="ele-jackpot-wrap">
                    <div class="ele-jackpot">
                        <span class="js-ele-JP1">6,994,039.03</span>
                    </div>
            </div>               
    </div>
</div>
<style type="text/css">
.zryl{width:1000px; height:590px; margin:0 auto;/*  padding-top:265px; */}
.zryl div{ /* background: url(/img123/ag_bbin_bg.png) center top no-repeat; */ height:590px;}
.zryl div a{
display: inline-block;
    height: 590px;
    float: left;
}
.open:hover{background:url(/img123/open_01.png) center top no-repeat;}
.open{background:url(/img123/open_01_hover.png) center top no-repeat; width:500px;}
.close1:hover{background:url(/img123/close_02.png) center top no-repeat;}
.close1{background:url(/img123/close_02_hover.png) center top no-repeat;width:249px; margin-left:1px;}
.close2:hover{background:url(/img123/close_03.png) center top no-repeat;}
.close2{background:url(/img123/close_03_hover.png) center top no-repeat;width:249px; margin-left:1px;}
</style>
<div class="zryl">
	<div>
		<!--<a class="open" href="/bbin/live1.php" onclick="<?php if($_SESSION['uid']==''){ echo "alert('你尚未登录，请登录之后再游戏');return false";} ?>" target="_blank"></a>-->
        <a class="open" href="/bbin" onclick="<?php if($_SESSION['uid']==''){ echo "alert('你尚未登录，请登录之后再游戏');return false";} ?>" target="_blank"></a>
		<a class="close1" href="/ag/ag_live.php"  onclick="<?php if($_SESSION['uid']==''){ echo "alert('你尚未登录，请登录之后再游戏');return false";} ?>"  target="_blank"></a>
		<a class="close2" href="/bbin/live1.php"  onclick="<?php if($_SESSION['uid']==''){ echo "alert('你尚未登录，请登录之后再游戏');return false";} ?>"  target="_blank"></a>
	</div>
</div>
    <!--文案-->
</body>
</html>