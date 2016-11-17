<?php

function convertToEn($nameZh){
    $enName = "";
    if($nameZh=="单"){
        $enName = "ODD";
    }elseif($nameZh=="双"){
        $enName = "EVEN";
    }elseif($nameZh=="大"){
        $enName = "OVER";
    }elseif($nameZh=="小"){
        $enName = "UNDER";
    }elseif($nameZh=="尾大"){
        $enName = "LAST:OVER";
    }elseif($nameZh=="尾小"){
        $enName = "LAST:UNDER";
    }elseif($nameZh=="合数双"){
        $enName = "SUM:EVEN";
    }elseif($nameZh=="合数单"){
        $enName = "SUM:ODD";
    }
    elseif($nameZh=="东"){
        $enName = "EAST";
    }elseif($nameZh=="南"){
        $enName = "SOUTH";
    }elseif($nameZh=="西"){
        $enName = "WEST";
    }elseif($nameZh=="北"){
        $enName = "NORTH";
    }elseif($nameZh=="中"){
        $enName = "ZHONG";
    }elseif($nameZh=="发"){
        $enName = "FA";
    }elseif($nameZh=="白"){
        $enName = "BAI";
    }elseif($nameZh=="春"){
        $enName = "SPRING";
    }elseif($nameZh=="夏"){
        $enName = "SUMMER";
    }elseif($nameZh=="秋"){
        $enName = "FALL";
    }elseif($nameZh=="冬"){
        $enName = "WINTER";
    }elseif($nameZh=="金"){
        $enName = "METAL";
    }elseif($nameZh=="木"){
        $enName = "WOOD";
    }elseif($nameZh=="水"){
        $enName = "WATER";
    }elseif($nameZh=="火"){
        $enName = "FIRE";
    }elseif($nameZh=="土"){
        $enName = "EARTH";
    }

    elseif($nameZh=="总和大"){
        $enName = "SUM:OVER";
    }elseif($nameZh=="总和小"){
        $enName = "SUM:UNDER";
    }elseif($nameZh=="和"){
        $enName = "SUM:TIE";
    }elseif($nameZh=="总和单"){
        $enName = "SUM:ODD";
    }elseif($nameZh=="总和双"){
        $enName = "SUM:EVEN";
    }elseif($nameZh=="总和尾大"){
        $enName = "SUM:LAST:OVER";
    }elseif($nameZh=="总和尾小"){
        $enName = "SUM:LAST:UNDER";
    }elseif($nameZh=="龙"){
        $enName = "S:DRAGON";
    }elseif($nameZh=="虎"){
        $enName = "S:TIGER";
    }
    return $enName;
}
function convertToEnPK10($nameZh,$type){
    $enName = "";
    if($nameZh=="龙"){
        $enName = $type.":".(11-$type).":DRAGON";
    }else if($nameZh=="虎"){
        $enName = $type.":".(11-$type).":TIGER";
    }else if($nameZh=="冠亚大"){
        $enName = "OVER";
    }elseif($nameZh=="冠亚小"){
        $enName = "UNDER";
    }elseif($nameZh=="冠亚双"){
        $enName = "EVEN";
    }elseif($nameZh=="冠亚单"){
        $enName = "ODD";
    }elseif($nameZh=="冠亚和"){
        $enName = "SUM:TIE";
    }
    return $enName;
}

//广东快乐十分开奖函数
function G10_Auto($num , $type){
	$zh = $num[0]+$num[1]+$num[2]+$num[3]+$num[4]+$num[5]+$num[6]+$num[7];
	if($type==1){
        return $zh;
	}
	if($type==2){
		if($zh>=85 && $zh<=132){
			return '总和大';
		}
		if($zh>=36 && $zh<=83){
			return '总和小';
		}
		if($zh==84){
			return '和';
		}
	}
	if($type==3){
		if($zh%2==0){
			return '总和双';
		}else{
			return '总和单';
		}
	}
	if($type==4){
		$zhws = substr($zh,strlen($zh)-1);
		if($zhws>=5){
			return '总和尾大';
		}else{
			return '总和尾小';
		}
	}
	if($type==5){
		if($num[0]>$num[7]){
			return '龙';
		}else{
			return '虎';
		}
	}
}
//广东快乐十分单双
function G10_Ds($ball){
	if($ball%2==0){
		return '双';
	}else{
		return '单';
	}
}
//广东快乐十分大小
function G10_Dx($ball){
	if($ball>10){
		return '大';
	}else{
		return '小';
	}
}
//广东快乐十分尾数大小
function G10_WsDx($ball){
	$wsdx = substr($ball, -1);
	if($wsdx>4){
		return '尾大';
	}else{
		return '尾小';
	}
}
//广东快乐十分合数单双
function G10_HsDs($ball){
	$ball = BuLing($ball);
	$a = substr($ball, 0,1);
	$b = substr($ball, -1);
	$c = $a+$b;
	if($c%2==0){
		return '合数双';
	}else{
		return '合数单';
	}
}
//广东快乐十分号码方位
function G10_Fw($ball){
	if(BuLing($ball) == '01' || BuLing($ball) == '05' || BuLing($ball) == '09' || BuLing($ball) == '13' || BuLing($ball) == '17'){
		$fw = '东';
	}else if(BuLing($ball) == '02' || BuLing($ball) == '06' || BuLing($ball) == '10' || BuLing($ball) == '14' || BuLing($ball) == '18'){
		$fw = '南';
	}else if(BuLing($ball) == '03' || BuLing($ball) == '07' || BuLing($ball) == '11' || BuLing($ball) == '15' || BuLing($ball) == '19'){
		$fw = '西';
	}else{
		$fw = '北';
	}
	return $fw;
}
//广东快乐十分号码中发白
function G10_Zfb($ball){
	if(BuLing($ball) == '01' || BuLing($ball) == '02' || BuLing($ball) == '03' || BuLing($ball) == '04' || BuLing($ball) == '05' || BuLing($ball) == '06' || BuLing($ball) == '07'){
		$zfb = '中';
	}else if(BuLing($ball) == '08' || BuLing($ball) == '09' || BuLing($ball) == '10' || BuLing($ball) == '11' || BuLing($ball) == '12' || BuLing($ball) == '13' || BuLing($ball) == '14'){
		$zfb = '发';
	}else{
		$zfb = '白';
	}
	return $zfb;
}
//广东快乐十分号码春夏秋冬
function G10_season($ball){
    if(BuLing($ball) == '01' || BuLing($ball) == '02' || BuLing($ball) == '03' || BuLing($ball) == '04' || BuLing($ball) == '05'){
        $season = '春';
    }else if(BuLing($ball) == '06' || BuLing($ball) == '07' || BuLing($ball) == '08' || BuLing($ball) == '09' || BuLing($ball) == '10'){
        $season = '夏';
    }else if(BuLing($ball) == '11' || BuLing($ball) == '12' || BuLing($ball) == '13' || BuLing($ball) == '14' || BuLing($ball) == '15'){
        $season = '秋';
    }else{
        $season = '冬';
    }
    return $season;
}
//广东快乐十分号码春夏秋冬
function G10_wuxing($ball){
    if(BuLing($ball) == '05' || BuLing($ball) == '10' || BuLing($ball) == '15' || BuLing($ball) == '20'){
        $wuxing = '金';
    }else if(BuLing($ball) == '01' || BuLing($ball) == '06' || BuLing($ball) == '11' || BuLing($ball) == '16'){
        $wuxing = '木';
    }else if(BuLing($ball) == '02' || BuLing($ball) == '07' || BuLing($ball) == '12' || BuLing($ball) == '17'){
        $wuxing = '水';
    }else if(BuLing($ball) == '03' || BuLing($ball) == '08' || BuLing($ball) == '13' || BuLing($ball) == '18'){
        $wuxing = '火';
    }else{
        $wuxing = '土';
    }
    return $wuxing;
}


