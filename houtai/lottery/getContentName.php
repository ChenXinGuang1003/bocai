<?php


function getName($contentName, $gType ,$rTypeName="",$quickType=""){
    $name = $contentName;
    if(strpos($rTypeName,"快速-")!==false){
        $name = $quickType."-".$contentName;
        return $name;
    }
    if($gType=="GD11"){
        $name = getNameGd11($contentName);
    }elseif($gType=="BJPK"){
        $name = getNameBJPK($contentName);
    }elseif($gType=="BJKN"){
        $name = getNameBJKN($contentName);
    }elseif($gType=="GXSF"){
        $name = getNameGXSF($contentName);
    }elseif($gType=="GDSF"){
        $name = getNameGDSF($contentName);
    }elseif($gType=="TJSF"){
        $name = getNameTJSF($contentName);
    }elseif($gType=="CQ" || $gType=="TJ" || $gType=="JX"){
        $name = getNameb5($contentName);
    }elseif($gType=="D3" || $gType=="P3" || $gType=="T3"){
        $name = getNameB3($contentName);
    }
    return $name;
}

function getNameGd11($contentName){
    $number = $contentName;
    $betInfo = explode(":",$contentName);
    $name_gd11 = $contentName;

    if($betInfo[1]=="LOCATE"){//每球定位
        $selectBall = $betInfo[2];
        if($selectBall == "1"){
            $name_gd11 = "正码一 ".$betInfo[0];
        }elseif($selectBall == "2"){
            $name_gd11 = "正码二 ".$betInfo[0];
        }elseif($selectBall == "3"){
            $name_gd11 = "正码三 ".$betInfo[0];
        }elseif($selectBall == "4"){
            $name_gd11 = "正码四 ".$betInfo[0];
        }elseif($selectBall == "5"){
            $name_gd11 = "正码五 ".$betInfo[0];
        }
    }elseif($betInfo[1]=="MATCH"){
        $name_gd11 = $betInfo[0];
    }elseif($betInfo[0]=="TOTAL"){
        if($betInfo[1]=="OVER"){
            $name_gd11 = "总和大";
        }elseif($betInfo[1]=="UNDER"){
            $name_gd11 = "总和小";
        }elseif($betInfo[1]=="ODD"){
            $name_gd11 = "总和单";
        }elseif($betInfo[1]=="EVEN"){
            $name_gd11 = "总和双";
        }elseif($betInfo[1]=="DRAGON"){
            $name_gd11 = "龙";
        }elseif($betInfo[1]=="TIGER"){
            $name_gd11 = "虎";
        }elseif($betInfo[1]=="TIE"){
            $name_gd11 = "和";
        }
    }elseif($betInfo[0]=="BEFORE" || $betInfo[0]=="MIDDLE" || $betInfo[0]=="AFTER"){
        if($number=="BEFORE:SHUNZI"){
            $name_gd11 = "前三 顺子";
        }elseif($number=="BEFORE:BANSHUN"){
            $name_gd11 = "前三 半顺";
        }elseif($number=="BEFORE:ZALIU"){
            $name_gd11 = "前三 杂六";
        }
        elseif($number=="MIDDLE:SHUNZI"){
            $name_gd11 = "中三 顺子";
        }elseif($number=="MIDDLE:BANSHUN"){
            $name_gd11 = "中三 半顺";
        }elseif($number=="MIDDLE:ZALIU"){
            $name_gd11 = "中三 杂六";
        }
        elseif($number=="AFTER:SHUNZI"){
            $name_gd11 = "后三 顺子";
        }elseif($number=="AFTER:BANSHUN"){
            $name_gd11 = "后三 半顺";
        }elseif($number=="AFTER:ZALIU"){
            $name_gd11 = "后三 杂六";
        }
    }else{
        if($betInfo[0]=="1"){
            $name_gd11_pre = "正码一 ";
        }elseif($betInfo[0] == "2"){
            $name_gd11_pre = "正码二 ";
        }elseif($betInfo[0] == "3"){
            $name_gd11_pre = "正码三 ";
        }elseif($betInfo[0] == "4"){
            $name_gd11_pre = "正码四 ";
        }elseif($betInfo[0] == "5"){
            $name_gd11_pre = "正码五 ";
        }
        if($betInfo[1]=="OVER"){
            $name_gd11 = $name_gd11_pre."大";
        }elseif($betInfo[1]=="UNDER"){
            $name_gd11 = $name_gd11_pre."小";
        }elseif($betInfo[1]=="ODD"){
            $name_gd11 = $name_gd11_pre."单";
        }elseif($betInfo[1]=="EVEN"){
            $name_gd11 = $name_gd11_pre."双";
        }elseif($betInfo[1].":".$betInfo[2]=="SUM:ODD"){
            $name_gd11 = $name_gd11_pre."和单";
        }elseif($betInfo[1].":".$betInfo[2]=="SUM:EVEN"){
            $name_gd11 = $name_gd11_pre."和双";
        }elseif($betInfo[1].":".$betInfo[2]=="LAST:OVER"){
            $name_gd11 = $name_gd11_pre."尾大";
        }elseif($betInfo[1].":".$betInfo[2]=="LAST:UNDER"){
            $name_gd11 = $name_gd11_pre."尾小";
        }
    }

    return $name_gd11;
}

