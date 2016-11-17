
var m_sports;
var MaxMilliSec = 30000;
// when click change menu type exec SetMenuData need to show odds
var IsChangeMenuType = false;
var Tmpl_Initialed = false; // flag to record menu is template loaded ?
var ShowMenuFlag = true;  // for first load data
var ForceMenuData = false; // Force to get menu data from Menu_data.aspx
var isParlay = false;
var SportCount=7;
var OpenLiveSportItem =true;
var isSubMenuOpened = false;
var hasRacing = false;

function initialMenu() {

	/*
  if (document.getElementById("tmplEnd") == null) {
    Tmpl_Initialed = false;
    window.setTimeout(initialMenu, 200);
    return;
  }
	*/
  var imgsrc=imgSrc;
  m_sports=M;

  var menuTitle=document.getElementById('subnav_head');
  menuTitle.style.display='none';

  //m_mouseover(window.top.LastSelectedMenu,imgsrc);
  SetMenuData(m_sports,imgsrc);
  setInterval("AutoRefreshMenuData()",MaxMilliSec);
  Tmpl_Initialed = true;

  ifrmaeresizt();
  menuTitle.style.display='';
}


function AutoRefreshMenuData() {

}

//------------------ Switch Menu Type---------------------------
function m_mouseover(m_type,imgsrc) {
  var objMenu;
  if (m_type == 0) {

    objMenu = document.getElementById('menu_all');
    if(objMenu!=null){
        objMenu.className = 'current';
        }
        objMenu = document.getElementById('subnav_head');
    if(objMenu!=null){
        objMenu.className = 'item';
        }

        //  objMenu = document.getElementById('img_menu_oln');
        //  objMenu.src = imgsrc + 'menu_olympic_2.gif';
    objMenu = document.getElementById('menu_wp');

    if(objMenu!=null){
          objMenu.className = '';
    }
//  } else if(m_type == 1){
//    objMenu = document.getElementById('img_menu_oln');
//    objMenu.src = imgsrc + 'menu_olympic_1.gif';
//    objMenu = document.getElementById('menu_all');
//    objMenu.className = 'subnav_all1';
  } else if(m_type == 1 || m_type == 2){
      objMenu = document.getElementById('menu_all');
      if(objMenu!=null) {
        objMenu.className = '';
        }
    objMenu = document.getElementById('menu_wp');
    if(objMenu!=null){
        objMenu.className = 'current';
    }
//    objMenu = document.getElementById('subnav_head');
//    if(objMenu!=null){
//        objMenu.className = 'item2';
//        }
    }
}

function m_onmouseout(imgsrc) {
  var objMenu;

  if (fFrame.LastSelectedMenu == 0) {
    objMenu = document.getElementById('menu_all');
    if(objMenu!=null){
        objMenu.className = 'current';
        }
        objMenu = document.getElementById('subnav_head');
    if(objMenu!=null){
        objMenu.className = 'item';
        }
    objMenu = document.getElementById('menu_wp');
    if(objMenu!=null){
        objMenu.className = '';
    }

  }
//  else if(fFrame.LastSelectedMenu == 1)
//  {

//    objMenu = document.getElementById('img_menu_oln');
//    objMenu.src = imgsrc + 'menu_olympic_1.gif';

//    objMenu = document.getElementById('menu_all');
//    objMenu.className = 'subnav_all1';
//  }
  else if(LastSelectedMenu == 1 || LastSelectedMenu == 2)
    {
      objMenu = document.getElementById('menu_all');
        if(objMenu!=null){
        objMenu.className = '';
        }
      objMenu = document.getElementById('menu_wp');
      if(objMenu!=null){
        objMenu.className = 'current';
    }
//    objMenu = document.getElementById('subnav_head');
//    if(objMenu!=null){
//        objMenu.className = 'item2';
//        }
    }
}



