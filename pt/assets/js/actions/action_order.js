"use strict";

if ( ! self.Pitaya) {
    throw new Error('no Pitaya');
}

require([
    'DataFetcher', 'GroupsSelector', 'Order', 'Countdown', 'Sound', 'ResultDisplayer',
    'jquery','jquery.msg',
    'Path'
], function(DataFetcher, GroupsSelector, Order, Countdown, Sound, ResultDisplayer){

    var countdown = Pitaya.prop('countdown');
    var data_fetcher = Pitaya.prop('data_fetcher');

    var opening_game = Pitaya.prop('opening_game');

    //order block
    var $action = $('[action=action_order]:eq(0)');

    //遊戲期數區塊
    var $game_num = $('#game-num');

    //賠率異動變色處理
    var current_num = opening_game && opening_game.num;

    //下注結果處理
    var view_mg = $('#message-box').msg({timeout:20, text_leave: Lang('leave')});

    //下注完成更新額度
    var $display_balance = $('#balance');

    //玩法按鈕控制器
    var view_groups = new GroupsSelector($('#view-groups a[href^=#]'));
    $('#view-groups').tooltip();

    var $nogame_box = $('#nogame');
    var $result_box = $('#result-display');

    var result_displayer = new ResultDisplayer(
        Pitaya.prop('game'),
        $result_box.find('.game-num'),
        $result_box.find('.ball-field')
    );
    self.result_displayer = result_displayer;

    //下注樣板區載體
    var block_orders = $('#orders');

    //下注主按鈕
    var order_info = $('#order-info');

    //order物件
    var order = new Order({
        url_tmp: $action.attr('url-tmp') + Pitaya.prop('game'),
        url_order: $action.attr('url-order') + Pitaya.prop('game'),
        block_orders: block_orders,
        display_total: $('#order-info-total'),
        btn_submit: $('#btn-orders-submit'),
        btn_reset: $('#btn-orders-reset')
    })
        //賠率異動
        .register(function(odds_nodes){
            var game_num = Pitaya.prop('opening_game') && Pitaya.prop('opening_game')['num'];

            if (current_num == game_num) {
                var $nodes = $(odds_nodes);
//                Sound().play('/member/ding.swf');
                $nodes.each(function(){this.addClass('odds-changed')});
                setTimeout(function(){$nodes.each(function(){this.removeClass('odds-changed')});}, 5000);
            }

            current_num = game_num;

        }, Order.EVENT_VIEW_ODDS_CHANGE)

        //下注確認
        .register(function(data){
            var gold = data.gold;

            var game_num = Pitaya.prop('opening_game') && Pitaya.prop('opening_game')['num'];
            var query_data = {game: Pitaya.prop('game'), game_num: game_num};
            var _gMin = $("#user-info input[name=gold_gmin]").val();
            var _gMax = $("#user-info input[name=gold_gmax_my]").val();

            if (true !== data.result) {
                var msg = data.msg;
                var detail = data.detail;
                new_alert(__(msg, detail));
            } else if (1 > gold) {
                new_alert(__('pls_key_amount'));
            } else if (_gMin && _gMin> gold || data.isMin) {
                new_alert(__('amount_under') + ' : '  + _gMin);
            } else if (data.isMax) {
                new_alert(__('amount_max') + ' : '  + _gMax);
            } else if (game_num && self.new_confirm) {
                new_confirm(
                    __('word_bet_gold') +':' + gold,
                    function(){
                        data.success(query_data);
                    }
                );
            } else if (game_num && confirm( __('word_bet_gold')+':' + gold)) {
                data.success(query_data);
            }
        }, Order.EVENT_SEND_BEFORE)

        //下注結果 + 額度更新 + 音效處裡
        .register(function(json){
//            view_mg.msg_show(json['msg'], json['result']? __('BET_SUCCESS') : '<span class="error"></span>'+__('BET_FAIL'));
            if (typeof json['remain_balance'] != 'undefined') {
                $display_balance.text(json['remain_balance']);
            }

            if (true === json['result']) {
                new_alert(Lang('OperateSuccess'));
            } else {
                //错误提示_______________
                new_alert(Lang('OperateFail'));
            }
        }, Order.EVENT_SEND_COMPLETE)

        //個別樣板錯誤訊息
        .register(function(data){
            if (typeof data == 'string') {
                new_alert(__(data));
            } else {
                new_alert(__(data.msg, data.detail));
            }
        }, Order.EVENT_VIEW_ERROR)

        //樣板初始化註冊快選金額程序
        .register(function(view){
            self.GoldUI.installInput(view.getInputs(), function(){
                order.count(view);
            });
        }, Order.EVENT_VIEW_INIT);

    //資料更新物件
    data_fetcher
        .register(order.getListener(Order.LISTENER_REFRESH), DataFetcher.EVENT_FETCH_AFTER)
        //向資料刷新物件註冊偵聽更新資料
        .register(function(json){

            switch (Pitaya.prop('game')) {
                case 'BBKN':
                    //bbkn 收flash 更新
                    break;
                default:
                    result_displayer.render(json['prev_game']);
            }

        }, DataFetcher.EVENT_FETCH_AFTER);



    //頁面第一次顯示需判斷顯示開盤或關盤
    countdown.isTimeout() ? ui_close() : ui_open();

    //倒數計時器
    countdown
        .register(function(){
            ui_close();
        }, Countdown.EVENT_TIMEOUT)
        .register(function(){
            ui_open();
        }, Countdown.EVENT_RESTART);

    //js 路由器,先宣告先match
    Path.map('#/BJPK/MULTI_CHOOSE').to(multi_B_order_init);
    Path.map('#/:game/MULTI_CHOOSE').to(multi_A_order_init);
    Path.map('#/:game/:view_group').to(quick_order_init);

    //js 路由器,設定各遊戲預設頁面
    switch (Pitaya.prop('game')) {
        case 'BBKN':
            require(['bbresult'], function(){});
            Path.root('#/'+Pitaya.prop('game')+'/'+view_groups.getActive());
            //目前只有bbkn 的賽果顯示不放nogame內
            result_displayer.closeNum();
            break;

        case 'GXSF':
        case 'GD11':
        case 'GDSF':
        case 'TJSF':
        case 'BJKN':
        case 'CAKN':
        case 'AUKN':
        default:
            Path.root('#/'+Pitaya.prop('game')+'/'+view_groups.getActive());
            $nogame_box.append($result_box);
            //頁面初始時顯示賽果
            result_displayer.render(Pitaya.prop('prev_game'));
            result_displayer.openNum();
            break;

    }

    //js 路由器,啟動
    Path.listen();

    //一般快選初始化
    function quick_order_init()
    {
        var path = this;
        var params = path.params;
        view_groups.render(params.view_group);
        require(['QuickOrderView'], function(QuickOrderView){
            order
                .fetchView(QuickOrderView, view_groups.getActive())
                .render(view_groups.getActive());
        });

        order_info.attr('class', 'quick-order-info');
        block_orders.attr('class', params.view_group);
    }

    //多選初始化
    function multi_A_order_init()
    {
        view_groups.render('MULTI_CHOOSE');
        require(['MultiOrderView'], function(MultiOrderView){
            order
                .fetchView(MultiOrderView, view_groups.getActive())
                .render(view_groups.getActive());
        });

        order_info.attr('class', 'multi-order-info');
        block_orders.attr('class', 'MULTI_CHOOSE');
    }

    //多選(定位 PK )初始化
    function multi_B_order_init()
    {
        view_groups.render('MULTI_CHOOSE');
        require(['MultiLocateOrderView'], function(MultiLocateOrderView){
            order
                .fetchView(MultiLocateOrderView, view_groups.getActive())
                .render(view_groups.getActive());
        });

        order_info.attr('class', 'multi-locate-order-info');
        block_orders.attr('class', 'MULTI_CHOOSE');
    }

    //整個界面開關邏輯
    function ui_close()
    {
        block_orders.hide();
        order_info.hide();
        order.close();
        $game_num.parent().hide();
        $nogame_box.show();
    }

    function ui_open()
    {
        block_orders.show();
        order_info.show();
        order.open();
        $game_num.parent().show()
        $nogame_box.hide();
    }

});


