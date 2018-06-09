<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\model\UserInfoModel;

class UserInfoController extends CommonController
{
    public function userInfoDo()
    {

        UserInfoModel::insertOne($_POST);
        return redirect("userInfoIndex");
    }

    public function index()
    {


        return view('admin/userInfo/index',['data'=>UserInfoModel::show()]);
    }

    public function add()
    {

        return view("admin/userInfo/add");
    }
    public function adminDo()
    {
         echo 1;die;
    }
}


