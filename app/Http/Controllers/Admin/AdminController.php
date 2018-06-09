<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\model\AdminModel;
class AdminController extends CommonController
{
    public function index()
    {
        return view("admin/admin/index",['data'=>AdminModel::show()]);
    }

    public function add()
    {

        return view("admin/admin/add");
    }
    public function adminDo()
    {

        AdminModel::insertOne($_POST);
        return redirect("adminIndex");
    }


}


