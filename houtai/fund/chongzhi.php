<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once("../common/login_check.php");
include_once($C_Patch."/include/newpage.php");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";
check_quanxian("财务审核");
$sum = $true = $false = $cl = 0;

$time	=	'CN'; //默认为中国时间
if(isset($_GET['time'])) $time = $_GET['time'];

if($_GET["time_start"]){
    $time_start = $_GET["time_start"];
}else{
    $time_start = date('Y-m-d',strtotime('-6 day'));
}

if($_GET["time_end"]){
    $time_end = $_GET["time_end"];
}else{
    $time_end = date('Y-m-d');
}

if(!$_GET["status"]){
    $_GET["status"] = "全部存款";
}

?>
<HTML>
<HEAD>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
    <TITLE>存款管理</TITLE>
    <link href="../Images/css1/css.css" rel="stylesheet" type="text/css">
    <script language="javascript">
        function go(value){
            location.href=value;
        }
    </script>
    <style type="text/css">
        .STYLE2 {font-size: 12px}
        body {
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
        }
        td{font:13px/120% "宋体";padding:3px;}
        a{

            color:#F37605;

            text-decoration: none;

        }
        .t-title{background:url(../images/06.gif);height:24px;}
        .t-tilte td{font-weight:800;}
    </STYLE>
    <script>

        Date.prototype.addDays = function(d){
            this.setDate(this.getDate() + d);
        };

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

        function cleanAll(){
            setDate();
        }

        function setDate(){
            var dateNow= new Date();
            var dateStart;
            var dateEnd;
            dateEnd = dateNow.Format("yyyy-MM-dd");
            dateNow.addDays(-365);
            dateStart = dateNow.Format("yyyy-MM-dd");
            $("#time_start").val(dateStart);
            $("#time_end").val(dateEnd);
            $("#status").val("全部存款");
        }

    </script>
</HEAD>

<body>
<script language="JavaScript" src="../../js/calendar.js"></script>
<script language="JavaScript" src="../../js/jquery-1.7.1.js"></script>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
        <td height="24" nowrap background="../images/06.gif"><font ><span class="STYLE2">存款管理：查看所有的用户存款信息</span></font></td>
    </tr>
    <tr>
        <td height="24" align="center" nowrap bgcolor="#FFFFFF"><table width="100%">
                <form name="form1" method="GET" action="chongzhi.php" >
                    <tr>
                        <td width="124" align="center"><select name="status" id="status">
                                <option value="未结算" <?=$_GET["status"]=='未结算' ? 'selected' : ''?> style="color:#FF9900;">未处理</option>
                                <option value="失败" <?=$_GET["status"]=='失败' ? 'selected' : ''?> style="color:#FF0000;">存款失败</option>
                                <option value="成功" <?=$_GET["status"]=='成功' ? 'selected' : ''?> style="color:#006600;">存款成功</option>
                                <option value="全部存款" <?=$_GET["status"]=='全部存款' ? 'selected' : ''?>>全部存款</option>
                            </select></td>
                        <td width="124" align="center"><select name="order" id="order">
                                <option value="id" <?=$_GET["order"]=='id' ? 'selected' : ''?>>默认排序</option>
                                <option value="order_value" <?=$_GET["order"]=='order_value' ? 'selected' : ''?>>存款金额</option>
                            </select></td>
                        <td width="124" align="center" style="display: none;"><label>
                                <select name="time" id="time">
                                    <option value="CN" <?=$time=='CN' ? 'selected' : ''?>>中国时间</option>
                                    <option value="EN" <?=$time=='EN' ? 'selected' : ''?>>美东时间</option>
                                </select>
                            </label></td>
                        <td width="729" align="left">日期：
                            <input name="time_start" type="text" id="time_start" value="<?=$time_start?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
                            ~
                            <input name="time_end" type="text" id="time_end" value="<?=$time_end?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
                            &nbsp;&nbsp;会员名称：
                            <input name="username" type="text" id="username" value="<?=@$_GET['username']?>" size="15" maxlength="20"/>          &nbsp;&nbsp;
                            <input name="find" type="submit" id="find" value="查找"/>
                            <input name="find" onclick="cleanAll()" type="submit" id="find" value="查看全部"/>
                        </td>

                    </tr>
                </form>
            </table></td>
    </tr>
