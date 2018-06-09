<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\model\BorrowTypeModel;

class BorrowTypeController extends CommonController
{
    public function borrowtypeDo()
    {

        BorrowTypeModel::insertOne($_POST);
        return redirect("borrowtypeIndex");
    }

    public function index()
    {
        
        return view('admin/borrowtype/index',['data'=>borrowtypeModel::show()]);
    }

    public function add()
    {

        return view("admin/borrowtype/add");
    }
    public function borrowtypedel()//删除
     {

         $id=$_GET['id'];//传id
         $info=BorrowTypeModel::delOne($id);//传值
         if($info){//执行删除
             return '删除成功';
         }
     }
}


