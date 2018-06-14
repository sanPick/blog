<?php
include_once '..app/wechat/lib/WxPay.Data.php';

$wx=new WxPayDataBase();
$data=$wx->FromXml($xml);
file_put_contents("../".date('Ymd-His'), print_r($data, true));

//实例化验证签名类
$pay=new WxPayResults();
//给子类的属性赋值作用到子类
$pay->values=$data;
if($pay->CheckSign()){
    // 查询两个返回值 或者 直接 查询订单状态
    if($data['return_code']=='SUCCESS' && $data['result_code']=='SUCCESS'){
        //处理业务逻辑,数据库的操作
        //在调用查询订单号接口进行订单状态的判断（根据微信订单号查询）
        //只有trade_state为success才算是真正的支付成功

        //所有的业务处理完成后，输出success（XML格式）
        echo '<xml>
            <return_code><![CDATA[SUCCESS]]></return_code>
            <return_msg><![CDATA[OK]]></return_msg>
            </xml>';
    }else{
        file_put_contents('../error.txt','rade_state fail');
    }

}else{
    //签名不正确
    file_put_contents('../error.txt','sign error');
}