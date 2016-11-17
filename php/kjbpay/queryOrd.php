<?php
session_start();
include 'proterties.php';
if (isset($_POST['p2_Order'])){
	include 'HttpClient.class.php';	
	$QueryOrdURL_onLine = "http://www.slmmyy.com/bankinterface/queryOrd";// 订单查询接口请求正式地址
	
	$p0_Cmd 	= "QueryOrdDetail"; #接口类型
	
    $p2_Order = $_POST['p2_Order'];	#商户订单号
	
    $hmac = strtoupper(md5("p0_Cmd$p0_Cmd"."p1_MerId$p1_MerId"."p2_Order$p2_Order".$key));
    
    $params = array (
			'p0_Cmd' => $p0_Cmd,
			// 加入商户编号
			'p1_MerId' => $p1_MerId,
			// 加入商户订单号
			'p2_Order' => $p2_Order,
			// 加入校验码
			'hmac' => $hmac 
	);
	
    $pageContents = HttpClient::quickPost($QueryOrdURL_onLine, $params);
    echo $pageContents;
    $result = explode("\n",$pageContents);
    ## 声明查询结果
    $r0_Cmd					= "";			#	取得业务类型
    $r1_Code				= "";     #	查询结果状态码
    $r2_TrxId				= "";			#	易宝支付交易流水号
    $r3_Amt					= "";			#	支付金额
    $r4_Cur					= "";			#	交易币种
    $r5_Pid					= "";			#	商品名称
    $r6_Order				= "";			#	商户订单号
    $r8_MP					= "";			#	商户扩展信息
    $rb_PayStatus		= "";			#	支付状态
    $rc_RefundCount	= "";			#	已退款次数
    $rd_RefundAmt		= "";			#	已退款金额
    $hmac						= "";     #	查询返回数据的签名串
    
    for($index=0;$index<count($result);$index++){//数组循环
    	$result[$index] = trim($result[$index]);
    	if (strlen($result[$index]) == 0) {
    		continue;
    	}
    	$aryReturn = explode("=",$result[$index]);
    	$sKey = $aryReturn[0];
    	$sValue = $aryReturn[1];
    	if($sKey=="r0_Cmd"){											#业务类型
    		$r0_Cmd = $sValue;
    	}elseif($sKey=="r1_Code"){								#查询结果状态码
    		$r1_Code = $sValue;
    	}elseif($sKey == "r2_TrxId"){			        #易宝支付交易流水号
    		$r2_TrxId = $sValue;
    	}elseif($sKey == "r3_Amt"){			          #支付金额
    		$r3_Amt = $sValue;
    	}elseif($sKey == "r4_Cur"){			          #交易币种
    		$r4_Cur = $sValue;
    	}elseif($sKey == "r5_Pid"){								#商品名称
    		$r5_Pid = $sValue;
    	}elseif($sKey == "r6_Order"){							#商户订单号
    		$r6_Order = $sValue;
    	}elseif($sKey == "r8_MP"){							  #商户扩展信息
    		$r8_MP = $sValue;
    	}elseif($sKey == "rb_PayStatus"){					#支付状态
    		$rb_PayStatus = $sValue;
    	}elseif($sKey == "rc_RefundCount"){				#已退款次数
    		$rc_RefundCount = $sValue;
    	}elseif($sKey == "rd_RefundAmt"){					#已退款金额
    		$rd_RefundAmt = $sValue;
    	}elseif($sKey == "hmac"){									#取得校验码
    		$hmac = $sValue;
    	}else{
    		echo $result[$index],'<br/>';
    	}
    }
    
    
    #进行校验码检查 取得加密前的字符串
    $sbOld="";
    #加入业务类型
    $sbOld .= 'r0_Cmd'.$r0_Cmd;
    #加入查询操作是否成功
    $sbOld .= 'r1_Code'.$r1_Code;
    #加入易宝支付交易流水号
    $sbOld .= 'r2_TrxId'.$r2_TrxId;
    #加入支付金额
    $sbOld .= 'r3_Amt'.$r3_Amt;
    #加入交易币种
    $sbOld .= 'r4_Cur'.$r4_Cur;
    #加入商品名称
    $sbOld .= 'r5_Pid'.$r5_Pid;
    #加入商户订单号
    $sbOld .= 'r6_Order'.$r6_Order;
    #加入商户扩展信息
    $sbOld .= 'r8_MP'.$r8_MP;
    #加入支付状态
    $sbOld .= 'rb_PayStatus'.$rb_PayStatus;
    #加入已退款次数
    $sbOld .= 'rc_RefundCount'.$rc_RefundCount;
    #加入已退款金额
    $sbOld .= 'rd_RefundAmt'.$rd_RefundAmt;
     
    echo "<br/>[".$sbOld."]<br/>";
    
    //echo $sNewString;
    //echo $sNewString;
    
    $sNewString = strtoupper(md5($sbOld.$key));
    
    //校验码正确
    if($sNewString==$hmac) {
	    if($r1_Code=="1"){
		    echo "<br>查询成功!";
		    echo "<br>订单号:".$r6_Order;
		    echo "<br>快捷宝支付交易流水号:".$r2_TrxId;
		    echo "<br>商品名称:".$r5_Pid;
		    	echo "<br>支付金额:".$r3_Amt;
		    	echo "<br>商户扩展信息:".$r8_MP;
		    	echo "<br>订单状态:".$rb_PayStatus;
		    	echo "<br>已退款次数:".$rc_RefundCount;
		    	echo "<br>已退款金额:".$rd_RefundAmt;
	    } else if($r1_Code=="50"){
	    	echo "<br>该订单不存在";
	    	exit;
	    } else{
	    	echo "<br>查询失败";
	    	exit;
	    	}
     } else{
    	echo "<br>localhost:".$sNewString;
    	echo "<br>kuaiyin:".$hmac;
    	echo "<br>交易信息被篡改";
    	exit;
     }
    
}else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>订单查询接口演示</title>
</head>
<body>
<center>当前商户编号：<?php echo $p1_MerId;?></center>
	<form method="post" action="" target="_blank">
		<table width="50%"border="0" align="center" >
			<tr>
				<td align="left" width="30%">&nbsp;&nbsp;商户订单号</td>
				<td align="left">&nbsp;&nbsp;<input type="text" name="p2_Order"
					id="p2_Order" value="" />&nbsp;<span
					style="color: #FF0000; font-weight: 100;">*</span></td>
			</tr>
			<tr>
				<td align="left">&nbsp;</td>
				<td align="left">&nbsp;&nbsp;<input type="submit" value="提交" /></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php }?>