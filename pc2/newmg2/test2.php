<?php
session_start();
require_once 'config.php';
/*include_once("../include/config.php");
include_once("../common/login_check.php");
include_once("../include/mysqli.php");
include_once("../include/mysqlit.php");
include_once("../class/user.php");
include_once("../common/logintu.php");
include_once("../common/function.php");*/
include_once 'api.class.php';

$bbinapi = new BBIN_TZH($comId,$comKey,$gamePlatform);

$rs = $bbinapi->GameUserRegister('bmwch0906', 'htgj.87035');

echo $rs;

//$balance = $bbinapi->GetBalance('cc0909', 'aa12345');
//echo $balance;

