<?php

namespace App\Http\Controllers\Admin;

use Symfony\Component\HttpFoundation\Session\Session;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use DB;
class LoginController extends Controller
{
    //管理员登陆
    public function login(Request $request)
    {
        if($request->isMethod('post')){

            $admin_name = Input::get('admin_name');
            $admin_pwd = Input::get('admin_pwd');
         if(isset($admin_name)&&isset($admin_pwd)&&!empty($admin_name)&&!empty($admin_pwd)){
             $model = new \App\Admin\Login();
             $login_status = $model->Login($admin_name,$admin_pwd);
             

             if($login_status == 'login_success'){
                 //管理员权限判断
                 $session = new Session;
                 //查询出管理员ID
                 $data = DB::table('admins')->select('admin_id')->where('admin_name',$admin_name)->first();
                 $admin_id = $data->admin_id;
                 //查询出权限
                $rote = DB::table('a_r')->select('rote_id')
                ->where('admin_id',$admin_id)
                ->first();

                $rote_id = $rote->rote_id;
                //根据角色查询权限
                $node = DB::table('r_n')->select('node_id')
                ->where('rote_id',$rote_id)
                ->get();  
                foreach($node as $k=>$v){
                $node_id[] = $v->node_id;
                }

                $node_name = DB::table('node')->select('node_path')
                ->whereIn('node_id',$node_id)
                ->get();
                foreach($node_name as $k=>$v){
                $node_path[] = $v->node_path;
                }
                $session->set("node_path",$node_path);
                 $ss=$session->get("admin_name");

                 return redirect::to('site');
             }else{
                 echo '<script>alert("登陆失败");location.href="/a_login";</script>';
             }
        }
        }else{


            return view('admin.login');
        }

    }
    public function adm_logout(Request $request){

        $session = new Session;

        $session->remove("admin_id");
        return redirect::to('a_login');

    }
    //管理员添加
    public function admin_add()
    {

        return view('admin.admin_add');
    }

    public function site()
    {
        $session = new Session;
        if(empty($session->get('admin_id'))){
            echo '<script>alert("请先登录");history.go(-1)</script>';
            exit;
        }
        $model = new \App\Admin\Login();
        $login_info =$model -> login_info();
      //权限信息
        $session = new Session;
        $admin_id = $session->get("admin_id");
        $rote = DB::table('a_r')->select('rote_id')
        ->where('admin_id',$admin_id)
        ->first();
        $rote_id = $rote->rote_id;
        //根据角色查询权限
        $node = DB::table('r_n')->select('node_id')
        ->where('rote_id',$rote_id)
        ->get();  
        foreach($node as $k=>$v){
        $node_id[] = $v->node_id;
        }

        $node_name = DB::table('node')->select('node_path')
        ->whereIn('node_id',$node_id)
        ->get();
        foreach($node_name as $k=>$v){
        $node_path[] = $v->node_path;
        }
        $session->set("login_info",$login_info);

        return view('admin.site',['node_path'=>$node_path,'rote_id'=>$rote_id]);
    }


    //管理员列表
    public function admin_list()
    {
        return view('admin.admin_list');
    }




}