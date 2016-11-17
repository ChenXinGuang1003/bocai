function winOpen(url, name)
{
	var iWidth = 1024;
	var iHeight = 600;
	var iTop = Math.round((window.screen.height - parseInt(iHeight)) / 2);
	var iLeft = Math.round((window.screen.width - parseInt(iWidth)) / 2);
	var temp = "width=" + iWidth + ",height=" + iHeight + ",top=" + iTop + ",left=" + iLeft + ",scrollbars=yes,resizable=no,status=no";
	window.open(url, name, temp);
}

function openLive()
{
	winOpen("/zhenren/index.php", "live");
}