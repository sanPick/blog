<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Mail;

class UserController extends CommonController
{
    /**
     * 用户列表页面
     * @return [type] [description]
     */
    public function index()
    {
        $users = DB::table('users')->orderBy('over_info', 'desc')->paginate(6);

        return view('admin.user', ['users' => $users]);
    }

    /**
     * 用户单个身份详情页
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function getInfo($id){
        $user_info = DB::table('user_infos')
        ->join('users', 'user_infos.user_id', '=', 'users.user_id')
        ->where('users.user_id', $id)->first();
        
        return view('admin.user_info', ['user_info' => $user_info]);
    }
    //用户充值记录更新
    public function recharge_update(){
        $time=date("Y-m-d H:i:s",time()-60*60*24*7);
        $arr=DB::table('recharge')->where('recharge_time','<',$time)->delete();
        return  redirect()->action('Admin\UserController@recharge_list');
    }
    //用户充值记录管理
    public function recharge_list(Request $request){
        $arr=DB::table('recharge')->get();
        $perPage = 7;
        if ($request->has('page')) {
            $current_page = $request->input('page');
            $current_page = $current_page <= 0 ? 1 :$current_page;
        } else {
            $current_page = 1;
        }
        $item = array_slice($arr, ($current_page-1)*$perPage, $perPage);
        $total = count($arr);
        $paginator =new LengthAwarePaginator($item, $total, $perPage, $current_page, [
            'path' => Paginator::resolveCurrentPath('/news_list'),
            'pageName' => 'page',
        ]);
        $userlist = $paginator->toArray()['data'];
        return view('admin.recharge_list', compact('userlist', 'paginator'));
//        return view('admin.recharge_list',['arr'=>$arr]);
    }

    /**
     * 审核用户身份信息
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function userCheck($id){
        // return $id;
        $info = DB::table('users')
            ->where('user_id', $id)
            ->update(['over_info' => 1]);
        if ($info) {
            return 1;
        } else {
            return 0;
        }
    }
//用户七天未登录召回
   public function recall(){
      $email = Input::get('email');

      return  $ren = self::mail($email);
    
   }


    public function mail($email){   
       $this->email = $email;
          
        $res =  Mail::raw('欢迎回归二十二世纪投资:http://shine.mylaravel.com/login',function ($msg){       

                    $msg->from('asandaye@163.com','asan');       

                    $msg->subject('您已经七天没有登录了,快来瞅瞅新的产品');      

                    $msg->to($this->email);    

                });
                    
           
        return  $res;
        }
    
}
function p($data)
{
    echo '<pre>';
    print_r($data);
    die;
}
