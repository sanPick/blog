<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table='member';
    protected $fillable=['uid','memberName'];
    protected $updated_at=false;
    protected $created_at=false;
    public static function getAll()
    {
      //return  self::all()->toArray();
      return self::all()->toArray();
    }

    public static function delOne($id)
    {
        return self::destroy($id);
    }

    public static function insertOne($arr)
    {
         self::create(['uid'=>$arr['uid'],'memberName'=>$arr['memberName']]);
    }
}