function ShowOdds(Market, SportType, DispVer) {
  for (var i = 1; i <= SportCount; i++) {
    if (i == SportType) {
      if(document.getElementById(i+'_body')!=null) {
        document.getElementById(i+'_body').style.display = 'block';
		LastSelectedSport=SportType;
      }
    }
  }

}

function SwitchSport(market,sport,isCkecked,IsAutoRefresh){
  //  "market == 'custom'"  ---  only for 4201400(QA BUG #2183)
  if (sport > 0 && sport == LastSelectedSport && isSubMenuOpened == true ) {
      CloseSubMenu(market, sport);
  } else {

    if(market=='') {
      market=LastSelectedMArket;
    }

    //Open Selected Sport
	
    if (CheckCountAndSetOtherItem(market, sport)) {	
        isSubMenuOpened = true;
    } else {
        sport=-1;
    }

    // Close non-selected sports
    this.CloseSports(market,sport);


    //for first load and auto refresh
    if (IsAutoRefresh) {
      return;
    }
    this.ShowOdds(market, sport, DisplayMode);
  }
}

function CloseSports(market,sport)
{
  //Scott
  for (var i = 1; i <= SportCount; i++) {
    if (i != sport) {
      if(document.getElementById(i+'_body')!=null) {
        document.getElementById(i+'_body').style.display = 'none';
      }
    }
  }
}

function SetMenuBaseItem(market,sport) {
  var spObj = null;
  var spObj_head = null;

	spObj = document.getElementById(sport + '_body');
	spObj_head = document.getElementById(sport + '_head');
    
  
  //maggie add  Early haven't Finance and Horse Race
  if (spObj != null){
    if(!CheckCountAndSetOtherItem(market,sport)){
        spObj_head.style.display='none';
        spObj.style.display='none';
    } else {
      spObj_head.style.display='';
      spObj.style.display='';
    }
  }
}

