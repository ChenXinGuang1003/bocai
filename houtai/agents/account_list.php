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
include_once($C_Patch."/app/member/class/user.php");
include_once($C_Patch."/app/member/class/user_group.php");
include_once($C_Patch."/include/newpage.php");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";
check_quanxian("查看代理信息");

if($_GET["id"]){
    $id = $_GET["id"];
}
$sql = "select id from agents_money_log where agents_id=$id order by do_time desc";
$query		=	$mysqli->query($sql);
$sum		=	$mysqli->affected_rows; //总页数
$thisPage	=	1;
if($_GET['page']){
    $thisPage	=	$_GET['page'];
}
$page		=	new newPage();
$thisPage	=	$page->check_Page($thisPage,$sum,20,40);

$uid		=	'';
$i			=	1; //记录 uid 数
$start		=	($thisPage-1)*20+1;
$end		=	$thisPage*20;
while($row = $query->fetch_array()){
    if($i >= $start && $i <= $end){
        $uid .=	$row['id'].',';
    }
    if($i > $end) break;
    $i++;
}
?>
<HTML>
<HEAD>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
    <TITLE>代理列表</TITLE>
    <link href="../images/css1/css.css" rel="stylesheet" type="text/css">

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
        .STYLE4 {
            color: #FF0000;
            font-size: 12px;
        }
    </STYLE>
</HEAD>
<body>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
        <td height="24" nowrap background="../images/06.gif"><font >&nbsp;<span class="STYLE2">代理管理：查看结算明细</span></font></td>
    </tr>
</table>
<form name="form2" method="post" action="" style="margin:0 0 0 0;">
    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC" style="margin-top: 10px;">
        <tr>
            <td height="24" nowrap bgcolor="#FFFFFF">

                <table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >       <tr style="background-color: #EFE" class="t-title"  align="center">
                        <td width="15%" height="20" ><strong>代理名</strong></td>
                        <td width="12%" ><strong>流水总额</strong></td>
                        <td width="12%" ><strong>盈利总额</strong></td>
                        <td width="12%" ><strong>分成比例%</strong></td>
                        <td width="12%" ><strong>算结金额</strong></td>
                        <td width="11%" ><strong>结算开始日期</strong></td>
                        <td width="11%" ><strong>结算结束日期</strong></td>
                        <td width="15%" ><strong>操作时间</strong></td>
                    </tr>
                    <?php
                    if($uid){
                        $uid	=	rtrim($uid,',');
                        $sql = "select al.id,al.agents_id,al.money,al.s_time,al.e_time,al.do_time,al.ledger,al.profig,al.ratio,a.agents_name from agents_list a, agents_money_log al where al.id in($uid) and al.agents_id=a.id order by al.do_time desc";
                        $query	=	$mysqli->query($sql);
                        while($rows = $query->fetch_array()){
                            $over	= "#EBEBEB";
                            $out	= "#ffffff";
                            $color	= "#FFFFFF";
                            ?>
                            <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>">
                                <td style="height: 35px;"><?=$rows["agents_name"]?></td>
                                <td><?=$rows["ledger"]?></td>
                                <td><?=$rows["profig"]?></td>
                                <td><?=$rows["ratio"]?></td>
                                <td><?=$rows["money"]?></td>
                                <td><?=$rows["s_time"]?></td>
                                <td><?=$rows["e_time"]?></td>
                                <td><?=$rows["do_time"]?></td>
                            </tr>
                        <?
                        }
                    }
                    ?>
                </table>
            </td>
        </tr>
        <tr><td ><div style="float:left;"><?=$page->get_htmlPage($_SERVER["REQUEST_URI"]);?></div></td></tr>
    </table>
</form>
</body>
</html>