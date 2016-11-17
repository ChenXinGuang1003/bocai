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
include_once($C_Patch."/app/member/cache/website.php");
include_once("common/login_check.php");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

if(isset($_SESSION["adminid"])){

}else{
    unset($_SESSION["adminid"]);
    unset($_SESSION["quanxian"]);
    echo "<script>alert('没有登陆!!');</script>";
    echo "<script>window.parent.location.href='/'</script>";
    exit();
}

$bet_count  =	0;
$count_zd	=	array();
$hyzs		=	$jrhy	=	0; //会员总数
$cjdl_count = 0;
$ymd		=	date("Y-m-d");

$sql		=	"select count(id) as s from user_list";
$query		=	$mysqli->query($sql);
$rs			=	$query->fetch_array();
$hyzs		=	$rs['s'];

$sql		=	"select count(id) as s from user_list where regtime like ('".$ymd."%')";
$query		=	$mysqli->query($sql);
$rs			=	$query->fetch_array();
$jrhy		=	$rs['s'];

$sql		=	"select count(id) as s from user_list where onlinetime like ('".$ymd."%')";
$query		=	$mysqli->query($sql);
$rs			=	$query->fetch_array();
$cjdl_count		=	$rs['s'];

$sql		=	"select count(id) as s from k_bet"; //单式注单
$query		=	$mysqli->query($sql);
$rs			=	$query->fetch_array();
$bet_count	=	$rs['s'];

$sql		=	"select count(id) as s from k_bet_cg_group"; //串关注单
$query		=	$mysqli->query($sql);
$rs			=	$query->fetch_array();
$bet_count +=	$rs['s'];

$sql		=	"select count(id) as s from order_lottery_sub"; //彩票
$query		=	$mysqli->query($sql);
$rs			=	$query->fetch_array();
$bet_count +=	$rs['s'];

$sql		=	"select count(id) as s from six_lottery_order_sub"; //六合彩
$query		=	$mysqli->query($sql);
$rs			=	$query->fetch_array();
$bet_count +=	$rs['s'];

$tixian_today=	$cunkuan_today	=	0;
$sql		=	"select order_value from money where `status`='成功' and (`type`='在线支付' or `type`='用户提款') and update_time like('".$ymd."%')";
$query		=	$mysqli->query($sql);
while($rows	=	$query->fetch_array()){
    if($rows['order_value'] < 0) $tixian_today++;
    else $cunkuan_today++;
}

$sql		=	"select count(id) as s from money where `status`='成功' and `type`='银行汇款' and `update_time` like('".$ymd."%')";
$query		=	$mysqli->query($sql);
$rs			=	$query->fetch_array();
$huikuan_today	=	$rs['s'];//今日汇款笔数
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="images/css1/css.css" rel="stylesheet" type="text/css">
</head>
<SCRIPT language=javascript>
    <!--
    var displayBar=true;
    function switchBar(obj){
        if (displayBar)
        {
            parent.frame.cols="0,*";
            displayBar=false;
            obj.value="打开左边管理菜单";
        }
        else{
            parent.frame.cols="195,*";
            displayBar=true;
            obj.value="关闭左边管理菜单";
        }
    }

    function fullmenu(url){
        if (url==null) {url = "admin_left.asp";}
        parent.leftFrame.location = url;
    }

    //-->
</SCRIPT>


<body>
<div>
<table style="float: left;margin-left: 6px;" class="table" cellspacing="1" cellpadding="2" width="50%" align="center"
       border="0">
    <tbody>
    <tr>
        <th class="bg_tr" align="left" colspan="2" height="25">
            <input onClick="switchBar(this)" type="button" value="关闭左边管理菜单" name="SubmitBtn" />

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;自动真人转账的状态是：<?=$web_site['auto_zhenren']==1 ? '开启' : '关闭'?>&nbsp;&nbsp;
            <a href="webconfig/index.php" style="color: #F37605;" target="main">点击设置自动真人转账</a>
        </th>
    </tr>
    <tr>
        <td class="td_bg" width="45%" height="40">会员总数量：<span class="TableRow2"><?=$hyzs?></span></td>
        <td class="td_bg" width="55%">今日新增会员数量：<span class="TableRow1"><?=$jrhy?> &nbsp;&nbsp;&nbsp;&nbsp;今日曾经在线会员数量：<span class="TableRow1"><?=$cjdl_count?></span></td>
    </tr>
    <tr>
        <td class="td_bg" width="45%" height="40">注单总数量：<span class="TableRow2"><?=$bet_count?></span></td>
        <td class="td_bg" width="55%">今日提现笔数：<span class="TableRow2"><?=$tixian_today?></span></td>
    </tr>
    <tr>
        <td class="td_bg" width="45%" height="40">今日存款笔数：<span class="TableRow2">
        <?=$cunkuan_today?>
      </span></td>
        <td class="td_bg" width="55%">今日汇款笔数：<span class="TableRow1">
       <?=$huikuan_today?>
      </span></td>
    </tr>
    </tbody>
</table>
<table style="float: left;margin-left: 5px;" class="table" cellspacing="1" cellpadding="2" width="48%" align="center"
       border="0">
    <tbody>
    <tr>
        <th class="bg_tr" align="left" colspan="2" height="25">系统公告</th>
    </tr>
    <tr>
        <td class="td_bg" width="45%" height="40"> 每天努力的工作,为了更好的明天.</td>
        <td class="td_bg" width="55%"></span></td>
    </tr>
    <tr>
        <td class="td_bg" width="45%" height="40">我们美好的生活,需要自己去努力.</td>
        <td class="td_bg" width="55%"></span></td>
    </tr>
    <tr>
        <td class="td_bg" width="45%" height="40">让我们鼓起勇气,得到自己想要的.
      </span></td>
        <td class="td_bg" width="55%">
      </span></td>
    </tr>
    </tbody>
</table>
</div>
<table class="table" cellspacing="1" cellpadding="2" width="99%" align="center"
       border="0">
    <tbody>
    <tr>
        <th class="bg_tr" align="left" colspan="2" height="25">圆饼图统计</th>
    </tr>
    <tr>
        <td class="td_bg"><iframe src="zdfx.php" name="zdfxFrame" id="zdfxFrame" title="zdfxFrame" frameborder=0 width="49%" scrolling=no height=300 ></iframe>&nbsp;<iframe src="login_user.php" name="luFrame" id="luFrame" title="luFrame" frameborder=0 width="49%" scrolling=no height=300 ></iframe></td>
    </tr>
    </tbody>
</table>
</body>
</html>
