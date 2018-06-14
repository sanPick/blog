<?php
ini_set('date.timezone','Asia/Shanghai');
error_reporting(E_ERROR);
require_once "../app/Wechat/lib/WxPay.Api.php";


if(isset($_REQUEST["transaction_id"]) && $_REQUEST["transaction_id"] != ""){
    $transaction_id = $_REQUEST["transaction_id"];
    $input = new WxPayOrderQuery();
    $input->SetTransaction_id($transaction_id);
    $data=WxPayApi::orderQuery($input);
    echo json_encode($data);
    exit();
}

if(isset($_REQUEST["out_trade_no"]) && $_REQUEST["out_trade_no"] != ""){
    $out_trade_no = $_REQUEST["out_trade_no"];
    $input = new WxPayOrderQuery();
    $input->SetOut_trade_no($out_trade_no);
    $data=WxPayApi::orderQuery($input);
    echo json_encode($data);
    exit();
}
?>
