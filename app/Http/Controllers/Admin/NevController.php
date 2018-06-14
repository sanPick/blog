<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;

class NevController extends CommonController
{
    //导航
    public function index(Request $request){
    	if($request->isMethod('post')){
    		$parent_id = $request->parent_id;
    		$arr = [
    			'nev_name'=>$request->nev_name,
    			'nev_path'=>$request->nev_path,
    			'parent_id'=>$parent_id,
    			'addtime'=>time()
    		];
    		$info = DB::table('admin_navigation')->insertGetId($arr);
            if($parent_id==0){
                $path = $info;
            }else{
                $path = $parent_id.'-'.$info;
            }
			$upd = DB::update('update lar_admin_navigation set path = '.'\''.$path.'\''.' where nev_id = ?', [$info]);
            //添加权限表
            $arr = [
                'node_title'=>$request->nev_name,
                'node_path'=>$request->nev_path,
                'parent_id'=>$parent_id,
            ];
            $info = DB::table('node')->insertGetId($arr);
            $upd = DB::update('update lar_node set path = '.'\''.$path.'\''.' where node_id = ?', [$info]);


			return  redirect()->action('Admin\NevController@nev_list');   
    		

    	}
    	else{
	    	$nev_data = DB::table('admin_navigation')->where('parent_id','0')->get();

	    	return view('admin.admin_navadd',['nev_data'=>$nev_data]);
    	}

    }

    public function nev_list(){
		$nev_data =  DB::select("select *,concat(path,'-',nev_id) as depath from lar_admin_navigation where status=1 order by path
");
		return view('admin.admin_navlist',['nev_data'=>$nev_data]);
    	 	

    }
    public function nev_upd(Request $request){
    	
    	if($request->isMethod('post')){
    		$nev_id = $request->nev_id;
    		$arr = [
    			'nev_name'=>$request->nev_name,
    			'nev_path'=>$request->nev_path,
    			'addtime'=>time()
    		];    		
    		if(DB::table('admin_navigation')->where('nev_id',$nev_id)->update($arr)){
    			return  redirect()->action('Admin\NevController@nev_list');   
    		}

    	}else{
    		$nev_id = $_GET['id'];
    		$nev_data = DB::table('admin_navigation')->where('nev_id',$nev_id)->first();
    		return view('admin.admin_nevupd',['nev_data'=>$nev_data]);
    	}	 
    }
    public function nev_del($id){
    	DB::table('admin_navigation')->where('nev_id',$id)->update(['status'=>0]);

    	return Redirect::to('nev_list');

    }
    public function adm_nav_save(){

 		$nev_data =  DB::select("select *,concat(path,'-',nev_id) as depath from lar_admin_navigation where status=1 order by path
");
 		$nev_data = json_encode($nev_data);

 		$nev_data = json_decode($nev_data,true);

 		$digui = new \App\Tools\Functions();

 		$nav_data = $digui->digui(0,$nev_data);

 		file_put_contents('./cache/nav.cache', json_encode($nav_data));

 		return Redirect::to('nev_list');
    }

}
