<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\model\ProductCatModel;
class ProductCatController extends CommonController
{
    public function productCatDo()
    {

        productCatModel::insertOne($_POST);
        return redirect("productCatIndex");
    }

    public function index()
    {
        return view('admin\productCat\index',['data'=>productCatModel::show()]);
    }
    //添加产品
    public function add()
    {

        return view("admin/productCat/add");
    }

    //删除
    public function productDel()
    {
         $id=$_GET['id'];
         $info=ProductCatModel::delOne($id);
         if($info){
             return redirect('productCatIndex');
         }
    }
    //修改
    public function productCatupdate()
    {
        return view("admin\productCat\update");
    }
}


