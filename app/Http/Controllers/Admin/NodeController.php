<?php

namespace App\Http\Controllers\Admin;


 use App\User;
 use DB;
 use Validator;
 use App\Http\Controllers\Controller;
 use Illuminate\Foundation\Auth\ThrottlesLogins;
 use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
 use Illuminate\Http\Request;
class NodeController extends CommonController
{


    //权限添加
    public function node_add(Request $request)
    {
      	if($request->isMethod('post')){
    		$parent_id = $request->parent_id;
    		$arr = [
    			'node_title'=>$request->node_title,
    			'node_path'=>$request->node_path,
    			'parent_id'=>$parent_id,
    		];
    		$info = DB::table('node')->insertGetId($arr);
    		if($parent_id==0){
    			$path = $info;
    		}else{
    			$path = $parent_id.'-'.$info;
    		}
    		
			$upd = DB::update('update lar_node set path = '.'\''.$path.'\''.' where node_id = ?', [$info]);
			return  redirect()->action('Admin\NodeController@node_add');   
    		

    	}
    	else{
    	$node = DB::table('node')->where('parent_id','0')->get();

        return view('admin.node_add',['admin_node'=>$node]);
    	}
    }

}
