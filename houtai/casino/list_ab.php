<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

//echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/utils/convert_name.php");

include_once("../class/admin.php");
include_once("../common/login_check.php");
include_once("../lottery/getContentName.php");
include_once("newPage.php");

check_quanxian("真人娱乐");

if(!isset($_GET['date_start'])) $_GET['date_start'] = Date('Y-m-d 00:00:00');
if(!isset($_GET['date_end'])) $_GET['date_end'] = Date('Y-m-d 23:59:59');
if($_GET['username']) {

	$sql="select ab_username from user_list where user_name = '" . $_GET['username'] . "'";
	$query = $mysqli->query($sql);
	$rows = $query->fetch_array();
	$user = $rows[0];


}
$arrGameTypes = Array(
	'BAC' => '百家乐',
	'CBAC' => '包桌百家乐',
	'LINK' => '连环百家乐',
	'DT' => '龙虎',
	'SHB' => '骰宝',
	'ROU' => '轮盘',
	'FT' => '番摊',
	'SL2'  => '水果'
);
$arrPayTypes = Array(
	1	=> '庄',
	2	=> '闲',
	3	=> '和',
	4	=> '庄对',
	5	=> '闲对',
	6	=> '大',
	7	=> '小',
	8	=> '散客区庄',
	9	=> '散客区闲',
	11	=> '庄(免佣)',
	21	=> '龙',
	22	=> '虎',
	23	=> '和',
	41	=> '大',
	42	=> '小',
	43	=> '单',
	44	=> '双',
	45	=> '全围',
	46	=> '围1',
	47	=> '围2',
	48	=> '围3',
	49	=> '围4',
	50	=> '围5',
	51	=> '围6',
	52	=> '单点1',
	53	=> '单点2',
	54	=> '单点3',
	55	=> '单点4',
	56	=> '单点5',
	57	=> '单点6',
	58	=> '对子1',
	59	=> '对子2',
	60	=> '对子3',
	61	=> '对子4',
	62	=> '对子5',
	63	=> '对子6',
	64	=> '组合12',
	65	=> '组合13',
	66	=> '组合14',
	67	=> '组合15',
	68	=> '组合16',
	69	=> '组合23',
	70	=> '组合24',
	71	=> '组合25',
	72	=> '组合26',
	73	=> '组合34',
	74	=> '组合35',
	75	=> '组合36',
	76	=> '组合45',
	77	=> '组合46',
	78	=> '组合56',
	79	=> '和值4',
	80	=> '和值5',
	81	=> '和值6',
	82	=> '和值7',
	83	=> '和值8',
	84	=> '和值9',
	85	=> '和值10',
	86	=> '和值11',
	87	=> '和值12',
	88	=> '和值13',
	89	=> '和值14',
	90	=> '和值15',
	91	=> '和值16',
	92	=> '和值17',
	101 => '直接注',
	102 => '分注',
	103 => '街注',
	104 => '三数',
	105 => '角注',
	106 => '4个号码',
	107 => '列1',
	108 => '列2',
	109 => '列3',
	110 => '线注',
	111 => '打一',
	112 => '打二',
	113 => '打三',
	114 => '红',
	115 => '黑',
	116 => '大',
	117 => '小',
	118 => '单',
	119 => '双',
	130 => '1番',
	131 => '2番',
	132 => '3番',
	133 => '4番',
	134 => '1念2',
	135 => '1念3',
	136 => '1念4',
	137 => '2念1',
	138 => '2念3',
	139 => '2念4',
	140 => '3念1',
	141 => '3念2',
	142 => '3念4',
	143 => '4念1',
	144 => '4念2',
	145 => '4念3',
	146 => '角(1,2)',
	147 => '单',
	148 => '角(1,4)',
	149 => '角(2,3)',
	150 => '双',
	151 => '角(3,4)',
	152 => '1,2四通',
	153 => '1,2三通',
	154 => '1,3四通',
	155 => '1,3二通',
	156 => '1,4三通',
	157 => '1,4二通',
	158 => '2,3四通',
	159 => '2,3一通',
	160 => '2,4三通',
	161 => '2,4一通',
	162 => '3,4二通',
	163 => '3,4一通',
	164 => '三门(3,2,1)',
	165 => '三门(2,1,4)',
	166 => '三门(1,4,3)',
	167 => '三门(4,3,2)',
);
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>AG注单列表</TITLE>
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
</HEAD>

