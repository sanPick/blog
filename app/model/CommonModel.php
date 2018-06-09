<?php

/**
 * @Author: Marte
 * @Date:   2018-06-05 14:22:53
 * @Last Modified by:   Marte
 * @Last Modified time: 2018-06-08 01:14:38
 */
namespace App\model;

use Illuminate\Database\Eloquent\Model;
abstract class CommonModel extends Model
{

        public $updated_at=false;
        public $created_at=false;
        //指定允许批量赋值的字段
    public static function getActionAndControllerName()
    {
       $action = \Route::current()->getActionName();
       list($class, $method) = explode('@', $action);
       $class = substr(strrchr($class,'\\'),1);
       preg_match_all("#(.*)C#",$class,$data);

       return array('actionName'=>$method,'controllerName'=>$class,'controller'=>$data[1][0]);
    }

   abstract public static function insertOne($arr);
   abstract public static function show();
}