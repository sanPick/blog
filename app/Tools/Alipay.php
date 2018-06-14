<?php 
/***
    支付宝支付

*/
namespace App\Tools;

class Alipay{
    //合作身份者id，以2088开头的16位纯数字
    private $partner;
    //收款支付宝账号
    private $seller_email;
    //安全检验码，以数字和字母组成的32位字符
    private $key;
    //签名方式 不需修改
    private $sign_type;
    //访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
    private $transport;
    // 服务器异步通知页面路径
    private $notify_url;
    // 页面跳转同步通知页面路径
    private $return_url;
    // 唯一订单
    private $out_trade_no;
    //价格
    private $total_fee;

    public function __construct($money){
        $this->partner = '2088121321528708';
        $this->seller_email = 'itbing@sina.cn';
        $this->key = '1cvr0ix35iyy7qbkgs3gwymeiqlgromm';
        $this->sign_type = strtoupper('MD5');
        $this->transport = 'http';
        $this->notify_url = 'http://47.93.60.135/index.php';
        $this->return_url = env('APP_URL').'recharge';
        $this->out_trade_no = date('YMD').uniqid().mt_rand(1000,9999);
        $this->total_fee = $money;

    }

    //去重排序拼接生成url
    public function alipay_url(){
            $parameter = array(
                "service" => "create_direct_pay_by_user",
                "partner" => $this->partner, // 合作身份者id
                "seller_email" => $this->seller_email, // 收款支付宝账号
                "payment_type"	=> '1', // 支付类型
                "notify_url"	=> $this->notify_url, // 服务器异步通知页面路径
                "return_url"	=> $this->return_url, // 页面跳转同步通知页面路径
                "out_trade_no"	=> $this->out_trade_no, // 商户网站订单系统中唯一订单号
                "subject"	=> "用户充值", // 订单名称
                "total_fee"	=> $this->total_fee, // 付款金额
                "body"	=> "1503", // 订单描述 可选
                "show_url"	=> "", // 商品展示地址 可选
                "anti_phishing_key"	=> "", // 防钓鱼时间戳  若要使用请调用类文件submit中的query_timestamp函数
                "exter_invoke_ip"	=> "", // 客户端的IP地址
                "_input_charset"	=> 'utf-8', // 字符编码格式
            );
            
            // 去除值为空的参数
            foreach ($parameter as $k => $v) {
                if (empty($v)) {
                    unset($parameter[$k]);
                }
            }
            // 参数排序
            ksort($parameter);
            reset($parameter);

            // 拼接获得sign
            $str = "";
            foreach ($parameter as $k => $v) {
                if (empty($str)) {
                    $str .= $k . "=" . $v;
                } else {
                    $str .= "&" . $k . "=" . $v;
                }
            }
            $parameter['sign'] = md5($str . $this->key);	// 签名
            $parameter['sign_type'] = $this->sign_type;
            // ******************************************************请求参数拼接 end*************************************************************************************************************************


            // ******************************************************模拟请求 start*************************************************************************************************************************
            $url = 'https://mapi.alipay.com/gateway.do?_input_charset=utf-8';
            $str = '';
            foreach ($parameter as $k => $v) {
                    $str .= "&" . $k . "=" . $v;

            }

            return $url.$str;        
    }


}