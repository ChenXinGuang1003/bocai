<?php
header("Context-type:text/html;charset:utf-8");
session_start();
include_once 'config.php';
require_once 'api.class.php';
error_reporting(E_ALL);
ini_set( 'display_errors', 'On' );


include_once("../app/member/class/user.php");
//$agusername  = $userinfo["ag_username"];//ag帐号

$uid	=	$_SESSION["userid"];
$loginid=	$_SESSION["uid"];


$userinfo		=	user::getinfo($uid);
$username  = $userinfo['user_name'];
$agusername  = $userinfo["ag_username"];//ag帐号

$bbinapi = new BBIN_TZH($comId, $comKey,$gamePlatform);
$bbinapi->debug = 0;
//$agusername = 'bmwvcos888';//"tzhfhylqq123456";
if($_GET['d'])
$roundDate = $_GET['d'];
else
$roundDate = date("Y-m-d");//$roundDate = '2016-03-13';
$gameKind = '0'; // （0:AG  1：球类，3：视讯，5：机率，12：彩票，15：3D 厅）
$startTime = date("H:m:s",strtotime("-4 hours"));$startTime = "00:00:00";
$endTime = date("H:m:s");
if($endTime<"00:30:00"){
    $roundDate = date("Y-m-d",strtotime("-1 days"));  // 如果当前时间是小于00：30:00，则推前一天
    $endTime ="23:59:00";
}elseif($startTime>$endTime){
   $startTime = "00:00:00";
}
$page0   = isset($_GET['page'])?$_GET['page']:1; //第几页
$pageLimit = 100;// 每页最大记录数 最多500
$result = $bbinapi->GetBetDetailByGame($agusername, $roundDate,$gameKind,$startTime,$endTime,$page0,$pageLimit);
//echo json_encode($result);exit;
$total = 0;
if($result!==FALSE){
	$Page        = $result['@attributes']['Page'];
	$PageLimit   = $result['@attributes']['PageLimit'];
	$TotalNumber = $result['@attributes']['TotalNumber'];
	$TotalPage   = $result['@attributes']['TotalPage'];
	
        $nextPage    = $Page + 1;
        if($nextPage>$TotalPage)
        {
            $nextPage   = 1;
        }
        
	$total = 0;

        if(count($result['Record'])>0){
			if(isset($result['Record']['UserName']))
			{
				$temp = $result['Record'];
				unset($result['Record']);
				$result['Record'][0]=$temp;
			}
            foreach ($result['Record'] as $key => $value){
				
                $sql = "select * from `agbetdetail` where billNo = '".$value['WagersID']."'";
                $dataResult = $mysqli->query($sql);
                try{
                    
                    if(!$dataRow = $dataResult->fetch_array()){  //没有记录就加入
                    $sql = "insert into  `agbetdetail`(`billNo`,`playerName`,`gameCode`,`netAmount`,`betTime`,`gameType`,`betAmount`,`validBetAmount`,`flag`,`playType`,`recalcuTime`,`platformType`,`round`,`tableCode`)".
                            "values('".$value['WagersID']."','".
                            $value['UserName']."','".
                            $value['SerialID']."','".
                            $value['Payoff']."','".
                            date("Y-m-d H:i:s",  strtotime($value['WagersDate']))."','".
                            $value['GameType']."','".
                            $value['BetAmount']."','".
                            $value['Commissionable']."','".
                            $value['Flag']."','".
                            $value['PlayType']."','".
                            $value['RecalcuTime']."','".
                            $value['PlatformType']."','".
                            $value['Round']."','".
                            $value['GameCode']."'".
                            ")";    
                    $mysqli->query($sql) or die($mysqli->error);
                    $total ++;
                    }  else { // 有记录就更新，因服务器有延时，结果应该为已经结算完成的，故先不更新，后续观察
                        //$sql = "update  `agbetdetail` set netAmount='".value['Payoff']."',flag='". value['Flag']."' where billNo = '".value['WagersID']."'";
                    }
                 } catch (Exception $ex) {
                        die($ex->getMessage());
                }    
                    
                /*foreach ($value as $mkey => $mvalue){
                     echo $mkey.'=>'.$mvalue.'<br/>';
                }*/               
            }
        }		
$mysqli->close();
}

