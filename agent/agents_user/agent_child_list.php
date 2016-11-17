<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

//echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/utils/convert_name.php");

//include_once("admin.php");
//include_once("login_check.php");

//check_quanxian("加款扣款");
//include_once("../lottery/getContentName.php");

//check_quanxian("查看代理信息");

if($_GET["id"]){
    $id = $_GET["id"];
}
$s_time = $_GET["s_time"];
if(!$s_time){
    $s_time = date('Y-m-d');
}
$e_time = $_GET["e_time"];
if(!$e_time){
    $e_time = date('Y-m-d');
}

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
    <tr>
        <td height="24" nowrap background="../images/06.gif"><font >&nbsp;<span class="STYLE2">下属会员信息</span></font></td>
    </tr>
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
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="Submit" value="搜索">
                <input name="id" type="hidden" value="<?=$id?>">
            </td>
        </tr>
    </form>
</table>
<table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12" style="margin-top:5px;" bgcolor="#798EB9">
    <tr style="background-color:#3C4D82; color:#FFF">
        <td style="width: 12%" align="center" height="25"><strong>下属会员名</strong></td>
        <td style="width: 13%" align="center"><strong>体育流水/体育盈利</strong></td>
        <td style="width: 13%" align="center"><strong>真人流水/真人盈利</strong></td>
        <td style="width: 13%" align="center"><strong>彩票流水/彩票盈利</strong></td>
        <td style="width: 13%" align="center"><strong>六合流水/六合盈利</strong></td>
        <td style="width: 13%" align="center"><strong>合计流水/合计盈利</strong></td>
        <td style="width: 12%" align="center"><strong>注册时间</strong></td>
		<td style="width: 11%" align="center"><strong>加钱/扣钱</strong></td>
    </tr>
    <?php
    include("../../include/pager.class.php");

    $sql	=	"SELECT u.id FROM agents_list a,user_list u
                WHERE a.id=$id AND a.id=u.top_id AND u.top_id!=0 GROUP by u.id";

    $query	=	$mysqli->query($sql);
    $sum		=	$mysqli->affected_rows; //总页数
    $thisPage	=	1;
    $pagenum	=	50;
    if($_GET['page']){
        $thisPage	=	$_GET['page'];
    }
    $CurrentPage=isset($_GET['page'])?$_GET['page']:1;
    $myPage=new pager($sum,intval($CurrentPage),$pagenum);
    $pageStr= $myPage->GetPagerContent();

    $bid		=	'';
    $i		=	1; //记录 bid 数
    $start	=	($thisPage-1)*$pagenum+1;
    $end		=	$thisPage*$pagenum;
	if($query)
    while($row = $query->fetch_array()){
        if($i >= $start && $i <= $end){
            $bid .=	$row['id'].',';
        }
        if($i > $end) break;
        $i++;
    }
    if($bid){
        $bid	=	rtrim($bid,',');
        $sql_main = "select id,user_id,user_name,regtime from user_list where id in($bid) ORDER BY money DESC ";
        $query_main	=	$mysqli->query($sql_main);
        $list_main = array();
        while ($rows = $query_main->fetch_array()) {
            $list_main[] = $rows;
        }
        $sql_lottery	=	"SELECT SUM(IF(sub.bet_money>0,IF(sub.is_win!=2,sub.bet_money,0),0)) bet_money_total,SUM(IF(sub.is_win=1,sub.win+sub.fs,IF(is_win=0,fs,0))) win_total,u.id
                    FROM user_list u,order_lottery o ,order_lottery_sub sub
                    WHERE u.top_id=$id AND u.top_id!=0 AND o.status!='0' AND o.status!='3' AND u.user_id=o.user_id AND o.order_num=sub.order_num
                    ";
        if($s_time) $sql_lottery.=" and o.bet_time>='".$s_time." 00:00:00' ";
        if($e_time) $sql_lottery.=" and o.bet_time<='".$e_time." 23:59:59' ";
        $sql_lottery .= " GROUP BY u.id ORDER BY u.money DESC ";
        $query_lottery	=	$mysqli->query($sql_lottery);
        $list_lottery = array();
        while ($rows_lottery = $query_lottery->fetch_array()) {
            $list_lottery[] = $rows_lottery;
        }

        $sql_six	=	"SELECT SUM(IF(sub.bet_money>0,IF(sub.is_win!=2,sub.bet_money,0),0)) bet_money_total,SUM(IF(sub.is_win=1,sub.win+sub.fs,IF(is_win=0,fs,0))) win_total,u.id
                    FROM user_list u,six_lottery_order o ,six_lottery_order_sub sub
                    WHERE u.top_id=$id AND u.top_id!=0 AND o.status!='0' AND o.status!='3' AND u.user_id=o.user_id AND o.order_num=sub.order_num
                    ";
        if($s_time) $sql_six.=" and o.bet_time>='".$s_time." 00:00:00' ";
        if($e_time) $sql_six.=" and o.bet_time<='".$e_time." 23:59:59' ";
        $sql_six .= " GROUP BY u.id ORDER BY u.money DESC ";
        $query_six	=	$mysqli->query($sql_six);
        $list_six = array();
        while ($rows_six = $query_six->fetch_array()) {
            $list_six[] = $rows_six;
        }

        $sql_ds	=	"SELECT SUM(IF(k.bet_money>0,k.bet_money,0)) bet_money_total,SUM(IF(k.win>0,k.win,0)+IF(k.fs>0,k.fs,0)) win_total,u.id
                    FROM user_list u,k_bet k
                    WHERE u.top_id=$id AND u.top_id!=0 AND k.status!=0 AND k.status!=3 AND k.check!=0 AND u.user_id=k.user_id
                    ";
        if($s_time) $sql_ds.=" and k.bet_time>='".$s_time." 00:00:00' ";
        if($e_time) $sql_ds.=" and k.bet_time<='".$e_time." 23:59:59' ";
        $sql_ds .= " GROUP BY u.id ORDER BY u.money DESC ";
        $query_ds	=	$mysqli->query($sql_ds);
        $list_ds = array();
        while ($rows_ds = $query_ds->fetch_array()) {
            $list_ds[] = $rows_ds;
        }

        $sql_cg	=	"SELECT SUM(IF(k.bet_money>0,k.bet_money,0)) bet_money_total,SUM(IF(k.win>0,k.win,0)+IF(k.fs>0,k.fs,0)) win_total,u.id
                    FROM user_list u,k_bet_cg_group k
                    WHERE u.top_id=$id AND u.top_id!=0 AND k.status!=0 AND k.status!=3 AND k.check=1 AND u.user_id=k.user_id
                    ";
        if($s_time) $sql_cg.=" and k.bet_time>='".$s_time." 00:00:00' ";
        if($e_time) $sql_cg.=" and k.bet_time<='".$e_time." 23:59:59' ";
        $sql_cg .= " GROUP BY u.id ORDER BY u.money DESC ";
        $query_cg	=	$mysqli->query($sql_cg);
        $list_cg = array();
        while ($rows_cg = $query_cg->fetch_array()) {
            $list_cg[] = $rows_cg;
        }

        $sql_live	=	"SELECT SUM(IF(lo.bet_money>0,lo.bet_money,0)) bet_money_total,SUM(IF(lo.live_win is not null,lo.live_win,0)) win_total,u.id
                    FROM user_list u,live_user l,live_order lo
                    WHERE u.top_id=$id AND u.top_id!=0 AND l.user_id=u.user_id AND l.live_username=lo.live_username
                    ";
        if($s_time) $sql_live.=" and lo.order_time>='".$s_time." 00:00:00' ";
        if($e_time) $sql_live.=" and lo.order_time<='".$e_time." 23:59:59' ";
        $sql_live .= " GROUP BY u.id ORDER BY u.money DESC ";
        $query_live	=	$mysqli->query($sql_live);
        $list_live = array();
        while ($rows_live = $query_live->fetch_array()) {
            $list_live[] = $rows_live;
        }

        foreach($list_main as $key => $value){
            $total_bet_money = 0;
            $total_win_money = 0;
            $color = "#FFFFFF";
            $over	 = "#EBEBEB";
            $out	 = "#ffffff";
            $lottery_bet_money = 0;
            $lottery_win = 0;
            foreach($list_lottery as $key2 => $value_lottery){
                if($value["id"] == $value_lottery["id"]){
                    $lottery_bet_money = $value_lottery["bet_money_total"];
                    $lottery_win = ($value_lottery["bet_money_total"] - $value_lottery["win_total"]);
                    $total_bet_money += $lottery_bet_money;
                    $total_win_money += $lottery_win;
                    break;
                }
            }

            $six_bet_money = 0;
            $six_win = 0;
            foreach($list_six as $key2 => $value_six){
                if($value["id"] == $value_six["id"]){
                    $six_bet_money = $value_six["bet_money_total"];
                    $six_win = ($value_six["bet_money_total"] - $value_six["win_total"]);
                    $total_bet_money += $six_bet_money;
                    $total_win_money += $six_win;
                    break;
                }
            }

            $live_bet_money = 0;
            $live_win = 0;
            foreach($list_live as $key2 => $value_live){
                if($value["id"] == $value_live["id"]){
                    $live_bet_money = $value_live["bet_money_total"];
                    $live_win = (0 - $value_live["win_total"]);
                    $total_bet_money += $live_bet_money;
                    $total_win_money += $live_win;
                    break;
                }
            }

            $sport_bet_money = 0;
            $sport_win = 0;
            foreach($list_ds as $key2 => $value_ds){
                if($value["id"] == $value_ds["id"]){
                    $sport_bet_money += $value_ds["bet_money_total"];
                    $sport_win += ($value_ds["bet_money_total"] - $value_ds["win_total"]);
                    break;
                }
            }
            foreach($list_cg as $key2 => $value_cg){
                if($value["id"] == $value_cg["id"]){
                    $sport_bet_money += $value_cg["bet_money_total"];
                    $sport_win += ($value_cg["bet_money_total"] - $value_cg["win_total"]);
                    break;
                }
            }
            $total_bet_money += $sport_bet_money;
            $total_win_money += $sport_win;

            ?>
            <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>; line-height:20px;">
                <td height="40" align="center" valign="middle"><a title="<?=$value['user_name']?>" style="color: #F37605;" href="../agent_report/all_game_index.php?s_time=<?=$s_time?>&amp;e_time=<?=$e_time?>&amp;user_group=<?=$value['user_name']?>&amp;date_month=<?=$date_month?>"><?=$value['user_name']?></a></td>
                <td align="center" valign="middle"><?=$sport_bet_money?>&nbsp;&nbsp;/&nbsp;&nbsp;<?=$sport_win?></td>
                <td align="center" valign="middle"><?=$live_bet_money?>&nbsp;&nbsp;/&nbsp;&nbsp;<?=$live_win?></td>
                <td align="center" valign="middle"><?=$lottery_bet_money?>&nbsp;&nbsp;/&nbsp;&nbsp;<?=$lottery_win?></td>
                <td align="center" valign="middle"><?=$six_bet_money?>&nbsp;&nbsp;/&nbsp;&nbsp;<?=$six_win?></td>
                <td align="center" valign="middle"><?=$total_bet_money?>&nbsp;&nbsp;/&nbsp;&nbsp;<?=$total_win_money?></td>
                <td align="center" valign="middle"><?=$value["regtime"]?></td>
				<td align="center" valign="middle">
					<a href="set_money.php?uid=<?=$value['user_id']?>&amp;type=add" style="color: #F37605;">加钱</a> / 
					<a href="set_money.php?uid=<?=$value['user_id']?>&amp;type=min" style="color: #F37605;">扣钱</a>
				</td>
            </tr>
        <?php
        }
    }
    ?>
    <tr style="background-color:#FFFFFF;">
        <td colspan="8" align="center" valign="middle"><?php echo $pageStr;?></td>
    </tr>

</table></td>
</tr>
</table>
</div>
</body>
</html>