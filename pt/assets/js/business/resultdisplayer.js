"use strict";

if ( ! self.Pitaya) {
    throw new Error('no Pitaya');
}

(function(ns, $){
    //關盤顯示上一期
    var ball_color = {
        LT: {
            1: 'red', 2: 'red', 3: 'blue', 4: 'blue', 5: 'green', 6: 'green',
            7: 'red', 8: 'red', 9: 'blue', 10: 'blue', 11: 'green', 12: 'red',
            13: 'red', 14: 'blue', 15: 'blue', 16: 'green', 17: 'green', 18: 'red',
            19: 'red', 20: 'blue', 21: 'green', 22: 'green', 23: 'red', 24: 'red',
            25: 'blue', 26: 'blue', 27: 'green', 28: 'green', 29: 'red', 30: 'red',
            31: 'blue', 32: 'green', 33: 'green', 34: 'red', 35: 'red', 36: 'blue',
            37: 'blue', 38: 'green', 39: 'green', 40: 'red', 41: 'blue', 42: 'blue',
            43: 'green', 44: 'green', 45: 'red', 46: 'red', 47: 'blue', 48: 'blue',
            49: 'green'
        },
        GXSF: {
            1: 'red', 2: 'blue', 3: 'green', 4: 'red', 5: 'blue',
            6: 'green', 7: 'red', 8: 'blue', 9: 'green', 10: 'red',
            11: 'blue', 12: 'green', 13: 'red', 14: 'blue', 15: 'green',
            16: 'red', 17: 'blue', 18: 'green', 19: 'red', 20: 'blue',
            21: 'green'
        },
        GD11: {
            1: 'red', 2: 'blue', 3: 'green', 4: 'red', 5: 'blue',
            6: 'green', 7: 'red', 8: 'blue', 9: 'green', 10: 'red',
            11: 'blue'
        },
        GDSF: {
            1: 'blue', 2: 'blue', 3: 'blue', 4: 'blue', 5: 'blue',
            6: 'blue', 7: 'blue', 8: 'blue', 9: 'blue', 10: 'blue',
            11: 'blue', 12: 'blue', 13: 'blue', 14: 'blue', 15: 'blue',
            16: 'blue', 17: 'blue', 18: 'blue', 19: 'red', 20: 'red'
        },
        TJSF: {
            1: 'blue', 2: 'blue', 3: 'blue', 4: 'blue', 5: 'blue',
            6: 'blue', 7: 'blue', 8: 'blue', 9: 'blue', 10: 'blue',
            11: 'blue', 12: 'blue', 13: 'blue', 14: 'blue', 15: 'blue',
            16: 'blue', 17: 'blue', 18: 'blue', 19: 'red', 20: 'red'
        },
        BJKN: {
            1: 'gray', 2: 'gray', 3: 'gray', 4: 'gray', 5: 'gray',
            6: 'gray', 7: 'gray', 8: 'gray', 9: 'gray', 10: 'gray',
            11: 'gray', 12: 'gray', 13: 'gray', 14: 'gray', 15: 'gray',
            16: 'gray', 17: 'gray', 18: 'gray', 19: 'gray', 20: 'gray',
            21: 'gray', 22: 'gray', 23: 'gray', 24: 'gray', 25: 'gray',
            26: 'gray', 27: 'gray', 28: 'gray', 29: 'gray', 30: 'gray',
            31: 'gray', 32: 'gray', 33: 'gray', 34: 'gray', 35: 'gray',
            36: 'gray', 37: 'gray', 38: 'gray', 39: 'gray', 40: 'gray',
            41: 'gray', 42: 'gray', 43: 'gray', 44: 'gray', 45: 'gray',
            46: 'gray', 47: 'gray', 48: 'gray', 49: 'gray', 50: 'gray',
            51: 'gray', 52: 'gray', 53: 'gray', 54: 'gray', 55: 'gray',
            56: 'gray', 57: 'gray', 58: 'gray', 59: 'gray', 60: 'gray',
            61: 'gray', 62: 'gray', 63: 'gray', 64: 'gray', 65: 'gray',
            66: 'gray', 67: 'gray', 68: 'gray', 69: 'gray', 70: 'gray',
            71: 'gray', 72: 'gray', 73: 'gray', 74: 'gray', 75: 'gray',
            76: 'gray', 77: 'gray', 78: 'gray', 79: 'gray', 80: 'gray'
        }
    };
    ball_color.AUKN = ball_color.BBKN = ball_color.CAKN = ball_color.BJKN;

    function BallCol(game, $parent_node)
    {
        var ball_col = this;
        ball_col.game = game;
        ball_col.$parent_node = $parent_node;
        ball_col.ball_format = $parent_node.attr('ball-format');
        ball_col.$num = $('<span></span>');
        ball_col.$rand = ball_col.$num.clone().text('-');
        ball_col.render();
        ball_col.$parent_node
            .append(ball_col.$num)
            .append(ball_col.$rand);
    }
    BallCol.prototype = {
        render: function(num)
        {
            var ball_col = this;
            if (num) {
                var game = ball_col.game;
                var color = ball_color[game] && ball_color[game][num] || '';
                if (ball_col.ball_format) {
                    var re = new RegExp('0{'+num.toString().length+'}$');
                    num = ball_col.ball_format.replace(re, num);
                }
                ball_col.$num.text(num)
                    .removeAttr('class')
                    .addClass(color).show();
                ball_col.$rand.hide();
                ball_col.$num.parent().addClass('has-num');
            } else {
                ball_col.$num.text('').hide();
                ball_col.$rand.show();
                ball_col.$num.parent().removeClass('has-num');
            }

            return ball_col;
        }
    };

    function ResultDisplayer(game, $num, $ball_fields)
    {
        var result_displayer = this;
        result_displayer.game = game;
        result_displayer.$num = $num;
        result_displayer.num_format = $num.attr('num-format') || ':num';
        result_displayer.$num_parent = $num.parent();
        result_displayer.$ball_fields = $ball_fields;
        result_displayer.balls = {};
        result_displayer.$ball_fields.each(function(i){
            var field = this;
            var k = (i+1).toString().replace(/^(\d)$/, '0$1');
            result_displayer.balls[k] = new BallCol(game, $(field));
        });
    }

    var _class = ResultDisplayer;
    _class._name = _class.name || _class.toString().match(/^function\s*([^\s(]+)/)[1];

    _class.prototype = {
        render: function(json_prev_game)
        {
            var result_displayer = this;
            var num = json_prev_game && json_prev_game['num'] || '';
            var result = json_prev_game && json_prev_game['result'] || {};
            result_displayer.$num.text(
                num
                ? result_displayer.num_format.replace(/:num/, num)
                : ''
            );

            result_displayer.each(function(locate){
                var ball = this;
                var num = result.hasOwnProperty(locate) ? result[locate] : null;
                ball.render(num);
            });

            return result_displayer;
        },

        closeNum: function()
        {
            var result_displayer = this;
            result_displayer.$num_parent.hide();

            return result_displayer;
        },

        openNum: function()
        {
            var result_displayer = this;
            result_displayer.$num_parent.show();

            return result_displayer;
        },

        each: function(callback)
        {
            var result_displayer = this;
            if (typeof callback == 'function') {
                for (var locate in result_displayer.balls) {
                    callback.call(result_displayer.balls[locate], locate);
                }
            }
        }
    };
    ns[_class._name] = _class;
    if ( typeof define === "function") {
        define(function(){return _class;});
    }
})(self, jQuery);