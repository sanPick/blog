<?php

namespace App\Http\Controllers;

use App\Demo;
use App\Http\Controllers\Controller;


class DemoController extends Controller
{
   
	public function demo()
	{
		$model = new Demo();
		$arr = $model->findAll();
		return View('demo/demo',['arr'=>$arr]);
	}
  
}
