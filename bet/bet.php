<?php
session_start();
include_once('../include/address.mem.php');
include_once('../include/config.php');
include_once('../include/function.php');
check_bet(); //验证用户是否已登陆

$bet_money	=	0; //交易金额
$type		=	''; //字段名
$pl			=	''; //水位
$id			=	''; //赛事ID
$matchname	=	''; //联赛名
$sort		=	''; //限额大类
$pk			=	''; //盘口
$tn			=	''; //限额小类
$url		=	''; //浏览重定向地址
$sb			=	''; //上半场标识
$isok		=	false; //默认交易失败
if($_POST['money']=="" || $_POST['type']=="" || $_POST['pl']=="" || $_POST['id']=="" || $_POST['matchname']=="" || $_POST['sort']==""){
	msg('参数错误，请返回');
}else{
	$bet_money	=	trim($_POST['money'])*1;
	$type		=	$_POST['type'];
	$pl			=	$_POST['pl'].'';
	$id			=	intval($_POST['id']);
	$matchname	=	$_POST['matchname'];
	$sort		=	$_POST['sort'];
	if($_POST['pk'] != '') $pk = $_POST['pk'].'';
}

if(!is_numeric($bet_money) || !is_int($bet_money*1)){
	msg('下注金额错误，请返回');
	exit;
}

	$uid=$_SESSION["uid"];
	$userid=$_SESSION["userid"];
	$group_id=$_SESSION["group_id"];
	$username=$_SESSION["username"];

$sql_group	=	"SELECT sports_bet,sports_bet_reb,sports_lower_bet FROM user_group where group_id='".@$_SESSION["group_id"]."' limit 0,1";
$query_group	=	$mysqli->query($sql_group);
$group_db	=	$query_group->fetch_array();

	//会员余额
	$balance	=	0;//投注后
	$assets		=	0;//投注前
	$sql		= 	"select money from user_list where user_id='$userid' limit 1";
	$query 		=	$mysqli->query($sql);
	$rs			=	$query->fetch_array();
	if($rs['money']){
		$assets	=	round($rs['money'],2);
		$balance=	$assets-$bet_money;
	}else{
		msg("账户异常,请联系客服!");
	}

	$sql		= 	"select balance from money_log where user_id='$userid' order by id desc limit 0,1";
	$query 		=	$mysqli->query($sql);
	$rs_l			=	$query->fetch_array();
	if(floatval($rs_l['balance'])!=floatval($assets)){
		$sql = "update user_list set online=0,Oid='',status='异常',remark='[手机]体育下注时发现资金异常$bj_time_now' where user_id='$userid'";//设置异常用户
		$mysqli->query($sql);
		msg("账户资金异常,请联系客服!");
	}
	
	if($balance<0){ //投注后，用户余额不能小于0
		msg("账户余额不足!");
	}
	if($bet_money<$group_db['sports_lower_bet']){
		msg("最低交易金额:".$group_db['sports_lower_bet']);
	}

//红卡
$Match_HRedCard =	0;
$Match_GRedCard =	0;
$lose_ok		=	1; //默认已确认
$ben_add		=	0; //水位是否+1
$match_type		=	1; //默认为单式

