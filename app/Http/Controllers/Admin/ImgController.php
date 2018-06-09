<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\model\admin\Img;
use illuminate\Http\Request;

class ImgController extends Controller
{

	public function add(Request $request)
	{
		if($request->isMethod('post'))
		{
			if ($request->hasFile('img_path')) 
			{
    			$file = $request->file('img_path');
    			if ( $file->isValid()) {
			        //$filename = $file->getClientOriginalName();
			        $extension = $file->getClientOriginalExtension(); //扩展名
			        $filename = time() . "." . $extension;    //重命名
			        $arr = array();
			        $arr['img_path'] = '/upload/img/'.$filename;
			        $arr['img_html'] = $_POST['img_html'];
			        $model = new Img();
			        $res = $model->addImg($arr);
			        // dump($res);die;
			        if($res)
			        {
			        	$file->move('E:\phpStydy\PHPTutorial\WWW\laravel\blog\public\upload\img', $filename); //移动至指定目录
			        	return redirect("imgShow");
			        }
			        else
			        {
			        	return redirect("imgAdd");
			        }
          		}
      		}
		}
		else
		{
			return View('img/add');
		}
	}

	public function show()
	{
		$model = new Img();
		$arr = $model->findAll();
		return View('img/show',['arr'=>$arr]);
	}

	public function del()
	{
		$img_id = $_GET['img_id'];
		$model = new Img();
		$res = $model->delOne($img_id);
		return redirect("imgShow");
	}

}



?>