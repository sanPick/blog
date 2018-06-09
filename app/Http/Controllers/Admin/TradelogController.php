<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\model\admin\Tradelog;
use illuminate\Http\Request;

class TradelogController extends Controller
{

	public function show(Request $request)
	{
		if($request->isMethod('post'))
		{
			$proname = $_POST['proname'];
			$model = new Tradelog();
			$arr = $model->findWhere($proname);
			return View('tradelog/show',['arr'=>$arr]);
		}
		else
		{
			$model = new Tradelog();
			$arr = $model->findAll();
			// var_dump($arr);die;
			return View('tradelog/show',['arr'=>$arr]);
		}
	}
	
}

?>