<?php
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