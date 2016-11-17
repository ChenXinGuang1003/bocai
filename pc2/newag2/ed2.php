<?php
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
function message($value,$url=""){ //默认返回上一页
	header("Content-type: text/html; charset=utf-8");
	$js  ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>message</title>
</head>

<body>';
	$js  .= "<script type=\"text/javascript\" language=\"javascript\">\r\n";
	$js .= "alert(\"".$value."\");\r\n";
	if($url) $js .= "window.location.href=\"$url\";\r\n";
	else $js .= "window.history.go(-1);\r\n";
	$js .= "</script>\r\n";
$js.="</body></html>";
	echo $js;
	exit;
}
session_start();
if($_SESSION["username"]==''){
	header("Location: /index.php");
	exit;
}
unset($mysqli);
$mysqli	=	new MySQLi("localhost","bmw68","K2k5g4W8","bmw68");
$mysqli->query("set names utf8");

include_once("../newag/config.php");


include_once("../app/member/class/user.php");

include_once("../newag/api.class.php");

$uid	=	$_SESSION["userid"];
$loginid=	$_SESSION["uid"];


$userinfo		=	user::getinfo($uid);
$username  = $userinfo['user_name'];
 //$BB_user= PREFIX.strtoupper($userinfo["user_name"].$userinfo["id"]);
//echo $BB_user;
//exit;


				$agusername  = $userinfo["ag_username"];//ag帐号
                                $bbinapi = new BBIN_TZH($comId, $comKey,$gamePlatform);

				//判断AG帐号是为空，没有则添加
				if($agusername==""){//start
				
                                    $agusername = $pre.$username;
                                    if(!$bbinapi->GameUserRegister($agusername, $agpassword)){ // 创建失败
                                       echo "<script>alert('请联系管理员开通AG账号');</script>";
                                       exit;
                                    }  else {
                                    $sql = "update user_list set ag_username = '$agusername',ag_password = '$agpassword' where username = '$username'";
                                    $mysqli->query($sql);
                                    }         
				
				}
		
















		if($_GET["action"]=="save" && ($_POST["trtype"]=="1")){
	
$sql = "select * from user_list where user_id='$uid'";
$result = $mysqli->query($sql);
$row=$result->fetch_array();
$conver=htmlEncode(doubleval($_POST["p3_Amt"]));//转换金额$_POST['conver'];
if(($conver<0)||($conver>$row["money"])){
echo "<script>alert('金额错误，请重新输入。');</script>";
echo "<script>history.go(-1);</script>";
exit;
}else{

$mysqli->autocommit(FALSE);
		$mysqli->query("BEGIN"); //事务开始
		try{
			$pay_value	=	0-$conver; //把金额置成带符号数字	
			$trtype = $_POST["trtype"];
			
			if($_POST["trtype"]=="1"){
				$about="体育/彩票账户->真人";
				
				
				
				//
				
				$lowUser = $userinfo['bb_username'];
				$opCredit = $pay_value;//trim($_POST['opCredit']);
				

$ch = curl_init();  
curl_setopt($ch, CURLOPT_URL, "https://".BBIN_LOGIN_URL."/app/user/user.php?level=6&upperid=".UPPERID."&upperid=".UPPERID."&HallID=5&disable=N&sort=3&orderby=asc&page=1&loginname=".$lowUser); 
curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
preg_match_all("/UserID=(.+?)\&/is",$output,$ABBUserID);
$BBUserID=$ABBUserID[1][0];
curl_close($ch);

				$ch = curl_init(); 
				curl_setopt($ch,CURLOPT_URL,'https://'.BBIN_LOGIN_URL.'/app/user/user_edit_new.php');
				
				curl_setopt($ch, CURLOPT_POST, 1);
				$request = "userid=".$BBUserID."&level=6&balance_type=3&balance_chgtype=IN&jspw=N&chg_action=Y&type=dealer&new_balance=".(0-$pay_value)."&ctlpasswd=".LOGPWD."&otp_number=&edit_user=1";
				
				
				curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
				
				//echo $output;exit;
				curl_setopt($ch, CURLOPT_REFERER, "https://".BBIN_LOGIN_URL."/app/user/user_edit_new.php?act=modify&level=6&UserID=".$BBUserID."&HallID=5&loginname=".$lowUser);
				
				curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader); 
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($ch, CURLOPT_HEADER, false);
				curl_setopt($ch, CURLOPT_NOBODY, false);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				$output = curl_exec($ch);
				//echo htmlentities($output);exit;
				curl_close($ch);
				if(strpos($output,"document.location.replace('https:")!==false){
					echo "转入成功";
				}else{
					echo "转入失败";exit("<script>alert('由于网络堵塞,操作失败,请稍后操作！');history.go(-1);</script>");
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
			
			 /*$sql		=	"insert into k_money(uid,m_value,status,m_order,pay_card,pay_num,pay_address,pay_name,about,assets,balance,`type`) values($uid,$pay_value,$status,'$order','".$row["pay_card"]."','".$row["pay_num"]."','".$row["pay_address"]."','".$row["pay_name"]."','$about',".$row["money"].",".($row["money"]+$pay_value).",'5')";
			$mysqli->query($sql) or die($sql);*/

			
			//$about = "主账户转到BBIN";
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
					message('转换申请已经提交转换。');

			}else{
				$mysqli->rollback(); //数据回滚
				message("由于网络堵塞，本次申请提款2失败。\\n请您稍候再试，或联系在线客服。");
			}
		}catch(Exception $e){
			$mysqli->rollback(); //数据回滚
			message("由于网络堵塞，本次申请提款失败。\\n请您稍候再试，或联系在线客服。");
		}
$mysqli->close();
//$sql="update k_user set conver=conver+".$conver.",money=money-".$conver." where uid='$uid'";
//$mysqli->query($sql);
echo "<script>alert('转换成功');parent.window.location.reload();</script>";
echo "<script>location.href='ed2.php';</script>";
exit;
}
	
}















