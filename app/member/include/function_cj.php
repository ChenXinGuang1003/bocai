<?php
function zqgq_cj(){
	$C_Patch=$_SERVER['DOCUMENT_ROOT'];
	include($C_Patch."/app/member/cache/uid.php");
	include("pub_library.php");
	include("http.class.php");
	$langx	=	'zh-cn';
	$data	=	theif_data($hgweb,$hguid,'FT','re',$langx,0);
	if(sizeof(explode("gamount",$data))>1){
		$k=0;
		preg_match_all("/g\((.+?)\);/is",$data,$matches);
		$cou=sizeof($matches[0]);
	
		$meg	= "本次无数据采集";
		$cache	= "<?php\r\nunset(\$zqgq,\$count,\$lasttime);\r\n";
		$cache .= "\$zqgq		=	array();\r\n";
		$cache .= "\$lasttime	=	".time().";\r\n";
		$str	= "";
		$time	= date("Y-m-d H:i:s");
		for($i=0;$i<$cou;$i++){
			$messages=$matches[0][$i];
			
			$messages=str_replace("g([","Array(",$messages);
			$messages=str_replace("]);",")",$messages);
			$messages=str_replace("cha(9)","",$messages);
			$datainfo=eval("return $messages;");

				$datainfo[5] = str_replace('<fontcolor=gray>','',$datainfo[5]);
				$datainfo[6] = str_replace('<fontcolor=gray>','',$datainfo[6]);
				$datainfo[5] = str_replace('<font color=gray>','',$datainfo[5]);
				$datainfo[5] = str_replace('</font>','',$datainfo[5]);
				$datainfo[6] = str_replace('<font color=gray>','',$datainfo[6]);
				$datainfo[6] = str_replace('</font>','',$datainfo[6]);

				$datainfo[8]	=	str_replace(' ','',$datainfo[8]);
				$datainfo[11]	=	str_replace(' ','',$datainfo[11]);
				$datainfo[22]	=	str_replace(' ','',$datainfo[22]);
				$datainfo[25]	=	str_replace(' ','',$datainfo[25]);
				$datainfo[11]	=	substr($datainfo[11],1,strlen($datainfo[11])-1);
				$datainfo[25]	=	substr($datainfo[25],1,strlen($datainfo[25])-1);
				
				$dx	=	array();
				$dx	=	get_HK_ior($datainfo[9],$datainfo[10]);
				$datainfo[9]	=	$dx[0];
				$datainfo[10]	=	$dx[1];
				$dx	=	get_HK_ior($datainfo[23],$datainfo[24]);
				$datainfo[23]	=	$dx[0];
				$datainfo[24]	=	$dx[1];
				$dx	=	get_HK_ior($datainfo[13],$datainfo[14]);
				$datainfo[13]	=	$dx[0];
				$datainfo[14]	=	$dx[1];
				$dx	=	get_HK_ior($datainfo[27],$datainfo[28]);
				$datainfo[27]	=	$dx[0];
				$datainfo[28]	=	$dx[1];
				
				//测试赛事，不采集 直接跳过

				if(strpos($datainfo[2],'测试'))continue;
				if(strpos(strtolower($datainfo[5]),'test'))continue;
				if(strpos($datainfo[1],'</font>')) $datainfo[1] = '45.5';
				
				$str	.= "\$zqgq[$i]['Match_ID']			=	'$datainfo[0]';\r\n";
				$str	.= "\$zqgq[$i]['Match_Master']		=	'$datainfo[5]';\r\n";
				$str	.= "\$zqgq[$i]['Match_Guest']			=	'$datainfo[6]';\r\n";
				$str	.= "\$zqgq[$i]['Match_Name']			=	'$datainfo[2]';\r\n";
				$str	.= "\$zqgq[$i]['Match_Time']			=	'$datainfo[1]';\r\n";
				$str	.= "\$zqgq[$i]['Match_Ho']			=	'".sprintf("%.2f",$datainfo[9])."';\r\n";
				$str	.= "\$zqgq[$i]['Match_DxDpl']			=	'".sprintf("%.2f",$datainfo[14])."';\r\n";
				$str	.= "\$zqgq[$i]['Match_BHo']			=	'".sprintf("%.2f",$datainfo[23])."';\r\n";
				$str	.= "\$zqgq[$i]['Match_Bdpl']			=	'".sprintf("%.2f",$datainfo[28])."';\r\n";
				$str	.= "\$zqgq[$i]['Match_Ao']			=	'".sprintf("%.2f",$datainfo[10])."';\r\n";
				$str	.= "\$zqgq[$i]['Match_DxXpl']			=	'".sprintf("%.2f",$datainfo[13])."';\r\n";
				$str	.= "\$zqgq[$i]['Match_BAo']			=	'".sprintf("%.2f",$datainfo[24])."';\r\n";
				$str	.= "\$zqgq[$i]['Match_Bxpl']			=	'".sprintf("%.2f",$datainfo[27])."';\r\n";
				$str	.= "\$zqgq[$i]['Match_RGG']			=	'$datainfo[8]';\r\n";
				$str	.= "\$zqgq[$i]['Match_BRpk']			=	'$datainfo[22]';\r\n";
				$str	.= "\$zqgq[$i]['Match_ShowType']		=	'$datainfo[7]';\r\n";
				$str	.= "\$zqgq[$i]['Match_Hr_ShowType']	=	'$datainfo[7]';\r\n";
				$str	.= "\$zqgq[$i]['Match_DxGG']			=	'$datainfo[11]';\r\n";
				$str	.= "\$zqgq[$i]['Match_Bdxpk']			=	'$datainfo[25]';\r\n";
				$str	.= "\$zqgq[$i]['Match_HRedCard']		=	'$datainfo[29]';\r\n";
				$str	.= "\$zqgq[$i]['Match_GRedCard']		=	'$datainfo[30]';\r\n";
				$str	.= "\$zqgq[$i]['Match_NowScore']		=	'$datainfo[18]:$datainfo[19]';\r\n";
				$str	.= "\$zqgq[$i]['Match_BzM']			=	'".sprintf("%.2f",$datainfo[33])."';\r\n";
				$str	.= "\$zqgq[$i]['Match_BzG']			=	'".sprintf("%.2f",$datainfo[34])."';\r\n";
				$str	.= "\$zqgq[$i]['Match_BzH']			=	'".sprintf("%.2f",$datainfo[35])."';\r\n";
				$str	.= "\$zqgq[$i]['Match_Bmdy']			=	'".sprintf("%.2f",$datainfo[36])."';\r\n";
				$str	.= "\$zqgq[$i]['Match_Bgdy']			=	'".sprintf("%.2f",$datainfo[37])."';\r\n";
				$str	.= "\$zqgq[$i]['Match_Bhdy']			=	'".sprintf("%.2f",$datainfo[38])."';\r\n";
				$str	.= "\$zqgq[$i]['Match_CoverDate']		=	'$time';\r\n";
				$str	.= "\$zqgq[$i]['Match_Date']			=	'$datainfo[42]';\r\n";
				$str	.= "\$zqgq[$i]['Match_Type']			=	'2';\r\n";
				$str	.= "\$zqgq[$i]['Match_MatchTime']			=	'".str_replace('<br>',' ',$datainfo[47])."';\r\n";
		}
		
		if($str == ""){
			if($count){
				$cache	   .=	"\$count		=	0;\r\n";
				if(!write_file($_SERVER['DOCUMENT_ROOT']."/app/member/cache/zqgq.php",$cache.'?>')){ //写入缓存失败
					return false;
				}
			}
			return false;
		}else{
			$cache	   .=	"\$count		=	$i;\r\n";
			$cache	   .=	$str;
	
			if(!write_file($_SERVER['DOCUMENT_ROOT']."/app/member/cache/zqgq.php",$cache.'?>')){ //写入缓存失败
				return false;
			}else{
				return true;
			}
		}
	}else{
		return false;
	}
}

