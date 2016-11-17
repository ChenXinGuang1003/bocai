<?php

include "app/member/include/com_chk.php";

if($_GET['val']==2){
	$sql='select * from six_lottery_odds where sub_type="LX2" ';
}else if($_GET['val']==3){
	$sql='select * from six_lottery_odds where sub_type="LX3" ';
}else if($_GET['val']==4){
	$sql='select * from six_lottery_odds where sub_type="LX4" ';
}else{
	$sql='select * from six_lottery_odds where sub_type="LX5" ';
}
$query=$mysqli->query($sql);
$arr=$query->fetch_row();

echo json_encode($arr);
?>