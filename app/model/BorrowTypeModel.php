<?php

/**
 * @Author: Marte
 * @Date:   2018-06-05 14:22:53
 * @Last Modified by:   Marte
 * @Last Modified time: 2018-06-08 08:35:00
 */
namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\model\CommonModel;
class BorrowTypeModel extends CommonModel
{


        public $table='borrow_type';
        public $updated_at=false;
        public $created_at=false;

        //指定允许批量赋值的字段
        protected  $fillable=['tName','tWay'];
        public static  function show()
        {
              // return json_decode(json_encode(Exam::all()),true);
            return self::all()->toArray();
        }

        public static function insertOne($arr)
        {
            unset($arr['_token']);
            return self::create($arr);

        }
        public static function delOne($id)
        {
             return self::where('tId',$id)->delete();
        }



}