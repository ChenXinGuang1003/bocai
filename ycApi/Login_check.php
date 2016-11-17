<?php
	session_start();
	include("config.php");
	include("Apiyc.class.php");
	/* 
	 * To change this license header, choose License Headers in Project Properties.
	 * To change this template file, choose Tools | Templates
	 * and open the template in the editor.
	 */
	$token=$ks;
	$u=$_POST['user'];
	
	//站点效验码  
	$ti=time();
	$p=  substr($ti,4);
	
	$aa=$web_key_substr;
	$aa=  str_replace('+','%2B',$aa);
	$sign=md5($u.$token);
	$signs=md5($u.$token);
	$sign=strtoupper($sign);
	$signs=strtoupper($signs);
	
	$curl=$login.$u."&p=".$p."&aa=".$aas."&sign=".$sign."";
	 
	$qq=new Apiyc();
	$result=$qq->https_request($curl);
	
	$result=  json_decode($result,TRUE);
	var_dump($result);
	if($result['success']==false)
	{
		$url=$speed.$u."&p=".$p."&aa=".$aas."&sign=".$signs."";   
		
		$result=$qq->https_request($url);
		$result=  json_decode($result,TRUE);
		
		$_SESSION['ycTokenID']=$result['TokenID'];
 
	}else{
		$_SESSION['ycTokenID']=$result['TokenID'];
	 
	}
      
        
?>