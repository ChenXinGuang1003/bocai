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

include_once("../class/admin.php");
include_once("../common/login_check.php");
include_once("../lottery/getContentName.php");

check_quanxian("查看报表");

$sql = "SELECT id,qishu FROM six_lottery_schedule
          WHERE 1=1  ORDER BY qishu DESC limit 0,10";
$query	=	$mysqli->query($sql);
$qishuArray = array();
while($rows = $query->fetch_array()){
    $qishuArray[] = $rows['qishu'];
}

$gtype = $_GET["gtype"];
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

$order_type = $_GET['order_type'];
$qishu = $_GET['qishu'];

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
    <form name="form1" id="form1" method="get" action="<?=$_SERVER["REQUEST_URI"]?>" onSubmit="return true;">
        <tr>
            <td align="left" bgcolor="#FFFFFF">
                <span title="六合彩特码报表" style="color: blue;">六合彩特码报表</span>
            </td>
        </tr>
        <tr>
            <td align="left" bgcolor="#FFFFFF">
                &nbsp;&nbsp;
                六合彩期数：
                <select name="qishu" id="qishu" onchange="onChangeMonth(this.value)">
                    <?
                        foreach($qishuArray as $key => $value){
                        ?>
                            <option value="<?=$value?>" <?=$qishu==$value ? 'selected' : ''?>><?=$value?></option>
                        <?
                        }
                    ?>
                </select>
                &nbsp;&nbsp;
                排序方式：
                <select name="order_type" id="order_type" onchange="onChangeMonth(this.value)">
                    <option value="number_value" <?=$order_type=='number_value' ? 'selected' : ''?>>号码</option>
                    <option value="money_value"  <?=$order_type=='money_value' ? 'selected' : ''?>>投注额</option>
                </select>
                &nbsp;&nbsp;
                <input type="submit" name="Submit" value="搜索">
            </td>
        </tr>
        <tr>
            <td align="left" bgcolor="#FFFFFF" style="display: none;">
                &nbsp;&nbsp;
                用户名：<input name="user_group" value="<?=$user_group?>" style="width: 200px;" type="text"> (多个用户用 , 隔开)
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                忽略用户名：<input name="user_ignore_group" value="<?=$user_ignore_group?>" type="text" style="width: 200px;"> (多个用户用 , 隔开)
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            </td>
        </tr>
    </form>
