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

include_once("../class/admin.php");
include_once("../common/login_check.php");

check_quanxian("手工结算注单");

?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Welcome</title>
    <link rel="stylesheet" href="../images/css/admin_style_1.css" type="text/css" media="all" />
</head>
<script type="text/javascript" charset="utf-8" src="../js/jquery-1.7.2.min.js" ></script>
<script language="javascript">
	function winopen(bid){
		window.open("set_score.php?bid="+bid,"list","width=440,height=180,left=50,top=100,scrollbars=no"); 
	}

	function windowopen(url){
		window.open(url,"wx","width=600,height=500,left=50,top=100,scrollbars=no"); 
	}

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
                                &nbsp;&nbsp;
                                会员：<input name="username" type="text" id="username" value="<?=$_GET['username']?>" size="15">
                                &nbsp;&nbsp;
                                日期：<input name="s_time" type="text" id="s_time" value="<?=$_GET['s_time']?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
                                ~
                                <input name="e_time" type="text" id="e_time" value="<?=$_GET['e_time']?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
                                &nbsp;&nbsp;
                                订单号：<input name="tf_id" type="text" id="tf_id" value="<?=@$_GET['tf_id']?>" size="17">
								&nbsp;&nbsp;
                                赛事ID：<input name="match_id" type="text" id="match_id" value="<?=@$_GET['tf_id']?>" size="8">
                                &nbsp;&nbsp;
                                <input type="submit" name="Submit" value="搜索"></td>
                        </tr>
                    </form>
                </table>
                <table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12" style="margin-top:5px;" bgcolor="#798EB9">
                    <tr style="background-color:#3C4D82; color:#FFF">
                        <td align="center"><strong>赛事ID/订单号</strong></td>
                        <td align="center"><strong>联赛名</strong></td>
                        <td align="center"><strong>编号/主客队</strong></td>
                        <td align="center"><strong>投注详细信息</strong></td>
                        <td align="center"><strong>投注金额</strong></td>
                        <td align="center"><strong>反水</strong></td>
                        <td align="center"><strong>可赢</strong></td>
                        <td height="25" align="center"><strong>结果</strong></td>
                        <td align="center" style="min-width: 210px;"><strong>投注/开赛时间</strong></td>
                        <td align="center"><strong>投注账号</strong></td>
                        <td height="25" align="center"  style="min-width: 48px;"><strong>状态</strong></td>
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

                    $sql	=	"select id from k_bet where 1=1 ";
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
                    if(isset($_GET["status"]) && $_GET["status"]!='all')  $sql.=" and status=".$_GET["status"];
                    if($_GET['tf_id']) $sql.=" and order_num='".$_GET['tf_id']."'";
                    $sql.=" order by bet_time desc ";

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
                                              status,balance,assets,ip,www,fs,match_type,
                                              MB_Inball,TG_Inball,id
                                      FROM k_bet
                                      WHERE id in($bid)
                                      order by id desc";
                        $query	=	$mysqli->query($sql);

                        while ($rows = $query->fetch_array()) {
                            $color = "#FFFFFF";
                            $over	 = "#EBEBEB";
                            $out	 = "#ffffff";

                            //暂时注释，还不清楚作用
							if(($rows["balance"]*1)<0 || round($rows["assets"]-$rows["bet_money"],2) != round($rows["balance"],2)){ //投注后用户余额不能为负数，投注后金额要=投注前金额-投注金额
//		  						$over = $out = $color = "#FBA09B";
								}elseif($rows["match_type"]==1 && strtotime($rows["bet_time_et"])>=strtotime($rows["match_endtime"])){ //不是滚球，抽注时间不能>=开赛时间
//									$over = $out = $color = "#FBA09B";
							  }elseif(double_format($rows["bet_money"]*($rows["ben_add"]+$rows["bet_point"])) !== double_format($rows["bet_win"])){
//									$over = $out = $color = "#FBA09B";
							  }


                            $t_allmoney+=$rows['bet_money'];
                            $t_sy+=$rows['win'];

                            if($rows['win']>0){
                                $color = "#FFE1E1";
                                $out   = "#FFE1E1";
                            }

							if($rows['status']==3 || $rows['status']==6 || $rows['status']==7 || $rows['status']==8){
                                $color = "#11E1E1";
                                $out   = "#11E1E1";
                            }
                            $user_id = $rows["user_id"];
                            $sql_sub   =	"select user_name from user_list where user_id='$user_id'";
                            $query_sub	=	$mysqli->query($sql_sub);
                            $row_sub    =	$query_sub->fetch_array();

                            if($rows["status"]!=0 && $rows["status"]!=3 && $rows["status"]!=8){
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
                                <td height="25" align="center" valign="middle"><a href="sgjsds.php?status=all&type=<?=$_GET["type"]?>&match_id=<?=$rows["match_id"]?>"><?=$rows['match_id']?></a><br><?=$rows['order_num']?></td>
                                <td align="center" valign="middle"><?=$rows['match_name']?></td>
                                <td align="center" valign="middle"><?=$rows['master_guest']?></td>
                                <td align="center" valign="middle">
                                    <?=$rows['bet_info']?>
                                    <?=$bet_result?>
                                </td>
                                <td align="center" valign="middle"><?=$rows['bet_money']?></td>
                                <td align="center" valign="middle"><?=$rows['fs']?></td>
                                <td align="center" valign="middle"><?=$rows['bet_win']?></td>
                                <td align="center"><?=($rows["status"]!=0 && $rows["status"]!=3 && $rows["status"]!=8) ? '<span style="color:#FF0000">'.($rows["win"]+$rows['fs']).'</span>' : $rows["win"]?></td>
                                <td align="center" valign="middle">北京时间:<?=$rows['bet_time']?><br/>美东时间:<?=$rows['bet_time_et']?><br/>开赛(美东):<?=$rows['match_endtime']?></td>
                                <td align="center" valign="middle"><?=$rows['assets']?><br/><?=$row_sub['user_name']?><br/><?=$rows['balance']?></td>
                                <td>
								<?php if ($rows["status"]==0){
									 if($rows["point_column"]==="match_jr" || $rows["point_column"]==="match_gj"){?>
										<a href="javascript:windowopen('jrgjjs.php?match_id=<?=$rows["match_id"]?>&bid=<?=$rows["id"]?>')">结算</a>
										<br/>
										<a href="javascript:windowopen('set_bets3.php?bid=<?=$rows["id"]?>&new=1&order_num=<?=$rows["order_num"]?>')">无效</a>
									<?php
									 }else{
									?>
										<a href="javascript:winopen(<?=$rows["id"]?>);">结算</a>
										<br/>
								  <a href="javascript:windowopen('set_bets3.php?bid=<?=$rows["id"]?>&new=1&order_num=<?=$rows["order_num"]?>')">无效</a>
							  <?}}else if($rows["status"]==3){?>
							  注单无效	
							   <?}else if($rows["status"]==4){?>
							  赢一半
							   <?}else if($rows["status"]==5){?>
							  输一半
								<?}else if($rows["status"]==6){?>
							  进球无效
								<?}else if($rows["status"]==7){?>
							  红卡取消
							  <?}else if($rows["status"]==1){?>
							  赢
							  <?}else if($rows["status"]==2){?>
							  输
							  <?}else if($rows["status"]==8){?>
							  和局
							  <? } ?>
							  <? if($rows["status"]!=0){?>
							 <br/>
							  <a onClick="return confirm('确定重新审核？')" href="javascript:windowopen('qx_bet.php?bid=<?=$rows["id"]?>&amp;status=<?=$rows["status"]?>')">重新审核</a>
							  <?}?>	
                                </td>
                            </tr>
                            <tr >
                                <td colspan="11" style="padding: 0px;"><img style="max-width: 100%;" src="<?=$image_path?>">
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
</div>
</body>
</html>