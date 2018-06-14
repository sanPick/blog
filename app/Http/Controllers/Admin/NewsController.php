<?php
/**
 * 后台新闻管理
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


class NewsController extends CommonController
{
    public $timestamps=false;
    public function news_list(Request $request){
        $users=DB::table('financial_news')->get();
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
            'path' => Paginator::resolveCurrentPath('/news_list'),
            'pageName' => 'page',
        ]);
        $userlist = $paginator->toArray()['data'];
        return view('admin.news_list', compact('userlist', 'paginator'));

    }
//    public function news_add(Request $request){
//        if($request->isMethod('post')){
//          $arr=$request->all();
//            $date=[
//                'article_title'=>$arr['article_title'],
//                'article_content'=>$arr['article_content'],
//                'address'=>$arr['address'],
//                'add_time'=>time()
//            ];
//
//           $a=DB::table('article')->insert($date);
//          return  redirect()->action('Admin\ArticleController@article_list');
//
//
//        }else{
//            return view('admin.article_add');
//        }
//
//    }
    public function news_del(Request $request){
        $arr=$request->all();

        $a=DB::table('financial_news')->where('news_id',$arr['news_id'])->delete();
        return $a;
    }
    public function news_update(Request $request){
        if($request->isMethod('post')){
            $arr=$request->all();
            $err=[
                'news_title'=>$arr['news_title'],
                'news_link'=>$arr['news_link'],
                'news_cat'=>$arr['news_cat'],
            ];
            $a=DB::table('financial_news')->where('news_id','=' ,$arr['news_id'])->update($err);
            return  redirect()->action('Admin\NewsController@news_list');
        }else{
            $arr=$request->all();
            $arr=DB::table('financial_news')->where('news_id','=',$arr['news_id'])->first();


            return view('admin.news_update',['arr'=>$arr]);
        }

    }
}