<body>
<script language="JavaScript" src="../js/calendar.js"></script>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap background="../images/06.gif"><font >&nbsp;<span class="STYLE2">ALLBET注单管理：查看所有注单情况（注单为美东时间）</span></font></td>
  </tr>
  <tr>
    <td height="24" align="center" nowrap bgcolor="#FFFFFF">
	  <table width="55%">
      <form name="form1" method="get" action="<?=$_SERVER["REQUEST_URI"]?>" onSubmit="return check();" name="FrmData" id="FrmData">
      <tr align="center">
            <!--td>会员名
            <input name="username" type="text" id="username" value="<?=$_GET['username']?>" size="10"></td-->
            <td>日期
            <input name="date_start" type="text" id="date_start" value="<?=$_GET['date_start']?>" onClick="new CalendarTime(2008,2020,3).show(this);" size="18" maxlength="20"  />  到
            <input name="date_end" type="text" id="date_end" value="<?=$_GET['date_end']?>" onClick="new CalendarTime(2008,2020,3).show(this);" size="18" maxlength="20"  /></td>
            <td>单号
            <input name="bill_no" type="text" id="bill_no" value="<?=@$_GET['bill_no']?>" size="15"></td>
            <td><input type="submit" name="Submit" value="搜索"></td>
			<!--td><input name="Submit" type="Button" class="za_button" onClick="FrmData.date_start.value='<?=date("Y-m-d 00:00:00")?>';FrmData.date_end.value='<?=date("Y-m-d 23:59:59")?>'" value="今日"> </td>
			<td>
              <input name="Submit" type="Button" class="za_button" onClick="FrmData.date_start.value='<?=date("Y-m-d 00:00:00",strtotime("- 1 day"))?>';FrmData.date_end.value='<?=date("Y-m-d 23:59:59",strtotime("-1 day"))?>'" value="昨日">  </td>

			<td>
              <input name="Submit" type="Button" class="za_button" onClick="FrmData.date_start.value='<?=date("Y-m-d 00:00:00",strtotime("last Monday"))?>';FrmData.date_end.value='<?=date("Y-m-d 23:59:59")?>'" value="本星期">  </td>
			<td>
              <input name="Submit" type="Button" class="za_button" onClick="FrmData.date_start.value='<?=date("Y-m-d 00:00:00",strtotime("last Monday")-604800)?>';FrmData.date_end.value='<?=date("Y-m-d 23:59:59",strtotime("last Monday")-86400)?>'" value="上星期">  </td>
			<td>
              <input name="Submit" type="Button" class="za_button" onClick="FrmData.date_start.value='<?=date("Y-m").'-01'?> 00:00:00';FrmData.date_end.value='<?=date("Y-m-d 23:59:59")?>'" value="本月"></td>
			  <td>
              <input name="Submit" type="Button" class="za_button" onClick="FrmData.date_start.value='<?=date("Y-m-01 00:00:00",strtotime("-1 month"))?>';FrmData.date_end.value='<?=date("Y-m-t 23:59:59",strtotime("-1 month"))?>'" value="上月"></td-->
        </tr>
      </form>
    </table>

  </tr>
