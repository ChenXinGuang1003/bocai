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

check_quanxian("修改代理");
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>代理结算信息展示</TITLE>
<link href="../images/css1/css.css" rel="stylesheet" type="text/css">
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
</HEAD>

<script language="javascript" src="../js/user_show.js"></script>
<script language="JavaScript" src="/js/calendar.js?v=101"></script>
<script language="javascript" src="/js/jquery-1.7.1.js"></script>
<script>
    function myfun(){
        $.get(
            "angent_jiesuan_ajax.php",
            {id: $("input[name=id]").val(), s_time: $("#s_time").val(), e_time: $("#e_time").val()},
            function (result) {
                var tempArray = result.split(",");
                var betMoneyTotal = parseFloat(tempArray[0]);
                var winMoneyTotal = parseFloat(tempArray[1]);
                var money = 0;
                var ratio = 0;
                $("#ledger").val(betMoneyTotal);
                $("#profig").val(winMoneyTotal);
                if($("#agents_type").val()=="赢利分成"){
                    if(winMoneyTotal>0){
                        if(winMoneyTotal<parseFloat($("input[name=total_1_2]").val())){
                            money = winMoneyTotal * $("input[name=total_1_scale]").val();
                            ratio = $("input[name=total_1_scale]").val();
                        }else if(winMoneyTotal<parseFloat($("input[name=total_2_2]").val())){
                            money = winMoneyTotal * $("input[name=total_2_scale]").val();
                            ratio = $("input[name=total_2_scale]").val();
                        }else if(winMoneyTotal<parseFloat($("input[name=total_3_2]").val())){
                            money = winMoneyTotal * $("input[name=total_3_scale]").val();
                            ratio = $("input[name=total_3_scale]").val();
                        }else if(winMoneyTotal<parseFloat($("input[name=total_4_2]").val())){
                            money = winMoneyTotal * $("input[name=total_4_scale]").val();
                            ratio = $("input[name=total_4_scale]").val();
                        }else if(winMoneyTotal<parseFloat($("input[name=total_5_2]").val())){
                            money = winMoneyTotal * $("input[name=total_5_scale]").val();
                            ratio = $("input[name=total_5_scale]").val();
                        }
                    }
                }else if($("#agents_type").val()=="流水分成"){
                    if(betMoneyTotal>0){
                        if(betMoneyTotal<parseFloat($("input[name=total_1_2]").val())){
                            money = betMoneyTotal * $("input[name=total_1_scale]").val();
                            ratio = $("input[name=total_1_scale]").val();
                        }else if(betMoneyTotal<parseFloat($("input[name=total_2_2]").val())){
                            money = betMoneyTotal * $("input[name=total_2_scale]").val();
                            ratio = $("input[name=total_2_scale]").val();
                        }else if(betMoneyTotal<parseFloat($("input[name=total_3_2]").val())){
                            money = betMoneyTotal * $("input[name=total_3_scale]").val();
                            ratio = $("input[name=total_3_scale]").val();
                        }else if(betMoneyTotal<parseFloat($("input[name=total_4_2]").val())){
                            money = betMoneyTotal * $("input[name=total_4_scale]").val();
                            ratio = $("input[name=total_4_scale]").val();
                        }else if(betMoneyTotal<parseFloat($("input[name=total_5_2]").val())){
                            money = betMoneyTotal * $("input[name=total_5_scale]").val();
                            ratio = $("input[name=total_5_scale]").val();
                        }
                    }
                }
                $("#money").val(money/100);
                $("input[name=ratio]").val(ratio);
            }
        );
    }

    function onChangeStime(){
        myfun();
    }
    function onChangeEtime(){
        myfun();
    }
    function submitCheck(){
        if(!$("input[name='s_time']").val() || $("input[name='s_time']").val()==""){
            alert("请选择开始日期");
            return false;
        }
        if(!$("input[name='e_time']").val() || $("input[name='e_time']").val()==""){
            alert("请选择结束日期");
            return false;
        }
        return true;
    }

    /*用window.onload调用myfun()*/
    window.onload=myfun;//不要括号
</script>

<body>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap background="../images/06.gif"><font >&nbsp;<span class="STYLE2">代理管理：代理结算信息</span></font></td>
  </tr>
  <tr>
    <td height="24" align="center" nowrap bgcolor="#FFFFFF"><br>
<?php
if($_GET["id"]){
    $sql	=	"select * from agents_list where id=".intval($_GET["id"])." limit 0,1";
    $query	=	$mysqli->query($sql);
    $rows	=	$query->fetch_array();

    $e_time = date('Y-m-d',strtotime('-1 day'));
    $s_time = date('Y-m-d',strtotime('-7 day'));
}else{
    $rows["total_1_1"] = 0;
    $rows["total_1_2"] = 9999;
    $rows["total_2_1"] = 10000;
    $rows["total_2_2"] = 99999;
    $rows["total_3_1"] = 100000;
    $rows["total_3_2"] = 999999;
    $rows["total_4_1"] = 1000000;
    $rows["total_4_2"] = 9999999;
    $rows["total_5_1"] = 10000000;
    $rows["total_5_2"] = 99999999;
    $rows["total_1_scale"] = 5.000;
    $rows["total_2_scale"] = 10.000;
    $rows["total_3_scale"] = 20.000;
    $rows["total_4_scale"] = 30.000;
    $rows["total_5_scale"] = 40.000;
}

