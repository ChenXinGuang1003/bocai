<?php

$query_time = date("Y-m-d",time());
$qishu_query = "";
if($_GET['s_time']){
    $query_time = $_GET['s_time'];
}
if($_GET['qishu_query']){
    $qishu_query = $_GET['qishu_query'];
}

?>
<link rel="stylesheet" href="/resource/images/css/admin_style_1.css" type="text/css" media="all" />
<script language="javascript" src="/resource/js/jquery-1.7.2.min.js"></script>
<script language="javascript">
    function queryLottery(){
//        var timeParam = $("#s_time").val();
//        if(!timeParam){
//            alert("请选择日期。");
//            return false;
//        }
        return true;
    }
</script>
<div id="search_content">
<div class="round-table">
    <form name="Frm_search_drawno"  id="Frm_search_drawno" method="get" onSubmit="return queryLottery();" method="get" action="/member/final/LT_result.php">
        <input name="qishu_query" type="hidden" value="<?=$qishu_query?>"/>
        <input name="s_time" type="hidden" value="<?=$query_time?>"/>
        <table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12" style="margin-top:5px;" >
            <tr style="background-color:#FFFFFF;">
                <td align="left">
                     <select name="gtype" id="gtype">
                       <!--  <option value="LT"    <?=$_GET['gtype']=='LT' ? 'selected' : ''?>>六合彩</option> -->
                        <option value="D3"    <?=$_GET['gtype']=='D3' ? 'selected' : ''?>>3D彩</option>
                        <option value="P3"    <?=$_GET['gtype']=='P3' ? 'selected' : ''?>>排列三</option>
                        <!-- <option value="T3"    <?=$_GET['gtype']=='T3' ? 'selected' : ''?>>上海时时乐</option> -->
                        <option value="CQ"    <?=$_GET['gtype']=='CQ' ? 'selected' : ''?>>重庆时时彩</option>
                        <!-- <option value="JX"    <?=$_GET['gtype']=='JX' ? 'selected' : ''?>>江西时时彩</option>
                        <option value="TJ"    <?=$_GET['gtype']=='TJ' ? 'selected' : ''?>>天津时时彩</option>
                        <option value="GDSF"  <?=$_GET['gtype']=='GDSF' ? 'selected' : ''?>>广东十分彩</option>
                        <option value="GXSF"  <?=$_GET['gtype']=='GXSF' ? 'selected' : ''?>>广西十分彩</option>
                        <option value="TJSF"  <?=$_GET['gtype']=='TJSF' ? 'selected' : ''?>>天津十分彩</option>
                        <option value="CQSF"  <?=$_GET['gtype']=='CQSF' ? 'selected' : ''?>>重庆十分彩</option> -->
                        <option value="BJKN"  <?=$_GET['gtype']=='BJKN' ? 'selected' : ''?>>北京快乐8</option>
                        <option value="BJPK"  <?=$_GET['gtype']=='BJPK' ? 'selected' : ''?>>北京PK拾</option>
                        <option value="GD11"  <?=$_GET['gtype']=='GD11' ? 'selected' : ''?>>广东11选5</option>
                    </select>
                    &nbsp;&nbsp;开奖期号：
                    <input name="qishu_query" type="text" id="qishu_query" value="<?=$qishu_query?>" size="20" maxlength="11"/>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="submit" type="submit" class="submit80" value="搜索"/>
                </td>
            </tr>
        </table>
    </form>
</div>
</div>
<div class="round-table">
    <table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12" style="margin-top:2px;" bgcolor="#798EB9">
        <tr  class="title_tr" style="background-color:#3C4D82; color:#FFF">
            <td align="center"><strong>彩票类别</strong></td>
            <td align="center"><strong>彩票期号</strong></td>
            <td align="center"><strong>开奖时间</strong></td>
            <td align="center"><strong>正码一</strong></td>
            <td align="center"><strong>正码二</strong></td>
            <td align="center"><strong>正码三</strong></td>
            <td align="center"><strong>正码四</strong></td>
            <td height="25" align="center"><strong>正码五</strong></td>
            <td align="center"><strong>正码六</strong></td>
            <td align="center"><strong>特别号</strong></td>
            <td align="center"><strong>生肖</strong></td>
        </tr>
        <?php

        $sql = "SELECT id,qishu,create_time,datetime,state,prev_text,
    ball_1,ball_2,ball_3,ball_4,ball_5,ball_6,ball_7
    FROM lottery_result_lhc WHERE 1=1";
        if($qishu_query){
            $sql .= " AND qishu = '$qishu_query'";
        }
        $sql .= " ORDER BY qishu DESC limit 0,10";
        $query	=	$mysqli->query($sql);
        $hasRow = "false";
        while($rows = $query->fetch_array()){
            $hasRow = "true";
            $color = "#FFFFFF";
            $over	 = "#EBEBEB";
            $out	 = "#ffffff";
            $hm 		= array();
            $hm[]		= BuLing($rows['ball_1']);
            $hm[]		= BuLing($rows['ball_2']);
            $hm[]		= BuLing($rows['ball_3']);
            $hm[]		= BuLing($rows['ball_4']);
            $hm[]		= BuLing($rows['ball_5']);
            $hm[]		= BuLing($rows['ball_6']);
            $hm[]		= BuLing($rows['ball_7']);
            ?>
            <tr   class="R_tr" align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>; line-height:20px;">
                <td height="25" align="center" valign="middle">六合彩</td>
                <td align="center" valign="middle"><?=$rows['qishu']?></td>
                <td align="center" valign="middle"><?=$rows['datetime']?></td>
                <td align="center" valign="middle"><img src="/images/Lottery/Images/lhc/<?=$rows['ball_1']?>.png"></td>
                <td align="center" valign="middle"><img src="/images/Lottery/Images/lhc/<?=$rows['ball_2']?>.png"></td>
                <td align="center" valign="middle"><img src="/images/Lottery/Images/lhc/<?=$rows['ball_3']?>.png"></td>
                <td align="center" valign="middle"><img src="/images/Lottery/Images/lhc/<?=$rows['ball_4']?>.png"></td>
                <td align="center" valign="middle"><img src="/images/Lottery/Images/lhc/<?=$rows['ball_5']?>.png"></td>
                <td align="center" valign="middle"><img src="/images/Lottery/Images/lhc/<?=$rows['ball_6']?>.png"></td>
                <td align="center" valign="middle"><img src="/images/Lottery/Images/lhc/<?=$rows['ball_7']?>.png"></td>
                <td align="center" valign="middle" style="font-size: 14px;"><? echo lhc_sum_sx($rows['ball_1'],$rows['datetime']).lhc_sum_sx($rows['ball_2'],$rows['datetime']).lhc_sum_sx($rows['ball_3'],$rows['datetime']).lhc_sum_sx($rows['ball_4'],$rows['datetime']).lhc_sum_sx($rows['ball_5'],$rows['datetime']).lhc_sum_sx($rows['ball_6'],$rows['datetime'])."+".lhc_sum_sx($rows['ball_7'],$rows['datetime'])?></td>
            </tr>
        <?php
        }
        if($hasRow=="false"){
            ?>
            <tr   class="R_tr" align="center" >
                <td height="25" colspan="10" align="center" valign="middle">暂时没有开奖结果</td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>