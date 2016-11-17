'use strict';

if ( ! self.Pitaya) {
    throw new Error('no Pitaya');
}

require.config({

    waitSeconds: 15,

    paths: {
        'ifvisible': 'lib/ifvisible',
        'JSON': 'lib/json2',
        'Path': 'lib/path',
        'singleton': 'lib/singleton',
        'observable': 'lib/observable',
        'observer': 'lib/observer',
        'Clock': 'lib/clock',
        'Countdown': 'lib/countdown',
        'Sound': 'lib/sound',
        'array_extension': 'lib/array_extension',
        'math_extension': 'lib/math_extension',
        'jquery': 'lib/jquery/jquery-1.10.2.min',
        'jquery.superfish': 'lib/superfish',
        'jquery.msg': 'lib/jquery.msg',
        'jquery.tabs': 'lib/jquery.tabs',
        'jquery.ui': 'lib/jquery-ui-1.10.3.custom.min',
        'jquery.cookie': 'lib/jquery.cookie',
        'GroupsSelector': 'lib/groupsselector',
        'DataFetcher': 'business/datafetcher',
        'Order': 'business/order',
        'QuickOrderView': 'business/quickorderview',
        'MultiOrderView': 'business/multiorderview',
        'MultiLocateOrderView': 'business/multilocateorderview',
        'ResultDisplayer': 'business/resultdisplayer',
        'nsk.new_alert': '/inte/js/AlertBox',
        'nsk.new_confirm': '/inte/js/ConfirmBox',
        'NSKAdapter': 'business/nskadapter',
        'bbresult': 'business/bbresult',
        'BBVideo': 'business/bbvideo'
    },

    shim: {
        'jquery.textslider': ['jquery'],
        'jquery.superfish': ['jquery'],
        'jquery.tabs': ['jquery'],
        'jquery.msg': ['jquery'],
        'jquery.ui': ['jquery'],
        'jquery.cookie': ['jquery'],
        'hash': ['observable'],
        'DataFetcher': ['jquery', 'singleton', 'observable'],
        'GroupsSelector': ['jquery'],
        'Clock': ['jquery', 'singleton', 'observer', 'observable'],
        'Countdown': ['jquery', 'singleton', 'observer', 'observable', 'DataFetcher', 'Clock'],
        'Sound': ['jquery'],
        'Order': [
            'jquery', 'jquery.tabs',
            'singleton',
            'observer', 'observable',
            'nsk.new_confirm', 'nsk.new_alert'
        ],
        'QuickOrderView': ['JSON', 'array_extension', 'jquery', 'observable'],
        'MultiOrderView': ['JSON', 'math_extension', 'array_extension', 'jquery', 'observable', 'GroupsSelector'],
        'MultiLocateOrderView': ['JSON', 'math_extension', 'array_extension', 'jquery', 'observable', 'GroupsSelector'],
        'ResultDisplayer': ['jquery'],
        'bbresult': ['array_extension'],
        'BBVideo': ['jquery.cookie']
    }
});

Pitaya.prop(
    'url_ajax_source',
    Pitaya.prop('root')+'/mem/ajax/source.php'
);

