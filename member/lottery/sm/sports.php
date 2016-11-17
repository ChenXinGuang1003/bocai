<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="Robots" contect="none">
    <link rel="stylesheet" href="css/mem_qa.css" type="text/css">
    <link rel="stylesheet" href="css/mem_qa_roul.css" type="text/css">
    <title>体育赛事 - 游戏规则</title>
    <script language="javascript" src="js/jquery-1.7.2.min.js"></script>
    <script language="javascript">
        function chg_roul(id) {
            for (var i = 1; i <= 8; i++) {
                $("#info"+i).removeClass();
                
                if (i == id) {
                    $("#info"+i).addClass("displayyes");
                } else {
                    $("#info"+i).addClass("displayno");
                }
            }
        }
    </script>
</head>
<body id="SPORT">
    <div class="qa_head">
        <em>游戏规则</em></div>
    <div id="wrapper">
        <div id="qa_nav">
            <ul>
                <li class="sport"><a href="sports.php">体育赛事</a></li>
                <li class="rule"><a href="6hc.php">六合彩</a></li>
                <li class="rule"><a href="ssc.php">重庆时时彩</a></li>
                <li class="rule"><a href="ssl.php">上海时时乐</a></li>
                <li class="rule"><a href="bjsc.php">北京ＰＫ拾</a></li>
            </ul>
        </div>
        <div id="qa_nav">
            <ul>
                <li class="rule"><a href="3d.php">福彩３Ｄ</a></li>
                <li class="rule"><a href="pl3.php">排列三</a></li>
                <li class="rule"><a href="klsf.php">广东１０分</a></li>
                <li class="rule"><a href="kl8.php">北京快乐８</a></li>
				<li class="rule"><a href="11-5.php">广东11选5</a></li>
            </ul>
        </div>
        <div id="main">
            <a name="top"></a>
            <h1>
                选择体育项目 :
                <label>
                    <select name="jumpMenu" id="jumpMenu" onchange="chg_roul(this.options[this.selectedIndex].value);">
                        <option value="1" selected="selected">一般体育说明</option>
                        <option value="2">足球</option>
                        <option value="3">连串过关 / 复式过关</option>
                        <option value="4">篮球</option>
                        <option value="5">网球</option>
                        <option value="6">排球</option>
                        <option value="7">棒球</option>
                        <option value="8">冠军</option>
                    </select>
                </label>
            </h1>
            <div id="info1">
                <p class="b sub">
                    一般体育说明</p>
                <p class="b sub">
                    概述</p>
                <p>
                    此规则与条款将适用于本公司所有的投注种类。会员们有责任确保您获知所有的规则与条款，我们保留随时修改条款的权利，并且会将修改的内容公布在本网站上。公布在网站公告上的信息可作为投注附加的规则与条款，若有任何差异或矛盾的地方，将以附加信息为准。
                </p>
                <p>
                    本公司对此条款视为公平公正的，若您有任何意见或疑问，您可以联络我们的客服部，我们的客服团队将热诚协助每位客户，并确保能及时友善的解决您的问题。对于任何错误或争论，我们的客服团队将竭力提供服务。
                </p>
                <p>
                    所有的条款用于在会员与公司之间建立一般的原则。对产生的任何争议，希望通过该条款让双方都得到满意的解决方案。
                </p>
                <p class="b sub">
                    1. 一般体育规则</p>
                <p>
                    所有在本公司进行的投注都需要依照以下规则与条款处理。在个别体育项目里注明的规则将视为体育主要规则:</p>
                <ul style="list-style: decimal;">
                    <li>所有投注项目的最高和最低投注额将由公司决定，如有任何更改无需提前通知。 </li>
                    <li>会员申请账户时需提供正确的个人信息，本公司对提供伪造或错误信息的账户将不负任何责任。 </li>
                    <li>会员将全权负责账户提交的所有交易。在投注前请仔细检查选项，一旦投注提交成功后，将无法更改或取消。公司对会员自身原因造成的遗漏或重复投注不负任何责任。会员可以在"交易记录"中查看详情确保所有提交的注单已成功。
                    </li>
                    <li>在任何投诉中，如果在公司的数据库中没有存储任何记录，公司将不接受也不认可任何会员提供的复印件或单据。 </li>
                    <li>公司保留在任何时候关闭或冻结会员账号的权利。 </li>
                    <li>公司保留在任何时候暂停/中止会员对任何盘口进行投注的权利。 </li>
                    <li>公司保留对已预先知道赛果的投注作出取消的权利。如果由于"滚球现场"延迟而引起盘口的赔率错误，此期间的注单将视为无效。 </li>
                    <li>赛事时间,计时器和红牌等信息仅供会员参考，公司对提供此信息的准确性不负任​​何责任。 </li>
                    <li>如赛事中断，暂停或者延后并不在官方开赛时间12小时内重新开始，除了潜在进球/得分不影响注单最终结果及另行声明或单独的体育规则以外，其他情况一律无效。公司决定取消赛事所有的注单的结果被视为最终结果，不参考任何官方赛事裁判的决定或相关部门。连串投注将会按照剩余投注赛果结算。</li>
                    <li>如果对其它语言版本的信息或球赛队名有争议，请以英文网站的名称为准。 </li>
                    <li>由以下事件造成的任何损失，公司不赋予任何责任:
                        <ul style="list-style: lower-alpha;">
                            <li>公司的网站、服务器或网络中断。 </li>
                            <li>公司数据库、服务器丢失信息或信息遭受破坏。 </li>
                            <li>不法分子攻击网站、服务器或网络供应商。 </li>
                            <li>进入网站时由于网络供应商原因造成的网络缓慢。 </li>
                        </ul>
                        <li>如果对此规则与条款的内容有任何疑义，请以公司的解释为准。 </li>
                    </li>
                </ul>
                <p class="b sub">
                    2. 赛果与派彩</p>
                <ul style="list-style: decimal;">
                    <li>赛果均在赛事结束后判定，除非在个别体育规则里另有注明。赛果公布72小时后，若对任何赛果有争议，本公司将不认可。在赛果公布72小时内, 除了任何体育纪律委员会所重新裁决之赛果，本公司只会修正人为、系统或参考赛果的相关网页失误等原因的错误。
                    </li>
                    <li>投注通常在赛事结束后派彩。但考虑到会员的利益，某些投注会在官方公布赛事结果之前就进行派彩。为此，公司保留对此而造成的错误进行更改的权利。 </li>
                    <li>派彩是根据官方来源或相关体育权威机构判定的结果为准。 </li>
                    <li>所有的交易将以公司最新备份数据记录为准，公司不接纳任何投诉或争议，除非会员提供交易记录的截图或影印证据，否则公司的数据记录将作为最终证明。 </li>
                    <li>如赛事中断，暂停或者延后，潜在进球并不影响最终结果的注单依然视为有效。</li>
                </ul>
                <p class="b sub">
                    3. 滚球类型投注规则</p>
                <p>
                    滚球投注是指对正在进行比赛的赛事进行投注。注单会在赛事进行比赛后开始接收并且在盘口关盘后停止所有交易。个别体育会开出多个滚球种类的盘口供投注。
                </p>
                <ul style="list-style: decimal;">
                    <li>会员在投注滚球时，如果赛场中出现以下几种情况，会员的投注将会维持在'危险球-待确认' 的状态。危险球的定义有:
                        <ul style="list-style: lower-alpha;">
                            <li>12码罚球</li>
                            <li>自由球(攻方在守方禁区附近的自由球)</li>
                            <li>角球/掷入球(攻方靠近守方禁区的掷入球)</li>
                            <li>A队向B队禁区附近进攻(或是B队在A队的禁区附近进攻)</li>
                        </ul>
                    </li>
                    <li>投注提交时如果遇到危险球的情况，注单上会出现"危险球-待确认"的状态。这表示注单在等待被确认或可能被取消。危险期一旦通过，并且期间没有任何显著会影响赛事状态的情况，注单就会被确认。
                    </li>
                    <li>如果危险期内遭到进球或其他影响赛事状况的情况，比如: 红卡，所有待确认注单将会被取消。 </li>
                    <li>在滚球投注中，本公司需强调以下条款，确保投注是按照正确的时间、赔率和在正确的情况下进行:
                        <ul style="list-style: lower-alpha;">
                            <li>比赛赛果和入球时间以本公司网站公布的为准，我们不参考任何其它官方网站，体育网站，或"即时比分"等网站公布的赛果或入球时间。 </li>
                            <li>如果有合理的理由怀疑投注是在比赛时某个事件发生后才提交的，本公司将保留取消此注单且不需提供任何理由和证明的权利。 </li>
                            <li>如果出现网站无法更新比分、赔率或盘口的情况，本公司保留权利取消所有未确认且处理中的注单。 </li>
                        </ul>
                    </li>
                </ul>
                <p class="b sub">
                    4. 有关时间规则</p>
                <ul style="list-style: decimal;">
                    <li>如比赛在法定时间提前进行，在比赛开始前的投注依然有效，在比赛开始后的所有投注均视为无效(滚球投注另作别论)。 </li>
                    <li>足球球赛的正常完场时间包括任何球员受伤的补时。 </li>
                    <li>除非在个别体育规则另有注明，加时得分则不计算在正常完场时间内。 </li>
                </ul>
                <p class="b sub">
                    5. 并列名次规则</p>
                <ul style="list-style: decimal;">
                    <li>在某特定赛事如果产生两名或以上的获胜者，注单派彩将按照投注本金除以获胜者人数后乘上赔率，再减去用于计算的投注本金。 </li>
                    <li>范例：某场赛果产生了三名获胜者，投注本金将除以三， 会员的赢利便是以三分之一投注本金来计算。 </li>
                </ul>
                <p class="b sub">
                    6. 场地变更</p>
                <ul style="list-style: decimal;">
                    <li>如果比赛场地有变更（主客队调换），所有此注单将被取消。 </li>
                    <li>本公司保留权利取消因更换场地而可能对赛事结果有影响的注单，例如：网球比赛更换场地表面。 </li>
                    <li>若比赛原定在中立场进行改为在非中立​​场进行且在本公司判定下对比赛没有影响，注单将继续保持有效。 </li>
                    <li>在个别体育项目里若有特别注明将覆盖以上规则。 </li>
                </ul>
                <p class="b sub">
                    7. 错误</p>
                <ul style="list-style: decimal;">
                    <li>本公司力求错误发生的机率保持最低，但若有注单显然是在盘口有错误的情况下提交，我们将保留取消此注单的权利。错误的情况包括：
                        <ul style="list-style: lower-alpha">
                            <li>赔率错误（和市场上提供的有明显差别）；</li>
                            <li>盘口信息错误， 例如：让球数，大小数等；</li>
                            <li>赛事信息错误，例如：参赛队名或队员， 赛事日期或开赛时间。 </li>
                        </ul>
                    </li>
                    <li>若因遇到以上的情况而需取消任何注单，我们会尽可能的与客户取得联系，有关讯息也会及时在公告栏里发布。 </li>
                </ul>
                <p class="b sub">
                    8. 异常投注行为</p>
                <ul style="list-style: decimal;">
                    <li>对任何怀疑在投注时涉嫌作弊或破坏本公司投注平台的会员，公司有权在毫无警告或通知下取消此会员所有的注单并且冻结账户。异常行为包括使用任何设备，​​自动设备，软件，程序等方式干涉本网站的运作。
                    </li>
                </ul>
                <div class="to_top">
                    <a href="#top"><span>回最上层</span></a></div>
            </div>
            <div id="info2" class="displayno">
                <p class="b sub">
                    足球</p>
                <p class="b sub">
                    1. 一般规则</p>
                <ul style="list-style: decimal;">
                    <li>除非另有注明，所有足球投注的结算皆以球赛所规定的完场时间90分钟为准。 </li>
                    <li>完场时间90分钟包括球员伤停补时。加时赛、淘汰赛、点球，以及赛事后如果裁判或相关管理机构更改任何赛果则不计算在内。 </li>
                    <li>除非在个别玩法规则另有注明，所有滚球投注的结算将以90分钟的赛果为准。 </li>
                    <li>对于某些以全场完场时间为80分钟（2x40分钟）的特定赛事或者友谊赛，所有投注的结算皆以完场时间为准。 </li>
                    <li>若少年赛、友谊赛的完场时间为70分钟（2x35分钟）或更少，本公司将在开赛前作出公布，否则该场赛事的注单一律作废。 </li>
                    <li>除非在个别玩法规则另有注明， 否则如果赛事在法定比赛90分钟内的任何时间中断，所有注单将被取消。 </li>
                    <li>如果赛事是在上半场中断，所有上半场的注单将被取消。如果赛事是在下半场中断所有上半场的投注保持有效，但所有下半场的注单将被取消，除非在个别玩法规则另有注明。
                    </li>
                    <li>除非在个别玩法规则另有注明，乌龙球将予以计算在内。 </li>
                    <li>如果比赛场地有变更（主客队调换），所有此注单将被取消。 </li>
                    <li>对于国际赛事，只要变更的场地仍在同一个国家内，所有注单将保持有效。 </li>
                    <li>对于国际联赛，只要变更的场地仍在联赛原定举办的国家内，所有注单将保持有效。 </li>
                    <li>本公司保留权利取消任何因更换场地而可能对赛事结果有影响的注单。 </li>
                </ul>
                <p class="b sub">
                    2. 投注类型</p>
                <p>
                    以下列出足球可提供的个别玩法规则，您可以使用下面的快速链接查看相关信息。</p>
                <p>
                    <table border="0" cellspacing="5" cellpadding="6" class="menu">
                        <tr bgcolor="#333333" style="color: #FFFFFF;">
                            <td>
                                <a href="#PopularMarkets" style="color: #FFFFFF;">常见投注</a>
                            </td>
                            <td>
                                <a href="#GoalMarkets" style="color: #FFFFFF;">进球</a>
                            </td>
                            <td>
                                <a href="#PlayersMarkets" style="color: #FFFFFF;">球员</a>
                            </td>
                        </tr>
                        <tr bgcolor="#333333" style="color: #FFFFFF;">
                            <td>
                                <a href="#Specials" style="color: #FFFFFF;">特别</a>
                            </td>
                            <td>
                                <a href="#Corners" style="color: #FFFFFF;">角球</a>
                            </td>
                            <td>
                                <a href="#BookingsCards" style="color: #FFFFFF;">牌/卡</a>
                            </td>
                        </tr>
                        <tr bgcolor="#333333" style="color: #FFFFFF;">
                            <td>
                                <a href="#FreeKicks" style="color: #FFFFFF;">任意球</a>
                            </td>
                            <td>
                                <a href="#GoalKicks" style="color: #FFFFFF;">射门</a>
                            </td>
                            <td>
                                <a href="#ThrowIns" style="color: #FFFFFF;">界外球</a>
                            </td>
                        </tr>
                        <tr bgcolor="#333333" style="color: #FFFFFF;">
                            <td>
                                <a href="#Substitutions" style="color: #FFFFFF;">替换</a>
                            </td>
                            <td>
                                <a href="#Offsides" style="color: #FFFFFF;">越位</a>
                            </td>
                            <td>
                                <a href="#PenaltyMarkets" style="color: #FFFFFF;">点球</a>
                            </td>
                        </tr>
                        <tr bgcolor="#333333" style="color: #FFFFFF;">
                            <td>
                                <a href="#Competitions" style="color: #FFFFFF;">比赛</a>
                            </td>
                            <td>
                                <a href="#OtherMarkets" style="color: #FFFFFF;">其他</a>
                            </td>
                        </tr>
                    </table>
                </p>
                <a name="PopularMarkets"></a>
                <p>
                    <div class="quick_link">
                        常见投注</div>
                </p>
                <ul style="margin-left: 25px;">
                    <p class="b sub">
                        2.1. 让球盘（亚洲让球盘）</p>
                    <table width="100%" border="0" cellspacing="1" cellpadding="0">
                        <tr class="tabletit">
                            <th>
                                主/客
                            </th>
                            <th colspan="2" "center">
                                （让球盘）
                            </th>
                        </tr>
                        <tr class="tabledetail">
                            <td class="center">
                                阿森（主）
                            </td>
                            <td class="center">
                                0.5/1
                            </td>
                            <td class="center">
                                0.97
                            </td>
                        </tr>
                        <tr class="tabledetail">
                            <td class="center">
                                曼联
                            </td>
                            <td class="center">&nbsp;
                                
                            </td>
                            <td class="center">
                                0.98
                            </td>
                        </tr>
                    </table>
                    <ul style="margin-left: 25px;">
                        <p class="b sub">
                            2.1.1. 一般规则</p>
                        <ul style="list-style: decimal;">
                            <li>预测那一支球队在盘口指定的让球数在全场/半场/赛事某个时节赢得比赛。 </li>
                            <li>"让球盘"则定义为在比赛正式开始前， 一方球队已得到另一方让的虚拟分数， 以领先的情况下开始比赛。 </li>
                            <li>所有注单将按盘口开出的让球数在玩法的时节结束后结算。 </li>
                            <li>让球队（优势球队）将给出让球，让球数将显示在赔率的左侧，让球队在盘面上也会以粗型字体显示。 </li>
                            <li>让球盘的玩法分为以下几种：</li>
                            <ul style="list-style: lower-alpha">
                                <li>整数让球也或称为让'一球'（如：-1，-2，-3，等）</li>
                                <li>非整数让球也或称为让'半球'（如：-0.5，-1.5，-2.5，等）</li>
                                <li>混合以上让'半球/一球'的方式（如：-0/0.5, -0.5/1, -1/1.5,等）</li>
                            </ul>
                            <p class="b sub">
                                2.1.2. 半场让球盘（亚洲让球盘）</p>
                            <ul style="list-style: decimal;">
                                <li>所有上半场的投注将以上半场45分钟加上任何伤停补时后的赛果结算。 </li>
                                <li>如果赛事在上半场时节因任何理由取消或中断，所有上半场注单将被取消。 </li>
                                <li>如果赛事在下半场或加时时段因任何理由取消或中断，所有上半场注单保持有效。 </li>
                            </ul>
                            <p class="b sub">
                                2.1.3. 滚球让球盘
                            </p>
                            <ul style="list-style: decimal;">
                                <li>所有注单将按盘口开出的让球数在玩法的时节结束后结算。 </li>
                                <li>结算是以投注时到比赛/时节结束后的赛果做裁决。即是以赛事完场比分减去投注当时的比分。上半场的滚球让球投注将以上半场结束后的赛果结算。 </li>
                            </ul>
                        </ul>
                        <p class="b sub">
                            2.2. 大小盘</p>
                        <ul style="margin-left: 25px;">
                            <p class="b sub">
                                2.2.1. 一般规则</p>
                            <ul style="list-style: decimal;">
                                <li>预测赛事总入球数将大于或小于在盘口指定的大/小盘球数。 </li>
                                <li>如果赛事的总入球数多于盘口的大/小盘球数，则为大盘。如果少于盘口的大/小盘球数，则为小盘。 </li>
                                <li>所有注单将按盘口开出的大/小盘球数在玩法的时节结束后结算。 </li>
                                <li>大/小盘的玩法分为以下几种：</li>
                                <ul style="list-style: lower-alpha">
                                    <li>大/小于'一球'（如：2，3，4，等</li>
                                    <li>大/小于'半球'（如：1.5，2.5，3.5，等）</li>
                                    <li>混合以上'半球/一球'的方式（如：1.5/2, 2.5/3, 3.5/4, 等）</li>
                                </ul>
                                <li>如果赛事中断前已有明确结果并且之后没有任何显著会影响赛事结果的情况，大/小盘注单才会被结算。若遇到任何其他情况，注单将一律被取消。请参考以下范例：
                                    <ul style="list-style: lower-alpha">
                                        <li>范例1：会员投注大于2.5球：
                                            <ul style="list-style: lower-roman">
                                                <li>赛事在比分2-1时中断。 </li>
                                                <li>尽管赛事中断，但因结果已经明确并且若之后有任何潜在进球将对盘口结算裁决没有影响，所以此会员注单结算为赢。 </li>
                                            </ul>
                                        </li>
                                        <li>范例2：会员投注小于2.5球：
                                            <ul style="list-style: lower-roman">
                                                <li>赛事在比分2-1时中断。 </li>
                                                <li>尽管赛事中断，但因结果已经明确并且若之后有任何潜在进球将对盘口结算裁决没有影响，所以此会员注单结算为输。 </li>
                                            </ul>
                                        </li>
                                        <li>范例3：会员投注大于3.5球：
                                            <ul style="list-style: lower-roman">
                                                <li>赛事在比分2-1时中断。 </li>
                                                <li>由于赛事在未有明确的结果能裁决会员的注单前中断，此会员的注单将被取消</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <p class="b sub">
                                2.2.2. 半场大小球</p>
                            <ul style="list-style: decimal;">
                                <li>所有上半场的投注将以上半场45分钟加上任何伤停补时后的赛果结算。 </li>
                                <li>如果赛事在上半场时节因任何理由取消或中断，所有上半场注单将被取消。除非在赛事取消或中断前，结果已经明确。 </li>
                                <li>如果赛事在下半场或加时时段因任何理由取消或中断，所有上半场注单保持有效。 </li>
                            </ul>
                            <p class="b sub">
                                2.2.3. 滚球大小盘</p>
                            <ul style="list-style: decimal;">
                                <li>结算是以比赛/时节结束后的总入球数做裁决。投注当时，赛事的比分将视为0-0来计算。 </li>
                            </ul>
                            <p class="b sub">
                                2.2.4. 单一球队大小盘</p>
                            <ul style="list-style: decimal;">
                                <li>预测其中一支球队的总入球数将大于或小于在盘口指定的大/小盘球数。 </li>
                                <li>如果赛事的总入球数多于盘口的大/小盘球数，则为大盘。如果少于盘口的大/小盘球数，则为小盘。 </li>
                                <li>如果赛事中断前已有明确结果并且之后没有任何显著会影响赛事结果的情况，注单才会被结算。若遇到任何其他情况，注单将一律被取消。 </li>
                            </ul>
                        </ul>
                        <p class="b sub">
                            2.3. 1 X 2 （独赢盘）</p>
                        <ul style="margin-left: 25px;">
                            <p class="b sub">
                                2.3.1. 一般规则</p>
                            <ul style="list-style: decimal;">
                                <li>预测哪一支球队将在比赛胜出。盘口提供两支球队和平局为投注选项。 </li>
                                <li>投注将以0-0的比分作为计算基础（让球并不计算在内）。 </li>
                            </ul>
                            <p class="b sub">
                                2.3.2. 半场独赢盘</p>
                            <ul style="list-style: decimal;">
                                <li>所有上半场的投注将以上半场45分钟加上任何伤停补时后的赛果结算。 </li>
                            </ul>
                            <p class="b sub">
                                2.3.3. 滚球独赢盘</p>
                            <ul style="list-style: decimal;">
                                <li>预测滚球时，哪一支球队胜出。 </li>
                                <li>投注的结算将以90分钟完场赛果为准。 </li>
                                <li>以下为滚球独赢盘范例：</li>
                                <table width="100%" border="0" cellspacing="1" cellpadding="0">
                                    <tr class="tabletit">
                                        <th class="center">&nbsp;
                                            
                                        </th>
                                        <th class="center">
                                            目前得分
                                        </th>
                                        <th class="center">
                                            赔率
                                        </th>
                                    </tr>
                                    <tr class="tabledetail">
                                        <td class="center">
                                            阿森纳（主）
                                        </td>
                                        <td class="center">
                                            1
                                        </td>
                                        <td class="center">
                                            1.61
                                        </td>
                                    </tr>
                                    <tr class="tabledetail">
                                        <td class="center">
                                            曼联
                                        </td>
                                        <td class="center">
                                            0
                                        </td>
                                        <td class="center">
                                            6.0
                                        </td>
                                    </tr>
                                    <tr class="tabledetail">
                                        <td class="center">
                                            和局
                                        </td>
                                        <td class="center">&nbsp;
                                            
                                        </td>
                                        <td class="center">
                                            3.8
                                        </td>
                                    </tr>
                                </table>
                                <ul style="list-style: lower-alpha">
                                    <li>范例1：在赛事比分为<u>阿森纳1-0曼联</u>时，会员投注滚球独赢盘– 阿森纳赢:
                                        <ul style="list-style: lower-roman">
                                            <li>完场赛果为阿森纳2-1曼​​联。 </li>
                                            <li>因阿森纳在完场时胜出，所有投注阿森纳的注单结算为赢。 </li>
                                            <li>所有在比分1-0时投注曼联或平局的注单将结算为输。 </li>
                                        </ul>
                                    </li>
                                    <li>范例2：在赛事比分为阿森纳1-0曼联时，会员投注滚球独赢盘–曼联赢:
                                        <ul style="list-style: lower-roman">
                                            <li>完场赛果为阿森纳1-1曼联。 </li>
                                            <li>因完场赛果为平局，所有投注曼联以及阿森纳的注单将结算为输。 </li>
                                            <li>所有投注平局的注单将结算为赢。 </li>
                                        </ul>
                                    </li>
                                </ul>
                                <li>加时赛则视为一场新的赛事并且会开出加时赛盘口。投注将按加时赛时节的结果做结算。 </li>
                            </ul>
                        </ul>
                        <p class="b sub">
                            2.4. 单/双</p>
                        <ul style="list-style: decimal;">
                            <li>预测赛事的总入球数是单数或双数。 </li>
                        </ul>
                        <p class="b sub">
                            2.5. 半场/全场</p>
                        <ul style="list-style: decimal;">
                            <li>预测赛事的半全场结果。 </li>
                        </ul>
                        <p class="b sub">
                            2.6. 双赢盘</p>
                        <ul style="list-style: decimal;">
                            <li>在三种可能出现的赛果中选择两种进行投注; 主场赢或打平（1和X）, 客场赢或打平（2和X）或主场或客场赢（1和2）。 </li>
                            <li>共有三种选择: 1 X, X 2, 1 2
                                <ul style="list-style: lower-alpha">
                                    <li>"1" 代表: 主场赢</li>
                                    <li>"X" 代表: 平手 </li>
                                    <li>"2" 代表: 客场赢</li>
                                </ul>
                            </li>
                            <li>如果比赛在中立场进行﹐列在盘面的上方球队则被视为主队。 </li>
                        </ul>
                        <p class="b sub">
                            2.7. 平局退单</p>
                        <ul style="list-style: decimal;">
                            <li>预测哪一支球队将在比赛胜出。但若比赛结果为平局，所有投注将被取消。 </li>
                        </ul>
                        <a name="GoalMarkets"></a>
                        <p style="margin-left: -60px;">
                            <div class="quick_link">
                                进球</div>
                        </p>
                        <p class="b sub">
                            2.8. 总入球数</p>
                        <ul style="list-style: decimal;">
                            <ul style="margin-left: 25px;">
                                <p class="b sub">
                                    2.8.1. 总入球数 – 全场</p>
                                <ul style="list-style: decimal;">
                                    <li>预测两队的总入球数。 </li>
                                    <li>如果赛事中断前，注单已得到明确结果并且之后没有任何显著会影响赛事结果的情况注单会有被结算 。若遇到任何其他情况，注单将一律被取消。 </li>
                                </ul>
                                <p class="b sub">
                                    2.8.2. 总入球数 – 半场</p>
                                <ul style="list-style: decimal;">
                                    <li>预测半场两队的总入球数。</li>
                                    <li>如果赛事中断前，注单已得到明确结果并且之后没有任何显著会影响赛事结果的情况注单会有被结算。</li>
                                </ul>
                            </ul>
                        </ul>
                        <p class="b sub">
                            2.9. 单一球队总入球数</p>
                        <ul style="list-style: decimal;">
                            <li>预测其中一支球队的总入球数。 </li>
                            <li>如果赛事中断前，注单已得到明确结果并且之后没有任何显著会影响赛事结果的情况注单会有被结算 。若遇到任何其他情况，注单将一律被取消。</li>
                        </ul>
                        <p class="b sub">
                            2.10. 波胆</p>
                        <ul style="list-style: decimal;">
                            <li>预测一场特定赛事中相关时间段的准确比分。 </li>
                            <li>"任何其他比分"是指任何的比分，而不是一个市场选项列表类型。 </li>
                            <ul style="margin-left: 25px;">
                                <p class="b sub">
                                    2.10.1. 波胆—全场</p>
                                <ul style="list-style: decimal;">
                                    <li>预测一场特定赛事的全场准确比分。 </li>
                                    <li>
                                    全场波胆投注的结算根据90分钟（不包括加时赛或点球赛）完场比分做出裁决。
                                    <li>如赛事中断，暂停或者延后，潜在进球并不影响最终结果的注单依然视为有效。潜在进球并不影响最终结果的注单依然视为有效。 </li>
                                </ul>
                                <p class="b sub">
                                    2.10.2. 波胆—半场</p>
                                <ul style="list-style: decimal;">
                                    <li>预测一场特定赛事半场的准确比分。 </li>
                                    <li>半场波胆投注是指投注上半场的比赛，投注的结算根据半场"45分钟"结束后的比分做出裁决，包括伤停补时。 </li>
                                    <li>如果赛事在上半场取消，潜在进球并不影响最终结果的注单依然视为有效。</li>
                                    <li>如果赛事在下半场取消，所有半场波胆的投注被视为有效。 </li>
                                </ul>
                            </ul>
                            </li>
                        </ul>
                        <p class="b sub">
                            2.11. 净胜球</p>
                        <ul style="list-style: decimal;">
                            <li>投注的结算根据90分钟（不包括加时赛以及点球赛）完场赛事比分的差别做裁决。 </li>
                            <li>如果赛事在法定比赛90分钟内的任何时间中断，所有注单将被取消。 </li>
                        </ul>
                        <p class="b sub">
                            2.12. 最先/最后进球球队</p>
                        <ul style="list-style: decimal;">
                            <li>在法定比赛90分钟内，预测最先或最后进球的球队。 </li>
                            <li>乌龙球将予以计算为得分那方入球。比如: A队VS B队，B 队踢进一个乌龙球造成比分1-0，此球计为A队先进球。 </li>
                            <li>如果赛事在有进球后中断，所有最先进球球队注单保持有效。 </li>
                            <li>如果赛事中断，所有最后进球球队注单将被取消。 </li>
                        </ul>
                        <p class="b sub">
                            2.13. 双方/一方/没有球队进球</p>
                        <ul style="list-style: decimal;">
                            <li>预测双方还是一方球队在90分钟完场时间内（不包括加时赛及点球赛）是否进球。或任何一方都没有进球。 </li>
                            <li>如果赛事在双方球队都有进球后中断，所有注单保持有效。 </li>
                            <li>如果赛事在没有进球前中断或延后，所有注单将被取消。 </li>
                            <li>乌龙球将予以计算为得分那方入球。 </li>
                        </ul>
                        <p class="b sub">
                            2.14. 双半场进球</p>
                        <ul style="list-style: decimal;">
                            <li>预测主队/客队在90分钟完场时间内（不包括加时赛及点球赛）是否在上半场或下半场都至少进一球。 </li>
                            <li>如果投注的球队只在其中一个半场进球或没有进球，注单将结算为输。 </li>
                            <li>如果赛事在所投注的球队已在两个半场都进球后中断，所有投注此球队的注单将结算为赢。 </li>
                            <li>如果赛事在下半场中断，并且所投注的球队并未在上半场进球，所有投注此球队的注单将结算为输。 </li>
                        </ul>
                        <p class="b sub">
                            2.15. 无失球</p>
                        <ul style="list-style: decimal;">
                            <li>预测您投注的球队在90分钟完场时间内（不包括加时赛及点球赛）没有失球及没让敌方攻入任何一球。 </li>
                            <li>'无失球'是指球队在赛事中没让敌方攻入任何一球，争取完美防守。 </li>
                        </ul>
                        <p class="b sub">
                            2.16. 滚球-下一支进球球队</p>
                        <ul style="list-style: decimal;">
                            <li>预测在比赛进行时，哪一支球队会进下一个球。 </li>
                            <li>投注将以90分钟（不包括加时赛以及点球赛）滚球时间为准。 </li>
                            <li>加时赛则视为一场新的赛事并且会开出加时赛盘口。 </li>
                            <li>如果投注之后没有进球，注单将被取消。 </li>
                            <li>乌龙球将予以计算为得分那方入球。 </li>
                        </ul>
                        <p class="b sub">
                            2.17. 哪个半场最多进球</p>
                        <ul style="list-style: decimal;">
                            <li>预测在90分钟完场时间内（不包括加时赛及点球赛）哪个半场将会进最多球。 </li>
                            <li>选项可列为：
                                <ul style="list-style: lower-alpha">
                                    <li>上半场</li>
                                    <li>下半场</li>
                                    <li>平局</li>
                                </ul>
                            </li>
                        </ul>
                        <p class="b sub">
                            2.18. 先进2球/3球的一方</p>
                        <ul style="list-style: decimal;">
                            <li>预测在90分钟完场时间内（不包括加时赛及点球赛）哪个球队先进2/3球。 </li>
                            <li>如果赛事在一方球队已经进2/3球后中断，所有注单将保持有效。 </li>
                        </ul>
                        <p class="b sub">
                            2.19. 首个进球方式</p>
                        <ul style="list-style: decimal;">
                            <li>预测首个进球的方式。 </li>
                            <li>如果赛事在首个进球后中断，所有首个进球方式的注单将保持有效。 </li>
                            <li>选项可列为：
                                <ul style="list-style: lower-alpha">
                                    <li><strong>任意球：</strong>球必须是直接踢进的方式。间接行的任意球如果最后是罚球者本人踢进则计算在内。 </li>
                                    <li><strong>点球：</strong>球必须是由罚球者本人直接踢进的方式。若遇到补射的情况，即使是罚球者本人踢进也将不计算在内。 </li>
                                    <li><strong>乌龙球：</strong>球必须授予为乌龙球。 </li>
                                    <li><strong>头球：</strong>进球者必须明确的用头进球。 </li>
                                    <li><strong>射门：</strong>所有其他的进球方式。除了以上所列出的方式，所有其他进球的方式都包含在此方式。 </li>
                                    <li><strong>没有进球：</strong>赛事没有进球。 </li>
                                </ul>
                            </li>
                        </ul>
                        <p class="b sub">
                            2.20. 首个进球时间</p>
                        <ul style="list-style: decimal;">
                            <li>预测在90分钟完场时间内（不包括加时赛及点球赛）首个进球时间。 </li>
                            <li>选项可列为：
                                <ul style="list-style: lower-alpha">
                                    <li>赛事的第26分钟或之前</li>
                                    <li>第27分钟后</li>
                                    <li>没有进球</li>
                                </ul>
                            </li>
                            <li>出于结算的用意，赛事的第一分钟是从1秒计算到59秒。第二分钟则是从1分钟计算到1分59秒，以此类推。 </li>
                            <li>范例：如果投注首个进球时间的选项是'赛事的第26分钟或之前'，而确实进球的时间为26分钟49秒，进球的范围属于'第27分钟后'，因此投注将结算为输。 </li>
                            <li>如果赛事在首个进球后中断，所有首个进球时间的注单将保持有效。 </li>
                            <li>如果赛事在没有进球前中断，所有首个进球时间的注单将被取消。 </li>
                            <li>乌龙球将予以计算在内。裁判判定无效的进球是将不予以计算在内。 </li>
                        </ul>
                        <a name="PlayersMarkets"></a>
                        <p style="margin-left: -60px;">
                            <div class="quick_link">
                                球员</div>
                        </p>
                        <p class="b sub">
                            2.21. 最先/最后进球球员</p>
                        <ul style="list-style: decimal;">
                            <li>按盘口提供的球员出场名单中，预测在90分钟完场时间内最先或最后入球的球员。 </li>
                            <li>乌龙球不计于最先或最后进的球。如果出现乌龙球，下一个或之前的进球才被视为有效。 </li>
                            <li>如果赛事唯一的进球是乌龙球，盘口上"其他"的选项将结算为赢。 </li>
                            <li>如果投注的最先进球球员没有参与该场赛事或在第一个进球后才进场，注单将被取消。 </li>
                            <li>如果投注的最先进球球员在没有射入第一个球就被罚下场或被其他球员替代，注单将结算为输。 </li>
                            <li>任何参赛并且上场的球员都可能是最后进球球员。 </li>
                            <li>如果赛事在射入第一个球后中断，所有投注最先进球球员的注单将保持有效。投注最后进球球员的注单将被取消。 </li>
                            <li>如果赛事在没有进球前中断，所有投注最先进球球员的注单将被取消。 </li>
                        </ul>
                        <p class="b sub">
                            2.22. 进球球员</p>
                        <ul style="list-style: decimal;">
                            <li>按盘口提供的球员出场名单中，预测在90分钟完场时间内哪位球员会进球。 </li>
                            <li>如果投注的球员没有参与该场赛事，注单将被取消。 </li>
                            <li>只要球员在比赛的90分钟完场时间内有上场参与比赛，注单则视为有效。 </li>
                            <li>如果赛事在已有球员进球后中断，所有投注进球球员的注单将保持有效。 </li>
                            <li>乌龙球，加时赛进球和点球都不计于此玩法。 </li>
                        </ul>
                        <p class="b sub">
                            2.23. 球员进球数</p>
                        <ul style="list-style: decimal;">
                            <li>预测当选的两位球员里，哪一位球员在90分钟完场时间内（不包括加时赛及点球赛）进最多球。 </li>
                            <li>双方球员都必须是比赛先发的1​​1名球员当中注单才视为有效。 </li>
                            <li>提供的盘口仅限于球员将参与的指定比赛以及比赛日期。 </li>
                            <li>乌龙球将不计算在内。 </li>
                            <li>个别玩法投注规则：
                                <ul style="list-style: lower-alpha">
                                    <li>独赢1X2：预测当选的两位球员里，哪位进最多球。如果双方球员进球数一致，投注平局选项的注单将结算为赢。以平局胜出也包括双方球员均无进球的情况。 </li>
                                    <li>让球：预测在计算让球数后，哪位球员进最多球。 </li>
                                    <li>大/小球：预测两位球员的总进球数是否大于或小于大/小盘球数。 </li>
                                </ul>
                            </li>
                        </ul>
                        <a name="Specials"></a>
                        <p style="margin-left: -60px;">
                            <div class="quick_link">
                                特别</div>
                        </p>
                        <p class="b sub">
                            2.24. 先开球球队</p>
                        <ul style="list-style: decimal;">
                            <li>预测在比赛先开球的球队。 </li>
                            <li>如果赛事在开踢后中断，所有投注先开球球队的注单将保持有效。 </li>
                        </ul>
                        <p class="b sub">
                            2.25. 胜出方式</p>
                        <ul style="list-style: decimal;">
                            <li>投注的结算按赛事最终（90分钟完场时间，加时赛或点球赛后）获胜者做裁决。 </li>
                            <li>该盘口只限于锦标赛赛事。 </li>
                        </ul>
                        <p class="b sub">
                            2.26. 晋级方式</p>
                        <ul style="list-style: decimal;">
                            <li>投注的结算按两场赛事的总比分做裁决。此玩法的结算也会顾及客场进球规则。 </li>
                            <li>结算准则包括加时赛以及点球赛。 </li>
                            <li>该盘口只限于主客场两场赛制的比赛。 </li>
                        </ul>
                        <p class="b sub">
                            2.27. 上下半场均胜出</p>
                        <ul style="list-style: decimal;">
                            <li>预测选择的球队在90分钟完场时间内（不包括加时赛及点球赛）是否在上半场和下半场的进球数多于对手。 </li>
                            <li>如果赛事中断，所有注单将被取消。 </li>
                            <li>如果任何一个半场或上/下半场的结果是平局或没有进球，所有注单将结算为输。 </li>
                        </ul>
                        <p class="b sub">
                            2.28. 任何一个半场胜出</p>
                        <ul style="list-style: decimal;">
                            <li>预测选择的球队在90分钟完场时间内（不包括加时赛及点球赛）是否在上/下半场的其中一个半场进球数多于对手。 </li>
                            <li>如果赛事在下半场中断，并且已经有一球队在上半场获胜，注单将视为有效，如果双方球队在上半场平局，注单将视为无效。如果赛事在下半场中断，但在上半场其中一方球队已经获胜，注单将保持有效。如果两支球队在上半场平局，注单将被取消。
                            </li>
                            <li>如赛事出现平局或上下半场均无进球，所有注单将视为输，然而如双方球队各赢半场，则投注两个球队注单为赢。如果上/下半场的结果是平局或没有进球，所有注单将结算为输。如果两个球队都在其中一个半场获胜，
                                注单将结算为赢。 </li>
                        </ul>
                        <p class="b sub">
                            2.29. 反败为胜</p>
                        <ul style="list-style: decimal;">
                            <li>预测您所选球队是否能在赛事过程中任何阶段为输但最终为赢（90分钟完场加任何加时）。</li>
                            <li>所选球队必须在赛事过程中的任何阶段为输但在90分钟完场加任何伤停补时后赢得比赛。</li>
                            <li>若赛事取消，所有注单将视为无效。</li>
                        </ul>
                        <p class="b sub">
                            2.30. 往目标射正的总次数</p>
                        <ul style="list-style: decimal;">
                            <li>预测在90分钟完场时间内（不包括加时赛及点球赛）两个球队往目标射正的总次数。 </li>
                            <li>注单的结算将根据官方赛果或赛事权威机构判定的结果为准。 </li>
                        </ul>
                        <p class="b sub">
                            2.31. 半场伤停补时时间预测</p>
                        <ul style="list-style: decimal;">
                            <li>预测半场结束伤停补时具体时间。 </li>
                            <li>所有注单结算将会按照半场结束后第四裁判举牌补时的时间为准。 </li>
                            <li>预测伤停补时时间，只计算在官方正常90分钟赛事内的补时，加时赛将不包含在内。
                                <!--ul-->
                                <p class="b sub">
                                    2.31.1. 上半场伤停补时大小盘</p>
                                <ul style="list-style: decimal;">
                                    <li>预测上半场官方时间45分钟后的伤停补时时间。 </li>
                                    <li>如果补时总时间，多于盘口的大/小盘时间，则为大盘。如果少于盘口的大/小盘时间，则为小盘。 </li>
                                    <li>所有注单结算将会按照第四裁判举牌补时时间为准，在赛事正常45分钟结束后确定的补时时间。 </li>
                                    <li>如果赛事在官方时间45分钟之内中断，所有投注上半场伤停补时注单将会取消。 </li>
                                    <li>如果赛事是在上半场比赛确认结束后取消，所有投注上半场伤停补时将会被视为有效的。 </li>
                                </ul>
                                <p class="b sub">
                                    2.31.2. 下半场伤停补时大小盘</p>
                                <ul style="list-style: decimal;">
                                    <li>预测下半场的伤停补时时间。 </li>
                                    <li>如果补时总时间，多于盘口的大/小盘时间，则为大盘。如果少于盘口的大/小盘时间，则为小盘。 </li>
                                    <li>所有注单结算将会按照第四裁判举牌补时时间为准，在赛事正常90分钟结束后确定的补时时间。 </li>
                                    <li>如果赛事在官方时间90分钟之内中断，所有投注下半场伤停补时注单将会取消。 </li>
                                </ul>
                                <p class="b sub">
                                    2.31.3. 双半场总伤停补时—大/小盘</p>
                                <ul style="list-style: decimal;">
                                    <li>预测上半场和下半场的伤停补时时间。 </li>
                                    <li>一旦赛事在官方时间90分钟完成，总伤停补时将会以上半场和下半场伤停补时之和为结果</li>
                                    <li>如果伤停补时时间多于盘口的大/小盘时间，则为大盘；如果少于盘口的大/小盘时间，则为小盘。 </li>
                                    <li>如果赛事在官方时间90分钟之内取消，所有投注双半场总伤停补时的注单将会取消。 </li>
                                </ul>
                        </ul>
                        </li>
                    </ul>
                    <p class="b sub">
                        2.32. 特殊的15分钟大/小盘</p>
                    <ul style="list-style: decimal;">
                        <li>预测总进球数在指定的15分钟时节内将大于或小于在盘口指定的大/小盘牌数。 </li>
                        <li>如果总进球数多于盘口的大/小盘牌数，则为大盘。如果少于盘口的大/小盘牌数，则为小盘。 </li>
                        <li>特殊的15分钟大小盘，是按赛事每15分钟时节内所进得球数为准，不包括赛事的第45分钟（视为半场时节）或第90分钟。 </li>
                        <li>注单的结算是以实际进球时间为准。 </li>
                        <li>如果赛事在某个15分钟的时节内中断，所有投注在此15分钟时节的注单将被取消。 </li>
                        <li>所有注单将按盘口开出的大小球数在玩法的时节结束后结算。 </li>
                        <li>大/小盘的玩法分为以下几种：</li>
                        <ul style="list-style: lower-alpha">
                            <li>大/小于'一球'（如：2，3，4，等）</li>
                            <li>大/小于'半球'（如：1.5，2.5，3.5，等）</li>
                            <li>混合以上'半球/一球'的方式（如：1.5/2, 2.5/3, 3.5/4, 等）</li>
                        </ul>
                        <li>出于结算的用意，赛事的第一分钟是从1秒计算到59秒。第二分钟则是从1分钟计算到1分59秒，以此类推。
                            <br />
                            例如：
                            <ul style="margin-left: 25px;">
                                投注赛事开始到第15分钟的时节
                                <ul style="list-style: square">
                                    <li>开始 – 比赛开踢时</li>
                                    <li>结束 - 第14分钟59秒</li>
                                </ul>
                                投注第15分钟到第30分钟的时节
                                <ul style="list-style: square">
                                    <li>开始 – 15分钟01秒</li>
                                    <li>结束 - 第29分钟59秒</li>
                                </ul>
                            </ul>
                        </li>
                    </ul>
                    <p class="b sub">
                        2.33. 特殊的10分钟大/小盘</p>
                    <ul style="list-style: decimal;">
                        <li>预测总进球数在指定的10分钟时节内将大于或小于在盘口指定的大/小盘牌数。 </li>
                        <li>如果总进球数多于盘口的大/小盘牌数，则为大盘。如果少于盘口的大/小盘牌数，则为小盘。 </li>
                        <li>特殊的10分钟大小盘，是按赛事每10分钟时节内所进得球数为准，</li>
                        <li>注单的结算是以实际进球时间为准。 </li>
                        <li>如果赛事在某个10分钟的时节内中断，所有投注在此10分钟时节的注单将被取消。 </li>
                        <li>所有注单将按盘口开出的大小球数在玩法的时节结束后结算。 </li>
                        <li>大/小盘的玩法分为以下几种：</li>
                        <ul style="list-style: lower-alpha">
                            <li>大/小于'一球'（如：2，3，4，等）</li>
                            <li>大/小于'半球'（如：1.5，2.5，3.5，等）</li>
                            <li>混合以上'半球/一球'的方式（如：1.5/2, 2.5/3, 3.5/4, 等）</li>
                        </ul>
                        <li>出于结算的用意，赛事的第一分钟是从1秒计算到59秒。第二分钟则是从1分钟计算到1分59秒，以此类推。
                            <br />
                            例如：
                            <ul style="margin-left: 25px;">
                                投注赛事开始到第10分钟的时节
                                <ul style="list-style: square">
                                    <li>开始 – 比赛开踢时</li>
                                    <li>结束 - 第9分钟59秒</li>
                                </ul>
                                投注第10分钟到第20分钟的时节
                                <ul style="list-style: square">
                                    <li>开始 – 10分钟01秒</li>
                                    <li>结束 - 第19分钟59秒</li>
                                </ul>
                            </ul>
                        </li>
                    </ul>
                    <a name="Corners"></a>
                    <p style="margin-left: -60px;">
                        <div class="quick_link">
                            角球</div>
                    </p>
                    <p class="b sub">
                        2.34. 角球</p>
                    以下列出所提供的个别角球玩法规则。
                    <ul style="margin-left: 25px;">
                        <p class="b sub">
                            2.34.1. 角球：一般规则</p>
                        <ul style="list-style: decimal;">
                            <li>被裁定但并未实际执行的角球将不予以计算在内。 </li>
                            <li>注单的结算将根据官方赛果或赛事权威机构判定的结果为准。 </li>
                            <li>如果角球需重新进行(例如，在禁区内犯规)，重新进行的角球仍计为同一个角球。 </li>
                        </ul>
                        <p class="b sub">
                            2.34.2. 角球：让球盘</p>
                        <ul style="list-style: decimal;">
                            <li>预测在90分钟完场时间内（不包括加时赛及点球赛）哪一支球队在盘口指定的让球数获得最多角球。 </li>
                            <li>所有注单将按盘口开出的让球数在玩法的时节结束后结算。 </li>
                        </ul>
                        <p class="b sub">
                            2.34.3. 角球：大小盘</p>
                        <ul style="list-style: decimal;">
                            <li>预测总获得的角球将大于或小于在盘口指定的大/小盘球数。 </li>
                            <li>如果赛事获得的总角球数多于盘口的大/小盘球数，则为大盘。如果少于盘口的大/小盘球数，则为小盘。 </li>
                            <li>如果赛事中断前已有明确结果并且之后没有任何显著会影响投注结果的情况，角球的大/小盘注单才会被结算。若遇到任何其他情况，注单将一律被取消。 </li>
                        </ul>
                        <p class="b sub">
                            2.34.4. 第一/最后一个角球</p>
                        <ul style="list-style: decimal;">
                            <li>预测在90分钟完场时间内，第一或最后获得角球的球队。 </li>
                            <li>如果赛事在获得第一个角球后中断，所有第一个角球的注单将保持有效。 </li>
                            <li>如果赛事中断，所有最后一个角球的注单将被取消。 </li>
                            <li>如果在投注的玩法时节内并未获得角球，所有第一和最后一个角球的注单将被取消。 </li>
                        </ul>
                        <p class="b sub">
                            2.34.5. 哪个半场角球数最多</p>
                        <ul style="list-style: decimal;">
                            <li>预测在90分钟完场时间内（不包括加时赛及点球赛）哪个半场将会获得最多角球。 </li>
                            <li>如果赛事中断前已有明确结果并且之后没有任何显著会影响赛事结果的情况，注单才会被结算。若遇到任何其他情况，注单将一律被取消。 </li>
                        </ul>
                        <p class="b sub">
                            2.34.6. 首个角球时间</p>
                        <ul style="list-style: decimal;">
                            <li>预测获得首个角球的时间。 </li>
                            <li>选项可列为：
                                <ul style="list-style: lower-alpha">
                                    <li>赛事的第8分钟或之前</li>
                                    <li>第9分钟后</li>
                                </ul>
                            </li>
                            <li>出于结算的用意，赛事的第一分钟是从1秒计算到59秒。第二分钟则是从1分钟计算到1分59秒，以此类推。 </li>
                            <li>范例：如果投注首个角球时间的选项是'赛事的第8分钟或之前'，而确实踢角球的时间为8分钟49秒，踢角球时间的范围属于'第9分钟后'，因此投注将结算为输。
                            </li>
                            <li>如果赛事在获得第一个角球后中断，所有首个角球时间的注单将保持有效。 </li>
                            <li>如果赛事在没有获得角球前中断，所有首个角球时间的注单将被取消。 </li>
                            <li>如果在90分钟完场时间内并未获得角球，所有首个角球时间的注单将被取消。 </li>
                            <li>如果首个角球需重新进行，那首个角球时间将以重新进行的角球时间为准。 </li>
                        </ul>
                    </ul>
                    <a name="BookingsCards"></a>
                    <p style="margin-left: -60px;">
                        <div class="quick_link">
                            牌/卡</div>
                    </p>
                    <p class="b sub">
                        2.35. 罚牌</p>
                    以下列出所提供的个别罚牌玩法规则。
                    <ul style="margin-left: 25px;">
                        <p class="b sub">
                            2.35.1. 罚牌：一般规则</p>
                        <ul style="list-style: decimal;">
                            <li>针对非球员（例如：教练，没有比赛中替补出场的替补球员，管理人员等等）出示的任何罚牌将不计算在内。 </li>
                            <li>黄卡将占1分，红卡占2分。如果球员获发两张黄卡，此球员所获发的总罚球数将计算为黄卡占1分以及红卡占2分，总分三分。 （单场赛事每个球员最高可计3分）</li>
                            <li>注单的结算将根据官方赛果或赛事权威机构判定的结果为准。 </li>
                        </ul>
                        <p class="b sub">
                            2.35.2. 罚牌:让分盘（亚洲让分）</p>
                        <ul style="list-style: decimal;">
                            <li>预测在90分钟完场时间内（不包括加时赛及点球赛）哪一支球队在盘口指定的让球数获发最多罚牌。 </li>
                            <li>所有注单将按盘口开出的让球数在玩法的时节结束后结算。 </li>
                        </ul>
                        <p class="b sub">
                            2.35.3. 总罚牌: 大小盘</p>
                        <ul style="list-style: decimal;">
                            <li>预测总出示的罚牌将大于或小于在盘口指定的大/小盘牌数。 </li>
                            <li>如果出示的总罚牌数多于盘口的大/小盘牌数，则为大盘。如果少于盘口的大/小盘牌数，则为小盘。 </li>
                            <li>如果赛事中断前已有明确结果并且之后没有任何显著会影响投注结果的情况，总罚牌的大/小盘注单才会被结算。若遇到任何其他情况，注单将一律被取消。 </li>
                        </ul>
                        <p class="b sub">
                            2.35.4. 首个罚牌/最后一个罚牌</p>
                        <ul style="list-style: decimal;">
                            <li>预测在90分钟完场时间内（不包括加时赛及点球赛）主队或客队里的球员是否会收到首个或最后一个罚牌（黄卡或红卡）。 </li>
                            <li>如果两位或以上球员因一个事件获发罚牌，首先被裁判员出示黄卡或红卡的球员，将被视为"优胜者"为注单进行结算</li>
                            <li>针对非球员（例如：教练，没有比赛中替补出场的替补球员，管理人员等等）出示的任何罚牌将不计算在内。 </li>
                            <li>如果赛事在出示首个罚牌后中断，所有首个罚牌的注单将保持有效。 </li>
                            <li>如果赛事在出示首个罚牌后中断，所有最后一个罚牌的注单将被取消。 </li>
                            <li>如果赛事在没有出示任何罚牌前中断，所有首个和最后一个罚牌的注单将被取消。 </li>
                            <li>如果在90分钟完场时间内并未出示任何罚牌，所有首个和最后一个罚牌的注单将被取消。 </li>
                        </ul>
                        <p class="b sub">
                            2.35.5. 罚牌最多的球队</p>
                        <ul style="list-style: decimal;">
                            <li>预测哪一支球队将由获收的罚牌累积最多分数。 </li>
                            <li>注单将按照90分钟完场赛事时间内（不包括加时赛及点球赛）所获收的黄卡和红卡累积最高分数的球队做结算</li>
                            <li>选项可列为：
                                <ul style="list-style: lower-alpha">
                                    <li>球队A</li>
                                    <li>球队B</li>
                                    <li>平局</li>
                                </ul>
                            </li>
                        </ul>
                        <p class="b sub">
                            2.35.6. 第一张罚牌时间</p>
                        <ul style="list-style: decimal;">
                            <li>预测出示首个罚牌的时间。 </li>
                            <li>选项可列为:</li>
                            <ul style="list-style: lower-alpha">
                                <li>赛事的第8分钟或之前</li>
                                <li>第9分钟后</li>
                            </ul>
                            <li>出于结算的用意，赛事的第一分钟是从1秒计算到59秒。第二分钟则是从1分钟计算到1分59秒，以此类推。 </li>
                            <li>范例：如果投注第一张罚牌时间的选项是'赛事的第8分钟或之前'，而确实出示罚牌的时间为8分钟49秒，罚牌出示时间的范围属于'第9分钟后'，因此投注将结算为输。
                            </li>
                            <li>针对非球员（例如：教练，没有比赛中替补出场的替补球员，管理人员等等）出示的任何罚牌将不计算在内。 </li>
                            <li>如果赛事在出示首个罚牌后中断，所有第一张罚牌时间的注单将保持有效。 </li>
                            <li>如果赛事在没有出示任何罚牌前中断，所有第一张罚牌时间的注单将被取消。 </li>
                            <li>如果在90分钟完场时间内并未出示任何罚牌，所有第一张罚牌时间的注单将被取消。 </li>
                        </ul>
                        <p class="b sub">
                            2.35.7. 是否出示红卡</p>
                        <ul style="list-style: decimal;">
                            <li>预测在90分钟完场时间内（不包括加时赛及点球赛）是否会出示红卡。 </li>
                            <li>针对非球员（例如：教练，没有比赛中替补出场的替补球员，管理人员等等）出示的任何罚牌将不计算在内。 </li>
                            <li>如果赛事在出示一个红卡后中断, 所有是否出示红卡的注单将保持有效。 </li>
                            <li>如果赛事在没有红卡出示前中断， 所有是否出示红卡的注单将被取消。 </li>
                        </ul>
                    </ul>
                    <a name="FreeKicks"></a>
                    <p style="margin-left: -60px;">
                        <div class="quick_link">
                            任意球</div>
                    </p>
                    <p class="b sub">
                        2.36. 任意球</p>
                    以下列出所提供的个别任意球玩法规则。
                    <ul style="margin-left: 25px;">
                        <p class="b sub">
                            2.36.1. 任意球：一般规则</p>
                        <ul style="list-style: decimal;">
                            <li>出于结算的用意，任意球只有在实际发出后才计算在内。 </li>
                            <li>任意球指的是直接任意球和间接性任意球。任意球不包括点球，球门球或争球。 </li>
                            <li>如果任意球需重新进行，重新进行的任意球仍计为一个任意球而不算两个。 </li>
                            <li>注单的结算将根据官方赛果或赛事权威机构判定的结果为准。 </li>
                        </ul>
                        <p class="b sub">
                            2.36.2. 任意球：让球盘</p>
                        <ul style="list-style: decimal;">
                            <li>预测在90分钟完场时间内（不包括加时赛及点球赛）哪一支球队在盘口指定的让球数发出最多任意球。 </li>
                            <li>所有注单将按盘口开出的让球数在玩法的时节结束后结算。 </li>
                        </ul>
                        <p class="b sub">
                            2.36.3. 总任意球：大小盘</p>
                        <ul style="list-style: decimal;">
                            <li>预测总发出的任意球数将大于或小于在盘口指定的大/小盘牌数。 </li>
                            <li>如果发出的总任意球数多于盘口的大/小盘牌数，则为大盘。如果少于盘口的大/小盘牌数，则为小盘。 </li>
                            <li>如果赛事中断前已有明确结果并且之后没有任何显著会影响投注结果的情况，总任意球的大/小盘注单才会被结算。若遇到任何其他情况，注单将一律被取消。 </li>
                        </ul>
                        <p class="b sub">
                            2.36.4. 第一/最后一个任意球</p>
                        <ul style="list-style: decimal;">
                            <li>预测在90分钟完场时间内（不包括加时赛及点球赛）哪个球队会发出第一或最后一个任意球。 </li>
                            <li>如果赛事在发出第一个任意球后中断，所有第一个任意球的注单将保持有效。 </li>
                            <li>如果赛事在发出第一个任意球后中断，所有最后一个任意球的注单将被取消。 </li>
                            <li>如果赛事在没有发出任何任意球前中断，所有第一个和最后一个任意球的注单将被取消。 </li>
                            <li>如果在90分钟完场时间内并未发出任何任意球，所有第一个和最后一个任意球的注单将被取消。 </li>
                        </ul>
                        <p class="b sub">
                            2.36.5. 最多任意球球队</p>
                        <ul style="list-style: decimal;">
                            <li>预测哪一支球队将发出最多任意球。 </li>
                            <li>注单将按照90分钟完场赛事时间内（不包括加时赛及点球赛）发出最多任意球的球队做结算。 </li>
                            <li>选项可列为：
                                <ul style="list-style: lower-alpha">
                                    <li>球队A</li>
                                    <li>球队B</li>
                                    <li>平局</li>
                                </ul>
                            </li>
                        </ul>
                        <p class="b sub">
                            2.36.6. 首个任意球时间</p>
                        <ul style="list-style: decimal;">
                            <li>预测发出首个任意球的时间。 </li>
                            <li>选项可列为:
                                <ul style="list-style: lower-alpha">
                                    <li>赛事的第8分钟或之前</li>
                                    <li>第9分钟后</li>
                                </ul>
                            </li>
                            <li>出于结算的用意，赛事的第一分钟是从1秒计算到59秒。第二分钟则是从1分钟计算到1分59秒，以此类推。 </li>
                            <li>范例：如果投注首个任意球时间的选项是'赛事的第8分钟或之前'，而确实发出任意球的时间为8分钟49秒，任意球发出时间的范围属于'第9分钟后'，因此投注将结算为输。
                            </li>
                            <li>如果赛事在发出第一个任意球后中断，所有首个任意球时间的注单将保持有效。 </li>
                            <li>如果赛事在发出第一个任意球前中断，所有首个任意球时间的注单将被取消。 </li>
                            <li>如果在90分钟完场时间内并未发出任何任意球，所有首个任意球时间的注单将被取消。 </li>
                        </ul>
                    </ul>
                    <a name="GoalKicks"></a>
                    <p style="margin-left: -60px;">
                        <div class="quick_link">
                            射门</div>
                    </p>
                    <p class="b sub">
                        2.37. 球门球</p>
                    <p>
                        以下列出所提供的个别球门球玩法规则。
                    </p>
                    <ul style="margin-left: 25px;">
                        <p class="b sub">
                            2.37.1. 球门球：一般规则</p>
                        <ul style="list-style: decimal;">
                            <li>出于结算的用意，球门球只有在实际发出后才计算在内。 </li>
                            <li>球门球是在进攻方的球员接触到球后导致球越过球门线的情况下判给防守方的。守门员成功防守后重新开赛所踢的球门球将不计算在内。 </li>
                            <li>例如：A队球员进攻B队球门，球没能射入球门并且在B队球员未接触到球的情况下越过了球门线。就此情况，球门球将判给B队。 </li>
                            <li>如果球门球需重新进行，重新进行的球门球仍计为一个球门球而不算两个。 </li>
                            <li>注单的结算将根据官方赛果或赛事权威机构判定的结果为准。 </li>
                        </ul>
                        <p class="b sub">
                            2.37.2. 球门球：让球盘</p>
                        <ul style="list-style: decimal;">
                            <li>预测在90分钟完场时间内（不包括加时赛及点球赛）哪一支球队在盘口指定的让球数发出最多球门球。 </li>
                            <li>所有注单将按盘口开出的让球数在玩法的时节结束后结算。 </li>
                        </ul>
                        <p class="b sub">
                            2.37.3. 总球门球：大小盘</p>
                        <ul style="list-style: decimal;">
                            <li>预测总发出的球门球数将大于或小于在盘口指定的大/小盘牌数。 </li>
                            <li>如果发出的总球门球数多于盘口的大/小盘牌数，则为大盘。如果少于盘口的大/小盘牌数，则为小盘。 </li>
                            <li>如果赛事中断前已有明确结果并且之后没有任何显著会影响投注结果的情况，总球门球的大/小盘注单才会被结算。若遇到任何其他情况，注单将一律被取消。 </li>
                        </ul>
                        <p class="b sub">
                            2.37.4. 第一/最后一个球门球</p>
                        <ul style="list-style: decimal;">
                            <li>预测在90分钟完场时间内（不包括加时赛及点球赛）哪个球队会发出第一或最后一个球门球。 </li>
                            <li>如果赛事在发出第一个球门球后中断，所有第一个球门球的注单将保持有效。 </li>
                            <li>如果赛事在发出第一个球门球后中断，所有最后一个球门球的注单将被取消。 </li>
                            <li>如果赛事在没有发出任何球门球前中断，所有第一个和最后一个球门球的注单将被取消。 </li>
                            <li>如果在90分钟完场时间内并未发出任何球门球，所有第一个和最后一个球门球的注单将被取消。 </li>
                        </ul>
                        <p class="b sub">
                            2.37.5. 最多球门球球队</p>
                        <ul style="list-style: decimal;">
                            <li>预测哪一支球队将发出最多球门球。 </li>
                            <li>注单将按照90分钟完场赛事时间内（不包括加时赛及点球赛）发出最多球门球的球队做结算。 </li>
                            <li>选项可列为：
                                <ul style="list-style: lower-alpha">
                                    <li>球队A</li>
                                    <li>球队B</li>
                                    <li>平局</li>
                                </ul>
                            </li>
                        </ul>
                        <p class="b sub">
                            2.37.6. 首个球门球时间</p>
                        <ul style="list-style: decimal;">
                            <li>预测发出首个球门球的时间。 </li>
                            <li>选项可列为:
                                <ul style="list-style: lower-alpha">
                                    <li>赛事的第8分钟或之前</li>
                                    <li>第9分钟后</li>
                                </ul>
                            </li>
                            <li>出于结算的用意，赛事的第一分钟是从1秒计算到59秒。第二分钟则是从1分钟计算到1分59秒，以此类推。 </li>
                            <li>范例：如果投注首个球门球时间的选项是'赛事的第8分钟或之前'，而确实发出球门球的时间为8分钟49秒，球门球发出时间的范围属于'第9分钟后'，因此投注将结算为输。
                            </li>
                            <li>如果赛事在发出第一个球门球后中断，所有首个球门球时间的注单将保持有效。 </li>
                            <li>如果赛事在发出第一个球门球前中断，所有首个球门球时间的注单将被取消。 </li>
                            <li>如果在90分钟完场时间内并未发出任何球门球，所有首个球门球时间的注单将被取消。 </li>
                        </ul>
                    </ul>
                    <a name="ThrowIns"></a>
                    <p style="margin-left: -60px;">
                        <div class="quick_link">
                            界外球</div>
                    </p>
                    <p class="b sub">
                        2.38. 界外球</p>
                    <p>
                        以下列出所提供的个别界外球玩法规则。
                    </p>
                    <ul style="margin-left: 25px;">
                        <p class="b sub">
                            2.38.1. 界外球：一般规则</p>
                        <ul style="list-style: decimal;">
                            <li>出于结算的用意，界外球只有在实际发出后才计算在内。 </li>
                            <li>界外球是在球员接触到球后导致球越过足球场边线的情况下判给对手的。 </li>
                            <li>如果界外球需重新进行，重新进行的界外球仍计为一个界外球而不算两个。 </li>
                            <li>注单的结算将根据官方赛果或赛事权威机构判定的结果为准。 </li>
                        </ul>
                        <p class="b sub">
                            2.38.2. 界外球：让球盘</p>
                        <ul style="list-style: decimal;">
                            <li>预测在90分钟完场时间内（不包括加时赛及点球赛）哪一支球队在盘口指定的让球数发出最多界外球。 </li>
                            <li>所有注单将按盘口开出的让球数在玩法的时节结束后结算。 </li>
                        </ul>
                        <p class="b sub">
                            2.38.3. 总界外球：大小盘</p>
                        <ul style="list-style: decimal;">
                            <li>预测总发出的界外球数将大于或小于在盘口指定的大/小盘牌数。 </li>
                            <li>如果发出的总界外球数多于盘口的大/小盘牌数，则为大盘。如果少于盘口的大/小盘牌数，则为小盘。 </li>
                            <li>如果赛事中断前已有明确结果并且之后没有任何显著会影响投注结果的情况，总界外球的大/小盘注单才会被结算。若遇到任何其他情况，注单将一律被取消。 </li>
                        </ul>
                        <p class="b sub">
                            2.38.4. 第一/最后一个界外球</p>
                        <ul style="list-style: decimal;">
                            <li>预测在90分钟完场时间内（不包括加时赛及点球赛）哪个球队会发出第一或最后一个界外球。 </li>
                            <li>如果赛事在发出第一个界外球后中断，所有第一个界外球的注单将保持有效。 </li>
                            <li>如果赛事在发出第一个界外球后中断，所有最后一个界外球的注单将被取消。 </li>
                            <li>如果赛事在没有发出任何界外球前中断，所有第一个和最后一个界外球的注单将被取消。 </li>
                            <li>如果在90分钟完场时间内并未发出任何界外球，所有第一个和最后一个界外球的注单将被取消。 </li>
                        </ul>
                        <p class="b sub">
                            2.38.5. 最多界外球球队</p>
                        <ul style="list-style: decimal;">
                            <li>预测哪一支球队将发出最多界外球。 </li>
                            <li>注单将按照90分钟完场赛事时间内（不包括加时赛及点球赛）发出最多界外球的球队做结算。 </li>
                            <li>选项可列为：
                                <ul style="list-style: lower-alpha">
                                    <li>球队A</li>
                                    <li>球队B</li>
                                    <li>平局</li>
                                </ul>
                            </li>
                        </ul>
                        <p class="b sub">
                            2.38.6. 首个界外球时间</p>
                        <ul style="list-style: decimal;">
                            <li>预测发出首个界外球的时间。 </li>
                            <li>选项可列为:
                                <ul style="list-style: lower-alpha">
                                    <li>赛事的第8分钟或之前</li>
                                    <li>第9分钟后</li>
                                </ul>
                            </li>
                            <li>出于结算的用意，赛事的第一分钟是从1秒计算到59秒。第二分钟则是从1分钟计算到1分59秒，以此类推。 </li>
                            <li>范例：如果投注首个界外球时间的选项是'赛事的第8分钟或之前'，而确实发出界外球的时间为8分钟49秒，界外球发出时间的范围属于'第9分钟后'，因此投注将结算为输。
                            </li>
                            <li>如果赛事在发出第一个界外球后中断，所有首个界外球时间的注单将保持有效。 </li>
                            <li>如果赛事在发出第一个界外球前中断，所有首个界外球时间的注单将被取消。 </li>
                            <li>如果在90分钟完场时间内并未发出任何界外球，所有首个界外球时间的注单将被取消。 </li>
                        </ul>
                    </ul>
                    <a name="Substitutions"></a>
                    <p style="margin-left: -60px;">
                        <div class="quick_link">
                            替换</div>
                    </p>
                    <p class="b sub">
                        2.39. 替补</p>
                    <p>
                        以下列出所提供的个别替补玩法规则。
                    </p>
                    <ul style="margin-left: 25px;">
                        <p class="b sub">
                            2.39.1. 替补：一般规则</p>
                        <ul style="list-style: decimal;">
                            <li>替补是指在赛事进行期间，一个球员替换另一个正在赛场上的球员。 </li>
                            <li>注单的结算将根据官方赛果或赛事权威机构判定的结果为准。 </li>
                        </ul>
                        <p class="b sub">
                            2.39.2. 替补：让球盘</p>
                        <ul style="list-style: decimal;">
                            <li>预测在90分钟完场时间内（不包括加时赛及点球赛）哪一支球队在盘口指定的让球数替补最多球员。 </li>
                            <li>所有注单将按盘口开出的让球数在玩法的时节结束后结算。 </li>
                        </ul>
                        <p class="b sub">
                            2.39.3. 总替补：大小盘</p>
                        <ul style="list-style: decimal;">
                            <li>预测总替补的球员数将大于或小于在盘口指定的大/小盘牌数。 </li>
                            <li>如果替补的球员数多于盘口的大/小盘牌数，则为大盘。如果少于盘口的大/小盘牌数，则为小盘。 </li>
                            <li>如果赛事中断前已有明确结果并且之后没有任何显著会影响投注结果的情况，总替补的大/小盘注单才会被结算。若遇到任何其他情况，注单将一律被取消。 </li>
                        </ul>
                        <p class="b sub">
                            2.39.4. 第一/最后一个替补</p>
                        <ul style="list-style: decimal;">
                            <li>预测在90分钟完场时间内（不包括加时赛及点球赛）哪个球队会最先或最后替补球员。 </li>
                            <li>如果两位或以上球员同时被替补，首先被裁判员出示替补的球员，将被视为"优胜者"为注单进行结算。 </li>
                            <li>如果赛事在替补第一个球员后中断，所有第一个替补的注单将保持有效。 </li>
                            <li>如果赛事在替补第一个球员后中断，所有最后一个替补的注单将被取消，除非在赛事中断前，结果已经明确并且若之后有任何潜在替补将对盘口结算裁决没有影响。此情况只有当双方球队都将已分配好的替补机会用完。若遇到任何其他情况，注单将一律被取消。
                            </li>
                            <li>如果赛事在没有任何替补前中断，所有第一个和最后一个替补的注单将被取消。 </li>
                            <li>如果在90分钟完场时间内并未任何替补，所有第一个和最后一个替补的注单将被取消。 </li>
                        </ul>
                        <p class="b sub">
                            2.39.5. 首个替补时间</p>
                        <ul style="list-style: decimal;">
                            <li>预测首个替补的时间。 </li>
                            <li>选项可列为:</li>
                            <ul style="list-style: lower-alpha">
                                <li>赛事的第58分钟或之前</li>
                                <li>第59分钟后</li>
                            </ul>
                            <li>出于结算的用意，赛事的第一分钟是从1秒计算到59秒。第二分钟则是从1分钟计算到1分59秒，以此类推。 </li>
                            <li>范例：如果投注首个替补时间的选项是'赛事的第58分钟或之前'，而确实替补的时间为58分钟49秒，替补时间的范围属于'第59分钟后'，因此投注将结算为输。
                            </li>
                            <li>如果赛事在第一个替补后中断，所有首个替补时间的注单将保持有效。 </li>
                            <li>如果赛事在第一个替补前中断，所有首个替补时间的注单将被取消。 </li>
                            <li>如果在90分钟完场时间内并未任何替补，所有首个替补时间的注单将被取消。 </li>
                        </ul>
                    </ul>
                    <a name="Offsides"></a>
                    <p style="margin-left: -60px;">
                        <div class="quick_link">
                            越位</div>
                    </p>
                    <p class="b sub">
                        2.40. 越位</p>
                    <p>
                        以下列出所提供的个别越位玩法规则。
                    </p>
                    <ul style="margin-left: 25px;">
                        <p class="b sub">
                            2.40.1. 越位：一般规则</p>
                        <ul style="list-style: decimal;">
                            <li>注单的结算将根据官方赛果或赛事权威机构判定的结果为准。 </li>
                        </ul>
                        <p class="b sub">
                            2.40.2. 越位：让球盘</p>
                        <ul style="list-style: decimal;">
                            <li>预测在90分钟完场时间内（不包括加时赛及点球赛）哪一支球队在盘口指定的让球数越位最多次。 </li>
                            <li>所有注单将按盘口开出的让球数在玩法的时节结束后结算。 </li>
                        </ul>
                        <p class="b sub">
                            2.40.3. 总越位：大小盘</p>
                        <ul style="list-style: decimal;">
                            <li>预测总越位次数将大于或小于在盘口指定的大/小盘牌数。 </li>
                            <li>如果越位次数多于盘口的大/小盘牌数，则为大盘。如果少于盘口的大/小盘牌数，则为小盘。 </li>
                            <li>如果赛事中断前已有明确结果并且之后没有任何显著会影响投注结果的情况，总越位次数的大/小盘注单才会被结算。若遇到任何其他情况，注单将一律被取消。 </li>
                        </ul>
                        <p class="b sub">
                            2.40.4. 第一/最后一个越位</p>
                        <ul style="list-style: decimal;">
                            <li>预测在90分钟完场时间内（不包括加时赛及点球赛）哪个球队的球员会最先或最后越位。 </li>
                            <li>如果赛事在第一个球员越位后中断，所有第一个越位的注单将保持有效。 </li>
                            <li>如果赛事在第一个球员越位后中断，所有最后一个越位的注单将被取消。 </li>
                            <li>如果赛事在没有任何球员越位前中断，所有第一个和最后一个越位的注单将被取消。 </li>
                            <li>如果在90分钟完场时间内并未任何球员越位，所有第一个和最后一个越位的注单将被取消。 </li>
                        </ul>
                        <p class="b sub">
                            2.40.5. 首个越位时间</p>
                        <ul style="list-style: decimal;">
                            <li>预测首个越位的时间。 </li>
                            <li>选项可列为:
                                <ul style="list-style: lower-alpha">
                                    <li>赛事的第8分钟或之前</li>
                                    <li>第9分钟后</li>
                                </ul>
                            </li>
                            <li>出于结算的用意，赛事的第一分钟是从1秒计算到59秒。第二分钟则是从1分钟计算到1分59秒，以此类推。 </li>
                            <li>范例：如果投注首个越位时间的选项是'赛事的第8分钟或之前'，而确实球员越位的时间为8分钟49秒，球员越位时间的范围属于'第9分钟后'，因此投注将结算为输。
                            </li>
                            <li>如果赛事在第一个球员越位后中断，所有首个越位时间的注单将保持有效。 </li>
                            <li>如果赛事在第一个球员越位前中断，所有首个越位时间的注单将被取消。 </li>
                            <li>如果在90分钟完场时间内并未任何球员越位，所有首个越位时间的注单将被取消。 </li>
                        </ul>
                    </ul>
                    <a name="PenaltyMarkets"></a>
                    <p style="margin-left: -60px;">
                        <div class="quick_link">
                            点球</div>
                    </p>
                    <p class="b sub">
                        2.41. 点球玩法种类</p>
                    以下列出所提供的个别点球玩法规则。
                    <ul style="margin-left: 25px;">
                        <p class="b sub">
                            2.41.1.点球惩罚</p>
                        <ul style="list-style: decimal;">
                            <li>预测在90分钟完场时间内（不包括加时赛及点球赛）是否会有点球惩罚。 </li>
                        </ul>
                        <p class="b sub">
                            2.41.2. 点球：让球盘</p>
                        <ul style="list-style: decimal;">
                            <li>预测哪一支球队在盘口指定的让球数在点球赛里获胜。 </li>
                            <li>骤死赛得分也包括在点球让球盘。 </li>
                            <li>如果赛事并未进行点球，所有注单将被取消。 </li>
                            <li>在90分钟完场时间内以及加时赛踢进的点球将不计算在内。 </li>
                        </ul>
                        <p class="b sub">
                            2.41.3. 点球：大小盘</p>
                        <ul style="list-style: decimal;">
                            <li>预测点球赛总入球数将大于或小于在盘口指定的大/小盘球数。 </li>
                            <li>点球大小盘只以10个点球为准（每队5球）。骤死赛得分不包括在点球大小盘。 </li>
                            <li>范例:
                                <ul style="list-style: lower-alpha">
                                    <li>利物浦4-1托特纳姆热刺– 大小球以5球结算。 </li>
                                    <li>利物浦6-5托特纳姆热刺（每队踢5个点球后的结果为：利物浦4-4托特纳姆热刺）-大小盘在每队踢5个点球后的8球得分结算。 </li>
                                </ul>
                            </li>
                            <li>如果赛事并未进行点球，所有注单将被取消。 </li>
                            <li>在90分钟完场时间内以及加时赛踢进的点球将不计算在内。 </li>
                            <li>如果赛事在点球赛时中断，而在赛事中断前已有明确结果并且之后没有任何显著会影响投注结果的情况，大/小盘注单才会被结算。若遇到任何其他情况，注单将一律被取消。
                            </li>
                        </ul>
                    </ul>
                    <a name="Competitions"></a>
                    <p style="margin-left: -60px;">
                        <div class="quick_link">
                            比赛</div>
                    </p>
                    <p class="b sub">
                        2.42. 联赛</p>
                    <ul style="margin-left: 25px;">
                        <p class="b sub">
                            2.42.1. 联赛：一般规则</p>
                        <ul style="list-style: decimal;">
                            <li>赛果确认完成后将进行派彩。 </li>
                            <li>联赛的派彩将以官方来源或相关体育权威机构判定的结果为准。 </li>
                            <li>所有联赛的积分扣除都予以计算。 </li>
                            <li>冠军比赛规则适用。 </li>
                        </ul>
                        <p class="b sub">
                            2.42.2. 小组赛</p>
                        <ul style="list-style: decimal;">
                            <li>预测整个赛季中排名最高的球队。 </li>
                        </ul>
                        <p class="b sub">
                            2.41.3. 排名前4、6、10等</p>
                        <ul style="list-style: decimal;">
                            <li>预测整个赛季中排名在前4、6、10等的球队。 </li>
                        </ul>
                        <p class="b sub">
                            2.42.4. 没有球队X的联赛冠军</p>
                        <ul style="list-style: decimal;">
                            <li>预测整个赛季中，当所列出的球队或某球队从联赛表中移除后，哪一支球队将获得冠军。 </li>
                        </ul>
                        <p class="b sub">
                            2.42.5. 联赛：最后一名球队</p>
                        <ul style="list-style: decimal;">
                            <li>预测整个赛季中哪一支球队会成为最后一名。 </li>
                            <li>此类投注也被称为最低分。 </li>
                        </ul>
                        <p class="b sub">
                            2.42.6. 联赛：被降级的球队</p>
                        <ul style="list-style: decimal;">
                            <li>预测在比赛中哪一支球队会被降级。 </li>
                            <li>所有被降级球队将以全赢作为计算标准，比如：胜负不分的规则不适用。 </li>
                            <li>如果一支球队从联赛中被移除或清除，投注在此球队的注单将被视为无效。如果在赛季开始之前出现此情况，所有的投注都无效，将会另外开设盘口。 </li>
                        </ul>
                        <p class="b sub">
                            2.42.7. 联赛：球队保持原位</p>
                        <ul style="list-style: decimal;">
                            <li>预测比赛中哪一支球队不会被降级。 </li>
                            <li>所有没有被降级的球队将以全赢作为计算标准，比如：胜负不分的规则不适用。 </li>
                            <li>如果一支球队从联赛中被移除或清除，投注在此球队的注单将被视为无效。如果在赛季开始之前出现此情况，所有的投注都无效，将会另外开设盘口。 </li>
                        </ul>
                        <p class="b sub">
                            2.42.8. 联赛：球队晋级</p>
                        <ul style="list-style: decimal;">
                            <li>预测比赛中哪一支球队会晋级。 </li>
                            <li>投注包括自动晋级以及在特定比赛中通过加赛后的晋级。 </li>
                            <li>所有晋级的球队将以全赢作为计算标准，比如：胜负不分的规则不适用。 </li>
                            <li>如果一支球队从联赛中被移除或清除，投注在此球队的注单将被视为无效。如果在赛季开始之前出现此情况，所有的投注都无效，将会另外开设盘口。 </li>
                        </ul>
                        <p class="b sub">
                            2.42.9. 联赛：最佳新秀</p>
                        <ul style="list-style: decimal;">
                            <li>预测哪一支最新晋级的球队将在赛季中获得最高排名。 </li>
                        </ul>
                    </ul>
                    <p class="b sub">
                        2.43. 最佳射手</p>
                    <ul style="list-style: decimal;">
                        <li>预测在一场特定比赛中进球最多的球员。 </li>
                        <li>如果产生超过一个冠军数量, 请以并列第一规则参考结算方式。 </li>
                        <li>投注在被列出的该球队球员将被视为有效，无论他们是否受伤、暂停、不参与比赛或其它任何原因。 </li>
                        <li>如果联赛中途有球员转到另一个球队, 球员在转到另一个球队前所进得球数将继续计算在内。如果球员是转到不同联赛的球队，在转之前进得球数将不会继续带到新联赛去。两种情况下，投注此球员的注单将保持有效。
                        </li>
                        <li>乌龙球将不予计算在内。 </li>
                        <li>按照单纯的联赛比赛玩法，只有在联赛中进得球才计算在内。在季后赛进得球将不予计算在内。 </li>
                    </ul>
                    <p class="b sub">
                        2.44. 最佳射手球队</p>
                    <ul style="list-style: decimal;">
                        <li>预测比赛中哪一个球员在所属球队中进球最多。 </li>
                        <li>所有的投注以官方时间90分钟为准，包括加时、伤停补时。 </li>
                        <li>进球数不包括点球。 </li>
                        <li>投注适用于所有比赛的球队。 </li>
                        <li>胜负不分规则使用；任何用于决定和局的方法不可作为结算依据，比如：计数协助。 </li>
                    </ul>
                    <p class="b sub">
                        2.45. 最佳射手/比赛双赢</p>
                    <ul style="list-style: decimal;">
                        <li>预测比赛中哪一个球员进球最多和哪一支球队获胜。 </li>
                        <li>所有的投注以官方时间90分钟为准，包括加时、伤停补时。 </li>
                        <li>进球数不包括点球。 </li>
                        <li>如果多于一个球员和最佳射手打平，胜负不分规则使用；任何用于决定和局的方法不可作为结算依据，比如：计数协助。 </li>
                    </ul>
                    <p class="b sub">
                        2.46. 进球最多的小组</p>
                    <ul style="list-style: decimal;">
                        <li>预测在比赛中哪一组进球最多。 </li>
                        <li>只计算在小组阶段的进球。 </li>
                        <li>所有的投注以赛事官方单位90分钟为完场时间，包括球员伤停补时。 </li>
                        <li>如果赛事中断，将以官方单位公布的最后赛果为准，其中包括赛事重新开始或指定的分数。 </li>
                    </ul>
                    <p class="b sub">
                        2.47. 比赛- 进球最多的球队</p>
                    <ul style="list-style: decimal;">
                        <li>预测在比赛中哪一个球队进球最多。 </li>
                        <li>所有的投注以赛事官方90分钟为完场时间，包括加时、伤停补时。 </li>
                        <li>进球数不包括点球。 </li>
                        <li>如果赛事中断，将以官方单位公布的最后赛果为准，其中包括赛事重新开始或指定的分数。 </li>
                    </ul>
                    <p class="b sub">
                        2.48. 比赛- 失球最多的球队</p>
                    <ul style="list-style: decimal;">
                        <li>预测在比赛中哪一个球队失球最多。 </li>
                        <li>所有的投注以赛事官方90分钟为完场时间，包括加时、伤停补时。 </li>
                        <li>在点球中的失球不予计算。 </li>
                        <li>如果赛事中断，将以官方单位公布的最后赛果为准，其中包括赛事重新开始或指定的分数。 </li>
                    </ul>
                    <p class="b sub">
                        2.49. 比赛– 总进球数</p>
                    <ul style="list-style: decimal;">
                        <li>预测在比赛中进球的数量。 </li>
                        <li>所有的投注以赛事官方90分钟为完场时间，包括加时、伤停补时。 </li>
                        <li>在比赛中点球的进球不予计算。 </li>
                        <li>如果赛事中断，将以官方单位公布的最后赛果为准，其中包括赛事重新开始或指定的分数。 </li>
                    </ul>
                    <p class="b sub">
                        2.50. 比赛 - 帽子戏法</p>
                    <ul style="list-style: decimal;">
                        <li>预测在比赛中任何一位球员进3个或以上的球。 </li>
                        <li>所有的投注以赛事官方90分钟为完场时间，包括加时、伤停补时。 </li>
                        <li>帽子戏法不包含点球中的进球。 </li>
                        <li>在一场比赛中如果一个球员连续进球3个或更多，即为帽子戏法。 </li>
                        <li>如果赛事中断，将以官方单位公布的最后赛果为准，其中包括赛事重新开始或指定的得分。如果帽子戏法是在赛事中断前，且赛事在0-0的情况下或者其它官方单位分配的比分下重新开始，将不予计算。
                        </li>
                    </ul>
                    <p class="b sub">
                        2.51. 比赛- 总帽子戏法</p>
                    <ul style="list-style: decimal;">
                        <li>预测在比赛中获得了多少帽子戏法。 </li>
                        <li>所有的投注以赛事官方90分钟为完场时间，包括加时、伤停补时。 </li>
                        <li>帽子戏法不包含点球中的进球。 </li>
                        <li>在一场比赛中如果一个球员连续进球3个或更多，即为帽子戏法。 </li>
                        <li>如果赛事中断，将以官方单位公布的最后赛果为准，其中包括赛事重新开始或指定的分数。如果帽子戏法是在赛事中断前，且赛事在0-0的情况下或者其它官方单位分配的比分下重新开始，将不予计算。
                        </li>
                    </ul>
                    <p class="b sub">
                        2.52. 比赛– 总红卡数</p>
                    <ul style="list-style: decimal;">
                        <li>预测在比赛中红卡的数量。 </li>
                        <li>所有的投注以赛事官方90分钟为完场时间，包括加时、伤停补时。 </li>
                        <li>任何非球员的红卡（例如.经理、教练或替补）不予计算</li>
                        <li>点球中的红卡不予计算</li>
                        <li>如果赛事在出现红卡之后中断，红卡仍然计算在总红卡数中。 </li>
                    </ul>
                    <p class="b sub">
                        2.53. 比赛– 进球最多的城市</p>
                    <ul style="list-style: decimal;">
                        <li>预测在比赛中哪一个城市将会进球最多。 </li>
                        <li>所有的投注以官方时间90分钟为准，包括加时、伤停补时。 </li>
                        <li>点球中的进球不予计算。 </li>
                        <li>如果赛事中断，将以官方单位公布的最后赛果为准，其中包括赛事重新开始或指定的分数。 </li>
                    </ul>
                    <p class="b sub">
                        2.54. 比赛– 直接预测排名</p>
                    <ul style="list-style: decimal;">
                        <li>预测在比赛中哪两个球队获得第1名和第2名的顺序排名。 </li>
                        <li>所有的投注以官方时间90分钟为准，包括加时、伤停补时。 </li>
                        <li>点球中的进球不予计算。 </li>
                        <li>如果赛事中断，将以官方单位公布的最后赛果为准，其中包括赛事重新开始或指定的分数。 </li>
                    </ul>
                    <p class="b sub">
                        2.55. 比赛– 获胜小组</p>
                    <ul style="list-style: decimal;">
                        <li>预测在比赛中哪一个小组将会获胜。 </li>
                        <li>冠军比赛规则适用。 </li>
                    </ul>
                    <p class="b sub">
                        2.56. 锦标赛– 小组最后一名球队</p>
                    <ul style="list-style: decimal;">
                        <li>预测哪一个球队为最后一名.</li>
                        <li>冠军比赛规则适用.</li>
                    </ul>
                    <p class="b sub">
                        2.57. 冠军所属地</p>
                    <ul style="list-style: decimal;">
                        <li>预测比赛的冠军来自哪里。 </li>
                        <li>来源地可以是冠军球队的所属地区、国家或洲。 </li>
                        <li>冠军比赛规则使用。 </li>
                    </ul>
                    <p class="b sub">
                        2.58. 比赛 - 阶段淘汰</p>
                    <ul style="list-style: decimal;">
                        <li>预测比赛中该球队会在哪一个阶段被淘汰。 </li>
                        <li>冠军比赛规则使用。 </li>
                    </ul>
                    <p class="b sub">
                        2.59. 比赛 - 提名入围</p>
                    <ul style="list-style: decimal;">
                        <li>预测哪一支球队会进入决赛。 </li>
                        <li>冠军比赛规则适用.</li>
                    </ul>
                    <p class="b sub">
                        2.60. 比赛– 最终裁判员</p>
                    <ul style="list-style: decimal;">
                        <li>预测决赛中的裁判员是哪一位。 </li>
                        <li>无论此前是否有任何公告，将根据决赛开始后的裁判为派彩依据。 </li>
                        <li>冠军比赛规则适用.</li>
                    </ul>
                    <a name="OtherMarkets"></a>
                    <p style="margin-left: -60px;">
                        <div class="quick_link">
                            其他</div>
                    </p>
                    <p class="b sub">
                        2.61. 特定联赛里主客队的总进球数</p>
                    <p>
                        本公司在某些联赛里会提供某种结合性赛事结果的投注。盘口的玩法将结合主场与客场球队在整个联赛里的赛果之后分出胜负。中立场的比赛，第一个球队被视为这一场赛事的主队。以下列出所提供的个别替补玩法规则。
                    </p>
                    <ul style="margin-left: 25px;">
                        <p class="b sub">
                            2.61.1. 特定联赛里主客队的总进球数：一般规则</p>
                        <ul style="list-style: decimal;">
                            <li>如联赛中有一场赛事中断，暂停或者延后，所有的特定联赛的注单将被取消，除非在赛事取消或中断前，结果已经明确并且之后没有任何显著会影响赛事结果的情况，大/小盘注单才会被结算。
                            </li>
                            <li>比赛日程以及赛事场次将会明确的在盘口显示。例如：
                                <ul style="list-style: lower-alpha">
                                    <li>主队-周五-3场赛事</li>
                                    <li>客队-周五-3场赛事</li>
                                </ul>
                            </li>
                        </ul>
                        <p class="b sub">
                            2.61.2. 特定联赛里主客队的进球数：让球盘</p>
                        <ul style="list-style: decimal;">
                            <li>预测在90分钟完场时间内（不包括加时赛及点球赛）哪一支球队在结合整个联赛里的赛果后在盘口指定的让球数胜出。 </li>
                        </ul>
                        <p class="b sub">
                            2.61.3. 特定联赛里主客队的进球数：大小盘</p>
                        <ul style="list-style: decimal;">
                            <li>预测主客队的总进球数将大于或小于在盘口指定的大/小盘牌数。 </li>
                        </ul>
                    </ul>
                </ul>
                <div class="to_top">
                    <a href="#top"><span>回最上层</span></a></div>
            </div>
            <div id="info3" class="displayno">
                <p class="b sub">
                    连串过关/复式过关/组合过关</p>
                <p class="b sub">
                    1. 示意</p>
                <p>
                    连串过关是指选择二个或更多的赛事在一个单一的注单中。每一个选择连串投注的赛事必须获胜此连串的注单才视为获胜。如果第一个注单是获胜的，投注获胜的注单会添加到第二个投注选项，直到连串过关中的所有投注获胜或到有一场失败为结束。</p>
                <p>
                    例如：</p>
                <p>
                    投注一个100元的3串1连串过关在以下的三场赛事:</p>
                <p>
                    <ul>
                        <li>Manchester United @ 1.80曼联 </li>
                        <li>Chelsea @ 1.50 切尔西 </li>
                        <li>Arsenal @ 1.66 阿森纳 </li>
                    </ul>
                </p>
                <p>
                    如果所有的三场赛事都获胜，连串过关的盈利为448.20元（包括本金）。详细的计算方式您可以查看以下的信息:</p>
                <p>
                    <ul>
                        <li>Bet 1: Manchester United 1.80 x $100 = Return of $180.曼联1.8*100=180 </li>
                        <li>Bet 2: Chelsea 1.50 x $180 = Return of $270.切尔西1.5*180=270 </li>
                        <li>Bet 3: Arsenal 1.66 x $270 = Return of $448.20.阿森纳1.66*270=448.20 </li>
                    </ul>
                </p>
                <ul style="margin-left: 25px;">
                    <p class="b sub">
                        1.1 连串过关要点:</p>
                    <ul>
                        <li>本公司一个注单中最多的连串过关为10串。 </li>
                        <li>所有投注赛事都需要根据体育博彩规则为准。 </li>
                        <li>不是所有的赛事都可以投注连串过关。如果您在投注列表中看到不可以组合二个不相关的赛事（可以查看以下的信息关于有关联的连串），那么就是其中一场并没有开出连串过关投注。
                        </li>
                        <li>连串过关可以投注不同种类的赛事，以及不在同一天的比赛。 </li>
                    </ul>
                </ul>
                <p class="b sub">
                    2. 连串过关相关选择</p>
                <p>
                    连串过关投注，选择组合有关联的同一赛事或投注市场的结果会影响其他另一个投注市场，此注单是不接受的。例如:</p>
                <p>
                    例如:</p>
                <p>
                    以下的2串1是不接受的，由于是同一场赛事:</p>
                <ul>
                    <li>曼联获胜独赢盘口@1.80 </li>
                    <li>曼联2-0获胜，正确比分盘口@7.0 </li>
                </ul>
                <p>
                    如果曼联2-0获胜，组合盘口为12.6。其实盘口应该为7.0，因为曼联2-0获胜，那么独赢盘口自然而然为获胜。
                </p>
                <p>
                    连串过关投注，选择组合有关联的同一球队或球员，即使他们是不同的时间，同样是不接受例如一个结果会影响另一个结果。
                </p>
                <p>
                    例如:</p>
                <ul>
                    <li>曼联进入到最后的冠军杯决赛@6.0 </li>
                    <li>曼联进入到最后的冠军杯决赛@6.0 </li>
                    <li>组合盘口@60.0 </li>
                </ul>
                <p>
                    这个连串过关被视为第二个赛果会影响到第一个赛果。如果曼联获得冠军杯联赛冠军，那么曼联自然而然就进入冠军杯决赛。因此，盘口仅仅为10.0。
                </p>
                <p>
                    本公司有权利取消有关联的连串过关投注。
                </p>
                <p class="b sub">
                    3. 连串过关</p>
                <p>
                    在连串过关中有任何的投注赛事无效或者打和（如以下的范例），此连串过关注单仍然有效，并且按照任何所胜出的其余投注结算，范例如下：</p>
                <ul>
                    <li>投注项1：切尔西（-0.5）-切尔西赢。 </li>
                    <li>投注项2:投注2：曼联（-1）-曼联赢1-0.</li>
                    <li>投注项3:投注3: 阿森纳（-0.5）-阿森纳赢。 </li>
                </ul>
                <p>
                    正如曼联是以（-1）的亚洲盘口1-0获胜，但在连串过关中的此赛事视为和。因此，当切尔西获胜连串阿森纳获胜过关，此连串过关将被视为切尔西以及阿森纳的2串，而非最初的3串。同时，打和的过关投注项目将会被自动以1计算。
                </p>
                <p>
                    过关的计算范例如下</p>
                <p class="b sub">
                    范例1： 其中一个投注项为和:</p>
                <p>
                    <table width="78.8%" border="0" cellspacing="1" cellpadding="0" class="demo">
                        <tr style="background-color: #ff9700; font-weight: bold;">
                            <th>
                                投注项
                            </th>
                            <th>
                                让球
                            </th>
                            <th>
                                陪率
                            </th>
                            <th>
                                赛过
                            </th>
                            <th>
                                结果
                            </th>
                        </tr>
                        <tr>
                            <td>
                                切尔西
                            </td>
                            <td>
                                (-0.5/1)
                            </td>
                            <td>
                                1.85
                            </td>
                            <td>
                                赢 2-0
                            </td>
                            <td>
                                全赢
                            </td>
                        </tr>
                        <tr style="font-weight: bold;">
                            <td>
                                曼联
                            </td>
                            <td>
                                (-1)
                            </td>
                            <td>
                                1.95
                            </td>
                            <td>
                                赢 1-0
                            </td>
                            <td>
                                和
                            </td>
                        </tr>
                        <tr>
                            <td>
                                阿森纳
                            </td>
                            <td>
                                (-1/1.5)
                            </td>
                            <td>
                                2.05
                            </td>
                            <td>
                                赢3-0
                            </td>
                            <td>
                                全赢
                            </td>
                        </tr>
                    </table>
                </p>
                <p>
                    投注金额：$100 3串一</p>
                <p>
                    计算方式如下</p>
                <p>
                    $100 x 1.85 x 1 x 2.05 = $379.25,扣除本金$100=盈利<span style="font-weight: bold;">$279.25</span></p>
                <ul>
                    <li>切尔西(-0.5/1)：赢- $100 x 1.85 =返还$185。此金额将会移至下个选项。 </li>
                    <li>曼联(-1): 和- $185 x 1 = $185. 此金额将会移至到下一选项。 </li>
                    <li>阿森纳(-1/1.5)：赢- $185 x 2.05 =返还$379.25</li>
                    <li>
                    盈利：$379.25 – $100 = $279.25. </p>
                </ul>
                <p class="b sub">
                    范例2： 其中一个投注项为赢半平半</p>
                <p>
                    <table width="78.8%" border="0" cellspacing="1" cellpadding="0" class="demo">
                        <tr style="background-color: #ff9700; font-weight: bold;">
                            <th>
                                投注项
                            </th>
                            <th>
                                让球
                            </th>
                            <th>
                                陪率
                            </th>
                            <th>
                                赛过
                            </th>
                            <th>
                                结果
                            </th>
                        </tr>
                        <tr style="font-weight: bold;">
                            <td>
                                投注项
                            </td>
                            <td>
                                (-0.5/1)
                            </td>
                            <td>
                                1.85
                            </td>
                            <td>
                                赢 1-0
                            </td>
                            <td>
                                赢半 / 平半
                            </td>
                        </tr>
                        <tr>
                            <td>
                                曼联
                            </td>
                            <td>
                                (-1)
                            </td>
                            <td>
                                1.95
                            </td>
                            <td>
                                赢 2-0
                            </td>
                            <td>
                                全赢
                            </td>
                        </tr>
                        <tr>
                            <td>
                                阿森纳
                            </td>
                            <td>
                                (-1/1.5)
                            </td>
                            <td>
                                2.05
                            </td>
                            <td>
                                赢3-0
                            </td>
                            <td>
                                全赢
                            </td>
                        </tr>
                    </table>
                </p>
                <p>
                    连串投注：$100 3串一</p>
                <p>
                    计算方式如下：</p>
                <p>
                    $100 x [1 + 0.5 x 0.85] x 1.95 x 2.05 = $569.64， 扣除本金=赢$469.64</p>
                <ul>
                    <li>切尔西(-0.5/1)：赢半/平半– 此注单被分为两项，只有一半的投注盈利，
                        <br />
                        盈利的部分$50 x 1.85 = $92.50<br />
                        打和部分$50 x 1 = 50<br />
                        返还是$92.50 + $50 = $142.50。此金额将移至下个投注项</li>
                    <li>曼联（-1）:盈利-142.50 x 1.95=$277.87，此金额将移至下个投注项</li>
                    <li>阿森纳(-1/-1.5):盈利-277.87 x 2.05=$569.64</li>
                    <li>
                    总盈利:$569.64-$100=$469.64. </p>
                </ul>
                <p class="b sub">
                    范例3：其中一个投注项为赢半平半</p>
                <p>
                    <table width="78.8%" border="0" cellspacing="1" cellpadding="0" class="demo">
                        <tr style="background-color: #ff9700; font-weight: bold;">
                            <th>
                                投注项
                            </th>
                            <th>
                                让球
                            </th>
                            <th>
                                陪率
                            </th>
                            <th>
                                赛过
                            </th>
                            <th>
                                结果
                            </th>
                        </tr>
                        <tr>
                            <td>
                                切尔西
                            </td>
                            <td>
                                (-0.5/1)
                            </td>
                            <td>
                                1.85
                            </td>
                            <td>
                                赢2-0
                            </td>
                            <td>
                                赢
                            </td>
                        </tr>
                        <tr>
                            <td>
                                曼联
                            </td>
                            <td>
                                (-1)
                            </td>
                            <td>
                                1.95
                            </td>
                            <td>
                                赢2-0
                            </td>
                            <td>
                                赢
                            </td>
                        </tr>
                        <tr style="font-weight: bold;">
                            <td>
                                阿森纳
                            </td>
                            <td>
                                (-1/1.5)
                            </td>
                            <td>
                                2.05
                            </td>
                            <td>
                                赢 1-0
                            </td>
                            <td>
                                输半 /平半
                            </td>
                        </tr>
                    </table>
                </p>
                <p>
                    连串投注：$100 3串一</p>
                <p>
                    计算方式如下：</p>
                <p>
                    $100 x 1.85 x 1.95 x 0.5 = $180.38, 扣除本金$100 = 盈利$80.38</p>
                <ul>
                    <li>切尔西(-0.5/1): 赢- $100 x 1.85 = $185 = 返回of $185. 此金额将移至下个投注项</li>
                    <li>曼联(-1): 赢- $185 x 1.95 = $360.75. 此金额将移至下个投注项</li>
                    <li>阿森纳(-1/1.5): 输半/平半– 投注额度将一分为二，其中一半为输。
                        <br />
                        $360.75 x 0.5 = $180.38.<br />
                        输半: $180.38<br />
                        平半: $180.38 x 1 = $180.38 </li>
                    <li>返回: $180.38</li>
                    <li>总盈利: $180.38 – $100 = $80.38.</li>
                    </p>
                </ul>
                <div class="to_top">
                    <a href="#top"><span>回最上层</span></a></div>
            </div>
            <div id="info4" class="displayno">
                <p class="b sub">
                    篮球</p>
                <p class="b sub">
                    1. 一般规则</p>
                <ul style="list-style: decimal">
                    <li>如果比赛场地有变更，所有注单将被取消。 </li>
                    <li>NBA/NBL篮球赛事必须至少进行43分钟，投注的注单才被视为有效。任何其他的篮球联赛或比赛，至少要进行35分钟，投注的注单才被视为有效，除非另有注明。
                    </li>
                    <li>美国大学篮球联赛至少必须进行35分钟，投注的注单才被视为有效，除非另有注明。 </li>
                    <li>如赛事中断，暂停或者延后并不在官方开赛时间12小时内重新开始，除了潜在进球不影响注单最终结果以外，其他情况一律无效，除非声明或单独的体育规则。公司决定取消赛事所有的注单的结果被视为最终结果，不参考任何官方赛事裁判的决定或相关部门。连串投注将会按照剩余投注赛果结算。</li>
                    <li>如果赛事是在上半场中断，所有上半场的注单将被取消。如果赛事是在下半场中断所有上半场的投注保持有效，但所有下半场的注单将被取消，除非在个别玩法规则另有注明。
                    </li>
                    <li>如果赛事是在上半场中断，所有上半场的注单将被取消。如果赛事是在下半场中断所有上半场的投注保持有效，但所有下半场的注单将被取消，除非在个别玩法规则另有注明。
                    </li>
                    <li>单节/半场的投注，比赛必须完成赛节注单才被视为有效，除非在个别玩法规则另有注明。 </li>
                    <li>第四节投注不包括加时赛。 </li>
                    <li>美国大学篮球联赛场地规则：盘口指示的"主场"和"客场"信息仅供参考。无论原定场地是否更改为"主场"，"客场"或"中立场"，所有注单将保持有效。 </li>
                    <li>除非个别玩法规则另有注明，赛事完场时间将包括加时赛。 </li>
                    <li>如比赛在法定时间提前进行，在比赛开始前的投注依然有效，在比赛开始后的所有投注均视为无效(滚球投注另作别论)。 </li>
                </ul>
                <p class="b sub">
                    2. 投注类型</p>
                <p>
                    以下列出篮球可提供的个别玩法规则。
                </p>
                <ul style="margin-left: 25px;">
                    <p class="b sub">
                        2.1. 独赢盘</p>
                    <ul style="list-style: decimal">
                        <li>预测哪一支球队将在比赛胜出。盘口提供两支球队为投注选项。 </li>
                    </ul>
                    <br />
                    <p class="b sub">
                        2.2. 让分盘</p>
                    <ul style="list-style: decimal">
                        <li>预测哪一支球队在盘口指定的让分球数在半场/全场/赛事单节赢得比赛。 </li>
                        <li>如果赛事在下半场取消或中断，所有上半场注单保持有效。 </li>
                        <li>如果赛事在下半场取消或中断，所有下半场注单将被取消。 </li>
                    </ul>
                    <br />
                    <p class="b sub">
                        2.3. 滚球让分盘</p>
                    <ul style="list-style: decimal">
                        <li>预测哪一支球队在盘口指定的让分数里赢得半场/全场/赛事单节的比赛。 </li>
                        <li>结算是以0-0的比分在比赛/时节结束后按盘口开出的让分球数做裁决。投注当时的比分对结算没有影响。 </li>
                    </ul>
                    <br />
                    <p class="b sub">
                        2.4. 大/小盘（总比分）</p>
                    <ul style="list-style: decimal">
                        <li>预测赛事总比分将大于或小于在盘口指定的大/小盘分数。 </li>
                        <li>如果赛事中断前已有明确结果并且之后没有任何显著会影响赛事结果的情况，大/小盘注单才会被结算。若遇到任何其他情况，注单将一律被取消。 </li>
                        <li>如果赛事在上半场中断，所有上半场注单将被取消，除非中断前已有明确结果并且之后没有任何显著会影响赛事结果的情况注单才会被结算。 </li>
                        <li>如果赛事在下半场取消或中断，所有上半场注单保持有效。 </li>
                        <li>如果赛事在下半场取消或中断，所有下半场注单将被取消，除非中断前已有明确结果并且之后没有任何显著会影响赛事结果的情况注单才会被结算。 </li>
                        <li>如果赛事中断, 所有时节的注单将被取消除非遇到以下其中一个情况：
                            <ul style="list-style: lower-alpha">
                                <li>投注的时节是在比赛中断前。 </li>
                                <li>比赛中断前已有明确结果并且之后没有任何显著会影响赛事结果的情况。 </li>
                            </ul>
                        </li>
                    </ul>
                    <br />
                    <p class="b sub">
                        2.5. 滚球大/小盘（总比分）</p>
                    <ul style="list-style: decimal">
                        <li>预测赛事总比分将大于或小于在盘口指定的大/小盘分数。 </li>
                        <li>结算是以0-0的比分在比赛/时节结束后按盘口开出的让分数做裁决。投注当时的比分对结算没有影响。 </li>
                        <li>如果赛事中断前已有明确结果并且之后没有任何显著会影响赛事结果的情况，大/小盘注单才会被结算。若遇到任何其他情况，注单将一律被取消。 </li>
                    </ul>
                    <br />
                    <p class="b sub">
                        2.6. 单/双</p>
                    <ul style="list-style: decimal">
                        <li>预测赛事的总比分是单数或双数。加时赛将包括在内。 </li>
                    </ul>
                    <br />
                    <p class="b sub">
                        2.7. 最先得分球队</p>
                    <ul style="list-style: decimal">
                        <li>预测最先得分的球队。 </li>
                        <li>如果赛事在有得分后中断，所有最先得分球队的注单将保持有效。 </li>
                        <li>如果赛事在没有球队得分前中断，所有最先得分球队的注单将被取消。 </li>
                        <li>如果赛事在4节完场时间以及加时赛内没有球队得分，所有最先得分球队的注单将被取消。 </li>
                    </ul>
                    <br />
                    <p class="b sub">
                        2.8. 最后得分球队</p>
                    <ul style="list-style: decimal">
                        <li>预测最后得分的球队。 </li>
                        <li>如果赛事中断， 所有最后得分球队的注单将被取消。 </li>
                        <li>如果赛事在4节完场时间以及加时赛内没有球队得分，所有最后得分球队的注单将被取消。 </li>
                    </ul>
                    <br />
                    <p class="b sub">
                        2.9. 单节最高得分球队</p>
                    <ul style="list-style: decimal">
                        <li>预测单节最高得分的球队。 </li>
                        <li>加时赛不计算在内。 </li>
                        <li>如果赛事中断，所有单节最高得分球队的注单将被取消。 </li>
                        <li>如果赛事在4节完场时间以及加时赛内没有球队得分，所有最后单节最高得分球队的注单将被取消。 </li>
                    </ul>
                    <br />
                    <p class="b sub">
                        2.10. 每节最先获得20分的球队</p>
                    <ul style="list-style: decimal">
                        <li>预测每节最先得20分的球队。 </li>
                        <li>加时赛不计算在内。 </li>
                        <li>如果赛事中断前已有明确结果并且之后没有任何显著会影响赛事结果的情况，注单才会被结算。若遇到任何其他情况，注单将一律被取消。 </li>
                        <li>如果每节都没有球队获得20分，所有注单将被取消。 </li>
                        <li>取决于赛事，玩法指定球队需最先获得的分数可能有变化，并且会清楚的显示在盘口。 </li>
                    </ul>
                    <br />
                    <p class="b sub">
                        2.11. 篮球特别投注</p>
                    <ul style="list-style: decimal">
                        <li>预测比分，抢断，篮板，助攻，3分球等。 </li>
                        <li>注单的结算将根据赛事（包括加时赛）官方冠军赛果为准。 </li>
                        <li>双方球员/球队必须参与比赛，投注才被视为有效。 </li>
                        <li>如果一方或双方球员/球队没有参与比赛，所有注单将被取消。 </li>
                        <li>注单的结算将根据NBA或特别官方机构公布的结果为准，并且任何赛后更改的数据将被视为无效。 </li>
                    </ul>
                    <br />
                    <p class="b sub">
                        2.12. 梦幻篮球游戏规则</p>
                    <ul style="list-style: decimal">
                        <li>梦幻篮球游戏将从同一天的赛事中任意选择两个球队（且原定不是在同一场赛事比赛的球队）进行投注。 </li>
                        <li>梦幻比赛赛果会根据球队真实的比分为准；梦幻比赛的让分数则以球队真实比分来计算。 </li>
                        <li>梦幻赛中的两支球队必须在同一天比赛，投注才被视为有效。 </li>
                        <li>如果球队的比赛日子和本公司网站显示的日子不在同一天，所有涉及此球队的梦幻赛注单将被取消。 </li>
                        <li>梦幻赛投注将不考虑赛事实际进行的场地。 </li>
                        <li>梦幻赛的举例如下:
                            <ul style="list-style: lower-alpha">
                                <li>波士顿凯尔特人101 – 98 芝加哥公牛，洛杉矶湖人118 – 101 奥兰多魔术</li>
                                <li>梦幻赛1： 波士顿凯尔特人vs 洛杉矶湖人</li>
                                <li>梦幻赛赛果：波士顿凯尔特人101 – 118洛杉矶湖人</li>
                                <li>梦幻赛的结算会根据各球队原定比赛的真实得分為準。 </li>
                            </ul>
                        </li>
                        <li>球队一定要实际完成原定比赛并且已在赛事的官方机构（例如：NBA）留下赛果记录，才能让涉及此球队的梦幻赛注单保持有效。如果球队没有完成原定比赛或最终赛果被官方否定，所有涉及此球队的梦幻赛注单将被取消。
                        </li>
                        <li>所有梦幻赛都将按照篮球个别玩法的规则和标准裁决。 </li>
                    </ul>
                    <br />
                </ul>
                <div class="to_top">
                    <a href="#top"><span>回最上层</span></a></div>
            </div>
            <div id="info5" class="displayno">
                <p class="b sub">
                    网球</p>
                <p class="b sub">
                    1. 一般规则</p>
                <ul style="list-style: decimal;">
                    <li>如果比赛场地的表面有变更，所有投注的注单将被取消。 </li>
                    <li>所有投注的注单均在比赛结束后才被视为有效，除非另有注明。 </li>
                    <li>如果投注的球员没有参与比赛，所有投注此球员的注单将被取消。 </li>
                    <li>如果一名球员或组合在比赛未结束前退出或被取消资格，所有该场比赛的注单将被取消，除非另有注明。 </li>
                    <li>如果比赛预定时间缩短或者需获胜比赛的比分提高，所有注单将被取消。 </li>
                    <li>如果赛事延期或中断，只要比赛最后有完成，所有投注将保持有效。 </li>
                    <li>如果赛事开出单局或单盘的盘口，而球员在赛事的某局或某盘退出或被取消资格，所有投注此局或此盘的注单将被取消，除非另有注明。 </li>
                    <li>如果比赛在法定时间提前进行，在比赛开始前的投注依然有效，在比赛开始后的所有投注均视为无效(滚球投注另作别论)。 </li>
                    <li>网球大满贯（四大公开赛：澳洲网球公开赛、美国网球公开赛、法国网球公开赛、温布顿网球公开赛），比赛结算方式:
                        <ul style="list-style: lower-alpha">
                            <li>男子组比赛：五盘中先赢三盘的球员，为胜方。 </li>
                            <li>女子组比赛：三盘中先赢两盘的球员，为胜方。 </li>
                        </ul>
                    </li>
                </ul>
                <p class="b sub">
                    2. 投注类型</p>
                <p>
                    以下列出网球可提供的个别玩法规则。
                </p>
                <ul style="margin-left: 25px;">
                    <p class="b sub">
                        2.1. 独赢盘</p>
                    <ul style="list-style: decimal">
                        <li>预测哪一位球员将在比赛胜出。盘口提供两位球员为投注选项。 </li>
                    </ul>
                    <p class="b sub">
                        2.2. 让盘盘</p>
                    <ul style="list-style: decimal">
                        <li>预测哪一位球员在盘口指定的让盘数赢得比赛。 </li>
                    </ul>
                    <p class="b sub">
                        2.3. 让局盘</p>
                    <ul style="list-style: decimal">
                        <li>预测哪一位球员在盘口指定的让局数在某个时节（例如:全场比赛/第一盘/第二盘）赢得最多局。 </li>
                        <li>决胜局(抢七局)将视为一局。 </li>
                    </ul>
                    <p class="b sub">
                        2.4. 大/小（局）</p>
                    <ul style="list-style: decimal">
                        <li>V预测比赛中的某个时节（例如:全场比赛/第一盘/第二盘）进行的总局数将大于或小于在盘口指定的大/小盘局数。 </li>
                        <li>决胜局(抢七局)将视为一局。 </li>
                        <li>如果比赛中断前已有明确结果并且之后没有任何显著会影响赛事结果的情况，大/小盘注单才会被结算。若遇到任何其他情况，注单将一律被取消。 </li>
                    </ul>
                    <p class="b sub">
                        2.5. 单/双</p>
                    <ul style="list-style: decimal">
                        <li>预测比赛中的某个时节（例如:全场比赛/第一盘/第二盘）进行的总局数是单数或双数。 </li>
                        <li>决胜局(抢七局)将视为一局。 </li>
                    </ul>
                    <p class="b sub">
                        2.6. 单盘投注</p>
                    <ul style="list-style: decimal">
                        <li>预测单盘最终结果。 </li>
                        <li>投注的注单只有在单盘结束后才被视为有效。 </li>
                        <li>如果球员在某盘未结束前退出或被取消资格，所有投注此盘的注单将被取消。 </li>
                    </ul>
                    <p class="b sub">
                        2.7. 单盘-波胆投注</p>
                    <ul style="list-style: decimal">
                        <li>预测比赛的每盘比分。 </li>
                    </ul>
                </ul>
                <div class="to_top">
                    <a href="#top"><span>回最上层</span></a></div>
            </div>
            <div id="info6" class="displayno">
                <p class="b sub">
                    排球</p>
                <p class="b sub">
                    1. 一般规则</p>
                <ul style="list-style: decimal;">
                    <li>所有注单都以全场赛事结束视为有效，除非另有特别说明。 </li>
                    <li>赛事以五局三胜制，所有的投注都将​​依首先赢得三局的球队为准。 </li>
                    <li>如果比赛预定时间缩短，或者赛事获胜要求比分提高，所有注单将被取消。 </li>
                    <li>如赛事中断，暂停或者延后并不在官方开赛时间12小时内重新开始，除了潜在进球/得分不影响注单最终结果及另行声明或单独的体育规则以外，其他情况一律无效。公司决定取消赛事所有的注单的结果被视为最终结果，不参考任何官方赛事裁判或相关部门的决定。</li>
                    <li>如果比赛提前开赛，只有在开赛之前投注的注单将为视为有效投注。在开赛后投注的注单将被视为无效， 滚球玩法除外</li>
                </ul>
                <p class="b sub">
                    2. 投注类型</p>
                <p>
                    以下是排球单个投注类型的分类规则。
                </p>
                <ul style="margin-left: 25px;">
                    <p class="b sub">
                        2.1. 投注</p>
                    <ul style="list-style: decimal">
                        <li>预测哪队将赢取比赛的胜利</li>
                    </ul>
                    <p class="b sub">
                        2.2. 让球盘</p>
                    <ul style="list-style: decimal">
                        <li>预测将赢取让球盘的比赛胜利。 </li>
                    </ul>
                    <p class="b sub">
                        2.3. 让分盘</p>
                    <ul style="list-style: decimal">
                        <li>预测哪队将在让分盘的情况下赢取整场比赛或者第一局，第二局中更多的比分。 </li>
                    </ul>
                    <p class="b sub">
                        2.4. 比分大小</p>
                    <ul style="list-style: decimal">
                        <li>预测正常赛事中，或者单局中总比分将大于或者小于指定盘口。 </li>
                        <li>如果赛事中断前已有明确结果并且之后没有任何显著会影响赛事结果的情况，大小球投注的注单才会被结算。若遇到任何其他情况，注单将一律被取消。 </li>
                    </ul>
                    <p class="b sub">
                        2.5. 单/双</p>
                    <ul style="list-style: decimal">
                        <li>预测每场赛事或者每个单局的比分是单数还是双数。 </li>
                    </ul>
                </ul>
                <div class="to_top">
                    <a href="#top"><span>回最上层</span></a></div>
            </div>
            <div id="info7" class="displayno">
                <p class="b sub">
                    棒球</p>
                <p class="b sub">
                    1. 一般规则</p>
                <ul style="list-style: decimal;">
                    <li>如果比赛场地有变更，所有注单将被取消。 </li>
                    <li>国际棒球比赛规则: 如果比赛最少进行七局后有一队领先10分，或进行五局后有一队领先15分，赛事将会提早结束。如果遇此情况，所有的投注将继续保持有效，包括独赢盘，单/双盘，让分盘（让垒盘）和大/小盘（总比分）。
                    </li>
                    <li>若投注让分盘和大/小盘（总比分），比赛结果以9局后为准（如果对手已经领先，结果便以8局半为准）。如果赛事在加局赛时被保留或中断，比分将以最后一局的结果为准，除非主队打成平局，或在加局赛的下半场已经领先对手，比分将以比赛被保留时的结果为准。
                    </li>
                    <li>如赛事中断，暂停或者延后并不在官方开赛时间12小时内重新开始，除了潜在进球不影响注单最终结果以外，其他情况一律无效，除非声明或单独的体育规则。公司决定取消赛事所有的注单的结果被视为最终结果，不参考任何官方赛事裁判的决定或相关部门。连串投注将会按照剩余投注赛果结算。</li>
                    <li>出于结算的用意，加时赛将计算在内，除非另有注明。 </li>
                    <li>上半场投注是按照第1局到第5局的结果为准。 </li>
                    <li>下半场投注是按照第6局到第9局的结果为准。出于结算的用意，下半场的加时赛将计算在内。 </li>
                    <li>在不考虑第一投手的情况下，注单将保持有效。 </li>
                    <li>如果赛事是在下半场中断所有上半场的投注保持有效。 </li>
                    <li>如果赛事是在下半场中断，所有下半场的注单将被取消，除非在个别玩法规则另有注明。 </li>
                    <li>如比赛在法定时间提前进行，在比赛开始前的投注依然有效，在比赛开始后的所有投注均视为无效(滚球投注另作别论)。 </li>
                </ul>
                <p class="b sub">
                    2. 投注类型</p>
                <p>
                    以下列出棒球可提供的个别玩法规则。
                </p>
                <ul style="margin-left: 25px;">
                    <p class="b sub">
                        2.1. 独赢盘</p>
                    <ul style="list-style: decimal;">
                        <li>预测哪一支球队将在比赛胜出。 </li>
                        <li>出于结算的用意，加时赛将计算在内。 </li>
                    </ul>
                    <p class="b sub">
                        2.2. 让分盘</p>
                    <ul style="list-style: decimal;">
                        <li>预测那一支球队在盘口指定的让分数赢得某个时节或全场比赛。 </li>
                        <li>出于结算的用意，加时赛将计算在内。 </li>
                    </ul>
                    <p class="b sub">
                        2.3. 滚球让分盘</p>
                    <ul style="list-style: decimal;">
                        <li>预测那一支球队在盘口指定的让分数赢得某个时节或全场比赛。 </li>
                        <li>结算是以投注时到比赛/时节结束后的赛果做裁决。 </li>
                        <li>出于结算的用意，加时赛将计算在内。 </li>
                    </ul>
                    <p class="b sub">
                        2.4. 大/小盘(总比分)</p>
                    <ul style="list-style: decimal;">
                        <li>预测赛事总比分将大于或小于在盘口指定的大/小盘分数。 </li>
                        <li>出于结算的用意，加时赛将计算在内。 </li>
                        <li>如果赛事中断前已有明确结果并且之后没有任何显著会影响赛事结果的情况，大/小盘注单才会被结算。若遇到任何其他情况，注单将一律被取消。 </li>
                        <li>如果赛事在上半场中断，所有上半场注单将被取消，除非中断前已有明确结果并且之后没有任何显著会影响赛事结果的情况注单才会被结算。 </li>
                        <li>如果赛事在下半场取消或中断，所有上半场注单保持有效。 </li>
                        <li>如果赛事在下半场取消或中断，所有下半场注单将被取消，除非中断前已有明确结果并且之后没有任何显著会影响赛事结果的情况注单才会被结算。 </li>
                    </ul>
                    <p class="b sub">
                        2.5. 滚球大/小盘(总比分)</p>
                    <ul style="list-style: decimal;">
                        <li>预测赛事总比分将大于或小于在盘口指定的大/小盘分数。 </li>
                        <li>结算是以0-0的比分按盘口开出的大小盘让分数做裁决。投注当时的比分对结算没有影响。 </li>
                        <li>出于结算的用意，加时赛将计算在内。 </li>
                    </ul>
                    <p class="b sub">
                        2.6. 单/双</p>
                    <ul style="list-style: decimal;">
                        <li>预测赛事的总比分是单数或双数。 </li>
                        <li>出于结算的用意，加时赛将计算在内。 </li>
                    </ul>
                </ul>
                <div class="to_top">
                    <a href="#top"><span>回最上层</span></a></div>
            </div>
            <div id="info8" class="displayno">
                <p class="b sub">
                    冠军投注</p>
                <p>
                    在指定的冠军盘中，预测一场锦标赛, 联赛, 或者比赛的冠军。所选择的队伍或选手获得最终胜利视为符合派彩条件，包括：
                </p>
                <ul style="list-style: decimal">
                    <li>联赛的最终结果，例如: 世界杯冠军或F1车手冠军。 </li>
                    <li>在预赛中胜出，例如: 世界杯小组冠军。 </li>
                    <li>在最后一场赛事中，例如: 能否出线，能否踢加时，能否踢点球。 </li>
                    <li>比赛的最终结果，例如：F1赛事的个人冠军。 </li>
                    <li>最高得分数。 </li>
                    <li>最优秀的选手等。 </li>
                </ul>
                <p class="b">
                    1. 一般规则</p>
                <ul style="list-style: decimal">
                    <li>所有冠军投注基于比赛的最终结果。 </li>
                    <li>如果所投注的球员参加了此次的竞赛、联赛或比赛，即使球员被取消资格、退职或没有完成比赛，不论任何原因，所有投注此球员的注单都将被视为有效。 </li>
                    <li>冠军是根据符合最后判定结果为赢的球队/球员。 </li>
                    <li>无论在什么情况下，如果使用"其他球员"或"其他球队"代替名称的参赛者将被视为无名称。 </li>
                    <li>如果体育项目有开出特殊规则，则其将取代一般适用规则。 </li>
                    <li>冠军项目月份榜首榜尾结算规则: 此项目计算方式于该月第一日至最后一日（英国时间23: 59），如遇最后一日赛事延赛或赛事取消则不予计算，不影响该项目的计算。延迟或取消的赛事不予计算，如果由于人为错误或技术故障，赛果出来后盘口没有关闭，公司有权取消因此错误下注的注单。
                    </li>
                    <li>冠军项目月份榜首榜尾结算规则: 此项目计算方式于该月第一日至最后一日（英国时间23: 59），如遇最后一日赛事延赛或赛事取消则不予计算，不影响该项目的计算。延迟或取消的赛事不予计算，如果由于人为错误或技术故障，赛果出来后盘口没有关闭，公司有权取消因此错误下注的注单。
                    </li>
                </ul>
                <div class="to_top">
                    <a href="#top"><span>回最上层</span></a></div>
            </div>
        </div>
    </div>
    <div class="qa_foot">
    </div>
</body>
</html>