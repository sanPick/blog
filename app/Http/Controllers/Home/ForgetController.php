<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Tools\Open51094;
use App\User;
use App\Http\Controllers\Controller;
use DB;
use Gregwar\Captcha\CaptchaBuilder;
use Session;
use Redirect;
use Mail;



class ForgetController extends CommonController
{


    public function getVerify()
    {
        $builder = new CaptchaBuilder;
        $builder->build($width = 200, $height = 50, $font = null);
        $phrase = $builder->getPhrase();
        Session::flash('milkcaptcha', $phrase);
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }

    public function forget_pass()
    {
        return view('home.forget_pass');
    }


    public function forget_pass_do(Request $request)
    {
        $email = $request->email;
        $verify= $request->verify;
        if (Session::get('milkcaptcha') == $verify) {
            //用户输入验证码正确
            $user = DB::table('users')->where('email', $email)->first();
            if(!empty($user)){
                //查询到用户注册的邮箱
                return 1;
            }else{
                return 0;
            }
        } else {
            //用户输入验证码错误
            return 2;
        }
    }

    public function forget_pass3(Request $request)
    {
        $email =$_GET['email'];
        return view('home.forget_pass3',['email'=>$email]);
    }

    public function send_email(Request $request)
    {
            $email =$_GET['email'];
            $this->email = $email;
            $code = rand(1111,9999);
            $res =  Mail::raw("尊敬的客户：你好!您的验证码为:'$code'此验证码供您找回密码使用，请勿向任何人泄露。如有疑问，请联系客服400-8858-258.",function ($msg)
            {
            $msg->from('asandaye@163.com','22世纪金融');
            $msg->subject('邮件找回密码');
            $msg->to($this->email);
        });
        if($res){
            Session::put('code',$code);
            return 1;
        }else{
            return 0;
        }
    }


    public function check_code()
    {
        $code = $_GET['code'];
        $s_code = Session::get('code');
        if(!empty($code)){
            if($code == $s_code){
                return 1;
            }else{
                return 0;
            }
        }else{
            return 0;
        }
    }

    public function forget_pass4()
    {
        $email =$_GET['email'];
        return view('home.forget_pass4',['email'=>$email]);
    }

    public function up_pwd(){
        $new_pwd=md5($_GET['new_pwd']);
        $email=$_GET['email'];
        $res= DB::table('users')
            ->where('email',$email)
            ->update(['password'=>$new_pwd]);
        if($res){
            return 1;
        }else{
            return 0;
        }

    }



    public function calculator()
    {

        return view('home.ji');

    }

}
