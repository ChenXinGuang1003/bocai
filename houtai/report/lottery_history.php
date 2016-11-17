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
include_once($C_Patch."/app/member/class/lottery_order.php");

include_once("../class/admin.php");
include_once("../common/login_check.php");
include_once("../lottery/getContentName.php");


check_quanxian("查看报表");

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
<script type="text/javascript" charset="utf-8" src="../js/jquery-1.7.2.min.js" ></script>
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
                            </td>
                        </tr>
                        <tr>
                            <td align="left" bgcolor="#FFFFFF">
                                &nbsp;&nbsp;
                                用户名：<input name="user_group" value="<?=$user_group?>" style="width: 200px;" type="text"> (多个用户用 , 隔开)
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                忽略用户名：<input name="user_ignore_group" value="<?=$user_ignore_group?>" type="text" style="width: 200px;"> (多个用户用 , 隔开)
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="submit" name="Submit" value="搜索">
                            </td>
                        </tr>
                    </form>
                </table>

                <table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12" style="margin-top:5px;" bgcolor="#798EB9">
                    <tr style="background-color:#3C4D82; color:#FFF">
                        <td align="center" height="25"><strong>游戏名称</strong></td>
                        <td align="center"><strong>下注笔数</strong></td>
                        <td align="center"><strong>下注金额</strong></td>
                        <td align="center"><strong>有效金额</strong></td>
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

                    $d3_result = lottery_order::getBetMoneyAndCount($s_time,$e_time,"D3",$inUserString);
                    $p3_result = lottery_order::getBetMoneyAndCount($s_time,$e_time,"P3",$inUserString);
                    $t3_result = lottery_order::getBetMoneyAndCount($s_time,$e_time,"T3",$inUserString);
                    $cq_result = lottery_order::getBetMoneyAndCount($s_time,$e_time,"CQ",$inUserString);
                    $tj_result = lottery_order::getBetMoneyAndCount($s_time,$e_time,"TJ",$inUserString);
                    $jx_result = lottery_order::getBetMoneyAndCount($s_time,$e_time,"JX",$inUserString);
                    $gxsf_result = lottery_order::getBetMoneyAndCount($s_time,$e_time,"GXSF",$inUserString);
                    $gdsf_result = lottery_order::getBetMoneyAndCount($s_time,$e_time,"GDSF",$inUserString);
                    $tjsf_result = lottery_order::getBetMoneyAndCount($s_time,$e_time,"TJSF",$inUserString);
                    $cqsf_result = lottery_order::getBetMoneyAndCount($s_time,$e_time,"CQSF",$inUserString);
                    $gd11_result = lottery_order::getBetMoneyAndCount($s_time,$e_time,"GD11",$inUserString);
                    $bjpk_result = lottery_order::getBetMoneyAndCount($s_time,$e_time,"BJPK",$inUserString);
                    $bjkn_result = lottery_order::getBetMoneyAndCount($s_time,$e_time,"BJKN",$inUserString);

                    $d3_result_valid = lottery_order::getBetMoneyAndCount($s_time,$e_time,"D3",$inUserString," AND o.status!=0 AND o.status!=3 AND o_sub.is_win!=2 ");
                    $p3_result_valid = lottery_order::getBetMoneyAndCount($s_time,$e_time,"P3",$inUserString," AND o.status!=0 AND o.status!=3 AND o_sub.is_win!=2 ");
                    $t3_result_valid = lottery_order::getBetMoneyAndCount($s_time,$e_time,"T3",$inUserString," AND o.status!=0 AND o.status!=3 AND o_sub.is_win!=2 ");
                    $cq_result_valid = lottery_order::getBetMoneyAndCount($s_time,$e_time,"CQ",$inUserString," AND o.status!=0 AND o.status!=3 AND o_sub.is_win!=2 ");
                    $tj_result_valid = lottery_order::getBetMoneyAndCount($s_time,$e_time,"TJ",$inUserString," AND o.status!=0 AND o.status!=3 AND o_sub.is_win!=2 ");
                    $jx_result_valid = lottery_order::getBetMoneyAndCount($s_time,$e_time,"JX",$inUserString," AND o.status!=0 AND o.status!=3 AND o_sub.is_win!=2 ");
                    $gxsf_result_valid = lottery_order::getBetMoneyAndCount($s_time,$e_time,"GXSF",$inUserString," AND o.status!=0 AND o.status!=3 AND o_sub.is_win!=2 ");
                    $gdsf_result_valid = lottery_order::getBetMoneyAndCount($s_time,$e_time,"GDSF",$inUserString," AND o.status!=0 AND o.status!=3 AND o_sub.is_win!=2 ");
                    $tjsf_result_valid = lottery_order::getBetMoneyAndCount($s_time,$e_time,"TJSF",$inUserString," AND o.status!=0 AND o.status!=3 AND o_sub.is_win!=2 ");
                    $cqsf_result_valid = lottery_order::getBetMoneyAndCount($s_time,$e_time,"CQSF",$inUserString," AND o.status!=0 AND o.status!=3 AND o_sub.is_win!=2 ");
                    $gd11_result_valid = lottery_order::getBetMoneyAndCount($s_time,$e_time,"GD11",$inUserString," AND o.status!=0 AND o.status!=3 AND o_sub.is_win!=2 ");
                    $bjpk_result_valid = lottery_order::getBetMoneyAndCount($s_time,$e_time,"BJPK",$inUserString," AND o.status!=0 AND o.status!=3 AND o_sub.is_win!=2 ");
                    $bjkn_result_valid = lottery_order::getBetMoneyAndCount($s_time,$e_time,"BJKN",$inUserString," AND o.status!=0 AND o.status!=3 AND o_sub.is_win!=2 ");

                    $d3_win = lottery_order::getTotalWin($s_time,$e_time,"D3",$inUserString);
                    $p3_win = lottery_order::getTotalWin($s_time,$e_time,"P3",$inUserString);
                    $t3_win = lottery_order::getTotalWin($s_time,$e_time,"T3",$inUserString);
                    $cq_win = lottery_order::getTotalWin($s_time,$e_time,"CQ",$inUserString);
                    $tj_win = lottery_order::getTotalWin($s_time,$e_time,"TJ",$inUserString);
                    $jx_win = lottery_order::getTotalWin($s_time,$e_time,"JX",$inUserString);
                    $gxsf_win = lottery_order::getTotalWin($s_time,$e_time,"GXSF",$inUserString);
                    $gdsf_win = lottery_order::getTotalWin($s_time,$e_time,"GDSF",$inUserString);
                    $tjsf_win = lottery_order::getTotalWin($s_time,$e_time,"TJSF",$inUserString);
                    $cqsf_win = lottery_order::getTotalWin($s_time,$e_time,"CQSF",$inUserString);
                    $gd11_win = lottery_order::getTotalWin($s_time,$e_time,"GD11",$inUserString);
                    $bjpk_win = lottery_order::getTotalWin($s_time,$e_time,"BJPK",$inUserString);
                    $bjkn_win = lottery_order::getTotalWin($s_time,$e_time,"BJKN",$inUserString);

                    $total_bet_count = $d3_result["bet_count"] + $p3_result["bet_count"]
                        + $t3_result["bet_count"] + $cq_result["bet_count"]+ $tj_result["bet_count"]
                        + $jx_result["bet_count"]+ $gxsf_result["bet_count"] + $gdsf_result["bet_count"]
                        + $tjsf_result["bet_count"] + $gd11_result["bet_count"]+ $bjpk_result["bet_count"]
                        + $bjkn_result["bet_count"]+ $cqsf_result["bet_count"];
                    $total_bet_money = $d3_result["bet_money"] + $p3_result["bet_money"]
                        + $t3_result["bet_money"] + $cq_result["bet_money"]+ $tj_result["bet_money"]
                        + $jx_result["bet_money"]+ $gxsf_result["bet_money"] + $gdsf_result["bet_money"]
                        + $tjsf_result["bet_money"] + $gd11_result["bet_money"]+ $bjpk_result["bet_money"]
                        + $bjkn_result["bet_money"]+ $cqsf_result["bet_money"];
                    $total_bet_money_valid = $d3_result_valid["bet_money"] + $p3_result_valid["bet_money"]
                        + $t3_result_valid["bet_money"] + $cq_result_valid["bet_money"]+ $tj_result_valid["bet_money"]
                        + $jx_result_valid["bet_money"]+ $gxsf_result_valid["bet_money"] + $gdsf_result_valid["bet_money"]
                        + $tjsf_result_valid["bet_money"] + $gd11_result_valid["bet_money"]+ $bjpk_result_valid["bet_money"]
                        + $bjkn_result_valid["bet_money"]+ $cqsf_result_valid["bet_money"];
                    $total_win_money = $d3_win + $p3_win
                        + $t3_win + $cq_win+ $tj_win
                        + $jx_win+ $gxsf_win + $gdsf_win
                        + $tjsf_win + $gd11_win+ $bjpk_win
                        + $bjkn_win+ $cqsf_win;

                    ?>
                    <tr align="center"  style="background-color:#FFFFFF; line-height:20px;">
                        <td height="25" align="center" valign="middle">
                            <a title="3D彩" style="color: #F37605;" href="lottery_user.php?gtype=D3&amp;s_time=<?=$s_time?>&amp;e_time=<?=$e_time?>&amp;user_group=<?=$user_group?>&amp;user_ignore_group=<?=$user_ignore_group?>&amp;date_month=<?=$date_month?>">3D彩</a>
                        </td>
                        <td align="center" valign="middle"><?=$d3_result["bet_count"]?></td>
                        <td align="center" valign="middle"><?=$d3_result["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$d3_result_valid["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$d3_win?></td>
                        <td align="center" valign="middle"><?=$d3_result["bet_money"]-$d3_win?></td>
                    </tr>
                    <tr align="center"  style="background-color:#FFFFFF; line-height:20px;">
                        <td height="25" align="center" valign="middle">
                            <a title="排列三" style="color: #F37605;" href="lottery_user.php?gtype=P3&amp;s_time=<?=$s_time?>&amp;e_time=<?=$e_time?>&amp;user_group=<?=$user_group?>&amp;user_ignore_group=<?=$user_ignore_group?>&amp;date_month=<?=$date_month?>">排列三</a>
                        </td>
                        <td align="center" valign="middle"><?=$p3_result["bet_count"]?></td>
                        <td align="center" valign="middle"><?=$p3_result["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$p3_result_valid["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$p3_win?></td>
                        <td align="center" valign="middle"><?=$p3_result["bet_money"]-$p3_win?></td>
                    </tr>
                    <!-- <tr align="center"  style="background-color:#FFFFFF; line-height:20px;">
                        <td height="25" align="center" valign="middle">
                            <a title="上海时时乐" style="color: #F37605;" href="lottery_user.php?gtype=T3&amp;s_time=<?=$s_time?>&amp;e_time=<?=$e_time?>&amp;user_group=<?=$user_group?>&amp;user_ignore_group=<?=$user_ignore_group?>&amp;date_month=<?=$date_month?>">上海时时乐</a>
                        </td>
                        <td align="center" valign="middle"><?=$t3_result["bet_count"]?></td>
                        <td align="center" valign="middle"><?=$t3_result["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$t3_result_valid["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$t3_win?></td>
                        <td align="center" valign="middle"><?=$t3_result["bet_money"]-$t3_win?></td>
                    </tr> -->
                    <tr align="center"  style="background-color:#FFFFFF; line-height:20px;">
                        <td height="25" align="center" valign="middle">
                            <a title="重庆时时彩" style="color: #F37605;" href="lottery_user.php?gtype=CQ&amp;s_time=<?=$s_time?>&amp;e_time=<?=$e_time?>&amp;user_group=<?=$user_group?>&amp;user_ignore_group=<?=$user_ignore_group?>&amp;date_month=<?=$date_month?>">重庆时时彩</a>
                        </td>
                        <td align="center" valign="middle"><?=$cq_result["bet_count"]?></td>
                        <td align="center" valign="middle"><?=$cq_result["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$cq_result_valid["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$cq_win?></td>
                        <td align="center" valign="middle"><?=$cq_result["bet_money"]-$cq_win?></td>
                    </tr>
                 <!--   <tr align="center"  style="background-color:#FFFFFF; line-height:20px;">
                        <td height="25" align="center" valign="middle">
                            <a title="江西时时彩" style="color: #F37605;" href="lottery_user.php?gtype=JX&amp;s_time=<?=$s_time?>&amp;e_time=<?=$e_time?>&amp;user_group=<?=$user_group?>&amp;user_ignore_group=<?=$user_ignore_group?>&amp;date_month=<?=$date_month?>">江西时时彩</a>
                        </td>
                        <td align="center" valign="middle"><?=$jx_result["bet_count"]?></td>
                        <td align="center" valign="middle"><?=$jx_result["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$jx_result_valid["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$jx_win?></td>
                        <td align="center" valign="middle"><?=$jx_result["bet_money"]-$jx_win?></td>
                    </tr> 
                    <tr align="center"  style="background-color:#FFFFFF; line-height:20px;">
                        <td height="25" align="center" valign="middle">
                            <a title="天津时时彩" style="color: #F37605;" href="lottery_user.php?gtype=TJ&amp;s_time=<?=$s_time?>&amp;e_time=<?=$e_time?>&amp;user_group=<?=$user_group?>&amp;user_ignore_group=<?=$user_ignore_group?>&amp;date_month=<?=$date_month?>">天津时时彩</a>
                        </td>
                        <td align="center" valign="middle"><?=$tj_result["bet_count"]?></td>
                        <td align="center" valign="middle"><?=$tj_result["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$tj_result_valid["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$tj_win?></td>
                        <td align="center" valign="middle"><?=$tj_result["bet_money"]-$tj_win?></td>
                    </tr> -->
                    <!--  <tr align="center"  style="background-color:#FFFFFF; line-height:20px;">
                        <td height="25" align="center" valign="middle">
                            <a title="广西十分彩" style="color: #F37605;" href="lottery_user.php?gtype=GXSF&amp;s_time=<?=$s_time?>&amp;e_time=<?=$e_time?>&amp;user_group=<?=$user_group?>&amp;user_ignore_group=<?=$user_ignore_group?>&amp;date_month=<?=$date_month?>">广西十分彩</a>
                        </td>
                        <td align="center" valign="middle"><?=$gxsf_result["bet_count"]?></td>
                        <td align="center" valign="middle"><?=$gxsf_result["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$gxsf_result_valid["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$gxsf_win?></td>
                        <td align="center" valign="middle"><?=$gxsf_result["bet_money"]-$gxsf_win?></td>
                    </tr>
                    <tr align="center"  style="background-color:#FFFFFF; line-height:20px;">
                        <td height="25" align="center" valign="middle">
                            <a title="广东十分彩" style="color: #F37605;" href="lottery_user.php?gtype=GDSF&amp;s_time=<?=$s_time?>&amp;e_time=<?=$e_time?>&amp;user_group=<?=$user_group?>&amp;user_ignore_group=<?=$user_ignore_group?>&amp;date_month=<?=$date_month?>">广东十分彩</a>
                        </td>
                        <td align="center" valign="middle"><?=$gdsf_result["bet_count"]?></td>
                        <td align="center" valign="middle"><?=$gdsf_result["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$gdsf_result_valid["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$gdsf_win?></td>
                        <td align="center" valign="middle"><?=$gdsf_result["bet_money"]-$gdsf_win?></td>
                    </tr>
                   <!--  <tr align="center"  style="background-color:#FFFFFF; line-height:20px;">
                        <td height="25" align="center" valign="middle">
                            <a title="天津十分彩" style="color: #F37605;" href="lottery_user.php?gtype=TJSF&amp;s_time=<?=$s_time?>&amp;e_time=<?=$e_time?>&amp;user_group=<?=$user_group?>&amp;user_ignore_group=<?=$user_ignore_group?>&amp;date_month=<?=$date_month?>">天津十分彩</a>
                        </td>
                        <td align="center" valign="middle"><?=$tjsf_result["bet_count"]?></td>
                        <td align="center" valign="middle"><?=$tjsf_result["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$tjsf_result_valid["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$tjsf_win?></td>
                        <td align="center" valign="middle"><?=$tjsf_result["bet_money"]-$tjsf_win?></td>
                    </tr> -->
                  <!--   <tr align="center"  style="background-color:#FFFFFF; line-height:20px;">
                        <td height="25" align="center" valign="middle">
                            <a title="重庆十分彩" style="color: #F37605;" href="lottery_user.php?gtype=CQSF&amp;s_time=<?=$s_time?>&amp;e_time=<?=$e_time?>&amp;user_group=<?=$user_group?>&amp;user_ignore_group=<?=$user_ignore_group?>&amp;date_month=<?=$date_month?>">重庆十分彩</a>
                        </td>
                        <td align="center" valign="middle"><?=$cqsf_result["bet_count"]?></td>
                        <td align="center" valign="middle"><?=$cqsf_result["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$cqsf_result_valid["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$cqsf_win?></td>
                        <td align="center" valign="middle"><?=$cqsf_result["bet_money"]-$cqsf_win?></td>
                    </tr> -->
                    <tr align="center"  style="background-color:#FFFFFF; line-height:20px;">
                        <td height="25" align="center" valign="middle">
                            <a title="北京快乐8" style="color: #F37605;" href="lottery_user.php?gtype=BJKN&amp;s_time=<?=$s_time?>&amp;e_time=<?=$e_time?>&amp;user_group=<?=$user_group?>&amp;user_ignore_group=<?=$user_ignore_group?>&amp;date_month=<?=$date_month?>">北京快乐8</a>
                        </td>
                        <td align="center" valign="middle"><?=$bjkn_result["bet_count"]?></td>
                        <td align="center" valign="middle"><?=$bjkn_result["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$bjkn_result_valid["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$bjkn_win?></td>
                        <td align="center" valign="middle"><?=$bjkn_result["bet_money"]-$bjkn_win?></td>
                    </tr>
                  <!--   <tr align="center"  style="background-color:#FFFFFF; line-height:20px;">
                        <td height="25" align="center" valign="middle">
                            <a title="广东十一选五" style="color: #F37605;" href="lottery_user.php?gtype=GD11&amp;s_time=<?=$s_time?>&amp;e_time=<?=$e_time?>&amp;user_group=<?=$user_group?>&amp;user_ignore_group=<?=$user_ignore_group?>&amp;date_month=<?=$date_month?>">广东十一选五</a>
                        </td>
                        <td align="center" valign="middle"><?=$gd11_result["bet_count"]?></td>
                        <td align="center" valign="middle"><?=$gd11_result["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$gd11_result_valid["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$gd11_win?></td>
                        <td align="center" valign="middle"><?=$gd11_result["bet_money"]-$gd11_win?></td>
                    </tr> -->
                    <tr align="center"  style="background-color:#FFFFFF; line-height:20px;">
                        <td height="25" align="center" valign="middle">
                            <a title="北京PK拾" style="color: #F37605;" href="lottery_user.php?gtype=BJPK&amp;s_time=<?=$s_time?>&amp;e_time=<?=$e_time?>&amp;user_group=<?=$user_group?>&amp;user_ignore_group=<?=$user_ignore_group?>&amp;date_month=<?=$date_month?>">北京PK拾</a>
                        </td>
                        <td align="center" valign="middle"><?=$bjpk_result["bet_count"]?></td>
                        <td align="center" valign="middle"><?=$bjpk_result["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$bjpk_result_valid["bet_money"]?></td>
                        <td align="center" valign="middle"><?=$bjpk_win?></td>
                        <td align="center" valign="middle"><?=$bjpk_result["bet_money"]-$bjpk_win?></td>
                    </tr>

                    <tr align="center"  style="background-color:#FFFFFF; line-height:20px;">
                        <td height="25" align="center" valign="middle">总计</td>
                        <td align="center" valign="middle"><?=$total_bet_count?></td>
                        <td align="center" valign="middle"><?=$total_bet_money?></td>
                        <td align="center" valign="middle"><?=$total_bet_money_valid?></td>
                        <td align="center" valign="middle"><?=$total_win_money?></td>
                        <td align="center" valign="middle"><?=$total_bet_money - $total_win_money?></td>
                    </tr>
                    <tr align="center"  style="background-color:#FFFFFF; line-height:20px;">
                        <td height="25" align="center" valign="middle" colspan="6">赢取金额=下注金额-下注结果。如果是正数，说明赢钱，如果是负数，则为输钱。</td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</div>
</body>
</html>