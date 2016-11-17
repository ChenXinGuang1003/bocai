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
if(!isset($_SESSION["uid"]) || !isset($_SESSION["username"])){
	header("Location:/login/login.php");
	exit();
}
session_start();
if($_SESSION["username"]==''){
	header("Location: /login/login.php");
	exit;
}

include_once("../newag2/config.php");


include_once("../app/member/class/user.php");

include_once("../newag2/api.class.php");

$uid	=	$_SESSION["userid"];
$loginid=	$_SESSION["uid"];


$userinfo		=	user::getinfo($uid);
$username  = $userinfo['user_name'];

//echo randomnames(6);exit;
/*$uid	=	@$_SESSION['uid'];
$loginid=	@$_SESSION['user_login_id'];
$username  = @$_SESSION['username'];
$userinfo		=	user::getinfo($uid);
$query	=	$mysqli->query("select * from k_user");
$t		=	$query->num_rows;*/

//print_r($userinfo);exit;
//$sql = "select * from user_users where username='$username'";
//$result2 = $mysqlit0->query($sql);
//$rows=$result2->fetch_array();

//$act=trim($_POST['act']);
				$agusername  = $userinfo["ag_username"];//ag帐号
                $bbinapi = new BBIN_TZH($comId, $comKey,$gamePlatform);
				//echo $agusername;exit;
				//判断AG帐号是为空，没有则添加
				if($agusername==""){//start
				
                                    $agusername = $top_pre.randomnames(6);
									//$agusername = 'b2'.$agusername;
									//echo $agusername;exit;
									//echo $bbinapi->GameUserRegister($agusername, $agpassword);exit;
                                    if(!$bbinapi->GameUserRegister($agusername, $agpassword)){ // 创建失败
                                       echo "<script>alert('请联系管理员开通AG账号');</script>";
                                       exit;
                                    }  else {
                                    $sql = "update user_list set ag_username = '$agusername',ag_password = '$agpassword' where username = '$username'";
                                    $mysqli->query($sql);
									//echo $agusername.$agpassword;
									exit;
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
				$about="体育/彩票账户->AG大厅";
				
				
				
				//
				
				$agusername = $userinfo['ag_username'];
				$opCredit = $pay_value;//trim($_POST['opCredit']);
			$result = $bbinapi->TransferIn($agusername, $password, $conver);
			//echo $result;exit;
                        //var_dump($result);exit;	
			if($result===true){
					echo "转入成功";
				}else{
					if(strpos($result,'信用额度不足')>0){
						$result0 = '信用额度不足';
					echo "转入失败,".$result;exit("<script>alert('信用额度不足！');history.back();</script>");
					}else{
					echo "转入失败,";exit("<script>alert('".$result."！');history.back();</script>");
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
					message('转换申请已经提交转换。','ed5.php');

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
echo "<script>alert('转换成功');</script>";
echo "<script>location.href='ed5.php';</script>";
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
			
			
				
				$agusername = $userinfo['ag_username'];
				
				$result = $bbinapi->TransferOut($agusername, $password, $pay_value);
				if($result===true){
					echo "转入成功";
				}else{
					//echo "转入失败";
                                        exit("<script>alert('".$result."！');location.href='ed5.php';</script>");
				}

				
				
				
				
				
			
			
			$sql		=	"update user_list set money=money+$pay_value where user_id='$uid'";
			$mysqli->query($sql);//or die($sql);
			$q1			=	$mysqli->affected_rows;
			
			$about = "AG大厅->体育/彩票账户";
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
				
					message('转换申请成功。','ed5.php');
				}
			}else{
				$mysqli->rollback(); //数据回滚
				message("由于网络堵塞，本次申请提款2失败。\\n请您稍候再试，或联系在线客服。");
			}
		}catch(Exception $e){
			$mysqli->rollback(); //数据回滚
			message("由于网络堵塞，本次申请提款失败。\\n请您稍候再试，或联系在线客服。");
		}


echo "<script>alert('转换成功');</script>";
echo "<script>location.href='ed5.php';</script>";
exit;
}
	
}
?>
<!DOCTYPE HTML>
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" content="width=device-width,user-scalable=no,target-densitydpi=medium-dpi" />
<title>额度转换</title>
<script src="/js/jquery-1.10.1.min.js" type="text/javascript"></script>
<script>
	var ClientW = $(window).width();
	$('html').css('fontSize',ClientW/3+'px');

	$(window).resize(function(){
		var ClientW = $(window).width();
		$('html').css('fontSize',ClientW/3+'px');
	});
