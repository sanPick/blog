<?php

namespace App\Http\Controllers\Home;


use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use DB;
class IndexController extends CommonController{
    public function index(){

        //用户收益排名
        $user_grow_ranking = $this->user_grow_ranking();
        //用户投资排名
        $user_pro_ranking = $this->user_pro_ranking();

        //查询出投资列表分类表
        $cate = DB::table('projects_cate')->get();
        $cate_ids = array();
        foreach($cate as $x=>$n){
            $cate_ids[] = $n->cate_id;
        }
        $cate_tree = $this->cate_tree(1,$cate_ids);
        //最新新闻信息以及最新理财信息
        $news = DB::table('financial_news')->select('news_title','news_link','news_addtime')->where('news_cat','1')->take('6')->get();
        $licai = DB::table('financial_news')->select('news_title','news_link','news_addtime')->where('news_cat','2')->take('6')->get();
        //轮播图信息
        $slide = $this->slide();
        // 首页资金展示信息
        $total_money = DB::table('projects')->sum('total_money');
        $liquid_assets = DB::table('income')->sum('liquid_assets');
        $user_assets = DB::table('user_assets')->sum('user_assets');
        $list['user_num'] = DB::table('users')->count();
        $list['total_money'] = number_format($total_money,'2');
        $list['liquid_assets']  = number_format($liquid_assets,'2');
        $list['user_assets'] = number_format($user_assets,'2');
        return view('home.index',['cate_tree'=>$cate_tree,'news'=>$news,'licai'=>$licai,'slide'=>$slide,'list'=>$list,'user_grow_ranking'=>$user_grow_ranking,'user_pro_ranking'=>$user_pro_ranking])->__toString();
    }
    /**
     * 轮播图
     */
    function slide(){
        return DB::table('slite')->orderBy('sort','asc')->get();
    }

    function cate_tree($cate_id,$cate_ids){
        //查询出投资列表
        $projects = DB::table('projects')->get();
        $new_arr =  array();
        foreach($cate_ids as $m=>$n){
            $cate = DB::table('projects_cate')
                ->where('cate_id',$n)->first();
            if(!empty($n)){
                foreach($projects as $k=>$v){
                    if($v->cate_id == $n){
                        $new_arr[$cate->cate_name][$k] =  $v;
                    }
                }
            }
        }
        return  $new_arr;

    }

    public function login()
    {

        return view('home.login');
    }

    public function summary()
    {
        return view('home.summary');
    }
    public function helper()
    {
        return view('home.helper');
    }

    //理财知识采集
    public function curl_knowledge(){
        DB::table('financial_news')->where('news_cat','=',2)->delete();

        $url="http://finance.sina.com.cn/money/?qq-pf-to=pcqq.c2c";
        //1.初始化，创建一个新cURL资源
        $ch = curl_init();
        //2.设置URL和相应的选项
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        //3.抓取URL并把它传递给浏览器
        $product=curl_exec($ch);
          $reg='#<div class="news-item ">.*<div class="c clearfix">.*<div class="txt">.*<h2><a href="(.*)" target="_blank">(.*)</a></h2>.*<div class="p">.*<a href=".*" target="_blank">.*</a>.*</div>.*<div class="info clearfix">.*<div class="time">(.*)</div>.*<div class="action">.*</div>.*</div>.*</div>.*</div>.*</div>#Usi';
        preg_match_all($reg, $product,$pro);
        $links = $pro['1'];
        $title = $pro['2'];
        $time = $pro['3'];
        $con = 10;
        for($i=0;$i<$con;$i++){
            $link_arr[$i]=$links[$i];
            $title_arr[$i]=$title[$i];
            $time_arr[$i] = $time[$i];
        }
//        print_r($time_arr);die;
        $arr = array();
        for($j=0;$j<$con;$j++){
            $arr[$j]['news_title']=$title_arr[$j];
            $arr[$j]['news_link']=$link_arr[$j];
            $arr[$j]['news_addtime'] =$time_arr[$j];
            $arr[$j]['news_cat'] = 2;
        }
//        print_r($arr);die;

        foreach ($arr as $k=>$v){
            DB::table('financial_news')->insert($v);
        }
//4.关闭cURL资源，并且释放系统资源
        curl_close($ch);die;
    }



//媒体报道采集
    public function curl_media(){
        DB::table('financial_news')->where('news_cat','=',1)->delete();
        $url="http://www.wangdaidongtai.com/";
        //1.初始化，创建一个新cURL资源
        $ch = curl_init();
        //2.设置URL和相应的选项
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        //3.抓取URL并把它传递给浏览器
        $product=curl_exec($ch);
//         $reg='#<a href=".*" class="img"><img src=".*">.*</a>.*<a href="(.*)" class="txt">(.*)</a>#Usi';
        $reg = '#<dl class="cl">.*<dd class="m"><a href=".*" target="_blank"><img src=".*" width="100" height="100" alt=".*" /></dd>.*<dd>.*<a href="(.*)" title=".*" target="_blank">(.*)</a></font></dd>.*<dd>(.*)</dd>.*</dl>#Usi';
        preg_match_all($reg, $product,$pro);
        $links = $pro['1'];
        $title = $pro['2'];
        $con = 10;
        $link_arr =array();
        $title_arr = array();
        for($i=0;$i<$con;$i++){
            $link_arr[$i]=$links[$i];
            $title_arr[$i]=$title[$i];
        }
        $arr = array();
        for($j=0;$j<$con;$j++){
            $arr[$j]['news_title']=$title_arr[$j];
            $arr[$j]['news_link']=$link_arr[$j];
            $arr[$j]['news_addtime'] =strtotime(date("Y-m-d h:i:s",time()))-rand(1111,9999);
            $arr[$j]['news_cat'] = 1;
        }
        foreach ($arr as $k=>$v){
            DB::table('financial_news')->insert($v);
        }
        //4.关闭cURL资源，并且释放系统资源
        curl_close($ch);die;
    }

/**
 * 用户收益排名
 * @return [type] [description]
 */
    public function  user_grow_ranking(){
       $user_grow_ranking =  DB::table('user_grows as ug')
            ->join('users as u','ug.user_id','=','u.user_id')
            ->select('u.user_name','ug.total_grow')
            ->orderBy('ug.total_grow','desc')
            ->take(5)
            ->get();

            return $user_grow_ranking;
    }
/**
 * 用户投资排名
 */
    public function user_pro_ranking(){
        $user_pro_ranking = DB::select('select u.user_name,sum(total_money) as total_money from lar_projects as p join lar_users as u on p.u_id = u.user_id   GROUP BY p.u_id ORDER BY CAST(p.total_money as SIGNED)  desc ');
        $user_pro_ranking = json_encode($user_pro_ranking);
        $user_pro_ranking = json_decode($user_pro_ranking,true);
        $sort_arr = $this->array_sort($user_pro_ranking,'total_money','desc');
        foreach($sort_arr as $k=>$v){
            $new_arr[] =  $v;
        }
        return $new_arr;
    }
    /**
     * [array_sort]
     * 对二维数组进行排序
     */
     function array_sort($array,$row,$type){
          $array_temp = array();
          foreach($array as $v){
            $array_temp[$v[$row]] = $v;
          }
          if($type == 'asc'){
            ksort($array_temp);
          }elseif($type='desc'){
            krsort($array_temp);
          }else{
          }
          return $array_temp;
    }   
}
