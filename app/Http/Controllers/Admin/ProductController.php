<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\model\ProductModel;
use App\Http\Requests;
class ProductController extends CommonController
{
    public function productDo()
    {
         $file = \Request::file('prolmg');
         $imgPath=$this->uploadImg($file);
         $_POST['proImg']=$imgPath;
        ProductModel::insertOne($_POST);
        return redirect("productIndex");
    }

    public function index()
    {   
        return view('admin\product\index',['data'=>ProductModel::show()]);
    }
    public function add()
    {
        $cat=ProductModel::getCatList();
        
        return view("admin/product/add",['cat'=>$cat]);
    }
    
    public  function uploadImg($file)
    {
        // var_dump($file);die;
        // $name = Request::input('name');
        $allowed_extensions = ["png", "jpg", "gif"];
        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
            return ['error' => 'You may only upload png, jpg or gif.'];
        }
        $destinationPath = 'storage/uploads/'; //public 文件夹下面建 storage/uploads 文件夹
        $extension = $file->getClientOriginalExtension();
        $fileName = str_random(10).'.'.$extension;
        $file->move($destinationPath, $fileName);
        $filePath = asset($destinationPath.$fileName);
        return $filePath;
    }
}


