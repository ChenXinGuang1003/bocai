<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");
$quanxian=$_SESSION["purview"];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>left</title>
<link href="Images/css1/left_css.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.7.2.min.js"></script>
</head>
<SCRIPT language=JavaScript>
function showsubmenu(sid)
{
whichEl = eval("submenu" + sid);
if (whichEl.style.display == "none")
{
eval("submenu" + sid + ".style.display=\"\";");
}
else
{
eval("submenu" + sid + ".style.display=\"none\";");
}
}

function myfun()
{
    eval("submenu1.style.display=\"none\";");
    eval("submenu2.style.display=\"none\";");
    eval("submenu3.style.display=\"none\";");
    eval("submenu4.style.display=\"none\";");
    eval("submenu5.style.display=\"none\";");
    eval("submenu6.style.display=\"none\";");
    eval("submenu7.style.display=\"none\";");
    eval("submenu8.style.display=\"none\";");
    eval("submenu9.style.display=\"none\";");
    eval("submenu10.style.display=\"none\";");
    eval("submenu13.style.display=\"none\";");
    eval("submenu14.style.display=\"none\";");
    eval("submenu15.style.display=\"none\";");
    eval("submenu22.style.display=\"none\";");
}
/*用window.onload调用myfun()*/
window.onload=myfun;//不要括号
</SCRIPT>
<body bgcolor="16ACFF">
<table width="98%" border="0" cellpadding="0" cellspacing="0" background="Images/tablemde.jpg">

<?php
if(strpos($quanxian,'查看注单') || strpos($quanxian,'手工结算注单')){
?>

  <tr>
    <td height="5" background="Images/tableline_top.jpg" bgcolor="#16ACFF"></td>
  </tr>
  <tr>
    <td><TABLE width="97%" 
border=0 align=right cellPadding=0 cellSpacing=0 class=leftframetable>
      <TBODY>
        <TR>
          <TD height="25" style="background:url(Images/left_tt.gif) no-repeat">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <TD width="20"></TD>
          <TD class=STYLE1 style="CURSOR: hand" onclick=showsubmenu(1); height=25>体育管理</TD>
              </tr>
            </table>            </TD>
          </TR>
        <TR>
          <TD><TABLE id=submenu1 cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
                <TR>
                  <TD width="2%"><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="sports/orderlist.php?status=<?=urldecode('all')?>&type=<?=urldecode('单式')?>" target="main">
                          单式注单</A>┆<A href="sports/cg_list.php?status=<?=urldecode('all')?>" target="main">串关注单</A></TD>
                </TR>
                <TR>
                  <TD><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="sports/orderlist.php?status=<?=urldecode('all')?>&type=<?=urldecode('足球')?>"
            target="main">足球注单</A>┆<A href="sports/orderlist.php?status=<?=urldecode('all')?>&type=<?=urldecode('篮球')?>"
            target="main">篮球注单</A></TD>
                </TR>
                <TR>
                  <TD><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="sports/orderlist.php?status=<?=urldecode('all')?>&type=<?=urldecode('网球')?>"
            target="main">网球注单</A>┆<A href="sports/orderlist.php?status=<?=urldecode('all')?>&type=<?=urldecode('排球')?>"
            target="main">排球注单</A></TD>
                </TR>
				<TR>
                  <TD><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="sports/orderlist.php?status=<?=urldecode('all')?>&type=<?=urldecode('棒球')?>"
            target="main">棒球注单</A>┆<A href="sports/orderlist.php?status=<?=urldecode('all')?>&type=<?=urldecode('冠军')?>"
            target="main">冠军注单</A></TD>
                </TR>
                <TR>
                    <TD><IMG src="Images/closed.gif"></TD>
                    <TD height=23><A href="sports/orderlist.php?status=<?=urldecode('all')?>&type=<?=urldecode('其他')?>"
                                     target="main">其他注单</A></TD>
                </TR>
				<TR>
                  <TD height=10></TD>
                </TR>
				<?php
if(strpos($quanxian,'手工结算注单')){
?>

				<TR>
                  <TD><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="sports/sgjsds.php?status=0" 
            target="main">手工结算单式</A></TD>
                </TR>
				<TR>
                  <TD><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="sports/cg_list.php?status=<?=urldecode('all')?>" target="main">手工结算串关</A></TD>
                </TR>
				<?php
}
?>
				<TR>
                  <TD><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="sports/gq_lose.php" 
            target="main">滚球未审核注单</A></TD>
                </TR>
				<TR>
                  <TD height=10></TD>
                </TR>

<?php
if(strpos($quanxian,'手工录入体育比分')){
?>

				<TR>
                  <TD width="2%"><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="sports/zqbf.php" target="main">足球比分</A>┆<A   href="sports/lqbf.php"  target="main">篮球比分 </A></TD>
             </TR>
                <TR>
                  <TD><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A   href="sports/wqbf.php"  target="main">网球比分</A>┆<A   href="sports/pqbf.php"  target="main">排球比分</A></TD>
                </TR>
				<TR>
                  <TD><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A   href="sports/bqbf.php"  target="main">棒球比分</A>┆<A   href="sports/gjbf.php?1=1"  target="main">冠军比分</A></TD>
                </TR>
				<TR>
                  <TD><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A   href="sports/qtbf.php"  target="main">其他赛事比分</A></TD>
                </TR>
<?php
}
?>

              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE></td>
  </tr>
  <tr>
    <td height="5" background="Images/tableline_bottom.jpg" bgcolor="#9BC2ED"></td>
  </tr>
<?php
}
?>

