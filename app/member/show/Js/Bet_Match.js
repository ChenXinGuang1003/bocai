
//typename_in游戏类型	
//touzhuxiang_in游戏玩法	
//match_id_in比赛ID	
//point_column_in下注类型（如Match_DsSpl=单双-双）	
//ben_add_in//计算输赢，ben_add为1时减本金，否则不减
//is_lose_in	如果为1，说明是滚球，需要等待确认（注，篮球滚球不需要确认）
//xx_in 玩法信息，如单，双  不入数据库
//touzhutype 1未串关，0为单式
function setbet(typename_in,touzhuxiang_in,match_id_in,point_column_in,ben_add_in,is_lose_in,xx_in){
	if($(parent.parent.topFrame.document).find("#username").length){ //没有登录
		alert("登录后才能进行此操作");
		return ;
	}
	if(!arguments[5]) is_lose_in = 0;
	var touzhutype=parent.leftFrame.touzhutype;
	var checked=parent.leftFrame.checked;
	parent.leftFrame.typename_in=typename_in;
	parent.leftFrame.touzhuxiang_in=touzhuxiang_in;
	parent.leftFrame.match_id_in=match_id_in;
	parent.leftFrame.point_column_in=point_column_in;
	parent.leftFrame.ben_add_in=ben_add_in;
	parent.leftFrame.is_lose_in=is_lose_in;
	parent.leftFrame.xx_in=xx_in;
	$.post("/app/member/ajaxleft/bet_match.php",{ball_sort:typename_in,match_id:match_id_in,touzhuxiang:touzhuxiang_in,point_column:point_column_in,ben_add:ben_add_in,is_lose:is_lose_in,xx:xx_in,touzhutype:touzhutype,checked:checked,rand:Math.random()},function (data){  parent.leftFrame.bet(data); }); 
}