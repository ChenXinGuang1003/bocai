<?php
include "../../../../app/member/utils/login_check.php";
include "../../../../app/member/class/lottery_sf.php";
include "../common_index.php";

$page = getCommonIndex("天津十分彩", "TJSF", getContentDiv(0), $_SESSION["username"], $_SESSION["user_money"]);

echo $page;
exit;

function getContentDiv($yearNum){
    return '
    <div id="content">
        <div id="content-inner">
            <h2>
                天津十分彩 <a style="display: none;"
                    id="limitShow"
                    title="详细设定"
                    data-callback="self.memberCenter.limit"
                    href="/member/account/limit.php?gtype=TJSF">
            </a>
            </h2>

            <div class="TJSF"
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
                    <a title="主盘势" group="GENERAL" href="#/TJSF/GENERAL">主盘势</a> <a title="特别号" group="SP" href="#/TJSF/SP">特别号</a>
                    <a title="正码特" group="NORMAL_NUMBER" href="#/TJSF/NORMAL_NUMBER">正码特</a> <a title="四季五行"
                                                                                                group="SEASONS_ELEMENTS"
                                                                                                href="#/TJSF/SEASONS_ELEMENTS">四季五行</a>
                    <a title="方位/中发白" group="DIRECTION_ZFB" href="#/TJSF/DIRECTION_ZFB">方位/中发白</a> <a title="总和/龙虎"
                                                                                                      group="ALLSUM_DRAGON_TIGER"
                                                                                                      href="#/TJSF/ALLSUM_DRAGON_TIGER">总和/龙虎</a>
                    <a title="一中一" group="CHOOSE_1_MATCH_1" href="#/TJSF/CHOOSE_1_MATCH_1">一中一</a></div>
                <div id="result-display">
                    <table class="TJSF">
                        <thead>
                        <tr>
                            <th>期数</th>
                            <th>第一球</th>
                            <th>第二球</th>
                            <th>第三球</th>
                            <th>第四球</th>
                            <th>第五球</th>
                            <th>第六球</th>
                            <th>第七球</th>
                            <th>特别号</th>
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
                            <td ball-format="00" class="ball-field ball-num-06">
                                <!-- javascript 操作 -->
                            </td>
                            <td ball-format="00" class="ball-field ball-num-07">
                                <!-- javascript 操作 -->
                            </td>
                            <td ball-format="00" class="ball-field ball-num-08">
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