<?php
if(strpos($quanxian,'查看注单') || strpos($quanxian,'手工结算注单')){
?>

  <tr>
    <td height="5" background="Images/tableline_top.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <tr>
    <td><table class="leftframetable" cellspacing="0" cellpadding="0" width="97%" align="right" 
border="0">
      <tbody>
        <tr>
          <td height="25" style="background:url(Images/left_tt.gif) no-repeat"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20"></td>
          <td height="25" class="titledaohang" style="CURSOR: hand" onClick="showsubmenu(2);"><span class="STYLE1">彩票注单管理</span></td>
              </tr>
            </table></td>
          </tr>
        <tr>
          <td><table id="submenu2" cellspacing="0" cellpadding="0" width="100%" border="0">
              <tbody>
                <tr>
                  <td width="2%"><img src="Images/closed.gif" /></td>
                  <td height="23"><a 
            href="Lottery/orderlist.php?status=0&type=<?=urldecode('CQ')?>&js=<?=urldecode('0,1,2,3')?>"
            target="main">重庆时时彩</a></td>
                </tr>
                <tr>
                  <td width="2%"><img src="Images/closed.gif" /></td>
                  <td height="23"><a 
                            href="Lottery/orderlist.php?status=0&type=<?=urldecode('TJ')?>&js=<?=urldecode('0,1,2,3')?>"
                            target="main">天津时时彩</a></td>
                </tr><tr>
                  <td width="2%"><img src="Images/closed.gif" /></td>
                  <td height="23"><a 
                            href="Lottery/orderlist.php?status=0&type=<?=urldecode('GDSF')?>&js=<?=urldecode('0,1,2,3')?>"
                            target="main">广东十分彩</a></td>
                </tr>
                				<tr>
                  <td width="2%"><img src="Images/closed.gif" /></td>
                  <td height="23"><a 
                            href="Lottery/orderlist.php?status=0&type=<?=urldecode('GXSF')?>&js=<?=urldecode('0,1,2,3')?>"
                            target="main">广西十分彩</a></td>
                </tr>
				<tr>
                  <td width="2%"><img src="Images/closed.gif" /></td>
                  <td height="23"><a 
            href="Lottery/orderlist.php?status=0&type=<?=urldecode('BJPK')?>&js=<?=urldecode('0,1,2,3')?>"
            target="main">北京PK拾</a></td>
                </tr>
                  <td width="2%"><img src="Images/closed.gif" /></td>
                  <td height="23"><a 
            href="Lottery/orderlist.php?status=0&type=<?=urldecode('BJKN')?>&js=<?=urldecode('0,1,2,3')?>"
            target="main">北京快乐8</a></td>
                </tr>
				<tr>
				                  <td width="2%"><img src="Images/closed.gif" /></td>
				                  <td height="23"><a 
				            href="Lottery/orderlist.php?status=0&type=<?=urldecode('GD11')?>&js=<?=urldecode('0,1,2,3')?>"
				            target="main">广东11选5</a></td>
				                </tr> 
				<tr>
                  <td width="2%"><img src="Images/closed.gif" /></td>
                  <td height="23"><a 
            href="Lottery/orderlist.php?status=0&type=<?=urldecode('D3')?>&js=<?=urldecode('0,1,2,3')?>"
            target="main">3D彩</a></td>
                </tr>
				<tr>
                    <td width="2%"><img src="Images/closed.gif" /></td>
                    <td height="23"><a 
            href="Lottery/orderlist.php?status=0&type=<?=urldecode('P3')?>&js=<?=urldecode('0,1,2,3')?>"
            target="main">排列三</a></td>
                </tr>
                <tr>
                    <td width="2%"><img src="Images/closed.gif" /></td>
                    <td height="23"><a
                            href="Lottery/orderlist.php?status=0&type=<?=urldecode('CQSF')?>&js=<?=urldecode('0,1,2,3')?>"
                            target="main">重庆十分彩</a></td>
                </tr>
				<tr>
                    <td width="2%"><img src="Images/closed.gif" /></td>
                    <td height="23"><a
                              href="Lottery/orderlist.php?status=0&type=<?=urldecode('TJSF')?>&js=<?=urldecode('0,1,2,3')?>"
            target="main">天津十分彩</a></td>
                </tr>
				<tr>
                    <td width="2%"><img src="Images/closed.gif" /></td>
                    <td height="23"><a
                               href="Lottery/orderlist.php?status=0&type=<?=urldecode('T3')?>&js=<?=urldecode('0,1,2,3')?>"
            target="main">上海时时乐</a></td>
                </tr>
				<TR>
                  <TD height=10></TD>
                </TR>
                <tr>
                    <td width="2%"><img src="Images/closed.gif" /></td>
                    <td height="23"><a
                            href="Lottery/orderlist.php?status=0&type=<?=urldecode('ALL_LOTTERY')?>&js=<?=urldecode('0,1,2,3')?>" target="main">全部彩票注单</a></td>
                </tr>
				<tr>
                  <td width="2%"><img src="Images/closed.gif" /></td>
                  <td height="23"><a 
            href="Lottery/orderlist.php?status=0&type=<?=urldecode('ALL_LOTTERY')?>&js=<?=urldecode('0')?>" target="main">未结算彩票注单</a></td>
                </tr>
				<tr>
                  <td width="2%"><img src="Images/closed.gif" /></td>
                  <td height="23"><a 
            href="Lottery/orderlist.php?reset_order=<?=urldecode('重新结算')?>&type=<?=urldecode('ALL_LOTTERY')?>&js=<?=urldecode('2')?>" target="main">重新结算过的彩票注单</a></td>
                </tr>
				<tr>
                  <td width="2%"><img src="Images/closed.gif" /></td>
                  <td height="23"><a
            href="Lottery/orderlist_lottery_user.php?js=<?=urldecode('0,1,2,3')?>" target="main">按用户分类的彩票注单</a></td>
                </tr>


              </tbody>
          </table></td>
        </tr>
      </tbody>
    </table></td>
  </tr>
  <tr>
    <td height="5" background="Images/tableline_bottom.jpg" bgcolor="#9BC2ED"></td>
  </tr>

  <?php
}
?>