function CheckCountAndSetOtherItem(market,sport)
{
    // 足球
    if (sport == 1)
    {
	  var TotalCount=0;
		// 独赢&让球&大小
      var bettypeName = market+"_A";
      spObj = document.getElementById(sport+'_A');

		spObj.style.display = '';
		document.getElementById(sport+'_A_Cnt').innerHTML = m_sports[sport][bettypeName];
		TotalCount += parseInt(m_sports[sport][bettypeName],10);


      // 波胆
      var bettypeName = market+"_B";
      spObj = document.getElementById(sport+'_B');

        spObj.style.display = '';
        document.getElementById(sport+'_B_Cnt').innerHTML = m_sports[sport][bettypeName];
      
	  // 上半场波胆
      var bettypeName = market+"_G";
      spObj = document.getElementById(sport+'_G');

        spObj.style.display = '';
        document.getElementById(sport+'_G_Cnt').innerHTML = m_sports[sport][bettypeName];


      // 单 / 双 & 总入球
      bettypeName = market+"_C";
      spObj = document.getElementById( sport+'_C');

        spObj.style.display = '';
        document.getElementById(sport+'_C_Cnt').innerHTML = m_sports[sport][bettypeName];
      

      // 半场 / 全场
      bettypeName = market+"_D";
      spObj = document.getElementById( sport+'_D');

        spObj.style.display = '';
        document.getElementById( sport+'_D_Cnt').innerHTML = m_sports[sport][bettypeName];
      

      //混合过关
      bettypeName = market+"_E";
      spObj=document.getElementById( sport+'_E');

        spObj.style.display='';
        document.getElementById( sport+'_E_Cnt').innerHTML = m_sports[sport][bettypeName];
      

      // 冠军
      bettypeName = market+"_F";
      spObj = document.getElementById( sport+'_F');

        spObj.style.display = '';
        document.getElementById(sport+'_F_Cnt').innerHTML = m_sports[sport][bettypeName];
        TotalCount +=  parseInt(m_sports[sport][bettypeName],10);
      

	  // 賽果
      bettypeName = "R";
      spObj = document.getElementById( sport+'_R');

        spObj.style.display = '';
        document.getElementById(sport+'_R_Cnt').innerHTML = m_sports[sport][bettypeName];
      

	  // 滾球
      bettypeName = "L";
      spObj = document.getElementById( 'L_'+sport+'_head');
      if (m_sports[sport][bettypeName] <= 0) {
        //spObj.style.display = 'none';
		document.getElementById('img_'+sport+'_LV').style.display = 'none';
      } else {
        spObj.style.display = '';
		if(market=='E')
		{
			document.getElementById('img_'+sport+'_LV').style.display = 'none';
		}else{
			document.getElementById('img_'+sport+'_LV').style.display = '';
		}
        document.getElementById('L_'+sport+'_Cnt').innerHTML = m_sports[sport][bettypeName];
		
      }
		
		document.getElementById(sport+'_Cnt').innerHTML = TotalCount;
    }



// 籃球
    if (sport == 2)
    {
	  var TotalCount=0;
		// 让球&大小&单/双
      var bettypeName = market+"_A";
      spObj = document.getElementById(sport+'_A');

        spObj.style.display = '';
        document.getElementById(sport+'_A_Cnt').innerHTML = m_sports[sport][bettypeName];
        TotalCount += parseInt(m_sports[sport][bettypeName],10);
      

      // 混合过关
      var bettypeName = market+"_B";
      spObj = document.getElementById(sport+'_B');

        spObj.style.display = '';
        document.getElementById(sport+'_B_Cnt').innerHTML = m_sports[sport][bettypeName];
      

      // 冠军
      bettypeName = market+"_C";
      spObj = document.getElementById( sport+'_C');

        spObj.style.display = '';
        document.getElementById(sport+'_C_Cnt').innerHTML = m_sports[sport][bettypeName];
        TotalCount +=  parseInt(m_sports[sport][bettypeName],10);
      

	  // 单节
      bettypeName = market+"_D";
      spObj = document.getElementById( sport+'_D');

        spObj.style.display = '';
        document.getElementById(sport+'_D_Cnt').innerHTML = m_sports[sport][bettypeName];
        TotalCount +=  parseInt(m_sports[sport][bettypeName],10);
      

	  // 賽果
      bettypeName = "R";
      spObj = document.getElementById( sport+'_R');

        spObj.style.display = '';
        document.getElementById(sport+'_R_Cnt').innerHTML = m_sports[sport][bettypeName];
      

		// 滾球
      bettypeName = "L";
      spObj = document.getElementById( 'L_'+sport+'_head');
      if (m_sports[sport][bettypeName] <= 0) {
        //spObj.style.display = 'none';
		document.getElementById('img_'+sport+'_LV').style.display = 'none';
      } else {
        spObj.style.display = '';
        document.getElementById('L_'+sport+'_Cnt').innerHTML = m_sports[sport][bettypeName];
		if(market=='E')
		{
			document.getElementById('img_'+sport+'_LV').style.display = 'none';
		}else{
			document.getElementById('img_'+sport+'_LV').style.display = '';
		}
      }

		document.getElementById(sport+'_Cnt').innerHTML = TotalCount;
    }

// 网球
    if (sport == 3)
    {
	  var TotalCount=0;
		// 独赢&让盘&大小&单/双
      var bettypeName = market+"_A";
      spObj = document.getElementById(sport+'_A');

        spObj.style.display = '';
        document.getElementById(sport+'_A_Cnt').innerHTML = m_sports[sport][bettypeName];
        TotalCount += parseInt(m_sports[sport][bettypeName],10);
      

	/*
      // 赛盘投注
      var bettypeName = market+"_B";
      spObj = document.getElementById(sport+'_B');
      if (m_sports[sport][bettypeName] <= 0) {
        spObj.style.display = 'none';
      } else {
        spObj.style.display = '';
        document.getElementById(sport+'_B_Cnt').innerHTML = m_sports[sport][bettypeName];
      }

      // 综合过关
      bettypeName = market+"_C";
      spObj = document.getElementById( sport+'_C');
      if (m_sports[sport][bettypeName] <= 0) {
        spObj.style.display = 'none';
      } else {
        spObj.style.display = '';
        document.getElementById(sport+'_C_Cnt').innerHTML = m_sports[sport][bettypeName];
        TotalCount +=  parseInt(m_sports[sport][bettypeName],10);
      }
	  */

	// 优胜冠军
      bettypeName = market+"_D";
      spObj = document.getElementById( sport+'_D');

        spObj.style.display = '';
        document.getElementById( sport+'_D_Cnt').innerHTML = m_sports[sport][bettypeName];
      

	  // 賽果
      bettypeName = "R";
      spObj = document.getElementById( sport+'_R');

        spObj.style.display = '';
        document.getElementById(sport+'_R_Cnt').innerHTML = m_sports[sport][bettypeName];
      

/*
	// 滾球
      bettypeName = "L";
      spObj = document.getElementById( 'L_'+sport+'_head');
      if (m_sports[sport][bettypeName] <= 0) {
        spObj.style.display = 'none';
		document.getElementById('img_'+sport+'_LV').style.display = 'none';
      } else {
        spObj.style.display = '';
        document.getElementById('L_'+sport+'_Cnt').innerHTML = m_sports[sport][bettypeName];
		if(market=='E')
		{
			document.getElementById('img_'+sport+'_LV').style.display = 'none';
		}else{
			document.getElementById('img_'+sport+'_LV').style.display = '';
		}
      }

	  */

		document.getElementById(sport+'_Cnt').innerHTML = TotalCount;
    }
  

  // 排球
    if (sport == 4)
    {
	  var TotalCount=0;
		// 独赢&让分&大小&单/双
      var bettypeName = market+"_A";
      spObj = document.getElementById(sport+'_A');

        spObj.style.display = '';
        document.getElementById(sport+'_A_Cnt').innerHTML = m_sports[sport][bettypeName];
        TotalCount += parseInt(m_sports[sport][bettypeName],10);
      
/*
      // 赛盘投注
      var bettypeName = market+"_B";
      spObj = document.getElementById(sport+'_B');
      if (m_sports[sport][bettypeName] <= 0) {
        spObj.style.display = 'none';
      } else {
        spObj.style.display = '';
        document.getElementById(sport+'_B_Cnt').innerHTML = m_sports[sport][bettypeName];
      }

      // 综合过关
      bettypeName = market+"_C";
      spObj = document.getElementById( sport+'_C');
      if (m_sports[sport][bettypeName] <= 0) {
        spObj.style.display = 'none';
      } else {
        spObj.style.display = '';
        document.getElementById(sport+'_C_Cnt').innerHTML = m_sports[sport][bettypeName];
        TotalCount +=  parseInt(m_sports[sport][bettypeName],10);
      }
*/
	// 优胜冠军
      bettypeName = market+"_D";
      spObj = document.getElementById( sport+'_D');

        spObj.style.display = '';
        document.getElementById( sport+'_D_Cnt').innerHTML = m_sports[sport][bettypeName];
      

	  // 賽果
      bettypeName = "R";
      spObj = document.getElementById( sport+'_R');

        spObj.style.display = '';
        document.getElementById(sport+'_R_Cnt').innerHTML = m_sports[sport][bettypeName];
      


/*
	// 滾球
      bettypeName = "L";
      spObj = document.getElementById( 'L_'+sport+'_head');
      if (m_sports[sport][bettypeName] <= 0) {
        spObj.style.display = 'none';
		document.getElementById('img_'+sport+'_LV').style.display = 'none';
      } else {
        spObj.style.display = '';
        document.getElementById('L_'+sport+'_Cnt').innerHTML = m_sports[sport][bettypeName];
		if(market=='E')
		{
			document.getElementById('img_'+sport+'_LV').style.display = 'none';
		}else{
			document.getElementById('img_'+sport+'_LV').style.display = '';
		}
      }
*/
		document.getElementById(sport+'_Cnt').innerHTML = TotalCount;
    }

	// 棒球
    if (sport == 5)
    {
	  var TotalCount=0;
		// 独赢&让分&大小&单/双
      var bettypeName = market+"_A";
      spObj = document.getElementById(sport+'_A');

        spObj.style.display = '';
        document.getElementById(sport+'_A_Cnt').innerHTML = m_sports[sport][bettypeName];
        TotalCount += parseInt(m_sports[sport][bettypeName],10);
      
/*
      // 综合过关
      var bettypeName = market+"_B";
      spObj = document.getElementById(sport+'_B');
      if (m_sports[sport][bettypeName] <= 0) {
        spObj.style.display = 'none';
      } else {
        spObj.style.display = '';
        document.getElementById(sport+'_B_Cnt').innerHTML = m_sports[sport][bettypeName];
      }
*/
      // 优胜冠军
      bettypeName = market+"_C";
      spObj = document.getElementById( sport+'_C');

        spObj.style.display = '';
        document.getElementById(sport+'_C_Cnt').innerHTML = m_sports[sport][bettypeName];
        TotalCount +=  parseInt(m_sports[sport][bettypeName],10);
      

	  // 賽果
      bettypeName = "R";
      spObj = document.getElementById( sport+'_R');

        spObj.style.display = '';
        document.getElementById(sport+'_R_Cnt').innerHTML = m_sports[sport][bettypeName];
      

/*
	// 滾球
      bettypeName = "L";
      spObj = document.getElementById( 'L_'+sport+'_head');
      if (m_sports[sport][bettypeName] <= 0) {
        spObj.style.display = 'none';
		document.getElementById('img_'+sport+'_LV').style.display = 'none';
      } else {
        spObj.style.display = '';
        document.getElementById('L_'+sport+'_Cnt').innerHTML = m_sports[sport][bettypeName];
		if(market=='E')
		{
			document.getElementById('img_'+sport+'_LV').style.display = 'none';
		}else{
			document.getElementById('img_'+sport+'_LV').style.display = '';
		}
      }
*/
		document.getElementById(sport+'_Cnt').innerHTML = TotalCount;
    }


// 冠军
    if (sport == 6)
    {
	  var TotalCount=0;
		// 独赢&让球&大小&单/双
      var bettypeName = market+"_A";
      spObj = document.getElementById(sport+'_A');

        spObj.style.display = '';
        document.getElementById(sport+'_A_Cnt').innerHTML = m_sports[sport][bettypeName];
        TotalCount += parseInt(m_sports[sport][bettypeName],10);
      
/*
      // 综合过关
      var bettypeName = market+"_B";
      spObj = document.getElementById(sport+'_B');
      if (m_sports[sport][bettypeName] <= 0) {
        spObj.style.display = 'none';
      } else {
        spObj.style.display = '';
        document.getElementById(sport+'_B_Cnt').innerHTML = m_sports[sport][bettypeName];
      }

      // 优胜冠军
      bettypeName = market+"_C";
      spObj = document.getElementById( sport+'_C');
      if (m_sports[sport][bettypeName] <= 0) {
        spObj.style.display = 'none';
      } else {
        spObj.style.display = '';
        document.getElementById(sport+'_C_Cnt').innerHTML = m_sports[sport][bettypeName];
        TotalCount +=  parseInt(m_sports[sport][bettypeName],10);
      }
*/
	  // 賽果
      bettypeName = "R";
      spObj = document.getElementById( sport+'_R');

        spObj.style.display = '';
        document.getElementById(sport+'_R_Cnt').innerHTML = m_sports[sport][bettypeName];
      

/*
	// 滾球
      bettypeName = "L";
      spObj = document.getElementById( 'L_'+sport+'_head');
      if (m_sports[sport][bettypeName] <= 0) {
        spObj.style.display = 'none';
		document.getElementById('img_'+sport+'_LV').style.display = 'none';
      } else {
        spObj.style.display = '';
        document.getElementById('L_'+sport+'_Cnt').innerHTML = m_sports[sport][bettypeName];
		if(market=='E')
		{
			document.getElementById('img_'+sport+'_LV').style.display = 'none';
		}else{
			document.getElementById('img_'+sport+'_LV').style.display = '';
		}
      }
*/
		document.getElementById(sport+'_Cnt').innerHTML = TotalCount;
    }

// 其他
    if (sport == 7)
    {
	  var TotalCount=0;
		// 独赢&让盘&大小&单/双
      var bettypeName = market+"_A";
      spObj = document.getElementById(sport+'_A');

        spObj.style.display = '';
        document.getElementById(sport+'_A_Cnt').innerHTML = m_sports[sport][bettypeName];
        TotalCount += parseInt(m_sports[sport][bettypeName],10);
      

	/*
      // 赛盘投注
      var bettypeName = market+"_B";
      spObj = document.getElementById(sport+'_B');
      if (m_sports[sport][bettypeName] <= 0) {
        spObj.style.display = 'none';
      } else {
        spObj.style.display = '';
        document.getElementById(sport+'_B_Cnt').innerHTML = m_sports[sport][bettypeName];
      }

      // 综合过关
      bettypeName = market+"_C";
      spObj = document.getElementById( sport+'_C');
      if (m_sports[sport][bettypeName] <= 0) {
        spObj.style.display = 'none';
      } else {
        spObj.style.display = '';
        document.getElementById(sport+'_C_Cnt').innerHTML = m_sports[sport][bettypeName];
        TotalCount +=  parseInt(m_sports[sport][bettypeName],10);
      }
	  */

	// 优胜冠军
      bettypeName = market+"_D";
      spObj = document.getElementById( sport+'_D');

        spObj.style.display = '';
        document.getElementById( sport+'_D_Cnt').innerHTML = m_sports[sport][bettypeName];
      

	  // 賽果
      bettypeName = "R";
      spObj = document.getElementById( sport+'_R');

        spObj.style.display = '';
        document.getElementById(sport+'_R_Cnt').innerHTML = m_sports[sport][bettypeName];
      

/*
	// 滾球
      bettypeName = "L";
      spObj = document.getElementById( 'L_'+sport+'_head');
      if (m_sports[sport][bettypeName] <= 0) {
        spObj.style.display = 'none';
		document.getElementById('img_'+sport+'_LV').style.display = 'none';
      } else {
        spObj.style.display = '';
        document.getElementById('L_'+sport+'_Cnt').innerHTML = m_sports[sport][bettypeName];
		if(market=='E')
		{
			document.getElementById('img_'+sport+'_LV').style.display = 'none';
		}else{
			document.getElementById('img_'+sport+'_LV').style.display = '';
		}
      }

	  */

		document.getElementById(sport+'_Cnt').innerHTML = TotalCount;
    }

  //if (TotalCount <= 0) {
  //  return false;
  //}
  return true;
}

