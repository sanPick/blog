<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\model\UserModel;

class UserController extends CommonController
{
    public function userDo()
    {

        UserModel::insertOne($_POST);
        return redirect("userIndex");
    }

    public function index()
    {
        return view('admin/user/index',['data'=>UserModel::show()]);
    }

    public function add()
    {

        return view("admin/user/add");
    }
}


