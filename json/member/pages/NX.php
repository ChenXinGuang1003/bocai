<?php

echo '
<form name="lt_form" method="post" action="/member/lt_nx/lt_nx_order.php" onsubmit="return false;">
  <input type="hidden" name="gid" id="gid" value="NX" />
  <div id="showTable">
    <!--合肖类别-->
    <div class="round-table">
    <table id="table1" style="background-color:white">
      <tr style="text-align:center;font-size:12px;">
        <td class="title_td" >
          类别
        </td>
        <td class="title_td" >
          <label class="padding_label"><input type="radio" id="NX_IN" name="rtype" value="NX_IN" />中</label>
        </td>
        <td class="title_td" >
          <label class="padding_label"><input type="radio" id="NX_OUT" name="rtype" value="NX_OUT" />不中</label>
        </td>
        <td class="title_td" >
          赔率
        </td>
        <td class="title_td"  style="color:red;font-weight:bold;width:12%;" id="show_fix_ratio" colspan="2">
        </td>
      </tr>
    </table>
    </div>
    <fieldset class="SPA" id="NxGroup">
      <nav>
        <b class="first">野兽</b>
        <b>家禽</b>
        <b>单</b>
        <b class="last">双</b>
      </nav>
      <nav>
        <b class="first">前肖</b>
        <b>后肖</b>
        <b>天肖</b>
        <b class="last">地肖</b>
      </nav>
    </fieldset>
    <!--六肖table-->
    <div class="round-table">
    <table id="table2" style="text-align:center;background-color:white;" class="MobileTable">
      <tr class="title_tr">
        <td>
          合肖
        </td>
        <td>
          号码
        </td>
        <td>
          勾选
        </td>
        <td>
          合肖
        </td>
        <td>
          号码
        </td>
        <td>
          勾选
        </td>
      </tr>
      <tr style="text-align:center;">
        <td class="title_td2">
          鼠
        </td>
        <td style="background-color:#e5eaee;text-align:left">
          '.$zodiacArray[11].'
        </td>
        <td>
            <label class="padding_label"><input type="checkbox" name="lt_nx[]" value="NX_A1"/></label>
        </td>
        <td class="title_td2">
          牛
        </td>
        <td style="background-color:#e5eaee;text-align:left">
          '.$zodiacArray[10].'
        </td>
        <td>
            <label class="padding_label"><input type="checkbox" name="lt_nx[]" value="NX_A2"/></label>
        </td>
      </tr>
      <tr>
        <td class="title_td2">
          虎
        </td>
        <td style="background-color:#e5eaee;text-align:left">
          '.$zodiacArray[9].'
        </td>
        <td>
            <label class="padding_label"><input type="checkbox" name="lt_nx[]" value="NX_A3"/></label>
        </td>
        <td class="title_td2">
          兔
        </td>
        <td style="background-color:#e5eaee;text-align:left">
          '.$zodiacArray[8].'
        </td>
        <td>
            <label class="padding_label"><input type="checkbox" name="lt_nx[]" value="NX_A4"/></label>
        </td>
      </tr>
      <tr>
        <td class="title_td2">
          龙
        </td>
        <td style="background-color:#e5eaee;text-align:left">
          '.$zodiacArray[7].'
        </td>
        <td>
            <label class="padding_label"><input type="checkbox" name="lt_nx[]" value="NX_A5"/></label>
        </td>
        <td class="title_td2">
          蛇
        </td>
        <td style="background-color:#e5eaee;text-align:left">
          '.$zodiacArray[6].'
        </td>
        <td>
            <label class="padding_label"><input type="checkbox" name="lt_nx[]" value="NX_A6"/></label>
        </td>
      </tr>
      <tr>
        <td class="title_td2">
          马
        </td>
        <td style="background-color:#e5eaee;text-align:left">
          '.$zodiacArray[5].'
        </td>
        <td>
            <label class="padding_label"><input type="checkbox" name="lt_nx[]" value="NX_A7"/></label>
        </td>
        <td class="title_td2">
          羊
        </td>
        <td style="background-color:#e5eaee;text-align:left">
          '.$zodiacArray[4].'
        </td>
        <td>
            <label class="padding_label"><input type="checkbox" name="lt_nx[]" value="NX_A8"/></label>
        </td>
      </tr>
      <tr>
        <td class="title_td2">
          猴
        </td>
        <td style="background-color:#e5eaee;text-align:left">
          '.$zodiacArray[3].'
        </td>
        <td>
            <label class="padding_label"><input type="checkbox" name="lt_nx[]" value="NX_A9"/></label>
        </td>
        <td class="title_td2">
          鸡
        </td>
        <td style="background-color:#e5eaee;text-align:left">
          '.$zodiacArray[2].'
        </td>
        <td>
            <label class="padding_label"><input type="checkbox" name="lt_nx[]" value="NX_AA"/></label>
        </td>
      </tr>
      <tr>
        <td class="title_td2">
          狗
        </td>
        <td style="background-color:#e5eaee;text-align:left">
          '.$zodiacArray[1].'
        </td>
        <td>
            <label class="padding_label"><input type="checkbox" name="lt_nx[]" value="NX_AB"/></label>
        </td>
        <td class="title_td2">
          猪
        </td>
        <td style="background-color:#e5eaee;text-align:left">
          '.$zodiacArray[0].'
        </td>
        <td>
            <label class="padding_label"><input type="checkbox" name="lt_nx[]" value="NX_AC"/></label>
        </td>
      </tr>
    </table>
    </div>
    <div class="round-table">
    <table id="table3" style="text-align:center;" class="MobileTable">
      <tr>
        <td class="Send">
          <input class="no" type="button" name="btnReset" value="取消" />
          <input class="yes" type="button" name="btnSubmit" value="送出" />
        </td>
      </tr>
    </table>
    </div>
  </div>
</form>

';