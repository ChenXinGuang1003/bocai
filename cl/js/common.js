//共用方法
var CACHE_ID = {};

//＊需統一格式
var G_TMP = {};
var IMG = {};
var RoundSerial = '';
var RoundID = '';
var f_w = {};
var DispDetail = {};
var GameEndTime = {};
//var OddInfo = {};
var LimitInfo = {};
//賠率時間
var CATCH_ODD = {};
//common method object
var f_com = {};
/**
 *  get object or array length
 *  return @int
 */
f_com.count = function(o){
    var num = 0;
    if(typeof(o)=='object'){
        for(var i in o)
            num++;

        return num;
    }else{
        return o.length;
    }
};
/**
 * 使用者額度
 * return@ {Amount:'',round:'',gid:''}
 */
f_com.Detail = function(callback){
    if($.isFunction(callback))
        return $.ajax({
            type:'POST',
            url:'?module=MGetData&method=GetMemDispDetail',
            data:{
                GameType:GameType
            },
            async:false,
            cache:false,
            dataType:'json',
            success:callback
        });
};

/**
 *  珠仔....顯示
 *  (限制,寬,高,method(data))
 */
f_com.Result = function(limit ,col ,row, funName ,callback){
    $.ajax({
        type:'POST',
        url:'?module=MResultPattern&method='+funName,
        data:{
            limit:limit,
            col:col,
            row:row,
            GameType:GameType
        },
        dataType:'json',
        cache:false,
        error:function(){
            return false;
        },
        success:callback
    });
};

/**
 * get odd json data
 * method(string||array)
 * @example (['C','L1'])
 */
f_com.odd = function(P_Type , callback){
    var TIME;
    //array
    if(typeof P_Type == 'object'){
        TIME = [];
        for(var i=0 ; i < P_Type.length ; i++)
            //var key = P_Type[i];
            TIME.push(CATCH_ODD[P_Type[i]+'_TIME'] || '');
        //string
    }else{
        TIME = CATCH_ODD[P_Type+'_TIME'] || '';
    }
    var ager = {
        'RoundID':RoundID,
        'GameType':GameType,
        'Type':P_Type,
        'TIME':TIME
    };
    $.ajax({
        type:'POST',
        url :'?module=MGetData&method=GetMemOddInfo',
        data:f_com.postArray(ager),
        cache:false,
        async:false,
        dataType:'json',
        success:callback
    });
};

/**
 * get Quotea value json
 * method(string||array)
 * @example function(['c','x']);
 */
f_com.Quota = function(P_Type){
    try{
        var ager = {
            'RoundID':RoundID,
            'GameType':GameType,
            'Type':P_Type
        };
        $.ajax({
            type:'POST',
            url :'index.php?module=MGetData&method=GetMemLimitInfo',
            data:f_com.postArray(ager),
            cache:false,
            async:false,
            dataType:'json',
            error:function(msg){
                alert("限额资料错误，请重新整理页面");
            },
            success:function(data){
                LimitInfo = data.LimitInfo;
                /*
                 for(var key in data)
                 G_Quota[key] = data[key];
                 */
            }
        });
    }catch(e){
        return false;
    }
};

//get odd,quota,time
//funciton([GetMemLimitInfo, GetMemGameEndTime,GetMemOddInfo],[C1,C2,C3])
//(method,data) array,string
//callback > success method;
f_com.Get = function(method , data , callback , errorCallback){
    var TIME = [];
    //array
    if(typeof data == 'object'){
        for(var i=0 ; i < data.length ; i++)
            //var key = P_Type[i];
            TIME.push(CATCH_ODD[data[i]+'_TIME'] || '');
        //string
    }else{
        TIME = CATCH_ODD[data+'_TIME'] || '';
    }


    var ager = {
        'GameType':GameType,
        'Type':data,
        'FunctionRequest':method,
        'TIME':TIME
    };
    $.ajax({
        type:'POST',
        url :'?module=MGetData&method=GetRequestData',
        data:f_com.postArray(ager),
        cache:false,
        async:false,
        dataType:'json',
        error:errorCallback||function(){
            return;
        },
        success:callback
    });

};

f_com.Update = function(method , data , callback , errorCallback){
    var TIME = [];
    //array
    if(typeof data == 'object'){
        for(var i=0 ; i < data.length ; i++){
            TIME.push(CATCH_ODD[data[i]+'_TIME'] || '');
        }
    }else{
        TIME = CATCH_ODD[data+'_TIME'] || '';
    }

    $.ajax({
        type:'POST',
        url :'?module=MGetData&method=GetRequestData',
        data:f_com.postArray({
            'GameType':GameType,
            'Type':data,
            'FunctionRequest':method,
            'TIME':TIME
        }),
        dataType:'json',
        error:errorCallback||function(){
            void 0;
        },
        success:callback
    });
};

// post array
f_com.postArray = function(o){
    var option = [];
    for(var key in o){
        if(typeof o[key] == 'array'||typeof o[key] =='object'){
            for(var i=0 ; i<o[key].length ; i++){
                option.push({
                    name:key+'[]',
                    value:o[key][i]
                });
            }
        }else if(typeof o[key] == 'string'||typeof o[key] == 'number'){
            option.push({
                name:key,
                value:o[key]
            });
        }
    }
    return option;
};

// delete object last value
// example: pop({a:1,b:2})
// result : return b;
f_com.pop = function(o){
    var j = f_com.count(o);

    $.each(o,function(i,v){
        alert(k);
        if(j == k)delete v;

        k++;
    });
};

// time reciprocal json
// {NOW_TPI,NOW_EST_S,END_EST_S,END_HK,NOW_EST}
f_com.TIME = function(callback){
    $.ajax({
        type:'POST',
        cache:false,
        url:'?module=MGetData&method=GetMemGameEndTime',
        data:{
            'RoundID':RoundID
        },
        dataType:'json',
        success:callback
    });
};