</script>
<style >
html{ width:100%; height:100%; overflow:hidden; overflow-x:hidden;
overflow-y:hidden;}
body{
margin:0;
font-size:0.15rem;
background:#1A1309;
color:#fff;
width:100%;
height:100%;
overflow:hidden;
overflow-x:hidden;
overflow-y:hidden;
}
table{
width:80%;
margin:0.1rem auto;
}
table td{ width:50%; text-align:left !important; padding:0.04rem 0; }
#headerBox{ width:100%; height:0.35rem; line-height:0.35rem; background:#986600; box-sizing:border-box; overflow:hidden;  position:relative;  }
table tr td:nth-of-type(1){ text-align:right !important; }
#headerBox a{ padding:0.12rem; border-radius:0.12rem; background:rgba(0,0,0,0.3) url(/img/index_ico.png) center center no-repeat; background-size:70%; position:absolute; left:0.1rem; top:calc(0.18rem - 0.12rem); }
#headerBox .logo{ display:block; margin:calc(0.18rem - 0.15rem) 0 0 calc(1.5rem - 0.48rem); height:0.3rem; }
select,input{ border:none !important; height:0.2rem; }
select{ width:1rem; }
input:nth-of-type(2){ width:1rem !important; }
#submit{ width:1rem; height:0.25rem; color:#fff; border-radius:0.03rem; background:linear-gradient(to bottom, #D8A746 , #956504); position:relative; left:-0.6rem; }

   #footer{ width:3rem; height:0.35rem; line-height:0.35rem; overflow:hidden; text-align:center; color:#fff; background:#986600; position:absolute; bottom:0;}
			#footer a{ font-size:0.14rem; color:#E8E8E8; font-weight:bolder; display:inline-block; width:1rem; float:left; text-align:center; text-decoration:none; }
</style>
</head> 
<body >
<header id="headerBox">
		<img class="logo" src="/img/logo.png" /> 
		<span class="languang"></span>
		<a href="/wap.php"></a>
</header>
<table border="0" cellspacing="10" cellpadding="0" width="600">
    <form action="ed5.php?action=save" id="agform" method="post" name="form1">
    <tr>
        <td align="right">
            用户账号：
        </td>
        <td>
            <?php echo $_SESSION["username"]; ?>        </td>
    </tr>
    <tr>
        <td align="right">
            帐户余额：
        </td>
        <td>
            <?php echo $userinfo['money'];?>        </td>
    </tr>
    <tr>
        <td align="right">
            AG余额：
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
                <option value="1">帐户余额->AG大厅</option>
                <option value="2">AG大厅->帐户余额</option>
            </select>
        </td>
    </tr>
    <tr>
        <td align="right">
            转账金额：
        </td>
        <td>
            <input style="width:1rem;" type="text" name="p3_Amt" id="p3_Amt" onkeyup="if(isNaN(value))execCommand('undo')" />
        </td>
    </tr>
    <tr>
        <td align="right"></td>
        <td>
            <input id="submit" type="submit" value="确认转账" />
        </td>
    </tr>
    </form>
</table>
<footer id="footer">
	<a href="/register/register.php">免费开户</a>
	<!--<a href="/newag2/ed5.php">额度转换</a> -->
	<a href="http://www.yl00853.com/index1.php">电脑版</a> 
	<a href="/login/login.php">登录</a>
</footer>

 
 <script language="javascript">
	function AG_money(){
			 $.get("/newag2/cha.php?callback=?",function(data){
				 data = eval('('+data+')');
				 //alert(data);
						$("#general").html(data.general);
                                                //$("#general").html(1);
                                               
				  }
			);
			setTimeout("AG_money()",10000);
	}

	function ag_change(bbmoney,bbtype){
		$('#p3_Amt').val(bbmoney);
		if(bbtype){
			$('#trtype').val(1);
		}else{
			$('#trtype').val(2);
		}
		$('#agform').submit();
	}

$(document).ready(function(){
	AG_money();
});
	
</script>
 <script type="text/javascript" language="javascript" src="/js/left_mouse.js"></script>
</body> 
</html>