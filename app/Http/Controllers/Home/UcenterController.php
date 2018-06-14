<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Session;
use App\Tools\Alipay;
use App\Tools\Functions;
use Mail;
use Redirect;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redis;
class UcenterController extends CommonController
{
    public function __construct(){

        if(!session('user_id')){
            return redirect()->action('Home\IndexController@login');
        }
    }

    //用户中心
    public function index()
    {
        $user=session('user_id');
        if(!empty($user)){
            $users=DB::table('user_grows')->where('user_id','=',$user)->first();
            $users_assets=DB::table('user_assets')->select('user_assets')->where('user_id','=',$user)->first();
            $userinfo = DB::table('users')->select('user_name','last_time')->where('user_id','=',session('user_id'))->first();
        
        
            $user_card=DB::table('user_card')->where('user_id','=',$user)->get();
             // print_r($user_card);die;
            return view('home.user',['user'=>$users,'userinfo'=>$userinfo->last_time,'user_name'=>$userinfo->user_name,'user_assets'=>$users_assets->user_assets],['user_card'=>$user_card]);
        }else{
            return view('home.login');
        }
    }

    //绑定银行卡
    public function binding(Request $request){
        $user=session('user_id');
        if($request->isMethod('post')){
             $arr=$request->all();
            $date=[
                'user_id'=>$user,
                'user_card'=>$arr['user_card'],
                'user_bank'=>$arr['user_bank'],
                'card_type'=>1
            ];
            $er=DB::table('user_card')->where('user_id','=',$user)->first();
            if(!empty($er)){
                $a=DB::table('user_card')->insert($date);
                $e=DB::table('activity')->insert(['user_id'=>$user,'activity_num'=>50]);
                if($a&&$e){
                    return  view('home.bindsuc',['code'=>0]);
                }
            }else{
                $a=DB::table('user_card')->insert($date);
                if($a){
                    $code = DB::table('user_redpackets')->select('code')->where('state',0)->first()->code;
                    if(!$code){
                        $code = 0;
                    }else{
                        Cookie::queue('red_code',$code);
                    }
                    return  view('home.bindsuc',['code'=>$code]);
                }
            }

        }else{
            if(!empty($user)){
                if(DB::table('users')->select('over_info')->where('user_id',$user)->first()->over_info == 1){
                     $card_number = DB::table('user_infos')->select('card_number')->where('user_id',$user)->first()->card_number;
                }else{
                    $card_number = 0;
                }

                return view('home.binding',['card_number'=>$card_number]);
            }else{
                return view('home.login');

            }
        }



    }
    //银行卡唯一验证
    public function binding_sole(Request $request){
        $request->user_card;
        $arr=DB::table('user_card')->where('user_card','=',$request->user_card)->first();
        if(empty($arr)){
            return 0;
        }else{
            return 1;
        }
    }
    
