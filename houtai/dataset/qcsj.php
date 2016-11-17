<?php
//ini_set("display_errors", "On");
//error_reporting(E_ALL | E_STRICT);
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

include_once("../class/admin.php");
include_once("../common/login_check.php");
include_once("../lottery/getContentName.php");

set_time_limit(0);


check_quanxian("数据管理");

$s_time = $_GET["s_time"];
if(!$s_time){
    $s_time = date('Y-m-d',strtotime('-30 day'));
}
$e_time = $_GET["e_time"];
if(!$e_time){
    $e_time = date('Y-m-d');
}
$s_time2 = $_GET["s_time2"];
if(!$s_time2){
    $s_time2 = date('Y-m-d',strtotime('-365 day'));
}
$e_time2 = $_GET["e_time2"];
if(!$e_time2){
    $e_time2 = date('Y-m-d',strtotime('-30 day'));
}
$user_group = $_GET["user_group"];
$user_ignore_group = $_GET["user_ignore_group"];

$date_month = $_GET['date_month'];

if($_GET["action"]=="savedata"){
    $start_time = $_GET["s_time"]." 00:00:00";
    $end_time = $_GET["e_time"]." 23:59:59";
    $sql = "delete from agents_money_log where do_time<='$start_time' or do_time>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from baseball_match where score_time<='$start_time' or score_time>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from bet_match where score_time<='$start_time' or score_time>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from history_bank where addtime<='$start_time' or addtime>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from history_login where login_time<='$start_time' or login_time>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from k_bet where bet_time<='$start_time' or bet_time>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from k_bet_cg where bet_time<='$start_time' or bet_time>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from k_bet_cg_group where bet_time<='$start_time' or bet_time>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from live_fs_list where fstime<='$start_time' or fstime>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from live_log where do_time<='$start_time' or do_time>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from live_order where order_time<='$start_time' or order_time>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from lottery_result_bjkn where datetime<='$start_time' or datetime>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from lottery_result_bjpk where datetime<='$start_time' or datetime>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from lottery_result_cq where datetime<='$start_time' or datetime>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from lottery_result_cqsf where datetime<='$start_time' or datetime>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from lottery_result_d3 where datetime<='$start_time' or datetime>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from lottery_result_gd11 where datetime<='$start_time' or datetime>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from lottery_result_gdsf where datetime<='$start_time' or datetime>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from lottery_result_gxsf where datetime<='$start_time' or datetime>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from lottery_result_jx where datetime<='$start_time' or datetime>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from lottery_result_lhc where datetime<='$start_time' or datetime>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from lottery_result_p3 where datetime<='$start_time' or datetime>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from lottery_result_t3 where datetime<='$start_time' or datetime>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from lottery_result_tj where datetime<='$start_time' or datetime>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from lottery_result_tjsf where datetime<='$start_time' or datetime>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from lq_match where score_time<='$start_time' or score_time>='$end_time'";
    $mysqli->query($sql);

//    $sql = "delete from manage_log where edtime<='$start_time' or edtime>='$end_time'";
//    $mysqli->query($sql);

    $sql = "delete from money where update_time<='$start_time' or update_time>='$end_time'";
    $mysqli->query($sql);


    $sql	=	"select order_lottery_sub.id from order_lottery,order_lottery_sub where order_lottery.order_num=order_lottery_sub.order_num and (order_lottery.bet_time<='$start_time' or order_lottery.bet_time>='$end_time')"; //彩票
    $query	=	$mysqli->query($sql);
    while ($rows = $query->fetch_array()) {
        $sub_id = $rows['id'];
        $sql = "delete from order_lottery_sub where id=$sub_id";
        $mysqli->query($sql);
    }
    $sql = "delete from order_lottery where bet_time<='$start_time' or bet_time>='$end_time'";
    $mysqli->query($sql);

    $sql	=	"select six_lottery_order_sub.id from six_lottery_order,six_lottery_order_sub where six_lottery_order.order_num=six_lottery_order_sub.order_num and (six_lottery_order.bet_time<='$start_time' or six_lottery_order.bet_time>='$end_time')"; //彩票
    $query	=	$mysqli->query($sql);
    while ($rows = $query->fetch_array()) {
        $sub_id = $rows['id'];
        $sql = "delete from six_lottery_order_sub where id=$sub_id";
        $mysqli->query($sql);
    }
    $sql = "delete from six_lottery_order where bet_time<='$start_time' or bet_time>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from other_match where score_time<='$start_time' or score_time>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from pay_error_log where update_time<='$start_time' or update_time>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from six_lottery_log where create_time<='$start_time' or create_time>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from sys_announcement2 where end_time<='$start_time' or end_time>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from t_guanjun where score_time<='$start_time' or score_time>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from tennis_match where score_time<='$start_time' or score_time>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from user_log where edtime<='$start_time' or edtime>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from user_msg where msg_time<='$start_time' or msg_time>='$end_time'";
    $mysqli->query($sql);

    $sql = "delete from volleyball_match where score_time<='$start_time' or score_time>='$end_time'";
    $mysqli->query($sql);


	$sql	=	"select id from money_log where update_time<='$start_time' or update_time>='$end_time' group by user_id order by update_time desc";
    $query	=	$mysqli->query($sql);
    $no_delete_id = "";
    while ($rows = $query->fetch_array()) {
        $no_delete_id .= $rows['id'].",";
    }
    if($no_delete_id){
        $no_delete_id = rtrim($no_delete_id,',');
		
		$sql = "DROP TRIGGER BeforeDeleteMoneyLog;";
        $mysqli->query($sql);

        $sql = "delete from money_log where (update_time<='$start_time' or update_time>='$end_time') and id not in ($no_delete_id)";
        $mysqli->query($sql);

		$sql = "
			CREATE TRIGGER `BeforeDeleteMoneyLog` BEFORE delete ON `money_log`
			  FOR EACH ROW BEGIN
				insert into money_log(id,user_id,order_num,about,update_time,type,order_value,assets,balance) values (old.id,old.user_id,old.order_num,old.about,old.update_time,old.type,old.order_value,old.assets,old.balance);
			  END;
			";
        $mysqli->query($sql);
    }else{
		$sql = "DROP TRIGGER BeforeDeleteMoneyLog;";
        $mysqli->query($sql);

        $sql = "delete from money_log where (update_time<='$start_time' or update_time>='$end_time')";
        $mysqli->query($sql);

		$sql = "
			CREATE TRIGGER `BeforeDeleteMoneyLog` BEFORE delete ON `money_log`
			  FOR EACH ROW BEGIN
				insert into money_log(id) values (old.id);
			  END;
			";
        $mysqli->query($sql);
    }


    $msg_info = "管理员：".$_SESSION['login_name']." 保留这段时间的数据(其余时间段数据删除):$start_time ~ $end_time";
    admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],$msg_info,session_id(),"",$bj_time_now);
}
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
        }else if(dateType=="lastSeven2"){//最近14天
            dateEnd = dateNow.Format("yyyy-MM-dd");
            dateNow.addDays(-13);
            dateStart = dateNow.Format("yyyy-MM-dd");
        }else if(dateType=="lastThirty"){//最近30天
            dateEnd = dateNow.Format("yyyy-MM-dd");
            dateNow.addDays(-29);
            dateStart = dateNow.Format("yyyy-MM-dd");
        }else if(dateType=="lastThirty2"){//最近两个月
            dateEnd = dateNow.Format("yyyy-MM-dd");
            dateNow.addDays(-59);
            dateStart = dateNow.Format("yyyy-MM-dd");
        }else if(dateType=="lastHalfYear"){//最近半年
            dateEnd = dateNow.Format("yyyy-MM-dd");
            dateNow.addDays(-180);
            dateStart = dateNow.Format("yyyy-MM-dd");
        }else if(dateType=="lastYear"){//最近一年
            dateEnd = dateNow.Format("yyyy-MM-dd");
            dateNow.addDays(-364);
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
        }else if(dateType=="manual"){//手动
            $("#form1").submit();
            return;
        }
        $("#s_time").val(dateStart);
        $("#e_time").val(dateEnd);
        $("#form1").submit();
    }

    function check(){
        if(!$("#s_time").val() || !$("#e_time").val() ){
            alert("请输入开始/结束日期。");
            return false;
        }
        var dateNow= new Date();
        var today = dateNow.Format("yyyy-MM-dd");
        if($("#e_time").val() != today){
            alert("结束日子不能改变。");
            return false;
        }
        if(confirm("该操作保留时间内数据，时间以外的数据将会被删除，删除的数据不可恢复，确认删除点击确定。(此操作可能需要较长时间，请耐心等待结果。)")){
            $.ajax({
                type: "GET",
                url: "?action=savedata",
                data: {
                    s_time: $("#s_time").val(),
                    e_time: $("#e_time").val()
                }
            }).done(function( msg ) {
                    alert("操作成功!");
                }).fail(function(error){
                    alert(error.responseText);
                });
        }

        return false;
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
    <tr>
        <td height="24" nowrap background="../images/06.gif"><font >&nbsp;<span class="STYLE2">清除数据</span></font></td>
    </tr>
    <form name="form1" id="form1" method="get" onSubmit="return check();">
        <tr>
            <td align="left" bgcolor="#FFFFFF">
                &nbsp;&nbsp;
                日期：<input name="s_time" type="text" id="s_time" value="<?=$s_time?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
                ~
                <input name="e_time" type="text" id="e_time" value="<?=$e_time?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
                <input type="button" value="保留指定时间内数据" onclick="setDate('manual')"/>
                &nbsp;&nbsp;
                <input type="button" value="保留一周内数据" onclick="setDate('lastSeven')"/>
                <input type="button" value="保留二周内数据" onclick="setDate('lastSeven2')"/>
                <input type="button" value="保留一个月内数据" onclick="setDate('lastThirty')"/>
                <input type="button" value="保留二个月内数据" onclick="setDate('lastThirty2')"/>
                <input type="button" value="保留半年内数据" onclick="setDate('lastHalfYear')"/>
                <input type="button" value="保留一年内数据" onclick="setDate('lastYear')"/>

            </td>
        </tr>
        <tr style="display: none;">
            <td align="left" bgcolor="#FFFFFF">
                &nbsp;&nbsp;
                日期：<input name="s_time2" type="text" id="s_time2" value="<?=$s_time2?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
                ~
                <input name="e_time2" type="text" id="s_time2" value="<?=$e_time2?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />

                用户名：<input name="user_group" value="<?=$user_group?>" style="width: 150px;" type="text">

                <input type="button" value="删除体育数据" onclick="setDate('today')"/>
                <input type="button" value="删除六合彩数据" onclick="setDate('today')"/>
                <input type="button" value="删除彩票数据" onclick="setDate('today')"/>
                <input type="button" value="删除真人数据" onclick="setDate('today')"/>
                <input type="button" value="删除转账数据" onclick="setDate('today')"/>
                <input type="button" value="删除综合数据" onclick="setDate('today')"/>
            </td>
        </tr>
    </form>
</table>

</td>
</tr>
</table>
</div>
</body>
</html>