<?php
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/utils/login_check.php");

if(!user::islogin()){
    echo "<script>alert(\"请登录后再进行存款和提款操作\");location.href='zhuce.php';</script>";
    exit();
}else{
    $sql	=	"select pay_name,pay_bank from user_list where user_id='".$_SESSION["userid"]."' limit 1";
    $query	=	$mysqli->query($sql);
    $rs		=	$query->fetch_array();
    if($rs['pay_bank'] == ""){
        $get_pay_name = $rs["pay_name"];
        include_once "../app/member/user/set_card.php";
        exit();
    }else{
        include_once "../app/member/money/tikuan.php";
        exit();
    }
}
