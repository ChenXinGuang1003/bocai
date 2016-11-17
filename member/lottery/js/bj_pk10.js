var bool = auto_new = false;
var fp=0;
var un=0;
var ball_odds = cl_hao = cl_dx = cl_ds = cl_zhdx = cl_zhds = cl_lh ='';
var is_fenpan = true;
var min_money = 1;
var max_money = 99999999;
//限制只能输入1-9纯数字 
function digitOnly ($this) {
	var n = $($this);
	var r = /^\+?[1-9][0-9]*$/;
	if (!r.test(n.val())) {
		n.val("");
	}
}
function reset(){
    document.orders.reset();
}
function updateOpenTime(){
    $.post("class/odds_pk10.php", function(data){
        if(data.isopen>0 && ((data.opentime>40 && data.opentime<240) || (data.opentime>20 && data.opentime<30))){
            clearTimeout(fp);
            endtime(data.opentime);
            $("#open_qihao").html(data.number);
        }
    }, "json");
}
//盘口信息
function loadinfo(){
	$.post("class/odds_pk10.php", function(data)
		{
			if(data.opentime>0){
                is_fenpan = false;
                if(!data.isopen){
                    is_fenpan = true;
                }
				$("#open_qihao").html(data.number);
				ball_odds = data.oddslist;
				loadodds(data.oddslist);
				endtime(data.opentime);
				auto(1);
                min_money = data.min_money;
                max_money = data.max_money;
                if(un!=0){
                    clearInterval(un);
                }
                un = setInterval(updateOpenTime,10000);
                hm_odds(1);
            }else{
                is_fenpan = true;
				$(".bian_td_odds").html("-");
				$(".bian_td_inp").html("封盘");
				$("#autoinfo").html("已经封盘，请稍后进行投注！");
				$.jBox.alert('当前彩票已经封盘，请稍后再进行下注！<br><br>北京PK拾开盘时间为：09:02 - 23:57', '提示');
				return false;
	
			}
		}, "json");
}
//更新赔率
function loadodds(oddslist){
	if (oddslist == null || oddslist == "" || is_fenpan) {
			$(".bian_td_odds").html("-");
			$(".bian_td_inp").html("封盘");
			return false;
	}
	for(var i = 1; i<12; i++){
		if(i==11){
			for(var s = 1; s<22; s++){
				odds = oddslist.ball[i][s];
				$("#ball_"+i+"_h"+s).html(odds);
				loadinput(i, s);
			}
		}else if(i==1){
			for(var s = 1; s<17; s++){
				odds = oddslist.ball[i][s];
				$("#ball_"+i+"_h"+s).html(odds);
				loadinput(i , s);
			}
		}else if(i<6){
			for(var s = 15; s<17; s++){
				odds = oddslist.ball[i][s];
				$("#ball_"+i+"_h"+s).html(odds);
				loadinputs(i , s);
			}
		}
	} 
	
}
//号码赔率
function hm_odds(ball){
	if (ball_odds == null || ball_odds == "" || is_fenpan) {
			$(".bian_td_odds").html("-");
			$(".bian_td_inp").html("封盘");
			return false;
	}
	for(var s = 1; s<15; s++){
		odds = ball_odds.ball[ball][s];
		$("#ball_1_h"+s).html(odds);
		loadinput(ball , s);
	} 
	for( var i = 0; i < 10; i++){
		if(i == ball-1){
		$('#menu_hm > li').eq(i).removeClass("current_n").addClass("current");
		}else{
		$('#menu_hm > li').eq(i).removeClass("current").addClass("current_n");
		}
	}
	
}
//更新投注框
function loadinput(ball , s){
	b = "ball_"+ball+"_"+s;
	n = "<input name=\""+b+"\" id=\""+b+"\" class=\"inp1\" onkeyup=\"digitOnly(this)\" onfocus=\"this.className='inp1m'\" onblur=\"this.className='inp1';\" type=\"text\" maxLength=\"5\"/>"
	if(ball<11){
		$("#ball_1_t"+s).html(n);
	}else if(ball==11){
		$("#ball_"+ball+"_t"+s).html(n);
	}
}
function loadinputs(ball , s){
	b = "ball_"+ball+"_"+s;
	n = "<input name=\""+b+"\" id=\""+b+"\" class=\"inp1\" onkeyup=\"digitOnly(this)\" onfocus=\"this.className='inp1m'\" onblur=\"this.className='inp1';\" type=\"text\" maxLength=\"5\"/>"
	$("#ball_"+ball+"_t"+s).html(n);
}
//封盘时间
function endtime(iTime)
{
	var iMinute,iSecond;
    var sMinute="",sSecond="",sTime="";
    iMinute = parseInt((iTime/60)%60);
	if (iMinute == 0){
		sMinute = "00";
    }
    if (iMinute > 0 && iMinute < 10){
    	sMinute = "0" + iMinute;
    }
	if (iMinute > 10){
    	sMinute = iMinute.toString();
    }
    iSecond = parseInt(iTime%60);
    if (iSecond >= 0 && iSecond < 10 ){
    	sSecond = "0" + iSecond;
    }
	if (iSecond >= 10 ){
    	sSecond =iSecond.toString();
    }
    sTime= sMinute + sSecond;
    if(iTime==0){
		$("#look").html('<embed width="0" height="0" src="js/2.swf" type="application/x-shockwave-flash" hidden="true" />');
		var xnumbers = parseInt($("#numbers").html());
		//var numinfo= xnumbers+1+'正在开奖...';
		var numinfo= '<span>正在开奖...</span>';
		$("#autoinfo").html(numinfo);
		var i=0;
		$('.kick').each(function(){
			var e=$(this).children('img');
			e.prop('src','images/open_3/x.png');
			i++;
		});
    }
	if(iTime==30){
		$(".bian_td_odds").html("-");
		$(".bian_td_inp").html("封盘");
		$("#look").html('<embed width="0" height="0" src="js/1.swf" type="application/x-shockwave-flash" hidden="true" />');
        is_fenpan = true;
    }
	if(iTime<0){
		clearTimeout(fp);
		loadinfo();
    }else
    {
		iTime--;
		var t = 'time';
		if(iTime<30){
            is_fenpan = true;
			t = 'times';
		}
		$("#sss").html(iTime);
		$('.colon > img').attr('src','images/'+t+'/10.png');
		$('.minute > span > img').eq(0).attr('src','images/'+t+'/'+sTime.substr(0,1)+'.png');
		$('.minute > span > img').eq(1).attr('src','images/'+t+'/'+sTime.substr(1,1)+'.png');
		$('.second > span > img').eq(0).attr('src','images/'+t+'/'+sTime.substr(2,1)+'.png');
		$('.second > span > img').eq(1).attr('src','images/'+t+'/'+sTime.substr(3,1)+'.png');
		fp = setTimeout("endtime("+iTime+")",1000);
    }
}
//更新开奖号码
function auto(ball){
	$.post("class/auto_pk10.php", {ball : ball}, function(data)
		{
			$("#numbers").html(data.numbers);
			var openqihao = $("#open_qihao").html();
			if(auto_new == false || openqihao - data.numbers == 1){
				var numinfo='';
				numinfo = numinfo+'冠亚军和：<span>'+data.hms[0]+'</span><span>'+data.hms[1]+'</span><span>'+data.hms[2]+'</span>1V10龙虎：<span>'+data.hms[3]+'</span>2V9龙虎：<span>'+data.hms[4]+'</span>3V8龙虎：<span>'+data.hms[5]+'</span>4V7龙虎：<span>'+data.hms[6]+'</span>5V6龙虎：<span>'+data.hms[7]+'</span>';
				$("#autoinfo").html(numinfo);
				var i=0;
				var fun=8;
				$('.kick').each(function(){
					var e=$(this).children('img');
					var nu=data.hm[i];
					setTimeout(function(){e.prop('src','images/open_3/'+nu+'.png');},fun*600);
					i++;
					fun--;
				});
				auto_new = true;
				if(openqihao - data.numbers != 1){xhm = setTimeout("auto(1)",3000);}
			}else{
				xhm = setTimeout("auto(1)",3000);
			}
			var auto_top = '<table width="100%" border="0" cellspacing="1" cellpadding="0" class="clbian"><tr class="clbian_tr_title"><td colspan="2">开奖结果</td></tr><tr class="clbian_tr_title"><td>开奖期数</td><td>开奖号码</td></tr>';
				for (var key in data.hmlist){
					auto_top = auto_top+'<tr class="clbian_tr_txt"><td class="qihao">'+key+'</td><td class="haoma">'+data.hmlist[key]+'</td></tr>'
				}
			auto_top = auto_top+'</table>'
			//$("#auto_list").html(auto_top);
			//$(parent.leftFrame.document).find("#auto_list").html(auto_top);
		}, "json");
}
//投注提交
function order(){
    if($(window.parent.frames["topFrame"].document).find("#user_money").length>0 && $(window.parent.frames["topFrame"].document).find("#user_money").html()=="" || $(window.parent.frames["topFrame"].document).find("#username").length!=0){
        alert("您还未登录，请先登录再投注。");
        return;
    }

	var tt = $("input.inp1");
	var mix = min_money; cou = m = 0, txt = '', c=true;
    var max_true = true;
	for (var i = 1; i < 12; i++){
		if(i==11){
			for(var s = 1; s < 22; s++){
				if ($("#ball_" + i + "_" + s).val() != "" && $("#ball_" + i + "_" + s).val() != null) {
					//判断最小下注金额
                    if (parseInt($("#ball_" + i + "_" + s).val()) < min_money) {
                        alert("该彩票有单注最低金额："+min_money);
                        return;
                    }
                    if (parseInt($("#ball_" + i + "_" + s).val()) > max_money) {
                        alert("该彩票有单注最高金额："+max_money);
                        return;
                    }
					m = m + parseInt($("#ball_" + i + "_" + s).val());
					//获取投注项，赔率
					var odds = $("#ball_"+i+"_h" + s).html();
					var q = did(i);
					var w = wan9(s);
					txt = txt + q + '[' + w +'] @ ' + odds + ' x ' + parseInt($("#ball_" + i + "_" + s).val()) + '\n';
					cou++;
				}
			}
		}else{
			for(var s = 1; s < 17; s++){
				if ($("#ball_" + i + "_" + s).val() != "" && $("#ball_" + i + "_" + s).val() != null) {
					//判断最小下注金额
                    if (parseInt($("#ball_" + i + "_" + s).val()) < min_money) {
                        alert("该彩票有单注最低金额："+min_money);
                        return;
                    }
                    if (parseInt($("#ball_" + i + "_" + s).val()) > max_money) {
                        alert("该彩票有单注最高金额："+max_money);
                        return;
                    }
					m = m + parseInt($("#ball_" + i + "_" + s).val());
					//获取投注项，赔率
					var odds = $("#ball_1_h" + s).html();
					var q = did(i);
					var w = wan(s);
					txt = txt + q + '[' + w +'] @ ' + odds + ' x ' + parseInt($("#ball_" + i + "_" + s).val()) + '\n';
					cou++;
				}
			}
		}
	}
//	if (!c) {$.jBox.tip("最低下注金额："+mix+"");return false;}
	if (cou <= 0) {$.jBox.tip("请输入下注金额!!!");return false;}
	var t = "共 ￥"+m+" / "+cou+" 笔，确定下注吗？\n\n下注明细如下：\n\n";
	txt = t + txt;
	var ok = confirm(txt);
    if (ok){
        document.orders.submit();
        document.orders.reset();
    }
}
//读取第几球
function did (type)
{
	var r = '';
	switch (type)
	{
		case 1 : r = '冠军'; break;
		case 2 : r = '亚军'; break;
		case 3 : r = '第三名'; break;
		case 4 : r = '第四名'; break;
		case 5 : r = '第五名'; break;
		case 6 : r = '第六名'; break;
		case 7 : r = '第七名'; break;
		case 8 : r = '第八名'; break;
		case 9 : r = '第九名'; break;
		case 10 : r = '第十名'; break;
		case 11 : r = '冠亚军和'; break;
	}
	return r;
}
//读取玩法
function wan (type)
{
	var r = '';
	switch (type)
	{
		case 1 : r = '一号车'; break;
		case 2 : r = '二号车'; break;
		case 3 : r = '三号车'; break;
		case 4 : r = '四号车'; break;
		case 5 : r = '五号车'; break;
		case 6 : r = '六号车'; break;
		case 7 : r = '七号车'; break;
		case 8 : r = '八号车'; break;
		case 9 : r = '九号车'; break;
		case 10 : r = '十号车'; break;
		case 11 : r = '大'; break;
		case 12 : r = '小'; break;
		case 13 : r = '单'; break;
		case 14 : r = '双'; break;
		case 15 : r = '龙'; break;
		case 16 : r = '虎'; break;
	}
	return r;
}
//读取玩法
function wan9 (type)
{
	var r = '';
	switch (type)
	{
		case 1 : r = '3'; break;
		case 2 : r = '4'; break;
		case 3 : r = '5'; break;
		case 4 : r = '6'; break;
		case 5 : r = '7'; break;
		case 6 : r = '8'; break;
		case 7 : r = '9'; break;
		case 8 : r = '10'; break;
		case 9 : r = '11'; break;
		case 10 : r = '12'; break;
		case 11 : r = '13'; break;
		case 12 : r = '14'; break;
		case 13 : r = '15'; break;
		case 14 : r = '16'; break;
		case 15 : r = '17'; break;
		case 16 : r = '18'; break;
		case 17 : r = '19'; break;
		case 18 : r = '大'; break;
		case 19 : r = '小'; break;
		case 20 : r = '单'; break;
		case 21 : r = '双'; break;
	}
	return r;
}