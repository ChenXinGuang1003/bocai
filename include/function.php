<?php
/**
* 输出内容
**/
function msg($val,$url=''){
	
	header("Content-type: text/vnd.wap.wml"); 
	echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.3//EN" "http://www.wapforum.org/DTD/wml13.dtd">

<wml>
	<card title="<?=$web_name?>">
<?php
	if($url){
?>
		<onevent type="ontimer">
			<go href="<?=$url?>"/>
		</onevent>
		<timer value="30"/>
		<a href="<?=$url?>" title="<?=$val?>"><?=$val?></a>
<?php
	}else{
?>
		<onevent type="ontimer">
			<anchor><prev/><?=$val?></anchor>
		</onevent>
		<timer value="30"/>
<?php
	}
?>
	</card>
</wml>
<?php
	exit;
	}
	
/**
* 是否重新交易
**/
function confirm($msg,$pl,$pk,$url){

	header("Content-type: text/vnd.wap.wml"); 
	echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.3//EN" "http://www.wapforum.org/DTD/wml13.dtd">
<wml>
	<card title="<?=$web_name?>">
	<onevent type="ontimer"> 
		<go href="<?=$url?>?matchname=<?=urlencode($_POST['matchname'])?>"/> 
	</onevent>
	<timer value="50"/>
		<?=$msg?><br /><br />是否继续交易？<br />
		<anchor title="继续交易">继续交易<go href="bet.php" method="post"><postfield name="money" value="<?=$_POST['money']?>" /><postfield name="type" value="<?=$_POST['type']?>" /><postfield name="pl" value="<?=$pl?>" /><postfield name="id" value="<?=$_POST['id']?>" /><postfield name="matchname" value="<?=$_POST['urlencode']?>" /><postfield name="sort" value="<?=$_POST['sort']?>" /><postfield name="pk" value="<?=$pk?>" /></go></anchor><br /><a href="<?=$url?>?matchname=<?=urlencode($_POST['matchname'])?>" title="返回赛事">返回赛事</a><br /><a href="../wap.php" title="返回菜单">返回菜单</a>
	</card>
</wml>
<?php
	exit;
	}
	
/**
* 输出内容
**/
function message($val,$other=''){

	header("Content-type: text/vnd.wap.wml"); 
	echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.3//EN" "http://www.wapforum.org/DTD/wml13.dtd">
<wml>

	<card title="<?=$web_name?>">
		<onevent type="ontimer"> 
			<go href="login/login.php?<?=rand()?>&amp;<?=$other?>"/> 
		</onevent>
		<timer value="30"/>
		<a href="login/login.php?<?=rand()?>&amp;<?=$other?>" title="<?=$val?>"><?=$val?></a>
	</card>
</wml>
<?php
	exit;
	}
	
/**
* 验证用户是否已登陆
**/
$uid=$_SESSION["uid"];
$userid=$_SESSION["userid"];
$group_id=$_SESSION["group_id"];
$username=$_SESSION["username"];
function check_login(){
	global $mysqli;
	$uid=$_SESSION["uid"];
	$userid=$_SESSION["userid"];
	$group_id=$_SESSION["group_id"];
	$username=$_SESSION["username"];
	if(isset($_SESSION["uid"]) && $_SESSION["uid"]!=""){ 
		$datetime=date('Y-m-d H:i:s',time());
		$outtime=date('Y-m-d H:i:s',time()-60*30);
		$sql = "update user_list set online=1,OnlineTime='$datetime' where Oid='$uid' and Oid!=''";//更新在線時長
		$mysqli->query($sql);
		$sql = "update user_list set online=0,Oid='' where OnlineTime<'$outtime'";//刪除超時用戶
		$mysqli->query($sql);
		$sql = "select * from user_list where oid='$uid' and Status='正常'";
		$result	=	$mysqli->query($sql);
		$cou= $result->num_rows;
		if($cou==0){
			$C_Patch=$_SERVER['DOCUMENT_ROOT'];
			include_once($C_Patch."/logout.php");
			exit;
		}
		$result->close();
	}else{ //未登陆，跳转到登陆页面
		if( is_mobile() ){
			echo "<script> window.top.location.href = '/login/login.php';</script>";
			exit;
		}else{
			header("location:/login/login.php");
			exit;
		}
		
	}
}

