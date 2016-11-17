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
$look=$_GET["look"];
$page_date	=	date("m-d");

if(isset($_GET["date"])){
	$page_date	=	$_GET["date"];
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>录入比分</title>
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
			if(action=="2") document.form1.action="ft_list.php?type=other_match&php=qtbf";
			if(action=="4") document.form1.action="ft_nullity.php?type=other_match&php=qtbf";
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
			"wpblr.php",
			{r:Math.random(),value:m+"|||"+t+"|||"+md+"|||"+zqmid+"|||other_match"},
			function(date){
				if(date==3){
					alert("系统没有查找到您要结算的赛事！")
				}else if(date==1){
					ftbf(m,t,fid);
				}
			}
		);
	}
}

function ftbf(m,t,d){
	var mid = document.getElementsByName("mi"+d);
	var tid = document.getElementsByName("ti"+d);
	for(var i=0; i<mid.length; i++){
		mid[i].value = m;
		tid[i].value = t;
	}
}
</script>
</head>
<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" vlink="#0000FF" alink="#0000FF">
<form id="form1" name="form1" method="post" action="ft_list.php" onSubmit="return check();">
    <table width="900" border="0" cellpadding="0" cellspacing="0">
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
        <td width="200"><a href="qtbf_yjs.php?date=<?=$page_date?>" style="font-size:13px;">&gt;&gt;进入已结算</a></td>
        <td width="200" align="center"><label>
          <input type="button" name="Submit" value="刷新其他赛事" onClick="window.location.reload();">
        </label></td>
		<td width="200"><a href="qtbf.php?date=<?=$page_date?>&look=1" style="font-size:13px;">&gt;&gt;只看有下注的赛事</a></td>
        <td width="300" align="right"><span class="STYLE4">相关操作：</span>
   <select name="s_action" id="s_action">
        <option value="0" selected="selected">选择确认</option>
        <option value="2">结算全场</option>
        <option value="4" style="color:#FF0000;">设为无效</option>
      </select>
      <input type="submit" name="Submit2" value="执行"/></td>
      </tr>
    </table>
  <table   border="0" cellspacing="1" cellpadding="0"  bgcolor="006255" width="900" height="41">
    <tr class="m_title_ft"> 
      <td width="200" height="24" align="middle"><?=$page_date?></td>
      <td align="middle" width="50">时间</td>
      <td align="middle" width="256">主场队伍</td>
      <td align="middle" width="100">全场比分</td>
      <td width="257" align="middle">客场队伍</td>
	  <td align="middle" width="50">注单数</td>
      <td align="middle" width="30"><label>
        <input name="checkall" type="checkbox" id="checkall" onClick="return ckall();"/>
      </label></td>
    </tr>
    <?php

	$sql		=	"SELECT ID,Match_ID,Match_Time,Match_Master,Match_Guest,Match_Name,MB_Inball,TG_Inball FROM other_match where match_js=0 and match_date='$page_date' order by Match_CoverDate,match_name,Match_Master desc";
    $query		=	$mysqli->query($sql);
	$arr_bet	=	array();
	while($rows	=	$query->fetch_array()){
		$ftid	=	$rows["Match_ID"];
		$bool	=	true;
		$cou=0;
				$bet_sql="select count(id) as c from k_bet where match_id='".$rows["Match_ID"]."'";
				$bet_query	=	$mysqli->query($bet_sql);
				if($bet_query)
				{
					$bet_rows	 =	$bet_query->fetch_array();
					$cou=$bet_rows["c"];
				}
						
				if($look=="1")
				{
					if($cou==0)
						   continue;
				}
		if(in_array(array($rows['Match_Name'],$rows['Match_Master'],$rows['Match_Guest']),$arr_bet)){
			$ftid	=	$arr_bet['Match_ID'];
			$bool	=	false;
		}
		if($bool){
			$arr_bet	=	array(array($rows['Match_Name'],$rows['Match_Master'],$rows['Match_Guest']),'Match_ID'=>$rows['Match_ID']);
		}
	 ?>
    <tr style="background-color:#ffffff"   align="center" onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#ffffff'"> 
      <td width="200"><?=$rows["Match_ID"]?><br/>
      <?=$rows["Match_Name"]?></td>
      <td width="50"><?=$rows["Match_Time"]?></td>
      <td width="256"><div align="right" style="padding-right:5px;"><?=$rows["Match_Master"]?></div></td>
     <td width="100"><input name="<?="mi".$ftid?>" type="text" class="zqinput" id="mi<?=$rows["Match_ID"]?>" onChange="zqlrbf(<?=$rows["Match_ID"]?>,<?=$ftid?>)" value="<?=$rows["MB_Inball"]?>" style="width:30px; text-align:center;" maxlength="3" />
       &nbsp;&nbsp;
      <input name="<?="ti".$ftid?>" type="text"class="zqinput"  id="ti<?=$rows["Match_ID"]?>" onChange="zqlrbf(<?=$rows["Match_ID"]?>,<?=$ftid?>)" value="<?=$rows["TG_Inball"]?>" style="width:30px; text-align:center;" maxlength="3" /></td>
      <td><div align="left" style="padding-left:5px;"><?=$rows["Match_Guest"]?></div></td>
	  <td width="50"><div align="left" style="padding-left:5px;"><?if($cou>0){?><a href="orderlist.php?status=all&type=其他&match_id=<?=$rows["Match_ID"]?>"><?=$cou?></a><?}else{echo '0';}?></div></td>
      <td width="30"><input name="mid[]" type="checkbox" id="mid[]" value="<?=$rows["Match_ID"]?>" onClick="zqlrbf(<?=$rows["Match_ID"]?>,<?=$ftid?>)" /></td> 
    </tr>
    <?php }?>
</table>
</form>
</body>
</html>