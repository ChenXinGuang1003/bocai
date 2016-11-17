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
include_once($C_Patch."/include/newpage.php");
include_once("../class/admin.php");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

check_quanxian("修改网站信息");


$sql = "DROP TRIGGER BeforeUpdatePayset;";
$mysqli->query($sql);
$sql = "DROP TRIGGER BeforeInsertPayset;";
$mysqli->query($sql);

if(@$_GET["action"]=="save"){
    $sql    =   "insert into pay_set(pay_domain,pay_id,pay_key,pay_type,f_url,money_limits,money_Already,order_id,b_start,money_Lowest,pay_name) values('".htmlEncode($_POST['pay_domain'])."','".htmlEncode($_POST['pay_id'])."','".htmlEncode($_POST['pay_key'])."','".$_POST['pay_type']."','".htmlEncode($_POST['f_url'])."','".$_POST['money_limits']."','".$_POST['money_Already']."','".$_POST['order_id']."','".$_POST['b_start']."','".$_POST['money_Lowest']."','".$_POST['pay_name']."')";
    //echo $sql;exit;
    $mysqli->autocommit(FALSE);
    $mysqli->query("BEGIN"); //事务开始
    try{
        $mysqli->query($sql);
        $q1		=	$mysqli->affected_rows;
        if($q1 == 1){
            $msg = "添加了支付参数配置";
            admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],$msg,session_id(),"",$bj_time_now);
            $mysqli->commit(); //事务提交
        }else{
            $mysqli->rollback(); //数据回滚
        }
    }catch(Exception $e){
        $mysqli->rollback(); //数据回滚
    }

}


if(@$_GET["action"]=="modsave"){
    $sql    =   "update pay_set set pay_domain='".htmlEncode($_POST['pay_domain'])."',pay_id='".htmlEncode($_POST['pay_id'])."',pay_name='".htmlEncode($_POST['pay_name'])."',pay_key='".htmlEncode($_POST['pay_key'])."',pay_type='".htmlEncode($_POST['pay_type'])."',f_url='".htmlEncode($_POST['f_url'])."',money_limits='".htmlEncode($_POST['money_limits'])."',money_Already='".htmlEncode($_POST['money_Already'])."',order_id='".htmlEncode($_POST['order_id'])."',money_Lowest='".htmlEncode($_POST['money_Lowest'])."' where id='".intval($_POST['id'])."'";
    //echo $sql;exit;
    $mysqli->autocommit(FALSE);
    $mysqli->query("BEGIN"); //事务开始
    try{
        $mysqli->query($sql);
        $q1		=	$mysqli->affected_rows;
        if($q1 == 1){
            $msg = "修改了支付参数配置";
            admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],$msg,session_id(),"",$bj_time_now);
            $mysqli->commit(); //事务提交
        }else{
            $mysqli->rollback(); //数据回滚
        }
    }catch(Exception $e){
        $mysqli->rollback(); //数据回滚
    }

}

if(@$_GET["action"]=="del"){
    $sql="delete from pay_set where id='".intval($_GET['id'])."'";
    $mysqli->query($sql);
}

if(@$_GET["action"]=="open"){
    $sql="update pay_set set b_start='0'";
    $mysqli->query($sql);
    $sql="update pay_set set b_start='1' where id='".intval($_GET['id'])."'";
    $mysqli->query($sql);
}


if(@$_GET["action"]=="close"){
    $sql="update pay_set set b_start='0' where id='".intval($_GET['id'])."'";
    $mysqli->query($sql);
}

if(@$_GET["action"]=="clear"){
    $sql="update pay_set set money_Already='0' where id='".intval($_GET['id'])."'";
    $mysqli->query($sql);
}

$sql = "   CREATE TRIGGER `BeforeUpdatePayset` BEFORE update ON `pay_set`
			  FOR EACH ROW BEGIN
				insert into pay_set(id) values (old.id);
			  END;
	    ";
$mysqli->query($sql);
$sql = "   CREATE TRIGGER `BeforeInsertPayset` BEFORE insert ON `pay_set`
			  FOR EACH ROW BEGIN
				insert into pay_set(id) values (null);
			  END;
		";
$mysqli->query($sql);


$sql	=	"select * from pay_set order by order_id asc";

$query	=	$mysqli->query($sql);


