<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
include "../app/member/include/address.mem.php";
include "../app/member/include/config.inc.php";
include "../app/member/class/sys_announcement.php";

global $mysqli;
$newestAnnouncement = sys_announcement::getNewestAnnouncement();
$announcementArray = sys_announcement::getAnnouncementList();
$mysqli->close();

$subPage = '';
foreach ($announcementArray as $announcement) {
    $subPage = $subPage.'
        <tr>
          <td style="text-align: left;">'.$announcement['create_date'].'</td>
          <td style="text-align: left;">'.$announcement['content'].'</td>
        </tr>';
}

echo '
<div>
    <div class="Mar"><marquee scrollamount="2" scrolldelay="20">'.$newestAnnouncement.'</marquee></div>
    <p></p>
    <div class="round-table">
      <table id="table5">
        <tr class="title_tr">
          <td colspan="2">历史讯息</td>
        </tr>
        <tr class="test" style="text-align: center; background-color: #ccc">
          <td width="160px">日期</td>
          <td>讯息</td>
        </tr>
        '.$subPage.'
      </table>
    </div>
</div>';
exit;