<?php

/**
 * @Author: Marte
 * @Date:   2018-06-05 14:22:53
 * @Last Modified by:   Marte
 * @Last Modified time: 2018-06-06 09:19:15
 */
namespace App;

use Illuminate\Database\Eloquent\Model;
class Exam extends Model
{

        public $name;
        public $table='exam';
        public $updated_at=false;
        public $created_at=false;
        //指定允许批量赋值的字段
        protected  $fillable=['username'];
        public static  function getUserAll()
        {
              // return json_decode(json_encode(Exam::all()),true);
            return self::all()->toArray();
        }

        public static function addOne($arr)
        {
            return self::create(['username'=>$arr['name']]);
        }

        public static function delOne($id)
        {

             return self::destroy($id);
        }


}