//检查盘口和水位是否变化
$row			=	array();
if($sort		== "足球滚球"){ //滚球直接验证缓存文件
	$lose_ok	=	0;  //滚球需要确认
	$match_type	=	2; //滚球为2
	
	include("../cache/zqgq.php"); //重新载入
	if(time()-$lasttime > 10){ //超时
		msg("赔率发生改变,重新下注.[901]");
		exit;
	}
	foreach($zqgq as $k=>$v){
		if($id == $v['Match_ID']){ //属于用户选择的联赛下的赛事
			$row			=	$zqgq[$k];
			$Match_HRedCard	=	$zqgq[$k]['Match_HRedCard'];
			$Match_GRedCard	=	$zqgq[$k]['Match_GRedCard'];
			if($row['Match_Time'] == '45.5'){ //转换为 中埸
				$row['Match_Time']	=	'中场';
			}
		}
	}
	$sql	=	"select Match_CoverDate from bet_match where match_id=".$row['Match_ID']." limit 1";
	$query	=	$mysqli->query($sql);
	$rows	=	$query->fetch_array();
	$row['Match_CoverDate']	=	$rows['Match_CoverDate'];
}elseif($sort	== "篮球滚球"){ //滚球直接验证缓存文件
	$match_type	=	2; //滚球为2
	include("../cache/lqgq.php"); //重新载入
	if(time()-$lasttime > 10){ //超时
		msg("赔率发生改变,重新下注.[902]");
		exit;
	}
	foreach($lqgq as $k=>$v){
		if($id	== $v['Match_ID']){ //属于用户选择的联赛下的赛事
			$row =	$lqgq[$k];
			if(strpos($row['Match_Master'],' - [上半]')){
				$sb = '-[上半]';
			}
		}
	}
	$sql	=	"select Match_CoverDate from lq_match where match_id=".$row['Match_ID']." limit 1";
	$query	=	$mysqli->query($sql);
	$rows	=	$query->fetch_array();
	$row['Match_CoverDate']	=	$rows['Match_CoverDate'];
}elseif($sort == "足球单式"){
	$url	=	'bet_zqds.php';
	$sql	=	"SELECT Match_Name,Match_Master,Match_Guest,Match_CoverDate,Match_Time,Match_ShowType,Match_RGG,Match_DxGG,Match_NowScore,".$type." FROM Bet_Match WHERE match_id='$id' limit 0,1";
	$query	=	$mysqli->query($sql);
	$row	=	$query->fetch_array();
	if($et_time>strtotime($row['Match_CoverDate'])){ //赛事已结束，无法投注
		msg('赛事已结束');
	}elseif(strpos($row['Match_Guest'],'先开球') && $et_time+300>strtotime($row['Match_CoverDate'])){ //先開球提前 5 分钟关盘
		msg("盘口已关闭，交易失败");
	}
}elseif($sort == "篮球单式"){
	$url		=	'bet_lqds.php';
	$sql	=	"SELECT Match_Name,Match_Master,Match_Guest,Match_CoverDate,Match_Time,Match_ShowType,Match_RGG,Match_DxGG,Match_NowScore,".$type." FROM lq_Match WHERE match_id='$id' limit 0,1";
	$query	=	$mysqli->query($sql);
	$row	=	$query->fetch_array();
	if($et_time>strtotime($row['Match_CoverDate'])){ //赛事已结束，无法投注
		msg('赛事已结束');
	}
	if(strpos($row['Match_Master'],' - [上半]')){
		$sb = '-[上半]';
	}
}elseif($sort == "篮球单节"){
	$url		=	'bet_lqdj.php';
	$sql	=	"SELECT Match_Name,Match_Master,Match_Guest,Match_CoverDate,Match_Time,Match_ShowType,Match_RGG,Match_DxGG,Match_NowScore,".$type." FROM lq_Match WHERE match_id='$id' limit 0,1";
	$query	=	$mysqli->query($sql);
	$row	=	$query->fetch_array();
	if($et_time>strtotime($row['Match_CoverDate'])){ //赛事已结束，无法投注
		msg('赛事已结束');
	}
}elseif($sort == "足球上半场"){
	$url	=	'bet_zqsbc.php';
	$sql	=	"SELECT Match_Name,Match_Master,Match_Guest,Match_CoverDate,Match_Time,Match_Hr_ShowType as Match_ShowType,Match_BRpk,Match_Bdxpk,".$type." FROM Bet_Match WHERE match_id='$id' limit 0,1";
	$query	=	$mysqli->query($sql);
	$row	=	$query->fetch_array();
	if($et_time>strtotime($row['Match_CoverDate'])){ //赛事已结束，无法投注
		msg('赛事已结束');
	}
	$sb = '-[上半]';
}else{
	msg('参数错误，请返回');
}

if(double_format($row[$type]) < 0.01){
	msg('盘口已关闭,交易失败',$url.'?matchname='.urlencode($_POST['matchname']));
}

