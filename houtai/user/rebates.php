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
include_once($C_Patch."/include/newpage.php");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";
check_quanxian("查看会员信息");


echo '暂时未开放';
exit;

$yf	=	'';
if($_REQUEST['yf']) $yf	=	$_REQUEST['yf'];
else $yf	=	date("Y-m",time());

function get_bl($money){
    $money	=	0-$money;
    if($money<80000){
        return 0;
    }elseif($money>=80000 && $money<150000){
        return 0.09;
    }elseif($money>=150000 && $money<300000){
        return 0.13;
    }elseif($money>=300000 && $money<600000){
        return 0.16;
    }elseif($money>=600000){
        return 0.22;
    }
}
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>会员返利</title>
    <link href="../images/css1/css.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        {
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
    </STYLE>
</head>
<script>
    function chack_all(){
        document.getElementById("username").value = "所有会员";
    }
</script>
<body>
<br/>
<form id="form1" name="form1" method="post" action="?action=1">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;请输入会员名称：
    <label>
        <input name="username" type="text" id="username" value="<?=@$_REQUEST['username']?>" size="20" maxlength="20" />
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <label>
        <input type="submit" name="Submit" value="查询" />
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>
        <input type="submit" name="Submit2" value="查询所有符合条件的会员" onclick="chack_all()" />
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;月份：
    <label>
        <input name="yf" type="text" id="yf" size="10" maxlength="10" value="<?=$yf?>" />
    </label>
