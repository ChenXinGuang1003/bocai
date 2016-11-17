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
check_quanxian("手工录入体育比分");
include_once("../class/newPage.php");
$look=$_GET["look"];
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>冠军列表</TITLE>
<link href="../Images/css1/css.css" rel="stylesheet" type="text/css">
<script language="javascript">
function go(value)
{
location.href=value;
}
</script>
<style type="text/css">
.STYLE2 {font-size: 12px}
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
    <td height="24" nowrap background="../images/06.gif"><font ><span class="STYLE2">冠军管理：管理冠军栏目情况</span></font></td>
  </tr>
  <tr>
    <td height="24" align="center" nowrap bgcolor="#FFFFFF"><table width="100%">
          <form name="form1" method="get" action="gjbf.php">
      <tr align="center">
        <td width="124">
          <td width="154">日期：
            <input name="date" type="text" id="date" value="<?=@$_GET['date']?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" /></td>
            <td width="246">联赛名：
              <input name="x_title" type="text" id="x_title" size="20" value="<?=@$_GET["x_title"]?>">
              <label></label></td>
            <td width="110"><input type="submit" name="Submit" value="搜索"></td>

			<td width="200"><a href="gjbf.php?1=1&page=<?=$_GET['page']?>&look=1" style="font-size:13px;">&gt;&gt;只看有下注的赛事</a></td>
      </tr>
          </form>
    </table></td>
  </tr>
</table>
<br>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   
  <tr>
    <td height="24" nowrap bgcolor="#FFFFFF"><table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >
      <tr  class="t-title" align="center" >
        <td width="36" ><strong>编号</strong></td>
        <td width="359"><strong>赛事项目名称</strong></td>
        <td width="36" ><strong>数量</strong></td>
        <td width="156" ><strong>封盘时间</strong></td>
        <td width="256" ><strong>比赛结果</strong></td>
        <td width="156" ><strong>添加时间</strong></td>
		<td align="middle" width="50">注单数</td>
        <td width="106" ><strong>操作</strong></td>
        </tr>

<?php
$sql	=	"select t.x_id from t_guanjun t where t.x_id>0";
if($look=="1"){
    $sql	=	"select t.x_id from t_guanjun t,k_bet k where x_id>0 and k.match_id=t.match_id ";
}

$sqlwhere		=	'';

if(@$_GET["x_title"]){
	$sqlwhere	.=	" and t.x_title='".$_GET["x_title"]."'";
}
if(@$_GET['date']){
	$sqlwhere	.=	" and t.match_coverdate like('".$_GET['date']."%')";
}

$sql		.=	$sqlwhere;
$sql		.=	" group by t.x_id order by t.match_coverdate desc,t.x_id desc";

$query		=	$mysqli->query($sql);
$sum		=	$mysqli->affected_rows; //总页数
$thisPage	=	1;
if($_GET['page']){
  $thisPage	=	$_GET['page'];
}
$page		=	new newPage();
$thisPage	=	$page->check_Page($thisPage,$sum,20,40);

$xid		=	'';
$i			=	1; //记录 uid 数
$start		=	($thisPage-1)*20+1;
$end		=	$thisPage*20;
while($row = $query->fetch_array()){
  if($i >= $start && $i <= $end){
	$xid .=	$row['x_id'].',';
  }
  if($i > $end) break;
  $i++;
}
if($xid){
	$xid	=	rtrim($xid,',');
	$sql	=	"select * from t_guanjun left join (select count(*) as num,xid from t_guanjun_team group by xid) as t on t_guanjun.x_id=t.xid where x_id in($xid) order by match_coverdate desc,x_id desc";
    $query	=	$mysqli->query($sql);
	while($rows = $query->fetch_array()){

		$cou=0;
				$bet_sql="select count(id) as c from k_bet where match_id='".$rows["match_id"]."'";
				$bet_query	=	$mysqli->query($bet_sql);
                $bet_rows	 =	$bet_query->fetch_array();
				if($bet_rows){
					$cou=$bet_rows["c"];
				}

				if($look=="1")
				{
					if($cou==0)
						   continue;
				}
      	?>
	        <tr align="center" onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#ffffff'" style="background-color:#FFFFFF;">
	          <td height="40" ><?=$rows["x_id"]?></td>
              <td><strong><?=$rows["match_name"]?></strong>
			  <br/><span style="color:#FF6600"><?=$rows["x_title"]?></span></td>
              <td><?=intval($rows["num"])?></td>
              <td><?=$rows["match_coverdate"]?></td>
              <td><? if($rows["x_result"]=="") echo "暂无结果"; else {?>
			  <font style="color:#FF0000"><?=$rows["x_result"]?></font>
			  <?}?>
			  </td>
              <td><?=$rows["add_time"]?></td>
			  <td width="50"><div align="left" style="padding-left:5px;"><?if($cou>0){?><a href="orderlist.php?status=all&type=冠军&match_id=<?=$rows["match_id"]?>&s_time=<?=date('Y-m-d',strtotime('-365 day'))?>"><?=$cou?></a><?}else{echo '0';}?></div></td>
              <td><a href="set_result.php?id=<?=$rows["x_id"]?>">设置结果</a></td>
        </tr>  	
<?php
	}
}
?>
    </table></td>
  </tr>
  <tr><td ><?=$page->get_htmlPage($_SERVER["REQUEST_URI"]);?></td></tr>
</table>
</body>
</html>