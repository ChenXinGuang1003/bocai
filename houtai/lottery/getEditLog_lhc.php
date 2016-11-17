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
include_once($C_Patch."/app/member/ip.php");
include_once($C_Patch."/app/member/utils/convert_name.php");
include_once("../common/login_check.php");

if(strpos($quanxian,'查看注单')){
    $id = $_GET["id"];

    global $mysqli;
    $sql	=	"select log_info,create_time from six_lottery_log WHERE id_sub='$id' AND log_type='修改投注内容' ORDER BY create_time DESC ";
    $query	=	$mysqli->query($sql)or die ("error!");
    while($row = $query->fetch_array()){
        $rs[] = $row;
    }
    if($rs){
        $editInfo = "";
        foreach($rs as $key => $value){
            $editInfo .= ($key+1)."：修改时间：".$value["create_time"]."。".$value["log_info"]."\n";
        }
        echo $editInfo;
    }else{
        echo "该条记录未被修改过。";
    }
}