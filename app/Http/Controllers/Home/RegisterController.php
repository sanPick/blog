<?php
/**
 * @author Mr.ZhiFeng
 * @QQ 947280924漏Y
 * @Email 18401448261@163.com
 * @copyright Copyright(c) 2017 
 * @sign 'Do not forget the beginning of the heart, the party must always!'
 * @file register.php
 * @brief 用户注册
 * @date 2017-06-12 19:32:00
 */
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use DB;
use Storage;
use Session;
use Illuminate\Support\Facades\Cookie;

class RegisterController extends CommonController{

	public function index(){
		
		 return view('home.register');

	}
	public function regsuc(Request $request){
		if(empty($request->session()->get('user_id'))){
			return view('home.register');
		}
		 return view('home.regsuc');

	}
	/**
	 * [test_unique description]
	 * 用户名，邮箱，手机号唯一列表验证
	 * @param  Request $req [description]
	 * @return [type]       [description]
	 */
	public function test_unique(Request $req){
		//陆脫脢脺脰碌
		$user_name = isset($req->user_name)?$req->user_name:null;
		$email = isset($req->email)?$req->email:null;
		$phone = isset($req->phone)?$req->phone:null;
		$invite_name =  isset($req->invite_name)?$req->invite_name:null;
		$sms_code =  isset($req->sms_code)?$req->sms_code:null;
		//脜脨露脧脢脟路帽脦篓脪禄

		$user_data = DB::table('users')
		  ->where('user_name',$user_name)
		  ->get();
		$email_data = DB::table('users')->where('email',$email) ->get();
		$tel_data = DB::table('users')->where('tel',$phone) ->get();
		if($invite_name!=null){
			$invite_name = DB::table('users')->where('user_name',$invite_name) ->first();
		}else{
			$invite_name = 1;
		}
		
		if($user_data){
			echo 0;die;//用户名已存在
		}else if($email_data){
			echo 2;die;//邮箱存在
		}else if($tel_data){
			echo 3;die;//手机号存在
		}else if(!$invite_name){
			echo 4;die;
		}else if($sms_code!=$_COOKIE['sms_code']||$sms_code==null){
			echo 5;die;
		}else{
			echo 1;die;//success
		}

	}
	/**
	 * 脫脙禄搂脳垄虏谩
	 * [add description]
	 * @param Request $req [description]
	 */
	public function add(Request $req){

		//添加用户
		$create_time = time();
		$ip = $req->getClientIp();
		$invite_id = base64_decode($req->invite_user_id);

		$arr =  ['user_name'=>e($req->user_name),
		'password'=>md5($req->password),
		'tel'=>e($req->phone),
		'email'=>e($req->email),
		'create_time'=>$create_time,
		'last_ip'=>$ip,
		'last_time'=>$create_time
		];
		$info = DB::table('users')->insertGetId($arr);
		if(!empty($req->invite_user_id)){
			
			//邀请注册+积分
			$invite_id = base64_decode($req->invite_user_id);
			DB::table('invite')->insert(['invite_id'=>$invite_id,'be_invite_id'=>$info,'invite_time'=>time()]);
			if(DB::table('integral')->where('user_id',$invite_id)->first()){
				DB::update('update lar_integral set integral = integral+200 where user_id = '.$invite_id);
			}else{
				DB::table('integral')->insert(['user_id'=>$invite_id,'integral'=>200,'end_time'=>time()]);
			}
		}
		if(!empty($req->invite_name)){
			$user_name = $req->invite_name;
			//邀请注册+积分
			$invite_id = DB::table('users')->select('user_id')->where('user_name',$user_name)->first()->user_id;
			DB::table('invite')->insert(['invite_id'=>$invite_id,'be_invite_id'=>$info,'invite_time'=>time()]);
			if(DB::table('integral')->where('user_id',$invite_id)->first()){
				DB::update('update lar_integral set integral = integral+200 where user_id = '.$invite_id);
			}else{
				DB::table('integral')->insert([
					['user_id'=>$invite_id,'integral'=>200,'end_time'=>time()],
					['user_id'=>$info,'integral'=>200,'end_time'=>time()]
					]);
			}
		}
		if($info){
			$req->session()->put('user_id', $info);
			$req->session()->put('user_name', $req->user_name);
			return redirect::to('regsuc');
		}
	}

/**
 *	用户信息完善
 */


	public function evip(Request $request){

		if(empty($request->session()->get('user_id'))){
			return view('home.login');
		}
		$user_id = $request->session()->get('user_id');
		if($user_data = DB::table('users')->where('user_id',$user_id)->first()){
			if($user_data->over_info==1){
				return redirect::to('evipsuc');
			}
			
		}
		return view('home.evip');
		
	}
	public function evipsuc(Request $request){

		if(empty($request->session()->get('user_id'))){
			return view('home.login');
		}
		
		return view('home.evipsuc');
		
	}

	public function evipadd(Request $request){
		//添加
		if(!$request->session()->get('user_id')){
			return view('home.login');
		}		 
		 if ($request->isMethod('post')) {
	        $file = $request->file('card_img');
            // 文件是否上传成功
            if ($file->isValid()) {
                // 获取文件相关信息
                $originalName = $file->getClientOriginalName(); // 文件原名
                $ext = $file->getClientOriginalExtension();     // 扩展名
                $type = ['jpeg','jpg','png'];
                if(!in_array($ext, $type)){
                	return redirect::to('evip');
                }
                $realPath = $file->getRealPath();   //临时文件的绝对路径
                $type = $file->getClientMimeType();     // image/jpeg
                $filepath = 'uploads/card/'.date('Y/m/',time());
                $mdir = new \App\Tools\Functions();
				$mdir->mdir($filepath);
                // 上传文件
                $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                // 使用我们新建的uploads本地存储空间（目录）
                $bool = $file->move($filepath,$filename);
	
               	$arr = [
               		'user_id'=>$request->session()->get('user_id'),
               		'card_name'=>$request->card_name,
               		'card_number'=>$request->card_number,
               		'card_img'=>$filepath.$filename,
               		'create_time'=>time()
               	];
				
                if(DB::table('user_infos')->insert($arr)){
					$user_id = Session::get('user_id');
					//修改用户信息状态
					if(DB::table('users')->where('user_id',$user_id)->update(['over_info'=>1])){
						return redirect::to('evipsuc');
					}
                	
                }else{
                	echo 0;
                }
            }	 	
		}
	}

	public function test_card_unique(Request $request){

		$card_number = $request->card_number;

		if(DB::table('user_infos')->where('card_number',$card_number)->first()){
			echo 0;die;
		}else{
			echo 1;die;
		}


	}

	/**
	 *	手机短信接口
	 */

	public function sms(Request $request){
		
		//接受用户手机号
		 $tel = $request->tel;
	       //	$tel = '17600177310';
		$code = mt_rand(111111,999999);
		//把手机验证码存入到cookie中
		setcookie('sms_code',$code,time()+300);

		$c = new \TopClient;
            $c ->appkey = "24496818" ;
            $c ->secretKey = "e10a78f229b0b540d787d88cd53eae2f" ;
            $req = new \AlibabaAliqinFcSmsNumSendRequest;
            $req ->setExtend( "" );
            $req ->setSmsType( "normal" );
            $req ->setSmsFreeSignName( "赚得多" );
            $req ->setSmsParam( "{number:'$code'}" );
            $req ->setRecNum( "$tel" );
            $req ->setSmsTemplateCode( "SMS_72645024" );
            if( $c ->execute( $req ))
            {
                $error['msg']=2;
                exit(json_encode($error));
            }
	 	
	 	


	}

}
 	
