<?php

//echo $_POST['trtype'];exit;
function HTMLEncode($sHTML){
			$sHTML = urlencode($sHTML);
			return $sHTML;
		}

function randomkeys($length)
{
 $pattern='1234567890';
 for($i=0;$i<$length;$i++)
 {
   $key .= $pattern{mt_rand(0,9)}; 
 }
 return $key;
}

session_start();
if(!isset($_SESSION["uid"]) || !isset($_SESSION["username"])){
	header("Location:/index.php");
	exit();
}
if($_SESSION["username"]==''){
	header("Location: /index.php");
	exit;
}
unset($mysqli);
$mysqli	=	new MySQLi("localhost","root","LOVEbaby1218!@#$","yl66y");
$mysqli->query("set names utf8");

include_once("../newallbet2/config.php");


include_once("../app/member/class/user.php");

include_once("../newallbet2/api.class.php");

$uid	=	$_SESSION["userid"];
$loginid=	$_SESSION["uid"];


$userinfo		=	user::getinfo($uid);

$username  = $userinfo['user_name'];
$userid_long  = $userinfo['user_id'];

				$agusername  = $userinfo["ab_username"];//ag帐号
                $bbinapi = new BBIN_TZH($comId, $comKey,$apiKey);
				
				//判断AG帐号是为空，没有则添加
				if($agusername==""){               
					exit;
				}

if($_POST["trtype"]=="1"){
	
$sql = "select * from user_list where user_id='$uid'";
$result = $mysqli->query($sql);
$row=$result->fetch_array();
$conver=htmlEncode(doubleval($_POST["p3_Amt"]));//转换金额$_POST['conver'];
if(($conver<0)||($conver>$row["money"])){
echo "金额错误，请重新输入。";
exit;
}else{

$mysqli->autocommit(FALSE);
		$mysqli->query("BEGIN"); //事务开始
		try{
			$pay_value	=	0-$conver; //把金额置成带符号数字	
			$trtype = $_POST["trtype"];
			
			if($_POST["trtype"]=="1"){
				$about="体育/彩票账户->ALLBET大厅";
				
				
				
				//
				
				$agusername = $userinfo['ab_username'];
				$opCredit = $pay_value;//trim($_POST['opCredit']);
				$ro = mt_rand(100000, 999999);
				$orderSN = time().$ro;
				//echo $agusername."_".$orderSN."_".$conver;exit;
			$result = $bbinapi->TransferIn($agusername, $orderSN, $conver);
			//echo $result;exit;
                        //var_dump($result);exit;	
			if($result===true){
					echo "转入成功";
				}else{
					if(strpos($result,'信用额度不足')>0){
						$result0 = '信用额度不足';
					echo "转入失败";exit;
					}else{
					echo "转入失败";exit;
					}
				}
				
			}else{
				//$trtype = 9;//5转真人，6转至T0
			}
			
			 $sql		=	"update user_list set money=money+$pay_value where user_id='$uid'";
			$mysqli->query($sql);// or die($sql);
			$q1			=	$mysqli->affected_rows;
			
			$status=2;
			$order		=	date("YmdHis")."_".$_SESSION['username'];
			
			$status=1;
			
			 /*$sql		=	"insert into k_money(uid,m_value,status,m_order,pay_card,pay_num,pay_address,pay_name,about,assets,balance,`type`) values($uid,$pay_value,$status,'$order','".$row["pay_card"]."','".$row["pay_num"]."','".$row["pay_address"]."','".$row["pay_name"]."','$about',".$row["money"].",".($row["money"]+$pay_value).",'5')";*/
			
			$change_money = $pay_value;//$_POST["change_money"];
			$change_money = intval($change_money);
			//if(is_int($change_money) && $change_money>0){}
			$assets = $row["money"];
			$balance = $assets-$change_money;
			$datereg=	date("YmdHis").randomkeys(4);
			$sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$uid','$datereg','$about',now(),'真人转账','$change_money','$assets','$balance');";



			$mysqli->query($sql) or die($sql);
			$q2		=	$mysqli->affected_rows;
			//echo "q1 = $q1;q2 = $q2";
			//exit($sql);
			if($q1==1 && $q2==1){
				$mysqli->commit(); //事务提交
					message('转换申请已经提交转换。','ed.php');

			}else{
				$mysqli->rollback(); //数据回滚
				message("由于网络堵塞，本次申请提款2失败。\\n请您稍候再试，或联系在线客服。");
			}
		}catch(Exception $e){
			$mysqli->rollback(); //数据回滚
			message("由于网络堵塞，本次申请提款失败。\\n请您稍候再试，或联系在线客服。");
		}

//$sql="update k_user set conver=conver+".$conver.",money=money-".$conver." where uid='$uid'";
//$mysqli->query($sql);
echo '转换成功';
exit;
}
	
}