function getNameBJPK($contentName){
    $betInfo = explode(":",$contentName);
    $name_bjpk = $contentName;

    if($betInfo[1]=="LOCATE"){//每球定位
        $selectBall = $betInfo[2];
        if($selectBall == "1"){
            $name_bjpk = "冠军 ".$betInfo[0];
        }elseif($selectBall == "2"){
            $name_bjpk = "亚军 ".$betInfo[0];
        }elseif($selectBall == "3"){
            $name_bjpk = "季军 ".$betInfo[0];
        }elseif($selectBall == "4"){
            $name_bjpk = "第四名 ".$betInfo[0];
        }elseif($selectBall == "5"){
            $name_bjpk = "第五名 ".$betInfo[0];
        }elseif($selectBall == "6"){
            $name_bjpk = "第六名 ".$betInfo[0];
        }elseif($selectBall == "7"){
            $name_bjpk = "第七名 ".$betInfo[0];
        }elseif($selectBall == "8"){
            $name_bjpk = "第八名 ".$betInfo[0];
        }elseif($selectBall == "9"){
            $name_bjpk = "第九名 ".$betInfo[0];
        }elseif($selectBall == "10"){
            $name_bjpk = "第十名 ".$betInfo[0];
        }
    }elseif($betInfo[0]>0){
        $selectBall = $betInfo[0];
        if($selectBall == "1"){
            if($betInfo[2]){
                $name_bjpk = "冠军 ".getCommonName($betInfo[2]);
            }else{
                $name_bjpk = "冠军 ".getCommonName($betInfo[1]);
            }
        }elseif($selectBall == "2"){
            if($betInfo[2]){
                $name_bjpk = "亚军 ".getCommonName($betInfo[2]);
            }else{
                $name_bjpk = "亚军 ".getCommonName($betInfo[1]);
            }
        }elseif($selectBall == "3"){
            if($betInfo[2]){
                $name_bjpk = "季军 ".getCommonName($betInfo[2]);
            }else{
                $name_bjpk = "季军 ".getCommonName($betInfo[1]);
            }
        }elseif($selectBall == "4"){
            if($betInfo[2]){
                $name_bjpk = "第四名 ".getCommonName($betInfo[2]);
            }else{
                $name_bjpk = "第四名 ".getCommonName($betInfo[1]);
            }
        }elseif($selectBall == "5"){
            if($betInfo[2]){
                $name_bjpk = "第五名 ".getCommonName($betInfo[2]);
            }else{
                $name_bjpk = "第五名 ".getCommonName($betInfo[1]);
            }
        }elseif($selectBall == "6"){
            if($betInfo[2]){
                $name_bjpk = "第六名 ".getCommonName($betInfo[2]);
            }else{
                $name_bjpk = "第六名 ".getCommonName($betInfo[1]);
            }
        }elseif($selectBall == "7"){
            if($betInfo[2]){
                $name_bjpk = "第七名 ".getCommonName($betInfo[2]);
            }else{
                $name_bjpk = "第七名 ".getCommonName($betInfo[1]);
            }
        }elseif($selectBall == "8"){
            if($betInfo[2]){
                $name_bjpk = "第八名 ".getCommonName($betInfo[2]);
            }else{
                $name_bjpk = "第八名 ".getCommonName($betInfo[1]);
            }
        }elseif($selectBall == "9"){
            if($betInfo[2]){
                $name_bjpk = "第九名 ".getCommonName($betInfo[2]);
            }else{
                $name_bjpk = "第九名 ".getCommonName($betInfo[1]);
            }
        }elseif($selectBall == "10"){
            if($betInfo[2]){
                $name_bjpk = "第十名 ".getCommonName($betInfo[2]);
            }else{
                $name_bjpk = "第十名 ".getCommonName($betInfo[1]);
            }
        }
    }elseif("SUM:FIRST:2" == $betInfo[0].":".$betInfo[1].":".$betInfo[2]){
        if($betInfo[3]=="OVER"){
            $name_bjpk = "和大";
        }elseif($betInfo[3]=="UNDER"){
            $name_bjpk = "和小";
        }elseif($betInfo[3]=="ODD"){
            $name_bjpk = "和单";
        }elseif($betInfo[3]=="EVEN"){
            $name_bjpk = "和双";
        }else{
            $name_bjpk = substr($contentName,15);
        }
    }

    return $name_bjpk;
}

