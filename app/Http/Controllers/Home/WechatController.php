<?php
namespace App\Http\Controllers\Home;

use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests;
use Session;
use DB;
use Illuminate\Http\Request;
class WechatController extends CommonController
{
    /**
     * 微信生成订单
     * @param $money
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function businessPay($money){
        // 加载类文件
        require_once app_path()."/Wechat/lib/WxPay.Api.php";
        require_once app_path()."/Wechat/example/WxPay.NativePay.php";
        require_once app_path().'/Wechat/example/log.php';
        $notify = new \NativePay();
        $input = new \WxPayUnifiedOrder();
        $input->SetBody("充值");
        $input->SetAttach("test");
        //生成订单号
        $order_id=date("YmdHis").rand(111,222);
        $input->SetOut_trade_no($order_id);
        //订单总金额，单位是分
        $input->SetTotal_fee($money*100);

        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 300));
        $input->SetGoods_tag("test");
        //异步通知地址
        $input->SetNotify_url("http://47.93.60.135/wechat/notifyurl");
        //扫码支付设置
        $input->SetTrade_type("NATIVE");
        //商品ID
        $Product_id=time().uniqid();
        $input->SetProduct_id($Product_id);
        $result = $notify->GetPayUrl($input);
        $url2 = urlencode($result["code_url"]);
        //将订单存入数据库
        $user_id=session('user_id');
        $info = DB::table('order')->insert(
            ['order_id' => $order_id, 'money' => $money, 'user_id' => $user_id, 'create_time' => date('Y-m-d H:i:s')]);
        if($info){
            return view("home.wechatnative",['url2'=>$url2,'order_id'=>$order_id,'money' => $money]);
        }else{
            echo 'order fail';
        }
    }

    /**
     * 生成二维码
     * @param Request $request
     * @return mixed
     */
    public function qrcode(){
        require_once app_path().'/Wechat/example/phpqrcode/phpqrcode.php';
        $url = urldecode($_GET["data"]);
        return \QRcode::png($url);
    }

    /**
     * 查询订单状态
     * @param Request $request
     * @throws \WxPayException
     */
    public function queryOrder(Request $request){
        require_once app_path()."/Wechat/lib/WxPay.Api.php";
        $data = $request->all();
        if(isset($data["transaction_id"]) && $data["transaction_id"] != ""){
            $transaction_id = $_REQUEST["transaction_id"];
            $input = new \WxPayOrderQuery();
            $input->SetTransaction_id($transaction_id);
            $data=\WxPayApi::orderQuery($input);
            return json_encode($data);
        }

        if(isset($_REQUEST["out_trade_no"]) && $_REQUEST["out_trade_no"] != ""){
            $out_trade_no = $_REQUEST["out_trade_no"];
            $input = new \WxPayOrderQuery();
            $input->SetOut_trade_no($out_trade_no);
            $data=\WxPayApi::orderQuery($input);
            return json_encode($data);
        }
    }

    /**
     * 异步回调地址
     * @throws \WxPayException
     */
    public function notifyUrl(){
        include_once  app_path().'/Wechat/lib/WxPay.Data.php';
        $input=new \WxPayDataBase();
        //把接收的XML数据转换为数组
        $data=$input->FromXml(file_get_contents('php://input')); //此方法同上面一样，可以接收POST数据，也可以接收XML数据
        $all=json_encode($data);
        $recharge_time=date("Y-m-d H:i:s");
        $recharge_order=$data['out_trade_no'];
        $recharge_money=$data['total_fee']/100;
//        file_put_contents('3.log',json_encode($data));
        $pay=new \WxPayResults();
        $pay->FromArray($data);
        //签名认证
        $res=$pay->CheckSign();
        if($res){
            if($data['result_code']=='SUCCESS'){

                //根据订单获取用户ID
                $user_id=DB::table('order')->where('order_id',$recharge_order)->value('user_id');
//                file_put_contents('2.log',$user_id);
                DB::beginTransaction();
                try{
                    if(empty($user_id)){
                        throw new \Exception();
                    }
                    //对该用户的余额进行修改
                    $update_recharge=DB::table('user_assets')->where('user_id',$user_id)->increment('user_assets',$recharge_money);
                    if(!$update_recharge){
                        throw new \Exception();
                    }
                    //进行添加用户的充值记录进行修改
                    $recharge=DB::table('recharge')->insert(['recharge_sum'=>$recharge_money,'recharge_time'=>$recharge_time,'order_id'=>$recharge_order,'info'=>$all,'user_id'=>$user_id]);
                    if(!$recharge){
                        throw new \Exception();
                    }
                    DB::commit();
                    echo '<xml>
                        <return_code><![CDATA[SUCCESS]]></return_code>
                        <return_msg><![CDATA[OK]]></return_msg>
                        </xml>';die;
                }catch (\Exception $e){
                    DB::rollBack();
                }

            }
        }
    }
}