<?php
if(strpos($quanxian,'手工录入彩票结果')){
?>

  <tr>
    <td height="5" background="Images/tableline_top.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <tr>
    <td><table class="leftframetable" cellspacing="0" cellpadding="0" width="97%" align="right" 
border="0">
      <tbody>
        <tr>
          <td height="25" style="background:url(Images/left_tt.gif) no-repeat"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20"></td>
          <td height="25" class="titledaohang" style="CURSOR: hand" onClick="showsubmenu(22);"><span class="STYLE1">彩票结果管理</span></td>
              </tr>
            </table></td>
          </tr>
        <tr>
          <td><table id="submenu22" cellspacing="0" cellpadding="0" width="100%" border="0">
              <tbody>
                <tr>
                  <td width="2%"><img src="Images/closed.gif" /></td>
                  <td height="23"><a 
            href="Lottery/result/B5/result_b5.php?status=0&type=<?=urldecode('重庆时时彩')?>"
            target="main">重庆时时彩</a></td>
                </tr>
                <tr>
                  <td width="2%"><img src="Images/closed.gif" /></td>
                  <td height="23"><a 
                            href="Lottery/result/B5/result_b5.php?status=0&type=<?=urldecode('天津时时彩')?>"
                            target="main">天津时时彩</a></td>
                </tr>
                				<tr>
                  <td width="2%"><img src="Images/closed.gif" /></td>
                  <td height="23"><a 
                            href="Lottery/result/GDSF/result_gdsf.php?status=0&type=<?=urldecode('广东十分彩')?>"
                            target="main">广东十分彩</a></td>
                </tr>
                				<tr>
                  <td width="2%"><img src="Images/closed.gif" /></td>
                  <td height="23"><a 
                            href="Lottery/result/GXSF/result_gxsf.php?status=0&type=<?=urldecode('广西十分彩')?>"
                            target="main">广西十分彩</a></td>
                </tr>
				<tr>
                  <td width="2%"><img src="Images/closed.gif" /></td>
                  <td height="23"><a 
            href="Lottery/result/BJPK/result_bjpk.php?status=0&type=<?=urldecode('北京PK拾')?>"
            target="main">北京PK拾</a></td>
                </tr>
				<tr>
                  <td width="2%"><img src="Images/closed.gif" /></td>
                  <td height="23"><a 
            href="Lottery/result/BJKN/result_bjkn.php?status=0&type=<?=urldecode('北京快乐8')?>"
            target="main">北京快乐8</a></td>
                </tr>
				 <tr>
				                  <td width="2%"><img src="Images/closed.gif" /></td>
				                  <td height="23"><a 
				            href="Lottery/result/GD11/result_gd11.php?status=0&type=<?=urldecode('广东11选5')?>"
				            target="main">广东11选5</a></td>
				                </tr>
				<tr>
                  <td width="2%"><img src="Images/closed.gif" /></td>
                  <td height="23"><a 
            href="Lottery/result/B3/result_b3.php?status=0&type=<?=urldecode('3D彩')?>"
            target="main">3D彩</a></td>
                </tr>
                <tr>
                    <td width="2%"><img src="Images/closed.gif" /></td>
                    <td height="23"><a 
            href="Lottery/result/B3/result_b3.php?status=0&type=<?=urldecode('排列三')?>"
            target="main">排列三</a></td>
                </tr>
				<tr>
				                    <td width="2%"><img src="Images/closed.gif" /></td>
				                    <td height="23"><a
				                    href="Lottery/result/CQSF/result_cqsf.php?status=0&type=<?=urldecode('重庆十分彩')?>"
				                    target="main">重庆十分彩</a></td>
				                </tr>
								<tr>
				                    <td width="2%"><img src="Images/closed.gif" /></td>
				                    <td height="23"><a
				                     href="Lottery/result/TJSF/result_tjsf.php?status=0&type=<?=urldecode('天津十分彩')?>"
            target="main">天津十分彩</a></td>
                </tr>
								<tr>
				                    <td width="2%"><img src="Images/closed.gif" /></td>
				                    <td height="23"><a
				                    href="Lottery/result/B3/result_b3.php?status=0&type=<?=urldecode('上海时时乐')?>"
            target="main">上海时时乐</a></td>
                </tr>
              </tbody>
          </table></td>
        </tr>
      </tbody>
    </table></td>
  </tr>
  <tr>
    <td height="5" background="Images/tableline_bottom.jpg" bgcolor="#9BC2ED"></td>
  </tr>

  <?php
}
?>

