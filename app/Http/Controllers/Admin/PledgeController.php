<?php
/**
 * 用户审核信息
 * @date:2017-06-13 22:55:40
 */


namespace App\Http\Controllers\Admin;


use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Mail;


global $vale_money;
global $goods_name;
global $email;
class PledgeController extends CommonController
{

    public function pledge_add()
    {
      
    }
    //质押物列表sel
    public function pledge_list()
    {

        $list=DB::table("goods")
                ->join('users','users.user_id','=','goods.user_id')
                ->select('goods.*','users.user_name')
                ->orderBy('goods.add_time','desc')
                ->paginate(5);

        return view('admin.pledge_list',['list'=>$list]);
    }
    //验证通过
    public function is_check(Request $request)
    {
              $user_id=$request->user_id;
              $goods_id=$request->goods_id;

              $this->vale_money = $request->vale_money;


              $res=DB::table('goods')->where('goods_id',$goods_id)->update(['is_check' => 1,'vale_money'=>$this->vale_money]);
              if($res){

                //发送邮件
                $user_data = DB::table('users')->select('email','user_name')->where('user_id',$user_id)->first();
		$this->email = $user_data->email;
                $user_name = $user_data->user_name;
                $this->goods_name = DB::table('goods')->select('goods_name')->where('user_id',$user_id)->first()->goods_name;

                $res =  Mail::raw('亲爱的'.$user_name.'用户:',function ($msg){       

                    $msg->from('asandaye@163.com','asan');       

                    $msg->subject('您提交的审核物品'.$this->goods_name.'已审核通过，审核金额为：'.$this->vale_money.'元，请从http://'.$_SERVER['HTTP_HOST'].'/user_pawnsuc，发布您的招标信息。');      

                    $msg->to($this->email);    

                });
                  $arr=array(
                      'code'=>'1',
                      'message'=>'审核通过',
                      'vale_money'=>$this->vale_money
                  );
                  echo json_encode($arr);
              }
    }



}
