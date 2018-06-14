<?php
  /**
   * @author  Wei <616955067@qq.com>
   * @version 1.0
   * @var     用户登录
   * @dateTime        
   */

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



class UserController extends CommonController
{
    /**
     * 生成验证码
     * @return [type] [description]
     */
    public function getVerify()
    {
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 200, $height = 50, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容存入session
        Session::flash('milkcaptcha', $phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }
    /**
     * 验证验证码
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function checkVerify($verify)
    {
        if (Session::get('milkcaptcha') == $verify) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * 用户登录
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function loginPro(Request $request){
        $verify = $request->verify;
         if(!$this->checkVerify($verify)){
             $data['success'] = 0;
             $data['msg']     = '验证码错误';
             return json_encode($data);
         }

        $user_name = $request->user_name;
        $password = $request->password;
        $users = DB::table('users')
            ->where('user_name', $user_name)
            ->first();
        if ($users) {
            if ($users->password == md5($password)) {
            // 修改最后一次登录的时间
            DB::table('users')
            ->where('user_id', $users->user_id)
            ->update(['last_time' => time()]);

                $data['success'] = 1;
                session(['user_id' => $users->user_id]);
                session(['user_name' => $user_name]);
            } else {
                $data['success'] = 3;
                $data['msg'] = '账号密码不对';
            }
        } else {
            $data['success'] = 2;
            $data['msg'] = '账号信息不对';
        }
        return json_encode($data);
    }
    public function logout(Request $request){
        return $request->session()->flush();
    }
    public function callback(){
        $open = new Open51094();
        $code = $_GET['code'];
        // todo code失效过期
        $user_info = $open->me($code);
        if(count($user_info) == 1){
            return '请从新授权';
        }
        // 查询是否有此用户的信息
        $users = DB::table('users')->where('open_id', $user_info['uniq'])->first();
        if ($users) {
            DB::table('users')
                ->where('user_id', $users->user_id)
                ->update(['last_time' => time()]);
            session(['user_id' => $users->user_id]);
            session(['user_name' => $users->user_name]);

            return redirect()->action('Home\IndexController@index');
        } else {
            return view('home.perfect',['user_info'=>$user_info]);
        }
        
    }
    /**
     * 第三方登陆绑定
     * @return [type] [description]
     */
    public function perfectBind(Request $request){
        $user_name = $request->user_name;
        $password = $request->password;
        $open_id = $request->open_id;
        // 查询当前用户的信息
        $users = DB::table('users')->where('user_name', $user_name)->first();
        // 判断用户
        if ($users) {
            // 判断密码
            if ($users->password==md5($password)) {
                // 判断用户是否已经绑定
                if(empty($users->open_id)){
                    // 去绑定open_id
                    $info = DB::table('users')
                        ->where('user_id', $users->user_id)
                        ->update(['open_id' => $open_id]);
                    if($info){
                        $data['success'] = 1;
                        session(['user_id' => $users->user_id]);// 登陆成功封装起来 执行一个添加session的方法
                        session(['user_name' => $user_name]);
                    }
                    else{
                        # 添加失败
                        $data['success'] = 4;
                        $data['msg']     = '网络异常';
                    }
                }else{
                    # 已经关联过用户
                    $data['success'] = 5;
                    $data['msg']     = '已经关联过第三方账号';
                }

            } else {
                # 密码错误
                $data['success'] = 3;
                $data['msg'] = '账号密码不对';
            }
            
        } else {
            # 没有此账号
            $data['success'] = 2;
            $data['msg'] = '账号信息不对';
        }
        return json_encode($data);
    }
    /**
     * 第三方注册完善
     * @return [type] [description]
     */
    public function perfectReg(Request $request){
        $user_name = $request->user_name;
        $password = $request->password;
        $email = $request->email;
        $open_id = $request->open_id;
        // 验证用户唯一
        if($this->checkUser($user_name)){
            $data['success'] = 2;
            $data['msg']     = '用户名已经存在';
        }else{
            $info = DB::table('users')->insert(
                [
                    'user_name' => $user_name,
                    'password' => md5($password),
                    'open_id' => $open_id,
                    'create_time' => time(),
                    'email'=>$email
                ]);
            if ($info) {
                $data['success'] = 1;
            } else {
                $data['success'] = 0;
                $data['msg']     = '添加失败';
            }
        }

        return json_encode($data);
        
    }

    /**
     * 检验用户唯一性
     * @param $user_name
     */
    public function checkUser($user_name){
        //根据用户名查询是否有此用户
        $user = DB::table('users')->where('user_name', $user_name)->first();
        if(!empty($user)){
            return 1;
        }else{
            return 0;
        }
    }
    /**
     * 检验邮箱唯一性
     * @param $user_name
     */
    public function checkEmail($email){
        //根据用户名查询是否有此邮箱
        $user = DB::table('users')->where('email', $email)->first();
        if(!empty($user)){
            return 1;
        }else{
            return 0;
        }
    }

}
