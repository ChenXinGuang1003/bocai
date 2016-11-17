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
$sql = "select conf_www from sys_config limit 0,1";
$query	=	$mysqli->query($sql);
$row = $query->fetch_array();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
澳门永利
</title>
    <link href="/css/css_1.css" rel="stylesheet" type="text/css" />
    <link href="/cl/css/bcss.css" rel="stylesheet" type="text/css" />
    <script language="javascript" src="/js/jquery-1.7.1.js"></script>
    <script src="/cl/js/common.js"></script>
<style>
.fontcolor {
	float: left;
	background: url(/images/yes.jpg) no-repeat left;
	line-height: 25px;
	width: 360px;
	padding: 0 0 0 26px;
	height: 25px;
	color: #000;
}
.zhuce_03 {
	float: left;
	background: url(/images/no.jpg) no-repeat left;
	line-height: 25px;
	width: 360px;
	padding: 0 0 0 26px;
	height: 25px;
	color: #000;
}
ul.mtab-menual{
	margin:20px 0px;
    float: left!important;
    *float:none!important;
    *float:none;
    list-style: none outside none;
    width: 100%;
	
}
ul.mtab-menual li{
	float:left;
    width:96px;
    height:22px;
    line-height:22px;
    margin-right:4px;
    color: #FFF;
    border:1px #FFF solid;
    text-align:center;
    list-style-type:none;
    cursor: pointer;
    background: #404040;
}
ul.mtab-menual li:hover{
    background-color:#996600;
 }