//广西十分彩 结算函数
function gxsf_Ds($ball){
    if($ball==21){
        return '和';
    }
    if($ball%2==0){
        return '双';
    }else{
        return '单';
    }
}
function gxsf_Dx($ball){
    if($ball==21){
        return '和';
    }
    if($ball>10){
        return '大';
    }else{
        return '小';
    }
}
function gxsf_WsDx($ball){
    $wsdx = substr($ball, -1);
    if($ball==21){
        return '和';
    }
    if($wsdx>4){
        return '尾大';
    }else{
        return '尾小';
    }
}
function gxsf_HsDs($ball){
    $ball = BuLing($ball);
    $a = substr($ball, 0,1);
    $b = substr($ball, -1);
    $c = $a+$b;
    if($c==21){
        return '和';
    }
    if($c%2==0){
        return '合数双';
    }else{
        return '合数单';
    }
}
function gxsf_season($ball){
    if($ball==21){
        return '和';
    }
    if(BuLing($ball) == '01' || BuLing($ball) == '02' || BuLing($ball) == '03' || BuLing($ball) == '04' || BuLing($ball) == '05'){
        $season = '春';
    }else if(BuLing($ball) == '06' || BuLing($ball) == '07' || BuLing($ball) == '08' || BuLing($ball) == '09' || BuLing($ball) == '10'){
        $season = '夏';
    }else if(BuLing($ball) == '11' || BuLing($ball) == '12' || BuLing($ball) == '13' || BuLing($ball) == '14' || BuLing($ball) == '15'){
        $season = '秋';
    }else{
        $season = '冬';
    }
    return $season;
}
function gxsf_wuxing($ball){
    if(BuLing($ball) == '05' || BuLing($ball) == '10' || BuLing($ball) == '15' || BuLing($ball) == '20'){
        $wuxing = '金';
    }else if(BuLing($ball) == '01' || BuLing($ball) == '06' || BuLing($ball) == '11' || BuLing($ball) == '16' || BuLing($ball) == '21'){
        $wuxing = '木';
    }else if(BuLing($ball) == '02' || BuLing($ball) == '07' || BuLing($ball) == '12' || BuLing($ball) == '17'){
        $wuxing = '水';
    }else if(BuLing($ball) == '03' || BuLing($ball) == '08' || BuLing($ball) == '13' || BuLing($ball) == '18'){
        $wuxing = '火';
    }else{
        $wuxing = '土';
    }
    return $wuxing;
}
function gxsf_color($ball){
    if(BuLing($ball) == '01' || BuLing($ball) == '04' || BuLing($ball) == '07' || BuLing($ball) == '10' || BuLing($ball) == '13' || BuLing($ball) == '16' || BuLing($ball) == '19'){
        $wuxing = 'RED';
    }else if(BuLing($ball) == '02' || BuLing($ball) == '05' || BuLing($ball) == '08' || BuLing($ball) == '11' || BuLing($ball) == '14' || BuLing($ball) == '17' || BuLing($ball) == '20'){
        $wuxing = 'BLUE';
    }else{
        $wuxing = 'GREEN';
    }
    return $wuxing;
}

//广西十分彩开奖函数
function gxsf_Auto($num , $type){
    $zh = $num[0]+$num[1]+$num[2]+$num[3]+$num[4];
    if($type==1){
        return $zh;
    }
    if($type==2){
        if($zh>=55){
            return '总和大';
        }
        if($zh<55){
            return '总和小';
        }
    }
    if($type==3){
        if($zh%2==0){
            return '总和双';
        }else{
            return '总和单';
        }
    }
    if($type==4){
        if($num[0]>$num[4]){
            return '龙';
        }
        if($num[0]<$num[4]){
            return '虎';
        }
        if($num[0]==$num[4]){
            return '和';
        }
    }
    if($type==5){

        $n1=$num[0];
        $n2=$num[1];
        $n3=$num[2];
        if(($n1==1 || $n2==1 || $n3==1) && ($n1==21 || $n2==21 || $n3==21)){
            if($n1==1){
                $n1=22;
            }
            if($n2==1){
                $n2=22;
            }
            if($n3==1){
                $n3=22;
            }
        }

        if($n1==$n2 && $n2==$n3){
            return "豹子";
        }elseif(($n1==$n2) || ($n1==$n3) || ($n2==$n3)){
            return "对子";
        }elseif(($n1==22 || $n2==22 || $n3==22) && ($n1==21 || $n2==21 || $n3==21) && ($n1==2 || $n2==2 || $n3==2)){
            return "顺子";
        }elseif( ( (abs($n1-$n2)==1) && (abs($n2-$n3)==1) ) || ((abs($n1-$n2)==2) && (abs($n1-$n3)==1) && (abs($n2-$n3)==1)) ||((abs($n1-$n2)==1) && (abs($n1-$n3)==1)) ){
            return "顺子";
        }elseif((abs($n1-$n2)==1) || (abs($n1-$n3)==1) || (abs($n2-$n3)==1)){
            return "半顺";
        }else{
            return "杂六";
        }
    }
    if($type==6){
        $n1=$num[1];
        $n2=$num[2];
        $n3=$num[3];
        if(($n1==1 || $n2==1 || $n3==1) && ($n1==21 || $n2==21 || $n3==21)){
            if($n1==1){
                $n1=22;
            }
            if($n2==1){
                $n2=22;
            }
            if($n3==1){
                $n3=22;
            }
        }

        if($n1==$n2 && $n2==$n3){
            return "豹子";
        }elseif(($n1==$n2) || ($n1==$n3) || ($n2==$n3)){
            return "对子";
        }elseif(($n1==22 || $n2==22 || $n3==22) && ($n1==21 || $n2==21 || $n3==21) && ($n1==2 || $n2==2 || $n3==2)){
            return "顺子";
        }elseif( ( (abs($n1-$n2)==1) && (abs($n2-$n3)==1) ) || ((abs($n1-$n2)==2) && (abs($n1-$n3)==1) && (abs($n2-$n3)==1)) ||((abs($n1-$n2)==1) && (abs($n1-$n3)==1)) ){
            return "顺子";
        }elseif((abs($n1-$n2)==1) || (abs($n1-$n3)==1) || (abs($n2-$n3)==1)){
            return "半顺";
        }else{
            return "杂六";
        }
    }
    if($type==7){
        $n1=$num[2];
        $n2=$num[3];
        $n3=$num[4];
        if(($n1==1 || $n2==1 || $n3==1) && ($n1==21 || $n2==21 || $n3==21)){
            if($n1==1){
                $n1=22;
            }
            if($n2==1){
                $n2=22;
            }
            if($n3==1){
                $n3=22;
            }
        }

        if($n1==$n2 && $n2==$n3){
            return "豹子";
        }elseif(($n1==$n2) || ($n1==$n3) || ($n2==$n3)){
            return "对子";
        }elseif(($n1==22 || $n2==22 || $n3==22) && ($n1==21 || $n2==21 || $n3==21) && ($n1==2 || $n2==2 || $n3==2)){
            return "顺子";
        }elseif( ( (abs($n1-$n2)==1) && (abs($n2-$n3)==1) ) || ((abs($n1-$n2)==2) && (abs($n1-$n3)==1) && (abs($n2-$n3)==1)) ||((abs($n1-$n2)==1) && (abs($n1-$n3)==1)) ){
            return "顺子";
        }elseif((abs($n1-$n2)==1) || (abs($n1-$n3)==1) || (abs($n2-$n3)==1)){
            return "半顺";
        }else{
            return "杂六";
        }
    }
}


