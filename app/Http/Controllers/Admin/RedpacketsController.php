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
class RedpacketsController extends CommonController
{



    //用户红包列表
    public function red_packets_list()
    {

        $list = DB::select("select u.*,r.*,us.user_name from lar_user_redpackets as u INNER JOIN lar_redpackets as r on u.r_id=r.r_id INNER JOIN lar_users as us on u.user_id=us.user_id");
//         dd($list);
        return view('admin.red_packets_list',['list'=>$list]);

    }


    //红包添加
    public function red_packets_add(Request $request)
    {

            $list=DB::table("redpackets")->get();
//             dd($list);
            return view('admin.red_packets_add',['list'=>$list]);

    }


    
    public function red_packets_add_do(Request $request)
    {
        $r_id=$request->r_id;
        $num=$request->num;

        for($i=1;$i<=$num;$i++)
        {
              $arr[$i]=array('r_id'=>$r_id,'code'=>md5(rand(1000,9999).time().uniqid()));
        }
        $res=DB::table("user_redpackets")->insert($arr);
        if($res)
        {
            $data=array('code'=>1,'info'=>'success');
            echo json_encode($data);
        }

    }


       //红包列表
    public function red_packets_addlist()
    {

        $list = DB::select("select u.*,r.* from lar_user_redpackets as u INNER JOIN lar_redpackets as r on u.r_id=r.r_id  order by state ");
//         dd($list);
        return view('admin.red_packets_addlist',['list'=>$list]);

    }



}