<?php
if(strpos($quanxian,'修改彩票赔率')){
?>

  <tr>
    <td height="5" background="Images/tableline_top.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <tr>
    <td><table class="leftframetable" cellspacing="0" cellpadding="0" width="97%" align="right" 
border="0">
      <tbody>
        <tr>
          <td height="25" style="background:url(Images/left_tt.gif) no-repeat"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20"></td>
          <td height="25" class="titledaohang" style="CURSOR: hand" onClick="showsubmenu(3);"><span class="STYLE1">彩票赔率管理</span></td>
              </tr>
            </table></td>
          </tr>
        <tr>
          <td><table id="submenu3" cellspacing="0" cellpadding="0" width="100%" border="0">
              <tbody>
                <tr>
                  <td width="2%"><img src="Images/closed.gif" /></td>
                  <td height="23"><a 
            href="Lottery/odds.php?type=<?=urldecode('重庆时时彩')?>" 
            target="main">重庆时时彩</a></td>
                </tr>
               <tr>
                  <td width="2%"><img src="Images/closed.gif" /></td>
                  <td height="23"><a 
                            href="Lottery/odds.php?type=<?=urldecode('天津时时彩')?>" 
                            target="main">天津时时彩</a></td>
                </tr>
                				<tr>
                  <td width="2%"><img src="Images/closed.gif" /></td>
                  <td height="23"><a 
                            href="Lottery/odds.php?type=<?=urldecode('广东十分彩')?>" 
                            target="main">广东十分彩</a></td>
                </tr>
                				<tr>
                  <td width="2%"><img src="Images/closed.gif" /></td>
                  <td height="23"><a 
                            href="Lottery/odds.php?type=<?=urldecode('广西十分彩')?>" 
                            target="main">广西十分彩</a></td>
                </tr>
				<tr>
                  <td width="2%"><img src="Images/closed.gif" /></td>
                  <td height="23"><a 
            href="Lottery/odds.php?type=<?=urldecode('北京PK拾')?>" 
            target="main">北京PK拾</a></td>
                </tr>
				<tr>
                  <td width="2%"><img src="Images/closed.gif" /></td>
                  <td height="23"><a 
            href="Lottery/odds.php?type=<?=urldecode('北京快乐8')?>" 
            target="main">北京快乐8</a></td>
                </tr>
				 <tr>
				                  <td width="2%"><img src="Images/closed.gif" /></td>
				                  <td height="23"><a 
				            href="Lottery/odds.php?type=<?=urldecode('广东11选5')?>" 
				            target="main">广东11选5</a></td>
				                </tr> 
				<tr>
                  <td width="2%"><img src="Images/closed.gif" /></td>
                  <td height="23"><a 
            href="Lottery/odds.php?type=<?=urldecode('3D彩')?>" 
            target="main">3D彩</a></td>
                </tr>
				<tr>
                    <td width="2%"><img src="Images/closed.gif" /></td>
                    <td height="23"><a 
            href="Lottery/odds.php?type=<?=urldecode('排列三')?>" 
            target="main">排列三</a></td>
                </tr>
               <tr>
                    <td width="2%"><img src="Images/closed.gif" /></td>
                    <td height="23"><a
                    href="Lottery/odds.php?type=<?=urldecode('重庆十分彩')?>"
                    target="main">重庆十分彩</a></td>
                </tr>
				 <tr>
                    <td width="2%"><img src="Images/closed.gif" /></td>
                    <td height="23"><a
                     href="Lottery/odds.php?type=<?=urldecode('天津十分彩')?>" 
            target="main">天津十分彩</a></td>
                </tr>
				 <tr>
                    <td width="2%"><img src="Images/closed.gif" /></td>
                    <td height="23"><a
                     href="Lottery/odds.php?type=<?=urldecode('上海时时乐')?>" 
            target="main">上海时时乐</a></td>
                </tr>

				<tr>
                  <td height="10"></td>
                </tr>
				<tr>
                  <td><img src="Images/closed.gif" /></td>
                  <td height="23"><a 
            href="Lottery/LotteryConfig.php" target="main">时时彩程序设置</a></td>
                </tr>
                <tr>
                    <td><img src="Images/closed.gif" /></td>
                    <td height="23"><a
                            href="Lottery/config/lottery_six_config.php" target="main">彩票金额设置</a></td>
                </tr>
              </tbody>
          </table></td>
        </tr>
      </tbody>
    </table></td>
  </tr>
  <tr>
    <td height="5" background="Images/tableline_bottom.jpg" bgcolor="#9BC2ED"></td>
  </tr>

  <?php
}
?>

