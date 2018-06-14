<?php

namespace App\Http\Controllers\Admin;


 use App\User;
 use DB;
 use Validator;
 use App\Http\Controllers\Controller;
 use Illuminate\Foundation\Auth\ThrottlesLogins;
 use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
 use Illuminate\Support\Facades\Input;
 use Illuminate\Http\Request;
 use Redirect;
class RoleController extends CommonController
{


    //角色添加
    public function role_add()
    {
        $node_data =  DB::select("select *,concat(path,'-',node_id) as depath from lar_node  order by path
");       
        $node_data = json_encode($node_data);

        $node_data = json_decode($node_data,true);  

        $digui = new \App\Tools\Functions();

        $node_data = $digui->node_digui(0,$node_data);        
//         file_put_contents('linshi.cache',json_encode($node_data));
        // $node_data = json_decode(file_get_contents('linshi.cache'),true);
        return view('admin.role_add',['node_data'=>$node_data]);
    }
    //角色列表
    public function role_list()
    {
        return view('admin.role_list');
    }

    public function add_role_rn(Request $request){
        if($request->isMethod('post')){
            $data = input::get();

            $node = $data['checkbox'];
            //添加角色表
            $rote = DB::table('rotes')->insertGetId(['rote_name'=>$data['rote_name'],'rote_desc'=>$data['rote_desc']]);
            //添加角色权限表
            foreach ($node as $key => $value) {
                $arr[$key]['rote_id'] =  $rote;
                $arr[$key]['node_id'] =  $value;
            }

            $r_n = DB::table('r_n')->insert($arr);
            return Redirect::to('role_add');
        }
        
    }
    /**
     * 管理员权限分配
     */
    public function admin_note(Request $request){
        if($request->isMethod('post')){
            $data = input::get();
            //管理员ID和角色ID
            $arr['admin_id'] = $data['admin_id'];
            $arr['rote_id'] = $data['rote_id'];
            if(DB::table('a_r')->where('admin_id',$data['admin_id'])->get()){
               if(DB::table('a_r')->where('admin_id',$data['admin_id'])->update(['rote_id'=>$data['rote_id']])){
                    echo 2;die;
               }else{
                echo 0;die;
               }               
            }else{
                if(DB::table('a_r')->insert($arr)){
                    echo 1;die;
                }else{
                    echo 4;die;
                }

            }

        }else{
            //查询管理员的信息
            $admin = DB::table('admins as a')
                        ->select('a.*','ar.rote_id')
                        ->join('a_r as ar','a.admin_id','=','ar.admin_id')
                        ->paginate(5);
            //获取角色
            $rote = DB::table('rotes')->get();
            
            //获取管理员对应的角色ID
             $a_r = DB::table('a_r')->get();
            return view('admin.admin_note',['data'=>$admin,'rote'=>$rote]);    
        }
    }

    /**
     * 管理员添加
     */
    public function admin_add(Request $request){
        if($request->isMethod('post')){
            $data = input::get();
            unset($data['_token']);
            $data['admin_pwd'] = md5($data['admin_pwd']);
            $data['last_ip'] = $_SERVER['REMOTE_ADDR'];
            $data['last_time'] = time();
            $data['create_time'] = time();
            $data['last_area'] = '上海';
            DB::table('admins')->insert($data);
            return Redirect::to('admin_note');
        }else{

            return view('admin.admin_add'); 
        }

         
    }
//管理员日志展示
    public function admin_log(){
        $log_arr = DB::table('admins')->join('admin_log','admins.admin_id','=','admin_log.adm_id')->select('admin_name','admin_log.*')->orderBy('had_time','desc')->paginate(13);
        return view('admin.admin_log_list',['log_arr'=>$log_arr]);
    }



    //管理员日志  定期删除

     public  function log_del(){
        $now = time();
        $end_time = 3600*24*7;

         $log_id_arr = DB::select("select log_id from lar_admin_log where had_time<$now-$end_time");
         $id=array();
         foreach ($log_id_arr as $k=>$v){
             $id[$k]=$v->log_id;
         }

         $log_id_str = implode(',',$id);




        $log_id = DB::delete("delete from lar_admin_log where log_id in($log_id_str)");

     }

}
