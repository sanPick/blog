<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\model\NodeModel;

class NodeController extends CommonController
{
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> origin/huanghan
    public function userDo()
    {

        UserModel::insertOne($_POST);
<<<<<<< HEAD
=======
    public function nodeDo()
    {

        NodeModel::insertOne($_POST);
>>>>>>> origin/wangzhongen
=======
>>>>>>> origin/huanghan
        return redirect("nodeIndex");
    }

    public function index()
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $id=$_GET['id'] ? $_GET['id'] :0;
        $data=NodeModel::getList($id);
        print_r($data);
=======
        $id=isset($_GET['id']) ? $_GET['id']:'0';
        $data=json_decode(NodeModel::getList($id),true);

>>>>>>> origin/wangzhongen
=======
        $id=$_GET['id'] ? $_GET['id'] :0;
        $data=NodeModel::getList($id);
        print_r($data);
>>>>>>> origin/huanghan
        return view('admin/node/index',['data'=>$data]);
    }

    public function add()
    {

        return view("admin/node/add");
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======
    public function adminDo()
    {
         echo 1;die;
    }
>>>>>>> origin/wangzhongen
=======
>>>>>>> origin/huanghan
}