/**
* 验证用户是否可以下注
**/
function check_bet(){

	global $mysqli;
	$uid=$_SESSION["uid"];
	$userid=$_SESSION["userid"];
	$group_id=$_SESSION["group_id"];
	$username=$_SESSION["username"];
	if(isset($_SESSION["uid"]) && $_SESSION["uid"]!=""){ 
		$datetime=date('Y-m-d H:i:s',time());
		$outtime=date('Y-m-d H:i:s',time()-60*30);
		$sql = "update user_list set online=1,OnlineTime='$datetime' where Oid='$uid' and Oid!=''";//更新在線時長
		$mysqli->query($sql);
		$sql = "update user_list set online=0,Oid='' where OnlineTime<'$outtime'";//刪除超時用戶
		$mysqli->query($sql);
		$sql = "select * from user_list where oid='$uid' and Status='正常'";
		$result	=	$mysqli->query($sql);
		$cou= $result->num_rows;
		if($cou==0){
			$C_Patch=$_SERVER['DOCUMENT_ROOT'];
			include_once($C_Patch."/logout.php");
			exit;
		}
		$result->close();
	}else{ //未登陆，跳转到登陆页面
		if( is_mobile() ){
			echo "<script> window.top.location.href = '/login/login.php';</script>";
			exit;
		}else{
			header("location:/login/login.php");
			exit;
		}
		
	}
}

function getWeek($num){
	$val	=	'';
	switch ($num) {
		case 0:
			$val	=	'日';
			break;
		case 1:
			$val	=	'一';
			break;
		case 2:
			$val	=	'二';
			break;
		case 3:
			$val	=	'三';
			break;
		case 4:
			$val	=	'四';
			break;
		case 5:
			$val	=	'五';
			break;
		case 6:
			$val	=	'六';
			break;
	}
	return $val;
}

function double_format($double_num){
	return $double_num>0 ? sprintf("%.2f",$double_num) : $double_num<0 ? sprintf("%.2f",$double_num) : 0;
}

