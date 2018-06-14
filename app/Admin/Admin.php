<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use DB;
class Admin extends Model
{
    //
    public function updat($old_pwd,$new_pwd,$ok_pwd,$admin_name){
       $res = DB::table('admins')->where(['admin_name'=>$admin_name,'admin_pwd'=>md5($old_pwd)])->first();

        $new_new_pwd=md5($ok_pwd);
       if($res){
           if($new_pwd == $ok_pwd){
              $re = DB::table('admins')->where('admin_name',$admin_name)->update(['admin_pwd'=>$new_new_pwd]);
             if($re){
                 $data['status'] = 1;
                 $data['msg'] = '修改成功';
             }else{
                 $data['status'] = 0;
                 $data['msg'] = '修改失败';
             }
           }else{
               $data['status'] = 2;
               $data['msg'] = '两次密码不一致';
           }
       }else{
           $data['status'] = 3;
           $data['msg'] = '旧密码不正确';
       }
       return $data;
    }

}
