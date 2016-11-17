var GameRtype = new Array();
var SP_wtypes = new Array();
var gid ='';
function Check(uid,gtype,gid,lang){
	document.getElementById("show_table").style.top=document.body.scrollTop+event.clientY+10;
	SP_Data.location ="./result_sp.php?uid="+uid+"&gtype="+gtype+"&gid="+gid+"&langx="+lang;
}

function show_key_result_sp(){
	var rary =SP_wtypes;
	var rary1=new Array("F","L");
	var rarysub=new Array("H","C");
	var tmpDate= new Array();
	var tmp_table = document.getElementById("show_table_sp").innerHTML;
	for(var j=0; j < rary.length; j++) {
		for(var k=0; k < rary1.length; k++) {
			if(GameRtype[gid+rary[j]+rary1[k]][1]=="無開放" || GameRtype[gid+rary[j]+rary1[k]][1]=="无开放" || GameRtype[gid+rary[j]+rary1[k]][1]=="N/A"){
			tmp_table  = tmp_table.replace('*'+rary[j]+rary1[k]+'*',GameRtype[gid+rary[j]+rary1[k]][1]).replace('*'+rary[j]+rary1[k]+'A'+'*',"mor_2").replace('*'+rary[j]+rary1[k]+'B'+'*',"morth_2");
		}else{
			tmp_table  = tmp_table.replace('*'+rary[j]+rary1[k]+'*',GameRtype[gid+rary[j]+rary1[k]][1]).replace('*'+rary[j]+rary1[k]+'A'+'*',"mor_1").replace('*'+rary[j]+rary1[k]+'B'+'*',"morth_1");
			}
		}
	}
	show_table.innerHTML =tmp_table ;
}

function Closedv(){
	show_table.innerHTML="";
}


function chg_gtype(tmpValue,tmpURL){
	var strUrl ="";
	if(tmpValue=="FS"){
		strUrl ="/app/member/result/result_fs.php";
	}else if(tmpValue=="SFS"){
		strUrl ="/app/member/result/result_sfs.php";
	}else{
		strUrl ="/app/member/result/result.php";
	}
	self.location.href=strUrl+"?"+tmpURL;
}

//--------------判斷聯盟顯示或隱藏----------------
function showLEG(leg){
  //alert("1111==========>>>"+leg);
for (i=0;i<myleg.length;i++){
	 //alert("1111==========>>>"+leg+"<===========>"+myleg[i][0]);
	 //alert(top.gtype);
	if (leg==myleg[i][0]){
		//alert(">>>>>>>>>>>>>>"+myleg[i][1]);
		
		if ( document.getElementById("TR_"+myleg[i][1]).style.display!="none"){
			
			showLegIcon(leg,"LegClose",myleg[i][1],"none");
		}else{
			showLegIcon(leg,"LegOpen",myleg[i][1],"");
		}
	}	
}	

}
function showLegIcon(leg,state,gnumH,display){
	//var  ary=document.getElementById("S_"+gnumH);
		//alert(ary.innerHTML);	
			
	//for (var j=0;j<ary.length;j++){
	//	ary.innerHTML="<span id='"+state+"'></span>";
	//}
	//alert(">>>>>>>>>>"+gnumH+"<-------->"+display);
	var  ary=document.getElementsByName("S_"+gnumH);
//	alert(">>>>>>>>"+ary.length);
	for (var j=0;j<ary.length;j++){
		ary[j].innerHTML="<span id='"+state+"'></span>";
		//alert("<---------->"+ary[j].innerHTML+"<-------->"+state);
	}
	try{
		document.getElementById("TR_9_"+gnumH).style.display=display;
	}catch(E){}
	try{
		document.getElementById("TR_8_"+gnumH).style.display=display;
	}catch(E){}
	try{
		document.getElementById("TR_7_"+gnumH).style.display=display;
	}catch(E){}
		try{
		document.getElementById("TR_6_"+gnumH).style.display=display;
	}catch(E){}
		try{
		document.getElementById("TR_5_"+gnumH).style.display=display;
	}catch(E){}
		try{
		document.getElementById("TR_4_"+gnumH).style.display=display;
	}catch(E){}
		try{
		document.getElementById("TR_3_"+gnumH).style.display=display;
	}catch(E){}
	try{
		document.getElementById("TR_2_"+gnumH).style.display=display;
	}catch(E){}
	try{
		document.getElementById("TR_1_"+gnumH).style.display=display;
	}catch(E){}
	try{
		document.getElementById("TR_"+gnumH).style.display=display;
	}catch(E){}
	
	
	/*
	try{
		body_browse.document.getElementById("TR3_"+gnumH).style.display=display;
	}catch(E){}
	try{
		body_browse.document.getElementById("TR2_"+gnumH).style.display=display;
	}catch(E){}
	try{
		body_browse.document.getElementById("TR1_"+gnumH).style.display=display;
	}catch(E){}
	try{
		body_browse.document.getElementById("TR_"+gnumH).style.display=display;
	}catch(E){} */
}

function onchangeDate(url,tmpgtype,lang){
        var todayTmp= document.getElementById('today_gmt');
       location.href=url+"&game_type="+tmpgtype+"&today="+todayTmp.value+"&langx="+lang;

}                                   
function reload_var(Level){
	location.reload();
}
//window.onscroll = scroll;

function scroll()
{
	var refresh_right= document.getElementById('refresh_right');
	
	//refresh_right.style.top=document.body.scrollTop+21+34+25+10;
	refresh_right.style.top=document.body.scrollTop+(document.body.clientHeight-118)/2;
	                      // 捲軸位置              +( frame高度                -header高度)/2
	
 //alert("scroll event detected! "+document.body.scrollTop);
// 
	//conscroll.style.display="block";
//conscroll.style.top=document.body.scrollTop;
 // note: you can use window.innerWidth and window.innerHeight to access the width and height of the viewing area
}
//----------------------