function getNameBJKN($contentName){
    $name_bjkn = $contentName;

    if($contentName=="ALL:SUM:ODD"){
        $name_bjkn = "和单";
    }elseif($contentName=="ALL:SUM:EVEN"){
        $name_bjkn = "和双";
    }elseif($contentName=="ALL:SUM:OVER"){
        $name_bjkn = "和大";
    }elseif($contentName=="ALL:SUM:UNDER"){
        $name_bjkn = "和小";
    }elseif($contentName=="ALL:SUM:810"){
        $name_bjkn = "和 810";
    }elseif($contentName=="TOP"){
        $name_bjkn = "上盘";
    }elseif($contentName=="MIDDLE"){
        $name_bjkn = "中盘";
    }elseif($contentName=="BOTTOM"){
        $name_bjkn = "下盘";
    }elseif($contentName=="ODD"){
        $name_bjkn = "奇盘";
    }elseif($contentName=="TIE"){
        $name_bjkn = "和盘";
    }elseif($contentName=="EVEN"){
        $name_bjkn = "偶盘";
    }elseif($contentName=="ALL:SUM:METAL"){
        $name_bjkn = "金";
    }elseif($contentName=="ALL:SUM:WOOD"){
        $name_bjkn = "木";
    }elseif($contentName=="ALL:SUM:WATER"){
        $name_bjkn = "水";
    }elseif($contentName=="ALL:SUM:FIRE"){
        $name_bjkn = "火";
    }elseif($contentName=="ALL:SUM:EARTH"){
        $name_bjkn = "土";
    }elseif($contentName=="ALL:SUM:UNDER:ODD"){
        $name_bjkn = "小单";
    }elseif($contentName=="ALL:SUM:UNDER:EVEN"){
        $name_bjkn = "小双";
    }elseif($contentName=="ALL:SUM:OVER:ODD"){
        $name_bjkn = "大单";
    }elseif($contentName=="ALL:SUM:OVER:EVEN"){
        $name_bjkn = "大双";
    }

    return $name_bjkn;
}

