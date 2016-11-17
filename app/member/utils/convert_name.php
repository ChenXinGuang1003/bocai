<?php

function getZhTitleName($gType, $rType){
    $title = "";
    if($gType == "D3" || $gType == "P3" || $gType == "T3"){
        if($rType == "GST"){
            $title = "组选三";
        }elseif($rType == "GSS"){
            $title = "组选六";
        }elseif($rType == "WP"){
            $title = "一字过关";
        }elseif($rType == "FU4"){
            $title = "复选组合";
        }elseif($rType == "W3"){
            $title = "三字";
        }elseif($rType == "W1"){
            $title = "一字";
        }elseif($rType == "MCUF"){
            $title = "和尾数";
        }elseif($rType == "SN"){
            $title = "和数";
        }elseif($rType == "OEOU"){
            $title = "两面";
        }elseif($rType == "W2"){
            $title = "两字";
        }elseif($rType == "KD"){
            $title = "跨度";
        }
    }
    if($gType == "CQ" || $gType == "TJ" || $gType == "JX"){
        if($rType == "605"){
            $title = "一字";
        }elseif($rType == "616"){
            $title = "二字";
        }elseif($rType == "592"){
            $title = "和尾数";
        }elseif($rType == "601"){
            $title = "和数";
        }elseif($rType == "535"){
            $title = "两面";
        }elseif($rType == "517"){
            $title = "一字定位";
        }elseif($rType == "522"){
            $title = "二字定位";
        }elseif(in_array($rType, array("595","596","597"))){
            $title = "组选三";
        }elseif(in_array($rType, array("598","599","600"))){
            $title = "组选六";
        }elseif($rType == "589"){
            $title = "跨度";
        }
    }
    return $title;
}