//重庆时时彩开奖函数
function Ssc_Auto($num , $type){
	$zh = $num[0]+$num[1]+$num[2]+$num[3]+$num[4];
	if($type==1){
		return $zh;
	}
	if($type==2){
		if($zh>=23){
			return '总和大';
		}
		if($zh<=22){
			return '总和小';
		}
	}
	if($type==3){
		if($zh%2==0){
			return '总和双';
		}else{
			return '总和单';
		}
	}
	if($type==4){
		if($num[0]>$num[4]){
			return '龙';
		}
		if($num[0]<$num[4]){
			return '虎';
		}
		if($num[0]==$num[4]){
			return '和';
		}
	}
	if($type==5){

		$n1=$num[0];
		$n2=$num[1];
		$n3=$num[2];
		if(($n1==0 || $n2==0 || $n3==0) && ($n1==9 || $n2==9 || $n3==9)){
			if($n1==0){
				$n1=10;	
			}
			if($n2==0){
				$n2=10;	
			}
			if($n3==0){
				$n3=10;	
			}
		}
			
		if($n1==$n2 && $n2==$n3){	
			return "豹子";
		}elseif(($n1==$n2) || ($n1==$n3) || ($n2==$n3)){
			return "对子";	
		}elseif(($n1==10 || $n2==10 || $n3==10) && ($n1==9 || $n2==9 || $n3==9) && ($n1==1 || $n2==1 || $n3==1)){
			return "顺子";			
		}elseif( ( (abs($n1-$n2)==1) && (abs($n2-$n3)==1) ) || ((abs($n1-$n2)==2) && (abs($n1-$n3)==1) && (abs($n2-$n3)==1)) ||((abs($n1-$n2)==1) && (abs($n1-$n3)==1)) ){
			return "顺子";	
		}elseif((abs($n1-$n2)==1) || (abs($n1-$n3)==1) || (abs($n2-$n3)==1)){
			return "半顺";	
		}else{
			return "杂六";	
		}
	}
	if($type==6){
		$n1=$num[1];
		$n2=$num[2];
		$n3=$num[3];
		if(($n1==0 || $n2==0 || $n3==0) && ($n1==9 || $n2==9 || $n3==9)){
			if($n1==0){
				$n1=10;	
			}
			if($n2==0){
				$n2=10;	
			}
			if($n3==0){
				$n3=10;	
			}
		}
			
		if($n1==$n2 && $n2==$n3){	
			return "豹子";
		}elseif(($n1==$n2) || ($n1==$n3) || ($n2==$n3)){
			return "对子";	
		}elseif(($n1==10 || $n2==10 || $n3==10) && ($n1==9 || $n2==9 || $n3==9) && ($n1==1 || $n2==1 || $n3==1)){
			return "顺子";			
		}elseif( ( (abs($n1-$n2)==1) && (abs($n2-$n3)==1) ) || ((abs($n1-$n2)==2) && (abs($n1-$n3)==1) && (abs($n2-$n3)==1)) ||((abs($n1-$n2)==1) && (abs($n1-$n3)==1)) ){
			return "顺子";	
		}elseif((abs($n1-$n2)==1) || (abs($n1-$n3)==1) || (abs($n2-$n3)==1)){
			return "半顺";	
		}else{
			return "杂六";	
		}
	}
	if($type==7){
		$n1=$num[2];
		$n2=$num[3];
		$n3=$num[4];
		if(($n1==0 || $n2==0 || $n3==0) && ($n1==9 || $n2==9 || $n3==9)){
			if($n1==0){
				$n1=10;	
			}
			if($n2==0){
				$n2=10;	
			}
			if($n3==0){
				$n3=10;	
			}
		}
			
		if($n1==$n2 && $n2==$n3){	
			return "豹子";
		}elseif(($n1==$n2) || ($n1==$n3) || ($n2==$n3)){
			return "对子";	
		}elseif(($n1==10 || $n2==10 || $n3==10) && ($n1==9 || $n2==9 || $n3==9) && ($n1==1 || $n2==1 || $n3==1)){
			return "顺子";			
		}elseif( ( (abs($n1-$n2)==1) && (abs($n2-$n3)==1) ) || ((abs($n1-$n2)==2) && (abs($n1-$n3)==1) && (abs($n2-$n3)==1)) ||((abs($n1-$n2)==1) && (abs($n1-$n3)==1)) ){
			return "顺子";	
		}elseif((abs($n1-$n2)==1) || (abs($n1-$n3)==1) || (abs($n2-$n3)==1)){
			return "半顺";	
		}else{
			return "杂六";	
		}
	}
}
//重庆时时彩单双
function Ssc_Ds($ball){
	if($ball%2==0){
		return '双';
	}else{
		return '单';
	}
}
//重庆时时彩大小
function Ssc_Dx($ball){
	if($ball>4){
		return '大';
	}else{
		return '小';
	}
}

