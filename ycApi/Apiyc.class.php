<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Apiyc{
	
    //取得aa值
    public function aa()
	{
        include("config.php");
         $aa=$web_key_substr;
         $aa=  str_replace('+','%2B',$aa);
        return $aa;
    }
	
	// 获取token
    public function token()
	{
        include("config.php");
         $token=$tokens;
         return $token;
        
    }
  
	//查询用户信息
    public function selects()
	{
    unset($mysqli);
$mysqli	=	new MySQLi("localhost","root",'LOVEbaby1218!@#$',"yl66y");
$mysqli->query("set names utf8");
        $u=$_SESSION['um'];
		// TODO:此处可自行调整
        $sql="select * from user_list where user_name='$u'";
        $arr=$mysqli->query($sql);
        $arr=$arr->fetch_array();
        return $arr;
    }
   

    //接口请求函数
	public function https_request($url,$data = null)
	{
		$curl = curl_init();//开启请求会话
		curl_setopt($curl, CURLOPT_URL, $url);  //请求的地址
		
		//默认执行GET请求
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);  //请求模式为get的设置
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE); //请求模式为get的设置
		
		//执行POST请求
		if (!empty($data))
		{
			curl_setopt($curl, CURLOPT_POST, 1);   // 设置POST请求方式
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);  // 设置POST请求方式,并且加上json数据
		}
		
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  //执行以后返回文件流，而不直接输出
		
		//执行请求
		$output = curl_exec($curl);
		//关闭资源
		curl_close($curl);
		//吧返回的JSON转成数组
		$output=json_decode($output,true); 
		return $output;
	}
}

?>