function getZhRTypeName($gType, $rType){
    $rTypeName = "";
    if($gType == "D3" || $gType == "P3" || $gType == "T3"){
        if($rType== "W1"){
            $rTypeName = "一字";
        }elseif($rType== "D1M"){
            $rTypeName = "佰定位";
        }elseif($rType== "D1C"){
            $rTypeName = "拾定位";
        }elseif($rType== "D1U"){
            $rTypeName = "个定位";
        }elseif($rType== "MCUF"){
            $rTypeName = "佰拾个和尾数";
        }elseif($rType== "MCF"){
            $rTypeName = "佰拾和尾数";
        }elseif($rType== "MUF"){
            $rTypeName = "佰个和尾数";
        }elseif($rType== "CUF"){
            $rTypeName = "拾个和尾数";
        }elseif($rType== "SN"){
            $rTypeName = "和数";
        }elseif($rType== "MCS"){
            $rTypeName = "佰拾和数";
        }elseif($rType== "MUS"){
            $rTypeName = "佰个和数";
        }elseif($rType== "CUS"){
            $rTypeName = "拾个和数";
        }elseif($rType== "KD"){
            $rTypeName = "跨度";
        }elseif($rType== "W2"){
            $rTypeName = "二字";
        }elseif($rType== "D2MC"){
            $rTypeName = "佰拾定位";
        }elseif($rType== "D2MU"){
            $rTypeName = "佰个定位";
        }elseif($rType== "D2CU"){
            $rTypeName = "拾个定位";
        }elseif($rType== "OEOU"){
            $rTypeName = "两面";
        }elseif($rType == "GST"){
            $rTypeName = "组选三";
        }elseif($rType == "GSS"){
            $rTypeName = "组选六";
        }elseif($rType == "WP"){
            $rTypeName = "一字过关";
        }elseif($rType == "FU4"){
            $rTypeName = "复式组合";
        }
        elseif($rType == "LH"){
            $rTypeName = "总和龙虎和";
        }elseif($rType == "LIAN"){
            $rTypeName = "3连";
        }
    }

    if($gType == "CQ" || $gType == "TJ" || $gType == "JX"){
        if($rType == "605"){
            $rTypeName = "全五-多重彩派";
        }elseif($rType == "501"){
            $rTypeName = "(前三)一字组合";
        }elseif($rType == "502"){
            $rTypeName = "(中三)一字组合";
        }elseif($rType == "503"){
            $rTypeName = "(后三)一字组合";
        }
        elseif($rType == "616"){
            $rTypeName = "(前三)二字组合";
        }elseif($rType == "617"){
            $rTypeName = "(中三)二字组合";
        }elseif($rType == "618"){
            $rTypeName = "(后三)二字组合";
        }
        elseif($rType == "592"){
            $rTypeName = "(前三)和尾数";
        }elseif($rType == "593"){
            $rTypeName = "(中三)和尾数";
        }elseif($rType == "594"){
            $rTypeName = "(后三)和尾数";
        }elseif($rType == "606"){
            $rTypeName = "万仟和尾数";
        }elseif($rType == "607"){
            $rTypeName = "万佰和尾数";
        }elseif($rType == "608"){
            $rTypeName = "万拾和尾数";
        }elseif($rType == "609"){
            $rTypeName = "万个和尾数";
        }elseif($rType == "610"){
            $rTypeName = "仟佰和尾数";
        }elseif($rType == "611"){
            $rTypeName = "仟拾和尾数";
        }elseif($rType == "612"){
            $rTypeName = "仟个和尾数";
        }elseif($rType == "613"){
            $rTypeName = "佰拾和尾数";
        }elseif($rType == "614"){
            $rTypeName = "佰个和尾数";
        }elseif($rType == "615"){
            $rTypeName = "拾个和尾数";
        }
        elseif($rType == "601"){
            $rTypeName = "(前三)和数";
        }elseif($rType == "602"){
            $rTypeName = "(中三)和数";
        }elseif($rType == "603"){
            $rTypeName = "(后三)和数";
        }elseif($rType == "620"){
            $rTypeName = "万仟和数";
        }elseif($rType == "621"){
            $rTypeName = "万佰和数";
        }elseif($rType == "622"){
            $rTypeName = "万拾和数";
        }elseif($rType == "623"){
            $rTypeName = "万个和数";
        }elseif($rType == "624"){
            $rTypeName = "仟佰和数";
        }elseif($rType == "625"){
            $rTypeName = "仟拾和数";
        }elseif($rType == "626"){
            $rTypeName = "仟个和数";
        }elseif($rType == "627"){
            $rTypeName = "佰拾和数";
        }elseif($rType == "628"){
            $rTypeName = "佰个和数";
        }elseif($rType == "629"){
            $rTypeName = "拾个和数";
        }
        elseif($rType == "517"){
            $rTypeName = "万定位";
        }elseif($rType == "518"){
            $rTypeName = "仟定位";
        }elseif($rType == "519"){
            $rTypeName = "佰定位";
        }elseif($rType == "520"){
            $rTypeName = "拾定位";
        }elseif($rType == "521"){
            $rTypeName = "个定位";
        }
        elseif($rType == "522"){
            $rTypeName = "万仟定位";
        }elseif($rType == "523"){
            $rTypeName = "万佰定位";
        }elseif($rType == "524"){
            $rTypeName = "万拾定位";
        }elseif($rType == "525"){
            $rTypeName = "万个定位";
        }elseif($rType == "526"){
            $rTypeName = "仟佰定位";
        }elseif($rType == "527"){
            $rTypeName = "仟拾定位";
        }elseif($rType == "528"){
            $rTypeName = "仟个定位";
        }elseif($rType == "529"){
            $rTypeName = "佰拾定位";
        }elseif($rType == "530"){
            $rTypeName = "佰个定位";
        }elseif($rType == "531"){
            $rTypeName = "拾个定位";
        }
        elseif($rType == "589"){
            $rTypeName = "(前三)跨度";
        }elseif($rType == "590"){
            $rTypeName = "(中三)跨度";
        }elseif($rType == "591"){
            $rTypeName = "(后三)跨度";
        }
        elseif($rType == "535"){
            $rTypeName = "两面";
        }
        elseif($rType == "595"){
            $rTypeName = "(前三)组选三";
        }elseif($rType == "596"){
            $rTypeName = "(中三)组选三";
        }elseif($rType == "597"){
            $rTypeName = "(后三)组选三";
        }
        elseif($rType == "598"){
            $rTypeName = "(前三)组选六";
        }elseif($rType == "599"){
            $rTypeName = "(中三)组选六";
        }elseif($rType == "600"){
            $rTypeName = "(后三)组选六";
        }

        elseif($rType == "506"){
            $rTypeName = "总和龙虎和";
        }
        elseif($rType == "511"){
            $rTypeName = "豹子顺子(前三)";
        }elseif($rType == "512"){
            $rTypeName = "豹子顺子(中三)";
        }elseif($rType == "513"){
            $rTypeName = "豹子顺子(后三)";
        }

        elseif($rType == "701"){
            $rTypeName = "牛牛";
        }
    }
    return $rTypeName;
}