<?php
if(strpos($quanxian,'查看注单') || strpos($quanxian,'手工结算注单') || strpos($quanxian,'修改彩票赔率')){
?>

  <tr>
    <td height="5" background="Images/tableline_top.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <tr>
    <td><table class="leftframetable" cellspacing="0" cellpadding="0" width="97%" align="right" 
border="0">
      <tbody>
        <tr>
          <td height="25" style="background:url(Images/left_tt.gif) no-repeat"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20"></td>
          <td height="25" class="titledaohang" style="CURSOR: hand" onClick="showsubmenu(4);"><span class="STYLE1">六合彩管理</span></td>
              </tr>
            </table></td>
          </tr>
        <tr>
          <td><table id="submenu4" cellspacing="0" cellpadding="0" width="100%" border="0">
              <tbody>
                <tr>
                  <td width="2%"><img src="Images/closed.gif" /></td>
                  <td height="23"><a 
            href="Lottery/orderlist_lhc_user.php?status=0&type=<?=urldecode('六合彩')?>&js=<?=urldecode('0,1,2,3')?>"
            target="main">六合彩注单(按用户)</a></td>
                </tr>
                <tr>
                    <td width="2%"><img src="Images/closed.gif" /></td>
                    <td height="23"><a
                            href="Lottery/orderlist_lhc_zhudan.php?status=0&type=<?=urldecode('六合彩')?>&js=<?=urldecode('0,1,2,3')?>"
                            target="main">六合彩注单(按注单)</a></td>
                </tr>

				<?php
if(strpos($quanxian,'修改彩票赔率') ){
?>

                <tr>
                  <td width="2%"><img src="Images/closed.gif" /></td>
                  <td height="23"><a 
            href="Lottery/odds.php?type=<?=urldecode('六合彩')?>" 
            target="main">六合彩赔率</a></td>
                </tr>

				<?}?>
				<tr>
                  <td width="2%"><img src="Images/closed.gif" /></td>
                  <td height="23"><a 
            href="Lottery/result/LHC/result_lhc.php?type=<?=urldecode('六合彩')?>"
            target="main">六合彩开奖结果</a></td>
                </tr>
				<tr>
                  <td width="2%"><img src="Images/closed.gif" /></td>
                  <td height="23"><a 
            href="Lottery/set_issue.php?type=<?=urldecode('六合彩')?>"
            target="main">六合彩期数设置</a></td>
                </tr>
        <TR>
                  <TD width="2%"><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="report/six_lottery_history.php" target="main">六合彩明细</A>┆<A href="report/six_lottery_sp.php" target="main">六合彩-特码</A></TD>
                </TR>

        <TR>     <TD><IMG src="Images/closed.gif"></TD>
                 <TD height=23><A   href="report/pingte.php"  target="main">平特生肖</A></TD>
                 </TR> 

        <TR>     <TD><IMG src="Images/closed.gif"></TD>
                 <TD height=23><A   href="report/weishu.php"  target="main">平特尾数</A></TD>
                 </TR> 


              </tbody>
          </table></td>
        </tr>
      </tbody>
    </table></td>
  </tr>
  <tr>
    <td height="5" background="Images/tableline_bottom.jpg" bgcolor="#9BC2ED"></td>
  </tr>

  <?php
}
?>

<?php
if(strpos($quanxian,'真人娱乐')){
?>

  <tr>
    <td height="5" background="Images/tableline_top.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <tr>
    <td><table class="leftframetable" cellspacing="0" cellpadding="0" width="97%" align="right" 
border="0">
      <tbody>
        <tr>
          <td height="25" style="background:url(Images/left_tt.gif) no-repeat"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20"></td>
          <td height="25" class="titledaohang" style="CURSOR: hand" onClick="showsubmenu(5);"><span class="STYLE1">真人娱乐操作</span></td>
              </tr>
            </table></td>
          </tr>
        <tr>
          <td><table id="submenu5" cellspacing="0" cellpadding="0" width="100%" border="0">
              <tbody>
                <tr>
                  <td width="2%"><img src="Images/closed.gif" /></td>
                  <td height="23"><a href="casino/zz_log.php?gtype=<?=urldecode('All')?>&status=<?=urldecode('0,1,4')?>" target="main">所有转账记录</a></td>
                </tr>
                <!--<tr>
                    <td width="2%"><img src="Images/closed.gif" /></td>
                    <td height="23"><a href="casino/zz_log.php?gtype=<?=urldecode('All')?>&status=<?=urldecode('4')?>" target="main">待审核的转账</a></td>
                </tr>
                <tr>
                    <td width="2%"><img src="Images/closed.gif" /></td>
                    <td height="23"><a href="casino/zz_log.php?gtype=<?=urldecode('All')?>&status=<?=urldecode('0')?>" target="main">未结算的转账</a></td>
                </tr>-->
                <tr>
                    <td width="2%"><img src="Images/closed.gif" /></td>
                    <td height="23"><a href="casino/ag_user_fs_list.php?gtype=<?=urldecode('All')?>?>" target="main">一键反水列表</a></td>
                </tr>
				<tr>
                    <td width="2%"><img src="Images/closed.gif" /></td>
                    <td height="23"><a href="casino/list.php" target="main">AG下注纪录</a></td>
                </tr>
				<tr>
                    <td width="2%"><img src="Images/closed.gif" /></td>
                    <td height="23"><a href="casino/report.php" target="main">AG报表</a></td>
                </tr>
				<tr>
                    <td width="2%"><img src="Images/closed.gif" /></td>
                    <td height="23"><a href="casino/list2.php" target="main">AG下注纪录同步</a></td>
                </tr>
                <tr>
                    <td width="2%"><img src="Images/closed.gif" /></td>
                    <td height="23"><a href="casino/list_bb.php" target="main">BBIN下注纪录</a></td>
                </tr>
				<tr>
                    <td width="2%"><img src="Images/closed.gif" /></td>
                    <td height="23"><a href="casino/report_bb.php" target="main">BBIN报表</a></td>
                </tr>
                <tr>
                    <td width="2%"><img src="Images/closed.gif" /></td>
                    <td height="23"><a href="casino/list2_bb.php" target="main">BBIN下注纪录同步</a></td>
                </tr>

				<tr>
                    <td width="2%"><img src="Images/closed.gif" /></td>
                    <td height="23"><a href="casino/list_mg.php" target="main">MG下注纪录</a></td>
                </tr>
				<tr>
                    <td width="2%"><img src="Images/closed.gif" /></td>
                    <td height="23"><a href="casino/report_mg.php" target="main">MG报表</a></td>
                </tr>
                <tr>
                    <td width="2%"><img src="Images/closed.gif" /></td>
                    <td height="23"><a href="casino/list2_mg.php" target="main">MG下注纪录同步</a></td>
                </tr>

              </tbody>
          </table></td>
        </tr>
      </tbody>
    </table></td>
  </tr>
  <tr>
    <td height="5" background="Images/tableline_bottom.jpg" bgcolor="#9BC2ED"></td>
  </tr>

  <?php
}
?>

