<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");

include_once("../../../class/admin.php");
include_once("../../../common/login_check.php");
include_once("../Js_Class.php");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

check_quanxian("手工录入彩票结果");

$id	=	0;
$query_time = date("Y-m-d",time());
$qishu_query = "";
if($_GET['id'] > 0){
    $id	=	$_GET['id'];
}
if($_GET['s_time']){
    $query_time = $_GET['s_time'];
}
if($_GET['qishu_query']){
    $qishu_query = $_GET['qishu_query'];
}
$lottery_type = "北京快乐8";
if($_GET["action"]=="add" && $id==0){
    $create_time = date("Y-m-d H:i:s",time());
    $qishu		=	$_POST["qishu"];
    $datetime	=	$_POST["datetime"];
    $ball_1		=	$_POST["ball_1"];
    $ball_2		=	$_POST["ball_2"];
    $ball_3		=	$_POST["ball_3"];
    $ball_4		=	$_POST["ball_4"];
    $ball_5		=	$_POST["ball_5"];
    $ball_6		=	$_POST["ball_6"];
    $ball_7		=	$_POST["ball_7"];
    $ball_8		=	$_POST["ball_8"];
    $ball_9		=	$_POST["ball_9"];
    $ball_10		=	$_POST["ball_10"];
    $ball_11		=	$_POST["ball_11"];
    $ball_12		=	$_POST["ball_12"];
    $ball_13		=	$_POST["ball_13"];
    $ball_14		=	$_POST["ball_14"];
    $ball_15		=	$_POST["ball_15"];
    $ball_16		=	$_POST["ball_16"];
    $ball_17		=	$_POST["ball_17"];
    $ball_18		=	$_POST["ball_18"];
    $ball_19		=	$_POST["ball_19"];
    $ball_20		=	$_POST["ball_20"];
    $sql = "select id from lottery_result_bjkn where qishu='$qishu'";
    $query = $mysqli->query($sql);
    $row    =	$query->fetch_array();
    if($row && $row["id"]){
        message("该期彩票结果已存在，请查询后编辑。","result_bjkn.php?s_time=$query_time");
    }else{
        $sql		=	"insert into lottery_result_bjkn(qishu,create_time,datetime,ball_1,ball_2,ball_3,ball_4,ball_5,ball_6,ball_7,ball_8,ball_9,ball_10,ball_11,ball_12,ball_13,ball_14,ball_15,ball_16,ball_17,ball_18,ball_19,ball_20) values (".$qishu.",'".$create_time."','".$datetime."',".$ball_1.",".$ball_2.",".$ball_3.",".$ball_4.",".$ball_5.",".$ball_6.",".$ball_7.",".$ball_8.",".$ball_9.",".$ball_10.",".$ball_11.",".$ball_12.",".$ball_13.",".$ball_14.",".$ball_15.",".$ball_16.",".$ball_17.",".$ball_18.",".$ball_19.",".$ball_20.")";
        $mysqli->query($sql);
    }
}elseif($_GET["action"]=="edit" && $id>0){
    $sql		=	"select * from lottery_result_bjkn WHERE id='$id'";
    $query	=	$mysqli->query($sql);
    $row    =	$query->fetch_array();
    $prev_text = "修改时间：".(date("Y-m-d H:i:s",time()))."。\n修改前内容：".$row["ball_1"].",".$row["ball_2"].",".$row["ball_3"].",".$row["ball_4"].",".$row["ball_5"].",".$row["ball_6"].",".$row["ball_7"].",".$row["ball_8"].",".$row["ball_9"].",".$row["ball_10"].",".$row["ball_11"].",".$row["ball_12"].",".$row["ball_13"].",".$row["ball_14"].",".$row["ball_15"].",".$row["ball_16"].",".$row["ball_17"].",".$row["ball_18"].",".$row["ball_19"].",".$row["ball_20"]."。\n修改后内容：".$_POST["ball_1"].",".$_POST["ball_2"].",".$_POST["ball_3"].",".$_POST["ball_4"].",".$_POST["ball_5"].",".$_POST["ball_6"].",".$_POST["ball_7"].",".$_POST["ball_8"].",".$_POST["ball_9"].",".$_POST["ball_10"].",".$_POST["ball_11"].",".$_POST["ball_12"].",".$_POST["ball_13"].",".$_POST["ball_14"].",".$_POST["ball_15"].",".$_POST["ball_16"].",".$_POST["ball_17"].",".$_POST["ball_18"].",".$_POST["ball_19"].",".$_POST["ball_20"]."。".'\n\n'.$row["prev_text"];

    $qishu		=	$_POST["qishu"];
    $datetime	=	$_POST["datetime"];
    $ball_1		=	$_POST["ball_1"];
    $ball_2		=	$_POST["ball_2"];
    $ball_3		=	$_POST["ball_3"];
    $ball_4		=	$_POST["ball_4"];
    $ball_5		=	$_POST["ball_5"];
    $ball_6		=	$_POST["ball_6"];
    $ball_7		=	$_POST["ball_7"];
    $ball_8		=	$_POST["ball_8"];
    $ball_9		=	$_POST["ball_9"];
    $ball_10		=	$_POST["ball_10"];
    $ball_11		=	$_POST["ball_11"];
    $ball_12		=	$_POST["ball_12"];
    $ball_13		=	$_POST["ball_13"];
    $ball_14		=	$_POST["ball_14"];
    $ball_15		=	$_POST["ball_15"];
    $ball_16		=	$_POST["ball_16"];
    $ball_17		=	$_POST["ball_17"];
    $ball_18		=	$_POST["ball_18"];
    $ball_19		=	$_POST["ball_19"];
    $ball_20		=	$_POST["ball_20"];
    $sql		=	"update lottery_result_bjkn set prev_text='".$prev_text."', qishu=".$qishu.",datetime='".$datetime."',ball_1=".$ball_1.",ball_2=".$ball_2.",ball_3=".$ball_3.",ball_4=".$ball_4.",ball_5=".$ball_5.",ball_6=".$ball_6.",ball_7=".$ball_7.",ball_8=".$ball_8.",ball_9=".$ball_9.",ball_10=".$ball_10.",ball_11=".$ball_11.",ball_12=".$ball_12.",ball_13=".$ball_13.",ball_14=".$ball_14.",ball_15=".$ball_15.",ball_16=".$ball_16.",ball_17=".$ball_17.",ball_18=".$ball_18.",ball_19=".$ball_19.",ball_20=".$ball_20." where id=".$id."";
    $mysqli->query($sql);
}elseif($_GET["action"]=="delete" && $id>0){
    $sql		=	"delete from lottery_result_bjkn WHERE id='$id'";
    $query	=	$mysqli->query($sql);
	if($query){echo '<script>alert("删除成功"); window.href.location="/bh-100/Lottery/result/BJKN/result_bjkn.php?status=0&type=%E5%8C%97%E4%BA%AC%E5%BF%AB%E4%B9%908";</script>';}
	else{echo '<script>alert("删除失败"); window.href.location="/bh-100/Lottery/result/BJKN/result_bjkn.php?status=0&type=%E5%8C%97%E4%BA%AC%E5%BF%AB%E4%B9%908";</script>';}
    
}
?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Welcome</title>
    <link rel="stylesheet" href="../../../images/css/admin_style_1.css" type="text/css" media="all" />
    <script language="javascript" src="../../../js/jquery-1.7.2.min.js"></script>
    <script language="javascript" src="query_bjkn.js"></script>
    <script language="JavaScript" src="/js/calendar.js"></script>
</head>
<body>
<div id="pageMain">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="5">
<tr>
<td valign="top">
<form name="form1" onSubmit="return check_submit();" method="post" action="?id=<?=$id?>&action=<?=$id>0 ? 'edit' : 'add'?>&s_time=<?=$query_time?>&qishu_query=<?=$qishu_query?>">
<?php
if($id>0 && !isset($_GET['action'])){
    $sql = "SELECT id,qishu,create_time,datetime,state,prev_text,
            ball_1,ball_2,ball_3,ball_4,ball_5,ball_6,ball_7,ball_8,ball_9,ball_10,
            ball_11,ball_12,ball_13,ball_14,ball_15,ball_16,ball_17,ball_18,ball_19,ball_20
            FROM lottery_result_bjkn WHERE id=$id limit 0,1";
    $query	=	$mysqli->query($sql);
    $rs		=	$query->fetch_array();
}
?>
<table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12" style="margin-top:5px;" bgcolor="#798EB9">
<tr>
    <td  align="left" bgcolor="#3C4D82" style="color:#FFF">彩票类别：</td>
    <td  align="left" bgcolor="#3C4D82" style="color:#FFF"><strong>北京快乐8</strong></td>
</tr>
<tr>
    <td width="60"  align="left" bgcolor="#F0FFFF">开奖期号：</td>
    <td  align="left" bgcolor="#FFFFFF"><input name="qishu" type="text" id="qishu" value="<?=$rs['qishu']?>" size="20" maxlength="16"/></td>
</tr>
<tr>
    <td align="left" bgcolor="#F0FFFF">开奖时间：</td>
    <td align="left" bgcolor="#FFFFFF"><input name="datetime" type="text" id="datetime" value="<?=$rs['datetime']?>" size="20" maxlength="19"/> 注意：时间格式务必填写正确，如2014-10-10 10:10:10</td>