if($total==0){
	header('Location: /newag2/test.php?d='.$_GET['d']);exit;
}

/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : mydata1_db

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2015-12-29 23:00:41
*/
/*
SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `agbetdetail`
-- ----------------------------
DROP TABLE IF EXISTS `agbetdetail`;
CREATE TABLE `agbetdetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `billNo` varchar(20) NOT NULL COMMENT '注单流水号', WagersID
  `playerName` varchar(20) NOT NULL COMMENT '玩家账号',UserName
  `agentCode` varchar(20) DEFAULT NULL COMMENT '代理商编号',
  `gameCode` varchar(20) DEFAULT NULL COMMENT '游戏局号',SerialID
  `netAmount` float(9,2) DEFAULT '0.00' COMMENT '玩家输赢额度',Payoff
  `betTime` datetime DEFAULT NULL COMMENT '投注时间',WagersDate
  `gameType` varchar(10) DEFAULT NULL COMMENT '游戏类型',GameType
  `betAmount` float(9,2) DEFAULT '0.00' COMMENT '投注金额',BetAmount
  `validBetAmount` float(9,2) DEFAULT '0.00' COMMENT '有效投注额度',Commissionable
  `flag` int(11) DEFAULT '0' COMMENT '结算状态',Flag
  `playType` int(11) DEFAULT '0' COMMENT '游戏玩法',PlayType
  `currency` varchar(10) DEFAULT NULL COMMENT '货币类型',
  `tableCode` varchar(10) DEFAULT NULL COMMENT '桌子编号',
  `loginIP` varchar(20) DEFAULT NULL COMMENT '玩家IP',
  `recalcuTime` datetime DEFAULT NULL COMMENT '注单重新派彩时间',RecalcuTime
  `platformId` varchar(10) DEFAULT NULL COMMENT '平台编号',PlatformType
  `platformType` varchar(10) DEFAULT NULL COMMENT '平台类型',PlatformType
  `stringex` varchar(100) DEFAULT NULL COMMENT '产品附注(通常为空)',
  `remark` varchar(100) DEFAULT NULL COMMENT '轮盘游戏 -  额外资讯',
  `round` varchar(10) DEFAULT NULL '大厅类型', Round
  `copyFlag` int(11) NOT NULL DEFAULT '0' COMMENT '更新标志',
  `filePath` varchar(40) DEFAULT NULL COMMENT '文件路径',
  `prefix` varchar(10) DEFAULT NULL COMMENT '站点前缀',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_billNo` (`billNo`),
  KEY `playerName` (`playerName`),
  KEY `betTime` (`betTime`),
  KEY `copyFlag` (`copyFlag`),
  KEY `prefix` (`prefix`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

  $sql = "insert into  `agbetdetail`(`billNo`,`playerName`,`gameCode`,`netAmount`,`betTime`,`gameType`,`betAmount`,`validBetAmount`,`flag`,`playType`,`recalcuTime`,`platformType`,`round`)".
          "values('".value['WagersID']."','".
          value['UserName']."','".
          value['SerialID']."','".
          value['Payoff']."','".
          value['WagersDate']."','".
          value['GameType']."','".
          value['BetAmount']."','".
          value['Commissionable']."','".
          value['Flag']."','".
          value['PlayType']."','".
          value['RecalcuTime']."','".
          value['PlatformType']."','".
          value['Round']."'".
          ")";


*/
?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>AG投注记录采集</title>
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
<script>
<!--
<?php 
if ($nextPage==1 || $nextPage>$TotalPage){
?>
    var limit="30"    
    <?php        
}else{
  ?>
  var limit = "5"
  <?php
}
?>
if (document.images){
	var parselimit=limit
}
function beginrefresh(){
if (!document.images)
	return
if (parselimit==1)
	self.location="?page=<?php echo  $nextPage;?>"
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

</script>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left">
    <input type=button name=button value="刷新" onClick="window.location.reload()"> 本次获取AG投注记录
    <?php echo $total;?>条
      <span id="timeinfo"></span>
      </td>
  </tr>
</table>
</body>
</html>