function getZhLhcName($rType){
    $rTypeName = "";
    if($rType == "SP" || $rType == "SPbside"){
        $rTypeName =  "特别号";
    }elseif(in_array($rType,array("N1","N2","N3","N4","N5","N6"))){
        $rTypeName = "正码特 ".substr($rType,1,1);
    }elseif($rType == "NA"){
        $rTypeName = "正码";
    }elseif($rType == "NO"){
        $rTypeName = "正码1-6";
    }elseif($rType == "OEOU"){
        $rTypeName = "两面";
    }elseif($rType == "SPA"){
        $rTypeName = "生肖";
    }elseif($rType == "C7"){
        $rTypeName = "正肖";
    }elseif($rType == "SPB"){
        $rTypeName = "一肖";
    }elseif($rType == "HB"){
        $rTypeName = "半波";
    }elseif($rType == "NAP"){
        $rTypeName = "正码过关";
    }elseif($rType == "NX"){
        $rTypeName = "合肖";
    }elseif($rType == "LX"){
        $rTypeName = "连肖";
    }elseif($rType == "LF"){
        $rTypeName = "连尾";
    }elseif($rType == "NI"){
        $rTypeName = "自选不中";
    }
    return $rTypeName;
}

function getZhPageTitle($gType){
    if($gType == "T3"){
        return "上海时时乐";
    }elseif($gType == "P3"){
        return "排列三";
    }elseif($gType == "CQ"){
        return "重庆时时彩";
    }elseif($gType == "TJ"){
        return "天津时时彩";
    }elseif($gType == "JX"){
        return "江西时时彩";
    }elseif($gType == "BJKN"){
        return "北京快乐8";
    }elseif($gType == "GXSF"){
        return "广西十分彩";
    }elseif($gType == "GDSF"){
        return "广东十分彩";
    }elseif($gType == "TJSF"){
        return "天津十分彩";
    }elseif($gType == "BJPK"){
        return "北京PK拾";
    }elseif($gType == "GD11"){
        return "广东十一选五";
    }elseif($gType == "CQSF"){
        return "重庆十分彩";
    }elseif($gType == "LT"){
        return "六合彩";
    }else{
        return "3D彩";
    }
}

