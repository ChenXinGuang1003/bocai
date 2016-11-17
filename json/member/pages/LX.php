<?php


echo '
<form name="lt_form" method="post" action="/member/lt_lx/lt_lx_order.php" onsubmit="return false;" class="Aside">
<input type="hidden" name="gid" id="gid" value="LX" />
<div id="showTable">
<!--連肖类别-->
<div class="round-table">
<table id="table1" style="background-color:white" class="MobileTable">
  <tr class="title_tr">
    <td><label class="padding_label"><input name="rtype" type="radio" value="LX2" />二肖连</label></td>
    <td><label class="padding_label"><input name="rtype" type="radio" value="LX3" />三肖连</label></td>
    <td><label class="padding_label"><input name="rtype" type="radio" value="LX4" />四肖连</label></td>
    <td><label class="padding_label"><input name="rtype" type="radio" value="LX5" />五肖连</label></td>
  </tr>
  <tr class="title_tr">
    <td><label class="padding_label"><input name="rtype" type="radio" value="LF2" />二尾碰</label></td>
    <td><label class="padding_label"><input name="rtype" type="radio" value="LF3" />三尾碰</label></td>
    <td><label class="padding_label"><input name="rtype" type="radio" value="LF4" />四尾碰</label></td>
    <td><label class="padding_label"><input name="rtype" type="radio" value="LF5" />五尾碰</label></td>
  </tr>
</table>
</div>
<!--連肖table-->
<div class="round-table">
<table id="table2" style="text-align:center;background-color:white;">
  <tr class="title_tr">
    <td style="width:10%;">连肖</td>
    <td style="width:22%;">号码</td>
    <td colspan="2" style="width:18%;">勾选</td>
    <td style="width:10%;">连肖</td>
    <td style="width:22%;">号码</td>
    <td colspan="2" style="width:18%;">勾选</td>
  </tr>
  <tr style="text-align:center;">
    <td class="title_td2">鼠</td>
    <td style="background-color:#e5eaee;text-align:left">'.$zodiacArray[11].'</td>
    <td width="40px"><label class="padding_label"><input type="checkbox" name="lx[]" value="A1" /></label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;width:9%;" id="A1"></td>
    <td class="title_td2">牛</td>
    <td style="background-color:#e5eaee;text-align:left">'.$zodiacArray[10].'</td>
    <td width="40px"><label class="padding_label"><input type="checkbox" name="lx[]" value="A2" /></label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;width:9%;" id="A2"></td>
  </tr>
  <tr>
    <td class="title_td2">虎</td>
    <td style="background-color:#e5eaee;text-align:left">'.$zodiacArray[9].'</td>
    <td width="40px"><label class="padding_label"><input type="checkbox" name="lx[]" value="A3" /></label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="A3"></td>
    <td class="title_td2">兔</td>
    <td style="background-color:#e5eaee;text-align:left">'.$zodiacArray[8].'</td>
    <td width="40px"><label class="padding_label"><input type="checkbox" name="lx[]" value="A4" /></label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="A4"></td>
  </tr>
  <tr>
    <td class="title_td2">龙</td>
    <td style="background-color:#e5eaee;text-align:left">'.$zodiacArray[7].'</td>
    <td width="40px"><label class="padding_label"><input type="checkbox" name="lx[]" value="A5" /></label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="A5"></td>
    <td class="title_td2">蛇</td>
    <td style="background-color:#e5eaee;text-align:left">'.$zodiacArray[6].'</td>
    <td width="40px"><label class="padding_label"><input type="checkbox" name="lx[]" value="A6" /></label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="A6"></td>
  </tr>
  <tr>
    <td class="title_td2">马</td>
    <td style="background-color:#e5eaee;text-align:left">'.$zodiacArray[5].'</td>
    <td width="40px"><label class="padding_label"><input type="checkbox" name="lx[]" value="A7" /></label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="A7"></td>
    <td class="title_td2">羊</td>
    <td style="background-color:#e5eaee;text-align:left">'.$zodiacArray[4].'</td>
    <td width="40px"><label class="padding_label"><input type="checkbox" name="lx[]" value="A8" /></label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="A8"></td>
  </tr>
  <tr>
    <td class="title_td2">猴</td>
    <td style="background-color:#e5eaee;text-align:left">'.$zodiacArray[3].'</td>
    <td width="40px"><label class="padding_label"><input type="checkbox" name="lx[]" value="A9" /></label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="A9"></td>
    <td class="title_td2">鸡</td>
    <td style="background-color:#e5eaee;text-align:left">'.$zodiacArray[2].'</td>
    <td width="40px"><label class="padding_label"><input type="checkbox" name="lx[]" value="AA" /></label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="AA"></td>
  </tr>
  <tr>
    <td class="title_td2">狗</td>
    <td style="background-color:#e5eaee;text-align:left">'.$zodiacArray[1].'</td>
    <td width="40px"><label class="padding_label"><input type="checkbox" name="lx[]" value="AB" /></label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="AB"></td>
    <td class="title_td2">猪</td>
    <td style="background-color:#e5eaee;text-align:left">'.$zodiacArray[0].'</td>
    <td width="40px"><label class="padding_label"><input type="checkbox" name="lx[]" value="AC" /></label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="AC"></td>
  </tr>