if(double_format($row[$type]).'' !== $pl){ //水位不相等
	confirm('水位已经改变<br />最新水位：'.double_format($row[$type]),double_format($row[$type]),$pk,$url);
}
if($type=="Match_Ho" || $type=="Match_Ao"){ //全场让球，要判断盘口是否变动
	$ben_add	=	1; //让球水位+1
	if($row['Match_RGG'].'' !== $pk){ //盘口不相等
		if($row["Match_RGG"] == ''){
			msg('盘口已关闭,交易失败',$url.'?matchname='.urlencode($_POST['matchname']));
		}else{
			confirm('盘口已经改变<br />最新盘口：'.$row['Match_RGG'],$pl,$row['Match_RGG'],$url);
		}
	}
}elseif($type=="Match_BHo" || $type=="Match_BAo"){ //上半场让球
	$ben_add	=	1; //让球水位+1
	if($row['Match_BRpk'].'' !== $pk){ //盘口不相等
		if($row["Match_BRpk"] == ''){
			msg('盘口已关闭,交易失败',$url.'?matchname='.urlencode($_POST['matchname']));
		}else{
			confirm('盘口已经改变<br />最新盘口：'.$row['Match_BRpk'],$pl,$row['Match_BRpk'],$url);
		}
	}else{
		$row['Match_RGG']	=	$row['Match_BRpk'];
	}
}elseif($type=="Match_DxDpl" || $type=="Match_DxXpl"){ //全场大小
	$ben_add	=	1; //大小水位+1
	if($row['Match_DxGG'].'' !== $pk){ //盘口不相等
		if($row["Match_DxGG"] == ''){
			msg('盘口已关闭,交易失败',$url.'?matchname='.urlencode($_POST['matchname']));
		}else{
			confirm('盘口已经改变<br />最新盘口：'.$row['Match_DxGG'],$pl,$row['Match_DxGG'],$url);
		}
	}
}elseif($type=="Match_Bdpl" || $type=="Match_Bxpl"){ //上半场大小
	$ben_add	=	1; //大小水位+1
	if($row['Match_Bdxpk'].'' !== $pk){ //盘口不相等
		if($row["Match_Bdxpk"] == ''){
			msg('盘口已关闭,交易失败',$url.'?matchname='.urlencode($_POST['matchname']));
		}else{
			confirm('盘口已经改变<br />最新盘口：'.$row['Match_Bdxpk'],$pl,$row['Match_Bdxpk'],$url);
		}
	}else{
		$row['Match_DxGG']	=	$row['Match_Bdxpk'];
	}
}

$ip_addr = get_ip();
if($bet_money<$group_db['sports_bet'])
{
	$bet_reb=0;
}else{
	$bet_reb=$group_db['sports_bet_reb'];
}


if($pl>0.8)//如果赔率大于0.8则计算有效金额
{
	$bet_yx=$bet_money;
}else{
	$bet_yx=0;
}