function SetMenuItem(market) {
  for (var i = 1; i <= SportCount; i++) {
    this.SetMenuBaseItem(market,i);
  }
}

function SetLastSelectedSport(market, IsAutoRefresh) {

  if (LastSelectedSport == -1) {
    for (var i = 1; i <= SportCount; i++) {
      if(m_sports[i][market] > 0 ){
        if (m_sports[i][market] <= 0) IsAutoRefresh=false; // if no HDp,the go to Ourtight page
        SwitchSport(market, i, false, IsAutoRefresh);
        return;
      }
    }
  } else {
    SwitchSport(market,LastSelectedSport,false,IsAutoRefresh);
  }
}

function LoadMenuData(market, IsAutoRefresh) {
	game_type=market;
	ins_url();
  if (m_sports == null) {
    return;
  }
  market = GetBestMarket(market);//早盤，今日，滾球 初始化

  //no any games
  if (market == null) {
    return;
  }

  this.SwitchMarket(market);	//早盤，今日，滾球 按鈕選擇 

  this.CheckSwitchMenu(IsAutoRefresh);

  this.SetMenuItem(market);

  this.SetLastSelectedSport(market,IsAutoRefresh);
}

//if menu is hide , need to change img to show
function CheckSwitchMenu(IsAutoRefresh) {
  var objShowMenu = document.getElementById('div_menu');
  if (objShowMenu != null) {
    var cname = objShowMenu.className;
    if (cname.indexOf('_showmenu') >= 0) {
      //if is autorefresh,still keep hide status
      if(IsAutoRefresh) {
        var objBody = document.getElementById('market_' + LastSelectedMArket + '_body');
        objBody.style.display='none';
      } else {
        objShowMenu.className = cname.replace('_showmenu', '_hidemenu');
        if (IsNewDropdownList)
            document.getElementById('div_showhide_menu').className = 'hide_menu';
      }
    }
  }
}

