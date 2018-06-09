<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\model\NodeModel;

class NodeController extends CommonController
{
<<<<<<< HEAD
    public function userDo()
    {

        UserModel::insertOne($_POST);
=======
    public function nodeDo()
    {

        NodeModel::insertOne($_POST);
>>>>>>> origin/wangzhongen
        return redirect("nodeIndex");
    }

    public function index()
    {
<<<<<<< HEAD
        $id=$_GET['id'] ? $_GET['id'] :0;
        $data=NodeModel::getList($id);
        print_r($data);
=======
        $id=isset($_GET['id']) ? $_GET['id']:'0';
        $data=json_decode(NodeModel::getList($id),true);

>>>>>>> origin/wangzhongen
        return view('admin/node/index',['data'=>$data]);
    }

    public function add()
    {

        return view("admin/node/add");
    }
<<<<<<< HEAD
=======
    public function adminDo()
    {
         echo 1;die;
    }
>>>>>>> origin/wangzhongen
}


