<?php
ini_set("display_errors","yes");
include_once("db.php");
include_once("pub_library.php");
include_once("http.class.php");
include_once("mysqli.php");
include_once("function.php");
header("Content-type: text/html; charset=utf-8");

$list_date=date('Y-m-d',time()-2*60*60);
$bdate=date('m-d',time()-2*60*60);

/*$list_date='2012-09-07';
$bdate='09-07';*/

$base_url = $webdb["datesite"]."/app/member/FT_index.php?uid=".$webdb["cookie"]."&langx=en-us&mtype=3";
$thisHttp = new cHTTP();
$thisHttp->setReferer($base_url);
$filename = $webdb["datesite"]."/app/member/result/result.php?game_type=FT&uid=".$webdb["cookie"]."&langx=zh-cn";

//$ret=file_get_contents($filename);
//$content= htmlspecialchars($ret);	
//echo $content;exit;
$thisHttp->getPage($filename);

$msg = $thisHttp->getContent();
//echo $msg;exit;
$msg = strtolower($msg);

$a = array(
"<script>",
"</script>",
'"',
"\n\n",
"<br>",
" ",
'</b></font>',
"<td>",
"<tdalign=left>",
"<fontcolor=#cc0000>",
"<fontcolor=red>",
"<b>",
"</b>",
"</a>",
"</font>",
"<spanstyle=overflow:hidden;>",
"</span>",
chr(13),
"&nbsp;&nbsp;",
"<tdclass=hr_main_ft>",
"<tdclass=full_main_ft>",
"<tdclass=team_c_ft>",
"<tdclass=team_h_ft>"
);
$b = array(
"",
"",
"",
"",
"-",
"",
'',
"",
"",
"",
"",
"",
"",
"",
"",
"",
"",
"",
"",
"",
"",
""
);
$msg = str_replace($a,$b,$msg);
//echo $msg;exit;
$data1=explode("</div>",$msg);
//print_r($data1);exit;
$m=0;
//$data=explode("<trclass=b_cenid",strtolower($msg));
$data=explode("<tdcolspan=6class=b_hline>",strtolower($msg));
//print_r($data);exit;
for ($i=1;$i<sizeof($data);$i++){
	$score1=explode("<trclass=b_cenid",strtolower($data[$i])); 
	preg_match_all("/class=leg_bar>(.+?)<\/td>/is",$score1[0],$legs);
	$strleg=$legs[1][0];
	//echo $strleg;exit;
	//print_r($score1);exit;
	for($z=1;$z<sizeof($score1);$z++){
	//print($score1[$z]);exit;
	$score=explode("</tr>",$score1[$z]);
	//for ($j=0;$j<sizeof($abcde)-1;$j++){
	//$score=explode("</td>",trim($abcde[$j]));
//print_r($score);exit;
//echo(sizeof($score));exit;
		if (sizeof($score)>=5){
			
			preg_match_all("/tr_(.+?)style/is",$score[0],$mid1);
			//print_r($mid1);exit;
			$mid=explode("_",$mid1[1][0]);
			$master=explode("</td>",$score[0]);
			//print_r($master);exit;
			$mscore=explode("</td>",$score[2]);
			//print_r($mscore);exit;
			$tscore=explode("</td>",$score[3]);
			//$mb_mid=trim($mid[0]);
			//$tg_mid=trim($mid[1]);
			$match_id=$mid[1];
			//echo $match_id;exit;
			/*if($match_id=='1491266'){
				print_r($mscore);exit;
			}*/
			$Match_Master=strip_tags(trim($master[3]));
			$Match_Guest=strip_tags(trim($master[5]));
			$t0=trim($mscore[1]);
			$m0=trim($mscore[2]);
			$t1=trim($tscore[1]);
			$m1=trim($tscore[2]);
			$t0=(is_numeric($t0))?$t0:"-1";
			$m0=(is_numeric($m0))?$m0:"-1";
			$t1=(is_numeric($t1))?$t1:"-1";
			$m1=(is_numeric($m1))?$m1:"-1";
			
			/*if($t1=='-1'){
				echo $t0.'-'.$m0.'-'.$t1.'-'.$m1.'-'.$match_id."<br>";
				print_r($score);
			}*/
			if(strlen($t1)<5 && strlen($t0)<5 && strlen($m1)<5 && strlen($m0)<5){
				
				$sql="update bet_match set mb_inball='$t1',tg_inball='$m1',tg_inball_hr='$m0',mb_inball_hr='$t0' where match_id=$match_id and  match_master not like '%(上半)%' and Match_Date='$bdate'";
				//echo $sql."<br>";
				//if($match_id=='1493882'){
				//echo $sql."<br>";
				//}
				
			$mysqli->query($sql);
				
				//select * from bet_match set  where match_date='09-22' and match_id=(select match_halfid from bet_match where match_id=1476258)
				$sql="update bet_match set mb_inball='$t0',tg_inball='$m0',tg_inball_hr='$m0',mb_inball_hr='$t0' where match_master like '%(上半)%'  and Match_Date='$bdate' and REPLACE(match_master,' ','') like '".$Match_Master."%' and REPLACE(Match_Guest,' ','') like '".$Match_Guest."%' and REPLACE(Match_Name,' ','') like '".$strleg."'";
				//echo $sql."<br>";
				$mysqli->query($sql);	
				//if($t1=='-1'){
				//echo $t0.'-'.$m0.'-'.$t1.'-'.$m1.'-'.$match_id."<br>";
				//echo $sql."<br>";
				//print_r($score);
		//	}
				$sql="update bet_match set mb_inball='$t1',tg_inball='$m1',tg_inball_hr='$m0',mb_inball_hr='$t0' where  REPLACE(match_master,' ','') like '".$Match_Master."%' and REPLACE(Match_Guest,' ','') like '".$Match_Guest."%' and  match_master not like '%(上半)%' and Match_Date='$bdate' and REPLACE(Match_Name,' ','') like '".$strleg."'";
				//echo "[".strpos($Match_Master,'-')."]";
				//echo $sql."<br>";
				if(strpos($Match_Master,'-')===false && strpos($Match_Guest,'-')===false){
					//echo $sql."<br>";
					$mysqli->query($sql);
				}
				//$mysqli->query($sql);
							
				$m++;
			}
		}
	}
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
<style type="text/css">
<!--
body {
	background-color: #CCCCCC;
	margin-left: 0px;
	margin-top: 0px;
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
<body bgcolor="#999999">
<table width="100%" height="100" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100%" height="100" align="center"><p><?=$m?> 条足球比分！</p>
      <span id="timeinfo"></span><br>
      <input type=button name=button value="刷新" onClick="window.location.reload()"></td>
  </tr>
</table>

</body>
</html>