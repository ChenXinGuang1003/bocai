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
	background: url(../images/yes.jpg) no-repeat left;
	line-height: 25px;
	width: 360px;
	padding: 0 0 0 26px;
	height: 25px;
	color: #000;
}
.zhuce_03 {
	float: left;
	background: url(../images/no.jpg) no-repeat left;
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
$(window.parent.parent.document).find("#mainFrame").height(3035);
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
                <!--<div class="turn" id="turn">
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
                  </div>-->
  <div id="direction">
    <div id="articles">
    
      <h3></h3>
      
      <div class="redborder">

	<strong><span >请认真阅读下面条款及规则:</span></strong><br>
<span >&nbsp;</span><span >&nbsp;一般条款和特殊条款介绍:</span><br>
<span style="color:#e56600;"><span >&nbsp;&nbsp;&nbsp;皇冠国际</span><span >是一所从事网络（实体）体育博彩的公司。&nbsp;并且是一所符合法律法规而成立的从事娱乐，远程博彩及赌博的合法公司。一般规则及条款以下是管辖使用本网站的规则及条款。所有客户在网站上的行为必须遵从以下网站所制定的规则：</span></span><br>
<strong><span >1.</span></strong><span ><strong>本条款适用范围</strong></span><br>
<span >1.1&nbsp;当客户点击“同意”后进入我们的网站，或者在我们公司开立账户或者通过我们公司进行博彩都被视为接受这些条款。当客户同意接受这些条款或者当客户继续使用本网站时，他就要受到这些条款，本公司的条款以及保密条款的约束。当这些条款和其它作为参考的条款相抵触时，应该以这些条款为准。</span><br>
<span >1.2&nbsp;本公司保留有在任何时间修改条款的权利，并不需要预先通知客户。但是本公司将尽量将重要条款的变化以在我们网站显着的地方公布的形式来通知我们的客户。</span><br>
<span >1.3&nbsp;客户有责任义务定时地查阅我们的条款以确保仍然同意接受这些条款。当用户仍继续使用网站服务，将视为用户无条件同意并接受所公布的条款规则和保密条款，以及向相关的修改或更新。任何在条款规则修改生效前的投注都是以当时的条款为准。</span><br>
<span >1.4&nbsp;所有条款规则及保密条款都是书面形式提供。</span><br>
<span >&nbsp;</span><strong><span >2.</span><span >客</span></strong><strong><span >户承诺</span></strong><br>
<span >2.1&nbsp;当客户接受这些条款规则就表示客户无条件及无保留地保证他们已经年满18周岁，或者在所在当地已经到达合法年龄并且有能力对他们自己的行为负责并受到我们条款约束。本公司保留随时中止任何涉及未成年人交易的权利。</span><br /><span >2.2&nbsp;此外客户必须同意接受及无条件无保留地向本公司承诺保证：</span><br>
<span >这是客户自身的责任在本公司注册及投注前确定他们的行为是符合当地及国家法律的要求。我们鼓励客户在注册或投注前咨询法律意见以核实确定与本公司的交易在任何方面都没有违反任何法律条例。对于客户违反任何当地或者国家法律条例的行为,本公司均不承担任何责任。我们鼓励客户在本公司注册和/或投注前咨询法律意见。</span><br>
<span >2.3&nbsp;客户必须同意在使用本网站时自己承担风险，并且明白在使用本网站进行投注后可能招致的损失及愿意对损失承担全部责任。</span><br>
<span >2.4&nbsp;客户必须无条件及无保留地向本公司表示和保证，在未有得到本公司的书面许可下，客户不能充当本公司的代理商或成员公司，及不能对本公司及本公司的服务进行推销、刊登广告、公布或宣传。</span><br>
<span >2.5&nbsp;当客户发现在收付款过程中或账户信息中存在错误时，应尽快通知本公司，&nbsp;以便本公司按照本条款第5条“债务的管理及限制”的规定进行处理。</span><br>
<span >2.6&nbsp;客户不应允许或授权任何其它个人或第三方（包括但不只限于任何未成年人）使用本公司的服务，客户账户或代其收取奖金。</span><br>
<span >2.7&nbsp;当客户违反本条款规定而导致索赔、债务、损坏、损失、费用、包括诉讼费（不管法律上如何规定）；或当客户使用网站时或被他人利用其账户信息进入网站时引起债务的情况下，客户应保护本公司及其主管、员工、顾问、代理商及供货商的利益不受损。</span><br>
<span >3.</span><strong><span >账户及个人信息</span></strong><br>
<span >3.1&nbsp;客户只能通过本网站上预先核准的付款方式存款到本公司.如果不直接存款到本公司,所有存款和收款，客户须使用本公司授权的同一收付款公司（“授权收付款公司”）。在没有本公司书面许可的情况下，授权付款公司不能代表本公司收塑任何存款&nbsp;，&nbsp;及不能对本公司及本公司的服务进行推销、刊登广告、公布或宣传。</span><br>
<span >3.2&nbsp;在使用本公司的投注服务前，客户必须成为本网站的注册用户并开通账户。</span><br>
<span >3.3&nbsp;在注册时，&nbsp;客户须同意并提供所有相关的个人信息给本公司&nbsp;。客户有责任及时更新其在本网站上的信息，尤其是电话及银行账户、付款详情（若适用）。当开立账户时，客户须提供真实的信息，如果不能提供真实的信息即违反本条条款规定，其账户将会被立即终止，所有余额会被没收。当本公司要求客户提出相关文件证实其个人信息时，客户应予配合。客户授权本公司对其在网上提交的注册表格中的个人信息，采取任何必要的合法手段进行核实。该个人信息包括本公司认为有必要，且足够用来辨认客户身份的信息。当客户递交前述的注册表格给本公司，且本公司接受后，该客户将被视为注册用户。本公司将保留接受或拒绝该客户成为注册用户的权利。只有注册用户才能使用本公司的服务，并且在其投注限额内或账户可用金额内投注。</span><br>
<span >3.4&nbsp;客户只能在本公司网站开通一个账户。对任何多于一个的账户，本公司有权独立判断终止并将余额退还客户或将所有账户当作一个整体账户来操作。当客户拥有多于一个的账户时，须同意本公司以任何方式处置多余的账户。</span><br>
<span >3.5&nbsp;成为注册用户后&nbsp;，客户将拥有专属的用户名和密码（“账户登入信息”）&nbsp;。用户应保密其账户登入信息，并对任何滥用或非法对第三方披露账户登入信息的后果负责。当用户发现其账户登入信息已被泄露，其账户安全性已经降低或曾被第三方使用时，应立即告知本公司，本公司会根据情况提供新的账户登入信息给用户。用户使用正确的账户登入信息在本网站作出的所有在线投注或要求将被视为有效。</span><br>
<span >3.6&nbsp;当用户发现其账户信息被第三方滥用时，应尽快通知本公司停用该账户。对停用账户过程中发生的合理延误，本公司将不需负任何责任。只有在收到用户的通知称其账户登入信息安全性已降低，本公司停用其账户之后（而不是之前），以该账户所作的在线投注或要求才会被视为作废。如有任何需要报告的情况，请使用本网站“在线客服”里登载的联系方式通知本公司。</span><br>
<span >3.7&nbsp;本公司有可能不定期地要求用户更改密码或账户登入信息。当本公司有理由相信有破坏本网站安全或滥用本网站的情况出现时，有可能会暂停用户的账户。本公司可在对用户发出通知后，有权更改用户的账户登入信息。</span><br>
<span >3.8&nbsp;为维护网络安全和保护用户的资产，本公司会不定期进行网络安全测试。因此在安全测试中，当本公司为了核实用户的户主身份要求用户提供额外的信息或文件时，用户须予以配合。</span><br>
<span >3.9&nbsp;在每次登入网站时，用户应该检查其账户余额。当账户余额有差异时，用户应在第一时间通知本公司，并提供自上一次查询账户余额后的所有交易记录。自发生差异当月的最后一日起30日期限内，若本公司没有收到用户关于差异的通知&nbsp;，&nbsp;则认为在此期限后，用户已丧失对差异的追究权利并同意该账户的所有交易信息。当发现账户余额差异时，用户可使用本网站“联系我们”里登载的联系方式通知本公司。</span><br>
<span >3.10&nbsp;本公司可全权决定终止或暂停用户的账户,退还或扣留该账户的余额，并不需为此向用户解释。但是，该用户在账户停用之前已作出的符合本条款规定的投注将仍然有效。</span><br>
<span >3.11&nbsp;用户可收回已经本公司确认的账户余额，并须符合本网站上的相关条款和指引的规定。</span><br>
<span >3.12&nbsp;用户可在任何时候取消账户&nbsp;。取消账户时必须使用本网站“联系我们”里登载的联系方式书面通知本公司。如果用户已决定取消账户，必须立刻停止使用本网站。只有在本公司通知用户其账户已被取消后，以其账户在网上作的投注和要求才会被视为作废。在本公司通知用户其账户已被取消之前，用户应对其账户的一切活动负责。</span><br>
<span >3.13&nbsp;用户有责任主动维护其账户信息&nbsp;。就此而言，用户在每12个月之内必须至少有一次登入本网站并使用本公司服务。如果用户账户连续12个月或者更长时间没有交易，本公司将有权终止该账户，用户将会丧失账户内余额及对本公司提出要求的权利。</span><br>
<span >3.14&nbsp;如果用户违反了本条款的任何规定&nbsp;，本公司可以随时停用或取消该用户的账户。假如本公司认为用户严重违反了本条款的规定，本公司有权依照本条款并依法采取补救措施，和有权保留用户的账户余额作为该用户履行因违反本条款而可能产生的债务的保证金。</span><br>
<strong><span >4.</span><span >接受投注的条款</span></strong><br>
<span >4.1&nbsp;本公司只接受注册用户通过本网站的在线投注。</span><br>
<span >4.2&nbsp;当用户通过本网站进行在线投注时，其投注将被视为生效。该投注将被视为由该用户访问本网站时使用的互联网协议地址所作出的投注，该地址会被本公司记录下来。当本公司服务器接受该投注后，该投注会被视为于服务器所在地被接受的投注并记录下来。此时，本公司会通过本网站通知用户其投注已被成功接受并作上述记录。当投注于本公司服务器所在地被成功接受和记录，并且用户收到按照本条款所述的通知后，投注过程完毕。</span><br>
<span >4.3&nbsp;当投注不能被完整传送时，将被视为无效。包括例如投注在传送过程中因技术问题被破坏或中断，但不只限于此种情况。</span><br>
<span >4.4&nbsp;一旦投注已提交并被本公司接受和记录，用户将不能取消或更改。本公司也没有义务应用户要求取消已按本条款规定提交并被接受和记录的有效投注。如果用户需要在确认之前取消投注，请检查投注清单（在本网站的菜单栏中），查明该投注没有被提交。假如用户对某笔投注存有异议，应在本公司接受该投注前或在投注发生前通知本公司，由本公司作出相应的调查，自行判断并合理解决。</span><br>
<span >4.5&nbsp;以用户及本公司的利益作为前提，所有电子交易将会被本公司记录下来。当产生纠纷且本公司管理层不能解决时，相关记录会被作为证据。用户和本公司都同意这些记录的真实性和准确性，并相信其拥有最终权威，当纠纷不能解决时最终需求助于这些证据。</span><br>
<span >4.6&nbsp;当某投注市场已暂停投注或禁止进入时，本公司有权停止或禁止任何进一步的投注，且不需要事先通知客户。任何试图对上述投注市场的投注将会被拒绝。</span><br>
<span >4.7&nbsp;在下列情况下，本公司有权全部或部分拒绝客户作出的投注，也有权在任何时候暂停或终止其账户，而不需作出解释：当本公司有理由相信继续使用某账户将会为该客户或本公司招致任何形式的损失；当本公司正处于对该账户违反本条款及规定或隐私政策作出调查的期间；当本公司已证实客户违反了本条款；当客户提出投诉。</span><br>
<span >4.8&nbsp;对由于设备和无线通讯的故障而导致无法正确投注、接受投注、记录和通知的情况，本公司一概不承担任何责任。</span><br>
<span >4.9&nbsp;对所谓因本网站或其内容而导致的损失&nbsp;，包括（但不仅限于）运作或传输过程中的延迟或中断，通信线路的故障，任何人对本网站或其内容的滥用，本网站内容有误或疏漏，本公司在任何情况下都不需承担责任。</span><br>
<span >4.10&nbsp;在指定的期限内进行的投注将会被接纳&nbsp;。在任何情况下，该期限将与本条款一起视为被客户所同意。如果某笔超过期限的投注被意外地接受，该笔投注应被视为无效。本公司有权作废任何超过期限的投注。</span><br>
<span >4.11&nbsp;除上述4.2条款规定外，在本公司（或其授权收付款公司）收到客户以信用卡或借记卡支付的全额投注款之后，投注方可生效。如果本公司没有收到投注款，则该笔投注会自动被视为无效。</span><br>
<span >4.12&nbsp;客户的账户必须有超过投注额的可用余额，否则，将不能下注。</span><br>
<span >4.13&nbsp;本网站显示的所有价格/额度都有可能随时变化&nbsp;，然而一旦按4.2条款所述完成了下注、接受和记录的过程，该价格/额度就会被固定下来&nbsp;。本公司有权随时更改赔率、价格、或关于投注类型、投注市场、比赛的任何信息，并不需提前知会客户。本公司有权随时作废或拒绝所有受影响的投注或更正任何因出错、疏漏或过失而在本网站上错误显示的赔率、价格或关于投注类型、投注市场、比赛的任何信息。在出现这种情况下，本公司会在本网站的突出位置贴出通知。</span><br>
<span >4.14&nbsp;客户在投注市场或比赛中的最大投注限额会因具体投注类型的不同而不同&nbsp;，本公司有权更改这一限额并且不需提前知会客户。</span><br>
<strong><span style="color:#e53333;"><span >5.</span><span >债务的管理及限制</span></span></strong><br>
<span >5.1&nbsp;在根据相关的、适当的消息来源确定最终结果后（例如体育比赛结果由体育管理部门公布），奖金或损失将会被记入或反映于客户的账户上。</span><br>
<span >5.2&nbsp;若客户发现其账户的奖金或损失被错记，是有责任于第一时间通知本公司的。所有错误支付到客户账户上的金额都会被视为无效并必须归还至本公司。客户也许不能处理这些错误支付到其账户上的资金，本公司有权作废利用这些资金所作的任何交易（包括投注）。若客户已从账户中支取了这些错记的资金，必须赔偿或退还给本公司。</span><br>
<span >5.3&nbsp;本公司不会承担因发布赔率或盘口时产生的输入错误、技术错误或人为错误的责任。如发生这些错误，本公司保留将受影响的投注作废或者纠正错误的权利。</span><br>
<span >5.4&nbsp;对所谓因本网站或其内容而产生或导致的资产、合同、民事侵权行为、疏忽、（或法律上的规定）、直接、间接或其它性质的损失，本公司不需负上责任。包括（但不仅限于）本网站或其内容上有误差、错误及含糊不清；操作或传输过程中的失误、故障、延误或中断；通讯线路的故障；任何人对本网站或其内容的滥用；本网站内容上的错误或疏漏；商业损失、利润损失、商业中断、商业信息丢失、或其它金钱上及后续的损失（即使客户已告知本公司可能发生这些损失）。</span><br>
<span >5.5&nbsp;本公司对超出其可能控制范围外的原因造成违反本条款的情况不需负责。</span><br>
<span >5.6&nbsp;本公司有权在任何时间撤回网站或其部分内容，或保留客户对其账户内余额的支配权，并不需因此对客户有任何形式的补偿。</span><br>
<strong><span >6.</span></strong><span ><strong>网站的使用</strong></span><br>
<span >6.1&nbsp;如果本公司有理由相信或怀疑客户对公司的行为已构成欺诈、不道德交易或涉及洗黑钱活动，本公司有权全力寻求替代性的补救措施。本公司有权限制客户使用本网站，停用或终止其账户，将其投注作废，没收或保留其资金.客户必须知悉,如果他们使用本网站的行为是违反关于欺诈或洗黑钱的地区或国家法律的，本公司有权没收或冻结他们与本公司的收付款。在法律许可的范围内，本公司不需对客户的上述行为负责，在上述情况下当本公司被相关管理当局要求提供关于该客户的信息或文件时，本公司不需对其后果负责。</span><br>
<span >6.2&nbsp;当任何个人、团体或法人实体合谋或联合起来欺骗本公司，或正处于被相关部门调查期间时，本公司有权作废其全部或部分投注及扣留所有支付给其的款项。</span><br>
<span >6.3&nbsp;当客户有欺诈及洗黑钱活动时，本公司有权在法律许可的范围内作废其投注，扣留或没收其账户余额。客户必须对本公司，及其管理层、员工、股东、顾问赔偿所有因其欺诈及洗黑钱活动而导致的损失。对所有参与了或本公司认为参与了欺诈和不道德行为的客户，本公司都有权作上述处理及要求赔偿。</span><br>
<span >本公司只能够在指定的接受投注期限内将可疑的投注作废，一旦超过了此期限，本公司将无权将投注作废，除非本公司有合理的理由相信该可疑投注涉及欺诈&nbsp;、与洗黑钱有关&nbsp;（如条款6所述）&nbsp;或违反了本条款的规定。</span><br>
<span >6.4&nbsp;“不道德行为”&nbsp;及/或“欺诈”包括但不仅限于企图避开本条款和条件、规则和规定、一个用户只能开一个账户的要求、投注限额、奖金限额；非法访问；未经授权使用账户登入信息、用户账户或第三方账户；企图避开或绕过本网站上或本公司系统或网络上的任何安全装置；不正当地、故意地或有意地将资金从第三方账户转移或转移非法的资金；任何通过使用或滥用本网站、本公司的服务而导致本公司或第三方损失；虚假的个人信息；“筹码倾销”；通过体育投注转移资金；或任何本公司有理由相信构成欺诈或不道德交易的行为。</span><br>

<p>&nbsp;</p>
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
