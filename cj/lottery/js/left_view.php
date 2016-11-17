<?
include_once("../../include/config.php");
include_once("../../include/mysqli.php");

$Cdate=date("Ymd",time()+12*3600);
$nntime=date("Y-m-d H:i:s",time()+12*3600);
$ttime=date("Y-m-d H:i:s");
$sql="select * from c_auto_2 where qishu like '".$Cdate."%' and datetime<'".$nntime."' order by qishu desc";

$query=$mysqli->query($sql);
//出现次数    $cx 两维数组
//未出期数	 $wc[0]----[9]
//未出期数控制变量 $twc[0,9];
//图表		 $tb[0,7][0,2][0,27] 第一维【第一球，第二球，第三球，第四球，第五球，总和大小，总和单双，龙虎和】 第二维【球号，大小，单双】
//图表控制变量 $tz[0,7]
//图表控制变量2 $temp[0,7]
$tz=array();
$i=0;
while($row=$query->fetch_array()){
	if(($row['ball_1']+$row['ball_2']+$row['ball_3']+$row['ball_4']+$row['ball_5'])<>0){
		  $cx[1][$row['ball_1']]++;
		  $cx[2][$row['ball_2']]++;
		  $cx[3][$row['ball_3']]++;
		  $cx[4][$row['ball_4']]++;
		  $cx[5][$row['ball_5']]++;
		if($i==0){	//第一次计算未出期数
			for($a=0;$a<=9;$a++){
				$wc[$a]++;
				if($row['ball_1']==$a || $row['ball_2']==$a || $row['ball_3']==$a || $row['ball_4']==$a || $row['ball_5']==$a){
					$wc[$a]--;
					$twc[$a]=1;
				}
			}
			
		}else{
			for($a=0;$a<=9;$a++){
				if(intval($twc[$a])==0){
					$wc[$a]++;	
						if($row['ball_1']==$a || $row['ball_2']==$a || $row['ball_3']==$a || $row['ball_4']==$a || $row['ball_5']==$a){
							$wc[$a]--;
							$twc[$a]=1;
					}					
				}
			}
		}
		$i++;
		//第一球球号
		if($tz[0][0]<28){
			if($temp[0][0]==$row['ball_1']){
				$tb[0][0][$tz[0][0]]=$tb[0][0][$tz[0][0]]."<br>".$row['ball_1'];	
			}else{
				$tz[0][0]++;
				$tb[0][0][$tz[0][0]]=$row['ball_1'];	
			}
			$temp[0][0]=$row['ball_1'];
		}
		//第一球大小
		if($tz[0][1]<28){
			if($temp[0][1]==dx($row['ball_1'])){
				$tb[0][1][$tz[0][1]]=$tb[0][1][$tz[0][1]]."<br>".dx($row['ball_1']);
				//echo $tb[0][1][$tz[0][1]]."<br>";
			}else{
				$tz[0][1]++;
				$tb[0][1][$tz[0][1]]=dx($row['ball_1']);	
			}
			$temp[0][1]=dx($row['ball_1']);
		}		
		//第一球单双
		if($tz[0][2]<28){
			if($temp[0][2]==ds($row['ball_1'])){
				$tb[0][2][$tz[0][2]]=$tb[0][2][$tz[0][2]]."<br>".ds($row['ball_1']);
				//echo $tb[0][2][$tz[0][2]]."<br>";
			}else{
				$tz[0][2]++;
				$tb[0][2][$tz[0][2]]=ds($row['ball_1']);	
			}
			$temp[0][2]=ds($row['ball_1']);
		}		
		//第二球球号
		if($tz[1][0]<28){
			if($temp[1][0]==$row['ball_2']){
				$tb[1][0][$tz[1][0]]=$tb[1][0][$tz[1][0]]."<br>".$row['ball_2'];	
			}else{
				$tz[1][0]++;
				$tb[1][0][$tz[1][0]]=$row['ball_2'];	
			}
			$temp[1][0]=$row['ball_2'];
		}		
		
		//第二球大小
		if($tz[1][1]<28){
			if($temp[1][1]==dx($row['ball_2'])){
				$tb[1][1][$tz[1][1]]=$tb[1][1][$tz[1][1]]."<br>".dx($row['ball_2']);
				//echo $tb[0][1][$tz[0][1]]."<br>";
			}else{
				$tz[1][1]++;
				$tb[1][1][$tz[1][1]]=dx($row['ball_2']);	
			}
			$temp[1][1]=dx($row['ball_2']);
		}		
		//第二球单双
		if($tz[1][2]<28){
			if($temp[1][2]==ds($row['ball_2'])){
				$tb[1][2][$tz[1][2]]=$tb[1][2][$tz[1][2]]."<br>".ds($row['ball_2']);
				//echo $tb[0][2][$tz[0][2]]."<br>";
			}else{
				$tz[1][2]++;
				$tb[1][2][$tz[1][2]]=ds($row['ball_2']);	
			}
			$temp[1][2]=ds($row['ball_2']);
		}			
		//第三球球号
		if($tz[2][0]<28){
			if($temp[2][0]==$row['ball_3']){
				$tb[2][0][$tz[2][0]]=$tb[2][0][$tz[2][0]]."<br>".$row['ball_3'];	
			}else{
				$tz[2][0]++;
				$tb[2][0][$tz[2][0]]=$row['ball_3'];	
			}
			$temp[2][0]=$row['ball_3'];
		}		
		//第三球大小
		if($tz[2][1]<28){
			if($temp[2][1]==dx($row['ball_3'])){
				$tb[2][1][$tz[2][1]]=$tb[2][1][$tz[2][1]]."<br>".dx($row['ball_3']);
				//echo $tb[0][1][$tz[0][1]]."<br>";
			}else{
				$tz[2][1]++;
				$tb[2][1][$tz[2][1]]=dx($row['ball_3']);	
			}
			$temp[2][1]=dx($row['ball_3']);
		}		
		//第三球单双
		if($tz[2][2]<28){
			if($temp[2][2]==ds($row['ball_3'])){
				$tb[2][2][$tz[0][2]]=$tb[2][2][$tz[2][2]]."<br>".ds($row['ball_3']);
				//echo $tb[0][2][$tz[0][2]]."<br>";
			}else{
				$tz[2][2]++;
				$tb[2][2][$tz[2][2]]=ds($row['ball_3']);	
			}
			$temp[2][2]=ds($row['ball_3']);
		}			
		//第四球球号
		if($tz[3][0]<28){
			if($temp[3][0]==$row['ball_4']){
				$tb[3][0][$tz[3][0]]=$tb[3][0][$tz[3][0]]."<br>".$row['ball_4'];	
			}else{
				$tz[3][0]++;
				$tb[3][0][$tz[3][0]]=$row['ball_4'];	
			}
			$temp[3][0]=$row['ball_4'];
		}		
		//第四球大小
		if($tz[3][1]<28){
			if($temp[3][1]==dx($row['ball_4'])){
				$tb[3][1][$tz[3][1]]=$tb[3][1][$tz[3][1]]."<br>".dx($row['ball_4']);
				//echo $tb[0][1][$tz[0][1]]."<br>";
			}else{
				$tz[3][1]++;
				$tb[3][1][$tz[3][1]]=dx($row['ball_4']);	
			}
			$temp[3][1]=dx($row['ball_4']);
		}		
		//第四球单双
		if($tz[3][2]<28){
			if($temp[3][2]==ds($row['ball_4'])){
				$tb[3][2][$tz[3][2]]=$tb[3][2][$tz[3][2]]."<br>".ds($row['ball_4']);
				//echo $tb[0][2][$tz[0][2]]."<br>";
			}else{
				$tz[3][2]++;
				$tb[3][2][$tz[3][2]]=ds($row['ball_4']);	
			}
			$temp[3][2]=ds($row['ball_4']);
		}			
		//第五球球号
		if($tz[4][0]<28){
			if($temp[4][0]==$row['ball_1']){
				$tb[4][0][$tz[4][0]]=$tb[4][0][$tz[4][0]]."<br>".$row['ball_5'];	
			}else{
				$tz[4][0]++;
				$tb[4][0][$tz[4][0]]=$row['ball_5'];	
			}
			$temp[4][0]=$row['ball_5'];
		}		
		//第五球大小
		if($tz[4][1]<28){
			if($temp[4][1]==dx($row['ball_5'])){
				$tb[4][1][$tz[4][1]]=$tb[4][1][$tz[4][1]]."<br>".dx($row['ball_5']);
				//echo $tb[0][1][$tz[0][1]]."<br>";
			}else{
				$tz[4][1]++;
				$tb[4][1][$tz[4][1]]=dx($row['ball_5']);	
			}
			$temp[4][1]=dx($row['ball_5']);
		}		
		//第五球单双
		if($tz[4][2]<28){
			if($temp[4][2]==ds($row['ball_5'])){
				$tb[4][2][$tz[4][2]]=$tb[4][2][$tz[4][2]]."<br>".ds($row['ball_5']);
				//echo $tb[0][2][$tz[0][2]]."<br>";
			}else{
				$tz[4][2]++;
				$tb[4][2][$tz[4][2]]=ds($row['ball_5']);	
			}
			$temp[4][2]=ds($row['ball_5']);
		}			
		//总和大小
		if($tz[5][0]<28){
			if($temp[5][0]==$row['s2']){
				$tb[5][0][$tz[5][0]]=$tb[5][0][$tz[5][0]]."<br>".$row['s2'];	
			}else{
				$tz[5][0]++;
				$tb[5][0][$tz[5][0]]=$row['s2'];	
			}
			$temp[5][0]=$row['s2'];
		}		
		//总和单双
		if($tz[6][0]<28){
			if($temp[6][0]==$row['s3']){
				$tb[6][0][$tz[6][0]]=$tb[6][0][$tz[6][0]]."<br>".$row['s3'];	
			}else{
				$tz[6][0]++;
				$tb[6][0][$tz[6][0]]=$row['s3'];	
			}
			$temp[6][0]=$row['s3'];
		}		
		//龙虎和								
		if($tz[7][0]<28){
			if($temp[7][0]==$row['s4']){
				$tb[7][0][$tz[7][0]]=$tb[7][0][$tz[7][0]]."<br>".$row['s4'];	
			}else{
				$tz[7][0]++;
				$tb[7][0][$tz[7][0]]=$row['s4'];	
			}
			$temp[7][0]=$row['s4'];
		}		
		
	}
}



