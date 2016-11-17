<?php
include "../../../../app/member/utils/login_check.php";
include "../../../../app/member/class/lottery_sf.php";
include "../common_index.php";

$page = getCommonIndex("广东十一选五", "GD11", getContentDiv(0), $_SESSION["username"], $_SESSION["user_money"]);

echo $page;
exit;

function getContentDiv($yearNum){
    return '
    <div id="content">
        <div id="content-inner">
            <h2>
                广东十一选五 <a style="display: none;"
                    id="limitShow"
                    title="详细设定"
                    data-callback="self.memberCenter.limit"
                    href="/member/account/limit.php?gtype=GD11">
            </a>
            </h2>

            <div class="GD11"
                 action="action_order"
                 url-tmp="/pt/mem/tmp/order/"
                 url-order="/pt/mem/ajax/order/"
                    >
                <div id="game-info" style="display: none;">
            <span
                    id="game-num"
                    num="'.$yearNum.'"
                    open-format="第 :num 期"
                    close-format="">第 '.$yearNum.' 期</span>
                    <span id="ui-countdown"></span></div>
                <div id="view-groups">
                    <a title="正码特" group="NORMAL_NUMBER" href="#/GD11/NORMAL_NUMBER">正码特</a>
                    <a title="总和 龙虎和" group="ALL_SUM_TIGER" href="#/GXSF/ALL_SUM_TIGER">总和 龙虎和</a>
                    <a title="顺子 杂六" group="STRAIGHT_SIX" href="#/GXSF/STRAIGHT_SIX">顺子 杂六</a>
                    <a title="一中一" group="CHOOSE_1_MATCH_1" href="#/GD11/CHOOSE_1_MATCH_1">一中一</a></div>
                <div id="result-display">
                    <table class="GD11">
                        <thead>
                        <tr>
                            <th>期数</th>
                            <th>正码一</th>
                            <th>正码二</th>
                            <th>正码三</th>
                            <th>正码四</th>
                            <th>正码五</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th class="game-num"><!-- javascript 操作 --></th>
                            <td ball-format="00" class="ball-field ball-num-01">
                                <!-- javascript 操作 -->
                            </td>
                            <td ball-format="00" class="ball-field ball-num-02">
                                <!-- javascript 操作 -->
                            </td>
                            <td ball-format="00" class="ball-field ball-num-03">
                                <!-- javascript 操作 -->
                            </td>
                            <td ball-format="00" class="ball-field ball-num-04">
                                <!-- javascript 操作 -->
                            </td>
                            <td ball-format="00" class="ball-field ball-num-05">
                                <!-- javascript 操作 -->
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div id="orders">
                    <!-- javascript app 使用 -->
                </div>

                <div id="order-info">
                    <div class="inner">
                        <span>下注金额:<span id="order-info-total">0</span></span>
                        <!-- IE 8,9 瀏覽器BUG 在INPUT上按ENTER會被FOCUS到BTN物件觸發CLICK事件 (加上type="reset" 可以避開) -->
                        <button type="reset" id="btn-orders-reset" class="btn-cancel">取消</button>
                        <button id="btn-orders-submit" class="btn-submit">确认</button>
                    </div>
                </div>


                <div id="nogame" style="display: none;">

                </div>
            </div>
        </div>
    </div>
    ';
}

$mysqli->close();