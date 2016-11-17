<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once("../class/admin.php");

$all_user_name = $_POST['all_user_name'];
$s_time = $_POST['s_time'];
$e_time = $_POST['e_time'];
$live_type = $_POST['live_type'];
$query_time = $s_time;
$s_time_detail = "00:00:00";
$insert_time = "00:00:01";
$e_time_detail = "23:59:59";

$re_date=retimeDiffs($s_time." 00:00:00",$e_time." 00:00:00");
$lost_days=$re_date[ ' day ' ];

$need_fs = "false";

$user_array = explode(",",$all_user_name);
foreach($user_array as $key => $value){
    $username = $value;
    for($i=0;$i<=$lost_days;$i++){
        $query_time = date('Y-m-d',strtotime("+$i day",strtotime("$s_time 00:00:00")));
        $sql	=	"SELECT live_username, SUM(IFNULL(VALIDBETAMOUNT,0)) validBetAmount
                FROM live_order where 1=1 and live_username='$username'";
        $sql.=" and order_time>='".$query_time." 00:00:00'";
        $sql.=" and order_time<='".$query_time." 23:59:59'";
        $sql .= " GROUP by live_username";

        $query	=	$mysqli->query($sql);
        $results = $query->fetch_array();
        $valid_money = $results["validBetAmount"];

        $sql = "select id,fs_rate from live_user where live_username='$username' ";
        $query	=	$mysqli->query($sql);
        $results_user = $query->fetch_array();
        $fs_rate = 0;
        if($results_user && $results_user["id"]){
            $fs_rate = $results_user["fs_rate"];
        }
        $fs_money = $valid_money/100 * $fs_rate;
        $fs_money = number_format($fs_money, 2, '.', '');

        $sql = "select count(id) COUNT_ID from live_fs_list where USERNAME_LIVE='$username' ";
        $sql.=" and FSTIME>='".$query_time." 00:00:00'";
        $sql.=" and FSTIME<='".$query_time." 23:59:59'";
        $query	=	$mysqli->query($sql);
        $results_FS_LIST = $query->fetch_array();
        if($results_FS_LIST["COUNT_ID"]>0 || $fs_money==0){

        }else{
            include_once("../../app/member/class/money.php");
            $need_fs = "true";

            $sql	 =	"select u.user_id, u.money, u.user_name from user_list u,live_user l where l.user_id=u.user_id and l.live_username='$username' limit 0,1"; //取汇款前会员余额
            $query	 =	$mysqli->query($sql);
            $rows	 =	$query->fetch_array();
            $assets	 =	$rows['money'];
            $uid = $rows['user_id'];
            $user_name = $rows['user_name'];

            $sql = "insert into live_fs_list(USERNAME_LIVE,USERNAME,VALIDMONEY,FSMONEY,FS_RATE,ADDTIME,FSTIME) values('$username','$user_name','$valid_money','$fs_money','$fs_rate',now(),'".($query_time." ".substr($insert_time,0,8))."')";
            $query	=	$mysqli->query($sql);
            $id 	=	$mysqli->insert_id;

            $reason = "对用户".$user_name."的账户金额增加了".$fs_money.",理由:".$live_type."反水增加金额";
            $order	=	date("YmdHis").$id.rand(10000,99999)."_".$user_name;
            if(money::chongzhi($uid,$order,$fs_money,$assets,1,"[".$live_type."自动反水]")){
                admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],$reason,session_id(),"",$bj_time_now);
                $sql		=	"insert into money(user_id,order_value,status,order_num,pay_card,pay_num,pay_address,pay_name,about,assets,balance,type,update_time) values($uid,$fs_money,'成功','$order','','','','','".$live_type."真人反水金额',".$assets.",".($assets+$fs_money).","."'后台充值'".",'".date('Y-m-d H:i:s')."'".")";
                $mysqli->query($sql);
            }
        }
    }
}


if($need_fs=="false"){
    echo "2";
}else{
    echo "1";
}
exit;













//计算两个日期时间差,返回数组形式(如$re_date[ ' day ' ]; 返回天数差)
function retimeDiffs($aTime,$bTime){
    if($aTime=="0" or $aTime==""){
        $aTime=date("YmdHis",time());
    }
    $aTime=str_replace("-","",$aTime);$aTime=str_replace(":","",$aTime);$aTime=str_replace(" ","",$aTime);
    $bTime=str_replace("-","",$bTime);$bTime=str_replace(":","",$bTime);$bTime=str_replace(" ","",$bTime);
    // 分割第一个时间
    $ayear = substr ( $aTime , 0 , 4 );
    $amonth = substr ( $aTime , 4 , 2 );
    $aday = substr ( $aTime , 6 , 2 );
    $ahour = substr ( $aTime , 8 , 2 );
    $aminute = substr ( $aTime , 10 , 2 );
    $asecond = substr ( $aTime , 12 , 2 );
    // 分割第二个时间
    $byear = substr ( $bTime , 0 , 4 );
    $bmonth = substr ( $bTime , 4 , 2 );
    $bday = substr ( $bTime , 6 , 2 );
    $bhour = substr ( $bTime , 8 , 2 );
    $bminute = substr ( $bTime , 10 , 2 );
    $bsecond = substr ( $bTime , 12 , 2 );
    // 生成时间戳
    $a = mktime ( $ahour , $aminute , $asecond , $amonth , $aday , $ayear );
    $b = mktime ( $bhour , $bminute , $bsecond , $bmonth , $bday , $byear );
    $timeDiff [ ' second ' ] = $b-$a ;

    // 采用了四舍五入,可以修改
    $timeDiff [ ' minute ' ]=round ( $timeDiff [ ' second ' ] / 60 );
    $timeDiff [ ' hour ' ]=round ( $timeDiff [ ' minute ' ] / 60 );
    $timeDiff [ ' day ' ] = round ( $timeDiff [ ' hour ' ] / 24 );
    if ($timeDiff [ ' hour ' ]< 24){$timeDiff [ ' day ' ]=0;}
    $timeDiff [ ' week ' ] = round ( $timeDiff [ ' day ' ] / 7 );
    if ($timeDiff [ ' day ' ]< 7){$timeDiff [ ' week ' ]=0;}
    $timeDiff [ ' month ' ] = round ( $timeDiff [ ' day ' ] / 30 ); // 按30天来算
    if ($timeDiff [ ' day ' ]< 30){$timeDiff [ ' month ' ]=0;}
    $timeDiff [ ' year ' ] = round ( $timeDiff [ ' day ' ] / 365 ); // 按365天来算
    if ($timeDiff [ ' day ' ]< 365){$timeDiff [ ' year ' ]=0;}
    // $retimeDiff=$timeDiff [ ' year ']."|".$timeDiff [' month ']."|".$timeDiff [' week ']."|".$timeDiff [' day ']."|".$timeDiff [' hour ']."|".$timeDiff [ ' minute ' ];
    //$retimeDiff=round($timeDiff);
    return $timeDiff ;
}