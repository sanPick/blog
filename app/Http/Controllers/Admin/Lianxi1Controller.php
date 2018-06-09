<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Input;
use Redirect;
use DB;

class Lianxi1Controller extends Controller
{
    public function index()
    {
        return view('admin/add');
    }
    public function add()
    {
        $data = $_POST;
         unset($data['_token']);
        // var_dump($_FILES['photo']);die;
         //var_dump(Request());die;
        $file = \Request::file('photo');
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
        // print_r($filePath);die;
        $data['img'] = $filePath;
        $res = DB::table('user1')->insert($data);
        if($res)
        {

            return redirect('show');
        }
        else
        {
            return redirect('add');
        }
        // print_r($data);die;
    }
    public function show()
    {
        $data = DB::table('user1')->paginate(3);
        // print_r($data);die;
        return view('admin/show',['data'=>$data]);
    }
    public function del()
    {
        $id = $_GET['id'];
        // echo $id;die;
        $data = DB::table('user1')->where(['id'=>$id])->delete();
          if($data)
          {
              return redirect('show');
          }
          else
          {
              echo '有问题，快修改一下！';
          }
    }
    public function up()
    {
         $id = $_GET['id'];
         // echo $id;die;
         $arr = DB::table('user1')->where(['id'=>$id])->get();
            // print_r($arr);die;
         return view('admin/up',['arr'=>$arr[0]]);
    }
    public function save()
    {
        $data = $_POST;
        unset($data['_token']);
            // print_r($data);die;
        $file = \Request::file('photo');
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
        // print_r($filePath);die;
        $data['img'] = $filePath;
            $res = DB::table('user1')->where(['id'=>$data['id']])->update($data);
            // var_dump($res);die;
            if($res)
            {
                return redirect('show');
            }
            else
            {
                echo '修改失败，请重新修改';
            }

    }
}