function getNameGXSF($contentName){
    $betInfo = explode(":",$contentName);
    $name_gxsf = $contentName;

    if($betInfo[1]=="LOCATE"){//每球定位
        $selectBall = $betInfo[2];
        if($selectBall == "1"){
            $name_gxsf = "正码一 ".$betInfo[0];
        }elseif($selectBall == "2"){
            $name_gxsf = "正码二 ".$betInfo[0];
        }elseif($selectBall == "3"){
            $name_gxsf = "正码三 ".$betInfo[0];
        }elseif($selectBall == "4"){
            $name_gxsf = "正码四 ".$betInfo[0];
        }elseif($selectBall == "S"){
            $name_gxsf = "特别号 ".$betInfo[0];
        }
    }elseif($betInfo[1]=="MATCH"){
        $name_gxsf = $betInfo[0];
    }elseif($betInfo[0]>0 || $betInfo[0]=="S"){
        $selectBall = $betInfo[0];
        if($selectBall == "1"){
            if(count($betInfo)==4){
                $name_gxsf = "正码一 ".getCommonName($betInfo[1].":".$betInfo[3]);
            }elseif($betInfo[2]){
                $name_gxsf = "正码一 ".getCommonName($betInfo[1].":".$betInfo[2]);
            }else{
                $name_gxsf = "正码一 ".getCommonName($betInfo[1]);
            }
        }elseif($selectBall == "2"){
            if(count($betInfo)==4){
                $name_gxsf = "正码二 ".getCommonName($betInfo[1].":".$betInfo[3]);
            }elseif($betInfo[2]){
                $name_gxsf = "正码二 ".getCommonName($betInfo[1].":".$betInfo[2]);
            }else{
                $name_gxsf = "正码二 ".getCommonName($betInfo[1]);
            }
        }elseif($selectBall == "3"){
            if(count($betInfo)==4){
                $name_gxsf = "正码三 ".getCommonName($betInfo[1].":".$betInfo[3]);
            }elseif($betInfo[2]){
                $name_gxsf = "正码三 ".getCommonName($betInfo[1].":".$betInfo[2]);
            }else{
                $name_gxsf = "正码三 ".getCommonName($betInfo[1]);
            }
        }elseif($selectBall == "4"){
            if(count($betInfo)==4){
                $name_gxsf = "正码四 ".getCommonName($betInfo[1].":".$betInfo[3]);
            }elseif($betInfo[2]){
                $name_gxsf = "正码四 ".getCommonName($betInfo[1].":".$betInfo[2]);
            }else{
                $name_gxsf = "正码四 ".getCommonName($betInfo[1]);
            }
        }elseif($selectBall == "S"){
            if(count($betInfo)==4){
                $name_gxsf = "特别号 ".getCommonName($betInfo[1].":".$betInfo[3]);
            }elseif($betInfo[2]){
                $name_gxsf = "特别号 ".getCommonName($betInfo[1].":".$betInfo[2]);
            }else{
                $name_gxsf = "特别号 ".getCommonName($betInfo[1]);
            }
        }
    }

    return $name_gxsf;
}
function getNameGDSF($contentName){
    $betInfo = explode(":",$contentName);
    $name_gdsf = $contentName;

    if($betInfo[1]=="LOCATE"){//每球定位
        $selectBall = $betInfo[2];
        if($selectBall == "1"){
            $name_gdsf = "第一球 ".$betInfo[0];
        }elseif($selectBall == "2"){
            $name_gdsf = "第二球 ".$betInfo[0];
        }elseif($selectBall == "3"){
            $name_gdsf = "第三球 ".$betInfo[0];
        }elseif($selectBall == "4"){
            $name_gdsf = "第四球 ".$betInfo[0];
        }elseif($selectBall == "5"){
            $name_gdsf = "第五球 ".$betInfo[0];
        }elseif($selectBall == "6"){
            $name_gdsf = "第六球 ".$betInfo[0];
        }elseif($selectBall == "7"){
            $name_gdsf = "第七球 ".$betInfo[0];
        }elseif($selectBall == "S"){
            $name_gdsf = "第八球 ".$betInfo[0];
        }
    }elseif($betInfo[1]=="MATCH"){
        $name_gdsf = $betInfo[0];
    }elseif($betInfo[0]>0 || $betInfo[0]=="S"){
        $selectBall = $betInfo[0];
        if($selectBall == "1"){
            if($betInfo[2]){
                $name_gdsf = "第一球 ".getCommonName($betInfo[1].":".$betInfo[2]);
            }else{
                $name_gdsf = "第一球 ".getCommonName($betInfo[1]);
            }
        }elseif($selectBall == "2"){
            if($betInfo[2]){
                $name_gdsf = "第二球 ".getCommonName($betInfo[1].":".$betInfo[2]);
            }else{
                $name_gdsf = "第二球 ".getCommonName($betInfo[1]);
            }
        }elseif($selectBall == "3"){
            if($betInfo[2]){
                $name_gdsf = "第三球 ".getCommonName($betInfo[1].":".$betInfo[2]);
            }else{
                $name_gdsf = "第三球 ".getCommonName($betInfo[1]);
            }
        }elseif($selectBall == "4"){
            if($betInfo[2]){
                $name_gdsf = "第四球 ".getCommonName($betInfo[1].":".$betInfo[2]);
            }else{
                $name_gdsf = "第四球 ".getCommonName($betInfo[1]);
            }
        }elseif($selectBall == "5"){
            if($betInfo[2]){
                $name_gdsf = "第五球 ".getCommonName($betInfo[1].":".$betInfo[2]);
            }else{
                $name_gdsf = "第五球 ".getCommonName($betInfo[1]);
            }
        }elseif($selectBall == "6"){
            if($betInfo[2]){
                $name_gdsf = "第六球 ".getCommonName($betInfo[1].":".$betInfo[2]);
            }else{
                $name_gdsf = "第六球 ".getCommonName($betInfo[1]);
            }
        }elseif($selectBall == "7"){
            if($betInfo[2]){
                $name_gdsf = "第七球 ".getCommonName($betInfo[1].":".$betInfo[2]);
            }else{
                $name_gdsf = "第七球 ".getCommonName($betInfo[1]);
            }
        }elseif($selectBall == "S"){
            if($betInfo[2]){
                $name_gdsf = "第八球 ".getCommonName($betInfo[1].":".$betInfo[2]);
            }else{
                $name_gdsf = "第八球 ".getCommonName($betInfo[1]);
            }
        }
        if($contentName == "1:S:DRAGON"){
            $name_gdsf = "龙";
        }elseif($contentName == "1:S:TIGER"){
            $name_gdsf = "虎";
        }
    }else{
        if($contentName == "ALL:SUM:OVER"){
            $name_gdsf = "总和大";
        }elseif($contentName == "ALL:SUM:UNDER"){
            $name_gdsf = "总和小";
        }elseif($contentName == "ALL:SUM:ODD"){
            $name_gdsf = "总和单";
        }elseif($contentName == "ALL:SUM:EVEN"){
            $name_gdsf = "总和双";
        }elseif($contentName == "ALL:SUM:LAST:OVER"){
            $name_gdsf = "总和尾数大";
        }elseif($contentName == "ALL:SUM:LAST:UNDER"){
            $name_gdsf = "总和尾数小";
        }
    }

    return $name_gdsf;
}
function getNameTJSF($contentName){
    $betInfo = explode(":",$contentName);
    $name_tjsf = $contentName;

    if($betInfo[1]=="LOCATE"){//每球定位
        $selectBall = $betInfo[2];
        if($selectBall == "1"){
            $name_tjsf = "第一球 ".$betInfo[0];
        }elseif($selectBall == "2"){
            $name_tjsf = "第二球 ".$betInfo[0];
        }elseif($selectBall == "3"){
            $name_tjsf = "第三球 ".$betInfo[0];
        }elseif($selectBall == "4"){
            $name_tjsf = "第四球 ".$betInfo[0];
        }elseif($selectBall == "5"){
            $name_tjsf = "第五球 ".$betInfo[0];
        }elseif($selectBall == "6"){
            $name_tjsf = "第六球 ".$betInfo[0];
        }elseif($selectBall == "7"){
            $name_tjsf = "第七球 ".$betInfo[0];
        }elseif($selectBall == "S"){
            $name_tjsf = "特别号 ".$betInfo[0];
        }
    }elseif($betInfo[1]=="MATCH"){
        $name_tjsf = $betInfo[0];
    }elseif($betInfo[0]>0 || $betInfo[0]=="S"){
        $selectBall = $betInfo[0];
        if($selectBall == "1"){
            if($betInfo[2]){
                $name_tjsf = "第一球 ".getCommonName($betInfo[1].":".$betInfo[2]);
            }else{
                $name_tjsf = "第一球 ".getCommonName($betInfo[1]);
            }
        }elseif($selectBall == "2"){
            if($betInfo[2]){
                $name_tjsf = "第二球 ".getCommonName($betInfo[1].":".$betInfo[2]);
            }else{
                $name_tjsf = "第二球 ".getCommonName($betInfo[1]);
            }
        }elseif($selectBall == "3"){
            if($betInfo[2]){
                $name_tjsf = "第三球 ".getCommonName($betInfo[1].":".$betInfo[2]);
            }else{
                $name_tjsf = "第三球 ".getCommonName($betInfo[1]);
            }
        }elseif($selectBall == "4"){
            if($betInfo[2]){
                $name_tjsf = "第四球 ".getCommonName($betInfo[1].":".$betInfo[2]);
            }else{
                $name_tjsf = "第四球 ".getCommonName($betInfo[1]);
            }
        }elseif($selectBall == "5"){
            if($betInfo[2]){
                $name_tjsf = "第五球 ".getCommonName($betInfo[1].":".$betInfo[2]);
            }else{
                $name_tjsf = "第五球 ".getCommonName($betInfo[1]);
            }
        }elseif($selectBall == "6"){
            if($betInfo[2]){
                $name_tjsf = "第六球 ".getCommonName($betInfo[1].":".$betInfo[2]);
            }else{
                $name_tjsf = "第六球 ".getCommonName($betInfo[1]);
            }
        }elseif($selectBall == "7"){
            if($betInfo[2]){
                $name_tjsf = "第七球 ".getCommonName($betInfo[1].":".$betInfo[2]);
            }else{
                $name_tjsf = "第七球 ".getCommonName($betInfo[1]);
            }
        }elseif($selectBall == "S"){
            if($betInfo[2]){
                $name_tjsf = "特别号 ".getCommonName($betInfo[1].":".$betInfo[2]);
            }else{
                $name_tjsf = "特别号 ".getCommonName($betInfo[1]);
            }
        }
        if($contentName == "1:S:DRAGON"){
            $name_tjsf = "龙";
        }elseif($contentName == "1:S:TIGER"){
            $name_tjsf = "虎";
        }
    }else{
        if($contentName == "ALL:SUM:OVER"){
            $name_tjsf = "总和大";
        }elseif($contentName == "ALL:SUM:UNDER"){
            $name_tjsf = "总和小";
        }elseif($contentName == "ALL:SUM:ODD"){
            $name_tjsf = "总和单";
        }elseif($contentName == "ALL:SUM:EVEN"){
            $name_tjsf = "总和双";
        }elseif($contentName == "ALL:SUM:LAST:OVER"){
            $name_tjsf = "总和尾数大";
        }elseif($contentName == "ALL:SUM:LAST:UNDER"){
            $name_tjsf = "总和尾数小";
        }
    }

    return $name_tjsf;
}

