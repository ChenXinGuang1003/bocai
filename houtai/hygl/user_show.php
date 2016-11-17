<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");

include_once("../class/admin.php");
include_once("../common/login_check.php");

//echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

check_quanxian("查看会员信息");
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>用户详细信息展示</TITLE>
<link href="../images/css1/css.css" rel="stylesheet" type="text/css">
<script language="javascript" src="../js/jquery-1.7.2.min.js"></script>
<style type="text/css">
.STYLE1 {font-size: 10px}
.STYLE2 {font-size: 12px}
body {	margin: 0px;}

td{font:13px/120% "宋体";padding:3px;}
a{color:#FFA93E;}
/*.t-title{background:url(/super/images/06.gif);height:24px;}*/
.t-title{height:24px;}
.t-tilte td{font-weight:800;}
</STYLE>

<script>
    function getMoneyAdmin(userName,password){
        $("input[name=getMoney]").attr("disabled","disabled"); //按钮失效
        $.post("getUpdateMoney.php",{username:userName,password:password} ,function (data) {
                $("input[name=getMoney]").attr("disabled",false); //按钮失效
                if(parseInt(data)>-1){
                    $("#ag_credit").text(data);
                }else{
                    alert(data);
                }
            }
        );
    }
</script>
</HEAD>

<body>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap background="../images/06.gif"><font >&nbsp;<span class="STYLE2">用户管理：查看用户详细信息</span></font></td>
  </tr>
  <tr>
    <td height="24" align="center" nowrap bgcolor="#FFFFFF"><br>
<?php
$sql	=	"select u.*,l.* from user_list u,live_user l where u.user_id=l.user_id and l.live_type='AG' and u.user_id=".intval($_GET["id"])." limit 1";
$query	=	$mysqli->query($sql);
$rows	=	$query->fetch_array();

$sql	=	"select u.*,l.* from user_list u,live_user l where u.user_id=l.user_id and l.live_type='BBIN' and u.user_id=".intval($_GET["id"])." limit 1";
$query	=	$mysqli->query($sql);
$rows_bbin	=	$query->fetch_array();

if(!$rows){
    $sql	=	"select u.* from user_list u where u.user_id=".intval($_GET["id"])." limit 1";
    $query	=	$mysqli->query($sql);
    $rows	=	$query->fetch_array();
}
?>
<form action="user_update.php" method="post" name="form1" id="form1">
<table width="90%" align="center" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;"  >
  <tr>
    <td bgcolor="#F0FFFF">用户名</td>
    <td><?=$rows["user_name"]?>
      <input name="hf_username" type="hidden" id="hf_username" value="<?=$rows["user_name"]?>"></td>
  </tr>
  <tr>
    <td width="172" bgcolor="#F0FFFF">账户余额</td>
    <td width="473"><?=$rows["money"]?></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">性别</td>
    <td><?=$rows["sex"]?></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">注册所在地</td>
    <td><?=$rows["regaddress"]?></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">生日</td>
    <td><input name="birthday" value="<?=$rows["birthday"]?>" ></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">密码问答</td>
    <td>
	<select name="ask" id="ask">
    	  <option value="" >---请选择密码问题---</option>
          <option value="您的车牌号码是多少？" <?php if($rows["ask"] == "您的车牌号码是多少？") echo "selected";?>>您的车牌号码是多少？</option>
          <option value="您初中同桌的名字？" <?php if($rows["ask"] == "您初中同桌的名字？") echo "selected";?>>您初中同桌的名字？</option>
          <option value="您就读的第一所学校的名称？" <?php if($rows["ask"] == "您就读的第一所学校的名称？") echo "selected";?>>您就读的第一所学校的名称？</option>
          <option value="您第一次亲吻的对象是谁？" <?php if($rows["ask"] == "您第一次亲吻的对象是谁？") echo "selected";?>>您第一次亲吻的对象是谁？</option>
          <option value="少年时代心目中的英雄是谁？" <?php if($rows["ask"] == "少年时代心目中的英雄是谁？") echo "selected";?>>少年时代心目中的英雄是谁？</option>
          <option value="您最喜欢的休闲运动是什么？" <?php if($rows["ask"] == "您最喜欢的休闲运动是什么？") echo "selected";?>>您最喜欢的休闲运动是什么？</option>
          <option value="您最喜欢哪支运动队？" <?php if($rows["ask"] == "您最喜欢哪支运动队？") echo "selected";?>>您最喜欢哪支运动队？</option>
          <option value="您最喜欢的运动员是谁？" <?php if($rows["ask"] == "您最喜欢的运动员是谁？") echo "selected";?>>您最喜欢的运动员是谁？</option>
		  
          <option value="您的第一辆车是什么牌子？" <?php if($rows["ask"] == "您的第一辆车是什么牌子？") echo "selected";?>>您的第一辆车是什么牌子？</option>
    </select></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">密码答案</td>
    <td><input type="text" name="answer" id="answer" value="<?=$rows["answer"]?>" ></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">手机</td>
    <td><input type="text" name="mobile" value="<?=$rows["tel"]?>" ></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">email</td>
    <td><input type="text" name="email" value="<?=$rows["email"]?>" ></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">QQ</td>
    <td><input type="text" name="QQ" value="<?=$rows["qq"]?>" ></td>
  </tr>  
  <tr>
    <td bgcolor="#F0FFFF">真实姓名</td>
    <td><input type="text" name="pay_name" value="<?=$rows["pay_name"]?>" ></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">开户行</td>
    <td><input type="text" name="pay_card" value="<?=$rows["pay_bank"]?>" ></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">卡号</td>
    <td><input type="text" name="pay_num" value="<?=$rows["pay_num"]?>" ><input name="hf_pay_num" type="hidden" id="hf_pay_num" value="<?=$rows["pay_num"]?>"></td>
  </tr>
    <tr>
    <td bgcolor="#F0FFFF">开户地址</td>
    <td><input type="text" name="pay_address" value="<?=$rows["pay_address"]?>" ><input type="hidden" name="uid" id="uid" value="<?=$_GET["id"]?>"></td>
  </tr>
    <tr>
    <td bgcolor="#F0FFFF">所属会员组</td>
    <td><label>
      <select name="gid" id="gid">
<?php
$sql	=	"select group_id,group_name from user_group order by id asc";
$query	=	$mysqli->query($sql);
while($rs = $query->fetch_array()){
?>
        <option value="<?=$rs['group_id']?>" <?=$rs['group_id']==$rows["group_id"] ? 'selected' : ''?>><?=$rs['group_name']?></option>
<?php
}
?>
      </select>
    </label></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">注册时间</td>
    <td><?=$rows["regtime"]?></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">注册IP</td>
    <td><?=$rows["regip"]?></td>
  </tr>
   <tr>
    <td bgcolor="#F0FFFF">最后登录时间</td>
    <td><?=$rows["logintime"]?></td>
  </tr>
   <tr>
    <td bgcolor="#F0FFFF">最后登录IP</td>
    <td><?=$rows["loginip"]?></td>
  </tr>
   <tr>
    <td bgcolor="#F0FFFF">最后退出时间</td>
    <td><?=$rows["logouttime"]?></td>
  </tr>
   <tr>
    <td bgcolor="#F0FFFF">总登录次数</td>
    <td><?=$rows["lognum"]?></td>
  </tr>


    <tr>
        <td bgcolor="#F0FFFF">BBIN用户名</td>
        <td><input type="text" name="live_username" value="<?=$rows_bbin["live_username"]?>"  <?if($rows_bbin["live_username"]){echo '';}else{echo 'disabled';}?>></td>
    </tr>
    <tr>
        <td bgcolor="#F0FFFF">BBIN用户密码</td>
        <td><input type="text" name="live_password" value="<?=$rows_bbin["live_password"]?>"  <?if($rows_bbin["live_username"]){echo '';}else{echo 'disabled';}?>></td>
    </tr>
    <tr>
        <td bgcolor="#F0FFFF">BBIN余额</td>
        <td>
            <span id="ag_credit"><?=$rows_bbin["live_money_a"]?></span>
        </td>
    </tr>
    <tr>
        <td bgcolor="#F0FFFF">AG娱乐场用户名</td>
        <td><input type="text" name="live_username" value="<?=$rows["live_username"]?>"  <?if($rows["live_username"]){echo '';}else{echo 'disabled';}?>></td>
    </tr>
    <tr>
        <td bgcolor="#F0FFFF">AG娱乐场用户密码</td>
        <td><input type="text" name="live_password" value="<?=$rows["live_password"]?>"  <?if($rows["live_username"]){echo '';}else{echo 'disabled';}?>></td>
    </tr>
    <tr>
        <td bgcolor="#F0FFFF">AG娱乐城余额</td>
        <td>
            <span id="ag_credit"><?=$rows["live_money_a"]?></span>
            <input style="display:none;" type="button" name="getMoney" onclick="getMoneyAdmin('<?=$rows["live_username"]?>','<?=$rows["live_password"]?>');" value="刷新" />
        </td>
    </tr>
    <tr>
        <td bgcolor="#F0FFFF">AG娱乐城信息更新时间</td>
        <td><?=$rows["update_time"]?></td>
    </tr>
    <tr>
        <td bgcolor="#F0FFFF">AG盘口</td>
        <td><select name="oddlists" id="oddlists" <?if($rows["live_username"]){echo '';}else{echo 'disabled';}?>>
                <option value="A" <?=$rows['oddlists']=="A" ? 'selected' : ''?>>A (20~10000)</option>
                <option value="B" <?=$rows['oddlists']=="B" ? 'selected' : ''?>>B (50~5000)</option>
                <option value="C" <?=$rows['oddlists']=="C" ? 'selected' : ''?>>C (100~10000)</option>
                <option value="D" <?=$rows['oddlists']=="D" ? 'selected' : ''?>>D (200~20000)</option>
                <option value="E" <?=$rows['oddlists']=="E" ? 'selected' : ''?>>E (300~30000)</option>
                <option value="F" <?=$rows['oddlists']=="F" ? 'selected' : ''?>>F (400~40000)</option>
                <option value="G" <?=$rows['oddlists']=="G" ? 'selected' : ''?>>G (500~50000)</option>
                <option value="H" <?=$rows['oddlists']=="H" ? 'selected' : ''?>>H (1000~100000)</option>
                <option value="I" <?=$rows['oddlists']=="I" ? 'selected' : ''?>>I (2000~200000)</option>
                <option value="N" <?=$rows['oddlists']=="N" ? 'selected' : ''?>>N (10000~500000)</option>
            </select></td>
    </tr>
  <tr>
    <td bgcolor="#F0FFFF">备注：</td>
    <td><textarea name="why" cols="80" rows="5" id="why"><?=$rows["remark"]?></textarea></td>
  </tr>
    <tr>
    <td bgcolor="#F0FFFF">更多信息</td>
    <td>
	<a href="../sports/orderlist.php?status=all&type=单式&username=<?=$rows["user_name"]?>">查看单式信息</a>，
	<a href="../sports/cg_list.php?status=all&username=<?=$rows["user_name"]?>">查看串关信息</a>，
	<A href="../message/user_msg.php?user_name=<?=$rows["user_name"]?>">发布短消息</A>，
	<A href="../fund/hccw.php?username=<?=$rows["user_name"]?>">查看财务</A>，
<!--    <A href="list.php?top_uid=--><?//=$rows["user_id"]?><!--">查看所有下级会员</A>，-->
    <A href="../user/check_user.php?action=1&userid=<?=$rows["user_id"]?>&username=<?=$rows["user_name"]?>">核查会员</A>，
    <A href="lsyhxx.php?action=1&username=<?=$rows["user_name"]?>">历史银行记录</A>
	</td>
  </tr>
  <tr>
  	<td colspan="2" align="center"><input type="submit" value="确认提交"> 　 
  	  <input type="button" value="取 消" onClick="javascript:history.go(-1)"></td>
  </tr>
</table>
</form></td>
  </tr>
</table>
</body>
</html>