<?php
	error_reporting(E_ALL ^ E_ALL);
	
	include("config.php");
	include("Apiyc.class.php");
	include("Des.class.php");
	include("encrypt_class.php");
	/* 
	 * 额度转换逻辑
	 * 在此之前
	 * 1、请在k_user表里面加入'lottery'字段 类型为float 不允许为空 默认0；
	 * 2、请导入yc_money_change.sql表结构至数据库,以'orders'字段为主键
	 */
unset($mysqli);
$mysqli	=	new MySQLi("localhost","root",'LOVEbaby1218!@#$',"yl66y");
$mysqli->query("set names utf8");
	$me=$_POST['methdes'];
	$mon=  intval($_POST['money']);
    $code=$_POST["base"]; 	// 传入的base参数为以';'分隔参数的字符串，并转base64编码再替换'c'字符成$base64_blur

    $code=str_replace($base64_blur,'c', $code);
	$arr=base64_decode($code);
	$arr=explode(";", $arr);
	$username=$arr[0];
	$username=  substr($username,0,11);
	$To=$arr[1];
    $orders=  time();
	$se=new Des();
	
	$ycTokenID= substr(strtoupper(md5($To)),1,24);

	$key=$ks;
	$key=$se->DES($key,0);
	$u=$se->encrypt($orders.'|'.$username.'|'.$mon.'|'.$orders, $key);
	$u=  str_replace('+','%2B',$u);

	$obj=new Apiyc();
      
	$sql="select * from user_list where user_name='$username'";
	$result=$mysqli->query($sql);
	$result=$result->fetch_array();

	$uid=$result['id'];
	$f_money=$result['money'];
	$f_lottery=$result['lottery'];
	$times=  date("Y/m/d H:i:s",  time());

	//增加转款记录  如果充值先扣除账户金额
	$sql="insert into yc_money_change(orders,username,userID,handle_money,conditions,lottery_money,Balance,start_time,over_time) values ('$orders','$username',$uid,$mon,1,$f_lottery,$f_money,'$times','$times')";
	//echo $sql;
        $arr=$mysqli->query($sql);
	if($arr)
	{
		if($me==0)
		{
			if($f_money-$mon<0)
			{
				$databack['success']=false;
				$databack['msg']='钱包余额不足!';
				echo json_encode($databack);
				exit();
			}
			
			$sqls="update user_list set money=$f_money-$mon where user_name='$username'";
			$mysqli->query("BEGIN"); //事务开始
			try 
			{
				$inf=$mysqli->query($sqls);    
				$url=$plus.$u."&id=".$To;
				$res=$obj->https_request($url);
				$res=  json_decode($res,TRUE);
				if($res['success']==TRUE)
				{
					$wh="update yc_money_change set conditions=2 where orders='$orders'";
					$resu= $mysqli->query($wh);
					if($resu)
					{
						$ov_time=  date("Y/m/d H:i:s",time());
						$sql="update yc_money_change set over_time='$ov_time' where orders='$orders'";
						$mysqli->query($sql);
						$databack['success']=TRUE; 
						$databack['msg']='兑换成功';
						echo json_encode($databack);
						exit();
					}
					else 
					{
						$databack['success']=FALSE;
						$databack['msg']='用户钱包修改成功,盈彩转款记录表更改失败';
						echo json_encode($databack);
						exit();
					}
				}else if($resu['success']==FALSE)
				{
					$databack['success']=FALSE;
                                        $databack['msg']='站点彩票额度不足!';
                                        $sqls="update user_list set money=$f_money where user_name='$username'";
                                        $mysqli->query($sqls);
					echo json_encode($databack);
                                        exit();
                                }else{
                                    $databack['success']=FALSE;
                                     $databack['msg']='网络链接失败';
                                    echo json_encode($databack);
                                    exit();
                                }

			} catch (Exception $ex) {
				$mysqli->rollback(); //数据回滚
			}
		}
		else
		{
			//否则彩票余额提现 先扣除彩票余额再充值
			$mysqli->query("BEGIN"); //事务开始
			try {

				$url=$minus.$u."&id=".$To;
				$res=$obj->https_request($url);
				$res=  json_decode($res,TRUE);
				
				if($res['success']==TRUE)
				{
					$wh="update yc_money_change set conditions=2 where orders='$orders'";
					$resu= $mysqli->query($wh);

					//转款记录记录表成功
					if($resu)
					{
						//彩票余额提现成功,充值中心钱包余额
						$cz="update user_list set money=$f_money+$mon where user_name='$username'";
						$mysqli->query($cz);
						$ov_time=time();
						$sql="update yc_money_change set over_time='$ov_time' where orders='$orders'";
						$mysqli->query($sql);
						$databack['success']=TRUE; 
						$databack['msg']='兑换成功';
						echo json_encode($databack);
						exit();
					}
					else
					{
						$databack['success']=FALSE;
						$databack['msg']='用户钱包修改成功,盈彩转款记录表更改失败';
						echo json_encode($databack);
						exit();
					}
				}
				else if($res['success']==FALSE)
				{
					$databack['success']=false;
					$databack['msg']='彩票余额不足!';
					echo json_encode($databack);
					exit();
                                }else{
                                    $databack['success']=false;
				    $databack['msg']='网络错误!';
                                    echo json_encode($databack);
					exit();
                                }
			   
			} catch (Exception $ex) {
			   $mysqli->rollback(); //数据回滚
			}
	  
		}
	}
	else
	{
		echo '404';
	}
	   
?>