<?php
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/com_chk.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/class/sys_announcement.php");
include_once($C_Patch."/app/member/cache/website.php");
$msg_list = sys_announcement::getAnnouncementList();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>系统公告</title> 
<style type="text/css">
* {
    margin: 0;
    padding: 0;
}
body{font-size:12px; margin:0px; background: #E1F0F7;}
.td_2 {
    border-bottom: 1px solid #7CBDDC;
    border-right: 1px solid #B6DAEB;
    border-left: 1px solid #B6DAEB;
}
.td_3 {
    border-bottom: 1px solid #7CBDDC;
    border-right: 1px solid #B6DAEB;
    overflow: auto; 
    line-height:20px;
}
.td_1 {
    border-right: 1px solid #fff;
}
.se_1 {
    height: 30px;
    background: url(/images/gg_2.jpg) no-repeat;
}
.se_2 {
    background: url(/images/gg_3.jpg) repeat-x;
    text-align: right;
}
</style>
</head> 
<body> 
<table border="0" align="center" cellpadding="0" cellspacing="0" class="memberdiv">
    <tr class="se_2">
        <td class="se_1" width="91"></td>
        <td><img src="/images/gg_4.jpg" ></td>
   </tr>
   <tr>
        <td valign="middle" height="20" bgcolor="#B6DAEB" align="center" class="td_1">时 间</td>
        <td valign="middle" bgcolor="#B6DAEB" align="center" class="font-blackmid">公告内容</td>
</tr>

<?php
foreach($msg_list as $key => $value){
    if($key>39){
        break;
    }
?>
    <tr>
        <td class="td_2" valign="middle" height="20" align="center"><?=date("Y-m-d",strtotime($value["create_date"]))?></td>
        <td class="td_3" valign="middle" height="20" align="left" width="507"><?=$value["content"]?></td>
    </tr>
<?php
}
?>
 
   </table>
</body> 
</html>