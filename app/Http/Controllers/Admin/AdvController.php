<?php
/**
 * 后台轮播图管理
 * 2017-06-13 22:57:04
 */
namespace App\Http\Controllers\Admin;

use DB;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Input;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;


class AdvController extends CommonController
{
    public $timestamps=false;
    public function adv(Request $request){
        $users=DB::table('slite')->orderBy('sort','asc')->get();
//        print_r($users);die;
        $perPage = 3;
        if ($request->has('page')) {
            $current_page = $request->input('page');
            $current_page = $current_page <= 0 ? 1 :$current_page;
        } else {
            $current_page = 1;
        }
        $item = array_slice($users, ($current_page-1)*$perPage, $perPage);
        $total = count($users);
        $paginator =new LengthAwarePaginator($item, $total, $perPage, $current_page, [
            'path' => Paginator::resolveCurrentPath('/adv'),
            'pageName' => 'page',
        ]);
        $userlist = $paginator->toArray()['data'];
        return view('admin.adv', compact('userlist', 'paginator'));
//        return view('admin.adv');
    }
    public function adv_add(Request $request)
    {
            if($request->isMethod('post')){
                $file = $request->file('img');

                //判断文件是否上传成功
                if($file->isValid()){
                    //获取原文件名
                    $originalName = $file->getClientOriginalName();
                    //扩展名
                    $ext = $file->getClientOriginalExtension();
                    //文件类型
                    $type = $file->getClientMimeType();
                    //临时绝对路径
                    $realPath = $file->getRealPath();

                    $filename = date('Y-m-d-H-i-S').'-'.uniqid().'-'.$ext;
                    $file->move('./uploads',$originalName);
                    $arr=$request->all();
                    $date=[
                        'title'=>$arr['title'],
                        'sort'=>$arr['sort'],
                        'img'=>'uploads/'.$originalName,
                        'add_time'=>time()
                    ];
                    $a=DB::table('slite')->insert($date);
                    return  redirect()->action('Admin\AdvController@adv');


                }

            }else{
            return view('admin.adv_add');
        }

    }
    public function adv_del(Request $request){
        $arr=$request->all();
//         return $arr;
        $a=DB::table('slite')->where('id',$arr['id'])->delete();
        return $a;

    }
    public function adv_update(Request $request){

        if($request->isMethod('post')){
            $arr=$request->all();
            $err=[
                'article_title'=>$arr['article_title'],
                'article_content'=>$arr['article_content'],
                'address'=>$arr['address']
            ];
            $a=DB::table('slite')->where('id','=' ,$arr['id'])->update($err);
            return  redirect()->action('Admin\AdvController@adv');
        }else{
            $arr=$request->all();
            $arr=DB::table('slite')->where('id','=',$arr['id'])->first();

            return view('admin.adv_update',['arr'=>$arr]);

        }




    }
}
