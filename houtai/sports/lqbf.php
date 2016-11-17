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
$page_date	=	date("m-d");
$page_date2	=	date("Y-m-d");
$look=$_GET["look"];
if(isset($_GET["date"])){
	$page_date	=	$_GET["date"];
	$page_date2	=	date("Y-").$_GET["date"];
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>篮球比分</title>
<meta http-equiv="Cache-Control" content="max-age=8640000" />
<link rel="stylesheet" href="../images/control_main.css" type="text/css">
<style type="text/css">
<!--
body {
	FONT-SIZE: 12px;
	margin-left: 4px;
	margin-top: 0px;
	margin-right: 0px;
	PADDING-RIGHT: 0px; PADDING-LEFT: 0px; SCROLLBAR-FACE-COLOR: #59D6FF; PADDING-BOTTOM: 0px; SCROLLBAR-HIGHLIGHT-COLOR: #ffffff; SCROLLBAR-SHADOW-COLOR: #ffffff; SCROLLBAR-3DLIGHT-COLOR: #007BC6; SCROLLBAR-DARKSHADOW-COLOR: #007BC6; SCROLLBAR-ARROW-COLOR: #007BC6; PADDING-TOP: 0px; SCROLLBAR-TRACK-COLOR: #009ED2;
}
.STYLE3 {color: #FF0000; font-weight: bold; }
.STYLE4 {
	color: #FF0000;
	font-size: 12px;
}
-->
</style>
<script type="text/javascript" charset="utf-8" src="../js/jquery-1.7.2.min.js" ></script>
<script language="javascript">
function gopage(url){
	location.href = url;
}

function check(){
    var len = document.form1.elements.length;
	var num = false;
    for(var i=0;i<len;i++){
		var e = document.form1.elements[i];
        if(e.checked && e.name=='mid[]'){
			num = true;
			break;
		}
    }
	if(num){
		var action = $("#s_action").val();
		if(action=="0"){
			alert("请您选择要执行的相关操作！");
			return false;
		}else{
			if(action=="2") document.form1.action="ft_list.php?type=lq_match&php=lqbf";
			if(action=="4") document.form1.action="ft_nullity.php?type=lq_match&php=lqbf";
		}
	}else{
        alert("您未选中任何复选框");
        return false;
    }
}

function ckall(){
    for (var i=0;i<document.form1.elements.length;i++){
	    var e = document.form1.elements[i];
		if (e.name != 'checkall') e.checked = document.form1.checkall.checked;
	}
}

function zqlrbf(zqmid,fid){
	var md = "<?=$page_date?>";
	var a = "mi"+zqmid;
	var b = "ti"+zqmid;
	var m = $("#"+a).val();
	var t = $("#"+b).val();
	
	if(m.length>0 && t.length>0){
		$.post(
			"lqlr.php",
			{r:Math.random(),value:m+"|||"+t+"|||"+md+"|||"+zqmid},
			function(date){
				var date1	=	Array();
				date1		=	date.split(",");
				if(date1[0]==3){
					alert("系统没有查找到您要结算的赛事！")
				}else if(date1[0]==1){
					ftbf(m,t,fid,date1[1],date1[2]);
				}
			}
		);
	}
}

function ftbf(m,t,d,mb,tg){
	var mid		=	document.getElementsByName("mi"+d);
	var tid		=	document.getElementsByName("ti"+d);
	var mb_s	=	document.getElementsByName("div"+d+mb);
	var tg_s	=	document.getElementsByName("div"+d+tg);
	for(var i=0; i<mid.length; i++){
		mid[i].value		=	m;
		tid[i].value		=	t;
		mb_s[i].innerHTML	=	m;
		tg_s[i].innerHTML	=	t;
	}
}
</script>
</head>
<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" vlink="#0000FF" alink="#0000FF">
<form id="form1" name="form1" method="post" action="ft_list.php" onSubmit="return check();">
  <table width="1000" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="200" height="24">选择日期：
          <select id="DropDownList1" onChange="javascript:gopage(this.value)" name="DropDownList1"><?php
for ($i=0;$i<=10;$i++){
	$s		=	strtotime("-$i day");
	$date	=	date("m-d",$s);
?>
        <option value="<?=$_SERVER['PHP_SELF']?>?date=<?=$date?>" <?=$page_date==$date ? 'selected' : ''?>><?=$date?></option>
<?php
}
?>
      </select></td>
        <td width="200"><a href="lqbf_yjs.php?date=<?=$page_date?>" style="font-size:13px;">&gt;&gt;进入已结算</a></td>
        <td width="200" align="center"><label>
          <input type="button" name="Submit" value="刷新篮球" onClick="window.location.reload();">
        </label></td>
		<td width="200"><a href="lqbf.php?date=<?=$page_date?>&look=1" style="font-size:13px;">&gt;&gt;只看有下注的赛事</a></td>
        <td width="300" align="right"><span class="STYLE4">相关操作：</span>
   <select name="s_action" id="s_action">
        <option value="0" selected="selected">选择确认</option>
        <option value="2">结算赛事</option>
        <option value="4" style="color:#FF0000;">设为无效</option>
      </select>
      <input type="submit" name="Submit2" value="执行"/></td>
      </tr>
</table>
  <table width="1000"   height="41" border="0" cellpadding="0" cellspacing="1"  bgcolor="006255" >
    <tr class="m_title_ft"> 
      <td width="160" height="24" align="middle"><?=$page_date?></td>
      <td align="middle" width="50">时间</td>
      <td align="middle" width="160">主场队伍</td>
      <td align="middle" width="45">全场分</td>
      <td align="middle" width="160">客场队伍</td>
	  <td align="middle" width="50">单式注单数</td>
	  <td align="middle" width="50">串关注单数</td>
      <td align="middle" width="40">第一节</td>
      <td align="middle" width="40">第二节</td>
      <td align="middle" width="40">第三节</td>
      <td align="middle" width="40">第四节</td>
      <td align="middle" width="40">上半场</td>
      <td align="middle" width="40">下半场</td>
      <td align="middle" width="40">加时</td>
      <td width="100" align="middle">结算比分</td>
      <td align="middle" width="30"><input name="checkall" type="checkbox" id="checkall" onClick="return ckall();"/></td>
    </tr>
	<?php
	$sql		=	"select   Match_ID, Match_Date, Match_Time, Match_Master, Match_Guest,Match_MasterID,Match_GuestID,Match_Name,MB_Inball_1st,TG_Inball_1st,MB_Inball_2st,TG_Inball_2st,MB_Inball_3st,TG_Inball_3st,MB_Inball_4st,TG_Inball_4st,MB_Inball_HR,	TG_Inball_HR,MB_Inball_ER,TG_Inball_ER,MB_Inball,TG_Inball,MB_Inball_Add,TG_Inball_Add ,MB_Inball_OK,TG_Inball_OK,match_js from  lq_match where  match_js=0 and (match_Date='$page_date' or match_date='$page_date2') order by  Match_CoverDate,match_name,Match_Master,iPage,iSn desc";
	$query		=	$mysqli->query($sql);
	$arr_bet	=	array();
	while($rows	=	$query->fetch_array()){
		$ftid	=	$rows["Match_ID"];
		$bool	=	true;
		$cou=0;
        $cou_cg=0;
				$bet_sql="select count(id) as c from k_bet where match_id='".$rows["Match_ID"]."'";
				$bet_query	=	$mysqli->query($bet_sql);
				if($bet_query)
				{
					$bet_rows	 =	$bet_query->fetch_array();
					$cou=$bet_rows["c"];
				}
				
				$bet_sql="select count(id) as c from k_bet_cg where match_id='".$rows["Match_ID"]."'";

				$bet_query	=	$mysqli->query($bet_sql);
				if($bet_query)
				{
					$bet_rows	 =	$bet_query->fetch_array();
                    $cou_cg=$bet_rows["c"];
                    if($cou_cg>0){
                        $gid_group = "";
                        $sql_gid="select gid from k_bet_cg where match_id='".$rows["Match_ID"]."'";
                        $query_gid	=	$mysqli->query($sql_gid);
                        while($row = $query_gid->fetch_array()){
                            $gid_group .= $row["gid"].',';

                        }
                        $gid_group	=	rtrim($gid_group,',');
                    }else{
                        $gid_group = "";
                    }
				}
				

				if($look=="1")
				{
					if(($cou+$cou_cg)==0)
						   continue;
				}
		foreach($arr_bet as $k=>$arr){
			if(in_array(array($rows['Match_Name'],$rows['Match_Master'],$rows['Match_Guest']),$arr)){
				$ftid	=	$arr['Match_ID'];
				$bool	=	false;
				break;
			}
		}
		if($bool){
			array_unshift($arr_bet,array(array($rows['Match_Name'],$rows['Match_Master'],$rows['Match_Guest']),'Match_ID'=>$rows['Match_ID']));
		}
	?>
	    <tr class="m_cen" align="center" onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#FFFFFF'"> 
      <td width="160" height="18" align="middle"><?=$rows["Match_ID"]?>
        <br/>
        <?=$rows["Match_Name"]?></td>
      <td align="middle" width="50"><?=$rows["Match_Time"]?></td>
      <td align="left" width="160"><?=$rows["Match_Master"]?></td>
      <td align="middle" width="45"><span name="div<?=$ftid?>MB_Inball" id="div<?=$rows["Match_ID"]?>MB_Inball"><?=$rows["MB_Inball"]?></span>
        <br />
        <span name="div<?=$ftid?>TG_Inball" id="div<?=$rows["Match_ID"]?>TG_Inball"><?=$rows["TG_Inball"]?></span></td>
      <td align="left" width="160"><?=$rows["Match_Guest"]?></td>
	  <td width="50"><div align="left" style="padding-left:5px;"><?if($cou>0){?><a href="orderlist.php?status=all&type=篮球&match_id=<?=$rows["Match_ID"]?>&s_time=<?=date('Y-m-d',strtotime('-13 day'))?>"><?=$cou?></a><?}else{echo '0';}?></div></td>
	  <td width="50"><div align="left" style="padding-left:5px;"><?if($cou_cg>0){?><a href="cg_list.php?status=all&type=篮球&gid_group=<?=$gid_group?>&s_time=<?=date('Y-m-d',strtotime('-13 day'))?>"><?=$cou_cg?></a><?}else{echo '0';}?></div></td>
      <td align="middle" width="40"><span name="div<?=$ftid?>MB_Inball_1st" id="div<?=$rows["Match_ID"]?>MB_Inball_1st"><?=$rows["MB_Inball_1st"]?></span>
        <br />
        <span name="div<?=$ftid?>TG_Inball_1st" id="div<?=$rows["Match_ID"]?>TG_Inball_1st"><?=$rows["TG_Inball_1st"]?></span></td>
      <td align="middle" width="40"><span name="div<?=$ftid?>MB_Inball_2st" id="div<?=$rows["Match_ID"]?>MB_Inball_2st"><?=$rows["MB_Inball_2st"]?></span>
        <br />
        <span name="div<?=$ftid?>TG_Inball_2st" id="div<?=$rows["Match_ID"]?>TG_Inball_2st"><?=$rows["TG_Inball_2st"]?></span></td>
      <td align="middle" width="40"><span name="div<?=$ftid?>MB_Inball_3st" id="div<?=$rows["Match_ID"]?>MB_Inball_3st"><?=$rows["MB_Inball_3st"]?></span>
        <br />
        <span name="div<?=$ftid?>TG_Inball_3st" id="div<?=$rows["Match_ID"]?>TG_Inball_3st"><?=$rows["TG_Inball_3st"]?></span></td>
      <td align="middle" width="40"><span name="div<?=$ftid?>MB_Inball_4st" id="div<?=$rows["Match_ID"]?>MB_Inball_4st"><?=$rows["MB_Inball_4st"]?></span>
        <br />
        <span name="div<?=$ftid?>TG_Inball_4st" id="div<?=$rows["Match_ID"]?>TG_Inball_4st"><?=$rows["TG_Inball_4st"]?></span></td>
      <td align="middle" width="40"><span name="div<?=$ftid?>MB_Inball_HR" id="div<?=$rows["Match_ID"]?>MB_Inball_HR"><?=$rows["MB_Inball_HR"]?></span>
        <br />
        <span name="div<?=$ftid?>TG_Inball_HR" id="div<?=$rows["Match_ID"]?>TG_Inball_HR"><?=$rows["TG_Inball_HR"]?></span></td>
      <td align="middle" width="40"><span name="div<?=$ftid?>MB_Inball_ER" id="div<?=$rows["Match_ID"]?>MB_Inball_ER"><?=$rows["MB_Inball_ER"]?></span>
        <br />
        <span name="div<?=$ftid?>TG_Inball_ER" id="div<?=$rows["Match_ID"]?>TG_Inball_ER"><?=$rows["TG_Inball_ER"]?></span></td>
      <td align="middle" width="40"><span name="div<?=$ftid?>MB_Inball_Add" id="div<?=$rows["Match_ID"]?>MB_Inball_Add"><? if ($rows["MB_Inball_Add"]>0) echo $rows["MB_Inball_Add"]; ?></span>
        <br />
        <span name="div<?=$ftid?>TG_Inball_Add" id="div<?=$rows["Match_ID"]?>TG_Inball_Add"><? if ($rows["TG_Inball_Add"]>0) echo $rows["TG_Inball_Add"];?></span></td>
      <td align="middle"><input name="mi<?=$ftid?>" type="text" class="zqinput" id="mi<?=$rows["Match_ID"]?>" onChange="zqlrbf(<?=$rows["Match_ID"]?>,<?=$ftid?>)" value="<?=$rows["MB_Inball_OK"]?>" style="width:40px; text-align:center;" maxlength="3" />
       &nbsp;&nbsp;
      <input name="ti<?=$ftid?>" type="text" class="zqinput"  id="ti<?=$rows["Match_ID"]?>" onChange="zqlrbf(<?=$rows["Match_ID"]?>,<?=$ftid?>)" value="<?=$rows["TG_Inball_OK"]?>" style="width:40px; text-align:center;" maxlength="3" /></td>
      <td align="middle" width="30"><input name="mid[]" type="checkbox" id="mid[]" value="<?=$rows["Match_ID"]?>" onClick="zqlrbf(<?=$rows["Match_ID"]?>,<?=$ftid?>)" /></td>
    </tr>
<?php
	}
	unset($arr_bet);
?>
</table>
</form>
</body>
</html>