//取大小
function dx($i){
	if($i>=5){
		return "大";
	}else{
		return "小";
	}
}


//取单双
function ds($i){
	if(($i%2)==0){
		return "双";
	}else{
		return "单";
	}
}

//print_r($tb);exit;
?>
<table width="760" border="0" cellspacing="0" cellpadding="0"  class="table">
<tr>
    <td height="30" colspan="15">
    <table width="570" border="0" cellspacing="0" cellpadding="0">
      <tr id="tag3">
        <td width="15%" height="30" align="center" style="background:url(images/fiest_bg01.png) repeat-x;cursor:pointer; font-weight:bold;" onClick="cs_table('tag3','td','table3','div',0);"><span><a href="javascript:void(0);">第一球(万位)</a></span></td>
        <td width="15%" align="center" class="top" onClick="cs_table('tag3','td','table3','div',1);" style="cursor:pointer;"><span><a href="javascript:void(0);">第二球(千位)</a></span></td>
        <td width="15%" align="center" class="top" onClick="cs_table('tag3','td','table3','div',2);" style="cursor:pointer;"><span><a href="javascript:void(0);">第三球(百位)</a></span></td>
        <td width="15%" align="center" class="top" onClick="cs_table('tag3','td','table3','div',3);" style="cursor:pointer;"><span><a href="javascript:void(0);">第四球(十位)</a></span></td>
        <td width="15%" align="center" style="background: url(images/wu_bg01.png);cursor:pointer;" onClick="cs_table('tag3','td','table3','div',4);"><span><a href="javascript:void(0);">第五球(个位)</a></span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td id="table3">
        <div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="fist">
    <tr align="center" valign="bottom">
        <td width="10%" height="30" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/0.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/1.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/2.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/3.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/4.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/5.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/6.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/7.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/8.png" width="25" height="25"></td>
        <td width="10%" class="biankuang02" style="background-color:#ccffcc"><img src="images/ball_2/9.png" width="25" height="25"></td>
    </tr>
                <tr align="center" class="load_diyiqiucx">
                    
    	<td height="30" class="biankuang03"><?= ($cx[1][0]>8)?"<font color=red><b>".intval($cx[1][0])."</b></font>":intval($cx[1][0]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[1][1]>8)?"<font color=red><b>".intval($cx[1][1])."</b></font>":intval($cx[1][1]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[1][2]>8)?"<font color=red><b>".intval($cx[1][2])."</b></font>":intval($cx[1][2]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[1][3]>8)?"<font color=red><b>".intval($cx[1][3])."</b></font>":intval($cx[1][3]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[1][4]>8)?"<font color=red><b>".intval($cx[1][4])."</b></font>":intval($cx[1][4]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[1][5]>8)?"<font color=red><b>".intval($cx[1][5])."</b></font>":intval($cx[1][5]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[1][6]>8)?"<font color=red><b>".intval($cx[1][6])."</b></font>":intval($cx[1][6]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[1][7]>8)?"<font color=red><b>".intval($cx[1][7])."</b></font>":intval($cx[1][7]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[1][8]>8)?"<font color=red><b>".intval($cx[1][8])."</b></font>":intval($cx[1][8]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[1][9]>8)?"<font color=red><b>".intval($cx[1][9])."</b></font>":intval($cx[1][9]); ?></td>
     
                  </tr>
            </table>
        </div>
        <div style="display:none">
        	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="fist">
                <tr align="center" valign="bottom">
        <td width="10%" height="30" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/0.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/1.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/2.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/3.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/4.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/5.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/6.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/7.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/8.png" width="25" height="25"></td>
        <td width="10%" class="biankuang02" style="background-color:#ccffcc"><img src="images/ball_2/9.png" width="25" height="25"></td>
      </tr>
                <tr align="center" class="load_dierqiucx">
    	<td height="30" class="biankuang03"><?= ($cx[2][0]>8)?"<font color=red><b>".intval($cx[2][0])."</b></font>":intval($cx[2][0]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[2][1]>8)?"<font color=red><b>".intval($cx[2][1])."</b></font>":intval($cx[2][1]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[2][2]>8)?"<font color=red><b>".intval($cx[2][2])."</b></font>":intval($cx[2][2]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[2][3]>8)?"<font color=red><b>".intval($cx[2][3])."</b></font>":intval($cx[2][3]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[2][4]>8)?"<font color=red><b>".intval($cx[2][4])."</b></font>":intval($cx[2][4]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[2][5]>8)?"<font color=red><b>".intval($cx[2][5])."</b></font>":intval($cx[2][5]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[2][6]>8)?"<font color=red><b>".intval($cx[2][6])."</b></font>":intval($cx[2][6]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[2][7]>8)?"<font color=red><b>".intval($cx[2][7])."</b></font>":intval($cx[2][7]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[2][8]>8)?"<font color=red><b>".intval($cx[2][8])."</b></font>":intval($cx[2][8]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[2][9]>8)?"<font color=red><b>".intval($cx[2][9])."</b></font>":intval($cx[2][9]); ?></td>
     
                  </tr>
            </table>
        </div>
        <div style="display:none">
        	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="fist">
                <tr align="center" valign="bottom">
        <td width="10%" height="30" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/0.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/1.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/2.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/3.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/4.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/5.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/6.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/7.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/8.png" width="25" height="25"></td>
        <td width="10%" class="biankuang02" style="background-color:#ccffcc"><img src="images/ball_2/9.png" width="25" height="25"></td>
      </tr>
                <tr align="center" class="load_sancx">

    	<td height="30" class="biankuang03"><?= ($cx[3][0]>8)?"<font color=red><b>".intval($cx[3][0])."</b></font>":intval($cx[3][0]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[3][1]>8)?"<font color=red><b>".intval($cx[3][1])."</b></font>":intval($cx[3][1]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[3][2]>8)?"<font color=red><b>".intval($cx[3][2])."</b></font>":intval($cx[3][2]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[3][3]>8)?"<font color=red><b>".intval($cx[3][3])."</b></font>":intval($cx[3][3]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[3][4]>8)?"<font color=red><b>".intval($cx[3][4])."</b></font>":intval($cx[3][4]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[3][5]>8)?"<font color=red><b>".intval($cx[3][5])."</b></font>":intval($cx[3][5]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[3][6]>8)?"<font color=red><b>".intval($cx[3][6])."</b></font>":intval($cx[3][6]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[3][7]>8)?"<font color=red><b>".intval($cx[3][7])."</b></font>":intval($cx[3][7]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[3][8]>8)?"<font color=red><b>".intval($cx[3][8])."</b></font>":intval($cx[3][8]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[3][9]>8)?"<font color=red><b>".intval($cx[3][9])."</b></font>":intval($cx[3][9]); ?></td>

                         
                  </tr>
            </table>
        </div>
        <div style="display:none">
        	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="fist">
                <tr align="center" valign="bottom">
        <td width="10%" height="30" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/0.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/1.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/2.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/3.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/4.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/5.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/6.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/7.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/8.png" width="25" height="25"></td>
        <td width="10%" class="biankuang02" style="background-color:#ccffcc"><img src="images/ball_2/9.png" width="25" height="25"></td>
      </tr>
                <tr align="center" class="load_sicx">


    	<td height="30" class="biankuang03"><?= ($cx[4][0]>8)?"<font color=red><b>".intval($cx[4][0])."</b></font>":intval($cx[4][0]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[4][1]>8)?"<font color=red><b>".intval($cx[4][1])."</b></font>":intval($cx[4][1]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[4][2]>8)?"<font color=red><b>".intval($cx[4][2])."</b></font>":intval($cx[4][2]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[4][3]>8)?"<font color=red><b>".intval($cx[4][3])."</b></font>":intval($cx[4][3]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[4][4]>8)?"<font color=red><b>".intval($cx[4][4])."</b></font>":intval($cx[4][4]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[4][5]>8)?"<font color=red><b>".intval($cx[4][5])."</b></font>":intval($cx[4][5]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[4][6]>8)?"<font color=red><b>".intval($cx[4][6])."</b></font>":intval($cx[4][6]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[4][7]>8)?"<font color=red><b>".intval($cx[4][7])."</b></font>":intval($cx[4][7]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[4][8]>8)?"<font color=red><b>".intval($cx[4][8])."</b></font>":intval($cx[4][8]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[4][9]>8)?"<font color=red><b>".intval($cx[4][9])."</b></font>":intval($cx[4][9]); ?></td>

                         
                  </tr>
            </table>
        </div>
        <div style="display:none">
        	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="fist">
                <tr align="center" valign="bottom">
        <td width="10%" height="30" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/0.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/1.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/2.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/3.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/4.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/5.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/6.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/7.png" width="25" height="25"></td>
        <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/8.png" width="25" height="25"></td>
        <td width="10%" class="biankuang02" style="background-color:#ccffcc"><img src="images/ball_2/9.png" width="25" height="25"></td>
      </tr>
                <tr align="center" class="load_wucx">

    	<td height="30" class="biankuang03"><?= ($cx[5][0]>8)?"<font color=red><b>".intval($cx[5][0])."</b></font>":intval($cx[5][0]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[5][1]>8)?"<font color=red><b>".intval($cx[5][1])."</b></font>":intval($cx[5][1]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[5][2]>8)?"<font color=red><b>".intval($cx[5][2])."</b></font>":intval($cx[5][2]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[5][3]>8)?"<font color=red><b>".intval($cx[5][3])."</b></font>":intval($cx[5][3]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[5][4]>8)?"<font color=red><b>".intval($cx[5][4])."</b></font>":intval($cx[5][4]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[5][5]>8)?"<font color=red><b>".intval($cx[5][5])."</b></font>":intval($cx[5][5]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[5][6]>8)?"<font color=red><b>".intval($cx[5][6])."</b></font>":intval($cx[5][6]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[5][7]>8)?"<font color=red><b>".intval($cx[5][7])."</b></font>":intval($cx[5][7]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[5][8]>8)?"<font color=red><b>".intval($cx[5][8])."</b></font>":intval($cx[5][8]); ?></td>
        <td height="30" class="biankuang03"><?= ($cx[5][9]>8)?"<font color=red><b>".intval($cx[5][9])."</b></font>":intval($cx[5][9]); ?></td>
                        
                  </tr>
            </table>
        </div>
  </td>
  </tr>
