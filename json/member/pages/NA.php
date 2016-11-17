<?php

echo '
<form name="newForm" id="newForm" action="/member/Grp/grpOrder.php" method="post">
    <!--正码1-6选择-->
    <div id="tab" style="display:none;">
      <ul>
        <li data-rtypeN="N1" class="onTagClick"><span><b>正码特 1</b></span></li>
        <li data-rtypeN="N2" class="unTagClick"><span><b>正码特 2</b></span></li>
        <li data-rtypeN="N3" class="unTagClick"><span><b>正码特 3</b></span></li>
        <li data-rtypeN="N4" class="unTagClick"><span><b>正码特 4</b></span></li>
        <li data-rtypeN="N5" class="unTagClick"><span><b>正码特 5</b></span></li>
        <li data-rtypeN="N6" class="unTagClick"><span><b>正码特 6</b></span></li>
        <li id="space" style="width:15px;"></li>
      </ul>
    </div>
    <div class="round-table"><table id="table1"></table></div>
    <div class="round-table"><table id="table2"></table></div>
    <div class="round-table"><table id="table3"></table></div>
    <div class="round-table"><table id="table4"></table></div>
    <div class="SendLT Send">
      <span class="credit">下注金额:<b id="total_bet">0.00</b></span>
      <input class="no" type="reset" value="取消"/>
      <input class="yes" type="button" name="btnBet" value="确定"/>
    </div>
    <input type="hidden" name="gid" id="gid" />
    <input type="hidden" name="Line" id="Line" value="" />
</form>
';