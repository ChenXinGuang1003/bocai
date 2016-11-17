<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
@include_once($C_Patch."/app/member/include/address.mem.php");
@include_once($C_Patch."/app/member/include/com_chk.php");
@include_once($C_Patch."/app/member/common/function.php");
@include_once($C_Patch."/app/member/class/live_info.php");
include_once($C_Patch."/app/member/class/sys_config.php");
include_once($C_Patch."/app/member/cache/website.php");
include_once($C_Patch."/live/agid.php");//加载当前站点所使用的AG代理帐号


$change_money = $_POST["change_money"];
$change_type = $_POST["change_type"];

$user_id = $_SESSION["userid"];
$user_info = live_info::getUserAndLife($user_id,'AG');
if(!$user_info){
    $sql = "select u.money,u.user_name from user_list u where u.user_id='".$_SESSION["userid"]."' limit 0,1";
    $query	=	$mysqli->query($sql);
    $user_info    =	$query->fetch_array();
}
$user_info_tyc = live_info::getUserAndLife($user_id,'TYC');
$is_allow_live = live_info::getAllowLive($user_id);
$user_info_bbin = live_info::getUserAndLife($user_id,'BBIN');
$live_username = $user_info["live_username"];
$live_username_tyc = $user_info_tyc["live_username"];
$live_username_bbin = $user_info_bbin["live_username"];

if($bbinid=="" && ($change_type=="7"||$change_type=="8"))
{
	echo "未开通BBIN!";
	exit;
}

$live_userpass = "";
//如果没有AG用户，则创建一个新的
if(!$live_username)
{
	if(substr($agid,0,3)!="AG_")
	{
		echo "代理商帐户异常,暂时无法进行转帐!";
		exit;
	}

	$AG_front =str_replace("AG_","",$agid);//取代理帐号前缀
	$AG_front=$AG_front.'_';

	$live_username=$AG_front.strtoupper($user_info["user_name"]);
	$live_userpass=randomkeys(10);

	$sql="insert into live_user (user_id,live_type,live_username,live_password,live_money_a,live_money_b,update_time) values('$user_id','AG','$live_username','$live_userpass',0,0,now())";
	$mysqli->query($sql);
	$user_info = live_info::getUserAndLife($user_id,'AG');
}


if(!$live_username_bbin && ($change_type=="7"||$change_type=="8"))
{
	if(substr($agid,0,3)!="AG_" || $bbinid=="")
	{
		echo "代理商帐户异常,暂时无法进行转帐!";
		exit;
	}

	$AG_front =str_replace("AG_","ywin",$agid);//取代理帐号前缀


	$live_username_bbin=strtolower($AG_front.$user_info["user_name"]);
	//$live_userpass=$user_info["live_password"];
	if($live_username)
	{
		$live_userpass=$user_info["live_password"];
	}
	if($live_userpass=="")
	{
		echo "异常,请重新转帐!";
		exit;
	}
	if(strlen($live_username_bbin)>20)
	{
		$live_username_bbin=substr($live_username_bbin,0,20);
		$sql		=	"select id from live_user where live_username='$live_username_bbin' limit 1";
		$query		=	$mysqli->query($sql);
		$rs			=	$query->fetch_array();
		if(!$rs['id']){
			echo "存在重复帐号,请联系管理员";
			exit;
		}
	}

	$sql="insert into live_user (user_id,live_type,live_username,live_password,live_money_a,live_money_b,update_time) values('$user_id','BBIN','$live_username_bbin','$live_userpass',0,0,now())";
	$mysqli->query($sql);
	$user_info_bbin = live_info::getUserAndLife($user_id,'BBIN');
}


if((!$live_username && ($change_type=="1"||$change_type=="2"||$change_type=="3"||$change_type=="4")) || (!$live_username_tyc && ($change_type=="5"||$change_type=="6"))|| (!$live_username_bbin && ($change_type=="7"||$change_type=="8")))
{
	echo "您尚未加入真人娱乐场,加入条件为:\n充值金额大于100,系统便会自动将您加入真人娱乐场";
	exit;
}

$min_change_money = sys_config::getMinChangeMoney();
if($change_money<$min_change_money){
    echo "小于最低转账金额，请重新输入。";
    exit;
}
$assets = $user_info["money"];
$balance = $assets-$change_money;
$isPass = "false";
$live_type = 'AG';
$zz_type = "";
$about = "";
$change_money = intval($change_money);
if(is_int($change_money) && $change_money>0){
    if($change_type=="1" && $assets>=$change_money){
        $isPass = "true";
        $zz_type = "d";
        $about = "转入AG 普通厅";
        if($is_allow_live!="1"){
            echo "不允许转账到真人，请联系客服。";
            exit;
        }
    }elseif($change_type=="2" && $assets>=$change_money){
        $isPass = "true";
        $zz_type = "vd";
        $about = "转入AG VIP厅";
        if($is_allow_live!="1"){
            echo "不允许转账到真人，请联系客服。";
            exit;
        }
    }elseif($change_type=="3"){
        $isPass = "true";
        $zz_type = "w";
        $about = "从AG 普通厅转出";
    }elseif($change_type=="4"){
        $isPass = "true";
        $zz_type = "vw";
        $about = "从AG VIP厅转出";
    }elseif($change_type=="5" && $assets>=$change_money){
        $isPass = "true";
        $live_type = "TYC";
        $zz_type = "i";
        $about = "主账户转到太阳城";
        $live_username = $live_username_tyc;
        if($is_allow_live!="1"){
            echo "不允许转账到真人，请联系客服。";
            exit;
        }
    }elseif($change_type=="6"){
        $isPass = "true";
        $live_type = "TYC";
        $zz_type = "o";
        $about = "太阳城转到主账户";
        $live_username = $live_username_tyc;
    }elseif($change_type=="7" && $assets>=$change_money){
        $isPass = "true";
        $live_type = "BBIN";
        $zz_type = "d";
        $about = "主账户转到BBIN";
        $live_username = $live_username_bbin;
        if($is_allow_live!="1"){
            echo "不允许转账到真人，请联系客服。";
            exit;
        }
    }elseif($change_type=="8"){
        $isPass = "true";
        $live_type = "BBIN";
        $zz_type = "w";
        $about = "BBIN转到主账户";
        $live_username = $live_username_bbin;
    }
    if($isPass=="true"){
        $status_log = $web_site['auto_zhenren']==1 ? 0 : 4;
        if($change_type!="1"){
            $status_log = 0;
        }
		$datereg=	date("YmdHis").randomkeys(4);
        $sql = "insert into live_log (live_type,zz_type,user_id,live_username,zz_money,status,result,add_time,do_time,order_num)
                values('$live_type','$zz_type','$user_id','$live_username','$change_money',$status_log,'正在操作，请稍等。',now(),now(),'$datereg')";
        $mysqli->query($sql);
        if($change_type=="1" || $change_type=="2" || $change_type=="5" || $change_type=="7"){
            $sql	=	"update user_list set money=$balance where money>=$change_money and $balance>=0 and user_id='$user_id'";//扣钱
            $mysqli->query($sql);
            $sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`)
                            VALUES ('$user_id','$datereg','$about',now(),'真人转账','$change_money','$assets','$balance');";
            $mysqli->query($sql);
        }
        echo "转账成功";
    }else{
        echo "数据错误，请咨询客服。";
    }
}
$mysqli->close();


function randomkeys($length)
{
 $pattern='1234567890';
 for($i=0;$i<$length;$i++)
 {
   $key .= $pattern{mt_rand(0,9)};    //生成php随机数
 }
 return $key;
} 