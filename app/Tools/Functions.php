<?php 

namespace App\Tools;

class Functions
{

	//递归创建目录
	public function mdir($str)
	{
		// return $str;
		if(is_dir($str) || @mkdir($str, 0777, true))
		{
			return true;
		} else {
			return 111;
			$arr = explode('/', $str);

			array_pop($arr);
			$new_str = implode('/', $arr);
			mdir($new_str);
			if(@mkdir($str, 0777, true))
			{
				echo $str."---&gt;".'success'."<br />";
			}
		}
	}

//短信接口
	function Get($url)
	{
	if(function_exists('file_get_contents'))
	{
	$file_contents = file_get_contents($url);
	}
	else
	{
	$ch = curl_init();
	$timeout = 5;
	curl_setopt ($ch, CURLOPT_URL, $url);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$file_contents = curl_exec($ch);
	curl_close($ch);
	}
	return $file_contents;
	}
	//无限极分类递归

	function digui($parent_id=0, $nav_data){
	$new_nav_data = [];
	  foreach($nav_data as $k=>$v){
	    if($v['parent_id']==$parent_id){
	      $new_nav_data[$k] = $v;
	      $new_nav_data[$k]['son'] = $this->digui($v['nev_id'], $nav_data);
	    }
	  }
	  return  $new_nav_data;
	}
	function node_digui($parent_id=0, $node_data){
	$new_node_data = [];
	  foreach($node_data as $k=>$v){
	    if($v['parent_id']==$parent_id){
	      $new_node_data[$k] = $v;
	      $new_node_data[$k]['son'] = $this->node_digui($v['node_id'], $node_data);
	    }
	  }
	  return  $new_node_data;
	}
	
}





 ?>