?>
<HTML>
<HEAD>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
    <TITLE></TITLE>
    <link href="../images/css1/css.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        body {
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            font-size: 12px;
        }
    </style>
</HEAD>
<body>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
        <td height="24" nowrap background="../images/06.gif"><font style="float:left">&nbsp;<span class="STYLE2">支付管理</span></font><font style="float:right">&nbsp;&nbsp;</font></td>
    </tr>
</table>
<table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >
    <tr style="background-color: #EFE" class="t-title"  align="center">
        <td width="5%" height="20"><strong>排序id</strong></td>
        <td width="10%" height="20"><strong>支付域名</strong></td>
        <td width="10%" height="20"><strong>返回地址</strong></td>
        <td width="10%" height="20"><strong>商户id</strong></td>
        <td width="10%" height="20"><strong>商户账号</strong></td>
        <td width="10%" height="20"><strong>商户密匙</strong></td>
        <td width="5%" height="20"><strong>支付限额</strong></td>
        <td width="5%" height="20"><strong>已支付</strong></td>
        <td width="5%" height="20"><strong>最低充值</strong></td>
        <td width="5%" height="20"><strong>平台</strong></td>
        <td width="10%" height="20"><strong>操作</strong></td>
    </tr>
    <?
    while($row = $query->fetch_array()){
        ?>
        <tr onMouseOver="this.style.backgroundColor='#C0E0F8'" onMouseOut="this.style.backgroundColor='#FFFFFF'" style="background-color:#FFFFFF;">
            <td width="5%" align="center"><?=$row['order_id']?></td>
            <td width="10%" align="center"><?=$row['pay_domain']?></td>
            <td width="10%" align="center"><?=$row['f_url']?></td>
            <td width="10%" align="center"><?=$row['pay_id']?></td>
            <td width="10%" align="center"><?=$row['pay_name']?></td>
            <td width="10%" align="center"><input type="text" value="<?=$row['pay_key']?>" size="20" /></td>
            <td width="5%" align="center"><?=$row['money_limits']?></td>
            <td width="5%" align="center"><?=$row['money_Already']?></td>
            <td width="5%" align="center"><?=$row['money_Lowest']?></td>
            <td width="5%" align="center"><?
                if($row['pay_type']==1)
                {
                    echo "快汇宝2";
                }
                else if($row['pay_type']==6)
                {
                    echo "快汇宝3";
                }
                else if($row['pay_type']==2)
                {
                    echo "易宝";
                }
                else if($row['pay_type']==3)
                {
                    echo "环迅";
                }
                else if($row['pay_type']==4)
                {
                    echo "聚付通";
                }
                else if($row['pay_type']==5)
                {
                    echo "v付通";
                }
                else if($row['pay_type']==7)
                {
                    echo "快捷宝";
                }else if($row['pay_type']==8)
                {
                    echo "宝付";
                }else if($row['pay_type']==9)
                {
                    echo "汇潮";
                }else if($row['pay_type']==10)
                {
                    echo "快银";
                }
                else if($row['pay_type']==11)
                {
                    echo "魔宝";
                }
                else if($row['pay_type']==12)
                {
                    echo "国付宝";
                }
                ?></td>
            <td width="15%" align="center">
                <? if($row['b_start']==0){ ?>
                    <a href="payset.php?action=open&id=<?=$row['id']?>" title="未开启">启用</a>
                <? }else{ ?>
                    <a href="payset.php?action=close&id=<?=$row['id']?>" title="正在使用中"><font color="#FF0000"><b>停用</b></font></a>
                <? } ?>
                &nbsp;|&nbsp;<a href="payset.php?action=mod&id=<?=$row['id']?>">编辑</a>&nbsp;|&nbsp;<a href="payset.php?action=del&id=<?=$row['id']?>">删除</a>&nbsp;|&nbsp;<a href="payset.php?action=clear&id=<?=$row['id']?>">清零</a></td>
        </tr>
        <?
        if(@$_GET["action"]=="mod" && $_GET["id"]==$row['id']){
            $info['order_id']=$row['order_id'];
            $info['pay_domain']=$row['pay_domain'];
            $info['f_url']=$row['f_url'];
            $info['pay_id']=$row['pay_id'];
            $info['pay_name']=$row['pay_name'];
            $info['pay_key']=$row['pay_key'];
            $info['money_limits']=$row['money_limits'];
            $info['money_Already']=$row['money_Already'];
            $info['pay_type']=$row['pay_type'];
            $info['money_Lowest']=$row['money_Lowest'];
        }
    }
    ?>