function getZhOneWordPassName($value){
    $zhName = "";
    if($value=="WPM_ODD"){
        $zhName = "百 单";
    }elseif($value=="WPM_EVEN"){
        $zhName = "百 双";
    }elseif($value=="WPM_OVER"){
        $zhName = "百 大";
    }elseif($value=="WPM_UNDER"){
        $zhName = "百 小";
    }elseif($value=="WPM_PRIME"){
        $zhName = "百 质";
    }elseif($value=="WPM_COMPO"){
        $zhName = "百 合";
    }elseif($value=="WPC_ODD"){
        $zhName = "拾 单";
    }elseif($value=="WPC_EVEN"){
        $zhName = "拾 双";
    }elseif($value=="WPC_OVER"){
        $zhName = "拾 大";
    }elseif($value=="WPC_UNDER"){
        $zhName = "拾 小";
    }elseif($value=="WPC_PRIME"){
        $zhName = "拾 质";
    }elseif($value=="WPC_COMPO"){
        $zhName = "拾 合";
    }elseif($value=="WPU_ODD"){
        $zhName = "个 单";
    }elseif($value=="WPU_EVEN"){
        $zhName = "个 双";
    }elseif($value=="WPU_OVER"){
        $zhName = "个 大";
    }elseif($value=="WPU_UNDER"){
        $zhName = "个 小";
    }elseif($value=="WPU_PRIME"){
        $zhName = "个 质";
    }elseif($value=="WPU_COMPO"){
        $zhName = "个 合";
    }

    return $zhName;
}

function getZhSfRTypeName($gType, $rType){
    $rTypeName = "";
    if($gType == "BJKN"){
        if($rType=="OTHER"){
            $rTypeName = "其他";
        }elseif($rType=="MULTI_CHOOSE"){
            $rTypeName = "选号";
        }
    }elseif($gType == "GXSF"){
        if($rType=="GENERAL"){
            $rTypeName = "主盘势";
        }elseif($rType=="SP"){
            $rTypeName = "特别号";
        }elseif($rType=="SEASONS_ELEMENTS"){
            $rTypeName = "四季五行";
        }elseif($rType=="NORMAL_NUMBER"){
            $rTypeName = "正码特";
        }elseif($rType=="CHOOSE_1_MATCH_1"){
            $rTypeName = "一中一";
        }
    }elseif($gType == "GDSF"){
        if($rType=="GENERAL"){
            $rTypeName = "主盘势";
        }elseif($rType=="NUMBER_OPPOSITE"){
            $rTypeName = "单面双码";
        }elseif($rType=="SEASONS_ELEMENTS"){
            $rTypeName = "四季五行";
        }elseif($rType=="DIRECTION_ZFB"){
            $rTypeName = "方位/中发白";
        }elseif($rType=="ALLSUM_DRAGON_TIGER"){
            $rTypeName = "总和/龙虎";
        }elseif($rType=="CHOOSE_1_MATCH_1"){
            $rTypeName = "一中一";
        }
    }elseif($gType == "TJSF"){
        if($rType=="GENERAL"){
            $rTypeName = "主盘势";
        }elseif($rType=="SP"){
            $rTypeName = "特别号";
        }elseif($rType=="NORMAL_NUMBER"){
            $rTypeName = "正码特";
        }elseif($rType=="SEASONS_ELEMENTS"){
            $rTypeName = "四季五行";
        }elseif($rType=="DIRECTION_ZFB"){
            $rTypeName = "方位/中发白";
        }elseif($rType=="ALLSUM_DRAGON_TIGER"){
            $rTypeName = "总和/龙虎";
        }elseif($rType=="CHOOSE_1_MATCH_1"){
            $rTypeName = "一中一";
        }
    }elseif($gType == "BJPK"){
        if($rType=="GENERAL"){
            $rTypeName = "主盘势";
        }elseif($rType=="NORMAL_NUMBER"){
            $rTypeName = "定位";
        }elseif($rType=="SUM_FIRST_2"){
            $rTypeName = "冠亚军和";
        }elseif($rType=="MULTI_CHOOSE"){
            $rTypeName = "选号";
        }
    }elseif($gType == "GD11"){
        if($rType=="NORMAL_NUMBER"){
            $rTypeName = "正码特";
        }elseif($rType=="CHOOSE_1_MATCH_1"){
            $rTypeName = "一中一";
        }elseif($rType=="ALL_SUM_TIGER"){
            $rTypeName = "总和 龙虎和";
        }elseif($rType=="STRAIGHT_SIX"){
            $rTypeName = "顺子 杂六";
        }
    }
    return $rTypeName;
}