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

$live_id = $_POST["live_id"];
$change_type = $_POST["change_type"];
$live_type = $_POST["live_type"];


$sql = "select status,zz_money,user_id,do_time,live_type,live_username,order_num
                    from live_log where id ='$live_id' limit 0,1";
$query	=	$mysqli->query($sql);
$row    =	$query->fetch_array();
if($row && ($row["status"]==0 || $row["status"]==4)){
    $zz_money = $row["zz_money"];
    $user_id = $row["user_id"];
    $datereg = $row["order_num"];
    if($change_type=="d" && $live_type=="AG"){
        $about = "转入AG娱乐场";
    }elseif($change_type=="vd" && $live_type=="AG"){
        $about = "转入AG VIP厅";
    }elseif($change_type=="d" && $live_type=="BBIN"){
        $about = "转入BBIN娱乐场";
    }elseif($change_type=="i"){
        $about = "主账户转到太阳城";
    }

    $sql = "update live_log set `status`=1,result='转账已取消。',do_time=now() where id='$live_id'";
    $mysqli->query($sql);
    if($change_type=="d" || $change_type=="vd" || $change_type=="i"){
        $sql = "select money from user_list where user_id='$user_id' limit 0,1";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        $assets = $row["money"];
        $balance = $assets + $zz_money;
        $sql	=	"update user_list set money=$assets+$zz_money where user_id='$user_id'";//加钱
        $mysqli->query($sql);
        $sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`)
                            VALUES ('$user_id','$datereg','$about',now(),'真人转账取消','$zz_money','$assets','$balance');";
        $mysqli->query($sql);
    }
    echo "取消成功";
}else{
    echo "取消失败";
}
$mysqli->close();