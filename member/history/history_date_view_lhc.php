<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
include "../../app/member/utils/login_check.php";
include "../../app/member/utils/convert_name.php";

include "../../app/member/class/six_lottery_order.php";
include "../../app/member/class/lottery_order.php";
include "../../resource/lottery/getContentName.php";

?>
<link rel="stylesheet" href="../../resource/images/css/admin_style_1.css" type="text/css" media="all" />
<script type="text/javascript" charset="utf-8" src="../../resource/js/jquery-1.7.2.min.js" ></script>
<script language="javascript">
    function go(value){
        if(value != "") location.href=value;
        else return false;
    }

    function check(){
        if($("#tf_id").val().length > 5){
            $("#status").val("0,1");
        }
        return true;
    }
</script>
<div id="pageMain"  class="round-table" style="height: 358px;margin: 0px auto;">
    <table width="100%" height="100%" style="width: 832px;" border="0" cellspacing="0" cellpadding="5">
        <tr>
            <td valign="top" style="vertical-align: top;">
                <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="font12" bgcolor="#798EB9">
                    <form name="SearchForm" class="SearchForm"  action="/member/history/history_date_view_lhc.php" method="get">
                        <input type="hidden" name="tf_id" value="<?=@$_GET['tf_id']?>" />
                        <input type="hidden" name="gamedate" value="<?=@$_GET['gamedate']?>" />
                        <tr>
                            <td align="center" bgcolor="#FFFFFF">
                                &nbsp;&nbsp;
                                订单号：<input name="tf_id" type="text" id="tf_id" value="<?=@$_GET['tf_id']?>" size="22">
                                &nbsp;&nbsp;
                                <input type="submit" name="Submit" value="搜索"></td>
                        </tr>
                    </form>
                </table>
                <table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12" style="margin-top:5px;" bgcolor="#798EB9">
                    <tr style="background-color:#3C4D82; color:#FFF">
                        <td align="center"><strong>订单号</strong></td>
                        <td align="center"><strong>彩票期号</strong></td>
                        <td align="center"><strong>投注玩法</strong></td>
                        <td align="center"><strong>投注内容</strong></td>
                        <td align="center"><strong>投注金额</strong></td>
                        <td align="center"><strong>反水</strong></td>
                        <td align="center"><strong>赔率</strong></td>
                        <td height="25" align="center"><strong>输赢结果</strong></td>
                        <td align="center"><strong>投注时间</strong></td>
                        <td height="25" align="center"><strong>状态</strong></td>
                    </tr>
                    <?php
                    include("../../include/pager.class.php");

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

                    $day = $_GET["gamedate"];
                    $oneDayStart = $day.' 00:00:00';
                    $oneDayEnd = $day.' 23:59:59';

                    $sql	=	"select o_sub.id  FROM six_lottery_order o,six_lottery_order_sub o_sub
                                where o_sub.bet_money>0 AND o.order_num=o_sub.order_num
                                AND o.bet_time>= '".$oneDayStart."' AND o.bet_time<='".$oneDayEnd."'";
//                    if($_GET["s_time"]) $sql.=" and o.bet_time>='".$_GET["s_time"]." 00:00:00'";
//                    if($_GET["e_time"]) $sql.=" and o.bet_time<='".$_GET["e_time"]." 23:59:59'";
                    $sql.=" and o.user_id='".$_SESSION["userid"]."'";
                    if($_GET['tf_id']) $sql.=" and o_sub.order_sub_num=".$_GET['tf_id']."";
                    $sql.=" order by o_sub.id desc ";

                    $query	=	$mysqli->query($sql);
                    $sum		=	$mysqli->affected_rows; //总页数
                    $thisPage	=	1;
                    $pagenum	=	$sum;
                    if($pagenum==0){
                        $pagenum = 1;
                    }
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
                            $bid .=	$row['id'].',';
                        }
                        if($i > $end) break;
                        $i++;
                    }
                    if($bid){
                        $bid	=	rtrim($bid,',');
                        $sql	=	"SELECT o.lottery_number AS qishu,o.rtype_str,o.bet_time,o.order_num,
                                                o_sub.number,o_sub.bet_money AS bet_money_one,o_sub.fs,
                                                o_sub.bet_rate AS bet_rate_one,o_sub.is_win,o_sub.status,
                                                o_sub.id AS id,o_sub.win AS win_sub,o_sub.balance,o_sub.order_sub_num
                                      FROM six_lottery_order o,six_lottery_order_sub o_sub
                                      WHERE o_sub.id in($bid) AND o.order_num=o_sub.order_num
                                      order by o_sub.id desc";
                        $query	=	$mysqli->query($sql);

                        while ($rows = $query->fetch_array()) {
                            $color = "#FFFFFF";
                            $over	 = "#EBEBEB";
                            $out	 = "#ffffff";
                            $t_allmoney+=$rows['bet_money_one'];
                            $money_result = 0;
                            if($rows['is_win']=="1"){
                                $t_sy= $t_sy + $rows['win_sub'] + $rows['fs'];
                                $money_result = $rows['win_sub'] + $rows['fs'];
                            }elseif($rows['is_win']=="2"){
                                $t_sy+=$rows['bet_money_one'];
                                $money_result = $rows['bet_money_one'];
                            }elseif($rows['is_win']=="0" && $rows['fs']>0){
                                $t_sy+=$rows['fs'];
                                $money_result = $rows['fs'];
                            }

                            if($rows['win_sub']>0 && ($rows['status']==1 || $rows['status']=="2")){
//                                $color = "#FFE1E1";
//                                $out   = "#FFE1E1";
                                $color = "#FFFFFF";
                                $out   = "#FFFFFF";
                            }

                            $contentName = $rows['number'];

                            $bet_rate = $rows['bet_rate_one'];
                            if(strpos($bet_rate,",") !== false){
                                $bet_rate_array = explode(",", $bet_rate);
                                $bet_rate = $bet_rate_array[0];
                            }
                            ?>
                            <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>; line-height:20px;">
                                <td height="25" align="center" valign="middle"><?=$rows['order_sub_num']?></td>
                                <td align="center" valign="middle"><?=$rows['qishu']?></td>
                                <td align="center" valign="middle"><?=$rows['rtype_str']?></td>
                                <td align="center" valign="middle" style="max-width: 100px;"><?=$contentName?></td>
                                <td align="center" valign="middle"><?=$rows['bet_money_one']?></td>
                                <td align="center" valign="middle"><?=$rows['fs']?></td>
                                <td align="center" valign="middle"><?=$bet_rate?></td>
                                <td align="center" valign="middle"><?=$money_result?></td>
                                <td><?=$rows['bet_time']?></td>
                                <td><?php if($rows['status']==0){?><font color="#0000FF">未结算</font><?php }?>
                                    <?php if($rows['status']==1){?><font color="#FF0000">已结算</font><?php }?>
                                    <?php if($rows['status']==2){?><font color="#FF0000">已结算</font><?php }?>
                                    <?php if($rows['status']==3){?><font color="#FFcccc">作废</font><?php }?>
                                </td>
                            </tr>
                        <?php
                        }
                    }
                    ?>
                    <tr style="background-color:#FFFFFF;">
                        <td colspan="12" align="center" valign="middle">当前页总投注金额:<?=$t_allmoney?>元 &nbsp;&nbsp;   当前页赢取金额:<?=$t_sy-$t_allmoney?>元</td>
                    </tr>
                    <tr style="background-color:#FFFFFF;display: none;">
                        <td colspan="12" align="center" valign="middle"><?php echo $pageStr;?></td>
                    </tr>

                </table></td>
        </tr>
    </table>
</div>
