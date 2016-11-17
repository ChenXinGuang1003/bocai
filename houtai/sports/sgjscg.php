<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");

include_once($C_Patch."/app/member/include/config.inc.php");

include_once($C_Patch."/app/member/common/function.php");

include_once("../class/admin.php");

include_once("../common/login_check.php"); 

include_once($C_Patch."/include/newPage.php");
check_quanxian("手工结算注单");

?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>串关注单列表</TITLE>
<script type="text/javascript" charset="utf-8" src="/js/jquery.js" ></script>
<script language="javascript">
function go(value){
	location.href=value;
}

function windowopen(url){
	window.open(url,"wx","width=300,height=300,left=50,top=100,scrollbars=no"); 
}

function check(){
	if($("#tf_id").val().length > 3){
		$("#status").val("4,0,1,2,3");
	}
	return true;
}
</script>
<style type="text/css">
body {
	FONT-SIZE: 12px;
	margin-left: 4px;
	margin-top: 0px;
	margin-right: 0px;
	PADDING-RIGHT: 0px; PADDING-LEFT: 0px; SCROLLBAR-FACE-COLOR: #59D6FF; PADDING-BOTTOM: 0px; SCROLLBAR-HIGHLIGHT-COLOR: #ffffff; SCROLLBAR-SHADOW-COLOR: #ffffff; SCROLLBAR-3DLIGHT-COLOR: #007BC6; SCROLLBAR-DARKSHADOW-COLOR: #007BC6; SCROLLBAR-ARROW-COLOR: #007BC6; PADDING-TOP: 0px; SCROLLBAR-TRACK-COLOR: #009ED2;
}
td{font:13px/120% "宋体";padding:3px;}
a{
	color:#F37605;
	text-decoration: none;
}
.t-title{background:url(../images/06.gif);height:24px;}
.t-tilte td{font-weight:800;}
</STYLE>
</HEAD>

<body>
<script language="JavaScript" src="../../js/calendar.js"></script>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap background="../images/06.gif"><font >&nbsp;<span class="STYLE2">注单管理：对串关进行结算（所有时间以美国东部标准为准）</span></font></td>
  </tr>
  <tr>
    <td height="24" align="center" nowrap bgcolor="#FFFFFF"><table width="100%">
          <form name="form1" method="get" action="<?=$_SERVER["REQUEST_URI"]?>" onSubmit="return check();">
      <tr align="center">
        <td width="124" align="center">
          <select name="status" id="status">
            <option value="0" style="color:#FF9900;" <?=$_GET['status']=='0' ? 'selected' : ''?>>未结算注单</option>
            <option value="1" style="color:#FF0000;" <?=$_GET['status']=='1' ? 'selected' : ''?>>已赢注单</option>
            <option value="2" style="color:#009900;" <?=$_GET['status']=='2' ? 'selected' : ''?>>已输注单</option>
            <option value="3" style="color:#0000FF;" <?=$_GET['status']=='3' ? 'selected' : ''?>>和局或取消</option>
            <option value="4,0,1,2,3" <?=$_GET['status']=='4,0,1,2,3' ? 'selected' : ''?>>全部注单</option>
          </select></td>
        <td width="124" align="center"><select name="order" id="order">
          <option value="gid" <?=$_GET['order']=='gid' ? 'selected' : ''?>>默认排序</option>
          <option value="bet_money" <?=$_GET['order']=='bet_money' ? 'selected' : ''?>>交易金额</option>
          <option value="win" <?=$_GET['order']=='win' ? 'selected' : ''?>>已赢金额</option>
        </select></td>
        <td width="857" align="left">会员：
          <input name="username" type="text" id="username" value="<?=$_GET['username']?>" size="15">
          &nbsp;&nbsp;&nbsp;&nbsp;日期：
<input name="bet_time" type="text" id="bet_time" value="<?=$_GET['bet_time']?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
&nbsp;&nbsp; 
          注单号：
          <input name="tf_id" type="text" id="tf_id" value="<?=@$_GET['tf_id']?>" size="22">
&nbsp;
<input type="submit" name="Submit" value="搜索">          </td>
      </tr>
          </form>
    </table></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap bgcolor="#FFFFFF"><table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" >
      <tr  class="t-title" align="center" >
        <td width="37"><strong>编号</strong></td>
        <td width="87"><strong>模式</strong></td>
        <td width="596"><strong>结算详细信息</strong></td>
        <td width="76"><strong>下注</strong></td>
        <td width="76"><strong>已赢</strong></td>
        <td width="76"><strong>可赢</strong></td>
        <td width="131"><strong>投注时间</strong></td>
        <td width="146"><strong>操作</strong></td>
      </tr>
<?php
$uid	=	'';
if($_GET['username']){
	$sql		=	"select user_id from user_list where user_name='".$_GET['username']."' limit 1";
	$query		=	$mysqli->query($sql);
	if($rows	=	$query->fetch_array()){
		$uid	=	$rows['user_id'];
	}
}
	  
