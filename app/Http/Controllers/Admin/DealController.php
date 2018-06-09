<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\model\admin\Deal;

class DealController extends Controller
{
   
	public function show()
	{
		$model = new Deal();
		$arr = $model->findAll();
		// var_dump($arr);die;
		return View('deal/show',['arr'=>$arr]);
	}

  
}
