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
include_once($C_Patch."/include/pager.class.php");
check_quanxian("查看注单");

?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>单式注单审核</TITLE>
<style type="text/css">
<STYLE>
BODY {
SCROLLBAR-FACE-COLOR: rgb(255,204,0);
 SCROLLBAR-3DLIGHT-COLOR: rgb(255,207,116);
 SCROLLBAR-DARKSHADOW-COLOR: rgb(255,227,163);
 SCROLLBAR-BASE-COLOR: rgb(255,217,93)
}
.STYLE1 {font-size: 10px}
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
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" align="center" nowrap bgcolor="#FFFFFF">
<br/><br/>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   
  <tr>
    <td height="24" nowrap bgcolor="#FFFFFF"><table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" >
      <tr  class="t-title" align="center" >
        <td ><strong>编号</strong></td>
        <td><strong>联赛名</strong></td>
        <td ><strong>编号/主客队</strong></td>
        <td ><strong>投注详细信息</strong></td>
        <td ><strong>投注/开赛时间</strong></td>
        <td><strong>投注账号</strong></td>
        <td ><strong>状态</strong></td>
      </tr>

<?php

      $sql	=	"select k_bet_cg.*,user_list.user_name from k_bet_cg left join user_list on k_bet_cg.user_id=user_list.user_id where 1";
	  if(isset($_GET["gid"])){
	 	 $sql.=" and k_bet_cg.gid=".$_GET["gid"];
	  }
	  if(isset($_GET["uid"])){
	 	 $sql.=" and k_bet_cg.user_id=".$_GET["uid"];
	  }
	  if(isset($_GET["match_id"])){
	  	 $sql.=" and k_bet_cg.match_id=".$_GET["match_id"];
	  }
	  if(isset($_GET["match_name"])){
	  	 $sql.=" and k_bet_cg.match_name='".urldecode($_GET["match_name"])."'";
	  }
	  
    if(isset($_GET["status"]))
	  if($_GET["status"]>0)
      $sql.=" and k_bet_cg.status>0";
	  else if($_GET["status"]==0)
	  {
	   $sql.=" and k_bet_cg.status=0";
      }
	 
	    $sql.=" order by  k_bet_cg.id  desc ";
  
	$query	=	$mysqli->query($sql);
     while ($rows = $query->fetch_array()) {
        if(@$temp_gid!=$rows["gid"])
		{
      echo "<tr style=\"background:#FFFFFF\"><td colspan=\"10\" height=\"24\" align=\"left\"><font style=\"color:0000FF\">串关编号:".$_GET["order_num"]."</font></td></tr>";
		$temp_gid=$rows["gid"];
		} 
		
		$color	=	"#FFFFFF";
		$over	=	"#EBEBEB";
		$out	=	"#ffffff";
		if(strtotime($rows["bet_time_et"])>=strtotime($rows["match_endtime"])){ //不是滚球，抽注时间不能>=开赛时间
			$over = $out = $color = "#FBA09B";
		}
	  	?>  <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>;">
	          <td ><?=$rows["id"]?></td>
              <td><a href="<?=$_SERVER['PHP_SELF']?>?match_name=<?=urlencode($rows["match_name"])?>" ><?=$rows["match_name"]?></a></td>
              <td ><a href="<?=$_SERVER['PHP_SELF']?>?match_id=<?=$rows["match_id"]?>" ><?=$rows["match_id"]?></a>
			  <br/>
<?php
if(strpos($rows["master_guest"],'VS.')) echo str_replace("VS.","<br/>",$rows["master_guest"]);
else  echo str_replace("VS","<br/>",$rows["master_guest"]);
?></td>
              <td> <?=$rows["ball_sort"]?>
			 <br/><font style="color:#FF0033">
			  <?=str_replace("-","<br/>",$rows["bet_info"])?>
			  </font>
			 <? if($rows["status"]!=0&&$rows["status"]!=3)
			if($rows["MB_Inball"]!=''){?>
			<br>[<?=$rows["MB_Inball"]?>:<?=$rows["TG_Inball"]?>]
			<? } ?>
            <?php
            if($rows['status'] == 3){
				echo "<br>[取消]";
			}
			?>	
			 </td>
              <td><?=date("m-d H:i:s",strtotime($rows["bet_time_et"]))?>(美东时间)
                <br/>
              <?=date("m-d H:i:s",strtotime($rows["match_endtime"]))?>(美东时间)</td>
              <td><a href="cg_list.php?uid=<?=$rows["user_id"]?>">
                <?=$rows["user_name"]?>
              </a></td>
	          <td align="center"><?php
			  	if($rows["status"]==0){
			  		echo '未结算';
			  	}elseif($rows["status"]==1){
					echo '<span style="color:#FF0000;">赢</span>';
				}elseif($rows["status"]==2){
					echo '<span style="color:#00CC00;">输</span>';
				}elseif($rows["status"]==8){
					echo '和';
				}elseif($rows["status"]==3){
              		echo '注单无效';
			  	}elseif($rows["status"]==4){
					echo '<span style="color:#FF0000;">赢一半</span>';
			  	}elseif($rows["status"]==5){
					echo '<span style="color:#00CC00;">输一半</span>';
			  	}elseif($rows["status"]==6){
					echo '其他无效';
			 	}elseif($rows["status"]==7){
					echo '红卡取消';
				}
				?>
			  </td>
        </tr>    	
      	<?
      }
      ?>
    </table></td>
  </tr>
</table>
    </td>
  </tr>
</table>
</body>
</html>