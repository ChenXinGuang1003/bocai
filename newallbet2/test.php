<?php

include_once 'config.php';
include_once 'api.class.php';
$API = new BBIN_TZH($comId,$comKey,$apiKey);
//echo '1';
//echo Date('Y-m-d H:i:s');exit;
//$ro = mt_rand(100000, 999999);
$str = $API->GetRecords5('2016-04-22','2016-04-23');//bwttch0906_1460773023947189_10
echo $str;exit;
$str1 = strtotime('2016-04-25 00:00:00');

$str2 = date('Y-m-d H-i-s', $str1+24*3600);
$str3 = $API->GetRecords5($str1,$str2);//bwttch0906_1460773023947189_10
//$str = $API->GetBalance('bwttch0906','sighf65409');
echo $str3;
//$str=json_decode($str,true);
//echo $str['Message'];
exit;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AGIN</title>
        <style>
                 td{border:solid 1px #ccc;}  
        </style>
    </head>
    <body>

	<iframe src="<? echo $str; ?>" style="width:100%; height:100%;"></iframe>
	</body>
	</html>
