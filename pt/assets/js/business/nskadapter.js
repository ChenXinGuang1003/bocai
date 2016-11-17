"use strict";

//轉接 nsk 程序
define(['jquery', '/js/View.js', '/inte/js/memberCenter.js'], function(){

    var map_callback = {
        'today-wagers': 'self.memberCenter.history',
        'history': 'self.memberCenter.historyCount',
        'mem-date': 'self.memberCenter.memberData',
        'rule': 'self.memberCenter.rule',
        'game-result': 'self.memberCenter.gameResult',
        'quick-gold': 'self.memberCenter.quickGold'
    };

    var $feature = $('#ui-btn-features');
    var collection = [];

    for (var _classname in map_callback) {
        var _nodes = $feature
            .find('.'+_classname+' > a')
            .attr('data-callback', map_callback[_classname]);

        //替一般下注頁面加上gtype=XXXX
        if (typeof Pitaya.prop('game') == 'string') {
            _nodes.attr('href', _nodes.attr('href') + '?gtype='+Pitaya.prop('game'));
        }

        collection = collection.concat(_nodes.get());
    }

    collection = collection.concat($feature.find('.msg-log > a').get());

    self.ViewBox.install($(collection));
});