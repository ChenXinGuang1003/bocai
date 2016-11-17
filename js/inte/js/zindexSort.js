(function (namespace) {
    /**
     * 取得html節點的css style
     * @param _node html節點
     * @param _css css名稱
     * @return string
     */
    function _getCurrentStyle ( _node, _css) {
        if (_node.currentStyle) {
            return _node.currentStyle[_css];   
        } else if (window.getComputedStyle) {
            _css = _css.replace(/([A-Z])/g, "-$1");
            _css = _css.toLowerCase();
            return window.getComputedStyle(_node, '').getPropertyValue(_css);
        }
    }
    /**
     * 取得html節點的offset位置
     * @param _node html節點
     * @return json
     */
    function _getOffsetPos (_node) {
        var _x = 0, _y = 0;
        while (_node.offsetParent) {
            _x += _node.offsetLeft;
            _y += _node.offsetTop;
            if (_getCurrentStyle(_node, 'overflowY') == 'auto') {
                _y -= _node.scrollTop;
            }
            _node = _node.offsetParent;
        }
        _x += _node.offsetLeft;
        _y += _node.offsetTop;
        return { x : _x, y : _y};
    }
    namespace.zindexSort = function () {
    }
    namespace.zindexSort.sortArray = function (_arr) {
        _arr.sort(function (a, b) {
            return parseInt(_getCurrentStyle(a, 'zIndex'), 10) - parseInt(_getCurrentStyle(b, 'zIndex'), 10);
        });
        return _arr;
    };
    namespace.zindexSort.show = function (_arr) {
            var _str = '';
            for (var i = 0, _total = _arr.length; i < _total; i++) {
                _str += _arr[i].getAttribute('id') + ':' + _getCurrentStyle(_arr[i], 'zIndex') + '\n';
            } 
            alert(_str);
    };
    namespace.zindexSort.run = function () {
        //var _pos;
        for (var i = 0, _total = this.arr.length; i < _total; i++) {
             //_pos = _getOffsetPos(this.arr[i]);
             //this.arr[i].style.left = _pos.x + 'px';
             //this.arr[i].style.top = _pos.y + 'px';
             document.body.appendChild(this.arr[i]);
        }
    };
    namespace.zindexSort.start = function () {
        var _nodes = document.getElementsByTagName('*'), _len = _nodes.length, _sort = [], _zindex, _position;
        for (var i = 0; i < _len; i++) {
            _zindex = _getCurrentStyle(_nodes[i], 'zIndex');
            _position = _getCurrentStyle(_nodes[i], 'position');
            if (_zindex > 0 && _position ==  'absolute') {
                _sort.push(_nodes[i]);     
            }
        }
        this.arr = this.sortArray(_sort);
    }
    namespace.zindexSort.test = function () {
        namespace.zindexSort.start();
        namespace.zindexSort.show(namespace.zindexSort.arr);
    }
    namespace.zindexSort.setup = function () {
        namespace.zindexSort.start();
        namespace.zindexSort.run();
    }
})(self);
