<?php
/**
 * Created by PhpStorm.
 * User: ys
 * Date: 2017/6/16
 * Time: 19:53
 */
namespace App\Http\Controllers\Home;


use Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Tools\Page;
use Illuminate\Support\Facades\Redis;
class LoanController extends CommonController
{
    /**
     * 我要投资
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home_loan_list(Request $request)
    {
        //查询投资交易总金额
        $total_money = DB::select('select sum(total_money) as total_money from  lar_projects ');
        $total_money = @$total_money[0]->total_money?$total_money[0]->total_money:0;
        $total_user_grows = DB::select('select sum(total_grow) as user_grow from  lar_user_grows ');
        $total_user_grows = @$total_user_grows[0]->user_grow?$total_user_grows[0]->user_grow:0;
        // 获取前台的多条件查询
        $config = $this->getConfig();
        return view('home.home_loan_list',['config'=>$config,'total_money'=>$total_money,'total_user_grows'=>$total_user_grows])->__toString();
    }

    /**
     * 多条件查询以及排序ajax
     * @param Request $request
     */
    public function loan_list_search(Request $request)
    {
//        return 1;
        // 接收所有参数
        $where_params = $request->all();
        // 设置分页参数
        $page_size = 4;
        $page = isset($where_params['page']) ? $where_params['page']:1;
        $limit = ($page-1)*$page_size;
        // 删除页码条件
        if(array_key_exists('page',$where_params)){
            unset($where_params['page']);
        }
        // 判断排序条件 默认以创建时间降序
        $order_field = isset($where_params['order_filed'])? $where_params['order_filed']:'create_time';
        $order = isset($where_params['order'])? $where_params['order']:'desc';

        // 获得条件
        $where = $this->getWhere($where_params);
        // return 1;
        $num = DB::table('projects')->where($where)->where('product_status',0)->count();

        if($num){
            $data['success'] = 1;
            $data['list'] = DB::table('projects')->where($where)->where('product_status',0)->orderBy($order_field, $order)->skip($limit)->take($page_size)->get();
            $params = array(
                'total_rows'=>$num,
                'method'    =>'ajax',
                'list_rows' =>$page_size,
                'ajax_func_name' =>'page',
                'now_page'  =>$page,
                'parameter' =>http_build_query($where_params),
            );
            $page = new Page($params);
            $data['str_page'] = $page->show(1);
        }else{
            $data['success'] = 0;
        }

        return json_encode($data);
    }
   /**
     * 前台展示多条件
     * @return array
     */
    public function getConfig(){
        return $config = [
            '项目类型'=>[
                'type=0'=>'不限',
                'type=1'=>'房易贷',
                'type=2'=>'车易贷',
            ],
            '年利率'=>[
                'rate=0'=>'不限',
                'rate=1'=>'12%以下',
                'rate=2'=>'12%-14%',
                'rate=3'=>'14%以上',
            ],
            '借款期限'=>[
                'term=0'=>'不限',
                'term=1'=>'3月内',
                'term=2'=>'3-6月',
                'term=3'=>'6-9月',
                'term=4'=>'9-12月',
                'term=5'=>'1年以上',
            ],
            '还款方式'=>[
                'way=0'=>'不限',
                'way=1'=>'等额本息',
                'way=2'=>'到期本息',
            ],
        ];
    }

    /**
     * 拼写条件
     * @param $data
     * @return array
     */
    public function getWhere($data){
        $where = [];
        if(isset($data['type'])){
            switch (intval($data['type'])) {
                case 1:
                    $where[] = ['goods_type', '=', 1];
                    break;
                case 2:
                    $where[] = ['goods_type', '=', 2];
                    break;
                default:;
            }
        }
        if (isset($data['rate'])) {
            switch (intval($data['rate'])) {
                case 1:
                    $where[] = ['rate', '<=', 12];
                    break;
                case 2:
                    $where[] = ['rate', '>', 12];
                    $where[] = ['rate', '<=', 14];
                    break;
                case 3:
                    $where[] = ['rate', '>', 14];
                    break;
                default:;
            }
        }
        if (isset($data['term'])) {
            switch (intval($data['term'])) {
                case 1:
                    $where[] = ['term', '<=', 3];
                    break;
                case 2:
                    $where[] = ['term', '>', 3];
                    $where[] = ['term', '<=', 6];
                    break;
                case 3:
                    $where[] = ['term', '>', 6];
                    $where[] = ['term', '<=', 9];
                    break;
                case 4:
                    $where[] = ['term', '>', 9];
                    $where[] = ['term', '<=', 12];
                    break;
                case 5:
                    $where[] = ['term', '>', 12];
                    break;
                default:
                    ;
            }
        }
        if (isset($data['way'])) {
            switch (intval($data['way'])) {
                case 1:
                    $where[] = ['repay_way', '=', 1];
                    break;
                case 2:
                    $where[] = ['repay_way', '=', 2];
                    break;
                default:;
            }
        }
        return $where;
    }