</table>
<br>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
        <td height="24" nowrap bgcolor="#FFFFFF">
            <table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >
                <tr bgcolor="efe" class="t-title" align="center">
                    <td width="10%" ><strong>编号</strong></td>
                    <td width="30%" ><strong>系统订单号</strong></td>
                    <td width="10%"><strong>存款金额</strong></td>
                    <td width="10%"><strong>手续费</strong></td>
                    <td width="10%"><strong>查看财务</strong></td>
                    <td width="15%" ><strong>申请时间</strong></td>
                    <td width="15%" ><strong>操作</strong></td>
                </tr>
                <?php

                if(isset($_GET["order"])){
                    $order	=	$_GET["order"];
                }else{
                    $order	=	"id";
                }

                $sql		=	"select id from money where order_value>=0 and (type='在线支付' or type='后台充值')";
                if(isset($_GET["status"])){
                    if($_GET["status"]!="全部存款") $sql .=	" and status='".$_GET["status"]."'";
                }
                if($_GET["username"]){
                    $sql	.=	" and order_num like('%".$_GET["username"]."%')";
                }
                if($_GET["time_start"]){
                        $stime	 =	$_GET["time_start"].' 00:00:00';
                    $sql	.=	" and update_time>='$stime' ";
                }
                if($_GET["time_end"]){
                    $etime	 =	$_GET["time_end"].' 23:59:59';
                    $sql	.=	" and update_time<='$etime' ";
                }
                $sql .= " and deleted=0";   //0422
                $sql		.=	" order by $order desc";

                $query	=	$mysqli->query($sql);
                $sum		=	$mysqli->affected_rows; //总页数
                $thisPage	=	1;
                if($_GET['page']){
                    $thisPage	=	$_GET['page'];
                }
                $page		=	new newPage();
                $thisPage	=	$page->check_Page($thisPage,$sum,100,10);

                $mid		=	'';
                $i			=	1; //记录 uid 数
                $start		=	($thisPage-1)*100+1;
                $end		=	$thisPage*100;
                while($row = $query->fetch_array()){
                    if($i >= $start && $i <= $end){
                        $mid .=	$row['id'].',';
                    }
                    if($i > $end) break;
                    $i++;
                }
                $sum	=	$true	=	$sxf_sum	=	$false	=	$cl	=	0;
                $false_admin =0;
                $true_admin =0;
                if($mid){
                    $mid	=	rtrim($mid,',');
                    $arr	=	array();
                    $sql	=	"select * from money where id in ($mid) and deleted=0 order by $order desc";   //0422
                    $query	=	$mysqli->query($sql);
                    while($rows = $query->fetch_array()){
                        $userId = $rows["user_id"];
                        $sql_2 = "select user_name from user_list where user_id='$userId'";
                        $query_2	=	$mysqli->query($sql_2);
                        $row_2    =	$query_2->fetch_array();
                        $sum	+=	abs($rows["order_value"]);
                        $sxf_sum+=	$rows["sxf"];
                        ?>
                        <tr align="center" onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#ffffff'" >
                            <td  height="35" align="center"  ><?=$rows["id"]?></td>
                            <td><?=$rows["order_num"]?><? if($rows["type"]=="后台充值"){echo "<br/>后台充值，理由：".$rows["about"];} ?></td>
                            <td><span style="color:#999999;"><?=$rows["assets"]?></span><br /><?=abs($rows["order_value"])?><br /><span style="color:#999999;"><?=$rows["balance"]?></span></td>
                            <td><?=$rows["sxf"]?></td>
                            <td><a href="hccw.php?username=<?=$row_2["user_name"]?>&status=成功" target="_blank">查看财务</a></td>
                            <td><?=$rows["update_time"]?></td>
                            <td><? if($rows["status"]=="失败"){
                                    echo '<span style="color:#FF0000;">存款失败</span>';
                                    if($rows["type"]=="后台充值"){
                                        $false_admin	+=	abs($rows["order_value"]);
                                    }elseif($rows["type"]=="在线支付"){
                                        $false	+=	abs($rows["order_value"]);
                                    }
                                }else if($rows["status"]=="成功"){
                                    echo "<span style='color:#009900;'>存款成功</span><br/><a href='tixian_show.php?id=".$rows['id']."'>详细</a>";
                                    if($rows["type"]=="后台充值"){
                                        $true_admin	+=	abs($rows["order_value"]);
                                    }elseif($rows["type"]=="在线支付"){
                                        $true	+=	abs($rows["order_value"]);
                                    }
                                }else{
                                    echo "<div style=\"float:left;\"><a onclick=\"return confirm('确定存款成功?')\" href=\"ck_set.php?ok=1&amp;id=".$rows["id"]."\">存款成功</a></div><div style=\"float:right;\"><a onclick=\"return confirm('确定存款失败?')\" href=\"ck_set.php?ok=0&amp;id=".$rows["id"]."\">存款失败</a></div>";
                                    $cl	+=	abs($rows["order_value"]);
                                }
                                ?></td>
                        </tr>
                    <?php
                    }
                }
                ?>
            </table></td>
    </tr>
    <tr>
        <td ><div>总金额：<span style="color:#0000FF"><?=$sum?></span>，在线充值成功：<span style="color:#006600;"><?=$true?></span>，后台充值成功：<span style="color:#006600;"><?=$true_admin?></span>，手续费：<span style="color:#FF00FF;"><?=$sxf_sum?></span>，在线充值失败：<span style="color:#FF0000;"><?=$false?></span>，后台充值失败：<span style="color:#FF0000;"><?=$false_admin?></span>，处理中：<span style="color:#FF9900;"><?=$cl?></span></div>
            <div><?=$page->get_htmlPage($_SERVER["REQUEST_URI"]);?></div></td>
    </tr>
</table>
</body>
</html>