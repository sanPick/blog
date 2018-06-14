<?php

namespace App\Admin;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Database\Eloquent\Model;
use DB;



class Login extends Model
{
    public function login($admin_name = "",$admin_pwd = ""){
//        print_r($admin_pwd);die;
//        echo md5($admin_pwd);die;
        $res = DB::table('admins')->where(['admin_name'=>$admin_name,'admin_pwd'=>md5($admin_pwd)])->first();
//print_r($res);die;
        if($res){
            $session = new Session;
            $session->set("admin_name",$res->admin_name);
            $session->set("admin_id",$res->admin_id);
            $ip = $_SERVER["REMOTE_ADDR"];
            $ip_area = self::ip_area();
            DB::table('admins')->where('admin_id',$res->admin_id)->update(['last_ip'=>$ip,'last_time'=>strtotime(date("Y-m-d h:i:s",time())),'last_area'=>$ip_area['city']]);


            return 'login_success';
        }else{
            return 'login_fail';
        }
    }


    //获取IP取得归属地
    public function ip_area(){
        $ip = $_SERVER["REMOTE_ADDR"];

        return  $ipInfos = self::GetIpLookup($ip);
    }

    function GetIp(){
        $realip = '';
        $unknown = 'unknown';
        if (isset($_SERVER)){
            if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown)){
                $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                foreach($arr as $ip){
                    $ip = trim($ip);
                    if ($ip != 'unknown'){
                        $realip = $ip;
                        break;
                    }
                }
            }else if(isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP']) && strcasecmp($_SERVER['HTTP_CLIENT_IP'], $unknown)){
                $realip = $_SERVER['HTTP_CLIENT_IP'];
            }else if(isset($_SERVER['REMOTE_ADDR']) && !empty($_SERVER['REMOTE_ADDR']) && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown)){
                $realip = $_SERVER['REMOTE_ADDR'];
            }else{
                $realip = $unknown;
            }
        }else{
            if(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), $unknown)){
                $realip = getenv("HTTP_X_FORWARDED_FOR");
            }else if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), $unknown)){
                $realip = getenv("HTTP_CLIENT_IP");
            }else if(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), $unknown)){
                $realip = getenv("REMOTE_ADDR");
            }else{
                $realip = $unknown;
            }
        }
        $realip = preg_match("/[\d\.]{7,15}/", $realip, $matches) ? $matches[0] : $unknown;
        return $realip;
    }

    function GetIpLookup($ip = ''){
        if(empty($ip)){
            $ip = self::GetIp();
        }
        $res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=' . $ip);
        if(empty($res)){ return false; }
        $jsonMatches = array();
        preg_match('#\{.+?\}#', $res, $jsonMatches);
        if(!isset($jsonMatches[0])){ return false; }
        $json = json_decode($jsonMatches[0], true);
        if(isset($json['ret']) && $json['ret'] == 1){
            $json['ip'] = $ip;
            unset($json['ret']);
        }else{
            return false;
        }
        return $json;
    }


    public function login_info(){
        return DB::table('admins')->get();
    }

}
