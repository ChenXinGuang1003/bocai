<?php
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
include_once($C_Patch."/include/pager.class.php");

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
                                <select name="status" id="status">
                                    <option value="all" <?=($_GET['status']=='all' || !isset($_GET['status'])) ? 'selected' : ''?>>全部注单</option>
                                    <option value="0"  <?=$_GET['status']=='0' ? 'selected' : ''?>>未结算</option>
                                    <option value="1"  <?=$_GET['status']=='1' ? 'selected' : ''?>>已赢注单</option>
                                    <option value="2"  <?=$_GET['status']=='2' ? 'selected' : ''?>>已输注单</option>
                                    <option value="3"  <?=$_GET['status']=='3' ? 'selected' : ''?>>和局/无效</option>

                                </select>
                                会员：<input name="username" type="text" id="username" value="<?=$_GET['username']?>" size="12">
                                日期：<input name="s_time" type="text" id="s_time" value="<?=$_GET['s_time']?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
                                ~
                                <input name="e_time" type="text" id="e_time" value="<?=$_GET['e_time']?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
                                订单号：<input name="tf_id" type="text" id="tf_id" value="<?=@$_GET['tf_id']?>" size="12">
                                &nbsp;
                                <input type="submit" name="Submit" value="搜索"></td>
                        </tr>
                    </form>
                </table>
                <table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12" style="margin-top:5px;" bgcolor="#798EB9">
                    <tr style="background-color:#3C4D82; color:#FFF">
                        <td align="center"><strong>订单号</strong></td>
                        <td align="center"><strong>模式</strong></td>
                        <td align="center"><strong>结算详细信息</strong></td>
                        <td align="center"><strong>投注金额</strong></td>
                        <td align="center"><strong>反水</strong></td>
                        <td align="center"><strong>可赢</strong></td>
                        <td height="25" align="center"><strong>结果</strong></td>
                        <td align="center"><strong>投注时间</strong></td>
                        <td height="25" align="center"  style="min-width: 60px;"><strong>状态</strong></td>
                    </tr>
                    <?php

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

                    $sql	=	"select id from k_bet_cg_group where 1=1 ";
                    if($uid != '') $sql.=" and user_id=".$uid;
					if($_GET["gid"]) $sql.=" and id='".$_GET["gid"]."'";
                    if($_GET["gid_group"]) $sql.=" and id in(".$_GET["gid_group"].")";
                    if($_GET["s_time"]) $sql.=" and bet_time>='".$_GET["s_time"]." 00:00:00'";
                    if($_GET["e_time"]) $sql.=" and bet_time<='".$_GET["e_time"]." 23:59:59'";
                    if(isset($_GET["status"]) && $_GET["status"]!='all')  $sql.=" and status=".$_GET["status"];
                    if($_GET['tf_id']) $sql.=" and order_num='".$_GET['tf_id']."'";
                    if($_GET['uid']) $sql.=" and user_id='".$_GET['uid']."'";
                    if(isset($_GET['www'])) $sql.=" and www='".$_GET['www']."'";
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
                    $yjs		=	array(); //已结算的串关个数
                    while($row = $query->fetch_array()){
                        if($i >= $start && $i <= $end){
                            $yjs[$row['id']]	=	0; //默认一条串关注单都未结算
                            $bid .=	$row['id'].',';
                        }
                        if($i > $end) break;
                        $i++;
                    }
                    if($bid){
                        $C_Patch=$_SERVER['DOCUMENT_ROOT'];
                        $bid	=	rtrim($bid,',');

                        $sql_1	=	"select gid,count(*) as num from k_bet_cg where status not in(0,3) and gid in ($bid) group by gid"; //取出该串关已结算的注单个数
                        $query_1	=	$mysqli->query($sql_1);
                        while($rows_1 = $query_1->fetch_array()) {
                            $yjs[$rows_1['gid']]	=	$rows_1['num']; //统计已结算的个数
                        }

                        $sql	=	"SELECT id,user_id,order_num,cg_count, bet_money, bet_win, win,
                                              bet_time, bet_time_et, status, balance, fs, assets, www ,`check` 
                                      FROM k_bet_cg_group
                                      WHERE id in($bid)
                                      order by id desc";
                        $query	=	$mysqli->query($sql);
                        while ($rows = $query->fetch_array()) {
                            if($_GET["cgtype"]=="manual" && !($yjs[$rows["id"]]==$rows["cg_count"] && $rows["status"]==0)){
                                continue;
                            }

                            $color = "#FFFFFF";
                            $over	 = "#EBEBEB";
                            $out	 = "#ffffff";
                            $t_allmoney+=$rows['bet_money'];
                            $t_sy+=$rows['win'];

                            if($rows['win']>0){
                                $color = "#FFE1E1";
                                $out   = "#FFE1E1";
                            }

                            $user_id = $rows["user_id"];
                            $sql_sub   =	"select user_name from user_list where user_id='$user_id'";
                            $query_sub	=	$mysqli->query($sql_sub);
                            $row_sub    =	$query_sub->fetch_array();

                            $order_num = $rows["order_num"];
                            $image_path = "http://".$image_web."/".substr($order_num,0,8)."/$order_num.jpg";

                            ?>
                            <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>; line-height:20px;">
                                <td height="25" align="center" valign="middle"><?=$rows['order_num']?></td>
                                <td align="center" valign="middle"><?=$rows["cg_count"]?>串1</td>
                                <td><div><div style="float:left;">已结算：<?=$yjs[$rows["id"]]?>&nbsp;[<a style="color: #F37605;" href="bet_cg.php?gid=<?=$rows["id"]?>&order_num=<?=$rows["order_num"]?>">详细</a>]</div><div style="float:right;"><span style="color:#999999;"><?=$rows["assets"]?></span>&nbsp;<a style="color: #F37605;" href="cg_list.php?username=<?=$row_sub["user_name"]?>"><?=$row_sub["user_name"]?></a>&nbsp;<span style="color:#999999;"><?=$rows["balance"]?></span></div></div></td>
                                <td align="center" valign="middle"><?=$rows['bet_money']?></td>
                                <td align="center" valign="middle"><?=$rows['fs']?></td>
                                <td align="center" valign="middle"><?=$rows['bet_win']?></td>
                                <td align="center"><?=($rows["status"]!=0 && $rows["status"]!=3) ? '<span style="color:#FF0000">'.($rows["win"]+$rows['fs']).'</span>' : $rows["win"]?></td>
                                <td align="center" valign="middle">北京:<?=$rows['bet_time']?><br/>美东:<?=$rows['bet_time_et']?></td>
                                <td align="center">
                                    <? if(($rows["status"]==1 || $rows["status"]==2 ||$rows["status"]==3) && $rows["check"]==1 && $yjs[$rows["id"]]>=$rows["cg_count"]){ ?>
                                        已结算<br/>
                                        <a onClick="return confirm('所有该串关的注单都需要重新结算，确定要重新结算？')" href="setcg_qx.php?gid=<?=$rows["id"]?>">重新结算</a>
                                    <? }else if($yjs[$rows["id"]]>=$rows["cg_count"]){ ?>
                                        <a onClick="return confirm('确定结算？')" href="set_cg.php?id=<?=$rows["id"]?>&ok=1">结算</a><br>
                                    <? if($rows["status"]==0)
										{
								?>
<a onClick="return confirm('确定取消吗？')" href="setcg_zf.php?gid=<?=$rows["id"]?>">作废</a>
								<?
										}
										}else{ 
										if($rows["status"]==3)
										{
											echo "已作废";
										}else{
										?>
                                        等待单式结算<br>
										<a onClick="return confirm('确定取消吗？')" href="setcg_zf.php?gid=<?=$rows["id"]?>">作废</a>
                                    <? }} ?>
                                </td>
                            </tr>
                            <tr >
                                <td colspan="11" style="padding: 0px;"><img  class="img-img" style="max-width: 100%;" src="<?=$image_path?>">
                                </td>
                            </tr>
                        <?php
                        }
                    }
                    ?>
                    <tr style="background-color:#FFFFFF;">
                        <td colspan="12" align="center" valign="middle">当前页总投注金额:<?=$t_allmoney?>元 &nbsp;&nbsp;   当前页赢取金额:<?=$t_allmoney - $t_sy?>元</td>
                    </tr>
                    <tr style="background-color:#FFFFFF;">
                        <td colspan="12" align="center" valign="middle"><?php echo $pageStr;?></td>
                    </tr>

                </table></td>
        </tr>
    </table>
</body>
</html>
<?
$mysqli->close();
?>