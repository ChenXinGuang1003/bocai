﻿// JavaScript Document
var dbs  = null;
var data = null;
var window_hight	=	0; //窗口高度
var window_lsm		=	0; //窗口联赛名
function loaded(league,thispage,p){
	var league = encodeURI(league);
	$.getJSON("json/tennis.php?leaguename="+league+"&CurrPage="+thispage+"&callback=?",function(json){
		var pagecount	=	json.fy.p_page;
		var page		=	json.fy.page;
		var fenye		=	"";
		window_hight	=	json.dh;
		window_lsm		=	json.lsm;
		if(dbs !=null){
			if(thispage==0 && p!='p'){	
				data = dbs;
				dbs  = json.db;  
			}else{
				dbs  = json.db;  
				data = dbs;
			}
		}else{
			dbs  = json.db;
			data = dbs;
		}	
	
		if(pagecount == 0){
			$("#datashow").html("<table border='0' cellspacing='1' cellpadding='0' bgcolor='#ACACAC' class='box'><tr><th class='shijian'>时间</th><th class='duiwu'>主队 / 客队</th><th class='duying'>独赢</th><th class='rangqiu'>让盘</th><th class='daxiao'>大小</th><th class='rangqiu'>单双</th></tr><tr><td height='100' colspan='6' align='center' bgcolor='#FFFFFF'>暂无任何赛事</td></tr></table>");
			$("#top").html('');
		}else{
			for(var i=0; i<pagecount; i++){
				if(i != page){
					fenye+="<li><a href='javascript:NumPage(" + i + ");' id=\"page_this\">" + (i+1) + "</a></li>";
				}else{
					fenye+="<li class='i'><a href='javascript:NumPage(" + i + ");' id=\"page_this\"><font color=#FFFFFF>" + (i+1) + "</font></a></li>";
				}
			}
			$("#top").html(fenye);
	
			var htmls="<table border='0' cellspacing='1' cellpadding='0' bgcolor='#ACACAC' class='box'><tr><th class='shijian'>时间</th><th class='duiwu'>主队 / 客队</th><th class='duying'>独赢</th><th class='rangqiu'>让盘</th><th class='daxiao'>大小</th><th class='rangqiu'>单双</th></tr>";
			var lsm = "";
			for(var i=0; i<dbs.length; i++){
				if(dbs[i]["Match_Ho"]!="0" || dbs[i]["Match_DxDpl"]!="0" || dbs[i]["Match_DsDpl"]!="0" || dbs[i]["Match_BzM"]!="0" ){
				if(lsm != dbs[i]["Match_Name"]){
					lsm = dbs[i]["Match_Name"];
					htmls+="<tr>";
					htmls+="<td colspan='8' class='liansai'><a href=\"javascript:void(0)\" title='选择 >> "+lsm+"' onclick=\"javascript:check_one('"+lsm+"');\" >"+lsm+"</a></td>";
					htmls+="</tr>";
				}

				var fwin = (dbs[i]["Match_BzM"]);
                if (fwin.length == 3){
                    fwin = fwin + "0";
                }
                if (fwin.length == 1){
                    fwin = fwin + ".00";
                }
				
                var flose = (dbs[i]["Match_BzG"]!="@"?dbs[i]["Match_BzG"]:"0");
                if (flose.length == 3){
                    flose = flose + "0";
                }
                if (flose.length == 1){
                    flose = flose + ".00";
                }
				
                

				var tempfwin="<a href=\"javascript:void(0)\" title=\""+dbs[i]["Match_Master"]+"\" onclick=\"javascript:setbet('网球单式','标准盘-"+ dbs[i]["Match_Master"] +"-独赢','" + dbs[i]["Match_ID"] + "','Match_BzM','0','1','"+ dbs[i]["Match_Master"] + "');\" style='"+(dbs[i]["Match_BzM"]!=data[i]["Match_BzM"] && data[i]["Match_ID"]==dbs[i]["Match_ID"]?"background:#FFFF00":"")+"'>" + (fwin!="0.00"?fwin:"") + "</a>";
                var tempflose="<a href=\"javascript:void(0)\" title=\""+dbs[i]["Match_Guest"]+"\" onclick=\"javascript:setbet('网球单式','标准盘-"+ dbs[i]["Match_Guest"] +"-独赢','" + dbs[i]["Match_ID"] + "','Match_BzG','0','1','"+ dbs[i]["Match_Guest"] + "');\"  style='"+(dbs[i]["Match_BzG"]!=data[i]["Match_BzG"] && data[i]["Match_ID"]==dbs[i]["Match_ID"]?"background:#FFFF00":"")+"'>" + (flose !="0.00"?flose:"") + "</a>";



			htmls+="<tr class='bian_out' onMouseOver=\"this.className='bian_over'\" onMouseOut=\"this.className='bian_out'\">";
			htmls+="<td class='zhong'>"+dbs[i]["Match_Date"]+"</td>";
    		htmls+="<td class='line'><span class='zhu'>"+dbs[i]["Match_Master"]+"</span><br><span class='ke'>"+dbs[i]["Match_Guest"]+"</span></td>";
    		htmls+="<td class='zhong line'>"+tempfwin+"<br>"+tempflose+"</td>";
			htmls+="<td><div class='rangqiu_odds'><span class='odds'>"+(dbs[i]["Match_Ho"]<="0" ? "" :("<a href=\"javascript:void(0)\" title=\""+dbs[i]["Match_Master"]+"\" onclick=\"javascript:setbet('网球单式','让盘-"+(dbs[i]["Match_ShowType"]=="H"?"主让":"客让")+dbs[i]["Match_RGG"]+"-"+dbs[i]["Match_Master"]+"','"+dbs[i]["Match_ID"]+"','Match_Ho','1','0','"+dbs[i]["Match_Master"]+"');\" style='"+(dbs[i]["Match_Ho"]!=data[i]["Match_Ho"] && data[i]["Match_ID"]==dbs[i]["Match_ID"]?"background:#FFFF00":"")+"'>"+formatNumber(dbs[i]["Match_Ho"],2)+"</a>"))+"</span><span class='pankou'>"+((dbs[i]["Match_ShowType"]=="H" && dbs[i]["Match_Ho"]!="0")? dbs[i]["Match_RGG"] :"")+"</span><br><span class='odds'>"+(dbs[i]["Match_Ao"]<="0" ? "" :("<a href=\"javascript:void(0)\" title=\""+dbs[i]["Match_Guest"]+"\" onclick=\"javascript:setbet('网球单式','让盘-"+(dbs[i]["Match_ShowType"]=="H"?"主让":"客让")+dbs[i]["Match_RGG"]+"-"+dbs[i]["Match_Guest"]+"','"+dbs[i]["Match_ID"]+"','Match_Ao','1','0','"+dbs[i]["Match_Guest"]+"');\" style='"+(dbs[i]["Match_Ao"]!=data[i]["Match_Ao"] && data[i]["Match_ID"]==dbs[i]["Match_ID"]?"background:#FFFF00":"")+"'>"+formatNumber(dbs[i]["Match_Ao"],2)+"</a>"))+"</span><span class='pankou'>"+((dbs[i]["Match_ShowType"]=="C" && dbs[i]["Match_Ho"]!="0")? dbs[i]["Match_RGG"] :"")+"</span></div></td>";
    		htmls+="<td><div class='rangqiu_odds'><span class='odds'>"+(dbs[i]["Match_DxDpl"]=="0" ? "" :("<a href=\"javascript:void(0)\" title=\"大\" onclick=\"javascript:setbet('网球单式','大小-"+dbs[i]["Match_DxGG1"]+"','"+dbs[i]["Match_ID"]+"','Match_DxDpl','1','0','"+dbs[i]["Match_DxGG1"]+"');\" style='"+(dbs[i]["Match_DxGG1"]!=data[i]["Match_DxGG1"] && data[i]["Match_ID"]==dbs[i]["Match_ID"]?"background:#FFFF00":"")+"'>"+formatNumber(dbs[i]["Match_DxDpl"],2)+"</a>"))+"</span><span class='pankou'>"+(dbs[i]["Match_DxGG1"]!="O" ? dbs[i]["Match_DxGG1"] :"")+"</span><br><span class='odds'>"+(dbs[i]["Match_DxXpl"]=="0" ? "" :("<a href=\"javascript:void(0)\" title=\"小\" onclick=\"javascript:setbet('网球单式','大小-"+dbs[i]["Match_DxGG2"]+"','"+dbs[i]["Match_ID"]+"','Match_DxXpl','1','0','"+dbs[i]["Match_DxGG2"]+"');\" style='"+(dbs[i]["Match_DxXpl"]!=data[i]["Match_DxXpl"] && data[i]["Match_ID"]==dbs[i]["Match_ID"]?"background:#FFFF00":"")+"'>"+formatNumber(dbs[i]["Match_DxXpl"],2)+"</a>"))+"</span><span class='pankou'>"+(dbs[i]["Match_DxGG2"]!="U" ? dbs[i]["Match_DxGG2"] :"")+"</span></div></td>";
    		htmls+="<td><div class='rangqiu_odds'><span class='odds'>"+(dbs[i]["Match_DsDpl"]<="0" ? "" :("<a href=\"javascript:void(0)\" title=\"单\" onclick=\"javascript:setbet('网球单式','单双-单','"+dbs[i]["Match_ID"]+"','Match_DsDpl','0','0','单');\" style='"+(dbs[i]["Match_DsDpl"]!=data[i]["Match_DsDpl"] && data[i]["Match_ID"]==dbs[i]["Match_ID"]?"background:#FFFF00":"")+"'>"+formatNumber(dbs[i]["Match_DsDpl"],2)+"</a>"))+"</span><span class='pankou'>"+(dbs[i]["Match_DsDpl"]>"0" ? "单" :"")+"</span><br><span class='odds'>"+(dbs[i]["Match_DsDpl"]<="0" ? "" :("<a href=\"javascript:void(0)\" title=\"双\" onclick=\"javascript:setbet('网球单式','单双-双','"+dbs[i]["Match_ID"]+"','Match_DsSpl','0','0','双');\" style='"+(dbs[i]["Match_DsDpl"]!=data[i]["Match_DsDpl"] && data[i]["Match_ID"]==dbs[i]["Match_ID"]?"background:#FFFF00":"")+"'>"+formatNumber(dbs[i]["Match_DsSpl"],2)+"</a>"))+"</span><span class='pankou'>"+(dbs[i]["Match_DsSpl"]!="0" ? "双" :"")+"</span></div></td>";
    		htmls+="</tr>";	
			}
			}
			
			htmls+="</table>";
			if(htmls == "<table border='0' cellspacing='1' cellpadding='0' bgcolor='#ACACAC' class='box'><tr><th class='shijian'>时间</th><th class='duiwu'>主队 / 客队</th><th class='duying'>独赢</th><th class='rangqiu'>让盘</th><th class='daxiao'>大小</th><th class='rangqiu'>单双</th></tr></table>"){
				htmls = "<table border='0' cellspacing='1' cellpadding='0' bgcolor='#ACACAC' class='box'><tr><th class='shijian'>时间</th><th class='duiwu'>主队 / 客队</th><th class='duying'>独赢</th><th class='rangqiu'>让盘</th><th class='daxiao'>大小</th><th class='rangqiu'>单双</th></tr><tr><td height='100' colspan='6' align='center' bgcolor='#FFFFFF'>暂无任何赛事</td></tr></table>";
			}
			$("#datashow").html(htmls);
		}
	})
}

$(document).ready(function(){
	$("#xzls").click(function(){ //选择联赛
		JqueryDialog.Open('网球单式', 'json/dialog.php?lsm='+window_lsm, 600, window_hight);
	});
});