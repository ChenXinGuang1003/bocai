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
include_once("../lottery/getContentName.php");
include_once($C_Patch."/app/member/utils/convert_name.php");

check_quanxian("查看会员信息");

$user_id = $_GET["userid"];
$order_num = $_GET["ordernum"];
$type = $_GET["type"];
$about = $_GET["about"];

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>明细信息</title>
</head>
<link href="../images/css1/css.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="../images/css/admin_style_1.css" type="text/css" media="all" />
<script   language=javascript>

</script>
<body style="border: 0;padding: 10px 5px 0px 10px;background-color: white;">
  <br/>
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999">
    <?php
    if($type=="彩票下注" || strpos($type,"彩票自动结算")!==false|| strpos($type,"彩票手工结算")!==false|| strpos($type,"彩票重新结算")!==false
        || strpos($type,"六合彩")!==false){
        ?>
        <tr>
            <td align="center" bgcolor="#CCCCCC" height="28"><strong>订单号</strong></td>
            <td align="center" bgcolor="#CCCCCC"><strong>彩票类别</strong></td>
            <td align="center" bgcolor="#CCCCCC"><strong>彩票期号</strong></td>
            <td align="center" bgcolor="#CCCCCC"><strong>投注玩法</strong></td>
            <td align="center" bgcolor="#CCCCCC"><strong>投注内容</strong></td>
            <td align="center" bgcolor="#CCCCCC"><strong>投注金额</strong></td>
            <td align="center" bgcolor="#CCCCCC"><strong>反水</strong></td>
            <td align="center" bgcolor="#CCCCCC"><strong>赔率</strong></td>
            <td align="center" bgcolor="#CCCCCC"><strong>可赢金额</strong></td>
            <td align="center" bgcolor="#CCCCCC"><strong>输赢结果</strong></td>
            <td align="center" bgcolor="#CCCCCC"><strong>投注时间</strong></td>
            <td align="center" bgcolor="#CCCCCC"><strong>投注账号</strong></td>
            <td align="center" bgcolor="#CCCCCC"><strong>状态</strong></td>
        </tr>
        <?php
        if($about=="六合彩" || strpos($type,"六合彩")!==false){
            $sql	=	"SELECT o.lottery_number AS qishu,o.rtype_str,o.bet_time,o.order_num,
                                                o_sub.number,o_sub.bet_money AS bet_money_one,o_sub.fs, o.user_id,
                                                o_sub.bet_rate AS bet_rate_one,o_sub.is_win,o_sub.status,
                                                o_sub.id AS id,o_sub.win AS win_sub,o_sub.balance,o_sub.order_sub_num
                                      FROM six_lottery_order o,six_lottery_order_sub o_sub
                                      WHERE o.order_num=o_sub.order_num AND o.user_id='$user_id'
                                      ";
            if($about=="六合彩" && $type=="彩票下注"){
                $sql .= " AND o.order_num='$order_num' AND o_sub.order_num='$order_num'";
            }elseif(strpos($type,"六合彩")!==false){
                $sql .= " AND o_sub.order_sub_num='$order_num'";
            }
            $sql .= " order by o_sub.id desc";
            $query	=	$mysqli->query($sql);

            while ($rows = $query->fetch_array()) {

                $color = "#FFFFFF";
                $over	 = "#EBEBEB";
                $out	 = "#ffffff";

                $money_result = 0;
                if($rows['is_win']=="1"){
                    $money_result = $rows['win_sub'] + $rows['fs'];
                }elseif($rows['is_win']=="2"){
                    $money_result = $rows['bet_money_one'];
                }elseif($rows['is_win']=="0" && $rows['fs']>0){
                    $money_result = $rows['fs'];
                }

                if($rows['is_win']==1 || $rows['is_win']=="2"){
                    $color = "#FFE1E1";
                    $out   = "#FFE1E1";
                }

                $bet_rate = $rows['bet_rate_one'];
                if(strpos($bet_rate,",") !== false){
                    $temp_rate = 1;
                    $bet_rate_array = explode(",", $bet_rate);
                    foreach($bet_rate_array as $key => $value){
                        $temp_rate = $temp_rate * $value;
                    }
                    $bet_rate = round($temp_rate,2);
                }

                $sql_user = "select user_name,money from user_list where user_id='".$rows["user_id"]."'";
                $query_user	=	$mysqli->query($sql_user);
                $rows_user = $query_user->fetch_array();
                ?>
                <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>; line-height:20px;">
                    <td height="25" align="center" valign="middle"><?=$rows['order_sub_num']?></td>
                    <td align="center" valign="middle"><?="六合彩"?></td>
                    <td align="center" valign="middle"><?=$rows['qishu']?></td>
                    <td align="center" valign="middle"><?=$rows['rtype_str']?></td>
                    <td align="center" valign="middle"  style="max-width:115px"><?=$rows['number']?></td>
                    <td align="center" valign="middle"><?=$rows['bet_money_one']?></td>
                    <td align="center" valign="middle"><?=$rows['fs']?></td>
                    <td align="center" valign="middle"><?=$bet_rate?></td>
                    <td align="center" valign="middle"><?=$rows['win_sub']?></td>
                    <td align="center" valign="middle"><?=$money_result?></td>
                    <td  style="max-width: 100px;"><?=$rows['bet_time']?></td>
                    <td><?=$rows_user["user_name"]?></td>
                    <td style="width:55px"><?php if($rows['status']==0){?>未结算<?php }?>
                        <?php if($rows['status']==1){?>已结算<?php }?>
                        <?php if($rows['status']==2){?>已重算<?php }?>
                        <?php if($rows['status']==3){?>作废<?php }?>
                    </td>
                </tr>
            <?php
            }
        }else{
            $sql	=	"SELECT o.Gtype,o.lottery_number AS qishu,o.rtype_str,o.bet_time,o.order_num,o_sub.quick_type,
                                                o_sub.number,o_sub.bet_money AS bet_money_one,o_sub.fs, o.user_id,
                                                o_sub.bet_rate AS bet_rate_one,o_sub.is_win,o_sub.status,
                                                o_sub.id AS id,o_sub.win AS win_sub,o_sub.balance,o_sub.order_sub_num
                                      FROM order_lottery o,order_lottery_sub o_sub
                                      WHERE o.order_num=o_sub.order_num AND o.user_id='$user_id'
                                      ";
            if(strpos($type,"彩票自动结算")!==false|| strpos($type,"彩票手工结算")!==false|| strpos($type,"彩票重新结算")!==false){
                $sql .= " AND o_sub.order_sub_num='$order_num' ";
            }else{
                $sql .= " AND o.order_num='$order_num' AND o_sub.order_num='$order_num'";
            }
            $sql .= " order by o_sub.id desc";
            $query	=	$mysqli->query($sql);

            while ($rows = $query->fetch_array()) {
                $color = "#FFFFFF";
                $over	 = "#EBEBEB";
                $out	 = "#ffffff";

                $money_result = 0;
                if($rows['is_win']=="1"){
                    $money_result = $rows['win_sub'] + $rows['fs'];
                }elseif($rows['is_win']=="2"){
                    $money_result = $rows['bet_money_one'];
                }elseif($rows['is_win']=="0" && $rows['fs']>0){
                    $money_result = $rows['fs'];
                }
                if($rows['is_win']==1 || $rows['is_win']=="2"){
                    $color = "#FFE1E1";
                    $out   = "#FFE1E1";
                }

                $contentName = getName($rows['number'],$rows['Gtype'],$rows['rtype_str'],$rows['quick_type']);

                $bet_rate = $rows['bet_rate_one'];
                if(strpos($bet_rate,",") !== false){
                    $bet_rate_array = explode(",", $bet_rate);
                    $bet_rate = $bet_rate_array[0];
                }


                $sql_user = "select user_name,money from user_list where user_id='".$rows["user_id"]."'";
                $query_user	=	$mysqli->query($sql_user);
                $rows_user = $query_user->fetch_array();
                ?>
                <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>; line-height:20px;">
                    <td height="25" align="center" valign="middle"><?=$rows['order_sub_num']?></td>
                    <td align="center" valign="middle"><?=getZhPageTitle($rows['Gtype'])?></td>
                    <td align="center" valign="middle"><?=$rows['qishu']?></td>
                    <td align="center" valign="middle"><?=$rows['rtype_str']?></td>
                    <td align="center" valign="middle"><?=$contentName?></td>
                    <td align="center" valign="middle"><?=$rows['bet_money_one']?></td>
                    <td align="center" valign="middle"><?=$rows['fs']?></td>
                    <td align="center" valign="middle"><?=$bet_rate?></td>
                    <td align="center" valign="middle"><?=$rows['win_sub']?></td>
                    <td align="center" valign="middle"><?=$money_result?></td>
                    <td><?=$rows['bet_time']?></td>
                    <td><?=$rows_user["user_name"]?></td>
                    <td><?php if($rows['status']==0){?>未结算<?php }?>
                        <?php if($rows['status']==1){?>已结算<?php }?>
                        <?php if($rows['status']==2){?>已重算<?php }?>
                        <?php if($rows['status']==3){?>作废<?php }?></td>
                </tr>
            <?php
            }
        }
    }elseif($type=="体育下注"
        || strpos($type,"游戏自动结算")!==false|| strpos($type,"游戏手工结算")!==false|| strpos($type,"游戏重新结算")!==false
        || strpos($type,"串关自动结算")!==false|| strpos($type,"串关手工结算")!==false|| strpos($type,"串关重新结算")!==false){
        if($about=="体育串关" || strpos($type,"串关自动结算")!==false|| strpos($type,"串关手工结算")!==false|| strpos($type,"串关重新结算")!==false){
            ?>
            <tr>
                <td align="center" bgcolor="#CCCCCC" height="28"><strong>订单号</strong></td>
                <td align="center" bgcolor="#CCCCCC"><strong>模式</strong></td>
                <td align="center" bgcolor="#CCCCCC"><strong>结算详细信息</strong></td>
                <td align="center" bgcolor="#CCCCCC"><strong>投注金额</strong></td>
                <td align="center" bgcolor="#CCCCCC"><strong>可赢</strong></td>
                <td align="center" bgcolor="#CCCCCC"><strong>结果</strong></td>
                <td align="center" bgcolor="#CCCCCC"><strong>投注时间</strong></td>
                <td align="center" bgcolor="#CCCCCC"><strong>状态</strong></td>
            </tr>
        <?php
            $yjs		=	array(); //已结算的串关个数
            $sql	=	"SELECT id,user_id,order_num,cg_count, bet_money, bet_win, win,
                                              bet_time, bet_time_et, status, balance, assets, www
                                      FROM k_bet_cg_group
                                      WHERE order_num='$order_num'
                                      order by id desc";
            $query	=	$mysqli->query($sql);
            while ($rows = $query->fetch_array()) {
                $bid = $rows["id"];
                $yjs[$rows["id"]]	=	0;
                $sql_1	=	"select gid,count(*) as num from k_bet_cg where status not in(0,3) and gid in ($bid) group by gid"; //取出该串关已结算的注单个数
                $query_1	=	$mysqli->query($sql_1);
                while($rows_1 = $query_1->fetch_array()) {
                    $yjs[$rows_1['gid']]	=	$rows_1['num']; //统计已结算的个数
                }
            }

            $sql	=	"SELECT id,user_id,order_num,cg_count, bet_money, bet_win, win,
                                              bet_time, bet_time_et, status, balance, assets, www
                                      FROM k_bet_cg_group
                                      WHERE order_num='$order_num'
                                      order by id desc";
            $query	=	$mysqli->query($sql);
            while ($rows = $query->fetch_array()) {
                $color = "#FFFFFF";
                $over	 = "#EBEBEB";
                $out	 = "#ffffff";

                if($rows['win']>0){
                    $color = "#FFE1E1";
                    $out   = "#FFE1E1";
                }

                $cg_id = $rows["id"];

                $user_id = $rows["user_id"];
                $sql_sub   =	"select user_name from user_list where user_id='$user_id'";
                $query_sub	=	$mysqli->query($sql_sub);
                $row_sub    =	$query_sub->fetch_array();

                ?>
                <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>; line-height:20px;">
                    <td height="25" align="center" valign="middle"><?=$rows['order_num']?></td>
                    <td align="center" valign="middle"><?=$rows["cg_count"]?>串1</td>
                    <td align="center" valign="middle">已结算：<?=$yjs[$rows["id"]]?></td>
                    <td align="center" valign="middle"><?=$rows['bet_money']?></td>
                    <td align="center" valign="middle"><?=$rows['bet_win']?></td>
                    <td align="center"><?=$rows["win"]>0 ? '<span style="color:#FF0000">'.$rows["win"].'</span>' : $rows["win"]?></td>
                    <td align="center" valign="middle">北京:<?=$rows['bet_time']?><br/>美东:<?=$rows['bet_time_et']?></td>
                    <td align="center">
                        <? if(($rows["status"]==1 || $rows["status"]==3) && $yjs[$rows["gid"]]==$rows["cg_count"]){ ?>
                            已结算<br/>
                        <? }else if($yjs[$rows["gid"]]==$rows["cg_count"]){ ?>
                            结算
                        <? }else{ ?>
                            等待单式结算
                        <? } ?>
                    </td>
                </tr>
                <tr >
                    <td colspan="11" style="padding: 0px;"><img style="max-width: 100%;" src="<?=$image_path?>">
                    </td>
                </tr>
            <?php
            }

        }else{
            ?>
            <tr>
                <td align="center" bgcolor="#CCCCCC" height="28"><strong>订单号</strong></td>
                <td align="center" bgcolor="#CCCCCC"><strong>联赛名</strong></td>
                <td align="center" bgcolor="#CCCCCC"><strong>编号/主客队</strong></td>
                <td align="center" bgcolor="#CCCCCC"><strong>投注详细信息</strong></td>
                <td align="center" bgcolor="#CCCCCC"><strong>投注金额</strong></td>
                <td align="center" bgcolor="#CCCCCC"><strong>反水</strong></td>
                <td align="center" bgcolor="#CCCCCC"><strong>可赢</strong></td>
                <td align="center" bgcolor="#CCCCCC"><strong>结果</strong></td>
                <td align="center" bgcolor="#CCCCCC"><strong>投注/开赛时间</strong></td>
                <td align="center" bgcolor="#CCCCCC"><strong>投注账号</strong></td>
                <td align="center" bgcolor="#CCCCCC"><strong>状态</strong></td>
            </tr>
        <?php
        }

        $sql	=	"SELECT user_id,order_num,ball_sort,point_column,match_name,master_guest,match_id,
                                              bet_info,bet_money,bet_point,bet_win,win,
                                              bet_time,bet_time_et,match_time,match_endtime,
                                              status,balance,assets,ip,www,fs,
                                              MB_Inball,TG_Inball
                                      FROM k_bet
                                      WHERE order_num='$order_num'
                                      order by id desc";
        $query	=	$mysqli->query($sql);

        while ($rows = $query->fetch_array()) {
            $color = "#FFFFFF";
            $over	 = "#EBEBEB";
            $out	 = "#ffffff";

            if($rows['win']>0){
                $color = "#FFE1E1";
                $out   = "#FFE1E1";
            }

            $user_id = $rows["user_id"];
            $sql_sub   =	"select user_name from user_list where user_id='$user_id'";
            $query_sub	=	$mysqli->query($sql_sub);
            $row_sub    =	$query_sub->fetch_array();

            if($rows["status"]!=0 && $rows["status"]!=3){
                if($rows["ball_sort"]=="冠军"){
                    $match_id = $rows["match_id"];
                    $sql_gj   =	"select x_result from t_guanjun where match_id='$match_id'";
                    $query_gj	=	$mysqli->query($sql_gj);
                    $row_gj    =	$query_gj->fetch_array();
                    $bet_result = "<br/>".$row_gj["x_result"];
                }elseif($rows["MB_Inball"]!=null && $rows["MB_Inball"]!=''){
                    $bet_result = "<br/>[".$rows["MB_Inball"].":".$rows["TG_Inball"]."]";
                }
            }else{
                $bet_result = "";
            }
            ?>
            <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>; line-height:20px;">
                <td height="25" align="center" valign="middle"><?=$rows['order_num']?></td>
                <td align="center" valign="middle"><?=$rows['match_name']?></td>
                <td align="center" valign="middle"><?=$rows['master_guest']?></td>
                <td align="center" valign="middle"><?=$rows['bet_info']?><?=$bet_result?></td>
                <td align="center" valign="middle"><?=$rows['bet_money']?></td>
                <td align="center" valign="middle"><?=$rows['fs']?></td>
                <td align="center" valign="middle"><?=$rows['bet_win']?></td>
                <td align="center"><?=$rows["win"]>0 ? '<span style="color:#FF0000">'.($rows["win"]+$rows['fs']).'</span>' : $rows["win"]?></td>
                <td align="center" valign="middle">北京时间:<?=$rows['bet_time']?><br/>美东时间:<?=$rows['bet_time_et']?><br/>开赛(美东):<?=$rows['match_endtime']?></td>
                <td align="center" valign="middle"><?=$rows['assets']?><br/><?=$row_sub['user_name']?><br/><?=$rows['balance']?></td>
                <td><?php if($rows['status']==0){?><font >未结算</font><?php }?>
                    <?php if($rows['status']==1){?><font color="#FF0000">赢</font><?php }?>
                    <?php if($rows['status']==2){?><font color="#00CC00">输</font><?php }?>
                    <?php if($rows['status']==3){?><font >注单无效</font><?php }?>
                    <?php if($rows['status']==4){?><font color="#FF0000">赢一半</font><?php }?>
                    <?php if($rows['status']==5){?><font color="#00CC00">输一半</font><?php }?>
                    <?php if($rows['status']==6){?><font >进球无效</font><?php }?>
                    <?php if($rows['status']==7){?><font >红卡无效</font><?php }?>
                    <?php if($rows['status']==8){?><font >和局</font><?php }?>
                </td>
            </tr>
        <?php
        }
    }
    ?>
