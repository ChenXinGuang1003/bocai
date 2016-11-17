<?php
function cdate($date){
	$h	=	substr($date,0,2)*1;
	$i	=	substr($date,3,2);
	$ap	=	substr($date,-1,1);
	if($ap == "p"){
		if($h<12) $h = $h+12;
	}elseif($h<10){ //不足两位数，前面要补0
		$h	=	'0'.$h;
	}
	return $h.':'.$i.':00';
}

function checktime($time){
	$time	=	explode(':',$time);
	$h		=	$time[0]*1;
	if($h<10) $h = '0'.$h;
	return $h.':'.$time[1];
}

function datetoap($date){
	$h	=	substr($date,0,2)*1;
	$i	=	substr($date,3,2);
	$ap	=	'a'; //默认为上午
	if($h>=12){
		if($h>12) $h=$h-12;
		$ap='p';
	}
	if($h<10){
		$h='0'.$h; //不足两位数，前面要补0
	}
	
	return $h.':'.$i.$ap;
}


function get_HK_ior($H_ratio,$C_ratio){
	$H_ratio=$H_ratio*1000;
	$C_ratio=$C_ratio*1000;
	$out_ior=array();
	$nowType="";
	if ($H_ratio <= 1000 && $C_ratio <= 1000){
		$out_ior[0]=$H_ratio;
		$out_ior[1]=$C_ratio;
	}else{
		$line=2000 - ( $H_ratio + $C_ratio );
		if ($H_ratio > $C_ratio){ 
			$lowRatio=$C_ratio;
			$nowType = "C";
		}else{
			$lowRatio = $H_ratio;
			$nowType = "H";
		}
		
		if (((2000 - $line) - $lowRatio) > 1000){
			//對盤馬來盤
			$nowRatio = ($lowRatio + $line) * (-1);
		}else{
			//對盤香港盤
			$nowRatio=(2000 - $line) - $lowRatio;	
		}
		
		if ($nowRatio < 0){
			$highRatio = floor(abs(1000 / $nowRatio) * 1000);
		}else{
			$highRatio = (2000 - $line - $nowRatio);
		}
		if ($nowType == "H"){
			$out_ior[0]=$lowRatio;
			$out_ior[1]=$highRatio;
		}else{
			$out_ior[0]=$highRatio;
			$out_ior[1]=$lowRatio;
		}
	}
	$out_ior[0]=$out_ior[0]/1000;
	$out_ior[1]=$out_ior[1]/1000;
	return $out_ior;
}

