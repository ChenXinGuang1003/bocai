<?php
include_once("../common/login_check.php");
include_once("../../include/mysqli.php");
include_once("../../include/newPage.php");
check_quanxian("zdgl");
if(!isset($_GET['date_start'])) $_GET['date_start'] = Date('Y-m-d 00:00:00');
if(!isset($_GET['date_end'])) $_GET['date_end'] = Date('Y-m-d 23:59:59');
if($_GET['username']) {

	$sql="select AG_username from k_user where username = '" . $_GET['username'] . "'";
	$query = $mysqli->query($sql);
	$rows = $query->fetch_array();
	$user = $rows[0];


}
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>AG真人报表</TITLE>
<script type="text/javascript" charset="utf-8" src="/js/jquery.js" ></script>
<script language="javascript">
function go(value){
	if(value != "") location.href=value;
	else return false;
}

function check(){
	if($("#tf_id").val().length > 5){
		$("#status").val("8,0,1,2,3,4,5,6,7");
	}
	return true;
}
</script>
<style type="text/css">
<STYLE>
BODY {
SCROLLBAR-FACE-COLOR: rgb(255,204,0);
 SCROLLBAR-3DLIGHT-COLOR: rgb(255,207,116);
 SCROLLBAR-DARKSHADOW-COLOR: rgb(255,227,163);
 SCROLLBAR-BASE-COLOR: rgb(255,217,93)
}
.STYLE2 {font-size: 12px}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
td{font:13px/120% "宋体";padding:3px;}
a{
	color:#F37605;
	text-decoration: none;
}
.t-title{background:url(../images/06.gif);height:24px;}
.t-tilte td{font-weight:800;}
</STYLE>
<script language="JavaScript">

function chg_date(range,num1,num2){ 

//alert(num1+'-'+num2);
if(range=='t' || range=='w' || range=='r'){
 FrmData.date_start.value ='<?=date("Y-m-d")?>';
 FrmData.date_end.value =FrmData.date_start.value;}

if(range!='t'){
 if(FrmData.date_start.value!=FrmData.date_end.value){ FrmData.date_start.value ='<?=date("Y-m-d")?>'; FrmData.date_end.value =FrmData.date_start.value;}
 var aStartDate = FrmData.date_start.value.split('-');  
 var newStartDate = new Date(parseInt(aStartDate[0], 10),parseInt(aStartDate[1], 10) - 1,parseInt(aStartDate[2], 10) + num1);   
 FrmData.date_start.value = newStartDate.getFullYear()+ '-' + (newStartDate.getMonth() + 1)+ '-' + newStartDate.getDate();   
 var aEndDate = FrmData.date_end.value.split('-');  
 var newEndDate = new Date(parseInt(aEndDate[0], 10),parseInt(aEndDate[1], 10) - 1,parseInt(aEndDate[2], 10) + num2);   
 FrmData.date_end.value = newEndDate.getFullYear()+ '-' + (newEndDate.getMonth() + 1)+ '-' + newEndDate.getDate();   
}
 
}

function update_from_romote(){
	var ag_users = '';
	$("input[class='chk_list']:checked").each(function(){
		ag_users+=$(this).parent().parent().find('.ag_name').text()+',';
	});
	ag_users = ag_users.substr(0,ag_users.length-1);
	window.open('/newag2/getallRecord.php?u='+ag_users+'&d='+$('#date_start').val().split(' ')[0],'list','width=440,height=180,left=50,top=100,scrollbars=no').focus();
}
</script>
</HEAD>

<body>
<script language="JavaScript" src="../js/calendar.js"></script>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap background="../images/06.gif"><font >&nbsp;<span class="STYLE2">AG真人报表（注单为美东时间）</span></font></td>
  </tr>
  <tr>
    <td height="24" align="center" nowrap bgcolor="#FFFFFF">
	  <table width="100%">
      <form name="form1" method="get" action="<?=$_SERVER["REQUEST_URI"]?>" onSubmit="return check();" name="FrmData" id="FrmData">
      <tr align="center">
        <td align="center">
        <td width="729" align="left">
          会员名：
            日期：
            <input name="date_start" type="text" id="date_start" value="<?=$_GET['date_start']?>"  onClick="new CalendarTime(2008,2020,3).show(this);"size="18" maxlength="20"  />

            <input type="button" onclick="update_from_romote()" value="同步所选日期所选会员数据"></td>
			
			
        </tr>
      </form>
    </table>
    </td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   
  <tr>
    <td height="24" nowrap bgcolor="#FFFFFF"><table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" >
      <tr  class="t-title" align="center" >
        <td><strong>会员名</strong></td>
		<td><strong onclick='$("input[class=\"chk_list\"]").attr("checked",true);' style='cursor:pointer;'>全选</strong></td>
		<td><strong>更新</strong></td>
      </tr>
<?php 
		$sql = "SELECT ag_username FROM k_user where ag_username!='' ";

		$query = $mysqli->query($sql);
		
	 	$bet_money=$win=$val_money=0;
		if($query)
      	while ($rows = $query->fetch_array()) {
      		$color = "#FFFFFF";
			$over	 = "#EBEBEB";
			$out	 = "#ffffff";
			
			$bet_money += $rows['ba'];
			$val_money += $rows['va'];
			$win += $rows['na'];
      	?>
	        <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>;">
			  <td  align="center" class='ag_name' ><?php echo $rows['ag_username']?></td>
			  <td><input type="checkbox" class="chk_list" name="id[]" value="1"></td>
			  <td><a href="javascript:window.open('/newag2/getallRecord.php?u=<?php echo $rows['ag_username']?>'+'&d='+$('#date_start').val().split(' ')[0],'list','width=440,height=180,left=50,top=100,scrollbars=no').focus();">更新</a></td>
	          
        </tr> 	
<?php
      }
      ?>
    </table>
    </td>
  </tr>
    <tr>
      <td >
    统计:总注金:<?=$bet_money?>，有效投注:<?=$val_money?>，会员结果：<span style="color:<?=$win < 0 ? '#FF0000' : '#009900'?>;"><?=$win?></span>
  </td>
    </tr>
  <tr><td >

  </td></tr>
  
</table>

</body>
</html>