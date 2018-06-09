<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\model\NodeModel;

class NodeController extends CommonController
{
    public function nodeDo()
    {

        NodeModel::insertOne($_POST);
        return redirect("nodeIndex");
    }

    public function index()
    {
        $id=isset($_GET['id']) ? $_GET['id']:'0';
        $data=json_decode(NodeModel::getList($id),true);

        return view('admin/node/index',['data'=>$data]);
    }

    public function add()
    {

        return view("admin/node/add");
    }
    public function adminDo()
    {
         echo 1;die;
    }
}