function set($bid,$status,$mb_inball=NULL,$tg_inball=NULL){ //审核当前投注项1，2， 4，5 赢，输，赢一半，输一半
	$sql	=	"";
	$msg	=	"";
	switch ($status){
		case "1": //赢
			//$sql	=	"update k_user,k_bet set k_user.money=k_user.money+k_bet.bet_win+k_bet.bet_money/100,k_bet.win=k_bet.bet_win,k_bet.status=1 ,k_bet.update_time=now(),k_bet.MB_Inball='$mb_inball',k_bet.TG_Inball='$tg_inball' where k_user.uid=k_bet.uid and k_bet.bid=$bid";
			$sql	=	"update k_user,k_bet set k_user.money=k_user.money+k_bet.bet_win,k_bet.win=k_bet.bet_win,k_bet.status=1 ,k_bet.update_time=now(),k_bet.MB_Inball='$mb_inball',k_bet.TG_Inball='$tg_inball' where k_user.uid=k_bet.uid and k_bet.bid=$bid";
			$msg	=	"审核了编号为".$bid."的注单,设为赢";
			break; 
		case "2": //输
			//$sql	=	"update k_user,k_bet set k_user.money=k_user.money+k_bet.bet_money/100,status=2,update_time=now(),k_bet.MB_Inball='$mb_inball',k_bet.TG_Inball='$tg_inball' where k_user.uid=k_bet.uid and k_bet.bid=$bid";
			$sql	=	"update k_user,k_bet set k_user.money=k_user.money,status=2,update_time=now(),k_bet.MB_Inball='$mb_inball',k_bet.TG_Inball='$tg_inball' where k_user.uid=k_bet.uid and k_bet.bid=$bid";
			$msg	=	"审核了编号为".$bid."的注单,设为输";
			break;
		case "4": //赢一半
			//$sql	=	"update k_user,k_bet set k_user.money=k_user.money+k_bet.bet_money+(k_bet.bet_money/2)*(k_bet.bet_point)+k_bet.bet_money/200,k_bet.win=k_bet.bet_money+(k_bet.bet_money/2)*(k_bet.bet_point),k_bet.status=4 ,k_bet.update_time=now(),k_bet.MB_Inball='$mb_inball',k_bet.TG_Inball='$tg_inball' where k_user.uid=k_bet.uid and k_bet.bid=$bid";
			$sql	=	"update k_user,k_bet set k_user.money=k_user.money+k_bet.bet_money+(k_bet.bet_money/2)*(k_bet.bet_point),k_bet.win=k_bet.bet_money+(k_bet.bet_money/2)*(k_bet.bet_point),k_bet.status=4 ,k_bet.update_time=now(),k_bet.MB_Inball='$mb_inball',k_bet.TG_Inball='$tg_inball' where k_user.uid=k_bet.uid and k_bet.bid=$bid";
			$msg	=	"审核了编号为".$bid."的注单,设为赢一半";
			break;
		case "5": //输一半
			//$sql	=	"update k_user,k_bet set k_user.money=k_user.money+k_bet.bet_money/2+k_bet.bet_money/200,k_bet.win=k_bet.bet_money/2,k_bet.status=5,k_bet.update_time=now(),k_bet.MB_Inball='$mb_inball',k_bet.TG_Inball='$tg_inball' where k_user.uid=k_bet.uid and k_bet.bid=$bid";
			$sql	=	"update k_user,k_bet set k_user.money=k_user.money+k_bet.bet_money/2,k_bet.win=k_bet.bet_money/2,k_bet.status=5,k_bet.update_time=now(),k_bet.MB_Inball='$mb_inball',k_bet.TG_Inball='$tg_inball' where k_user.uid=k_bet.uid and k_bet.bid=$bid";
			$msg	=	"审核了编号为".$bid."的注单,设为输一半";
			break;
		case "8": //和局
			$sql	=	"update k_user,k_bet set k_user.money=k_user.money+k_bet.bet_money,k_bet.win=k_bet.bet_money,k_bet.status=8,k_bet.update_time=now(),k_bet.MB_Inball='$mb_inball',k_bet.TG_Inball='$tg_inball' where k_user.uid=k_bet.uid and k_bet.bid=$bid";
			$msg	=	"审核了编号为".$bid."的注单,设为和";
			break;
		
		default:break;
	}
	
	include("mysqli.php");
	$mysqli->autocommit(FALSE);
	$mysqli->query("BEGIN"); //事务开始
	try{
		$mysqli->query($sql);
		if($mysqli->affected_rows){
			$mysqli->commit(); //事务提交
			$mysqli->query("insert into sys_log(uid,log_info,log_ip) values('1','$msg','".$_SERVER['REMOTE_ADDR']."')");
		}else{
			$mysqli->rollback(); //数据回滚
		}
	}catch(Exception $e){
		$mysqli->rollback(); //数据回滚
	}
}