//重庆时时彩大小
function pk10_Dx($ball){
    if($ball>5){
        return '大';
    }else{
        return '小';
    }
}

//北京PK拾开奖函数
function Pk10_Auto_quick($num , $type){
    $zh = $num[0]+$num[1];
    if($type==1){
        return $zh;
    }
    if($type==2){
        if($zh>11){
            return '大';
        }else{
            return '小';
        }
    }
    if($type==3){
        if($zh%2==0){
            return '双';
        }else{
            return '单';
        }
    }
    if($type==4){
        if($num[0]>$num[9]){
            return '龙';
        }else{
            return '虎';
        }
    }
    if($type==5){
        if($num[1]>$num[8]){
            return '龙';
        }else{
            return '虎';
        }
    }
    if($type==6){
        if($num[2]>$num[7]){
            return '龙';
        }else{
            return '虎';
        }
    }
    if($type==7){
        if($num[3]>$num[6]){
            return '龙';
        }else{
            return '虎';
        }
    }
    if($type==8){
        if($num[4]>$num[5]){
            return '龙';
        }else{
            return '虎';
        }
    }
}
function Pk10_long_hu($num1 , $num2){
    if($num1>$num2){
        return '龙';
    }else{
        return '虎';
    }
}

//北京PK拾开奖函数
function Pk10_Auto($num , $type , $ballnum){
	$zh = $num[0]+$num[1];
	if($type==1){
		return $zh;
	}
	if($type==2){
        if($zh==11){
            return '冠亚和';
        }
		if($zh>11){
			return '冠亚大';
		}else{
			return '冠亚小';
		}
	}
	if($type==3){
        if($zh==11){
            return '冠亚和';
        }
		if($zh%2==0){
			return '冠亚双';
		}else{
			return '冠亚单';
		}
	}
	if($type==4){
		if($num[0]>$num[9]){
			return '龙';
		}else{
			return '虎';
		}
	}
	if($type==5){
		if($num[1]>$num[8]){
			return '龙';
		}else{
			return '虎';
		}
	}
	if($type==6){
		if($num[2]>$num[7]){
			return '龙';
		}else{
			return '虎';
		}
	}
	if($type==7){
		if($num[3]>$num[6]){
			return '龙';
		}else{
			return '虎';
		}
	}
	if($type==8){
		if($num[4]>$num[5]){
			return '龙';
		}else{
			return '虎';
		}
	}
	if($type==9){
		if($ballnum>5){
			return '大';
		}else{
			return '小';
		}	
	}
	if($type==10){
		if($ballnum%2==0){
			return '双';
		}else{
			return '单';
		}	
	}
}

//排列三，上海时时乐，3D开奖函数
function b3_ds($num, $info){
    if($num%2==0){
        return $info.'_EVEN';
    }else{
        return $info.'_ODD';
    }
}
function b3_dx($num, $info){
    if(($num%10)>4){
        return $info.'_OVER';
    }else{
        return $info.'_UNDER';
    }
}
function b3_zhihe($num, $info){
    if(in_array($num%10,array(1,2,3,5,7))){
        return $info.'_PRIME';
    }else{
        return $info.'_COMPO';
    }
}
function b3_f($num){
    return $num%10;
}
function b3_kd($num0,$num1,$num2){
    return get_max($num0,$num1,$num2)-get_min($num0,$num1,$num2);
}

function f3D_Auto($num , $type){
	$zh = $num[0]+$num[1]+$num[2];
	if($type==1){
		return $zh;
	}
	if($type==2){
		if($zh>=14){
			return '总和大';
		}
		if($zh<=13){
			return '总和小';
		}
	}
	if($type==3){
		if($zh%2==0){
			return '总和双';
		}else{
			return '总和单';
		}
	}
	if($type==4){
		if($num[0]>$num[2]){
			return '龙';
		}
		if($num[0]<$num[2]){
			return '虎';
		}
		if($num[0]==$num[2]){
			return '和';
		}
	}
	if($type==5){

		$n1=$num[0];
		$n2=$num[1];
		$n3=$num[2];
		if(($n1==0 || $n2==0 || $n3==0) && ($n1==9 || $n2==9 || $n3==9)){
			if($n1==0){
				$n1=10;	
			}
			if($n2==0){
				$n2=10;	
			}
			if($n3==0){
				$n3=10;	
			}
		}
			
		if($n1==$n2 && $n2==$n3){	
			return "豹子";
		}elseif(($n1==$n2) || ($n1==$n3) || ($n2==$n3)){
			return "对子";	
		}elseif(($n1==10 || $n2==10 || $n3==10) && ($n1==9 || $n2==9 || $n3==9) && ($n1==1 || $n2==1 || $n3==1)){
			return "顺子";			
		}elseif( ( (abs($n1-$n2)==1) && (abs($n2-$n3)==1) ) || ((abs($n1-$n2)==2) && (abs($n1-$n3)==1) && (abs($n2-$n3)==1)) ||((abs($n1-$n2)==1) && (abs($n1-$n3)==1)) ){
			return "顺子";	
		}elseif((abs($n1-$n2)==1) || (abs($n1-$n3)==1) || (abs($n2-$n3)==1)){
			return "半顺";	
		}else{
			return "杂六";	
		}
	}
	if($type==6){	
			return get_max($num[0],$num[1],$num[2])-get_min($num[0],$num[1],$num[2]);
	}
}



