<?php
namespace App\Http\Controllers\Home;


use Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Cookie;
class RedpacketsController extends Controller
{





    //验证码红包添加
    public function code_add()
    {
        $redeem_code=md5(rand(1000,9999).time().uniqid());
        $data=array(
            'code'=>$redeem_code,//验证码
            'r_id'=>'2',//红包表id
        );
        $res=DB::table('user_redpackets')->insert($data);
         if($res)
         {
             echo "红包验证码添加成功";
         }
    }

    //我的红包
    public function my_red_packets()
    {


        $user_id=session('user_id');

        $list = DB::select("select * from lar_user_redpackets as u INNER JOIN lar_redpackets as r on u.r_id=r.r_id where user_id='$user_id'");
        if(Cookie::get('red_code') != null){
                $red_code = Cookie::get('red_code');
        }else{
             $red_code = '';
        }
        
        return view('home.my_red_packets',['list'=>$list,'red_code'=>$red_code]);

    }

    public function exchange_red_packets(){

        $user_id=session('user_id');//用户id
        $code=$_GET['code'];   //验证码
        $res = DB::select("select value,state,code from lar_user_redpackets as u INNER JOIN lar_redpackets as r on u.r_id=r.r_id where code='$code'");


          if($res)
          {
            $arr = (array)$res[0];
            if($arr['state']==1)
            {
                $arr=['code'=>0,'info'=>'您已经兑换过了'];
                echo json_encode($arr);die;
            }
            $start_time=time();//兑换时间
            $end_time=strtotime(" +7 day ");//过期时间
            $up= DB::select("update lar_user_redpackets set user_id='$user_id',start_time='$start_time',end_time='$end_time',state=1 where code='$code'");

              $data=array(
                  'user_id'=>$user_id,
                  'activity_num'=>$arr['value'],
              );
              $res=DB::table('activity')->insert($data);
              if($res){

                  setcookie('red_code','',-1);
                  $arr=['code'=>1,'info'=>'兑换成功，请及时使用'];
                  echo json_encode($arr);die;
              }else{
                  $arr=['code'=>0,'info'=>'兑换失败'];
                  echo json_encode($arr);die;
              }
        }
        else{
            $arr=['code'=>0,'info'=>'验证码错误'];
            echo json_encode($arr);die;
        }
    }
    //兑换列表
    public function red_packets_exchange()
    {
         
        $user_id=session('user_id');
        $list = DB::select("select name,start_time,end_time,use_state from lar_user_redpackets as u INNER JOIN lar_redpackets as r on u.r_id=r.r_id where user_id='$user_id'");
//        dd($list);
        return view('home.red_packets_exchange',['list'=>$list]);
    }
}