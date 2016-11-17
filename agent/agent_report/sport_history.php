<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/utils/convert_name.php");
include_once($C_Patch."/app/member/class/report_sport.php");

include_once("../class/admin.php");
include_once("../lottery/getContentName.php");



$s_time = $_GET["s_time"];
if(!$s_time){
    $s_time = date('Y-m-d');
}
$e_time = $_GET["e_time"];
if(!$e_time){
    $e_time = date('Y-m-d');
}
$user_group = $_GET["user_group"];
$user_ignore_group = $_GET["user_ignore_group"];

$date_month = $_GET['date_month'];

?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Welcome</title>
    <link rel="stylesheet" href="../images/css/admin_style_1.css" type="text/css" media="all" />
</head>
<script type="text/javascript" charset="utf-8" src="/js/jquery-1.7.1.js" ></script>
<script language="javascript">

    function setDate(dateType){
        var dateNow= new Date();
        var dateStart;
        var dateEnd;
        if(dateType=="today"){
            dateStart = dateNow.Format("yyyy-MM-dd");
            dateEnd = dateNow.Format("yyyy-MM-dd");
        }else if(dateType=="yesterday"){
            dateNow.addDays(-1);
            dateStart = dateNow.Format("yyyy-MM-dd");
            dateEnd = dateNow.Format("yyyy-MM-dd");
        }else if(dateType=="lastSeven"){//最近7天
            dateEnd = dateNow.Format("yyyy-MM-dd");
            dateNow.addDays(-6);
            dateStart = dateNow.Format("yyyy-MM-dd");
        }else if(dateType=="lastThirty"){//最近30天
            dateEnd = dateNow.Format("yyyy-MM-dd");
            dateNow.addDays(-29);
            dateStart = dateNow.Format("yyyy-MM-dd");
        }else if(dateType=="thisWeek"){//本周
            dateEnd = dateNow.Format("yyyy-MM-dd");
            dateNow.addDays(-dateNow.getDay());
            dateStart = dateNow.Format("yyyy-MM-dd");
        }else if(dateType=="lastWeek"){//上周
            dateNow.addDays(-dateNow.getDay()-1);
            dateEnd = dateNow.Format("yyyy-MM-dd");
            dateNow.addDays(-6);
            dateStart = dateNow.Format("yyyy-MM-dd");
        }else if(dateType=="thisMonth"){//本月
            dateEnd = dateNow.Format("yyyy-MM-dd");
            dateNow.addDays(-dateNow.getDate()+1);
            dateStart = dateNow.Format("yyyy-MM-dd");
        }else if(dateType=="lastMonth"){//上月
            dateNow.addDays(-dateNow.getDate());
            dateEnd = dateNow.Format("yyyy-MM-dd");
            dateNow.addDays(-dateNow.getDate()+1);
            dateStart = dateNow.Format("yyyy-MM-dd");
        }
        $("#s_time").val(dateStart);
        $("#e_time").val(dateEnd);
        $("#form1").submit();
    }

    function check(){
        if(!$("#s_time").val() || !$("#e_time").val() ){
            alert("请输入开始/结束日期。")
        }
        return true;
    }

    function onChangeMonth(value){
        if(value==""){
            return;
        }
        var dateNow= new Date();
        var dateStart;
        var dateEnd;

        dateNow.addDays(-dateNow.getDate()+1);
        dateNow.addMonths(-dateNow.getMonth()+parseInt(value)-1);
        dateStart = dateNow.Format("yyyy-MM-dd");
        dateNow.addMonths(1);
        dateNow.addDays(-1);
        dateEnd = dateNow.Format("yyyy-MM-dd");

        $("#s_time").val(dateStart);
        $("#e_time").val(dateEnd);
        $("#form1").submit();
    }

    Date.prototype.Format = function (fmt) { //author: meizz
        var o = {
            "M+": this.getMonth() + 1, //月份
            "d+": this.getDate(), //日
            "h+": this.getHours(), //小时
            "m+": this.getMinutes(), //分
            "s+": this.getSeconds(), //秒
            "q+": Math.floor((this.getMonth() + 3) / 3), //季度
            "S": this.getMilliseconds() //毫秒
        };
        if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
        for (var k in o)
            if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
        return fmt;
    };
    Date.prototype.addDays = function(d)
    {
        this.setDate(this.getDate() + d);
    };

    Date.prototype.addWeeks = function(w)
    {
        this.addDays(w * 7);
    };

    Date.prototype.addMonths= function(m)
    {
        var d = this.getDate();
        this.setMonth(this.getMonth() + m);

        if (this.getDate() < d)
            this.setDate(0);
    };

    Date.prototype.addYears = function(y)
    {
        var m = this.getMonth();
        this.setFullYear(this.getFullYear() + y);

        if (m < this.getMonth())
        {
            this.setDate(0);
        }
    };
    //测试 var now = new Date(); now.addDays(1);//加减日期操作 alert(now.Format("yyyy-MM-dd"));

    Date.prototype.dateDiff = function(interval,endTime)
    {
        switch (interval)
        {
            case "s":   //計算秒差
                return parseInt((endTime-this)/1000);
            case "n":   //計算分差
                return parseInt((endTime-this)/60000);
            case "h":   //計算時差
                return parseInt((endTime-this)/3600000);
            case "d":   //計算日差
                return parseInt((endTime-this)/86400000);
            case "w":   //計算週差
                return parseInt((endTime-this)/(86400000*7));
            case "m":   //計算月差
                return (endTime.getMonth()+1)+((endTime.getFullYear()-this.getFullYear())*12)-(this.getMonth()+1);
            case "y":   //計算年差
                return endTime.getFullYear()-this.getFullYear();
            default:    //輸入有誤
                return undefined;
        }
    }
    //测试 var starTime = new Date("2007/05/12 07:30:00");     var endTime = new Date("2008/06/12 08:32:02");     document.writeln("秒差: "+starTime .dateDiff("s",endTime )+"<br>");     document.writeln("分差: "+starTime .dateDiff("n",endTime )+"<br>");     document.writeln("時差: "+starTime .dateDiff("h",endTime )+"<br>");     document.writeln("日差: "+starTime .dateDiff("d",endTime )+"<br>");     document.writeln("週差: "+starTime .dateDiff("w",endTime )+"<br>");     document.writeln("月差: "+starTime .dateDiff("m",endTime )+"<br>");     document.writeln("年差: "+starTime .dateDiff("y",endTime )+"<br>");

