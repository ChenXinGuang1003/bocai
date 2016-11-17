(function (GameSpace){
    //使用ajax script的玩法rtype
    var _scriptRtype = ['CH', 'NI', 'NAP', 'NX', 'LX'];
    //html span tag
    var _span = document.createElement('span');
    _span.style.cssText = 'color:#cc0000;font-weight:bold;font-size:17pt;';
    //ajax後端更新page
    var _ajaxPage = '/json/member/ajax_action.php';
    //ajax後端更新 other page
    var _otherPage = '/json/member/ajax2_action.php';
    //ajaxload更新page
//    var _loadPage = '/html/member/ajax2_action.php';  路径的更改
    var _loadPage = '/json/member/ajax2_action.php';
    //切換快速模式page
    var _quickPage = '/script/member/switchMode.php';
    //快速輸入
    var _quickSP = '/member/quickinput.php';
    //正碼特快速輸入
    var _quickNAS = '/member/quickinput_nas.php';
    //預設位置
    var _defaultUrl = '/member/lt/';
    //動態下注模式form
    var _activeForm = $('form[name=newForm]');
    //群組下注url
    var _grpUrl = '/member/Grp/lt_grp_order.php';
    //input type
    var _input_type = 'number';
    //生肖球號
    var _zodiac = null;
    //要動態載入的selector
    var _bind = {
        gameID : 'gid',
        table1ID : 'table1',
        table2ID : 'table2',
        table3ID : 'table3',
        table4ID : 'table4',
        rBallID : 'randomball',
        dtShow : 'a#limitShow',
        ballID : ['bal0','bal1','bal2','bal3','bal4','bal5','bal6'],
        ballAID : ['bal0a','bal1a','bal2a','bal3a','bal4a','bal5a','bal6a'],
        tabID : 'tab',
        lineSelector : 'ul.DLUL',
        lineInpSelector : '#Line',
        quickSelector : '#quickMode > input',
        fastSelector : '#quickInputTD > input',
        formSelector : '#Game form[name=newForm]'
    };
    //玩法Concede 索引
    var Concede = {
        SP : ["SP01","SP02","SP03","SP04","SP05","SP06","SP07","SP08","SP09","SP10",
              "SP11","SP12","SP13","SP14","SP15","SP16","SP17","SP18","SP19","SP20",
              "SP21","SP22","SP23","SP24","SP25","SP26","SP27","SP28","SP29","SP30",
              "SP31","SP32","SP33","SP34","SP35","SP36","SP37","SP38","SP39","SP40",
              "SP41","SP42","SP43","SP44","SP45","SP46","SP47","SP48","SP49",
              "SP_ODD","SP_EVEN","SP_OVER","SP_UNDER","SF_OVER",
              "SP_SODD","SP_SEVEN","SP_SOVER","SP_SUNDER","SF_UNDER",
              "HS_EO","HS_EU","HS_OO","HS_OU"],
        SPbside : ["SP01","SP02","SP03","SP04","SP05","SP06","SP07","SP08","SP09","SP10",
              "SP11","SP12","SP13","SP14","SP15","SP16","SP17","SP18","SP19","SP20",
              "SP21","SP22","SP23","SP24","SP25","SP26","SP27","SP28","SP29","SP30",
              "SP31","SP32","SP33","SP34","SP35","SP36","SP37","SP38","SP39","SP40",
              "SP41","SP42","SP43","SP44","SP45","SP46","SP47","SP48","SP49",
              "SP_ODD","SP_EVEN","SP_OVER","SP_UNDER","SF_OVER",
              "SP_SODD","SP_SEVEN","SP_SOVER","SP_SUNDER","SF_UNDER",
              "HS_EO","HS_EU","HS_OO","HS_OU"],
        NAS : {
            N1 : ["N101","N102","N103","N104","N105","N106","N107","N108","N109","N110",
                  "N111","N112","N113","N114","N115","N116","N117","N118","N119","N120",
                  "N121","N122","N123","N124","N125","N126","N127","N128","N129","N130",
                  "N131","N132","N133","N134","N135","N136","N137","N138","N139","N140",
                  "N141","N142","N143","N144","N145","N146","N147","N148","N149"],
            N2 : ["N201","N202","N203","N204","N205","N206","N207","N208","N209","N210",
                  "N211","N212","N213","N214","N215","N216","N217","N218","N219","N220",
                  "N221","N222","N223","N224","N225","N226","N227","N228","N229","N230",
                  "N231","N232","N233","N234","N235","N236","N237","N238","N239","N240",
                  "N241","N242","N243","N244","N245","N246","N247","N248","N249"],
            N3 : ["N301","N302","N303","N304","N305","N306","N307","N308","N309","N310",
                  "N311","N312","N313","N314","N315","N316","N317","N318","N319","N320",
                  "N321","N322","N323","N324","N325","N326","N327","N328","N329","N330",
                  "N331","N332","N333","N334","N335","N336","N337","N338","N339","N340",
                  "N341","N342","N343","N344","N345","N346","N347","N348","N349"],
            N4 : ["N401","N402","N403","N404","N405","N406","N407","N408","N409","N410",
                  "N411","N412","N413","N414","N415","N416","N417","N418","N419","N420",
                  "N421","N422","N423","N424","N425","N426","N427","N428","N429","N430",
                  "N431","N432","N433","N434","N435","N436","N437","N438","N439","N440",
                  "N441","N442","N443","N444","N445","N446","N447","N448","N449"],
            N5 : ["N501","N502","N503","N504","N505","N506","N507","N508","N509","N510",
                  "N511","N512","N513","N514","N515","N516","N517","N518","N519","N520",
                  "N521","N522","N523","N524","N525","N526","N527","N528","N529","N530",
                  "N531","N532","N533","N534","N535","N536","N537","N538","N539","N540",
                  "N541","N542","N543","N544","N545","N546","N547","N548","N549"],
            N6 : ["N601","N602","N603","N604","N605","N606","N607","N608","N609","N610",
                  "N611","N612","N613","N614","N615","N616","N617","N618","N619","N620",
                  "N621","N622","N623","N624","N625","N626","N627","N628","N629","N630",
                  "N631","N632","N633","N634","N635","N636","N637","N638","N639","N640",
                  "N641","N642","N643","N644","N645","N646","N647","N648","N649"]
        },
        NA : ["NA01","NA02","NA03","NA04","NA05","NA06","NA07","NA08","NA09","NA10",
              "NA11","NA12","NA13","NA14","NA15","NA16","NA17","NA18","NA19","NA20",
              "NA21","NA22","NA23","NA24","NA25","NA26","NA27","NA28","NA29","NA30",
              "NA31","NA32","NA33","NA34","NA35","NA36","NA37","NA38","NA39","NA40",
              "NA41","NA42","NA43","NA44","NA45","NA46","NA47","NA48","NA49",
              "NA_ODD","NA_EVEN","NA_OVER","NA_UNDER"],
        NO : ["NO1_EVEN","NO1_ODD","NO2_EVEN","NO2_ODD","NO3_EVEN","NO3_ODD","NO4_EVEN","NO4_ODD","NO5_EVEN","NO5_ODD","NO6_EVEN","NO6_ODD",
              "NO1_OVER","NO1_UNDER","NO2_OVER","NO2_UNDER","NO3_OVER","NO3_UNDER","NO4_OVER","NO4_UNDER","NO5_OVER","NO5_UNDER","NO6_OVER","NO6_UNDER",
              "NO1_B","NO1_G","NO1_R","NO2_B","NO2_G","NO2_R","NO3_B","NO3_G","NO3_R","NO4_B","NO4_G","NO4_R","NO5_B","NO5_G","NO5_R","NO6_B","NO6_G","NO6_R",
              "NO1_SEVEN","NO1_SODD","NO2_SEVEN","NO2_SODD","NO3_SEVEN","NO3_SODD","NO4_SEVEN","NO4_SODD","NO5_SEVEN","NO5_SODD","NO6_SEVEN","NO6_SODD",
              "NO1_SOVER","NO1_SUNDER","NO2_SOVER","NO2_SUNDER","NO3_SOVER","NO3_SUNDER","NO4_SOVER","NO4_SUNDER","NO5_SOVER","NO5_SUNDER","NO6_SOVER","NO6_SUNDER",
              "NO1_FOVER","NO1_FUNDER","NO2_FOVER","NO2_FUNDER","NO3_FOVER","NO3_FUNDER","NO4_FOVER","NO4_FUNDER","NO5_FOVER","NO5_FUNDER","NO6_FOVER","NO6_FUNDER"],
        SPA : ["SP_A1","SP_A2","SP_A3","SP_A4","SP_A5","SP_A6","SP_A7","SP_A8","SP_A9","SP_AA","SP_AB","SP_AC",
               "SP_R","SP_B","SP_G",
               "SH0","SH1","SH2","SH3","SH4",
               "SF0","SF1","SF2","SF3","SF4","SF5","SF6","SF7","SF8","SF9"],
        SPB : ["SP_B1","SP_B2","SP_B3","SP_B4","SP_B5","SP_B6","SP_B7","SP_B8","SP_B9","SP_BA","SP_BB","SP_BC",
               "NF0","NF1","NF2","NF3","NF4","NF5","NF6","NF7","NF8","NF9",
               "TX2","TX5","TX6","TX7",
               "TX_ODD","TX_EVEN"],
        HB : ["HB_RODD","HB_REVEN","HB_ROVER","HB_RUNDER","HB_GODD","HB_GEVEN","HB_GOVER","HB_GUNDER","HB_BODD","HB_BEVEN","HB_BOVER","HB_BUNDER",
              "HH_ROO","HH_ROE","HH_RUO","HH_RUE","HH_GOO","HH_GOE","HH_GUO","HH_GUE","HH_BOO","HH_BOE","HH_BUO","HH_BUE"],
        C7 : ["NA_A1","NA_A2","NA_A3","NA_A4","NA_A5","NA_A6","NA_A7","NA_A8","NA_A9","NA_AA","NA_AB","NA_AC",
              "C7_R","C7_B","C7_G","C7_N"],
        OEOU : ["SP_ODD","SP_EVEN","SP_OVER","SP_UNDER","SP_SODD","SP_SEVEN","SP_SOVER","SP_SUNDER",
                "NA_ODD","NA_EVEN","NA_OVER","NA_UNDER",
                "NO1_ODD","NO2_ODD","NO3_ODD","NO4_ODD","NO5_ODD","NO6_ODD",
                "NO1_EVEN","NO2_EVEN","NO3_EVEN","NO4_EVEN","NO5_EVEN","NO6_EVEN",
                "NO1_OVER","NO2_OVER","NO3_OVER","NO4_OVER","NO5_OVER","NO6_OVER",
                "NO1_UNDER","NO2_UNDER","NO3_UNDER","NO4_UNDER","NO5_UNDER","NO6_UNDER",
                "NO1_SODD","NO2_SODD","NO3_SODD","NO4_SODD","NO5_SODD","NO6_SODD",
                "NO1_SEVEN","NO2_SEVEN","NO3_SEVEN","NO4_SEVEN","NO5_SEVEN","NO6_SEVEN",
                "NO1_SOVER","NO2_SOVER","NO3_SOVER","NO4_SOVER","NO5_SOVER","NO6_SOVER",
                "NO1_SUNDER","NO2_SUNDER","NO3_SUNDER","NO4_SUNDER","NO5_SUNDER","NO6_SUNDER"]
    }
    //球號色彩
    var col = [ '', 'R', 'R', 'B', 'B', 'G', 'G', 'R', 'R', 'B', 'B',
               'G', 'R', 'R', 'B', 'B', 'G', 'G', 'R', 'R', 'B', 'G',
               'G', 'R', 'R', 'B', 'B', 'G', 'G', 'R', 'R', 'B', 'G',
               'G', 'R', 'R', 'B', 'B', 'G', 'G', 'R', 'B', 'B', 'G',
               'G', 'R', 'R', 'B', 'B', 'G' ];
    //ajax的timer id
    var _timer = null;
    //倒數的timer
    var _timer_reciprocal = null;
    //搖時搖珠timer
    var _timer_ball = null;
    //滑動開關
    var _onSlide = 0;
    //包組box
    var _fieldset = document.createElement('fieldset');
    //GrpBtn高度
    var _grpBtnHeight = 528;
    var _isIE6 = ((navigator.userAgent.indexOf("MSIE 6.") != -1) && (navigator.userAgent.indexOf("Opera") == -1));
    var _isIE7 = ((navigator.userAgent.indexOf("MSIE 7.") != -1) && (navigator.userAgent.indexOf("Opera") == -1));
    var _isIE8 = ((navigator.userAgent.indexOf("MSIE 8.") != -1) && (navigator.userAgent.indexOf("Opera") == -1));
    /**
     * 是否支援css3 animation Event
     */
    function isAnimationSupport(){
        var animation = false,
            animationstring = 'animation',
            keyframeprefix = '',
            domPrefixes = 'Webkit Moz O ms Khtml'.split(' '),
            pfx  = '',
            elm = document.createElement('div');

        if( elm.style.animationName ) { animation = true; }

        if( animation === false ) {
            for( var i = 0; i < domPrefixes.length; i++ ) {
                if( elm.style[ domPrefixes[i] + 'AnimationName' ] !== undefined ) {
                    pfx = domPrefixes[ i ];
                    animationstring = pfx + 'Animation';
                    keyframeprefix = '-' + pfx.toLowerCase() + '-';
                    animation = true;
                    break;
                }
            }
        }
        return animation;
    }
    /**
     * 將數字補成2位數
     * @param n 數字
     * @return s 字串數字
     */
    function numFormat (n) {
        var s = (('0' + n).match(/[0-9]{2}$/i)).toString();
        return s;
    }
    /**
     * 添加賠率節點
     * @param string b 號碼id
     * @param int o 賠率
     * @param int m 下注模式
     * @return span html span node
     */
    function oddsNode(b, o, m) {
        var span = _span.cloneNode(1);
        span.setAttribute('id', b);
        span.style.fontSize = '12px';
        if (m != 1) {
            span.style.cursor = 'pointer';
            span.onclick = function () {
                 (betSpace.bet.onBetNumClk) && betSpace.bet.onBetNumClk.call(this);
            }
        }
        span.innerHTML = o;
        return span;
    }
    /**
     * 回傳動態下注字html字串
     * @param b 號碼id
     * @param o 賠率
     * @param string r
     * @return string html span node
     */
    function inpStr (b, o) {
        var r = '<input type="' + _input_type+ '" ' + (('' == o) ? 'disabled="diabled"':'') + ' class="GoldQQ" pattern="[0-9]*" name="gold[' + b + ']" min="0" max="99999999" /><input type="hidden" name="odds[' + b + ']" value="' + o + '" />';
        if (b.match(/[N1|N2|N3|N4|N5|N6|SP|NA][0-9]{2,}/)) {
            r = r.replace(/name="gold.(N1|N2|N3|N4|N5|N6|SP|NA)([0-9]{2,})."/, 'name="gold[$1$2]" tabindex="$2"');
        }
        return r;
    }
    /**
     * 使用javascript捉取Query字串值
     * @param paramName param的名稱
     * @param locationStr 網址字串
     */
    function _getParamString( paramName, locationStr ){
    　　paramName = paramName.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]").toLowerCase();
    　　var reg = "[\\?&]"+paramName +"=([^&#]*)";
    　　var regex = new RegExp( reg );
    　　var regResults = regex.exec( locationStr );
    　　if( regResults == null ) return "";
    　　else return regResults [1];
    }
    GameSpace.ShowTable = function (_json) {
        if (typeof _json == 'string' && _json != null) {
        } else {
            if (_json.hall) {
                if (_isIE6) {
                    var _iframe = document.createElement("iframe");
                    _iframe.setAttribute('id', 'selectFrame');
                    _iframe.style.cssText = '\
                        position:absolute;\
                        top : 0;\
                        left : 0;\
                        width : 100%;\
                        height : 100%;\
                        filter : Alpha(opacity:0);\
                        display : none;\
                        z-index : 29999;\
                    ';
                    document.body.appendChild(_iframe);
                }
                _json.hall.bind('click', function () {
                    var tp = document.getElementById('touchPadZone');
                    if (tp.x == 1) {
                        tp.x = 0;
                        tp.style.display = 'none';
                        if (_msie6) {
                            document.getElementById('selectFrame').style.display = 'none';
                        }
                    } else {
                        tp.x = 1;
                        tp.style.display = 'block';
                        if (_msie6) {
                            document.getElementById('selectFrame').style.display = '';
                        } else {
                            $('.flexslider').flexslider({
                                selector: "#Pad.slides > div",
                                animation: "slide",
                                animationLoop : false,
                                slideshow : false
                            });
                        }
                    }
                });
            }
            if (_json.newBind) {
                for (var k in _bind) {
                    if (_json.newBind[k] != null) {
                        _bind[k] = _json.newBind[k];
                    }
                }
            }
            //ajax後端網頁
            (_json.ajax_url) && (typeof _json.ajax_url == 'string') && (_ajaxPage = _json.ajax_url);
            //ajax後端other 網頁
            (_json.other_url) && (typeof _json.other_url == 'string') && (_otherPage = _json.other_url);
            //ajax load網頁
            (_json.load_url) && (typeof _json.load_url == 'string') && (_loadPage = _json.load_url);
            //切換快速模式php
            (_json.quick_url) && (typeof _json.quick_url == 'string') && (_quickPage = _json.quick_url);
            //六合彩首頁位置
            (_json.hp) && (typeof _json.hp == 'string') && (_defaultUrl = _json.hp);
            //群組下注php
            (_json.grpAct) && (typeof _json.grpAct == 'string') && (_grpUrl = _json.grpAct);
            //快速模式form
            (_json.aForm) && (_json.aForm instanceof jQuery) && (_activeForm = _json.aForm);
            //快速輸入
            (_json.quickSP) && (_quickSP = _json.quickSP);
            //正碼特快速輸入
            (_json.quickNAS) && (_quickNAS = _json.quickNAS);
            //拖拉下注提示
            (_json.tips) && (this.tipsDiv = _json.tips);
            //input
            (_json._number) && (_input_type = _json._number);
            //生肖
            (_json.zodiac) && (_zodiac = _json.zodiac);
            if (_json.msg) {
                this.msgTag = _json.msg;
            } else {
                this.msgTag = document.getElementById('Msg');
            }
            if (_json.time) {
                this.timeTag = _json.time;
            } else {
                this.timeTag = document.getElementById('HKTime');
            }
            if (_json.gameInfo) {
                this.gameInfoTag = _json.gameInfo;
            } else {
                this.gameInfoTag = document.getElementById('game_info');
            }
            if (_json.gNum) {
                this.gNumTag = _json.gNum;
            } else {
                this.gNumTag = document.getElementById('gNumber');
            }
            if (_json.gTime) {
                this.gTimeTag = _json.gTime;
            } else {
                this.gTimeTag = document.getElementById('gametime');
            }
            if (_json.display) {
                this.displayTag = _json.display;
            } else {
                this.displayTag = document.getElementById('Game');
            }
            $(this.displayTag).bind('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', function () {
                this.className = '';
            });
            this.bindGameMenu(_json.menu);
            this.bindInnerBox(_json.inner);
            this.bindCrtype(_json.title);
            this.bindAD(_json.ad);
            this.bindBALL(_json.ball);
            this.bindGrpBtn(_json.grp);
            this.bindRule2(_json.rule);
            if (_isIE6 || _isIE7 || _isIE8) {
                $('div.round-table').append('<div class="round-top-left" /><div class="round-top-right" /><div class="round-bottom-left" /><div class="round-bottom-right" />');
            }
        }
    }
    GameSpace.ShowTable.prototype = {
        //rtype
        pageRtype : 'SP',
        //正碼特rtypeN
        rtypeN : 'N1',
        //只展现第几个table，0代表默认全部展现
        showTableN : 0,
        //gid input tag
        gidInp : null,
        //跑馬燈html tag
        msgTag : null,
        //時間 html tag
        timeTag : null,
        //game_info tag
        gameInfoTag : null,
        //遊戲期數 html tag
        gNumTag : null,
        //遊戲時間 html tag
        gTimeTag : null,
        //close timestamp
        close_timestamp : 0,
        //顯示遊戲區域 html tag
        displayTag : null,
        //正碼特分頁選單
        EL_tab : null,
        //快速區塊
        grpTag : null,
        //表格1
        tab1 : null,
        //表格2
        tab2 : null,
        //表格3
        tab3 : null,
        //表格4
        tab4 : null,
        //提示的div
        tipsDiv :null,
        //ajax的目標網頁
        targetUrl : '',
        //下注模式
        betMode : 0,
        //表單
        _form : null,
        //ajax 更新時間
        reloadTime : 10,
        //搖珠table
        rBallTab : null,
        //搖珠球號 html tag
        finTag : {'1':null,'2':null,'3':null,'4':null,'5':null,'6':null,'7':null},
        //搖珠生肖球號 html tag
        finAnTag : {'1':null,'2':null,'3':null,'4':null,'5':null,'6':null,'7':null},
        //已開獎球數
        finLen : 0,
        //生肖球號
        an2no : [],
        //D盤切換開關區
        dLineZone : null,
        //鎖住狀態
        lock : false,
        //選單
        menu : null,
        //中文玩法稱title
        c_rtype : null,
        //連碼的操作說明
        ruleCh : null,
        //動態下注模式的快選按鈕區
        grpBtn : null,
        //廣告區塊
        AD : null,
        //統計組合區塊
        BALL : null,
        //遊戲的inner box
        inner_box : null,
        //雙盤 input tag
        lineInp : null,
        //錯誤事件
        onError : function (err) {
            //self.location.reload();
            var _debug = _getParamString('debug', window.location.href.toLowerCase());
            (_debug == 1) && (alert(err));
        },
        //關盤事件
        onClose : function () {
            if (this.displayTag) {
                 $(this.displayTag).hide();
            }
        },
        //群組關盤事件
        onGroupClose : function () {
            $(this).hide();
            var _inp = this.getElementsByTagName('input');
            for ( var i = 0, m = _inp.length; i < m; i++) {
                if (_inp[i].value.length && _inp[i].type.toUpperCase() == 'NUMBER') {
                    _inp[i].value = '';
                }
            }
        },
        //時區
        _timezone : '',
        //關盤時間
        _close_time : 0,
        //關盤時間群組
        _close_times : {},
        //現在時間
        _now : 0,
        /**
         * 顯示關盤時間
         */
        _displayCloseTime : function(close_time){
            close_time = (close_time > 0)? close_time : 0;
            //var day = (close_time / 86400)>>0;
            //var hour = numFormat(((close_time % 86400)/3600)>>0);
            var hour = ((close_time/3600)>>0);
            (hour < 100) && (hour = numFormat(hour));
            var minute = numFormat(((close_time % 3600)/60)>>0);
            var second = numFormat((close_time% 60)>>0);
            //var date_format = (day?day+' ':'')+hour+':'+minute+':'+second;
            var date_format = hour+':'+minute+':'+second;
            this.EL_closeTime && (this.EL_closeTime.innerHTML = date_format);
        },
        /**
         * 顯示現在時間
         */
        _displayNow : function(now){
            var d = new Date;
            d.setTime(now);
            var date_format =
                d.getFullYear() + '-' + (d.getMonth()+1) + '-' + d.getDate() + ' ' +
                numFormat(d.getHours()) + ':' + numFormat(d.getMinutes()) + ':' + numFormat(d.getSeconds());
            this.EL_now && (this.EL_now.innerHTML = date_format);
        },
        /**
         * 綁定關盤時間網頁物件
         */
        bindDisplay_closeTime : function(el){
            if (el && (typeof el.innerHTML != 'undefined')) {
                this.EL_closeTime = el;
            }
        },
        /**
         * 綁定現在時間網頁物件
         */
        bindDisplay_now : function(el){
            if (el && typeof el.innerHTML != 'undefined') {
                this.EL_now = el;
            }
        },
        /**
         * 群組
         */
        _collection_group : {},
        /**
         * 綁定關盤群組
         */
        bindCloseGroup : function(name, el) {
            if ( ! this._collection_group[name]) {
                this._collection_group[name] = [];
            }
            if (el && el.tagName && 'TABLE' == el.tagName.toUpperCase()) {
                this._collection_group[name].push(el);
            }
        },
        /**
         * 綁定搖時搖珠網頁物件
         * @param el html div tag
         */
        bindRandomBallTable : function(el) {
            if (el && el.tagName && 'DIV' == el.tagName.toUpperCase()) {
                this.rBallTab = el;
            }
        },
        /**
         * 綁定搖時搖珠球號網頁物件
         * @param el html tag
         * @param id 第n個球號
         */
        bindFin : function(el, id) {
            if (el && (typeof el.innerHTML != 'undefined')) {
                this.finTag[id] = el;
            }
        },
        /**
         * 綁定搖時搖珠球號網頁物件
         * @param el html tag
         * @param id 第n個球號
         */
        bindFinA : function(el, id) {
            if (el && (typeof el.innerHTML != 'undefined')) {
                this.finAnTag[id] = el;
            }
        },
        /**
         * 綁定切換D盤下注開關區域
         * @param el html tag
         */
        bindSwitchD : function(el) {
            if (el && el.tagName && 'UL' == el.tagName.toUpperCase()) {
                var _this = this;
                this.dLineZone = el;
                //綁定雙盤下注事件
                $(this.dLineZone).find('a').click(function(){
                    (_this.onLineClk) && _this.onLineClk.call(this, _this);
                    return false;
                });
            }
        },
        /**
         * 點擊雙盤下注事件
         * @param me ShowTable物件
         */
        onLineClk : function (me) {
            var line = ((this.href).indexOf('#4') != -1) ? '4' : '';
            me.lineInp.each(function () {
               this.value = line;
               this.defaultValue = line;
            });;
            me.targetUrl = _ajaxPage + '?rtype=' + me.pageRtype + '&Line=' + line;
            me.run();
            $('a.ON', this.dLineZone).removeClass('ON');
            $(this).addClass('ON');
        },
        /**
         * 綁定正碼特分頁選單
         * @param el html tag
         */
        bindTab : function (el) {
            if (el && el.tagName && 'DIV' == el.tagName.toUpperCase()) {
                this.EL_tab = el;
                //綁定切換分頁功能
                var _ul = el.getElementsByTagName('ul')[0];
                var _li = _ul.getElementsByTagName('li');
                var me = this;
                var _onclick = function () {
                    if (_onSlide == 0) {
                        _onSlide = 1;
                        $('li.onTagClick', me.EL_tab).removeClass('onTagClick').addClass('unTagClick');
                        $(this).addClass('onTagClick');
                        var _now_index = parseInt(me.rtypeN.substr(1,1));
                        me.rtypeN = this.getAttribute('data-rtypeN');
                        var _new_index = parseInt(me.rtypeN.substr(1,1));
                        me.tab1.className = 'aniDissolve';
                        me.targetUrl = _ajaxPage + '?rtype=NAS&rtypeN=' + me.rtypeN;
                        me._clearGameTable();
                        me.run();
                        if (!isAnimationSupport()) {
                            setTimeout( function(){me.tab1.className = '';_onSlide = 0;},500 );
                        }
                    }
                }
                $(this.tab1).bind('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', function () {
                    this.setAttribute('class', '');
                    _onSlide = 0;
                });
                for (var i = 0, m = _li.length; i < m; i++) {
                    if (_li[i].id != 'space') {
                        _li[i].onclick = _onclick;
                    }
                }
            }
        },
        /**
         * 綁定玩法連結選單
         * @param _selector jquery的選擇器
         */
        bindGameMenu : function (_selector) {
            if (_selector instanceof jQuery) {
                this.menu = _selector;
                var me = this;
                this.menu.bind('click', function () {
                    (me.onGameLinkClk) && me.onGameLinkClk.call(this, me);
                    return false;
                });
            }
        },
        /**
         * 綁定中文玩法title
         * @param _selector jquery的選擇器
         */
        bindCrtype : function (_selector) {
            if (_selector instanceof jQuery) {
                this.c_rtype = _selector;
            }
        },
        /**
         * 綁定連碼玩法的操作說明區
         * @param _selector jquery的選擇器
         */
        bindRule2 : function (_selector) {
            if (_selector instanceof jQuery) {
                this.ruleCh = _selector;
            }
        },
        /**
         * 綁定快選按鈕區塊
         * @param _selector jquery的選擇器
         */
        bindGrpBtn : function (_selector) {
            if (_selector instanceof jQuery) {
                if (_selector.length > 0) {
                    var me = this;
                    this.grpBtn = _selector;
                    this.grpBtn.bind('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', function () {
                        if (this.className == 'toBottom') {
                             this.style.display = 'none';
                        }
                        if (this.className != 'toTop') {
                            this.className = '';
                        }
                    });
                    this.grpBtn.find('p.grp-title').bind('click', function () {
                        if (this.x != 1) {
                            me.grpBtn.animate({height:_grpBtnHeight + 'px'}, 600);
                            me.grpBtn.find('p.grp-title > b').html('▲');
                            me.isGrpBtnOpen = "true";
                            this.x = 1;
                            $(window.parent.document).find("#mainFrame").height(1150);
                        } else {
                            me.grpBtn.animate({height:'24px'}, 600);
                            me.grpBtn.find('p.grp-title > b').html('▼');
                            me.isGrpBtnOpen = "false";
                            this.x = 0;
                            $(window.parent.document).find("#mainFrame").height(620);
                        }
                    });
                    this.grpBtn.css('height', '24px');
                }
            }
        },
        /**
         * 綁定廣告區塊
         * @param _selector jquery的選擇器
         */
        bindAD : function (_selector) {
            if (_selector instanceof jQuery) {
                (_selector.length > 0) && (this.AD = _selector);
                this.AD.bind('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', function () {
                    if (this.className == 'toBottom') {
                         this.style.display = 'none';
                    }
                    if (this.className != 'toTop') {
                        this.className = '';
                    }
                });
            }
        },
        /**
         * 綁定組合窗口
         * @param _selector jquery的選擇器
         */
        bindBALL : function (_selector) {
            if (_selector instanceof jQuery) {
                (_selector.length > 0) && (this.BALL = _selector);
            }
        },
        /**
         * 綁定切換玩法的箱型inner box
         * @param _node html node
         */
        bindInnerBox : function (_node) {
            if (_node.tagName) {
                this.inner_box = _node;
                $(this.inner_box).bind('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', function () {
                    this.className = '';
                });
            }
        },
        /**
         * 綁定生肖對應號碼陣列
         * @param ary 生肖對應球號陣列
         */
        sortZodiac : function (ary) {
            if (ary == null) {
                var lunar = (new Lunar).getDateC();
                var _tmp = ['01 ,13 ,25 ,37 ,49' ,'12 ,24 ,36 ,48' ,'11 ,23 ,35 ,47' ,'10 ,22 ,34 ,46' ,'09 ,21 ,33 ,45' ,'08 ,20 ,32 ,44' ,'07 ,19 ,31 ,43' ,'06 ,18 ,30 ,42' ,'05 ,17 ,29 ,41' ,'04 ,16 ,28 ,40' ,'03 ,15 ,27 ,39' ,'02 ,14 ,26 ,38'];
                var _an = [], k = lunar.AnIndex, idx = k;
                for (var i = 0; i < 12; i++) {
                    if (k > 11) {
                        idx = k - 12;
                    } else {
                        idx = k;
                    }
                    //_an.push(_tmp[idx]);
                    _an[11-idx] = _tmp[i];
                    k++;
                }
                this.an2no = _an;
            } else {
                this.an2no = ary;
            }
        },
        /**
         * 清除關盤群組
         */
        _clearCloseGroup : function() {
            this._collection_group = {};
        },
        /**
         * 清除所有table
         */
        _clearGameTable : function() {
            for (var i = 1; i <= 4; i++) {
                var _table = this['tab' + i];
                if (_table) {
                    _table.style.cssText = '';
                    _table.parentNode.style.display = '';
                    var _tbody = _table.getElementsByTagName('tbody');
                    while (_tbody.length) {
                        _table.removeChild(_tbody[0]);
                    }
                }
            }
            var htmlFieldset = this.displayTag.getElementsByTagName('fieldset');
            var totalFieldset = htmlFieldset.length;
            for (var i = totalFieldset; i >= 1; i--) {
                htmlFieldset[i-1].parentNode.removeChild(htmlFieldset[i-1]);
            }
            this.displayTag.style.width = '';
        },
        onCountdown : function(json){/* 嚴禁寫這 */},
        /**
         * 倒數
         */
        _reciprocal : function(){
            var me = this;
            _timer_reciprocal && clearInterval(_timer_reciprocal);
            var handler = function(){
                me._now += 1;
                me._close_time -= 1;
                for (var x in me._close_times) {
                    me._close_times[x] -= 1;
                    if (0 >= me._close_times[x] && me._collection_group[x]) {
                        for (var i = 0,L = me._collection_group[x].length; i<L; i++) {
                            var _node = me._collection_group[x][i];
                            me.onGroupClose && (me.onGroupClose.call(_node));
                        }
                        delete me._collection_group[x];
                    }
                }
                me.onCountdown && me.onCountdown({'now':me._now, 'close_times':me._close_times, 'timezone':me._timezone});
                me._displayCloseTime(me._close_time);
                //me._displayNow(me._now * 1000);
            };
            handler();
            _timer_reciprocal = setInterval(handler, 1000);
        },
        EL_closeTime : null,
        EL_now : null,
        /**
         * 初使化設定
         * @param rtype 玩法
         * @param showTableN 展现表
         */
        init : function (rtype,showTableN) {
            var me = this;

            $(window.parent.document).find("#mainFrame").height(620);

            this.pageRtype = rtype;
            //gid input
            this.gidInp = document.getElementById(_bind.gameID);
            //this.tab1 = tab1;
            this.tab1 = document.getElementById(_bind.table1ID);
            //this.tab2 = tab2;
            this.tab2 = document.getElementById(_bind.table2ID);
            //this.tab3 = tab3;
            this.tab3 = document.getElementById(_bind.table3ID);
            //this.tab4 = tab4;
            this.tab4 = document.getElementById(_bind.table4ID);
            var act_url = _ajaxPage + '?rtype=' + rtype;
            if(showTableN){
                this.showTableN = showTableN;
            }
            (rtype == 'NAS') && (act_url += '&rtypeN=N1');
            (_bind.lineInpSelector) && (this.lineInp = $(_bind.lineInpSelector));
            this.targetUrl = act_url;
            if (rtype == 'SP' || rtype=="SPbside") {
                this.bindRandomBallTable(document.getElementById(_bind.rBallID));
                $(_bind.ballID).each(function(){
                    me.bindFin(document.getElementById(this), (parseInt(this.substr(3,1)) + 1));
                });
                $(_bind.ballAID).each(function(){
                    me.bindFinA(document.getElementById(this), (parseInt(this.substr(3,1)) + 1));
                });
                //綁定table2關盤事件
                this.bindCloseGroup('2', this.tab2.parentNode);
                (this.lineInp) && (this.lineInp.length) && (this.targetUrl += '&Line=' + this.lineInp.val());
            }
            //綁定分頁選單
            this.bindTab(document.getElementById(_bind.tabID));
            //綁定雙盤下注
            $(_bind.lineSelector).each(function(){me.bindSwitchD(this);});
            //設定生肖的球號
            this.sortZodiac(_zodiac);
            //綁定切換快速模式按鈕事件
            $(_bind.quickSelector).each(function() {
                this.onclick = function () {
                    (me.onSwitchModeClk) && me.onSwitchModeClk.call(this, me);
                }
            });
            $(_bind.fastSelector).each(function () {
                this.onclick = function () {
                    (me.onFastBtnClk) && me.onFastBtnClk.call(this, me);
                }
            });
            //動態下注表單
            var _form = $(_bind.formSelector);
            (_form.length) && (this._form = _form.get(0));
            //詳細設定
            $(_bind.dtShow).unbind('click').bind('click', function () {
                self.ViewBox.single(this);
                return false;
            });
        },
        /**
         * 切換下注模式
         * @param me ShowTable物件
         */
        onSwitchModeClk : function (me) {
            var _mode = (me.betMode == 0) ? 1 : 0, _back = _defaultUrl, _fquick = 0, _line = '';
            (this.getAttribute('id') == 'fquick') && (_fquick = 1);
            (me.lineInp) && (me.lineInp.length) && (me.pageRtype == 'SP') && (_line = me.lineInp.val());
            $.ajax({
                url : _quickPage + '?mode=' + _mode + '&rtype=' + me.pageRtype + '&gtype=LT&back=' + _back + '&fquick=' + _fquick + '&Line=' + _line ,
                type : 'GET',
                dataType : 'script'
            });
        },
        /**
         * 切換快速下注
         * @param me ShowTable物件
         */
        onFastBtnClk : function (me) {
            var url;
            if (me.pageRtype == 'SP' || me.pageRtype == 'NA'){
                url = _quickSP + '?btype=' + me.pageRtype + '&gid=' + me.gidInp.value;
             } else if (me.pageRtype == 'NAS'){
                url = _quickNAS + '?btype=' + me.rtypeN + '&gid=' + me.gidInp.value;
            }
            $.ajax({
                url : url,
                type : 'GET',
                dataType : 'script'
            });
        },
        /**
         * 設定下注模式
         * @param mode 下注模式
         */
        setBetMode : function (mode) {
            this.betMode = mode;
            if (mode) {
                var _this = this;
                this.grpTag = document.getElementById('GrpBtn');
            }
        },
        /**
         * ajax更新盤勢
         */
        run : function () {
            _timer && clearInterval(_timer);
            var _pageRtype = this.pageRtype;
            var _dataType = 'json';
            var _this = this;
            var handler = function () {
                $.ajax({
                    url:_this.targetUrl,
                    dataType:_dataType,
                    type:'GET',
                    beforeSend: function (request) {
                        //設定檔頭，表示要回傳json
                        request.setRequestHeader("AJAXTYPE", "json");
                    },
                    error : function(xhr, ajaxOptions, thrownError){
                        (_this.onError instanceof Function) && _this.onError(thrownError);
                    },
                    success : function (res) {
                        if(res['isCloseAdmin'] == "true" || res['isCloseNoGame'] == "true"){
                            _this.tab1.parentNode.style.display = 'none';
                            _this.tab2.parentNode.style.display = 'none';
                            _this.tab3.parentNode.style.display = 'none';
                            _this.tab4.parentNode.style.display = 'none';
                            $("#GrpBtn").hide();
                            $("#Msg").html(res['Msg']);
                            if(!document.getElementById("isCloseSpan")){
                                $("#newForm").after('<div style="border: 2px red solid;padding: 5px;text-align: center;" id="isCloseSpan"> 六合彩已关闭，请勿下注。关闭原因：' + res['reason'] + '</div>');
                            }
                            return;
                        }

                        if ( res['kickup'] && res['kickup'] == 1) {
                            self.location.reload();
                            return;
                        }
                        if (typeof res['repeat'] != 'undefined') {
                            eval(res['repeat']);
                            return;
                        }
                        if (typeof res['Error'] != 'undefined') {
                            return;
                        }
                        if (res['Reload'] == 1) {
                            _this.run();
                            return;
                        }
                        if ($.inArray(_pageRtype, _scriptRtype) != -1) {
                            _this.defaultChk(res);
                        } else {
                            _this.defaultChk(res);
                            var mainFrameHeigth = 620;
                            switch (_pageRtype) {
                                case 'SP' :
                                    mainFrameHeigth = _this.isGrpBtnOpen == "true" ? 1150 : 620;
                                    _this.displaySP(res);
                                    break;
                                case 'SPbside' :
                                    mainFrameHeigth = _this.isGrpBtnOpen == "true" ? 1150 : 620;
                                    _this.displaySP(res);
                                    break;
                                case 'NA' :
                                    mainFrameHeigth = _this.isGrpBtnOpen == "true" ? 1150 : 620;
                                    _this.displayNA(res);
                                    break;
                                case 'NAS' :
                                    mainFrameHeigth = _this.isGrpBtnOpen == "true" ? 1150 : 620;
                                    _this.displayNAS(res);
                                    break;
                                case 'NO' :
                                    _this.displayNO(res);
                                    break;
                                case 'SPA' :
                                    _this.displaySPA(res);
                                    break;
                                case 'SPB' :
                                    mainFrameHeigth = 620;
                                    _this.displaySPB(res);
                                    break;
                                case 'HB' :
                                    mainFrameHeigth = 620;
                                    _this.displayHB(res);
                                    break;
                                case 'C7' :
                                    _this.displayC7(res);
                                    break;
                                case 'OEOU' :
                                    _this.displayOE(res);
                                    break;
                                default:
                                    break;
                            }
                            $(window.parent.document).find("#mainFrame").height(mainFrameHeigth);
                        }
                    }
                });
            }
            handler();
            _timer = setInterval(handler, _this.reloadTime*1000);
        },
        /**
         * 期數開放event
         * @param time 時間
         */
        _onGameOpen : function(time) {
            if (time > 0) {
                if (this.rBallTab) {
                    this.rBallTab.style.display = 'none';
                }
            }
            if (this.displayTag) {
                this.displayTag.style.display = '';
                if (0 >= this._close_times[3] && this.pageRtype == 'OEOU') {
                    this.tab2.parentNode.style.display = 'none';
                    this.tab3.parentNode.style.display = 'none';
                }
                if (0 >= this._close_times[1]) {
                    this.tab1.parentNode.style.display = 'none';
                } 
                if (0 >= this._close_times[2]) {
                    this.tab2.parentNode.style.display = 'none';
                    this.tab3.parentNode.style.display = 'none';
                } else {
                    if (this.pageRtype == 'SP' || this.pageRtype == 'SPbside') {
                        this.tab2.parentNode.style.display = '';
                    }
                }
                if (this.grpBtn != null) {
                    if (this.pageRtype == 'SP' || this.pageRtype == 'SPbside' || this.pageRtype == 'NAS' || this.pageRtype == 'NA') {
                        this.grpBtn.show();
                    } else {
                        this.grpBtn.hide();
                        this.grpBtn.find('p.grp-title').get(0).x = 0;
                        this.grpBtn.find('p.grp-title > b').html('▼');
                        this.grpBtn.css('height', '24px');
                    }
                }
            }
        },
        /**
         * 啟動即時搖珠event
         */
        onRandomBall : function() {
            if (this.rBallTab && this.rBallTab.tagName) {
                this.rBallTab.style.display = '';
            } else {
                return;
            }
            for ( var i = 1; i <= 7; i++) {
                if (this.finTag[i] && this.finTag[i].tagName && this.finAnTag[i] && this.finAnTag[i].tagName) {
                } else {
                    return;
                }
            }
            var _this = this;
            (_timer_ball) && clearInterval(_timer_ball);
            var handler = function() {
                for (var i = (_this.finLen+1); i <= 7; i++) {
                    _this.finTag[i].innerHTML = '<span>' + Math.ceil( Math.random() * 100 % 49 ) + '</span>';
                }
            }
            _timer_ball = setInterval(handler, 60);
        },
        /**
         * 停止搖珠顯示球號
         * @param r 球號陣列
         * @param a 球號生肖陣列
         */
        stopRandomBall : function (r, a) {
            this.finLen = r.length;
            if (_timer_ball && this.finLen == 7){
                clearInterval(_timer_ball);
            }
            if (this.finLen > 0) {
                var _col = col, _class, idx;
                for (var i = 1, t = r.length; i <= t; i++) {
                    idx = i - 1;
                    _class = 'bColor' + _col[r[idx]];
                    this.finTag[i].className = _class;
                    this.finTag[i].innerHTML = '<span>' + numFormat(r[idx]) + '</span>';
                    this.finAnTag[i].innerHTML = a[idx];
                }
            }
        },
        /**
         * 共用的盤勢檢查
         * @param res 盤勢陣列
         */
        defaultChk : function (res) {
            if (this.dLineZone && ('SP' == this.pageRtype || this.pageRtype == 'SPbside')) {
                $(this.dLineZone).show();
                if (res['BetLineD'] != 'Y') {
                    self.location.href = _defaultUrl;
                    return;
                }
            } else if (this.dLineZone) {
                this.dLineZone.style.display = 'none';
                $('a.ON', this.dLineZone).each(function(){
                    this.className = '';
                });
                $('a', this.dLineZone)[0].className = 'ON';
            } else if ('SP' == this.pageRtype || this.pageRtype == 'SPbside') {
                if (res['BetLineD'] == 'Y') {
                    self.location.href = _defaultUrl;
                    return;
                }
            }
            if ('SP' == this.pageRtype || this.pageRtype == 'SPbside') {
                $('#fquick').show();
            } else {
                $('#fquick').hide();
            }
            this.close_timestamp = Math.round(res.iTime + res.CloseTime[1]) * 1000;
            //正碼特顯示分頁選單
            if (this.EL_tab && 'NAS' == this.pageRtype) {
                this.EL_tab.style.display = '';
            } else if (this.EL_tab) {
                this.EL_tab.style.display = 'none';
            }
            this._timezone = res.timezone;
            this._close_time = res.CloseTime[1];
            this._close_times = res.CloseTime;
            this._now = res.iTime;
            this._reciprocal();
            if (this.rBallTab && this.rBallTab.tagName && (this.pageRtype != 'SP' || this.pageRtype != 'SPbside')) {
                this.rBallTab.style.display = 'none';
            }
            if (this.msgTag.innerHTML != res['Msg'] && res['Msg'] != '') {
                this.msgTag.innerHTML = res['Msg'];
            }
            if (res['gTime'] == '' || res['num'] == 0 || 0 >= res.CloseTime[1]) {
                this.displayTag.style.display = 'none';
                if (this.betMode == 1) {
                    this.grpTag.style.display = 'none';
                    document.onkeyup = function () {
                    };
                }
                if (this.dLineZone) {
                    this.dLineZone.style.display = 'none';
                }
                this.gameInfoTag.style.display = 'none';
                return;
            } else {
                if (this.gidInp) {
                    this.gidInp.value = res['gID'];
                }
                this._onGameOpen(res.CloseTime['2']);
                this.gameInfoTag.style.display = '';
                this.timeTag.innerHTML = res['HKtime'];
                this.gNumTag.innerHTML = res['gNum'];
                this.gTimeTag.innerHTML = res['gTime'];
            }
        },
        /**
         * 更新賠率
         * @param ary 球號id陣列
         */
        updateOdds : function(ary, res) {
            var _len = ary.length;
            var doc = document;
            var _betMode = this.betMode;
            var sConcede, oddsTag, bgTag, oddsInp, goldInp, fm, _diff = 0;
            if (_betMode == 1) {
                fm = this._form;
            }
            for (var i = 0; i < _len; i++) {
                sConcede = ary[i];
                oddsTag = doc.getElementById(sConcede);
                bgTag = doc.getElementById(sConcede + '_bg');
                if ((typeof res[sConcede] != 'undefined') && (res[sConcede] != oddsTag.innerHTML)) {
                    oddsTag.innerHTML = res[sConcede];
                    if (_betMode == 1) {
                        oddsInp = fm['odds[' + sConcede + ']'];
                        goldInp = fm['gold[' + sConcede + ']'];
                        oddsInp.value =  res[sConcede];
                        (oddsInp.value) && (oddsInp.defaultValue =  oddsInp.value);
                        if ( res[sConcede] == '') {
                            goldInp.value = '';
                            goldInp.disabled = true;
                        } else if (goldInp.disabled == true) {
                            goldInp.disabled = false;
                        }
                    }
                    bgTag.style.backgroundColor = "#FFFFAA";
                    _diff++;
                } else {
                    bgTag.style.backgroundColor = "";
                }
            }
            if (_diff > 0 && !(res['gTime'] == '' || res['num'] == 0)) {
                //document.getElementById("ding").innerHTML = "";
                //document.getElementById("ding").innerHTML = "<embed name='ding_snd' src='/member/ding.swf' loop='false' autostart='true'></embed>";
                Sound().play('/member/ding.swf');
            }
        },
        /**
         * 顯示單雙大小盤勢
         * @param res 盤勢陣列
         */
        displayOE : function (res) {
            var _Concede = Concede[this.pageRtype];
            var _betMode = this.betMode;
            if (document.getElementById('SP_ODD')) {
                this.updateOdds(_Concede, res);
            } else if (typeof res['SP_ODD'] != 'undefined') {
                var _tbody = document.createElement('tbody'),
                    _tr = document.createElement('tr'),
                    _td = document.createElement('td'),
                    _col = col, tbody, tr, td, k = 0, me =this;
                tbody = _tbody.cloneNode(1);
                _tr.style.cssText = 'font-size:12px;text-align:center';
                tr = _tr.cloneNode(1);
                tr.className = 'title_tr';
                for (var i = 0; i < 4; i++) {
                    td = _td.cloneNode(1);
                    td.innerHTML = Lang('betNum');
                    tr.appendChild(td);
                    td = _td.cloneNode(1);
                    td.innerHTML = Lang('odds_value');
                    tr.appendChild(td);
                    if (_betMode == 1) {
                        td = _td.cloneNode(1);
                        td.innerHTML = Lang('amount');
                        tr.appendChild(td);
                    }
                }
                tbody.appendChild(tr);
                var _over = function (e) {
                    (me.onOver) && (me.tipsDiv) && me.onOver.call(me.tipsDiv, e);
                }
                var _out = function () {
                    (me.onOut) && (me.tipsDiv) && me.onOut.call(me.tipsDiv);
                }
                var _name = [Lang('SP_ODD'), Lang('SP_EVEN'), Lang('SP_OVER'), Lang('SP_UNDER'),
                             Lang('SP_SODD'), Lang('SP_SEVEN'), Lang('SP_SOVER'), Lang('SP_SUNDER'),
                             Lang('NA_ODD'), Lang('NA_EVEN'), Lang('NA_OVER'), Lang('NA_UNDER')];
                for (i = 0; i < 2; i++) {
                    tr = _tr.cloneNode(1);
                    for (var j = 0; j < 4; j++) {
                        sConcede = _Concede[k];
                        td = _td.cloneNode(1);
                        td.className = 'title_td';
                        if (_betMode == 1) {
                            td.innerHTML = '<span>' + _name[k] + '</span>';
                        } else {
                            td.innerHTML = '<span class="betMove" data-concede="' + sConcede + '">' + _name[k] + '</span>';
                            td.onmouseover = _over;
                            td.onmouseout = _out;
                        }
                        tr.appendChild(td);
                        td = _td.cloneNode(1);
                        td.setAttribute('id', sConcede + '_bg');
                        td.appendChild(oddsNode(sConcede, res[sConcede], _betMode));
                        tr.appendChild(td);
                        if (_betMode == 1) {
                            td = _td.cloneNode(1);
                            td.innerHTML = inpStr(sConcede, res[sConcede]);
                            tr.appendChild(td);
                        }
                        k++;
                    }
                    tbody.appendChild(tr);
                }
                this.tab1.appendChild(tbody);
                //this.tab2.style.marginTop = '8px';
                tbody = _tbody.cloneNode(1);
                tr = _tr.cloneNode(1);
                tr.className = 'title_tr';
                for (i = 0; i < 4; i++) {
                    td = _td.cloneNode(1);
                    td.innerHTML = Lang('betNum');
                    tr.appendChild(td);
                    td = _td.cloneNode(1);
                    td.innerHTML = Lang('odds_value');
                    tr.appendChild(td);
                    if (_betMode == 1) {
                        td = _td.cloneNode(1);
                        td.innerHTML = Lang('amount');
                        tr.appendChild(td);
                    }
                }
                tbody.appendChild(tr);
                tr = _tr.cloneNode(1);
                for (i = 0; i < 4; i++) {
                    sConcede = _Concede[k];
                    td = _td.cloneNode(1);
                    td.className = 'title_td';
                    if (_betMode == 1) {
                        td.innerHTML = '<span>' + _name[k] + '</span>';
                    } else {
                        td.innerHTML = '<span class="betMove" data-concede="' + sConcede + '">' + _name[k] + '</span>';
                        td.onmouseover = _over;
                        td.onmouseout = _out;
                    }
                    tr.appendChild(td);
                    td = _td.cloneNode(1);
                    td.setAttribute('id', sConcede + '_bg');
                    td.appendChild(oddsNode(sConcede, res[sConcede], _betMode));
                    tr.appendChild(td);
                    if (_betMode == 1) {
                        td = _td.cloneNode(1);
                        td.innerHTML = inpStr(sConcede, res[sConcede]);
                        tr.appendChild(td);
                    }
                    k++;
                }
                tbody.appendChild(tr);
                this.tab2.appendChild(tbody);
                //this.tab3.style.marginTop = '8px';
                tbody = _tbody.cloneNode(1);
                tr = _tr.cloneNode(1);
                tr.className = 'title_tr';
                if (_betMode == 1) {
                    td = _td.cloneNode(1);
                    td.innerHTML = '&nbsp;';
                    tr.appendChild(td);
                }
                for (i = 1; i <= 6; i++) {
                    td = _td.cloneNode(1);
                    td.colSpan = 2;
                    td.innerHTML = Lang('game_type8_' + i);
                    tr.appendChild(td);
                }
                tbody.appendChild(tr);
                tr = _tr.cloneNode(1);
                tr.style.color = '#000';
                for (i = 0; i < 6; i++) {
                    if (_betMode == 1) {
                        if (i == 0) {
                            td = _td.cloneNode(1);
                            td.className = 'title_td';
                            td.innerHTML = Lang('betNum');
                            tr.appendChild(td);
                        }
                        td = _td.cloneNode(1);
                        td.innerHTML = Lang('odds_value');
                        tr.appendChild(td);
                        td = _td.cloneNode(1);
                        td.innerHTML = Lang('amount');
                        tr.appendChild(td);
                    } else {
                        td = _td.cloneNode(1);
                        td.className = 'title_td';
                        td.innerHTML = Lang('betNum');
                        tr.appendChild(td);
                        td = _td.cloneNode(1);
                        td.innerHTML = Lang('odds_value');
                        tr.appendChild(td);
                    }
                }
                tbody.appendChild(tr);
                var type_array = ["ODD", "EVEN", "OVER", "UNDER", "SODD", "SEVEN", "SOVER", "SUNDER"];
                var no_ta = [Lang('odd'), Lang('even'), Lang('over'), Lang('under'),
                             Lang('SP_SODD'),Lang('SP_SEVEN'), Lang('SP_SOVER'),Lang('SP_SUNDER')];
                for (i = 0; i < 8; i++) {
                    tr = _tr.cloneNode(1);
                    for (j = 1; j <= 6; j++) {
                        sConcede = 'NO' + j + '_' + type_array[i];
                        if (_betMode == 1) {
                            if (j == 1) {
                                td = _td.cloneNode(1);
                                td.className = 'title_td';
                                td.innerHTML = no_ta[i];
                                tr.appendChild(td);
                            }
                        } else {
                            td = _td.cloneNode(1);
                            td.className = 'title_td';
                            td.innerHTML = '<span class="betMove" data-concede="' + sConcede + '">' + no_ta[i] + '</span>';
                            td.onmouseover = _over;
                            td.onmouseout = _out;
                            tr.appendChild(td);
                        }
                        td = _td.cloneNode(1);
                        td.setAttribute('id', sConcede + '_bg');
                        td.appendChild(oddsNode(sConcede, res[sConcede], _betMode));
                        tr.appendChild(td);
                        if (_betMode == 1) {
                            td = _td.cloneNode(1);
                            td.innerHTML = inpStr(sConcede, res[sConcede]);
                            tr.appendChild(td);
                        }
                    }
                    tbody.appendChild(tr);
                }
                this.tab3.appendChild(tbody);
                if (_betMode == 1) {
                    //tbody = _tbody.cloneNode(1);
                    //tr = _tr.cloneNode(1);
                    //td = _td.cloneNode(1);
                    //td.style.backgroundColor = '#fff';
                    //td.className = 'Send';
                    //td.innerHTML = '<input class="no" type="reset" value="' + Lang('cancel') + '"/><input class="yes" type="button" name="btnBet" value="' + Lang('bet') + '"/>';
                    //tr.appendChild(td);
                    //tbody.appendChild(tr);
                    //this.tab4.appendChild(tbody);
                    self.GoldUI.installInput($('input.GoldQQ'));
                    var betObj = betSpace.bet.instance('OEOU');
                    betObj.initActive(this._form);
                    this.tab4.parentNode.style.display = 'none';
                } else {
                    this.tab4.parentNode.style.display = 'none';
                }
            } else {
                this.displayTag.style.display = 'none';
            }
        },
        /**
         * 顯示特別號盤勢
         * @param res 盤勢陣列
         */
        displaySP : function (res) {
            var _Concede = Concede[this.pageRtype];
            var _betMode = this.betMode;
            if (res.CloseTime['3'] <= 0) {
                this.onRandomBall();
            }
            if (res.lenb > 0) {
                this.stopRandomBall(res.result, res.resultAN);
            }
            if (document.getElementById('SP01')) {
                this.updateOdds(_Concede, res);
            } else if (typeof res['SP01'] != 'undefined') {
                if (_betMode == 1) {
                    //this.displayTag.style.width = '75%';
                }
                var _tbody = document.createElement('tbody');
                var _tr = document.createElement('tr');
                var _td = document.createElement('td');
                var _col = col;
                var tbody, td, tr, k, l, _class, _n;
                var me = this;
                var _over = function (e) {
                    (me.onOver) && (me.tipsDiv) && me.onOver.call(me.tipsDiv, e);
                }
                var _out = function () {
                    (me.onOut) && (me.tipsDiv) && me.onOut.call(me.tipsDiv);
                }
                tbody = _tbody.cloneNode(1);
                tr = _tr.cloneNode(1);
                tr.setAttribute('class', 'title_tr');
                tr.setAttribute('className', 'title_tr');
                for ( var i = 0; i < 5; i++) {
                    td = _td.cloneNode(1);
                    td.innerHTML = Lang('betNum');
                    tr.appendChild(td);
                    td = _td.cloneNode(1);
                    td.innerHTML = Lang('odds_value');
                    tr.appendChild(td);
                    if (_betMode == 1) {
                        td = _td.cloneNode(1);
                        td.innerHTML = Lang('amount');
                        tr.appendChild(td);
                    }
                }
                tbody.appendChild(tr);
                for (var i = 0; i < 10; i++) {
                    tr = _tr.cloneNode(1);
                    for( var j = 0; j < 5; j++) {
                        k = j * 10 + i + 1;
                        l = k -1;
                        if (k == 50) {
                            td = _td.cloneNode(1);
                            td.setAttribute('colSpan', 2);
                            if (_betMode == 1) {
                                td.setAttribute('colSpan', 3);
                                //td.className = 'Send';
                                //td.innerHTML = '<input class="no" type="reset" value="' + Lang('cancel') + '"/><input class="yes" type="button" name="btnBet" value="' + Lang('bet') + '"/>';
                            }
                            tr.appendChild(td);
                            break;
                        }
                        _class = 'bColor' + _col[k];
                        _n = numFormat(k);
                        td = _td.cloneNode(1);
                        td.setAttribute('class', _class);
                        td.setAttribute('className', _class);
                        sConcede = _Concede[l];
                        if (_betMode == 1) {
                            td.innerHTML = '<span>' + _n + '</span>';
                        } else {
                            td.innerHTML = '<span class="betMove" data-concede="' + sConcede + '">' + _n + '</span>';
                            td.onmouseover = _over;
                            td.onmouseout = _out;
                        }
                        tr.appendChild(td);
                        td = _td.cloneNode(1);
                        td.setAttribute('id', sConcede + '_bg');
                        td.appendChild(oddsNode(sConcede, res[sConcede], _betMode));
                        tr.appendChild(td);
                        if (_betMode == 1) {
                            td = _td.cloneNode(1);
                            td.innerHTML = inpStr(sConcede, res[sConcede]);
                            tr.appendChild(td);
                        }
                    }
                    tbody.appendChild(tr);
                }
                this.tab1.appendChild(tbody);
                //this.tab2.style.marginTop = '8px';
                tbody = _tbody.cloneNode(1);
                k = 0;
                var _name = [Lang('SP_ODD'), Lang('SP_EVEN'), Lang('SP_OVER'), Lang('SP_UNDER'), Lang('fover'),
                             Lang('SP_SODD'), Lang('SP_SEVEN'), Lang('SP_SOVER'), Lang('SP_SUNDER'), Lang('funder'),
                             Lang('HS_EO'), Lang('HS_EU'), Lang('HS_OO'), Lang('HS_OU')];
                for (var i = 0; i < 3; i++) {
                    tr = _tr.cloneNode(1);
                    for (var j = 0; j < 5; j++) {
                        if (i == 2 && j == 4) {
                            td = _td.cloneNode(1);
                            if (_betMode == 1) {
                                td.setAttribute('colSpan', 3);
                            } else {
                                td.setAttribute('colSpan', 2);
                            }
                            tr.appendChild(td);
                            break;
                        }
                        sConcede = _Concede[k+49];
                        td = _td.cloneNode(1);
                        td.setAttribute('class', 'BallTD');
                        td.setAttribute('className', 'BallTD');
                        if (_betMode == 1) {
                            td.innerHTML = '<span>' + _name[k] + '</span>';
                        } else {
                            td.innerHTML = '<span class="betMove" data-concede="' + sConcede + '">' + _name[k] + '</span>';
                            td.onmouseover = _over;
                            td.onmouseout = _out;
                        }
                        tr.appendChild(td);
                        td = _td.cloneNode(1);
                        td.setAttribute('id', sConcede + '_bg');
                        td.appendChild(oddsNode(sConcede, res[sConcede], _betMode));
                        tr.appendChild(td);
                        if (_betMode == 1) {
                            td = _td.cloneNode(1);
                            td.innerHTML = inpStr(sConcede, res[sConcede]);
                            tr.appendChild(td);
                        }
                        k++;
                    }
                    tbody.appendChild(tr);
                }
                this.tab2.appendChild(tbody);
                this.tab3.parentNode.style.display = 'none'
                this.tab4.parentNode.style.display = 'none'
                if (_betMode == 1) {
                    self.GoldUI.installInput($('input.GoldQQ'));
                    var betObj = betSpace.bet.instance('SP');
                    betObj.initActive(this._form);
                }
            } else {
                this.displayTag.style.display = 'none';
            }
        },
        /**
         * 顯示正碼特盤勢
         * @param res 盤勢陣列
         */
        displayNAS : function (res) {
            var _Concede = Concede[this.pageRtype][this.rtypeN];
            var _betMode = this.betMode;
            if (document.getElementById(this.rtypeN + '01')) {
                this.updateOdds(_Concede, res);
            } else if (typeof res[this.rtypeN + '01'] != 'undefined') {
                if (_betMode == 1) {
                    //this.displayTag.style.width = '75%';
                }
                var _tbody = document.createElement('tbody');
                var _tr = document.createElement('tr');
                var _td = document.createElement('td');
                var _col = col;
                var td, tr, k, l, _class, _n;
                var me = this;
                var _over = function (e) {
                    (me.onOver) && (me.tipsDiv) && me.onOver.call(me.tipsDiv, e);
                }
                var _out = function () {
                    (me.onOut) && (me.tipsDiv) && me.onOut.call(me.tipsDiv);
                }
                tbody = _tbody.cloneNode(1);
                tr = _tr.cloneNode(1);
                tr.setAttribute('class', 'title_tr');
                tr.setAttribute('className', 'title_tr');
                for ( var i = 0; i < 5; i++) {
                    td = _td.cloneNode(1);
                    td.innerHTML = Lang('betNum');
                    tr.appendChild(td);
                    td = _td.cloneNode(1);
                    td.innerHTML = Lang('odds_value');
                    tr.appendChild(td);
                    if (_betMode == 1) {
                        td = _td.cloneNode(1);
                        td.innerHTML = Lang('amount');
                        tr.appendChild(td);
                    }
                }
                tbody.appendChild(tr);
                for (var i = 0; i < 10; i++) {
                    tr = _tr.cloneNode(1);
                    for( var j = 0; j < 5; j++) {
                        k = j * 10 + i + 1;
                        l = k -1;
                        if (k == 50) {
                            td = _td.cloneNode(1);
                            td.setAttribute('colSpan', 2);
                            if (_betMode == 1) {
                                td.setAttribute('colSpan', 3);
                                //td.className = 'Send';
                                //td.innerHTML = '<input class="no" type="reset" value="' + Lang('cancel') + '"/><input class="yes" type="button" name="btnBet" value="' + Lang('bet') + '"/>';
                            }
                            tr.appendChild(td);
                            break;
                        }
                        _class = 'bColor' + _col[k];
                        _n = numFormat(k);
                        td = _td.cloneNode(1);
                        td.setAttribute('class', _class);
                        td.setAttribute('className', _class);
                        sConcede = _Concede[l];
                        if (_betMode == 1) {
                            td.innerHTML = '<span>' + _n + '</span>';
                        } else {
                            td.innerHTML = '<span class="betMove" data-concede="' + sConcede + '">' + _n + '</span>';
                            td.onmouseover = _over;
                            td.onmouseout = _out;
                        }
                        tr.appendChild(td);
                        td = _td.cloneNode(1);
                        td.setAttribute('id', sConcede + '_bg');
                        td.appendChild(oddsNode(sConcede, res[sConcede], _betMode));
                        tr.appendChild(td);
                        if (_betMode == 1) {
                            td = _td.cloneNode(1);
                            td.innerHTML = inpStr(sConcede, res[sConcede]);
                            tr.appendChild(td);
                        }
                    }
                    tbody.appendChild(tr);
                }
                this.tab1.appendChild(tbody);
                this.tab2.parentNode.style.display = 'none'
                this.tab3.parentNode.style.display = 'none'
                this.tab4.parentNode.style.display = 'none'
                if (_betMode == 1) {
                    self.GoldUI.installInput($('input.GoldQQ'));
                    var betObj = betSpace.bet.instance(this.rtypeN);
                    betObj.initActive(this._form);
                }
            } else {
                this.displayTag.style.display = 'none';
            }
        },
        /**
         * 顯示正碼盤勢
         * @param res 盤勢陣列
         */
        displayNA : function (res) {
            var _Concede = Concede[this.pageRtype];
            var _betMode = this.betMode;
            if (document.getElementById('NA01')) {
                this.updateOdds(_Concede, res);
            } else if (typeof res['NA01'] != 'undefined') {
                if (_betMode == 1) {
                    //this.displayTag.style.width = '75%';
                }
                if (_betMode == 0) {
                    var fieldset = _fieldset.cloneNode(1),
                        nav = document.createElement('nav'),
                        _b = document.createElement('b');
                    var F = ["A1", "A2", "A3", "A4", "A5", "A6", "A7", "A8", "A9", "AA", "AB", "AC"], bTag;
                    var me = this;
                    for (var h = 0; h < 12; h++) {
                        bTag = _b.cloneNode(1);
                        bTag.x = F[h];
                        $(bTag).attr('data-TYPE', 'NA');
                        (h == 0) && (bTag.className = 'first');
                        (h == 11) && (bTag.className = 'last');
                        bTag.innerHTML = Lang('game_type11_' + F[h]);
                        bTag.onclick = function () {
                            (me.onBtagClk) && me.onBtagClk.call(this, me);
                        }
                        nav.appendChild(bTag);
                    }
                    fieldset.className = 'NA';
                    fieldset.appendChild(nav);
                    this.displayTag.insertBefore(fieldset, this.tab1.parentNode);
                }
                var _over = function (e) {
                    (me.onOver) && (me.tipsDiv) && me.onOver.call(me.tipsDiv, e);
                }
                var _out = function () {
                    (me.onOut) && (me.tipsDiv) && me.onOut.call(me.tipsDiv);
                }
                var _tbody = document.createElement('tbody');
                var _tr = document.createElement('tr');
                var _td = document.createElement('td');
                var _col = col;
                var td, tr, tbody, k, l, _class, _n;
                tbody = _tbody.cloneNode(1);
                tr = _tr.cloneNode(1);
                tr.setAttribute('class', 'title_tr');
                tr.setAttribute('className', 'title_tr');
                for ( var i = 0; i < 5; i++) {
                    td = _td.cloneNode(1);
                    td.innerHTML = Lang('betNum');
                    tr.appendChild(td);
                    td = _td.cloneNode(1);
                    td.innerHTML = Lang('odds_value');
                    tr.appendChild(td);
                    if (_betMode == 1) {
                        td = _td.cloneNode(1);
                        td.innerHTML = Lang('amount');
                        tr.appendChild(td);
                    }
                }
                tbody.appendChild(tr);
                for (var i = 0; i < 10; i++) {
                    tr = _tr.cloneNode(1);
                    for( var j = 0; j < 5; j++) {
                        k = j * 10 + i + 1;
                        l = k -1;
                        if (k == 50) {
                            td = _td.cloneNode(1);
                            td.setAttribute('colSpan', 2);
                            if (_betMode == 1) {
                                td.setAttribute('colSpan', 3);
                                //td.className = 'Send';
                                //td.innerHTML = '<input class="no" type="reset" value="' + Lang('cancel') + '"/><input class="yes" type="button" name="btnBet" value="' + Lang('bet') + '"/>';
                            }
                            tr.appendChild(td);
                            break;
                        }
                        _class = 'bColor' + _col[k];
                        _n = numFormat(k);
                        td = _td.cloneNode(1);
                        td.setAttribute('class', _class);
                        td.setAttribute('className', _class);
                        sConcede = _Concede[l];
                        if (_betMode == 1) {
                            td.innerHTML = '<span>' + _n + '</span>';
                        } else {
                            td.innerHTML = '<span class="betMove" data-concede="' + sConcede + '">' + _n + '</span>';
                            td.onmouseover = _over;
                            td.onmouseout = _out;
                        }
                        tr.appendChild(td);
                        td = _td.cloneNode(1);
                        td.setAttribute('id', sConcede + '_bg');
                        td.appendChild(oddsNode(sConcede, res[sConcede], _betMode));
                        tr.appendChild(td);
                        if (_betMode == 1) {
                            td = _td.cloneNode(1);
                            td.innerHTML = inpStr(sConcede, res[sConcede]);
                            tr.appendChild(td);
                        }
                    }
                    tbody.appendChild(tr);
                }
                this.tab1.appendChild(tbody);
                //this.tab2.style.marginTop = '12px';
                tbody = _tbody.cloneNode(1);
                k = 0;
                var _name = [Lang('NA_ODD'), Lang('NA_EVEN'), Lang('NA_OVER'), Lang('NA_UNDER')];
                for (var i = 0; i < 1; i++) {
                    tr = _tr.cloneNode(1);
                    for (var j = 0; j < 4; j++) {
                        sConcede = _Concede[k+49];
                        td = _td.cloneNode(1);
                        td.setAttribute('class', 'BallTD');
                        td.setAttribute('className', 'BallTD');
                        if (_betMode == 1) {
                            td.innerHTML = '<span>' + _name[k] + '</span>';
                        } else {
                            td.innerHTML = '<span class="betMove" data-concede="' + sConcede + '">' + _name[k] + '</span>';
                            td.onmouseover = _over;
                            td.onmouseout = _out;
                        }
                        tr.appendChild(td);
                        td = _td.cloneNode(1);
                        td.setAttribute('id', sConcede + '_bg');
                        td.appendChild(oddsNode(sConcede, res[sConcede], _betMode));
                        tr.appendChild(td);
                        if (_betMode == 1) {
                            td = _td.cloneNode(1);
                            td.innerHTML = inpStr(sConcede, res[sConcede]);
                            tr.appendChild(td);
                        }
                        l++;
                        k++;
                    }
                    tbody.appendChild(tr);
                }
                this.tab2.appendChild(tbody);
                this.tab3.parentNode.style.display = 'none'
                this.tab4.parentNode.style.display = 'none'
                if (_betMode == 1) {
                    self.GoldUI.installInput($('input.GoldQQ'));
                    var betObj = betSpace.bet.instance('NA');
                    betObj.initActive(this._form);
                }
            } else {
                this.displayTag.style.display = 'none';
            }
        },
        /**
         * 顯示正碼1-6盤勢
         * @param res 盤勢陣列
         */
        displayNO : function(res) {
            var _Concede = Concede[this.pageRtype];
            var _betMode = this.betMode;
            if (document.getElementById('NO1_R')) {
                this.updateOdds(_Concede, res);
            } else if (typeof res['NO1_R'] != 'undefined') {
                var _no = 1;
                var _total = 13;
                var _show = 6;
                var _tbody = document.createElement('tbody');
                var _tr = document.createElement('tr');
                var _td = document.createElement('td');
                var tr, td, sConcede, idx;
                var me = this;
                var _over = function (e) {
                    (me.onOver) && (me.tipsDiv) && me.onOver.call(me.tipsDiv, e);
                }
                var _out = function () {
                    (me.onOut) && (me.tipsDiv) && me.onOut.call(me.tipsDiv);
                }
                //預設置中對齊
                $(_tr).attr('style', 'color:black;text-align:center;');
                var type_array = ["ODD", "EVEN", "OVER", "UNDER",
                                  "SODD", "SEVEN", "SOVER", "SUNDER",
                                  "FOVER", "FUNDER", "R", "G", "B"];
                var no_ta = [Lang('odd'), Lang('even'), Lang('over'), Lang('under'),
                             Lang('SP_SODD'),Lang('SP_SEVEN'), Lang('SP_SOVER'),Lang('SP_SUNDER'),
                             Lang('fover'), Lang('funder'),
                             Lang('SP_R'), Lang('SP_G'), Lang('SP_B')];
                for (var n = 0; n < _no; n++) {
                    tr = _tr.cloneNode(1);
                    $(tr).attr('class', 'title_tr');
                    if (_betMode == 1) {
                        td = _td.cloneNode(1);
                        td.innerHTML = '&nbsp;';
                        tr.appendChild(td);
                    }
                    for (var i = 0; i < _show; i++) {
                        idx = (n * _show + i + 1);
                        td = _td.cloneNode(1);
                        td.colSpan = 2;
                        td.innerHTML = Lang('game_type8_' + idx);
                        tr.appendChild(td);
                    }
                    _tbody.appendChild(tr);
                    tr = _tr.cloneNode(1);
                    $(_td).attr('class', 'title_td');
                    for (i = 0; i < _show; i++) {
                        if (_betMode == 1) {
                            if (i ==0) {
                                td = _td.cloneNode(1);
                                $(td).attr('class', 'title_td');
                                td.innerHTML = '<span>&nbsp;</span>';
                                tr.appendChild(td);
                            }
                            td = _td.cloneNode(1);
                            td.innerHTML = Lang('odds_value');
                            tr.appendChild(td);
                            if (_betMode == 1) {
                                td = _td.cloneNode(1);
                                td.innerHTML = Lang('amount');
                                tr.appendChild(td);
                            }
                        } else {
                            td = _td.cloneNode(1);
                            td.innerHTML = Lang('betNum');
                            tr.appendChild(td);
                            td = _td.cloneNode(1);
                            td.innerHTML = Lang('odds_value');
                            tr.appendChild(td);
                        }
                    }
                    $(_td).attr('class', '');
                    _tbody.appendChild(tr);
                    for (i = 0; i < _total; i++) {
                        tr = _tr.cloneNode(1);
                        for (var j = 0; j < _show; j++) {
                            idx = (n * _show + j + 1);
                            sConcede = 'NO' + idx + '_' + type_array[i];
                            if (_betMode == 1) {
                                if (j == 0) {
                                    td = _td.cloneNode(1);
                                    $(td).attr('class', 'title_td');
                                    td.innerHTML = '<span>' + no_ta[i] + '</span>';
                                    tr.appendChild(td);
                                }
                            } else {
                                td = _td.cloneNode(1);
                                $(td).attr('class', 'title_td');
                                td.innerHTML = '<span class="betMove" data-concede="' + sConcede + '">' + no_ta[i] + '</span>';
                                td.onmouseover = _over;
                                td.onmouseout = _out;
                                tr.appendChild(td);
                            }
                            td = _td.cloneNode(1);
                            td.setAttribute('id', sConcede + '_bg');
                            td.appendChild(oddsNode(sConcede, res[sConcede], _betMode));
                            tr.appendChild(td);
                            if (_betMode == 1) {
                                td = _td.cloneNode(1);
                                td.innerHTML = inpStr(sConcede, res[sConcede]);
                                tr.appendChild(td);
                            }
                        }
                        _tbody.appendChild(tr);
                    }
                }
                if (_betMode == 1) {
                    //tr = _tr.cloneNode(1);
                    //td = _td.cloneNode(1);
                    //td.setAttribute('colSpan', 13);
                    //td.className = 'Send';
                    //td.innerHTML = '<input class="no" type="reset" value="' + Lang('cancel') + '"/><input class="yes" type="button" name="btnBet" value="' + Lang('bet') + '"/>';
                    //tr.appendChild(td);
                    //_tbody.appendChild(tr);
                }
                this.tab1.appendChild(_tbody);
                this.tab2.parentNode.style.display = 'none'
                this.tab3.parentNode.style.display = 'none'
                this.tab4.parentNode.style.display = 'none'
                if (_betMode == 1) {
                    self.GoldUI.installInput($('input.GoldQQ'));
                    var betObj = betSpace.bet.instance('NO');
                    betObj.initActive(this._form);
                }
            } else {
                this.displayTag.style.display = 'none';
            }
        },
        /**
         * 顯示生肖色波頭尾數盤勢
         * @param res 盤勢陣列
         */
        displaySPA : function(res) {
            var _Concede = Concede[this.pageRtype];
            var _betMode = this.betMode;
            if (document.getElementById('SP_A1')) {
                this.updateOdds(_Concede, res);
            } else if (typeof res['SP_A1'] != 'undefined') {
                var me = this;
                if (_betMode == 0) {
                    var fieldset = _fieldset.cloneNode(1),
                        nav = document.createElement('nav'),
                        _b = document.createElement('b');
                    var F = ["Beast", "Poultry", "ODD", "EVEN"], bTag;
                    var F2 = [Lang('Mode1_SX'), Lang('Mode2_SX'), Lang('odd'), Lang('even')];
                    for (var h = 0; h < 4; h++) {
                        bTag = _b.cloneNode(1);
                        bTag.x = F[h];
                        $(bTag).attr('data-TYPE', 'SPA');
                        (h == 0) && (bTag.className = 'first');
                        (h == 3) && (bTag.className = 'last');
                        bTag.innerHTML = F2[h];
                        bTag.onclick = function () {
                            (me.onBtagClk) && me.onBtagClk.call(this, me);
                        }
                        nav.appendChild(bTag);
                    }
                    fieldset.className = 'SPA';
                    fieldset.appendChild(nav);
                    this.displayTag.insertBefore(fieldset, this.tab1.parentNode);
                    fieldset = _fieldset.cloneNode(1), nav = document.createElement('nav');
                    F = ["ODD", "EVEN"];
                    F2 = [Lang('odd'), Lang('even')];
                    for (h = 0; h < 2; h++) {
                        bTag = _b.cloneNode(1);
                        bTag.x = F[h];
                        $(bTag).attr('data-TYPE', 'SF');
                        (h == 0) && (bTag.className = 'first');
                        (h == 1) && (bTag.className = 'last');
                        bTag.innerHTML = F2[h];
                        bTag.onclick = function () {
                            (me.onBtagClk) && me.onBtagClk.call(this, me);
                        }
                        nav.appendChild(bTag);
                    }
                    fieldset.className = 'SF';
                    fieldset.appendChild(nav);
                    this.displayTag.insertBefore(fieldset, this.tab4.parentNode);
                }
                var _tbody = document.createElement('tbody');
                var _tr = document.createElement('tr');
                var _td = document.createElement('td');
                var _over = function (e) {
                    (me.onOver) && (me.tipsDiv) && me.onOver.call(me.tipsDiv, e);
                }
                var _out = function () {
                    (me.onOut) && (me.tipsDiv) && me.onOut.call(me.tipsDiv);
                }
                //預設置中對齊
                $(_tr).attr('style', 'text-align:center;color:black;');
                var sConcede, tbody, tr, td, k;
                tbody = _tbody.cloneNode(1);
                tr = _tr.cloneNode(1);
                $(tr).attr('class', 'title_tr');
                for (var i = 0; i < 2; i++) {
                    td = _td.cloneNode(1);
                    td.innerHTML = Lang('game_type11');
                    tr.appendChild(td);
                    td = _td.cloneNode(1);
                    td.innerHTML = Lang('betNum');
                    tr.appendChild(td);
                    td = _td.cloneNode(1);
                    td.innerHTML = Lang('odds_value');
                    tr.appendChild(td);
                    if (_betMode == 1) {
                        td = _td.cloneNode(1);
                        td.innerHTML = Lang('amount');
                        tr.appendChild(td);
                    }
                }
                tbody.appendChild(tr);
                var _an = [Lang('game_type11_A1'),Lang('game_type11_A2'),Lang('game_type11_A3'),Lang('game_type11_A4'),
                           Lang('game_type11_A5'),Lang('game_type11_A6'),Lang('game_type11_A7'),Lang('game_type11_A8'),
                           Lang('game_type11_A9'),Lang('game_type11_AA'),Lang('game_type11_AB'),Lang('game_type11_AC')];
                var _no = this.an2no;
                k = 0;
                for (i = 0; i < 6; i++) {
                    tr = _tr.cloneNode(1);
                    for (var j = 0; j < 2; j++) {
                        sConcede = _Concede[k];
                        td = _td.cloneNode(1);
                        $(td).attr('class', 'title_td2');
                        if (_betMode == 1) {
                            td.innerHTML = '<span>' + _an[k] + '</span>';
                        } else {
                            td.innerHTML = '<span class="betMove" data-concede="' + sConcede + '">' + _an[k] + '</span>';
                            td.onmouseover = _over;
                            td.onmouseout = _out;
                        }
                        tr.appendChild(td);
                        td = _td.cloneNode(1);
                        $(td).attr('class', 'title_td3');
                        td.innerHTML = _no[11 - k];
                        tr.appendChild(td);
                        td = _td.cloneNode(1);
                        td.setAttribute('id', sConcede + '_bg');
                        td.appendChild(oddsNode(sConcede, res[sConcede], _betMode));
                        tr.appendChild(td);
                        if (_betMode == 1) {
                            td = _td.cloneNode(1);
                            td.innerHTML = inpStr(sConcede, res[sConcede]);
                            tr.appendChild(td);
                        }
                        k++;
                    }
                    tbody.appendChild(tr);
                }
                this.tab1.appendChild(tbody);
                if(this.showTableN && this.showTableN!=1){
                    this.tab1.parentNode.style.display = 'none';
                }
                //$(this.tab2).attr('style', 'border:0;border-collapse:collapse;margin-top:12px;');
                //$(this.tab2).attr('style', 'border:0;border-collapse:collapse;');
                tbody = _tbody.cloneNode(1);
                tr = _tr.cloneNode(1);
                $(tr).css('background-color', '#fff');
                td = _td.cloneNode(1);
                $(td).attr('class', 'HTD').css('text-align', 'left');
                td.innerHTML = Lang('game_type3_1');
                if (_betMode == 1) {
                    td.colSpan = 9;
                } else {
                    td.colSpan = 6;
                }
                tr.appendChild(td);
                tbody.appendChild(tr);
                var _cName = [Lang('SP_R'), Lang('SP_B'), Lang('SP_G')];
                var _aClass = ['bColorR', 'bColorB', 'bColorG'];
                l = 0;
                for (i = 0; i < 1; i++) {
                    tr = _tr.cloneNode(1);
                    for (j = 0; j < 3; j++) {
                        sConcede = _Concede[k];
                        td = _td.cloneNode(1);
                        if (_betMode == 1) {
                            td.innerHTML = '<span style="font-size:7pt;">' + _cName[l] + '</span>';
                        } else {
                            td.innerHTML = '<span style="font-size:7pt;" class="betMove" data-concede="' + sConcede + '">' + _cName[l] + '</span>';
                            td.onmouseover = _over;
                            td.onmouseout = _out;
                        }
                        $(td).attr('class', _aClass[l] + " BorderLine");
                        tr.appendChild(td);
                        td = _td.cloneNode(1);
                        td.setAttribute('id', sConcede + '_bg');
                        $(td).attr('class', 'BorderLine');
                        td.appendChild(oddsNode(sConcede, res[sConcede], _betMode));
                        tr.appendChild(td);
                        if (_betMode == 1) {
                            td = _td.cloneNode(1);
                            td.innerHTML = inpStr(sConcede, res[sConcede]);
                            tr.appendChild(td);
                        }
                        k++;
                        l++;
                    }
                    tbody.appendChild(tr);
                }
                this.tab2.appendChild(tbody);
                if(this.showTableN && this.showTableN!=2){
                    this.tab2.parentNode.style.display = 'none';
                }
                tbody = _tbody.cloneNode(1);
                //$(this.tab3).attr('style', 'border:0;border-collapse:collapse;margin-top:12px;');
                $(this.tab3).attr('style', 'border:0;border-collapse:collapse;');
                tr = _tr.cloneNode(1);
                $(tr).css('background-color', '#fff');
                td = _td.cloneNode(1);
                $(td).attr('class', 'HTD').css('text-align', 'left');
                if (_betMode == 1) {
                    td.setAttribute('colSpan', 15);
                } else {
                    td.setAttribute('colSpan', 10);
                }
                td.innerHTML = Lang('game_type14');
                tr.appendChild(td);
                tbody.appendChild(tr);
                l = 0;
                var sHead = Lang('Head');  var sFin = Lang('Fin');

                var cookieString = ((document.cookie).match(/charset=\S+\W*/g));
                var site_lang = cookieString ? cookieString.toString() : "charset=gb";
                //var site_lang = JSON.stringify((document.cookie).match(/charset=\S+\W*/g));
                var head_a = ''; var head_b = ''; var fin_a = ''; var fin_b = ''; var common_a = ''; var common_b = '';

                switch ( site_lang ) {
                    case 'charset=big5' :
                    case 'charset=big5; ' :
                    case 'charset=gb' :
                    case 'charset=gb; ' :
                        head_a = '<span>' + sHead ;
                        head_b = '">' + sHead ;
                        fin_a = '<span>' + sFin ;
                        fin_b = '">' + sFin  ;
                        common_a = '</span>' ;
                        common_b = '</span>' ;
                        break;
                    case 'charset=en-us' :
                    case 'charset=en-us; ' :
                        head_a = '<span>' ;
                        head_b = '">' ;
                        fin_a =  '<span>━' ;
                        fin_b =  '">━' ;
                        common_a = '━</span>' ;
                        common_b = '</span>' ;
                        break;
                    default:
                        head_a = '<span>' ;
                        head_b = '">' ;
                        fin_a =  '<span>━' ;
                        fin_b =  '">━' ;
                        common_a = '━</span>' ;
                        common_b = '</span>' ;
                        break;
                }

                if (_betMode == 1) {
                    $(_td).css('width', '6%');
                } else {
                    $(_td).css('width', '10%');
                }
                tr = _tr.cloneNode(1);
                for (j = 0; j < 5; j++) {
                    if (l == 5) {
                        break;
                    }
                    sConcede = _Concede[k];
                    td = _td.cloneNode(1);
                    if (_betMode == 1) {
                        td.innerHTML = head_a  + l.toString() + common_a ;
                    } else {
                        td.innerHTML = '<span class="betMove" data-concede="' + sConcede + head_b + l.toString() + common_a ;
                        td.onmouseover = _over;
                        td.onmouseout = _out;
                    }
                    td.className = 'title_td2 BorderLine';
                    td.style.cssText = 'font-weight:normal;';
                    tr.appendChild(td);
                    td = _td.cloneNode(1);
                    td.setAttribute('id', sConcede + '_bg');
                    td.className = 'BorderLine';
                    td.appendChild(oddsNode(sConcede, res[sConcede], _betMode));
                    tr.appendChild(td);
                    if (_betMode == 1) {
                        td = _td.cloneNode(1);
                        td.innerHTML = inpStr(sConcede, res[sConcede]);
                        tr.appendChild(td);
                    }
                    k++;
                    l++;
                }
                tbody.appendChild(tr);
                this.tab3.appendChild(tbody);
                if(this.showTableN && this.showTableN!=3){
                    this.tab3.parentNode.style.display = 'none';
                }
                //$(this.tab3).css('margin-bottom', '12px');
                tbody = _tbody.cloneNode(1);
                l = 0;
                for (i = 0; i < 2; i++) {
                    tr = _tr.cloneNode(1);
                    for (j = 0; j < 5; j++) {
                        if (l == 10) {
                            break;
                        }
                        sConcede =_Concede[k];
                        td = _td.cloneNode(1);
                        if (_betMode == 1) {
                            td.innerHTML = fin_a + l.toString(); + common_b ;
                        } else {
                            td.innerHTML = '<span  class="betMove" data-concede="' + sConcede + fin_b + l.toString() + common_b ;
                            td.onmouseover = _over;
                            td.onmouseout = _out;
                        }
                        td.className = 'title_td2';
                        tr.appendChild(td);
                        td = _td.cloneNode(1);
                        td.setAttribute('id', sConcede + '_bg');
                        td.appendChild(oddsNode(sConcede, res[sConcede], _betMode));
                        tr.appendChild(td);
                        if (_betMode == 1) {
                            td = _td.cloneNode(1);
                            td.innerHTML = inpStr(sConcede, res[sConcede]);
                            tr.appendChild(td);
                        }
                        k++;
                        l++;
                    }
                    tbody.appendChild(tr);
                }
                //if (_betMode == 1) {
                //    tr = _tr.cloneNode(1);
                //    td = _td.cloneNode(1);
                //    td.setAttribute('colSpan', 15);
                //    td.style.backgroundColor = '#fff';
                //    td.className = 'Send';
                //    td.innerHTML = '<input class="no" type="reset" value="' + Lang('cancel') + '"/><input class="yes" type="button" name="btnBet" value="' + Lang('bet') + '"/>';
                //    tr.appendChild(td);
                //    tbody.appendChild(tr);
                //}
                this.tab4.appendChild(tbody);
                if(this.showTableN && this.showTableN!=3){
                    this.tab4.parentNode.style.display = 'none';
                }
                if (_betMode == 1) {
                    self.GoldUI.installInput($('input.GoldQQ'));
                    var betObj = betSpace.bet.instance('SPA');
                    betObj.initActive(this._form);
                }
            } else {
                this.displayTag.style.display = 'none';
            }
        },
        /**
         * 顯示一肖總肖正特尾數盤勢
         * @param res 盤勢陣列
         */
        displaySPB : function (res) {
            var _Concede = Concede[this.pageRtype];
            var _betMode = this.betMode;
            if (document.getElementById('SP_B1')) {
                this.updateOdds(_Concede, res);
            } else if (typeof res['SP_B1'] != 'undefined') {
                var _tbody = document.createElement('tbody');
                var _tr = document.createElement('tr');
                var _td = document.createElement('td');
                var me = this;
                var _over = function (e) {
                    (me.onOver) && (me.tipsDiv) && me.onOver.call(me.tipsDiv, e);
                }
                var _out = function () {
                    (me.onOut) && (me.tipsDiv) && me.onOut.call(me.tipsDiv);
                }
                //預設置中對齊
                $(_tr).attr('style', 'text-align:center;color:black;');
                var sConcede, tbody, tr, td, k;
                tbody = _tbody.cloneNode(1);
                tr = _tr.cloneNode(1);
                $(tr).attr('class', 'title_tr');
                for (var i = 0; i < 2; i++) {
                    td = _td.cloneNode(1);
                    td.innerHTML = Lang('game_type11_1');
                    tr.appendChild(td);
                    td = _td.cloneNode(1);
                    td.innerHTML = Lang('betNum');
                    tr.appendChild(td);
                    td = _td.cloneNode(1);
                    td.innerHTML = Lang('odds_value');
                    tr.appendChild(td);
                    if (_betMode == 1) {
                        td = _td.cloneNode(1);
                        td.innerHTML = Lang('amount');
                        tr.appendChild(td);
                    }
                }
                tbody.appendChild(tr);
                var _an = [Lang('game_type11_A1'),Lang('game_type11_A2'),Lang('game_type11_A3'),Lang('game_type11_A4'),
                           Lang('game_type11_A5'),Lang('game_type11_A6'),Lang('game_type11_A7'),Lang('game_type11_A8'),
                           Lang('game_type11_A9'),Lang('game_type11_AA'),Lang('game_type11_AB'),Lang('game_type11_AC')]
                var _no = this.an2no;
                k = 0;
                for (i = 0; i < 6; i++) {
                    tr = _tr.cloneNode(1);
                    for (var j = 0; j < 2; j++) {
                        sConcede = _Concede[k];
                        td = _td.cloneNode(1);
                        $(td).attr('class', 'title_td2');
                        if (_betMode == 1) {
                            td.innerHTML = '<span>' + _an[k] + '</span>';
                        } else {
                            td.innerHTML = '<span class="betMove" data-concede="' + sConcede + '">' + _an[k] + '</span>';
                            td.onmouseover = _over;
                            td.onmouseout = _out;
                        }
                        tr.appendChild(td);
                        td = _td.cloneNode(1);
                        $(td).attr('class', 'title_td3');
                        td.innerHTML = _no[11 - k];
                        tr.appendChild(td);
                        td = _td.cloneNode(1);
                        td.setAttribute('id', sConcede + '_bg');
                        td.appendChild(oddsNode(sConcede, res[sConcede], _betMode));
                        tr.appendChild(td);
                        if (_betMode == 1) {
                            td = _td.cloneNode(1);
                            td.innerHTML = inpStr(sConcede, res[sConcede]);
                            tr.appendChild(td);
                        }
                        k++;
                    }
                    tbody.appendChild(tr);
                }
                this.tab1.appendChild(tbody);
                if(this.showTableN && this.showTableN!=1){
                    this.tab1.parentNode.style.display = 'none';
                }
                tbody = _tbody.cloneNode(1);
                //$(this.tab2).attr('style', 'border:0;border-collapse:collapse;margin-top:12px;');
                $(this.tab2).attr('style', 'border:0;border-collapse:collapse;');
                _total = (_betMode == 1) ? 5 : 2;
                _show = (_betMode == 1) ? 2 : 5;
                tr = _tr.cloneNode(1);
                td = _td.cloneNode(1);
                if (_betMode == 1) {
                    td.colSpan = 15;
                } else {
                    td.colSpan = 10;
                }
                td.className = 'HTD';
                td.style.textAlign = 'left';
                td.innerHTML = Lang('NF');
                tr.appendChild(td);
                tbody.appendChild(tr);
                l = 0;
                var sFin = Lang('Fin');

                var cookieString = ((document.cookie).match(/charset=\S+\W*/g));
                var site_lang = cookieString ? cookieString.toString() : "charset=gb";
                //var site_lang = JSON.stringify((document.cookie).match(/charset=\S+\W*/g));
                var fin_a = ''; var fin_b = ''; var common_a = ''; var common_b = '';

                switch ( site_lang ) {
                    case 'charset=big5' :
                    case 'charset=big5; ' :
                    case 'charset=gb' :
                    case 'charset=gb; ' :
                        fin_a = '<span>' + sFin ;
                        fin_b = '">' + sFin  ;
                        common_a = '</span>' ;
                        common_b = '</span>' ;
                        break;
                    case 'charset=en-us' :
                    case 'charset=en-us; ' :
                        fin_a =  '<span>━' ;
                        fin_b =  '">━' ;
                        common_a = '━</span>' ;
                        common_b = '</span>' ;
                        break;
                    default:
                        fin_a =  '<span>━' ;
                        fin_b =  '">━' ;
                        common_a = '━</span>' ;
                        common_b = '</span>' ;
                        break;
                }

                for (i = 0; i < _total; i++) {
                    tr = _tr.cloneNode(1);
                    for (j = 0; j < _show; j++) {
                        if (l == 10) {
                            break;
                        }
                        sConcede = _Concede[k];
                        td = _td.cloneNode(1);
                        if (_betMode == 1) {
                            td.innerHTML = fin_a + l + common_b ;
                        } else {
                            td.innerHTML = '<span  class="betMove" data-concede="' + sConcede + fin_b + l + common_b ;
                            td.onmouseover = _over;
                            td.onmouseout = _out;
                        }
                        td.className = 'title_td2 BorderLine';
                        td.style.fontWeight = 'normal';
                        tr.appendChild(td);
                        td = _td.cloneNode(1);
                        td.setAttribute('id', sConcede + '_bg');
                        $(td).attr('class', 'BorderLine');
                        td.appendChild(oddsNode(sConcede, res[sConcede], _betMode));
                        tr.appendChild(td);
                        if (_betMode == 1) {
                            td = _td.cloneNode(1);
                            td.innerHTML = inpStr(sConcede, res[sConcede]);
                            tr.appendChild(td);
                        }
                        k++;
                        l++;
                    }
                    tbody.appendChild(tr);
                }
                this.tab2.appendChild(tbody);
                if(this.showTableN && this.showTableN!=2){
                    this.tab2.parentNode.style.display = 'none';
                }
                tbody = _tbody.cloneNode(1);
                _total = (_betMode == 1) ? 3 : 2;
                _show = (_betMode == 1) ? 2 : 4;
                //$(this.tab3).attr('style', 'border:0;border-collapse:collapse;margin-top:12px;');
                $(this.tab3).attr('style', 'border:0;border-collapse:collapse;');
                tr = _tr.cloneNode(1);
                td = _td.cloneNode(1);
                if (_betMode == 1) {
                    td.colSpan = 6;
                } else {
                    td.colSpan = 8;
                }
                td.className = 'HTD';
                td.style.textAlign = 'left';
                td.innerHTML = Lang('TX');
                tr.appendChild(td);
                tbody.appendChild(tr);
                l = 0;
                var _tx = [Lang('TX2'), Lang('TX5'), Lang('TX6'), Lang('TX7'), Lang('TX_ODD'), Lang('TX_EVEN')];
                for (i = 0; i < _total; i++) {
                    tr = _tr.cloneNode(1);
                    for (j = 0; j < _show; j++) {
                        if (l == 6) {
                            td = _td.cloneNode(1);
                            if (_betMode == 1) {
                                td.colSpan = 6;
                            } else {
                                td.colSpan = 4;
                            }
                            tr.appendChild(td);
                            break;
                        }
                        sConcede = _Concede[k];
                        td = _td.cloneNode(1);
                        if (_betMode == 1) {
                            td.innerHTML = "<span>" + _tx[l] + "</span>";
                        } else {
                            td.innerHTML = "<span  class=\"betMove\" data-concede=\"" + sConcede + "\">" + _tx[l] + "</span>";
                            td.onmouseover = _over;
                            td.onmouseout = _out;
                        }
                        $(td).attr('class', 'title_td2 BorderLine');
                        tr.appendChild(td);
                        td = _td.cloneNode(1);
                        td.setAttribute('id', sConcede + '_bg');
                        td.className = 'BorderLine';
                        td.appendChild(oddsNode(sConcede, res[sConcede], _betMode));
                        tr.appendChild(td);
                        if (_betMode == 1) {
                            td = _td.cloneNode(1);
                            td.innerHTML = inpStr(sConcede, res[sConcede]);
                            tr.appendChild(td);
                        }
                        k++;
                        l++;
                    }
                    tbody.appendChild(tr);
                }
                //if (_betMode == 1) {
                //    tr = _tr.cloneNode(1);
                //    td = _td.cloneNode(1);
                //    td.setAttribute('colSpan', 6);
                //    td.className = 'Send';
                //    td.innerHTML = '<input class="no" type="reset" value="' + Lang('cancel') + '"/><input class="yes" type="button" name="btnBet" value="' + Lang('bet') + '"/>';
                //    tr.appendChild(td);
                //    tbody.appendChild(tr);
                //}
                this.tab3.appendChild(tbody);
                if(this.showTableN && this.showTableN!=3){
                    this.tab3.parentNode.style.display = 'none';
                }
                this.tab4.parentNode.style.display = 'none'
                if (_betMode == 1) {
                    self.GoldUI.installInput($('input.GoldQQ'));
                    var betObj = betSpace.bet.instance('SPB');
                    betObj.initActive(this._form);
                }
            } else {
                this.displayTag.style.display = 'none';
            }
        },
        displayHB : function (res) {
            var _Concede = Concede[this.pageRtype];
            var _betMode = this.betMode;
            if (document.getElementById('HB_RODD')) {
                this.updateOdds(_Concede, res);
            } else if (typeof res['HB_RODD'] != 'undefined') {
                var me = this;
                if (_betMode == 0) {
                    var fieldset = _fieldset.cloneNode(1),
                        nav = document.createElement('nav'),
                        _b = document.createElement('b');
                    var F = ["ODD", "EVEN", "OVER", "UNDER", "R", "G", "B"], bTag;
                    var F2 = [Lang('odd'), Lang('even'), Lang('over'), Lang('under'),
                              Lang('SP_R'), Lang('SP_G'), Lang('SP_B')];
                    for (var h = 0; h < 7; h++) {
                        bTag = _b.cloneNode(1);
                        bTag.x = F[h];
                        $(bTag).attr('data-TYPE', 'HB');
                        (h == 0) && (bTag.className = 'first');
                        (h == 6) && (bTag.className = 'last');
                        bTag.innerHTML = F2[h];
                        bTag.onclick = function () {
                            (me.onBtagClk) && me.onBtagClk.call(this, me);
                        }
                        nav.appendChild(bTag);
                    }
                    fieldset.className = 'HB';
                    fieldset.appendChild(nav);
                    this.displayTag.insertBefore(fieldset, this.tab1.parentNode);
                    var fieldset2 = _fieldset.cloneNode(1),
                        nav = document.createElement('nav');
                    for (h = 0; h < 7; h++) {
                        bTag = _b.cloneNode(1);
                        bTag.x = F[h];
                        $(bTag).attr('data-TYPE', 'HH');
                        (h == 0) && (bTag.className = 'first');
                        (h == 6) && (bTag.className = 'last');
                        bTag.innerHTML = F2[h];
                        bTag.onclick = function () {
                            (me.onBtagClk) && me.onBtagClk.call(this, me);
                        }
                        nav.appendChild(bTag);
                    }
                    fieldset2.className = 'HH';
                    fieldset2.appendChild(nav);
                    this.displayTag.insertBefore(fieldset2, this.tab2.parentNode);
                }
                var _over = function (e) {
                    (me.onOver) && (me.tipsDiv) && me.onOver.call(me.tipsDiv, e);
                }
                var _out = function () {
                    (me.onOut) && (me.tipsDiv) && me.onOut.call(me.tipsDiv);
                }
                var _tbody = document.createElement('tbody');
                var _tr = document.createElement('tr');
                var _td = document.createElement('td');
                //預設置中對齊
                $(_tr).attr('style', 'font-size:11px;text-align:center;color:black;height:30px;');
                $(_td).attr('style', 'font-size:8pt;');
                var sConcede, tbody, tr, td, k;
                tbody = _tbody.cloneNode(1);
                tr = _tr.cloneNode(1);
                $(tr).attr('class', 'title_tr');
                td = _td.cloneNode(1);
                td.innerHTML = Lang('game_type13');
                $(td).css('width', '90px');
                tr.appendChild(td);
                td = _td.cloneNode(1);
                td.innerHTML = Lang('odds_value');
                tr.appendChild(td);
                if (_betMode == 1) {
                    td = _td.cloneNode(1);
                    td.innerHTML = Lang('amount');
                    tr.appendChild(td);
                }
                td = _td.cloneNode(1);
                td.colSpan = 10;
                td.innerHTML = Lang('betNum')
                tr.appendChild(td);
                tbody.appendChild(tr);
                var ball_num, ball_nums,
                    _class = ['bColorR','bColorR','bColorR','bColorR',
                              'bColorG','bColorG','bColorG','bColorG',
                              'bColorB','bColorB','bColorB','bColorB'];
                var _hb = [Lang('game_type13_rodd'),Lang('game_type13_reven'),Lang('game_type13_rover'),
                           Lang('game_type13_runder'), Lang('game_type13_godd'),Lang('game_type13_geven'),
                           Lang('game_type13_gover'),Lang('game_type13_gunder'), Lang('game_type13_bodd'),
                           Lang('game_type13_beven'),Lang('game_type13_bover'),Lang('game_type13_bunder')];
                var _bColor = ['R' , 'G', 'B'];
                k = 0;
                for (var i = 0; i < 12; i++) {
                    tr = _tr.cloneNode(td);
                    switch (k) {
                        case 0:
                            ball_num = ["01", "07", "13", "19", "23", "29", "35", "45"], ball_nums = 8;
                            break;
                        case 1:
                            ball_num = ["02", "08", "12", "18", "24", "30", "34", "40", "46"], ball_nums = 9;
                            break;
                        case 2:
                            ball_num = ["29", "30", "34", "35", "40", "45", "46"], ball_nums = 7;
                            break;
                        case 3:
                            ball_num = ["01", "02", "07", "08", "12", "13", "18", "19", "23", "24"], ball_nums = 10;
                            break;
                        case 4:
                            ball_num = ["05", "11", "17", "21", "27", "33", "39", "43"], ball_nums = 8;
                            break;
                        case 5:
                            ball_num = ["06", "16", "22", "28", "32", "38", "44"], ball_nums = 7;
                            break;
                        case 6:
                            ball_num = ["27", "28", "32", "33", "38", "39", "43", "44"], ball_nums = 8;
                            break;
                        case 7:
                            ball_num = ["05", "06", "11", "16", "17", "21", "22"], ball_nums = 7;
                            break;
                        case 8:
                            ball_num = ["03", "09", "15", "25", "31", "37", "41", "47"], ball_nums = 8;
                            break;
                        case 9:
                            ball_num = ["04", "10", "14", "20", "26", "36", "42", "48"], ball_nums = 8;
                            break;
                        case 10:
                            ball_num = ["25", "26", "31", "36", "37", "41", "42", "47", "48"], ball_nums = 9;
                            break;
                        case 11:
                            ball_num = ["03", "04", "09", "10", "14", "15", "20"], ball_nums = 7;
                            break;
                    }
                    sConcede = _Concede[k];
                    td = _td.cloneNode(1);
                    $(td).attr('class', 'title_td2');
                    if (_betMode == 1) {
                        td.innerHTML = '<span>' + _hb[k] + '</span>';
                    } else {
                        td.innerHTML = '<span class="betMove" data-concede="' + sConcede + '">' + _hb[k] + '</span>';
                        td.onmouseover = _over;
                        td.onmouseout = _out;
                    }
                    tr.appendChild(td);
                    td = _td.cloneNode(1);
                    td.setAttribute('id', sConcede + '_bg');
                    td.appendChild(oddsNode(sConcede, res[sConcede], _betMode));
                    tr.appendChild(td);
                    if (_betMode == 1) {
                        td = _td.cloneNode(1);
                        td.innerHTML = inpStr(sConcede, res[sConcede]);
                        tr.appendChild(td);
                    }
                    for (var l = 0; l < 10; l++) {
                        td = _td.cloneNode(1);
                        $(td).attr('style', 'background-color:#fff;');
                        if (l < ball_nums) {
                            td.style.fontSize = '8pt';
                            td.className = _class[i];
                            td.innerHTML = '<span>' + ball_num[l] + '</span>';
                            tr.appendChild(td);
                        }
                        tr.appendChild(td);

                    }
                    k++;
                    tbody.appendChild(tr);
                }
                this.tab1.appendChild(tbody);
                if(this.showTableN && this.showTableN!=1){
                    this.tab1.parentNode.style.display = 'none';
                }
                tbody = _tbody.cloneNode(1);
                k = 0;
                tr = _tr.cloneNode(1);
                $(tr).attr('class', 'title_tr');
                td = _td.cloneNode(1);
                td.innerHTML = Lang('HH');
                $(td).attr('style', 'font-size:8pt;width:110px');
                tr.appendChild(td);
                td = _td.cloneNode(1);
                td.innerHTML = Lang('odds_value');
                tr.appendChild(td);
                if (_betMode == 1) {
                    td = _td.cloneNode(1);
                    td.innerHTML = Lang('amount');
                    tr.appendChild(td);
                }
                td = _td.cloneNode(1);
                td.colSpan = 5;
                td.innerHTML = Lang('betNum');
                tr.appendChild(td);
                tbody.appendChild(tr);
                var ball_num2, idx, t;
                var _hh = [Lang('ROO'),Lang('ROE'),Lang('RUO'),Lang('RUE'),
                           Lang('GOO'),Lang('GOE'),Lang('GUO'),Lang('GUE'),
                           Lang('BOO'),Lang('BOE'),Lang('BUO'),Lang('BUE')];
                for (i = 0; i < 12; i++) {
                    tr = _tr.cloneNode(1);
                    switch (k) {
                        case 0:
                            ball_num2 = ["29", "35", "45"];
                            break;
                        case 1:
                            ball_num2 = ["30", "34", "40", "46"];
                            break;
                        case 2:
                            ball_num2 = ["01", "07", "13", "19", "23"];
                            break;
                        case 3:
                            ball_num2 = ["02", "08", "12", "18", "24"];
                            break;
                        case 4:
                            ball_num2 = ["27", "33", "39", "43"];
                            break;
                        case 5:
                            ball_num2 = ["28", "32", "38", "44"];
                            break;
                        case 6:
                            ball_num2 = ["05", "11", "17", "21"];
                            break;
                        case 7:
                            ball_num2 = ["06", "16", "22"];
                            break;
                        case 8:
                            ball_num2 = ["25", "31", "37", "41", "47"];
                            break;
                        case 9:
                            ball_num2 = ["26", "36", "42", "48"];
                            break;
                        case 10:
                            ball_num2 = ["03", "09", "15"];
                            break;
                        case 11:
                            ball_num2 = ["04", "10", "14", "20"];
                            break;
                    }
                    idx = k + 12;
                    sConcede = _Concede[idx];
                    td = _td.cloneNode(1);
                    $(td).attr('class', 'title_td2');
                    if (_betMode == 1) {
                        td.innerHTML = "<span>" + _hh[k] + "</span>";
                    } else {
                        td.innerHTML = "<span class=\"betMove\" data-concede=\"" + sConcede + "\">" + _hh[k] + "</span>";
                        td.onmouseover = _over;
                        td.onmouseout = _out;
                    }
                    tr.appendChild(td);
                    td = _td.cloneNode(1);
                    td.setAttribute('id', sConcede + "_bg");
                    td.appendChild(oddsNode(sConcede, res[sConcede], _betMode));
                    tr.appendChild(td);
                    if (_betMode == 1) {
                        td = _td.cloneNode(1);
                        td.innerHTML = inpStr(sConcede, res[sConcede]);
                        tr.appendChild(td);
                    }
                    t = ball_num2.length;
                    for (l = 0; l < 5; l++) {
                        td = _td.cloneNode(1);
                        $(td).attr('style', 'background-color:#fff;');
                        if (l < t) {
                            td.className = _class[i];
                            td.style.fontSize = '8pt';
                            td.innerHTML = '<span>' + ball_num2[l] + '</span>';
                        }
                        tr.appendChild(td);
                    }
                    k++;
                    tbody.appendChild(tr);
                }
                //if (_betMode == 1) {
                //    tr = _tr.cloneNode(1);
                //    td = _td.cloneNode(1);
                //    td.style.backgroundColor = '#fff';
                //    td.setAttribute('colSpan', 9);
                //    td.className = 'Send';
                //    td.innerHTML = '<input class="no" type="reset" value="' + Lang('cancel') + '"/><input class="yes" type="button" name="btnBet" value="' + Lang('bet') + '"/>';
                //    tr.appendChild(td);
                //    tbody.appendChild(tr);
                //}
                this.tab2.appendChild(tbody);
                if(this.showTableN!=2){
                    this.tab2.parentNode.style.display = 'none';
                }
                this.tab3.parentNode.style.display = 'none'
                this.tab4.parentNode.style.display = 'none'
                if (_betMode == 1) {
                    self.GoldUI.installInput($('input.GoldQQ'));
                    var betObj = betSpace.bet.instance('HB');
                    betObj.initActive(this._form);
                }
            } else {
                this.displayTag.style.display = 'none';
            }
        },
        displayC7 : function (res) {
            var _Concede = Concede[this.pageRtype];
            var _betMode = this.betMode;
            if (document.getElementById('C7_R')) {
                this.updateOdds(_Concede, res);
            } else if (typeof res['C7_R'] != 'undefined') {
                var _tbody = document.createElement('tbody');
                var _tr = document.createElement('tr');
                var _td = document.createElement('td');
                var me = this;
                var _over = function (e) {
                    (me.onOver) && (me.tipsDiv) && me.onOver.call(me.tipsDiv, e);
                }
                var _out = function () {
                    (me.onOut) && (me.tipsDiv) && me.onOut.call(me.tipsDiv);
                }
                var tbody, tr, td, sConcede;
                //預設置中對齊
                $(_tr).attr('style', 'font-size:11px;text-align:center;color:black;');
                tbody = _tbody.cloneNode(1);
                tr = _tr.cloneNode(1);
                $(tr).attr('class', 'title_tr');
                for (var i = 0; i < 2; i++) {
                    td = _td.cloneNode(1);
                    td.innerHTML = Lang('NAA');
                    tr.appendChild(td);
                    td = _td.cloneNode(1);
                    td.innerHTML = Lang('betNum');
                    tr.appendChild(td);
                    td = _td.cloneNode(1);
                    td.innerHTML = Lang('odds_value');
                    tr.appendChild(td);
                    if (_betMode == 1) {
                        td = _td.cloneNode(1);
                        td.innerHTML = Lang('amount');
                        tr.appendChild(td);
                    }
                }
                tbody.appendChild(tr);
                var _an = [Lang('game_type11_A1'),Lang('game_type11_A2'),Lang('game_type11_A3'),
                           Lang('game_type11_A4'),Lang('game_type11_A5'),Lang('game_type11_A6'),
                           Lang('game_type11_A7'),Lang('game_type11_A8'),Lang('game_type11_A9'),
                           Lang('game_type11_AA'),Lang('game_type11_AB'),Lang('game_type11_AC')];
                var _no = this.an2no, k = 0;
                for (i = 0; i < 6; i++) {
                    tr = _tr.cloneNode(1);
                    for (var j = 0; j < 2; j++) {
                        sConcede = _Concede[k];
                        td = _td.cloneNode(1);
                        if (_betMode == '1') {
                            td.innerHTML = "<span>" + _an[k] + "</span>";
                        } else {
                            td.innerHTML = "<span  class=\"betMove\" data-concede=\"" + sConcede + "\">" + _an[k] + "</span>";
                            td.onmouseover = _over;
                            td.onmouseout = _out;
                        }
                        $(td).attr('class', 'title_td2');
                        tr.appendChild(td);
                        td = _td.cloneNode(1);
                        td.innerHTML = _no[11-k];
                        $(td).attr('class', 'title_td3');
                        tr.appendChild(td);
                        td = _td.cloneNode(1);
                        td.setAttribute('id', sConcede + "_bg");
                        td.appendChild(oddsNode(sConcede, res[sConcede], _betMode));
                        tr.appendChild(td);
                        if (_betMode == 1) {
                            td = _td.cloneNode(1);
                            td.innerHTML = inpStr(sConcede, res[sConcede]);
                            tr.appendChild(td);
                        }
                        k++;
                    }
                    tbody.appendChild(tr);
                }
                this.tab1.appendChild(tbody);
                if(this.showTableN && this.showTableN!=1){
                    this.tab1.parentNode.style.display = 'none';
                }
                //this.tab2.style.cssText = 'margin-top:12px;'
                tbody = _tbody.cloneNode(1);
                //tr = _tr.cloneNode(1);
                //if (_betMode == 1) {
                //    $(_td).attr('style', 'width:7%');
                //} else {
                //    $(_td).attr('style', 'width:12.5%');
                //}
                //td = _td.cloneNode(1);
                var _total = 1;
                var _show = 4;
                var _cName = [Lang('SP_R'), Lang('SP_B'), Lang('SP_G'), Lang('draw')];
                for (i = 0; i < _total; i++) {
                    tr = _tr.cloneNode(1);
                    for (j = 0; j < _show; j++) {
                        sConcede = _Concede[k];
                        td = _td.cloneNode(1);
                        $(td).attr('class', 'title_td');
                        if (_betMode == 1) {
                            td.innerHTML = "<span>" + _cName[k-12] + "</span>";
                        } else {
                            td.innerHTML = "<span class=\"betMove\" data-concede=\"" + sConcede + "\">" + _cName[k-12] + "</span>";
                            td.onmouseover = _over;
                            td.onmouseout = _out;
                        }
                        tr.appendChild(td);
                        td = _td.cloneNode(1);
                        td.setAttribute('id', sConcede + "_bg");
                        td.appendChild(oddsNode(sConcede, res[sConcede], _betMode));
                        tr.appendChild(td);
                        if (_betMode == 1) {
                            td = _td.cloneNode(1);
                            td.innerHTML = inpStr(sConcede, res[sConcede]);
                            tr.appendChild(td);
                        }
                        k++;
                    }
                    tbody.appendChild(tr);
                }
                //if (_betMode == 1) {
                //    tr = _tr.cloneNode(1);
                //    td = _td.cloneNode(1);
                //    td.setAttribute('colSpan', 12);
                //    $(td).css('background-color', '#fff');
                //    td.className = 'Send';
                //    td.innerHTML = '<input class="no" type="reset" value="' + Lang('cancel') + '"/><input class="yes" type="button" name="btnBet" value="' + Lang('bet') + '"/>';
                //    tr.appendChild(td);
                //    tbody.appendChild(tr);
                //}
                this.tab2.appendChild(tbody);
                if(this.showTableN && this.showTableN!=2){
                    this.tab2.parentNode.style.display = 'none';
                }
                this.tab3.parentNode.style.display = 'none'
                this.tab4.parentNode.style.display = 'none'
                if (_betMode == 1) {
                    self.GoldUI.installInput($('input.GoldQQ'));
                    var betObj = betSpace.bet.instance('C7');
                    betObj.initActive(this._form);
                }
            } else {
                this.displayTag.style.display = 'none';
            }
        },
        /**
         * 顯示連碼
         */
        displayCH : function () {
            var _ch = GameSpace.ChShow.instance();
            _ch.init();
            _ch.sortZodiac(this.an2no);
        },
        /**
         * 顯示自選不中
         */
        displayNI : function () {
            var _ni = GameSpace.NiShow.instance();
            _ni.init();
        },
        /**
         * 顯示正碼過關
         */
        displayNAP : function () {
            var _nap = GameSpace.NapShow.instance();
            _nap.init();
        },
        /**
         * 顯示合肖
         * @param res 合肖賠率
         */
        displayNX : function (res) {
            var _nx = GameSpace.NxShow.instance();
            _nx.init(res);
        },
        /**
         * 顯示連肖連尾
         * @param res 連肖連尾賠率
         */
        displayLFX : function (res) {
            var _lfx = GameSpace.LfxShow.instance();
            _lfx.init(res);
        },
        /**
         * 顯示彩球大廳
         */
        onGrp : function () {
             if (this.x == 1) {
                 this.x = 0;
                 this.className = 'HideGrp';
                 setTimeout("document.getElementById('" + this.id + "').style.display = 'none';",500);
             } else {
                 this.x = 1;
                 this.className = 'ShowGrp';
                 this.style.display = '';
             }
        },
        /**
         * 點擊包組
         * @param me ShowTable物件
         */
        onBtagClk : function (me) {
            var _rtype = $(this).attr('data-TYPE');
            $('#Game > fieldset > nav b').removeClass('ON');
            $(this).addClass('ON');
            var url = _grpUrl;
            url += '?gid=' + me.gidInp.value;
            url += '&TYPE=' + this.x;
            url += '&sRtype=' + _rtype;
            url += '&play_name=' + encodeURIComponent(this.innerHTML);
            $.ajax({
                url : url,
                type : 'GET',
                dataType : 'script'
            });
        },
        /**
         * 滑鼠經過提示有拖拉下注功能
         * @param event
         */
        onOver : function (e) {
            e = e || window.event;
            var doe = document.documentElement, dob = document.body;
            this.left = (doe.scrollLeft + dob.scrollLeft + e.clientX - 120) + 'px';
            this.top = (doe.scrollTop + dob.scrollTop + e.clientY + 25) + 'px';
            this.display = '';
        },
        /**
         * 滑鼠離開隱藏提示
         */
        onOut : function () {
            this.display = 'none';
        },
        /**
         * 點擊遊戲玩法連結
         * @param me GameSpace.ShowTable物件
         */
        onGameLinkClk : function (me) {
            function getValueByUrl(url,paras){
                var i, j;
                var paraString = url.substring(url.indexOf("?")+1,url.length).split("&");
                var paraObj = {};
                for (i=0; j=paraString[i]; i++){
                    paraObj[j.substring(0,j.indexOf("=")).toLowerCase()] = j.substring(j.indexOf("=")+1,j.length);
                }
                var returnValue = paraObj[paras.toLowerCase()];
                if(typeof(returnValue)=="undefined"){
                    return "";
                }else{
                    return returnValue;
                }
            }
            if (me.lock == false) {
                me.lock = true;
                var _id = this.href.match(/#(.+)$/);
                if (_id != null) {
                    me.lock = false;
                    return false;
                }
                var _rtype = _getParamString('rtype', this.href);
                var _showTableN = getValueByUrl(this.href,"showTableN");
                _rtype = (_rtype == '') ? 'SP' : _rtype;
                (_rtype == me.pageRtype) && (self.location = _defaultUrl + '?rtype=' + _rtype);
                me.menu.removeClass('NowPlay');
                $(this).addClass('NowPlay');
                me.c_rtype.text(this.innerHTML.replace(/<br>/g, ""));
                if (document.title) {
                    document.title = me.c_rtype.text();
                }
                //me.inner_box.className = 'aniDissolve';
                me.displayTag.className = 'aniDissolve';
                me.ruleCh.hide().filter(function (){return (_rtype == 'CH');}).show();
                if (me.grpBtn != null) {
                    if (_rtype == 'SP' || _rtype == 'NAS' || _rtype == 'NA' || _rtype =="SPbside") {
                        me.grpBtn.show();
                    } else {
                        me.grpBtn.hide();
                        me.grpBtn.find('p.grp-title').get(0).x = 0;
                        me.grpBtn.find('p.grp-title > b').html('▼');
                        me.grpBtn.css('height', '24px');
                    }
                }
                me.targetUrl =  _ajaxPage + '?rtype=' + _rtype;
                if(_showTableN){
                    me.showTableN = _showTableN;
                }
                if ($.inArray(_rtype, _scriptRtype) >= 0 || $.inArray(me.pageRtype, _scriptRtype) >= 0) {
                    me.pageRtype = _rtype;
                    me.displayTagLoad(_rtype, _loadPage + '?rtype=' + _rtype + '&rtypeN=N1');
                } else if ($.inArray(_rtype, _scriptRtype) < 0 && $.inArray(me.pageRtype, _scriptRtype) < 0) {
                    me.pageRtype = _rtype;
                    if (_rtype == 'NAS') {
                        var N = $('#tab li.onTagClick').attr('data-rtypeN');
                        me.targetUrl += '&rtypeN=' + N;
                    }
                    me._clearGameTable();
                    me.run();
                    me.lock = false;
                }
            }
        },
        displayTagLoad : function (_rtype, _loadUrl) {
            var me = this;
            this.pageRtype = _rtype;
            this.displayTag.style.width = '';
            if (_rtype != 'NI' && _rtype != 'CH' && _rtype != 'LX') {
                this.AD.attr('class', 'toBottom');
                if (!isAnimationSupport()) {
                    this.AD.hide();
                }
            } else {
                this.AD.attr('class', 'toTop').show();
                this.BALL.html('<p>' + Lang('Msg4_Quick') + '<span style="background-color:rgb(0,255,0);">&nbsp;&nbsp;&nbsp;</span></p>');
                if (!isAnimationSupport()) {
                    this.AD.removeClass('toTop');
                }
            }
            this.rtypeN = 'N1';
            $(this.displayTag).load(_loadUrl, function () {
               (me.onDisplayTagLoad) && me.onDisplayTagLoad();
            });
        },
        onDisplayTagLoad : function () {
            var me = this, _rtype = this.pageRtype;
            //html結構改變需重新綁定物件的節點
            if (_isIE6 || _isIE7 || _isIE8) {
                $('div.round-table', this.displayTag).append('<div class="round-top-left" /><div class="round-top-right" /><div class="round-bottom-left" /><div class="round-bottom-right" />');
            }
            var act_url = _ajaxPage + '?rtype=' + _rtype;
            (_rtype == 'NAS') && (act_url += '&rtypeN=N1');
            me.init(_rtype);
            if (_rtype == 'NX' || _rtype == 'LX') {
                var script_url = _otherPage + '?rtype=' + _rtype;
                $.ajax({
                    url : script_url,
                    type : 'GET',
                    dataType : 'json',
                    success : function (res) {
                       if (_rtype == 'NX') {
                           me.displayNX(res);
                       } else {
                           me.displayLFX(res);
                       }
                       me.run();
                       me.lock = false;
                    }
                });
            } else {
                switch (_rtype) {
                    case 'CH' :
                        me.displayCH();
                        break;
                    case 'NI' :
                        me.displayNI();
                        break;
                    case 'NAP' :
                        me.displayNAP();
                        break;
                }
                me.run();
                me.lock = false;
            }
        }
    };
    GameSpace.ShowTable.instance = function (_json) {
        if (!this._instance && document.body) {
            this._instance = new this(_json);
        }
        return this._instance;
    };
})(self);
/**
 * 擋滑鼠右鍵
 */
document.oncontextmenu = function(){
    return false;
}