    //投资项目详情

    public function item_info()
    {

        if(empty(Session::get('user_id'))){
            return redirect()->action('Home\IndexController@login');
        }

        //判断用户信息是否完善
        $user_id = Session::get('user_id');

        $over_info = DB::table('users')->select('over_info')->where('user_id',$user_id)->first();

        //判断用户是否设置支付密码
        $pay_pass = DB::table('user_infos')->select('pay_pass')->where('user_id',$user_id)->first();
        if(empty($pay_pass->pay_pass)){
            $is_set = 0;
        }else{
            $is_set = 1;
            //储存一个用户支付密码错误次数
            Redis::set($user_id,3);
        }
        $product_id = isset($_REQUEST['product_id'])?$_REQUEST['product_id']:1;//项目id
        $list = DB::table("projects")->where('product_id', '=', $product_id)->first();
       if($list->total_money-$list->real_money <= 0){
           $loan_status = 0;
       }else{
           $loan_status = 1;
       }
        //查询借款信息
     $bids =  DB::table("bids")
               ->select('users.user_name','user_infos.card_number','bids.*')
               ->join('users','bids.user_id','=','users.user_id')
               ->join('user_infos','bids.user_id','=','user_infos.user_id')
               ->where('bids.product_id', $product_id)
               ->orderBy('bids.create_time','desc')
               ->get();
        //需要还款人ID
      $repay_id = DB::table('projects')->select('u_id')->where('product_id',$product_id)->first();
      $repay_id =  $repay_id ? $repay_id->u_id : 1 ;
          //查询出用户的还款
     
      $fen = DB::table('stages')
               ->join('users','stages.u_id','=','users.user_id')
               ->join('projects','stages.project_id','=','projects.product_id')
               ->where('stages.u_id','=',$repay_id)
               ->select('user_name','stages_time','stages_money','stsges_principal','stages_Interest','stages_date','stages_action','title','goods_type','product_id','status')
               ->get();
        //待换本息
        $wait_huai_benxi = DB::select('select sum(stages_money) as huai_benxi from  lar_stages where u_id = '.$repay_id.' and status = 0');
        $wait_huai_benxi = $wait_huai_benxi ? $wait_huai_benxi[0]->huai_benxi : 0 ;
        //已还本息
        $already_huai_benxi = DB::select('select sum(stages_money) as huai_benxi from  lar_stages where u_id = '.$repay_id.' and status = 1');

        $already_huai_benxi = @$already_huai_benxi[0]->huai_benxi ? $already_huai_benxi[0]->huai_benxi : 0 ;

        //查询用户是否拥有50元红包
        $red_50 = DB::table('user_redpackets')->where(['user_id'=>$user_id,'use_state'=>0,'r_id'=>1])->first() ? 1 : 0 ;
        //查询用户是否拥有100元红包
        $red_100 = DB::table('user_redpackets')->where(['user_id'=>$user_id,'use_state'=>0,'r_id'=>2])->first() ? 1 : 0 ;

        return view('home.info', ['v' => $list,'over_info'=>$over_info,'is_set'=>$is_set,'bids'=>$bids,'loan_status'=>$loan_status,'red_50'=>$red_50,'red_100'=>$red_100,'repayment'=>$fen,'wait_huai_benxi'=>$wait_huai_benxi,'already_huai_benxi'=>$already_huai_benxi]);
    }
    