</table>
<? if(@$_GET["action"]=="mod"){ ?>

    <br/>
    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
        <tr>
            <td height="24" nowrap background="../images/06.gif"><font style="float:left">&nbsp;<span class="STYLE2">修改支付信息</span></font><font style="float:right">&nbsp;&nbsp;</font></td>
        </tr>
    </table>
    <table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >
        <form id="form1" name="form1" method="post" action="payset.php?action=modsave">
            <input type="hidden" name="id" id="id" value="<?=@$_GET["id"] ?>" />
            <tr align="center">
                <td width="13%" align="right" >排序：</td>
                <td width="87%" align="left" ><input name="order_id" type="text" id="order_id" value="<?=$info['order_id']?>" size="10" />数字越小越靠前</td>
            </tr>
            <tr align="center">
                <td width="13%" align="right" >支付域名：</td>
                <td width="87%" align="left" ><input name="pay_domain" type="text" id="pay_domain" value="<?=$info['pay_domain']?>" size="80" />支付域名，只要写域名，不要加http://</td>
            </tr>
            <tr align="center">
                <td width="13%" align="right" >返回地址：</td>
                <td width="87%" align="left" ><input name="f_url" type="text" id="f_url" value="<?=$info['f_url']?>" size="80" />充值成功后返回的地址，完整的URL地址,如http://www.baidu.com/</td>
            </tr>
            <tr align="center">
                <td width="13%" align="right" >商户id：</td>
                <td width="87%" align="left" ><input name="pay_id" type="text" id="pay_id" value="<?=$info['pay_id']?>" size="30" /></td>
            </tr>
            <tr align="center">
                <td width="13%" align="right" >商户账号：</td>
                <td width="87%" align="left" ><input name="pay_name" type="text" id="pay_name" value="<?=$info['pay_name']?>" size="30" /></td>
            </tr>
            <tr align="center">
                <td width="13%" align="right" >密匙：</td>
                <td width="87%" align="left" ><input name="pay_key" type="text" id="pay_key" value="<?=$info['pay_key']?>" size="80" /></td>
            </tr>
            <tr align="center">
                <td width="13%" align="right" >支付限额：</td>
                <td width="87%" align="left" ><input name="money_limits" type="text" id="money_limits" value="<?=$info['money_limits']?>" size="20" />当此帐户充值达到限额时，自动切换到其他帐户(按照排序，由小到大)</td>
            </tr>
            <tr align="center">
                <td width="13%" align="right" >已支付：</td>
                <td width="87%" align="left" ><input name="money_Already" type="text" id="money_Already" value="<?=$info['money_Already']?>" size="20" />当前帐户已支付的金额</td>
            </tr>
            <tr align="center">
                <td width="13%" align="right" >最低充值：</td>
                <td width="87%" align="left" ><input name="money_Lowest" type="text" id="money_Lowest" value="<?=$info['money_Lowest']?>" size="20" />允许用户最低充值限额</td>
            </tr>
            <tr align="center">
                <td width="13%" align="right" >支付平台：</td>
                <td width="87%" align="left" ><select id="pay_type" name="pay_type">
                        <option value="1" <?if($info['pay_type']==1) echo "selected=\"selected\"";?>>快汇宝2</option>
                        <option value="6" <?if($info['pay_type']==6) echo "selected=\"selected\"";?>>快汇宝3</option>
                        <option value="2" <?if($info['pay_type']==2) echo "selected=\"selected\"";?>>易宝</option>
                        <option value="3" <?if($info['pay_type']==3) echo "selected=\"selected\"";?>>环迅</option>
                        <option value="4" <?if($info['pay_type']==4) echo "selected=\"selected\"";?>>聚付通</option>
                        <option value="5" <?if($info['pay_type']==5) echo "selected=\"selected\"";?>>v付通</option>
                        <option value="7" <?if($info['pay_type']==7) echo "selected=\"selected\"";?>>快捷宝</option>
                        <option value="8" <?if($info['pay_type']==8) echo "selected=\"selected\"";?>>宝付</option>
                        <option value="9" <?if($info['pay_type']==9) echo "selected=\"selected\"";?>>汇潮</option>
                        <option value="10" <?if($info['pay_type']==10) echo "selected=\"selected\"";?>>快银</option>
                        <option value="11" <?if($info['pay_type']==11) echo "selected=\"selected\"";?>>魔宝</option>
                        <option value="12" <?if($info['pay_type']==12) echo "selected=\"selected\"";?>>国付宝</option>

                    </select></td>
            </tr>
            <tr align="center">
                <td colspan="2" align="left" >&nbsp;</td>
            </tr>
            <tr align="center">
                <td align="right" >操作：</td>
                <td align="left" ><label>
                        <input type="submit" name="Submit" value="提交" />
                    </label></td>
            </tr>
        </form>
    </table>
<? }else{ ?>
    <br/>
    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
        <tr>
            <td height="24" nowrap background="../images/06.gif"><font style="float:left">&nbsp;<span class="STYLE2">添加支付信息</span></font><font style="float:right">&nbsp;&nbsp;</font></td>
        </tr>
    </table>
    <table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >
        <form id="form1" name="form1" method="post" action="payset.php?action=save">
            <tr align="center">
                <td width="13%" align="right" >排序：</td>
                <td width="87%" align="left" ><input name="order_id" type="text" id="order_id" value="0" size="10" />数字越小越靠前</td>
            </tr>
            <tr align="center">
                <td width="13%" align="right" >支付域名：</td>
                <td width="87%" align="left" ><input name="pay_domain" type="text" id="pay_domain" value="" size="80" />支付域名，只要写域名，不要加http://</td>
            </tr>
            <tr align="center">
                <td width="13%" align="right" >返回地址：</td>
                <td width="87%" align="left" ><input name="f_url" type="text" id="f_url" value="" size="80" />完整的URL地址,如http://www.baidu.com/</td>
            </tr>
            <tr align="center">
                <td width="13%" align="right" >商户id：</td>
                <td width="87%" align="left" ><input name="pay_id" type="text" id="pay_id" value="" size="30" /></td>
            </tr>
            <tr align="center">
                <td width="13%" align="right" >商户账号：</td>
                <td width="87%" align="left" ><input name="pay_name" type="text" id="pay_name" value="<?=$info['pay_name']?>" size="30" /></td>
            </tr>
            <tr align="center">
                <td width="13%" align="right" >密匙：</td>
                <td width="87%" align="left" ><input name="pay_key" type="text" id="pay_key" value="" size="80" /></td>
            </tr>
            <tr align="center">
                <td width="13%" align="right" >支付限额：</td>
                <td width="87%" align="left" ><input name="money_limits" type="text" id="money_limits" value="99999999" size="20" />当此帐户充值达到限额时，自动切换到其他帐户(按照排序，由小到大)</td>
            </tr>
            <tr align="center">
                <td width="13%" align="right" >已支付：</td>
                <td width="87%" align="left" ><input name="money_Already" type="text" id="money_Already" value="0" size="20" />当前帐户已支付的金额</td>
            </tr>
            <tr align="center">
                <td width="13%" align="right" >最低充值：</td>
                <td width="87%" align="left" ><input name="money_Lowest" type="text" id="money_Lowest" value="0" size="20" />允许用户最低充值限额</td>
            </tr>
            <tr align="center">
                <td width="13%" align="right" >支付平台：</td>
                <td width="87%" align="left" ><select id="select" name="pay_type">
                        <option value="1">快汇宝2</option>
                        <option value="6">快汇宝3</option>
                        <option value="2">易宝</option>
                        <option value="3">环迅</option>
                        <option value="4">聚付通</option>
                        <option value="5">v付通</option>
                        <option value="7">快捷宝</option>
                        <option value="8">宝付</option>
                        <option value="9">汇潮</option>
                        <option value="10">快银</option>
                        <option value="11">魔宝</option>
                        <option value="12">国付宝</option>
                    </select></td>
            </tr>
            <tr align="center">
                <td colspan="2" align="left" >&nbsp;</td>
            </tr>
            <tr align="center">
                <td align="right" >操作：</td>
                <td align="left" ><label>
                        <input type="submit" name="Submit" value="提交" />
                    </label></td>
            </tr>
        </form>
    </table>
<? } ?>
</body>
</html>