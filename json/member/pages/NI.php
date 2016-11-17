<?php


echo '
<form name="lt_form" method="post" action="/member/lt_ni/lt_ni_order.php" target="_top" onsubmit="return false" class="Aside">
<input type="hidden" name="gid" id="gid" value="366634" />
<div id="showTable">
<!--多选不中类别-->
<div class="round-table">
<table id="table1" style="bakcground-color:white;" class="MobileTable">
  <tr class="title_tr">
    <td>类别</td>
    <td nowrap="nowrap"><label class="padding_label"><input name="rtype" type="radio" value="NI5" />五不中</label></td>
    <td nowrap="nowrap"><label class="padding_label"><input name="rtype" type="radio" value="NI6" />六不中</label></td>
    <td nowrap="nowrap"><label class="padding_label"><input name="rtype" type="radio" value="NI7" />七不中</label></td>
    <td nowrap="nowrap"><label class="padding_label"><input name="rtype" type="radio" value="NI8" />八不中</label></td>
    <td nowrap="nowrap"><label class="padding_label"><input name="rtype" type="radio" value="NI9" />九不中</label></td>
    <td nowrap="nowrap"><label class="padding_label"><input name="rtype" type="radio" value="NIA" />十不中</label></td>
    <td nowrap="nowrap"><label class="padding_label"><input name="rtype" type="radio" value="NIB" />十一不中</label></td>
    <td nowrap="nowrap"><label class="padding_label"><input name="rtype" type="radio" value="NIC" />十二不中</label></td>
  </tr>
  <tr style="text-align:center;">
    <td>赔率</td>
    <td><span style="color:red;font-weight:bold">'.$odds_NI["h1"].'</span></td>
    <td><span style="color:red;font-weight:bold">'.$odds_NI["h2"].'</span></td>
    <td><span style="color:red;font-weight:bold">'.$odds_NI["h3"].'</span></td>
    <td><span style="color:red;font-weight:bold">'.$odds_NI["h4"].'</span></td>
    <td><span style="color:red;font-weight:bold">'.$odds_NI["h5"].'</span></td>
    <td><span style="color:red;font-weight:bold">'.$odds_NI["h6"].'</span></td>
    <td><span style="color:red;font-weight:bold">'.$odds_NI["h7"].'</span></td>
    <td><span style="color:red;font-weight:bold">'.$odds_NI["h8"].'</span></td>
  </tr>
</table>
</div>
<!--多选不中table-->
<div class="round-table">
<table id="table2" style="text-align:center;">
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
      <input type="button" class="no_min" name="btnReset" value="取消" style="padding:0px;"/>
      <input type="button" class="yes_min" name="btnSubmit" value="确定" style="padding:0px;" />
    </td>
  </tr>
</table>
</div>
</div>
</form>
';