function SwitchMarket(Market) {
  var objMarket;
  LastSelectedMArket = Market;


	//滾球
  if (Market == 'L') {
    // set menu head
    objMarket = document.getElementById('market_L_head');
    objMarket.className = 'itemrdon';
    objMarket = document.getElementById('market_T_head');
    objMarket.className = 'itemrd';
    objMarket = document.getElementById('market_E_head');
    objMarket.className = 'itemrd';

    //set menu body
    objMarket = document.getElementById('market_L_body');
    objMarket.style.display = (ShowMenuFlag) ? "" : "none";
    objMarket = document.getElementById('market_body');
    objMarket.style.display = 'none';
  }
	//今日
  if (Market == 'T') {
    // set menu head
    objMarket = document.getElementById('market_T_head');
    objMarket.className='itemrdon';
    objMarket = document.getElementById('market_E_head');
    objMarket.className='itemrd';
    objMarket = document.getElementById('market_L_head');
    objMarket.className='itemrd';
    //set menu body

    objMarket = document.getElementById('market_body');
    //objMarket.style.display = '';
    objMarket.style.display = (ShowMenuFlag) ? "" : "none";
    objMarket = document.getElementById('market_L_body');
    objMarket.style.display = 'none';
  }
	//早盤
  if (Market == 'E') {
    // set menu head
    objMarket = document.getElementById('market_E_head');
    objMarket.className = 'itemrdon';
    objMarket = document.getElementById('market_T_head');
    objMarket.className = 'itemrd';
    objMarket = document.getElementById('market_L_head');
    objMarket.className = 'itemrd';

    //set menu body
    objMarket = document.getElementById('market_body');
    //objMarket.style.display = '';
    objMarket.style.display = (ShowMenuFlag) ? "" : "none";
    objMarket = document.getElementById('market_L_body');
    objMarket.style.display = 'none';
  }
}

