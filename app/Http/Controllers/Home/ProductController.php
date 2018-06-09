<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\model\home\Product;

class ProductController extends Controller
{

	public function show()
	{
		$cateId = $_GET['cateId'];
		$model = new Product();
		$arr = $model->findOne($cateId);
		// print_r($arr);die;
		return View('product/show',['arr'=>$arr]);
	}

}


?>