    public function pay_pass_check(Request $request){
        $user_id = Session::get('user_id');
        //支付密码验证
        $user_pay_pass = md5($request->pay_pass);
        $real_pay_pass = DB::table('user_infos')->select('pay_pass')->where('user_id',$user_id)->first();
        //借款总额
        $amount = $request->amount;  
        //查看用户账号是否被锁定
        $is_lock = DB::table('user_infos')->select('is_lock')->where('user_id',$user_id)->first()->is_lock;
        if($is_lock == 1){
            $arr = [
                'error'=>4,//账户已被锁定
            ];
            return json_encode($arr);            
        }
        if($user_pay_pass == $real_pay_pass->pay_pass){
            //判断用户金额是否足够
            $user_money = DB::table('user_assets')->select('user_assets')->where('user_id',$user_id)->first()->user_assets;
            if($user_money-$amount<0){
                $arr = [
                    'error'=>2,
                ];
                return json_encode($arr);//用户资产不足
            }
            //接受红包信息，修改红包表
            $red_50 = $request->red50;
            $red_100 = $request->red100;
            if($red_50 == 1) DB::update('update lar_user_redpackets set use_state=1 where user_id ='.$user_id.' and r_id = 1  limit 1');
            if($red_100 == 1) DB::update('update lar_user_redpackets set use_state=1 where user_id ='.$user_id.' and r_id = 2  limit 1');
            
            //业务逻辑处理
            $product_id = $request->product_id;
            //待收利息
            $interest = $request->interest;
 
            //借款总额
            $amount = $request->amount;
            //该次交易号
            $product = DB::table('projects')->select('project_sn','term')->where('product_id',$product_id)->first();
            $product_sn = $product->project_sn;
            $term = $product->term;//总月份
            try{
            //开启事务
            DB::beginTransaction();
            //修改当前用户的总资产
            $assets_upd = DB::update('update lar_user_assets set user_assets = user_assets-'.$amount.' where user_id = ?',[$user_id]);

            //投资列表用户的投资额 +n
            $UpdateProjects = DB::update('update lar_projects set real_money = real_money+'.$amount.' where product_id = ?',[$product_id]);

            //修改网站流动资金
            DB::update('update lar_total_revenue set floating_capital = floating_capital +'.$amount);

                //修改用户信用积分
                $credit=0;
                if($amount>1000 && $amount<=3000){
                  $credit = 5;
                }elseif ($amount>3000 && $amount<=6000){
                    $credit = 7;
                }else if($amount>6000 && $amount<=10000){
                    $credit = 10;
                }else if($amount>10000){
                    $credit = 12;
                }
                DB::update('update lar_credits set credit_number=credit_number+'.$credit. ' where user_id='.$user_id);


            //投资记录表添加
            $add_bids = DB::table('bids')->insert(['user_id'=>$user_id,'product_id'=>$product_id,'bid_money'=>$amount,'each_grows'=>$interest,'create_time'=>time()]);
            
            //用户盈利表（代收利息）
            $user_grows_upd = DB::update('update lar_user_grows set wait_shou_interest = wait_shou_interest+'.$interest.',wait_shou_captital = wait_shou_captital + '.$amount.' where user_id = ?',[$user_id]);
            $user_grows_upd = DB::update('update lar_user_grows set total_grow = total_grow+'.$interest.' where user_id = ?',[$user_id]);
            //添加用户还款表（user_repays）
            $user_repays = DB::table('repays')->insert([
                'product_sn'=>$product_sn,//被操作的交易号
                'user_id'=>$user_id,//借出的人员id
                'total_month'=>$term,
                'every_month'=>$interest/$term,//每月需要还款金额
                'rep_date'=>time(),
                'project_id'=>$product_id//需要还款人ID
            ]);
            
                if($assets_upd&&$UpdateProjects&&$add_bids&&$user_grows_upd&&$user_repays){
                    DB::commit();
                    $success = 'SUCCESS';
                }else{
                    $success = 'ERROR';
                }
            }catch(Exception $e){
                DB::rollBack();
                $e->getMessage();    
            }
            if(@$success == 'SUCCESS'){
                $arr = [
                    'error'=>1,
                ];
                return json_encode($arr);//成功支付
            }else{
                $arr = [
                    'error'=>3,
                ];
                return json_encode($arr);//网络错误
            }

        }else{
            //支付密码错误三次，锁定用户
            $pay_num = Redis::decr($user_id);
            $arr = [
                'error'=>0,
                'pay_num'=>$pay_num
            ];
            if($pay_num<=0){
                //锁定账户
                DB::table('user_infos')->where('user_id',$user_id)->update(['is_lock'=>1]);
                $arr = [
                    'error'=>4,//账户已被锁定
                ];
                return json_encode($arr);
            }
            return json_encode($arr);//支付密码错误

               

        }

    }

}