<?php
/**
 * Created by PhpStorm.
 * User: ys
 * Date: 2017/6/16
 * Time: 19:53
 */
namespace App\Http\Controllers\Admin;


use Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
class LoanController extends CommonController
{
    //借款列表
    public function loan_list(){

        $list=DB::table("projects")
                ->join('users','users.user_id','=','projects.u_id')
                ->join('goods','goods.goods_id','=','projects.goods_id')
                ->select('projects.*','users.user_id','users.user_name','goods.goods_name','goods.type')
                ->orderBy('projects.create_time','desc')
                ->paginate(7);

        $cate = DB::table('projects_cate')->get();
        return view('admin.loan_list',['list'=>$list,'cate'=>$cate]);
    }

    public function loan_check(Request $request){
            $u_id = $request->u_id;
            $product_id = $request->product_id;
            $real_money = $request->real_money;
            $goods_id = $request->goods_id;
            $term = $request->term;
            $rate = $request->rate;
            $total_moneyy = $request->total_money;
             $user_id = $request->user_id;
             $repay_way =  $request->repay_way;





            //修改借款表状态
            $a = DB::table('projects')->where('product_id',$product_id)->update(['product_status'=>1]);
            //修改抵押物表状态
            $b = DB::table('goods')->where('goods_id',$goods_id)->update(['status'=>2]);
            //修改用户总资产 
            $c = DB::update('update lar_user_assets set  user_assets = user_assets+ '.$real_money.' where user_id = '.$u_id);
            //修改网站流动资产
            $d = DB::update('update lar_total_revenue set floating_capital = floating_capital -'.$real_money);


        $total_money = array();
        //到期连本带利
        if(!empty($repay_way)&&$repay_way==2){
            //一共要还的钱
            $every_month_everyPrincipal = sprintf("%.2f",$total_moneyy*($rate/100)+$total_moneyy);
            //要还利息
            $every_month_Interest = sprintf("%.2f",$total_moneyy*($rate/100));
            //要还的本金
            $every_month_Principal =sprintf("%.2f",$total_moneyy);

            $total_money['u_id'] = $u_id;
            $total_money['project_id'] = $product_id;
            $total_money['stages_time'] = strtotime(date("Y-m-d",strtotime("+$term month",time()))) ;
            $total_money['stages_money'] = $every_month_everyPrincipal;
            $total_money['stsges_principal'] = $every_month_Principal;
            $total_money['stages_Interest'] = $every_month_Interest;
            $total_money['stages_date'] = 1;
            $total_money['stages_action'] = $repay_way;

            $res = DB::table('stages')->insert($total_money);

        }



//分期处理(等额本息)

            if(!empty($repay_way)&&$repay_way==1){

                //每月要还利息

                $every_month_Interest = sprintf("%.2f",$total_moneyy*($rate/100)/$term);
                //每期的本金
                $every_month_Principal = sprintf("%.2f",$total_moneyy/$term);
                //        每月要还的钱
                $every_month_everyPrincipal = sprintf("%.2f",$every_month_Interest+$every_month_Principal);

                $fenqi_money = array();
                for($i=0;$i<$term;$i++){
                    $num = $i+1;
                    $fenqi_money[$i]['u_id'] = $user_id;
                    $fenqi_money[$i]['project_id'] = $product_id;
                    $fenqi_money[$i]['stages_time'] = strtotime(date("Y-m-d",strtotime("+$num month",time()))) ;
                    $fenqi_money[$i]['stages_money'] = $every_month_everyPrincipal;
                    $fenqi_money[$i]['stsges_principal'] = $every_month_Principal;
                    $fenqi_money[$i]['stages_Interest'] = $every_month_Interest;
                    $fenqi_money[$i]['stages_date'] = $i+1;
                    $fenqi_money[$i]['stages_action'] = $repay_way;
                }

             
                for($j = 0;$j<count($fenqi_money);$j++){
                    $res = DB::table('stages')->insert($fenqi_money[$j]);
                }

            }



            if($c&&$d&&$res){
                echo 1;
            }else{
                echo 2;
            }


    }
    public function cate_change(Request $request){
        $cate_id = $request->cate_id;
        $product_id = $request->product_id;
        if($cate_id!=0){
            if(DB::table('projects')->where('cate_id',$cate_id)->count()>=3){
                return 2;//每个标签下数量不能查过三个
            }
        }

        if(DB::table('projects')->where('product_id',$product_id)->update(['cate_id'=>$cate_id])){
            return 1;
        }else{
            return 0;
        }

    }



    //多条件搜索

     public function loan_search(Request $request){

         $title = $request->title;
         $type = $request->type;
         $term = $request->term;
         $rate = $request->rate;
         $repay_way = $request->repay_way;

         $where = '1';
         if (!empty($title)) {
             $where .= " and p.title like '%$title%'";
         }
         if (!empty($type)) {
             $where .= " and g.type='$type'";
         }
         if (!empty($term)) {

              if ($term == 1) {
                 $where .= " and  p.term>=1 and  p.term<=4 ";
             }
             if ($term == 2) {
                 $where .= " and  p.term>=5 and  p.term<=8";
             }
             if ($term == 3) {
                 $where .= " and  p.term>=8 and p.term<=12";
             }
           
         }

         if (!empty($rate)) {
             if ($rate == 1) {
                 $where .= " and  p.rate<10";
             }
             if ($rate == 2) {
                 $where .= " and p.rate<=12 and p.rate>=10";
             }
             if ($rate == 3) {
                 $where .= " and  p.rate>12";
             }
         }
         if (!empty($repay_way)) {
             $where .= " and p.repay_way ='$repay_way'";
         }

//         $list=DB::table("projects")->join('users','users.user_id','=','projects.u_id')->join('goods','goods.goods_id','=','projects.goods_id')->select('projects.*','users.user_name','goods.goods_name','goods.type')->where($where)->get();

         $sql = "select u.user_name,g.goods_name,g.type,p.* from lar_projects as p join lar_goods as g on p.goods_id=g.goods_id join lar_users as u on p.u_id=u.user_id where $where";
//         echo $sql;die;
         $list = DB::select($sql);
//        dd($list);
//         print_r($list);
         echo json_encode($list);
         die;

     }

}