<?php
//首页
namespace App\Http\Controllers\Admin;


 use App\User;
 use Validator;
 use App\Http\Controllers\Controller;
 use Illuminate\Foundation\Auth\ThrottlesLogins;
 use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
 use Symfony\Component\HttpFoundation\Session\Session;
 use DB;
class IndexController extends CommonController
{
    public function index()
    {
         $session = new Session;
         $admin_id = $session->get("admin_id");
         $rote = DB::table('a_r')->select('rote_id')
                         ->where('admin_id',$admin_id)
                         ->first();
        
         $rote_id = $rote->rote_id;
         //根据角色查询权限
         $node = DB::table('r_n')->select('node_id')
                         ->where('rote_id',$rote_id)
                         ->get();  
         foreach($node as $k=>$v){
            $node_id[] = $v->node_id;
         }

         $node_name = DB::table('node')->select('node_path')
                         ->whereIn('node_id',$node_id)
                         ->get();
         foreach($node_name as $k=>$v){
            $node_path[] = $v->node_path;
         }

         return view('admin.index',['node_path'=>$node_path]);
    }

    //网站收益
    public function admin_income(){
        $time=time();
        $new_time=date("Y-m-d",time()-60*60*24*6);
        $time=date("Y-m-d",time());
        // print_r($new_time);die;
        $arr= DB::table('income')->where('date','>=',$new_time)->orderBy('date', 'asc')->get();
        $arr=json_encode($arr);
        $arr=json_decode($arr,",");
    //    print_r($arr);die;
        return view('admin.income',['arr'=>$arr]);
    }

    public function login()
    {
         return view('admin.login');
    }

    public function info()
    {

//        echo 11;die;

       ini_set('date.timezone','Asia/Shanghai');
       $num = DB::select("select count(user_id) as num from lar_users ");
       $num=json_encode($num);
       $num=json_decode($num,",");
       // print_r($num);die;
       $pv = DB::select("select sum(pv) as pv from lar_income ");
       $pv=json_encode($pv);
       $pv=json_decode($pv,",");
        $arr=[
            'max_up'=>get_cfg_var ("upload_max_filesize"),//最大上传限制
            'web'=>$_SERVER ['SERVER_SOFTWARE'],//Web 服务器
            'system'=>PHP_OS,//服务器操作系统
            'php'=>PHP_VERSION,//PHP程式版本
            'num'=>$num[0]['num'],
            'time'=>date('Y-m-d'),
            'pv'=>$pv[0]['pv'],
        ];
       // print_r($arr);die;
        return view('admin.info',['arr'=>$arr]);

    }
    public function pass()
    {
        return view('admin.pass');
    }

    public function page()
    {
        return view('admin.page');
    }
    public function adv()
    {
        return view('admin.adv');
    }
    public function book()
    {
        return view('admin.book');
    }
    public function column()
    {
        return view('admin.column');
    }
    public function a_list()
    {
        return view('admin.list');
    }
    public function add()
    {
        return view('admin.add');
    }

    public function cate()
    {
        return view('admin.cate');
    }
}