    //邀请注册
    public function invite(Request $request){
        $user=session('user_id');
        if($request->isMethod('post')){

            $jifen = $request->jifen;

            if($jifen >= 1000){
                if(DB::delete('delete from lar_invite where invite_id = '.$user.' limit 4')){
                    //查询红包表code
                    $code = DB::table('user_redpackets')->select('code')->where('state',0)->first()->code;
                    $arr = [
                        'msg'=>'1',
                        'code'=>$code
                    ];
                    return json_encode($arr);//兑换成功
                }else{
                    $arr = [
                        'msg'=>'0',
                    ];
                    return json_encode($arr);//网络异常
                }
            }else{
                    $arr = [
                        'msg'=>'2',
                    ];
                return json_encode($arr);//积分不足
            }
        }else{

            $host = $_SERVER['HTTP_HOST'];
            $arr=DB::table('invite')->where('invite_id','=',$user)->whereNotNull('be_invite_id')->Join('users', 'invite.be_invite_id', '=', 'users.user_id')->get(['invite_time','user_name']);
            //查取用户总积分
            $count = DB::table('invite')->where('invite_id',$user)->count();
//            
            return view('home.invite',['arr'=>$arr,'host'=>$host,'jifen'=>$count*200]);
        }
    }   
    /**
     * [recharge description]
     * 用户充值
     * @return [type] [description]
     */
    public function recharge(Request $request){
        if($request->isMethod('post')){
            $money  = $request->money;
            $pay_type = $request->pay_type;
            if($pay_type==1){
                //alipay地址
                 $alipay = new alipay($money);
                 $alipay_url = $alipay->alipay_url();
                 echo $alipay_url;
            }else if($pay_type==2){
                //微信支付 改为遮罩层
            }
                        
        }
        else{
            if(@$_GET['trade_status']=='TRADE_SUCCESS'){
                $arr=$request->all();
                $user=session('user_id');
                $date=[
                    'recharge_sum'=>$arr['total_fee'],
                    'recharge_time'=>$arr['notify_time'],
                    'user_id'=>$user
                ];
                $e=DB::table('recharge')->insert($date);
                //添加用户总额
                DB::update('update lar_user_assets set  user_assets = user_assets +'.$arr['total_fee'].' where user_id = '.$user);
                if($e){
                    return view('home.paysuc',['money'=>$_GET['total_fee']]);
                }

            }else{
                return view('home.recharge');
            }
        }
    }
    //用户充值记录
    public function recharge_list(){
        $user=session('user_id');
        $arr=DB::table('recharge')->where('user_id','=',$user)->get();
//        print_r($arr);die;
        return view('home.recharge_list',['arr'=>$arr]);
    }
    //银行卡提现
    public function cash(Request $request){

        if($request->isMethod('post')){
          $user=session('user_id');

          $arr=$request->all();
          //判断用户支付密码是否正确
          $info = DB::table('user_infos')->select('user_id')->where(['pay_pass'=>md5($arr['pay_pass']),'user_id'=>$user])->first();
          if(empty($info)){
              return 3;//密码不对
          }
          $new_assets=$arr['user_assets']-$arr['cash'];

          $data=[
            'user_id'=>$user,
            'user_card'=>$arr['user_card'],
            'cash'=>$arr['cash'],
            'time'=>time(),
            'cash_formalities'=>$arr['cash']*0.01
          ];
            $today = strtotime(date('Y-m-d',time()));
            //修改网站收益
            DB::update('update lar_income set income = income+'.($arr['cash']*0.01).' where date  = '.$today);
            DB::update('update lar_total_revenue set total_website_revenue = total_website_revenue+'.($arr['cash']*0.01));
            $err=DB::table('cash')->insert($data);
            $a=DB::table('user_assets')->where('user_id','=',$user)->update(['user_assets'=>$new_assets]);
            if($err==1&&$a==1){
                return 1;
            }else{
                return 0;
            }
        }else{
            $user=session('user_id');

            if($user){
                $arr=DB::table('user_card')->where('user_id','=',$user)->get();
                if(!empty($arr)){
                    $data=DB::table('user_assets')->where('user_id','=',$user)->first();
                    $arr=json_encode($arr);
                    $arr=json_decode($arr,true);
                    if(empty(DB::table('user_infos')->select('pay_pass')->where('user_id',$user)->first()->pay_pass)){
                        $pay_pass = 0;//用户未设置支付密码
                    }else{
                        $pay_pass = 1;
                    }
                    return view('home.cash',['uss'=>$data,'arr'=>$arr,'pay_pass'=>$pay_pass]);
                }else{
                    return  Redirect::to('binding');
                }
            }else{
                return view('home.login');
            }
        }
    }



//账户设置
public function Account(){
    $user_id=session('user_id');

    $arr = DB::table('users')->where('users.user_id','=',$user_id)->leftJoin('user_infos','users.user_id','=','user_infos.user_id')->select('tel','pay_pass','card_number','email','over_info','is_lock')->first();

    return view('home.Account',['arr'=>$arr]);
}

//邮箱发送
public function email_code(){
    $email = $_POST['email'];
    $this->email = $email;
    $code = rand(1111,9999);

    $res =  Mail::raw('您的验证码为：'.$code.'打死都不能说.',function ($msg){

        $msg->from('asandaye@163.com','asan');

        $msg->subject('重置个人信息');

        $msg->to($this->email);

    });
    if($res){

        Session::put('code',$code);
        $a = 1;
    }else{
        $a = 0;
    }
    return $a;

}

        

//验证码验证
public function code_verify(){
    $code = $_POST['code'];
    $s_code = Session::get('code');
    if(!empty($code)){
        if($code == $s_code){
            $msg=1;
        }else{
            $msg=0;
        }
    }else{
        $msg=0;
    }

    return $msg;
}

//手机号修该
public function up_tel(){
    $new_tel = $_POST['new_tel'];
    $user_id=session('user_id');
    $res = DB::table('users')->where('user_id','=',$user_id)->update(['tel'=>$new_tel]);
    if($res){
        Session::forget('code');
        $msg = 1;
    }else{
        $msg = 0;
    }
    return $msg;
}


//邮箱修改
public function up_email(){
    $new_email = $_POST['new_email'];
    $old_email_code = $_POST['old_email_code'];
    $user_id=session('user_id');
    $s_code = Session::get('code');
    $msg = "";
    if(!empty($old_email_code) && $old_email_code==$s_code){
        $res = DB::table('users')->where('user_id','=',$user_id)->update(['email'=>$new_email]);
        if($res){
            Session::forget('code');
            $msg  = 1;
        }else{
            $msg = 0;
        }
    }else{
        $msg = 2;
    }
    return $msg;
}

//登录密码修改
public function Up_pwd(){
    //0修改失败   1修改成功  2原密码不正确 3新密码输入不一致
    $user_id=session('user_id');
    $old_pwd = $_POST['old_pwd'];
    $new_pwd = $_POST['new_pwd'];
    $qr_pwd = $_POST['qr_pwd'];
    $msg = "";
    $arr = DB::table('users')->where('user_id','=',$user_id)->select('password')->first();

    if(!empty($old_pwd) && md5($old_pwd)==$arr->password){
        if(!empty($old_pwd) && !empty($qr_pwd) && $new_pwd == $qr_pwd){
            $res = DB::table('users')->where('user_id','=',$user_id)->update(['password'=>md5($new_pwd)]);
            if($res){
                $msg = 1;
            }else{
                $msg = 0;
            }

        }else{
            $msg = 3;
        }

    }else{
        $msg = 2;
    }
    return $msg;


}



//支付密码修改
public function up_Pay_pwd(){
    $user_id=session('user_id');
    $s_code = Session::get('code');
    $new_pay_pwd = $_POST['new_pay'];
    $code = $_POST['code'];


    if(!empty($code) && $code == $s_code){
        $res = DB::table('user_infos')->where('user_id','=',$user_id)->update(['pay_pass'=>md5($new_pay_pwd)]);
        //解除用户锁定
        DB::table('user_infos')->where('user_id',$user_id)->update(['is_lock'=>0]);
        Session::forget('code');
        $msg = 1;

    }else{
        $msg = 2;
    }
    return $msg;

}

