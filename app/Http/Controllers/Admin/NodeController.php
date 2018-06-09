<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\model\NodeModel;

class NodeController extends CommonController
{
    public function userDo()
    {

        UserModel::insertOne($_POST);
        return redirect("nodeIndex");
    }

    public function index()
    {
        $id=$_GET['id'] ? $_GET['id'] :0;
        $data=NodeModel::getList($id);
        print_r($data);
        return view('admin/node/index',['data'=>$data]);
    }

    public function add()
    {

        return view("admin/node/add");
    }
}