function GetBestMarket(Market) {
  var sMarket = Market;
  // Check Live Count and hide Live text
  //滾球
  if (m_sports["0"]["TotalLive"] == 0) {
/*
      document.getElementById('market_L_text').style.display = 'none';
      document.getElementById('market_L_head_Cnt').innerHTML = '';

        if(fFrame.IsCssControl)
        {
            document.getElementById('market_L_head').style.display = 'none';
            var lineobj = document.getElementById('line_L');
            if(lineobj != null)
              lineobj.style.display = 'none';
        }

    if (sMarket == 'L') {
      sMarket = 'T';
    }
	*/
  } else {
    document.getElementById('market_L_text').style.display = '';
    document.getElementById('market_L_head_Cnt').innerHTML = m_sports["0"]["TotalLive"];

    if(IsCssControl)
    {
        document.getElementById('market_L_head').style.display = '';
        var lineobj = document.getElementById('line_L');
        if(lineobj != null)
          lineobj.style.display = '';
    }
  }
	//---------------------------------------------------------------------------------------------
  // Check Today Count and hide Today text
  //今日
  if (m_sports["0"]["TotalToday"] == 0) {
    document.getElementById('market_T_text').style.display = 'none';
    if (sMarket == 'T') {
      sMarket = 'E';
    }
  } else {
     document.getElementById('market_T_text').style.display = '';
  }

  // Check Early Count and hide Early text
  //早盤
  if (m_sports["0"]["TotalEarly"] == 0) {
    if (sMarket == 'E') {
      document.getElementById('market_E_text').style.display = 'none';
      // hide all market body
      document.getElementById('market_body').style.display = 'none';
      document.getElementById('market_L_body').style.display = 'none';
      //sMarket = null;
    }
  } else {
    document.getElementById('market_E_text').style.display='';
  }

  return sMarket;
}