    //用户中心投资记录
    public function user_bids(){

        //投资记录查询
        $user_id = session('user_id');

        //总投资额
        $user_total_bids = DB::select('select sum(bid_money) as user_total_bids from lar_bids where user_id = '.$user_id);

        $user_total_bids = @$user_total_bids[0]->user_total_bids ? $user_total_bids[0]->user_total_bids : 0 ;

        //累计收益
        $user_grow = DB::table('user_grows')->where('user_id',$user_id)->first();
        foreach ($user_grow as $key => $value) {
            $total_grow[$key] = $value;
        }
        $total_grow['user_total_bids'] = $user_total_bids;

        //信用额度
        $user_credits = DB::table('credits')->where('user_id','=',$user_id)->first();

        return view('home.user_bids',['credits'=> $user_credits,'tatal_grow'=>$total_grow]);

    }


    //用户信用评估
    public function asses(){
        $user_id = $_POST['user_id'];
        $arr = DB::table("credits")->where('user_id','=',$user_id)->select('user_arrears','arrears_num')->first();
        if($arr->user_arrears==0&&$arr->arrears_num==0){
            $credit_number = DB::table("credits")->where('user_id','=',$user_id)->select('credit_number')->first();
            if($credit_number->credit_number>950){

            }else{
                DB::table('credits')->where('user_id','=',$user_id)->update(['credit_number'=>$credit_number->credit_number+10,'assess_time'=>date("Y-m-d h:i:s",time()+3600*8)]);
            }

        }
    }