if($_POST["trtype"]=="2"){
	
$sql = "select * from user_list where user_id='$uid'";
$result = $mysqli->query($sql);
$row=$result->fetch_array();

$conver=htmlEncode(doubleval($_POST["p3_Amt"]));//转换金额$_POST['conver'];
if($conver<0){
echo "金额错误，请重新输入";
exit;
}else{

$mysqli->autocommit(FALSE);
		$mysqli->query("BEGIN"); //事务开始
		try{
			$pay_value	=	$conver; //把金额置成带符号数字
			
			
			
			$trtype = $_POST["trtype"];//7 T0转至体育时时彩
			$status=1;//AG直接转换到体育时时彩
			
			
				
				$agusername = $userinfo['ab_username'];
				
				//$opCredit = $pay_value;//trim($_POST['opCredit']);
				$ro = mt_rand(100000, 999999);
				$orderSN = time().$ro;
				//echo $agusername."_".$orderSN."_".$conver;exit;
				$result = $bbinapi->TransferOut($agusername, $orderSN, $conver);
				//echo $result;exit;
				//$result = $bbinapi->TransferOut($agusername, $password, $pay_value);
				if($result===true){
					echo "转换成功";
				}else{
					echo "转入失败";
				}

				
				
				
				
				
			
			
			$sql		=	"update user_list set money=money+$pay_value where user_id='$uid'";
			$mysqli->query($sql);//or die($sql);
			$q1			=	$mysqli->affected_rows;
			
			$about = "ALLBET大厅->体育/彩票账户";
			$order		=	date("YmdHis")."_".$_SESSION['username'];			
			/*$sql		=	"insert into k_money(uid,m_value,status,m_order,pay_card,pay_num,pay_address,pay_name,about,assets,balance,`type`) values($uid,$pay_value,$status,'$order','".$row["pay_card"]."','".$row["pay_num"]."','".$row["pay_address"]."','".$row["pay_name"]."','$about',".$row["money"].",".($row["money"]+$pay_value).",7)";*/
			
			$change_money = $pay_value;//$_POST["change_money"];
			$change_money = intval($change_money);
			//if(is_int($change_money) && $change_money>0){}
			$assets = $row["money"];
			$balance = $assets+$change_money;
			$datereg=	date("YmdHis").randomkeys(4);
			$sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$uid','$datereg','$about',now(),'真人转账','$change_money','$assets','$balance');";



			$mysqli->query($sql);// or die($sql);
			$q2		=	$mysqli->affected_rows;
			
			if($q1==1 && $q2==1){
				$mysqli->commit(); //事务提交
				if($trtype=="7"){//start 6
						
				}//end 6
				else{
				
					echo "转换成功";exit;
				}
			}else{
				$mysqli->rollback(); //数据回滚
				echo "由于网络堵塞，本次申请提款2失败。\\n请您稍候再试，或联系在线客服。";exit;
			}
		}catch(Exception $e){
			$mysqli->rollback(); //数据回滚
			echo "由于网络堵塞，本次申请提款2失败。\\n请您稍候再试，或联系在线客服。";exit;
		}


echo "转换成功";
exit;
}
	
}