<?php
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/class/live_info.php");
include_once($C_Patch."/app/member/class/sys_config.php");
//include_once($C_Patch."/live/agid.php");

$user_info = live_info::getUserAndLife($_SESSION["userid"],'AG');
if(!$user_info){
    $sql = "select u.money,u.user_name from user_list u where u.user_id='".$_SESSION["userid"]."' limit 0,1";
    $query	=	$mysqli->query($sql);
    $user_info    =	$query->fetch_array();
}
$user_info_tyc = live_info::getUserAndLife($_SESSION["userid"],'TYC');

$bbinstyle="";
if($bbinid!="")
{
	$user_info_bbin = live_info::getUserAndLife($_SESSION["userid"],'BBIN');
}else
{
	$bbinstyle="style=\"display: none;\"";
}
$min_change_money = sys_config::getMinChangeMoney();
?>

<div id="MACenterContent">
    <div id="MNav">
        <span class="mbtn">额度转换</span>
        <div class="navSeparate"></div>
        <a href="javascript: f_com.MChgPager({method: 'bankSavings'});" class="mbtn">线上存款</a>
        <div class="navSeparate"></div>
        <a href="javascript: f_com.MChgPager({method: 'bankATM'});" class="mbtn">银行汇款</a>
        <div class="navSeparate"></div>
        <a href="javascript: f_com.MChgPager({method: 'bankTake'});" class="mbtn">线上取款</a>
    </div>
    <div id="MMainData" style="margin-top: 8px;">
        <h2 class="MSubTitle">目前额度</h2>
        <table class="MMain" border="1" style="margin-bottom: 8px;">
            <thead>
            <tr>
                <th style="width: 25%;" nowrap>类型</th>
                <th style="width: 25%;" nowrap>帐户</th>
                <th style="width: 25%;" nowrap>余额</th>
                <th style="width: 25%;" nowrap>更新时间</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td width="25%" style="text-align: center;">主账户</td>
                <td width="25%" style="text-align: center;"><?=$user_info["user_name"]?></td>
                <td width="25%" style="text-align: center;"><span id="MBallCredit"><?=$user_info["money"]?></span>&nbsp;&nbsp;</td>
                <td width="25%" style="text-align: center;"><?=date("Y-m-d H:i:s")?></td>
            </tr>
            <tr>
                <td style="text-align: center;">AG娱乐场</td>
				<?php 
					include_once("../live/config.php");
					$sign = md5($plantform."_".$merID."_".$key."_".$username);
				?>
				<?php 
				   $yy = curl_file_get_contents($fenjieHost."/ag!balance.do?plantform=".$plantform."&target=ag&username=".$_SESSION["username"]."&password=".$password."&sign=".$sign);
				   $json = json_decode($yy);
			   ?>
                <td style="text-align: center;"><?=$plantform.$user_info["user_name"]; ?></td>
                <td style="text-align: center;"><span id="MSunplusCredit"><?=sprintf("%.2f",$json->value)?></span>&nbsp;&nbsp;</td>
                <td style="text-align: center;"><?=date ("Y-m-d H:i:s") ?></td>
            </tr>

			<tr >
            <?php 
										   $yy = curl_file_get_contents($fenjieHost."/bb!balance.do?plantform=".$plantform."&target=bb&username=".$_SESSION["username"]."&sign=".$sign);
										   $json = json_decode($yy);
									   ?>
										
                <td style="text-align: center;">BBIN娱乐场</td>
                <td style="text-align: center;">yd<?=$plantform.$user_info["user_name"]; ?></td>
                <td style="text-align: center;"><span id="MSunplusCredit"><?=sprintf("%.2f",$json->value)?></span>&nbsp;&nbsp;</td>
                <td style="text-align: center;"><?=date ("Y-m-d H:i:s") ?></td>
            </tr>
            <tr style="display: none;">
                <td style="text-align: center;">AG VIP厅</td>
                <td style="text-align: center;"><?=$user_info["live_username"]?></td>
                <td style="text-align: center;"><span id="MSunplusCredit"><?=$user_info["live_money"]?></span>&nbsp;&nbsp;</td>
                <td style="text-align: center;"><?=$user_info["update_time"]?></td>
            </tr>
            <tr style="display: none;">
                <td style="text-align: center;">太阳城</td>
                <td style="text-align: center;"><?=$user_info_tyc["live_username"]?></td>
                <td style="text-align: center;"><span id="TYCCredit"><?=$user_info_tyc["normal_money"]?></span>&nbsp;&nbsp;</td>
                <td style="text-align: center;"><?=$user_info_tyc["update_time"]?></td>
            </tr>
            </tbody>
        </table>
        <h2 class="MSubTitle">额度转换</h2>
        <table class="MMain MNoBorder" style="width: auto;">
            <tr>
                <td nowrap>钱包转账：</td>
                <td>
                    <a href="javascript: f_com.MChgPager({method: 'liveHistory'});">查询转账记录</a>
                </td>
            </tr>
            <tr>
                <td nowrap>
                    转账选择：
                </td>
                <td>
                    <select name="zz_type" id="zz_type">
                        <option value="12">主账户->AG娱乐场</option>
                        <option value="22">AG娱乐场->主账户</option>
						<option value="11">主账户->BBIN娱乐场</option>
                        <option value="21">BBIN娱乐场->主账户</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td nowrap>
                    转账金额：
                </td>
                <td>
                    <input type="text" name="zz_money" id="zz_money" onkeyup="if(isNaN(value))execCommand('undo')" /> &nbsp;最低转账金额:<?=$min_change_money?>
                </td>
            </tr>
            <tr>
                <td nowrap></td>
                <td>
                    <input type="button" onclick="confirmChangeMoney()" value="确认转账" />
                </td>
            </tr>
        </table>
    </div>