    //用户质押物添加
    public function user_pawn(Request $request){
        if($request->isMethod('post')){

            $type = $request->type;
            $user_info = DB::table('user_infos')->select('card_name','card_number')->where('user_id',session('user_id'))->first();
            return view('home.user_pawn_add',['card_name'=>$user_info->card_name,'card_number'=>$user_info->card_number,'type'=>$type]);

        }else{
            $user_info = DB::table('users')->select('over_info')->where('user_id',session('user_id'))->first()->over_info;
            return view('home.user_pawn',['user_info'=>$user_info]);
        }

    }
    public function user_pawn_add(Request $request){
            if($request->isMethod('post')){
	        $file = $request->file('goods_img');
            // 文件是否上传成功
            if ($file->isValid()) {
                // 获取文件相关信息
                $originalName = $file->getClientOriginalName(); // 文件原名
                $ext = $file->getClientOriginalExtension();     // 扩展名
                $type = ['jpeg','jpg','png'];
 
                $realPath = $file->getRealPath();   //临时文件的绝对路径
                $type = $file->getClientMimeType();     // image/jpeg
                $filepath = 'uploads/bids/'.date('Y/m/d/',time());

                $test= new Functions();

                $test->mdir($filepath);

                // 上传文件
                $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                // 使用我们新建的uploads本地存储空间（目录）
                $bool = $file->move($filepath,$filename);
                
                $arr = [
                    'goods_name' => $request->goods_name,
                    'pre_money' => $request->pre_money,
                    'user_id' => session('user_id'),
                    'type'=>$request-> type,
                    'add_time'=>time(),
                    'goods_img'=>$filepath.$filename
                ];
                if($goods_id = DB::table('goods')->insertGetId($arr)){
                    Cookie::queue('goods_id',$goods_id);
                    return Redirect::to('user_pawnsuc');
                }
        }

     }
     else{
        return Redirect::to('user_pawn');
     }

    }

    public function user_pawnsuc(Request $request){


  
        if(empty(Cookie::get('goods_id'))){
            return Redirect::to('user_pawn');
        }
        if($request->isMethod('post')){
            $projects = $request->all();

            $term = $projects['term'];
            // echo date("Y-m-d",strtotime("+$term month",time()));die;
            
            $wait_huai_captital = $projects['total_money'];

            $wait_huai_interest =  $projects['Interest_payable'];
            unset($projects['_token']);
            $projects['u_id'] = session('user_id');
            $time = time();
            $projects['project_sn'] =  chr(rand(65,90)).chr(rand(65,90)).$time;
            $projects['create_time'] = $time;
            $projects['updated_at'] = $time;
            $user_id = session('user_id');
            try{
                //开启事务
                DB::beginTransaction();
                //添加借款表
                $projects_id = DB::table('projects')->insertGetId($projects);




                //修改当前用户总资产表待还本金，待还利息
                $assets_upd = DB::update('update lar_user_assets set user_loan = user_loan+'.$wait_huai_captital.' where user_id = '.$user_id);

                //用户盈利表（代收利息）
                $user_grows_upd = DB::update('update lar_user_grows set wait_huai_captital = wait_huai_captital+'.$wait_huai_captital.',wait_huai_interest = wait_huai_interest + '.($wait_huai_interest-$wait_huai_captital).' where user_id = '.$user_id);

                if($projects_id&&$assets_upd&&$user_grows_upd){
                    DB::commit();
                    $success = 'SUCCESS';
                }else{
                    $success = 'ERROR';
                }
            }catch(Exception $e){
                DB::rollBack();
                $e->getMessage();    
            }
            if($success == 'SUCCESS'){
                return 1;
            }else{
                return 0;
            }

        }else{
            $goods_id = Cookie::get('goods_id');
            $pawn = DB::table('goods')->select('goods_id','is_check','vale_money','goods_name')->where(['user_id'=>session('user_id'),'goods_id'=>$goods_id])->first();
            $is_check = $pawn->is_check;
            $vale_money = $pawn->vale_money;
            $goods_name = $pawn->goods_name;
            $goods_id = $pawn->goods_id;
            return view('home.user_pawnsuc',['goods_id'=>$goods_id,'is_check'=>$is_check,'vale_money'=>$vale_money,'goods_name'=>$goods_name]);   
        }
    
    }
    