</table>

  <?php
    if($type=="体育下注"|| strpos($type,"串关自动结算")!==false|| strpos($type,"串关手工结算")!==false|| strpos($type,"串关重新结算")!==false){
        if($about=="体育串关"|| strpos($type,"串关自动结算")!==false|| strpos($type,"串关手工结算")!==false|| strpos($type,"串关重新结算")!==false){
            ?>
            <table style="margin-top: 20px;" width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999">
                <tr>
                    <td width="15%" align="center" bgcolor="#CCCCCC" height="28"><strong>编号</strong></td>
                    <td width="15%" align="center" bgcolor="#CCCCCC"><strong>联赛名</strong></td>
                    <td width="12%" align="center" bgcolor="#CCCCCC"><strong>编号/主客队</strong></td>
                    <td width="12%" align="center" bgcolor="#CCCCCC"><strong>投注详细信息</strong></td>
                    <td width="12%" align="center" bgcolor="#CCCCCC"><strong>投注/开赛时间</strong></td>
                    <td width="20%" align="center" bgcolor="#CCCCCC"><strong>投注账号</strong></td>
                    <td width="14%" align="center" bgcolor="#CCCCCC"><strong>状态</strong></td>
                </tr>
                <?php
                $sql = "select k_bet_cg.*,user_list.user_name from k_bet_cg left join user_list on k_bet_cg.user_id=user_list.user_id where 1";
                $sql .= " and k_bet_cg.gid=" . $cg_id;
                $sql .= " and k_bet_cg.user_id=" . $user_id;
                $sql .= " order by  k_bet_cg.id  desc ";

                $query = $mysqli->query($sql);
                while ($rows = $query->fetch_array()) {
                    $color = "#FFFFFF";
                    $over = "#EBEBEB";
                    $out = "#ffffff";
                    if (strtotime($rows["bet_time"]) >= strtotime($rows["match_endtime"])) { //不是滚球，抽注时间不能>=开赛时间
                        $over = $out = $color = "#FBA09B";
                    }
                    ?>
                    <tr align="center" onMouseOver="this.style.backgroundColor='<?= $over ?>'"
                        onMouseOut="this.style.backgroundColor='<?= $out ?>'" style="background-color:<?= $color ?>;">
                        <td><?= $rows["id"] ?></td>
                        <td>
                           <?= $rows["match_name"] ?>
                        </td>
                        <td>
                            <?= $rows["match_id"] ?>
                            <br/>
                            <?php
                            if (strpos($rows["master_guest"], 'VS.')) echo str_replace("VS.", "<br/>", $rows["master_guest"]);
                            else  echo str_replace("VS", "<br/>", $rows["master_guest"]);
                            ?></td>
                        <td> <?= $rows["ball_sort"] ?>
                            <br/><font style="color:#FF0033">
                                <?= str_replace("-", "<br/>", $rows["bet_info"]) ?>
                            </font>
                            <? if ($rows["status"] != 0 && $rows["status"] != 3)
                                if ($rows["MB_Inball"] != '') {
                                    ?>
                                    <br>[<?= $rows["MB_Inball"] ?>:<?= $rows["TG_Inball"] ?>]
                                <? } ?>
                            <?php
                            if ($rows['status'] == 3) {
                                echo "<br>[取消]";
                            }
                            ?>
                        </td>
                        <td><?= date("m-d H:i:s", strtotime($rows["bet_time"])) ?>
                            <br/>
                            <?= date("m-d H:i:s", strtotime($rows["match_endtime"])) ?></td>
                        <td>
                                <?= $rows["user_name"] ?>
                            </td>
                        <td align="center"><?php
                            if ($rows["status"] == 0) {
                                echo '未结算';
                            } elseif ($rows["status"] == 1) {
                                echo '<span style="color:#FF0000;">赢</span>';
                            } elseif ($rows["status"] == 2) {
                                echo '<span style="color:#00CC00;">输</span>';
                            } elseif ($rows["status"] == 8) {
                                echo '和';
                            } elseif ($rows["status"] == 3) {
                                echo '注单无效';
                            } elseif ($rows["status"] == 4) {
                                echo '<span style="color:#FF0000;">赢一半</span>';
                            } elseif ($rows["status"] == 5) {
                                echo '<span style="color:#00CC00;">输一半</span>';
                            } elseif ($rows["status"] == 6) {
                                echo '其他无效';
                            } elseif ($rows["status"] == 7) {
                                echo '红卡取消';
                            }
                            ?>
                        </td>
                    </tr>
                <?
                }
                ?>
            </table>
            <?php
        }
    }
  ?>
</body>
</html>

<?php
$mysqli ->close();
?>