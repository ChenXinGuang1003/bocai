<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/utils/login_check.php");
include_once($C_Patch."/include/newpage.php");
include_once($C_Patch."/app/member/class/user.php");
include_once($C_Patch."/app/member/cache/bank.php");

?>

    <script language="javascript" type="text/javascript">
        var getId = function(Id){
            return document.getElementById(Id);
        }

        function next_checkNum_img(){
            document.getElementById("checkNum_img").src = "yzm.php?"+Math.random();
            return false;
        }

        //数字验证 过滤非法字符
        function clearNoNum(obj){
            //先把非数字的都替换掉，除了数字和.
            obj.value = obj.value.replace(/[^\d.]/g,"");
            //必须保证第一个为数字而不是.
            obj.value = obj.value.replace(/^\./g,"");
            //保证只有出现一个.而没有多个.
            obj.value = obj.value.replace(/\.{2,}/g,".");
            //保证.只出现一次，而不能出现两次以上
            obj.value = obj.value.replace(".","$#$").replace(/\./g,"").replace("$#$",".");
            if(obj.value != ''){
                var re=/^\d+\.{0,1}\d{0,2}$/;
                if(!re.test(obj.value))
                {
                    obj.value = obj.value.substring(0,obj.value.length-1);
                    return false;
                }
            }
        }

        function showTypeTxt(t){
            if(t==1){
                getId('v_type').style.display='none';
            }else{
                getId('v_type').style.display='';
            }
        }

        function showType(){
            if(getId('InType').value=='0'){
                getId('v_type').style.display='';
                getId('tr_v').style.display='none';
            }else if(getId('InType').value=='网银转账'){
                getId('tr_v').style.display='';
                getId('v_Name').value='请输入持卡人姓名';
                getId('v_type').style.display='none';
                getId('IntoType').value=getId('InType').value;
            }else{
                getId('v_type').style.display='none';
                getId('IntoType').value=getId('InType').value;
                getId('tr_v').style.display='block';
				getId('v_Name').value='请输入持卡人姓名';
            }
        }

        function SubInfo(){
            var hk	=	getId('v_amount').value;
			//var hkxm	=	getId('v_account').value;
            if(hk==''){
                alert('请输入转账金额');
                getId('v_amount').focus();
                return false;
            }else{
                hk = hk*1;
                if(hk<100){
                    alert('转账金额最底为：100元');
                    getId('v_amount').select();
                    return false;
                }
            }
			/*if(hkxm==''){
                alert('请输入银行账户姓名');
                getId('v_account').focus();
                return false;
            }else{
      
            }*/
            if(getId('IntoBank').value==''){
                alert('为了更快确认您的转账,请选择转入银行');
                return false;
            }
            if(getId('cn_date').value==''){
                alert('请选择汇款日期');
                return false;
            }

            if(getId('InType').value==''){
                alert('为了更快确认您的转账,请选择汇款方式');
                return false;
            }
            if(getId('InType').value=='0'){
                if(getId('v_type').value!=''&& getId('v_type').value!='请输入其它汇款方式'){
                    getId('IntoType').value=getId('v_type').value;
                }else{
                    alert('请输入其它汇款方式');
                    return false;
                }
            }
            if(getId('InType').value=='网银转账'){
                if(getId('v_Name').value!=''&& getId('v_Name').value!='请输入持卡人姓名' && getId('v_Name').value.length>1 && getId('v_Name').value.length<20){
                    var tName =getId('v_Name').value;
                    var yy = tName.length;
                    for(var xx=0;xx<yy; xx++){
                        var zz = tName.substring(xx,xx+1);
                        if(zz!='·'){
                            if(!isChinese(zz)){
                                alert('请输入中文持卡人姓名,如有其他疑问,请联系在线客服');
                                return false;
                            }
                        }
                    }
                }else{
                    alert('为了更快确认您的转账,网银转账请输入持卡人姓名');
                    return false;
                }
            }
            if(getId('v_site').value==''){
                alert('请填写汇款地点');
                return false;
            }
            if(getId('v_site').value.length>49){
                alert('汇款地点不要超过50个中文字符');
                return false;
            }
            if(getId('vlcodes').value==''){
                alert('请输入验证码');
                return false;
            }

            $.ajax({
                type: "POST",
                url: "/cl/pages/huikuanDao.php?into=true",
                data:$('#form1').serialize()
            }).done(function( msg ) {
                    if(msg=="chakan_huikuan"){
                        f_com.MChgPager({method:'chakan_huikuan'});
                    }else{
                        alert(msg);
                    }
                }).fail(function(error){
                    alert(error.responseText);
                });
        }

        function alertMsg(i){
            if(i==1){
                alert('阁下,您好:\n您已经成功提交一笔 汇款信息 未处理,请等待处理后再提交新的汇款信息! ');
                LoadValImg();
            }
            if(i==2){
                alert('汇款信息提交成功，请等待处理');
                window.location.href='ScanTrans.aspx';
            }
        }
        //是否是中文
        function isChinese(str){
            return /[\u4E00-\u9FA0]/.test(str);
        }

        function url(u){
            window.location.href=u;
        }
    </script>
    <style type="text/css">
        .dv{ line-height:25px;}
        .body2{
            width: 737px;
            height: auto;
            padding: 10px 0 0 12px;
            margin-left:10px;
            margin-right:10px;
            float:left;
        }
        .tds {
            line-height:25px;
        }
        .STYLE1 {font-weight: bold}
        .STYLE2 {color: #0000FF}
        .STYLE12{ color:#F00}
    </style>


<div id="MACenterContent">
    <div id="MNav">
        <a href="javascript: f_com.MChgPager({method: 'moneyView'});" class="mbtn">额度转换</a>
        <div class="navSeparate"></div>
        <a href="javascript: f_com.MChgPager({method: 'bankSavings'});" class="mbtn">线上存款</a>
        <div class="navSeparate"></div>
        <span class="mbtn">银行汇款</span>
        <div class="navSeparate"></div>
        <a href="javascript: f_com.MChgPager({method: 'bankTake'});" class="mbtn">线上取款</a>
    </div>
    <div id="MMainData" style="margin-top: 8px;">

<div class="body2">
<div style="margin-top:5px;">
<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
<tr>
<td width="100%" height="61" align="left" colspan="3">
<p style="font-size:13px;"><strong>尊敬的会员，您好！</strong></p>
<p style="line-height:22px;">&nbsp;&nbsp;&nbsp;&nbsp;会员可以通过网银转账/银行汇款/ATM转帐等方式充值，请在金额转出之后填写详细的汇款信息进行充值，我们财务部将会根据以下的汇款金额时间标准为您确认添加金额到您的会员账户。<br/>&nbsp;&nbsp;&nbsp;&nbsp;会员汇款时请在金额后面加个尾数(例如：转账金额 1000.66 或 1000.88)，以减少您的等待时间以免导致过投注时间。对于恶意重复提交虚假汇款信息的会员(包括多次出现未存款先提交等)，我们将会进行冻结账号处理，如造成不便，敬请谅解！！！<br />&nbsp;&nbsp;&nbsp;&nbsp;会员存款银行账户信息将会实时更新于此页面，请您在每次存款之前先登录会员账户查询该页面是否有新的存款银行账户信息通知，感谢您的支持和配合！！！</p><br/>
		          <span><br />
                      <span class="STYLE7"><b>汇款转账详细账户资料：</b></span></span><br />
<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <?php
    $sql = "select * from sys_huikuan_list";
    $query	=	$mysqli->query($sql);
    while($row = $query->fetch_array()){
        $rows[] = $row;
    }
    foreach($rows as $k=>$arr){
        ?>
        <tr  onMouseOver="this.style.backgroundColor='#ebebeb'" onMouseOut="this.style.backgroundColor='#FFFFFF'" style="background-color:#FFFFFF;">
            <td width="9%" height="24"><?=$arr['bank_name']?>：</td>
            <td width="23%"><span class="STYLE2"><?=$arr['bank_number']?></span></td>
            <td width="7%">开户名：</td>
            <td width="11%"><span class="STYLE2"><?=$arr['bank_xm']?></span></td>
            <td width="14%">开户行所在城市：</td>
            <td><?=$arr['bank_city']?></td>
        </tr>
    <?php
    }
    ?>
</table>
<div style="padding-top:5px; font-size:12px;">
    <p><strong>温馨提示：</strong></p><br/>
    <p>一、请在金额转出之后务必填写网页下方的汇款信息表格，以便我们财务人员能及时为您确认添加金额到您的会员账户。</p><br/>
    <p>二、本公司最低汇款金额为100元，公司赠送银行汇款产生的手续费给会员（汇款金额2%，无最高上限，按百赠送）。</p>
    <br/>
    <p>三、本公司不支持跨行转账方式进行汇款。</p><br/>
</div>
<hr width="100%" size="1" noshade="noshade"/>

<div style="padding-top:25px;">此存款信息只是您汇款详情的提交，并非代表存款，您需要自己通过ATM或网银转帐到本公司提供的账户后，填写提交此信息，待工作人员审核冲值！</div>
<div style="margin-top:10px;margin:10px 0 10px 0;"><span class="STYLE1"><strong>汇款信息提交</strong></span>&nbsp;&nbsp;&nbsp;<a class="len" onclick="f_com.MChgPager({method: 'chakan_huikuan'});" style="color:#00F;text-decoration: underline;">汇款信息回查</a></div>

<form id="form1" name="form1" action="huikuanDao.php?into=true" method="post">
<table width="720" style="border-collapse:collapse;border:1px solid #CCC;" border="0" cellpadding="1" cellspacing="1" >
<tr>
    <td height="30" align="right"> 用户帐号:</td>
    <td align="left"><span class="STYLE5">
                        &nbsp;&nbsp;&nbsp;<?=$_SESSION['username'];?>
                        </span></td>
</tr>

<tr>
    <td height="30" align="right"><span class="STYLE12">*</span> 存款金额:</td>
    <td align="left">&nbsp;&nbsp;&nbsp;<input name="v_amount" type="text" id="v_amount" style="border:1px solid #CCCCCC;height:18px;line-height:20px; width:118px;" onkeyup="clearNoNum(this);" size="15"/></td>
</tr>
<tr>
    <td height="30" align="right">
        <span class="STYLE12">* </span>汇款银行:</td>
    <td align="left">
        &nbsp;&nbsp;&nbsp;<select id="IntoBank" name="IntoBank" style="width:121px;">
            <option value="" selected="selected">网上银行</option>
            <?php
            foreach($bank[1] as $k=>$arr){
                ?>
                <option value="<?=$arr['card_bankName']?>"><?=$arr['card_bankName']?></option>
            <?php
            }
            ?>
        </select>
        </span> </td>
</tr>
<tr>
    <td height="30" align="right">
        <span class="STYLE12">* </span>汇款日期:</td>
    <td align="left" class="font-black">&nbsp;&nbsp;&nbsp;<input name="cn_date" type="text" id="cn_date"  size="10" maxlength="10" value="<?=date("Y-m-d",time())?>" style="border:1px solid #CCCCCC;height:18px;line-height:20px; width:118px;"/>
        时间：
        <select name="s_h" id="s_h">
            <option value="00">00</option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
        </select>
        时
        <select name="s_i" id="s_i">
            <option value="00">00</option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
            <option value="32">32</option>
            <option value="33">33</option>
            <option value="34">34</option>
            <option value="35">35</option>
            <option value="36">36</option>
            <option value="37">37</option>
            <option value="38">38</option>
            <option value="39">39</option>
            <option value="40">40</option>
            <option value="41">41</option>
            <option value="42">42</option>
            <option value="43">43</option>
            <option value="44">44</option>
            <option value="45">45</option>
            <option value="46">46</option>
            <option value="47">47</option>
            <option value="48">48</option>
            <option value="49">49</option>
            <option value="50">50</option>
            <option value="51">51</option>
            <option value="52">52</option>
            <option value="53">53</option>
            <option value="54">54</option>
            <option value="55">55</option>
            <option value="56">56</option>
            <option value="57">57</option>
            <option value="58">58</option>
            <option value="59">59</option>
        </select>
        分
        <select name="s_s" id="s_s">
            <option value="00">00</option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
            <option value="32">32</option>
            <option value="33">33</option>
            <option value="34">34</option>
            <option value="35">35</option>
            <option value="36">36</option>
            <option value="37">37</option>
            <option value="38">38</option>
            <option value="39">39</option>
            <option value="40">40</option>
            <option value="41">41</option>
            <option value="42">42</option>
            <option value="43">43</option>
            <option value="44">44</option>
            <option value="45">45</option>
            <option value="46">46</option>
            <option value="47">47</option>
            <option value="48">48</option>
            <option value="49">49</option>
            <option value="50">50</option>
            <option value="51">51</option>
            <option value="52">52</option>
            <option value="53">53</option>
            <option value="54">54</option>
            <option value="55">55</option>
            <option value="56">56</option>
            <option value="57">57</option>
            <option value="58">58</option>
            <option value="59">59</option>
        </select>秒</td>
</tr>
<tr>

    <td height="30" align="right">
        <span class="STYLE12">*</span> 汇款方式:</td>
    <td align="left">
                            <span class="STYLE5">
                            &nbsp;&nbsp;&nbsp;<select id="InType" name="InType" onchange="showType();" style="width:121px;">
                                    <option value="">请选择汇款方式</option>
                                    <option value="银行柜台">银行柜台</option>

                                    <option value="ATM现金">ATM现金</option>
                                    <option value="ATM卡转">ATM卡转</option>
                                    <option value="网银转账">网银转账</option>
                                    <option value="0">其它[手动输入]</option>
                                </select>
                            
                            <input id="v_type" name="v_type" type="text" size="19" value="请输入其它汇款方式" onfocus="javascript:getId('v_type').select();" class="font-hhblack" style="border:1px solid #CCCCCC;height:18px;line-height:20px; font-size:12px; display:none;" />
                            <input type="hidden" id="IntoType" name="IntoType" value="" />                        
                      </span></td>
</tr>
<tr id="tr_v" >
    <td height="30" align="right">
        <span class="STYLE12" >*</span>汇款方持卡人姓名:</td>
    <td align="left">&nbsp;&nbsp; <input name="v_Name" type="text" id="v_Name" style="border:1px solid #CCCCCC;height:18px;line-height:20px;margin-left: 6px;" onfocus="javascript:this.select();" size="34" /></td>
</tr>
<tr>
    <td height="30" align="right">
        <span class="STYLE12">*</span> 汇款地点:</td>
    <td align="left"><span style="color: #999999">
                        &nbsp;&nbsp;
                        <input id="v_site" name="v_site" type="text" size="34" style="margin-left: 6px;border:1px solid #CCCCCC;height:18px;line-height:20px;" />
                      <span class="STYLE2" style="color: #333">(您汇款的所在地区)</span></span></td>
</tr>

<tr>

    <td height="35" align="right">
        <span class="STYLE12">* </span>验 证 码:</td>
    <td align="left" valign="middle"><table width="115">
            <tr><td class="STYLE5" style="padding-left:36px;"><input name="vlcodes" type="text" id="vlcodes" size="5" maxlength="4" onfocus="next_checkNum_img()" onkeyup="clearNoNum(this);" style="border:1px solid #CCCCCC;height:18px;line-height:20px; width:61px;"/></td><td>
                    <img src="yzm.php" alt="点击更换" name="checkNum_img" id="checkNum_img" style="cursor:pointer; top:3px;" onclick="next_checkNum_img()" />

                </td></tr></table>                        </td>
</tr>
<tr><td height="35" align="right">&nbsp;</td>
    <td height="40" align="left" valign="middle">
        &nbsp;&nbsp; <input name="SubTran" type="button" class="anniu_02" id="SubTran" onclick="SubInfo();" value="提交信息" />					</td>
</tr>
</table>
</form>
</td>
</tr>

<tr>
    <td height="33" colspan="3" align="center"><table width="96%" border="0" cellpadding="0" cellspacing="5">
            <tr >
                <td align="left" style="padding-top:10px;"><strong class="STYLE1">汇款信息提交说明：</strong></td>
            </tr>
            <tr>

                <td align="left">
                  <span class="font-hblack"><span >
                  <div style=" line-height:22px; font-size:12px;">
                      (1).请按表格填写准确的汇款转账信息,确认提交后相关财务人员会即时为您查询入款情况!                  </div>
                  <div style=" line-height:22px;font-size:12px;">
                      (2).请您在转账金额后面加个尾数,例如:转账金额 1000.66 或 1000.88 等,以便相关财务人员更快确认您的转账金额并充值!                  </div>
                  <div style=" line-height:22px;font-size:12px;">
                      (3).如有任何疑问,您可以联系 在线客服,<?=$web_site['web_name']?>为您提供365天×24小时不间断的友善和专业客户咨询服务!                 </div>
                  </span>                   </span>                  </td>

            </tr>
        </table>

    </td>
</tr>
</table>
</div>
</div>
    </div>
</div>
<script type="text/javascript" language="javascript" src="/js/left_mouse.js"></script>