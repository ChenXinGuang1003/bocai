<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");

include_once("../common/login_check.php");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

check_quanxian("修改网站信息");

//include("../../include/mysqli.php");

$save = $_GET['save'];
if($save=="ok"){
    include_once($C_Patch."/app/member/cache/ltConfig.php");

    $str	 =	"<?php \r\n";
    $str	.=	"unset(\$Lottery_set);\r\n";
    $str	.=	"\$Lottery_set			=	array();\r\n";
    $str	.=	"\$Lottery_set['jx']['close']	=	".intval($_POST["close_jx"]).";\r\n";
    $str	.=	"\$Lottery_set['jx']['des']	=	'".$_POST["des_jx"]."';\r\n";
    $str	.=	"\$Lottery_set['cq']['close']	=	".intval($_POST["close_cq"]).";\r\n";
    $str	.=	"\$Lottery_set['cq']['des']	=	'".$_POST["des_cq"]."';\r\n";
    $str	.=	"\$Lottery_set['tj']['close']	=	".intval($_POST["close_tj"]).";\r\n";
    $str	.=	"\$Lottery_set['tj']['des']	=	'".$_POST["des_tj"]."';\r\n";
    $str	.=	"\$Lottery_set['cqsf']['close']	=	".intval($_POST["close_cqsf"]).";\r\n";
    $str	.=	"\$Lottery_set['cqsf']['des']	=	'".$_POST["des_cqsf"]."';\r\n";
    $str	.=	"\$Lottery_set['gdsf']['close']	=	".intval($_POST["close_gdsf"]).";\r\n";
    $str	.=	"\$Lottery_set['gdsf']['des']	=	'".$_POST["des_gdsf"]."';\r\n";
    $str	.=	"\$Lottery_set['tjsf']['close']	=	".intval($_POST["close_tjsf"]).";\r\n";
    $str	.=	"\$Lottery_set['tjsf']['des']	=	'".$_POST["des_tjsf"]."';\r\n";
    $str	.=	"\$Lottery_set['gxsf']['close']	=	".intval($_POST["close_gxsf"]).";\r\n";
    $str	.=	"\$Lottery_set['gxsf']['des']	=	'".$_POST["des_gxsf"]."';\r\n";
    $str	.=	"\$Lottery_set['pk10']['close']	=	".intval($_POST["close_pk10"]).";\r\n";
    $str	.=	"\$Lottery_set['pk10']['des']	=	'".$_POST["des_pk10"]."';\r\n";
    $str	.=	"\$Lottery_set['d3']['close']	=	".intval($_POST["close_fc3d"]).";\r\n";
    $str	.=	"\$Lottery_set['d3']['des']	=	'".$_POST["des_fc3d"]."';\r\n";
    $str	.=	"\$Lottery_set['p3']['close']	=	".intval($_POST["close_pl3"]).";\r\n";
    $str	.=	"\$Lottery_set['p3']['des']	=	'".$_POST["des_pl3"]."';\r\n";
    $str	.=	"\$Lottery_set['t3']['close']	=	".intval($_POST["close_ssl"]).";\r\n";
    $str	.=	"\$Lottery_set['t3']['des']	=	'".$_POST["des_ssl"]."';\r\n";
    $str	.=	"\$Lottery_set['kl8']['close']	=	".intval($_POST["close_kl8"]).";\r\n";
    $str	.=	"\$Lottery_set['kl8']['des']	=	'".$_POST["des_kl8"]."';\r\n";
    $str	.=	"\$Lottery_set['gd11']['close']	=	".intval($_POST["close_gd11"]).";\r\n";
    $str	.=	"\$Lottery_set['gd11']['des']	=	'".$_POST["des_gd11"]."';\r\n";
    $str	.=	"\$Lottery_set['lhc']['close']	=	".intval($_POST["close_lhc"]).";\r\n";
    $str	.=	"\$Lottery_set['lhc']['des']	=	'".$_POST["des_lhc"]."';\r\n";

    $str	.=	"\$Lottery_set['d3']['ktime']	=	'".$_POST["des_fc3dtime"]."';\r\n";
    $str	.=	"\$Lottery_set['d3']['knum']	=	'".intval($_POST["des_fc3dnum"])."';\r\n";
    $str	.=	"\$Lottery_set['p3']['ktime']	=	'".$_POST["des_pl3time"]."';\r\n";
    $str	.=	"\$Lottery_set['p3']['knum']	=	'".intval($_POST["des_pl3num"])."';\r\n";
    $str	.=	"\$Lottery_set['gxsf']['ktime']	=	'".$_POST["des_gxsftime"]."';\r\n";
    $str	.=	"\$Lottery_set['gxsf']['knum']	=	'".intval($_POST["des_gxsfnum"])."';\r\n";
    $str	.=	"\$Lottery_set['kl8']['ktime']	=	'".$_POST["des_kl8time"]."';\r\n";
    $str	.=	"\$Lottery_set['kl8']['knum']	=	'".intval($_POST["des_kl8num"])."';\r\n";
    $str	.=	"\$Lottery_set['pk10']['ktime']	=	'".$_POST["des_pk10time"]."';\r\n";
    $str	.=	"\$Lottery_set['pk10']['knum']	=	'".intval($_POST["des_pk10num"])."';\r\n";

    if(@!chmod("../../app/member/cache",0777)){ //设置可写入缓存权限
        message("缓存文件写入失败！请先设 /cache 文件权限为：0777");
    }
    if(!write_file($_SERVER['DOCUMENT_ROOT']."\app\member\cache\ltConfig.php",$str.'?>')){ //写入缓存失败
        message("缓存文件写入失败！请先设/ltConfig.php文件权限为：0777");
    }

    message("设置成功!","?1=1");

}
include_once($C_Patch."/app/member/cache/ltConfig.php");
?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Welcome</title>
    <link rel="stylesheet" href="../images/css/admin_style_1.css" type="text/css" media="all" />