    public function unsetcok(){
        //销毁cookie
        Cookie::queue(Cookie::forget('goods_id'));

        return Redirect::to('home_loan_list');

    }


    /**
    *   用户大转盘活动
    */
    public function turn(Request $request){
        if($request->isMethod('post')){
             $user_id = session('user_id');
            //查询用户今日是否已经抽过奖
            $u_t = DB::table('feng_u_t')->select('user_id')->where(['add_time'=>strtotime(date('Y-m-d')),'user_id'=>$user_id])->first();
            if($u_t){
                     $arr = [
                        'msg'=>2,
                    ];
                    return json_encode($arr); //用户今天已经抽过奖
            }
            //接受用户中奖信息
            $trun_name = $request->trun_name;
            switch ($trun_name) {
                case '200积分':
                    DB::table('invite')->insert(['invite_id'=>$user_id]);
                    break;
                 case '400积分':
                    DB::table('invite')->insert([['invite_id'=>$user_id],['invite_id'=>$user_id]]);
                    break;  
                 case '800积分':
                    DB::table('invite')->insert([['invite_id'=>$user_id],['invite_id'=>$user_id],['invite_id'=>$user_id],['invite_id'=>$user_id]]);
                    break; 
                 case '1000积分':
                    DB::table('invite')->insert([['invite_id'=>$user_id],['invite_id'=>$user_id],['invite_id'=>$user_id],['invite_id'=>$user_id],['invite_id'=>$user_id]]);
                    break;
                 case '红包50元':
                    $code = DB::table('user_redpackets')->select('code')->where(['state'=>0,'r_id'=>1])->first()->code;
                    break;  
                 case '红包100元':
                    $code = DB::table('user_redpackets')->select('code')->where(['state'=>0,'r_id'=>2])->first()->code;
                    break;
                  case '谢谢参与':
                    $trun_name = null;
                    break;                                                    
                default:
                    break;
            }
            $info = DB::table('feng_u_t')->insert([
                'user_id'=>$user_id,
                'trun_name'=>$trun_name,
                'add_time'=>strtotime(date('Y-m-d'))
            ]);
            if($info){
                if(isset($code)){
                    $arr = [
                        'msg'=>1,
                        'code'=>$code,
                    ];
                    return json_encode($arr);
                }else{
                     $arr = [
                        'msg'=>3,
                    ];
                    return json_encode($arr);        
                }
            }else{
                     $arr = [
                        'msg'=>0,
                    ];
                    return json_encode($arr); 
            }

        }else{
            $trun = DB::table('feng_trun')->get();
            foreach($trun as $k=>$v){
                $new_arr[$k] =  $v->trun_name;
            }
            $new_str = '"'.implode('","',$new_arr).'"';
            $u_t = DB::table('feng_u_t')
                        ->select('users.user_name','feng_u_t.*')
                        ->join('users','feng_u_t.user_id','=','users.user_id')
                        ->whereNotNull('feng_u_t.trun_name')
                        ->orderBy('feng_u_t.add_time','desc')
                        ->take(5)
                        ->get();
 
            return view('home.turn',['new_str'=>$new_str,'u_t'=>$u_t]);
        }

    }




