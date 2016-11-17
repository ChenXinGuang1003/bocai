<?php


echo '
<form name="lt_form" method="post" action="/member/lt_nap/lt_nap_order.php" onsubmit="return false;">
  <input type="hidden" name="gid" id="gid" value="365485" />
  <div id="showTable">
    <!--正码过关table-->
    <div class="round-table">
    <table id="table1" style="background-color:white" class="MobileTable">
      <tr class="title_tr">
        <td>
          号码
        </td>
        <td colspan="3">
          赔率
        </td>
      </tr>
            <tr style="background-color:white">
        <td class="title_td2" style="text-align:center;" rowspan="6">
          正码一
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game1" type="radio" value="NAP1_ODD" />单 <span style="color:red;font-weight:bold">'.$odds_NAP1["h1"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game1" type="radio" value="NAP1_EVEN" />双 <span style="color:red;font-weight:bold">'.$odds_NAP1["h2"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>
      <tr style="background-color:#fef4f5;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game1" type="radio" value="NAP1_OVER" />大 <span style="color:red;font-weight:bold">'.$odds_NAP1["h3"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game1" type="radio" value="NAP1_UNDER" />小 <span style="color:red;font-weight:bold">'.$odds_NAP1["h4"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>

      <tr style="background-color:#ede3e4;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game1" type="radio" value="NAP1_SODD" />和单 <span style="color:red;font-weight:bold">'.$odds_NAP1["h5"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game1" type="radio" value="NAP1_SEVEN" />和双 <span style="color:red;font-weight:bold">'.$odds_NAP1["h6"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>

      <tr style="background-color:#dcd2d3;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game1" type="radio" value="NAP1_SOVER" />和大 <span style="color:red;font-weight:bold">'.$odds_NAP1["h7"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game1" type="radio" value="NAP1_SUNDER" />和小 <span style="color:red;font-weight:bold">'.$odds_NAP1["h8"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>

      <tr style="background-color:#cbc1c2;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game1" type="radio" value="NAP1_FOVER" />尾大 <span style="color:red;font-weight:bold">'.$odds_NAP1["h9"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game1" type="radio" value="NAP1_FUNDER" />尾小 <span style="color:red;font-weight:bold">'.$odds_NAP1["h10"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>


      <tr style="background-color:#e5eaee;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game1" type="radio" value="NAP1_R" />红 <span style="color:red;font-weight:bold">'.$odds_NAP1["h11"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game1" type="radio" value="NAP1_G" />绿 <span style="color:red;font-weight:bold">'.$odds_NAP1["h12"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game1" type="radio" value="NAP1_B" />蓝 <span style="color:red;font-weight:bold">'.$odds_NAP1["h13"].'</span>
          </label>
        </td>
      </tr>
            <tr style="background-color:white">
        <td class="title_td2" style="text-align:center;" rowspan="6">
          正码二
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game2" type="radio" value="NAP2_ODD" />单 <span style="color:red;font-weight:bold">'.$odds_NAP2["h1"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game2" type="radio" value="NAP2_EVEN" />双 <span style="color:red;font-weight:bold">'.$odds_NAP2["h2"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>
      <tr style="background-color:#fef4f5;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game2" type="radio" value="NAP2_OVER" />大 <span style="color:red;font-weight:bold">'.$odds_NAP2["h3"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game2" type="radio" value="NAP2_UNDER" />小 <span style="color:red;font-weight:bold">'.$odds_NAP2["h4"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>

      <tr style="background-color:#ede3e4;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game2" type="radio" value="NAP2_SODD" />和单 <span style="color:red;font-weight:bold">'.$odds_NAP2["h5"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game2" type="radio" value="NAP2_SEVEN" />和双 <span style="color:red;font-weight:bold">'.$odds_NAP2["h6"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>

      <tr style="background-color:#dcd2d3;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game2" type="radio" value="NAP2_SOVER" />和大 <span style="color:red;font-weight:bold">'.$odds_NAP2["h7"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game2" type="radio" value="NAP2_SUNDER" />和小 <span style="color:red;font-weight:bold">'.$odds_NAP2["h8"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>

      <tr style="background-color:#cbc1c2;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game2" type="radio" value="NAP2_FOVER" />尾大 <span style="color:red;font-weight:bold">'.$odds_NAP2["h9"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game2" type="radio" value="NAP2_FUNDER" />尾小 <span style="color:red;font-weight:bold">'.$odds_NAP2["h10"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>


      <tr style="background-color:#e5eaee;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game2" type="radio" value="NAP2_R" />红 <span style="color:red;font-weight:bold">'.$odds_NAP2["h11"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game2" type="radio" value="NAP2_G" />绿 <span style="color:red;font-weight:bold">'.$odds_NAP2["h12"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game2" type="radio" value="NAP2_B" />蓝 <span style="color:red;font-weight:bold">'.$odds_NAP2["h13"].'</span>
          </label>
        </td>
      </tr>
            <tr style="background-color:white">
        <td class="title_td2" style="text-align:center;" rowspan="6">
          正码三
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game3" type="radio" value="NAP3_ODD" />单 <span style="color:red;font-weight:bold">'.$odds_NAP3["h1"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game3" type="radio" value="NAP3_EVEN" />双 <span style="color:red;font-weight:bold">'.$odds_NAP3["h2"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>
      <tr style="background-color:#fef4f5;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game3" type="radio" value="NAP3_OVER" />大 <span style="color:red;font-weight:bold">'.$odds_NAP3["h3"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game3" type="radio" value="NAP3_UNDER" />小 <span style="color:red;font-weight:bold">'.$odds_NAP3["h4"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>

      <tr style="background-color:#ede3e4;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game3" type="radio" value="NAP3_SODD" />和单 <span style="color:red;font-weight:bold">'.$odds_NAP3["h5"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game3" type="radio" value="NAP3_SEVEN" />和双 <span style="color:red;font-weight:bold">'.$odds_NAP3["h6"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>

      <tr style="background-color:#dcd2d3;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game3" type="radio" value="NAP3_SOVER" />和大 <span style="color:red;font-weight:bold">'.$odds_NAP3["h7"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game3" type="radio" value="NAP3_SUNDER" />和小 <span style="color:red;font-weight:bold">'.$odds_NAP3["h8"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>

      <tr style="background-color:#cbc1c2;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game3" type="radio" value="NAP3_FOVER" />尾大 <span style="color:red;font-weight:bold">'.$odds_NAP3["h9"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game3" type="radio" value="NAP3_FUNDER" />尾小 <span style="color:red;font-weight:bold">'.$odds_NAP3["h10"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>


      <tr style="background-color:#e5eaee;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game3" type="radio" value="NAP3_R" />红 <span style="color:red;font-weight:bold">'.$odds_NAP3["h11"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game3" type="radio" value="NAP3_G" />绿 <span style="color:red;font-weight:bold">'.$odds_NAP3["h12"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game3" type="radio" value="NAP3_B" />蓝 <span style="color:red;font-weight:bold">'.$odds_NAP3["h13"].'</span>
          </label>
        </td>
      </tr>
            <tr style="background-color:white">
        <td class="title_td2" style="text-align:center;" rowspan="6">
          正码四
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game4" type="radio" value="NAP4_ODD" />单 <span style="color:red;font-weight:bold">'.$odds_NAP4["h1"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game4" type="radio" value="NAP4_EVEN" />双 <span style="color:red;font-weight:bold">'.$odds_NAP4["h2"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>
      <tr style="background-color:#fef4f5;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game4" type="radio" value="NAP4_OVER" />大 <span style="color:red;font-weight:bold">'.$odds_NAP4["h3"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game4" type="radio" value="NAP4_UNDER" />小 <span style="color:red;font-weight:bold">'.$odds_NAP4["h4"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>

      <tr style="background-color:#ede3e4;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game4" type="radio" value="NAP4_SODD" />和单 <span style="color:red;font-weight:bold">'.$odds_NAP4["h5"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game4" type="radio" value="NAP4_SEVEN" />和双 <span style="color:red;font-weight:bold">'.$odds_NAP4["h6"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>

      <tr style="background-color:#dcd2d3;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game4" type="radio" value="NAP4_SOVER" />和大 <span style="color:red;font-weight:bold">'.$odds_NAP4["h7"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game4" type="radio" value="NAP4_SUNDER" />和小 <span style="color:red;font-weight:bold">'.$odds_NAP4["h8"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>

      <tr style="background-color:#cbc1c2;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game4" type="radio" value="NAP4_FOVER" />尾大 <span style="color:red;font-weight:bold">'.$odds_NAP4["h9"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game4" type="radio" value="NAP4_FUNDER" />尾小 <span style="color:red;font-weight:bold">'.$odds_NAP4["h10"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>


      <tr style="background-color:#e5eaee;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game4" type="radio" value="NAP4_R" />红 <span style="color:red;font-weight:bold">'.$odds_NAP4["h11"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game4" type="radio" value="NAP4_G" />绿 <span style="color:red;font-weight:bold">'.$odds_NAP4["h12"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game4" type="radio" value="NAP4_B" />蓝 <span style="color:red;font-weight:bold">'.$odds_NAP4["h13"].'</span>
          </label>
        </td>
      </tr>
            <tr style="background-color:white">
        <td class="title_td2" style="text-align:center;" rowspan="6">
          正码五
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game5" type="radio" value="NAP5_ODD" />单 <span style="color:red;font-weight:bold">'.$odds_NAP5["h1"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game5" type="radio" value="NAP5_EVEN" />双 <span style="color:red;font-weight:bold">'.$odds_NAP5["h2"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>
      <tr style="background-color:#fef4f5;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game5" type="radio" value="NAP5_OVER" />大 <span style="color:red;font-weight:bold">'.$odds_NAP5["h3"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game5" type="radio" value="NAP5_UNDER" />小 <span style="color:red;font-weight:bold">'.$odds_NAP5["h4"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>

      <tr style="background-color:#ede3e4;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game5" type="radio" value="NAP5_SODD" />和单 <span style="color:red;font-weight:bold">'.$odds_NAP5["h5"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game5" type="radio" value="NAP5_SEVEN" />和双 <span style="color:red;font-weight:bold">'.$odds_NAP5["h6"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>

      <tr style="background-color:#dcd2d3;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game5" type="radio" value="NAP5_SOVER" />和大 <span style="color:red;font-weight:bold">'.$odds_NAP5["h7"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game5" type="radio" value="NAP5_SUNDER" />和小 <span style="color:red;font-weight:bold">'.$odds_NAP5["h8"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>

      <tr style="background-color:#cbc1c2;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game5" type="radio" value="NAP5_FOVER" />尾大 <span style="color:red;font-weight:bold">'.$odds_NAP5["h9"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game5" type="radio" value="NAP5_FUNDER" />尾小 <span style="color:red;font-weight:bold">'.$odds_NAP5["h10"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>


      <tr style="background-color:#e5eaee;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game5" type="radio" value="NAP5_R" />红 <span style="color:red;font-weight:bold">'.$odds_NAP5["h11"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game5" type="radio" value="NAP5_G" />绿 <span style="color:red;font-weight:bold">'.$odds_NAP5["h12"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game5" type="radio" value="NAP5_B" />蓝 <span style="color:red;font-weight:bold">'.$odds_NAP5["h13"].'</span>
          </label>
        </td>
      </tr>
            <tr style="background-color:white">
        <td class="title_td2" style="text-align:center;" rowspan="6">
          正码六
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game6" type="radio" value="NAP6_ODD" />单 <span style="color:red;font-weight:bold">'.$odds_NAP6["h1"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game6" type="radio" value="NAP6_EVEN" />双 <span style="color:red;font-weight:bold">'.$odds_NAP6["h2"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>
      <tr style="background-color:#fef4f5;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game6" type="radio" value="NAP6_OVER" />大 <span style="color:red;font-weight:bold">'.$odds_NAP6["h3"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game6" type="radio" value="NAP6_UNDER" />小 <span style="color:red;font-weight:bold">'.$odds_NAP6["h4"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>

      <tr style="background-color:#ede3e4;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game6" type="radio" value="NAP6_SODD" />和单 <span style="color:red;font-weight:bold">'.$odds_NAP6["h5"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game6" type="radio" value="NAP6_SEVEN" />和双 <span style="color:red;font-weight:bold">'.$odds_NAP6["h6"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>

      <tr style="background-color:#dcd2d3;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game6" type="radio" value="NAP6_SOVER" />和大 <span style="color:red;font-weight:bold">'.$odds_NAP6["h7"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game6" type="radio" value="NAP6_SUNDER" />和小 <span style="color:red;font-weight:bold">'.$odds_NAP6["h8"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>

      <tr style="background-color:#cbc1c2;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game6" type="radio" value="NAP6_FOVER" />尾大 <span style="color:red;font-weight:bold">'.$odds_NAP6["h9"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game6" type="radio" value="NAP6_FUNDER" />尾小 <span style="color:red;font-weight:bold">'.$odds_NAP6["h10"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          &nbsp;
        </td>
      </tr>


      <tr style="background-color:#e5eaee;">
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game6" type="radio" value="NAP6_R" />红 <span style="color:red;font-weight:bold">'.$odds_NAP6["h11"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game6" type="radio" value="NAP6_G" />绿 <span style="color:red;font-weight:bold">'.$odds_NAP6["h12"].'</span>
          </label>
        </td>
        <td style="text-align:left">
          <label class="padding_label">
          <input name="game6" type="radio" value="NAP6_B" />蓝 <span style="color:red;font-weight:bold">'.$odds_NAP6["h13"].'</span>
          </label>
        </td>
      </tr>
            <tr style="background-color:white;">
        <td colspan="4" class="Send">
          <input type="button" class="no" name="btnReset" value="重设" />&nbsp;&nbsp;&nbsp;<input type="button" class="yes" name="btnSubmit" value="确认" />
        </td>
      </tr>
    </table>
    </div>
  </div>
</form>
';