</div>
<script type="text/javascript">
    function confirmChangeMoney(){
        if(confirm("确定转账吗？")){
            if(!$("#zz_money").val()){
                alert("请输入转账金额。");
                return;
            }
            var regu = /^[-]{0,1}[0-9]{1,}$/;
            if(!regu.test($("#zz_money").val())){
                alert('请输入整数。');
                return;
            }
            if( ($("#zz_money").val()-<?=$min_change_money?><0)){
                alert("小于最低转账金额，请重新输入。");
                return;
            }
            if(($("#zz_type").val()==1 || $("#zz_type").val()==2 || $("#zz_type").val()==5 || $("#zz_type").val()==7) && ($("#MBallCredit").text()-$("#zz_money").val()<0)){
                alert("主账户余额 小于 转账金额，请重新输入。");
                return;
            }
			//url: "/cl/pages/money_change_ajax.php",
            $.ajax({
                type: "POST",
                url: "/live/ed.php",
                data: {
                    zz_money: $("#zz_money").val(),
                    zz_type: $("#zz_type").val()
                }
            }).done(function( msg ) {
                    if(msg=="不允许转账到真人，请联系客服。"
                        || msg=="您尚未加入真人娱乐场,加入条件为:\n充值金额大于100,系统便会自动将您加入真人娱乐场"
                        || msg=="小于最低转账金额，请重新输入。"
                        ){
                        alert(msg);
                        return;
                    }
					alert(msg);
					f_com.MChgPager({method: 'gameSwitch'},{type: 'banktrans'});
                }).fail(function(error){
                    alert(error.responseText);
                });
        }
    }
    var currency = "RMB";
    $('#SubmitForm').click(function() {
        var switch_amount = $('input[name=switch_amount]').val();
        if (currency == 'VND') {
            switch_amount = switch_amount * 1000;
        }
        if(!/^[0-9.]+$/.test(switch_amount) || switch_amount == ''){
            alert("请输入数字!!");
            $('input[name=switch_amount]').val('').focus();
            return false;
        }
        $(this).attr("disabled" , "disabled");
        //$("#page-container").block({message: null});
        $(f_com.__options.blockId).block({
            message: "<div id='MBlockImg'></div>",
            css: {
                "background-color": "transparent",
                border: "none",
                cursor: "default"
            },
            overlayCSS: {
                cursor: "default",
                backgroundColor: f_com.__options.maskColor
            }
        });
        $.ajax({
            type: 'POST',
            url: '?module=MACenterView&method=moneyswitch',
            data: {Amount: switch_amount, from: $("select[name='from'] option:selected").val(), to:$("select[name='to'] option:selected").val()},
            dataType: "json",
            error: function(msg) {
                alert('传输错误，请重整页面');
            },
            success: function(data) {
                $("#MBallCredit").text(data.Balance1||'');
                $("#MSunplusCredit").text(data.Balance4||'');
                $("#MSwitchResult").text(data.result||'');
                $('select[name=from]').html(data.GameKind||'');
                $('select[name=to]').html(data.GameKind2||'');
                $('input[name=switch_amount]').val('');
            },
            complete: function() {
                $('#SubmitForm').removeAttr("disabled");
                $("#page-container").unblock();
                $(f_com.__options.blockId).unblock();
            }
        });
    })
</script>