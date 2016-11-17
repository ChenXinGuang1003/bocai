<?php
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/com_chk.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/class/sys_announcement.php");
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
	background: url("/images/yes.jpg") no-repeat left;
	line-height: 25px;
	width: 360px;
	padding: 0 0 0 26px;
	height: 25px;
	color: #000;
}
.zhuce_03 {
	float: left;
	background: url("/images/no.jpg") no-repeat left;
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
$(window.parent.parent.document).find("#mainFrame").height(800);
</script>
<script language="javascript" src="/js/xhr.js"></script>
<script language="javascript" src="/js/zhuce.js"></script>
<style>
#sub{width:1000px;}
.first-jp-wrap {float:left;height:43px;margin-left:250px;position:relative;width:488px;background:url("/pic/prize_bg.png") no-repeat scroll left top;}
.first-jp-wrap .ele-jackpot-wrap {cursor:pointer;font-size:22px;height:35px;left:121px;line-height:35px;position:absolute;text-align:center;top:7px;width:241px;color: #FDDA52;}
.ele-jackpot-wrap span{letter-spacing:2px; font-weight:bolder;}

#articles h3{background: url("/pic/page_body_top.png") no-repeat scroll center top; height:85px;margin:85px 0 0 0;}
.redborder{background: url("/pic/page_body_bg.jpg") repeat-y scroll left top; color:#FFF; }

</style>
<body>
<!--<div class="sidebar">
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
   </div>-->
<div id="sub">

	<!---->
	<img width="1000" height="217" src="/pic/title_welcome.png" class="pngfix">
    <div class="first-jp-wrap">
        <div class="ele-jackpot-wrap">
             <span class="js-ele-JP1">6,994,039.03</span>
        </div>               
    </div>
	<!---->
    
                <script language="javascript" src="/images/swfobject_source.js"></script>
               <!-- <div class="turn" id="turn">
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
-->
  <div id="direction">
    <div id="articles">
    
      <h3></h3>
      
      <div class="redborder">
        <p> ◎取款方法<br>
          1. 会员登入后点选”在线取款”。<br>
          2. 输入取款密码，确认提款人姓名与您银行账号持有人相符。<br>
          3. 输入出款额度，以及有效的手机号码，如有任何问题，请您联繫在线客服，我们将在第一时间为您解答问题。<br>
          4. 确认提款银行账号正确。<br>
          5. 选择公司金流方式出款：<br>
          -绑定工商银行、农业银行、建设银行、招商银行、中国银行、交通银行、中信银行、光大银行、华夏银行、民生银行、广东发展银行、深圳发展银行、邮政储蓄、农村信用合作社。<br>
          ◎取款需知<br>
          1. 最低取款为￥100人民币，单笔最高取款上限为￥2000,000人民币。<br>
          2. 会员可在24小时内享有第一次提款￥200,000人民币内5分钟内到帐，申请提款额度超过￥200,000人民币，10分钟内到帐。<br>
          3. 24小时内仅限提款三次。VIP不限次数。<br>
          4. **请注意: 各游戏和局/未接受/取消注单，不纳入有效投注计算。运动博弈游戏项目，大赔率玩法计算有效投注金额，小赔率玩法计算输赢金额为有效投注。 **大赔率产品包括: 过关、波胆、总入球、半全场、双胜彩、冠军赛。<br>
          5. 如有任何问题，请洽谈24小时在线客服！<br>
          &nbsp;<br>
          **相关优惠，请详见'优惠活动'</p>
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