//重庆时时彩，天津时时彩，江西时时彩 B5彩票
function b5_ds($num, $info){
    if($num%2==0){
        return $info.'-EVEN';
    }else{
        return $info.'-ODD';
    }
}
function b5_dx($num, $info){
    if(($num%10)>4){
        return $info.'-OVER';
    }else{
        return $info.'-UNDER';
    }
}
function b5_zh_dx($num, $info){
    if($num>13){
        return $info.'-OVER';
    }else{
        return $info.'-UNDER';
    }
}
function b5_zhihe($num, $info){
    if(in_array($num%10,array(1,2,3,5,7))){
        return $info.'-PRIME';
    }else{
        return $info.'-COMPO';
    }
}
function b5_array_f($numArray){
    $zh = $numArray[0] + $numArray[1] + $numArray[2];
    return $zh%10;
}
function b5_f($num){
    return $num%10;
}
function b5_kd($num0,$num1,$num2){
    return get_max($num0,$num1,$num2)-get_min($num0,$num1,$num2);
}
function b5_niuniu($ball1,$ball2,$ball3,$ball4,$ball5){
    $is_niu = "false";
    $niu_ji = "";
    if(($ball1+$ball2+$ball3)%10==0){
        $is_niu = "true";
        $niu_ji = ($ball4+$ball5)%10;
    }elseif(($ball1+$ball2+$ball4)%10==0){
        $is_niu = "true";
        $niu_ji = ($ball3+$ball5)%10;
    }elseif(($ball1+$ball2+$ball5)%10==0){
        $is_niu = "true";
        $niu_ji = ($ball3+$ball4)%10;
    }elseif(($ball1+$ball3+$ball4)%10==0){
        $is_niu = "true";
        $niu_ji = ($ball2+$ball5)%10;
    }elseif(($ball1+$ball3+$ball5)%10==0){
        $is_niu = "true";
        $niu_ji = ($ball2+$ball4)%10;
    }elseif(($ball1+$ball4+$ball5)%10==0){
        $is_niu = "true";
        $niu_ji = ($ball2+$ball3)%10;
    }elseif(($ball2+$ball3+$ball4)%10==0){
        $is_niu = "true";
        $niu_ji = ($ball1+$ball5)%10;
    }elseif(($ball2+$ball3+$ball5)%10==0){
        $is_niu = "true";
        $niu_ji = ($ball1+$ball4)%10;
    }elseif(($ball2+$ball4+$ball5)%10==0){
        $is_niu = "true";
        $niu_ji = ($ball1+$ball3)%10;
    }elseif(($ball3+$ball4+$ball5)%10==0){
        $is_niu = "true";
        $niu_ji = ($ball1+$ball2)%10;
    }
    if($is_niu == "true"){
        if($niu_ji=="0"){
            $niu_ji = "牛";
        }
        return "牛".$niu_ji;
    }else{
        return "无牛";
    }
}
function b5_niuds($value){
    if($value=="牛1"||$value=="牛3"||$value=="牛5"||$value=="牛7"||$value=="牛9"){
        return "牛单";
    }elseif($value=="牛2"||$value=="牛4"||$value=="牛6"||$value=="牛8"||$value=="牛牛"){
        return "牛双";
    }else{
        return "无牛";
    }
}
function b5_niudx($value){
    if($value=="牛1"||$value=="牛2"||$value=="牛3"||$value=="牛4"||$value=="牛5"){
        return "牛小";
    }elseif($value=="牛6"||$value=="牛7"||$value=="牛8"||$value=="牛9"||$value=="牛牛"){
        return "牛大";
    }else{
        return "无牛";
    }
}


//北京快乐8开奖函数
function Kl8_convert($name){
    if($name=="SUM:OVER"){
        return '总和大';
    }elseif($name=="SUM:UNDER"){
        return '总和小';
    }elseif($name=="SUM:810"){
        return '总和810';
    }
    elseif($name=="SUM:EVEN"){
        return '总和双';
    }elseif($name=="SUM:ODD"){
        return '总和单';
    }
    elseif($name=="TOP"){
        return '上';
    }elseif($name=="MIDDLE"){
        return '中';
    }elseif($name=="BOTTOM"){
        return '下';
    }

    elseif($name=="EVEN"){
        return '偶';
    }elseif($name=="ODD"){
        return '奇';
    }elseif($name=="TIE"){
        return '和';
    }
}
function Kl8_Auto($num , $type){
	$zh = $num[0]+$num[1]+$num[2]+$num[3]+$num[4]+$num[5]+$num[6]+$num[7]+$num[8]+$num[9]+$num[10]+$num[11]+$num[12]+$num[13]+$num[14]+$num[15]+$num[16]+$num[17]+$num[18]+$num[19];
	if($type==1){
		return $zh;
	}
	if($type==2){
		if($zh>810){
		return 'SUM:OVER';//'总和大';
		}else if($zh<810){
		return 'SUM:UNDER';//'总和小';
		}else if($zh==810){
		return 'SUM:810';//'总和810';
		}
	}
	if($type==3){
		if($zh%2==0){
			return 'SUM:EVEN';//'总和双';
		}else{
			return 'SUM:ODD';//'总和单';
		}
	}
	if($type==4){
		$shang=0;
		$xia=0;
		for($i=0;$i<20;$i++){
			if($num[$i]<41){
			$shang=$shang+1;
			}else{
			$xia=$xia+1;
			}
		}

		if($shang>$xia){
		return 'TOP';
		}else if($shang<$xia){
		return 'BOTTOM';
		}else if($shang==$xia){
		return "MIDDLE";
		}
	}
	if($type==5){
		$ji=0;
		$ou=0;
		for($i=0;$i<20;$i++){
			if($num[$i]%2==0){
				$ou=$ou+1;
				}else{
				$ji=$ji+1;
				}
		}
		if($ou>$ji){
		return 'EVEN';
		}else if($ou<$ji){
		return 'ODD';
		}else if($ou==$ji){
		return "TIE";
		}
	}

    if($type==7){//五行
        if(695>=$zh && $zh>=210){
            return 'SUM:METAL';
        }else if(763>=$zh && $zh>=696){
            return 'SUM:WOOD';
        }else if(855>=$zh && $zh>=764){
            return 'SUM:WATER';
        }else if(923>=$zh && $zh>=856){
            return 'SUM:FIRE';
        }else if(1410>=$zh && $zh>=924){
            return 'SUM:EARTH';
        }
    }
}

//北京快乐8开奖函数
function Kl8_Auto_zh($num , $type){
    $zh = $num[0]+$num[1]+$num[2]+$num[3]+$num[4]+$num[5]+$num[6]+$num[7]+$num[8]+$num[9]+$num[10]+$num[11]+$num[12]+$num[13]+$num[14]+$num[15]+$num[16]+$num[17]+$num[18]+$num[19];
    if($type==1){
        return $zh;
    }
    if($type==2){
        if($zh>810){
            return '总和大';
        }else if($zh<810){
            return '总和小';
        }else if($zh==810){
            return '总和810';
        }
    }
    if($type==3){
        if($zh%2==0){
            return '总和双';
        }else{
            return '总和单';
        }
    }
    if($type==4){
        $shang=0;
        $xia=0;
        for($i=0;$i<20;$i++){
            if($num[$i]<41){
                $shang=$shang+1;
            }else{
                $xia=$xia+1;
            }
        }

        if($shang>$xia){
            return '上';
        }else if($shang<$xia){
            return '下';
        }else if($shang==$xia){
            return "中";
        }
    }
    if($type==5){
        $ji=0;
        $ou=0;
        for($i=0;$i<20;$i++){
            if($num[$i]%2==0){
                $ou=$ou+1;
            }else{
                $ji=$ji+1;
            }
        }
        if($ou>$ji){
            return '偶';
        }else if($ou<$ji){
            return '奇';
        }else if($ou==$ji){
            return "和";
        }
    }
}


