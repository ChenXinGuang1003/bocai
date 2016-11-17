"use strict";

(function(ns, $, observable, JSON){

    function QuickOrderView(order, name)
    {
        var view = this;

        observable.call(view);

        view.order = order;
        view.name = name;
        view.tmp_loaded = false;
        view.box = $('<div class="game-box quick-order"></div>').hide();
        view.choose_items = {};
    }

    var _class = QuickOrderView;
    _class._name = _class.name || _class.toString().match(/^function\s*([^\s(]+)/)[1];
    _class.EVENT_SEND_COMPLETE = 'send_complete';
    _class.EVENT_INPUT_CHANGE = 'input_change';
    _class.EVENT_ERROR = 'error';

    _class.prototype = {
        setContent: function(html, callback, gold_filter)
        {
            var view = this;

            this.box.empty();
            this.box.html(html);
            var handler_input_change = function(){
                gold_filter(this);
                view.notice(view, _class.EVENT_INPUT_CHANGE);
            };

            //有callback 跟 gold_filter才是真正的樣板
            if ((callback instanceof Function) && (gold_filter instanceof Function)) {
                view.box.delegate('input[name^=orders\\[]', 'keyup', handler_input_change);
                view.box.delegate('input[name^=orders\\[]', 'change', handler_input_change);
                var $inputs = view.getInputs();
                if ($inputs.length) {
                    $inputs.each(function(){
                        var _input = this;
                        var m = _input.name.match(/orders\[([^\]]+)\]/);
                        var _choose = m[1];
                        view.choose_items[_choose] = new _class.ChooseItem(
                            view,
                            $($(_input.parentNode).find('.odds').get(0)),
                            $(_input),
                            _choose
                        );
                    });

                    view.box.tabs({
                        onchange: function(btn){
                            view.clear();
                        }
                    });
                }

                callback(view);
            }

            return view;
        },

        send: function(target, query_data)
        {
            var view = this;

            query_data.orders = {};
            query_data.game_name = view.name;

            view._each(function(choose){
                var choose_item = this;
                var gold = choose_item.getGold();
                if (gold && choose_item.isEnable()) {
                    var pack = {
                        gold: gold,
                        number: choose,
                        odds: choose_item.getOdds()
                    };
                    query_data.orders[choose] = pack;
                }
            });

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
            view._each(function(){
                var choose_item = this;
                choose_item.render(false);
            });

            view.notice(view, _class.EVENT_INPUT_CHANGE);

            return view;
        },

        open: function()
        {
            var view = this;
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
                if (view.choose_items.hasOwnProperty(choose)) {
                    var choose_items = view.choose_items[choose];
                    choose_items.setOdds(odds[choose]);
                    if (choose_items.hasOddsChanged()) {
                        diff.push(choose_items.$node_odds);
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
                if(_gMin && choose_item.getGold()<_gMin && choose_item.getGold()>0){
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
                if(_gMax && choose_item.getGold()>_gMax && choose_item.getGold()>0){
                    isMax = true;
                }
            });

            return isMax;
        },

        count: function()
        {
            var view = this;
            var gold = 0;

            view._each(function(){
                var choose_item = this;
                gold += choose_item.getGold();
            });

            return gold;
        },

        clear: function(){
            var view = this;

            view._each(function(){
                var choose_item = this;
                choose_item.setGold('');
            });

            view.notice(view, _class.EVENT_INPUT_CHANGE);

            return view;
        },

        _each: function(callback)
        {
            var view = this;

            if (typeof callback == 'function') {
                for (var choose in view.choose_items) {
                    callback.call(view.choose_items[choose], choose);
                }
            }

            return view;
        },

        render: function()
        {
            var view = this;
            var order = view.order;
            view._each(function(){
                var choose_item = this;
                choose_item.render(order.isOpen());
            });

            //初始化页面高度
            var mainFrameHeight = 548;
            if(view.order.url_order.indexOf("GXSF")>-1){
                if(view.name && view.name=="SP"){
                    mainFrameHeight = 700;
                }else if(view.name && view.name=="NORMAL_NUMBER"){
                    mainFrameHeight = 730;
                }else if(view.name && view.name=="GENERAL"){
                    mainFrameHeight = 555;
                }else{
                    mainFrameHeight = 548;
                }
            }else if(view.name && view.name=="GENERAL" && view.order.url_order.indexOf("GDSF")>-1){
                mainFrameHeight = 1235;
            }else if(view.name && view.name=="NORMAL_NUMBER" && view.order.url_order.indexOf("BJPK")>-1){
                mainFrameHeight = 770;
            }else if(view.name && view.name=="GENERAL" && view.order.url_order.indexOf("TJSF")>-1){
                mainFrameHeight = 1235;
            }else{
                mainFrameHeight = 548;
            }
            $(window.parent.document).find("#mainFrame").height(mainFrameHeight);

            return view;
        },

        //order.js 用
        getSendBeforeEventData: function()
        {
            return {
                result: true
            };
        },

        //GoldUI會用到
        getInputs: function()
        {
            var view = this;
            return view.box.find('input[name^=orders\\[]');
        }
    };

    _class.ChooseItem = function(view, $node_odds, $node_input, choose)
    {
        var choose_item = this;
        choose_item.order = view.order;
        choose_item.view = view;
        choose_item.$node_odds = $node_odds;
        choose_item.$node_input = $node_input.attr('maxlength', 10);
        choose_item.choose = choose;
        choose_item.odds = 0;
        choose_item.prev_odds = 0;
        choose_item.has_odds_changed = false;

        choose_item.setOdds($node_odds.text());
    }

    _class.ChooseItem.prototype = {
        setOdds: function(odds)
        {
            var choose_item = this;
            choose_item.prev_odds = choose_item.odds;
            choose_item.odds = parseFloat(odds);
            choose_item.has_odds_changed = choose_item.prev_odds != choose_item.odds;
            choose_item.$node_odds.html(choose_item._format_odds(choose_item.odds));

            return choose_item;
        },

        hasOddsChanged: function()
        {
            var choose_item = this;
            var has_changed = choose_item.has_odds_changed;
            choose_item.has_odds_changed = false;

            return has_changed;
        },

        getOdds: function()
        {
            var choose_item = this;
            return choose_item.odds;
        },

        setGold: function(gold)
        {
            var choose_item = this;

            if ('' !== gold) {
                gold = parseInt(gold, 10);
                gold = 0 >= gold ? '' : gold;
            }

            choose_item.$node_input.val(gold);

            return choose_item;
        },

        getGold: function()
        {
            var choose_item = this;
            return parseInt(choose_item.$node_input.val(), 10) || 0;
        },

        isEnable: function()
        {
            var choose_item = this;
            var odds = choose_item.odds;
            var choose = choose_item.choose;
            var order = choose_item.view.order;
            return order.isEffectiveOdds(odds) && order.isOddsEnable(choose);
        },

        _close: function()
        {
            var choose_item = this;
            choose_item.$node_odds.css({visibility: 'hidden'});
            choose_item.$node_input.attr('disabled', 'disabled');
            choose_item.$node_input.val('');

            return choose_item;
        },

        _open: function()
        {
            var choose_item = this;
            choose_item.$node_odds.css({visibility: 'visible'});
            choose_item.$node_odds.html(choose_item._format_odds(choose_item.odds));
            choose_item.$node_input.removeAttr('disabled');

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
        }
    };

    ns[_class._name] = _class;
    if (typeof define == 'function') {
        define(function(){return _class;});
    }

})(self, jQuery, observable, JSON);