/* @example
 * $.timer(1000, function (timer) {
 * 	alert("hello");
 * 	timer.stop();
 * });
 * @desc Show an alert box after 1 second and stop
 *
 * @example
 * var second = false;
 *	$.timer(1000, function (timer) {
 *		if (!second) {
 *			alert('First time!');
 *			second = true;
 *			timer.reset(3000);
 *		}
 *		else {
 *			alert('Second time');
 *			timer.stop();
 *		}
 *	 });
 */
f_com.Ti = function(interval,callback){
    interval = interval || 1000;

    if (!callback)return false;

    var _timer = function (interval, callback) {
        var self = this;
        if(self.id != null) clearInterval(self.id);

        this.stop = function () {
            clearInterval(self.id);
        };
        this.internalCallback = function () {
            callback(self);
        };
        this.reset = function (val) {
            if (self.id) clearInterval(self.id);
            self.id = setInterval(this.internalCallback, val || 1000);
            self.interval = val;
        };
        this.interval = interval;
        this.id = setInterval(this.internalCallback, this.interval);
    };
    return new _timer(interval, callback);
};

// getElementById() cache
// return jquery object or jquery[0] == getElementById();
f_com.cache = function(id){

    if (CACHE_ID[id] === void 0) CACHE_ID[id] = $('#'+id);

    return CACHE_ID[id];
};

f_com.setCookie = function(theName,theValue,theDay){
    if((theName != "")&&(theValue !="")){
        expDay = "Web,01 Jan 2020 18:56:35 GMT";
        if(theDay != null){
            theDay = eval(theDay);
            setDay = new Date();
            setDay.setTime(setDay.getTime()+(theDay*1000*60*60*24));
            expDay = setDay.toGMTString();
        }
        //document.cookie = theName+"="+escape(theValue)+";expires="+expDay;
        document.cookie = theName+"="+escape(theValue)+";path=/;expires="+expDay+";";
        return true;
    }
    return false;
};
f_com.delCookie = function(theName){
    document.cookie = theName+ "=;expires=Thu,01-Jan-70 00:00:01 GMT";
    return true;
};
f_com.getCookie = function(theName){
    theName += "=";
    theCookie = document.cookie+";";
    start = theCookie.indexOf(theName);
    if(start != -1){
        end = theCookie.indexOf(";",start);
        return unescape(theCookie.substring(start+theName.length,end));
    }
    return false;
};

f_com.checkOs = function() {
    windows = (navigator.userAgent.indexOf("Windows",0) != -1)?1:0;
    mac = (navigator.userAgent.indexOf("Mac",0) != -1)?1:0;
    linux = (navigator.userAgent.indexOf("Linux",0) != -1)?1:0;
    unix = (navigator.userAgent.indexOf("X11",0) != -1)?1:0;

    if (windows) os_type = "windows";
    else if (mac) os_type = "mac";
    else if (linux) os_type = "lunix";
    else if (unix) os_type = "unix";

    return os_type;
}

f_com.bet = function(callback , errorCallback){
    o = (w_json.constructor == Object) ? JSON.stringify(w_json) : w_json;

    $.ajax({
        type:'POST',
        url :'?module=Bet&method=DoBet',
        processData:false,
        data:'result='+o,
        error:$.isFunction(errorCallback)?errorCallback:function(msg){
            return false;
        },
        success:callback
    });
};

// correct return true ,fail return false;
f_com.isGold = function(v){
    var RegExps = {};
    RegExps.isNumber = /^[-\+]?\d+$/;
    if (RegExps['isNumber'].test(v))
        return true;

    return false;
};

//電子遊藝載入unity物件
$(window).load(function(){
    var pageSite = f_com.getCookie('page_site');

    if( pageSite && ( pageSite.toLowerCase() == 'game' || pageSite.toLowerCase() =='game3dfight') ) {
        var unityObjectUrl = "/cl/js/game/UnityObject.js";
        var scriptTag = document.createElement("script");
        scriptTag.type = "text/javascript";
        scriptTag.src = unityObjectUrl;
        document.getElementsByTagName('head')[0].appendChild(scriptTag);
    }
});
//bm window.open 遊戲方法
f_com.bm = function(url , n , o){
    var conf = {
        width:'1024',
        height:'768',
        scrollbars:'yes',
        resizable:'no',
        status : 'no',
        location:'yes',
        toolbar:'no',
        menubar:'no'
    },_tmp = [];
    if(o == undefined) o = {};

    // 特例:如為電子遊藝-玉蒲團的搶先看 則設定寬高
    if (/(PriorityWatch)/.test(url)) {
        o = {
            'width'  : '1000',
            'height' : '700',
            'scrollbars' : 'no'
        };
    }

    //3D廳下載unity特例
    if (/games\/(6|2)\?/ig.test(url)) {
        if(!document.getElementById('unityPlayer')) {
            $("body").append('<div style="position:relative;width:0px;height:0px;overflow:hidden;"><div id="unityPlayer"></div>');
        }
        var pageLang = f_com.getCookie("lang");
        var lang = (($.inArray( pageLang , ['zh-tw', 'zh-cn', 'en']) != -1) ? pageLang: 'zh-cn');
        var agent = (f_com.checkOs() == 'mac' ? f_com.checkOs() : 'windows');

        if (typeof unityObject != "undefined") {
            unityObject.embedUnity("unityPlayer", "/cl/tpl/commonFile/swf/TestUnity.unity3d", '0px', '0px', null, null, function(result){
                if (!result.success) {
                    url = 'http://portal.dddgaming.com/docs/help/unity/'+agent+'/' + lang + '/default_' + lang + '.html';
                }
            });
        }
        openWindow();
    }

    // 特例:如為真人娛樂-BB3D開啟遊戲 則以location的方式連結
    if (/(LiveBB3D|LiveBBK8)/.test(url)) {
        self.location = url;
    } else {
        openWindow();
    }
    function openWindow() {
        for (var k in conf) {
            _tmp.push(k + '=' + ((o[k] == undefined) ? conf[k] : o[k]));
        }
        window.open(url, n, _tmp.join(','));
    }
};

