<?php
//返回当前IP的城市字符串  
function convertip($ip,$dir='') {
    //IP数据文件路径
    $dat_path = $_SERVER['DOCUMENT_ROOT'].'\app\member\date\ip_date.Dat';
  
    //检查IP地址  
    if(!preg_match("/^(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$/", $ip)) {  
        return 'IP地址错误';  
    }  
    //打开IP数据文件  
    if(!$fd = @fopen($dat_path, 'rb')){  
        return 'IP数据文件不存在或拒绝访问';  
    }  
  
    //分解IP进行运算，得出整形数  
    $ip = explode('.', $ip);  
    $ipNum = $ip[0] * 16777216 + $ip[1] * 65536 + $ip[2] * 256 + $ip[3];  
  
    //获取IP数据索引开始和结束位置  
    $DataBegin = fread($fd, 4);  
    $DataEnd = fread($fd, 4);  
    $ipbegin = implode('', unpack('L', $DataBegin));  
    if($ipbegin < 0) $ipbegin += pow(2, 32);  
    $ipend = implode('', unpack('L', $DataEnd));  
    if($ipend < 0) $ipend += pow(2, 32);  
    $ipAllNum = ($ipend - $ipbegin) / 7 + 1;  
      
    $BeginNum = 0;  
    $EndNum = $ipAllNum;  
  
    //使用二分查找法从索引记录中搜索匹配的IP记录  
    while($ip1num>$ipNum || $ip2num<$ipNum) {  
        $Middle= intval(($EndNum + $BeginNum) / 2);  
  
        //偏移指针到索引位置读取4个字节  
        fseek($fd, $ipbegin + 7 * $Middle);  
        $ipData1 = fread($fd, 4);  
        if(strlen($ipData1) < 4) {  
            fclose($fd);  
            return '系统错误';  
        }  
        //提取出来的数据转换成长整形，如果数据是负数则加上2的32次幂  
        $ip1num = implode('', unpack('L', $ipData1));  
        if($ip1num < 0) $ip1num += pow(2, 32);  
          
        //提取的长整型数大于我们IP地址则修改结束位置进行下一次循环  
        if($ip1num > $ipNum) {  
            $EndNum = $Middle;  
            continue;  
        }  
          
        //取完上一个索引后取下一个索引  
        $DataSeek = fread($fd, 3);  
        if(strlen($DataSeek) < 3) {  
            fclose($fd);  
            return '系统错误';  
        }  
        $DataSeek = implode('', unpack('L', $DataSeek.chr(0)));  
        fseek($fd, $DataSeek);  
        $ipData2 = fread($fd, 4);  
        if(strlen($ipData2) < 4) {  
            fclose($fd);  
            return '系统错误';  
        }  
        $ip2num = implode('', unpack('L', $ipData2));  
        if($ip2num < 0) $ip2num += pow(2, 32);  
  
        //没找到提示未知  
        if($ip2num < $ipNum) {  
            if($Middle == $BeginNum) {  
                fclose($fd);  
                return '未知错误';  
            }  
            $BeginNum = $Middle;  
        }  
    }  
  
    $ipFlag = fread($fd, 1);  
    if($ipFlag == chr(1)) {  
        $ipSeek = fread($fd, 3);  
        if(strlen($ipSeek) < 3) {  
            fclose($fd);  
            return '系统错误';  
        }  
        $ipSeek = implode('', unpack('L', $ipSeek.chr(0)));  
        fseek($fd, $ipSeek);  
        $ipFlag = fread($fd, 1);  
    }  
  
    if($ipFlag == chr(2)) {  
        $AddrSeek = fread($fd, 3);  
        if(strlen($AddrSeek) < 3) {  
            fclose($fd);  
            return '系统错误';  
        }  
        $ipFlag = fread($fd, 1);  
        if($ipFlag == chr(2)) {  
            $AddrSeek2 = fread($fd, 3);  
            if(strlen($AddrSeek2) < 3) {  
                fclose($fd);  
                return '系统错误';  
            }  
            $AddrSeek2 = implode('', unpack('L', $AddrSeek2.chr(0)));  
            fseek($fd, $AddrSeek2);  
        } else {  
            fseek($fd, -1, SEEK_CUR);  
        }  
  
        while(($char = fread($fd, 1)) != chr(0))  
            $ipAddr2 .= $char;  
  
        $AddrSeek = implode('', unpack('L', $AddrSeek.chr(0)));  
        fseek($fd, $AddrSeek);  
  
        while(($char = fread($fd, 1)) != chr(0))  
            $ipAddr1 .= $char;  
    } else {  
        fseek($fd, -1, SEEK_CUR);  
        while(($char = fread($fd, 1)) != chr(0))  
            $ipAddr1 .= $char;  
  
        $ipFlag = fread($fd, 1);  
        if($ipFlag == chr(2)) {  
            $AddrSeek2 = fread($fd, 3);  
            if(strlen($AddrSeek2) < 3) {  
                fclose($fd);  
                return '系统错误';  
            }  
            $AddrSeek2 = implode('', unpack('L', $AddrSeek2.chr(0)));  
            fseek($fd, $AddrSeek2);  
        } else {  
            fseek($fd, -1, SEEK_CUR);  
        }  
        while(($char = fread($fd, 1)) != chr(0)){  
            $ipAddr2 .= $char;  
        }  
    }  
    fclose($fd);  
  
    //最后做相应的替换操作后返回结果  
    if(preg_match('/http/i', $ipAddr2)) {  
        $ipAddr2 = '';  
    }  
    $ipaddr = "$ipAddr1 $ipAddr2";  
    $ipaddr = preg_replace('/CZ88.Net/is', '', $ipaddr);  
    $ipaddr = preg_replace('/^s*/is', '', $ipaddr);  
    $ipaddr = preg_replace('/s*$/is', '', $ipaddr);  
    if(preg_match('/http/i', $ipaddr) || $ipaddr == '') {  
        $ipaddr = '未知错误';  
    }  
  
    return $ipaddr;  
}  
  
  
//查找字符串  
function findstr($str, $substr)  
{  
         $m = strlen($str);  
        $n = strlen($substr );  
        if ($m < $n) return false ;  
        for ($i=0; $i <=($m-$n+1); $i ++){  
                $sub = substr( $str, $i, $n);  
                if ( strcmp($sub, $substr) == 0) return true;  
        }  
        return false ;  
}   
?>