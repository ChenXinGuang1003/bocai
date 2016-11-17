<?php
	
	include("config.php");
	include("Apiyc.class.php");
	/* 
	 * To change this license header, choose License Headers in Project Properties.
	 * To change this template file, choose Tools | Templates
	 * and open the template in the editor.
	 */

	$a=new Apiyc();
	$tid=$_POST['ycTokenID'];
	$url=$sonb.$tid."";
	$arr=$a->https_request($url);
	echo $arr ;
?>