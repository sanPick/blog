<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Mail;
//定义已经逾期的变量
global $over_email;
global $ev;
//定义即将逾期变量
global $email;
global $vv;



class ProjectController extends CommonController
{
   //逾期还款 即将还款  邮件通知
    public function overdue()
    {
//分期信息
        $fenqi_arr = DB::select('select * from lar_stages where stages_action=1 GROUP BY u_id,project_id');
        $fen_user_id = "";
        $fen_stages_u_id = "";
//        print_r($fenqi_arr);die;
        foreach ($fenqi_arr as $key => $val) {
            if ($val->stages_time - strtotime(date("Y-m-d",time())) < 3600 * 24 && time() < $val->stages_time) {
                $fen_user_id[$key] = $val->u_id;
            }
            //分期逾期还款信息
            if (strtotime(date("Y-m-d",time())) > $val->stages_time) {
                //将即将分期还款的用户id取出
                $fen_stages_u_id[$key] = $val->u_id;
            }
        }

        //将分期逾期还款用户id去重

            $new_fen_stages_u_id = array_unique((array)$fen_stages_u_id);


        //即将还款信息去重

            $new_fen_user_id = array_unique((array)$fen_user_id);


        //定期还款信息
            $dingqi_arr = DB::select('select * from lar_stages where stages_action=2 GROUP BY u_id,project_id');
            $dingqi_user_id = "";
            $dingqi_stages_user_id = "";
        foreach ($dingqi_arr as $k => $v) {
            //将即将定期还款的用户id取出
            if ($v->stages_time - strtotime(date("Y-m-d",time())) < 3600 * 24 && strtotime(date("Y-m-d",time())) < $v->stages_time) {
                $dingqi_user_id[$k] = $v->u_id;
            }

            //定期逾期还款的用户ix取出
            if (strtotime(date("Y-m-d",time())) > $v->stages_time) {
                $dingqi_stages_user_id = $v->u_id;
            }
        }

    //        print_r($dingqi_stages_user_id);die;
            //定期还款已逾期用户id去重处理

            $new_dingqi_stages_user_id = array_unique((array)$dingqi_stages_user_id);

            //将分期的逾期用户与定期的逾期用户id合并
            $overdue_u_id = array_merge((array)$new_fen_stages_u_id,(array)$new_dingqi_stages_user_id);

    //        print_r($new_dingqi_stages_user_id);die;
            //将分期定期的逾期还款的用户id合并起来去重
            $new_overdu_repay_u_id = array_unique( (array)$overdue_u_id);

            //定期还款用户即将还款的用户id去重

            $new_dingqi_user_id = array_unique((array)$dingqi_user_id);

            //将分期定期的即将还款的用户id合并起来
            $uid_arr = array_merge((array)$new_fen_user_id,(array)$new_dingqi_user_id);
            //将分期定期的即将还款的用户id合并起来去重
            $new_will_repay_u_id = array_unique((array)$uid_arr);
            //去除逾期用户id的空值
            $new_overdu_repay_u_id = array_filter((array)$new_overdu_repay_u_id);
            //将逾期的用户id分割成字符串
            $new_overdu_repay_u_id = implode(',',(array)$new_overdu_repay_u_id);
            //去除将要还款的用户id的空值
            $new_will_repay_u_id = array_filter((array)$new_will_repay_u_id);
            //将即将还款的用户id风格成字符串
            $string_will_u_id = implode(',',(array)$new_will_repay_u_id);
            // echo  strtotime(date("Y-m-d",strtotime("+0 month",strtotime("2016-08-02")))); die;
       
        //将逾期的用户邮箱取出
        if(!empty(@$new_overdu_repay_u_id)){
           $this->over_email = DB::select("select email from lar_users where user_id in($new_overdu_repay_u_id)");
           
        //向已经逾期的用户发送通知
           foreach($this->over_email as $this->ev){
               $re =  Mail::raw('您有还款已经逾期，每天会扣除相应的信用积分，以面对您的个人信用造成不良影响，请及时还款！！！',function ($msg){

                   $msg->from('asandaye@163.com','asan');

                   $msg->subject('逾期还款提醒');

                   $msg->to($this->ev->email);
               });
           }

          //对于逾期的用户每天减去相应的积分
            DB::update("update lar_credits set credit_number = (credit_number-credit_number*0.03) where user_id in($new_overdu_repay_u_id)");


        }
        
//         echo strtotime(date("Y-m-d",time()));die;
// print_r($new_overdu_repay_u_id);die;

        
       if(!empty(@$string_will_u_id)){
           $this->email = DB::select("select email from lar_users where user_id in($string_will_u_id)");
//       $new_email = json_decode(json_encode($email));
//       print_r($new_email[0]['email']);die

           foreach($this->email as $this->vv){
               $res =  Mail::raw('您有一起还款即将到期，记得及时还款哦',function ($msg){

                   $msg->from('asandaye@163.com','asan');

                   $msg->subject('即将还款提醒');

                   $msg->to($this->vv->email);
               });
           }

       }
  
//print_r($new_overdu_repay_u_id);die;



        //发送邮件

//print_r($new_overdu_repay_u_id);
//        print_r($new_will_repay_u_id);

//        echo date("Y-m-d",strtotime("+3 month",time()));
    }
}
