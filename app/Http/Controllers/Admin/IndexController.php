<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\CommonController;
class IndexController extends CommonController
{
    public function index()
    {
         return view('admin\index\index');
    }
}
