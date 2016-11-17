
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Menu Template</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="/cl/template/bbin/public/css/left.css" rel="stylesheet" type="text/css" />
	<script language="JavaScript" type="text/javascript" src="/cl/js/commJS/menu/menu.js?v=20100101"></script>
    <style type="text/css">
<!--
body {
	margin-left: 0px;
}
-->
</style>
<script type="text/javascript">
var M={'0':[],'1':[],'2':[],'3':[],'4':[],'5':[],'6':[]};

//M['1']={'E':'508','T':'424','L':'6','E_1X2':'317','E_CS':'161','E_OETG':'342','E_HTFT':'161','E_FGLG':'161','T_1X2':'304','T_CS':'149','T_OETG':'314','T_HTFT':'149','T_FGLG':'149','P':'245','OT':'101','TV':'0','LP':'1','EP':'148'};
//足球 
//E 早盤  T 今日 L 滾球
//A:独赢&让球&大小,B:波胆,C:单 / 双 & 总入球,D:半场 / 全场,E:混合过关,F:冠軍,R:赛果
M['1']={'E':'508','T':'424','L':'10','R':'317','E_A':'161','E_B':'161','E_C':'342','E_D':'161','E_E':'161','E_F':'161','T_A':'1','T_B':'2','T_C':'3','T_D':'4','T_E':'5','T_F':'6'};
//籃球 
//E 早盤  T 今日 L 滾球
//A:让球&大小&单/双,B:混合过关,C:冠軍,R:赛果
M['2']={'E':'2','T':'22','L':'222','R':'20','E_A':'21','E_B':'22','E_C':'23','T_A':'25','T_B':'26','T_C':'27'};
//網球
//E 早盤  T 今日 L 滾球
//A:独赢&让盘&大小&单/双,B:赛盘投注,C:混合过关,D:冠軍,R:赛果
M['3']={'E':'3','T':'33','L':'333','R':'30','E_A':'31','E_B':'32','E_C':'33','E_D':'34','T_A':'35','T_B':'36','T_C':'37','T_D':'38'};
//排球
//E 早盤  T 今日 L 滾球
//A:独赢&让分&大小&单/双,B:赛盘投注,C:混合过关,D:冠軍,R:赛果
M['4']={'E':'4','T':'44','L':'444','R':'40','E_A':'41','E_B':'42','E_C':'43','E_D':'44','T_A':'45','T_B':'46','T_C':'47','T_D':'48'};
//棒球
//E 早盤  T 今日 L 滾球
//A:独赢&让分&大小&单/双,B:混合过关,C:冠軍,R:赛果
M['5']={'E':'5','T':'55','L':'555','R':'50','E_A':'51','E_B':'52','E_C':'53','T_A':'54','T_B':'55','T_C':'56'};
//其他
//E 早盤  T 今日 L 滾球
//A:独赢&让球&大小&单/双,B:混合过关,C:冠軍,R:赛果
M['6']={'E':'6','T':'66','L':'666','R':'60','E_A':'61','E_B':'62','E_C':'63','T_A':'64','T_B':'65','T_C':'66'};

M['0']={'TV':'0','TotalLive':'26','TotalToday':'778','TotalEarly':'630'};
//TotalLive滾球 

//--------Site Const---------------
var SiteMode = 2;
var UserLang = "en";
var IsLogin = false;
//--------Odds Display---------------
var DisplayMode = '3';
//--------Menu---------------
var LastSelectedSport = -1;//-1;
var LastSelectedMArket = null;
var LastSelectedMenu=0; // Default All
//--------Racing---------------
var CanSeeHorse=false;
var CanSeeGreyhounds=false;
var CanSeeHarness=false;
//--------Number Game---------------
var CanSeeNumberGame=true;
//--------SitePermission--------
var IsCssControl=false;
var IsNewDropdownList=false;
//--------Virtual sport------------
var CanSeeVirtualSports=false;
var CanBetVirtualSports=false;
var CanSeeSportStreaming=false;