//真人(普通厅)->体育/彩票账户
//真人(VIP厅)->体育/彩票账户
if($_GET["action"]=="save" && ( $_POST["trtype"]=="2")){
	
$sql = "select * from user_list where user_id='$uid'";
$result = $mysqli->query($sql);
$row=$result->fetch_array();

$conver=htmlEncode(doubleval($_POST["p3_Amt"]));//转换金额$_POST['conver'];
if($conver<0){
echo "<script>alert('金额错误，请重新输入。');</script>";
echo "<script>history.go(-1);</script>";
exit;
}else{

$mysqli->autocommit(FALSE);
		$mysqli->query("BEGIN"); //事务开始
		try{
			$pay_value	=	$conver; //把金额置成带符号数字
			
			
			
			$trtype = $_POST["trtype"];//7 T0转至体育时时彩
			$status=1;//AG直接转换到体育时时彩
			
			
				
				$lowUser = $userinfo['bb_username'];
				
				$ch = curl_init();  
				curl_setopt($ch, CURLOPT_URL, "https://".BBIN_LOGIN_URL."/app/user/user.php?level=6&upperid=".UPPERID."&upperid=".UPPERID."&HallID=5&disable=N&sort=3&orderby=asc&page=1&loginname=".$lowUser); 
				curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader); 
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($ch, CURLOPT_HEADER, false);
				curl_setopt($ch, CURLOPT_NOBODY, false);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				$output = curl_exec($ch);
				preg_match_all("/UserID=(.+?)\&/is",$output,$ABBUserID);
				$BBUserID=$ABBUserID[1][0];
				curl_close($ch);

				$ch = curl_init(); 
				curl_setopt($ch,CURLOPT_URL,'https://'.BBIN_LOGIN_URL.'/app/user/user_edit_new.php');
				
				curl_setopt($ch, CURLOPT_POST, 1);
				$request = "userid=".$BBUserID."&level=6&balance_type=3&balance_chgtype=OUT&jspw=N&chg_action=Y&type=dealer&new_balance=".($pay_value)."&ctlpasswd=".LOGPWD."&otp_number=&edit_user=1";
				
				
				curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
				
				//echo $output;exit;
				curl_setopt($ch, CURLOPT_REFERER, "https://".BBIN_LOGIN_URL."/app/user/user_edit_new.php?act=modify&level=6&UserID=".$BBUserID."&HallID=5&loginname=".$lowUser);
				
				curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader); 
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($ch, CURLOPT_HEADER, false);
				curl_setopt($ch, CURLOPT_NOBODY, false);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				$output = curl_exec($ch);
				//echo htmlentities($output);exit;
				curl_close($ch);
				if(strpos($output,"document.location.replace('https:")!==false){
					echo "转入成功";
				}else{
					echo "转入失败";exit("<script>alert('由于网络堵塞,操作失败,请稍后操作！');history.go(-1);</script>");
				}

				
				
				
				
				
			
			
			$sql		=	"update user_list set money=money+$pay_value where user_id='$uid'";
			$mysqli->query($sql);//or die($sql);
			$q1			=	$mysqli->affected_rows;
			
			$about = "真人->体育/彩票账户";
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
				
					message('转换申请成功。');
				}
			}else{
				$mysqli->rollback(); //数据回滚
				message("由于网络堵塞，本次申请提款2失败。\\n请您稍候再试，或联系在线客服。");
			}
		}catch(Exception $e){
			$mysqli->rollback(); //数据回滚
			message("由于网络堵塞，本次申请提款失败。\\n请您稍候再试，或联系在线客服。");
		}