</form>
<br/>
<?php
if($_REQUEST['action'] && $_REQUEST['username']){
    $un		=	$_REQUEST['username'];
    $s_time	=	$yf.'-01 00:00:00'; //时间为 1~25
    $e_time	=	$yf.'-25 23:59:59';
    ?>
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999">
    <tr>
        <td width="24%" align="center" bgcolor="#FFFFFF"><strong>会员名称</strong></td>
        <td width="25%" align="center" bgcolor="#FFFFFF"><strong>净亏金额</strong></td>
        <td width="12%" align="center" bgcolor="#FFFFFF"><strong>交易场数</strong></td>
        <td width="12%" align="center" bgcolor="#FFFFFF"><strong>返利比例</strong></td>
        <td width="18%" align="center" bgcolor="#FFFFFF"><strong>返利金额</strong></td>
        <td width="9%" align="center" bgcolor="#FFFFFF"><strong>操作</strong></td>
    </tr>
    <?php
    if($un == '所有会员' && ((date("d",time())>25) || $yf != date('Y-m'))){ //本月日期要>25号，其它月不限
        $arr	=	array(); //记录总数组
        $yfl_uid=	''; //已返利会员id

        $sql	=	"select h.jkje,h.jyzs,h.flbl,h.flje,h.id,h.uid,u.username from k_hyfl h,k_user u where h.uid=u.uid and h.month='$yf'"; //取出所有本月已返利用户
        $query	=	$mysqli->query($sql);
        while($row = $query->fetch_array()){
            ?>
            <tr align="center" onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#ffffff'" bgcolor="#FFFFFF">
                <td align="center"><a href="user_show.php?id=<?=$row['uid']?>"><?=$row['username']?></a></td>
                <td align="center"><?=$row['jkje']?></td>
                <td align="center"><?=$row['jyzs']?></td>
                <td align="center"><?=$row['flbl']*100 ?>%</td>
                <td align="center"><?=$row['flje']?></td>
                <td align="center"><a onclick="return confirm('确定重新返 <?=$row['uid']?> 的 <?=$yf?> 利？');" href="hyflDao.php?action=2&id=<?=$row['id']?>&uid=<?=$row['uid']?>&yf=<?=$yf?>">重新返利</a></td>
            </tr>
            <?php
            $yfl_uid	.=	$row['uid'].',';
        }
        $yfl_uid=	rtrim($yfl_uid,',');
        $where	=	'';
        if($yfl_uid) $where	=	" and uid not in($yfl_uid)";

        $sql	=	"select uid,bet_money,`status`,win,match_id,fs from k_bet where match_coverdate>='$s_time' and match_coverdate<='$e_time' and `status` in(1,2,4,5)".$where; //取出该用户单式交易总数
        $query	=	$mysqli->query($sql);
        while($row = $query->fetch_array()){
            $arr[$row['uid']]['um']	-=	$row['bet_money']; //无论结果，都先减去用户 交易金额
            $arr[$row['uid']]['um']	+=	$row['win']+$row['fs'];
            if(!in_array($row['match_id'],$arr[$row['uid']]['match_id'])){
                $arr[$row['uid']]['match_id'][]	=	$row['match_id'];
                $arr[$row['uid']]['jyzs']++;
            }
        }

        $sql	=	"select uid,bet_money,win,fs from k_bet_cg_group where match_coverdate>='$s_time' and match_coverdate<='$e_time' and `status`=1".$where; //取出该用户串关交易总数
        $query	=	$mysqli->query($sql);
        while($row = $query->fetch_array()){
            $arr[$row['uid']]['um']	-=	$row['bet_money']; //无论结果，都先减去用户 交易金额
            $arr[$row['uid']]['um']	+=	$row['win']+$row['fs']; //输赢都有1%退水
            $arr[$row['uid']]['jyzs']++;
        }

        $sql	=	"SELECT uid,zsjr FROM huikuan where `adddate`>='$s_time' and `adddate`<='$e_time' and `status`=1".$where; //取出该用户系统汇款赠送金额
        $query	=	$mysqli->query($sql);
        while($row = $query->fetch_array()){
            $arr[$row['uid']]['um']	+=	$row['zsjr'];
        }

        $sql	=	"SELECT uid,sxf,m_value,about FROM k_money where `m_make_time`>='$s_time' and `m_make_time`<='$e_time' and `status`=1".$where; //取出该用户存款取款手续费
        $query	=	$mysqli->query($sql);
        while($row = $query->fetch_array()){
            $arr[$row['uid']]['um']		+=	$row['sxf'];
            if($row['m_value'] > 0){
                if($row["about"]=='The order system is successful' || $row["about"]=='该订单手工操作成功' || $row["about"]==''){ //会员存款不管
                }else{
                    $arr[$row['uid']]['um']	+=	$row['m_value'];
                }
            }
        }

        $uid	=	'';
        foreach($arr as $k=>$v){
            if(get_bl($v['um'])>0){
                $uid	.=	$k.',';
            }
        }
        $uid = rtrim($uid,',');
        if($uid){
            $sql	=	"select uid,username from k_user where uid in($uid)"; //取出uid
            $query	=	$mysqli->query($sql);
            while($row = $query->fetch_array()){
                $arr[$row['uid']]['username']	=	$row['username'];
            }
            $arr_uid=	array(); //所有符合条件的用户id
            $arr_uid=	explode(',',$uid);
            foreach($arr_uid as $k=>$v){
                $flbl	=	get_bl($arr[$v]['um']);
                ?>
                <form action="hyflDao.php?action=1" method="post">
                    <tr align="center" onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#ffffff'" bgcolor="#FFFFFF">
                        <td align="center"><a href="../user/user_show.php?id=<?=$v?>"><?=$arr[$v]['username']?></a><input name="hf_uid" type="hidden" id="hf_uid" value="<?=$v?>" />
                            <input name="hf_yf" type="hidden" id="hf_yf" value="<?=$yf?>" /></td>
                        <td align="center"><?=$arr[$v]['um']?>
                            <input name="hf_jkje" type="hidden" id="hf_jkje" value="<?=$arr[$v]['um']?>" /></td>
                        <td align="center"><?=$arr[$v]['jyzs']?>
                            <input name="hf_jyzs" type="hidden" id="hf_jyzs" value="<?=$arr[$v]['jyzs']?>" /></td>
                        <td align="center"><?=$flbl*100 ?>%
                            <input name="hf_flbl" type="hidden" id="hf_flbl" value="<?=$flbl?>" /></td>
                        <td align="center"><?=abs($arr[$v]['um']*$flbl)?></td>
                        <td align="center"><input name="fl1" type="submit" id="fl1" value="返利" /></td>
                    </tr>
                </form>
            <?php
            }
        }
    }elseif($un != '所有会员'){
        $uid	=	0; //会员id
        $sql	=	"select user_id from user_list where user_name='$un' limit 0,1"; //取出uid
        $query	=	$mysqli->query($sql);
        if($row = $query->fetch_array()){
            $uid	=	$row['user_id'];
        }

        $sql	=	"select jkje,jyzs,flbl,flje,id from k_hyfl where user_id=$uid and month='$yf' limit 0,1"; //检查该用户是否已返利
        $query	=	$mysqli->query($sql);
        if($row = $query->fetch_array()){
            ?>
            <tr align="center" onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#ffffff'" bgcolor="#FFFFFF">
                <td align="center"><a href="../user/user_show.php?id=<?=$uid?>"><?=$un?></a></td>
                <td align="center"><?=$row['jkje']?></td>
                <td align="center"><?=$row['jyzs']?></td>
                <td align="center"><?=$row['flbl']*100 ?>%</td>
                <td align="center"><?=$row['flje']?></td>
                <td align="center"><a onclick="return confirm('确定重新返 <?=$un?> 的 <?=$yf?> 利？');" href="hyflDao.php?action=2&id=<?=$row['id']?>&uid=<?=$uid?>&yf=<?=$yf?>">重新返利</a></td>
            </tr>
        <?php
        }else{
            $um		=	0; //会员当前金额
            $jyzs	=	0; //交易总数
            $flbl	=	0; //返利比例
            $arr_id	=	array(); //场次id

            $sql	=	"select bet_money,`status`,win,match_id,fs from k_bet where uid='$uid' and match_coverdate>='$s_time' and match_coverdate<='$e_time' and `status` in(1,2,4,5)"; //取出该用户单式交易总数
            $query	=	$mysqli->query($sql);
            while($row = $query->fetch_array()){
                $um	-=	$row['bet_money']; //无论结果，都先减去用户 交易金额
                $um	+=	$row['win']+$row['fs'];
                if(!in_array($row['match_id'],$arr_id)){
                    $arr_id[$row['match_id']]	=	$row['match_id'];
                    $jyzs++;
                }
            }
            $sql	=	"select bet_money,win,fs from k_bet_cg_group where uid='$uid' and match_coverdate>='$s_time' and match_coverdate<='$e_time' and `status`=1"; //取出该用户串关交易总数
            $query	=	$mysqli->query($sql);
            while($row = $query->fetch_array()){
                $um	-=	$row['bet_money']; //无论结果，都先减去用户 交易金额
                $um	+=	$row['win']+$row['fs']; //输赢都有1%退水
                $jyzs++;
            }

            $sql	=	"SELECT zsjr FROM huikuan where `adddate`>='$s_time' and `adddate`<='$e_time' and `status`=1 and uid='$uid'"; //取出该用户系统汇款赠送金额
            $query	=	$mysqli->query($sql);
            while($row = $query->fetch_array()){
                $um	+=	$row['zsjr'];
            }

            $sql	=	"SELECT sxf,m_value,about FROM k_money where `m_make_time`>='$s_time' and `m_make_time`<='$e_time' and `status`=1 and uid='$uid'"; //取出该用户存款取款手续费
            $query	=	$mysqli->query($sql);
            while($row = $query->fetch_array()){
                $um			+=	$row['sxf'];
                if($row['m_value'] > 0){
                    if($row["about"]=='The order system is successful' || $row["about"]=='该订单手工操作成功' || $row["about"]==''){ //会员存款不管
                    }else{
                        $um	+=	$row['m_value'];
                    }
                }
            }

            $flbl	=	get_bl($um);
            ?>
            <form action="hyflDao.php?action=1" method="post">
                <tr align="center" onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#ffffff'" bgcolor="#FFFFFF">
                    <td align="center"><a href="../user/user_show.php?id=<?=$uid?>"><?=$un?></a><input name="hf_uid" type="hidden" id="hf_uid" value="<?=$uid?>" />
                        <input name="hf_yf" type="hidden" id="hf_yf" value="<?=$yf?>" /></td>
                    <td align="center"><?=$um?>
                        <input name="hf_jkje" type="hidden" id="hf_jkje" value="<?=$um?>" /></td>
                    <td align="center"><?=$jyzs?>
                        <input name="hf_jyzs" type="hidden" id="hf_jyzs" value="<?=$jyzs?>" /></td>
                    <td align="center"><?=$flbl*100 ?>%
                        <input name="hf_flbl" type="hidden" id="hf_flbl" value="<?=$flbl?>" /></td>
                    <td align="center"><?=abs($um*$flbl)?></td>
                    <td align="center"><?php
                        if($um<0){
                            if(abs($um*$flbl) > 1){
                                if(date("d",time())>25 || $yf!=date('Y-m')){
                                    ?><input name="fl1" type="submit" id="fl1" value="返利" /><?php
                                }else{
                                    echo '日期未到';
                                }
                            }else{
                                echo '数目不够';
                            }
                        }else{
                            echo '会员盈利';
                        }
                        ?></td>
                </tr>
            </form>
        <?php
        }
    }
    ?>
    </table>
<?php
}
?>
</body>
</html>