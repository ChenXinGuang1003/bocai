<?php
header("Context-type:text/html;charset:utf-8");
session_start();
include_once 'config.php';

echo file_get_contents('http://47.88.8.241:741/MG/index/get_agent_credit/id/'.$comId);