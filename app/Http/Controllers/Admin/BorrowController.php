<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\model\admin\Borrow;

class BorrowController extends Controller
{
   
	public function show()
	{
		$model = new Borrow();
		$arr = $model->findAll();
		// var_dump($arr);die;
		return View('borrow/show',['arr'=>$arr]);
	}

	public function bstatus()
	{
		$bid = $_POST['id'];
		$model = new Borrow();
		$res = $model->saveStatus($bid);
		if($res==1)
		{
			echo json_encode(array('status'=>1));
		}
		else
		{
			echo json_encode(array('status'=>0));
		}
	}
  
}