require([
    'ifvisible',
    'DataFetcher', 'Clock', 'Countdown',
    'BBVideo',
    'nsk.new_confirm', 'nsk.new_alert',
    'NSKAdapter',
    '/inte/js/jquery.GoldUI.js', 'jquery', 'jquery.ui', 'jquery.cookie'
], function(ifvisible, DataFetcher, Clock, Countdown, BBVideo) {

    var $marquee = $('#ui-marquee marquee');
    var $game_num = $('#game-num');

    // BB視訊視窗
    var bbvideo = new BBVideo();

    //計時器 Clock
    var clock = Clock()
        .bind($('#clock'));

    //倒數計時器
    var opening_game = Pitaya.prop('opening_game');
    var countdown = new Countdown().bind($('#ui-countdown'));
    clock.register(countdown.getListener(Countdown.LISTENER_CLOCK));
    Pitaya.prop('countdown', countdown);

    countdown.register(function(){
        self.GoldUI.closeGoldMenu();
        document.activeElement &&
            document.activeElement.tagName &&
            document.activeElement.tagName.match(/input/i) &&
        document.activeElement.blur();
        // 判斷是否開啟視訊
        if (Pitaya.prop('game') == 'BBKN'){
            bbvideo.win_triger();
        }
    }, Countdown.EVENT_TIMEOUT);

    //活躍期更新間隔
    var DF_TIME = 10;
    //閒置期更新間隔
    var DF_TIME_LAZY = 30;
    //轉換閒置模式的閒置時間
    var IDLE_DURATION = 300;

    var data_fetcher = DataFetcher();
    //設定登出目標路徑
    data_fetcher.logout = function(){
        //注释代码
//        alert(__('IS_NOT_LOGIN'));
//        top.location = Pitaya.prop('url_logout');
    };
    Pitaya.prop('data_fetcher', data_fetcher);

    data_fetcher
        .setURL(Pitaya.prop('url_ajax_source'))
        .setInterval(DF_TIME)
        .register(function(query_data){
            Pitaya.prop('opening_game')
            && (query_data.num = Pitaya.prop('opening_game')['num']);
            query_data.lastchange = Pitaya.prop('server_time');
            query_data.game = Pitaya.prop('game');
            query_data.prev_line = Pitaya.prop('line');
        }, DataFetcher.EVENT_FETCH_BEFORE)
        .register(function(json){

            Pitaya.update(json);

            //校時
            clock.setTime(Pitaya.prop('server_time'), Pitaya.prop('timezone_offset'));

            //調整接近開盤調整那次的request時間點
            if (json.next_game && json.next_game.open_timestamp) {
                var _des_open = json.next_game.open_timestamp - Clock().getTime();
                if (data_fetcher.getInterval() > _des_open) {
                    data_fetcher.sleep(_des_open);
                }
            }

            //調整接近關盤調整那次的request時間點
            if (json.opening_game && json.opening_game.close_timestamp) {
                var _des_close = json.opening_game.close_timestamp - Clock().getTime();
                if (0 < _des_close && data_fetcher.getInterval() >_des_close) {
                    data_fetcher.sleep(_des_close);
                }
            }

            //更新跑馬燈
            json.marquee && $marquee.text(json.marquee);

            //更新期數顯示
            if (json['opening_game'] && json['opening_game']['num']) {
                $game_num.text($game_num.attr('open-format').replace(/:num/, json['opening_game']['num']));
            } else {
                $game_num.text($game_num.attr('close-format'));
            }

            //更新倒數
            var deadline = json['opening_game'] && parseFloat(json['opening_game']['close_timestamp']) || 0;
            countdown.setDeadline(deadline);

        }, DataFetcher.EVENT_FETCH_AFTER)
        .register(clock.getListener(Clock.LISTENER_REFRESH), DataFetcher.EVENT_FETCH_AFTER)
        .register(function(){/* 出錯處理 */}, DataFetcher.EVENT_FETCH_ERROR)
        .wakeup()
    ;

    //此套件在舊版IE有問題
    if ( ! document.body.className.match(/IE[678]/)) {
        ifvisible.setIdleDuration(IDLE_DURATION);
        ifvisible.idle(function(){
            data_fetcher.setInterval(DF_TIME_LAZY);
        });
        ifvisible.wakeup(function(){
            data_fetcher.fetch().setInterval(DF_TIME);
        });
    }

    //
    self.ViewBox.install($('#limitShow'));

    var collection = [];
    $('[action]').each(function(){
        var _action = 'actions/' + this.getAttribute('action');
        collection.push(_action);
    });
    require(collection, function(){/* empty */});

    //開啟BBKN視訊連結
    $(".bb-video-link").click(function() {
        bbvideo.win_open();
    });

    //判斷切換遊戲關閉視訊視窗
    $( window ).unload(function() {
        if (bbvideo.video_win) {
            bbvideo.video_win.close();
        }
    });

    data_fetcher.fetch();

    //除錯偵聽開始,勿刪除
    if (Pitaya.prop('is_debug')) {
        var next_time_update = 0;
        var sleep_time = null;
        var error = null;
        data_fetcher
            .register(function(query_data){
                self.console && console.log(
                    'fetch',
                    data_fetcher._getCurrentTime() - data_fetcher._fetch_time,
                    data_fetcher.getInterval(),
                    query_data
                );//模組主功能測試,別移除
            }, DataFetcher.EVENT_FETCH_BEFORE)
            .register(function(json){
                next_time_update = data_fetcher.getInterval();
                self.console && console.log(json);
                error = null;
            }, DataFetcher.EVENT_FETCH_AFTER)
            .register(function(msg){
                error = msg;
            }, DataFetcher.EVENT_FETCH_ERROR)
            .register(function(time){
                if (isNaN(time)) {
                    sleep_time = null;
                } else {
                    sleep_time = time;
                }
            }, DataFetcher.EVENT_SLEEP)
            .register(function(interval){
                next_time_update = interval;
                sleep_time = null;
            }, DataFetcher.EVENT_WAKEUP);

        clock.register(function(t){
            if (error) {
                Pitaya.dump(error);
            } else if (data_fetcher.isSleep()) {
                if (null !== sleep_time) {
                    sleep_time -= 1;
                    Pitaya.dump('sleep ' + sleep_time + '秒');
                } else {
                    Pitaya.dump('sleeping');
                }
            } else {
                next_time_update -= 1;
                Pitaya.dump('剩 :t 秒更新'.replace(/:t/, next_time_update.toString()));
            }
        });
    }
});
