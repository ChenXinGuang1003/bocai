<?php


echo '
<form name="lt_form" method="post" action="/member/lt_ch/lt_ch_order.php" onsubmit="return false;" class="Aside">
  <input type="hidden" id="gid" name="gid" value="366634" />
  <input type="hidden" name="rs_r" value="" />
  <div id="showTable">
    <!--连码类别-->
    <div class="round-table">
    <table id="table1" style="bakcground-color:white;" class="MobileTable">
      <tr class="title_tr">
        <td>
          类别
        </td>
        <td>
          <label class="padding_label">
          <input name="rtype" type="radio" value="CH_4" />四全中
          </label>
        </td>
        <td>
          <label class="padding_label">
          <input name="rtype" type="radio" value="CH_3" />三全中
          </label>
        </td>
        <td>
          <label class="padding_label">
          <input name="rtype" type="radio" value="CH_32" />三中二
          </label>
        </td>
        <td>
          <label class="padding_label">
          <input name="rtype" type="radio" value="CH_2" />二全中
          </label>
        </td>
        <td>
          <label class="padding_label">
          <input name="rtype" type="radio" value="CH_2S" />二中特
          </label>
        </td>
        <td>
        <label class="padding_label">
          <input name="rtype" type="radio" value="CH_2SP" />特串
        </label>
        </td>
      </tr>
      <tr>
        <td>
          赔率
        </td>
        <td>
          四全中 <span style="color:red;font-weight:bold">'.(intval($odds_CH["h1"]*100)/100).'</span>
        </td>
        <td>
          三全中 <span style="color:red;font-weight:bold">'.(intval($odds_CH["h2"]*100)/100).'</span>
        </td>
        <td>
          中二 <span style="color:red;font-weight:bold">'.(intval($odds_CH["h3"]*100)/100).'</span>
          <br/>
          中三 <span style="color:red;font-weight:bold">'.(intval($odds_CH["h4"]*100)/100).'</span>
        </td>
        <td>
          二全中 <span style="color:red;font-weight:bold">'.(intval($odds_CH["h5"]*100)/100).'</span>
        </td>
        <td>
          中特 <span style="color:red;font-weight:bold">'.(intval($odds_CH["h6"]*100)/100).'</span>
          <br/>
          中二 <span style="color:red;font-weight:bold">'.(intval($odds_CH["h7"]*100)/100).'</span>
        </td>
        <td>
          特串 <span style="color:red;font-weight:bold">'.(intval($odds_CH["h8"]*100)/100).'</span>
        </td>
      </tr>
    </table>
    </div>
    <div id="SPA_Box" class="round-table">
      <!--生肖对碰--><label><input name="OfTouch" disabled="disabled" id="OfTouch" type="checkbox" value="Y" />生肖对碰</label>
      <!--尾数对碰--><label><input name="OfTouch2" disabled="disabled" id="OfTouch2" type="checkbox" value="Y" />尾数对碰</label>
      <!--肖串尾数--><label><input name="OfTouch3" disabled="disabled" id="OfTouch3" type="checkbox" value="Y" />肖串尾数</label>
      <!--交差碰--><label style="display:none"><input name="OfTouch4" disabled="disabled" id="OfTouch4" type="checkbox" value="Y" />交叉碰</label>
      <!--胆拖--><label><input name="OfTouch5" disabled="disabled" id="OfTouch5" type="checkbox" value="Y" />胆拖</label>
      <!--胆拖色波--><label style="display:none"><input name="OfTouch6" disabled="disabled" id="OfTouch6" type="checkbox" value="Y" />胆拖色波</label>
      <!--胆拖生肖--><label style="display:none"><input name="OfTouch7" disabled="disabled" id="OfTouch7" type="checkbox" value="Y" />胆拖生肖</label>
    </div>
    <!--正/副号-->
    <div class="round-table">
    <table id="RSTable" style="display:none;background-color:white;width:100%;" class="MobileTable">
      <tr class="title_tr">
        <td id="RS" colspan="2">
          <input type="checkbox" name="RS" value="R" />正/副号
        </td>
        <td id="RNumT"> 正号 </td>
        <td id="RNumB"> </td>
        <td id="SNumT"> 副号 </td>
        <td id="SNumB"> </td>
      </tr>
    </table>
    </div>
    <!--连码table-->
    <div class="round-table">
    <table id="table2" style="text-align:center;" class="MobileTable">
      <tr class="title_tr">
        <td width="48px"> 号码 </td>
        <td> 勾选 </td>
        <td width="48px"> 号码 </td>
        <td> 勾选 </td>
        <td width="48px"> 号码 </td>
        <td> 勾选 </td>
        <td width="48px"> 号码 </td>
        <td> 勾选 </td>
        <td width="48px"> 号码 </td>
        <td style="width:10%"> 勾选 </td>
      </tr>
      <tr>
        <td class="bColorR"><span>01</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="01" disabled="disabled" /></label></td>
        <td class="bColorG"><span>11</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="11" disabled="disabled" /></label></td>
        <td class="bColorG"><span>21</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="21" disabled="disabled" /></label></td>
        <td class="bColorB"><span>31</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="31" disabled="disabled" /></label></td>
        <td class="bColorB"><span>41</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="41" disabled="disabled" /></label></td>
      </tr>
      <tr>
        <td class="bColorR"><span>02</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="02" disabled="disabled" /></label></td>
        <td class="bColorR"><span>12</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="12" disabled="disabled" /></label></td>
        <td class="bColorG"><span>22</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="22" disabled="disabled" /></label></td>
        <td class="bColorG"><span>32</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="32" disabled="disabled" /></label></td>
        <td class="bColorB"><span>42</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="42" disabled="disabled" /></label></td>
      </tr>
      <tr>
        <td class="bColorB"><span>03</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="03" disabled="disabled" /></label></td>
        <td class="bColorR"><span>13</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="13" disabled="disabled" /></label></td>
        <td class="bColorR"><span>23</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="23" disabled="disabled" /></label></td>
        <td class="bColorG"><span>33</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="33" disabled="disabled" /></label></td>
        <td class="bColorG"><span>43</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="43" disabled="disabled" /></label></td>
      </tr>
      <tr>
        <td class="bColorB"><span>04</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="04" disabled="disabled" /></label></td>
        <td class="bColorB"><span>14</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="14" disabled="disabled" /></label></td>
        <td class="bColorR"><span>24</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="24" disabled="disabled" /></label></td>
        <td class="bColorR"><span>34</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="34" disabled="disabled" /></label></td>
        <td class="bColorG"><span>44</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="44" disabled="disabled" /></label></td>
      </tr>
      <tr>
        <td class="bColorG"><span>05</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="05" disabled="disabled" /></label></td>
        <td class="bColorB"><span>15</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="15" disabled="disabled" /></label></td>
        <td class="bColorB"><span>25</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="25" disabled="disabled" /></label></td>
        <td class="bColorR"><span>35</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="35" disabled="disabled" /></label></td>
        <td class="bColorR"><span>45</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="45" disabled="disabled" /></label></td>
      </tr>
      <tr>
        <td class="bColorG"><span>06</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="06" disabled="disabled" /></label></td>
        <td class="bColorG"><span>16</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="16" disabled="disabled" /></label></td>
        <td class="bColorB"><span>26</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="26" disabled="disabled" /></label></td>
        <td class="bColorB"><span>36</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="36" disabled="disabled" /></label></td>
        <td class="bColorR"><span>46</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="46" disabled="disabled" /></label></td>
      </tr>
      <tr>
        <td class="bColorR"><span>07</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="07" disabled="disabled" /></label></td>
        <td class="bColorG"><span>17</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="17" disabled="disabled" /></label></td>
        <td class="bColorG"><span>27</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="27" disabled="disabled" /></label></td>
        <td class="bColorB"><span>37</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="37" disabled="disabled" /></label></td>
        <td class="bColorB"><span>47</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="47" disabled="disabled" /></label></td>
      </tr>
      <tr>
        <td class="bColorR"><span>08</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="08" disabled="disabled" /></label></td>
        <td class="bColorR"><span>18</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="18" disabled="disabled" /></label></td>
        <td class="bColorG"><span>28</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="28" disabled="disabled" /></label></td>
        <td class="bColorG"><span>38</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="38" disabled="disabled" /></label></td>
        <td class="bColorB"><span>48</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="48" disabled="disabled" /></label></td>
      </tr>
      <tr>
        <td class="bColorB"><span>09</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="09" disabled="disabled" /></label></td>
        <td class="bColorR"><span>19</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="19" disabled="disabled" /></label></td>
        <td class="bColorR"><span>29</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="29" disabled="disabled" /></label></td>
        <td class="bColorG"><span>39</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="39" disabled="disabled" /></label></td>
        <td class="bColorG"><span>49</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="49" disabled="disabled" /></label></td>
      </tr>
      <tr>
        <td class="bColorB"><span>10</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="10" disabled="disabled" /></label></td>
        <td class="bColorB"><span>20</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="20" disabled="disabled" /></label></td>
        <td class="bColorR"><span>30</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="30" disabled="disabled" /></label></td>
        <td class="bColorR"><span>40</span></td>
        <td><label class="padding_label"><input type="checkbox" name="num[]" value="40" disabled="disabled" /></label></td>
        <td colspan="2" class="Send">
          <input type="button" name="btnReset" value="取消" class="no_min" style="padding:0px;"/>
          <input type="button" name="btnSubmit" value="确定" class="yes_min" style="padding:0px;" />
        </td>
      </tr>
    </table>
    </div>
    <div class="round-table">
    <table id="table3" style="text-align:center;background-color:white;display:none;" class="MobileTable">
      <tr class="title_tr">
        <td>
          &nbsp;
        </td>
        <td>
          号码
        </td>
        <td>
          勾选
        </td>
        <td>
          &nbsp;
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
         <label class="padding_label"><input type="checkbox" name="spa[]" value="'.$zodiacArray[11].'"/></label>
        </td>
        <td class="title_td2">
          牛
        </td>
        <td style="background-color:#e5eaee;text-align:left">
          '.$zodiacArray[10].'
        </td>
        <td>
            <label class="padding_label"><input type="checkbox" name="spa[]" value="'.$zodiacArray[10].'"/></label>
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
            <label class="padding_label"><input type="checkbox" name="spa[]" value="'.$zodiacArray[9].'"/></label>
        </td>
        <td class="title_td2">
          兔
        </td>
        <td style="background-color:#e5eaee;text-align:left">
          '.$zodiacArray[8].'
        </td>
        <td>
            <label class="padding_label"><input type="checkbox" name="spa[]" value="'.$zodiacArray[8].'"/></label>
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
            <label class="padding_label"><input type="checkbox" name="spa[]" value="'.$zodiacArray[7].'"/></label>
        </td>
        <td class="title_td2">
          蛇
        </td>
        <td style="background-color:#e5eaee;text-align:left">
          '.$zodiacArray[6].'
        </td>
        <td>
            <label class="padding_label"><input type="checkbox" name="spa[]" value="'.$zodiacArray[6].'"/></label>
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
            <label class="padding_label"><input type="checkbox" name="spa[]" value="'.$zodiacArray[5].'"/></label>
        </td>
        <td class="title_td2">
          羊
        </td>
        <td style="background-color:#e5eaee;text-align:left">
          '.$zodiacArray[4].'
        </td>
        <td>
            <label class="padding_label"><input type="checkbox" name="spa[]" value="'.$zodiacArray[4].'"/></label>
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
            <label class="padding_label"><input type="checkbox" name="spa[]" value="'.$zodiacArray[3].'"/></label>
        </td>
        <td class="title_td2">
          鸡
        </td>
        <td style="background-color:#e5eaee;text-align:left">
          '.$zodiacArray[2].'
        </td>
        <td>
            <label class="padding_label"><input type="checkbox" name="spa[]" value="'.$zodiacArray[2].'"/></label>
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
            <label class="padding_label"><input type="checkbox" name="spa[]" value="'.$zodiacArray[1].'"/></label>
        </td>
        <td class="title_td2">
          猪
        </td>
        <td style="background-color:#e5eaee;text-align:left">
          '.$zodiacArray[0].'
        </td>
        <td>
            <label class="padding_label"><input type="checkbox" name="spa[]" value="'.$zodiacArray[0].'"/></label>
        </td>
      </tr>
      <tr>
        <td colspan="6" class="Send">
          <input class="no" type="button" name="btnSpaReset" value="取消" />
          <input class="yes" type="button" name="btnSpaSend" value="送出" />
        </td>
      </tr>
    </table>
    </div>
    <div class="round-table">
    <table id="table4" style="border: 0pt none ; border-collapse: collapse; display:none;" class="MobileTable">
      <tr style="text-align: center;">
        <td class="title_td2 BorderLine" width="30px">
          0
        </td>
        <td class="BorderLine">
            <label class="padding_label"><input type="checkbox" name="nf[]" value="10, 20, 30, 40"/></label>
        </td>
        <td class="title_td2 BorderLine" width="30px">
          1
        </td>
        <td class="BorderLine">
            <label class="padding_label"><input type="checkbox" name="nf[]" value="01, 11, 21, 31, 41"/></label>
        </td>
        <td class="title_td2 BorderLine" width="30px">
          2
        </td>
        <td class="BorderLine">
            <label class="padding_label"><input type="checkbox" name="nf[]" value="02, 12, 22, 32, 42"/></label>
        </td>
        <td class="title_td2 BorderLine" width="30px">
          3
        </td>
        <td class="BorderLine">
            <label class="padding_label"><input type="checkbox" name="nf[]" value="03, 13, 23, 33, 43"/></label>
        </td>
        <td class="title_td2 BorderLine" width="30px">
          4
        </td>
        <td class="BorderLine">
            <label class="padding_label"><input type="checkbox" name="nf[]" value="04, 14, 24, 34, 44"/></label>
        </td>
      </tr>
      <tr style="text-align: center;">
        <td class="title_td2 BorderLine" width="30px">
          5
        </td>
        <td class="BorderLine">
            <label class="padding_label"><input type="checkbox" name="nf[]" value="05, 15, 25, 35, 45"/></label>
        </td>
        <td class="title_td2 BorderLine" width="30px">
          6
        </td>
        <td class="BorderLine">
            <label class="padding_label"><input type="checkbox" name="nf[]" value="06, 16, 26, 36, 46"/></label>
        </td>
        <td class="title_td2 BorderLine" width="30px">
          7
        </td>
        <td class="BorderLine">
            <label class="padding_label"><input type="checkbox" name="nf[]" value="07, 17, 27, 37, 47"/></label>
        </td>
        <td class="title_td2 BorderLine" width="30px">
          8
        </td>
        <td class="BorderLine">
            <label class="padding_label"><input type="checkbox" name="nf[]" value="08, 18, 28, 38, 48"/></label>
        </td>
        <td class="title_td2 BorderLine" width="30px">
          9
        </td>
        <td class="BorderLine">
            <label class="padding_label"><input type="checkbox" name="nf[]" value="09, 19, 29, 39, 49"/></label>
        </td>
      </tr>
      <tr>
        <td colspan="10" class="BorderLine Send" >
          <input class="no" type="button" name="btnFinReset" value="取消" />
          <input class="yes" type="button" name="btnFinSend" value="送出" />
        </td>
      </tr>
    </table>
    </div>
    <div id="XF" style="clear:both;">
      <div>
      <table id="table5" style="display:none;margin-top: 12px;width:45%;float:left; " class="MobileTable">
      </table>
      </div>
      <div>
      <table id="table6" style="display:none;margin-top: 12px;margin-left: 24px;width:45%;float:left; " class="MobileTable">
      </table>
      </div>
      <div style="float:left;width:100%;text-align:center;clear:both;display:none;" id="XF_Send">
        <input type="button" class="no" name="btnXfReset" value="取消" /><input name="btnXfSend" class="yes" type="button" value="送出" />
      </div>
    </div>
    <div id="CrossOverHit">
      <div id="HitZone">
        <div id="AddCross">
          <input type="button" value="新增柱列" />
        </div>
      </div>
      <div id="CrossSend">
        <input type="button" class="no" name="OverCancel" value="取消"/><input class="yes" name="OverSend" type="button" value="送出" />
        <span id="Warn"></span>
      </div>
      <div id="NumBtn">

        <!--快选区块-->
        <div id="QuickCross">
          <a style="color:red;">红波</a>&nbsp;<a style="color:blue;">蓝波</a>&nbsp;<a style="color:green;">绿波</a>&nbsp;
          <br/>
          <a>鼠</a>&nbsp;<a>牛</a>
          <a>虎</a>&nbsp;<a>兔</a>
          <a>龙</a>&nbsp;<a>蛇</a>
          <br/>
          <a>马</a>&nbsp;<a>羊</a>
          <a>猴</a>&nbsp;<a>鸡</a>
          <a>狗</a>&nbsp;<a>猪</a>
          <br />
          <a>尾0</a>&nbsp;<a>尾1</a>&nbsp;<a>尾2</a>&nbsp;<a>尾3</a>&nbsp;<a>尾4</a>&nbsp;
          <br/>
          <a>尾5</a>&nbsp;<a>尾6</a>&nbsp;<a>尾7</a>&nbsp;<a>尾8</a>&nbsp;<a>尾9</a>&nbsp;
        </div>
      </div>
    </div>
    <div id="Dantuo">
      <div class="l">
        <h3>胆码</h3>

      </div>
      <div class="l">
        <h3>拖码</h3>

      </div>
      <div class="SubmitSend">
        <input name="DantuoCancel" class="no" type="button" value="取消" /><input name="DantuoSend" class="yes"  disabled="disabled" type="button" value="送出" />
        <span id="Warn1"></span>
      </div>
    </div>
    <div id="DantuoC">
      <div class="l">
        <h3>胆码</h3>

      </div>
      <div class="l c">
        <h3>色波</h3>

      </div>
      <div class="SubmitSend">
        <input name="DantuoCCancel" class="no" type="button" value="取消" /><input name="DantuoCSend" class="yes" disabled="disabled" type="button" value="送出" />
        <span id="Warn2"></span>
      </div>
    </div>
    <div id="DantuoSpa">
      <div class="l">
        <h3>胆码</h3>

      </div>
      <div class="l">
        <h3>生肖</h3>

      </div>
      <div class="SubmitSend">
        <input name="DantuoSpaCancel" class="no" type="button" value="取消" /><input name="DantuoSpaSend" class="yes" disabled="disabled" type="button" value="送出" />
        <span id="Warn3"></span>
      </div>
    </div>

  </div>
</form>
';