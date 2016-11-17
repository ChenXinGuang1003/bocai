<?php 
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once("../common/login_check.php");
include_once("../class/admin.php");
include_once($C_Patch."/include/newpage.php");
include_once($C_Patch."/app/member/class/user.php");

$s_time = $_GET["s_time"];
if(!$s_time){
    $s_time = date('Y-m-d');
}
$e_time = $_GET["e_time"];
if(!$e_time){
    $e_time = date('Y-m-d');
}
$act=isset($_GET['act'])? $_GET['act'] : '';
if($act=='delete'){
	
	$stdate=isset($_POST['s_time'])?  $_POST['s_time']: '';
	$eddate=isset($_POST['e_time'])?  $_POST['e_time']: '';
	$real=isset($_POST['real'])? $_POST['real']:'';
	//$real = true;
	//echo $stdate.$eddate;exit;
	if($stdate&&$eddate){
		$stdate.=' 00:00:00';
		$eddate.=' 23:59:59';
		$sql="update money set deleted=1 where update_time between '$stdate' and '$eddate'";
		if($real=='yes'){
			$sql="delete from money where update_time between '$stdate' and '$eddate';";
			echo $sql;exit;
		}
		$query	=	$mysqli->query($sql);
		if($mysql->error){
			echo "<script>alert('$mysqli->error'); location.href='/bh-100/report/money_log_dele.php'</script>";
		}
		$res = $mysqli->affected_rows;
		if($res>=0){
			echo "<script>alert('删除记录 $res 条 !'); location.href='/bh-100/report/money_log_dele.php'</script>";
		}else{
			echo "<script>alert('删除失败 !');  location.href='/bh-100/report/money_log_dele.php'</script>";
		}
		exit;
	   
	}
}



?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DELETE</title>
<script type="text/javascript" charset="utf-8" src="../js/jquery-1.7.2.min.js" ></script>
<script language="JavaScript" src="/js/calendar.js"></script>
<style type="text/css">
	body{padding:5px;}
	form{
		padding: 20px;
		border: 1px solid black;
		border-radius: 5px;
		box-shadow: 5px 5px 5px rgba(0, 0, 0, .6);
	}
</style>
</head>
<body>
<form action="?act=delete" method='POST' name='form'>
	<h3>按日期删除: 会员存/取/汇款的记录</h3>
	<label for='stdate'>选择开始日期</label>
	<input name="s_time" type="text" id="stdate" value="<?=$s_time?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
	<label for='eddate'>选择结束日期</label>
	<input name="e_time" type="text" id="eddate" value="<?=$e_time?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />

	<input type="submit"  value="删除记录">
	<div style="width:100%;height: 50px; float:right; display: none;"><input type='checkbox' value="yes" name='real'></div>
</form>



<script type="text/javascript">
$('input[type=submit]').click(function(){
	var d1=$('#stdate').val();
	var d2=$('#eddate').val();
	if(d1==''||d2==''){
		alert('请输入有效日期!比如 2016-01-01');
		return false;
	}
	var reg=/(\d{2,}-?){3}/;
	var d3=new Date();
	d3=d3.toLocaleDateString();
    d3=d3.replace('/','-');
    if(d1.match(reg) && d2.match(reg)){
	    if(d1<=d3 && d2<=d3){
	    	if(d1>d2){
	    		alert('起始日期必须小于结束日期');
	    		return false;
	    	}
	    	if(d1<=d2){
	    		var str='是否确定删除记录?从 '+d1+' 到 '+d2+' 之间的会员存取汇款记录?';
	    		var aa=window.confirm(str);
		    	if(aa){
		    		$('form[name=form]').submit();
		    		//$('input').val('');
		    	}
	    	}else{
	    		alert('起始日期不能大于结束日期');
	    	}
	    	
		}else{
			alert('输入的日期不能大于当前日期!');
		}
	}else{
		alert('请输入有效日期!比如 2016-01-01');
	}


})
</script>

</body>
</html>