function SetMenuData(SportsArray, imgsrc) {
  if (SportsArray != null) {
    //SportsArray['201']['T']=0;
    m_sports = SportsArray;
  }

/*
  if (!Tmpl_Initialed) {
    window.setTimeout("SetMenuData(null,'" + imgsrc + "')", 200);
    return;
  }
*/
  //first Load Menu
  if (LastSelectedMArket == null) {
    LoadMenuData('T',true);
  } else {
    if (IsChangeMenuType) {
      LoadMenuData('T');
      IsChangeMenuType = false;
    } else {
      LoadMenuData(LastSelectedMArket, true);
    }
  }
  // Set LastSelectedMenu Img
  m_mouseover(LastSelectedMenu,imgsrc);
}

function ifrmaeresizt(){
//  var ifrmH = parent.document.getElementById('ifmMenu');
//  ifrmH.height = document.body.scrollHeight + 10;
//document.getElementById("MenuContainer").style.height = window.top.document.getElementById('Menu_tmpl').contentWindow.document.body.scrollHeight;
//document.getElementById("MenuContainer").style.display='inline';
}

// hide or show all menu body
function SwitchMenu(lang)
{
  var objBody
  if(LastSelectedMArket=='L'){
    objBody = document.getElementById("market_" + LastSelectedMArket + "_body");
  }else{
    objBody = document.getElementById("market_body");
  }
  var objShowMenu = document.getElementById('div_menu');
  if (ShowMenuFlag) {
    if (IsCssControl == true && IsLogin)
    {
        document.getElementById('showhide_menu').innerHTML = RES_show_menu;
        if (IsNewDropdownList) {
            document.getElementById('div_showhide_menu').className = 'show_menu';
        }
    }
    objShowMenu.className = lang + "_showmenu";
    objBody.style.display='none';
    if(LastSelectedMArket != 'L')
      isSubMenuOpened = false;
  } else {
    if (IsCssControl == true && IsLogin)
    {
        document.getElementById('showhide_menu').innerHTML = RES_hide_menu;
        if (IsNewDropdownList) {
            document.getElementById('div_showhide_menu').className = 'hide_menu';
        }
    }
    objShowMenu.className = lang + "_hidemenu";
    objBody.style.display = "";
  }
  ShowMenuFlag = !ShowMenuFlag;
}

function openMenu(lang) {
  var objBody
  if(LastSelectedMArket=='L'){
    objBody = document.getElementById("market_" + LastSelectedMArket + "_body");
  }else{
    objBody = document.getElementById("market_body");
  }
  var objShowMenu = document.getElementById('div_menu');
  //after login
  if(objShowMenu!=null) {
    if (IsCssControl == true) {
        if (IsNewDropdownList == true) {
            document.getElementById('div_showhide_menu').className = 'hide_menu';
        }
      document.getElementById('showhide_menu').innerHTML = RES_hide_menu;
    }
  objShowMenu.className = lang + "_hidemenu";
  }

  if (objBody != null){
    objBody.style.display = "";
  }
  ShowMenuFlag = true;
  isSubMenuOpened = false;
}


/*******************************************************************************************
 * Description: Close sub menu
 * Author: Wei Liu
 * Create Date: 2011/10/13
 *******************************************************************************************/
function CloseSubMenu(market, sport){
  //alert(market);
  document.getElementById(sport+'_body').style.display = 'none'; 
  isSubMenuOpened = false;
}



