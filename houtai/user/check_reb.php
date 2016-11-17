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
include_once($C_Patch."/app/member/utils/convert_name.php");
include_once($C_Patch."/include/newpage.php");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";
check_quanxian("查看会员信息");
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
</head>
<link href="../images/css1/css.css" rel="stylesheet" type="text/css">
<style type="text/css">
    <!--
    .STYLE3 {color: #FF0000; font-weight: bold; }
    .STYLE4 {
        color: #FF0000;
        font-size: 12px;
    }
    -->
</style>
<script language="javascript">
    function $_(_sId){
        return document.getElementById(_sId);
    }

    function check(){
        var len = document.form2.elements.length;
        var num = false;
        for(var i=0;i<len;i++){
            var e = document.form2.elements[i];
            if(e.checked && e.name=='id[]'){
                num = true;
                break;
            }
        }
        if(num){
            var action = $_("s_action").value;
            if(action=="0"){
                alert("请您选择要执行的相关操作！");
                return false;
            }else{
                return true;
            }
        }else{
            alert("您未选中任何复选框");
            return false;
        }
    }

    function ckall(){
        for (var i=0;i<document.form2.elements.length;i++){
            var e = document.form2.elements[i];
            if (e.name != 'checkall') e.checked = document.form2.checkall.checked;
        }
    }
</script>
<body>
<form id="form1" name="form1" method="post" action="?action=1" style="margin:0 0 0 0;">
    请输入会员名称：
    <label>
        <input name="username" type="text" id="username" value="<?=$_REQUEST['username']?>" size="20" maxlength="20" />
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <label>
        <input type="submit" name="Submit" value="核查" />
    </label>
</form>
<?php
if($_GET['action']==1){


    $uid	=	0;
    $sql	=	"select user_id,group_id from user_list where user_name='".$_REQUEST['username']."' limit 1";
    $query	=	$mysqli->query($sql);
    $rows	=	$query->fetch_array();
    $uid	=	$rows['user_id'];
    $gid	=	$rows['group_id'];
    if($uid > 0){

        $sql_f	=	"select * from user_group where group_id=$gid";
        $query_f	=	$mysqli->query($sql_f);
        $rows_f	=	$query_f->fetch_array();
        $fsbl=$rows_f["zqfsbl"];//反水比例
        if(!is_numeric($fsbl))$fsbl=0;
        $cpfsbl=$rows_f["cpfsbl"];//反水比例
        if(!is_numeric($cpfsbl))$cpfsbl=0;
        ?>
        <br/>
        <form id="form2" name="form2" method="post" action="check_userfsDao.php?action=xf" onSubmit="return check();">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="right"><span class="STYLE4">
      <input name="username" type="hidden" id="username" value="<?=$_REQUEST['username']?>" />
      相关操作：</span>
                        <select name="s_action" id="s_action">
                            <option value="0" selected="selected">选择确认</option>
                            <option value="1">修复返水</option>
                        </select>
                        <input type="submit" name="Submit2" value="执行"/></td>
                </tr>
            </table>
            <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                <tr>
                    <td width="30%" align="center" bgcolor="#FFFFFF"><strong>注单编号</strong></td>
                    <td width="10%" align="center" bgcolor="#FFFFFF"><strong>注单类型</strong></td>
                    <td width="10%" align="center" bgcolor="#FFFFFF"><strong>结果</strong></td>
                    <td width="15%" align="center" bgcolor="#FFFFFF"><strong>交易金额</strong></td>
                    <td width="15%" align="center" bgcolor="#FFFFFF"><strong>理论返水</strong></td>
                    <td width="15%" align="center" bgcolor="#FFFFFF"><strong>实际返水</strong></td>
                    <td width="5%" align="center" bgcolor="#FFFFFF"><input name="checkall" type="checkbox" id="checkall" onClick="return ckall();"/></td>
                </tr>
                <?php
                $sql			=	"select id,order_num,`status`,fs,bet_money from k_bet where user_id=$uid order by id asc"; //单式
                $query			=	$mysqli->query($sql);
                while($rows		=	$query->fetch_array()){
                    $sjfs		=	$rows['fs'];
                    $llfs		=	0;
                    $jg			=	'';
                    if($rows['status']==1 || $rows['status']==2){ //输赢都退1%
                        $llfs	=	double_format($rows['bet_money']);
                        if($rows['status']==1){
                            $jg	=	'<span style="color:#FF0000;">赢</span>';
                        }else{
                            $jg	=	'<span style="color:#00CC00;">输</span>';
                        }
                    }elseif($rows['status']==4 || $rows['status']==5){ //输一半，赢一半都退0.5%
                        $llfs	=	double_format($rows['fs']/2);
                        if($rows['status']==4){
                            $jg	=	'<span style="color:#FF0000;">赢一半</span>';
                        }else{
                            $jg	=	'<span style="color:#00CC00;">输一半</span>';
                        }
                    }elseif($rows['status']==0){
                        $jg		=	'未结算';
                    }elseif($rows['status']==3){
                        $jg		=	'<span style="color:#0000FF;">无效</span>';
                    }elseif($rows['status']==8){
                        $jg		=	'<span style="color:#0000FF;">和局</span>';
                    }elseif($rows['status']==6){
                        $jg		=	'<span style="color:#0000FF;">进球无效</span>';
                    }elseif($rows['status']==7){
                        $jg		=	'<span style="color:#0000FF;">红卡无效</span>';
                    }

                    $wc			=	abs(double_format($llfs-$sjfs));
                    ?>
                    <tr bgcolor="#FFFFFF" onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#ffffff'">
                        <td align="center"><a href='../zdgl/check_zd.php?action=1&id=<?=$rows['order_num']?>' target='_blank' style='color:#000000;'><?=$rows['order_num']?></a></td>
                        <td align="center">单式</td>
                        <td align="center"><?=$jg?></td>
                        <td align="center"><?=$rows['bet_money']?></td>
                        <td align="center"><?=$llfs?></td>
                        <td align="center" <?=$wc>0 ? 'bgcolor="#FF0000"' : ''?>><?=$sjfs?></td>
                        <td align="center"><?=$wc>0 ? "<input name='id[]' type='checkbox' id='id[]' value='1,".$rows["id"]."' />" : '&nbsp;'?></td>
                    </tr>
                <?php
                }
                $sql		=	"select id,bet_money,`status`,fs from k_bet_cg_group where user_id=$uid";
                $query		=	$mysqli->query($sql);
                while($rows	=	$query->fetch_array()){
                    $sjfs	=	$rows['fs'];
                    $llfs	=	0;
                    $jg		=	'';
                    if($rows['status']==1){ //输赢都退1%
                        $llfs=	double_format($rows['fs']);
                        $jg	=	'<span style="color:#FF0000;">已结算</span>';
                    }elseif($rows['status']==3){
                        $jg	=	'<span style="color:#0000FF;">无效</span>';
                    }else{
                        $jg	=	'未结算';
                    }

                    $wc		=	abs(double_format($llfs-$sjfs));
                    ?>
                    <tr bgcolor="#FFFFFF" onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#ffffff'">
                        <td align="center"><a href='../zdgl/check_zd.php?action=1&id=<?=$rows['id']?>' target='_blank' style='color:#000000;'><?=$rows['id']?></a></td>
                        <td align="center">串关</td>
                        <td align="center"><?=$jg?></td>
                        <td align="center"><?=$rows['bet_money']?></td>
                        <td align="center"><?=$llfs?></td>
                        <td align="center" <?=$wc>0 ? 'bgcolor="#FF0000"' : ''?>><?=$sjfs?></td>
                        <td align="center"><?=$wc>0 ? "<input name='id[]' type='checkbox' id='id[]' value='2,".$rows["id"]."' />" : '&nbsp;'?></td>
                    </tr>
                <?php
                }
                ?>

                <?php
                $sql			=	"select o_sub.id,Gtype,o_sub.is_win,o_sub.status,o_sub.fs,o_sub.bet_money,o_sub.order_sub_num from order_lottery o,order_lottery_sub o_sub  where o.user_id=$uid and o.order_num=o_sub.order_num order by o_sub.id asc"; //彩票
                $query			=	$mysqli->query($sql);
                while($rows		=	$query->fetch_array()){
                    $sjfs		=	$rows['fs'];
                    $llfs		=	0;
                    $jg			=	'';
                    $llfs	=	double_format($rows['fs']);
                    if($rows['status']==1 || $rows['status']==2)
                    {
                        if($rows['is_win']=='1'){
                            $jg	=	'<span style="color:#FF0000;">赢</span>';
                        }elseif($rows['is_win']=='2'){
                            $jg	=	'<span>平</span>';
                        }else{
                            $jg	=	'<span style="color:#00CC00;">输</span>';
                        }
                        $wc			=	abs(double_format($llfs-$sjfs));
                    }else{
                        $jg		=	'未结算';
                        $wc=0;
                    }

                    ?>
                    <tr bgcolor="#FFFFFF" onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#ffffff'">
                        <td align="center"><a href='../lottery/orderlist.php?tf_id=<?=$rows['order_sub_num']?>&js=<?=urldecode('0,1,2,3')?>' target='_blank' style='color:#000000;'><?=$rows['order_sub_num']?></a></td>
                        <td align="center"><?=getZhPageTitle($row["Gtype"])?></td>
                        <td align="center"><?=$jg?></td>
                        <td align="center"><?=$rows['bet_money']?></td>
                        <td align="center"><?=$llfs?></td>
                        <td align="center" <?=$wc>0 ? 'bgcolor="#FF0000"' : ''?>><?=$sjfs?></td>
                        <td align="center"><?=$wc>0 ? "<input name='id[]' type='checkbox' id='id[]' value='3,".$rows["id"]."' />" : '&nbsp;'?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </form>
    <?php
    }
}
?>
</body>
</html>