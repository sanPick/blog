<?php
/**
 * 后台文章管理
 * 2017-06-13 22:56:37
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


class ArticleController extends CommonController
{
    public $timestamps=false;
    public function article_list(Request $request){
        $users=DB::table('article')->get();
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
            'path' => Paginator::resolveCurrentPath('/list'),
            'pageName' => 'page',
        ]);
        $userlist = $paginator->toArray()['data'];
        return view('admin.article_list', compact('userlist', 'paginator'));

    }
    public function article_add(Request $request){
        if($request->isMethod('post')){
          $arr=$request->all();
            $date=[
                'article_title'=>$arr['article_title'],
                'article_content'=>$arr['article_content'],
                'address'=>$arr['address'],
                'add_time'=>time()
            ];

           $a=DB::table('article')->insert($date);
          return  redirect()->action('Admin\ArticleController@article_list');


        }else{
            return view('admin.article_add');
        }

    }
    public function article_del(Request $request){
        $arr=$request->all();

        $a=DB::table('article')->where('article_id',$arr['arcitle_id'])->delete();
        return $a;
    }
    public function article_update(Request $request){
        if($request->isMethod('post')){
            $arr=$request->all();
            $err=[
                'article_title'=>$arr['article_title'],
                'article_content'=>$arr['article_content'],
                'address'=>$arr['address']
            ];
            $a=DB::table('article')->where('article_id','=' ,$arr['article_id'])->update($err);
            return  redirect()->action('Admin\ArticleController@article_list');
        }else{
            $arr=$request->all();
            $arr=DB::table('article')->where('article_id','=',$arr['article_id'])->first();


            return view('admin.article_update',['arr'=>$arr]);
        }

    }
}
