<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Input;
use Redirect;


class AdminController extends CommonController
{
    public function up_pw(Request $request){

        if($request->isMethod('post')){
         //接收  修改的参数
            $old_pwd = Input::get('old_pwd');
            $new_pwd = Input::get('newpass');
            $ok_pwd = Input::get('renewpass');
            $admin_name = Input::get('admin_name');
        
           $model = new \App\Admin\Admin();
           $ar = $model->updat($old_pwd,$new_pwd,$ok_pwd,$admin_name);
//           print_r($ar);
           if($ar['status']==1){
               $ar['msg'];
               echo '<script>alert("修改成功");location.href="/site";</script>';
           }
           //修改失败
            if($ar['status']==0){
                $ar['msg'];
                echo '<script>alert("修改失败");location.href="/uppw";</script>';
            }
            //两次密码不一致
            if($ar['status']==2){
                $ar['msg'];
                echo '<script>alert("两次密码不一致");location.href="/uppw";</script>';
            }
            //旧密码不正确
            if($ar['status']==3){
                echo '<script>alert("旧密码不正确");location.href="/uppw";</script>';
                $ar['msg'];
            }

        }else{
            $session = new Session;

            $admin_id = $session->get("admin_id");
            $model = new \App\Admin\Admin();

            //查询管理员的信息
//            print_r($admin_id);die;
            $ar = $model::where('admin_id','=',$admin_id)->first();


            return view('admin.admpwup',['data' =>$ar]);
        }

    }

    public function cache_clean(){
        // 执行系统命令
        @system('cd /usr/share/nginx/html/laravel5/');
        @system('php artisan config:clear');
        @system('php artisan cache:clear');

        return  redirect()->action('Admin\LoginController@site');
    }
}



 // 引入鉴权类    
 //  use Qiniu\Auth;   
 //   // 引入上传类 
 //       use Qiniu\Storage\UploadManager;     
 //       // 需要填写你的 Access Key 和 Secret Key    
 //        $accessKey = 'Access_Key';    
 //         $secretKey = 'Secret_Key';     
 //         // 构建鉴权对象     
 //         $auth = new Auth($accessKey, $secretKey);     
 //         // 要上传的空间     
 //         $bucket = 'Bucket_Name';     
 //         // 生成上传 Token     
 //         $token = $auth->uploadToken($bucket);     
 //         // 要上传文件的本地路径     $filePath = './php-logo.png';     
 //         // 上传到七牛后保存的文件名     
 //         $key = 'my-php-logo.png';    
 //          // 初始化 UploadManager 对象并进行文件的上传    
 //           $uploadMgr = new UploadManager();     
 //           // 调用 UploadManager 的 putFile 方法进行文件的上传   
 //             list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);     
 //             echo "\n====> putFile result: \n";     
 //             if ($err !== null) {        
 //                  var_dump($err);     
 //                  } else { 
 //                         var_dump($ret);    
 //                   }
 //         