</tr>
<tr>
    <td align="left" bgcolor="#F0FFFF">开奖号码：</td>
    <td align="left" bgcolor="#FFFFFF"><select name="ball_1" id="ball_1">
            <option value="1" <?=$rs['ball_1']==1 ? 'selected' : ''?>>1</option>
            <option value="2" <?=$rs['ball_1']==2 ? 'selected' : ''?>>2</option>
            <option value="3" <?=$rs['ball_1']==3 ? 'selected' : ''?>>3</option>
            <option value="4" <?=$rs['ball_1']==4 ? 'selected' : ''?>>4</option>
            <option value="5" <?=$rs['ball_1']==5 ? 'selected' : ''?>>5</option>
            <option value="6" <?=$rs['ball_1']==6 ? 'selected' : ''?>>6</option>
            <option value="7" <?=$rs['ball_1']==7 ? 'selected' : ''?>>7</option>
            <option value="8" <?=$rs['ball_1']==8 ? 'selected' : ''?>>8</option>
            <option value="9" <?=$rs['ball_1']==9 ? 'selected' : ''?>>9</option>
            <option value="10" <?=$rs['ball_1']==10 ? 'selected' : ''?>>10</option>
            <option value="11" <?=$rs['ball_1']==11 ? 'selected' : ''?>>11</option>
            <option value="12" <?=$rs['ball_1']==12 ? 'selected' : ''?>>12</option>
            <option value="13" <?=$rs['ball_1']==13 ? 'selected' : ''?>>13</option>
            <option value="14" <?=$rs['ball_1']==14 ? 'selected' : ''?>>14</option>
            <option value="15" <?=$rs['ball_1']==15 ? 'selected' : ''?>>15</option>
            <option value="16" <?=$rs['ball_1']==16 ? 'selected' : ''?>>16</option>
            <option value="17" <?=$rs['ball_1']==17 ? 'selected' : ''?>>17</option>
            <option value="18" <?=$rs['ball_1']==18 ? 'selected' : ''?>>18</option>
            <option value="19" <?=$rs['ball_1']==19 ? 'selected' : ''?>>19</option>
            <option value="20" <?=$rs['ball_1']==20 ? 'selected' : ''?>>20</option>
            <option value="21" <?=$rs['ball_1']==21 ? 'selected' : ''?>>21</option>
            <option value="22" <?=$rs['ball_1']==22 ? 'selected' : ''?>>22</option>
            <option value="23" <?=$rs['ball_1']==23 ? 'selected' : ''?>>23</option>
            <option value="24" <?=$rs['ball_1']==24 ? 'selected' : ''?>>24</option>
            <option value="25" <?=$rs['ball_1']==25 ? 'selected' : ''?>>25</option>
            <option value="26" <?=$rs['ball_1']==26 ? 'selected' : ''?>>26</option>
            <option value="27" <?=$rs['ball_1']==27 ? 'selected' : ''?>>27</option>
            <option value="28" <?=$rs['ball_1']==28 ? 'selected' : ''?>>28</option>
            <option value="29" <?=$rs['ball_1']==29 ? 'selected' : ''?>>29</option>
            <option value="30" <?=$rs['ball_1']==30 ? 'selected' : ''?>>30</option>
            <option value="31" <?=$rs['ball_1']==31 ? 'selected' : ''?>>31</option>
            <option value="32" <?=$rs['ball_1']==32 ? 'selected' : ''?>>32</option>
            <option value="33" <?=$rs['ball_1']==33 ? 'selected' : ''?>>33</option>
            <option value="34" <?=$rs['ball_1']==34 ? 'selected' : ''?>>34</option>
            <option value="35" <?=$rs['ball_1']==35 ? 'selected' : ''?>>35</option>
            <option value="36" <?=$rs['ball_1']==36 ? 'selected' : ''?>>36</option>
            <option value="37" <?=$rs['ball_1']==37 ? 'selected' : ''?>>37</option>
            <option value="38" <?=$rs['ball_1']==38 ? 'selected' : ''?>>38</option>
            <option value="39" <?=$rs['ball_1']==39 ? 'selected' : ''?>>39</option>
            <option value="40" <?=$rs['ball_1']==40 ? 'selected' : ''?>>40</option>
            <option value="41" <?=$rs['ball_1']==41 ? 'selected' : ''?>>41</option>
            <option value="42" <?=$rs['ball_1']==42 ? 'selected' : ''?>>42</option>
            <option value="43" <?=$rs['ball_1']==43 ? 'selected' : ''?>>43</option>
            <option value="44" <?=$rs['ball_1']==44 ? 'selected' : ''?>>44</option>
            <option value="45" <?=$rs['ball_1']==45 ? 'selected' : ''?>>45</option>
            <option value="46" <?=$rs['ball_1']==46 ? 'selected' : ''?>>46</option>
            <option value="47" <?=$rs['ball_1']==47 ? 'selected' : ''?>>47</option>
            <option value="48" <?=$rs['ball_1']==48 ? 'selected' : ''?>>48</option>
            <option value="49" <?=$rs['ball_1']==49 ? 'selected' : ''?>>49</option>
            <option value="50" <?=$rs['ball_1']==50 ? 'selected' : ''?>>50</option>
            <option value="51" <?=$rs['ball_1']==51 ? 'selected' : ''?>>51</option>
            <option value="52" <?=$rs['ball_1']==52 ? 'selected' : ''?>>52</option>
            <option value="53" <?=$rs['ball_1']==53 ? 'selected' : ''?>>53</option>
            <option value="54" <?=$rs['ball_1']==54 ? 'selected' : ''?>>54</option>
            <option value="55" <?=$rs['ball_1']==55 ? 'selected' : ''?>>55</option>
            <option value="56" <?=$rs['ball_1']==56 ? 'selected' : ''?>>56</option>
            <option value="57" <?=$rs['ball_1']==57 ? 'selected' : ''?>>57</option>
            <option value="58" <?=$rs['ball_1']==58 ? 'selected' : ''?>>58</option>
            <option value="59" <?=$rs['ball_1']==59 ? 'selected' : ''?>>59</option>
            <option value="60" <?=$rs['ball_1']==60 ? 'selected' : ''?>>60</option>
            <option value="61" <?=$rs['ball_1']==61 ? 'selected' : ''?>>61</option>
            <option value="62" <?=$rs['ball_1']==62 ? 'selected' : ''?>>62</option>
            <option value="63" <?=$rs['ball_1']==63 ? 'selected' : ''?>>63</option>
            <option value="64" <?=$rs['ball_1']==64 ? 'selected' : ''?>>64</option>
            <option value="65" <?=$rs['ball_1']==65 ? 'selected' : ''?>>65</option>
            <option value="66" <?=$rs['ball_1']==66 ? 'selected' : ''?>>66</option>
            <option value="67" <?=$rs['ball_1']==67 ? 'selected' : ''?>>67</option>
            <option value="68" <?=$rs['ball_1']==68 ? 'selected' : ''?>>68</option>
            <option value="69" <?=$rs['ball_1']==69 ? 'selected' : ''?>>69</option>
            <option value="70" <?=$rs['ball_1']==70 ? 'selected' : ''?>>70</option>
            <option value="71" <?=$rs['ball_1']==71 ? 'selected' : ''?>>71</option>
            <option value="72" <?=$rs['ball_1']==72 ? 'selected' : ''?>>72</option>
            <option value="73" <?=$rs['ball_1']==73 ? 'selected' : ''?>>73</option>
            <option value="74" <?=$rs['ball_1']==74 ? 'selected' : ''?>>74</option>
            <option value="75" <?=$rs['ball_1']==75 ? 'selected' : ''?>>75</option>
            <option value="76" <?=$rs['ball_1']==76 ? 'selected' : ''?>>76</option>
            <option value="77" <?=$rs['ball_1']==77 ? 'selected' : ''?>>77</option>
            <option value="78" <?=$rs['ball_1']==78 ? 'selected' : ''?>>78</option>
            <option value="79" <?=$rs['ball_1']==79 ? 'selected' : ''?>>79</option>
            <option value="80" <?=$rs['ball_1']==80 ? 'selected' : ''?>>80</option>
            <option value="" <?=$rs['ball_1']=='' ? 'selected' : ''?>>第一球</option>
        </select>
        <select name="ball_2" id="ball_2">
            <option value="1" <?=$rs['ball_2']==1 ? 'selected' : ''?>>1</option>
            <option value="2" <?=$rs['ball_2']==2 ? 'selected' : ''?>>2</option>
            <option value="3" <?=$rs['ball_2']==3 ? 'selected' : ''?>>3</option>
            <option value="4" <?=$rs['ball_2']==4 ? 'selected' : ''?>>4</option>
            <option value="5" <?=$rs['ball_2']==5 ? 'selected' : ''?>>5</option>
            <option value="6" <?=$rs['ball_2']==6 ? 'selected' : ''?>>6</option>
            <option value="7" <?=$rs['ball_2']==7 ? 'selected' : ''?>>7</option>
            <option value="8" <?=$rs['ball_2']==8 ? 'selected' : ''?>>8</option>
            <option value="9" <?=$rs['ball_2']==9 ? 'selected' : ''?>>9</option>
            <option value="10" <?=$rs['ball_2']==10 ? 'selected' : ''?>>10</option>
            <option value="11" <?=$rs['ball_2']==11 ? 'selected' : ''?>>11</option>
            <option value="12" <?=$rs['ball_2']==12 ? 'selected' : ''?>>12</option>
            <option value="13" <?=$rs['ball_2']==13 ? 'selected' : ''?>>13</option>
            <option value="14" <?=$rs['ball_2']==14 ? 'selected' : ''?>>14</option>
            <option value="15" <?=$rs['ball_2']==15 ? 'selected' : ''?>>15</option>
            <option value="16" <?=$rs['ball_2']==16 ? 'selected' : ''?>>16</option>
            <option value="17" <?=$rs['ball_2']==17 ? 'selected' : ''?>>17</option>
            <option value="18" <?=$rs['ball_2']==18 ? 'selected' : ''?>>18</option>
            <option value="19" <?=$rs['ball_2']==19 ? 'selected' : ''?>>19</option>
            <option value="20" <?=$rs['ball_2']==20 ? 'selected' : ''?>>20</option>
            <option value="21" <?=$rs['ball_2']==21 ? 'selected' : ''?>>21</option>
            <option value="22" <?=$rs['ball_2']==22 ? 'selected' : ''?>>22</option>
            <option value="23" <?=$rs['ball_2']==23 ? 'selected' : ''?>>23</option>
            <option value="24" <?=$rs['ball_2']==24 ? 'selected' : ''?>>24</option>
            <option value="25" <?=$rs['ball_2']==25 ? 'selected' : ''?>>25</option>
            <option value="26" <?=$rs['ball_2']==26 ? 'selected' : ''?>>26</option>
            <option value="27" <?=$rs['ball_2']==27 ? 'selected' : ''?>>27</option>
            <option value="28" <?=$rs['ball_2']==28 ? 'selected' : ''?>>28</option>
            <option value="29" <?=$rs['ball_2']==29 ? 'selected' : ''?>>29</option>
            <option value="30" <?=$rs['ball_2']==30 ? 'selected' : ''?>>30</option>
            <option value="31" <?=$rs['ball_2']==31 ? 'selected' : ''?>>31</option>
            <option value="32" <?=$rs['ball_2']==32 ? 'selected' : ''?>>32</option>
            <option value="33" <?=$rs['ball_2']==33 ? 'selected' : ''?>>33</option>
            <option value="34" <?=$rs['ball_2']==34 ? 'selected' : ''?>>34</option>
            <option value="35" <?=$rs['ball_2']==35 ? 'selected' : ''?>>35</option>
            <option value="36" <?=$rs['ball_2']==36 ? 'selected' : ''?>>36</option>
            <option value="37" <?=$rs['ball_2']==37 ? 'selected' : ''?>>37</option>
            <option value="38" <?=$rs['ball_2']==38 ? 'selected' : ''?>>38</option>
            <option value="39" <?=$rs['ball_2']==39 ? 'selected' : ''?>>39</option>
            <option value="40" <?=$rs['ball_2']==40 ? 'selected' : ''?>>40</option>
            <option value="41" <?=$rs['ball_2']==41 ? 'selected' : ''?>>41</option>
            <option value="42" <?=$rs['ball_2']==42 ? 'selected' : ''?>>42</option>
            <option value="43" <?=$rs['ball_2']==43 ? 'selected' : ''?>>43</option>
            <option value="44" <?=$rs['ball_2']==44 ? 'selected' : ''?>>44</option>
            <option value="45" <?=$rs['ball_2']==45 ? 'selected' : ''?>>45</option>
            <option value="46" <?=$rs['ball_2']==46 ? 'selected' : ''?>>46</option>
            <option value="47" <?=$rs['ball_2']==47 ? 'selected' : ''?>>47</option>
            <option value="48" <?=$rs['ball_2']==48 ? 'selected' : ''?>>48</option>
            <option value="49" <?=$rs['ball_2']==49 ? 'selected' : ''?>>49</option>
            <option value="50" <?=$rs['ball_2']==50 ? 'selected' : ''?>>50</option>
            <option value="51" <?=$rs['ball_2']==51 ? 'selected' : ''?>>51</option>
            <option value="52" <?=$rs['ball_2']==52 ? 'selected' : ''?>>52</option>
            <option value="53" <?=$rs['ball_2']==53 ? 'selected' : ''?>>53</option>
            <option value="54" <?=$rs['ball_2']==54 ? 'selected' : ''?>>54</option>
            <option value="55" <?=$rs['ball_2']==55 ? 'selected' : ''?>>55</option>
            <option value="56" <?=$rs['ball_2']==56 ? 'selected' : ''?>>56</option>
            <option value="57" <?=$rs['ball_2']==57 ? 'selected' : ''?>>57</option>
            <option value="58" <?=$rs['ball_2']==58 ? 'selected' : ''?>>58</option>
            <option value="59" <?=$rs['ball_2']==59 ? 'selected' : ''?>>59</option>
            <option value="60" <?=$rs['ball_2']==60 ? 'selected' : ''?>>60</option>
            <option value="61" <?=$rs['ball_2']==61 ? 'selected' : ''?>>61</option>
            <option value="62" <?=$rs['ball_2']==62 ? 'selected' : ''?>>62</option>
            <option value="63" <?=$rs['ball_2']==63 ? 'selected' : ''?>>63</option>
            <option value="64" <?=$rs['ball_2']==64 ? 'selected' : ''?>>64</option>
            <option value="65" <?=$rs['ball_2']==65 ? 'selected' : ''?>>65</option>
            <option value="66" <?=$rs['ball_2']==66 ? 'selected' : ''?>>66</option>
            <option value="67" <?=$rs['ball_2']==67 ? 'selected' : ''?>>67</option>
            <option value="68" <?=$rs['ball_2']==68 ? 'selected' : ''?>>68</option>
            <option value="69" <?=$rs['ball_2']==69 ? 'selected' : ''?>>69</option>
            <option value="70" <?=$rs['ball_2']==70 ? 'selected' : ''?>>70</option>
            <option value="71" <?=$rs['ball_2']==71 ? 'selected' : ''?>>71</option>
            <option value="72" <?=$rs['ball_2']==72 ? 'selected' : ''?>>72</option>
            <option value="73" <?=$rs['ball_2']==73 ? 'selected' : ''?>>73</option>
            <option value="74" <?=$rs['ball_2']==74 ? 'selected' : ''?>>74</option>
            <option value="75" <?=$rs['ball_2']==75 ? 'selected' : ''?>>75</option>
            <option value="76" <?=$rs['ball_2']==76 ? 'selected' : ''?>>76</option>
            <option value="77" <?=$rs['ball_2']==77 ? 'selected' : ''?>>77</option>
            <option value="78" <?=$rs['ball_2']==78 ? 'selected' : ''?>>78</option>
            <option value="79" <?=$rs['ball_2']==79 ? 'selected' : ''?>>79</option>
            <option value="80" <?=$rs['ball_2']==80 ? 'selected' : ''?>>80</option>
            <option value="" <?=$rs['ball_2']=='' ? 'selected' : ''?>>第二球</option>
        </select>
    <select name="ball_3" id="ball_3">
        <option value="01" <?=$rs['ball_3']==1 ? 'selected' : ''?>>01</option>
        <option value="02" <?=$rs['ball_3']==2 ? 'selected' : ''?>>02</option>
        <option value="03" <?=$rs['ball_3']==3 ? 'selected' : ''?>>03</option>
        <option value="04" <?=$rs['ball_3']==4 ? 'selected' : ''?>>04</option>
        <option value="05" <?=$rs['ball_3']==5 ? 'selected' : ''?>>05</option>
        <option value="06" <?=$rs['ball_3']==6 ? 'selected' : ''?>>06</option>
        <option value="07" <?=$rs['ball_3']==7 ? 'selected' : ''?>>07</option>
        <option value="08" <?=$rs['ball_3']==8 ? 'selected' : ''?>>08</option>
        <option value="09" <?=$rs['ball_3']==9 ? 'selected' : ''?>>09</option>
        <option value="10" <?=$rs['ball_3']==10 ? 'selected' : ''?>>10</option>
        <option value="11" <?=$rs['ball_3']==11 ? 'selected' : ''?>>11</option>
        <option value="12" <?=$rs['ball_3']==12 ? 'selected' : ''?>>12</option>
        <option value="13" <?=$rs['ball_3']==13 ? 'selected' : ''?>>13</option>
        <option value="14" <?=$rs['ball_3']==14 ? 'selected' : ''?>>14</option>
        <option value="15" <?=$rs['ball_3']==15 ? 'selected' : ''?>>15</option>
        <option value="16" <?=$rs['ball_3']==16 ? 'selected' : ''?>>16</option>
        <option value="17" <?=$rs['ball_3']==17 ? 'selected' : ''?>>17</option>
        <option value="18" <?=$rs['ball_3']==18 ? 'selected' : ''?>>18</option>
        <option value="19" <?=$rs['ball_3']==19 ? 'selected' : ''?>>19</option>
        <option value="20" <?=$rs['ball_3']==20 ? 'selected' : ''?>>20</option>
        <option value="21" <?=$rs['ball_3']==21 ? 'selected' : ''?>>21</option>
        <option value="22" <?=$rs['ball_3']==22 ? 'selected' : ''?>>22</option>
        <option value="23" <?=$rs['ball_3']==23 ? 'selected' : ''?>>23</option>
        <option value="24" <?=$rs['ball_3']==24 ? 'selected' : ''?>>24</option>
        <option value="25" <?=$rs['ball_3']==25 ? 'selected' : ''?>>25</option>
        <option value="26" <?=$rs['ball_3']==26 ? 'selected' : ''?>>26</option>
        <option value="27" <?=$rs['ball_3']==27 ? 'selected' : ''?>>27</option>
        <option value="28" <?=$rs['ball_3']==28 ? 'selected' : ''?>>28</option>
        <option value="29" <?=$rs['ball_3']==29 ? 'selected' : ''?>>29</option>
        <option value="30" <?=$rs['ball_3']==30 ? 'selected' : ''?>>30</option>
        <option value="31" <?=$rs['ball_3']==31 ? 'selected' : ''?>>31</option>
        <option value="32" <?=$rs['ball_3']==32 ? 'selected' : ''?>>32</option>
        <option value="33" <?=$rs['ball_3']==33 ? 'selected' : ''?>>33</option>
        <option value="34" <?=$rs['ball_3']==34 ? 'selected' : ''?>>34</option>
        <option value="35" <?=$rs['ball_3']==35 ? 'selected' : ''?>>35</option>
        <option value="36" <?=$rs['ball_3']==36 ? 'selected' : ''?>>36</option>
        <option value="37" <?=$rs['ball_3']==37 ? 'selected' : ''?>>37</option>
        <option value="38" <?=$rs['ball_3']==38 ? 'selected' : ''?>>38</option>
        <option value="39" <?=$rs['ball_3']==39 ? 'selected' : ''?>>39</option>
        <option value="40" <?=$rs['ball_3']==40 ? 'selected' : ''?>>40</option>
        <option value="41" <?=$rs['ball_3']==41 ? 'selected' : ''?>>41</option>
        <option value="42" <?=$rs['ball_3']==42 ? 'selected' : ''?>>42</option>
        <option value="43" <?=$rs['ball_3']==43 ? 'selected' : ''?>>43</option>
        <option value="44" <?=$rs['ball_3']==44 ? 'selected' : ''?>>44</option>
        <option value="45" <?=$rs['ball_3']==45 ? 'selected' : ''?>>45</option>
        <option value="46" <?=$rs['ball_3']==46 ? 'selected' : ''?>>46</option>
        <option value="47" <?=$rs['ball_3']==47 ? 'selected' : ''?>>47</option>
        <option value="48" <?=$rs['ball_3']==48 ? 'selected' : ''?>>48</option>
        <option value="49" <?=$rs['ball_3']==49 ? 'selected' : ''?>>49</option>
        <option value="50" <?=$rs['ball_3']==50 ? 'selected' : ''?>>50</option>
        <option value="51" <?=$rs['ball_3']==51 ? 'selected' : ''?>>51</option>
        <option value="52" <?=$rs['ball_3']==52 ? 'selected' : ''?>>52</option>
        <option value="53" <?=$rs['ball_3']==53 ? 'selected' : ''?>>53</option>
        <option value="54" <?=$rs['ball_3']==54 ? 'selected' : ''?>>54</option>
        <option value="55" <?=$rs['ball_3']==55 ? 'selected' : ''?>>55</option>
        <option value="56" <?=$rs['ball_3']==56 ? 'selected' : ''?>>56</option>
        <option value="57" <?=$rs['ball_3']==57 ? 'selected' : ''?>>57</option>
        <option value="58" <?=$rs['ball_3']==58 ? 'selected' : ''?>>58</option>
        <option value="59" <?=$rs['ball_3']==59 ? 'selected' : ''?>>59</option>
        <option value="60" <?=$rs['ball_3']==60 ? 'selected' : ''?>>60</option>
        <option value="61" <?=$rs['ball_3']==61 ? 'selected' : ''?>>61</option>
        <option value="62" <?=$rs['ball_3']==62 ? 'selected' : ''?>>62</option>
        <option value="63" <?=$rs['ball_3']==63 ? 'selected' : ''?>>63</option>
        <option value="64" <?=$rs['ball_3']==64 ? 'selected' : ''?>>64</option>
        <option value="65" <?=$rs['ball_3']==65 ? 'selected' : ''?>>65</option>
        <option value="66" <?=$rs['ball_3']==66 ? 'selected' : ''?>>66</option>
        <option value="67" <?=$rs['ball_3']==67 ? 'selected' : ''?>>67</option>
        <option value="68" <?=$rs['ball_3']==68 ? 'selected' : ''?>>68</option>
        <option value="69" <?=$rs['ball_3']==69 ? 'selected' : ''?>>69</option>
        <option value="70" <?=$rs['ball_3']==70 ? 'selected' : ''?>>70</option>
        <option value="71" <?=$rs['ball_3']==71 ? 'selected' : ''?>>71</option>
        <option value="72" <?=$rs['ball_3']==72 ? 'selected' : ''?>>72</option>
        <option value="73" <?=$rs['ball_3']==73 ? 'selected' : ''?>>73</option>
        <option value="74" <?=$rs['ball_3']==74 ? 'selected' : ''?>>74</option>
        <option value="75" <?=$rs['ball_3']==75 ? 'selected' : ''?>>75</option>
        <option value="76" <?=$rs['ball_3']==76 ? 'selected' : ''?>>76</option>
        <option value="77" <?=$rs['ball_3']==77 ? 'selected' : ''?>>77</option>
        <option value="78" <?=$rs['ball_3']==78 ? 'selected' : ''?>>78</option>
        <option value="79" <?=$rs['ball_3']==79 ? 'selected' : ''?>>79</option>
        <option value="80" <?=$rs['ball_3']==80 ? 'selected' : ''?>>80</option>
        <option value="" <?=$rs['ball_3']=='' ? 'selected' : ''?>>第三球</option>
    </select>
    <select name="ball_4" id="ball_4">
        <option value="01" <?=$rs['ball_4']==1 ? 'selected' : ''?>>01</option>
        <option value="02" <?=$rs['ball_4']==2 ? 'selected' : ''?>>02</option>
        <option value="03" <?=$rs['ball_4']==3 ? 'selected' : ''?>>03</option>
        <option value="04" <?=$rs['ball_4']==4 ? 'selected' : ''?>>04</option>
        <option value="05" <?=$rs['ball_4']==5 ? 'selected' : ''?>>05</option>
        <option value="06" <?=$rs['ball_4']==6 ? 'selected' : ''?>>06</option>
        <option value="07" <?=$rs['ball_4']==7 ? 'selected' : ''?>>07</option>
        <option value="08" <?=$rs['ball_4']==8 ? 'selected' : ''?>>08</option>
        <option value="09" <?=$rs['ball_4']==9 ? 'selected' : ''?>>09</option>
        <option value="10" <?=$rs['ball_4']==10 ? 'selected' : ''?>>10</option>
        <option value="11" <?=$rs['ball_4']==11 ? 'selected' : ''?>>11</option>
        <option value="12" <?=$rs['ball_4']==12 ? 'selected' : ''?>>12</option>
        <option value="13" <?=$rs['ball_4']==13 ? 'selected' : ''?>>13</option>
        <option value="14" <?=$rs['ball_4']==14 ? 'selected' : ''?>>14</option>
        <option value="15" <?=$rs['ball_4']==15 ? 'selected' : ''?>>15</option>
        <option value="16" <?=$rs['ball_4']==16 ? 'selected' : ''?>>16</option>
        <option value="17" <?=$rs['ball_4']==17 ? 'selected' : ''?>>17</option>
        <option value="18" <?=$rs['ball_4']==18 ? 'selected' : ''?>>18</option>
        <option value="19" <?=$rs['ball_4']==19 ? 'selected' : ''?>>19</option>
        <option value="20" <?=$rs['ball_4']==20 ? 'selected' : ''?>>20</option>
        <option value="21" <?=$rs['ball_4']==21 ? 'selected' : ''?>>21</option>
        <option value="22" <?=$rs['ball_4']==22 ? 'selected' : ''?>>22</option>
        <option value="23" <?=$rs['ball_4']==23 ? 'selected' : ''?>>23</option>
        <option value="24" <?=$rs['ball_4']==24 ? 'selected' : ''?>>24</option>
        <option value="25" <?=$rs['ball_4']==25 ? 'selected' : ''?>>25</option>
        <option value="26" <?=$rs['ball_4']==26 ? 'selected' : ''?>>26</option>
        <option value="27" <?=$rs['ball_4']==27 ? 'selected' : ''?>>27</option>
        <option value="28" <?=$rs['ball_4']==28 ? 'selected' : ''?>>28</option>
        <option value="29" <?=$rs['ball_4']==29 ? 'selected' : ''?>>29</option>
        <option value="30" <?=$rs['ball_4']==30 ? 'selected' : ''?>>30</option>
        <option value="31" <?=$rs['ball_4']==31 ? 'selected' : ''?>>31</option>
        <option value="32" <?=$rs['ball_4']==32 ? 'selected' : ''?>>32</option>
        <option value="33" <?=$rs['ball_4']==33 ? 'selected' : ''?>>33</option>
        <option value="34" <?=$rs['ball_4']==34 ? 'selected' : ''?>>34</option>
        <option value="35" <?=$rs['ball_4']==35 ? 'selected' : ''?>>35</option>
        <option value="36" <?=$rs['ball_4']==36 ? 'selected' : ''?>>36</option>
        <option value="37" <?=$rs['ball_4']==37 ? 'selected' : ''?>>37</option>
        <option value="38" <?=$rs['ball_4']==38 ? 'selected' : ''?>>38</option>
        <option value="39" <?=$rs['ball_4']==39 ? 'selected' : ''?>>39</option>
        <option value="40" <?=$rs['ball_4']==40 ? 'selected' : ''?>>40</option>
        <option value="41" <?=$rs['ball_4']==41 ? 'selected' : ''?>>41</option>
        <option value="42" <?=$rs['ball_4']==42 ? 'selected' : ''?>>42</option>
        <option value="43" <?=$rs['ball_4']==43 ? 'selected' : ''?>>43</option>
        <option value="44" <?=$rs['ball_4']==44 ? 'selected' : ''?>>44</option>
        <option value="45" <?=$rs['ball_4']==45 ? 'selected' : ''?>>45</option>
        <option value="46" <?=$rs['ball_4']==46 ? 'selected' : ''?>>46</option>
        <option value="47" <?=$rs['ball_4']==47 ? 'selected' : ''?>>47</option>
        <option value="48" <?=$rs['ball_4']==48 ? 'selected' : ''?>>48</option>
        <option value="49" <?=$rs['ball_4']==49 ? 'selected' : ''?>>49</option>
        <option value="50" <?=$rs['ball_4']==50 ? 'selected' : ''?>>50</option>
        <option value="51" <?=$rs['ball_4']==51 ? 'selected' : ''?>>51</option>
        <option value="52" <?=$rs['ball_4']==52 ? 'selected' : ''?>>52</option>
        <option value="53" <?=$rs['ball_4']==53 ? 'selected' : ''?>>53</option>
        <option value="54" <?=$rs['ball_4']==54 ? 'selected' : ''?>>54</option>
        <option value="55" <?=$rs['ball_4']==55 ? 'selected' : ''?>>55</option>
        <option value="56" <?=$rs['ball_4']==56 ? 'selected' : ''?>>56</option>
        <option value="57" <?=$rs['ball_4']==57 ? 'selected' : ''?>>57</option>
        <option value="58" <?=$rs['ball_4']==58 ? 'selected' : ''?>>58</option>
        <option value="59" <?=$rs['ball_4']==59 ? 'selected' : ''?>>59</option>
        <option value="60" <?=$rs['ball_4']==60 ? 'selected' : ''?>>60</option>
        <option value="61" <?=$rs['ball_4']==61 ? 'selected' : ''?>>61</option>
        <option value="62" <?=$rs['ball_4']==62 ? 'selected' : ''?>>62</option>
        <option value="63" <?=$rs['ball_4']==63 ? 'selected' : ''?>>63</option>
        <option value="64" <?=$rs['ball_4']==64 ? 'selected' : ''?>>64</option>
        <option value="65" <?=$rs['ball_4']==65 ? 'selected' : ''?>>65</option>
        <option value="66" <?=$rs['ball_4']==66 ? 'selected' : ''?>>66</option>
        <option value="67" <?=$rs['ball_4']==67 ? 'selected' : ''?>>67</option>
        <option value="68" <?=$rs['ball_4']==68 ? 'selected' : ''?>>68</option>
        <option value="69" <?=$rs['ball_4']==69 ? 'selected' : ''?>>69</option>
        <option value="70" <?=$rs['ball_4']==70 ? 'selected' : ''?>>70</option>
        <option value="71" <?=$rs['ball_4']==71 ? 'selected' : ''?>>71</option>
        <option value="72" <?=$rs['ball_4']==72 ? 'selected' : ''?>>72</option>
        <option value="73" <?=$rs['ball_4']==73 ? 'selected' : ''?>>73</option>
        <option value="74" <?=$rs['ball_4']==74 ? 'selected' : ''?>>74</option>
        <option value="75" <?=$rs['ball_4']==75 ? 'selected' : ''?>>75</option>
        <option value="76" <?=$rs['ball_4']==76 ? 'selected' : ''?>>76</option>
        <option value="77" <?=$rs['ball_4']==77 ? 'selected' : ''?>>77</option>
        <option value="78" <?=$rs['ball_4']==78 ? 'selected' : ''?>>78</option>
        <option value="79" <?=$rs['ball_4']==79 ? 'selected' : ''?>>79</option>
        <option value="80" <?=$rs['ball_4']==80 ? 'selected' : ''?>>80</option>
        <option value="" <?=$rs['ball_4']=='' ? 'selected' : ''?>>第四球</option>
    </select>
    <select name="ball_5" id="ball_5">
        <option value="01" <?=$rs['ball_5']==1 ? 'selected' : ''?>>01</option>
        <option value="02" <?=$rs['ball_5']==2 ? 'selected' : ''?>>02</option>
        <option value="03" <?=$rs['ball_5']==3 ? 'selected' : ''?>>03</option>
        <option value="04" <?=$rs['ball_5']==4 ? 'selected' : ''?>>04</option>
        <option value="05" <?=$rs['ball_5']==5 ? 'selected' : ''?>>05</option>
        <option value="06" <?=$rs['ball_5']==6 ? 'selected' : ''?>>06</option>
        <option value="07" <?=$rs['ball_5']==7 ? 'selected' : ''?>>07</option>
        <option value="08" <?=$rs['ball_5']==8 ? 'selected' : ''?>>08</option>
        <option value="09" <?=$rs['ball_5']==9 ? 'selected' : ''?>>09</option>
        <option value="10" <?=$rs['ball_5']==10 ? 'selected' : ''?>>10</option>
        <option value="11" <?=$rs['ball_5']==11 ? 'selected' : ''?>>11</option>
        <option value="12" <?=$rs['ball_5']==12 ? 'selected' : ''?>>12</option>
        <option value="13" <?=$rs['ball_5']==13 ? 'selected' : ''?>>13</option>
        <option value="14" <?=$rs['ball_5']==14 ? 'selected' : ''?>>14</option>
        <option value="15" <?=$rs['ball_5']==15 ? 'selected' : ''?>>15</option>
        <option value="16" <?=$rs['ball_5']==16 ? 'selected' : ''?>>16</option>
        <option value="17" <?=$rs['ball_5']==17 ? 'selected' : ''?>>17</option>
        <option value="18" <?=$rs['ball_5']==18 ? 'selected' : ''?>>18</option>
        <option value="19" <?=$rs['ball_5']==19 ? 'selected' : ''?>>19</option>
        <option value="20" <?=$rs['ball_5']==20 ? 'selected' : ''?>>20</option>
        <option value="21" <?=$rs['ball_5']==21 ? 'selected' : ''?>>21</option>
        <option value="22" <?=$rs['ball_5']==22 ? 'selected' : ''?>>22</option>
        <option value="23" <?=$rs['ball_5']==23 ? 'selected' : ''?>>23</option>
        <option value="24" <?=$rs['ball_5']==24 ? 'selected' : ''?>>24</option>
        <option value="25" <?=$rs['ball_5']==25 ? 'selected' : ''?>>25</option>
        <option value="26" <?=$rs['ball_5']==26 ? 'selected' : ''?>>26</option>
        <option value="27" <?=$rs['ball_5']==27 ? 'selected' : ''?>>27</option>
        <option value="28" <?=$rs['ball_5']==28 ? 'selected' : ''?>>28</option>
        <option value="29" <?=$rs['ball_5']==29 ? 'selected' : ''?>>29</option>
        <option value="30" <?=$rs['ball_5']==30 ? 'selected' : ''?>>30</option>
        <option value="31" <?=$rs['ball_5']==31 ? 'selected' : ''?>>31</option>
        <option value="32" <?=$rs['ball_5']==32 ? 'selected' : ''?>>32</option>
        <option value="33" <?=$rs['ball_5']==33 ? 'selected' : ''?>>33</option>
        <option value="34" <?=$rs['ball_5']==34 ? 'selected' : ''?>>34</option>
        <option value="35" <?=$rs['ball_5']==35 ? 'selected' : ''?>>35</option>
        <option value="36" <?=$rs['ball_5']==36 ? 'selected' : ''?>>36</option>
        <option value="37" <?=$rs['ball_5']==37 ? 'selected' : ''?>>37</option>
        <option value="38" <?=$rs['ball_5']==38 ? 'selected' : ''?>>38</option>
        <option value="39" <?=$rs['ball_5']==39 ? 'selected' : ''?>>39</option>
        <option value="40" <?=$rs['ball_5']==40 ? 'selected' : ''?>>40</option>
        <option value="41" <?=$rs['ball_5']==41 ? 'selected' : ''?>>41</option>
        <option value="42" <?=$rs['ball_5']==42 ? 'selected' : ''?>>42</option>
        <option value="43" <?=$rs['ball_5']==43 ? 'selected' : ''?>>43</option>
        <option value="44" <?=$rs['ball_5']==44 ? 'selected' : ''?>>44</option>
        <option value="45" <?=$rs['ball_5']==45 ? 'selected' : ''?>>45</option>
        <option value="46" <?=$rs['ball_5']==46 ? 'selected' : ''?>>46</option>
        <option value="47" <?=$rs['ball_5']==47 ? 'selected' : ''?>>47</option>
        <option value="48" <?=$rs['ball_5']==48 ? 'selected' : ''?>>48</option>
        <option value="49" <?=$rs['ball_5']==49 ? 'selected' : ''?>>49</option>
        <option value="50" <?=$rs['ball_5']==50 ? 'selected' : ''?>>50</option>
        <option value="51" <?=$rs['ball_5']==51 ? 'selected' : ''?>>51</option>
        <option value="52" <?=$rs['ball_5']==52 ? 'selected' : ''?>>52</option>
        <option value="53" <?=$rs['ball_5']==53 ? 'selected' : ''?>>53</option>
        <option value="54" <?=$rs['ball_5']==54 ? 'selected' : ''?>>54</option>
        <option value="55" <?=$rs['ball_5']==55 ? 'selected' : ''?>>55</option>
        <option value="56" <?=$rs['ball_5']==56 ? 'selected' : ''?>>56</option>
        <option value="57" <?=$rs['ball_5']==57 ? 'selected' : ''?>>57</option>
        <option value="58" <?=$rs['ball_5']==58 ? 'selected' : ''?>>58</option>
        <option value="59" <?=$rs['ball_5']==59 ? 'selected' : ''?>>59</option>
        <option value="60" <?=$rs['ball_5']==60 ? 'selected' : ''?>>60</option>
        <option value="61" <?=$rs['ball_5']==61 ? 'selected' : ''?>>61</option>
        <option value="62" <?=$rs['ball_5']==62 ? 'selected' : ''?>>62</option>
        <option value="63" <?=$rs['ball_5']==63 ? 'selected' : ''?>>63</option>
        <option value="64" <?=$rs['ball_5']==64 ? 'selected' : ''?>>64</option>
        <option value="65" <?=$rs['ball_5']==65 ? 'selected' : ''?>>65</option>
        <option value="66" <?=$rs['ball_5']==66 ? 'selected' : ''?>>66</option>
        <option value="67" <?=$rs['ball_5']==67 ? 'selected' : ''?>>67</option>
        <option value="68" <?=$rs['ball_5']==68 ? 'selected' : ''?>>68</option>
        <option value="69" <?=$rs['ball_5']==69 ? 'selected' : ''?>>69</option>
        <option value="70" <?=$rs['ball_5']==70 ? 'selected' : ''?>>70</option>
        <option value="71" <?=$rs['ball_5']==71 ? 'selected' : ''?>>71</option>
        <option value="72" <?=$rs['ball_5']==72 ? 'selected' : ''?>>72</option>
        <option value="73" <?=$rs['ball_5']==73 ? 'selected' : ''?>>73</option>
        <option value="74" <?=$rs['ball_5']==74 ? 'selected' : ''?>>74</option>
        <option value="75" <?=$rs['ball_5']==75 ? 'selected' : ''?>>75</option>
        <option value="76" <?=$rs['ball_5']==76 ? 'selected' : ''?>>76</option>
        <option value="77" <?=$rs['ball_5']==77 ? 'selected' : ''?>>77</option>
        <option value="78" <?=$rs['ball_5']==78 ? 'selected' : ''?>>78</option>
        <option value="79" <?=$rs['ball_5']==79 ? 'selected' : ''?>>79</option>
        <option value="80" <?=$rs['ball_5']==80 ? 'selected' : ''?>>80</option>
        <option value="" <?=$rs['ball_5']=='' ? 'selected' : ''?>>第五球</option>
    </select>
    <select name="ball_6" id="ball_6">
        <option value="01" <?=$rs['ball_6']==1 ? 'selected' : ''?>>01</option>
        <option value="02" <?=$rs['ball_6']==2 ? 'selected' : ''?>>02</option>
        <option value="03" <?=$rs['ball_6']==3 ? 'selected' : ''?>>03</option>
        <option value="04" <?=$rs['ball_6']==4 ? 'selected' : ''?>>04</option>
        <option value="05" <?=$rs['ball_6']==5 ? 'selected' : ''?>>05</option>
        <option value="06" <?=$rs['ball_6']==6 ? 'selected' : ''?>>06</option>
        <option value="07" <?=$rs['ball_6']==7 ? 'selected' : ''?>>07</option>
        <option value="08" <?=$rs['ball_6']==8 ? 'selected' : ''?>>08</option>
        <option value="09" <?=$rs['ball_6']==9 ? 'selected' : ''?>>09</option>
        <option value="10" <?=$rs['ball_6']==10 ? 'selected' : ''?>>10</option>
        <option value="11" <?=$rs['ball_6']==11 ? 'selected' : ''?>>11</option>
        <option value="12" <?=$rs['ball_6']==12 ? 'selected' : ''?>>12</option>
        <option value="13" <?=$rs['ball_6']==13 ? 'selected' : ''?>>13</option>
        <option value="14" <?=$rs['ball_6']==14 ? 'selected' : ''?>>14</option>
        <option value="15" <?=$rs['ball_6']==15 ? 'selected' : ''?>>15</option>
        <option value="16" <?=$rs['ball_6']==16 ? 'selected' : ''?>>16</option>
        <option value="17" <?=$rs['ball_6']==17 ? 'selected' : ''?>>17</option>
        <option value="18" <?=$rs['ball_6']==18 ? 'selected' : ''?>>18</option>
        <option value="19" <?=$rs['ball_6']==19 ? 'selected' : ''?>>19</option>
        <option value="20" <?=$rs['ball_6']==20 ? 'selected' : ''?>>20</option>
        <option value="21" <?=$rs['ball_6']==21 ? 'selected' : ''?>>21</option>
        <option value="22" <?=$rs['ball_6']==22 ? 'selected' : ''?>>22</option>
        <option value="23" <?=$rs['ball_6']==23 ? 'selected' : ''?>>23</option>
        <option value="24" <?=$rs['ball_6']==24 ? 'selected' : ''?>>24</option>
        <option value="25" <?=$rs['ball_6']==25 ? 'selected' : ''?>>25</option>
        <option value="26" <?=$rs['ball_6']==26 ? 'selected' : ''?>>26</option>
        <option value="27" <?=$rs['ball_6']==27 ? 'selected' : ''?>>27</option>
        <option value="28" <?=$rs['ball_6']==28 ? 'selected' : ''?>>28</option>
        <option value="29" <?=$rs['ball_6']==29 ? 'selected' : ''?>>29</option>
        <option value="30" <?=$rs['ball_6']==30 ? 'selected' : ''?>>30</option>
        <option value="31" <?=$rs['ball_6']==31 ? 'selected' : ''?>>31</option>
        <option value="32" <?=$rs['ball_6']==32 ? 'selected' : ''?>>32</option>
        <option value="33" <?=$rs['ball_6']==33 ? 'selected' : ''?>>33</option>
        <option value="34" <?=$rs['ball_6']==34 ? 'selected' : ''?>>34</option>
        <option value="35" <?=$rs['ball_6']==35 ? 'selected' : ''?>>35</option>
        <option value="36" <?=$rs['ball_6']==36 ? 'selected' : ''?>>36</option>
        <option value="37" <?=$rs['ball_6']==37 ? 'selected' : ''?>>37</option>
        <option value="38" <?=$rs['ball_6']==38 ? 'selected' : ''?>>38</option>
        <option value="39" <?=$rs['ball_6']==39 ? 'selected' : ''?>>39</option>
        <option value="40" <?=$rs['ball_6']==40 ? 'selected' : ''?>>40</option>
        <option value="41" <?=$rs['ball_6']==41 ? 'selected' : ''?>>41</option>
        <option value="42" <?=$rs['ball_6']==42 ? 'selected' : ''?>>42</option>
        <option value="43" <?=$rs['ball_6']==43 ? 'selected' : ''?>>43</option>
        <option value="44" <?=$rs['ball_6']==44 ? 'selected' : ''?>>44</option>
        <option value="45" <?=$rs['ball_6']==45 ? 'selected' : ''?>>45</option>
        <option value="46" <?=$rs['ball_6']==46 ? 'selected' : ''?>>46</option>
        <option value="47" <?=$rs['ball_6']==47 ? 'selected' : ''?>>47</option>
        <option value="48" <?=$rs['ball_6']==48 ? 'selected' : ''?>>48</option>
        <option value="49" <?=$rs['ball_6']==49 ? 'selected' : ''?>>49</option>
        <option value="50" <?=$rs['ball_6']==50 ? 'selected' : ''?>>50</option>
        <option value="51" <?=$rs['ball_6']==51 ? 'selected' : ''?>>51</option>
        <option value="52" <?=$rs['ball_6']==52 ? 'selected' : ''?>>52</option>
        <option value="53" <?=$rs['ball_6']==53 ? 'selected' : ''?>>53</option>
        <option value="54" <?=$rs['ball_6']==54 ? 'selected' : ''?>>54</option>
        <option value="55" <?=$rs['ball_6']==55 ? 'selected' : ''?>>55</option>
        <option value="56" <?=$rs['ball_6']==56 ? 'selected' : ''?>>56</option>
        <option value="57" <?=$rs['ball_6']==57 ? 'selected' : ''?>>57</option>
        <option value="58" <?=$rs['ball_6']==58 ? 'selected' : ''?>>58</option>
        <option value="59" <?=$rs['ball_6']==59 ? 'selected' : ''?>>59</option>
        <option value="60" <?=$rs['ball_6']==60 ? 'selected' : ''?>>60</option>
        <option value="61" <?=$rs['ball_6']==61 ? 'selected' : ''?>>61</option>
        <option value="62" <?=$rs['ball_6']==62 ? 'selected' : ''?>>62</option>
        <option value="63" <?=$rs['ball_6']==63 ? 'selected' : ''?>>63</option>
        <option value="64" <?=$rs['ball_6']==64 ? 'selected' : ''?>>64</option>
        <option value="65" <?=$rs['ball_6']==65 ? 'selected' : ''?>>65</option>
        <option value="66" <?=$rs['ball_6']==66 ? 'selected' : ''?>>66</option>
        <option value="67" <?=$rs['ball_6']==67 ? 'selected' : ''?>>67</option>
        <option value="68" <?=$rs['ball_6']==68 ? 'selected' : ''?>>68</option>
        <option value="69" <?=$rs['ball_6']==69 ? 'selected' : ''?>>69</option>
        <option value="70" <?=$rs['ball_6']==70 ? 'selected' : ''?>>70</option>
        <option value="71" <?=$rs['ball_6']==71 ? 'selected' : ''?>>71</option>
        <option value="72" <?=$rs['ball_6']==72 ? 'selected' : ''?>>72</option>
        <option value="73" <?=$rs['ball_6']==73 ? 'selected' : ''?>>73</option>
        <option value="74" <?=$rs['ball_6']==74 ? 'selected' : ''?>>74</option>
        <option value="75" <?=$rs['ball_6']==75 ? 'selected' : ''?>>75</option>
        <option value="76" <?=$rs['ball_6']==76 ? 'selected' : ''?>>76</option>
        <option value="77" <?=$rs['ball_6']==77 ? 'selected' : ''?>>77</option>
        <option value="78" <?=$rs['ball_6']==78 ? 'selected' : ''?>>78</option>
        <option value="79" <?=$rs['ball_6']==79 ? 'selected' : ''?>>79</option>
        <option value="80" <?=$rs['ball_6']==80 ? 'selected' : ''?>>80</option>
        <option value="" <?=$rs['ball_6']=='' ? 'selected' : ''?>>第六球</option>
    </select>
    <select name="ball_7" id="ball_7">
        <option value="01" <?=$rs['ball_7']==1 ? 'selected' : ''?>>01</option>
        <option value="02" <?=$rs['ball_7']==2 ? 'selected' : ''?>>02</option>
        <option value="03" <?=$rs['ball_7']==3 ? 'selected' : ''?>>03</option>
        <option value="04" <?=$rs['ball_7']==4 ? 'selected' : ''?>>04</option>
        <option value="05" <?=$rs['ball_7']==5 ? 'selected' : ''?>>05</option>
        <option value="06" <?=$rs['ball_7']==6 ? 'selected' : ''?>>06</option>
        <option value="07" <?=$rs['ball_7']==7 ? 'selected' : ''?>>07</option>
        <option value="08" <?=$rs['ball_7']==8 ? 'selected' : ''?>>08</option>
        <option value="09" <?=$rs['ball_7']==9 ? 'selected' : ''?>>09</option>
        <option value="10" <?=$rs['ball_7']==10 ? 'selected' : ''?>>10</option>
        <option value="11" <?=$rs['ball_7']==11 ? 'selected' : ''?>>11</option>
        <option value="12" <?=$rs['ball_7']==12 ? 'selected' : ''?>>12</option>
        <option value="13" <?=$rs['ball_7']==13 ? 'selected' : ''?>>13</option>
        <option value="14" <?=$rs['ball_7']==14 ? 'selected' : ''?>>14</option>
        <option value="15" <?=$rs['ball_7']==15 ? 'selected' : ''?>>15</option>
        <option value="16" <?=$rs['ball_7']==16 ? 'selected' : ''?>>16</option>
        <option value="17" <?=$rs['ball_7']==17 ? 'selected' : ''?>>17</option>
        <option value="18" <?=$rs['ball_7']==18 ? 'selected' : ''?>>18</option>
        <option value="19" <?=$rs['ball_7']==19 ? 'selected' : ''?>>19</option>
        <option value="20" <?=$rs['ball_7']==20 ? 'selected' : ''?>>20</option>
        <option value="21" <?=$rs['ball_7']==21 ? 'selected' : ''?>>21</option>
        <option value="22" <?=$rs['ball_7']==22 ? 'selected' : ''?>>22</option>
        <option value="23" <?=$rs['ball_7']==23 ? 'selected' : ''?>>23</option>
        <option value="24" <?=$rs['ball_7']==24 ? 'selected' : ''?>>24</option>
        <option value="25" <?=$rs['ball_7']==25 ? 'selected' : ''?>>25</option>
        <option value="26" <?=$rs['ball_7']==26 ? 'selected' : ''?>>26</option>
        <option value="27" <?=$rs['ball_7']==27 ? 'selected' : ''?>>27</option>
        <option value="28" <?=$rs['ball_7']==28 ? 'selected' : ''?>>28</option>
        <option value="29" <?=$rs['ball_7']==29 ? 'selected' : ''?>>29</option>
        <option value="30" <?=$rs['ball_7']==30 ? 'selected' : ''?>>30</option>
        <option value="31" <?=$rs['ball_7']==31 ? 'selected' : ''?>>31</option>
        <option value="32" <?=$rs['ball_7']==32 ? 'selected' : ''?>>32</option>
        <option value="33" <?=$rs['ball_7']==33 ? 'selected' : ''?>>33</option>
        <option value="34" <?=$rs['ball_7']==34 ? 'selected' : ''?>>34</option>
        <option value="35" <?=$rs['ball_7']==35 ? 'selected' : ''?>>35</option>
        <option value="36" <?=$rs['ball_7']==36 ? 'selected' : ''?>>36</option>
        <option value="37" <?=$rs['ball_7']==37 ? 'selected' : ''?>>37</option>
        <option value="38" <?=$rs['ball_7']==38 ? 'selected' : ''?>>38</option>
        <option value="39" <?=$rs['ball_7']==39 ? 'selected' : ''?>>39</option>
        <option value="40" <?=$rs['ball_7']==40 ? 'selected' : ''?>>40</option>
        <option value="41" <?=$rs['ball_7']==41 ? 'selected' : ''?>>41</option>
        <option value="42" <?=$rs['ball_7']==42 ? 'selected' : ''?>>42</option>
        <option value="43" <?=$rs['ball_7']==43 ? 'selected' : ''?>>43</option>
        <option value="44" <?=$rs['ball_7']==44 ? 'selected' : ''?>>44</option>
        <option value="45" <?=$rs['ball_7']==45 ? 'selected' : ''?>>45</option>
        <option value="46" <?=$rs['ball_7']==46 ? 'selected' : ''?>>46</option>
        <option value="47" <?=$rs['ball_7']==47 ? 'selected' : ''?>>47</option>
        <option value="48" <?=$rs['ball_7']==48 ? 'selected' : ''?>>48</option>
        <option value="49" <?=$rs['ball_7']==49 ? 'selected' : ''?>>49</option>
        <option value="50" <?=$rs['ball_7']==50 ? 'selected' : ''?>>50</option>
        <option value="51" <?=$rs['ball_7']==51 ? 'selected' : ''?>>51</option>
        <option value="52" <?=$rs['ball_7']==52 ? 'selected' : ''?>>52</option>
        <option value="53" <?=$rs['ball_7']==53 ? 'selected' : ''?>>53</option>
        <option value="54" <?=$rs['ball_7']==54 ? 'selected' : ''?>>54</option>
        <option value="55" <?=$rs['ball_7']==55 ? 'selected' : ''?>>55</option>
        <option value="56" <?=$rs['ball_7']==56 ? 'selected' : ''?>>56</option>
        <option value="57" <?=$rs['ball_7']==57 ? 'selected' : ''?>>57</option>
        <option value="58" <?=$rs['ball_7']==58 ? 'selected' : ''?>>58</option>
        <option value="59" <?=$rs['ball_7']==59 ? 'selected' : ''?>>59</option>
        <option value="60" <?=$rs['ball_7']==60 ? 'selected' : ''?>>60</option>
        <option value="61" <?=$rs['ball_7']==61 ? 'selected' : ''?>>61</option>
        <option value="62" <?=$rs['ball_7']==62 ? 'selected' : ''?>>62</option>
        <option value="63" <?=$rs['ball_7']==63 ? 'selected' : ''?>>63</option>
        <option value="64" <?=$rs['ball_7']==64 ? 'selected' : ''?>>64</option>
        <option value="65" <?=$rs['ball_7']==65 ? 'selected' : ''?>>65</option>
        <option value="66" <?=$rs['ball_7']==66 ? 'selected' : ''?>>66</option>
        <option value="67" <?=$rs['ball_7']==67 ? 'selected' : ''?>>67</option>
        <option value="68" <?=$rs['ball_7']==68 ? 'selected' : ''?>>68</option>
        <option value="69" <?=$rs['ball_7']==69 ? 'selected' : ''?>>69</option>
        <option value="70" <?=$rs['ball_7']==70 ? 'selected' : ''?>>70</option>
        <option value="71" <?=$rs['ball_7']==71 ? 'selected' : ''?>>71</option>
        <option value="72" <?=$rs['ball_7']==72 ? 'selected' : ''?>>72</option>
        <option value="73" <?=$rs['ball_7']==73 ? 'selected' : ''?>>73</option>
        <option value="74" <?=$rs['ball_7']==74 ? 'selected' : ''?>>74</option>
        <option value="75" <?=$rs['ball_7']==75 ? 'selected' : ''?>>75</option>
        <option value="76" <?=$rs['ball_7']==76 ? 'selected' : ''?>>76</option>
        <option value="77" <?=$rs['ball_7']==77 ? 'selected' : ''?>>77</option>
        <option value="78" <?=$rs['ball_7']==78 ? 'selected' : ''?>>78</option>
        <option value="79" <?=$rs['ball_7']==79 ? 'selected' : ''?>>79</option>
        <option value="80" <?=$rs['ball_7']==80 ? 'selected' : ''?>>80</option>
        <option value="" <?=$rs['ball_7']=='' ? 'selected' : ''?>>第七球</option>
    </select>
    <select name="ball_8" id="ball_8">
        <option value="01" <?=$rs['ball_8']==1 ? 'selected' : ''?>>01</option>
        <option value="02" <?=$rs['ball_8']==2 ? 'selected' : ''?>>02</option>
        <option value="03" <?=$rs['ball_8']==3 ? 'selected' : ''?>>03</option>
        <option value="04" <?=$rs['ball_8']==4 ? 'selected' : ''?>>04</option>
        <option value="05" <?=$rs['ball_8']==5 ? 'selected' : ''?>>05</option>
        <option value="06" <?=$rs['ball_8']==6 ? 'selected' : ''?>>06</option>
        <option value="07" <?=$rs['ball_8']==7 ? 'selected' : ''?>>07</option>
        <option value="08" <?=$rs['ball_8']==8 ? 'selected' : ''?>>08</option>
        <option value="09" <?=$rs['ball_8']==9 ? 'selected' : ''?>>09</option>
        <option value="10" <?=$rs['ball_8']==10 ? 'selected' : ''?>>10</option>
        <option value="11" <?=$rs['ball_8']==11 ? 'selected' : ''?>>11</option>
        <option value="12" <?=$rs['ball_8']==12 ? 'selected' : ''?>>12</option>
        <option value="13" <?=$rs['ball_8']==13 ? 'selected' : ''?>>13</option>
        <option value="14" <?=$rs['ball_8']==14 ? 'selected' : ''?>>14</option>
        <option value="15" <?=$rs['ball_8']==15 ? 'selected' : ''?>>15</option>
        <option value="16" <?=$rs['ball_8']==16 ? 'selected' : ''?>>16</option>
        <option value="17" <?=$rs['ball_8']==17 ? 'selected' : ''?>>17</option>
        <option value="18" <?=$rs['ball_8']==18 ? 'selected' : ''?>>18</option>
        <option value="19" <?=$rs['ball_8']==19 ? 'selected' : ''?>>19</option>
        <option value="20" <?=$rs['ball_8']==20 ? 'selected' : ''?>>20</option>
        <option value="21" <?=$rs['ball_8']==21 ? 'selected' : ''?>>21</option>
        <option value="22" <?=$rs['ball_8']==22 ? 'selected' : ''?>>22</option>
        <option value="23" <?=$rs['ball_8']==23 ? 'selected' : ''?>>23</option>
        <option value="24" <?=$rs['ball_8']==24 ? 'selected' : ''?>>24</option>
        <option value="25" <?=$rs['ball_8']==25 ? 'selected' : ''?>>25</option>
        <option value="26" <?=$rs['ball_8']==26 ? 'selected' : ''?>>26</option>
        <option value="27" <?=$rs['ball_8']==27 ? 'selected' : ''?>>27</option>
        <option value="28" <?=$rs['ball_8']==28 ? 'selected' : ''?>>28</option>
        <option value="29" <?=$rs['ball_8']==29 ? 'selected' : ''?>>29</option>
        <option value="30" <?=$rs['ball_8']==30 ? 'selected' : ''?>>30</option>
        <option value="31" <?=$rs['ball_8']==31 ? 'selected' : ''?>>31</option>
        <option value="32" <?=$rs['ball_8']==32 ? 'selected' : ''?>>32</option>
        <option value="33" <?=$rs['ball_8']==33 ? 'selected' : ''?>>33</option>
        <option value="34" <?=$rs['ball_8']==34 ? 'selected' : ''?>>34</option>
        <option value="35" <?=$rs['ball_8']==35 ? 'selected' : ''?>>35</option>
        <option value="36" <?=$rs['ball_8']==36 ? 'selected' : ''?>>36</option>
        <option value="37" <?=$rs['ball_8']==37 ? 'selected' : ''?>>37</option>
        <option value="38" <?=$rs['ball_8']==38 ? 'selected' : ''?>>38</option>
        <option value="39" <?=$rs['ball_8']==39 ? 'selected' : ''?>>39</option>
        <option value="40" <?=$rs['ball_8']==40 ? 'selected' : ''?>>40</option>
        <option value="41" <?=$rs['ball_8']==41 ? 'selected' : ''?>>41</option>
        <option value="42" <?=$rs['ball_8']==42 ? 'selected' : ''?>>42</option>
        <option value="43" <?=$rs['ball_8']==43 ? 'selected' : ''?>>43</option>
        <option value="44" <?=$rs['ball_8']==44 ? 'selected' : ''?>>44</option>
        <option value="45" <?=$rs['ball_8']==45 ? 'selected' : ''?>>45</option>
        <option value="46" <?=$rs['ball_8']==46 ? 'selected' : ''?>>46</option>
        <option value="47" <?=$rs['ball_8']==47 ? 'selected' : ''?>>47</option>
        <option value="48" <?=$rs['ball_8']==48 ? 'selected' : ''?>>48</option>
        <option value="49" <?=$rs['ball_8']==49 ? 'selected' : ''?>>49</option>
        <option value="50" <?=$rs['ball_8']==50 ? 'selected' : ''?>>50</option>
        <option value="51" <?=$rs['ball_8']==51 ? 'selected' : ''?>>51</option>
        <option value="52" <?=$rs['ball_8']==52 ? 'selected' : ''?>>52</option>
        <option value="53" <?=$rs['ball_8']==53 ? 'selected' : ''?>>53</option>
        <option value="54" <?=$rs['ball_8']==54 ? 'selected' : ''?>>54</option>
        <option value="55" <?=$rs['ball_8']==55 ? 'selected' : ''?>>55</option>
        <option value="56" <?=$rs['ball_8']==56 ? 'selected' : ''?>>56</option>
        <option value="57" <?=$rs['ball_8']==57 ? 'selected' : ''?>>57</option>
        <option value="58" <?=$rs['ball_8']==58 ? 'selected' : ''?>>58</option>
        <option value="59" <?=$rs['ball_8']==59 ? 'selected' : ''?>>59</option>
        <option value="60" <?=$rs['ball_8']==60 ? 'selected' : ''?>>60</option>
        <option value="61" <?=$rs['ball_8']==61 ? 'selected' : ''?>>61</option>
        <option value="62" <?=$rs['ball_8']==62 ? 'selected' : ''?>>62</option>
        <option value="63" <?=$rs['ball_8']==63 ? 'selected' : ''?>>63</option>
        <option value="64" <?=$rs['ball_8']==64 ? 'selected' : ''?>>64</option>
        <option value="65" <?=$rs['ball_8']==65 ? 'selected' : ''?>>65</option>
        <option value="66" <?=$rs['ball_8']==66 ? 'selected' : ''?>>66</option>
        <option value="67" <?=$rs['ball_8']==67 ? 'selected' : ''?>>67</option>
        <option value="68" <?=$rs['ball_8']==68 ? 'selected' : ''?>>68</option>
        <option value="69" <?=$rs['ball_8']==69 ? 'selected' : ''?>>69</option>
        <option value="70" <?=$rs['ball_8']==70 ? 'selected' : ''?>>70</option>
        <option value="71" <?=$rs['ball_8']==71 ? 'selected' : ''?>>71</option>
        <option value="72" <?=$rs['ball_8']==72 ? 'selected' : ''?>>72</option>
        <option value="73" <?=$rs['ball_8']==73 ? 'selected' : ''?>>73</option>
        <option value="74" <?=$rs['ball_8']==74 ? 'selected' : ''?>>74</option>
        <option value="75" <?=$rs['ball_8']==75 ? 'selected' : ''?>>75</option>
        <option value="76" <?=$rs['ball_8']==76 ? 'selected' : ''?>>76</option>
        <option value="77" <?=$rs['ball_8']==77 ? 'selected' : ''?>>77</option>
        <option value="78" <?=$rs['ball_8']==78 ? 'selected' : ''?>>78</option>
        <option value="79" <?=$rs['ball_8']==79 ? 'selected' : ''?>>79</option>
        <option value="80" <?=$rs['ball_8']==80 ? 'selected' : ''?>>80</option>
        <option value="" <?=$rs['ball_8']=='' ? 'selected' : ''?>>第八球</option>
    </select>
    <select name="ball_9" id="ball_9">
        <option value="01" <?=$rs['ball_9']==01 ? 'selected' : ''?>>01</option>
        <option value="02" <?=$rs['ball_9']==02 ? 'selected' : ''?>>02</option>
        <option value="03" <?=$rs['ball_9']==03 ? 'selected' : ''?>>03</option>
        <option value="04" <?=$rs['ball_9']==04 ? 'selected' : ''?>>04</option>
        <option value="05" <?=$rs['ball_9']==05 ? 'selected' : ''?>>05</option>
        <option value="06" <?=$rs['ball_9']==06 ? 'selected' : ''?>>06</option>
        <option value="07" <?=$rs['ball_9']==07 ? 'selected' : ''?>>07</option>
        <option value="08" <?=$rs['ball_9']==8 ? 'selected' : ''?>>08</option>
        <option value="09" <?=$rs['ball_9']==9 ? 'selected' : ''?>>09</option>
        <option value="10" <?=$rs['ball_9']==10 ? 'selected' : ''?>>10</option>
        <option value="11" <?=$rs['ball_9']==11 ? 'selected' : ''?>>11</option>
        <option value="12" <?=$rs['ball_9']==12 ? 'selected' : ''?>>12</option>
        <option value="13" <?=$rs['ball_9']==13 ? 'selected' : ''?>>13</option>
        <option value="14" <?=$rs['ball_9']==14 ? 'selected' : ''?>>14</option>
        <option value="15" <?=$rs['ball_9']==15 ? 'selected' : ''?>>15</option>
        <option value="16" <?=$rs['ball_9']==16 ? 'selected' : ''?>>16</option>
        <option value="17" <?=$rs['ball_9']==17 ? 'selected' : ''?>>17</option>
        <option value="18" <?=$rs['ball_9']==18 ? 'selected' : ''?>>18</option>
        <option value="19" <?=$rs['ball_9']==19 ? 'selected' : ''?>>19</option>
        <option value="20" <?=$rs['ball_9']==20 ? 'selected' : ''?>>20</option>
        <option value="21" <?=$rs['ball_9']==21 ? 'selected' : ''?>>21</option>
        <option value="22" <?=$rs['ball_9']==22 ? 'selected' : ''?>>22</option>
        <option value="23" <?=$rs['ball_9']==23 ? 'selected' : ''?>>23</option>
        <option value="24" <?=$rs['ball_9']==24 ? 'selected' : ''?>>24</option>
        <option value="25" <?=$rs['ball_9']==25 ? 'selected' : ''?>>25</option>
        <option value="26" <?=$rs['ball_9']==26 ? 'selected' : ''?>>26</option>
        <option value="27" <?=$rs['ball_9']==27 ? 'selected' : ''?>>27</option>
        <option value="28" <?=$rs['ball_9']==28 ? 'selected' : ''?>>28</option>
        <option value="29" <?=$rs['ball_9']==29 ? 'selected' : ''?>>29</option>
        <option value="30" <?=$rs['ball_9']==30 ? 'selected' : ''?>>30</option>
        <option value="31" <?=$rs['ball_9']==31 ? 'selected' : ''?>>31</option>
        <option value="32" <?=$rs['ball_9']==32 ? 'selected' : ''?>>32</option>
        <option value="33" <?=$rs['ball_9']==33 ? 'selected' : ''?>>33</option>
        <option value="34" <?=$rs['ball_9']==34 ? 'selected' : ''?>>34</option>
        <option value="35" <?=$rs['ball_9']==35 ? 'selected' : ''?>>35</option>
        <option value="36" <?=$rs['ball_9']==36 ? 'selected' : ''?>>36</option>
        <option value="37" <?=$rs['ball_9']==37 ? 'selected' : ''?>>37</option>
        <option value="38" <?=$rs['ball_9']==38 ? 'selected' : ''?>>38</option>
        <option value="39" <?=$rs['ball_9']==39 ? 'selected' : ''?>>39</option>
        <option value="40" <?=$rs['ball_9']==40 ? 'selected' : ''?>>40</option>
        <option value="41" <?=$rs['ball_9']==41 ? 'selected' : ''?>>41</option>
        <option value="42" <?=$rs['ball_9']==42 ? 'selected' : ''?>>42</option>
        <option value="43" <?=$rs['ball_9']==43 ? 'selected' : ''?>>43</option>
        <option value="44" <?=$rs['ball_9']==44 ? 'selected' : ''?>>44</option>
        <option value="45" <?=$rs['ball_9']==45 ? 'selected' : ''?>>45</option>
        <option value="46" <?=$rs['ball_9']==46 ? 'selected' : ''?>>46</option>
        <option value="47" <?=$rs['ball_9']==47 ? 'selected' : ''?>>47</option>
        <option value="48" <?=$rs['ball_9']==48 ? 'selected' : ''?>>48</option>
        <option value="49" <?=$rs['ball_9']==49 ? 'selected' : ''?>>49</option>
        <option value="50" <?=$rs['ball_9']==50 ? 'selected' : ''?>>50</option>
        <option value="51" <?=$rs['ball_9']==51 ? 'selected' : ''?>>51</option>
        <option value="52" <?=$rs['ball_9']==52 ? 'selected' : ''?>>52</option>
        <option value="53" <?=$rs['ball_9']==53 ? 'selected' : ''?>>53</option>
        <option value="54" <?=$rs['ball_9']==54 ? 'selected' : ''?>>54</option>
        <option value="55" <?=$rs['ball_9']==55 ? 'selected' : ''?>>55</option>
        <option value="56" <?=$rs['ball_9']==56 ? 'selected' : ''?>>56</option>
        <option value="57" <?=$rs['ball_9']==57 ? 'selected' : ''?>>57</option>
        <option value="58" <?=$rs['ball_9']==58 ? 'selected' : ''?>>58</option>
        <option value="59" <?=$rs['ball_9']==59 ? 'selected' : ''?>>59</option>
        <option value="60" <?=$rs['ball_9']==60 ? 'selected' : ''?>>60</option>
        <option value="61" <?=$rs['ball_9']==61 ? 'selected' : ''?>>61</option>
        <option value="62" <?=$rs['ball_9']==62 ? 'selected' : ''?>>62</option>
        <option value="63" <?=$rs['ball_9']==63 ? 'selected' : ''?>>63</option>
        <option value="64" <?=$rs['ball_9']==64 ? 'selected' : ''?>>64</option>
        <option value="65" <?=$rs['ball_9']==65 ? 'selected' : ''?>>65</option>
        <option value="66" <?=$rs['ball_9']==66 ? 'selected' : ''?>>66</option>
        <option value="67" <?=$rs['ball_9']==67 ? 'selected' : ''?>>67</option>
        <option value="68" <?=$rs['ball_9']==68 ? 'selected' : ''?>>68</option>
        <option value="69" <?=$rs['ball_9']==69 ? 'selected' : ''?>>69</option>
        <option value="70" <?=$rs['ball_9']==70 ? 'selected' : ''?>>70</option>
        <option value="71" <?=$rs['ball_9']==71 ? 'selected' : ''?>>71</option>
        <option value="72" <?=$rs['ball_9']==72 ? 'selected' : ''?>>72</option>
        <option value="73" <?=$rs['ball_9']==73 ? 'selected' : ''?>>73</option>
        <option value="74" <?=$rs['ball_9']==74 ? 'selected' : ''?>>74</option>
        <option value="75" <?=$rs['ball_9']==75 ? 'selected' : ''?>>75</option>
        <option value="76" <?=$rs['ball_9']==76 ? 'selected' : ''?>>76</option>
        <option value="77" <?=$rs['ball_9']==77 ? 'selected' : ''?>>77</option>
        <option value="78" <?=$rs['ball_9']==78 ? 'selected' : ''?>>78</option>
        <option value="79" <?=$rs['ball_9']==79 ? 'selected' : ''?>>79</option>
        <option value="80" <?=$rs['ball_9']==80 ? 'selected' : ''?>>80</option>
        <option value="" <?=$rs['ball_9']=='' ? 'selected' : ''?>>第九球</option>
    </select>
    <select name="ball_10" id="ball_10">
        <option value="01" <?=$rs['ball_10']==01 ? 'selected' : ''?>>01</option>
        <option value="02" <?=$rs['ball_10']==02 ? 'selected' : ''?>>02</option>
        <option value="03" <?=$rs['ball_10']==03 ? 'selected' : ''?>>03</option>
        <option value="04" <?=$rs['ball_10']==04 ? 'selected' : ''?>>04</option>
        <option value="05" <?=$rs['ball_10']==05 ? 'selected' : ''?>>05</option>
        <option value="06" <?=$rs['ball_10']==06 ? 'selected' : ''?>>06</option>
        <option value="07" <?=$rs['ball_10']==07 ? 'selected' : ''?>>07</option>
        <option value="08" <?=$rs['ball_10']==8 ? 'selected' : ''?>>08</option>
        <option value="09" <?=$rs['ball_10']==9 ? 'selected' : ''?>>09</option>
        <option value="10" <?=$rs['ball_10']==10 ? 'selected' : ''?>>10</option>
        <option value="11" <?=$rs['ball_10']==11 ? 'selected' : ''?>>11</option>
        <option value="12" <?=$rs['ball_10']==12 ? 'selected' : ''?>>12</option>
        <option value="13" <?=$rs['ball_10']==13 ? 'selected' : ''?>>13</option>
        <option value="14" <?=$rs['ball_10']==14 ? 'selected' : ''?>>14</option>
        <option value="15" <?=$rs['ball_10']==15 ? 'selected' : ''?>>15</option>
        <option value="16" <?=$rs['ball_10']==16 ? 'selected' : ''?>>16</option>
        <option value="17" <?=$rs['ball_10']==17 ? 'selected' : ''?>>17</option>
        <option value="18" <?=$rs['ball_10']==18 ? 'selected' : ''?>>18</option>
        <option value="19" <?=$rs['ball_10']==19 ? 'selected' : ''?>>19</option>
        <option value="20" <?=$rs['ball_10']==20 ? 'selected' : ''?>>20</option>
        <option value="21" <?=$rs['ball_10']==21 ? 'selected' : ''?>>21</option>
        <option value="22" <?=$rs['ball_10']==22 ? 'selected' : ''?>>22</option>
        <option value="23" <?=$rs['ball_10']==23 ? 'selected' : ''?>>23</option>
        <option value="24" <?=$rs['ball_10']==24 ? 'selected' : ''?>>24</option>
        <option value="25" <?=$rs['ball_10']==25 ? 'selected' : ''?>>25</option>
        <option value="26" <?=$rs['ball_10']==26 ? 'selected' : ''?>>26</option>
        <option value="27" <?=$rs['ball_10']==27 ? 'selected' : ''?>>27</option>
        <option value="28" <?=$rs['ball_10']==28 ? 'selected' : ''?>>28</option>
        <option value="29" <?=$rs['ball_10']==29 ? 'selected' : ''?>>29</option>
        <option value="30" <?=$rs['ball_10']==30 ? 'selected' : ''?>>30</option>
        <option value="31" <?=$rs['ball_10']==31 ? 'selected' : ''?>>31</option>
        <option value="32" <?=$rs['ball_10']==32 ? 'selected' : ''?>>32</option>
        <option value="33" <?=$rs['ball_10']==33 ? 'selected' : ''?>>33</option>
        <option value="34" <?=$rs['ball_10']==34 ? 'selected' : ''?>>34</option>
        <option value="35" <?=$rs['ball_10']==35 ? 'selected' : ''?>>35</option>
        <option value="36" <?=$rs['ball_10']==36 ? 'selected' : ''?>>36</option>
        <option value="37" <?=$rs['ball_10']==37 ? 'selected' : ''?>>37</option>
        <option value="38" <?=$rs['ball_10']==38 ? 'selected' : ''?>>38</option>
        <option value="39" <?=$rs['ball_10']==39 ? 'selected' : ''?>>39</option>
        <option value="40" <?=$rs['ball_10']==40 ? 'selected' : ''?>>40</option>
        <option value="41" <?=$rs['ball_10']==41 ? 'selected' : ''?>>41</option>
        <option value="42" <?=$rs['ball_10']==42 ? 'selected' : ''?>>42</option>
        <option value="43" <?=$rs['ball_10']==43 ? 'selected' : ''?>>43</option>
        <option value="44" <?=$rs['ball_10']==44 ? 'selected' : ''?>>44</option>
        <option value="45" <?=$rs['ball_10']==45 ? 'selected' : ''?>>45</option>
        <option value="46" <?=$rs['ball_10']==46 ? 'selected' : ''?>>46</option>
        <option value="47" <?=$rs['ball_10']==47 ? 'selected' : ''?>>47</option>
        <option value="48" <?=$rs['ball_10']==48 ? 'selected' : ''?>>48</option>
        <option value="49" <?=$rs['ball_10']==49 ? 'selected' : ''?>>49</option>
        <option value="50" <?=$rs['ball_10']==50 ? 'selected' : ''?>>50</option>
        <option value="51" <?=$rs['ball_10']==51 ? 'selected' : ''?>>51</option>
        <option value="52" <?=$rs['ball_10']==52 ? 'selected' : ''?>>52</option>
        <option value="53" <?=$rs['ball_10']==53 ? 'selected' : ''?>>53</option>
        <option value="54" <?=$rs['ball_10']==54 ? 'selected' : ''?>>54</option>
        <option value="55" <?=$rs['ball_10']==55 ? 'selected' : ''?>>55</option>
        <option value="56" <?=$rs['ball_10']==56 ? 'selected' : ''?>>56</option>
        <option value="57" <?=$rs['ball_10']==57 ? 'selected' : ''?>>57</option>
        <option value="58" <?=$rs['ball_10']==58 ? 'selected' : ''?>>58</option>
        <option value="59" <?=$rs['ball_10']==59 ? 'selected' : ''?>>59</option>
        <option value="60" <?=$rs['ball_10']==60 ? 'selected' : ''?>>60</option>
        <option value="61" <?=$rs['ball_10']==61 ? 'selected' : ''?>>61</option>
        <option value="62" <?=$rs['ball_10']==62 ? 'selected' : ''?>>62</option>
        <option value="63" <?=$rs['ball_10']==63 ? 'selected' : ''?>>63</option>
        <option value="64" <?=$rs['ball_10']==64 ? 'selected' : ''?>>64</option>
        <option value="65" <?=$rs['ball_10']==65 ? 'selected' : ''?>>65</option>
        <option value="66" <?=$rs['ball_10']==66 ? 'selected' : ''?>>66</option>
        <option value="67" <?=$rs['ball_10']==67 ? 'selected' : ''?>>67</option>
        <option value="68" <?=$rs['ball_10']==68 ? 'selected' : ''?>>68</option>
        <option value="69" <?=$rs['ball_10']==69 ? 'selected' : ''?>>69</option>
        <option value="70" <?=$rs['ball_10']==70 ? 'selected' : ''?>>70</option>
        <option value="71" <?=$rs['ball_10']==71 ? 'selected' : ''?>>71</option>
        <option value="72" <?=$rs['ball_10']==72 ? 'selected' : ''?>>72</option>
        <option value="73" <?=$rs['ball_10']==73 ? 'selected' : ''?>>73</option>
        <option value="74" <?=$rs['ball_10']==74 ? 'selected' : ''?>>74</option>
        <option value="75" <?=$rs['ball_10']==75 ? 'selected' : ''?>>75</option>
        <option value="76" <?=$rs['ball_10']==76 ? 'selected' : ''?>>76</option>
        <option value="77" <?=$rs['ball_10']==77 ? 'selected' : ''?>>77</option>
        <option value="78" <?=$rs['ball_10']==78 ? 'selected' : ''?>>78</option>
        <option value="79" <?=$rs['ball_10']==79 ? 'selected' : ''?>>79</option>
        <option value="80" <?=$rs['ball_10']==80 ? 'selected' : ''?>>80</option>
        <option value="" <?=$rs['ball_10']=='' ? 'selected' : ''?>>第十球</option>
    </select>
    <select name="ball_11" id="ball_11">
        <option value="01" <?=$rs['ball_11']==01 ? 'selected' : ''?>>01</option>
        <option value="02" <?=$rs['ball_11']==02 ? 'selected' : ''?>>02</option>
        <option value="03" <?=$rs['ball_11']==03 ? 'selected' : ''?>>03</option>
        <option value="04" <?=$rs['ball_11']==04 ? 'selected' : ''?>>04</option>
        <option value="05" <?=$rs['ball_11']==05 ? 'selected' : ''?>>05</option>
        <option value="06" <?=$rs['ball_11']==06 ? 'selected' : ''?>>06</option>
        <option value="07" <?=$rs['ball_11']==07 ? 'selected' : ''?>>07</option>
        <option value="08" <?=$rs['ball_11']==8 ? 'selected' : ''?>>08</option>
        <option value="09" <?=$rs['ball_11']==9 ? 'selected' : ''?>>09</option>
        <option value="10" <?=$rs['ball_11']==10 ? 'selected' : ''?>>10</option>
        <option value="11" <?=$rs['ball_11']==11 ? 'selected' : ''?>>11</option>
        <option value="12" <?=$rs['ball_11']==12 ? 'selected' : ''?>>12</option>
        <option value="13" <?=$rs['ball_11']==13 ? 'selected' : ''?>>13</option>
        <option value="14" <?=$rs['ball_11']==14 ? 'selected' : ''?>>14</option>
        <option value="15" <?=$rs['ball_11']==15 ? 'selected' : ''?>>15</option>
        <option value="16" <?=$rs['ball_11']==16 ? 'selected' : ''?>>16</option>
        <option value="17" <?=$rs['ball_11']==17 ? 'selected' : ''?>>17</option>
        <option value="18" <?=$rs['ball_11']==18 ? 'selected' : ''?>>18</option>
        <option value="19" <?=$rs['ball_11']==19 ? 'selected' : ''?>>19</option>
        <option value="20" <?=$rs['ball_11']==20 ? 'selected' : ''?>>20</option>
        <option value="21" <?=$rs['ball_11']==21 ? 'selected' : ''?>>21</option>
        <option value="22" <?=$rs['ball_11']==22 ? 'selected' : ''?>>22</option>
        <option value="23" <?=$rs['ball_11']==23 ? 'selected' : ''?>>23</option>
        <option value="24" <?=$rs['ball_11']==24 ? 'selected' : ''?>>24</option>
        <option value="25" <?=$rs['ball_11']==25 ? 'selected' : ''?>>25</option>
        <option value="26" <?=$rs['ball_11']==26 ? 'selected' : ''?>>26</option>
        <option value="27" <?=$rs['ball_11']==27 ? 'selected' : ''?>>27</option>
        <option value="28" <?=$rs['ball_11']==28 ? 'selected' : ''?>>28</option>
        <option value="29" <?=$rs['ball_11']==29 ? 'selected' : ''?>>29</option>
        <option value="30" <?=$rs['ball_11']==30 ? 'selected' : ''?>>30</option>
        <option value="31" <?=$rs['ball_11']==31 ? 'selected' : ''?>>31</option>
        <option value="32" <?=$rs['ball_11']==32 ? 'selected' : ''?>>32</option>
        <option value="33" <?=$rs['ball_11']==33 ? 'selected' : ''?>>33</option>
        <option value="34" <?=$rs['ball_11']==34 ? 'selected' : ''?>>34</option>
        <option value="35" <?=$rs['ball_11']==35 ? 'selected' : ''?>>35</option>
        <option value="36" <?=$rs['ball_11']==36 ? 'selected' : ''?>>36</option>
        <option value="37" <?=$rs['ball_11']==37 ? 'selected' : ''?>>37</option>
        <option value="38" <?=$rs['ball_11']==38 ? 'selected' : ''?>>38</option>
        <option value="39" <?=$rs['ball_11']==39 ? 'selected' : ''?>>39</option>
        <option value="40" <?=$rs['ball_11']==40 ? 'selected' : ''?>>40</option>
        <option value="41" <?=$rs['ball_11']==41 ? 'selected' : ''?>>41</option>
        <option value="42" <?=$rs['ball_11']==42 ? 'selected' : ''?>>42</option>
        <option value="43" <?=$rs['ball_11']==43 ? 'selected' : ''?>>43</option>
        <option value="44" <?=$rs['ball_11']==44 ? 'selected' : ''?>>44</option>
        <option value="45" <?=$rs['ball_11']==45 ? 'selected' : ''?>>45</option>
        <option value="46" <?=$rs['ball_11']==46 ? 'selected' : ''?>>46</option>
        <option value="47" <?=$rs['ball_11']==47 ? 'selected' : ''?>>47</option>
        <option value="48" <?=$rs['ball_11']==48 ? 'selected' : ''?>>48</option>
        <option value="49" <?=$rs['ball_11']==49 ? 'selected' : ''?>>49</option>
        <option value="50" <?=$rs['ball_11']==50 ? 'selected' : ''?>>50</option>
        <option value="51" <?=$rs['ball_11']==51 ? 'selected' : ''?>>51</option>
        <option value="52" <?=$rs['ball_11']==52 ? 'selected' : ''?>>52</option>
        <option value="53" <?=$rs['ball_11']==53 ? 'selected' : ''?>>53</option>
        <option value="54" <?=$rs['ball_11']==54 ? 'selected' : ''?>>54</option>
        <option value="55" <?=$rs['ball_11']==55 ? 'selected' : ''?>>55</option>
        <option value="56" <?=$rs['ball_11']==56 ? 'selected' : ''?>>56</option>
        <option value="57" <?=$rs['ball_11']==57 ? 'selected' : ''?>>57</option>
        <option value="58" <?=$rs['ball_11']==58 ? 'selected' : ''?>>58</option>
        <option value="59" <?=$rs['ball_11']==59 ? 'selected' : ''?>>59</option>
        <option value="60" <?=$rs['ball_11']==60 ? 'selected' : ''?>>60</option>
        <option value="61" <?=$rs['ball_11']==61 ? 'selected' : ''?>>61</option>
        <option value="62" <?=$rs['ball_11']==62 ? 'selected' : ''?>>62</option>
        <option value="63" <?=$rs['ball_11']==63 ? 'selected' : ''?>>63</option>
        <option value="64" <?=$rs['ball_11']==64 ? 'selected' : ''?>>64</option>
        <option value="65" <?=$rs['ball_11']==65 ? 'selected' : ''?>>65</option>
        <option value="66" <?=$rs['ball_11']==66 ? 'selected' : ''?>>66</option>
        <option value="67" <?=$rs['ball_11']==67 ? 'selected' : ''?>>67</option>
        <option value="68" <?=$rs['ball_11']==68 ? 'selected' : ''?>>68</option>
        <option value="69" <?=$rs['ball_11']==69 ? 'selected' : ''?>>69</option>
        <option value="70" <?=$rs['ball_11']==70 ? 'selected' : ''?>>70</option>
        <option value="71" <?=$rs['ball_11']==71 ? 'selected' : ''?>>71</option>
        <option value="72" <?=$rs['ball_11']==72 ? 'selected' : ''?>>72</option>
        <option value="73" <?=$rs['ball_11']==73 ? 'selected' : ''?>>73</option>
        <option value="74" <?=$rs['ball_11']==74 ? 'selected' : ''?>>74</option>
        <option value="75" <?=$rs['ball_11']==75 ? 'selected' : ''?>>75</option>
        <option value="76" <?=$rs['ball_11']==76 ? 'selected' : ''?>>76</option>
        <option value="77" <?=$rs['ball_11']==77 ? 'selected' : ''?>>77</option>
        <option value="78" <?=$rs['ball_11']==78 ? 'selected' : ''?>>78</option>
        <option value="79" <?=$rs['ball_11']==79 ? 'selected' : ''?>>79</option>
        <option value="80" <?=$rs['ball_11']==80 ? 'selected' : ''?>>80</option>
        <option value="" <?=$rs['ball_11']=='' ? 'selected' : ''?>>第十一球</option>
    </select>
    <select name="ball_12" id="ball_12">
        <option value="01" <?=$rs['ball_12']==01 ? 'selected' : ''?>>01</option>
        <option value="02" <?=$rs['ball_12']==02 ? 'selected' : ''?>>02</option>
        <option value="03" <?=$rs['ball_12']==03 ? 'selected' : ''?>>03</option>
        <option value="04" <?=$rs['ball_12']==04 ? 'selected' : ''?>>04</option>
        <option value="05" <?=$rs['ball_12']==05 ? 'selected' : ''?>>05</option>
        <option value="06" <?=$rs['ball_12']==06 ? 'selected' : ''?>>06</option>
        <option value="07" <?=$rs['ball_12']==07 ? 'selected' : ''?>>07</option>
        <option value="08" <?=$rs['ball_12']==8 ? 'selected' : ''?>>08</option>
        <option value="09" <?=$rs['ball_12']==9 ? 'selected' : ''?>>09</option>
        <option value="10" <?=$rs['ball_12']==10 ? 'selected' : ''?>>10</option>
        <option value="11" <?=$rs['ball_12']==11 ? 'selected' : ''?>>11</option>
        <option value="12" <?=$rs['ball_12']==12 ? 'selected' : ''?>>12</option>
        <option value="13" <?=$rs['ball_12']==13 ? 'selected' : ''?>>13</option>
        <option value="14" <?=$rs['ball_12']==14 ? 'selected' : ''?>>14</option>
        <option value="15" <?=$rs['ball_12']==15 ? 'selected' : ''?>>15</option>
        <option value="16" <?=$rs['ball_12']==16 ? 'selected' : ''?>>16</option>
        <option value="17" <?=$rs['ball_12']==17 ? 'selected' : ''?>>17</option>
        <option value="18" <?=$rs['ball_12']==18 ? 'selected' : ''?>>18</option>
        <option value="19" <?=$rs['ball_12']==19 ? 'selected' : ''?>>19</option>
        <option value="20" <?=$rs['ball_12']==20 ? 'selected' : ''?>>20</option>
        <option value="21" <?=$rs['ball_12']==21 ? 'selected' : ''?>>21</option>
        <option value="22" <?=$rs['ball_12']==22 ? 'selected' : ''?>>22</option>
        <option value="23" <?=$rs['ball_12']==23 ? 'selected' : ''?>>23</option>
        <option value="24" <?=$rs['ball_12']==24 ? 'selected' : ''?>>24</option>
        <option value="25" <?=$rs['ball_12']==25 ? 'selected' : ''?>>25</option>
        <option value="26" <?=$rs['ball_12']==26 ? 'selected' : ''?>>26</option>
        <option value="27" <?=$rs['ball_12']==27 ? 'selected' : ''?>>27</option>
        <option value="28" <?=$rs['ball_12']==28 ? 'selected' : ''?>>28</option>
        <option value="29" <?=$rs['ball_12']==29 ? 'selected' : ''?>>29</option>
        <option value="30" <?=$rs['ball_12']==30 ? 'selected' : ''?>>30</option>
        <option value="31" <?=$rs['ball_12']==31 ? 'selected' : ''?>>31</option>
        <option value="32" <?=$rs['ball_12']==32 ? 'selected' : ''?>>32</option>
        <option value="33" <?=$rs['ball_12']==33 ? 'selected' : ''?>>33</option>
        <option value="34" <?=$rs['ball_12']==34 ? 'selected' : ''?>>34</option>
        <option value="35" <?=$rs['ball_12']==35 ? 'selected' : ''?>>35</option>
        <option value="36" <?=$rs['ball_12']==36 ? 'selected' : ''?>>36</option>
        <option value="37" <?=$rs['ball_12']==37 ? 'selected' : ''?>>37</option>
        <option value="38" <?=$rs['ball_12']==38 ? 'selected' : ''?>>38</option>
        <option value="39" <?=$rs['ball_12']==39 ? 'selected' : ''?>>39</option>
        <option value="40" <?=$rs['ball_12']==40 ? 'selected' : ''?>>40</option>
        <option value="41" <?=$rs['ball_12']==41 ? 'selected' : ''?>>41</option>
        <option value="42" <?=$rs['ball_12']==42 ? 'selected' : ''?>>42</option>
        <option value="43" <?=$rs['ball_12']==43 ? 'selected' : ''?>>43</option>
        <option value="44" <?=$rs['ball_12']==44 ? 'selected' : ''?>>44</option>
        <option value="45" <?=$rs['ball_12']==45 ? 'selected' : ''?>>45</option>
        <option value="46" <?=$rs['ball_12']==46 ? 'selected' : ''?>>46</option>
        <option value="47" <?=$rs['ball_12']==47 ? 'selected' : ''?>>47</option>
        <option value="48" <?=$rs['ball_12']==48 ? 'selected' : ''?>>48</option>
        <option value="49" <?=$rs['ball_12']==49 ? 'selected' : ''?>>49</option>
        <option value="50" <?=$rs['ball_12']==50 ? 'selected' : ''?>>50</option>
        <option value="51" <?=$rs['ball_12']==51 ? 'selected' : ''?>>51</option>
        <option value="52" <?=$rs['ball_12']==52 ? 'selected' : ''?>>52</option>
        <option value="53" <?=$rs['ball_12']==53 ? 'selected' : ''?>>53</option>
        <option value="54" <?=$rs['ball_12']==54 ? 'selected' : ''?>>54</option>
        <option value="55" <?=$rs['ball_12']==55 ? 'selected' : ''?>>55</option>
        <option value="56" <?=$rs['ball_12']==56 ? 'selected' : ''?>>56</option>
        <option value="57" <?=$rs['ball_12']==57 ? 'selected' : ''?>>57</option>
        <option value="58" <?=$rs['ball_12']==58 ? 'selected' : ''?>>58</option>
        <option value="59" <?=$rs['ball_12']==59 ? 'selected' : ''?>>59</option>
        <option value="60" <?=$rs['ball_12']==60 ? 'selected' : ''?>>60</option>
        <option value="61" <?=$rs['ball_12']==61 ? 'selected' : ''?>>61</option>
        <option value="62" <?=$rs['ball_12']==62 ? 'selected' : ''?>>62</option>
        <option value="63" <?=$rs['ball_12']==63 ? 'selected' : ''?>>63</option>
        <option value="64" <?=$rs['ball_12']==64 ? 'selected' : ''?>>64</option>
        <option value="65" <?=$rs['ball_12']==65 ? 'selected' : ''?>>65</option>
        <option value="66" <?=$rs['ball_12']==66 ? 'selected' : ''?>>66</option>
        <option value="67" <?=$rs['ball_12']==67 ? 'selected' : ''?>>67</option>
        <option value="68" <?=$rs['ball_12']==68 ? 'selected' : ''?>>68</option>
        <option value="69" <?=$rs['ball_12']==69 ? 'selected' : ''?>>69</option>
        <option value="70" <?=$rs['ball_12']==70 ? 'selected' : ''?>>70</option>
        <option value="71" <?=$rs['ball_12']==71 ? 'selected' : ''?>>71</option>
        <option value="72" <?=$rs['ball_12']==72 ? 'selected' : ''?>>72</option>
        <option value="73" <?=$rs['ball_12']==73 ? 'selected' : ''?>>73</option>
        <option value="74" <?=$rs['ball_12']==74 ? 'selected' : ''?>>74</option>
        <option value="75" <?=$rs['ball_12']==75 ? 'selected' : ''?>>75</option>
        <option value="76" <?=$rs['ball_12']==76 ? 'selected' : ''?>>76</option>
        <option value="77" <?=$rs['ball_12']==77 ? 'selected' : ''?>>77</option>
        <option value="78" <?=$rs['ball_12']==78 ? 'selected' : ''?>>78</option>
        <option value="79" <?=$rs['ball_12']==79 ? 'selected' : ''?>>79</option>
        <option value="80" <?=$rs['ball_12']==80 ? 'selected' : ''?>>80</option>
        <option value="" <?=$rs['ball_12']=='' ? 'selected' : ''?>>第十二球</option>
    </select>
    <select name="ball_13" id="ball_13">
        <option value="01" <?=$rs['ball_13']==01 ? 'selected' : ''?>>01</option>
        <option value="02" <?=$rs['ball_13']==02 ? 'selected' : ''?>>02</option>
        <option value="03" <?=$rs['ball_13']==03 ? 'selected' : ''?>>03</option>
        <option value="04" <?=$rs['ball_13']==04 ? 'selected' : ''?>>04</option>
        <option value="05" <?=$rs['ball_13']==05 ? 'selected' : ''?>>05</option>
        <option value="06" <?=$rs['ball_13']==06 ? 'selected' : ''?>>06</option>
        <option value="07" <?=$rs['ball_13']==07 ? 'selected' : ''?>>07</option>
        <option value="08" <?=$rs['ball_13']==8 ? 'selected' : ''?>>08</option>
        <option value="09" <?=$rs['ball_13']==9 ? 'selected' : ''?>>09</option>
        <option value="10" <?=$rs['ball_13']==10 ? 'selected' : ''?>>10</option>
        <option value="11" <?=$rs['ball_13']==11 ? 'selected' : ''?>>11</option>
        <option value="12" <?=$rs['ball_13']==12 ? 'selected' : ''?>>12</option>
        <option value="13" <?=$rs['ball_13']==13 ? 'selected' : ''?>>13</option>
        <option value="14" <?=$rs['ball_13']==14 ? 'selected' : ''?>>14</option>
        <option value="15" <?=$rs['ball_13']==15 ? 'selected' : ''?>>15</option>
        <option value="16" <?=$rs['ball_13']==16 ? 'selected' : ''?>>16</option>
        <option value="17" <?=$rs['ball_13']==17 ? 'selected' : ''?>>17</option>
        <option value="18" <?=$rs['ball_13']==18 ? 'selected' : ''?>>18</option>
        <option value="19" <?=$rs['ball_13']==19 ? 'selected' : ''?>>19</option>
        <option value="20" <?=$rs['ball_13']==20 ? 'selected' : ''?>>20</option>
        <option value="21" <?=$rs['ball_13']==21 ? 'selected' : ''?>>21</option>
        <option value="22" <?=$rs['ball_13']==22 ? 'selected' : ''?>>22</option>
        <option value="23" <?=$rs['ball_13']==23 ? 'selected' : ''?>>23</option>
        <option value="24" <?=$rs['ball_13']==24 ? 'selected' : ''?>>24</option>
        <option value="25" <?=$rs['ball_13']==25 ? 'selected' : ''?>>25</option>
        <option value="26" <?=$rs['ball_13']==26 ? 'selected' : ''?>>26</option>
        <option value="27" <?=$rs['ball_13']==27 ? 'selected' : ''?>>27</option>
        <option value="28" <?=$rs['ball_13']==28 ? 'selected' : ''?>>28</option>
        <option value="29" <?=$rs['ball_13']==29 ? 'selected' : ''?>>29</option>
        <option value="30" <?=$rs['ball_13']==30 ? 'selected' : ''?>>30</option>
        <option value="31" <?=$rs['ball_13']==31 ? 'selected' : ''?>>31</option>
        <option value="32" <?=$rs['ball_13']==32 ? 'selected' : ''?>>32</option>
        <option value="33" <?=$rs['ball_13']==33 ? 'selected' : ''?>>33</option>
        <option value="34" <?=$rs['ball_13']==34 ? 'selected' : ''?>>34</option>
        <option value="35" <?=$rs['ball_13']==35 ? 'selected' : ''?>>35</option>
        <option value="36" <?=$rs['ball_13']==36 ? 'selected' : ''?>>36</option>
        <option value="37" <?=$rs['ball_13']==37 ? 'selected' : ''?>>37</option>
        <option value="38" <?=$rs['ball_13']==38 ? 'selected' : ''?>>38</option>
        <option value="39" <?=$rs['ball_13']==39 ? 'selected' : ''?>>39</option>
        <option value="40" <?=$rs['ball_13']==40 ? 'selected' : ''?>>40</option>
        <option value="41" <?=$rs['ball_13']==41 ? 'selected' : ''?>>41</option>
        <option value="42" <?=$rs['ball_13']==42 ? 'selected' : ''?>>42</option>
        <option value="43" <?=$rs['ball_13']==43 ? 'selected' : ''?>>43</option>
        <option value="44" <?=$rs['ball_13']==44 ? 'selected' : ''?>>44</option>
        <option value="45" <?=$rs['ball_13']==45 ? 'selected' : ''?>>45</option>
        <option value="46" <?=$rs['ball_13']==46 ? 'selected' : ''?>>46</option>
        <option value="47" <?=$rs['ball_13']==47 ? 'selected' : ''?>>47</option>
        <option value="48" <?=$rs['ball_13']==48 ? 'selected' : ''?>>48</option>
        <option value="49" <?=$rs['ball_13']==49 ? 'selected' : ''?>>49</option>
        <option value="50" <?=$rs['ball_13']==50 ? 'selected' : ''?>>50</option>
        <option value="51" <?=$rs['ball_13']==51 ? 'selected' : ''?>>51</option>
        <option value="52" <?=$rs['ball_13']==52 ? 'selected' : ''?>>52</option>
        <option value="53" <?=$rs['ball_13']==53 ? 'selected' : ''?>>53</option>
        <option value="54" <?=$rs['ball_13']==54 ? 'selected' : ''?>>54</option>
        <option value="55" <?=$rs['ball_13']==55 ? 'selected' : ''?>>55</option>
        <option value="56" <?=$rs['ball_13']==56 ? 'selected' : ''?>>56</option>
        <option value="57" <?=$rs['ball_13']==57 ? 'selected' : ''?>>57</option>
        <option value="58" <?=$rs['ball_13']==58 ? 'selected' : ''?>>58</option>
        <option value="59" <?=$rs['ball_13']==59 ? 'selected' : ''?>>59</option>
        <option value="60" <?=$rs['ball_13']==60 ? 'selected' : ''?>>60</option>
        <option value="61" <?=$rs['ball_13']==61 ? 'selected' : ''?>>61</option>
        <option value="62" <?=$rs['ball_13']==62 ? 'selected' : ''?>>62</option>
        <option value="63" <?=$rs['ball_13']==63 ? 'selected' : ''?>>63</option>
        <option value="64" <?=$rs['ball_13']==64 ? 'selected' : ''?>>64</option>
        <option value="65" <?=$rs['ball_13']==65 ? 'selected' : ''?>>65</option>
        <option value="66" <?=$rs['ball_13']==66 ? 'selected' : ''?>>66</option>
        <option value="67" <?=$rs['ball_13']==67 ? 'selected' : ''?>>67</option>
        <option value="68" <?=$rs['ball_13']==68 ? 'selected' : ''?>>68</option>
        <option value="69" <?=$rs['ball_13']==69 ? 'selected' : ''?>>69</option>
        <option value="70" <?=$rs['ball_13']==70 ? 'selected' : ''?>>70</option>
        <option value="71" <?=$rs['ball_13']==71 ? 'selected' : ''?>>71</option>
        <option value="72" <?=$rs['ball_13']==72 ? 'selected' : ''?>>72</option>
        <option value="73" <?=$rs['ball_13']==73 ? 'selected' : ''?>>73</option>
        <option value="74" <?=$rs['ball_13']==74 ? 'selected' : ''?>>74</option>
        <option value="75" <?=$rs['ball_13']==75 ? 'selected' : ''?>>75</option>
        <option value="76" <?=$rs['ball_13']==76 ? 'selected' : ''?>>76</option>
        <option value="77" <?=$rs['ball_13']==77 ? 'selected' : ''?>>77</option>
        <option value="78" <?=$rs['ball_13']==78 ? 'selected' : ''?>>78</option>
        <option value="79" <?=$rs['ball_13']==79 ? 'selected' : ''?>>79</option>
        <option value="80" <?=$rs['ball_13']==80 ? 'selected' : ''?>>80</option>
        <option value="" <?=$rs['ball_13']=='' ? 'selected' : ''?>>第十三球</option>
    </select>
    <select name="ball_14" id="ball_14">
        <option value="01" <?=$rs['ball_14']==01 ? 'selected' : ''?>>01</option>
        <option value="02" <?=$rs['ball_14']==02 ? 'selected' : ''?>>02</option>
        <option value="03" <?=$rs['ball_14']==03 ? 'selected' : ''?>>03</option>
        <option value="04" <?=$rs['ball_14']==04 ? 'selected' : ''?>>04</option>
        <option value="05" <?=$rs['ball_14']==05 ? 'selected' : ''?>>05</option>
        <option value="06" <?=$rs['ball_14']==06 ? 'selected' : ''?>>06</option>
        <option value="07" <?=$rs['ball_14']==07 ? 'selected' : ''?>>07</option>
        <option value="08" <?=$rs['ball_14']==8 ? 'selected' : ''?>>08</option>
        <option value="09" <?=$rs['ball_14']==9 ? 'selected' : ''?>>09</option>
        <option value="10" <?=$rs['ball_14']==10 ? 'selected' : ''?>>10</option>
        <option value="11" <?=$rs['ball_14']==11 ? 'selected' : ''?>>11</option>
        <option value="12" <?=$rs['ball_14']==12 ? 'selected' : ''?>>12</option>
        <option value="13" <?=$rs['ball_14']==13 ? 'selected' : ''?>>13</option>
        <option value="14" <?=$rs['ball_14']==14 ? 'selected' : ''?>>14</option>
        <option value="15" <?=$rs['ball_14']==15 ? 'selected' : ''?>>15</option>
        <option value="16" <?=$rs['ball_14']==16 ? 'selected' : ''?>>16</option>
        <option value="17" <?=$rs['ball_14']==17 ? 'selected' : ''?>>17</option>
        <option value="18" <?=$rs['ball_14']==18 ? 'selected' : ''?>>18</option>
        <option value="19" <?=$rs['ball_14']==19 ? 'selected' : ''?>>19</option>
        <option value="20" <?=$rs['ball_14']==20 ? 'selected' : ''?>>20</option>
        <option value="21" <?=$rs['ball_14']==21 ? 'selected' : ''?>>21</option>
        <option value="22" <?=$rs['ball_14']==22 ? 'selected' : ''?>>22</option>
        <option value="23" <?=$rs['ball_14']==23 ? 'selected' : ''?>>23</option>
        <option value="24" <?=$rs['ball_14']==24 ? 'selected' : ''?>>24</option>
        <option value="25" <?=$rs['ball_14']==25 ? 'selected' : ''?>>25</option>
        <option value="26" <?=$rs['ball_14']==26 ? 'selected' : ''?>>26</option>
        <option value="27" <?=$rs['ball_14']==27 ? 'selected' : ''?>>27</option>
        <option value="28" <?=$rs['ball_14']==28 ? 'selected' : ''?>>28</option>
        <option value="29" <?=$rs['ball_14']==29 ? 'selected' : ''?>>29</option>
        <option value="30" <?=$rs['ball_14']==30 ? 'selected' : ''?>>30</option>
        <option value="31" <?=$rs['ball_14']==31 ? 'selected' : ''?>>31</option>
        <option value="32" <?=$rs['ball_14']==32 ? 'selected' : ''?>>32</option>
        <option value="33" <?=$rs['ball_14']==33 ? 'selected' : ''?>>33</option>
        <option value="34" <?=$rs['ball_14']==34 ? 'selected' : ''?>>34</option>
        <option value="35" <?=$rs['ball_14']==35 ? 'selected' : ''?>>35</option>
        <option value="36" <?=$rs['ball_14']==36 ? 'selected' : ''?>>36</option>
        <option value="37" <?=$rs['ball_14']==37 ? 'selected' : ''?>>37</option>
        <option value="38" <?=$rs['ball_14']==38 ? 'selected' : ''?>>38</option>
        <option value="39" <?=$rs['ball_14']==39 ? 'selected' : ''?>>39</option>
        <option value="40" <?=$rs['ball_14']==40 ? 'selected' : ''?>>40</option>
        <option value="41" <?=$rs['ball_14']==41 ? 'selected' : ''?>>41</option>
        <option value="42" <?=$rs['ball_14']==42 ? 'selected' : ''?>>42</option>
        <option value="43" <?=$rs['ball_14']==43 ? 'selected' : ''?>>43</option>
        <option value="44" <?=$rs['ball_14']==44 ? 'selected' : ''?>>44</option>
        <option value="45" <?=$rs['ball_14']==45 ? 'selected' : ''?>>45</option>
        <option value="46" <?=$rs['ball_14']==46 ? 'selected' : ''?>>46</option>
        <option value="47" <?=$rs['ball_14']==47 ? 'selected' : ''?>>47</option>
        <option value="48" <?=$rs['ball_14']==48 ? 'selected' : ''?>>48</option>
        <option value="49" <?=$rs['ball_14']==49 ? 'selected' : ''?>>49</option>
        <option value="50" <?=$rs['ball_14']==50 ? 'selected' : ''?>>50</option>
        <option value="51" <?=$rs['ball_14']==51 ? 'selected' : ''?>>51</option>
        <option value="52" <?=$rs['ball_14']==52 ? 'selected' : ''?>>52</option>
        <option value="53" <?=$rs['ball_14']==53 ? 'selected' : ''?>>53</option>
        <option value="54" <?=$rs['ball_14']==54 ? 'selected' : ''?>>54</option>
        <option value="55" <?=$rs['ball_14']==55 ? 'selected' : ''?>>55</option>
        <option value="56" <?=$rs['ball_14']==56 ? 'selected' : ''?>>56</option>
        <option value="57" <?=$rs['ball_14']==57 ? 'selected' : ''?>>57</option>
        <option value="58" <?=$rs['ball_14']==58 ? 'selected' : ''?>>58</option>
        <option value="59" <?=$rs['ball_14']==59 ? 'selected' : ''?>>59</option>
        <option value="60" <?=$rs['ball_14']==60 ? 'selected' : ''?>>60</option>
        <option value="61" <?=$rs['ball_14']==61 ? 'selected' : ''?>>61</option>
        <option value="62" <?=$rs['ball_14']==62 ? 'selected' : ''?>>62</option>
        <option value="63" <?=$rs['ball_14']==63 ? 'selected' : ''?>>63</option>
        <option value="64" <?=$rs['ball_14']==64 ? 'selected' : ''?>>64</option>
        <option value="65" <?=$rs['ball_14']==65 ? 'selected' : ''?>>65</option>
        <option value="66" <?=$rs['ball_14']==66 ? 'selected' : ''?>>66</option>
        <option value="67" <?=$rs['ball_14']==67 ? 'selected' : ''?>>67</option>
        <option value="68" <?=$rs['ball_14']==68 ? 'selected' : ''?>>68</option>
        <option value="69" <?=$rs['ball_14']==69 ? 'selected' : ''?>>69</option>
        <option value="70" <?=$rs['ball_14']==70 ? 'selected' : ''?>>70</option>
        <option value="71" <?=$rs['ball_14']==71 ? 'selected' : ''?>>71</option>
        <option value="72" <?=$rs['ball_14']==72 ? 'selected' : ''?>>72</option>
        <option value="73" <?=$rs['ball_14']==73 ? 'selected' : ''?>>73</option>
        <option value="74" <?=$rs['ball_14']==74 ? 'selected' : ''?>>74</option>
        <option value="75" <?=$rs['ball_14']==75 ? 'selected' : ''?>>75</option>
        <option value="76" <?=$rs['ball_14']==76 ? 'selected' : ''?>>76</option>
        <option value="77" <?=$rs['ball_14']==77 ? 'selected' : ''?>>77</option>
        <option value="78" <?=$rs['ball_14']==78 ? 'selected' : ''?>>78</option>
        <option value="79" <?=$rs['ball_14']==79 ? 'selected' : ''?>>79</option>
        <option value="80" <?=$rs['ball_14']==80 ? 'selected' : ''?>>80</option>
        <option value="" <?=$rs['ball_14']=='' ? 'selected' : ''?>>第十四球</option>
    </select>
    <select name="ball_15" id="ball_15">
        <option value="01" <?=$rs['ball_15']==01 ? 'selected' : ''?>>01</option>
        <option value="02" <?=$rs['ball_15']==02 ? 'selected' : ''?>>02</option>
        <option value="03" <?=$rs['ball_15']==03 ? 'selected' : ''?>>03</option>
        <option value="04" <?=$rs['ball_15']==04 ? 'selected' : ''?>>04</option>
        <option value="05" <?=$rs['ball_15']==05 ? 'selected' : ''?>>05</option>
        <option value="06" <?=$rs['ball_15']==06 ? 'selected' : ''?>>06</option>
        <option value="07" <?=$rs['ball_15']==07 ? 'selected' : ''?>>07</option>
        <option value="08" <?=$rs['ball_15']==8 ? 'selected' : ''?>>08</option>
        <option value="09" <?=$rs['ball_15']==9 ? 'selected' : ''?>>09</option>
        <option value="10" <?=$rs['ball_15']==10 ? 'selected' : ''?>>10</option>
        <option value="11" <?=$rs['ball_15']==11 ? 'selected' : ''?>>11</option>
        <option value="12" <?=$rs['ball_15']==12 ? 'selected' : ''?>>12</option>
        <option value="13" <?=$rs['ball_15']==13 ? 'selected' : ''?>>13</option>
        <option value="14" <?=$rs['ball_15']==14 ? 'selected' : ''?>>14</option>
        <option value="15" <?=$rs['ball_15']==15 ? 'selected' : ''?>>15</option>
        <option value="16" <?=$rs['ball_15']==16 ? 'selected' : ''?>>16</option>
        <option value="17" <?=$rs['ball_15']==17 ? 'selected' : ''?>>17</option>
        <option value="18" <?=$rs['ball_15']==18 ? 'selected' : ''?>>18</option>
        <option value="19" <?=$rs['ball_15']==19 ? 'selected' : ''?>>19</option>
        <option value="20" <?=$rs['ball_15']==20 ? 'selected' : ''?>>20</option>
        <option value="21" <?=$rs['ball_15']==21 ? 'selected' : ''?>>21</option>
        <option value="22" <?=$rs['ball_15']==22 ? 'selected' : ''?>>22</option>
        <option value="23" <?=$rs['ball_15']==23 ? 'selected' : ''?>>23</option>
        <option value="24" <?=$rs['ball_15']==24 ? 'selected' : ''?>>24</option>
        <option value="25" <?=$rs['ball_15']==25 ? 'selected' : ''?>>25</option>
        <option value="26" <?=$rs['ball_15']==26 ? 'selected' : ''?>>26</option>
        <option value="27" <?=$rs['ball_15']==27 ? 'selected' : ''?>>27</option>
        <option value="28" <?=$rs['ball_15']==28 ? 'selected' : ''?>>28</option>
        <option value="29" <?=$rs['ball_15']==29 ? 'selected' : ''?>>29</option>
        <option value="30" <?=$rs['ball_15']==30 ? 'selected' : ''?>>30</option>
        <option value="31" <?=$rs['ball_15']==31 ? 'selected' : ''?>>31</option>
        <option value="32" <?=$rs['ball_15']==32 ? 'selected' : ''?>>32</option>
        <option value="33" <?=$rs['ball_15']==33 ? 'selected' : ''?>>33</option>
        <option value="34" <?=$rs['ball_15']==34 ? 'selected' : ''?>>34</option>
        <option value="35" <?=$rs['ball_15']==35 ? 'selected' : ''?>>35</option>
        <option value="36" <?=$rs['ball_15']==36 ? 'selected' : ''?>>36</option>
        <option value="37" <?=$rs['ball_15']==37 ? 'selected' : ''?>>37</option>
        <option value="38" <?=$rs['ball_15']==38 ? 'selected' : ''?>>38</option>
        <option value="39" <?=$rs['ball_15']==39 ? 'selected' : ''?>>39</option>
        <option value="40" <?=$rs['ball_15']==40 ? 'selected' : ''?>>40</option>
        <option value="41" <?=$rs['ball_15']==41 ? 'selected' : ''?>>41</option>
        <option value="42" <?=$rs['ball_15']==42 ? 'selected' : ''?>>42</option>
        <option value="43" <?=$rs['ball_15']==43 ? 'selected' : ''?>>43</option>
        <option value="44" <?=$rs['ball_15']==44 ? 'selected' : ''?>>44</option>
        <option value="45" <?=$rs['ball_15']==45 ? 'selected' : ''?>>45</option>
        <option value="46" <?=$rs['ball_15']==46 ? 'selected' : ''?>>46</option>
        <option value="47" <?=$rs['ball_15']==47 ? 'selected' : ''?>>47</option>
        <option value="48" <?=$rs['ball_15']==48 ? 'selected' : ''?>>48</option>
        <option value="49" <?=$rs['ball_15']==49 ? 'selected' : ''?>>49</option>
        <option value="50" <?=$rs['ball_15']==50 ? 'selected' : ''?>>50</option>
        <option value="51" <?=$rs['ball_15']==51 ? 'selected' : ''?>>51</option>
        <option value="52" <?=$rs['ball_15']==52 ? 'selected' : ''?>>52</option>
        <option value="53" <?=$rs['ball_15']==53 ? 'selected' : ''?>>53</option>
        <option value="54" <?=$rs['ball_15']==54 ? 'selected' : ''?>>54</option>
        <option value="55" <?=$rs['ball_15']==55 ? 'selected' : ''?>>55</option>
        <option value="56" <?=$rs['ball_15']==56 ? 'selected' : ''?>>56</option>
        <option value="57" <?=$rs['ball_15']==57 ? 'selected' : ''?>>57</option>
        <option value="58" <?=$rs['ball_15']==58 ? 'selected' : ''?>>58</option>
        <option value="59" <?=$rs['ball_15']==59 ? 'selected' : ''?>>59</option>
        <option value="60" <?=$rs['ball_15']==60 ? 'selected' : ''?>>60</option>
        <option value="61" <?=$rs['ball_15']==61 ? 'selected' : ''?>>61</option>
        <option value="62" <?=$rs['ball_15']==62 ? 'selected' : ''?>>62</option>
        <option value="63" <?=$rs['ball_15']==63 ? 'selected' : ''?>>63</option>
        <option value="64" <?=$rs['ball_15']==64 ? 'selected' : ''?>>64</option>
        <option value="65" <?=$rs['ball_15']==65 ? 'selected' : ''?>>65</option>
        <option value="66" <?=$rs['ball_15']==66 ? 'selected' : ''?>>66</option>
        <option value="67" <?=$rs['ball_15']==67 ? 'selected' : ''?>>67</option>
        <option value="68" <?=$rs['ball_15']==68 ? 'selected' : ''?>>68</option>
        <option value="69" <?=$rs['ball_15']==69 ? 'selected' : ''?>>69</option>
        <option value="70" <?=$rs['ball_15']==70 ? 'selected' : ''?>>70</option>
        <option value="71" <?=$rs['ball_15']==71 ? 'selected' : ''?>>71</option>
        <option value="72" <?=$rs['ball_15']==72 ? 'selected' : ''?>>72</option>
        <option value="73" <?=$rs['ball_15']==73 ? 'selected' : ''?>>73</option>
        <option value="74" <?=$rs['ball_15']==74 ? 'selected' : ''?>>74</option>
        <option value="75" <?=$rs['ball_15']==75 ? 'selected' : ''?>>75</option>
        <option value="76" <?=$rs['ball_15']==76 ? 'selected' : ''?>>76</option>
        <option value="77" <?=$rs['ball_15']==77 ? 'selected' : ''?>>77</option>
        <option value="78" <?=$rs['ball_15']==78 ? 'selected' : ''?>>78</option>
        <option value="79" <?=$rs['ball_15']==79 ? 'selected' : ''?>>79</option>
        <option value="80" <?=$rs['ball_15']==80 ? 'selected' : ''?>>80</option>
        <option value="" <?=$rs['ball_15']=='' ? 'selected' : ''?>>第十五球</option>
    </select>
    <select name="ball_16" id="ball_16">
        <option value="01" <?=$rs['ball_16']==01 ? 'selected' : ''?>>01</option>
        <option value="02" <?=$rs['ball_16']==02 ? 'selected' : ''?>>02</option>
        <option value="03" <?=$rs['ball_16']==03 ? 'selected' : ''?>>03</option>
        <option value="04" <?=$rs['ball_16']==04 ? 'selected' : ''?>>04</option>
        <option value="05" <?=$rs['ball_16']==05 ? 'selected' : ''?>>05</option>
        <option value="06" <?=$rs['ball_16']==06 ? 'selected' : ''?>>06</option>
        <option value="07" <?=$rs['ball_16']==07 ? 'selected' : ''?>>07</option>
        <option value="08" <?=$rs['ball_16']==8 ? 'selected' : ''?>>08</option>
        <option value="09" <?=$rs['ball_16']==9 ? 'selected' : ''?>>09</option>
        <option value="10" <?=$rs['ball_16']==10 ? 'selected' : ''?>>10</option>
        <option value="11" <?=$rs['ball_16']==11 ? 'selected' : ''?>>11</option>
        <option value="12" <?=$rs['ball_16']==12 ? 'selected' : ''?>>12</option>
        <option value="13" <?=$rs['ball_16']==13 ? 'selected' : ''?>>13</option>
        <option value="14" <?=$rs['ball_16']==14 ? 'selected' : ''?>>14</option>
        <option value="15" <?=$rs['ball_16']==15 ? 'selected' : ''?>>15</option>
        <option value="16" <?=$rs['ball_16']==16 ? 'selected' : ''?>>16</option>
        <option value="17" <?=$rs['ball_16']==17 ? 'selected' : ''?>>17</option>
        <option value="18" <?=$rs['ball_16']==18 ? 'selected' : ''?>>18</option>
        <option value="19" <?=$rs['ball_16']==19 ? 'selected' : ''?>>19</option>
        <option value="20" <?=$rs['ball_16']==20 ? 'selected' : ''?>>20</option>
        <option value="21" <?=$rs['ball_16']==21 ? 'selected' : ''?>>21</option>
        <option value="22" <?=$rs['ball_16']==22 ? 'selected' : ''?>>22</option>
        <option value="23" <?=$rs['ball_16']==23 ? 'selected' : ''?>>23</option>
        <option value="24" <?=$rs['ball_16']==24 ? 'selected' : ''?>>24</option>
        <option value="25" <?=$rs['ball_16']==25 ? 'selected' : ''?>>25</option>
        <option value="26" <?=$rs['ball_16']==26 ? 'selected' : ''?>>26</option>
        <option value="27" <?=$rs['ball_16']==27 ? 'selected' : ''?>>27</option>
        <option value="28" <?=$rs['ball_16']==28 ? 'selected' : ''?>>28</option>
        <option value="29" <?=$rs['ball_16']==29 ? 'selected' : ''?>>29</option>
        <option value="30" <?=$rs['ball_16']==30 ? 'selected' : ''?>>30</option>
        <option value="31" <?=$rs['ball_16']==31 ? 'selected' : ''?>>31</option>
        <option value="32" <?=$rs['ball_16']==32 ? 'selected' : ''?>>32</option>
        <option value="33" <?=$rs['ball_16']==33 ? 'selected' : ''?>>33</option>
        <option value="34" <?=$rs['ball_16']==34 ? 'selected' : ''?>>34</option>
        <option value="35" <?=$rs['ball_16']==35 ? 'selected' : ''?>>35</option>
        <option value="36" <?=$rs['ball_16']==36 ? 'selected' : ''?>>36</option>
        <option value="37" <?=$rs['ball_16']==37 ? 'selected' : ''?>>37</option>
        <option value="38" <?=$rs['ball_16']==38 ? 'selected' : ''?>>38</option>
        <option value="39" <?=$rs['ball_16']==39 ? 'selected' : ''?>>39</option>
        <option value="40" <?=$rs['ball_16']==40 ? 'selected' : ''?>>40</option>
        <option value="41" <?=$rs['ball_16']==41 ? 'selected' : ''?>>41</option>
        <option value="42" <?=$rs['ball_16']==42 ? 'selected' : ''?>>42</option>
        <option value="43" <?=$rs['ball_16']==43 ? 'selected' : ''?>>43</option>
        <option value="44" <?=$rs['ball_16']==44 ? 'selected' : ''?>>44</option>
        <option value="45" <?=$rs['ball_16']==45 ? 'selected' : ''?>>45</option>
        <option value="46" <?=$rs['ball_16']==46 ? 'selected' : ''?>>46</option>
        <option value="47" <?=$rs['ball_16']==47 ? 'selected' : ''?>>47</option>
        <option value="48" <?=$rs['ball_16']==48 ? 'selected' : ''?>>48</option>
        <option value="49" <?=$rs['ball_16']==49 ? 'selected' : ''?>>49</option>
        <option value="50" <?=$rs['ball_16']==50 ? 'selected' : ''?>>50</option>
        <option value="51" <?=$rs['ball_16']==51 ? 'selected' : ''?>>51</option>
        <option value="52" <?=$rs['ball_16']==52 ? 'selected' : ''?>>52</option>
        <option value="53" <?=$rs['ball_16']==53 ? 'selected' : ''?>>53</option>
        <option value="54" <?=$rs['ball_16']==54 ? 'selected' : ''?>>54</option>
        <option value="55" <?=$rs['ball_16']==55 ? 'selected' : ''?>>55</option>
        <option value="56" <?=$rs['ball_16']==56 ? 'selected' : ''?>>56</option>
        <option value="57" <?=$rs['ball_16']==57 ? 'selected' : ''?>>57</option>
        <option value="58" <?=$rs['ball_16']==58 ? 'selected' : ''?>>58</option>
        <option value="59" <?=$rs['ball_16']==59 ? 'selected' : ''?>>59</option>
        <option value="60" <?=$rs['ball_16']==60 ? 'selected' : ''?>>60</option>
        <option value="61" <?=$rs['ball_16']==61 ? 'selected' : ''?>>61</option>
        <option value="62" <?=$rs['ball_16']==62 ? 'selected' : ''?>>62</option>
        <option value="63" <?=$rs['ball_16']==63 ? 'selected' : ''?>>63</option>
        <option value="64" <?=$rs['ball_16']==64 ? 'selected' : ''?>>64</option>
        <option value="65" <?=$rs['ball_16']==65 ? 'selected' : ''?>>65</option>
        <option value="66" <?=$rs['ball_16']==66 ? 'selected' : ''?>>66</option>
        <option value="67" <?=$rs['ball_16']==67 ? 'selected' : ''?>>67</option>
        <option value="68" <?=$rs['ball_16']==68 ? 'selected' : ''?>>68</option>
        <option value="69" <?=$rs['ball_16']==69 ? 'selected' : ''?>>69</option>
        <option value="70" <?=$rs['ball_16']==70 ? 'selected' : ''?>>70</option>
        <option value="71" <?=$rs['ball_16']==71 ? 'selected' : ''?>>71</option>
        <option value="72" <?=$rs['ball_16']==72 ? 'selected' : ''?>>72</option>
        <option value="73" <?=$rs['ball_16']==73 ? 'selected' : ''?>>73</option>
        <option value="74" <?=$rs['ball_16']==74 ? 'selected' : ''?>>74</option>
        <option value="75" <?=$rs['ball_16']==75 ? 'selected' : ''?>>75</option>
        <option value="76" <?=$rs['ball_16']==76 ? 'selected' : ''?>>76</option>
        <option value="77" <?=$rs['ball_16']==77 ? 'selected' : ''?>>77</option>
        <option value="78" <?=$rs['ball_16']==78 ? 'selected' : ''?>>78</option>
        <option value="79" <?=$rs['ball_16']==79 ? 'selected' : ''?>>79</option>
        <option value="80" <?=$rs['ball_16']==80 ? 'selected' : ''?>>80</option>
        <option value="" <?=$rs['ball_16']=='' ? 'selected' : ''?>>第十六球</option>
    </select>
    <select name="ball_17" id="ball_17">
        <option value="01" <?=$rs['ball_17']==01 ? 'selected' : ''?>>01</option>
        <option value="02" <?=$rs['ball_17']==02 ? 'selected' : ''?>>02</option>
        <option value="03" <?=$rs['ball_17']==03 ? 'selected' : ''?>>03</option>
        <option value="04" <?=$rs['ball_17']==04 ? 'selected' : ''?>>04</option>
        <option value="05" <?=$rs['ball_17']==05 ? 'selected' : ''?>>05</option>
        <option value="06" <?=$rs['ball_17']==06 ? 'selected' : ''?>>06</option>
        <option value="07" <?=$rs['ball_17']==07 ? 'selected' : ''?>>07</option>
        <option value="08" <?=$rs['ball_17']==8 ? 'selected' : ''?>>08</option>
        <option value="09" <?=$rs['ball_17']==9 ? 'selected' : ''?>>09</option>
        <option value="10" <?=$rs['ball_17']==10 ? 'selected' : ''?>>10</option>
        <option value="11" <?=$rs['ball_17']==11 ? 'selected' : ''?>>11</option>
        <option value="12" <?=$rs['ball_17']==12 ? 'selected' : ''?>>12</option>
        <option value="13" <?=$rs['ball_17']==13 ? 'selected' : ''?>>13</option>
        <option value="14" <?=$rs['ball_17']==14 ? 'selected' : ''?>>14</option>
        <option value="15" <?=$rs['ball_17']==15 ? 'selected' : ''?>>15</option>
        <option value="16" <?=$rs['ball_17']==16 ? 'selected' : ''?>>16</option>
        <option value="17" <?=$rs['ball_17']==17 ? 'selected' : ''?>>17</option>
        <option value="18" <?=$rs['ball_17']==18 ? 'selected' : ''?>>18</option>
        <option value="19" <?=$rs['ball_17']==19 ? 'selected' : ''?>>19</option>
        <option value="20" <?=$rs['ball_17']==20 ? 'selected' : ''?>>20</option>
        <option value="21" <?=$rs['ball_17']==21 ? 'selected' : ''?>>21</option>
        <option value="22" <?=$rs['ball_17']==22 ? 'selected' : ''?>>22</option>
        <option value="23" <?=$rs['ball_17']==23 ? 'selected' : ''?>>23</option>
        <option value="24" <?=$rs['ball_17']==24 ? 'selected' : ''?>>24</option>
        <option value="25" <?=$rs['ball_17']==25 ? 'selected' : ''?>>25</option>
        <option value="26" <?=$rs['ball_17']==26 ? 'selected' : ''?>>26</option>
        <option value="27" <?=$rs['ball_17']==27 ? 'selected' : ''?>>27</option>
        <option value="28" <?=$rs['ball_17']==28 ? 'selected' : ''?>>28</option>
        <option value="29" <?=$rs['ball_17']==29 ? 'selected' : ''?>>29</option>
        <option value="30" <?=$rs['ball_17']==30 ? 'selected' : ''?>>30</option>
        <option value="31" <?=$rs['ball_17']==31 ? 'selected' : ''?>>31</option>
        <option value="32" <?=$rs['ball_17']==32 ? 'selected' : ''?>>32</option>
        <option value="33" <?=$rs['ball_17']==33 ? 'selected' : ''?>>33</option>
        <option value="34" <?=$rs['ball_17']==34 ? 'selected' : ''?>>34</option>
        <option value="35" <?=$rs['ball_17']==35 ? 'selected' : ''?>>35</option>
        <option value="36" <?=$rs['ball_17']==36 ? 'selected' : ''?>>36</option>
        <option value="37" <?=$rs['ball_17']==37 ? 'selected' : ''?>>37</option>
        <option value="38" <?=$rs['ball_17']==38 ? 'selected' : ''?>>38</option>
        <option value="39" <?=$rs['ball_17']==39 ? 'selected' : ''?>>39</option>
        <option value="40" <?=$rs['ball_17']==40 ? 'selected' : ''?>>40</option>
        <option value="41" <?=$rs['ball_17']==41 ? 'selected' : ''?>>41</option>
        <option value="42" <?=$rs['ball_17']==42 ? 'selected' : ''?>>42</option>
        <option value="43" <?=$rs['ball_17']==43 ? 'selected' : ''?>>43</option>
        <option value="44" <?=$rs['ball_17']==44 ? 'selected' : ''?>>44</option>
        <option value="45" <?=$rs['ball_17']==45 ? 'selected' : ''?>>45</option>
        <option value="46" <?=$rs['ball_17']==46 ? 'selected' : ''?>>46</option>
        <option value="47" <?=$rs['ball_17']==47 ? 'selected' : ''?>>47</option>
        <option value="48" <?=$rs['ball_17']==48 ? 'selected' : ''?>>48</option>
        <option value="49" <?=$rs['ball_17']==49 ? 'selected' : ''?>>49</option>
        <option value="50" <?=$rs['ball_17']==50 ? 'selected' : ''?>>50</option>
        <option value="51" <?=$rs['ball_17']==51 ? 'selected' : ''?>>51</option>
        <option value="52" <?=$rs['ball_17']==52 ? 'selected' : ''?>>52</option>
        <option value="53" <?=$rs['ball_17']==53 ? 'selected' : ''?>>53</option>
        <option value="54" <?=$rs['ball_17']==54 ? 'selected' : ''?>>54</option>
        <option value="55" <?=$rs['ball_17']==55 ? 'selected' : ''?>>55</option>
        <option value="56" <?=$rs['ball_17']==56 ? 'selected' : ''?>>56</option>
        <option value="57" <?=$rs['ball_17']==57 ? 'selected' : ''?>>57</option>
        <option value="58" <?=$rs['ball_17']==58 ? 'selected' : ''?>>58</option>
        <option value="59" <?=$rs['ball_17']==59 ? 'selected' : ''?>>59</option>
        <option value="60" <?=$rs['ball_17']==60 ? 'selected' : ''?>>60</option>
        <option value="61" <?=$rs['ball_17']==61 ? 'selected' : ''?>>61</option>
        <option value="62" <?=$rs['ball_17']==62 ? 'selected' : ''?>>62</option>
        <option value="63" <?=$rs['ball_17']==63 ? 'selected' : ''?>>63</option>
        <option value="64" <?=$rs['ball_17']==64 ? 'selected' : ''?>>64</option>
        <option value="65" <?=$rs['ball_17']==65 ? 'selected' : ''?>>65</option>
        <option value="66" <?=$rs['ball_17']==66 ? 'selected' : ''?>>66</option>
        <option value="67" <?=$rs['ball_17']==67 ? 'selected' : ''?>>67</option>
        <option value="68" <?=$rs['ball_17']==68 ? 'selected' : ''?>>68</option>
        <option value="69" <?=$rs['ball_17']==69 ? 'selected' : ''?>>69</option>
        <option value="70" <?=$rs['ball_17']==70 ? 'selected' : ''?>>70</option>
        <option value="71" <?=$rs['ball_17']==71 ? 'selected' : ''?>>71</option>
        <option value="72" <?=$rs['ball_17']==72 ? 'selected' : ''?>>72</option>
        <option value="73" <?=$rs['ball_17']==73 ? 'selected' : ''?>>73</option>
        <option value="74" <?=$rs['ball_17']==74 ? 'selected' : ''?>>74</option>
        <option value="75" <?=$rs['ball_17']==75 ? 'selected' : ''?>>75</option>
        <option value="76" <?=$rs['ball_17']==76 ? 'selected' : ''?>>76</option>
        <option value="77" <?=$rs['ball_17']==77 ? 'selected' : ''?>>77</option>
        <option value="78" <?=$rs['ball_17']==78 ? 'selected' : ''?>>78</option>
        <option value="79" <?=$rs['ball_17']==79 ? 'selected' : ''?>>79</option>
        <option value="80" <?=$rs['ball_17']==80 ? 'selected' : ''?>>80</option>
        <option value="" <?=$rs['ball_17']=='' ? 'selected' : ''?>>第十七球</option>
    </select>
    <select name="ball_18" id="ball_18">
        <option value="01" <?=$rs['ball_18']==01 ? 'selected' : ''?>>01</option>
        <option value="02" <?=$rs['ball_18']==02 ? 'selected' : ''?>>02</option>
        <option value="03" <?=$rs['ball_18']==03 ? 'selected' : ''?>>03</option>
        <option value="04" <?=$rs['ball_18']==04 ? 'selected' : ''?>>04</option>
        <option value="05" <?=$rs['ball_18']==05 ? 'selected' : ''?>>05</option>
        <option value="06" <?=$rs['ball_18']==06 ? 'selected' : ''?>>06</option>
        <option value="07" <?=$rs['ball_18']==07 ? 'selected' : ''?>>07</option>
        <option value="08" <?=$rs['ball_18']==8 ? 'selected' : ''?>>08</option>
        <option value="09" <?=$rs['ball_18']==9 ? 'selected' : ''?>>09</option>
        <option value="10" <?=$rs['ball_18']==10 ? 'selected' : ''?>>10</option>
        <option value="11" <?=$rs['ball_18']==11 ? 'selected' : ''?>>11</option>
        <option value="12" <?=$rs['ball_18']==12 ? 'selected' : ''?>>12</option>
        <option value="13" <?=$rs['ball_18']==13 ? 'selected' : ''?>>13</option>
        <option value="14" <?=$rs['ball_18']==14 ? 'selected' : ''?>>14</option>
        <option value="15" <?=$rs['ball_18']==15 ? 'selected' : ''?>>15</option>
        <option value="16" <?=$rs['ball_18']==16 ? 'selected' : ''?>>16</option>
        <option value="17" <?=$rs['ball_18']==17 ? 'selected' : ''?>>17</option>
        <option value="18" <?=$rs['ball_18']==18 ? 'selected' : ''?>>18</option>
        <option value="19" <?=$rs['ball_18']==19 ? 'selected' : ''?>>19</option>
        <option value="20" <?=$rs['ball_18']==20 ? 'selected' : ''?>>20</option>
        <option value="21" <?=$rs['ball_18']==21 ? 'selected' : ''?>>21</option>
        <option value="22" <?=$rs['ball_18']==22 ? 'selected' : ''?>>22</option>
        <option value="23" <?=$rs['ball_18']==23 ? 'selected' : ''?>>23</option>
        <option value="24" <?=$rs['ball_18']==24 ? 'selected' : ''?>>24</option>
        <option value="25" <?=$rs['ball_18']==25 ? 'selected' : ''?>>25</option>
        <option value="26" <?=$rs['ball_18']==26 ? 'selected' : ''?>>26</option>
        <option value="27" <?=$rs['ball_18']==27 ? 'selected' : ''?>>27</option>
        <option value="28" <?=$rs['ball_18']==28 ? 'selected' : ''?>>28</option>
        <option value="29" <?=$rs['ball_18']==29 ? 'selected' : ''?>>29</option>
        <option value="30" <?=$rs['ball_18']==30 ? 'selected' : ''?>>30</option>
        <option value="31" <?=$rs['ball_18']==31 ? 'selected' : ''?>>31</option>
        <option value="32" <?=$rs['ball_18']==32 ? 'selected' : ''?>>32</option>
        <option value="33" <?=$rs['ball_18']==33 ? 'selected' : ''?>>33</option>
        <option value="34" <?=$rs['ball_18']==34 ? 'selected' : ''?>>34</option>
        <option value="35" <?=$rs['ball_18']==35 ? 'selected' : ''?>>35</option>
        <option value="36" <?=$rs['ball_18']==36 ? 'selected' : ''?>>36</option>
        <option value="37" <?=$rs['ball_18']==37 ? 'selected' : ''?>>37</option>
        <option value="38" <?=$rs['ball_18']==38 ? 'selected' : ''?>>38</option>
        <option value="39" <?=$rs['ball_18']==39 ? 'selected' : ''?>>39</option>
        <option value="40" <?=$rs['ball_18']==40 ? 'selected' : ''?>>40</option>
        <option value="41" <?=$rs['ball_18']==41 ? 'selected' : ''?>>41</option>
        <option value="42" <?=$rs['ball_18']==42 ? 'selected' : ''?>>42</option>
        <option value="43" <?=$rs['ball_18']==43 ? 'selected' : ''?>>43</option>
        <option value="44" <?=$rs['ball_18']==44 ? 'selected' : ''?>>44</option>
        <option value="45" <?=$rs['ball_18']==45 ? 'selected' : ''?>>45</option>
        <option value="46" <?=$rs['ball_18']==46 ? 'selected' : ''?>>46</option>
        <option value="47" <?=$rs['ball_18']==47 ? 'selected' : ''?>>47</option>
        <option value="48" <?=$rs['ball_18']==48 ? 'selected' : ''?>>48</option>
        <option value="49" <?=$rs['ball_18']==49 ? 'selected' : ''?>>49</option>
        <option value="50" <?=$rs['ball_18']==50 ? 'selected' : ''?>>50</option>
        <option value="51" <?=$rs['ball_18']==51 ? 'selected' : ''?>>51</option>
        <option value="52" <?=$rs['ball_18']==52 ? 'selected' : ''?>>52</option>
        <option value="53" <?=$rs['ball_18']==53 ? 'selected' : ''?>>53</option>
        <option value="54" <?=$rs['ball_18']==54 ? 'selected' : ''?>>54</option>
        <option value="55" <?=$rs['ball_18']==55 ? 'selected' : ''?>>55</option>
        <option value="56" <?=$rs['ball_18']==56 ? 'selected' : ''?>>56</option>
        <option value="57" <?=$rs['ball_18']==57 ? 'selected' : ''?>>57</option>
        <option value="58" <?=$rs['ball_18']==58 ? 'selected' : ''?>>58</option>
        <option value="59" <?=$rs['ball_18']==59 ? 'selected' : ''?>>59</option>
        <option value="60" <?=$rs['ball_18']==60 ? 'selected' : ''?>>60</option>
        <option value="61" <?=$rs['ball_18']==61 ? 'selected' : ''?>>61</option>
        <option value="62" <?=$rs['ball_18']==62 ? 'selected' : ''?>>62</option>
        <option value="63" <?=$rs['ball_18']==63 ? 'selected' : ''?>>63</option>
        <option value="64" <?=$rs['ball_18']==64 ? 'selected' : ''?>>64</option>
        <option value="65" <?=$rs['ball_18']==65 ? 'selected' : ''?>>65</option>
        <option value="66" <?=$rs['ball_18']==66 ? 'selected' : ''?>>66</option>
        <option value="67" <?=$rs['ball_18']==67 ? 'selected' : ''?>>67</option>
        <option value="68" <?=$rs['ball_18']==68 ? 'selected' : ''?>>68</option>
        <option value="69" <?=$rs['ball_18']==69 ? 'selected' : ''?>>69</option>
        <option value="70" <?=$rs['ball_18']==70 ? 'selected' : ''?>>70</option>
        <option value="71" <?=$rs['ball_18']==71 ? 'selected' : ''?>>71</option>
        <option value="72" <?=$rs['ball_18']==72 ? 'selected' : ''?>>72</option>
        <option value="73" <?=$rs['ball_18']==73 ? 'selected' : ''?>>73</option>
        <option value="74" <?=$rs['ball_18']==74 ? 'selected' : ''?>>74</option>
        <option value="75" <?=$rs['ball_18']==75 ? 'selected' : ''?>>75</option>
        <option value="76" <?=$rs['ball_18']==76 ? 'selected' : ''?>>76</option>
        <option value="77" <?=$rs['ball_18']==77 ? 'selected' : ''?>>77</option>
        <option value="78" <?=$rs['ball_18']==78 ? 'selected' : ''?>>78</option>
        <option value="79" <?=$rs['ball_18']==79 ? 'selected' : ''?>>79</option>
        <option value="80" <?=$rs['ball_18']==80 ? 'selected' : ''?>>80</option>
        <option value="" <?=$rs['ball_18']=='' ? 'selected' : ''?>>第十八球</option>
    </select>
    <select name="ball_19" id="ball_19">
        <option value="01" <?=$rs['ball_19']==01 ? 'selected' : ''?>>01</option>
        <option value="02" <?=$rs['ball_19']==02 ? 'selected' : ''?>>02</option>
        <option value="03" <?=$rs['ball_19']==03 ? 'selected' : ''?>>03</option>
        <option value="04" <?=$rs['ball_19']==04 ? 'selected' : ''?>>04</option>
        <option value="05" <?=$rs['ball_19']==05 ? 'selected' : ''?>>05</option>
        <option value="06" <?=$rs['ball_19']==06 ? 'selected' : ''?>>06</option>
        <option value="07" <?=$rs['ball_19']==07 ? 'selected' : ''?>>07</option>
        <option value="08" <?=$rs['ball_19']==8 ? 'selected' : ''?>>08</option>
        <option value="09" <?=$rs['ball_19']==9 ? 'selected' : ''?>>09</option>
        <option value="10" <?=$rs['ball_19']==10 ? 'selected' : ''?>>10</option>
        <option value="11" <?=$rs['ball_19']==11 ? 'selected' : ''?>>11</option>
        <option value="12" <?=$rs['ball_19']==12 ? 'selected' : ''?>>12</option>
        <option value="13" <?=$rs['ball_19']==13 ? 'selected' : ''?>>13</option>
        <option value="14" <?=$rs['ball_19']==14 ? 'selected' : ''?>>14</option>
        <option value="15" <?=$rs['ball_19']==15 ? 'selected' : ''?>>15</option>
        <option value="16" <?=$rs['ball_19']==16 ? 'selected' : ''?>>16</option>
        <option value="17" <?=$rs['ball_19']==17 ? 'selected' : ''?>>17</option>
        <option value="18" <?=$rs['ball_19']==18 ? 'selected' : ''?>>18</option>
        <option value="19" <?=$rs['ball_19']==19 ? 'selected' : ''?>>19</option>
        <option value="20" <?=$rs['ball_19']==20 ? 'selected' : ''?>>20</option>
        <option value="21" <?=$rs['ball_19']==21 ? 'selected' : ''?>>21</option>
        <option value="22" <?=$rs['ball_19']==22 ? 'selected' : ''?>>22</option>
        <option value="23" <?=$rs['ball_19']==23 ? 'selected' : ''?>>23</option>
        <option value="24" <?=$rs['ball_19']==24 ? 'selected' : ''?>>24</option>
        <option value="25" <?=$rs['ball_19']==25 ? 'selected' : ''?>>25</option>
        <option value="26" <?=$rs['ball_19']==26 ? 'selected' : ''?>>26</option>
        <option value="27" <?=$rs['ball_19']==27 ? 'selected' : ''?>>27</option>
        <option value="28" <?=$rs['ball_19']==28 ? 'selected' : ''?>>28</option>
        <option value="29" <?=$rs['ball_19']==29 ? 'selected' : ''?>>29</option>
        <option value="30" <?=$rs['ball_19']==30 ? 'selected' : ''?>>30</option>
        <option value="31" <?=$rs['ball_19']==31 ? 'selected' : ''?>>31</option>
        <option value="32" <?=$rs['ball_19']==32 ? 'selected' : ''?>>32</option>
        <option value="33" <?=$rs['ball_19']==33 ? 'selected' : ''?>>33</option>
        <option value="34" <?=$rs['ball_19']==34 ? 'selected' : ''?>>34</option>
        <option value="35" <?=$rs['ball_19']==35 ? 'selected' : ''?>>35</option>
        <option value="36" <?=$rs['ball_19']==36 ? 'selected' : ''?>>36</option>
        <option value="37" <?=$rs['ball_19']==37 ? 'selected' : ''?>>37</option>
        <option value="38" <?=$rs['ball_19']==38 ? 'selected' : ''?>>38</option>
        <option value="39" <?=$rs['ball_19']==39 ? 'selected' : ''?>>39</option>
        <option value="40" <?=$rs['ball_19']==40 ? 'selected' : ''?>>40</option>
        <option value="41" <?=$rs['ball_19']==41 ? 'selected' : ''?>>41</option>
        <option value="42" <?=$rs['ball_19']==42 ? 'selected' : ''?>>42</option>
        <option value="43" <?=$rs['ball_19']==43 ? 'selected' : ''?>>43</option>
        <option value="44" <?=$rs['ball_19']==44 ? 'selected' : ''?>>44</option>
        <option value="45" <?=$rs['ball_19']==45 ? 'selected' : ''?>>45</option>
        <option value="46" <?=$rs['ball_19']==46 ? 'selected' : ''?>>46</option>
        <option value="47" <?=$rs['ball_19']==47 ? 'selected' : ''?>>47</option>
        <option value="48" <?=$rs['ball_19']==48 ? 'selected' : ''?>>48</option>
        <option value="49" <?=$rs['ball_19']==49 ? 'selected' : ''?>>49</option>
        <option value="50" <?=$rs['ball_19']==50 ? 'selected' : ''?>>50</option>
        <option value="51" <?=$rs['ball_19']==51 ? 'selected' : ''?>>51</option>
        <option value="52" <?=$rs['ball_19']==52 ? 'selected' : ''?>>52</option>
        <option value="53" <?=$rs['ball_19']==53 ? 'selected' : ''?>>53</option>
        <option value="54" <?=$rs['ball_19']==54 ? 'selected' : ''?>>54</option>
        <option value="55" <?=$rs['ball_19']==55 ? 'selected' : ''?>>55</option>
        <option value="56" <?=$rs['ball_19']==56 ? 'selected' : ''?>>56</option>
        <option value="57" <?=$rs['ball_19']==57 ? 'selected' : ''?>>57</option>
        <option value="58" <?=$rs['ball_19']==58 ? 'selected' : ''?>>58</option>
        <option value="59" <?=$rs['ball_19']==59 ? 'selected' : ''?>>59</option>
        <option value="60" <?=$rs['ball_19']==60 ? 'selected' : ''?>>60</option>
        <option value="61" <?=$rs['ball_19']==61 ? 'selected' : ''?>>61</option>
        <option value="62" <?=$rs['ball_19']==62 ? 'selected' : ''?>>62</option>
        <option value="63" <?=$rs['ball_19']==63 ? 'selected' : ''?>>63</option>
        <option value="64" <?=$rs['ball_19']==64 ? 'selected' : ''?>>64</option>
        <option value="65" <?=$rs['ball_19']==65 ? 'selected' : ''?>>65</option>
        <option value="66" <?=$rs['ball_19']==66 ? 'selected' : ''?>>66</option>
        <option value="67" <?=$rs['ball_19']==67 ? 'selected' : ''?>>67</option>
        <option value="68" <?=$rs['ball_19']==68 ? 'selected' : ''?>>68</option>
        <option value="69" <?=$rs['ball_19']==69 ? 'selected' : ''?>>69</option>
        <option value="70" <?=$rs['ball_19']==70 ? 'selected' : ''?>>70</option>
        <option value="71" <?=$rs['ball_19']==71 ? 'selected' : ''?>>71</option>
        <option value="72" <?=$rs['ball_19']==72 ? 'selected' : ''?>>72</option>
        <option value="73" <?=$rs['ball_19']==73 ? 'selected' : ''?>>73</option>
        <option value="74" <?=$rs['ball_19']==74 ? 'selected' : ''?>>74</option>
        <option value="75" <?=$rs['ball_19']==75 ? 'selected' : ''?>>75</option>
        <option value="76" <?=$rs['ball_19']==76 ? 'selected' : ''?>>76</option>
        <option value="77" <?=$rs['ball_19']==77 ? 'selected' : ''?>>77</option>
        <option value="78" <?=$rs['ball_19']==78 ? 'selected' : ''?>>78</option>
        <option value="79" <?=$rs['ball_19']==79 ? 'selected' : ''?>>79</option>
        <option value="80" <?=$rs['ball_19']==80 ? 'selected' : ''?>>80</option>
        <option value="" <?=$rs['ball_19']=='' ? 'selected' : ''?>>第十九球</option>
    </select>
    <select name="ball_20" id="ball_20">
        <option value="01" <?=$rs['ball_20']==01 ? 'selected' : ''?>>01</option>
        <option value="02" <?=$rs['ball_20']==02 ? 'selected' : ''?>>02</option>
        <option value="03" <?=$rs['ball_20']==03 ? 'selected' : ''?>>03</option>
        <option value="04" <?=$rs['ball_20']==04 ? 'selected' : ''?>>04</option>
        <option value="05" <?=$rs['ball_20']==05 ? 'selected' : ''?>>05</option>
        <option value="06" <?=$rs['ball_20']==06 ? 'selected' : ''?>>06</option>
        <option value="07" <?=$rs['ball_20']==07 ? 'selected' : ''?>>07</option>
        <option value="08" <?=$rs['ball_20']==8 ? 'selected' : ''?>>08</option>
        <option value="09" <?=$rs['ball_20']==9 ? 'selected' : ''?>>09</option>
        <option value="10" <?=$rs['ball_20']==10 ? 'selected' : ''?>>10</option>
        <option value="11" <?=$rs['ball_20']==11 ? 'selected' : ''?>>11</option>
        <option value="12" <?=$rs['ball_20']==12 ? 'selected' : ''?>>12</option>
        <option value="13" <?=$rs['ball_20']==13 ? 'selected' : ''?>>13</option>
        <option value="14" <?=$rs['ball_20']==14 ? 'selected' : ''?>>14</option>
        <option value="15" <?=$rs['ball_20']==15 ? 'selected' : ''?>>15</option>
        <option value="16" <?=$rs['ball_20']==16 ? 'selected' : ''?>>16</option>
        <option value="17" <?=$rs['ball_20']==17 ? 'selected' : ''?>>17</option>
        <option value="18" <?=$rs['ball_20']==18 ? 'selected' : ''?>>18</option>
        <option value="19" <?=$rs['ball_20']==19 ? 'selected' : ''?>>19</option>
        <option value="20" <?=$rs['ball_20']==20 ? 'selected' : ''?>>20</option>
        <option value="21" <?=$rs['ball_20']==21 ? 'selected' : ''?>>21</option>
        <option value="22" <?=$rs['ball_20']==22 ? 'selected' : ''?>>22</option>
        <option value="23" <?=$rs['ball_20']==23 ? 'selected' : ''?>>23</option>
        <option value="24" <?=$rs['ball_20']==24 ? 'selected' : ''?>>24</option>
        <option value="25" <?=$rs['ball_20']==25 ? 'selected' : ''?>>25</option>
        <option value="26" <?=$rs['ball_20']==26 ? 'selected' : ''?>>26</option>
        <option value="27" <?=$rs['ball_20']==27 ? 'selected' : ''?>>27</option>
        <option value="28" <?=$rs['ball_20']==28 ? 'selected' : ''?>>28</option>
        <option value="29" <?=$rs['ball_20']==29 ? 'selected' : ''?>>29</option>
        <option value="30" <?=$rs['ball_20']==30 ? 'selected' : ''?>>30</option>
        <option value="31" <?=$rs['ball_20']==31 ? 'selected' : ''?>>31</option>
        <option value="32" <?=$rs['ball_20']==32 ? 'selected' : ''?>>32</option>
        <option value="33" <?=$rs['ball_20']==33 ? 'selected' : ''?>>33</option>
        <option value="34" <?=$rs['ball_20']==34 ? 'selected' : ''?>>34</option>
        <option value="35" <?=$rs['ball_20']==35 ? 'selected' : ''?>>35</option>
        <option value="36" <?=$rs['ball_20']==36 ? 'selected' : ''?>>36</option>
        <option value="37" <?=$rs['ball_20']==37 ? 'selected' : ''?>>37</option>
        <option value="38" <?=$rs['ball_20']==38 ? 'selected' : ''?>>38</option>
        <option value="39" <?=$rs['ball_20']==39 ? 'selected' : ''?>>39</option>
        <option value="40" <?=$rs['ball_20']==40 ? 'selected' : ''?>>40</option>
        <option value="41" <?=$rs['ball_20']==41 ? 'selected' : ''?>>41</option>
        <option value="42" <?=$rs['ball_20']==42 ? 'selected' : ''?>>42</option>
        <option value="43" <?=$rs['ball_20']==43 ? 'selected' : ''?>>43</option>
        <option value="44" <?=$rs['ball_20']==44 ? 'selected' : ''?>>44</option>
        <option value="45" <?=$rs['ball_20']==45 ? 'selected' : ''?>>45</option>
        <option value="46" <?=$rs['ball_20']==46 ? 'selected' : ''?>>46</option>
        <option value="47" <?=$rs['ball_20']==47 ? 'selected' : ''?>>47</option>
        <option value="48" <?=$rs['ball_20']==48 ? 'selected' : ''?>>48</option>
        <option value="49" <?=$rs['ball_20']==49 ? 'selected' : ''?>>49</option>
        <option value="50" <?=$rs['ball_20']==50 ? 'selected' : ''?>>50</option>
        <option value="51" <?=$rs['ball_20']==51 ? 'selected' : ''?>>51</option>
        <option value="52" <?=$rs['ball_20']==52 ? 'selected' : ''?>>52</option>
        <option value="53" <?=$rs['ball_20']==53 ? 'selected' : ''?>>53</option>
        <option value="54" <?=$rs['ball_20']==54 ? 'selected' : ''?>>54</option>
        <option value="55" <?=$rs['ball_20']==55 ? 'selected' : ''?>>55</option>
        <option value="56" <?=$rs['ball_20']==56 ? 'selected' : ''?>>56</option>
        <option value="57" <?=$rs['ball_20']==57 ? 'selected' : ''?>>57</option>
        <option value="58" <?=$rs['ball_20']==58 ? 'selected' : ''?>>58</option>
        <option value="59" <?=$rs['ball_20']==59 ? 'selected' : ''?>>59</option>
        <option value="60" <?=$rs['ball_20']==60 ? 'selected' : ''?>>60</option>
        <option value="61" <?=$rs['ball_20']==61 ? 'selected' : ''?>>61</option>
        <option value="62" <?=$rs['ball_20']==62 ? 'selected' : ''?>>62</option>
        <option value="63" <?=$rs['ball_20']==63 ? 'selected' : ''?>>63</option>
        <option value="64" <?=$rs['ball_20']==64 ? 'selected' : ''?>>64</option>
        <option value="65" <?=$rs['ball_20']==65 ? 'selected' : ''?>>65</option>
        <option value="66" <?=$rs['ball_20']==66 ? 'selected' : ''?>>66</option>
        <option value="67" <?=$rs['ball_20']==67 ? 'selected' : ''?>>67</option>
        <option value="68" <?=$rs['ball_20']==68 ? 'selected' : ''?>>68</option>
        <option value="69" <?=$rs['ball_20']==69 ? 'selected' : ''?>>69</option>
        <option value="70" <?=$rs['ball_20']==70 ? 'selected' : ''?>>70</option>
        <option value="71" <?=$rs['ball_20']==71 ? 'selected' : ''?>>71</option>
        <option value="72" <?=$rs['ball_20']==72 ? 'selected' : ''?>>72</option>
        <option value="73" <?=$rs['ball_20']==73 ? 'selected' : ''?>>73</option>
        <option value="74" <?=$rs['ball_20']==74 ? 'selected' : ''?>>74</option>
        <option value="75" <?=$rs['ball_20']==75 ? 'selected' : ''?>>75</option>
        <option value="76" <?=$rs['ball_20']==76 ? 'selected' : ''?>>76</option>
        <option value="77" <?=$rs['ball_20']==77 ? 'selected' : ''?>>77</option>
        <option value="78" <?=$rs['ball_20']==78 ? 'selected' : ''?>>78</option>
        <option value="79" <?=$rs['ball_20']==79 ? 'selected' : ''?>>79</option>
        <option value="80" <?=$rs['ball_20']==80 ? 'selected' : ''?>>80</option>
        <option value="" <?=$rs['ball_20']=='' ? 'selected' : ''?>>第二十球</option>
    </select>
        </td>