?>
<form action="agent_jiesuan_post.php?1=1" method="post" name="form1" id="form1" onsubmit="return submitCheck()">
<table width="90%" align="center" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;"  >
  <tr>
    <td bgcolor="#F0FFFF">用户名</td>
    <td><input name="agents_name"  disabled="disabled" id="agents_name" value="<?=$rows["agents_name"]?>"></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">理代类型</td>
    <td><label>
            <select name="agents_type" id="agents_type" disabled="disabled">
                <option value="流水分成" <?=$rows['agents_type']=="流水分成" ? 'selected' : ''?>>流水分成</option>
                <option value="赢利分成" <?=$rows['agents_type']=="赢利分成" ? 'selected' : ''?>>赢利分成</option>
            </select>
        </label></td>
  </tr>
  <tr>
        <td bgcolor="#F0FFFF">代理等级1</td>
        <td >
            <input  disabled="disabled" type="text" name="total_1_1" value="<?=$rows["total_1_1"]?>" size="10">~<input  disabled="disabled" type="text" name="total_1_2" value="<?=$rows["total_1_2"]?>" size="10">
            代理等级1结算比例(百分比):<input type="text" name="total_1_scale" value="<?=$rows["total_1_scale"]?>" size="10"  disabled="disabled">
        </td>
  </tr>
  <tr>
        <td bgcolor="#F0FFFF">代理等级2</td>
        <td>
            <input type="text" name="total_2_1" value="<?=$rows["total_2_1"]?>" size="10" disabled="disabled">~<input type="text" name="total_2_2" value="<?=$rows["total_2_2"]?>" size="10"  disabled="disabled">
            代理等级2结算比例(百分比):<input type="text" name="total_2_scale" value="<?=$rows["total_2_scale"]?>" size="10" disabled="disabled">
        </td>
  </tr>
  <tr>
        <td bgcolor="#F0FFFF">代理等级3</td>
        <td>
            <input type="text" name="total_3_1" value="<?=$rows["total_3_1"]?>" size="10" disabled="disabled">~<input type="text" name="total_3_2" value="<?=$rows["total_3_2"]?>" size="10" disabled="disabled">
            代理等级3结算比例(百分比):<input type="text" name="total_3_scale" value="<?=$rows["total_3_scale"]?>" size="10" disabled="disabled">
        </td>
  </tr>
  <tr>
        <td bgcolor="#F0FFFF">代理等级4</td>
        <td>
            <input type="text" name="total_4_1" value="<?=$rows["total_4_1"]?>" size="10" disabled="disabled">~<input type="text" name="total_4_2" value="<?=$rows["total_4_2"]?>" size="10" disabled="disabled">
            代理等级4结算比例(百分比):<input type="text" name="total_4_scale" value="<?=$rows["total_4_scale"]?>" size="10" disabled="disabled">
        </td>
  </tr>
  <tr>
        <td bgcolor="#F0FFFF">代理等级5</td>
        <td>
            <input type="text" name="total_5_1" value="<?=$rows["total_5_1"]?>" size="10" disabled="disabled">~<input type="text" name="total_5_2" value="<?=$rows["total_5_2"]?>" size="10" disabled="disabled">
            代理等级5结算比例(百分比):<input type="text" name="total_5_scale" value="<?=$rows["total_5_scale"]?>" size="10" disabled="disabled">
        </td>
  </tr>
    <tr>
        <td bgcolor="#F0FFFF">结算开始~结束时间:</td>
        <td>
            <input name="s_time" type="text" id="s_time" value="<?=$s_time?>" onchange="onChangeStime()" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
            ~
            <input name="e_time" type="text" id="e_time" value="<?=$e_time?>" onchange="onChangeEtime()" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
        </td>
    </tr>
    <tr>
        <td bgcolor="#F0FFFF">所选时间流水:</td>
        <td><input type="text" name="ledger" id="ledger" value="0" readonly></td>
    </tr>
    <tr>
        <td bgcolor="#F0FFFF">所选时间赢利:</td>
        <td><input type="text" name="profig" id="profig" value="0"  readonly></td>
    </tr>
    <tr>
        <td bgcolor="#F0FFFF">结算金额:</td>
        <td>
            <input type="text" name="money" id="money" value="0" />
            &nbsp;&nbsp;系统自动计算的结算金额，也可手动编辑结算金额。</span>
        </td>
    </tr>

  <tr>
  	<td colspan="2" align="center">
        <input name="id" type="hidden" value="<?=$_GET["id"]?>">
        <input name="ratio" type="hidden" >
        <input type="submit" value="确认提交"> 　
  	    <input type="button" value="取 消" onClick="javascript:history.go(-1)">
    </td>
  </tr>
</table>
</form></td>
  </tr>
</table>
</body>
</html>
<?
$mysqli->close();
?>