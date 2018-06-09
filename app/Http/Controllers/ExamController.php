<?php

/**
 * @Author: Marte
 * @Date:   2018-06-05 09:51:57
 * @Last Modified by:   Marte
 * @Last Modified time: 2018-06-06 14:44:06
 */
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Exam;
class ExamController extends Controller
{
        public  function show()
        {   $data=Exam::paginate(2);
            // $arr=Exam::getUserAll();
            return view('exam/show',['arr'=>$data]);
        }

        public function add()
        {
            return view('exam/add');
        }

        public function add_do()
        {
             $info=EXam::addOne($_POST);
             if($info)
             {
                return '添加成功';
             }
             else
             {
                return '添加失败';
             }
        }

        public function del()
        {
            $res=Exam::delOne($_GET['id']);
            if($res)
            {
                 return '删除成功';
            }
            else
            {
                 return '删除失败';
            }
        }
}