//广东11选5
function gd11x5_Auto($num , $type){
	$zh = $num[0]+$num[1]+$num[2]+$num[3]+$num[4];
	if($type==1){
		return $zh;
	}
	if($type==2){
		if($zh>=31){
			return '总和大';
		}
		if($zh<=29){
			return '总和小';
		}
        if($zh==30){
            return '总和30';
        }
	}
	if($type==3){
		if($zh%2==0){
			return '总和双';
		}else{
			return '总和单';
		}
	}
	if($type==4){
		if($num[0]>$num[4]){
			return '龙';
		}
		if($num[0]<$num[4]){
			return '虎';
		}
		if($num[0]==$num[4]){
			return '和';
		}
	}
	if($type==5){

		$n1=$num[0];
		$n2=$num[1];
		$n3=$num[2];
		if(($n1==1 || $n2==1 || $n3==1) && ($n1==11 || $n2==11 || $n3==11)){
			if($n1==1){
				$n1=12;
			}
			if($n2==1){
				$n2=12;
			}
			if($n3==1){
				$n3=12;
			}
		}
			
		if(($n1==12 || $n2==12 || $n3==12) && ($n1==11 || $n2==11 || $n3==11) && ($n1==2 || $n2==2 || $n3==2)){
			return "顺子";			
		}elseif( ( (abs($n1-$n2)==1) && (abs($n2-$n3)==1) ) || ((abs($n1-$n2)==2) && (abs($n1-$n3)==1) && (abs($n2-$n3)==1)) ||((abs($n1-$n2)==1) && (abs($n1-$n3)==1)) ){
			return "顺子";	
		}elseif((abs($n1-$n2)==1) || (abs($n1-$n3)==1) || (abs($n2-$n3)==1)){
			return "半顺";	
		}else{
			return "杂六";	
		}
	}
	if($type==6){
		$n1=$num[1];
		$n2=$num[2];
		$n3=$num[3];
        if(($n1==1 || $n2==1 || $n3==1) && ($n1==11 || $n2==11 || $n3==11)){
            if($n1==1){
                $n1=12;
            }
            if($n2==1){
                $n2=12;
            }
            if($n3==1){
                $n3=12;
            }
        }

        if(($n1==12 || $n2==12 || $n3==12) && ($n1==11 || $n2==11 || $n3==11) && ($n1==2 || $n2==2 || $n3==2)){
            return "顺子";
        }elseif( ( (abs($n1-$n2)==1) && (abs($n2-$n3)==1) ) || ((abs($n1-$n2)==2) && (abs($n1-$n3)==1) && (abs($n2-$n3)==1)) ||((abs($n1-$n2)==1) && (abs($n1-$n3)==1)) ){
			return "顺子";	
		}elseif((abs($n1-$n2)==1) || (abs($n1-$n3)==1) || (abs($n2-$n3)==1)){
			return "半顺";	
		}else{
			return "杂六";	
		}
	}
	if($type==7){
		$n1=$num[2];
		$n2=$num[3];
		$n3=$num[4];
        if(($n1==1 || $n2==1 || $n3==1) && ($n1==11 || $n2==11 || $n3==11)){
            if($n1==1){
                $n1=12;
            }
            if($n2==1){
                $n2=12;
            }
            if($n3==1){
                $n3=12;
            }
        }

        if(($n1==12 || $n2==12 || $n3==12) && ($n1==11 || $n2==11 || $n3==11) && ($n1==2 || $n2==2 || $n3==2)){
            return "顺子";
        }elseif( ( (abs($n1-$n2)==1) && (abs($n2-$n3)==1) ) || ((abs($n1-$n2)==2) && (abs($n1-$n3)==1) && (abs($n2-$n3)==1)) ||((abs($n1-$n2)==1) && (abs($n1-$n3)==1)) ){
			return "顺子";	
		}elseif((abs($n1-$n2)==1) || (abs($n1-$n3)==1) || (abs($n2-$n3)==1)){
			return "半顺";	
		}else{
			return "杂六";	
		}
	}
}
//广东11选5大小
function gd11x5_Dx($ball){
    if($ball>5){
        return '大';
    }else{
        return '小';
    }
}
function getEnNameGd11($name){
    $enName = "";
    if($name=="总和大"){
        $enName = "OVER";
    }elseif($name=="总和小"){
        $enName = "UNDER";
    }elseif($name=="总和单"){
        $enName = "ODD";
    }elseif($name=="总和双"){
        $enName = "EVEN";
    }elseif($name=="龙"){
        $enName = "DRAGON";
    }elseif($name=="虎"){
        $enName = "TIGER";
    }elseif($name=="和"){
        $enName = "TIE";
    }
    elseif($name=="顺子"){
        $enName = "SHUNZI";
    }elseif($name=="半顺"){
        $enName = "BANSHUN";
    }elseif($name=="杂六"){
        $enName = "ZALIU";
    }
    elseif($name=="大"){
        $enName = "OVER";
    }elseif($name=="小"){
        $enName = "UNDER";
    }elseif($name=="单"){
        $enName = "ODD";
    }elseif($name=="双"){
        $enName = "EVEN";
    }elseif($name=="和单"){
        $enName = "SUM:ODD";
    }elseif($name=="和双"){
        $enName = "SUM:EVEN";
    }elseif($name=="尾大"){
        $enName = "LAST:OVER";
    }elseif($name=="尾小"){
        $enName = "LAST:UNDER";
    }
    return $enName;
}