</table><br>

<table width="760" border="0" cellspacing="0" cellpadding="0" class="table">
  <tr>
    <td height="30" colspan="15">
    <table width="80" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="30" align="center" style="background:url(images/zonghe.png) no-repeat;color:#fff; font-weight:bold; font-size:14px;">未出期数</td>
        </tr>
    </table></td>
  </tr>
  <tr>
  	<td>
    	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="fist">
  <tr align="center" valign="bottom">
    <td width="10%" height="30" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/0.png" width="25" height="25"></td>
    <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/1.png" width="25" height="25"></td>
    <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/2.png" width="25" height="25"></td>
    <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/3.png" width="25" height="25"></td>
    <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/4.png" width="25" height="25"></td>
    <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/5.png" width="25" height="25"></td>
    <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/6.png" width="25" height="25"></td>
    <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/7.png" width="25" height="25"></td>
    <td width="10%" class="biankuang" style="background-color:#ccffcc"><img src="images/ball_2/8.png" width="25" height="25"></td>
    <td width="10%" class="biankuang02" style="background-color:#ccffcc"><img src="images/ball_2/9.png" width="25" height="25"></td>
  </tr>
  <tr align="center" class="load_wcx">
    	<td height="30" class="biankuang03"><?= ($wc[0]>8)?"<font color=red><b>".$wc[0]."</b></font>":$wc[0]; ?></td>
        <td height="30" class="biankuang03"><?= ($wc[1]>8)?"<font color=red><b>".$wc[1]."</b></font>":$wc[1]; ?></td>
        <td height="30" class="biankuang03"><?= ($wc[2]>8)?"<font color=red><b>".$wc[2]."</b></font>":$wc[2]; ?></td>
        <td height="30" class="biankuang03"><?= ($wc[3]>8)?"<font color=red><b>".$wc[3]."</b></font>":$wc[3]; ?></td>
        <td height="30" class="biankuang03"><?= ($wc[4]>8)?"<font color=red><b>".$wc[4]."</b></font>":$wc[4]; ?></td>
        <td height="30" class="biankuang03"><?= ($wc[5]>8)?"<font color=red><b>".$wc[5]."</b></font>":$wc[5]; ?></td>
        <td height="30" class="biankuang03"><?= ($wc[6]>8)?"<font color=red><b>".$wc[6]."</b></font>":$wc[6]; ?></td>
        <td height="30" class="biankuang03"><?= ($wc[7]>8)?"<font color=red><b>".$wc[7]."</b></font>":$wc[7]; ?></td>
        <td height="30" class="biankuang03"><?= ($wc[8]>8)?"<font color=red><b>".$wc[8]."</b></font>":$wc[8]; ?></td>
        <td height="30" class="biankuang03"><?= ($wc[9]>8)?"<font color=red><b>".$wc[9]."</b></font>":$wc[9]; ?></td>

        
  </tr>
   </table>
    </td>
  </tr>