/**
 * type => #id , _self,_bank , -
 */
f_com.getPager = function(type , mo , me){
    var HID = '#page-content';

    if(type.charAt(0) == '#'){
        HID = type;
    }else if(type.charAt(0)== "_"){
        if(type=='_bank'){
            window.open(mo,null);
        }else if(type=='_self'){
            location.href = mo;
        }
    }else if(type.charAt(0) =="-"){
        top.mem_index.location.href = '/cl/?module=System&method='+mo+'&other='+me;
    }else{
        if($(HID).length == 1){
            var str = f_com.getCookie('page_site');
            if(str.toLowerCase() == 'first' &&  $("#S-Menual").is(':hidden')){
                $("#S-Menual").show('fast');
            }
            $.ajax({
                type:'POST',
                url:'?module='+type+'&method='+mo,
                success:function(o){
                    $(HID).html(o);
                }
            });
        }else{
            top.mem_index.location.href = '/cl/?module=System&method='+type+'&other='+mo;
        }
    }

};

//電子遊藝專用
f_com.getGamePager = function(type, me, id, gameIndex){
    gameIndex = parseInt(gameIndex);
    var Index3d = [0, 6, 34];
    var bbJp = $(".bb-jp-element");
    if(type.charAt(0) == '-'){
        top.mem_index.location.href = '/cl/?module=System&method='+me+'&gameIndex='+gameIndex;
    }else{
        $("div[id^='"+id+"-']").hide();
        $("div#"+id+"-"+gameIndex).show();
        if($("h3[id^='#"+id+"-']")){
            $("h3[id^='#"+id+"-']").next("ul").hide();
            $("h3[id^='#"+id+"-"+gameIndex+"']").next("ul").show();
        }
        if($.inArray(gameIndex, Index3d) != -1) {
            bbJp.css("display", "none");
        } else {
            bbJp.css("display", "block");
        }
    }
};

//彩票頁專用
f_com.getLotteryPager = function(type, me, id, gameIndex) {
    if (type.charAt(0) == '-' || GameType != '') {
        top.mem_index.location.href = '/cl/?module=System&method=Lottery&L_GameType=Intro&gameIndex=' + gameIndex;
    } else {
        $("div[id^='" + id + "-']").hide();
        $("div#" + id + "-" + gameIndex).show();
    }
};

//Logoff
f_com.logoff = function(loc){
    $.ajax({
        type:'POST',
        url : loc,
        data : {
            uid : f_com.getCookie('SESSION_ID')
        },
        cache:false,
        async:false,
        success:function(data){
            // for IE6
            $('#LogOff').parent('a').add('a#LogOff').prop('href','#');
            $('head').append(data);
        }
    });
};


$.fn.btn = function( color , color2){
    var that = this;
    $.each(that.find('li > a') , function(){
        var Mid = this.parentNode.id;
        if(Mid.split('-')[1] != f_com.getCookie('selected_page')){
            document.getElementById(Mid).style.backgroundPosition = 'top';
            $('#'+Mid).find('a').css('color',color);
        }else{
            f_com.setCookie('selected_page',Mid.split('-')[1]);
            document.getElementById(Mid).style.backgroundPosition = 'bottom';
            $('#'+Mid).find('a').css('color',color2);
        }
    }).click(function(){
            var Mid = this.parentNode.id;
            that.find('li').each(function(){
                document.getElementById(this.id).style.backgroundPosition = 'top';
                $('#'+this.id).find('a').css('color',color);
            });
            document.getElementById(Mid).style.backgroundPosition = 'bottom';
            $('#'+Mid).find('a').css('color',color2);
            f_com.setCookie('selected_page',Mid.split('-')[1]);
        });
};

$.fn.accordion = function(){
    var self = this;
    $.each(self.find('div'),function(i){
        if(i==0){
            $(this).find('ul').show();
            $($(this).find('H3').attr('id')).show();
        }else{
            $($(this).find('H3').attr('id')).hide();
        }
        $(this).find('H3').click(function(){
            if(!$(this).next('ul').is(':visible')){
                $.each( self.find('div'),function(){
                    $(this).find('ul').hide();
                    $($(this).find('H3').attr('id')).hide();
                });
                $(this).next('ul').show();
                $(this.id).show();
            }
        });
    });

};
/**
 * <h3></h3>
 * <ul>
 *   <li></li>
 * </ul>
 */
$.fn.accordion2 = function(){
    var self = this;
    $.each(self.find('h3'),function(i){
        if(i==0){
            $(this).next('ul').show();
        }
        $(this).click(function(){
            $.each(self.find('h3'),function(){
                $(this).next('ul').hide();
            });
            $(this).next('ul').show();
        });
    });
};
/**
 *  簡易tab切換
 *  <div id="test">
 *  <ul><li>aa</li><li id="#bb">bb</li></ul>
 *  <div id="aa">xxx</div>
 *  </div>
 *  $('#test').mtab();
 */
$.fn.mtab = function(){
    var area = this;

    area.find('li[id^=#]').click(function(){
        var self = this;
        $.each(area.find('li[id^=#]'),function(i){
            if(self.id != this.id){
                area.find(this.id).hide('fast');
                $(this).removeClass('mtab');
            }else{
                area.find(this.id).show('fast');
                $(this).addClass('mtab');
            }
        });
    });
};
/**
 *  無動畫切換
 */