var imgSrc = 'template/bbin/cs/images/before/';
</script>
</head>
<body onload="initialMenu();">

    <!--sport menu-->
    <div class="item" id="subnav_head">
        <table width="100%">
            <tr>
                <td class="itemrdon" id="market_E_head">
                    <a href="#" onclick="openMenu('cs'); LoadMenuData('E');"><span id="market_E_text">
                        早盘</span></a>
                </td>
                <td width="2" class="sub_itemline">
                    <img src="template/bbin/public/images/layout/sub_itemline2.gif" width="2" height="22" />
                </td>
                <td class="itemrd" id="market_T_head">
                    <a href="#" onclick="openMenu('cs'); LoadMenuData('T');"><span id="market_T_text">
                        今日</span></a>
                </td>
                <td width="2" class="sub_itemline">
                    <img src="template/bbin/public/images/layout/sub_itemline2.gif" width="2" height="22" />
                </td>
                <td class="itemrd" id="market_L_head">
                    <a href="#" onclick="openMenu('cs'); LoadMenuData('L'); ">
                        <span id="market_L_text">滚球</span><span id="market_L_head_Cnt"></span></a>
                </td>
            </tr>
        </table>
    </div>
    <!--Today and Early-->
    <div id="subnav">
        <table id="market_body" width="100%" style='display: none'>
            <!-- BEGIN MenuDetail -->
            
            <!--Soccer-->
            <tbody id='1_head'>
                <tr>
                    <td>
                        <span class="nav"><a href="JavaScript:SwitchSport('','1')">足球 <span id="1_Cnt"
                            class="tabcontor"></span>
                            <img id="img_1_LV" src="template/bbin/public/images/layout/icon_live.gif" width="30" height="12"
                                border="0" style="position: absolute; left: 140px; margin-top: 6px;" />
                        </a></span>
                    </td>
                </tr>
            </tbody>
            <tbody id='1_body'>
                <tr id="1_A">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('','1','3')"><span class="submenu">独赢&让球&大小</span>
                                <span id="1_A_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
                <tr id="1_B">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('1X2','1')"><span class="submenu">波胆</span>
                                <span id="1_B_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
                <tr id="1_C">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('CS','1')"><span class="submenu">单 / 双 & 总入球</span>
                                <span id="1_C_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
                <tr id="1_D">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('OETG','1')"><span class="submenu">半场 / 全场</span>
                                <span id="1_D_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
                <tr id="1_E">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('HTFT','1')"><span class="submenu">混合过关</span>
                                <span id="1_E_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
                <tr id="1_F">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('FGLG','1')"><span class="submenu">优胜冠军</span>
                                <span id="1_F_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
				<tr id="1_R">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('FGLG','1')"><span class="submenu">赛果</span>
                                <span id="1_R_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
            </tbody>
            <!--Basketball-->
            <tbody id='2_head'>
                <tr>
                    <td>
                        <span class="nav"><a href="JavaScript:SwitchSport('','2')">篮球 <span
                            id="2_Cnt" class="tabcontor"></span>
                            <img id="img_2_LV" src="template/bbin/public/images/layout/icon_live.gif" width="30" height="12"
                                border="0" style="position: absolute; left: 140px; margin-top: 6px;" />
                        </a></span>
                    </td>
                </tr>
            </tbody>
            <tbody id='2_body'>
                <tr id="2_A">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('','2')"><span class="submenu">让球&大小&单/双</span> <span
                                id="2_A_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
                <tr id="2_B">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('P','2')"><span class="submenu">混合过关</span> <span
                                id="2_B_Cnt" class="contor"></span>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr id="2_C">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('OT','2')"><span class="submenu">优胜冠军</span>
                                <span id="2_C_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
				<tr id="2_R">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('FGLG','1')"><span class="submenu">赛果</span>
                                <span id="2_R_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
            </tbody>
            <!--Tennis-->
            <tbody id='3_head'>
                <tr>
                    <td>
                        <span class="nav"><a href="JavaScript:SwitchSport('','3')">网球 <span id="3_Cnt"
                            class="tabcontor"></span>
                            <img id="img_3_LV" src="template/bbin/public/images/layout/icon_live.gif" width="30" height="12"
                                border="0" style="position: absolute; left: 140px; margin-top: 6px;" />
                        </a></span>
                    </td>
                </tr>
            </tbody>
            <tbody id='3_body'>
                <tr id="3_A">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('','5')"><span class="submenu">独赢&让盘&大小&单/双</span> <span
                                id="3_A_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
                <tr id="3_B">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('P','5')"><span class="submenu">赛盘投注</span> <span
                                id="3_B_Cnt" class="contor"></span>
                            </a>
                        </div>
                    </td>
                </tr>
				<tr id="3_C">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('OT','5')"><span class="submenu">综合过关</span>
                                <span id="3_C_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
                <tr id="3_D">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('OT','5')"><span class="submenu">优胜冠军</span>
                                <span id="3_D_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
				<tr id="3_R">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('FGLG','1')"><span class="submenu">赛果</span>
                                <span id="3_R_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
            </tbody>
            <!--Volleyball-->
            <tbody id='4_head'>
                <tr>
                    <td>
                        <span class="nav"><a href="JavaScript:SwitchSport('','4')">排球 <span
                            id="4_Cnt" class="tabcontor"></span>
                            <img id="img_4_LV" src="template/bbin/public/images/layout/icon_live.gif" width="30" height="12"
                                border="0" style="position: absolute; left: 140px; margin-top: 6px;" />
                        </a></span>
                    </td>
                </tr>
            </tbody>
            <tbody id='4_body'>
                <tr id="4_A">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('','5')"><span class="submenu">独赢&让分&大小&单/双</span> <span
                                id="4_A_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
                <tr id="4_B">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('P','5')"><span class="submenu">赛盘投注</span> <span
                                id="4_B_Cnt" class="contor"></span>
                            </a>
                        </div>
                    </td>
                </tr>
				<tr id="4_C">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('OT','5')"><span class="submenu">综合过关</span>
                                <span id="4_C_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
                <tr id="4_D">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('OT','5')"><span class="submenu">优胜冠军</span>
                                <span id="4_D_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
				<tr id="4_R">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('FGLG','1')"><span class="submenu">赛果</span>
                                <span id="4_R_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
            </tbody>
           
            <!--Baseball-->
            <tbody id='5_head'>
                <tr>
                    <td>
                        <span class="nav"><a href="JavaScript:SwitchSport('','5')">棒球 <span
                            id="5_Cnt" class="tabcontor"></span>
                            <img id="img_5_LV" src="template/bbin/public/images/layout/icon_live.gif" width="30" height="12"
                                border="0" style="position: absolute; left: 140px; margin-top: 6px;" />
                        </a></span>
                    </td>
                </tr>
            </tbody>
            <tbody id='5_body'>
                <tr id="5_A">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('','5')"><span class="submenu">独赢&让分&大小&单/双</span> <span
                                id="5_A_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
				<tr id="5_B">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('OT','5')"><span class="submenu">综合过关</span>
                                <span id="5_B_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
				<tr id="5_C">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('OT','5')"><span class="submenu">优胜冠军</span>
                                <span id="5_C_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
				<tr id="5_R">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('FGLG','1')"><span class="submenu">赛果</span>
                                <span id="5_R_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
            </tbody>
            <!--Other-->
            <tbody id='6_head'>
                <tr>
                    <td>
                        <span class="nav"><a href="JavaScript:SwitchSport('','6')">其他 <span
                            id="6_Cnt" class="tabcontor"></span>
                            <img id="img_6_LV" src="template/bbin/public/images/layout/icon_live.gif" width="30" height="12"
                                border="0" style="position: absolute; left: 140px; margin-top: 6px;" />
                        </a></span>
                    </td>
                </tr>
            </tbody>
            <tbody id='6_body'>
                <tr id="6_A">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('','5')"><span class="submenu">独赢&让球&大小&单/双</span> <span
                                id="6_A_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
				<tr id="6_B">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('OT','5')"><span class="submenu">综合过关</span>
                                <span id="6_B_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
				<tr id="6_C">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('OT','5')"><span class="submenu">优胜冠军</span>
                                <span id="6_C_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
                
				<tr id="6_R">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('FGLG','1')"><span class="submenu">赛果</span>
                                <span id="6_R_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!--Live滾球-->
    <div id="subnav">
        <table id="market_L_body" width="100%" style="display: none">
            <tr id='L_1_head'>
                <td>
                    <span class="livelist">
					<a href="JavaScript:ShowOdds('FGLG','1')"><span class="tabsportLive">足球</span>
                    <span id="L_1_Cnt" class="tabcontor"></span>
					<img id="img_1_LV" src="template/bbin/public/images/layout/icon_live.gif" width="30" height="12" border="0" style="position: absolute; left: 140px; margin-top: 6px;" />
					</a>
					</span>
                </td>
            </tr>

			<tr id='L_2_head'>
                <td>
                    <span class="livelist">
					<a href="JavaScript:ShowOdds('FGLG','1')"><span class="tabsportLive">篮球</span>
                    <span id="L_2_Cnt" class="tabcontor"></span>
					<img id="img_2_LV" src="template/bbin/public/images/layout/icon_live.gif" width="30" height="12" border="0" style="position: absolute; left: 140px; margin-top: 6px;" />
					</a>
					</span>
                </td>
            </tr>

			<tr id='L_3_head'>
                <td>
                    <span class="livelist">
					<a href="JavaScript:ShowOdds('FGLG','1')"><span class="tabsportLive">网球</span>
                    <span id="L_3_Cnt" class="tabcontor"></span>
					<img id="img_3_LV" src="template/bbin/public/images/layout/icon_live.gif" width="30" height="12" border="0" style="position: absolute; left: 140px; margin-top: 6px;" />
					</a>
					</span>
                </td>
            </tr>

			<tr id='L_4_head'>
                <td>
                    <span class="livelist">
					<a href="JavaScript:ShowOdds('FGLG','1')"><span class="tabsportLive">排球</span>
                    <span id="L_4_Cnt" class="tabcontor"></span>
					<img id="img_4_LV" src="template/bbin/public/images/layout/icon_live.gif" width="30" height="12" border="0" style="position: absolute; left: 140px; margin-top: 6px;" />
					</a>
					</span>
                </td>
            </tr>

			<tr id='L_5_head'>
                <td>
                    <span class="livelist">
					<a href="JavaScript:ShowOdds('FGLG','1')"><span class="tabsportLive">棒球</span>
                    <span id="L_5_Cnt" class="tabcontor"></span>
					<img id="img_5_LV" src="template/bbin/public/images/layout/icon_live.gif" width="30" height="12" border="0" style="position: absolute; left: 140px; margin-top: 6px;" />
					</a>
					</span>
                </td>
            </tr>

			<tr id='L_6_head'>
                <td>
                    <span class="livelist">
					<a href="JavaScript:ShowOdds('FGLG','1')"><span class="tabsportLive">其他</span>
                    <span id="L_6_Cnt" class="tabcontor"></span>
					<img id="img_6_LV" src="template/bbin/public/images/layout/icon_live.gif" width="30" height="12" border="0" style="position: absolute; left: 140px; margin-top: 6px;" />
					</a>
					</span>
                </td>
            </tr>
        </table>
    </div>
    <div id="subnav-foot">
        <img src="template/bbin/public/images/layout/spacer.gif" width="1" height="1" /></div>
    <span id='tmplEnd'></span>
</body>
</html>
