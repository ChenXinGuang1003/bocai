<?php
//ini_set("display_errors","yes");
function zqgq_cj(){
	include_once("../cj/cj/pub_library.php");
	include_once("../cj/cj/http.class.php");;
	include_once("../cj/cj/db.php");
	include_once("../cj/cj/function.php");
	include_once("../cache/gp_db.php");
	
	$langx	=	'zh-tw';
	$data	=	theif_data($webdb["datesite"],$webdb["cookie"],'FT','re',$langx,0);
	//echo $data;exit;
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
			
			if(in_array($datainfo[0],$gp_db) || strpos($datainfo[1],':')){
				//有关盘的联赛则不开盘，02:15a 有 : 表示未开赛,未开赛不采集
			}else{
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
			}
		}
		
		if($str == ""){
			if($count){
				$cache	   .=	"\$count		=	0;\r\n";
				if(!write_file("../cache/zqgq.php",$cache.'?>')){ //写入缓存失败
					$meg	=	"缓存文件写入失败！请先设/cache/zqgq.php文件权限为：0777";
				}
			}
			return false;
		}else{
			$cache	   .=	"\$count		=	$i;\r\n";
			$cache	   .=	$str;
	
			if(!write_file($_SERVER['DOCUMENT_ROOT']."/cache/zqgq.php",$cache.'?>')){ //写入缓存失败
				$meg	=	"缓存文件写入失败！请先设/cache/zqgq.php文件权限为：0777";
			}else{
				$meg	=	"$i 条走地数据！";
			}
			return true;
		}
	}else{
		return false;
	}
}

function lqgq_cj(){
	include_once("../cj/cj/pub_library.php");
	include_once("../cj/cj/http.class.php");
	include_once("../cj/cj/db.php");
	include_once("../cj/cj/function.php");
	include_once("../cache/gp_db.php");
	
	$langx	=	'zh-tw';
	$data	=	theif_data($webdb["datesite"],$webdb["cookie"],'BK','re',$langx,0);
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
			
			if(in_array($datainfo[0],$gp_db)){
			//有关盘的联赛则不开盘
			}else{
				$datainfo[5]	=	ereg_replace("<[^>]*>","",$datainfo[5]);
				$datainfo[6]	=	ereg_replace("<[^>]*>","",$datainfo[6]);
				$datainfo[8]	=	str_replace(' ','',$datainfo[8]);
				$datainfo[11]	=	str_replace(' ','',$datainfo[11]);
				$datainfo[11]	=	substr($datainfo[11],1,strlen($datainfo[11])-1);
				$datainfo[32]	=	substr($datainfo[32],0,5);
				
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
				$str	.= "\$lqgq[$i]['Match_ShowType']		=	'$datainfo[7]';\r\n";
				$str	.= "\$lqgq[$i]['Match_DxGG']			=	'$datainfo[11]';\r\n";
				$str	.= "\$lqgq[$i]['Match_CoverDate']		=	'$time';\r\n";
				$str	.= "\$lqgq[$i]['Match_Date']			=	'$datainfo[32]';\r\n";
				$str	.= "\$lqgq[$i]['Match_Type']			=	'2';\r\n";
			}
		}
		
		if($str == ""){
			if($count){
				$cache	   .=	"\$count		=	0;\r\n";
				if(!write_file($_SERVER['DOCUMENT_ROOT']."/cache/lqgq.php",$cache.'?>')){ //写入缓存失败
					$meg	=	"缓存文件写入失败！请先设/cache/lqgq.php文件权限为：0777";
				}
			}
			return false;
		}else{
			$cache	   .=	"\$count		=	$i;\r\n";
			$cache	   .=	$str;
			if(!write_file($_SERVER['DOCUMENT_ROOT']."/cache/lqgq.php",$cache.'?>')){ //写入缓存失败
				$meg	=	"缓存文件写入失败！请先设/cache/lqgq.php文件权限为：0777";
			}else{
				$meg	=	"$i 条走地数据！";
			}
			return true;
		}
	}else{
		return false;
	}
}
?>