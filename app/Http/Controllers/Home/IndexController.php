<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\model\home\Index;
use App\model\admin\Img;

class IndexController extends Controller
{

	public function index()
	{
		$model = new Index();
		$arr = $model->showAll();
		$model = new Img();
		$data = $model->findAll();
		return View('index/index',['arr'=>$arr,'data'=>$data]);
	}

}


?>