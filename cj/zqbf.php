<?php
ini_set("display_errors","yes");
include_once("db.php");
include_once("pub_library.php");
include_once("http.class.php");
include_once("mysqli.php");
include_once("function.php");
header("Content-type: text/html; charset=utf-8");
if(intval(date('H'))<12)
{
	$bdate=date("m-d",strtotime("-1 days"));//判断详细时间
    $today = date("Y-m-d",strtotime("-1 days"));//接收日期
}
else
{
	$bdate=date("m-d",strtotime("-0 days"));//判断详细时间
    $today = date("Y-m-d",strtotime("-0 days"));//接收日期
}

//echo $today;exit;

$base_url =  $webdb["datesite"]."app/member/result/result.php?game_type=FT&uid=".$webdb["cookie"]."&langx=zh-cn";
$thisHttp = new cHTTP();
$thisHttp->setReferer($base_url);
$filename = $webdb["datesite"]."app/member/result/result.php?game_type=FT&list_date=".$today."&uid=".$webdb["cookie"]."&langx=zh-cn";
//echo $filename ;
$thisHttp->getPage($filename);
$msg = $thisHttp->getContent();
$msg = strtolower($msg);
$msg=htmlspecialchars($msg);
$msg = str_replace('&quot;','', $msg);
$a=explode('th class=rsu',$msg);
$msg = str_replace('class=vs','', $a[1]);
$b=explode('table--',$msg);
//echo $msg;exit;
//print_r ($a);exit;
$sb=count($b);
//echo $sb;exit;

for ($i=0;$i<=$sb;$i++){
	$c=explode('table border=0 cellpadding=0 cellspacing=0 class=team_main',$b[$i]);
	$sc=count($c);
	for ($ii=0;$ii<=$sc;$ii++){
		//echo $c[$ii].'<br><br><br>';
		$str = str_replace('&gt;','',$c[$ii]);
	    $str = str_replace('&lt;','',$str);
		$str=preg_replace('/rowspan=(\d+)/','',$str);
		$str=preg_replace('/colspan=(\d+)/','',$str);
		$str=preg_replace('/id=s_(\d+)_/','',$str);
		$str=preg_replace('/id=tr_(\d+)_(\d+)_/','',$str);
        $str=preg_replace('/href=javascript: onclick=showresult_new(.*?);/','',$str);
	    $str=preg_replace('/width=(\d+)/','',$str);
		$str=preg_replace('/onclick=showleg\(\'(\d+)\'\);/','',$str);
		$th=array('class','b_hline','span','showleg','id','legopen','leg_bar','leg_bar','b_cen','display','style','time','team','_out_ft','_main','_c_ft','full_title','hr_ft','overflow','hden','hr_title','_h_ft','full_ft','full',':',';','=',' ','&','ampnbsp','-','!','table','\'','/td','/tr','/','vs','tda','hr');
        $str = str_replace($th,'',$str);
	    $str = str_replace('tr','td',$str);
		$d=explode('td',$str);
		if ($d[13]!=''){
		    $match_id=$d[6];
			$match_id =preg_replace("/\s/","",$match_id);
			$mb_inball_hr=trim($d[8]);
			$tg_inball_hr=trim($d[9]);
			$mb_inball=trim($d[12]);
			$tg_inball=trim($d[13]);
			$mb_inball_hr=(is_numeric($mb_inball_hr))?$mb_inball_hr:"-1";
			$tg_inball_hr=(is_numeric($tg_inball_hr))?$tg_inball_hr:"-1";
			$mb_inball=(is_numeric($mb_inball))?$mb_inball:"-1";
			$tg_inball=(is_numeric($tg_inball))?$tg_inball:"-1";
			//echo '<br>比赛ID'.$match_id.'半场比分'.$mb_inball_hr.'比'.$tg_inball_hr.'全场比分'.$mb_inball.'比'.$tg_inball.'<br>';
			$sql="select * from bet_match where  match_id like'$match_id%'  and Match_Date='$bdate'";
			//echo $sql;
			$query	=	$mysqli->query($sql);
			$rows	=	$query->fetch_array();
			$cou    = count($rows);
				if ($cou>0){
				$Match_Name=$rows["Match_Name"];
				$Match_Master=$rows["Match_Master"];
				$Match_Guest=$rows["Match_Guest"];
				$sql="update bet_match set mb_inball='$mb_inball',tg_inball='$tg_inball',tg_inball_hr='$tg_inball_hr',mb_inball_hr='$mb_inball_hr' where  Match_Date='$bdate' and match_master ='$Match_Master' and Match_Guest='$Match_Guest' and Match_Name='$Match_Name'";
				$mysqli->query($sql);
				$sql="update bet_match set mb_inball='$mb_inball',tg_inball='$tg_inball',tg_inball_hr='$tg_inball_hr',mb_inball_hr='$mb_inball_hr' where match_master like '%(上半)%'  and Match_Date='$bdate' and match_master like '".$Match_Master."%' and Match_Guest like '".$Match_Guest."%' and Match_Name like '".$Match_Name."'";
				$mysqli->query($sql);
				}
		}
	}$ts =($sb-1)*$sc;
	
	}
	//<iframe src="/zj6k6/sports/AUTO_zqbf_bc.php" frameborder="0" scrolling="no" height="0" width="0"></iframe>
    //<iframe src="/zj6k6/sports/AUTO_zqbf_qc.php" frameborder="0" scrolling="no" height="0" width="0"></iframe>

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
<style type="text/css">
<!--
body,td,th {
    font-size: 12px;
}
body {
    margin-left: 0px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
}
-->
</style>
</head>
<script>
<!--
var limit="200"
if (document.images){
	var parselimit=limit
}
function beginrefresh(){
if (!document.images)
	return
if (parselimit==1)
	self.location.reload()
else{
	parselimit-=1
	curmin=Math.floor(parselimit)
	if (curmin!=0)
		curtime=curmin+"秒后获取数据！"
	else
		curtime=cursec+"秒后获取数据！"

		timeinfo.innerText=curtime
		setTimeout("beginrefresh()",1000)
	}
}

window.onload=beginrefresh

function killerrors() {
	return true;
}
window.onerror = killerrors; 

</script>
<body >
<table width="100%" height="100" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100%" height="100" align="center"><input type=button name=button value="刷新" onClick="window.location.reload()"><?=$today?>日<?=$ts?> 条足球比分！<br>
      <span id="timeinfo"></span>
      </td>
  </tr>
</table>
<iframe src="/zj6k6/sports/AUTO_zqbf_bc.php" frameborder="0" scrolling="no" height="0" width="0"></iframe>
<iframe src="/zj6k6/sports/AUTO_zqbf_qc.php" frameborder="0" scrolling="no" height="0" width="0"></iframe>
</body>
</html>