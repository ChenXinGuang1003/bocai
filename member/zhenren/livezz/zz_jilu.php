<?php
session_start();
include_once("../include/config.php"); 
include_once("../common/login_check.php");
include_once("../include/config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>额度转换记录</title>
    <link href="../css/tikuan2.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .STYLE1 {color: #000000}
    </style>
</head>
<body>
<div id="top_lishi">
    <div class="waikuang00">
        <table width="100%" border="0" cellspacing="1" cellpadding="0" class="waikuang">
            <tr class="sekuai_01">
                <td colspan="6">额度转换记录&nbsp;&nbsp;<input type="button" name="button" value="  点击刷新  " onClick="window.location.reload();" /></td>
            </tr>
            <tr class="sekuai_01">
                <td width="80">用户名</td>
                <td width="180">转账类型</td>
                <td width="100">转账金额</td>
                <td width="120">转账时间</td>
                <td width="60">状态</td>
                <td>处理结果</td>
            </tr>
            <?php
            include_once("../include/mysqli.php");
            include_once("../include/newpage.php");
            include_once("../common/function.php");

			$uid=$_SESSION['uid'];
            $sql="select id from ag_zhenren_zz where uid='$uid' and live_type='AG' order by id desc";
            $query=$mysqli->query($sql);
            $sum=$mysqli->affected_rows; //总页数
            $thisPage=1;
            if($_GET['page'])
            {
                $thisPage=$_GET['page'];
            }
            $page=new newPage();
            $thisPage=$page->check_Page($thisPage,$sum,10,10);

            $id='';
            $i=1; //记录 uid 数
            $start=($thisPage-1)*10+1;
            $end=$thisPage*10;
            while($row=$query->fetch_array()){
                if($i>=$start && $i<=$end)
                {
                    $id.=$row['id'].',';
                }
                if($i>$end) break;
                $i++;
            }
            if(!$id)
            {
            ?>	
            <tr style="color:black;" align="center">
                <td height="30" colspan="6" valign="middle"><span class="STYLE1">暂无记录</span></td>
            </tr>
            <?php
            }
            else
            {
            $id=rtrim($id,',');
            $sql="select * from ag_zhenren_zz where id in ($id) order by id desc";
            $query=$mysqli->query($sql);
            while($rows=$query->fetch_array())
            {
                if(($i%2)==0) $bgcolor="#FFFFFF";
                else $bgcolor="#F5F5F5";
                if($rows["zz_type"]=='d') $zz_type='主账户->真人(普通厅)';
                else if($rows["zz_type"]=='vd') $zz_type='主账户->真人(VIP厅)';
                else if($rows["zz_type"]=='w') $zz_type='真人(普通厅)->主账户';
                else $zz_type='真人(VIP厅)->主账户';
                if($rows["ok"]==0) $zz_ok='处理中';
                else $zz_ok='已处理';
                $i++;
            ?>
            <tr bgcolor="<?=$bgcolor?>" align="center" onMouseOver="this.style.backgroundColor='#FFFFCC'" onMouseOut="this.style.backgroundColor='<?=$bgcolor?>'" style="height:32px;line-height:180%;">
                <td><?=$rows["username"]?></td>
                <td><?=$zz_type?></td>
                <td><?=double_format($rows["zz_money"])?></td>
                <td><?=date('Y-m-d H:i:s',strtotime($rows["zz_time"])+12*3600)?></td>
                <td><?=$zz_ok?></td>
                <td><?=$rows["result"]?></td>
            </tr>
            <?
            }
            }
            ?>
        </table>
        <div class="sekuai_03"><div class="fanye"><?=$page->get_htmlPage($_SERVER["REQUEST_URI"]);?></div></div>
    </div>
</div>
<br>
<script type="text/javascript" language="javascript" src="/js/left_mouse.js"></script>
</body>
</html>