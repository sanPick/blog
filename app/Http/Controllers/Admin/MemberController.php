<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\model\MemberModel;

class MemberController extends CommonController
{
    public function memberDo()
    {

        memberModel::insertOne($_POST);
        return redirect("memberIndex");
    }

    public function index()
    {
        return view('admin/member/index',['data'=>MemberModel::show()]);
    }
    //添加会员
    public function add()
    {

        return view("admin/member/add");
    }

    //删除
    public function memberDel()
    {
        $id = $_GET['id'];
        $info = MemberModel::delOne($id);
        if($info)
        {
            return redirect('memberIndex');
        }
    }

    //修改
    public function update()
    {
          return view('admin\member\update');
    }
}


