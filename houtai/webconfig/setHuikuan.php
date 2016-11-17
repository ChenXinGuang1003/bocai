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
check_quanxian("修改网站信息");

if($_GET["action"]=="del"){
    $sql = "delete from sys_huikuan_list where id=".intval($_GET["id"])."";
    $mysqli->query($sql);
}

$sql = "select id,bank_name,bank_number,bank_xm,bank_city from sys_huikuan_list where 1=1";
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
    <TITLE>汇款信息列表</TITLE>
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
        <td height="24" nowrap background="../images/06.gif"><font >&nbsp;<span class="STYLE2">系统设置：查看汇款信息列表</span></font></td>
    </tr>
</table>
<form name="form2" method="post" action=""  style="margin:0 0 0 0;">
    <table width="100%">
        <tr>
            <td width="254" align="right"><a href="huikuan_detail.php?1=1">新增汇款信息&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
        </tr>
    </table>
    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
        <tr>
            <td height="24" nowrap bgcolor="#FFFFFF">

                <table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >       <tr style="background-color: #EFE" class="t-title"  align="center">
                        <td width="20%" ><strong>银行名称</strong></td>
                        <td width="30%" height="20" ><strong>银行账号</strong></td>
                        <td width="15%" ><strong>开户名</strong></td>
                        <td width="15%" ><strong>开户城市</strong></td>
                        <td width="20%" ><strong>操作</strong></td>
                    </tr>
                    <?php
                    if($uid){
                        $uid	=	rtrim($uid,',');
                        $sql = "select * from sys_huikuan_list where id in($uid)";
                        $query	=	$mysqli->query($sql);
                        while($rows = $query->fetch_array()){
                            $over	= "#EBEBEB";
                            $out	= "#ffffff";
                            $color	= "#FFFFFF";
                            ?>
                            <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>">
                                <td><?=$rows["bank_name"]?></td>
                                <td><?=$rows["bank_number"]?></td>
                                <td><?=$rows["bank_xm"]?></td>
                                <td><?=$rows["bank_city"]?></td>
                                <td><a href="huikuan_detail.php?id=<?=$rows["id"]?>"><span style="color:#F37605;">修改</span></a> | <a href="?action=del&id=<?=$rows["id"]?>"><span style="color:#F37605;">删除</span></a></td>
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