<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");

include_once("../class/admin.php");
include_once("../common/login_check.php");
include_once("../class/admin.php");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

check_quanxian("修改代理");

$id	            =	$_POST["id"];
$agents_name	=	$_POST["agents_name"];
$agents_pass	=	md5($_POST["agents_pass"]);
$birthday	    =	$_POST["birthday"];
$tel		    =	$_POST["tel"];
$email		    =	$_POST["email"];
$qq		        =	$_POST["qq"];
$othercon		=	$_POST["othercon"];
$agents_type	=	$_POST["agents_type"];
$total_1_1	    =	$_POST["total_1_1"];
$total_1_2		=	$_POST["total_1_2"];
$total_2_1		=	$_POST["total_2_1"];
$total_2_2		=	$_POST["total_2_2"];
$total_3_1		=	$_POST["total_3_1"];
$total_3_2		=	$_POST["total_3_2"];
$total_4_1		=	$_POST["total_4_1"];
$total_4_2		=	$_POST["total_4_2"];
$total_5_1		=	$_POST["total_5_1"];
$total_5_2		=	$_POST["total_5_2"];
$total_1_scale	=	$_POST["total_1_scale"];
$total_2_scale	=	$_POST["total_2_scale"];
$total_3_scale	=	$_POST["total_3_scale"];
$total_4_scale	=	$_POST["total_4_scale"];
$total_5_scale	=	$_POST["total_5_scale"];
$remark	        =	$_POST["remark"];
$sql = "select id,agents_name from agents_list where agents_name='$agents_name'";
$query	=	$mysqli->query($sql);
$row = $query->fetch_array();

if($id){
    if($row && $row['agents_name'] && $row['id']!=$id){
        message("该用户名已存在，请重新输入。");
        exit;
    }
    $sql = "update agents_list set agents_name='$agents_name' , birthday='$birthday' , tel='$tel' ,
                        email='$email' , qq='$qq' , othercon='$othercon',agents_type='$agents_type',total_1_1='$total_1_1',
                        total_1_2='$total_1_2' , total_2_1='$total_2_1' , total_2_2='$total_2_2',total_3_1='$total_3_1',
                        total_3_2='$total_3_2' , total_4_1='$total_4_1' , total_4_2='$total_4_2',total_5_1='$total_5_1',
                        total_5_2='$total_5_2' , total_1_scale='$total_1_scale' , total_2_scale='$total_2_scale',total_3_scale='$total_3_scale',
                        total_4_scale='$total_4_scale' , total_5_scale='$total_5_scale' , remark='remark'
                        where id=$id";
    $mysqli->query($sql);
    admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],"管理员：".$_SESSION["login_name"]."，修改了代理：".$agents_name." 的资料",$_SESSION["ssid"],"",$bj_time_now);
    message('修改代理成功!',"list.php");
}else{
    if($row && $row['agents_name']){
        message("该用户名已存在，请重新输入。");
        exit;
    }
    $sql = "insert into agents_list(agents_name,agents_pass,regtime,birthday,tel,email,qq,othercon,remark,agents_type,total_1_1,total_1_2,total_2_1,total_2_2,total_3_1,total_3_2,total_4_1,total_4_2,total_5_1,total_5_2,total_1_scale,total_2_scale,total_3_scale,total_4_scale,total_5_scale)
            values('$agents_name','$agents_pass','$bj_time_now','$birthday','$tel','$email','$qq','$othercon','$remark','$agents_type',$total_1_1,$total_1_2,$total_2_1,$total_2_2,$total_3_1,$total_3_2,$total_4_1,$total_4_2,$total_5_1,$total_5_2,$total_1_scale,$total_2_scale,$total_3_scale,$total_4_scale,$total_5_scale)";
    $mysqli->query($sql);
    admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],"管理员：".$_SESSION["login_name"]."，新增了代理：".$agents_name." 的资料",$_SESSION["ssid"],"",$bj_time_now);
    message('新增代理成功!',"list.php");
}