//六合彩单双
function lhc_Ds($ball){
    if($ball%2==0){
        return '双';
    }else{
        return '单';
    }
}
//六合彩大小
function lhc_Dx($ball){
    if($ball>=25){
        return '大';
    }else{
        return '小';
    }
}
//六合彩尾数大小
function lhc_WsDx($ball){
    $wsdx = substr($ball, -1);
    if($wsdx>4){
        return '尾大';
    }else{
        return '尾小';
    }
}
//六合彩合数单双
function lhc_HsDs($ball){
    $ball = BuLing($ball);
    $a = substr($ball, 0,1);
    $b = substr($ball, -1);
    $c = $a+$b;
    if($c%2==0){
        return '和双';
    }else{
        return '和单';
    }
}
//六合彩合数大小
function lhc_HsDx($ball){
    $ball = BuLing($ball);
    $a = substr($ball, 0,1);
    $b = substr($ball, -1);
    $c = $a+$b;
    if($c>=7){
        return '和大';
    }else{
        return '和小';
    }
}
//六合彩合数红绿蓝
function lhc_rgb($ball){
    if(BuLing($ball) == '01' || BuLing($ball) == '02' || BuLing($ball) == '12' || BuLing($ball) == '13' || BuLing($ball) == '23' || BuLing($ball) == '24'|| BuLing($ball) == '34' || BuLing($ball) == '35'|| BuLing($ball) == '45' || BuLing($ball) == '46'|| BuLing($ball) == '07' || BuLing($ball) == '08'|| BuLing($ball) == '18' || BuLing($ball) == '19'|| BuLing($ball) == '29' || BuLing($ball) == '30'|| BuLing($ball) == '40'){
        $color = '红波';
    }else if(BuLing($ball) == '11' || BuLing($ball) == '21' || BuLing($ball) == '22' || BuLing($ball) == '32' || BuLing($ball) == '33'     || BuLing($ball) == '43' || BuLing($ball) == '44' || BuLing($ball) == '05' || BuLing($ball) == '06' || BuLing($ball) == '16' || BuLing($ball) == '17' || BuLing($ball) == '27' || BuLing($ball) == '28' || BuLing($ball) == '38' || BuLing($ball) == '39' || BuLing($ball) == '49'){
        $color = '绿波';
    }else{
        $color = '蓝波';
    }
    return $color;
}
//六合彩总和大小
function lhc_sum_dx($num){
    $zh = $num[0]+$num[1]+$num[2]+$num[3]+$num[4]+$num[5]+$num[6];
    if($zh>=175){
        return '总和 大';
    }else{
        return '总和 小';
    }
}
//六合彩总和单双
function lhc_sum_ds($num){
    $zh = $num[0]+$num[1]+$num[2]+$num[3]+$num[4]+$num[5]+$num[6];
    if($zh%2==0){
        return '总和 双';
    }else{
        return '总和 单';
    }
}
//六合彩 生肖
function lhc_sum_sx($ball,$dateTime = "2016-02-08 00:00:01"){
    $animal = "";
    if(strtotime("2016-02-08 00:00:01") - strtotime($dateTime)>0){
        if(in_array(BuLing($ball),array("07", "19", "31", "43"))){
            $animal =  '牛';
        }elseif(in_array(BuLing($ball),array("06", "18", "30", "42"))){
            $animal =  '虎';
        }elseif(in_array(BuLing($ball),array("05", "17", "29", "41"))){
            $animal =  '兔';
        }elseif(in_array(BuLing($ball),array("04", "16", "28", "40"))){
            $animal =  '龙';
        }elseif(in_array(BuLing($ball),array("03", "15", "27", "39"))){
            $animal =  '蛇';
        }elseif(in_array(BuLing($ball),array("02", "14", "26", "38"))){
            $animal =  '马';
        }elseif(in_array(BuLing($ball),array("01", "13", "25", "37", "49"))){
            $animal =  '羊';
        }elseif(in_array(BuLing($ball),array("12", "24", "36", "48"))){
            $animal =  '猴';
        }elseif(in_array(BuLing($ball),array("11", "23", "35", "47"))){
            $animal =  '鸡';
        }elseif(in_array(BuLing($ball),array("10", "22", "34", "46"))){
            $animal =  '狗';
        }elseif(in_array(BuLing($ball),array("09", "21", "33", "45"))){
            $animal =  '猪';
        }elseif(in_array(BuLing($ball),array("08", "20", "32", "44"))){
            $animal =  '鼠';
        }
    }else{
        if(in_array(BuLing($ball),array("07", "19", "31", "43"))){
            $animal =  '虎';
        }elseif(in_array(BuLing($ball),array("06", "18", "30", "42"))){
            $animal =  '兔';
        }elseif(in_array(BuLing($ball),array("05", "17", "29", "41"))){
            $animal =  '龙';
        }elseif(in_array(BuLing($ball),array("04", "16", "28", "40"))){
            $animal =  '蛇';
        }elseif(in_array(BuLing($ball),array("03", "15", "27", "39"))){
            $animal =  '马';
        }elseif(in_array(BuLing($ball),array("02", "14", "26", "38"))){
            $animal =  '羊';
        }elseif(in_array(BuLing($ball),array("01", "13", "25", "37", "49"))){
            $animal =  '猴';
        }elseif(in_array(BuLing($ball),array("12", "24", "36", "48"))){
            $animal =  '鸡';
        }elseif(in_array(BuLing($ball),array("11", "23", "35", "47"))){
            $animal =  '狗';
        }elseif(in_array(BuLing($ball),array("10", "22", "34", "46"))){
            $animal =  '猪';
        }elseif(in_array(BuLing($ball),array("09", "21", "33", "45"))){
            $animal =  '鼠';
        }elseif(in_array(BuLing($ball),array("08", "20", "32", "44"))){
            $animal =  '牛';
        }
    }
    return $animal;
}
function lhc_sx_number($ball1,$ball2,$ball3,$ball4,$ball5,$ball6,$ball7,$type){
    $animal_number = 0;
    $ballArray = array($ball1,$ball2,$ball3,$ball4,$ball5,$ball6,$ball7);
    if(in_array('鼠',$ballArray)){
        $animal_number += 1;
    }
    if(in_array('牛',$ballArray)){
        $animal_number += 1;
    }
    if(in_array('虎',$ballArray)){
        $animal_number += 1;
    }
    if(in_array('兔',$ballArray)){
        $animal_number += 1;
    }
    if(in_array('龙',$ballArray)){
        $animal_number += 1;
    }
    if(in_array('蛇',$ballArray)){
        $animal_number += 1;
    }
    if(in_array('马',$ballArray)){
        $animal_number += 1;
    }
    if(in_array('羊',$ballArray)){
        $animal_number += 1;
    }
    if(in_array('猴',$ballArray)){
        $animal_number += 1;
    }
    if(in_array('鸡',$ballArray)){
        $animal_number += 1;
    }
    if(in_array('狗',$ballArray)){
        $animal_number += 1;
    }
    if(in_array('猪',$ballArray)){
        $animal_number += 1;
    }
    $sx_string = "";
    if($type == "1"){
        if($animal_number%2==0){
            $sx_string = "总肖双";
        }else{
            $sx_string = "总肖单";
        }
    }elseif($type == "2"){
        if($animal_number==2 || $animal_number==3 || $animal_number==4){
            $sx_string = "234肖";
        }elseif($animal_number == 5){
            $sx_string = "5肖";
        }elseif($animal_number == 6){
            $sx_string = "6肖";
        }elseif($animal_number == 7){
            $sx_string = "7肖";
        }
    }

    return $sx_string;
}
function lhc_head($ball){
    $a = substr($ball, 0,1);
    $head ="";
    if($a=="0" || $ball<10){
        $head = "头0";
    }elseif($a=="1"){
        $head = "头1";
    }elseif($a=="2"){
        $head = "头2";
    }elseif($a=="3"){
        $head = "头3";
    }elseif($a=="4"){
        $head = "头4";
    }
    return $head;
}
function lhc_tail($ball){
    $b = substr($ball, -1);
    $tail ="";
    if($b=="0"){
        $tail = "尾0";
    }elseif($b=="1"){
        $tail = "尾1";
    }elseif($b=="2"){
        $tail = "尾2";
    }elseif($b=="3"){
        $tail = "尾3";
    }elseif($b=="4"){
        $tail = "尾4";
    }elseif($b=="5"){
        $tail = "尾5";
    }elseif($b=="6"){
        $tail = "尾6";
    }elseif($b=="7"){
        $tail = "尾7";
    }elseif($b=="8"){
        $tail = "尾8";
    }elseif($b=="9"){
        $tail = "尾9";
    }
    return $tail;
}