$bet_win	=	$bet_money*($ben_add+$pl); //可赢金额=交易金额*水位
$bet_info	=	write_bet_info($sort,$type,$row['Match_Master'].'VS.'.$row['Match_Guest'],$pl,$row['Match_ShowType'],$row['Match_RGG'],$row['Match_DxGG'],$row['Match_NowScore']); //详细信息


	$sql	=	"insert into k_bet(user_id,ball_sort,point_column,match_name,master_guest,match_id,bet_info,bet_money,bet_point,ben_add,bet_win,match_time,bet_time,bet_time_et,match_endtime,lose_ok,match_showtype,match_rgg,match_dxgg,match_nowscore,match_type,balance,assets,Match_HRedCard,Match_GRedCard,www,match_coverdate,ip,bet_reb,game_type,bet_yx) values ('$userid','$sort','".strtolower($type)."','".$row['Match_Name']."','".$row['Match_Master'].'VS.'.$row['Match_Guest']."[手机下注]','$id','$bet_info','$bet_money','$pl','$ben_add','$bet_win','".$row['Match_Time']."',now(),'$et_time_now','".$row['Match_CoverDate']."','$lose_ok','".$row['Match_ShowType']."','".$row['Match_RGG']."','".$row['Match_DxGG']."','".$row['Match_NowScore']."','$match_type','$balance','$assets','$Match_HRedCard','$Match_GRedCard','".BROWSER_IP."','".$row['Match_CoverDate']."','$ip_addr','$bet_reb','','$bet_yx')"; //新增一个投注项


		$mysqli->query($sql);
		$q1		=	$mysqli->affected_rows;
		if($q1!=1){
			msg('交易失败.[910]',$url.'?matchname='.urlencode($_POST['matchname']));
		}
		$id 	=	$mysqli->insert_id;
		$datereg=	date("YmdHis").$id;

		

		$sql	=	"update user_list set money=$balance where money>=$bet_money and $balance>=0 and user_id='$userid'";//扣钱
		$mysqli->query($sql);
		$q3		=	$mysqli->affected_rows;
		if($q3!=1){
			$sql	=	"delete from k_bet where id=$id";//操作失败，删除订单
			$mysqli->query($sql);
			msg('交易失败.[911]',$url.'?matchname='.urlencode($_POST['matchname']));
		}

		$sql	=	"update `k_bet` set `order_num`='$datereg' where id='$id'"; //更新订单号
		$mysqli->query($sql);
		$q2		=	$mysqli->affected_rows;
		if($q2!=1){
			$sql	=	"delete from k_bet where id=$id";//操作失败，删除订单
			$mysqli->query($sql);
			$sql	=	"update user_list set money=money+$bet_money where user_id='$userid'";//操作失败，还原客户资金
			$mysqli->query($sql);
			msg('交易失败.[912]',$url.'?matchname='.urlencode($_POST['matchname']));
		}
		
		$sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$userid','$datereg','体育单式[手机]',now(),'游戏下注[手机]','$bet_money','$assets','$balance');";
		$mysqli->query($sql);
		$q8		=	$mysqli->affected_rows;
		if($q8!=1){
			$sql	=	"delete from k_bet where id=$id";//操作失败，删除订单
			$mysqli->query($sql);
			$sql	=	"update user_list set money=money+$bet_money where user_id='$userid'";//操作失败，还原客户资金
			$mysqli->query($sql);
			msg('交易失败.[913]',$url.'?matchname='.urlencode($_POST['matchname']));
		}
		$log_id 	=	$mysqli->insert_id;

		$tm=date("Y-m-d H:i:s",time());
		$width	=	str_leng($ball_sort.'='.$match_name.'='.$master_guest.'='.$bet_info.$match_showtype.$bet_money.'='.$tm); //宽
		$height	=	26; //高
		$im		=	imagecreate($width,$height);
		$bkg	=	imagecolorallocate($im,255,255,255); //背景色
		$font	=	imagecolorallocate($im,150,182,151); //边框色
		$sort_c	=	imagecolorallocate($im,0,0,0); //字体色 
		$name_c	=	imagecolorallocate($im,243,118,5); //字体色 
		$guest_c=	imagecolorallocate($im,34,93,156); //字体色 
		$info_c	=	imagecolorallocate($im,51,102,0); //字体色 
		$money_c=	imagecolorallocate($im,255,0,0); //字体色 
		$tm_c=	imagecolorallocate($im,0,0,0); //字体色 
		$fnt	=	"../ttf/simhei.ttf";
		
		imagettftext($im,10,0,7,18,$sort_c,$fnt,$ball_sort); //赛事类型
		imagettftext($im,10,0,str_leng($ball_sort.'=='),18,$name_c,$fnt,$match_name); //联赛名称
		imagettftext($im,10,0,str_leng($ball_sort.$match_name.'==='),18,$guest_c,$fnt,$master_guest); //队伍名称
		imagettftext($im,10,0,str_leng($ball_sort.$match_name.$master_guest.'===='),18,$info_c,$fnt,$bet_info); //交易明细
		imagettftext($im,10,0,str_leng($ball_sort.$match_name.$master_guest.$bet_info.'====='),18,$info_c,$fnt,$match_showtype); //主、客让
		imagettftext($im,10,0,str_leng($ball_sort.$match_name.$master_guest.$bet_info.$match_showtype.'======'),18,$money_c,$fnt,$bet_money); //交易金额
		imagettftext($im,10,0,str_leng($ball_sort.$match_name.$master_guest.$bet_info.$match_showtype.$bet_money.'======='),18,$tm_c,$fnt,$tm); //交易时间
		imagerectangle($im,0,0,$width-1,$height-1,$font); //画边框

		if(!is_dir("d:/home/web/order/".substr($datereg,0,8))) mkdir("d:/home/web/order/".substr($datereg,0,8));
		$q4 = imagejpeg($im,"d:/home/web/order/".substr($datereg,0,8)."/$datereg.jpg"); //生成图片
		imagedestroy($im);

		if(!$q4){
			$sql	=	"delete from k_bet where id=$id";//操作失败，删除订单
			$mysqli->query($sql);
			$sql	=	"update user_list set money=money+$bet_money where user_id='$userid'";//操作失败，还原客户资金
			$mysqli->query($sql);
			$sql	=	"delete from money_log where id=$log_id";//操作失败，删除订单
			$mysqli->query($sql);
			msg('交易失败.[914]',$url.'?matchname='.urlencode($_POST['matchname']));
		}

		//验证一下账户金额
		$usermoney=0;
		$sql		= 	"select money from user_list where user_id='$userid' limit 1";
		$query 		=	$mysqli->query($sql);
		$rs			=	$query->fetch_array();

		$usermoney=$rs['money'];


		$sql		= 	"select balance from money_log where user_id='$userid' order by id desc limit 0,1";
		$query 		=	$mysqli->query($sql);
		$rs_l			=	$query->fetch_array();
		if(floatval($rs_l['balance'])!=floatval($usermoney)){
			$sql = "update user_list set online=0,Oid='',status='异常',remark='[手机下注]体育($datereg)下注后资金异常$bj_time_now' where user_id='$userid'";
			$mysqli->query($sql);
			msg('交易失败.[915]',$url.'?matchname='.urlencode($_POST['matchname']));
		}