</table><br>

<table width="760" border="0" cellspacing="0" cellpadding="0" class="table">
  <tr align="center" style="color:#fff; font-size:12px;background: url(images/top_bg.png) repeat-x; cursor:pointer;" id="tag4">
    <td height="29" style="background:url(images/fiest_bg01.png) repeat-x; cursor:pointer; font-weight:bold;" onClick="cs_table('tag4','td','table4','div',0);"><a href="javascript:void(0);" title="第一球">第一球</a></td>
    <td height="29" class="biankuang06" onClick="cs_table('tag4','td','table4','div',1);"><a href="javascript:void(0);" title="第一球大小">大小</a></td>
    <td height="29" class="biankuang04" onClick="cs_table('tag4','td','table4','div',2);"><a href="javascript:void(0);" title="第一球单双">单双</a></td>
    <td height="29" class="biankuang05" onClick="cs_table('tag4','td','table4','div',3);"><a href="javascript:void(0);" title="第二球">第二球</a></td>
    <td height="29" class="biankuang05" onClick="cs_table('tag4','td','table4','div',4);"><a href="javascript:void(0);" title="第二球大小">大小</a></td>
    <td height="29" class="biankuang04" onClick="cs_table('tag4','td','table4','div',5);"><a href="javascript:void(0);" title="第二球单双">单双</a></td>
    <td height="29" class="biankuang05" onClick="cs_table('tag4','td','table4','div',6);"><a href="javascript:void(0);" title="第三球">第三球</a></td>
    <td height="29" class="biankuang05" onClick="cs_table('tag4','td','table4','div',7);"><a href="javascript:void(0);" title="第三球大小">大小</a></td>
    <td height="29" class="biankuang04" onClick="cs_table('tag4','td','table4','div',8);"><a href="javascript:void(0);" title="第三球单双">单双</a></td>
    <td height="29" class="biankuang05" onClick="cs_table('tag4','td','table4','div',9);"><a href="javascript:void(0);" title="第四球">第四球</a></td>
    <td height="29" class="biankuang05" onClick="cs_table('tag4','td','table4','div',10);"><a href="javascript:void(0);" title="第四球大小">大小</a></td>
    <td height="29" class="biankuang04" onClick="cs_table('tag4','td','table4','div',11);"><a href="javascript:void(0);" title="第四球单双">单双</a></td>
    <td height="29" class="biankuang05" onClick="cs_table('tag4','td','table4','div',12);"><a href="javascript:void(0);" title="第五球">第五球</a></td>
    <td height="29" class="biankuang05" onClick="cs_table('tag4','td','table4','div',13);"><a href="javascript:void(0);" title="第五球大小">大小</a></td>
    <td height="29" class="biankuang04" onClick="cs_table('tag4','td','table4','div',14);"><a href="javascript:void(0);" title="第五球单双">单双</a></td>
    <td height="29" class="biankuang05" onClick="cs_table('tag4','td','table4','div',15);"><a href="javascript:void(0);" title="总和大小">总和大小</a></td>
    <td height="29" class="biankuang05" onClick="cs_table('tag4','td','table4','div',16);"><a href="javascript:void(0);" title="总和单双">总和单双</a></td>
    <td height="29" style="background: url(images/wu_bg01.png)" onClick="cs_table('tag4','td','table4','div',17);"><a href="javascript:void(0);" title="龙虎和">龙虎和</a></td>
  </tr>
  <tr>
    <td colspan="18" align="center" id="table4">
    	<div class="fist">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="load_diyiqiu_h">
        <tr valign="top" class="ball_dx" align="center"> 
      
        <?
			$i=0;
			krsort($tb[0][0]);
			foreach ($tb[0][0] as $key => $value) {
				if(strlen($value)>0){
				if($i==1){
		?>
        		<td height="30" class="ball_dx_bg02"><?=$value ?></td>
        <?
				}else{
		?>
        		<td height="30" <? if(($i%2)==1){ ?>class="ball_dx_bg"<? } ?>><?=$value ?></td>
        <?
				}
				$i++;
				}
				
			}
			for($z=$i;$z<28;$z++){
		?>
        	<td height="30" <? if($z==28){ ?><? }else{ ?><? if(($z%2)==1){ ?>class="ball_dx_bg"<? } ?><? } ?>>&nbsp;</td>
        <?	
			}
		?>
        
               
        </tr>
          
        </table>
    	</div>
        <div style="display:none" class="fist">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="load_diyiqiudx_h">
          <tr valign="top" class="ball_dx" align="center">
        <?
			$i=0;
			krsort($tb[0][1]);
			foreach ($tb[0][1] as $key => $value) {
				if(strlen($value)>0){
				if($i==1){
		?>
        		<td height="30" class="ball_dx_bg02"><?=$value ?></td>
        <?
				}else{
		?>
        		<td height="30" <? if(($i%2)==1){ ?>class="ball_dx_bg"<? } ?>><?=$value ?></td>
        <?
				}
				$i++;
				}
				
			}
			for($z=$i;$z<28;$z++){
		?>
        	<td height="30" <? if($z==28){ ?><? }else{ ?><? if(($z%2)==1){ ?>class="ball_dx_bg"<? } ?><? } ?>>&nbsp;</td>
        <?	
			}
		?>                
          </tr>
        </table>
    	</div>
        <div style="display:none" class="fist">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="load_diyiqiuds_h">
          <tr valign="top" class="ball_dx" align="center">
        <?
			$i=0;
			krsort($tb[0][2]);
			foreach ($tb[0][2] as $key => $value) {
				if(strlen($value)>0){
				if($i==1){
		?>
        		<td height="30" class="ball_dx_bg02"><?=$value ?></td>
        <?
				}else{
		?>
        		<td height="30" <? if(($i%2)==1){ ?>class="ball_dx_bg"<? } ?>><?=$value ?></td>
        <?
				}
				$i++;
				}
				
			}
			for($z=$i;$z<28;$z++){
		?>
        	<td height="30" <? if($z==28){ ?><? }else{ ?><? if(($z%2)==1){ ?>class="ball_dx_bg"<? } ?><? } ?>>&nbsp;</td>
        <?	
			}
		?>                    
          </tr>
        </table>
    	</div>
        <div style="display:none" class="fist">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="load_dierqiu_h">
          <tr valign="top" class="ball_dx" align="center">
        <?
			$i=0;
			krsort($tb[1][0]);
			foreach ($tb[1][0] as $key => $value) {
				if(strlen($value)>0){
				if($i==1){
		?>
        		<td height="30" class="ball_dx_bg02"><?=$value ?></td>
        <?
				}else{
		?>
        		<td height="30" <? if(($i%2)==1){ ?>class="ball_dx_bg"<? } ?>><?=$value ?></td>
        <?
				}
				$i++;
				}
				
			}
			for($z=$i;$z<28;$z++){
		?>
        	<td height="30" <? if($z==28){ ?><? }else{ ?><? if(($z%2)==1){ ?>class="ball_dx_bg"<? } ?><? } ?>>&nbsp;</td>
        <?	
			}
		?>               
          </tr>
        </table>
    	</div>
        <div style="display:none" class="fist">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="load_dierqiudx_h">
          <tr valign="top" class="ball_dx" align="center">
        <?
			$i=0;
			krsort($tb[1][1]);
			foreach ($tb[1][1] as $key => $value) {
				if(strlen($value)>0){
				if($i==1){
		?>
        		<td height="30" class="ball_dx_bg02"><?=$value ?></td>
        <?
				}else{
		?>
        		<td height="30" <? if(($i%2)==1){ ?>class="ball_dx_bg"<? } ?>><?=$value ?></td>
        <?
				}
				$i++;
				}
				
			}
			for($z=$i;$z<28;$z++){
		?>
        	<td height="30" <? if($z==28){ ?><? }else{ ?><? if(($z%2)==1){ ?>class="ball_dx_bg"<? } ?><? } ?>>&nbsp;</td>
        <?	
			}
		?>                 
          </tr>
        </table>
    	</div>
        <div style="display:none" class="fist">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="load_dierqiuds_h">
          <tr valign="top" class="ball_dx" align="center">
        <?
			$i=0;
			krsort($tb[1][2]);
			foreach ($tb[1][2] as $key => $value) {
				if(strlen($value)>0){
				if($i==1){
		?>
        		<td height="30" class="ball_dx_bg02"><?=$value ?></td>
        <?
				}else{
		?>
        		<td height="30" <? if(($i%2)==1){ ?>class="ball_dx_bg"<? } ?>><?=$value ?></td>
        <?
				}
				$i++;
				}
				
			}
			for($z=$i;$z<28;$z++){
		?>
        	<td height="30" <? if($z==28){ ?><? }else{ ?><? if(($z%2)==1){ ?>class="ball_dx_bg"<? } ?><? } ?>>&nbsp;</td>
        <?	
			}
		?>                    
          </tr>
        </table>
    	</div>
        <div style="display:none" class="fist">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="load_disanqiu_h">
          <tr valign="top" class="ball_dx" align="center">
        <?
			$i=0;
			krsort($tb[2][0]);
			foreach ($tb[2][0] as $key => $value) {
				if(strlen($value)>0){
				if($i==1){
		?>
        		<td height="30" class="ball_dx_bg02"><?=$value ?></td>
        <?
				}else{
		?>
        		<td height="30" <? if(($i%2)==1){ ?>class="ball_dx_bg"<? } ?>><?=$value ?></td>
        <?
				}
				$i++;
				}
				
			}
			for($z=$i;$z<28;$z++){
		?>
        	<td height="30" <? if($z==28){ ?><? }else{ ?><? if(($z%2)==1){ ?>class="ball_dx_bg"<? } ?><? } ?>>&nbsp;</td>
        <?	
			}
		?>                
          </tr>
        </table>
    	</div>
        <div style="display:none" class="fist">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="load_disanqiudx_h">
          <tr valign="top" class="ball_dx" align="center">
        <?
			$i=0;
			krsort($tb[2][1]);
			foreach ($tb[2][1] as $key => $value) {
				if(strlen($value)>0){
				if($i==1){
		?>
        		<td height="30" class="ball_dx_bg02"><?=$value ?></td>
        <?
				}else{
		?>
        		<td height="30" <? if(($i%2)==1){ ?>class="ball_dx_bg"<? } ?>><?=$value ?></td>
        <?
				}
				$i++;
				}
				
			}
			for($z=$i;$z<28;$z++){
		?>
        	<td height="30" <? if($z==28){ ?><? }else{ ?><? if(($z%2)==1){ ?>class="ball_dx_bg"<? } ?><? } ?>>&nbsp;</td>
        <?	
			}
		?>                    
          </tr>
        </table>
    	</div>
        <div style="display:none" class="fist">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="load_disanqiuds_h">
          <tr valign="top" class="ball_dx" align="center">
        <?
			$i=0;
			krsort($tb[2][2]);
			foreach ($tb[2][2] as $key => $value) {
				if(strlen($value)>0){
				if($i==1){
		?>
        		<td height="30" class="ball_dx_bg02"><?=$value ?></td>
        <?
				}else{
		?>
        		<td height="30" <? if(($i%2)==1){ ?>class="ball_dx_bg"<? } ?>><?=$value ?></td>
        <?
				}
				$i++;
				}
				
			}
			for($z=$i;$z<28;$z++){
		?>
        	<td height="30" <? if($z==28){ ?><? }else{ ?><? if(($z%2)==1){ ?>class="ball_dx_bg"<? } ?><? } ?>>&nbsp;</td>
        <?	
			}
		?>                    
          </tr>
        </table>
    	</div>
        <div style="display:none" class="fist">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="load_disiqiu_h">
          <tr valign="top" class="ball_dx" align="center">
        <?
			$i=0;
			krsort($tb[3][0]);
			foreach ($tb[3][0] as $key => $value) {
				if(strlen($value)>0){
				if($i==1){
		?>
        		<td height="30" class="ball_dx_bg02"><?=$value ?></td>
        <?
				}else{
		?>
        		<td height="30" <? if(($i%2)==1){ ?>class="ball_dx_bg"<? } ?>><?=$value ?></td>
        <?
				}
				$i++;
				}
				
			}
			for($z=$i;$z<28;$z++){
		?>
        	<td height="30" <? if($z==28){ ?><? }else{ ?><? if(($z%2)==1){ ?>class="ball_dx_bg"<? } ?><? } ?>>&nbsp;</td>
        <?	
			}
		?>                
          </tr>
        </table>
    	</div>
        <div style="display:none" class="fist">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="load_disiqiudx_h">
          <tr valign="top" class="ball_dx" align="center">
        <?
			$i=0;
			krsort($tb[3][1]);
			foreach ($tb[3][1] as $key => $value) {
				if(strlen($value)>0){
				if($i==1){
		?>
        		<td height="30" class="ball_dx_bg02"><?=$value ?></td>
        <?
				}else{
		?>
        		<td height="30" <? if(($i%2)==1){ ?>class="ball_dx_bg"<? } ?>><?=$value ?></td>
        <?
				}
				$i++;
				}
				
			}
			for($z=$i;$z<28;$z++){
		?>
        	<td height="30" <? if($z==28){ ?><? }else{ ?><? if(($z%2)==1){ ?>class="ball_dx_bg"<? } ?><? } ?>>&nbsp;</td>
        <?	
			}
		?>                    
          </tr>
        </table>
    	</div>
        <div style="display:none" class="fist">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="load_disiqiuds_h">
          <tr valign="top" class="ball_dx" align="center">
        <?
			$i=0;
			krsort($tb[3][2]);
			foreach ($tb[3][2] as $key => $value) {
				if(strlen($value)>0){
				if($i==1){
		?>
        		<td height="30" class="ball_dx_bg02"><?=$value ?></td>
        <?
				}else{
		?>
        		<td height="30" <? if(($i%2)==1){ ?>class="ball_dx_bg"<? } ?>><?=$value ?></td>
        <?
				}
				$i++;
				}
				
			}
			for($z=$i;$z<28;$z++){
		?>
        	<td height="30" <? if($z==28){ ?><? }else{ ?><? if(($z%2)==1){ ?>class="ball_dx_bg"<? } ?><? } ?>>&nbsp;</td>
        <?	
			}
		?>                     
          </tr>
        </table>
    	</div>
        <div style="display:none" class="fist">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="load_diwuqiu_h">
          <tr valign="top" class="ball_dx" align="center">
        <?
			$i=0;
			krsort($tb[4][0]);
			foreach ($tb[4][0] as $key => $value) {
				if(strlen($value)>0){
				if($i==1){
		?>
        		<td height="30" class="ball_dx_bg02"><?=$value ?></td>
        <?
				}else{
		?>
        		<td height="30" <? if(($i%2)==1){ ?>class="ball_dx_bg"<? } ?>><?=$value ?></td>
        <?
				}
				$i++;
				}
				
			}
			for($z=$i;$z<28;$z++){
		?>
        	<td height="30" <? if($z==28){ ?><? }else{ ?><? if(($z%2)==1){ ?>class="ball_dx_bg"<? } ?><? } ?>>&nbsp;</td>
        <?	
			}
		?>                 
          </tr>
        </table>
    	</div>
        <div style="display:none" class="fist">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="load_diwuqiudx_h">
          <tr valign="top" class="ball_dx" align="center">
        <?
			$i=0;
			krsort($tb[4][1]);
			foreach ($tb[4][1] as $key => $value) {
				if(strlen($value)>0){
				if($i==1){
		?>
        		<td height="30" class="ball_dx_bg02"><?=$value ?></td>
        <?
				}else{
		?>
        		<td height="30" <? if(($i%2)==1){ ?>class="ball_dx_bg"<? } ?>><?=$value ?></td>
        <?
				}
				$i++;
				}
				
			}
			for($z=$i;$z<28;$z++){
		?>
        	<td height="30" <? if($z==28){ ?><? }else{ ?><? if(($z%2)==1){ ?>class="ball_dx_bg"<? } ?><? } ?>>&nbsp;</td>
        <?	
			}
		?>                 
          </tr>
        </table>
    	</div>
        <div style="display:none" class="fist">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="load_diwuqiuds_h">
          <tr valign="top" class="ball_dx" align="center">
        <?
			$i=0;
			krsort($tb[4][2]);
			foreach ($tb[4][2] as $key => $value) {
				if(strlen($value)>0){
				if($i==1){
		?>
        		<td height="30" class="ball_dx_bg02"><?=$value ?></td>
        <?
				}else{
		?>
        		<td height="30" <? if(($i%2)==1){ ?>class="ball_dx_bg"<? } ?>><?=$value ?></td>
        <?
				}
				$i++;
				}
				
			}
			for($z=$i;$z<28;$z++){
		?>
        	<td height="30" <? if($z==28){ ?><? }else{ ?><? if(($z%2)==1){ ?>class="ball_dx_bg"<? } ?><? } ?>>&nbsp;</td>
        <?	
			}
		?>                              
          </tr>
        </table>
    	</div>
        <div style="display:none" class="fist">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="load_zonghedx">
          <tr valign="top" class="ball_dx" align="center">
        <?
			$i=0;
			krsort($tb[5][0]);
			foreach ($tb[5][0] as $key => $value) {
				if(strlen($value)>0){
				if($i==1){
		?>
        		<td height="30" class="ball_dx_bg02"><?=$value ?></td>
        <?
				}else{
		?>
        		<td height="30" <? if(($i%2)==1){ ?>class="ball_dx_bg"<? } ?>><?=$value ?></td>
        <?
				}
				$i++;
				}
				
			}
			for($z=$i;$z<28;$z++){
		?>
        	<td height="30" <? if($z==28){ ?><? }else{ ?><? if(($z%2)==1){ ?>class="ball_dx_bg"<? } ?><? } ?>>&nbsp;</td>
        <?	
			}
		?>                
                  
          </tr>
        </table>
    	</div>
        <div style="display:none" class="fist">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="load_zongheds">
          <tr valign="top" class="ball_dx" align="center">
        <?
			$i=0;
			krsort($tb[6][0]);
			foreach ($tb[6][0] as $key => $value) {
				if(strlen($value)>0){
				if($i==1){
		?>
        		<td height="30" class="ball_dx_bg02"><?=$value ?></td>
        <?
				}else{
		?>
        		<td height="30" <? if(($i%2)==1){ ?>class="ball_dx_bg"<? } ?>><?=$value ?></td>
        <?
				}
				$i++;
				}
				
			}
			for($z=$i;$z<28;$z++){
		?>
        	<td height="30" <? if($z==28){ ?><? }else{ ?><? if(($z%2)==1){ ?>class="ball_dx_bg"<? } ?><? } ?>>&nbsp;</td>
        <?	
			}
		?>                
                 
          </tr>
        </table>
    	</div>
        <div style="display:none" class="fist">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="load_longhuhe">
          <tr valign="top" class="ball_dx" align="center">
        <?
			$i=0;
			krsort($tb[7][0]);
			foreach ($tb[7][0] as $key => $value) {
				if(strlen($value)>0){
				if($i==1){
		?>
        		<td height="30" class="ball_dx_bg02"><?=$value ?></td>
        <?
				}else{
		?>
        		<td height="30" <? if(($i%2)==1){ ?>class="ball_dx_bg"<? } ?>><?=$value ?></td>
        <?
				}
				$i++;
				}
				
			}
			for($z=$i;$z<28;$z++){
		?>
        	<td height="30" <? if($z==28){ ?><? }else{ ?><? if(($z%2)==1){ ?>class="ball_dx_bg"<? } ?><? } ?>>&nbsp;</td>
        <?	
			}
		?>                
                  
          </tr>
        </table>
       </div>
    </td>
  </tr> 
  </table>