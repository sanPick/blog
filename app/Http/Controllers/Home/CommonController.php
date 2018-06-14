<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use DB;
class CommonController extends Controller
{
    //前台统计
    public function __construct(){

    	//统计网站的UV量
		$user_IP =  $_SERVER["REMOTE_ADDR"];
		//今天零点时间
		$today =  strtotime(date('Y-m-d'));
		setCookie('user_ip',$user_IP,$today+60*60*24);

		if(empty($_COOKIE['user_ip'])){

			if(DB::table('income')->where('date',$today)->first()){
				DB::table('income')->where('date',$today)->increment('uv');
			}else{
				DB::table('income')->insert(['date'=>$today,'uv'=>1]);
			}
			
		}
		//统计网站的PV量
		if(DB::table('income')->where('date',$today)->first()){
			DB::table('income')->where('date',$today)->increment('pv');
		}else{
			DB::table('income')->insert(['date'=>$today,'pv'=>1]);
		}		

    }

}
