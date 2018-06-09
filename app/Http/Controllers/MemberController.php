<?php
/**
 * @Author: Marte
 * @Date:   2018-06-05 12:00:15
 * @Last Modified by:   Marte
 * @Last Modified time: 2018-06-06 15:30:03
 */


namespace App\Http\Controllers;
use App\Member;
class MemberController extends Controller{
     public function index()
     {
//        $data=Member::getAll();
//
//       return view('member/index',['data'=>$data]);
         $data=Member::getAll();
         return view('member/index',['data'=>$data]);
     }

     public function del()
     {
         $id=$_GET['id'];
         $info=Member::delOne($id);
         if($info){
             return '删除成功';
         }
     }

     public function add()
     {
        return view('member/add');

     }
     public function add_do()
     {

        $info=Member::insertOne($_POST);

     }
}