function getNameB5($contentName){
    $name_b5 = get535NameByCode($contentName);
    return $name_b5;
}

function getNameB3($contentName){
    $name_b3 = getOeouNameByCode($contentName);
    if($name_b3 == $contentName){
        if(strpos($contentName,"*")!==false){
            $betInfo = explode("*",$contentName);
            if(in_array($betInfo[0],array("0","1","2","3","4","5","6","7","8","9"))){
                return $name_b3;
            }
            if($betInfo[2]){
                $name_b3 = getOeouNameByCode($betInfo[0])."*".getOeouNameByCode($betInfo[1])."*".getOeouNameByCode($betInfo[2]);
            }else{
                $name_b3 = getOeouNameByCode($betInfo[0])."*".getOeouNameByCode($betInfo[1]);
            }
        }
    }
    return $name_b3;
}

function get535NameByCode($aConcede){
    $name = $aConcede;
    if($aConcede=="535-ODD"){
        $name = "万 单";
    }elseif($aConcede=="535-EVEN"){
        $name = "万 双";
    }elseif($aConcede=="540-OVER"){
        $name = "万 大";
    }elseif($aConcede=="540-UNDER"){
        $name = "万 小";
    }elseif($aConcede=="545-PRIME"){
        $name = "万 质";
    }elseif($aConcede=="545-COMPO"){
        $name = "万 合";
    }

    elseif($aConcede=="536-ODD"){
        $name = "仟 单";
    }elseif($aConcede=="536-EVEN"){
        $name = "仟 双";
    }elseif($aConcede=="541-OVER"){
        $name = "仟 大";
    }elseif($aConcede=="541-UNDER"){
        $name = "仟 小";
    }elseif($aConcede=="546-PRIME"){
        $name = "仟 质";
    }elseif($aConcede=="546-COMPO"){
        $name = "仟 合";
    }

    elseif($aConcede=="537-ODD"){
        $name = "佰 单";
    }elseif($aConcede=="537-EVEN"){
        $name = "佰 双";
    }elseif($aConcede=="542-OVER"){
        $name = "佰 大";
    }elseif($aConcede=="542-UNDER"){
        $name = "佰 小";
    }elseif($aConcede=="547-PRIME"){
        $name = "佰 质";
    }elseif($aConcede=="547-COMPO"){
        $name = "佰 合";
    }

    elseif($aConcede=="538-ODD"){
        $name = "拾 单";
    }elseif($aConcede=="538-EVEN"){
        $name = "拾 双";
    }elseif($aConcede=="543-OVER"){
        $name = "拾 大";
    }elseif($aConcede=="543-UNDER"){
        $name = "拾 小";
    }elseif($aConcede=="548-PRIME"){
        $name = "拾 质";
    }elseif($aConcede=="548-COMPO"){
        $name = "拾 合";
    }

    elseif($aConcede=="539-ODD"){
        $name = "个 单";
    }elseif($aConcede=="539-EVEN"){
        $name = "个 双";
    }elseif($aConcede=="544-OVER"){
        $name = "个 大";
    }elseif($aConcede=="544-UNDER"){
        $name = "个 小";
    }elseif($aConcede=="549-PRIME"){
        $name = "个 质";
    }elseif($aConcede=="549-COMPO"){
        $name = "个 合";
    }

    elseif($aConcede=="550-ODD"){
        $name = "万仟 单";
    }elseif($aConcede=="550-EVEN"){
        $name = "万仟 双";
    }elseif($aConcede=="560-OVER"){
        $name = "万仟 大";
    }elseif($aConcede=="560-UNDER"){
        $name = "万仟 小";
    }elseif($aConcede=="570-PRIME"){
        $name = "万仟 质";
    }elseif($aConcede=="570-COMPO"){
        $name = "万仟 合";
    }

    elseif($aConcede=="551-ODD"){
        $name = "万佰 单";
    }elseif($aConcede=="551-EVEN"){
        $name = "万佰 双";
    }elseif($aConcede=="561-OVER"){
        $name = "万佰 大";
    }elseif($aConcede=="561-UNDER"){
        $name = "万佰 小";
    }elseif($aConcede=="571-PRIME"){
        $name = "万佰 质";
    }elseif($aConcede=="571-COMPO"){
        $name = "万佰 合";
    }

    elseif($aConcede=="552-ODD"){
        $name = "万拾 单";
    }elseif($aConcede=="552-EVEN"){
        $name = "万拾 双";
    }elseif($aConcede=="562-OVER"){
        $name = "万拾 大";
    }elseif($aConcede=="562-UNDER"){
        $name = "万拾 小";
    }elseif($aConcede=="572-PRIME"){
        $name = "万拾 质";
    }elseif($aConcede=="572-COMPO"){
        $name = "万拾 合";
    }

    elseif($aConcede=="553-ODD"){
        $name = "万个 单";
    }elseif($aConcede=="553-EVEN"){
        $name = "万个 双";
    }elseif($aConcede=="563-OVER"){
        $name = "万个 大";
    }elseif($aConcede=="563-UNDER"){
        $name = "万个 小";
    }elseif($aConcede=="573-PRIME"){
        $name = "万个 质";
    }elseif($aConcede=="573-COMPO"){
        $name = "万个 合";
    }

    elseif($aConcede=="554-ODD"){
        $name = "仟佰 单";
    }elseif($aConcede=="554-EVEN"){
        $name = "仟佰 双";
    }elseif($aConcede=="564-OVER"){
        $name = "仟佰 大";
    }elseif($aConcede=="564-UNDER"){
        $name = "仟佰 小";
    }elseif($aConcede=="574-PRIME"){
        $name = "仟佰 质";
    }elseif($aConcede=="574-COMPO"){
        $name = "仟佰 合";
    }
    elseif($aConcede=="555-ODD"){
        $name = "仟拾 单";
    }elseif($aConcede=="555-EVEN"){
        $name = "仟拾 双";
    }elseif($aConcede=="565-OVER"){
        $name = "仟拾 大";
    }elseif($aConcede=="565-UNDER"){
        $name = "仟拾 小";
    }elseif($aConcede=="575-PRIME"){
        $name = "仟拾 质";
    }elseif($aConcede=="575-COMPO"){
        $name = "仟拾 合";
    }
    elseif($aConcede=="556-ODD"){
        $name = "仟个 单";
    }elseif($aConcede=="556-EVEN"){
        $name = "仟个 双";
    }elseif($aConcede=="566-OVER"){
        $name = "仟个 大";
    }elseif($aConcede=="566-UNDER"){
        $name = "仟个 小";
    }elseif($aConcede=="576-PRIME"){
        $name = "仟个 质";
    }elseif($aConcede=="576-COMPO"){
        $name = "仟个 合";
    }
    elseif($aConcede=="557-ODD"){
        $name = "佰拾 单";
    }elseif($aConcede=="557-EVEN"){
        $name = "佰拾 双";
    }elseif($aConcede=="567-OVER"){
        $name = "佰拾 大";
    }elseif($aConcede=="567-UNDER"){
        $name = "佰拾 小";
    }elseif($aConcede=="577-PRIME"){
        $name = "佰拾 质";
    }elseif($aConcede=="577-COMPO"){
        $name = "佰拾 合";
    }
    elseif($aConcede=="558-ODD"){
        $name = "佰个 单";
    }elseif($aConcede=="558-EVEN"){
        $name = "佰个 双";
    }elseif($aConcede=="568-OVER"){
        $name = "佰个 大";
    }elseif($aConcede=="568-UNDER"){
        $name = "佰个 小";
    }elseif($aConcede=="578-PRIME"){
        $name = "佰个 质";
    }elseif($aConcede=="578-COMPO"){
        $name = "佰个 合";
    }
    elseif($aConcede=="559-ODD"){
        $name = "拾个 单";
    }elseif($aConcede=="559-EVEN"){
        $name = "拾个 双";
    }elseif($aConcede=="569-OVER"){
        $name = "拾个 大";
    }elseif($aConcede=="569-UNDER"){
        $name = "拾个 小";
    }elseif($aConcede=="579-PRIME"){
        $name = "拾个 质";
    }elseif($aConcede=="579-COMPO"){
        $name = "拾个 合";
    }

    elseif($aConcede=="580-ODD"){
        $name = "前三 单";
    }elseif($aConcede=="580-EVEN"){
        $name = "前三 双";
    }elseif($aConcede=="583-OVER"){
        $name = "前三 大";
    }elseif($aConcede=="583-UNDER"){
        $name = "前三 小";
    }elseif($aConcede=="586-PRIME"){
        $name = "前三 质";
    }elseif($aConcede=="586-COMPO"){
        $name = "前三 合";
    }
    elseif($aConcede=="581-ODD"){
        $name = "中三 单";
    }elseif($aConcede=="581-EVEN"){
        $name = "中三 双";
    }elseif($aConcede=="584-OVER"){
        $name = "中三 大";
    }elseif($aConcede=="584-UNDER"){
        $name = "中三 小";
    }elseif($aConcede=="587-PRIME"){
        $name = "中三 质";
    }elseif($aConcede=="587-COMPO"){
        $name = "中三 合";
    }
    elseif($aConcede=="582-ODD"){
        $name = "后三 单";
    }elseif($aConcede=="582-EVEN"){
        $name = "后三 双";
    }elseif($aConcede=="585-OVER"){
        $name = "后三 大";
    }elseif($aConcede=="585-UNDER"){
        $name = "后三 小";
    }elseif($aConcede=="588-PRIME"){
        $name = "后三 质";
    }elseif($aConcede=="588-COMPO"){
        $name = "后三 合";
    }
    return $name;
}

