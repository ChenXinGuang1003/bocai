<?php
session_start();

include_once("../newbbin2/config.php");
include_once("../newbbin2/api.class.php");

$agusername=$_GET['u'];

if(!empty($agusername)){
	
        $bbinapi = new BBIN_TZH($comId,$comKey,$gamePlatform);
		$balance = $bbinapi->GetBalance($agusername, $agpassword);
		//echo $balance;
	if($balance!==false)
        {
          $json["general"] = sprintf("%.2f",$balance);	
			
		  
		    $sql		=	"update user_list set bb_money =$balance where bb_username='$agusername'";
			$mysqli->query($sql);// or die($sql);
			$q1			=	$mysqli->affected_rows;
			$mysqli->close();

        }
            else {
            $json["general"] =0 ;	
            }
	//echo json_encode($json);
//	echo $callback."(".json_encode($json).");";
//	exit; 
	
}else{
	$json["general"]="δ��ͨ";
}
//echo $callback."(".json_encode($json).");";
//	exit;
        
         if(isset($_GET['type'])) {
           $ag_money =  $json["general"];}
            else {
            //echo  $json["general"];
			echo $json["general"];
            }
	exit;
?>