function write_bet_info($ball_sort,$column,$master_guest,$bet_point,$match_showtype,$match_rgg,$match_dxgg,$match_nowscore,$tid=0){

	$dm			=	explode("VS.",$master_guest); //队名
	$qcrq		=	array("Match_Ho","Match_Ao"); //全场让球盘口
	$qcdx		=	array("Match_DxDpl","Match_DxXpl"); //全场大小盘口
	$ds			=	array("Match_DsDpl","Match_DsSpl"); //单双
	$qcdy	=	array("Match_BzM","Match_BzG","Match_BzH"); //全场独赢
	$info		=	"";


	if(strrpos($ball_sort,"足球") === 0){
		$bcrq	=	array("Match_BHo","Match_BAo"); //半场让球盘口
		$bcdx	=	array("Match_Bdpl","Match_Bxpl"); //半场大小盘口		
		$bcdy	=	array("Match_Bmdy","Match_Bgdy","Match_Bhdy"); //半场独赢
		$sbbdz	=	array("Match_Hr_Bd10","Match_Hr_Bd20","Match_Hr_Bd21","Match_Hr_Bd30","Match_Hr_Bd31","Match_Hr_Bd32"); //上半波胆主
		$sbbdk	=	array("Match_Hr_Bdg10","Match_Hr_Bdg20","Match_Hr_Bdg21","Match_Hr_Bdg30","Match_Hr_Bdg31","Match_Hr_Bdg32"); //上半波胆客
		$sbbdp	=	array("Match_Hr_Bd00","Match_Hr_Bd11","Match_Hr_Bd22","Match_Hr_Bd33","Match_Hr_Bdup5"); //上半波胆平
		$bdz	=	array("Match_Bd10","Match_Bd20","Match_Bd21","Match_Bd30","Match_Bd31","Match_Bd32","Match_Bd40","Match_Bd41","Match_Bd42","Match_Bd43"); //波胆主
		$bdk	=	array("Match_Bdg10","Match_Bdg20","Match_Bdg21","Match_Bdg30","Match_Bdg31","Match_Bdg32","Match_Bdg40","Match_Bdg41","Match_Bdg42","Match_Bdg43"); //波胆客
		$bdp	=	array("Match_Bd00","Match_Bd11","Match_Bd22","Match_Bd33","Match_Bd44","Match_Bdup5"); //波胆平
		$rqs	=	array("Match_Total01Pl","Match_Total23Pl","Match_Total46Pl","Match_Total7upPl"); //入球数
		$bqc	=	array("Match_BqMM","Match_BqMH","Match_BqMG","Match_BqHM","Match_BqHH","Match_BqHG","Match_BqGM","Match_BqGH","Match_BqGG"); //半全场
		
		if(in_array($column,$qcrq) || in_array($column,$bcrq)){ //让球
			if(in_array($column,$qcrq))		$info	.=	"让球-";
			else	$info	.=	"上半场让球-";
			
			if($match_showtype ==	"H")	$info	.=	"主让$match_rgg-";
			else	$info	.=	"客让$match_rgg-";
			
			if($column == "Match_Ho" || $column == "Match_BHo") $info .= $dm[0];
			else	$info	.=	$dm[1];
			
		}elseif(in_array($column,$qcdx) || in_array($column,$bcdx)){ //大小
			if(in_array($column,$qcdx)){
				$info		.=	"大小-";
				if($column	==	"Match_DxDpl")	$info	.=	"大";
				else $info	.=	"小";
			}else{
				$info		.=	"上半场大小-";
				if($column	==	"Match_Bdpl")	$info	.=	"大";
				else $info	.=	"小";
			}
			$info			.=	$match_dxgg;
		}elseif(in_array($column,$qcdy) || in_array($column,$bcdy)){ //独赢
			if(in_array($column,$qcdy))			$info	.=	"标准盘-";
			else	$info	.=	"上半场标准盘-";
			
			if(		$column == "Match_BzM" || $column == "Match_Bmdy") $info	.=	$dm[0]."-独赢";
			elseif(	$column == "Match_BzG" || $column == "Match_Bgdy") $info	.=	$dm[1]."-独赢";
			else	$info	.=	"和局";
		}elseif(in_array($column,$ds)){ //单双
			$info			.=	"单双-";
			if($column 		== "Match_DsDpl")	$info .= "单";
			else	$info	.=	"双";
		}elseif(in_array($column,$sbbdz) || in_array($column,$sbbdk) || in_array($column,$sbbdp) || in_array($column,$bdz) || in_array($column,$bdk) || in_array($column,$bdp)){ //波胆
			if(in_array($column,$sbbdz) || in_array($column,$sbbdk) || in_array($column,$sbbdp)) $info	.=	"上半波胆-";
			else	$info	.=	"波胆-";
			
			if(strrpos($column,"up5")){
				$info		.=	"UP5";
			}else{
				$z			 =	substr($column,-2,1);
				$k			 =	substr($column,-1,1);
				if(in_array($column,$sbbdz) || in_array($column,$bdz))	$info	.=	$z.":".$k;
				else $info	.=	$k.":".$z;
			}
		}elseif(in_array($column,$rqs)){ //入球数
			$info			.=	"入球数-";
			if(strrpos($column,"7up")){
				$info		.=	"7UP";
			}else{
				$info		.=	substr($column,-4,1)."~".substr($column,-3,1);
			}
		}elseif(in_array($column,$bqc)){ //半全场
			$info			.=	"半全场-";
			$n1				 = "".substr($column,-2,1);
			$n2				 = "".substr($column,-1,1);
			$n1				 = ($n1 === "H" ? "和" : ($n1 === "M" ? "主" : "客"));
			$n2				 = ($n2 === "H" ? "和" : ($n2 === "M" ? "主" : "客"));
			$info			.=	$n1."/".$n2;
		}
		if($ball_sort		==	"足球滚球"){
			$info		  	.=	"(".$match_nowscore.")";
		}
		$info				.=	"@".$bet_point;
	
	}elseif(strrpos($ball_sort,"篮球") === 0){
		if(in_array($column,$qcrq)){
			$info			.=	"让分-";
			if($match_showtype ==	"H") $info	.=	"主让$match_rgg-";
			else	$info	.=	"客让$match_rgg-";
			
			if($column 		== "Match_Ho")$info .= $dm[0];
			else	$info	.=	$dm[1];
			
		}elseif(in_array($column,$qcdx)){
			$info			.=	"大小-";
			if($column		==	"Match_DxDpl")$info	.=	"大$match_dxgg";
			else $info		.=	"小$match_dxgg";
			
		}elseif(in_array($column,$ds)){ //单双
			$info			.=	"单双-";
			if($column 		== "Match_DsDpl")	$info .= "单";
			else	$info	.=	"双";
		}elseif(in_array($column,$qcdy)){ //独赢
			$info	.=	"标准盘-";			
			if(		$column == "Match_BzM" || $column == "Match_Bmdy") $info	.=	$dm[0]."-独赢";
			elseif(	$column == "Match_BzG" || $column == "Match_Bgdy") $info	.=	$dm[1]."-独赢";
			else	$info	.=	"和局";
		}
		$info			  	.=	"@".$bet_point;
	}
	
	return $info;
}


/*
* 取字符串长度
*/
function str_leng($str){ 
	mb_internal_encoding("UTF-8");
	return mb_strlen($str)*12;
}

//判断是否是手机
function is_mobile()
{
        $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
        $is_pc = (strpos($agent, 'windows nt')) ? true : false;
        $is_mac = (strpos($agent, 'mac os')) ? true : false;
        $is_iphone = (strpos($agent, 'iphone')) ? true : false;
        $is_android = (strpos($agent, 'android')) ? true : false;
        $is_ipad = (strpos($agent, 'ipad')) ? true : false;
        

        if($is_pc){
              return  false;
        }
        
        if($is_mac){
              return  true;
        }
        
        if($is_iphone){
              return  true;
        }
        
        if($is_android){
              return  true;
        }
        
        if($is_ipad){
              return  true;
        }
}

/**
* 判断网站是否关闭
**/
include_once('config.php');
if($is_close){ //网站已关闭
	header("Content-type: text/vnd.wap.wml"); 
	echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.3//EN" "http://www.wapforum.org/DTD/wml13.dtd">
<wml>

	<card title="<?=$web_name?>">
		<p>
		<?=$why?>
		</p>
	</card>
</wml>
<?php
	exit;
}
?>