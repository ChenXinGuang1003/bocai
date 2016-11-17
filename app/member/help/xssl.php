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
    background: #8C9FC5;
}
ul.mtab-menual li:hover{
    background-color:#5670A3;
 }
ul.mtab-menual li.mtab{
    background-color:#5670A3;
    color: #FAE676;
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

$(window.parent.parent.document).find("#mainFrame").height(1600);
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
      <h3>新手上路</h3>
      <div id="Union" class="redborder">
        <div id="Union1">

<p>1. <?=$web_site['web_name']?>實力怎樣？</p>
<p>您好，請參閱主頁「關於我們」。</p>
<p>2. 在貴公司進行遊戲是否安全？</p>
<p>您好，本公司系統絕對安全。我們決不洩漏客戶的個人資料給任何商業機構。此外，我們亦要求有交易往來的銀行，信用卡中轉代理等嚴格保密客戶的資料。所有的存款將視為貿易戶口，並不會交給其它的人士進行。</p>
<p>3. 網上博彩是否合法？</p>
<p>您好，有的國家或地區當地法律禁止博彩，在這種情況下，請您務必遵守當地法律，如有任何疑問，請尋求當地法律部門的意見。本公司不能亦不會接受任何人士違犯當地法律所引致之任何責任。</p>
<p>4. 在<?=$web_site['web_name']?>網進行投注是否有年齡限制？</p>
<p>您好，是的，投注合法年齡必須年滿18歲。</p>
<p>5. 開戶是否要填寫真實姓名？</p>
<p>您好，基於安全理由，提款時財務部會按照註冊姓名進行審核，銀行卡戶名必須與註冊姓名相同方可提款，所以請您在開戶時填寫的姓名必須與您提款的戶名相同。</p>
<p>6. 忘記密碼怎麼辦？</p>
<p>您好，請您在我们网站首页右上角点击<忘记密码>进行申诉取回密码或者與在線客服聯繫。</p>
<p>7. <?=$web_site['web_name']?>有哪些遊戲？</p>
<p>您好，<?=$web_site['web_name']?>目前為您提供「運動博弈」最全的「真人娛樂」城遊戲和「電子遊藝」「對戰益智」「彩票遊戲」。</p>
<p>8. 我該如何為我的遊戲賬號充值？</p>
<p>您好，公司目前提供兩種方式入款，1.在線存款2.公司入款，請您點擊線上存款選擇其中一種方式入款，謝謝！（註：選擇公司入款的客戶，請您在每次入款前務必與我們聯絡確認匯款賬號，如將款項存入已過期賬號，<?=$web_site['web_name']?>將無法查收，恕不負責，請您留意，謝謝！）</p>
<p>9. 當我在真人遊戲贏了錢，我該如何提款？</p>
<p>您好，請您點擊「線上提款」輸入您的提款密碼，再按要求填寫您要提取的金額，然後再點擊確定。謝謝！
<p>10. 如何證明遊戲結果是實時的？</p>
<p>您好，您可以通過遊戲的視頻影像進行監查，視頻內的畫面均為BBIN現場娛樂城所播放的畫面是同步的。我們確保所有遊戲結果均為真實的實時結果。</p>
<p>11. 我可以先瀏覽你們的遊戲嗎？</p>
<p>您好，我們非常歡迎您瀏覽我們的遊戲系統。當然，這是免費的。您只需在我們的網站後進行註冊後即可以登入瀏覽我們的遊戲。</p>
<p>12. 進行遊戲對系統配置有要求麼？</p>
<p>您好，我們設計的網頁將會提供新一代瀏覽器服務，提供更好的特點，讓您能夠享有更好的投注樂趣。我們希望您能使用Internet Explorer 6.0或者是以上的瀏覽器版本。</p>
        </div>
      </div>
      <p>&nbsp; </p>
    </div>
  </div>
  <div style="clear:both"></div>
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
				$('#Union').mtab2();
	});	
</script>

</body>
</html>
