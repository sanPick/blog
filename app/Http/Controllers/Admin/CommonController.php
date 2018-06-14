<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Redirect;
class CommonController extends Controller
{
    public function __construct(Request $request){
    	$session = new Session;
        if(empty($session->get('admin_id'))){
            echo '<script>alert("请先登录");history.go(-1)</script>';
            exit;
        }
    	if(!empty($session->get('admin_id'))){
            $admin_id = $session->get('admin_id');
            $rote_id = DB::table('a_r')->select('rote_id')
            ->where('admin_id',$admin_id)
            ->first()
            ->rote_id;
            if($node_path = $session->get('node_path')){
                $node_path[] = 'a_login';
                $node_path[] = 'site';
                $node_path[] = 'index';
                $node_path[] = 'a';
                $node_path[] = 'adm_logout';
                $node_path[] = 'info';
                $path = $uri = $request->segment(1);
                if(!in_array($path,$node_path)&&$rote_id!=5){
                    echo '<script>alert("你没有权限操作");history.go(-1)</script>';
                    exit;
                }else{
                    $admin_id = $session->get('admin_id');
                    $login_time = $session->get('login_time');

                    $arr = DB::table('node')->where('node_path','=',$uri)->select('node_title')->first();

                    $data = array('adm_id' => $admin_id,
                        'login_time' => $login_time,
                        'handle'=> $uri,
                        'action' => isset($arr->node_title)?$arr->node_title:$uri,
                        'had_time' => time()
                    );
                    DB::table('admin_log')->insert($data);
                }
            }
        }
    }
}