</script>
<script language="JavaScript" src="/js/calendar.js"></script>
<body>
<div id="pageMain">
    <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
            <td valign="top">
                <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="font12" bgcolor="#798EB9">
                    <form name="form1" id="form1" method="get" action="<?=$_SERVER["REQUEST_URI"]?>" onSubmit="return check();">
                        <tr>
                            <td align="left" bgcolor="#FFFFFF">
                                &nbsp;&nbsp;
                                日期：<input name="s_time" type="text" id="s_time" value="<?=$s_time?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
                                ~
                                <input name="e_time" type="text" id="e_time" value="<?=$e_time?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
                                &nbsp;&nbsp;
                                <input type="button" value="今日" onclick="setDate('today')"/>
                                <input type="button" value="昨日" onclick="setDate('yesterday')"/>
                                <input type="button" value="本周" onclick="setDate('thisWeek')"/>
                                <input type="button" value="上周" onclick="setDate('lastWeek')"/>
                                <input type="button" value="本月" onclick="setDate('thisMonth')"/>
                                <input type="button" value="上月" onclick="setDate('lastMonth')"/>
                                <input type="button" value="最近7天" onclick="setDate('lastSeven')"/>
                                <input type="button" value="最近30天" onclick="setDate('lastThirty')"/>

                                <select name="date_month" id="date_month" onchange="onChangeMonth(this.value)">
                                    <option value="" <?=$date_month=='' ? 'selected' : ''?>>选择月份</option>
                                    <option value="1"  <?=$date_month==1 ? 'selected' : ''?>>1月</option>
                                    <option value="2"  <?=$date_month==2 ? 'selected' : ''?>>2月</option>
                                    <option value="3"  <?=$date_month==3 ? 'selected' : ''?>>3月</option>
                                    <option value="4"  <?=$date_month==4 ? 'selected' : ''?>>4月</option>
                                    <option value="5"  <?=$date_month==5 ? 'selected' : ''?>>5月</option>
                                    <option value="6"  <?=$date_month==6 ? 'selected' : ''?>>6月</option>
                                    <option value="7"  <?=$date_month==7 ? 'selected' : ''?>>7月</option>
                                    <option value="8"  <?=$date_month==8 ? 'selected' : ''?>>8月</option>
                                    <option value="9"  <?=$date_month==9 ? 'selected' : ''?>>9月</option>
                                    <option value="10" <?=$date_month==10 ? 'selected' : ''?>>10月</option>
                                    <option value="11" <?=$date_month==11 ? 'selected' : ''?>>11月</option>
                                    <option value="12" <?=$date_month==12 ? 'selected' : ''?>>12月</option>
                                </select>


                                <input type="submit" name="Submit" value="搜索">

                                <input name="user_group" value="<?=$user_group?>" style="width: 200px;" type="hidden">
                                <input name="user_ignore_group" value="<?=$user_ignore_group?>" type="hidden" style="width: 200px;">
                            </td>
                        </tr>
                        <tr>
                            <td align="left" bgcolor="#FFFFFF">
                            </td>
                        </tr>
                    </form>
                </table>

                <table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12" style="margin-top:5px;" bgcolor="#798EB9">
                    <tr style="background-color:#3C4D82; color:#FFF">
                        <td align="center" height="25"><strong>游戏名称</strong></td>
                        <td align="center"><strong>下注笔数</strong></td>
                        <td align="center"><strong>下注金额</strong></td>
                        <td align="center"><strong>下注结果</strong></td>
                        <td align="center"><strong>赢取金额</strong></td>
                    </tr>
                    <?php
                    include("../../include/pager.class.php");

                    $t_allmoney=0;
                    $t_sy=0;
                    $uid	=	'';
                    $inUserString = "";

                    if($user_group || $user_ignore_group){
                        $userArray = array();
                        $userIgnoreArray = array();
                        $userArrayString = "";
                        $userIgnoreArrayString = "";
                        $sql_sub = "";

                        if(strpos($user_group,",")!==false){
                            $userArray = explode(",",trim($user_group));
                        }elseif(strpos($user_group,"，")!==false){
                            $userArray = explode("，",trim($user_group));
                        }elseif($user_group){
                            $userArrayString = "'".$user_group."'";
                        }
                        if(strpos($user_ignore_group,",")!==false){
                            $userIgnoreArray = explode(",",trim($user_ignore_group));
                        }elseif(strpos($user_ignore_group,"，")!==false){
                            $userIgnoreArray = explode("，",trim($user_ignore_group));
                        }elseif($user_ignore_group){
                            $userIgnoreArrayString = "'".$user_ignore_group."'";
                        }
                        if($userArray){
                            foreach($userArray as $key => $value){
                                $userArrayString .= "'".trim($value)."'".",";
                            }
                            $userArrayString = substr($userArrayString, 0, -1);
                        }
                        if($userIgnoreArray){
                            foreach($userIgnoreArray as $key => $value){
                                $userIgnoreArrayString .= "'".trim($value)."'".",";
                            }
                            $userIgnoreArrayString = substr($userIgnoreArrayString, 0, -1);
                        }

                        $sql		=	"SELECT user_id FROM user_list";
                        if($userArrayString && $userIgnoreArrayString){
                            $sql_sub = " WHERE user_name IN($userArrayString) AND user_name NOT IN($userIgnoreArrayString)";
                        }elseif($userArrayString && !$userIgnoreArrayString){
                            $sql_sub = " WHERE user_name IN($userArrayString)";
                        }elseif(!$userArrayString && $userIgnoreArrayString){
                            $sql_sub = " WHERE user_name NOT IN($userIgnoreArrayString)";
                        }

                        $sql .= $sql_sub;
                        $query	=	$mysqli->query($sql)or die ("error!");
                        $rs = array();
                        while($row = $query->fetch_array()){
                            $rs[] = $row;
                        }
                        if(count($rs)>0){
                            foreach($rs as $key => $value){
                                $inUserString .= "'".$value["user_id"]."'".",";
                            }
                            $inUserString = "(".substr($inUserString, 0, -1).")";
                        }elseif(count($rs)==0){
                            $inUserString = "('')";
                        }
                    }

                    $ft_result = report_sport::getBetMoneyAndCount($s_time,$e_time,"足球",$inUserString," AND status!=0 AND status!=3 AND `check`!=0 ");
                    $bk_result = report_sport::getBetMoneyAndCount($s_time,$e_time,"篮球",$inUserString," AND status!=0 AND status!=3 AND `check`!=0 ");
                    $tn_result = report_sport::getBetMoneyAndCount($s_time,$e_time,"网球",$inUserString," AND status!=0 AND status!=3 AND `check`!=0 ");
                    $vl_result = report_sport::getBetMoneyAndCount($s_time,$e_time,"排球",$inUserString," AND status!=0 AND status!=3 AND `check`!=0 ");
                    $bs_result = report_sport::getBetMoneyAndCount($s_time,$e_time,"棒球",$inUserString," AND status!=0 AND status!=3 AND `check`!=0 ");
                    $gj_result = report_sport::getBetMoneyAndCount($s_time,$e_time,"冠军",$inUserString," AND status!=0 AND status!=3 AND `check`!=0 ");
                    $ds_result = report_sport::getBetMoneyAndCount($s_time,$e_time,"单式",$inUserString," AND status!=0 AND status!=3 AND `check`!=0 ");
                    $cg_result = report_sport::getBetMoneyAndCountCg($s_time,$e_time,$inUserString," AND status!=0 AND status!=3 AND `check`!=0 ");
                    $other_result = report_sport::getBetMoneyAndCount($s_time,$e_time,"其他",$inUserString," AND status!=0 AND status!=3 AND `check`!=0 ");

                    $ft_win = report_sport::getTotalWin($s_time,$e_time,"足球",$inUserString," AND status!=0 AND status!=3 AND `check`!=0 ");
                    $bk_win = report_sport::getTotalWin($s_time,$e_time,"篮球",$inUserString," AND status!=0 AND status!=3 AND `check`!=0 ");
                    $tn_win = report_sport::getTotalWin($s_time,$e_time,"网球",$inUserString," AND status!=0 AND status!=3 AND `check`!=0 ");
                    $vl_win = report_sport::getTotalWin($s_time,$e_time,"排球",$inUserString," AND status!=0 AND status!=3 AND `check`!=0 ");
                    $bs_win = report_sport::getTotalWin($s_time,$e_time,"棒球",$inUserString," AND status!=0 AND status!=3 AND `check`!=0 ");
                    $gj_win = report_sport::getTotalWin($s_time,$e_time,"冠军",$inUserString," AND status!=0 AND status!=3 AND `check`!=0 ");
                    $ds_win = report_sport::getTotalWin($s_time,$e_time,"单式",$inUserString," AND status!=0 AND status!=3 AND `check`!=0 ");
                    $cg_win = report_sport::getTotalWinCg($s_time,$e_time,$inUserString," AND status!=0 AND status!=3 AND `check`!=0 ");
                    $other_win = report_sport::getTotalWin($s_time,$e_time,"其他",$inUserString," AND status!=0 AND status!=3 AND `check`!=0 ");

                    $total_bet_count = $ft_result["bet_count"] + $bk_result["bet_count"]
                        + $tn_result["bet_count"] + $vl_result["bet_count"]+ $bs_result["bet_count"]
                        + $gj_result["bet_count"] + $cg_result["bet_count"]+ $other_result["bet_count"];
                    $total_bet_money = $ft_result["bet_money"] + $bk_result["bet_money"]
                        + $tn_result["bet_money"] + $vl_result["bet_money"]+ $bs_result["bet_money"]
                        + $gj_result["bet_money"]+ $cg_result["bet_money"]+ $other_result["bet_money"];
                    $total_win_money = $ft_win + $bk_win + $tn_win + $vl_win + $bs_win + $gj_win + $cg_win + $other_win;

                    ?>
                    <tr align="center"  style="background-color:#FFFFFF; line-height:20px;">
                        <td height="25" align="center" valign="middle">
                            <a title="足球" style="color: #F37605;"  href="sport_details.php?gtype=<?=urldecode('足球')?>&amp;s_time=<?=$s_time?>&amp;e_time=<?=$e_time?>&amp;user_group=<?=$user_group?>&amp;user_ignore_group=<?=$user_ignore_group?>&amp;date_month=<?=$date_month?>">足球</a>
                        </td>
                        <td align="center" valign="middle"><?=$ft_result["bet_count"]?></td>
                        <td align="center" valign="middle"><?=$ft_result["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$ft_win?></td>
                        <td align="center" valign="middle"><?=$ft_result["bet_money"]-$ft_win?></td>
                    </tr>
                    <tr align="center"  style="background-color:#FFFFFF; line-height:20px;">
                        <td height="25" align="center" valign="middle">
                            <a title="篮球" style="color: #F37605;" href="sport_details.php?gtype=<?=urldecode('篮球')?>&amp;s_time=<?=$s_time?>&amp;e_time=<?=$e_time?>&amp;user_group=<?=$user_group?>&amp;user_ignore_group=<?=$user_ignore_group?>&amp;date_month=<?=$date_month?>">篮球</a>
                        </td>
                        <td align="center" valign="middle"><?=$bk_result["bet_count"]?></td>
                        <td align="center" valign="middle"><?=$bk_result["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$bk_win?></td>
                        <td align="center" valign="middle"><?=$bk_result["bet_money"]-$bk_win?></td>
                    </tr>
                    <tr align="center"  style="background-color:#FFFFFF; line-height:20px;">
                        <td height="25" align="center" valign="middle">
                            <a title="网球" style="color: #F37605;" href="sport_details.php?gtype=<?=urldecode('网球')?>&amp;s_time=<?=$s_time?>&amp;e_time=<?=$e_time?>&amp;user_group=<?=$user_group?>&amp;user_ignore_group=<?=$user_ignore_group?>&amp;date_month=<?=$date_month?>">网球</a>
                        </td>
                        <td align="center" valign="middle"><?=$tn_result["bet_count"]?></td>
                        <td align="center" valign="middle"><?=$tn_result["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$tn_win?></td>
                        <td align="center" valign="middle"><?=$tn_result["bet_money"]-$tn_win?></td>
                    </tr>
                    <tr align="center"  style="background-color:#FFFFFF; line-height:20px;">
                        <td height="25" align="center" valign="middle">
                            <a title="排球" style="color: #F37605;" href="sport_details.php?gtype=<?=urldecode('排球')?>&amp;s_time=<?=$s_time?>&amp;e_time=<?=$e_time?>&amp;user_group=<?=$user_group?>&amp;user_ignore_group=<?=$user_ignore_group?>&amp;date_month=<?=$date_month?>">排球</a>
                        </td>
                        <td align="center" valign="middle"><?=$vl_result["bet_count"]?></td>
                        <td align="center" valign="middle"><?=$vl_result["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$vl_win?></td>
                        <td align="center" valign="middle"><?=$vl_result["bet_money"]-$vl_win?></td>
                    </tr>
                    <tr align="center"  style="background-color:#FFFFFF; line-height:20px;">
                        <td height="25" align="center" valign="middle">
                            <a title="棒球" style="color: #F37605;" href="sport_details.php?gtype=<?=urldecode('棒球')?>&amp;s_time=<?=$s_time?>&amp;e_time=<?=$e_time?>&amp;user_group=<?=$user_group?>&amp;user_ignore_group=<?=$user_ignore_group?>&amp;date_month=<?=$date_month?>">棒球</a>
                        </td>
                        <td align="center" valign="middle"><?=$bs_result["bet_count"]?></td>
                        <td align="center" valign="middle"><?=$bs_result["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$bs_win?></td>
                        <td align="center" valign="middle"><?=$bs_result["bet_money"]-$bs_win?></td>
                    </tr>
                    <tr align="center"  style="background-color:#FFFFFF; line-height:20px;">
                        <td height="25" align="center" valign="middle">
                            <a title="冠军" style="color: #F37605;" href="sport_details.php?gtype=<?=urldecode('冠军')?>&amp;s_time=<?=$s_time?>&amp;e_time=<?=$e_time?>&amp;user_group=<?=$user_group?>&amp;user_ignore_group=<?=$user_ignore_group?>&amp;date_month=<?=$date_month?>">冠军</a>
                        </td>
                        <td align="center" valign="middle"><?=$gj_result["bet_count"]?></td>
                        <td align="center" valign="middle"><?=$gj_result["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$gj_win?></td>
                        <td align="center" valign="middle"><?=$gj_result["bet_money"]-$gj_win?></td>
                    </tr>
                    <tr align="center"  style="background-color:#FFFFFF; line-height:20px;">
                        <td height="25" align="center" valign="middle">
                            <a title="串关" style="color: #F37605;" href="sport_details_cg.php?gtype=<?=urldecode('串关')?>&amp;s_time=<?=$s_time?>&amp;e_time=<?=$e_time?>&amp;user_group=<?=$user_group?>&amp;user_ignore_group=<?=$user_ignore_group?>&amp;date_month=<?=$date_month?>">串关</a>
                        </td>
                        <td align="center" valign="middle"><?=$cg_result["bet_count"]?></td>
                        <td align="center" valign="middle"><?=$cg_result["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$cg_win?></td>
                        <td align="center" valign="middle"><?=$cg_result["bet_money"]-$cg_win?></td>
                    </tr>
                    <tr align="center"  style="background-color:#FFFFFF; line-height:20px;">
                        <td height="25" align="center" valign="middle">
                            <a title="其他" style="color: #F37605;" href="sport_details.php?gtype=<?=urldecode('其他')?>&amp;s_time=<?=$s_time?>&amp;e_time=<?=$e_time?>&amp;user_group=<?=$user_group?>&amp;user_ignore_group=<?=$user_ignore_group?>&amp;date_month=<?=$date_month?>">其他</a>
                        </td>
                        <td align="center" valign="middle"><?=$other_result["bet_count"]?></td>
                        <td align="center" valign="middle"><?=$other_result["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$other_win?></td>
                        <td align="center" valign="middle"><?=$other_result["bet_money"]-$other_win?></td>
                    </tr>

                    <tr align="center"  style="background-color:#FFFFFF; line-height:20px;">
                        <td height="25" align="center" valign="middle">总计</td>
                        <td align="center" valign="middle"><?=$total_bet_count?></td>
                        <td align="center" valign="middle"><?=$total_bet_money?></td>
                        <td align="center" valign="middle"><?=$total_win_money?></td>
                        <td align="center" valign="middle"><?=$total_bet_money - $total_win_money?></td>
                    </tr>
                    <tr align="center"  style="background-color:#FFFFFF; line-height:20px;">
                        <td height="25" align="center" valign="middle" colspan="5">赢取金额=下注金额-下注结果。如果是正数，说明赢钱，如果是负数，则为输钱。</td>
                    </tr>

                    <tr align="center"  style="display: none;background-color:#FFFFFF; line-height:20px;">
                        <td height="25" align="center" valign="middle">
                            <a title="单式" style="color: #F37605;" href="sport_details.php?gtype=<?=urldecode('单式')?>&amp;s_time=<?=$s_time?>&amp;e_time=<?=$e_time?>&amp;user_group=<?=$user_group?>&amp;user_ignore_group=<?=$user_ignore_group?>&amp;date_month=<?=$date_month?>">单式</a>
                        </td>
                        <td align="center" valign="middle"><?=$ds_result["bet_count"]?></td>
                        <td align="center" valign="middle"><?=$ds_result["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$ds_win?></td>
                        <td align="center" valign="middle"><?=$ds_result["bet_money"]-$ds_win?></td>
                    </tr>
                    <tr align="center"  style="display: none;background-color:#FFFFFF; line-height:20px;">
                        <td height="25" align="center" valign="middle" colspan="5">单式=足球+篮球+网球+排球+棒球+其他。</td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</div>
</body>
</html>