<?php
if(strpos($quanxian,'编辑体育赛事') && false){//先注释了
?>
  <tr>
    <td height="5" background="Images/tableline_top.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <tr>
    <td><TABLE class=leftframetable cellSpacing=0 cellPadding=0 width="97%" align=right border=0>
      <TBODY>
        <TR>
          <TD height="25" style="background:url(Images/left_tt.gif) no-repeat"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <TD width="20"></TD>
          <TD class=STYLE1 style="CURSOR: hand" onclick=showsubmenu(11); height=25>赛事管理</TD>
            </tr>
          </table></TD>
          </TR>
        <TR>
          <TD><TABLE id=submenu11 cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
                <TR>
                  <TD width="2%"><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="sports/ss_list.php?type=bet_match" target="main">足球赛事</A>┆<A   href="sports/ss_list.php?type=lq_match"  target="main">篮球赛事 </A></TD>
             </TR>
			 <TR>
                  <TD width="2%"><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="sports/ss_list.php?type=tennis_match" target="main">网球赛事</A>┆<A   href="sports/ss_list.php?type=volleyball_match"  target="main">排球赛事 </A></TD>
             </TR>
			 <TR>
                  <TD width="2%"><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="sports/ss_list.php?type=baseball_match" target="main">棒球赛事</A>┆<A   href="sports/gjss_list.php?type=3"  target="main">冠军赛事 </A></TD>
             </TR>
			 <TR>
                  <TD><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A   href="sports/gpsz.php"  target="main">关盘设置</A></TD>
                </TR>
              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE></td>
  </tr>
  <tr>
    <td height="5" background="Images/tableline_bottom.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <?php
}
?>