$sql	=	"SELECT id FROM k_bet_cg_group where id>0";
if(isset($_GET["status"])){
	if($_GET["status"] == 1) $sql.=" and `status`=1 and win>0";
	elseif($_GET["status"] == 2) $sql.=" and `status`=1 and win=0";
	elseif($_GET["status"] == 3) $sql.=" and `status`=3";
	elseif($_GET["status"] == 0) $sql.=" and `status` in (0,2)";
	else $sql.=" and `status` in (".$_GET["status"].")";
}
if($_GET["uid"]) $uid = $_GET["uid"];
if($uid != '') $sql.=" and user_id='".$uid."'";
if($_GET['tf_id']) $sql.=" and id='".$_GET['tf_id']."'";
if($_GET['bet_time']) $sql.=" and bet_time like('".$_GET['bet_time']."%')";
if(isset($_GET['www'])) $sql.=" and www='".$_GET['www']."'";
$order	=	'id';
if(isset($_GET['order'])) $order = $_GET['order'];
$sql.=" order by $order desc";
$query		=	$mysqli->query($sql);
$sum		=	$mysqli->affected_rows; //总页数
$thisPage	=	1;
if($_GET['page']){
  $thisPage	=	$_GET['page'];
}
$page		=	new newPage();
$thisPage	=	$page->check_Page($thisPage,$sum,20,40);

$gid		=	'';
$i			=	1; //记录 bid 数
$start		=	($thisPage-1)*20+1;
$end		=	$thisPage*20;
$yjs		=	array(); //已结算的串关个数
while($row	= $query->fetch_array()){
	if($i >= $start && $i <= $end){
		$yjs[$row['id']]	=	0; //默认一条串关注单都未结算
		$gid .=	$row['id'].',';
	}
	if($i > $end) break;
	$i++;
}
if($gid){
	$gid	=	rtrim($gid,',');
	
	$sql	=	"select gid,count(*) as num from k_bet_cg where status not in(0,3) and gid in ($gid) group by gid"; //取出该串关已结算的注单个数
	$query	=	$mysqli->query($sql);
	while($rows = $query->fetch_array()) {
		$yjs[$rows['gid']]	=	$rows['num']; //统计已结算的个数
	}
	
	$sql	=	"select kg.*,u.user_name from k_bet_cg_group kg,user_list u where kg.user_id=u.user_id and kg.id in ($gid) order by kg.$order desc";
	$query	=	$mysqli->query($sql);	
	$win	=	$bet_money	=	0;
	while($rows = $query->fetch_array()) {
          $bet_money	+=	$rows["bet_money"];
	      $win			+=	$rows["win"];
		  
		  $color		=	"#FFFFFF";
		  $over			=	"#EBEBEB";
		  $out			=	"#ffffff";
		  
		  if(($rows["balance"]*1)<0 || round($rows["assets"]-$rows["bet_money"],2) != round($rows["balance"],2)){
		  		$over = $out = $color = "#FBA09B";
		  }
?>
	        <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>;">
	          <td height="40" align="center" ><a href="check_zd.php?action=1&id=<?=$rows["gid"]?>"><?=$rows["gid"]?></a></td>
              <td align="center"><?=$rows["cg_count"]?>串1</td>
              <td><div><div style="float:left;">已结算：<?=$yjs[$rows["id"]]?>&nbsp;[<a href="sgjcg_zd.php?gid=<?=$rows["id"]?>">详细</a>]</div><div style="float:right;"><span style="color:#999999;"><?=$rows["assets"]?></span>&nbsp;<a href="sgjcg.php?uid=<?=$rows["user_id"]?>"><?=$rows["user_name"]?></a>&nbsp;<span style="color:#999999;"><?=$rows["balance"]?></span></div><div style="float:left; padding-left:10px;"><a href="sgjcg.php?www=<?=$rows['www']?>" style="color:#999999;"><?=$rows['www']?></a></div></div></td>
              <td align="center"><?=$rows["bet_money"]?></td>
	          <td align="center"><?=$rows["win"]>0 ? '<span style="color:#FF0000">'.$rows["win"].'</span>' : $rows["win"]?></td>
	          <td align="center"><?=$rows["bet_win"]?></td>
              <td align="center"><?=date("m-d H:i:s",strtotime($rows["bet_time"]))?></td>
              <td align="center">
			  <? if(($rows["status"]==1 || $rows["status"]==3) && $yjs[$rows["id"]]==$rows["cg_count"]){ ?>
			  已结算<br/>
			  <a onClick="return confirm('所有该串关的注单都需要重新结算，确定要重新结算？')" href="setcg_qx.php?gid=<?=$rows["gid"]?>">重新结算</a>
			  <? }else if($yjs[$rows["id"]]==$rows["cg_count"]){ ?>
			  <a onClick="return confirm('确定结算？')" href="set_cg.php?id=<?=$rows["gid"]?>&ok=1">结算</a>
			  <? }else{ ?>
			  等待单式结算
			  <? } ?>			  </td>
        </tr>	
<?
	}
}
?>
    </table></td>
  </tr>
      <tr>
      <td >
    该页统计:总注金:<?=$bet_money?>，结果:<?=$win?>，盈亏：<span style="color:<?=$bet_money-$win>0 ? '#FF0000' : '#009900'?>;"><?=$bet_money-$win?></span>
  </td>
    </tr>
  <tr><td >
 <?=$page->get_htmlPage($_SERVER["REQUEST_URI"]);?>
  </td></tr>
</table>
</body>
</html>