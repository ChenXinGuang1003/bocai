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
        var timeParam = $("#s_time").val();
        if(!timeParam){
            alert("请选择日期。");
            return false;
        }
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
                    &nbsp;&nbsp;日期：
                    <select name="s_time" id="s_time">
                        <option value="<?=date("Y-m-d")?>"    <?=$_GET['s_time']==date("Y-m-d") ? 'selected' : ''?>><?=date('Y-m-d')?></option>
                        <option value="<?=date('Y-m-d',strtotime('-1 day'))?>"    <?=$_GET['s_time']==date('Y-m-d',strtotime('-1 day')) ? 'selected' : ''?>><?=date('Y-m-d',strtotime('-1 day'))?></option>
                        <option value="<?=date('Y-m-d',strtotime('-2 day'))?>"    <?=$_GET['s_time']==date('Y-m-d',strtotime('-2 day')) ? 'selected' : ''?>><?=date('Y-m-d',strtotime('-2 day'))?></option>
                        <option value="<?=date('Y-m-d',strtotime('-3 day'))?>"    <?=$_GET['s_time']==date('Y-m-d',strtotime('-3 day')) ? 'selected' : ''?>><?=date('Y-m-d',strtotime('-3 day'))?></option>
                        <option value="<?=date('Y-m-d',strtotime('-4 day'))?>"    <?=$_GET['s_time']==date('Y-m-d',strtotime('-4 day')) ? 'selected' : ''?>><?=date('Y-m-d',strtotime('-4 day'))?></option>
                        <option value="<?=date('Y-m-d',strtotime('-5 day'))?>"    <?=$_GET['s_time']==date('Y-m-d',strtotime('-5 day')) ? 'selected' : ''?>><?=date('Y-m-d',strtotime('-5 day'))?></option>
                        <option value="<?=date('Y-m-d',strtotime('-6 day'))?>"    <?=$_GET['s_time']==date('Y-m-d',strtotime('-6 day')) ? 'selected' : ''?>><?=date('Y-m-d',strtotime('-6 day'))?></option>
                    </select>
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
            <td align="center"><strong>冠军</strong></td>
            <td align="center"><strong>亚军</strong></td>
            <td align="center"><strong>第三名</strong></td>
            <td align="center"><strong>第四名</strong></td>
            <td height="25" align="center"><strong>第五名</strong></td>
            <td align="center"><strong>第六名</strong></td>
            <td align="center"><strong>第七名</strong></td>
            <td align="center"><strong>第八名</strong></td>
            <td align="center"><strong>第九名</strong></td>
            <td align="center"><strong>第十名</strong></td>
            <td align="center"><strong>冠亚军和</strong></td>
            <td align="center"><strong>1V10/2V9/3V8/4V7/5V6</strong></td>
        </tr>
        <?php

        $sql = "SELECT id,qishu,create_time,datetime,state,prev_text,
    ball_1,ball_2,ball_3,ball_4,ball_5,ball_6,ball_7,ball_8,ball_9,ball_10
    FROM lottery_result_bjpk WHERE DATE_FORMAT(datetime,'%Y-%m-%d') = '$query_time'";
        if($qishu_query){
            $sql .= " AND qishu = '$qishu_query'";
        }
        $sql .= "ORDER BY qishu DESC";
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
            $hm[]		= BuLing($rows['ball_8']);
            $hm[]		= BuLing($rows['ball_9']);
            $hm[]		= BuLing($rows['ball_10']);
            ?>
            <tr   class="R_tr" align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>; line-height:20px;">
                <td height="25" align="center" valign="middle">北京PK拾</td>
                <td align="center" valign="middle"><?=$rows['qishu']?></td>
                <td align="center" valign="middle"><?=$rows['datetime']?></td>
                <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_3/<?=$rows['ball_1']?>.png"></td>
                <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_3/<?=$rows['ball_2']?>.png"></td>
                <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_3/<?=$rows['ball_3']?>.png"></td>
                <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_3/<?=$rows['ball_4']?>.png"></td>
                <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_3/<?=$rows['ball_5']?>.png"></td>
                <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_3/<?=$rows['ball_6']?>.png"></td>
                <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_3/<?=$rows['ball_7']?>.png"></td>
                <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_3/<?=$rows['ball_8']?>.png"></td>
                <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_3/<?=$rows['ball_9']?>.png"></td>
                <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_3/<?=$rows['ball_10']?>.png"></td>
                <?if(Pk10_Auto_quick($hm,1)==11){
                ?>
                    <td><?=Pk10_Auto_quick($hm,1)?> / <span>和</span> / <span>和</span> </td>
                <?
                }else{
                ?>
                    <td><?=Pk10_Auto_quick($hm,1)?> / <?=(Pk10_Auto_quick($hm,2)=="大"?"<span style=\"color: red;\">".Pk10_Auto_quick($hm,2)."</span>":Pk10_Auto_quick($hm,2))?> / <?=(Pk10_Auto_quick($hm,3)=="双"?"<span style=\"color: red;\">".Pk10_Auto_quick($hm,3)."</span>":Pk10_Auto_quick($hm,3))?></td>
                <?
                }?>
                    <td><?=(Pk10_Auto_quick($hm,4)=="龙"?"<span style=\"color: red;\">".Pk10_Auto_quick($hm,4)."</span>":Pk10_Auto_quick($hm,4))?> / <?=(Pk10_Auto_quick($hm,5)=="龙"?"<span style=\"color: red;\">".Pk10_Auto_quick($hm,5)."</span>":Pk10_Auto_quick($hm,5))?> / <?=(Pk10_Auto_quick($hm,6)=="龙"?"<span style=\"color: red;\">".Pk10_Auto_quick($hm,6)."</span>":Pk10_Auto_quick($hm,6))?> / <?=(Pk10_Auto_quick($hm,7)=="龙"?"<span style=\"color: red;\">".Pk10_Auto_quick($hm,7)."</span>":Pk10_Auto_quick($hm,7))?> / <?=(Pk10_Auto_quick($hm,8)=="龙"?"<span style=\"color: red;\">".Pk10_Auto_quick($hm,8)."</span>":Pk10_Auto_quick($hm,8))?></td>
                </tr>
        <?php
        }
        if($hasRow=="false"){
            ?>
            <tr   class="R_tr" align="center" >
                <td height="25" colspan="13" align="center" valign="middle">暂时没有开奖结果</td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>