<?php
if(strpos($quanxian,'查看会员信息')){
?>
  <tr>
    <td height="5" background="Images/tableline_top.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <tr>
    <td><TABLE class=leftframetable cellSpacing=0 cellPadding=0 width="97%" align=right border=0>
      <TBODY>
        <TR>
          <TD height="25" style="background:url(Images/left_tt.gif) no-repeat"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <TD width="20"></TD>
          <TD class=STYLE1 style="CURSOR: hand" onclick=showsubmenu(6); height=25>会员管理</TD>
            </tr>
          </table></TD>
          </TR>
        <TR>
          <TD><TABLE id=submenu6 cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
                <TR>
                  <TD width="2%"><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="user/list.php?1=1" target="main">会员列表</A>┆<A   href="user/user_log.php"  target="main">会员日志 </A></TD>
             </TR>
			 <TR  style="display: none;">
                  <TD><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A   href="user/check_reb.php"  target="main">核查返利</A>┆<A   href="user/rebates.php"  target="main">会员返利</A></TD>
                </TR>
                <TR>
                    <TD><IMG src="Images/closed.gif"></TD>
                    <TD height=23><A   href="fund/hccw.php"  target="main">会员存/取/汇款</A></TD>
                </TR>
				<TR>
                  <TD><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A   href="user/user_group_list.php"  target="main">会员组列表</A></TD>
                </TR>
				<TR>
                  <TD><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A   href="hygl/lsyhxx.php"  target="main">历史银行信息</A></TD>
                </TR>
				<TR>
                  <TD><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A   href="../app/member/cache/hacker_look.php"  target="main">黑名单列表</A></TD>
                </TR>

              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE></td>
  </tr>
  <tr>
    <td height="5" background="Images/tableline_bottom.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <?php
}
?>
<?php
if(strpos($quanxian,'查看财务信息') || strpos($quanxian,'加款扣款') || strpos($quanxian,'财务审核')){
?>
  <tr>
    <td height="5" background="Images/tableline_top.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <tr>
    <td><TABLE class=leftframetable cellSpacing=0 cellPadding=0 width="97%" align=right border=0>
      <TBODY>
        <TR>
          <TD height="25" style="background:url(Images/left_tt.gif) no-repeat"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <TD width="20"></TD>
          <TD class=STYLE1 style="CURSOR: hand" onclick=showsubmenu(7); height=25>财务管理</TD>
            </tr>
          </table></TD>
          </TR>
        <TR>
          <TD><TABLE id=submenu7 cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
                <TR>
                  <TD width="2%"><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="fund/chongzhi.php?status=<?=urldecode('全部存款')?>" target="main">存款管理</A>┆<A   href="fund/tixian.php?status=<?=urldecode('全部提款')?>"  target="main">提款管理 </A></TD>
             </TR>
			 <TR>
                  <TD><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A   href="fund/huikuan.php?status=<?=urldecode('全部汇款')?>"  target="main">汇款管理</A>┆<A   href="fund/usercw.php"  target="main">会员存/取/汇款</A></TD>
                </TR>
				<?php
if(strpos($quanxian,'加款扣款')){
?>

                <TR>
                  <TD><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A   href="fund/domoney.php"  target="main">加款扣款</A></TD>
                </TR>
				<?php
}
?>
				<TR>
                  <TD><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A   href="report/money_log_by_user.php"  target="main">财务日志</A></TD>
                </TR>
        <TR>
        <TD><IMG src="Images/closed.gif"></TD>
                 <TD height=23><A   href="report/money_log_dele.php"  target="main">删除记录</A></TD>
                 </TR>
        <TR>
               

				
              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE></td>
  </tr>
  <tr>
    <td height="5" background="Images/tableline_bottom.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <?php
}
?>
<?php
if(strpos($quanxian,'消息管理')){
?>
  <tr>
    <td height="5" background="Images/tableline_top.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <tr>
    <td><TABLE class=leftframetable cellSpacing=0 cellPadding=0 width="97%" align=right border=0>
      <TBODY>
        <TR>
          <TD height="25" style="background:url(Images/left_tt.gif) no-repeat"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <TD width="20"></TD>
          <TD class=STYLE1 style="CURSOR: hand" onclick=showsubmenu(8); height=25>消息管理</TD>
            </tr>
          </table></TD>
          </TR>
        <TR>
          <TD><TABLE id=submenu8 cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
                <TR>
                  <TD width="2%"><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="message/bulletin.php?1=1" target="main">公告管理</A></TD>
             </TR>
			 <TR>
                  <TD><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A   href="message/user_msg.php"  target="main">站内消息 </A></TD>
                </TR>
			 <TR>
                  <TD><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A   href="message/msg_register.php"  target="main">注册消息 </A></TD>
                </TR>
              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE></td>
  </tr>
  <tr>
    <td height="5" background="Images/tableline_bottom.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <?php
}
?>
<?php
if(strpos($quanxian,'查看代理信息') || strpos($quanxian,'添加代理') || strpos($quanxian,'删除代理') || strpos($quanxian,'修改代理')){
?>
  <tr>
    <td height="5" background="Images/tableline_top.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <tr>
    <td><TABLE class=leftframetable cellSpacing=0 cellPadding=0 width="97%" align=right border=0>
      <TBODY>
        <TR>
          <TD height="25" style="background:url(Images/left_tt.gif) no-repeat"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <TD width="20"></TD>
          <TD class=STYLE1 style="CURSOR: hand" onclick=showsubmenu(9); height=25>代理管理</TD>
            </tr>
          </table></TD>
          </TR>
        <TR>
          <TD><TABLE id=submenu9 cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
                <TR>
                  <TD width="2%"><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="agents/list.php?1=1" target="main">代理列表</A></TD>
				 </TR>
				 <TR>
                  <TD><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A   href="agents/report.php"  target="main">代理报表</A></TD>
                </TR>
				 <TR>
                  <TD><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A   href="agents/report_inout.php"  target="main">代理存取报表</A></TD>
                </TR>
				<!-- <?php
					if(strpos($quanxian,'加款扣款')){
				?>
				                <TR>
				                  <TD><IMG src="Images/closed.gif"></TD>
				                  <TD height=23><A   href="agents/domoney.php"  target="main">给下属会员加款扣款</A></TD>
				                </TR>
				<?php
					}
				?> -->
              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE></td>
  </tr>
  <tr>
    <td height="5" background="Images/tableline_bottom.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <?php
}
?>