</table>
<table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12" style="margin-top:5px;" bgcolor="#798EB9">
    <tr style="background-color:#3C4D82; color:#FFF">
        <td height="25" align="center" style="width: 15%;"><strong>游戏名称</strong></td>
        <td align="center" style="width: 16%;"><strong>特码号码</strong></td>
        <td align="center" style="width: 23%;"><strong>特码A面总金额</strong></td>
        <td align="center" style="width: 23%;"><strong>特码B面总金额</strong></td>
        <td align="center" style="width: 23%;"><strong>所有特码总金额</strong></td>
    </tr>
    <?php
    include("../../include/pager.class.php");

    $t_allmoney=0;
    $t_sy=0;
    $uid	=	'';
    $inUserString = "";
    $bid		=	'';

    $number_array = array("1","2","3","4","5","6","7","8","9",
                            "10","11","12","13","14","15","16","17","18","19",
                            "20","21","22","23","24","25","26","27","28","29",
                            "30","31","32","33","34","35","36","37","38","39",
                            "40","41","42","43","44","45","46","47","48","49"
                        );

    $qishu_query = $_GET["qishu"];
    if($qishu_query=="" && $qishuArray){
        $qishu_query = $qishuArray[0];
    }elseif($qishu_query==""){
        echo "没有期数，请设置。";
        exit;
    }
    $sql = "SELECT o_sub.number,SUM(IF(o.bet_info!='SPbside',o_sub.bet_money,0)) bet_money_total_a ,
                SUM(IF(o.bet_info='SPbside',o_sub.bet_money,0)) bet_money_total_b,
                SUM(o_sub.bet_money) bet_money_total
            FROM six_lottery_order o, six_lottery_order_sub o_sub
            WHERE o.rtype='SP' AND o.order_num=o_sub.order_num
                AND
                (o_sub.number='1' OR o_sub.number='2' OR o_sub.number='3' OR o_sub.number='4' OR o_sub.number='5' OR o_sub.number='6' OR o_sub.number='7' OR o_sub.number='8' OR o_sub.number='9' OR
                o_sub.number='10' OR o_sub.number='11' OR o_sub.number='12' OR o_sub.number='13' OR o_sub.number='14' OR o_sub.number='15' OR o_sub.number='16' OR o_sub.number='17' OR o_sub.number='18' OR o_sub.number='19' OR
                o_sub.number='20' OR o_sub.number='21' OR o_sub.number='22' OR o_sub.number='23' OR o_sub.number='24' OR o_sub.number='25' OR o_sub.number='26' OR o_sub.number='27' OR o_sub.number='28' OR o_sub.number='29' OR
                o_sub.number='30' OR o_sub.number='31' OR o_sub.number='32' OR o_sub.number='33' OR o_sub.number='34' OR o_sub.number='35' OR o_sub.number='36' OR o_sub.number='37' OR o_sub.number='38' OR o_sub.number='39' OR
                o_sub.number='40' OR o_sub.number='41' OR o_sub.number='42' OR o_sub.number='43' OR o_sub.number='44' OR o_sub.number='45' OR o_sub.number='46' OR o_sub.number='47' OR o_sub.number='48' OR o_sub.number='49')
                AND o.lottery_number='$qishu_query'
            GROUP BY o_sub.number ORDER BY bet_money_total desc";
    $query	=	$mysqli->query($sql);

    $bet_array = array();
    $total_a = 0;
    $total_b = 0;
    $total_all = 0;
    while ($rows = $query->fetch_array()) {
        $bet_array[] = $rows;
        $total_a += $rows["bet_money_total_a"];
        $total_b += $rows["bet_money_total_b"];
        $total_all += $rows["bet_money_total"];
    }

    $sort_array = array();
    if($_GET["order_type"]=="money_value"){
        $order_type_key = 1;
        foreach ($bet_array as $key => $value) {
            $sort_array[$order_type_key] = $value;
            $order_type_key += 1;
        }
        foreach ($number_array as $key => $value) {
            $is_no_number = false;
            foreach ($bet_array as $key_bet => $value_bet) {
                if($value == $value_bet["number"]){
                    $is_no_number = true;
                    break;
                }
            }
            if(!$is_no_number){
                $sort_array[$order_type_key]["number"] = $value;
                $sort_array[$order_type_key]["bet_money_total_a"] = 0;
                $sort_array[$order_type_key]["bet_money_total_b"] = 0;
                $sort_array[$order_type_key]["bet_money_total"] = 0;
                $order_type_key += 1;
            }
        }
    }else{
        foreach ($number_array as $key => $value) {
            $sort_array[$key]["number"] = $value;
            $sort_array[$key]["bet_money_total_a"] = 0;
            $sort_array[$key]["bet_money_total_b"] = 0;
            $sort_array[$key]["bet_money_total"] = 0;
            foreach ($bet_array as $key_bet => $value_bet) {
                if($value == $value_bet["number"]){
                    $sort_array[$key] = $value_bet;
                    break;
                }
            }
        }
    }
    foreach ($sort_array as $key => $value) {
        $color = "#FFFFFF";
        $over	 = "#EBEBEB";
        $out	 = "#ffffff";
        ?>
        <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>; line-height:20px;">
            <td height="40" align="center" valign="middle">六合彩</td>
            <td align="center" valign="middle"><?=$value["number"]?></td>
            <td align="center" valign="middle"><?=$value['bet_money_total_a']?></td>
            <td align="center" valign="middle"><?=$value['bet_money_total_b']?></td>
            <td align="center" valign="middle"><?=$value['bet_money_total']?></td>
        </tr>
    <?php
    }

    ?>
    <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>; line-height:20px;">
        <td height="40" align="center" valign="middle">六合彩</td>
        <td align="center" valign="middle">合计</td>
        <td align="center" valign="middle"><?=$total_a?></td>
        <td align="center" valign="middle"><?=$total_b?></td>
        <td align="center" valign="middle"><?=$total_all?></td>
    </tr>

</table></td>
</tr>
</table>
</div>
</body>
</html>