<?php
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // Date in the past
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");  // HTTP/1.1
header ("Pragma: no-cache");                          // HTTP/1.0
include_once("db.php");
include_once("pub_library.php");
include_once("http.class.php");
include_once("function.php");
include_once("mysqli.php");

$langx='zh-cn';
$C_Patch = $_SERVER["DOCUMENT_ROOT"];
$data=theif_data($webdb["datesite"],$webdb["cookie"],'FT','re',$langx,0);

if(sizeof(explode("gamount",$data))>1){
    $k        =    0;
    preg_match_all("/g\((.+?)\);/is",$data,$matches);
    $cou    =    sizeof($matches[0]);

    $meg    = "本次无数据采集";
    $cache    = "<?php\r\nunset(\$zqgq,\$count,\$lasttime);\r\n";
    $cache .= "\$zqgq        =    array();\r\n";
    $cache .= "\$lasttime    =    ".(time()+7).";\r\n";
    $str    = "";
    $time    = date("Y-m-d H:i:s");
    $xb        = 0;
    for($i=0;$i<$cou;$i++){
        $messages=$matches[0][$i];
		$messages=str_replace("g([","Array(",$messages);
		$messages=str_replace("]);",")",$messages);
        $messages=str_replace("cha(9)","",$messages);
        $datainfo=eval("return $messages;");
        
        if(in_array($datainfo[0],$gp_db) || strpos($datainfo[1],':')){
            //有关盘的联赛则不开盘，02:15a 有 : 表示未开赛,未开赛不采集
        }else{
            $datainfo[8]    =    str_replace(' ','',$datainfo[8]);
            $datainfo[11]    =    str_replace(' ','',$datainfo[11]);
            $datainfo[22]    =    str_replace(' ','',$datainfo[22]);
            $datainfo[25]    =    str_replace(' ','',$datainfo[25]);
            $datainfo[11]    =    substr($datainfo[11],1,strlen($datainfo[11])-1);
            $datainfo[25]    =    substr($datainfo[25],1,strlen($datainfo[25])-1);
            
            $dx    =    array();
            $dx    =    get_HK_ior($datainfo[9],$datainfo[10]);
            if($dx[0])$dx[0]+=0.05;
            if($dx[1])$dx[1]+=0.05;
            $datainfo[9]    =    $dx[0];
            $datainfo[10]    =    $dx[1];
            $dx    =    get_HK_ior($datainfo[23],$datainfo[24]);
            if($dx[0])$dx[0]+=0.05;
            if($dx[1])$dx[1]+=0.05;
            $datainfo[23]    =    $dx[0];
            $datainfo[24]    =    $dx[1];
            $dx    =    get_HK_ior($datainfo[13],$datainfo[14]);
            if($dx[0])$dx[0]+=0.05;
            if($dx[1])$dx[1]+=0.05;
            $datainfo[13]    =    $dx[0];
            $datainfo[14]    =    $dx[1];
            $dx    =    get_HK_ior($datainfo[27],$datainfo[28]);
            if($dx[0])$dx[0]+=0.05;
            if($dx[1])$dx[1]+=0.05;
            $datainfo[27]    =    $dx[0];
            $datainfo[28]    =    $dx[1];
            
            if(strpos($datainfo[1],'</font>')) $datainfo[1] = '45.5';
            
            $str    .= "\$zqgq[$xb]['Match_ID']            =    '$datainfo[0]';\r\n";
            $str    .= "\$zqgq[$xb]['Match_Master']        =    '$datainfo[5]';\r\n";
            $str    .= "\$zqgq[$xb]['Match_Guest']            =    '$datainfo[6]';\r\n";
            $str    .= "\$zqgq[$xb]['Match_Name']            =    '$datainfo[2]';\r\n";
            $str    .= "\$zqgq[$xb]['Match_Time']            =    '$datainfo[1]';\r\n";
            $str    .= "\$zqgq[$xb]['Match_Ho']            =    '".sprintf("%.2f",$datainfo[9])."';\r\n";
            $str    .= "\$zqgq[$xb]['Match_DxDpl']            =    '".sprintf("%.2f",$datainfo[14])."';\r\n";
            $str    .= "\$zqgq[$xb]['Match_BHo']            =    '".sprintf("%.2f",$datainfo[23])."';\r\n";
            $str    .= "\$zqgq[$xb]['Match_Bdpl']            =    '".sprintf("%.2f",$datainfo[28])."';\r\n";
            $str    .= "\$zqgq[$xb]['Match_Ao']            =    '".sprintf("%.2f",$datainfo[10])."';\r\n";
            $str    .= "\$zqgq[$xb]['Match_DxXpl']            =    '".sprintf("%.2f",$datainfo[13])."';\r\n";
            $str    .= "\$zqgq[$xb]['Match_BAo']            =    '".sprintf("%.2f",$datainfo[24])."';\r\n";
            $str    .= "\$zqgq[$xb]['Match_Bxpl']            =    '".sprintf("%.2f",$datainfo[27])."';\r\n";
            $str    .= "\$zqgq[$xb]['Match_RGG']            =    '$datainfo[8]';\r\n";
            $str    .= "\$zqgq[$xb]['Match_BRpk']            =    '$datainfo[22]';\r\n";
            $str    .= "\$zqgq[$xb]['Match_ShowType']        =    '$datainfo[7]';\r\n";
            $str    .= "\$zqgq[$xb]['Match_Hr_ShowType']    =    '$datainfo[7]';\r\n";
            $str    .= "\$zqgq[$xb]['Match_DxGG']            =    '$datainfo[11]';\r\n";
            $str    .= "\$zqgq[$xb]['Match_Bdxpk']            =    '$datainfo[25]';\r\n";
            $str    .= "\$zqgq[$xb]['Match_HRedCard']        =    '$datainfo[29]';\r\n";
            $str    .= "\$zqgq[$xb]['Match_GRedCard']        =    '$datainfo[30]';\r\n";
            $str    .= "\$zqgq[$xb]['Match_NowScore']        =    '$datainfo[18]:$datainfo[19]';\r\n";
            $str    .= "\$zqgq[$xb]['Match_BzM']            =    '".sprintf("%.2f",$datainfo[33])."';\r\n";
            $str    .= "\$zqgq[$xb]['Match_BzG']            =    '".sprintf("%.2f",$datainfo[34])."';\r\n";
            $str    .= "\$zqgq[$xb]['Match_BzH']            =    '".sprintf("%.2f",$datainfo[35])."';\r\n";
            $str    .= "\$zqgq[$xb]['Match_Bmdy']            =    '".sprintf("%.2f",$datainfo[36])."';\r\n";
            $str    .= "\$zqgq[$xb]['Match_Bgdy']            =    '".sprintf("%.2f",$datainfo[37])."';\r\n";
            $str    .= "\$zqgq[$xb]['Match_Bhdy']            =    '".sprintf("%.2f",$datainfo[38])."';\r\n";
            $str    .= "\$zqgq[$xb]['Match_CoverDate']        =    '$time';\r\n";
            $str    .= "\$zqgq[$xb]['Match_Date']            =    '$datainfo[42]';\r\n";
            $str    .= "\$zqgq[$xb]['Match_Type']            =    '2';\r\n";
            $xb++;
        }
    }
    
    if($str == ""){
        include_once("/app/member/cache/zqgq.php");
        echo $count;
        if($count){
            $cache       .=    "\$count        =    0;\r\n";
            /* 滚球入库 begin */
            $gunqiu_str=addslashes(htmlspecialchars(trim($cache,'<?php')));
           // $sql="update gunqiu set mid_str='$gunqiu_str',lasttime=DATE_ADD(now(),INTERVAL 15 SECOND) WHERE id=1";
            //$mysqli->query($sql);
            /* 滚球入库 end */
            if(!write_file($C_Patch ."/app/member/cache/zqgq.php",$cache.'?>')){ //写入缓存失败
                $meg    =    "缓存文件写入失败！请先设/cache/zqgq.php文件权限为：0777";
            }
        }
    }else{
        $cache       .=    "\$count        =    $xb;\r\n";
        $cache       .=    $str;
        /* 滚球入库 begin */
        $gunqiu_str=addslashes(htmlspecialchars(trim($cache,'<?php')));
        //$sql="update gunqiu set mid_str='$gunqiu_str',lasttime=DATE_ADD(now(),INTERVAL 15 SECOND) WHERE id=1";
       // $mysqli->query($sql);
        /* 滚球入库 end */
        if(!write_file($C_Patch ."/app/member/cache/zqgq.php",$cache.'?>')){ //写入缓存失败
            $meg    =    "缓存文件写入失败！请先设/cache/zqgq.php文件权限为：0777";
        }else{
            $meg    =    "$i 条走地数据！";
        }
    }
    unset($cache);
}else{
    $bool    =    true;
    if($webdb["cookie"]){
        include('/app/member/cache/zqgq.php');
        $ltime    =    $lasttime;
        include('/app/member/cache/lqgq.php');
        if($lasttime > $ltime) $ltime    =    $lasttime; 
        if(time()-$ltime < 200){ //4分钟后可以再登陆一次
            $bool    =    false;
        }    
    }
    if($bool){
        theif_uid($langx);
        
        $cache    = "<?php\r\nunset(\$zqgq,\$count,\$lasttime);\r\n";
        $cache .= "\$zqgq        =    array();\r\n";
        $cache .= "\$lasttime    =    ".(time()+7).";\r\n";
        /* 滚球入库 begin */
        $gunqiu_str=addslashes(htmlspecialchars(trim($cache,'<?php')));
        //$sql="update gunqiu set mid_str='$gunqiu_str',lasttime=DATE_ADD(now(),INTERVAL 15 SECOND) WHERE id=1";
       // $mysqli->query($sql);
        /* 滚球入库 end */
        if(!write_file($C_Patch ."/app/member/cache/zqgq.php",$cache.'?>')){ //写入缓存失败
            $meg    =    "缓存文件写入失败！请先设/cache/zqgq.php文件权限为：0777";
        }
    }
}
//echo $str;
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
  <style type="text/css">
<!--
body,td,th {
    font-size: 12px;
}
body {
    margin-left: 0px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
}
-->
</style></head>

<body>
<script> 
<!-- 
var limit="12";
if (document.images){ 
    var parselimit=limit;
} 
function beginrefresh(){ 
if (!document.images) 
    return 
if (parselimit==1) 
    window.location.href="zqgq2.php";
else{ 
    parselimit-=1 
    curmin=Math.floor(parselimit) 
    if (curmin!=0) 
        curtime=curmin+"秒后获取数据！" 
    else 
        curtime=cursec+"秒后获取数据！" 
        timeinfo.innerText=curtime 
        setTimeout("beginrefresh()",1000) 
    } 
} 

window.parent.zqgq = 1;
window.onload=beginrefresh

function killerrors() {
	return true;
}
window.onerror = killerrors;  
 
</script>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td align="left">
    <input type=button name=button value="刷新" onClick="window.location.reload()">
    足球:<?=$meg?>
        <span id="timeinfo"></span>
        </td>
  </tr>
</table>
<iframe src="/zj6k6/sports/AUTO_lose.php" frameborder="0" scrolling="no" height="0" width="0"></iframe>
</body>
</html>