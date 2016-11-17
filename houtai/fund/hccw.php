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
include_once("../class/admin.php");
include_once($C_Patch."/include/newpage.php");
include_once($C_Patch."/app/member/class/user.php");

check_quanxian("财务审核");

function getstatus($status){
   $return=$status;
//   switch ($status){
//   	case 0:$return="失败";break;
//   	case 1:$return="成功";break;
//   	case 2:$return="待处理";break;
//   	default:break;
//   }
   return $return;
}

function getstatus2($status){
   $return=$status;
//   switch ($status){
//   	case 2:$return="失败";break;
//   	case 1:$return="成功";break;
//   	case 0:$return="待处理";break;
//   	default:break;
//   }
   return $return;
}

if($_GET["time_start"]){
    $time_start = $_GET["time_start"];
}else{
    $time_start = date('Y-m-d',strtotime('-6 day'));
}

if($_GET["time_end"]){
    $time_end = $_GET["time_end"];
}else{
    $time_end = date('Y-m-d');
}

if(!$_GET['status']){
    $_GET['status']="成功";
}
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>财务核查</TITLE>
<link href="../images/css1/css.css" rel="stylesheet" type="text/css">
<style type="text/css">
.STYLE2 {font-size: 12px}
body {
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
<script>

    Date.prototype.addDays = function(d){
        this.setDate(this.getDate() + d);
    };

    Date.prototype.Format = function (fmt) { //author: meizz
        var o = {
            "M+": this.getMonth() + 1, //月份
            "d+": this.getDate(), //日
            "h+": this.getHours(), //小时
            "m+": this.getMinutes(), //分
            "s+": this.getSeconds(), //秒
            "q+": Math.floor((this.getMonth() + 3) / 3), //季度
            "S": this.getMilliseconds() //毫秒
        };
        if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
        for (var k in o)
            if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
        return fmt;
    };

    function cleanAll(){
        setDate();
    }

    function setDate(){
        var dateNow= new Date();
        var dateStart;
        var dateEnd;
        dateEnd = dateNow.Format("yyyy-MM-dd");
        dateNow.addDays(-365);
        dateStart = dateNow.Format("yyyy-MM-dd");
        $("#time_start").val(dateStart);
        $("#time_end").val(dateEnd);
        $("#status").val("所有状态");
    }

</script>
</HEAD>

<body>
<script language="JavaScript" src="../../js/calendar.js"></script>
<script language="JavaScript" src="../../js/jquery-1.7.1.js"></script>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap background="../images/06.gif"><font ><span class="STYLE2">财务核查</span></font></td>
  </tr>
  <tr>
    <td height="24" align="center" nowrap bgcolor="#FFFFFF">
	 <table width="100%">
     <form name="form1" method="GET" action="hccw.php" >
      <tr>
        <td width="176">状态：
            <select name="status" id="status">
                <option value="成功" <?=$_GET['status']=="成功" ? 'selected' : ''?>>成功</option>
                <option value="失败" <?=$_GET['status']=="失败" ? 'selected' : ''?>>失败</option>
                <option value="未结算" <?=$_GET['status']=="未结算" ? 'selected' : ''?>>未结算</option>
                <option value="所有状态" <?=$_GET['status']=="所有状态" ? 'selected' : ''?>>所有状态</option>
            </select>
        </td>
        <td width="320">日期：
            <input name="time_start" type="text" id="time_start" value="<?=$time_start?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
            ~
            <input name="time_end" type="text" id="time_end" value="<?=$time_end?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />

          <td width="254">会员名称：
          <input name="username" type="text" id="username" value="<?=@$_GET['username']?>" size="20" maxlength="20"/></td>
        <td width="50"><input name="find" type="submit" id="find" value="查找"/></td>
        <td width="250"><input name="find" onclick="cleanAll()" type="submit" id="find" value="查看全部"/></td>
        <td width="154" align="center"><a href="../hygl/lsyhxx.php?action=1&username=<?=$_GET['username']?>" target="_blank">历史银行卡信息</a></td>
      </tr>
	</form>
    </table></td>
  </tr>
</table>
<br>

<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap bgcolor="#FFFFFF">
    
<table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >
      <tr bgcolor="efe" class="t-title" align="center">
        <td width="10%" height="24" ><strong>编号</strong></td>
        <td width="10%" ><strong>类型</strong></td>
        <td width="30%" ><strong>系统订单号</strong></td>
        <td width="10%" ><strong>汇款银行</strong></td>
        <td width="25%"><strong>金额</strong></td>
        <td width="15%" ><strong>提交时间</strong></td>
        </tr>
<?php
$arr_m		=	array();
if(true){
	$arr		=	array();
	
	$arr_m[1]	=	0;
	$arr_m[2]	=	0;
	$arr_m[3]	=	0;
	$sql		=	"select m.id,m.status,m.order_value,m.order_num,m.update_time,m.about,m.id,m.assets,m.balance,m.type from money m left join user_list u on m.user_id=u.user_id where (m.type='在线支付' or m.type='用户提款' or m.type='后台充值' or m.type='后台扣款')"; //所有该会员的存款取款记录
    if($time_start){
        $stime	 =	$time_start.' 00:00:00';
        $sql	.=	" and m.update_time>='$stime' ";
    }
    if($time_end){
        $etime	 =	$time_end.' 23:59:59';
        $sql	.=	" and m.update_time<='$etime' ";
    }
	if($_GET['username']) $sql .= " and u.user_name='".$_GET['username']."'";
	if($_GET['status']!="所有状态") $sql .= " and m.`status`='".$_GET['status']."'";
    
    $sql.=" and m.deleted=0";  //0422

	$query	=	$mysqli->query($sql);
    $online_money = 0;
    $backend_money = 0;
    $qk_money = 0;
    $qk_admin_money = 0;
	while($row = $query->fetch_array()){
		$time	=	strtotime($row['update_time']).$row['id'];
        $money_type = "";
		if($row['order_value'] > 0){ //存款
            if($row['type']=="后台充值"){
                $money_type = "后台充值";
                if($row['status']=="成功"){
                    $backend_money += $row['order_value'];
                }
            }else{
                $money_type = "存款";
                if($row['status']=="成功"){
                    $online_money += $row['order_value'];
                }
            }
			$arr[$time]['type']		=	'<span style="color:#006600;">'.$money_type.'</span>('.getstatus($row['status']).')';
			$arr[$time]['money']	=	$row['order_value'];
			$arr_m[1]				+=	$row['order_value'];
		}else{
            if($row['type']=="后台扣款"){
                $money_type = "后台扣款";
                if($row['status']=="成功"){
                    $qk_admin_money += abs($row['order_value']);
                }
            }else{
                $money_type = "取款";
                if($row['status']=="成功"){
                    $qk_money += abs($row['order_value']);
                }
            }
			$arr[$time]['type']		=	'<span style="color:#FF0000;">'.$money_type.'</span>('.getstatus($row['status']).')';
			if($row['status']=="成功"){
			    $arr_m[2]				+=	abs($row['order_value']);
			}
            $arr[$time]['money']	=	abs($row['order_value']);
		}
		$arr[$time]['time'] 	=	$row['update_time'];
		$arr[$time]['lsh'] 		=	$row['order_num'];
		$arr[$time]['uid'] 		=	$row['user_id'];
		$arr[$time]['about'] 	=	$row['about'];
		$arr[$time]['assets'] 	=	$row['assets'];
		$arr[$time]['balance'] 	=	$row['balance'];
		$arr[$time]['url'] 		=	'tixian_show.php?id='.$row['id'];
	}
	$sql	=	"select m.id,m.status,m.order_value,m.order_num,m.update_time,m.id,m.assets,m.balance,m.pay_card from money m left join user_list u on m.user_id=u.user_id where type='银行汇款'"; //所有该会员的存款取款记录
    if($time_start){
        $stime	 =	$time_start.' 00:00:00';
        $sql	.=	" and m.update_time>='$stime' ";
    }
    if($time_end){
        $etime	 =	$time_end.' 23:59:59';
        $sql	.=	" and m.update_time<='$etime' ";
    }
    if($_GET['username']) $sql .= " and u.user_name='".$_GET['username']."'";
    if($_GET['status']!="所有状态") $sql .= " and m.`status`='".$_GET['status']."'";
     $sql.=" and m.deleted=0";  //0422
    
	$query	=	$mysqli->query($sql);
	while($row = $query->fetch_array()){
		$time	=	strtotime($row['update_time']).$row['id'];
		$arr[$time]['type']		=	'<span style="color:#FF9900;">汇款</span>('.getstatus2($row['status']).')';

		if($row['status']=="成功")
		{
			$arr_m[3]				+=	$row['order_value'];
		}

        $arr[$time]['money']	=	$row['order_value'];
		$arr[$time]['time'] 	=	$row['update_time'];
		$arr[$time]['lsh'] 		=	$row['order_num'];
		$arr[$time]['bank'] 	=	$row['pay_card'];
		$arr[$time]['assets'] 	=	$row['assets'];
		$arr[$time]['balance'] 	=	$row['balance'];
		$arr[$time]['url'] 		=	'hk_look.php?id='.$row['id'];
	}
	krsort($arr);
	$i	=	1;
	foreach($arr as $k=>$v){
?>
      <tr align="center" onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#ffffff'" >
        <td  height="35" align="center" ><?=$i++?></td>
        <td><?=$v["type"]?></td>
        <td><a href="<?=$v["url"]?>"><?=$v["lsh"]?></a><?php
		if($v["about"]) echo '<br/>'.'<span style="color:#FF0000;">'.$v["about"].'</span>';
		?></td>
        <td><?=$v["bank"]?></td>
        <td>
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="33%" style="color:#999999;"><?=$v["assets"]?></td>
              <td width="34%" align="center" style="color:#225d9c;"><?=$v["money"]?></td>
              <td width="33%" align="right" style="color:#999999;"><?=$v["balance"]?></td>
            </tr>
          </table>          </td>
        <td><?=$v["time"]?></td>
        </tr>
      <?
	}
}
      ?>
    </table></td>
  </tr>
  <tr>
    <td>总金额：<span style="color:#0000FF"><?=array_sum($arr_m)?></span>，存款(在线+后台)：<span style="color:#006600;"><?=$arr_m[1]?><?echo "($online_money+$backend_money)"?></span>，取款(在线+后台)：<span style="color:#FF0000;"><?=$arr_m[2]?><?echo "($qk_money+$qk_admin_money)";?></span>，汇款：<span style="color:#CC9900;"><?=$arr_m[3]?></span></td>
  </tr>
</table>
</body>
</html>