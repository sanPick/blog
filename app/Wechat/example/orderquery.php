<?php
ini_set('date.timezone','Asia/Shanghai');
error_reporting(E_ERROR);
require_once "../lib/WxPay.Api.php";
require_once 'log.php';

//初始化日志
$logHandler= new CLogFileHandler("./logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);
//遍历数据到font标签
function printf_info($data)
{
    foreach($data as $key=>$value){
        echo "<font color='#f00;'>$key</font> : $value <br/>";
    }
}

//微信订阅号进行查询
if(isset($_REQUEST["transaction_id"]) && $_REQUEST["transaction_id"] != ""){
	$transaction_id = $_REQUEST["transaction_id"];
	$input = new WxPayOrderQuery();
	$input->SetTransaction_id($transaction_id);
	printf_info(WxPayApi::orderQuery($input));
	//echo json_encode(WxPayApi::orderQuery($input));
	exit();
}
//以商户订单号为条件进行查询
if(isset($_REQUEST["out_trade_no"]) && $_REQUEST["out_trade_no"] != ""){
	$out_trade_no = $_REQUEST["out_trade_no"];
	$input = new WxPayOrderQuery();
	$input->SetOut_trade_no($out_trade_no);
	$data=WxPayApi::orderQuery($input);
	//printf_info(WxPayApi::orderQuery($input));
	 if(isset($data['trade_state'])){
		 echo $data['trade_state'];
	 }
	exit();
}
?>