ul.mtab-menual li.mtab{
    background-color:#996600;
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

$(window).ready(function(){
	$(window.parent.parent.document).find("#mainFrame").height( $(document.body).height() );
});

</script>
<script language="javascript" src="/js/xhr.js"></script>
<script language="javascript" src="/js/zhuce.js"></script>
<style>
#sub{width:1000px;}
.first-jp-wrap {float:left;height:43px;margin-left:250px;position:relative;width:488px;background:url("/pic/prize_bg.png") no-repeat scroll left top;}
.first-jp-wrap .ele-jackpot-wrap {cursor:pointer;font-size:22px;height:35px;left:121px;line-height:35px;position:absolute;text-align:center;top:7px;width:241px;color: #FDDA52;}
.ele-jackpot-wrap span{letter-spacing:2px; font-weight:bolder;}

#articles h3{background: url("/pic/page_body_top.png") no-repeat scroll center top; height:85px;margin:85px 0 0 0;}
.redborder{ color:#FFF; }
.main_bg{ width:100%; height:287px; background:url(/imgs/about_wel.png) repeat-x center -20px; }
.about_bg{ width:100%; background:url(/imgs/about_bg.png) repeat-x; }
.about_main_w{ width:1080px; margin:0 auto; position:relative; padding-top:65px; }
.about_main_w .about_top{ width:1080px; height:240px; background:url(/imgs/about_top.png) no-repeat center top; position:absolute; top:-100px; }
.about_main_w .about_main{ width:1080px; background:url(/imgs/about_bg02.png) repeat-y center top; }

.about_left{
	float: left;
    width: 200px;
    height: 580px;
    padding: 0 0 0 10px;
    background: url(/imgs/about_left.png) no-repeat center 0px;
}
.left_list{
	padding:139px 0 0 75px;
}
.left_list a{
	display:block;
	height: 30px;
    line-height: 30px;
    margin-bottom: 9px;
    font-weight: bold;
    color: #311c00;
    font-size:12px;
}
.left_list a:hover{
	color:#F00;
}
.icos:hover{
	color:#fff;
}.color{color:#eac100;font-size:18px;}
</style>
<body>
<!--
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
-->   
<div class="main_bg"></div>
<div class="about_bg">
    <div class="about_main_w">
        <div class="about_top">
            <div style="clear: both;width:620px; height:30px; position:absolute; left:265px;top:130px; overflow:hidden;"><div style="padding: 10px auto; height: 25px; float: left; width: 100px; text-align: center; color: yellow; line-height: 25px;vertical-align: middle;"></div><div style="float: left; width: 900px; height: 25px; line-height: 25px;vertical-align: middle;color:#fff;"><marquee onclick="HotNewsHistory();" style="cursor:pointer;" scrollamount="2"><?=$msg;?></marquee></div></div>
        </div>
        <div class="about_main">
            <div style="width:100%;height:89px;background:url(/imgs/about_bg01.png) no-repeat center top">
                
            </div>
            <div style="height:8px;"></div>
            <div style="width:1000px;margin:0 auto;">
                <div style="width: 1000px;overflow:hidden;">
				<div class="about_left">
					<div class="left_list">
						<a href="javascript:click_url('/app/member/help/dlhz1.php');">公司简介</a>
						<a href="javascript:void(0);" onclick="click_url('/cl/reg.php')" >免费开户</a>
						<a onclick="click_url('/member/lottery/Cqssc1.php')" href="javascript:void(0);">手机投注</a>
						<a href="javascript:click_url('/app/member/help/dlhz2.php');">联络我们</a>
						<a href="javascript:click_url('/app/member/help/dlhz4.php');">存款帮助</a>
						<a href="javascript:click_url('/app/member/help/dlhz5.php');">取款帮助</a>
						<a href="javascript:click_url('/app/member/help/dlhz3.php');">加盟代理</a>
					</div>
				</div>
			<div id="sub">
			    <script language="javascript" src="/images/swfobject_source.js"></script>
			    <!--
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
				-->
			  <div id="direction">
			    <div id="articles">
			      
			      <div id="Union" class="redborder">
			        
			        <div id="Union1">
			         <font face="微软雅黑">
<strong class="color">取款幫助</strong></font><p>&nbsp;</p>
<p><font face="微软雅黑">取款方法</font></p>
<p><font face="微软雅黑">1．会员登入后点击右上方“线上取款”。</font></p>
<p><font face="微软雅黑">2．输入提款“金额”和“取款密码”，确认提款人姓名与您银行账号持有人相符。</font></p>
<p><font face="微软雅黑">3．支持出款银行： 工商银行、农业银行、北京银行、交通银行、中国银行、建设银行、光大银行、兴业银行、民生银行、招商银行、中信银行、广东发展银行、中国邮政、深圳发展银行、上海浦东发展银行等银行。 取款￥100万元人民币以内，可24小时提出申请，并享受5-15分钟内到帐。</font></p>
<p><font face="微软雅黑">4．如有任何问题，请您联系我们的24小时在线客服，我们将在第一时间为您解答问题。</font></p>
<p><font face="微软雅黑">【取款注意事项】</font></p>
<p><font face="微软雅黑">最低取款为$100人民币，普通会员每日最高取款为￥1,000,000人民币,VIP会员每日最高取款为￥5,000,000人民币)，所有会员提款次数不限，提款手续费全免。</font></p>
<p><font face="微软雅黑">请注意：各游戏和局/未接受/取消注单，不纳入有效投注计算。运动博弈游戏项目，大赔率玩法计算有效投注金额，小赔率玩法计算输赢金额为有效投注。</font></p>
<p><font face="微软雅黑">大赔率产品包括: 过关、波胆、总入球、半全场、双胜彩、冠军赛。</font></p>
<p><font face="微软雅黑"><?=$web_site['web_name']?>相关优惠，请详见"优惠活动"</font></p>
<p><font face="微软雅黑">如有任何问题，请您联系24小时在线客服！</font></p>



			       



			        </div>
			        
			        <div id="Union2" style="display:none;">
			          <p> <strong>联盟协议</strong></p>
			          <p> <strong>一、澳门永利对代理联盟的权利与义务</strong></p>
			          <ol>
			            <li> 澳门永利的客服部会登记联盟的会员并会观察他们的投注状况。联盟及会员必须同意并遵守澳门永利的会员条例，政策及操作程式。澳门永利保留拒绝或冻结联盟/会员帐户权利</li>
			            <li> 代理联盟可随时登入界面观察旗下会员的下注状况及会员在网站的活动概况。澳门永利的客服部会根据代理联盟旗下的会员计算所得的佣金。</li>
			            <li> 澳门永利保留可以修改合约书上的任何条例，包括: 现有的佣金范围、佣金计划、付款程式、及参考计划条例的权力，澳门永利会以电邮、网站公告等方法通知代理联盟。 代理联盟对于所做的修改有异议，代理联盟可选择终止合约，或洽客服人员反映意见。 如修改后代理联盟无任何异议，便视作默认合约修改，代理联盟必须遵守更改后的相关规定。</li>
			          </ol>
			          <p> <strong>二、代理联盟对澳门永利的权力及义务</strong></p>
			          <ol>
			            <li> 代理联盟应尽其所能，广泛地宣传、销售及推广澳门永利，使代理本身及澳门永利的利润最大化。代理联盟可在不违反法律下，以正面形象宣传、销售及推广澳门永利，并有责任义务告知旗下会员所有澳门永利的相关优惠条件及产品。</li>
			            <li> 代理联盟选择的澳门永利推广手法若需付费，则代理应承担该费用。</li>
			            <li> 任何澳门永利相关资讯包括: 标志、报表、游戏画面、图样、文案等，代理联盟不得私自复制、公开、分发有关材料，澳门永利保留法律追诉权。 如代理在做业务推广有相关需要，请随时洽澳门永利。</li>
			          </ol>
			          <p> <strong>三、规则条款</strong></p>
			          <ol>
			            <li> 各阶层代理联盟不可在未经澳门永利许可情况下开设双/多个的代理帐号，也不可从澳门永利帐户或相关人士赚取佣金。请谨记任何阶层代理不能用代理帐户下注，澳门永利有权终止并封存帐号及所有在游戏中赚取的佣金。</li>
			            <li> 为确保所有澳门永利会员账号隐私与权益，澳门永利不会提供任何会员密码，或会员个人资料。各阶层代理联盟亦不得以任何方式取得会员资料，或任意登入下层会员账号，如发现代理联盟有侵害澳门永利会员隐私行为，澳门永利有权取消代理联盟红利，并取消代理联盟账号。</li>
			            <li> 代理联盟旗下的会员不得开设多于一个的帐户。澳门永利有权要求会员提供有效的身份证明以验证会员的身份，并保留以IP判定是否重复会员的权利。如违反上述事项，澳门永利有权终止玩家进行游戏并封存帐号及所有于游戏中赚取的佣金</li>
			            <li> 代理联盟不可为自己或其他联盟下的有效投注会员,只能是公司直属下的有效投注会员,代理每月需有5个下线有效投注（有效投注为每月至少上线5次进行正常投注），如有违反联盟协议澳门永利有权终止并封存帐号及所有在游戏中赚取的佣金。</li>
			            <li> 如代理联盟旗下的会员因为违反条例而被禁止享用澳门永利的游戏，或澳门永利退回存款给会员，澳门永利将不会分配相应的佣金给代理联盟。如代理联盟旗下会员存款用的信用卡、银行资料须经审核，澳门永利保留相关佣金直至审核完成。</li>
			            <li> 合约内的条件会以澳门永利通知接受代理联盟加入后开始执行。澳门永利及代理联盟可随时终止此合约，在任何情况下，代理联盟如果想终止合约，都必须以书面/电邮方式提早于七日内通知澳门永利。 代理联盟的表现会3个月审核一次，如代理联盟已不是现有的合作成员则本合约书可以在任何时间终止。如合作伙伴违反合约条例，澳门永利有权立即终止合约。</li>
			            <li> 在没有澳门永利许可下，代理联盟不能透露及授权澳门永利相关保密资料，包括代理联盟所获得的回馈、佣金报表、计算等;代理联盟有义务在合约终止后仍执行机密档及资料的保密。</li>
			            <li> 在合约终止后，代理联盟及澳门永利将不须要履行双方的权利及义务。终止合约并不会解除代理联盟于终止合约前应履行的义务。</li>
			          </ol>
			        </div>
			      </div>
			      <p>&nbsp; </p>
			    </div>
			  </div>
			  <div style="clear:both"></div>
			</div>
                </div>
            </div>
            <div style="clear:both;height:18px;"></div>
            <div style="width:1080px;height:38px;margin:0 auto;background:url(/imgs/about_bg03.png) no-repeat center top;"></div>
        </div>
    </div>
</div>


<div style="clear:both"></div>
</div>
</div>
<script language="javascript">
/**
*  無動畫切換
*/
$.fn.mtab2 = function(){
    var area = this;
    $.each(area.find('li[id^=#]'),function(i){
    	if(i!=0){
    		area.find(this.id)[0].style.display = 'none';
    	}
    });
    area.find('li[id^=#]').click(function(){
        var self = this;
        $.each(area.find('li[id^=#]'),function(i){
            if(self.id != this.id){
                area.find(this.id)[0].style.display = 'none';
                $(this)[0].style.backgroundPosition = 'top';
                $(this).removeClass('mtab');
            }else{
                area.find(this.id)[0].style.display = 'block';
                $(this)[0].style.backgroundPosition = 'bottom';
                $(this).addClass('mtab');
            }
        });
    });
};

//一般文案用
	$(document).ready(function(){
		var MtabUl = $('#Union').children('ul');
		MtabUl.addClass("mtab-menual");
//					var PartnerLink = "<li onclick=\"menu_click(11);return false;\">代理注册</li>";
//						MtabUl.children('li:last').after(PartnerLink);
				$('#Union').mtab2();
	});	
</script>

</body>
</html>
