<?
header('Content-Type:text/html; charset=utf-8');
include ("../mysqli.php");
$url = "http://lishi.512301.com/statistics/"; 
$ch = curl_init(); 
curl_setopt ($ch, CURLOPT_URL, $url); 
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10); 
curl_setopt($ch, CURLOPT_ENCODING, "gzip"); 
$res = curl_exec($ch); 
curl_close($ch); 
//echo $res;
	$content= htmlspecialchars($res, ENT_QUOTES, 'UTF-8');
    $content= htmlspecialchars($res);	
	//$myfile = fopen("1.txt", "w") or die("Unable to open file!");fwrite($myfile, $content);
	$th=array('&quot;');
	 $ct = str_replace($th, '', $content);    
	 //echo $ct;
	  $ct = str_replace('input type=checkbox name=ck', '<xxx>', $ct); 
	$yarr=explode('<xxx>',$ct);
	//print_r ($yarr);
	$dyq = $yarr[1];
	/*  
	 $th=array('&lt;','&gt;');
	  */
	// $dyth=array(' ','div','class','dialog','hmgreenBo','sortSizeclearfix','hmblueBo','wuxingtu','td','=','p','bg','/','&lt;','&gt;');
    $dyth=array(' ','div','class','dialog','hmgreenBo','sortSizeclearfix','hmblueBo','wuxingtu','td','=','p','bg','/','value','&lt;','a','BoClss','hmred','Clss','sx','title','id','li','i','em');
	$dyqq = str_replace($dyth, '', $dyq);
	//echo $dyqq;
	$qdyq=explode('&gt;',$dyqq);
	//print_r ($qdyq);
	
	  $q=substr($qdyq[5],0,3);
	  $rq=$qdyq[3];
	  $qs=substr($rq,0,4).$q;
	  $na=$qdyq[53];
	  $n1=$qdyq[11];
	  $n2=$qdyq[17];
	  $n3=$qdyq[23];
	  $n4=$qdyq[29];
	  $n5=$qdyq[35];
	  $n6=$qdyq[41];
	  $sx=$qdyq[55];
	  $x1=$qdyq[13];
	  $x2=$qdyq[19];
	  $x3=$qdyq[25];
	  $x4=$qdyq[31];
	  $x5=$qdyq[37];
	  $x6=$qdyq[43];
	  $c_time 	= date('Y-m-d H:i:s',time());
	  $riqi=$rq.date('H:i:s',time());
	  $riqi = strtotime($riqi);
      $riqi=date('Y-m-d H:i:s',$riqi);
 //echo    '<br>'.$qs.'<br>'.$rq.'<br>'.$na.'<br>'.$n1.'<br>'.$n2.'<br>'.$n3.'<br>'.$n4.'<br>'.$n5.'<br>'.$n6.'<br>'.$sx.'<br>'.$x1.'<br>'.$x2.'<br>'.$x3.'<br>'.$x4.'<br>'.$x5.'<br>'.$x6;

	$week = date("w");
//echo $rq;
//exit;
$sql = "select qishu from lottery_result_lhc where qishu='$qs' ";
$result = $mysqli->query($sql);
$row = $mysqli->affected_rows;
if  (empty($row)){
 $msql = "INSERT INTO `lottery_result_lhc` (`qishu`, `create_time`, `datetime`,`ball_1`, `ball_2`, `ball_3`, `ball_4`, `ball_5`, `ball_6`, `ball_7`) VALUES ('$qs', '$c_time', '$riqi', '$n1' ,  '$n2',  '$n3', '$n4', '$n5', '$n6',  '$na')";
            $mysqli->query($msql) or die ("操作失败!!!".$sql);
}
	if ($week=='2' || $week=='4'){
			$tqs=intval($qs,10)+1;
			$tqsx=strval($tqs);
			
			if ($tqs=='1'){}else{
			$sqlh = "select qishu from six_lottery_schedule where qishu='$tqs'";
			$result = $mysqli->query($sqlh);
            $rowh = $mysqli->affected_rows;
			if  (empty($rowh)){
			$mt=strtotime($rq)+2*24*3600;
            $mt=date('Y-m-d',$mt);
			$fp=$mt.' 21:29:00';
			$kj=$mt.' 21:35:00';
			$ks=$rq.' 21:40:00';
			$msql = "INSERT INTO `six_lottery_schedule` (`qishu`, `kaipan_time`, `fenpan_time`,`kaijiang_time`, `create_time`) VALUES ('$tqs', '$ks', '$fp', '$kj' ,'$c_time')";
             $mysqli->query($msql) or die ("操作失败!!!".$sql);
			 echo $tqs.'期添加成功';
			}}
	}
		if ($week=='6'){
			$tqs=intval($qs,10)+1;
			if ($tqs=='1'){}else{
			$sqlh = "select qishu from six_lottery_schedule where qishu='$tqs' ";
            $result = $mysqli->query($sqlh);
            $rowh = $mysqli->affected_rows;
			if  (empty($rowh)){
			$mt=strtotime($rq)+3*24*3600;
            $mt=date('Y-m-d',$mt);
			$fp=$mt.' 21:29:00';
			$kj=$mt.' 21:35:00';
			$ks=$rq.' 21:40:00';
			$msql = "INSERT INTO `six_lottery_schedule` (`qishu`, `kaipan_time`, `fenpan_time`,`kaijiang_time`, `create_time`) VALUES ('$tqs', '$ks', '$fp', '$kj' ,'$c_time')";
             $mysqli->query($msql) or die ("操作失败!!!".$sql);
			 echo $tqs.'期添加成功';
			}}
	}
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
</style></head>
<body>
<script>
window.parent.is_open = 1;
</script>
<script> 
<!-- 
<? $limit= rand(1,150);?>
var limit="<?=$limit?>" 
if (document.images){ 
	var parselimit=limit
} 
function beginrefresh(){ 
if (!document.images) 
	return 
if (parselimit==1) 
	window.location.reload() 
else{ 
	parselimit-=1 
	curmin=Math.floor(parselimit) 
	if (curmin!=0) 
		curtime=curmin+"秒后自动获取!" 
	else 
		curtime=cursec+"秒后自动获取!" 
		timeinfo.innerText=curtime 
		setTimeout("beginrefresh()",1000) 
	} 
} 
window.onload=beginrefresh
</script>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td align="left">
      <input type=button name=button value="刷新" onClick="window.location.reload()">
      香港六合彩<br>(<?=$qs?>期:<?="$n1,$n2,$n3,$n4,$n5,$n6"?>特码：<?="$na"?>)<br><span id="timeinfo"></span>
	  </td>
      
  </tr>
</table>
<iframe runat="server" src="/zj6k6/Lottery/result/LHC/autojs.php?jsType=0" width="1000" height="1000" frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="no" allowtransparency="yes"></iframe>
</body>
</html>