function getOeouNameByCode($aConcede){
    $name = $aConcede;
    if($aConcede=="M_ODD"){
        $name = "佰 单";
    }elseif($aConcede=="M_EVEN"){
        $name = "佰 双";
    }elseif($aConcede=="M_OVER"){
        $name = "佰 大";
    }elseif($aConcede=="M_UNDER"){
        $name = "佰 小";
    }elseif($aConcede=="M_PRIME"){
        $name = "佰 质";
    }elseif($aConcede=="M_COMPO"){
        $name = "佰 合";
    }

    elseif($aConcede=="C_ODD"){
        $name = "拾 单";
    }elseif($aConcede=="C_EVEN"){
        $name = "拾 双";
    }elseif($aConcede=="C_OVER"){
        $name = "拾 大";
    }elseif($aConcede=="C_UNDER"){
        $name = "拾 小";
    }elseif($aConcede=="C_PRIME"){
        $name = "拾 质";
    }elseif($aConcede=="C_COMPO"){
        $name = "拾 合";
    }

    elseif($aConcede=="U_ODD"){
        $name = "个 单";
    }elseif($aConcede=="U_EVEN"){
        $name = "个 双";
    }elseif($aConcede=="U_OVER"){
        $name = "个 大";
    }elseif($aConcede=="U_UNDER"){
        $name = "个 小";
    }elseif($aConcede=="U_PRIME"){
        $name = "个 质";
    }elseif($aConcede=="U_COMPO"){
        $name = "个 合";
    }

    elseif($aConcede=="MC_ODD"){
        $name = "佰拾 单";
    }elseif($aConcede=="MC_EVEN"){
        $name = "佰拾 双";
    }elseif($aConcede=="MC_OVER"){
        $name = "佰拾 大";
    }elseif($aConcede=="MC_UNDER"){
        $name = "佰拾 小";
    }elseif($aConcede=="MC_PRIME"){
        $name = "佰拾 质";
    }elseif($aConcede=="MC_COMPO"){
        $name = "佰拾 合";
    }

    elseif($aConcede=="MU_ODD"){
        $name = "佰个 单";
    }elseif($aConcede=="MU_EVEN"){
        $name = "佰个 双";
    }elseif($aConcede=="MU_OVER"){
        $name = "佰个 大";
    }elseif($aConcede=="MU_UNDER"){
        $name = "佰个 小";
    }elseif($aConcede=="MU_PRIME"){
        $name = "佰个 质";
    }elseif($aConcede=="MU_COMPO"){
        $name = "佰个 合";
    }

    elseif($aConcede=="CU_ODD"){
        $name = "拾个 单";
    }elseif($aConcede=="CU_EVEN"){
        $name = "拾个 双";
    }elseif($aConcede=="CU_OVER"){
        $name = "拾个 大";
    }elseif($aConcede=="CU_UNDER"){
        $name = "拾个 小";
    }elseif($aConcede=="CU_PRIME"){
        $name = "拾个 质";
    }elseif($aConcede=="CU_COMPO"){
        $name = "拾个 合";
    }

    elseif($aConcede=="MCU_ODD"){
        $name = "佰拾个 单";
    }elseif($aConcede=="MCU_EVEN"){
        $name = "佰拾个 双";
    }elseif($aConcede=="MCU_OVER"){
        $name = "佰拾个 大";
    }elseif($aConcede=="MCU_UNDER"){
        $name = "佰拾个 小";
    }elseif($aConcede=="MCU_PRIME"){
        $name = "佰拾个 质";
    }elseif($aConcede=="MCU_COMPO"){
        $name = "佰拾个 合";
    }
    return $name;
}