</table>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   
  <tr>
    <td height="24" nowrap bgcolor="#FFFFFF"><table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" >
      <tr  class="t-title" align="center" >
        <td><strong>编号</strong></td>
        <td><strong>会员名</strong></td>
        <td><strong>单号</strong></td>
        <td><strong>下注时间</strong></td>
        <td><strong>下注金额</strong></td>
        <td><strong>有效投注</strong></td>
		<td><strong>返水</strong></td>
        <td><strong>结果</strong></td>
        
        <td><strong>游戏</strong></td>
        <td><strong>玩法</strong></td>
        <td><strong>桌号</strong></td>
        <td><strong>局号</strong></td>
        <td><strong>下注IP</strong></td>
      </tr>
<?php 
      
      $sql	=	"select id from agbetdetail where  platformType = 'ALLBET' ";
      if($_GET['username']) $sql .= " and playerName = '$user'";
      if($_GET['date_start']) $sql .= " and betTime >= '" . $_GET['date_start'] . "'";
      if($_GET['date_end']) $sql .= " and betTime <= '" . $_GET['date_end'] . "'";
      if($_GET['bill_no']) $sql .= " and billNo = '" . $_GET['bill_no'] . "'";
	  $sql.=" order by betTime desc ";
	  
	  $query	=	$mysqli->query($sql);
	  $sum		=	$mysqli->affected_rows; //总页数
	  $thisPage	=	1;
	  if($_GET['page']){
	  	  $thisPage	=	$_GET['page'];
	  }
      $page		=	new newPage();
	  $thisPage	=	$page->check_Page($thisPage,$sum, 50,40);
	  
	  $bid		=	'';
	  $i		=	1; //记录 bid 数
	  $start	=	($thisPage-1)*50+1;
	  $end		=	$thisPage*50;
	  if($query)
	  while($row = $query->fetch_array()){
	  	  if($i >= $start && $i <= $end){
	  	  	$bid .=	$row['id'].',';
		  }
		  if($i > $end) break;
		  $i++;
	  }
	  if($bid){
	  	$bid	=	rtrim($bid,',');
	  	$sql	=	"select * from agbetdetail where id in($bid) order by betTime desc";
	  	$query	=	$mysqli->query($sql);
		
	 	$bet_money=$win=$val_money=0;
      	while ($rows = $query->fetch_array()) {
      		$color = "#FFFFFF";
			$over	 = "#EBEBEB";
			$out	 = "#ffffff";
			$bet_money += $rows['betAmount'];
			$win += $rows['netAmount'];
			$val_money += $rows['validBetAmount'];
      	?>
	        <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>;">
	          <td  align="center" ><?=$rows["id"]?></td>
              <td><a href="list.php?username=<?=urlencode($rows["playerName"])?>"><?=$rows["playerName"]?></a>
			  </td>
			  <td><?php echo $rows['billNo']?></td>
              <td><?=$rows["betTime"]?></td>
              <td><?php echo $rows['betAmount']?></td>
              <td><?=$rows["validBetAmount"]?></td>
			  <td><?php echo $rows['fs_money']?></td>
			  <?php if($rows["netAmount"]<0){ ?>
              <td><font color="#FF0000"><?=$rows["netAmount"]?></font></td>
			  <?php }else{ ?>
              <td><?=$rows["netAmount"]?></td>
			  <?php } ?>
	          
              <td><?=$rows["gameType"]?></td>
              <td><?php if($rows['playType']!="") echo $rows['playType'] ;?></td>
              <td><?php echo $rows['tableCode']?></td>
              <td><?php echo $rows['gameCode']?></td>
	          <td ><?php echo $rows['loginIP']?></td>
        </tr> 	
      	<?
      }
	}
      ?>
    </table>
    </td>
  </tr>
    <tr>
      <td >
    该页统计:总注金:<?=$bet_money?>，有效投注:<?=$val_money?>，会员结果：<span style="color:<?=$win < 0 ? '#FF0000' : '#009900'?>;"><?=$win?></span>
  </td>
    </tr>
  <tr><td >
 <?=$page->get_htmlPage($_SERVER["REQUEST_URI"]);?>
  </td></tr>
  
</table>

</body>
</html>