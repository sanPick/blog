<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\model\admin\Refund;

class RefundController extends Controller
{

	public function show()
	{
		$model = new Refund();
		$arr = $model->findAll();
		// var_dump($arr);die;
		return View('refund/show',['arr'=>$arr]);
	}
	
}

?>