<?php
date_default_timezone_set(PRC);
//ƽ̨�̻�ID����Ҫ�������Լ����̻�ID
//$UserId="1234";


//�ӿ���Կ����Ҫ���������Լ�����Կ��Ҫ����̨���õ�һ��
//��¼APIƽ̨���̻�����-->��ȫ����-->��Կ���ã������Լ�������Կ

//$SalfStr="F344CD36ADE16448956B4C4829927F4E";


//�������ص�ַ��Ҫ���³������ڵ�ƽ̨���ص�ַ

$BankUrl="http://do.jftpay.net/chargebank.aspx";

//�������ص�ַ��Ҫ���³������ڵ�ƽ̨���ص�ַ

$CardUrl="http://do.jftpay.net/cardReceive.aspx";
//��ֵ�����̨֪ͨ��ַ

$result_url="http://".$_SERVER["HTTP_HOST"]."/php/jftpay/result_url.php";


//��ֵ����û�����վ�ϵ�ת���ַ

$notify_url="http://".$_SERVER["HTTP_HOST"]."/php/jftpay/notify_Url.php";
?>