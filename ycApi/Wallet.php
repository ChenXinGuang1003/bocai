<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
	include("../include/mysqli.php");
	include("config.php");
	include("Apiyc.class.php");
       $arr=new Apiyc();
       $user=$_POST['user'];
        $sql="select money from k_user where username='$user'";
        $res=$mysqli->query($sql);
        $res=$res->fetch_array();
       echo $res['money'];
