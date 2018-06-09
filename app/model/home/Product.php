<?php
namespace App\model\home;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{

	protected $table = 'product';
	protected $primaryKey = 'proId';
	// protected $updated_at= false ;
 	// protected $created_at= false ;
    // public $timestamps = false;

	public static function findOne($id)
	{
		return Product::where('cateId','=',$id)->where('proStatus','=',1)->get()->toarray();
	}


}


?>