function lqgq_cj(){
	$C_Patch=$_SERVER['DOCUMENT_ROOT'];
	include($C_Patch."/app/member/cache/uid.php");
	include("pub_library.php");
	include("http.class.php");
	$langx	=	'zh-cn';
	$data	=	theif_data($hgweb,$hguid,'BK','re_main',$langx,0);
	if(sizeof(explode("gamount",$data))>1){
		$k=0;
		preg_match_all("/g\((.+?)\);/is",$data,$matches);
		$cou=sizeof($matches[0]);
		$meg	= "本次无数据采集";
		$cache	= "<?php\r\nunset(\$lqgq,\$count,\$lasttime);\r\n";
		$cache .= "\$lqgq		=	array();\r\n";
		$cache .= "\$lasttime	=	".time().";\r\n";
		$str	= "";
		$time	= date("Y-m-d H:i:s");
		for($i=0;$i<$cou;$i++){
			$messages=$matches[0][$i];
			$messages=str_replace("g([","Array(",$messages);
			$messages=str_replace("]);",")",$messages);
			$messages=str_replace("cha(9)","",$messages);
			$datainfo=eval("return $messages;");

				$datainfo[5] = str_replace('<fontcolor=gray>','',$datainfo[5]);
				$datainfo[6] = str_replace('<fontcolor=gray>','',$datainfo[6]);
				$datainfo[5] = str_replace('<font color=gray>','',$datainfo[5]);
				$datainfo[5] = str_replace('</font>','',$datainfo[5]);
				$datainfo[6] = str_replace('<font color=gray>','',$datainfo[6]);
				$datainfo[6] = str_replace('</font>','',$datainfo[6]);
				$datainfo[8]	=	str_replace(' ','',$datainfo[8]);
				$datainfo[11]	=	str_replace(' ','',$datainfo[11]);
				$datainfo[11]	=	substr($datainfo[11],1,strlen($datainfo[11])-1);
				$datainfo[32]	=	substr($datainfo[32],0,5);
				
				if(strpos($datainfo[2],'测试'))continue;
				if(strpos(strtolower($datainfo[5]),'test'))continue;

				if($datainfo[9]==0.01 || $datainfo[10]==0.01 || $datainfo[8] == '2.5'){ //皇冠测试水位0.01，不显示 2.5测试盘口也不显示
					$datainfo[8]	=	'';
					$datainfo[9]	=	0;
					$datainfo[10]	=	0;
				}
				if($datainfo[13]==0.01 || $datainfo[14]==0.01){ //皇冠测试水位，不显示
					$datainfo[11]	=	'';
					$datainfo[13]	=	0;
					$datainfo[14]	=	0;
				}
				$d47Array = explode("<br>", strtolower($datainfo[47]));
				if(count($d47Array)>1)
				{
					$match_date=$d47Array[0];
				}else{
					$match_date=$datainfo[47];
				}
				$str	.= "\$lqgq[$i]['Match_ID']			=	'$datainfo[0]';\r\n";
				$str	.= "\$lqgq[$i]['Match_Master']		=	'$datainfo[5]';\r\n";
				$str	.= "\$lqgq[$i]['Match_Guest']			=	'$datainfo[6]';\r\n";
				$str	.= "\$lqgq[$i]['Match_Name']			=	'$datainfo[2]';\r\n";
				$str	.= "\$lqgq[$i]['Match_Time']			=	'$datainfo[1]';\r\n";
				$str	.= "\$lqgq[$i]['Match_Ho']			=	'".sprintf("%.2f",$datainfo[9])."';\r\n";
				$str	.= "\$lqgq[$i]['Match_DxDpl']			=	'".sprintf("%.2f",$datainfo[14])."';\r\n";
				$str	.= "\$lqgq[$i]['Match_DsDpl']			=	'$datainfo[18]';\r\n";
				$str	.= "\$lqgq[$i]['Match_Ao']			=	'".sprintf("%.2f",$datainfo[10])."';\r\n";
				$str	.= "\$lqgq[$i]['Match_DxXpl']			=	'".sprintf("%.2f",$datainfo[13])."';\r\n";
				$str	.= "\$lqgq[$i]['Match_DsXpl']			=	'$datainfo[19]';\r\n";
				$str	.= "\$lqgq[$i]['Match_RGG']			=	'$datainfo[8]';\r\n";
				$str	.= "\$lqgq[$i]['Match_BzM']			=	'".sprintf("%.2f",$datainfo[29])."';\r\n";
				$str	.= "\$lqgq[$i]['Match_BzG']			=	'".sprintf("%.2f",$datainfo[30])."';\r\n";
				$str	.= "\$lqgq[$i]['Match_BzH']			=	'".sprintf("%.2f",$datainfo[31])."';\r\n";
				$str	.= "\$lqgq[$i]['Match_ShowType']		=	'$datainfo[7]';\r\n";
				$str	.= "\$lqgq[$i]['Match_DxGG']			=	'$datainfo[11]';\r\n";
				$str	.= "\$lqgq[$i]['Match_CoverDate']		=	'$time';\r\n";
				$str	.= "\$lqgq[$i]['Match_Date']			=	'$match_date';\r\n";
				$str	.= "\$lqgq[$i]['Match_Type']			=	'2';\r\n";

			}
		
		if($str == ""){
			if($count){
				$cache	   .=	"\$count		=	0;\r\n";
				if(!write_file($_SERVER['DOCUMENT_ROOT']."/app/member/cache/lqgq.php",$cache.'?>')){ //写入缓存失败
					return false;
				}
			}
			return false;
		}else{
			$cache	   .=	"\$count		=	$i;\r\n";
			$cache	   .=	$str;
			if(!write_file($_SERVER['DOCUMENT_ROOT']."/app/member/cache/lqgq.php",$cache.'?>')){ //写入缓存失败
				return false;
			}else{
				return true;
			}
		}
	}else{
		return false;
	}
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
?>