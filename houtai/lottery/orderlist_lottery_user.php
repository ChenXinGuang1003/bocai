<?php
error_reporting(1);
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
include_once($C_Patch."/app/member/class/sys_config.php");

include_once("../class/admin.php");
include_once("../common/login_check.php");

check_quanxian("查看注单");

$type=$_GET['type'];

if(!$_GET["s_time"] && !$_GET['qishu']){
    $_GET["s_time"] = date('Y-m-d');
}

?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Welcome</title>
    <link rel="stylesheet" href="../images/css/admin_style_1.css" type="text/css" media="all" />
</head>
<script type="text/javascript" charset="utf-8" src="../js/jquery-1.7.2.min.js" ></script>
<script language="javascript">
    function go(value){
        if(value != "") location.href=value;
        else return false;
    }

    function check(){
        return true;
    }

    function myfun(){
        setInterval(function(){
            $("form[name='form1']").submit();
        },120000);
    }
    window.onload=myfun;//不要括号
</script>
<script language="JavaScript" src="/js/calendar.js"></script>
<body>
<div id="pageMain">
    <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
            <td valign="top">
                <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="font12" bgcolor="#798EB9">
                    <form name="form1" method="get" action="<?=$_SERVER["REQUEST_URI"]?>" onSubmit="return check();">
                        <tr>
                            <td align="center" bgcolor="#FFFFFF">
                                <select name="js" id="js">
                                    <option value="0" style="color:#FF9900;" <?=$_GET['js']=='0' ? 'selected' : ''?>>未结算注单</option>
                                    <option value="1" style="color:#FF0000;" <?=$_GET['js']=='1' ? 'selected' : ''?>>已结算注单</option>
                                    <option value="2" style="color:#FF0000;" <?=$_GET['js']=='2' ? 'selected' : ''?>>已重算注单</option>
                                    <option value="3" style="color:#FF0000;" <?=$_GET['js']=='3' ? 'selected' : ''?>>作废注单</option>
                                    <option value="0,1,2,3" <?=$_GET['js']=='0,1,2,3' ? 'selected' : ''?>>全部注单</option>
                                </select>
                                &nbsp;&nbsp;
                                会员：<input name="username" type="text" id="username" value="<?=$_GET['username']?>" size="15">
                                &nbsp;&nbsp;
                                日期：<input name="s_time" type="text" id="s_time" value="<?=$_GET['s_time']?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
                                ~
                                <input name="e_time" type="text" id="e_time" value="<?=$_GET['e_time']?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
                                &nbsp;&nbsp;
                                期数：<input name="qishu" type="text" id="qishu" value="<?=$_GET['qishu']?>" size="15">
                                &nbsp;&nbsp;
                                <input type="submit" name="Submit" value="搜索"></td>
                        </tr>
                    </form>
                </table>
                <table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12" style="margin-top:5px;" bgcolor="#798EB9">
                    <tr style="background-color:#3C4D82; color:#FFF">
                        <td height="25" align="center" style="width: 14%;"><strong>游戏名称</strong></td>
                        <td align="center" style="width: 20%;"><strong>用户名(真实名字)</strong></td>
                        <td align="center" style="width: 16%;"><strong>下注笔数</strong></td>
                        <td align="center" style="width: 16%;"><strong>下注金额</strong></td>
                        <td align="center" style="width: 16%;"><strong>下注结果</strong></td>
                        <td align="center" style="width: 16%;"><strong>赢取金额</strong></td>
                    </tr>
                    <?php
                    include("../../include/pager.class.php");

                    $image_web = sys_config::getImagePath();

                    $t_allmoney=0;
                    $t_sy=0;
                    $uid	=	'';
                    if($_GET['username']){
                        $sql		=	"select user_id from user_list where user_name='".$_GET['username']."' limit 0,1";
                        $query	=	$mysqli->query($sql);
                        if($rows	=	$query->fetch_array()){
                            $uid=	$rows['user_id'];
                        }else{
                            $uid=	"0";
                        }
                    }

                    $sql	=	"select o.user_id from user_list u,order_lottery o,order_lottery_sub o_sub
                                where u.user_id=o.user_id AND o_sub.bet_money>0 AND o.order_num=o_sub.order_num";
                    if($_GET["uid"]) $uid = $_GET["uid"];
                    if($uid != '') $sql.=" and o.user_id=".$uid;
                    if($_GET["s_time"]) $sql.=" and o.bet_time>='".$_GET["s_time"]." 00:00:00'";
                    if($_GET["e_time"]) $sql.=" and o.bet_time<='".$_GET["e_time"]." 23:59:59'";
                    if($_GET["qishu"]) $sql.=" and o.lottery_number='".$_GET["qishu"]."'";
                    if(isset($_GET["js"]))  $sql.=" and o_sub.status in (".$_GET["js"].")";
                    $sql.=" group by o.user_id order by o_sub.id desc ";

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
                    while($row = $query->fetch_array()){
                        if($i >= $start && $i <= $end){
                            $bid .=	$row['user_id'].',';
                        }
                        if($i > $end) break;
                        $i++;
                    }
                    if($bid){
                        $bid	=	rtrim($bid,',');
                        $sql	=	"SELECT u.user_name,u.pay_name,u.user_id,
                                              count(o_sub.id) bet_count,sum(o_sub.bet_money) bet_money_total,
                                              SUM(IF(o_sub.is_win=1,o_sub.win+o_sub.fs,IF(o_sub.is_win=2,o_sub.bet_money,IF(o_sub.is_win=0,o_sub.fs,0)))) win_total
                                      FROM user_list u,order_lottery o,order_lottery_sub o_sub
                                      WHERE u.user_id in($bid) AND o.order_num=o_sub.order_num AND o.user_id=u.user_id
                                      ";
//                        if($inUserString != "") $sql .= " AND o.user_id IN $inUserString";
                        if($_GET["s_time"]) $sql.=" and o.bet_time>='".$_GET["s_time"]." 00:00:00'";
                        if($_GET["e_time"]) $sql.=" and o.bet_time<='".$_GET["e_time"]." 23:59:59'";
                        if($_GET["qishu"]) $sql.=" and o.lottery_number='".$_GET["qishu"]."'";
                        if(isset($_GET["js"]))  $sql.=" and o_sub.status in (".$_GET["js"].")";
                        $sql.=" group by o.user_id order by o_sub.id desc";
                        $query	=	$mysqli->query($sql);

                        while ($rows = $query->fetch_array()) {
                            $color = "#FFFFFF";
                            $over	 = "#EBEBEB";
                            $out	 = "#ffffff";
                            $t_allmoney+=$rows['bet_money_total'];
                            $t_sy += $rows['win_total'];
                            ?>
                            <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>; line-height:20px;">
                                <td height="40" align="center" valign="middle">全部彩票</td>
                                <td align="center" valign="middle"><a title="<?=$rows['user_name']?>" style="color: #F37605;" href="orderlist.php?s_time=<?=$_GET["s_time"]?>&amp;e_time=<?=$_GET["e_time"]?>&amp;qishu=<?=$_GET["qishu"]?>&amp;js=<?=$_GET["js"]?>&amp;type=ALL_LOTTERY&amp;username=<?=$rows['user_name']?>"><?=$rows['user_name']?></a>(<?=$rows['pay_name']?>)</td>
                                <td align="center" valign="middle"><?=$rows['bet_count']?></td>
                                <td align="center" valign="middle"><?=$rows['bet_money_total']?></td>
                                <td align="center" valign="middle"><?=$rows['win_total']?></td>
                                <td align="center" valign="middle"><?=($rows['bet_money_total']-$rows['win_total'])?></td>
                            </tr>
                        <?php
                        }
                    }
                    ?>
                    <tr style="background-color:#FFFFFF;">
                        <td colspan="6" align="center" valign="middle">当前页总投注金额:<?=$t_allmoney?>元 &nbsp;&nbsp;   当前页赢取金额:<?=$t_allmoney - $t_sy?>元</td>
                    </tr>
                    <tr style="background-color:#FFFFFF;">
                        <td colspan="6" align="center" valign="middle"><?php echo $pageStr;?></td>
                    </tr>

                </table></td>
        </tr>
    </table>
</div>
</body>
</html>

<?
$mysqli->close();
?>