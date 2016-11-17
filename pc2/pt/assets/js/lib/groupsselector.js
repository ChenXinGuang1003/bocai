"use strict";

(function(ns, $){
    function GroupsSelector($collection)
    {
        var group_selector = this;
        group_selector._default = null;
        group_selector._links = {};
        $collection.each(function(){
            var $node = $(this);
            var group = $node.attr('group');
            if ( ! group_selector._default) {
                group_selector._default = group;
            }
            group_selector._links[group] = $node;
        });
        group_selector.active = group_selector._default;
    }

    var _class = GroupsSelector;
    _class._name = _class.name || _class.toString().match(/^function\s*([^\s(]+)/)[1];

    _class.prototype = {
        render: function(group)
        {
            var group_selector = this;
            if ( ! group || ! group_selector._links[group]) {
                group = group_selector._default;
            }

            group_selector.each(function(_group){
                var $group = this;
                if (_group == group) {
                    $group.addClass('active');
                } else {
                    $group.removeClass('active');
                }
            });

            group_selector.active = group;

            return group_selector;
        },

        getActive: function()
        {
            return this.active;
        },

        each: function(callback)
        {
            var group_selector = this;
            if (typeof callback == 'function') {
                for (var _group in group_selector._links) {
                    callback.call(group_selector._links[_group], _group);
                }
            }
        }
    };

    ns[_class._name] = _class;
    if (typeof define == 'function') {
        define(function(){return _class;});
    }

})(self, jQuery);