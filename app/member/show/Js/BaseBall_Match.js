function setbet(typename_in,touzhuxiang_in,match_id_in,point_column_in,ben_add_in,is_lose_in,xx_in){
	if($(parent.parent.topFrame.document).find("#username").length){ //没有登录
		alert("登录后才能进行此操作");
		return ;
	}

	var checked=parent.leftFrame.checked;
	parent.leftFrame.typename_in=typename_in;
	parent.leftFrame.touzhuxiang_in=touzhuxiang_in;
	parent.leftFrame.match_id_in=match_id_in;
	parent.leftFrame.point_column_in=point_column_in;
	parent.leftFrame.ben_add_in=ben_add_in;
	parent.leftFrame.is_lose_in=0;
	parent.leftFrame.xx_in=xx_in;
    $.post("/app/member/ajaxleft/baseball_match.php",{ball_sort:typename_in,match_id:match_id_in,touzhuxiang:touzhuxiang_in,point_column:point_column_in,ben_add:ben_add_in,xx:xx_in,checked:checked,rand:Math.random()},function (data){  parent.leftFrame.bet(data); });  
}
