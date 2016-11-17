<? header("content-Type: text/html; charset=UTF-8");?>
<?php
 	
	
	
	function getSign($signStr){
		
		$data = array('plainText'=>$signStr);
		$ch = curl_init(); 
		curl_setopt($ch, CURLOPT_URL, 'http://127.0.0.1:8888/sign');
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
		curl_setopt($ch, CURLOPT_POST, 1); 
		curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data)); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_TIMEOUT, 30); 
		curl_setopt($ch, CURLOPT_HEADER, 0); 
		$result = curl_exec($ch); 
		$dealresult=explode('message=',$result);
		return $dealresult[1];
		curl_close($ch);
	}
	
	
	function  verifySign($signStr,$sign){
		
		$data = array('plainText'=>$data,'signedData'=>$sign);
		$ch = curl_init(); 
		curl_setopt($ch, CURLOPT_URL,'http://127.0.0.1:8888/validateSign');
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
		curl_setopt($ch, CURLOPT_POST, 1); 
		curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data)); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_TIMEOUT, 30); 
		curl_setopt($ch, CURLOPT_HEADER, 0); 
		$result = curl_exec($ch); 
		$dealresult=explode('&',$result);
		return substr($dealresult[0],strlen("validateResult="));
		curl_close($ch);
		}
		
	
		
	
	
	
		
?>

