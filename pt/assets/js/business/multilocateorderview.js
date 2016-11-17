'use strict';

(function(ns, $, JSON, observable, GroupsSelector){

    function MultiLocateOrderView(order, name)
    {
        var view = this;

        observable.call(view);

        view.order = order;
        view.name = name;
        view.tmp_loaded = false;
        view.box = $('<div class="game-box multi-locate-order"></div>').hide();
        view.choose_items = {};
    }

    var _class = MultiLocateOrderView;
    _class._name = _class.name || _class.toString().match(/^function\s*([^\s(]+)/)[1];
    _class.EVENT_SEND_COMPLETE = 'send_complete';
    _class.EVENT_INPUT_CHANGE = 'input_change';
    _class.EVENT_ERROR = 'error';
    _class.LISTENER_VIEW_SEND_BEFORE = 'view_send_before';

    _class.prototype = {
        setContent: function(html, callback, gold_filter)
        {
            var view = this;
            view.box.empty();
            view.box.html(html);
            var handler_input_change = function(){
                gold_filter(this);
                view.notice(view, _class.EVENT_INPUT_CHANGE);
            };

            //有callback 跟 gold_filter才是真正的樣板
            if ((callback instanceof Function) && (gold_filter instanceof Function)) {

                //所有輸入欄位綁定change事件
                view.box.delegate('input.bet-gold', 'change', handler_input_change);

                var groups = view.box.find('table[group]');

                groups.each(function(){
                    var $table = $(this);
                    var group = $table.attr('group');
                    view.choose_items[group] = new _class.ChooseItem(
                        view,
                        group,
                        $table
                    );
                });

                callback(view);
            }

            return view;
        },

        send: function(target, query_data)
        {
            var view = this;

            query_data.orders = {};
            query_data.game_name = view.name;

            var effective_cnt = 0;

            view._each(function(group){
                var choose_item = this;
                var gold = choose_item.count();
                if (gold >= 1) {
                    query_data.orders[group] = {
                        num: choose_item.getNum(),
                        gold: gold,
                        odds: choose_item.odds,
                        gold_total: $('#order-info-total').html()
                    };
                    ++effective_cnt;
                }
            });


            var result = {};
            effective_cnt && $.ajax({
                url: target+'/index.php',
                type: 'post',
                data: query_data,
                dataType: 'json',
                success: function(json) {
                    result = json;
                    json['odds_change'] && view.update_odds(json['odds_change']);
                },
//                error: function(xhr, msg) {},
                complete: function(xhr, msg){
                    if (true === result['result']) {
                        view.clear();
                    }
                    ! result['msg'] && (result['msg'] = msg);
                    result['status'] = xhr.status;
                    view.notice(result, _class.EVENT_SEND_COMPLETE);
                }
            });

            return view;
        },

        close: function()
        {
            var view = this;

            view.$inp_bet_gold && view.$inp_bet_gold.attr('disabled', 'disabled');
            view._each(function(){
                var choose_item = this;
                choose_item.render(false, false);
            });

            return view;
        },

        open: function()
        {
            var view = this;

            view.$inp_bet_gold && view.$inp_bet_gold.removeAttr('disabled');
            view._each(function(){
                var choose_item = this;
                choose_item.render(true);
            });

            return view;
        },

        show: function()
        {
            var view = this;

            view.box.show();

            return view;
        },

        hide: function()
        {
            var view = this;

            view.box.hide();

            return view;
        },

        //更新賠率
        update_odds: function(odds)
        {
            var view = this;

            var diff = [];
            odds && array_map(function(choose){
                var group = choose.replace(/^(FIRST:\d+):MATCH:\d+$/, '$1');
                if (view.choose_items.hasOwnProperty(group)) {
                    var choose_item = view.choose_items[group];
                    choose_item.setOdds(choose, odds[choose]);
                    if (choose_item.hasOddsChanged(choose)) {
                        diff.push(choose_item.node_odds[choose]);
                    }
                }
            }, odds);

            return diff;
        },

        isMin: function()
        {
            var view = this;
            var _gMin = $("#user-info input[name=gold_gmin]") && $("#user-info input[name=gold_gmin]").val();
            var isMin = false;

            view._each(function(){
                var choose_item = this;
                if(_gMin && choose_item.count()<_gMin && choose_item.count()>0){
                    isMin = true;
                }
            });

            return isMin;
        },
        isMax: function()
        {
            var view = this;
            var _gMax = $("#user-info input[name=gold_gmax_my]") && $("#user-info input[name=gold_gmax_my]").val();
            var isMax = false;

            view._each(function(){
                var choose_item = this;
                if(_gMax && choose_item.count()>_gMax && choose_item.count()>0){
                    isMax = true;
                }
            });

            return isMax;
        },

        //計算金額
        count: function()
        {
            var view = this;
            var ret = 0;

            view._each(function(){
                var choose_item = this;
                ret += choose_item.count();
            });

            return ret;
        },

        clear: function()
        {
            var view = this;

            view._each(function(){
                var choose_item = this;
                choose_item.clear();
            });

            return view;
        },

        _each: function(callback)
        {
            var view = this;

            if (typeof callback == 'function') {
                for (var group in view.choose_items) {
                    callback.call(view.choose_items[group], group);
                }
            }

            return view;
        },

        render: function()
        {
            var view = this;

            view._each(function(){
                var choose_item = this;
                choose_item.render(view.order.isOpen());
            });

            return view;
        },

        //order.js 用
        getSendBeforeEventData: function()
        {
            var view = this;
            var event_data = {
                result: true
            };

            var effective_cnt = 0;
            for (var group in view.choose_items) {
                var choose_item = view.choose_items[group];
                var enable = choose_item.isEnable();
                if (enable
                    && choose_item.isEffective()
                ) {
                    ++effective_cnt;
                } else if (enable) {
                    choose_item.clear();
                }
            }

            if ( ! effective_cnt) {
                event_data.result = false;
                event_data.msg = 'NO_EFFECTIVE_CHOOSES';
            }

            return event_data;
        },

        //GoldUI會用到
        getInputs: function()
        {
            var view = this;

            return view.box.find('input.bet-gold');
        }
    };

    _class.ChooseItem = function(view, group, $table)
    {
        var choose_item = this;
        choose_item.order = view.order;
        choose_item.view = view;
        choose_item.group = group;
        choose_item.chooses = [];
        choose_item.node_odds = {};
        choose_item.odds = {};
        choose_item.prev_odds = {};
        choose_item.has_odds_changed = {};
        choose_item.$inp_bet_gold = $table.find('input.bet-gold');
        choose_item._balls_row = {};//快取此table的號碼物件
        choose_item._checked_locates = {};//紀錄此table選取的號碼位置

        $table.find('.odds').each(function(){
            var $node_odds = $(this);
            var choose = $node_odds.attr('choose');
            choose_item.chooses.push(choose);
            choose_item.node_odds[choose] = $node_odds;
            choose_item.setOdds(choose, $node_odds.text());
        });

        $table.find('.ball[locate]').each(function(){
            var $ball = $(this);
            var locate = $ball.attr('locate');
            var num = $ball.html();
            if ( ! choose_item._balls_row[locate]) {
                choose_item._balls_row[locate] = {};

                //替每個位置產生一個紀錄球號的空間
                choose_item._checked_locates[locate] = false;
            }

            choose_item._balls_row[locate][num] = $ball;
        });

        $table.delegate('.ball[locate]', 'click', function(){
            var ball = this;
            var locate = ball.getAttribute('locate');
            var num = ball.innerHTML;

            if ( ! choose_item.isEnable()) {
                return false;
            }

            for (var _locate in choose_item._checked_locates) {
                if (locate != _locate && choose_item._checked_locates[_locate] == num) {
                    choose_item._checked_locates[_locate] = false;
                }
            }

            if (choose_item._checked_locates[locate] == num) {
                choose_item._checked_locates[locate] = false;
            } else {
                choose_item._checked_locates[locate] = num;
            }

            choose_item.$inp_bet_gold.change();

            choose_item._renderBalls(true);
        });

        return choose_item;
    };

    _class.ChooseItem.prototype = {
        setOdds: function(choose, odds)
        {
            var choose_item = this;
            var order = choose_item.order;
            var _odds = parseFloat(odds);
            choose_item.prev_odds[choose] = choose_item.odds[choose];
            choose_item.odds[choose] = _odds;
            choose_item.has_odds_changed[choose] = choose_item.prev_odds[choose] != choose_item.odds[choose];
            choose_item.node_odds[choose].html(choose_item._format_odds(_odds));

            if (order.isOpen() && order.isEffectiveOdds(_odds)) {
                choose_item.node_odds[choose].parent().show();
            } else {
                choose_item.node_odds[choose].parent().hide();
            }

            return choose_item;
        },

        hasOddsChanged: function(choose)
        {
            var choose_item = this;
            var has_changed = choose_item.has_odds_changed[choose];
            choose_item.has_odds_changed[choose] = false;

            return has_changed;
        },

        getOdds: function(choose)
        {
            var choose_item = this;

            return choose_item.odds[choose];
        },

        isEnable: function()
        {
            var choose_item = this;
            var order = choose_item.view.order;
            var enable = true;
            var effective_odds = 0;
            choose_item._each(function(){
                var choose = this;
                var odds = choose_item.odds[choose];
                if ( ! order.isOddsEnable(choose)) {
                    enable = false;
                    return false;
                }

                if (order.isEffectiveOdds(odds)) {
                    ++effective_odds;
                }

                return true;
            });

            return enable && !! effective_odds;
        },

        clear: function()
        {
            var choose_item = this;

            choose_item.$inp_bet_gold.val('');

            //清除號碼選取快取
            for (var locate in choose_item._checked_locates) {
                choose_item._checked_locates[locate] = false;
            }

            choose_item._renderBalls();

            choose_item.view.notice(choose_item.view, _class.EVENT_INPUT_CHANGE);

            return choose_item;
        },

        getNum: function()
        {
            var choose_item = this;

            return choose_item._checked_locates;
        },

        count: function()
        {
            var choose_item = this;

            return parseInt(choose_item.$inp_bet_gold.val(), 10) || 0;
        },

        isEffective: function()
        {
            var choose_item = this;
            var ret = true;

            for (var locate in choose_item._checked_locates) {
                if (false === choose_item._checked_locates[locate]) {
                    ret = false;
                    break;
                }
            }

            return ret;
        },

        _close: function()
        {
            var choose_item = this;

            choose_item.$inp_bet_gold.val('');
            choose_item.$inp_bet_gold.attr('disabled', 'disabled');
            choose_item._odds_hide();
            choose_item.clear();
            choose_item._eachBall(function(){
                var $ball = this;
                $ball.addClass('disabled');
            });

            return choose_item;
        },

        _odds_hide: function()
        {
            var choose_item = this;
            for (var choose in choose_item.node_odds) {
                choose_item.node_odds[choose].parent().hide();
            }

            return choose_item;
        },

        _open: function()
        {
            var choose_item = this;

            choose_item.$inp_bet_gold.removeAttr('disabled');
            if (choose_item.isEnable()) {
                choose_item._renderBalls();
            }

            return choose_item;
        },

        _odds_show: function()
        {
            var choose_item = this;
            var order = choose_item.order;
            for (var choose in choose_item.node_odds) {
                var node = choose_item.node_odds[choose];
                if (order.isEffectiveOdds(choose_item.odds[choose])) {
                    node.parent().show();
                } else {
                    node.parent().hide();
                }
            }

            return choose_item;
        },

        _format_odds: function(odds)
        {
            odds = (parseFloat(odds) || 0).toFixed(4);
            return odds.toString().replace(/^(\d+(?:\.\d{2}))\d*$/, '$1');
        },

        render: function(is_order_open)
        {
            var choose_item = this;

            if (is_order_open && choose_item.isEnable()) {
                choose_item._open();
            } else {
                choose_item._close();
            }

            return choose_item;
        },

        _renderBalls: function()
        {
            var choose_item = this;
            var locates = choose_item._checked_locates;
            var enable = choose_item.isEnable();
            var has_checked = choose_item._hasChecked();

            choose_item._eachBall(function(locate, num){
                var $ball = this;
                if (
                    enable
                    && (
                        ! has_checked
                        || (
                            (choose_item._hasChecked(locate) && locates[locate] == num)
                            || ( ! choose_item._hasChecked(locate) && ! choose_item._inChecked(num))
                        )
                    )
                ) {
                    $ball.removeClass('disabled');
                } else {
                    $ball.addClass('disabled');
                }
            });
        },

        _hasChecked: function(locate)
        {
            var choose_item = this;
            var locates = choose_item._checked_locates;

            if (typeof locate == 'undefined') {
                for (var _locate in locates) {
                    if (locates[_locate]) {
                        return true;
                    }
                }

                return false;
            }

            return false !== locates[locate];
        },

        _inChecked: function(num)
        {
            var choose_item = this;
            var locates = choose_item._checked_locates;

            for (var locate in locates) {
                if (num === locates[locate]) {
                    return true;
                }
            }

            return false;
        },

        _each: function(callback)
        {
            var choose_item = this;
            if (typeof callback == 'function') {
                for (var i = 0, L = choose_item.chooses.length; i < L; ++i) {
                    callback.call(choose_item.chooses[i], i);
                }
            }

            return choose_item;
        },

        _eachBall: function(callback)
        {
            var choose_item = this;

            if (typeof callback == 'function') {
                for (var locate in choose_item._balls_row) {
                    var balls = choose_item._balls_row[locate];
                    for (var num in balls) {
                        var $ball = balls[num];
                        callback.call($ball, locate, num);
                    }
                }
            }

            return choose_item;
        }
    };

    ns[_class._name] = _class;
    if (typeof define == 'function') {
        define(function(){return _class;});
    }

})(self, jQuery, JSON, observable, GroupsSelector);