</table>
</div>
<div class="round-table">
<table id="table3" style="text-align:center;background-color:white;">
  <tr class="title_tr">
    <td style="width:10%;">尾数</td>
    <td style="width:22%;">号码</td>
    <td nowrap="nowrap" colspan="2" style="width:18%;">勾选</td>
    <td style="width:10%;">尾数</td>
    <td style="width:22%;">号码</td>
    <td nowrap="nowrap" colspan="2" style="width:18%;">勾选</td>
  </tr>
  <tr style="text-align:center;">
    <td class="title_td2">0</td>
    <td style="background-color:#e5eaee;text-align:left">10, 20 ,30 ,40</td>
    <td><label class="padding_label">&nbsp;<input type="checkbox" name="lf[]" value="0" />&nbsp;</label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;width:9%;" id="Fn0"></td>
    <td class="title_td2">1</td>
    <td style="background-color:#e5eaee;text-align:left">01, 11, 21, 31, 41</td>
    <td><label class="padding_label">&nbsp;<input type="checkbox" name="lf[]" value="1" />&nbsp;</label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;width:9%;" id="Fn1"></td>
  </tr>
  <tr>
    <td class="title_td2">2</td>
    <td style="background-color:#e5eaee;text-align:left">02, 12, 22, 32, 42</td>
    <td><label class="padding_label">&nbsp;<input type="checkbox" name="lf[]" value="2" />&nbsp;</label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="Fn2"></td>
    <td class="title_td2">3</td>
    <td style="background-color:#e5eaee;text-align:left">03, 13, 23, 33, 43</td>
    <td><label class="padding_label">&nbsp;<input type="checkbox" name="lf[]" value="3" />&nbsp;</label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="Fn3"></td>
  </tr>
  <tr>
    <td class="title_td2">4</td>
    <td style="background-color:#e5eaee;text-align:left">04, 14, 24, 34, 44</td>
    <td><label class="padding_label">&nbsp;<input type="checkbox" name="lf[]" value="4" />&nbsp;</label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="Fn4"></td>
    <td class="title_td2">5</td>
    <td style="background-color:#e5eaee;text-align:left">05, 15, 25, 35, 45</td>
    <td><label class="padding_label">&nbsp;<input type="checkbox" name="lf[]" value="5" />&nbsp;</label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="Fn5"></td>
  </tr>
  <tr style="text-align:center;">
    <td class="title_td2">6</td>
    <td style="background-color:#e5eaee;text-align:left">06, 16, 26, 36, 46</td>
    <td><label class="padding_label">&nbsp;<input type="checkbox" name="lf[]" value="6" />&nbsp;</label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="Fn6"></td>
    <td class="title_td2">7</td>
    <td style="background-color:#e5eaee;text-align:left">07, 17, 27, 37, 47</td>
    <td><label class="padding_label">&nbsp;<input type="checkbox" name="lf[]" value="7" />&nbsp;</label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="Fn7"></td>
  </tr>
  <tr style="text-align:center;">
    <td class="title_td2">8</td>
    <td style="background-color:#e5eaee;text-align:left">08, 18, 28, 38, 48</td>
    <td><label class="padding_label">&nbsp;<input type="checkbox" name="lf[]" value="8" />&nbsp;</label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="Fn8"></td>
    <td class="title_td2">9</td>
    <td style="background-color:#e5eaee;text-align:left">09, 19, 29, 39, 49</td>
    <td><label class="padding_label">&nbsp;<input type="checkbox" name="lf[]" value="9" />&nbsp;</label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="Fn9"></td>
  </tr>
</table>
</div>
<div class="round-table">
<table id="table4" style="text-align:center;">
  <tr>
    <td class="Send">
      <input class="no" name="btnReset" type="button" value="取消" />
      <input class="yes" name="btnSubmit" type="button" value="送出" />
    </td>
  </tr>
</table>
</div>
</div>
</form>
';