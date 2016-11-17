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

<script language="JavaScript" src="/js/calendar.js"></script>

<script language="javascript">
    function myfun(){
        setInterval(function(){
            $("form[name='form1']").submit();
        },60000);
    }
    window.onload=myfun;//不要括号
</script>

<body>
<div id="pageMain">
    <form name="form1" method="get" action="<?=$_SERVER["REQUEST_URI"]?>">
    <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
            <td valign="top">
                <table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12" style="margin-top:5px;" bgcolor="#798EB9">
                    <tr style="background-color:#3C4D82; color:#FFF">

						<td align="center"><strong>赛事ID/订单号</strong></td>
                        <td align="center"><strong>联赛名</strong></td>
                        <td align="center"><strong>主客队</strong></td>
                        <td align="center"><strong>投注详细信息</strong></td>
						<td align="center"><strong>当前比分</strong></td>
                        <td align="center"><strong>投注金额</strong></td>
                        <td align="center"><strong>反水</strong></td>
                        <td align="center"><strong>可赢</strong></td>
                        <td align="center" style="min-width: 210px;"><strong>投注/开赛时间</strong></td>
                        <td align="center"><strong>投注账号</strong></td>
                        <td height="25" align="center"  style="min-width: 48px;"><strong>操作</strong></td>
                    </tr>
                    <?php
                    include("../../include/pager.class.php");

                    $image_web = sys_config::getImagePath();
					$sql	=	"select k_bet.*,user_list.user_name from k_bet left join user_list on user_list.user_id=k_bet.user_id where lose_ok=0 order by  id  desc ";
					$query	=	$mysqli->query($sql);
					$sum		=	$mysqli->affected_rows; //总页数
					while($rows = $query->fetch_array()) {
						$color	=	"#FFFFFF";
						$over	=	"#EBEBEB";
						$out	=	"#ffffff";
						
						if(($rows["balance"]*1)<0 || round($rows["assets"]-$rows["bet_money"],2) != round($rows["balance"],2)){ //投注后用户余额不能为负数，投注后金额要=投注前金额-投注金额
		  						$over = $out = $color = "#FBA09B";
								}elseif(double_format($rows["bet_money"]*($rows["ben_add"]+$rows["bet_point"])) !== double_format($rows["bet_win"])){
								$over = $out = $color = "#FBA09B";
						  }
                    
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
                   
                            $order_sub_num = $rows['order_num'];
                            $image_path = "http://".$image_web."/".substr($order_sub_num,0,8)."/$order_sub_num.jpg";

                            ?>
                            <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>; line-height:20px;">
                                <td height="25" align="center" valign="middle"><a href="sgjsds.php?status=all&type=<?=$_GET["type"]?>&match_id=<?=$rows["match_id"]?>"><?=$rows['match_id']?></a><br><?=$rows['order_num']?></td>
                                <td align="center" valign="middle"><?=$rows['match_name']?></td>
                                <td align="center" valign="middle"><?=$rows['master_guest']?></td>
                                <td align="center" valign="middle">
                                    [<?=$rows['match_time']?>]<?=$rows['bet_info']?>
                                </td>
								<td align="center" valign="middle">
                                    <?=$rows['match_nowscore']?>
                                </td>
                                <td align="center" valign="middle"><?=$rows['bet_money']?></td>
                                <td align="center" valign="middle"><?=$rows['fs']?></td>
                                <td align="center" valign="middle"><?=$rows['bet_win']?></td>
                                <td align="center" valign="middle">进行时间:<?=$rows['match_time']?><br/>北京时间:<?=$rows['bet_time']?><br/>美东时间:<?=$rows['bet_time_et']?><br/>开赛(美东):<?=$rows['match_endtime']?></td>
                                <td align="center" valign="middle"><?=$rows['assets']?><br/><?=$rows['user_name']?><br/><?=$rows['balance']?></td>
                                <td align="center">
		<a href="set_lose.php?bid=<?=$rows["id"]?>&amp;lose_ok=1">有效</a>
		<br/>
		<a href="set_lose.php?bid=<?=$rows["id"]?>&amp;lose_ok=0&uid=<?=$rows["user_id"]?>&amp;status=6">进球无效</a>
		  <br/>
	    <a href="set_lose.php?bid=<?=$rows["id"]?>&amp;lose_ok=0&uid=<?=$rows["user_id"]?>&amp;status=7">红卡无效</a>
	     <br/>
	    <a href="set_lose.php?bid=<?=$rows["id"]?>&amp;lose_ok=0&uid=<?=$rows["user_id"]?>&amp;status=3">无效</a> 	   
			  </td>
                            </tr>
                            <tr >
                                <td colspan="11" style="padding: 0px;"><img style="max-width: 100%;" src="<?=$image_path?>">
                                </td>
                            </tr>
                        <?php
                        }
                    ?>
                    <tr style="background-color:#FFFFFF;">
                        <td colspan="11" align="center" valign="middle"><?php echo $pageStr;?></td>
                    </tr>

                </table></td>
        </tr>
    </table>
    </form>
</div>
</body>
</html>