<?php
include "../../../../app/member/utils/login_check.php";
include "../../../../app/member/class/lottery_sf.php";
include "../common_index.php";

$page = getCommonIndex("北京快乐8", "BJKN", getContentDiv(0), $_SESSION["username"], $_SESSION["user_money"]);

echo $page;
exit;

function getContentDiv($yearNum){
    return '
        <div id="content">
            <div id="content-inner">
                <h2>
                北京快乐8
                <a    style="display:none"
                        id="limitShow"
                        title="详细设定"
                        data-callback="self.memberCenter.limit"
                        href="/member/account/limit.php?gtype=BJKN">
                </a>
                </h2>

                <div class="BJKN"
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
                        <span id="ui-countdown"></span>
                    </div>
                    <div id="view-groups">
                        <a title="选号" group="MULTI_CHOOSE" href="#/BJKN/MULTI_CHOOSE">选号</a>
                        <a title="其他" group="OTHER" href="#/BJKN/OTHER">其他</a>
                    </div>
                    <div id="result-display">

                        <table class="BJKN">
                            <caption>期数 <span class="game-num"><!-- javascript 操作 --></span></caption>
                            <tbody>
                            <tr>
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
                                <td ball-format="00" class="ball-field ball-num-06">
                                    <!-- javascript 操作 -->
                                </td>
                                <td ball-format="00" class="ball-field ball-num-07">
                                    <!-- javascript 操作 -->
                                </td>
                                <td ball-format="00" class="ball-field ball-num-08">
                                    <!-- javascript 操作 -->
                                </td>
                                <td ball-format="00" class="ball-field ball-num-09">
                                    <!-- javascript 操作 -->
                                </td>
                                <td ball-format="00" class="ball-field ball-num-10">
                                    <!-- javascript 操作 -->
                                </td>
                            </tr>
                            <tr>
                                <td ball-format="00" class="ball-field ball-num-02">
                                    <!-- javascript 操作 -->
                                </td>
                                <td ball-format="00" class="ball-field ball-num-04">
                                    <!-- javascript 操作 -->
                                </td>
                                <td ball-format="00" class="ball-field ball-num-06">
                                    <!-- javascript 操作 -->
                                </td>
                                <td ball-format="00" class="ball-field ball-num-08">
                                    <!-- javascript 操作 -->
                                </td>
                                <td ball-format="00" class="ball-field ball-num-10">
                                    <!-- javascript 操作 -->
                                </td>
                                <td ball-format="00" class="ball-field ball-num-12">
                                    <!-- javascript 操作 -->
                                </td>
                                <td ball-format="00" class="ball-field ball-num-14">
                                    <!-- javascript 操作 -->
                                </td>
                                <td ball-format="00" class="ball-field ball-num-16">
                                    <!-- javascript 操作 -->
                                </td>
                                <td ball-format="00" class="ball-field ball-num-18">
                                    <!-- javascript 操作 -->
                                </td>
                                <td ball-format="00" class="ball-field ball-num-20">
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