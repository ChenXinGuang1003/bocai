<?php
header("Context-type:text/html;charset:utf-8");
session_start();
include_once 'config.php';

require_once 'api.class.php';
error_reporting(E_ALL);
ini_set( 'display_errors', 'Off' );


/*include_once("../app/member/class/user.php");
//$agusername  = $userinfo["ag_username"];//ag帐号

if(isset($_GET['u'])&&isset($_GET['d'])){}
else{exit;}
$agusername=$_GET['u'];*/
if($_GET['p']){
$nextPage = $_GET['p'];
}else{
$nextPage = 1;
}

$sql = "select betTime from `agbetdetail` where platformType = 'BBIN' order by betTime desc limit 0,1";
$dataResult0 = $mysqli->query($sql);
$dataRow0 = $dataResult0->fetch_array();
$last_time = $dataRow0['betTime'];
//echo $last_time;exit;


$bbinapi = new BBIN_TZH($comId, $comKey,$gamePlatform);
$bbinapi->debug = 0;
$total = 0;
if($_GET['u']){
	$json_str = $bbinapi->getall($report_url."&u=".$_GET['u'],$last_time);
}else{
	$json_str = $bbinapi->getall($report_url.urlencode($last_time),$last_time);
}


$results = json_decode($json_str,true);
//echo count($results);exit;
/*$rowscount = count($results);
echo $rowscount;
foreach($results as $key=>$value)
{

	echo $value["billno"].
	$value['playername']."','".
                            $value['gamecode']."','".
                            $value['netamount']."','".
                            $value['bettime']."','".
                            $value['gametype']."','".
                            $value['betamount']."','".
                            $value['validbetamount']."','".
                            $value['flag']."','".
                            $value['playtype']."','".
                            $value['recalcutime']."','".
                            $value['platformtype']."','".
                            $value['round']."','".
                            $value['tablecode']."'".'<br>';
}
exit;*/
foreach($results as $key=>$value)
{
	
$sql = "select * from `agbetdetail` where billNo = '".$value['billno']."'";
				//echo $sql;exit;
                $dataResult = $mysqli->query($sql);
                try{
                    
                    if(!$dataRow = $dataResult->fetch_array()){  //没有记录就加入
                    $sql = "insert into  `agbetdetail`(`billNo`,`playerName`,`gameCode`,`netAmount`,`betTime`,`gameType`,`betAmount`,`validBetAmount`,`flag`,`playType`,`recalcuTime`,`platformType`,`round`,`tableCode`)".
                            "SELECT '".$value['billno']."','".
                            $value['playername']."','".
                            $value['gamecode']."','".
                            $value['netamount']."','".
                            $value['bettime']."','".
                            $value['gametype']."','".
                            $value['betamount']."','".
                            $value['validbetamount']."','".
                            $value['flag']."','".
                            $value['playtype']."','".
                            $value['recalcutime']."','".
                            $value['platformtype']."','".
                            $value['round']."','".
                            $value['tablecode']."'".
                            " FROM DUAL WHERE EXISTS(SELECT `bb_username` FROM user_list WHERE `bb_username` = '".$value['username']."');";   
                    $mysqli->query($sql) or die($mysqli->error);
                    $total ++;
                    }  else { // 有记录就更新，因服务器有延时，结果应该为已经结算完成的，故先不更新，后续观察
                        //$sql = "update  `agbetdetail` set netAmount='".value['Payoff']."',flag='". value['Flag']."' where billNo = '".value['WagersID']."'";
                    }
                 } catch (Exception $ex) {
                        die($ex->getMessage());
                }  

}

$mysqli->close();

if($total>1){
	$nextPage++;
}

?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="refresh" content="150">
<title>BBIN投注记录采集</title>
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

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left">
    <input type=button name=button value="刷新" onClick="window.location.reload()"> 本次获取BBIN投注记录
    <?php echo $total;?>条
      <span id="timeinfo"></span>
	  <br>
	  只要您不关闭此页,150秒后将自动刷新记录
      </td>
  </tr>
</table>
</body>
</html>