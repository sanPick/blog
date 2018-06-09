<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\model\RedpacketModel;

class RedpacketController extends CommonController
{
    public function redpacketDo()
    {

         RedpacketModel::insertOne($_POST);
        return redirect("redpacketIndex");
    }

    public function index()
    {
       // $id=$_GET['id'] ? $_GET['id'] :0;
       // $data=RedpacketModel::getList($id);
       // print_r($data);
        return view('admin/redpacket/index',['data'=>RedpacketModel::show()]);
    }

    public function add()
    {

        return view("admin/redpacket/add");
    }
     public function redpacketdel()//删除
     {

         $id=$_GET['id'];//传id
         $info=RedpacketModel::delOne($id);//传值
         if($info){//执行删除
             return '删除成功';
         }
     }
}


