<?php
#商户编号p1_MerId,以及密钥Key
$p1_MerId = "10000";
$key = "29JlKVk0FjGULVwowS3iTI1ZmzCiT2zyXb6BwCVO2qg1veQym5RgBB4uGSE5zvko";

if (isset($_SESSION['bank_interface_u_k'])){
	$arr = explode('|', $_SESSION['bank_interface_u_k']);
	$p1_MerId = $arr[0];
	$key = $arr[1];
}
