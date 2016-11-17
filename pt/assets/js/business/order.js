"use strict";

if ( ! self.Pitaya) {
    throw new Error('no Pitaya');
}

(function(ns, $, observer, observable, singleton){

    function gold_filter (node) {
        var gold = parseInt(node.value, 10);
        node.value = (gold && 0 < gold) ? gold : '';

        return gold;
    }

    function Order(options)
    {
        if ( ! singleton.call(this, Order, arguments)) {
            return Order.instance();
        }

        var order = this;

        observable.call(order);
        observer.call(order);

        order._is_open = true;
        order._waiting_view = false;
        order.request = null;
        order.disable_odds = {};
        order.views = {};

        order.url_tmp = options['url_tmp'];
        order.url_order = options['url_order'];
        order.block_orders = options['block_orders'];
        order.display_total = options['display_total'];
        order.btn_submit = options['btn_submit'];
        order.btn_reset = options['btn_reset'];
        order.active_view = null;
        order.default_view = null;

        order.block_orders.delegate('input[type=text]', 'keyup', function(e){
            if (13 === e.keyCode) {
                order.active_view && order.send(order.active_view);
            }
        });

        if (Pitaya.prop('disable_odds')) {
            order.disable_odds = Pitaya.prop('disable_odds');
        }

        order.btn_submit.bind('click', function(){
            if (order.active_view && order.notice(order.active_view, Order.EVENT_SUBMIT_CLICK)) {
                order.send(order.active_view);
            }
        });

        order.btn_reset.bind('click', function(e){
            order.active_view && order.active_view.clear();
        });

        order.setListener(Order.LISTENER_REFRESH, function(data)
        {
            var active_view = order.active_view;
            if (data.hasOwnProperty('odds') && data['odds']) {

                var diff = [];

                for (var group in order.views) {
                    diff = diff.concat(order.views[group].update_odds(data['odds']));
                }

                if (diff.length && active_view) {
                    order.count(active_view);
                    order.notice(diff, Order.EVENT_VIEW_ODDS_CHANGE);
                }
            }

            if (data.hasOwnProperty('disable_odds') && data['disable_odds']) {
                order.disable_odds = data['disable_odds'];
            }

            active_view && active_view.render();
        });

        order.setListener(Order.LISTENER_VIEW_ERROR, function(data)
        {
            order.notice(data, Order.EVENT_VIEW_ERROR);
        });

        return order;
    }

    var _class = Order;
    _class._name = _class.name || _class.toString().match(/^function\s*([^\s(]+)/)[1];
    _class.EVENT_SENDING = 'sending';
    _class.EVENT_SEND_BEFORE = 'send_before';
    _class.EVENT_SEND_COMPLETE = 'send_complete';
    _class.EVENT_SUBMIT_CLICK = 'submit_click';
    _class.EVENT_VIEW_CHANGE = 'view_change';
    _class.EVENT_VIEW_ODDS_CHANGE = 'view_odds_change';
    _class.EVENT_VIEW_INIT = 'view_init';
    _class.EVENT_VIEW_ERROR = 'view_error';

    _class.LISTENER_REFRESH = 'listener_refresh';
    _class.LISTENER_VIEW_ERROR = 'listener_view_error';

    _class.prototype = {
        _format_gold: function(gold)
        {
            gold = (parseFloat(gold) || 0).toFixed(4);
            return gold.toString().replace(/^(\d+(?:\.\d{2}))\d*$/, '$1');
        },

        isOpen: function()
        {
            var order = this;

            return order._is_open;
        },

        getView: function(group)
        {
            var order = this;
            if (typeof group == 'undefined' || ! order.views.hasOwnProperty(group)) {
                return order.active_view || order.default_view;
            }

            return order.views[group];
        },

        fetchView: function(ViewDriver, group_name) {
            var order = this;
            var build_view_callback = function (view) {
                view
                    .register(function(){
                        order.count(this);
                    }, ViewDriver.EVENT_INPUT_CHANGE)
                    .register(function(result){
                        order.setEnable();
                        order.notice(result, _class.EVENT_SEND_COMPLETE);
                    }, ViewDriver.EVENT_SEND_COMPLETE)
                ;

                order.render(group_name);
                order.notice(view, _class.EVENT_VIEW_INIT);
            };

            if ( ! order.views[group_name] || ! order.views[group_name].tmp_loaded) {
                var view = order.views[group_name] || new ViewDriver(order, group_name);
                order.views[group_name] = view;
                order.views[group_name].tmp_loaded = true;
                order.block_orders.append(view.box);
                view.setContent('loading...');

                order.request = $.ajax({
                    cache: false,
//                    url: order.url_tmp + '/' + group_name + '.html',  原来的格式，现在改为PHP
                    url: order.url_tmp + '/' + group_name + '.php',
                    type: 'get',
                    dataType: 'text',
                    success: function(text, msg, xhr){
                        if ( ! order.default_view) {
                            order.default_view = view;
                        }
                        view.setContent(text, build_view_callback, gold_filter);
                    },
                    error: function(xhr, msg){
                        order.views[group_name].tmp_loaded = false;
                        view.setContent('load fail');
                    },
                    complete: function(){
                        order.request = null;
                    }
                });

                view.register(
                    order.getListener(_class.LISTENER_VIEW_ERROR),
                    ViewDriver.EVENT_ERROR
                );

            }

            return order;
        },

        setDisable: function()
        {
            var order = this;
            order._waiting_view = true;
            order.btn_submit.attr('disabled', 'disabled');
            order.btn_reset.attr('disabled', 'disabled');
        },

        setEnable: function()
        {
            var order = this;
            order._waiting_view = false;
            order.btn_submit.removeAttr('disabled');
            order.btn_reset.removeAttr('disabled');
        },

        isEnable: function()
        {
            var order = this;

            return ! order._waiting_view;
        },

        isOddsEnable: function(choose)
        {
            var order = this;
            return ! order.disable_odds.hasOwnProperty(choose);
        },

        isEffectiveOdds: function(odds)
        {
            return 1 <= parseFloat(odds);
        },

        count: function(view){
            var order = this;
            var gold = view.count();

            order.display_total.text(order._format_gold(gold));

            return order;
        },

        send: function(view){
            var order = this;

            if (order.isOpen() && order.isEnable()) {
                var event_data = view.getSendBeforeEventData();
                event_data.gold = view.count();

                event_data.isMin = view.isMin ? view.isMin(): false;
                event_data.isMax = view.isMax ? view.isMax(): false;

                event_data.success = function(query_data)
                {
                    if (order.isOpen() && order.isEnable() && view.count()) {
                        order.setDisable();
                        view.send(order.url_order, query_data);
                    }
                };
                order.notice(event_data, _class.EVENT_SEND_BEFORE);
            }

            return order;
        },

        close: function()
        {
            var order = this;

            order.active_view && order.active_view.clear();

            order._is_open = false;

            order._each(function(){
                var view = this;
                view.close();
            });

            order.btn_submit
                .addClass('disabled')
                .attr('disabled', 'disabled');
            order.btn_reset
                .addClass('disabled')
                .attr('disabled', 'disabled');

            return order;
        },

        open: function()
        {
            var order = this;
            order._is_open = true;

            order._each(function(){
                var view = this;
                view.open();
            });

            order.btn_submit
                .removeClass('disabled')
                .removeAttr('disabled');
            order.btn_reset
                .removeClass('disabled')
                .removeAttr('disabled');

            return order;
        },

        _each: function(callback)
        {
            var order = this;
            if (typeof callback == 'function') {
                for (var view in order.views) {
                    callback.call(order.views[view], view);
                }
            }

            return order;
        },

        render: function(group)
        {
            var order = this;
            var focus_view = order.getView(group);
            var has_change = false;

            order._each(function(){
                var view = this;
                view.hide();
            });

            if (focus_view) {
                has_change = order.active_view !== focus_view;
                order.active_view = focus_view;
                order.active_view.show().clear().render();
                order.isOpen() ? order.active_view.open() : order.active_view.close();
                has_change && order.notice(order.active_view, _class.EVENT_VIEW_CHANGE);
            }

            return order;
        }
    };

    ns[_class._name] = _class;
    if (typeof define == 'function') {
        define(function(){return _class;});
    }

})(self, jQuery, observer, observable, singleton);