'use strict';

(function(ns, $, JSON, observable, GroupsSelector){

    function MultiOrderView(order, name)
    {
        var view = this;

        observable.call(view);

        view.order = order;
        view.name = name;
        view.tmp_loaded = false;
        view.box = $('<div class="game-box multi-order"></div>').hide();
        view.$inp_bet_gold = null;//金額輸入欄位(jquey)
        view.$display_bets_count = null;
        view.groups_selector = null;//群組選擇器
        view.choose_items = {};

        view.balls = {};//球號映射表(jquery list)
        view.active_balls = {};//選擇球號(jquery list)
        view.list_active_balls = [];//球號選擇順序
        view.$chk_show_bets = null;
        view.$display_bets = null;
        view.bet_limit = 200;
    }

    var _class = MultiOrderView;
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
                var inp_bet_gold = this.box.find('input.bet-gold').get(0);
                if (inp_bet_gold) {
                    view.$inp_bet_gold = $(inp_bet_gold);
                    view.$inp_bet_gold.bind('keyup', handler_input_change);
                    view.$inp_bet_gold.bind('change', handler_input_change);
                }

                var display_bets_count = view.box.find('.display-bets-count').get(0);
                if (display_bets_count) {
                    view.$display_bets_count = $(display_bets_count);
                }

                var display_bets = view.box.find('.display-bets').get(0);
                var chk_show_bets = view.box.find('.chk-show-bets').get(0);
                if (chk_show_bets && display_bets) {
                    view.$display_bets = $(display_bets).hide();
                    view.$chk_show_bets = $(chk_show_bets);
                    view.$chk_show_bets.bind('click', function(){
                        var _checked = ! view.$chk_show_bets.data('checked');
                        view.$chk_show_bets.data('checked', _checked);
                        if (_checked) {
                            $(window.parent.document).find("#mainFrame").height(1305);

                            view.$chk_show_bets.addClass('checked');
                            view.$display_bets.show();
                        } else {
                            $(window.parent.document).find("#mainFrame").height(600);

                            view.$chk_show_bets.removeClass('checked');
                            view.$display_bets.hide();
                        }
                        view.display_bets();
                    });
                }

                var btn_chooses = view.box.find('.btn-choose-group');

                btn_chooses.each(function(){
                    var $btn_choose = $(this);
                    var group = $btn_choose.attr('group');
                    var $nodes_odds = view.box.find('[choose^=\''+group+'\']');
                    view.choose_items[group] = new _class.ChooseItem(
                        view,
                        group,
                        $btn_choose,
                        $nodes_odds
                    );
                });

                view.groups_selector = (new GroupsSelector(btn_chooses)).render();
                view.box.delegate('.btn-choose-group', 'click', function(){
                    var btn_choose = this;
                    var group = btn_choose.getAttribute('group');
                    view.groups_selector.render(group);
                    view.render();
                    view.check_input_reset();
                    view.display_bets();
                    view.notice(view, _class.EVENT_INPUT_CHANGE);
                });

                this.box.find('.ball').each(function(){
                    var ball = $(this);
                    view.balls[ball.html()] = ball;
                });
                this.box.delegate('.ball', 'click', function(){

                    var key = this.innerHTML;
                    var ball = view.balls[key];

                    ( ! ball.data('checked')) ? view.set_checked(ball) : view.set_unchecked(ball);

                    view.check_input_reset();
                    view.display_bets();
                    view.notice(view, _class.EVENT_INPUT_CHANGE);
                });

                callback(view);
            }


            return view;
        },

        send: function(target, query_data)
        {
            var view = this;
            var group = view.groups_selector.getActive();
            var choose_item = view.choose_items[group];

            var selectArray = view.compile_bets();

            query_data.orders = {};
            query_data.game_name = view.name;

            var group_data = {};
            group_data.num = [];
            group_data.gold = view.$inp_bet_gold.val();

            for (var ball in view.active_balls) {
                group_data.num.push(ball);
            }
            group_data.odds = choose_item.odds;
            group_data.gold_total = $('#order-info-total').html();

            query_data.orders[group] = group_data;
            query_data.selectArray = selectArray;

            var result = {};
            $.ajax({
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
                var group = choose.replace(/^(CHOOSE:\d+):MATCH:\d+/, '$1');
                if (view.choose_items.hasOwnProperty(group)) {
                    var choose_items = view.choose_items[group];
                    choose_items.setOdds(choose, odds[choose]);
                    if (choose_items.hasOddsChanged(choose)) {
                        diff.push(choose_items.node_odds[choose]);
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

            if(_gMin && (parseInt(view.$inp_bet_gold.val(), 10) || 0)<_gMin){
                isMin = true;
            }
            return isMin;
        },
        isMax: function()
        {
            var view = this;
            var _gMax = $("#user-info input[name=gold_gmax_my]") && $("#user-info input[name=gold_gmax_my]").val();
            var isMax = false;

            if(_gMax && (parseInt(view.$inp_bet_gold.val(), 10) || 0)>_gMax){
                isMax = true;
            }
            return isMax;
        },

        //計算金額
        count: function()
        {
            var view = this;
            return (parseInt(view.$inp_bet_gold.val(), 10) || 0) * view.count_effective();
        },

        //取得選號數
        count_choose: function()
        {
            var view = this;
            var group = view.groups_selector.getActive();
            var cnt_choose = parseInt(group.replace(/^\w+:(\d+)/, '$1'), 10);
            if ( ! cnt_choose) {
                throw new Error('error multi choose group ' + group);
            }

            return cnt_choose;
        },

        //取得有效投注排列組和數
        count_effective: function()
        {
            var view = this;
            var balls = array_keys(view.active_balls).length;
            var per_bet_balls = view.count_choose();
            var limit = (balls < per_bet_balls)
                ? 0
                : factorial(balls, balls - per_bet_balls + 1) / factorial(1, per_bet_balls);

            view.$display_bets_count && view.$display_bets_count.html(limit);

            return limit;
        },

        display_bets: function()
        {
            var view = this;
            if (view.$display_bets && view.$chk_show_bets) {
                view.$display_bets.empty();
                if (view.$chk_show_bets.data('checked')) {
                    var bets = view.compile_bets();
                    var contents = array_map(function(){
                        var _bet = this;
                        return '<span class="display-bet">' +
                            array_map(function(){
                                var _num = this;
                                return '<span>' + _num + '</span>';
                            }, _bet).join('') +
                            '</span>';
                    }, bets);
                    view.$display_bets.html(contents.join('\n'));
                }
            }

            return view;
        },

        //取得排列組和陣列
        compile_bets: function()
        {
            var view = this;
            var ret = [];
            var choose_cnt = view.count_choose();

            function _compile(collection, pack, _balls, _cnt)
            {
                _cnt--;
                if (0 > _cnt) {
                    return;
                }

                for (var n in _balls) {
                    if (pack.hasOwnProperty(n)) {
                        continue;
                    }
                    var _pack = {};
                    _pack[n] = 1;
                    $.extend(_pack, pack);

                    if (0 === _cnt) {
                        collection[collection.length] = array_keys(_pack).sort(function(a, b){return a - b;});
                    } else {
                        _compile(collection, _pack, _balls, _cnt);
                    }
                }
            }

            _compile(ret, {}, view.active_balls, choose_cnt);

            ret = array_unique(ret);

            return ret;
        },

        clear: function()
        {
            var view = this;
            view.$inp_bet_gold && view.$inp_bet_gold.val('');
            view.$display_bets && view.$display_bets.empty();
            for (var n in view.active_balls) {
                view.set_unchecked(view.active_balls[n]);
            }

            view.notice(view, _class.EVENT_INPUT_CHANGE);

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

        _isFocus: function(group)
        {
            var view = this;
            var group_selector = view.groups_selector;
            var active_group = group_selector ? group_selector.getActive() : null;

            return active_group == group;
        },

        render: function()
        {
            //初始化页面高度
            if(!$(this.box.find('.chk-show-bets').get(0)).data('checked')){
                $(window.parent.document).find("#mainFrame").height(600);
            }

            var view = this;

            view._each(function(){
                var choose_item = this;
                choose_item.render(view.order.isOpen());
            });

            return view;
        },

        set_checked: function($ball)
        {
            var view = this;
            var key = $ball.html();
            $ball.addClass('checked');
            $ball.data('checked', true);
            view.active_balls[key] = $ball;
            view.list_active_balls.push($ball);
        },

        set_unchecked: function($ball)
        {
            var view = this;
            var key = $ball.html();
            $ball.removeClass('checked');
            $ball.data('checked', false);
            delete view.active_balls[key];
            array_map(function(i){
                var _ball = this;
                if (_ball === $ball) {
                    view.list_active_balls.splice(i, 1);
                }
            }, view.list_active_balls);
        },

        check_input_reset: function()
        {
            var view = this;
            var next_effective = view.count_effective();

            if (view.bet_limit < next_effective) {
                view.set_unchecked(view.list_active_balls.pop());
                while (view.count_effective() > view.bet_limit) {
                    view.set_unchecked(view.list_active_balls.pop());
                }
                var event_data = {
                    msg: 'EFFECTIVE_OVER_THEN_LIMIT',
                    detail: {
                        balls: view.list_active_balls.length
                    }
                };
                view.notice(event_data, _class.EVENT_ERROR);

            }
        },

        //order.js 用
        getSendBeforeEventData: function()
        {
            var view = this;
            var group = view.groups_selector.getActive();
            var choose_item = view.choose_items[group];
            var event_data = {
                result: true
            };
            if ( ! choose_item) {
                throw new Error('no such choose item [' + group + ']');
            } else if ( ! choose_item.isEnable()) {
                event_data.result = false;
                event_data.msg = 'GROUP_CHOOSE_N_DISABLED';
                event_data.detail = {choose: view.count_choose()};
            } else if (1 > view.count_effective()) {
                event_data.result = false;
                event_data.msg = 'EFFECTIVE_NEED_AT_LEAST';
                event_data.detail = {num: view.count_choose()};
            }

            return event_data;
        },

        //GoldUI會用到
        getInputs: function()
        {
            var view = this;
            if (view.$inp_bet_gold) {
                return $([view.$inp_bet_gold.get(0)]);
            }

            return [];
        }
    };

    _class.ChooseItem = function(view, group, $btn_choose, node_odds)
    {
        var choose_item = this;
        choose_item.order = view.order;
        choose_item.view = view;
        choose_item.group = group;
        choose_item.$btn_choose = $btn_choose;
        choose_item.chooses = [];
        choose_item.node_odds = {};
        choose_item.odds = {};
        choose_item.prev_odds = {};
        choose_item.has_odds_changed = {};

        node_odds.each(function(){
            var $node_odds = $(this);
            var choose = $node_odds.attr('choose');
            choose_item.chooses.push(choose);
            choose_item.node_odds[choose] = $node_odds;
            choose_item.setOdds(choose, $node_odds.text());
        });

        return choose_item;
    }

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
                choose_item.node_odds[choose].show();
            } else {
                choose_item.node_odds[choose].hide();
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

        _close: function()
        {
            var choose_item = this;

            choose_item.$btn_choose.attr('disabled', 'disabled');
            choose_item._odds_hide();

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
            var view = choose_item.view;

            choose_item.$btn_choose.removeAttr('disabled');
            if (view._isFocus(choose_item.group)) {
                choose_item._odds_show();
            } else {
                choose_item._odds_hide();
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

        _each: function(callback)
        {
            var choose_item = this;
            if (typeof callback == 'function') {
                for (var i = 0, L = choose_item.chooses.length; i < L; ++i) {
                    callback.call(choose_item.chooses[i], i);
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
