<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\model\RoleModel;
class RoleController extends CommonController
{
    public function roleDo()
    {

        RoleModel::insertOne($_POST);
        return redirect("roleIndex");
    }

    public function index()
    {
        return view('admin\role\index',['data'=>RoleModel::show()]);
    }
    public function add()
    {

        return view("admin/role/add");
    }
}