$isok	=	true; //交易成功
header("Content-type: text/vnd.wap.wml");
echo '<?xml version="1.0" encoding="utf-8"?>';
?><!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.3//EN" "http://www.wapforum.org/DTD/wml13.dtd">
<wml><head>
<meta http-equiv="Cache-Control" content="max-age=0" />
</head>
	<card title="<?=$web_name?>">
	<meta http-equiv="Cache-Control" content="max-age=0"/>
	<p>
	<?php
	if($isok){
		$row['Match_Guest']		=	str_replace("&","&amp;",$row['Match_Guest']);
		$row['Match_Master']	=	str_replace("&","&amp;",$row['Match_Master']);
		if(strpos($row['Match_Guest'],' - (上半)')){
			$row['Match_Guest']		=	rtrim($row['Match_Guest'],' - (上半)');
			$row['Match_Master']	=	rtrim($row['Match_Master'],' - (上半)');
			$sb						=	'-[上半]';
		}
		echo '交易成功<br/>';
		echo '编号：HG_'.$datereg.'<br/>';
		echo $row['Match_Name'].$sb.'<br/>';
		if($type=="Match_Ho" || $type=="Match_Ao" || $type=="Match_BHo" || $type=="Match_BAo"){ //让球
			if($row['Match_ShowType'] == 'H'){ //主让，主队在前面
				echo $row['Match_Master'];
				if($type=="Match_Ho" || $type=="Match_Ao"){ //全场
					echo $row['Match_RGG'];
				}else{ //上半场
					echo $row['Match_BRpk'];
				}
				echo $row['Match_Guest'];
			}else{
				echo $row['Match_Guest'];
				if($type=="Match_Ho" || $type=="Match_Ao"){ //全场
					echo $row['Match_RGG'];
				}else{ //上半场
					echo $row['Match_BRpk'];
				}
				echo $row['Match_Master'];
			}
			echo '<br/>';
		}else{
			echo $row['Match_Master'].' VS '.$row['Match_Guest'].'<br/>';
		}
		if($type=="Match_Ho" || $type=="Match_BHo" || $type=="Match_BzM" || $type=="Match_Bmdy"){
			echo $row['Match_Master'];
		}elseif($type=="Match_Ao" || $type=="Match_BAo" || $type=="Match_BzG" || $type=="Match_Bgdy"){
			echo $row['Match_Guest'];
		}elseif($type=="Match_DsDpl"){
			echo '单';
		}elseif($type=="Match_DsSpl"){
			echo '双';
		}elseif($type=="Match_DxDpl" || $type=="Match_Bdpl"){
			echo '大';
			if($type=="Match_DxDpl"){ //全场
				echo $row['Match_DxGG'];
			}else{ //上单场
				echo $row['Match_Bdxpk'];
			}
		}elseif($type=="Match_DxXpl" || $type=="Match_Bxpl"){
			echo '小';
			if($type=="Match_DxXpl"){ //全场
				echo $row['Match_DxGG'];
			}else{ //上单场
				echo $row['Match_Bdxpk'];
			}
		}elseif($type=="Match_BzH" || $type=="Match_Bhdy"){
			echo '和局';
		}
		echo ' @ '.$pl;
		if($lose_ok==0) echo ' [确定中]';
		echo '<br/>';
		echo '交易：'.$bet_money.'<br/>';
		echo '可赢：'.$bet_win.'<br/>';
	}else{
		echo '交易失败<br/>';
	}
	?>
	账户：<?=double_format($usermoney)?><br/>
		<br/>
		<a href="<?=$url?>?matchname=<?=urlencode($row['Match_Name'])?>" title="继续交易">继续交易</a><br/>
		<a href="../main.php" title="返回菜单">返回菜单</a>
	</p>
	</card>
</wml>