$.fn.mtab2 = function(){
    var area = this;
    $.each(area.find('li[id^=#]'),function(i){
        if(i!=0){
            area.find(this.id)[0].style.display = 'none';
        }
    });
    area.find('li[id^=#]').click(function(){
        var self = this;
        $.each(area.find('li[id^=#]'),function(i){
            if(self.id != this.id){
                area.find(this.id)[0].style.display = 'none';
                $(this)[0].style.backgroundPosition = 'top';
                $(this).removeClass('mtab');
            }else{
                area.find(this.id)[0].style.display = 'block';
                $(this)[0].style.backgroundPosition = 'bottom';
                $(this).addClass('mtab');
            }
        });
    });
};
/**
 *  無動畫切換、底圖位置不動
 */
$.fn.mtab3 = function(){
    var area = this;

    area.find('li[id^=#]').click(function(){
        var self = this;
        $.each(area.find('li[id^=#]'),function(i){
            if(self.id != this.id){
                area.find(this.id)[0].style.display = 'none';
                $(this).removeClass('mtab');
            }else{
                area.find(this.id)[0].style.display = 'block';
                $(this).addClass('mtab');
            }
        });
    });
};

/**
 * mtab4
 *
 * fix union hierarchy for fixed ancestor
 */
(function($) {
    $.fn.mtab4 = function() {
        //iterate the match elements
        return this.each(function() {
            var $this = $(this);
            //initialize, hide children div except first one
            var divs = $this.children('div');
            divs.not(':first').hide();

            //bind click to switch tabs
            var lis = $this.children('ul').children('li');
            lis.click(function(e){
                var element = $(this),
                    position = $.inArray(element[0], lis);

                //add & remove class for tabs
                lis.removeClass('mtab');
                element.addClass('mtab');

                //hide & show for container
                divs.not(':eq(' + position + ')').hide();
                divs.eq(position).show();

            });
        });
    };
})(jQuery);
$.fn.idTabs = function(){
    var s = {
        start:0,
        change:false,
        click:null,
        selected:".selected",
        event:"!click"
    };

    for(var i=0; i<arguments.length; ++i) {
        var a = arguments[i];
        switch(a.constructor){
            case Object:
                break;
            case Boolean:
                s.change = a;
                break;
            case Number:
                s.start = a;
                break;
            case Function:
                s.click = a;
                break;
            case String:
                if(a.charAt(0)=='.') s.selected = a;
                else if(a.charAt(0)=='!') s.event = a;
                else s.start = a;
                break;
        }
    }

    return this.each(function(){
        if(s.selected.charAt(0)=='.') s.selected=s.selected.substr(1);
        if(s.event.charAt(0)=='!') s.event=s.event.substr(1);
        if(s.start==null) s.start=-1; //no tab selected
        tabs = this;
        var showId = function(){
            if($(this).is('.'+s.selected)) return s.change;
            var id = "#"+this.href.split("#")[1];
            var aList = [];//save tabs
            var idList = [];//save possible elements
            $("a",tabs).each(function(){
                if(this.href.match(/#/)){
                    aList.push(this);
                    idList.push("#"+this.href.split("#")[1]);
                }
            });
            if(s.click && !s.click.apply(this,[id,idList,tabs,s])) return s.change;
            //Clear tabs, and hide all
            for(i in aList) $(aList[i]).removeClass(s.selected);
            for(i in idList) $(idList[i]).hide();
            //Select clicked tab and show content
            $(this).addClass(s.selected);
            $(id).show();
            return s.change; //Option for changing url
        };
        //Bind idTabs
        var list = $("a[href*='#']",tabs).unbind(s.event,showId).bind(s.event,showId);
        list.each(function(){
            $("#"+this.href.split('#')[1]).hide();
        });

        //Select default tab
        var test=false;
        if((test=list.filter('.'+s.selected)).length); //Select tab with selected class
        else if(typeof s.start == "number" &&(test=list.eq(s.start)).length); //Select num tab
        else if(typeof s.start == "string" //Select tab linking to id
            &&(test=list.filter("[href*='#"+s.start+"']")).length);
        if(test) {
            test.removeClass(s.selected);
            test.trigger(s.event);
        } //Select tab

        return s; //return current settings (be creative)
    });
};

$.winBox = function(data , option){
    var winbox = $('#windowBox');
    if(winbox.length == 0){
        $('body').after("<div id=\"windowBox\"></div>");
        winbox = $('#windowBox');
    }
    winbox.empty();
    var setting = {
        modal:true,
        resizable:false,
        width:700,
        height:'auto',
        minHeight:'auto',
        buttons:{
            "CLOSE":function(){
                $(this).dialog('close');
            }
        }
    };
    if(option != undefined){
        for(var k in option){
            setting[k] = option[k];
        }
    }
    winbox.dialog(setting);
    if(data == undefined || data==""){
        winbox.html('loading...');
        return;
    }
    if(winbox.dialog("isOpen") === true){
        winbox.html(data);
        return;
    }
    winbox.dialog("open").html(data);

};
//--------------------------------------------------
/**
 * 會員資料
 * @return
 */
function GetMemData(){
    try{
        $.winBox();
        $.ajax({
            type:'GET',
            url:'?module=MConfigData&GameCategory='+f_com.getCookie('page_site'),
            data:{
                LevelStr:'MEM'
            },
            error:function(msg){
                alert(JsBook.MSG_DISCONNECTED_PLEASE_RETRY);
            },
            success:function(data){
                $.winBox(data);
            }
        });
    }catch(e){
        alert(JsBook.MSG_REQUEST_ERROR_MEMBER_DATA);
    }
}

/**
 * 下注紀錄
 * @return
 */
function BetDocument(){
    try{
        $.winBox();
        $.ajax({
            type:'POST',
            url:'?module=MFunction&method=BetRecord',
            data:{
                sType:'Record',
                'GameType':GameType
            },
            error:function(msg){
                alert(JsBook.MSG_DISCONNECTED_PLEASE_RETRY);
            },
            success:function(data){
                $.winBox(data,{
                    'width':730
                });
            }
        });
    }catch(e){
        alert(JsBook.MSG_REQUEST_ERROR_BET_RECORD);
    }
}
/**
 * 開獎結果
 * @return
 */
function OpenResultDocument(){
    try{
        $.winBox();
        $.ajax({
            type:'POST',
            //url:'?module=MFunction&method=ShowResult',
            url:'?module=MGetGameResult&method=DisplayResultLottery',
            data:{
                GameType:GameType ,
                StartTime:G_TMP.NOW_T ,
                EndTime:G_TMP.END
            },
            error:function(msg){
                alert(JsBook.MSG_DISCONNECTED_PLEASE_RETRY);
            },
            success:function(data){
                $.winBox(data,{
                    'width' : 965
                });
            }
        });
    }catch(e){
        alert(JsBook.MSG_REQUEST_ERROR_GAME_RESULT);
    }
}
/**
 * 歷史帳戶
 * @return
 */
function UserDocument(){
    try{
        $.winBox();
        $.ajax({
            type:'POST',
            url:'?module=MFunction&method=BetHistory',
            data:{
                GameType:GameType ,
                STime:G_TMP.NOW_T ,
                ETime:G_TMP.END
            },
            error:function(msg){
                alert(JsBook.MSG_DISCONNECTED_PLEASE_RETRY);
            },
            success:function(data){
                $.winBox(data,{
                    'width':750
                });
            }
        });
    }catch(e){
        alert(JsBook.MSG_REQUEST_ERROR_ACCOUNT_HISTORY);
    }
}
/**
 * 額度轉換
 * @return
 */
function CashSwitch(){
    try{
        $.winBox('',{
            'width':'662'
        });
        $.ajax({
            type:'POST',
            url:'?module=MCashSwitch',
            data:{},
            error:function(msg){
                alert('error');
            },
            success:function(data){
                $.winBox(data ,{
                    'width':662
                });
            }
        });
    }catch(e){
        alert('error');
    }
}
/**
 * 會員訊息
 * @return
 */
function MemberMsg(){
    try{
        $.winBox("",{width:550,modal:false});
        $.ajax({
            type:'POST',
            url:'?module=MemberMsg&method=getMsg',
            data:{
                //MsgType:'general'
            },
            error:function(msg){
                alert('error');
            },
            success:function(data){
                $.winBox(data,{width:550});
            }
        });
    }catch(e){
        alert('error');
    }
}
/**
 *安全上網
 *
 **/
function MagicWindow(theURL,event) { //v2.0
    var top = event.screenY;
    var left = event.screenX;
    var features = "top="+top+",left="+left+",scrollbars=yes,resizable=yes,width=250,height=120";
    window.open(theURL,'_blank',features);
}
/**
 *BB瀏覽器
 *
 **/
function BrowserWindow(theURL,event) { //v2.0
    var top = event.screenY;
    var left = event.screenX;
    var features = "top="+top+",left="+left+",scrollbars=yes,resizable=yes,width=800,height=600";
    window.open(theURL,'_blank',features);
}
/**
 * 出入款查詢
 * @return
 */
function CashAccount(){
    try{
        $.winBox();
        $.ajax({
            type:'POST',
            url:'?module=MCashAccount',
            data:{
                PayWay:GameType ,
                STime:G_TMP.NOW_T ,
                ETime:G_TMP.END
            },
            error:function(msg){
                alert('error');
            },
            success:function(data){
                $.winBox(data,{
                    'width':730
                });
            }
        });
    }catch(e){
        alert('error');
    }
}
/**
 * IPL戶頭查詢
 * @return
 */
function UserAccount(){
    try{
        $.winBox();
        $.ajax({
            type:'POST',
            url:'?module=MUserAccount&method=UserAccount',
            data:{},
            error:function(msg){
                alert('error');
            },
            success:function(data){
                $.winBox(data,{
                    'width':830
                });
            }
        });
    }catch(e){
        alert('error');
    }
}
/**
 * 遊戲選單
 * @return
 */
function GameMenu(){
    $.winBox('',{width:330});
    $.ajax({
        type:'GET',
        url:'?module=MFunction&method=MemLotterySelectGame',
        error:function(msg){
            alert('error');
        },
        success:function(data){
            $.winBox(data,{
                'width':330
            });
        }
    });
}
//------------------------------
$(document).ready(function(){
    /*
     *  IPL會員資料
     *  @example:
     */
    $('span[id=IPLMemData]').click(function(){
        $.winBox();
        try{
            $.ajax({
                type:'POST',
                url:'?module=MFunction&method=IPLMemData',
                data:{},
                error:function(msg){
                    alert('error');
                },
                success:function(data){
                    $.winBox(data);
                }
            });
        }catch(e){
            alert('error');
        }
    });

    /*
     *  IPL下注狀況 真人視訊
     *  @example:
     */
    $('span[id=IPLLiveBetDocument]').click(function(){
        $.winBox();
        try{
            $.ajax({
                type:'POST',
                url:'?module=MBetRecord&method=IPLLiveBetRecord',
                data:{},
                error:function(msg){
                    alert('error');
                },
                success:function(data){
                    $.winBox(data);
                }
            });
        }catch(e){
            alert('error');
        }
    });
    /*
     *  IPL下注狀況 電子遊藝
     *  @example:
     */
    $('span[id=IPLGameBetDocument]').click(function(){
        $.winBox();
        try{
            $.ajax({
                type:'POST',
                url:'?module=MBetRecord&method=IPLGameBetRecord',
                data:{},
                error:function(msg){
                    alert('error');
                },
                success:function(data){
                    $.winBox(data);
                }
            });
        }catch(e){
            alert('error');
        }
    });

    // LIVE SERVER SELECT
    $("#LiveServerGroup").change(function(){
        $.ajax({
            type:'GET',
            url:'/app/member/browse/cookie_other.php?SocketName=SocketValue&SocketValue='+$('#LiveServerGroup option:selected').val(),
            data:{},
            error:function(msg){
            },
            success:function(data){
            }
        });
    });
});

/**
 *歷史訊息
 *
 **/
function HotNewsHistory() {
    var features = 'height=600,width=800,top=0, left=0,scrollbars=yes,resizable=yes';
    window.open('/cl/?module=MFunction&method=ShowHotNewsHistory','HotNewsHistory',features);
}
/**
 *選單文字onMouseover切換效果
 *@param text mouseover 文字
 **/
$.fn.changetext = function(text){
    if(this[0] == undefined){
        return false;
    }
    if(this[0].tagName.toLowerCase() == 'a'){
        var self = this;
    }else{
        var self = this.find('a');
    }
    var currentText = self.html();

    this.hover(
        function () {
            self.html(text);
        },
        function () {
            self.html(currentText);
        }
    );

};
/**
 *彩金說明
 *
 **/
JackPotRule = function(){
    window.open('?module=MAdvertis&method=JackPotRule', 'popup','width=658,height=280,scrollbars=no,resizable=no, toolbar=no,directories=no,location=no,menubar=no, status=no,left=0,top=0');
};

var _TmpGameQuantity = {};
//取得賽事數量
function GetGameQuantity(color){
    $.getJSON('/cl/?module=MCountGameNums&method=CountGames',{ "noCache": Math.random()}, function(data){
        var RB_NUM = (data.RB.ALL_RB) ? data.RB.ALL_RB.ALL_RB : 0;
        for(var i in _TmpGameQuantity){
            $('#'+i).empty();
        }
        _TmpGameQuantity = {};
        for(var k in data){
            for(var k2 in data[k]){
                for(var k3 in data[k][k2]){
                    //判斷單式
                    if(/_S$/.test(k3)){
                        $('#'+k3+'_MENU').html(" "+data[k][k2][k3]+" ").css('color',color);
                        _TmpGameQuantity[k3+'_MENU'] = data[k][k2][k3];
                    }
                    $('#'+k+'_'+k3+'_GAME').html(" "+data[k][k2][k3]+" ").css('color',color);
                    _TmpGameQuantity[k+'_'+k3+'_GAME'] = data[k][k2][k3];
                }
            }
        }
        //顯示目前滾球數量
        if(data.RB.ALL_RB.ALL_RB >0){
            $("#RB_NUM").html(RB_NUM);
        }
    });
}
//取得自訂賽程數量
function GetFavorQuantity(color){
    $.getJSON('/cl/?module=MCountGameNums&method=CountFavoGames',{ "noCache": Math.random() }, function(data){
        var type = ['FT','BK','FB','IH','BS','TB','TN','F1'];
        for(var i = 0 ; i < type.length; i++){
            if(data.Favo[type[i]] == undefined){
                $('#'+type[i]+'_S_FAVORGAME').hide();
            }
        }
        for(var k in data.Favo){
            for(var key in data.Favo[k]){
                if(data.Favo[k][key] > 0){
                    $('#'+key+'_FAVORGAME').show();
                    $('#'+key+'_FAVOR').html(" "+data.Favo[k][key]+" ").css('color',color);
                }else{
                    $('#'+key+'_FAVORGAME').show();
                }
            }
        }
    });
}
$.fn.stab = function(div){
    var area = this;
    var ul = $(this).children('li');

    ul.click(function(){
        var i = ul.index(this)||0;

        ul.children('a').removeClass('stab');
        $(div).hide();
        $(div).get(i).style.display = '';
        $(this).children('a').addClass('stab');
    });
};
/**
 * 文字閃爍
 * @param id   jquery selecor
 * @param arr  ['#FFFFFF','#FF0000']
 * @param s    milliseconds
 */
function toggleColor( id , arr , s ){
    var self = this;
    self._i = 0;
    self._timer = null;

    self.run = function(){
        if(arr[self._i]){
            $(id).css('color', arr[self._i]);
        }
        self._i == 0 ? self._i++ : self._i = 0;
        self._timer = setTimeout(function(){
            self.run( id , arr , s);
        }, s);
    }
    self.run();
}
/**
 * 文字閃爍2
 * @param id   jquery selecor
 * @param arr  ['#FFFFFF','#FF0000']
 * @param s    milliseconds
 * @param s object
 * ex : text-shadow(陰影 (垂直 水平 聚焦 顏色))、text-stroke(文字邊框 (邊框粗細 顏色))、transform(rotate蹺蹺板 scale縮放 skew歪斜 translate平移)
 */
function toggleColor2( id , arr , s , o){
    var self = this;
    self._i = 0;
    self._timer = null;
    self.css = '';

    self.run = function(){
        if(o != undefined){
            $.each(o, function(k, v){
                self.css = (self._i == 1) ? v : '';
                $(id).css(k, self.css);
            });
        }

        if(arr[self._i]){
            $(id).css('color', arr[self._i]);
        }
        self._i == 0 ? self._i++ : self._i = 0;
        self._timer = setTimeout(function(){
            self.run( id , arr , s);
        }, s);
    }
    self.run();
}
/**
 * 密碼判別
 * @param s object {
 *     False : 特殊字元顯示訊息
 *     Long  : 過長顯示訊息
 *   }
 */
$.fn.LoginPW = function(s){
    var self = $(this);
    var Def = {
        ///'Upper' : '密碼須為小寫，大寫鎖定啟用中',
        'Short' : '密码长度不能少于6个字元',
        'Long'  : '密码长度不能多于20个字元'
      // / 'False' : '密码须符合0~9及a~z字元'
    };
    Def = $.extend(Def, s);

    if(self.attr('maxlength') != 21) self.attr('maxlength', 21);

    self.keyup(function(){
        // 特殊字元
       
        // 密碼過長
        if(this.value.length > 20){
            alert(Def.Long);
            this.value = this.value.substring(0,20);
        }
    });
}/**
 * 登入表單效果
 * @param _o object {
 *     Opacity : 標題透明度
 *     MS      : 標題顯示速度
 *   }
 */
$.fn.InputLabels = function(_o) {
    var o = {
        'Opacity' : 0.5,
        'MS'      : 300,
        'next'    : false
    };
    $.extend(o, _o);

    return this.each(function() {
        var label = $(this);
        var input = o.next ? $(this).next('input[name=' + $(this).attr('name') + ']') : $('input[name=' + $(this).attr('name') + ']');
        var show = true;

        // 預防瀏覽器記帳密機制
        setTimeout(function(){
            this.opacity = (input.val() == "") ? 1.0 : 0;
            label.css('opacity' , this.opacity);
        }, 300);

        label.click(function(){
            input.trigger('focus');
        });

        input.focus(function() {
            if (input.val() == "") {
                setOpacity(o.Opacity);
            }
        }).blur(function() {
                if (input.val() == "") {
                    if (!show) {
                        label.css({ opacity: 0.0 }).show();
                    }
                    setOpacity(1.0);
                } else {
                    setOpacity(0.0);
                }
            }).keydown(function(e) {
                if ((e.keyCode == 16) || (e.keyCode == 9) || (e.keyCode == 13)) return;
                if (show) {
                    label.hide();
                    show = false;
                }
            });

        var setOpacity = function(opacity) {
            label.stop().animate({'opacity' : opacity }, o.MS);
            show = (opacity > 0.0);
        };
    });
};
/*遊戲規則說明另開*/
function gameRule(GAME_TYPE){
    window.open('/cl/?module=MRule&method=ruleDescrip&args='+GAME_TYPE, 'AllRule' ,'width=1024,height=640,status=no,scrollbars=yes');
}
/*會員中心換頁*/

f_com.__options = {
    type: "GET",
    dataType: "html",
    module: "MACenterView",
    method: "memberdata",
    timeout: 30000,
    blockUI: true,
    blockId: "#page-container",
    blockStyle: "white",
    maskColor: "#000000"
}

f_com.SetOptions = function(key, value){
    f_com.__options[key] = value;
};

f_com.MGetPager = function(mo, me) {
    window.open("/cl/?module=" + mo + "&other=" + me, "MACENTER", "top=50,left=50,width=1020,height=600,status=no,scrollbars=yes,resizable=no").focus();
};

f_com.MChgPager = function(options, otherData) {

    var conf = $.extend(f_com.__options, options);

    var data = {"module": conf.module, "method": conf.method};
    if(otherData) {
        $.extend(data, otherData);
    }
    if(conf.module=="MACenterView" && (conf.method=="bankTake" || conf.method=="bankATM" || conf.method=="bankSavings")){
        conf.blockUI = false;
    }
    if(conf.blockUI) {
        $(conf.blockId).block({
            message: "<div id='MBlockImg'></div>",
            centerY: 0,
            css: {
                "background-color": "transparent",
                top: "300px",
                width: '0px',
                border: "none",
                cursor: "default"
            },
            overlayCSS: {
                cursor: "default",
                backgroundColor: conf.maskColor
            }
        });
    }
    $.ajax({
        type: conf.type,
        url: 'index.php',
        data: data,
        dataType: conf.dataType,
        timeout: conf.timeout,
        error: function(data) {
            alert(JsBook.S_MSG_TRAN_BUSY);
        },
        success: function(data) {
            $('#MACenter-content').html(data);
        },
        complete: function() {
            if(conf.blockUI) {
                $(conf.blockId).unblock();
            }
        }
    });
}

/*QQ連結 : 傳入QQ帳號*/
f_com.QQOnlineService = function(acc){
    window.open('http://wpa.qq.com/msgrd?v=3&uin='+acc+'&site=qq&menu=yes', 'QQOnlineService' ,'width=1024,height=800,status=no,scrollbars=no');
};

/**
 * 13/01/18 小球 投注教學 加上粗體
 */
$('#su-lottery').css('font-weight', 'bold');

/**
 * 自動將footer的qq號轉換成連結(文字從控端設定 ex : <qq>7588225</qq> )
 */
document.createElement('qq');

$(function(){
    var QQArray = document.getElementsByTagName('qq');
    if(QQArray.length){
        $.each(QQArray,function(){
            var QQ = $(this);
            var QQNumber = QQ.text().replace(/[\s\D]+/g,'');
            QQ.html('<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin='+QQNumber+'&site=qq&menu=yes"><img src="http://wpa.qq.com/pa?p=2:'+QQNumber+':46" alt="点击这里联系客服'+QQNumber+'" title="点击这里联系客服'+QQNumber+'" style="vertical-align: text-bottom;"></a>');
        });
    }
});


//onclick 按钮跳转    r=跳转路径
function click_url(r,k){
	if(k==1){
		$(window.parent.parent.parent.parent.document).find("#mainFrame").css("width","1024");
		$(window.parent.parent.parent.parent.document).find("#mainFrameDiv").css("margin-top","441px");
		$(window.parent.parent.parent.parent.document).find("#mainFrameDiv").css("padding-bottom","50px");
		
		$(window.parent.parent.parent.parent.document).find("#mainFrameDiv").css("background","url(/imgs/54420.png) repeat-y center 50px ");

	}else{
		$(window.parent.parent.parent.parent.document).find("#mainFrame").css("width","100%");
		$(window.parent.parent.parent.parent.document).find("#mainFrameDiv").css("margin-top","0px");
		$(window.parent.parent.parent.parent.document).find("#mainFrameDiv").css("background","none");
	}
	
	//

		if(r=='/cl/main.php'){
			if(window.parent.document.body){
				window.parent.document.body.style.background="url(/imgs/about_bg.png) repeat-x scroll 0 183px #8C5E00";
			}else{
				window.parent.parent.document.body.style.background="url(/imgs/about_bg.png) repeat-x scroll 0 183px #8C5E00";
			}
        window.open(r+'?action=userclick',"mainFrame");
			
		}else if(r=='/app/member/sport.php'){
			if(window.parent.document.body){
				window.parent.document.body.style.background="url(/imgs/ttt.png) repeat-x scroll center 183px #8C5E00";
			}else{
				window.parent.parent.document.body.style.background="url(/imgs/ttt.png) repeat-x scroll center 183px #8C5E00";
		}
			
			window.open(r,"mainFrame");
			var toph=window.parent.document.getElementById("topFrame").height;
			var clh=window.parent.document.documentElement.clientHeight;
			$(window.parent.document).find("#mainFrame").height(clh-toph-3+200);
		}else if(r=='/member/lt/?rtype=SPbside'){
			if(window.parent.document.body){
				window.parent.document.body.style.background="url(/imgs/ttt1.png) repeat-x scroll center 183px #8C5E00";
			}else{
				window.parent.parent.document.body.style.background="url(/imgs/ttt1.png) repeat-x scroll center 183px #8C5E00";
		}
			
			window.open(r,"mainFrame");
			var toph=window.parent.document.getElementById("topFrame").height;
			var clh=window.parent.document.documentElement.clientHeight;
			$(window.parent.document).find("#mainFrame").height(clh-toph-3+200);
		}

		
		else if(r=='/member/lottery/Cqssc.php?1=1' || r=='/member/b3/b3.php?gtype=D3&rtype=W1'){
        window.open(r,"mainFrame");
        var toph=window.parent.document.getElementById("topFrame").height;
        var clh=window.parent.document.documentElement.clientHeight;
        window.parent.document.getElementById("mainFrame").height = clh-toph;

			if(window.parent.document.body){
				window.parent.document.body.style.background="url(/imgs/about_bg.png) repeat-x scroll 0 183px #8C5E00";
			}else{
				window.parent.parent.document.body.style.background="url(/imgs/about_bg.png) repeat-x scroll 0 183px #8C5E00";
			}
    }
    else{
        window.open(r,"mainFrame");

			if(window.parent.document.body){
				window.parent.document.body.style.background="url(/imgs/about_bg.png) repeat-x scroll 0 183px #8C5E00";
			}else{
				window.parent.parent.document.body.style.background="url(/imgs/about_bg.png) repeat-x scroll 0 183px #8C5E00";
			}
    }
}

//等入口提交
function aLeftForm1Sub(){
    var vnumber	=	$("#rmNum").val();
    if(vnumber == ""|| vnumber == "验证码"){
        $("#rmNum").focus();
        return false;
    }
    var un	=	$("#username").val();
    if(un == "" || un == "帐户"){
        $("#username").focus();
        return false;
    }
    var pw	=	$("#passwd").val();
    if(pw == "" || pw == "******"){
        $("#passwd").focus();
        return false;
    }
    $("#btnlogin").attr("disabled",true); //按钮失效
    $.post("/app/member/login.php",{r:Math.random(),action:"login",username:un,password:pw,vnumber:vnumber},function(login_jg){
        if(login_jg.indexOf("1")>=0){ //验证码错误
			
            alert("验证码错误，请重新输入");
            $("#rmNum").select();
            $("#vPic").attr("src","/cl/yzm.php");
            $("#vPic").css("display","inline");
            $("#crPic").css("display","inline");
            $("input[name='rmNum']").val("");
        }else if(login_jg.indexOf("2")>=0){ //用户名称或密码
            alert("用户名或密码错误，请重新输入");
            $("#vPic").attr("src","/cl/yzm.php");
            $("#vPic").css("display","inline");
            $("#crPic").css("display","inline");
            $("input[name='rmNum']").val("");
            $("#password").val('');
            $("#username").select();

        }else if(login_jg.indexOf("3")>=0){ //停用
            alert("账户已停用，请联系客服人员。");
            $("#vPic").attr("src","/cl/yzm.php");
            $("#vPic").css("display","inline");
            $("#crPic").css("display","inline");
            $("input[name='rmNum']").val("");
        }else if(login_jg.indexOf("4")>=0){ //异常
            alert("账户异常,无法登陆，请联系客服人员。");
            $("#vPic").attr("src","/cl/yzm.php");
            $("#vPic").css("display","inline");
            $("#crPic").css("display","inline");
            $("input[name='rmNum']").val("");
        }else if(login_jg.indexOf("5")>=0){ //登陆成功


            window.location.href='/cl/top.php';
            parent.mainFrame.location.href='/cl/main.php';
        }
        $("#btnlogin").attr("disabled",false); //按钮有效
    });
}
function BBOnlineService() {
        window.open('http://chat16.live800.com/live800/chatClient/chatbox.jsp?companyID=552502&configID=84434&jid=6812238228','','menubar=no,status=yes,scrollbars=yes,top=150,left=400,toolbar=no,width=805,height=720');
		}