<?php
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/com_chk.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/class/live_info.php");

$user_live_list = live_info::getLifeRecordByUser($_SESSION["userid"]);
if($user_live_list && count($user_live_list)>0){
    $id = array();
    $result = array();
    foreach ($user_live_list as $key =>$userLive) {
        if($userLive["status"]!=0 && $userLive["status"]!=4){
            $id[] = "".$userLive["id"]."";
            $result[] = "".$userLive["result"]."";
        }
    }
    $result_back = '{"comments":[';
    foreach ($id as $key =>$value) {
        if(($key+1)==count($id)){
            $result_back .= '{"content":"'.$result[$key].'","id":'.$value.'}';
        }else{
            $result_back .= '{"content":"'.$result[$key].'","id":'.$value.'},';
        }
    }
    $result_back .= "]}";
    echo $result_back;
}