<?php
if(strpos($quanxian,'查看报表')){
?>
  <tr>
    <td height="5" background="Images/tableline_top.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <tr>
    <td><TABLE class=leftframetable cellSpacing=0 cellPadding=0 width="97%" align=right border=0>
      <TBODY>
        <TR>
          <TD height="25" style="background:url(Images/left_tt.gif) no-repeat"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <TD width="20"></TD>
          <TD class=STYLE1 style="CURSOR: hand" onclick=showsubmenu(10); height=25>报表管理</TD>
            </tr>
          </table></TD>
          </TR>
        <TR>
          <TD><TABLE id=submenu10 cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
                <TR>
                  <TD width="2%"><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="report/all_game_index.php" target="main">报表明细</A>┆<A href="report/all_game_index.php" target="main">今日报表</A></TD>
                </TR>
				<TR>
                  <TD width="2%"><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="report/sport_history.php" target="main">体育明细</A>┆<A href="report/sport_history.php" target="main">今日体育</A></TD>
                </TR>
				<TR>
                  <TD width="2%"><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="report/lottery_history.php" target="main">彩票明细</A>┆<A href="report/lottery_history.php" target="main">今日彩票</A></TD>
                </TR>
				
				<TR>
                  <TD width="2%"><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="report/live_history.php" target="main">真人娱乐明细</A>┆<A href="report/live_history.php" target="main">今日真人</A></TD>
                </TR>
              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE></td>
  </tr>
  <tr>
    <td height="5" background="Images/tableline_bottom.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <?php
}
?>


<?php
if(strpos($quanxian,'数据管理')){
?>
  <tr>
    <td height="5" background="Images/tableline_top.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <tr>
    <td><TABLE class=leftframetable cellSpacing=0 cellPadding=0 width="97%" align=right border=0>
      <TBODY>
        <TR>
          <TD height="25" style="background:url(Images/left_tt.gif) no-repeat"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <TD width="20"></TD>
          <TD class=STYLE1 style="CURSOR: hand" onclick=showsubmenu(13); height=25>数据管理</TD>
            </tr>
          </table></TD>
          </TR>
        <TR>
          <TD><TABLE id=submenu13 cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
                <TR>
                  <TD width="2%"><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="dataset/qcsj.php" target="main">清除数据</A></TD>
             </TR>
			 
             </TR>
              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE></td>
  </tr>
  <tr>
    <td height="5" background="Images/tableline_bottom.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <?php
}
?>


<?php
if(strpos($quanxian,'管理员管理')){
?>
  <tr>
    <td height="5" background="Images/tableline_top.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <tr>
    <td><TABLE class=leftframetable cellSpacing=0 cellPadding=0 width="97%" align=right border=0>
      <TBODY>
        <TR>
          <TD height="25" style="background:url(Images/left_tt.gif) no-repeat"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <TD width="20"></TD>
          <TD class=STYLE1 style="CURSOR: hand" onclick=showsubmenu(14); height=25>管理员管理</TD>
            </tr>
          </table></TD>
          </TR>
        <TR>
          <TD><TABLE id=submenu14 cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
                <TR>
                  <TD width="2%"><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="manage/list.php?1=1" target="main">管理员列表</A>┆<A   href="manage/log.php?1=1"  target="main">管理员日志 </A></TD>
             </TR>
			 <TR>
                  <TD width="2%"><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="manage/online.php" target="main">在线管理员</A></TD>
             </TR>
              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE></td>
  </tr>
  <tr>
    <td height="5" background="Images/tableline_bottom.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <?php
}
?>


<?php
if(strpos($quanxian,'修改网站信息')){
?>
  <tr>
    <td height="5" background="Images/tableline_top.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <tr>
    <td><TABLE class=leftframetable cellSpacing=0 cellPadding=0 width="97%" align=right border=0>
      <TBODY>
        <TR>
          <TD height="25" style="background:url(Images/left_tt.gif) no-repeat"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <TD width="20"></TD>
          <TD class=STYLE1 style="CURSOR: hand" onclick=showsubmenu(15); height=25>系统管理</TD>
            </tr>
          </table></TD>
          </TR>
        <TR>
          <TD><TABLE id=submenu15 cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
                <TR>
                  <TD width="2%"><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="webconfig/index.php" target="main">系统设置</A></TD>
             </TR>
                <TR>
                  <TD width="2%"><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="webconfig/setHuikuan.php" target="main">设置汇款信息</A></TD>
             </TR>
			
              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE></td>
  </tr>
  <tr>
    <td height="5" background="Images/tableline_bottom.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <?php
}
?>
  <tr>
    <td height="5" background="Images/tableline_top.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <tr>
    <td height="8">
	
<TABLE class=leftframetable cellSpacing=1 cellPadding=1 width="97%" align=right 
border=0>
      <TBODY>
        <TR>
          <TD height="25" style="background:url(Images/left_tt.gif) no-repeat"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <TD width="20"></TD>
          <TD class=STYLE1 height=25>系统信息</TD>
            </tr>
          </table></TD>
          </TR>
        <TR>
          <TD 
      height=105><span class="STYLE2"><IMG src="Images/closed.gif">版权所有：澳门永利赌场<?=$web_site['web_name']?><br>
              <IMG src="Images/closed.gif">官方网址：yl00853.com<?=$web_site['web_name']?><br>
            <IMG src="Images/closed.gif">系统版本：4.0</span></TD>
        </TR>
      </TBODY>
    </TABLE>	</td>
  </tr>
  <tr>
    <td height="5" background="Images/tableline_bottom.jpg"></td>
  </tr>
</table>
</body></html>