function make_point($column,$mb_inball,$tg_inball,$mb_inball_hr,$tg_inball_hr,$match_type,$match_showtype,$rgg,$dxgg,$match_nowscore){
 
	if($mb_inball<0)
	{
	  //比赛取消	
	  return array("column"=>$column,"ben_add"=>0,"status"=>3);
	}
	$ben_add=0;
	$status=2; //默认为输
	switch ($column)
	{
		case 'match_bzm'://标准盘独赢
			if($mb_inball>$tg_inball) $status=1;break;
		case 'match_bzg':
			if($mb_inball<$tg_inball) $status=1;break;
		case 'match_bzh':
			if($mb_inball==$tg_inball) $status=1;break;
		case 'match_ho':
			$m=explode('/',$rgg);
			$ben_add=1;
		    if(count($m)==2)
			{  
			  foreach($m as $k){
			 if(strtolower($match_showtype)=='h')
			 {
			   $mb_temp=$mb_inball;   $tg_temp=$tg_inball+$k;
			 }
			 else
			 {
			   $mb_temp=$mb_inball+$k;   $tg_temp=$tg_inball;
			 }
			  if($match_type==2)// 如果是滚球,减去下注比分
			 {
			   $n=explode(':',$match_nowscore);
			   $mb_temp-=$n[0];
			   $tg_temp-=$n[1];
			 }
			 if($mb_temp>$tg_temp)
			 $temp+=1;
			 else if($mb_temp==$tg_temp)
			 $temp+=0.5;
			 else
			 $temp+=0;
			 }
			 if($temp==0.5)
			 $status=5;
			 else if($temp==1.5)
			 $status=4;
			 else if($temp==2)
			 $status=1;
			 else if($temp==0)
			 $status=2;
			}
			else
			{ 
			 if(strtolower($match_showtype)=='h')
			 {
			   $mb_temp=$mb_inball;   $tg_temp=$tg_inball+$rgg;
			 }
			 else
			 {
			   $mb_temp=$mb_inball+$rgg;   $tg_temp=$tg_inball;
			 }
			 if($match_type==2)// 如果是滚球,减去下注比分
			 {
			   $n=explode(':',$match_nowscore);
			   $mb_temp-=$n[0];
			   $tg_temp-=$n[1];
			 }
	 
			 if($mb_temp>$tg_temp)
			 $status=1;
			 else if($mb_temp==$tg_temp)
			 $status=8;
			 else
			 $status=2;
           }break;
		case 'match_ao':
			$m=explode('/',$rgg);
			$ben_add=1;
		    if(count($m)==2)
			{  
			  foreach($m as $k){
			 if(strtolower($match_showtype)=='h')
			 {
			   $mb_temp=$mb_inball;   $tg_temp=$tg_inball+$k;
			 }
			 else
			 {
			   $mb_temp=$mb_inball+$k;   $tg_temp=$tg_inball;
			 }
			  if($match_type==2)// 如果是滚球,减去下注比分
			 {
			   $n=explode(':',$match_nowscore);
			 
			   $mb_temp-=$n[0];
			   $tg_temp-=$n[1];
			 }
			 if($mb_temp<$tg_temp)
			 $temp+=1;
			 else if($mb_temp==$tg_temp)
			 $temp+=0.5;
			 else
			 $temp+=0;
			 }
			 if($temp==0.5)
			 $status=5;
			 else if($temp==1.5)
			 $status=4;
			 else if($temp==2)
			 $status=1;
			 else if($temp==0)
			 $status=2;
			}
			else
			{ 
			 if(strtolower($match_showtype)=='h')
			 {
			   $mb_temp=$mb_inball;   $tg_temp=$tg_inball+$rgg;
			 }
			 else
			 {
			   $mb_temp=$mb_inball+$rgg;   $tg_temp=$tg_inball;
			 }
			 if($match_type==2)// 如果是滚球,减去下注比分
			 {
			   $n=explode(':',$match_nowscore);
			   $mb_temp-=$n[0];
			   $tg_temp-=$n[1];
			 }
			 if($mb_temp<$tg_temp)
			 $status=1;
			 else if($mb_temp==$tg_temp)
			 $status=8;
			 else
			 $status=2;
           }break;
		case 'match_dxdpl':
			$m=explode('/',$dxgg);
			$ben_add=1;
		 	$total=$mb_inball+$tg_inball;
			if(count($m)==2)
			{
			 foreach($m as $t)
			 {
			  if($total>$t)
			  $temp+=1;
			  else if($total==$t)
			  $temp+=0.5;
			 }
			 if($temp==0.5)
			 $status=5;
			 else if($temp==1.5)
			 $status=4;
			 else if($temp==2)
			 $status=1;
			 else if($temp==0)
			 $status=2;
			}
			else
			{
			 if($total>$dxgg)
			  $status=1;
			  else if($total==$dxgg)
			  $status=8;
			  else
			  $status=2;
			}break;
		case 'match_dxxpl':
			$m=explode('/',$dxgg);
			$ben_add=1;
			$total=$mb_inball+$tg_inball;
			if(count($m)==2)
			{
			 foreach($m as $t)
			 {
			  if($total<$t)
			  $temp+=1;
			  else if($total==$t)
			  $temp+=0.5;
			 }
			 if($temp==0.5)
			 $status=5;
			 else if($temp==1.5)
			 $status=4;
			 else if($temp==2)
			 $status=1;
			 else if($temp==0)
			 $status=2;
			}
			else
			{
			 if($total<$dxgg)
			  $status=1;
			  else if($total==$dxgg)
			  $status=8;
			  else
			  $status=2;
			}break;
		case 'match_dsdpl':
			if(($mb_inball+$tg_inball)%2==1)
			$status=1;break;
			case 'match_dsspl':
			if(($mb_inball+$tg_inball)%2==0)
			$status=1;break;
		 case 'match_bmdy'://上半场独赢
			if($mb_inball_hr>$tg_inball_hr)
			$status=1;
	    	
			$mb_inball=$mb_inball_hr;
			$tg_inball=$tg_inball_hr;break;
		case 'match_bgdy':
			if($mb_inball_hr<$tg_inball_hr)
			$status=1;
			$mb_inball=$mb_inball_hr;
			$tg_inball=$tg_inball_hr;break;
		case 'match_bhdy':
			if($mb_inball_hr==$tg_inball_hr)
			$status=1;	
			 $mb_inball=$mb_inball_hr;
			 $tg_inball=$tg_inball_hr;break;
		case 'match_bho':	
			$m=explode('/',$rgg);
			$ben_add=1;
		    if(count($m)==2)
			{  
			  foreach($m as $k){
			 if(strtolower($match_showtype)=='h')
			 {
			   $mb_temp=$mb_inball_hr;   $tg_temp=$tg_inball_hr+$k;
			 }
			 else
			 {
			   $mb_temp=$mb_inball_hr+$k;   $tg_temp=$tg_inball_hr;
			 }
			  if($match_type==2)// 如果是滚球,减去下注比分
			 {
			   $n=explode(':',$match_nowscore);
			   $mb_temp-=$n[0];
			   $tg_temp-=$n[1];
			 }
			 if($mb_temp>$tg_temp)
			 $temp+=1;
			 else if($mb_temp==$tg_temp)
			 $temp+=0.5;
			 }
			 if($temp==0.5)
			 $status=5;
			 else if($temp==1.5)
			 $status=4;
			 else if($temp==2)
			 $status=1;
			 else if($temp==0)
			 $status=2;
			}
			else
			{ 
			 if(strtolower($match_showtype)=='h')
			 {
			   $mb_temp=$mb_inball_hr;   $tg_temp=$tg_inball_hr+$rgg;
			 }
			 else
			 {
			   $mb_temp=$mb_inball_hr+$rgg;   $tg_temp=$tg_inball_hr;
			 }
			 if($match_type==2)// 如果是滚球,减去下注比分
			 {
			   $n=explode(':',$match_nowscore);
			   $mb_temp-=$n[0];
			   $tg_temp-=$n[1];
			 }
			 if($mb_temp>$tg_temp)
			 $status=1;
			 else if($mb_temp==$tg_temp)
			 $status=8;
			 else
			 $status=2;
           }
		   $mb_inball=$mb_inball_hr;
		   $tg_inball=$tg_inball_hr;
		   break;
		case 'match_bao':	
		$m=explode('/',$rgg);
			$ben_add=1;
		    if(count($m)==2)
			{  
			  foreach($m as $k){
			 if(strtolower($match_showtype)=='h')
			 {
			   $mb_temp=$mb_inball_hr;   $tg_temp=$tg_inball_hr+$k;
			 }
			 else
			 {
			   $mb_temp=$mb_inball_hr+$k;   $tg_temp=$tg_inball_hr;
			 }
			  
			  if($match_type==2)// 如果是滚球,减去下注比分
			 {
			   $n=explode(':',$match_nowscore);
			 
			    $mb_temp-=intval($n[0]);
			    $tg_temp-=intval($n[1]);
			 }
		
			 if($mb_temp<$tg_temp)
			 $temp+=1;
			 else if($mb_temp==$tg_temp)
			 $temp+=0.5;
			 else
			 $temp+=0;
			 }
			 if($temp==0.5)
			 $status=5;
			 else if($temp==1.5)
			 $status=4;
			 else if($temp==2)
			 $status=1;
			 else if($temp==0)
			 $status=2;
			}
			else
			{ 
			 if(strtolower($match_showtype)=='h')
			 {
			   $mb_temp=$mb_inball_hr;   $tg_temp=$tg_inball_hr+$rgg;
			 }
			 else
			 {
			   $mb_temp=$mb_inball_hr+$rgg;   $tg_temp=$tg_inball_hr;
			 }
			 if($match_type==2)// 如果是滚球,减去下注比分
			 {
			   $n=explode(':',$match_nowscore);
			   $mb_temp-=$n[0];
			   $tg_temp-=$n[1];
			 }
			 
			 if($mb_temp<$tg_temp)
			 $status=1;
			 else if($mb_temp==$tg_temp)
			 $status=8;
			 else
			 $status=2;
           }
		   $mb_inball=$mb_inball_hr;
		   $tg_inball=$tg_inball_hr;
		   break;
		case 'match_bdpl':	
		    $m=explode('/',$dxgg);
			$ben_add=1;
		  	$total=$mb_inball_hr+$tg_inball_hr;
		//	print_r($m);
			if(count($m)==2)
			{
			 foreach($m as $t)
			 {
			  if($total>$t)
			  $temp+=1;
			  else if($total==$t)
			  $temp+=0.5;
			 }
			 if($temp==0.5)
			 $status=5;
			 else if($temp==1.5)
			 $status=4;
			 else if($temp==2)
			 $status=1;
			 else if($temp==0)
			 $status=2;
			}
			else
			{  //echo $dxgg."K";
			 if($total>$dxgg)
			  $status=1;
			  else if($total==$dxgg)
			  $status=8;
			  else
			  $status=2;
			}
			$mb_inball=$mb_inball_hr;
		   $tg_inball=$tg_inball_hr;
			break;
		case 'match_bxpl':
			$m=explode('/',$dxgg);
			
			$ben_add=1;
			$total=$mb_inball_hr+$tg_inball_hr;
			if(count($m)==2)
			{
			 foreach($m as $t)
			 {
			  if($total<$t)
			  $temp+=1;
			  else if($total==$t)
			  $temp+=0.5;
			  else
			  $temp+=0;
			 }
			 
			 if($temp==0.5)
			 $status=5;
			 else if($temp==1.5)
			 $status=4;
			 else if($temp==2)
			 $status=1;
			 else if($temp==0)
			 $status=2;
			}
			else
			{
			 if($total<$dxgg)
			  $status=1;
			  else if($total==$dxgg)
			  $status=8;
			  else
			  $status=2;
			}
		   $mb_inball=$mb_inball_hr;
		   $tg_inball=$tg_inball_hr;
			break;
		case 'match_bd10':
		    if(($mb_inball==1)&&($tg_inball==0))$status=1;break;
		case 'match_bd20':
		    if(($mb_inball==2)&&($tg_inball==0))$status=1;break;
		case 'match_bd21':
		    if(($mb_inball==2)&&($tg_inball==1))$status=1;break;
		case 'match_bd30':
		    if(($mb_inball==3)&&($tg_inball==0))$status=1;break;
		case 'match_bd31':
		    if(($mb_inball==3)&&($tg_inball==1))$status=1;break;
		case 'match_bd32':
		    if(($mb_inball==3)&&($tg_inball==2))$status=1;break;
		case 'match_bd40':
		    if(($mb_inball==4)&&($tg_inball==0))$status=1;break;
		case 'match_bd41':
		    if(($mb_inball==4)&&($tg_inball==1))$status=1;break;
		case 'match_bd42':
		    if(($mb_inball==4)&&($tg_inball==2))$status=1;break;
		case 'match_bd43':
		    if(($mb_inball==4)&&($tg_inball==3))$status=1;break;
		case 'match_bd00':
		    if(($mb_inball==0)&&($tg_inball==0))$status=1;break;
		case 'match_bd11':
		    if(($mb_inball==1)&&($tg_inball==1))$status=1;break;
		case 'match_bd22':
		    if(($mb_inball==2)&&($tg_inball==2))$status=1;break;
		case 'match_bd33':
		    if(($mb_inball==3)&&($tg_inball==3))$status=1;break;
		case 'match_bd44':
		    if(($mb_inball==4)&&($tg_inball==4))$status=1;break;
		case 'match_bdup5':
		    if(($mb_inball>=5)||($tg_inball>=5))$status=1;break;
		case 'match_bdg10':
		    if(($mb_inball==0)&&($tg_inball==1))$status=1;break;
		case 'match_bdg20':
		    if(($mb_inball==0)&&($tg_inball==2))$status=1;break;
		case 'match_bdg21':
		    if(($mb_inball==1)&&($tg_inball==2))$status=1;break;
		case 'match_bdg30':
		    if(($mb_inball==0)&&($tg_inball==3))$status=1;break;
		case 'match_bdg31':
		    if(($mb_inball==1)&&($tg_inball==3))$status=1;break;
		case 'match_bdg32':
		    if(($mb_inball==2)&&($tg_inball==3))$status=1;break;
	    case 'match_bdg40':
		    if(($mb_inball==0)&&($tg_inball==4))$status=1;break;
		case 'match_bdg41':
		    if(($mb_inball==1)&&($tg_inball==4))$status=1;break;
			case 'match_bdg42':
		    if(($mb_inball==2)&&($tg_inball==4))$status=1;break;
		case 'match_bdg43':
		    if(($mb_inball==3)&&($tg_inball==4))$status=1;break;
		case 'match_hr_bd10':
		    if(($mb_inball_hr==1)&&($tg_inball_hr==0))
		$status=1;break;
		case 'match_hr_bd20':
		    if(($mb_inball_hr==2)&&($tg_inball_hr==0))$status=1;break;
		case 'match_hr_bd21':
		    if(($mb_inball_hr==2)&&($tg_inball_hr==1))$status=1;break;
		case 'match_hr_bd30':
		    if(($mb_inball_hr==3)&&($tg_inball_hr==0))$status=1;break;
		case 'match_hr_bd31':
		    if(($mb_inball_hr==3)&&($tg_inball_hr==1))$status=1;break;
		case 'match_hr_bd32':
		    if(($mb_inball_hr==3)&&($tg_inball_hr==2))$status=1;break;
		case 'match_hr_bd40':
		    if(($mb_inball_hr==4)&&($tg_inball_hr==0))$status=1;break;
		case 'match_hr_bd41':
		    if(($mb_inball_hr==4)&&($tg_inball_hr==1))$status=1;break;
			case 'match_hr_bd42':
		    if(($mb_inball_hr==4)&&($tg_inball_hr==2))$status=1;break;
		case 'match_hr_bd43':
		    if(($mb_inball_hr==4)&&($tg_inball_hr==3))$status=1;break;
		case 'match_hr_bd00':
		    if(($mb_inball_hr==0)&&($tg_inball_hr==0))$status=1;break;
		case 'match_hr_bd11':
		    if(($mb_inball_hr==1)&&($tg_inball_hr==1))$status=1;break;
		case 'match_hr_bd22':
		    if(($mb_inball_hr==2)&&($tg_inball_hr==2))$status=1;break;
		case 'match_hr_bd33':
		    if(($mb_inball_hr==3)&&($tg_inball_hr==3))$status=1;break;
		case 'match_hr_bd44':
		    if(($mb_inball_hr==4)&&($tg_inball_hr==4))$status=1;break;
		case 'match_hr_bdup5':
		    if(($mb_inball_hr>=5)||($tg_inball_hr>=5))$status=1;break;
		case 'match_hr_bdg10':
		    if(($mb_inball_hr==0)&&($tg_inball_hr==1))$status=1;break;
			case 'match_hr_bdg20':
		    if(($mb_inball_hr==0)&&($tg_inball_hr==2))$status=1;break;
			case 'match_hr_bdg21':
		    if(($mb_inball_hr==1)&&($tg_inball_hr==2))$status=1;break;
			case 'match_hr_bdg30':
		    if(($mb_inball_hr==0)&&($tg_inball_hr==3))$status=1;break;
		case 'match_hr_bdg31':
		    if(($mb_inball_hr==1)&&($tg_inball_hr==3))$status=1;break;
		case 'match_hr_bdg32':
		    if(($mb_inball_hr==2)&&($tg_inball_hr==3))$status=1;break;
		case 'match_hr_bdg40':
		    if(($mb_inball_hr==0)&&($tg_inball_hr==4))$status=1;break;
		case 'match_hr_bdg41':
		    if(($mb_inball_hr==1)&&($tg_inball_hr==4))$status=1;break;
		case 'match_hr_bdg42':
		    if(($mb_inball_hr==2)&&($tg_inball_hr==4))$status=1;break;
		case 'match_hr_bdg43':
		    if(($mb_inball_hr==3)&&($tg_inball_hr==4))$status=1;break;
		case 'match_total01pl':
		  $total=$mb_inball+$tg_inball;
	    	if(($total>=0)&&($total<=1))$status=1;break;
		case 'match_total23pl':
		$total=$mb_inball+$tg_inball;
		if(($total>=2)&&($total<=3))$status=1;break;
		case 'match_total46pl':
		$total=$mb_inball+$tg_inball;
		if(($total>=4)&&($total<=6))$status=1;break;
		case 'match_total7uppl':
		$total=$mb_inball+$tg_inball;
		if(($total>=7))$status=1;break;
		//半全场开始
		case 'match_bqmm':
		if(($mb_inball>$tg_inball)&&($mb_inball_hr>$tg_inball_hr))
		$status=1;break;
		case 'match_bqmh':
		if(($mb_inball==$tg_inball)&&($mb_inball_hr>$tg_inball_hr))
		$status=1;break;
		case 'match_bqmg':
		if(($mb_inball<$tg_inball)&&($mb_inball_hr>$tg_inball_hr))
		$status=1;break;
		case 'match_bqhm':
		if(($mb_inball>$tg_inball)&&($mb_inball_hr==$tg_inball_hr))
		$status=1;break;
		case 'match_bqhh':
		if(($mb_inball==$tg_inball)&&($mb_inball_hr==$tg_inball_hr))
		$status=1;break;
		case 'match_bqhg':
		if(($mb_inball<$tg_inball)&&($mb_inball_hr==$tg_inball_hr))
		$status=1;break;
		case 'match_bqgm':
		if(($mb_inball>$tg_inball)&&($mb_inball_hr<$tg_inball_hr))
		$status=1;break;
		case 'match_bqgh':
		if(($mb_inball==$tg_inball)&&($mb_inball_hr<$tg_inball_hr))
		$status=1;break;
		case 'match_bqgg':
		if(($mb_inball<$tg_inball)&&($mb_inball_hr<$tg_inball_hr))
		$status=1;break;
		default:break;
		
	}
	
	return array("column"=>$column,"ben_add"=>$ben_add,"status"=>$status,"mb_inball"=>$mb_inball,"tg_inball"=>$tg_inball);
}

function isset_column($m,$column){
  foreach($m as $t)
  {
      if($t["column"]==$column)
	  {
	  return $t;
	  }
  }
  return false;
   
} 
?>