echo "<script>alert('转换成功');parent.window.location.reload();</script>";
echo "<script>location.href='ed2.php';</script>";
exit;
}
	
}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>额度转换</title>

<script language="javascript" src="../js/jquery-1.7.1.js"></script> 

<link href="../css/css_1.css" rel="stylesheet" type="text/css" />
<style >
body{
background:url(images/open_01.png);
background-repeat:no-repeat;
color:#fff;
text-align:left;
}
table{
	margin:auto;
}
</style>
</head> 
<body >

<table border="0" cellspacing="10" cellpadding="0" width="600">
    <form action="ed2.php?action=save" method="post" id="bbform" name="form1">
    <tr>
        <td align="right" style="color:#ff0000;"><b>主钱包转账：</b></td>
        <td>
		   <!-- <a href="../ag/ed.php" style="color:#0093BF;"><b>Ag环亚游戏大厅转账</b></a> -->
			
            <a href="../member.php?L_GameType=user/cha_ckonline" style="color:#FFF;" target="_blank"><b>查询财务记录</b></a>
        </td>
    </tr>
    <tr>
        <td align="right">
            用户账号：
        </td>
        <td>
            <?php echo $_SESSION["username"]; ?>        </td>
    </tr>
    <tr>
        <td align="right">
            体育/彩票账户余额：
        </td>
        <td>
            <?php echo $userinfo['money'];?>        </td>
    </tr>
    <tr>
        <td align="right">
            BBIN娱乐大厅余额：
        </td>
        <td id="general">
            加载中... 
        </td>
    </tr>
    <tr>
        <td align="right" width="150">
            转账选择：
        </td>
        <td>
            <select name="trtype" id="trtype">
                <option value="1">主钱包/体育/彩票账户->bbin大厅</option>
                <option value="2">bbin大厅->主钱包/体育/彩票账户</option>
            </select>
        </td>
    </tr>
    <tr>
        <td align="right">
            转账金额：
        </td>
        <td>
            <input type="text" name="p3_Amt" id="p3_Amt" onkeyup="if(isNaN(value))execCommand('undo')" />
        </td>
    </tr>
    <tr>
        <td align="right"></td>
        <td>
            <input type="submit" value="确认转账" />
			
        </td>
    </tr>
    </form>
</table>


 
 <script language="javascript">
	function BB_money(){
			 $.getJSON("cha.php?callback=?",function(json){
						$("#general").html(json.general);
				  }
			);
			setTimeout("BB_money()",10000);
	}

	function bb_change(bbmoney,bbtype){
		$('#p3_Amt').val(bbmoney);
		if(bbtype){
			$('#trtype').val(1);
		}else{
			$('#trtype').val(2);
		}
		$('#bbform').submit();
	}
$(document).ready(function(){
	BB_money();
});
	
</script>
 <script type="text/javascript" language="javascript" src="/js/left_mouse.js"></script>
</body> 
</html>