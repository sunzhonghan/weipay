<?php
header("Content-type: text/html; charset=utf-8"); 
date_default_timezone_set("PRC");

$config = include_once '../config/wxh5pay.php';
include_once '../src/wxh5pay/Order.php';
include_once '../src/wxh5pay/lib/Core.php';
include_once '../src/wxh5pay/lib/Sign.php';



//$realValue = $_POST['realValue'];
$realValue = 10;
$openid = $_POST['openid'];
$isDiy = $_POST['isDiy'];
$allowList = $_POST['allowList'];

//$allowList =  array('10','20','50','100','200','500','1000','2000','3000');


//检测是不是为空
if(empty($realValue) || empty($openid)){
	$result=array(
		'resultCode' => 0,
		'Text' => '充值账号！或者充值金额不能为空！',
		//'充值账号！或者充值金额不能为空！'
	);
	//print_r($result);
	echo $result = json_encode($result);
	return true;
}
	
	
//这边加入一些对openid 的一个检查



	
if($realValue < 0){
	$result=array(
		'resultCode' => 1,
		'Text' => '系统已经记录了您对本系统的尝试入侵！',
	);
	//可以进行记录
	echo $result = json_encode($result);
	return true;
}

//记录了自定义金额小于100的注入攻击
if($isDiy == "自定义"){
	
	if($realValue < 100){
		$result=array(
			'resultCode' => 2,
			'Text' => '系统已经记录了您对本系统的尝试入侵！',
		//'Text' => '系统已经记录了您对本系统的尝试入侵！',
		);
		//可以进行记录
		echo $result = json_encode($result);
		return true;
	}	
}else{
	if(!in_array($realValue,$allowList)){
		$result=array(
		'resultCode' => 3,
		'Text' => $isDiy,
		//'Text' => '系统已经记录了您对本系统的尝试入侵！',
	);
		//可以进行记录
		echo $result = json_encode($result);
		return true;
	}
	
}





//这样应该是可以进行充值了！
$result=array(
	'resultCode' => 4,
	'Text' => '可以进行充值了！',
);
echo $result = json_encode($result);
return true;







$order = new \wxh5pay\Order($config);
$order->setParams([
    'body' => '测试产品',
    'out_trade_no' => date('YmdHis') . rand(10000, 9999),
    'total_fee' => '1',
    'trade_type' => 'MWEB',
    'device_info' => $config['device_info'],
    'spbill_create_ip' => '127.0.0.1',
    'notify_url' => $config['notify_url'],
    'scene_info' => '{"h5_info": {"type":"Wap","wap_url": "https://pay.qq.com","wap_name": "腾讯充值"}}'
]);
$res = $order->unifiedorder();
if(!$res){
    var_dump($order->errMsg);
}else{
    echo "<a href='{$res}'>点击支付</a>";
}