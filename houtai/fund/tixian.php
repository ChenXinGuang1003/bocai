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

function getstatus($status){
    $return=$status;
    switch ($status){
        case 0:$return="失败";break;
        case 1:$return="成功";break;
        case 2:$return="待处理";break;
        default:break;
    }
    return $return;
}

$time	=	'CN'; //默认为中国时间
if(isset($_GET['time'])) $time = $_GET['time'];

if($_GET["time_start"]){
    $time_start = $_GET["time_start"];
}else{
    $_GET["time_start"] = date('Y-m-d',strtotime('-6 day'));
    $time_start = date('Y-m-d',strtotime('-6 day'));
}

if($_GET["time_end"]){
    $time_end = $_GET["time_end"];
}else{
    $_GET["time_end"] = date('Y-m-d');
    $time_end = date('Y-m-d');
}
if(!$_GET["status"]){
    $_GET["status"] = "全部提款";
}
?>
<HTML>
<HEAD>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
    <TITLE>用户提现申请</TITLE>
    <link href="../images/css1/css.css" rel="stylesheet" type="text/css">
    <script language="javascript">
        function go(value)
        {
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
            $("#status").val("全部提款");
        }

    </script>
</HEAD>

<body>
<script language="JavaScript" src="/js/calendar.js"></script>
<script language="JavaScript" src="../../js/jquery-1.7.1.js"></script>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
        <td height="24" nowrap background="../images/06.gif"><font ><span class="STYLE2">提现管理：查看所有的用户提款申请</span></font></td>
    </tr>
    <tr>
        <td height="24" align="center" nowrap bgcolor="#FFFFFF"><table width="100%">
                <form name="form1" method="GET" action="tixian.php" >
                    <tr>
                        <td width="124" align="center"><select name="status" id="status">
                                <option value="未结算" <?=$_GET["status"]=='未结算' ? 'selected' : ''?> style="color:#FF9900;">未处理</option>
                                <option value="失败" <?=$_GET["status"]=='失败' ? 'selected' : ''?> style="color:#FF0000;">提款失败</option>
                                <option value="成功" <?=$_GET["status"]=='成功' ? 'selected' : ''?> style="color:#006600;">提款成功</option>
                                <option value="全部提款" <?=$_GET["status"]=='全部提款' ? 'selected' : ''?>>全部提款</option>
                            </select></td>
                        <td width="124" align="center"><select name="order" id="order">
                                <option value="id" <?=$_GET["order"]=='id' ? 'selected' : ''?>>默认排序</option>
                                <option value="order_value" <?=$_GET["order"]=='order_value' ? 'selected' : ''?>>提款金额</option>
                                <option value="sxf" <?=$_GET["order"]=='sxf' ? 'selected' : ''?>>手续费</option>
                            </select></td>
                        <td width="124" align="center" style="display: none;"><select name="time" id="time">
                                <option value="CN" <?=$time=='CN' ? 'selected' : ''?>>中国时间</option>
                                <option value="EN" <?=$time=='EN' ? 'selected' : ''?>>美东时间</option>
                            </select></td>
                        <td width="729"  align="left">日期：
                            <input name="time_start" type="text" id="time_start" value="<?=$time_start?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
                            ~
                            <input name="time_end" type="text" id="time_end" value="<?=$time_end?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
                            &nbsp;&nbsp;会员名称：
                            <input name="username" type="text" id="username" value="<?=@$_GET['username']?>" size="20" maxlength="20"/>
                            &nbsp;&nbsp;
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
                    <td width="6%" ><strong>编号</strong></td>
                    <td width="18%" ><strong>订单号</strong></td>
                    <td width="8%"><strong>提款金额</strong></td>
                    <td width="8%"><strong>手续费</strong></td>
                    <td width="8%"><strong>查看财务</strong></td>
                    <td width="15%" ><strong>开户行/卡号</strong></td>
                    <td width="20%" ><strong>开户人/开户地址</strong></td>
                    <td width="11%" ><strong>申请时间</strong></td>
                    <td width="6%" ><strong>操作</strong></td>
                </tr>
                <?php
                $where		=	'';
                if(isset($_GET["order"])){
                    if($_GET["order"] == 'order_value'){
                        $where	=	' order by '.$_GET["order"].' asc';
                    }else{
                        $where	=	' order by '.$_GET["order"].' desc';
                    }
                }else{
                    $where	=	' order by id desc';
                }
                $sql		=	"select id from money where order_value<0 and deleted=0";   //0422
                if(isset($_GET["status"])){
                    if($_GET["status"] != "全部提款") $sql .=	" and status='".$_GET["status"]."'";
                }
                if($_GET["username"]){
                    $sql		.=	" and order_num like('%\_".trim($_GET["username"])."%')";
                }
                if($_GET["time_start"]){
                    $stime	 =	$_GET["time_start"].' 00:00:00';
                    $sql	.=	" and update_time>='$stime' ";
                }
                if($_GET["time_end"]){
                    $etime	 =	$_GET["time_end"].' 23:59:59';
                    $sql	.=	" and update_time<='$etime' ";
                }
                $sql		.=	$where;

                $query		=	$mysqli->query($sql);
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
                $c_sum	=	$m_sum	=	$t_sum	=	$f_sum	=	$sxf_sum	=	0;
                if($mid){
                    $mid	=	rtrim($mid,',');
                    $arr	=	array();
                    $sql	=	"select * from money where id in ($mid) and deleted=0 $where";  //0422
                    $query	=	$mysqli->query($sql);
                    while($rows = $query->fetch_array()){
                        $money	=	abs($rows["order_value"]);
                        $m_sum +=	$money;
                        $arr	=	explode("_",$rows["order_num"]);
                        $sxf_sum+=	$rows["sxf"];
                        ?>
                        <tr align="center" onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#ffffff'">
                            <td height="20" align="center"  ><?=$rows["id"]?></td>
                            <td><A href="tixian_show.php?id=<?=$rows["id"]?>"><?=$rows["order_num"]?></A><? if($rows["type"]=="后台扣款"){echo "<br/>后台扣款，理由：".$rows["about"];} ?></td>
                            <td><span style="color:#999999;"><?=$rows["assets"]?></span><br /><?=$money?><br /><span style="color:#999999;"><?=$rows["balance"]?></span></td>
                            <td><?=$rows["sxf"]?></td>
                            <td><a href="hccw.php?username=<?=$arr[1]?>&status=成功" target="_blank">查看财务</a></td>
                            <td><?=$rows["pay_card"]?><br/><?=$rows["pay_num"]?></td>
                            <td><?=$rows["pay_name"]?><br/><?=$rows["pay_address"]?></td>
                            <td><?=$rows["update_time"]?></td>
                            <td><?php
                                if($rows["status"]=="失败"){
                                    $f_sum += $money;
                                    echo '<span style="color:#FF0000;">提款失败</span>';
                                }else if($rows["status"]=="成功"){
                                    $t_sum += $money;
                                    echo '<span style="color:#006600;">提款成功</span>';
                                }else{
                                    $c_sum += $money;
                                    echo "<a href=\"tixian_show.php?id=".$rows["id"]."\">结算</a>";
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
        <td ><div>总金额：<span style="color:#0000FF"><?=$m_sum?></span>，成功：<span style="color:#006600"><?=$t_sum?></span>，手续费：<span style="color:#FF00FF"><?=$sxf_sum?></span>，失败：<span style="color:#FF0000"><?=$f_sum?></span>，审核：<span style="color:#FF9900"><?=$c_sum?></span>&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <div><?=$page->get_htmlPage($_SERVER["REQUEST_URI"]);?></div></td>
    </tr>
</table>
<?php
if($_GET['username']){
?>
<br /><?=$_GET['username']?> 历史银行卡信息：<br />
<table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >       <tr style="background-color: #EFE" class="t-title"  align="center">
        <td width="15%"><strong>开户人</strong></td>
        <td width="15%"><strong>开户行</strong></td>
        <td width="20%"><strong>银行卡号</strong></td>
        <td width="35%"><strong>开户地址</strong></td>
        <td width="15%"><strong>添加日期</strong></td>
    </tr>
    <?php
    $sql		=	"SELECT pay_name,pay_card,pay_num,pay_address,addtime FROM history_bank where username='".trim($_GET['username'])."' order by uid asc,id desc";
    $query		=	$mysqli->query($sql);
    while($row	=	$query->fetch_array()){
        ?>
        <tr onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#FFFFFF'" style="background-color:#FFFFFF;">
            <td height="30" align="center"><?=$row['pay_name']?></td>
            <td align="center"><?=$row['pay_card']?></td>
            <td align="center"><?=$row['pay_num']?></td>
            <td align="center"><?=$row['pay_address']?></td>
            <td align="center"><?=$row['addtime']?></td>
        </tr>
    <?php
    }
    }
    ?>
</table>
</body>
</html>