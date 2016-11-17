<?php
error_reporting(1);
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

//echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

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

if(!$_GET["s_time"]){
    $_GET["s_time"] = date('Y-m-d',strtotime('-6 day'));
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
        if($("#tf_id").val() && $("#tf_id").val().length < 9){
            alert("注单长度不够，请重新输入。")
            return false;
        }
        return true;
    }

    function myfun(){
        $(".img-img").each(function(){ if($(this)[0].scrollWidth>800) $(this).css({"width":"800px"}); });
        setInterval(function(){
            $("form[name='form1']").submit();
        },<?=intval($web_site['sport_auto_time'])>0?$web_site['sport_auto_time']*1000:30000?>);
    }
    <?
        if($web_site['sport_auto']==1) {
    ?>
    window.onload=myfun;//不要括号
    <?
        }
    ?>
</script>
<script language="JavaScript" src="/js/calendar.js"></script>
<body>
    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
        <tr>
            <td height="24" nowrap background="../images/06.gif"><font ><span class="STYLE2">体育注单查询（<a href="../webconfig/index.php" style="color: #F37605;font-size: 14px;" target="main">设置页面属性</a>）</span></font></td>
        </tr>
        <tr>
        <td height="24" align="center" nowrap bgcolor="#FFFFFF">
            <table width="100%">
                <form name="form1" method="get" action="<?=$_SERVER["REQUEST_URI"]?>" onSubmit="return check();">
                        <tr>
                            <td align="center" bgcolor="#FFFFFF">
                                <select name="type" id="type">
                                    <option value="全部赛事" <?=$_GET['type']=='全部赛事' ? 'selected' : ''?>>全部赛事</option>
                                    <option value="足球"    <?=$_GET['type']=='足球' ? 'selected' : ''?>>足球</option>
                                    <option value="篮球"    <?=$_GET['type']=='篮球' ? 'selected' : ''?>>篮球</option>
                                    <option value="网球"    <?=$_GET['type']=='网球' ? 'selected' : ''?>>网球</option>
                                    <option value="排球"    <?=$_GET['type']=='排球' ? 'selected' : ''?>>排球</option>
                                    <option value="棒球"    <?=$_GET['type']=='棒球' ? 'selected' : ''?>>棒球</option>
                                    <option value="冠军"    <?=$_GET['type']=='冠军' ? 'selected' : ''?>>冠军</option>
                                    <option value="单式"    <?=$_GET['type']=='单式' ? 'selected' : ''?>>单式</option>
                                    <option value="其他"    <?=$_GET['type']=='其他' ? 'selected' : ''?>>其他</option>

                                </select>
                                <select name="status" id="status">
                                    <option value="all" <?=($_GET['status']=='all' || !isset($_GET['status'])) ? 'selected' : ''?>>全部注单</option>
                                    <option value="0"  <?=$_GET['status']=='0' ? 'selected' : ''?>>未结算</option>
                                    <option value="1"  <?=$_GET['status']=='1' ? 'selected' : ''?>>赢</option>
                                    <option value="2"  <?=$_GET['status']=='2' ? 'selected' : ''?>>输</option>
                                    <option value="3"  <?=$_GET['status']=='3' ? 'selected' : ''?>>注单无效</option>
                                    <option value="4"  <?=$_GET['status']=='4' ? 'selected' : ''?>>赢一半</option>
                                    <option value="5"  <?=$_GET['status']=='5' ? 'selected' : ''?>>输一半</option>
                                    <option value="6"  <?=$_GET['status']=='6' ? 'selected' : ''?>>进球无效</option>
                                    <option value="7"  <?=$_GET['status']=='7' ? 'selected' : ''?>>红卡无效</option>
                                    <option value="8"  <?=$_GET['status']=='8' ? 'selected' : ''?>>和局</option>

                                </select>
                                会员：<input name="username" type="text" id="username" value="<?=$_GET['username']?>" size="12">
                                日期：<input name="s_time" type="text" id="s_time" value="<?=$_GET['s_time']?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
                                ~
                                <input name="e_time" type="text" id="e_time" value="<?=$_GET['e_time']?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
                                订单号：<input name="tf_id" type="text" id="tf_id" value="<?=@$_GET['tf_id']?>" size="12">
                                赛事ID：<input name="match_id" type="text" id="match_id" value="<?=@$_GET['match_id']?>" size="8">
                                &nbsp;
                                <input type="submit" name="Submit" value="搜索"></td>
                        </tr>
                    </form>
                </table>
                <table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12" style="margin-top:5px;" bgcolor="#798EB9">
                    <tr style="background-color:#3C4D82; color:#FFF">
                        <td align="center"><strong>赛事ID/订单号</strong></td>
                        <td align="center"><strong>联赛名</strong></td>
                        <td align="center"><strong>主客队</strong></td>
                        <td align="center"><strong>投注详细信息</strong></td>
                        <td align="center"><strong>投注金额</strong></td>
                        <td align="center"><strong>反水</strong></td>
                        <td align="center"><strong>可赢</strong></td>
                        <td height="25" align="center"><strong>结果</strong></td>
                        <td align="center"><strong>投注/开赛时间</strong></td>
                        <td align="center"><strong>投注账号</strong></td>
                        <td height="25" align="center"><strong>状态</strong></td>
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
                            $uid=	'0';
                        }
                    }

                    $sql	=	"select id from k_bet where 1=1 and lose_ok!=0 ";
                    if($_GET["type"] == "足球"){
                        $sql.=" and (ball_sort='足球早餐' or ball_sort='足球单式' or ball_sort='足球滚球' or ball_sort='足球上半场')";
                    }elseif($_GET["type"] == "篮球"){
                        $sql.=" and (ball_sort='篮球早餐' or ball_sort='篮球单式' or ball_sort='篮球滚球' or ball_sort='篮球单节')";
                    }elseif($_GET["type"] == "网球"){
                        $sql.=" and (ball_sort='网球早餐' or ball_sort='网球单式')";
                    }elseif($_GET["type"] == "排球"){
                        $sql.=" and (ball_sort='排球早餐' or ball_sort='排球单式')";
                    }elseif($_GET["type"] == "棒球"){
                        $sql.=" and (ball_sort='棒球早餐' or ball_sort='棒球单式')";
                    }elseif($_GET["type"] == "冠军"){
                        $sql.=" and ball_sort='冠军'";
                    }elseif($_GET["type"] == "单式"){
                        $sql.=" and ball_sort != '冠军'";
                    }elseif($_GET["type"] == "其他"){
                        $sql.=" and (ball_sort='其他早餐' or ball_sort='其他单式')";
                    }
                    if($uid != '') $sql.=" and user_id=".$uid;
                    if($_GET["match_id"]) $sql.=" and match_id='".trim($_GET["match_id"])."'";
                    if($_GET["s_time"]) $sql.=" and bet_time>='".$_GET["s_time"]." 00:00:00'";
                    if($_GET["e_time"]) $sql.=" and bet_time<='".$_GET["e_time"]." 23:59:59'";
                    if(isset($_GET["ball_sort"])) $sql.=" and ball_sort='".urldecode($_GET["ball_sort"])."'";
                    if(isset($_GET["status"]) && $_GET["status"]!='all')  $sql.=" and status=".$_GET["status"];
                    if($_GET['tf_id']) $sql.=" and order_num='".$_GET['tf_id']."'";
                    $sql.=" order by bet_time desc ";

                    $query	=	$mysqli->query($sql);
                    $sum		=	$mysqli->affected_rows; //总页数
                    $thisPage	=	1;
                    $pagenum	=	intval($web_site['sport_show_row'])>0?$web_site['sport_show_row']:100;
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
                        $C_Patch=$_SERVER['DOCUMENT_ROOT'];

                        $bid	=	rtrim($bid,',');
                        $sql	=	"SELECT user_id,order_num,ball_sort,point_column,match_name,master_guest,match_id,
                                              bet_info,bet_money,bet_point,bet_win,win,
                                              bet_time,bet_time_et,match_time,match_endtime,
                                              status,balance,assets,ip,www,fs,
                                              MB_Inball,TG_Inball
                                      FROM k_bet
                                      WHERE id in($bid)
                                      order by id desc";
                        $query	=	$mysqli->query($sql);

                        while ($rows = $query->fetch_array()) {
                            $color = "#FFFFFF";
                            $over	 = "#EBEBEB";
                            $out	 = "#ffffff";
                            $t_allmoney+=$rows['bet_money'];
                            $t_sy+=$rows['win'];

                            if($rows['win']>0){
                                $color = "#FFE1E1";
                                $out   = "#FFE1E1";
                                $over	 = "#FFE1E1";
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

                            $order_sub_num = $rows['order_num'];
                            $image_path = "http://".$image_web."/".substr($order_sub_num,0,8)."/$order_sub_num.jpg";

                            ?>
                            <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>; line-height:20px;">
                                <td height="25" align="center" valign="middle" style="width: 148px;padding-left: 0px;padding-right: 0px;"><a style="color: #F37605;" href="orderlist.php?status=<?=$_GET['status']?>&type=<?=$_GET["type"]?>&s_time=<?=$_GET['s_time']?>&e_time=<?=$_GET['e_time']?>&match_id=<?=$rows["match_id"]?>"><?=$rows['match_id']?></a><br><?=$rows['order_num']?></td>
                                <td align="center" valign="middle" style="width: 10%;padding-left: 0px;padding-right: 0px;"><?=$rows['match_name']?></td>
                                <td align="center" valign="middle" style="width: 10%;padding-left: 0px;padding-right: 0px;"><?=$rows['master_guest']?></td>
                                <td align="center" valign="middle" style="width: 10%;padding-left: 0px;padding-right: 0px;">
                                    <a href="?ball_sort=<?=urlencode($rows["ball_sort"])?>&type=<?=$_GET["type"]?>&s_time=<?=$_GET['s_time']?>&e_time=<?=$_GET['e_time']?>"><font color="<? if ($rows["ball_sort"]=="足球滚球"){echo "#0066FF";}else{echo "#336600";}?>"><b><?=$rows["ball_sort"]?></b></font></a><br/>
                                    [<?=$rows['match_time']?>]<?=$rows['bet_info']?>
                                    <?=$bet_result?>
                                </td>
                                <td align="center" valign="middle" style="width: 52px;padding-left: 0px;padding-right: 0px;"><?=$rows['bet_money']?></td>
                                <td align="center" valign="middle" style="width: 40px;padding-left: 0px;padding-right: 0px;"><?=$rows['fs']?></td>
                                <td align="center" valign="middle" style="width: 50px;padding-left: 0px;padding-right: 0px;"><?=$rows['bet_win']?></td>
                                <td align="center"  style="width: 50px;padding-left: 0px;padding-right: 0px;"><?=($rows["status"]!=0 && $rows["status"]!=3 && $rows["status"]!=8) ? '<span style="color:#FF0000">'.($rows["win"]+$rows['fs']).'</span>' : $rows["win"]?></td>
                                <td align="center" valign="middle" style="width: 170px;padding-left: 0px;padding-right: 0px;">北京时间:<?=substr($rows['bet_time'],5)?><br/>美东时间:<?=substr($rows['bet_time_et'],5)?><br/>开赛(美东):<?=substr($rows['match_endtime'],5)?></td>
                                <td align="center" valign="middle" style="width: 70px;padding-left: 0px;padding-right: 0px;">
                                    <?=$rows['assets']?><br/>
                                    <a style="color: #F37605;" href="orderlist.php?status=<?=$_GET['status']?>&type=<?=$_GET["type"]?>&username=<?=$row_sub["user_name"]?>"><?=$row_sub['user_name']?></a><br/>
                                    <?=$rows['balance']?>
                                </td>
                                <td style="width: 48px;padding-left: 0px;padding-right: 0px;"><?php if($rows['status']==0){?><font >未结算</font><?php }?>
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
                            <tr >
                                <td colspan="11" style="padding: 0px;"><img class="img-img" src="<?=$image_path?>">
                                </td>
                            </tr>
                        <?php
                        }
                    }
                    ?>
                    <tr style="background-color:#FFFFFF;">
                        <td colspan="11" align="center" valign="middle">当前页总投注金额:<?=$t_allmoney?>元 &nbsp;&nbsp;   当前页赢取金额:<?=$t_allmoney - $t_sy?>元</td>
                    </tr>
                    <tr style="background-color:#FFFFFF;">
                        <td colspan="11" align="center" valign="middle"><?php echo $pageStr;?></td>
                    </tr>

                </table></td>
        </tr>
    </table>
</body>
</html>
<?
$mysqli->close();
?>