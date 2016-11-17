<?php
error_reporting(1);
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>";

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/utils/convert_name.php");
include_once($C_Patch."/app/member/class/sys_config.php");
include_once($C_Patch."/app/member/cache/website.php");

include_once("../class/admin.php");
include_once("../common/login_check.php");

check_quanxian("查看注单");
check_quanxian("查看报表");
$sql = "SELECT  qishu  FROM six_lottery_schedule ORDER BY qishu DESC limit 0,10";
$query	=	$mysqli->query($sql);
$qishuArray = array();
while($rows =mysqli_fetch_array($query)){
    $qishuArray[] = $rows['qishu'];
}
$qishu = $_GET['qishu'];

?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Welcome</title>
    <link rel="stylesheet" href="../images/css/admin_style_1.css" type="text/css" media="all" />
</head>
<script type="text/javascript" charset="utf-8" src="../js/jquery-1.7.2.min.js" ></script>
<script language="javascript">
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
                <span title="六合彩平特生肖报表" style="color: blue;">六合彩平特生肖报表</span>
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
                <input type="submit" name="Submit" value="搜索">
            </td>
        </tr>
    </form>
</table>
<table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12" style="margin-top:5px;" bgcolor="#798EB9">
    <tr style="background-color:#3C4D82; color:#FFF">
        <td height="25" align="center" style="width: 25%;"><strong>游戏名称</strong></td>
        <td align="center" style="width: 25%;"><strong>投注玩法</strong></td>
        <td align="center" style="width: 25%;"><strong>投注内容</strong></td>
        <td align="center" style="width: 25%;"><strong>投注总金额</strong></td>
    </tr>
    <?php
    $qishu_query = $_GET["qishu"];
    if($qishu_query=="" && $qishuArray){
        $qishu_query = $qishuArray[0];
    }elseif($qishu_query==""){
        echo "没有期数，请设置。";
        exit;
    }
    $sql1 = "SELECT o_sub.number,SUM(IF(o.rtype='SPB',o_sub.bet_money,0)) bet_money_total FROM six_lottery_order o, six_lottery_order_sub o_sub WHERE o.lottery_number=$qishu_query  AND o.rtype='SPB' AND o.order_num=o_sub.order_num AND (o_sub.number='鼠' OR o_sub.number='牛' OR o_sub.number='虎' OR o_sub.number='兔' OR o_sub.number='龙' OR o_sub.number='蛇' OR o_sub.number='马' OR o_sub.number='羊' OR o_sub.number='猴' OR o_sub.number='鸡' OR o_sub.number='狗' OR o_sub.number='猪')   GROUP BY o_sub.number";
    $query1=$mysqli->query($sql1);
    $betArray=array();
    $totalAll=0;
	if($query1){
		while ($row =mysqli_fetch_array($query1)) {
			$betArray[] = $row;
			$total_all += $row["bet_money_total"];
		}
	}
	foreach($betArray as $k=>$v){
        echo '<tr align="center" style="background-color:white; line-height:20px;">
            <td height="40" align="center" valign="middle">六合彩</td>
			<td height="40" align="center" valign="middle">一肖</td>
			<td align="center" valign="middle">'.$v['number'].'</td>
			<td align="center" valign="middle">'.$v['bet_money_total'].'</td></tr>';
	}
    ?>
    <tr align="center" style="background-color:white; line-height:20px;">
        <td height="40" align="center" valign="middle">六合彩</td>
        <td align="center" valign="middle">平特生肖</td>
        <td align="center" valign="middle">合计</td>
        <td align="center" valign="middle"><?=$total_all?></td>
    </tr>

</table></td>
</tr>
</table>
</div>
</body>
</html>
<?php
	$mysqli->close();
?>