<?php
header("Context-type:text/html;charset:utf-8");
session_start();
include_once 'config.php';

function getgamename($shortname){
	switch($shortname){
		case 'BAC': return '百家乐';break;
		case 'CBAC': return '包桌百家乐';break;
		case 'LINK': return '连环百家乐';break;
		case 'DT': return '龙虎';break;
		case 'SHB': return '骰宝';break;
		case 'ROU': return '轮盘';break;
		case 'FT': return '番摊';break;
		case 'LBAC': return '百家乐';break;
		default : return $shortname;
	}
}

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

$page = isset($_GET['p'])?$_GET['p']:1;
$_date = isset($_GET['d'])?($_GET['d']." 00:00:00"):(date('Y-m-d', time())." 00:00:00");
$_date2 = isset($_GET['d'])?($_GET['d']." 23:59:59"):(date('Y-m-d', time())." 23:59:59");
$p1 = ($page-1)*50;
$p2 = $p1+50;

$sql = "select * from `agbetdetail` where playerName = '".$agusername."' and betTime > '".$_date."' and betTime < '".$_date2."' limit ".$p1.",".$p2;

$query = $mysqli->query($sql);





?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AGIN</title>
        <style>
                 td{border:solid 1px #ccc;}  
        </style>
    </head>
    <body>
	
	<table>
	<tr>
	<th>注单号</th>
  <!--<th>玩家账号</th>
  <th>代理商编号</th>
  <th>游戏局号</th>-->
  <th>玩家输赢</th>
  <th>投注时间</th>
  <th>游戏类型</th>
  <th>投注金额</th>
  <th>有效投注额度</th>
  <!--<th>结算状态</th>
  <th>游戏玩法</th>
  <th>货币类型</th>
  <th>桌子编号</th> 
  <th>玩家IP</th>
  <th>注单重新派彩时间</th> 
  <th>平台编号</th> 
  <th>平台类型</th>
  <th>产品附注</th>
  <th>轮盘游戏</th>
  <th>大厅类型</th>
  <th>更新标志</th>-->
	</tr>
        <?php
		$rowcount = 0;
        while($row = $query->fetch_array()){
			$rowcount++;
echo '<tr>'.
	'<td>'.$row['billNo'].'</td>'.
	//'<td>'.$row['playerName'].'</td>'.
	//'<td>'.$row['agentCode'].'</td>'.
	//'<td>'.$row['gameCode'].'</td>'.
	'<td>'.$row['netAmount'].'</td>'.
	'<td>'.$row['betTime'].'</td>'.
	'<td>'.getgamename($row['gameType']).'</td>'.
	'<td>'.$row['betAmount'].'</td>'.
	'<td>'.$row['validBetAmount'].'</td>'.
	//'<td>'.$row['flag'].'</td>'.
	//'<td>'.$row['playType'].'</td>'.
	//'<td>'.$row['currency'].'</td>'.
	//'<td>'.$row['tableCode'].'</td>'.
	//'<td>'.$row['loginIP'].'</td>'.
	//'<td>'.$row['recalcuTime'].'</td>'.
	//'<td>'.$row['platformId'].'</td>'.
	//'<td>'.$row['platformType'].'</td>'.
	//'<td>'.$row['stringex'].'</td>'.
	//'<td>'.$row['remark'].'</td>'.
	//'<td>'.$row['round'].'</td>'.
	//'<td>'.$row['copyFlag'].'</td>'.
	'</tr>';
}

        ?>
		</table>

		<?
		if($rowcount==0)
echo '<div>当日无数据</div>';
		?>
    </body>
</html>

