<?
date_default_timezone_set(PRC);
//ƽ̨�̻�ID����Ҫ�������Լ����̻�ID
//$UserId="2151";


//�ӿ���Կ����Ҫ���������Լ�����Կ��Ҫ����̨���õ�һ��
//��¼APIƽ̨���̻�����-->��ȫ����-->��Կ���ã������Լ�������Կ
//$SalfStr="asd123123qwe456";


//���ص�ַ��Ҫ���³������ڵ�ƽ̨���ص�ַ
//���磺����www.abc.com�ϽӵĽӿڣ���ô���ص�ַ���ǣ�http://www.abc.com/pay/gateway.asp
$gateWary="http://pay.vftpay.com/pay/gateway.asp";


//��ֵ�����̨֪ͨ��ַ
$result_url="http://".$_SERVER["HTTP_HOST"]."/php/vftpay/result_url.php";


//��ֵ����û�����վ�ϵ�ת���ַ
$notify_url="http://".$_SERVER["HTTP_HOST"]."/php/vftpay/notify_Url.php";
?>