function getCommonName($content){
    $name = "";
    if($content=="OVER"){
        $name = "大";
    }elseif($content=="UNDER"){
        $name = "小";
    }elseif($content=="ODD"){
        $name = "单";
    }elseif($content=="EVEN"){
        $name = "双";
    }elseif($content=="DRAGON"){
        $name = "龙";
    }elseif($content=="TIGER"){
        $name = "虎";
    }
    elseif($content=="SUM:ODD"){
        $name = "和单";
    }elseif($content=="SUM:EVEN"){
        $name = "和双";
    }elseif($content=="LAST:OVER"){
        $name = "尾大";
    }elseif($content=="LAST:UNDER"){
        $name = "尾小";
    }elseif($content=="RED"){
        $name = "红波";
    }elseif($content=="BLUE"){
        $name = "蓝波";
    }elseif($content=="GREEN"){
        $name = "绿波";
    }elseif($content=="OVER:ODD"){
        $name = "大单";
    }elseif($content=="OVER:EVEN"){
        $name = "大双";
    }elseif($content=="UNDER:ODD"){
        $name = "小单";
    }elseif($content=="UNDER:EVEN"){
        $name = "小双";
    }elseif($content=="SPRING"){
        $name = "春";
    }elseif($content=="SUMMER"){
        $name = "夏";
    }elseif($content=="FALL"){
        $name = "秋";
    }elseif($content=="WINTER"){
        $name = "冬";
    }elseif($content=="METAL"){
        $name = "金";
    }elseif($content=="WOOD"){
        $name = "木";
    }elseif($content=="WATER"){
        $name = "水";
    }elseif($content=="FIRE"){
        $name = "火";
    }elseif($content=="EARTH"){
        $name = "土";
    }
    elseif($content=="EAST"){
        $name = "东";
    }elseif($content=="SOUTH"){
        $name = "南";
    }elseif($content=="WEST"){
        $name = "西";
    }elseif($content=="NORTH"){
        $name = "北";
    }elseif($content=="ZHONG"){
        $name = "中";
    }elseif($content=="FA"){
        $name = "发";
    }elseif($content=="BAI"){
        $name = "白";
    }
    return $name;
}