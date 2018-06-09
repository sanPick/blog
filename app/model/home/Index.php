<?php
namespace App\model\home;

use Illuminate\Database\Eloquent\Model;

class Index extends Model{

	protected $table = 'product_cat';
	protected $primaryKey = 'catId';
	// protected $updated_at= false ;
 	// protected $created_at= false ;
    // public $timestamps = false;

	public static function showAll()
	{
		return Index::All()->toarray();
	}


}


?>