</tr>
<tr>
    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="left" bgcolor="#FFFFFF"><input name="submit" type="submit" class="submit80" value="确认发布"/></td>
</tr>
</table>
</form>

<form name="form2" onSubmit="return queryLottery();" method="get" action="?1=1">
<table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12" style="margin-top:5px;" >
    <tr style="background-color:#FFFFFF;">
        <td align="left">
            &nbsp;&nbsp;开奖期号：
            <input name="qishu_query" type="text" id="qishu_query" value="<?=$qishu_query?>" size="20" maxlength="11"/>
            &nbsp;&nbsp;日期：
            <input name="s_time" type="text" id="s_time" value="<?=$query_time?>" onClick="new Calendar(2010,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input name="submit" type="submit" class="submit80" value="搜索"/>
        </td>
    </tr>
</table>
</form>
<table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12" style="margin-top:2px;" bgcolor="#798EB9">
    <tr style="background-color:#3C4D82; color:#FFF">
        <td align="center"><strong>彩票类别</strong></td>
        <td align="center"><strong>彩票期号</strong></td>
        <td align="center"><strong>开奖时间</strong></td>
        <td align="center"><strong>一</strong></td>
        <td align="center"><strong>二</strong></td>
        <td align="center"><strong>三</strong></td>
        <td align="center"><strong>四</strong></td>
        <td align="center"><strong>五</strong></td>
        <td align="center"><strong>六</strong></td>
        <td align="center"><strong>七</strong></td>
        <td align="center"><strong>八</strong></td>
        <td align="center"><strong>九</strong></td>
        <td align="center"><strong>十</strong></td>
        <td align="center"><strong>十一</strong></td>
        <td align="center"><strong>十二</strong></td>
        <td align="center"><strong>十三</strong></td>
        <td align="center"><strong>十四</strong></td>
        <td align="center"><strong>十五</strong></td>
        <td align="center"><strong>十六</strong></td>
        <td align="center"><strong>十七</strong></td>
        <td align="center"><strong>十八</strong></td>
        <td align="center"><strong>十九</strong></td>
        <td align="center"><strong>二十</strong></td>
        <td align="center"><strong>大小</strong></td>
        <td align="center"><strong>单双</strong></td>
        <td align="center"><strong>奇偶</strong></td>
        <td align="center"><strong>上下</strong></td>
        <td align="center"><strong>总和</strong></td>
        <td align="center">结算</td>
        <td align="center"><strong>重算</strong></td>
        <td align="center"><strong>操作</strong></td>
    </tr>
    <?php

    $sql = "SELECT id,qishu,create_time,datetime,state,prev_text,
        ball_1,ball_2,ball_3,ball_4,ball_5,ball_6,ball_7,ball_8,ball_9,ball_10,
       ball_11,ball_12,ball_13,ball_14,ball_15,ball_16,ball_17,ball_18,ball_19,ball_20
        FROM lottery_result_bjkn WHERE DATE_FORMAT(datetime,'%Y-%m-%d') = '$query_time'";
    if($qishu_query){
        $sql .= " AND qishu = '$qishu_query'";
    }
    $sql .= "ORDER BY qishu DESC";
    $query	=	$mysqli->query($sql);
    while($rows = $query->fetch_array()){
        $color = "#FFFFFF";
        $over	 = "#EBEBEB";
        $out	 = "#ffffff";
        $hm 		= array();
        $hm[]		= $rows['ball_1'];
        $hm[]		= $rows['ball_2'];
        $hm[]		= $rows['ball_3'];
        $hm[]		= $rows['ball_4'];
        $hm[]		= $rows['ball_5'];
        $hm[]		= $rows['ball_6'];
        $hm[]		= $rows['ball_7'];
        $hm[]		= $rows['ball_8'];
        $hm[]		= $rows['ball_9'];
        $hm[]		= $rows['ball_10'];
        $hm[]		= $rows['ball_11'];
        $hm[]		= $rows['ball_12'];
        $hm[]		= $rows['ball_13'];
        $hm[]		= $rows['ball_14'];
        $hm[]		= $rows['ball_15'];
        $hm[]		= $rows['ball_16'];
        $hm[]		= $rows['ball_17'];
        $hm[]		= $rows['ball_18'];
        $hm[]		= $rows['ball_19'];
        $hm[]		= $rows['ball_20'];
        if($rows['state']=="0"){
            $ok = '<a href="js_bjkn.php?qi='.$rows['qishu'].'&jsType=0&s_time='.$query_time.'" title="点击结算"><font color="#0000FF">未结算</font></a>';
        }else{
            $ok = '<a href="js_bjkn.php?qi='.$rows['qishu'].'&jsType=1&s_time='.$query_time.'" title="重新结算"><font color="#FF0000">已结算</font></a>';
        }
        if($rows['state']=="2"){
            $again = '<font color="#FF0000" style="font-size:18px">√</font>';
        }else{
            $again = '<font color="#0000FF" style="font-size:20px">×</font>';
        }
        ?>
        <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>; line-height:20px;">
            <td height="25" align="center" valign="middle">北京快乐8</td>
            <td align="center" valign="middle"><?=$rows['qishu']?></td>
            <td align="center" valign="middle" style="width: 100px;"><?=$rows['datetime']?></td>
            <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_1']?>.png"></td>
            <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_2']?>.png"></td>
            <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_3']?>.png"></td>
            <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_4']?>.png"></td>
            <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_5']?>.png"></td>
            <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_6']?>.png"></td>
            <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_7']?>.png"></td>
            <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_8']?>.png"></td>
            <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_9']?>.png"></td>
            <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_10']?>.png"></td>
            <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_11']?>.png"></td>
            <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_12']?>.png"></td>
            <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_13']?>.png"></td>
            <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_14']?>.png"></td>
            <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_15']?>.png"></td>
            <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_16']?>.png"></td>
            <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_17']?>.png"></td>
            <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_18']?>.png"></td>
            <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_19']?>.png"></td>
            <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_20']?>.png"></td>
            <td><?=Kl8_convert(Kl8_Auto($hm,2))?></td>
            <td><?=Kl8_convert(Kl8_Auto($hm,3))?></td>
            <td><?=Kl8_convert(Kl8_Auto($hm,5))?></td>
            <td><?=Kl8_convert(Kl8_Auto($hm,4))?></td>
            <td><?=Kl8_Auto($hm,1)?></td>
            <td><?=$ok?></td>
            <td><?=$again?></td>
            <td>
                <a href="?id=<?=$rows["id"]?>&s_time=<?=$query_time?>&qishu_query=<?=$qishu_query?>">编辑</a>
				<a onclick="return confirm('确定删除?');" href="?action=delete&id=<?=$rows["id"]?>&s_time=<?=$query_time?>&qishu_query=<?=$qishu_query?>">删除</a>
                <a onclick='queryResult("<?=$rows['id']?>")' title="查看修改记录"><font>查看记录</font></a>
                <input type="hidden" id="<?='prev_text'.$rows['id']?>" value="<?=$rows['prev_text']?>" />
            </td>
        </tr>
    <?php
    }
    ?>
</table></td>
</tr>
</table>
</div>
</body>
</html>