   //用户还款计划
    public function repayment(Request $request){


        //用户还款
        $user_id = session('user_id');
        if($request->isMethod('post')){
            //支付密码验证
            $user_pay_pass = md5($request->pay_pass);
            $real_pay_pass = DB::table('user_infos')->select('pay_pass')->where('user_id',$user_id)->first();

//查看用户账号是否被锁定
            $is_lock = DB::table('user_infos')->select('is_lock')->where('user_id',$user_id)->first()->is_lock;
            if($is_lock == 1){
                $arr = [
                    'error'=>4,//账户已被锁定
                ];
                return json_encode($arr);
            }

            if($user_pay_pass == $real_pay_pass->pay_pass) {

                //用户所还款属于第几期
                $issue = $request->issue;
                //用户所还款属于那一款项
                $product_id = $request->product_id;
                //应还总额
                $stages_money = $request->stages_money;

                //查询用户资产
                $user_assets = DB::table('user_assets')->select('user_assets')->where('user_id',$user_id)->first()->user_assets;
                if($user_assets<$stages_money){
                    $arr = [
                        'error'=>2,
                    ];

                    return json_encode($arr);//用户资产不足
                }
                $stages_id = $request->stages_id;
                //开启事务
                DB::beginTransaction();
                //减少用户资产
                $user_assets = DB::update('update lar_user_assets set user_assets = user_assets - '.$stages_money.' where user_id = '.$user_id);
                //每期应还利息
                $stages_Interest = $request->stages_Interest;
                //每期待换本金
                $stsges_principal = $request->stsges_principal;
                $lar_stages = DB::update('update lar_stages set status = 1 where stages_id = '.$stages_id);
                //修改用户待还金额 待还利息
                $lar_stages = DB::update('update lar_user_grows set wait_huai_captital = wait_huai_captital - '.$stsges_principal.', wait_huai_interest = wait_huai_interest - '.$stages_Interest.' where user_id = '.$user_id);

                $today = strtotime(date('Y-m-d'));
                $in_come = sprintf("%.2f", $stages_Interest*(5/100));

                //用户还款入平台
                $rep_arr = array(
                    'user_id'=>$user_id,
                    'product_id'=>$product_id,
                    'issue'=>$issue,
                    'money'=>$stages_money
                );
                $re = DB::table('repayments')->insert($rep_arr);

                if($info = DB::table('income')->select('id')->where('date',$today)->first()){
                    $id = $info->id;
                    $website = DB::update('update lar_total_revenue set total_website_revenue = total_website_revenue + '.$in_come);
                    //修改网站每日收益
                    $web_day = DB::update('update lar_income set income = income + '.$in_come.' , liquid_assets = liquid_assets + '.($stages_money-$in_come).' where id = '.$id);

                }else{
                    //添加网站每日收益
                    $web_day = DB::table('income')->insert(['date'=>$today,'income'=>$in_come,'pv'=>1,'uv'=>1,'liquid_assets'=>$stages_money-$in_come]);
                    //修改网站总收益
                    $website = DB::update('update lar_total_revenue set total_website_revenue = total_website_revenue + '.$in_come);
                }


                if($user_assets&&$lar_stages&&$website&&$web_day){

                    DB::commit();
                    $count = DB::table('stages')->where(['u_id'=>$user_id,'status'=>0])->count();
                    $arr = [
                        'error'=>1,
                        'count'=>$count
                    ];

                    return json_encode($arr);
                }else{
                    DB::rollBack();
                    $arr = [
                        'error'=>5,
                    ];

                    return json_encode($arr);
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


        }else{

            //查询出用户的还款
            $fen = DB::table('stages')
                ->join('users','stages.u_id','=','users.user_id')
                ->join('projects','stages.project_id','=','projects.product_id')
                ->where(['stages.u_id'=>$user_id,'status'=>0])
                ->select('stages_id','user_name','stages_time','stages_money','stsges_principal','stages_Interest','stages_date','stages_action','title','goods_type','product_id')
                ->get();
            Redis::set($user_id,3);

            return view('home.repayment',['repayment'=>$fen]);

        }
    }


   //平台将 还款  发放给出借人
    public function lend(){
        $user_id = session('user_id');
        $sum = DB::table('repayments')->sum('money');
        //获取还款后信息
        $product_id = DB::table('repayments')->where('status','=',1)->get();
        if(!empty($product_id)){



        //           print_r($sum);die;
                $user_id_arr = array();
                //获取每个款项的  id
                foreach($product_id as $key=>$val){
                    $product_id_arr[$key] = $val->product_id;
                }
                $str_product_id = implode(',',$product_id_arr);

                //获取款项的利率和款项id
                $product_rate = DB::select("select product_id,rate,term from lar_projects where product_id in($str_product_id)");
        //        print_r($product_rate);die;
                foreach($product_rate as $key=>$val){
                    $new_product_id_arr[$key] = $val->product_id;

                }
                $str_product_id_2 = implode(',',$new_product_id_arr);
                //款项id所对应的利率
                foreach($product_rate as $key=>$val){
                    $product_id_rate[$val->product_id] = $val->rate;

                }

        //        print_r($product_rate);die;


                foreach ($product_rate as $k=>$v){
                   $term[$v->product_id] = $v->term;
                }

        //
        //        print_r($term);die;
                //查出 出借人的  id  所借款项     利率   借了多少钱
                $len_user_id =  DB::select("select * from lar_bids where product_id in($str_product_id_2)");
                $len_user_id_arr = array();
                foreach ($len_user_id as $key=>$val){
                    foreach ($product_id_rate as $k=>$v){
                        foreach($term as $kk=>$vv){
                            if($kk==$val->product_id){
            //                    foreach ($){}
                                $len_user_id_arr[$key]['term'] = $vv;
                                $len_user_id_arr[$key]['rate'] = $v;
                                $len_user_id_arr[$key]['user_id'] = $val->user_id;
                                $len_user_id_arr[$key]['bid_money'] = $val->bid_money;
                                $len_user_id_arr[$key]['product_id'] = $val->product_id;
                            }
                        }
                    }

                }
        $grows = array();
                $coun = count($len_user_id_arr);
                for($i=0;$i<$coun;$i++){
                    $grows[$i]['u_id'] = $len_user_id_arr[$i]['user_id'];
                    $grows[$i]['money'] = $in_come = sprintf("%.2f",(($len_user_id_arr[$i]['bid_money']*(9/100/12))/2)+$len_user_id_arr[$i]['bid_money']/$len_user_id_arr[$i]['term']);
                    //待收本金
                    $grows[$i]['wait_shou_captital'] = sprintf("%.2f",$len_user_id_arr[$i]['bid_money']/$len_user_id_arr[$i]['term']);
                    //待收利息
                    $grows[$i]['wait_shou_interest'] = sprintf("%.2f",(($len_user_id_arr[$i]['bid_money']*(9/100/12))/2));


                }

        //        print_r($grows);die;
                //向收款的用户加上
                foreach ($grows as $kkkk=>$vvvv){
                   $grows_upda = DB::update('update lar_user_grows set wait_shou_captital=wait_shou_captital-'.$vvvv['wait_shou_captital'].',wait_shou_interest=wait_shou_interest-'.$vvvv['wait_shou_interest'].',total_grow=total_grow+'.$vvvv['wait_shou_interest'].' where user_id='.$vvvv['u_id']);
                   //修改账户总额
                    DB::update('update lar_user_assets set user_assets=user_assets+'.'('.$vvvv['wait_shou_captital'].'+'.$vvvv['wait_shou_interest'].')'.' where user_id='.$vvvv['u_id']);
                   if($grows_upda){
                       //修改网站流动资金
                       $re = DB::update('update lar_total_revenue set floating_capital=floating_capital-'.$sum);
                       if($re){
                           DB::update("update lar_repayments set status=0 where product_id in($str_product_id)");
                           echo 'ok';
                       }else{
                           echo 'no';
                       }
                   }


                }

        }




    }


     
    //资金记录
    public function fund(){
        $user_id = session('user_id');
             if(!empty($user_id)){
                 $jie=DB::table('projects')->where('u_id','=',$user_id)->get(['project_sn','total_money','term','create_time','product_status']);
                 $tou=DB::table('bids')->where('user_id','=',$user_id)->get(['bid_money','each_grows','create_time']);
                 $chong=DB::table('recharge')->where('user_id','=',$user_id)->get(['recharge_sum','recharge_time','recharge_id']);
                 $ti=DB::table('cash')->where('user_id','=',$user_id)->get(['user_card','cash','time','cash_formalities']);
                 return view('home.fund',['jie'=>$jie,'ti'=>$ti,'chong'=>$chong,'tou'=>$tou]);
             }else{
                 return view('home.login');
             }

    }
  
}