</head>
<script type="text/javascript" charset="utf-8" src="../js/jquery-1.7.2.min.js" ></script>
<script language="JavaScript" src="../../js/calendar.js"></script>
<body>
<div id="pageMain">
    <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="font12" bgcolor="#798EB9" style="margin-top:5px;">
        <tr>
            <td align="center" bgcolor="#3C4D82" style="color:#FFF">
                时时彩设置</td>
        </tr>
    </table>

    <table border="0"align="center" cellspacing="1" cellpadding="5" width="100%" class="font12" style="margin-top:5px;" bgcolor="#798EB9">
        <form name="form1" method="post" action="?save=ok">

            <tr bgcolor="#FFFFFF">
                <td height="22" align="left"><input type="checkbox" class="input1" value="1" <?=$Lottery_set['cq']['close']==1 ? 'checked' : ''?> name="close_cq" id="close_cq" />关闭重庆时时彩</td>
                <td height="22" align="left">关闭原因:<input type="text" class="input1" value="<?=$Lottery_set['cq']['des']?>" size="100" name="des_cq" id="des_cq" /></td>
            </tr>

            <!-- <tr bgcolor="#FFFFFF">
                <td height="22" align="left"><input type="checkbox" class="input1" value="1" <?=$Lottery_set['tj']['close']==1 ? 'checked' : ''?> name="close_tj" id="close_tj" />关闭天津时时彩</td>
                <td height="22" align="left">关闭原因:<input type="text" class="input1" value="<?=$Lottery_set['tj']['des']?>" size="100" name="des_tj" id="des_tj" /></td>
            </tr>
            
            <tr bgcolor="#FFFFFF">
                <td height="22" align="left"><input type="checkbox" class="input1" value="1" <?=$Lottery_set['jx']['close']==1 ? 'checked' : ''?> name="close_jx" id="close_jx" />关闭江西时时彩</td>
                <td height="22" align="left">关闭原因:<input type="text" class="input1" value="<?=$Lottery_set['jx']['des']?>" size="100" name="des_jx" id="des_jx" /></td>
            </tr>
            
            <tr bgcolor="#FFFFFF">
                <td height="22" align="left"><input type="checkbox" class="input1" value="1" <?=$Lottery_set['cqsf']['close']==1 ? 'checked' : ''?> name="close_cqsf" id="close_cqsf" />关闭重庆快乐十分</td>
                <td height="22" align="left">关闭原因:<input type="text" class="input1" value="<?=$Lottery_set['cqsf']['des']?>" size="100" name="des_cqsf" id="des_cqsf" /></td>
            </tr>
            
            <tr bgcolor="#FFFFFF">
                <td height="22" align="left"><input type="checkbox" class="input1" value="1" <?=$Lottery_set['gdsf']['close']==1 ? 'checked' : ''?> name="close_gdsf" id="close_gdsf" />关闭广东快乐十分</td>
                <td height="22" align="left">关闭原因:<input type="text" class="input1" value="<?=$Lottery_set['gdsf']['des']?>" size="100" name="des_gdsf" id="des_gdsf" /></td>
            </tr>
            
            <tr bgcolor="#FFFFFF">
                <td height="22" align="left"><input type="checkbox" class="input1" value="1" <?=$Lottery_set['tjsf']['close']==1 ? 'checked' : ''?> name="close_tjsf" id="close_tjsf" />关闭天津快乐十分</td>
                <td height="22" align="left">关闭原因:<input type="text" class="input1" value="<?=$Lottery_set['tjsf']['des']?>" size="100" name="des_tjsf" id="des_tjsf" /></td>
            </tr>
            
            <tr bgcolor="#FFFFFF">
                <td height="22" align="left"><input type="checkbox" class="input1" value="1" <?=$Lottery_set['gxsf']['close']==1 ? 'checked' : ''?> name="close_gxsf" id="close_gxsf" />关闭广西快乐十分</td>
                <td height="22" align="left">关闭原因:<input type="text" class="input1" value="<?=$Lottery_set['gxsf']['des']?>" size="100" name="des_gxsf" id="des_gxsf" /></td>
            </tr> -->

            <tr bgcolor="#FFFFFF">
                <td height="22" align="left"><input type="checkbox" class="input1" value="1" <?=$Lottery_set['d3']['close']==1 ? 'checked' : ''?> name="close_fc3d" id="close_fc3d" />关闭福彩3D</td>
                <td height="22" align="left">关闭原因:<input type="text" class="input1" value="<?=$Lottery_set['d3']['des']?>" size="100" name="des_fc3d" id="des_fc3d" /></td>
            </tr>

            <tr bgcolor="#FFFFFF">
                <td height="22" align="left"><input type="checkbox" class="input1" value="1" <?=$Lottery_set['p3']['close']==1 ? 'checked' : ''?> name="close_pl3" id="close_pl3" />关闭排列三</td>
                <td height="22" align="left">关闭原因:<input type="text" class="input1" value="<?=$Lottery_set['p3']['des']?>" size="100" name="des_pl3" id="des_pl3" /></td>
            </tr>

            <!-- <tr bgcolor="#FFFFFF">
                <td height="22" align="left"><input type="checkbox" class="input1" value="1" <?=$Lottery_set['t3']['close']==1 ? 'checked' : ''?> name="close_ssl" id="close_ssl" />关闭上海时时乐</td>
                <td height="22" align="left">关闭原因:<input type="text" class="input1" value="<?=$Lottery_set['t3']['des']?>" size="100" name="des_ssl" id="des_ssl" /></td>
            </tr> -->
            
            <tr bgcolor="#FFFFFF">
                <td height="22" align="left"><input type="checkbox" class="input1" value="1" <?=$Lottery_set['kl8']['close']==1 ? 'checked' : ''?> name="close_kl8" id="close_kl8" />关闭北京快乐8</td>
                <td height="22" align="left">关闭原因:<input type="text" class="input1" value="<?=$Lottery_set['kl8']['des']?>" size="100" name="des_kl8" id="des_kl8" /></td>
            </tr>

            <tr bgcolor="#FFFFFF">
                <td height="22" align="left"><input type="checkbox" class="input1" value="1" <?=$Lottery_set['pk10']['close']==1 ? 'checked' : ''?> name="close_pk10" id="close_pk10" />关闭北京PK10</td>
                <td height="22" align="left">关闭原因:<input type="text" class="input1" value="<?=$Lottery_set['pk10']['des']?>" size="100" name="des_pk10" id="des_pk10" /></td>
            </tr>

           <!--  <tr bgcolor="#FFFFFF">
                <td height="22" align="left"><input type="checkbox" class="input1" value="1" <?=$Lottery_set['gd11']['close']==1 ? 'checked' : ''?> name="close_gd11" id="close_gd11" />关闭广东11选5</td>
                <td height="22" align="left">关闭原因:<input type="text" class="input1" value="<?=$Lottery_set['gd11']['des']?>" size="100" name="des_gd11" id="des_gd11" /></td>
            </tr>
            
            <tr bgcolor="#FFFFFF">
                <td height="22" align="left"><input type="checkbox" class="input1" value="1" <?=$Lottery_set['lhc']['close']==1 ? 'checked' : ''?> name="close_lhc" id="close_lhc" />关闭六合彩</td>
                <td height="22" align="left">关闭原因:<input type="text" class="input1" value="<?=$Lottery_set['lhc']['des']?>" size="100" name="des_lhc" id="des_lhc" /></td>
            </tr>
             -->


            <tr bgcolor="#FFFFFF">
                <td height="22" align="left"></td>
                <td height="22" align="left"></td>
            </tr>

            <tr bgcolor="#FFFFFF">
                <td height="22" align="left">福彩3D期数校对:</td>
                <td height="22" align="left">开奖时间:<input type="text" class="input1" value="<?=$Lottery_set['d3']['ktime']?>" onClick="new Calendar(2008,2020).showLotteryConfig(this);" size="10" maxlength="10" name="des_fc3dtime" id="des_fc3dtime" readonly="readonly"/>开奖期号:<input type="text" class="input1" value="<?=$Lottery_set['d3']['knum']?>" size="10" name="des_fc3dnum" id="des_fc3dnum" />(例如:2015-02-25开的期数是2015049)</td>
            </tr>

            <tr bgcolor="#FFFFFF">
                <td height="22" align="left">排列三期数校对:</td>
                <td height="22" align="left">开奖时间:<input type="text" class="input1" value="<?=$Lottery_set['p3']['ktime']?>" onClick="new Calendar(2008,2020).showLotteryConfig(this);" size="10" maxlength="10" name="des_pl3time" id="des_pl3time" readonly="readonly"/>开奖期号:<input type="text" class="input1" value="<?=$Lottery_set['p3']['knum']?>" size="10" name="des_pl3num" id="des_pl3num" />(例如:2015-02-25开的期数是15049)</td>
            </tr>

            <tr bgcolor="#FFFFFF">
                <td height="22" align="left">广西十分彩期数校对:</td>
                <td height="22" align="left">开奖时间:<input type="text" class="input1" value="<?=$Lottery_set['gxsf']['ktime']?>" onClick="new Calendar(2008,2020).showLotteryConfig(this);" size="10" maxlength="10" name="des_gxsftime" id="des_gxsftime" readonly="readonly"/>开奖期号:<input type="text" class="input1" value="<?=$Lottery_set['gxsf']['knum']?>" size="10" name="des_gxsfnum" id="des_gxsfnum" />(例如:2015-02-25开的第一期是201504901)</td>
            </tr>

            <tr bgcolor="#FFFFFF">
                <td height="22" align="left">北京快乐8期数校对:</td>
                <td height="22" align="left">开奖时间:<input type="text" class="input1" value="<?=$Lottery_set['kl8']['ktime']?>" onClick="new Calendar(2008,2020).showLotteryConfig(this);" size="10" maxlength="10" name="des_kl8time" id="des_kl8time" readonly="readonly"/>开奖期号:<input type="text" class="input1" value="<?=$Lottery_set['kl8']['knum']?>" size="10" name="des_kl8num" id="des_kl8num" />(例如:2015-02-25开的第一期是680840)</td>
            </tr>

            <tr bgcolor="#FFFFFF">
                <td height="22" align="left">北京PK10期数校对:</td>
                <td height="22" align="left">开奖时间:<input type="text" class="input1" value="<?=$Lottery_set['pk10']['ktime']?>" onClick="new Calendar(2008,2020).showLotteryConfig(this);" size="10" maxlength="10" name="des_pk10time" id="des_pk10time" readonly="readonly"/>开奖期号:<input type="text" class="input1" value="<?=$Lottery_set['pk10']['knum']?>" size="10" name="des_pk10num" id="des_pk10num" />(例如:2015-02-25开的第一期是475411)</td>
            </tr>


            <tr>
                <td height="28" colspan="10" align="center"bgcolor="#FFFFFF"><input type="submit"  class="submit80" name="Submit" value="确认修改" /></td>
            </tr></form>
    </table>
    </td>
    </tr>
    </table>
</div>
</body>
</html>