function lhc_c7($ball1,$ball2,$ball3,$ball4,$ball5,$ball6,$ball7){
    $c7 = "";
    $r = 0;
    $g = 0;
    $b = 0;
    if($ball1=="红波"){
        $r += 1;
    }elseif($ball1=="绿波"){
        $g += 1;
    }elseif($ball1=="蓝波"){
        $b += 1;
    }
    if($ball2=="红波"){
        $r += 1;
    }elseif($ball2=="绿波"){
        $g += 1;
    }elseif($ball2=="蓝波"){
        $b += 1;
    }
    if($ball3=="红波"){
        $r += 1;
    }elseif($ball3=="绿波"){
        $g += 1;
    }elseif($ball3=="蓝波"){
        $b += 1;
    }
    if($ball4=="红波"){
        $r += 1;
    }elseif($ball4=="绿波"){
        $g += 1;
    }elseif($ball4=="蓝波"){
        $b += 1;
    }
    if($ball5=="红波"){
        $r += 1;
    }elseif($ball5=="绿波"){
        $g += 1;
    }elseif($ball5=="蓝波"){
        $b += 1;
    }
    if($ball6=="红波"){
        $r += 1;
    }elseif($ball6=="绿波"){
        $g += 1;
    }elseif($ball6=="蓝波"){
        $b += 1;
    }
    if($ball7=="红波"){
        $r += 1.5;
    }elseif($ball7=="绿波"){
        $g += 1.5;
    }elseif($ball7=="蓝波"){
        $b += 1.5;
    }
    if(($r==3&&$g==3&&$b==1.5) || ($r==3&&$g==1.5&&$b==3) || ($r==1.5&&$g==3&&$b==3)){
        $c7 = "正肖 和局";
    }elseif($r>$b && $r>$g){
        $c7 = "正肖 红波";
    }elseif($b>$r && $b>$g){
        $c7 = "正肖 蓝波";
    }elseif($g>$b && $g>$r){
        $c7 = "正肖 绿波";
    }
    return $c7;
}
//六合彩 半半波
function lhc_bbb($ball){
    $bbbString = "";
    if(in_array(BuLing($ball),array("29", "35", "45"))){
        $bbbString =  '红大单';
    }elseif(in_array(BuLing($ball),array("30", "34", "40", "46"))){
        $bbbString =  '红大双';
    }elseif(in_array(BuLing($ball),array("01", "07", "13", "19", "23"))){
        $bbbString =  '红小单';
    }elseif(in_array(BuLing($ball),array("02", "08", "12", "18", "24"))){
        $bbbString =  '红小双';
    }elseif(in_array(BuLing($ball),array("27", "33", "39", "43"))){
        $bbbString =  '绿大单';
    }elseif(in_array(BuLing($ball),array("28", "32", "38", "44"))){
        $bbbString =  '绿大双';
    }elseif(in_array(BuLing($ball),array("05", "11", "17", "21"))){
        $bbbString =  '绿小单';
    }elseif(in_array(BuLing($ball),array("06", "16", "22"))){
        $bbbString =  '绿小双';
    }elseif(in_array(BuLing($ball),array("25", "31", "37", "41", "47"))){
        $bbbString =  '蓝大单';
    }elseif(in_array(BuLing($ball),array("26", "36", "42", "48"))){
        $bbbString =  '蓝大双';
    }elseif(in_array(BuLing($ball),array("03", "09", "15"))){
        $bbbString =  '蓝小单';
    }elseif(in_array(BuLing($ball),array("04", "10", "14", "20"))){
        $bbbString =  '蓝小双';
    }
    return $bbbString;
}
function lhc_bb_ds($bbbString){
    $bbString = "";
    if($bbbString=="红大单" || $bbbString ==  "红小单"){
        $bbString = "红单";
    }elseif($bbbString=="红大双" || $bbbString ==  "红小双"){
        $bbString = "红双";
    }
    elseif($bbbString=="绿大单" || $bbbString ==  "绿小单"){
        $bbString = "绿单";
    }elseif($bbbString=="绿大双" || $bbbString ==  "绿小双"){
        $bbString = "绿双";
    }
    elseif($bbbString=="蓝大单" || $bbbString ==  "蓝小单"){
        $bbString = "蓝单";
    }elseif($bbbString=="蓝大双" || $bbbString ==  "蓝小双"){
        $bbString = "蓝双";
    }
    return $bbString;
}
function lhc_bb_dx($bbbString){
    $bbString = "";
    if($bbbString=="红大双" || $bbbString ==  "红大单"){
        $bbString = "红大";
    }elseif($bbbString=="红小双" || $bbbString ==  "红小单"){
        $bbString = "红小";
    }
    elseif($bbbString=="绿大双" || $bbbString ==  "绿大单"){
        $bbString = "绿大";
    }elseif($bbbString=="绿小双" || $bbbString ==  "绿小单"){
        $bbString = "绿小";
    }
    elseif($bbbString=="蓝大双" || $bbbString ==  "蓝大单"){
        $bbString = "蓝大";
    }elseif($bbbString=="蓝小双" || $bbbString ==  "蓝小单"){
        $bbString = "蓝小";
    }
    return $bbString;
}




//求3个数中最大数
function get_max($a,$b,$c){
    return $a > $b ?($a > $c ? $a : $c) : ($b > $c ? $b :$c);

}

//求3个数中最小数
function get_min($a,$b,$c){
    return $a < $b ?($a < $c ? $a : $c) : ($b < $c ? $b :$c);

}
/*
数字补0函数，当数字小于10的时候在前面自动补0
*/
function BuLing ( $num ) {
	if ( $num<10 ) {
		$num = '0'.$num;
	}
	return $num;
}
?>