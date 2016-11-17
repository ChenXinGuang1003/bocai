<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
@include_once($C_Patch."/app/member/include/config.inc.php");

$uid=$_SESSION["uid"];
$userid=$_SESSION["userid"];
$group_id=$_SESSION["group_id"];
$username=$_SESSION["username"];	

if(isset($_SESSION["uid"]) && $_SESSION["uid"]!=""){
	$datetime=date('Y-m-d H:i:s',time());
	$outtime=date('Y-m-d H:i:s',time()-60*30);
    $needtime = date('Y-m-d H:i:s',strtotime('-1 hour'));

    $date_roon = date('Y-m-d',time())." 00:00:00";
    $date_second = strtotime($datetime)-strtotime($date_roon);
    if($date_second%600<30 && $date_second%600>0){
        $sql = "update user_list set online=1,OnlineTime='$datetime' where Oid='$uid' and Oid!=''";//更新在線時長
        $mysqli->query($sql);
        $sql = "update user_list set online=0,Oid='' where OnlineTime<'$outtime' and OnlineTime>'$needtime' and (Oid<>'' or online=1)";//刪除超時用戶
        $mysqli->query($sql);
        if(($date_second>0 && $date_second<120) || ($date_second>21600 && $date_second<21720) || ($date_second>43200 && $date_second<43400) || ($date_second>61200 && $date_second<61360)){//在每天0点，6点，12点，17点的时候做一次全部删除会员动作
            $sql = "update user_list set online=0,Oid='' where OnlineTime<'$outtime' and (Oid<>'' or online=1)";//刪除超時用戶
            $mysqli->query($sql);
        }
    }
	$sql = "select * from user_list where oid='$uid' and Status='正常'";
	$result	=	$mysqli->query($sql);
	$cou= $result->num_rows;
	if($cou==0){
		@include_once($C_Patch."/app/member/logout.php");
		exit;
	}
	$result->close();
}

?>
