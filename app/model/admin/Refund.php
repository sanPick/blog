<?php
namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class Refund extends Model{

	protected $table = 'refund';
	protected $primaryKey = 'rid';
	// protected $updated_at= false ;
 	// protected $created_at= false ;
    // public $timestamps = false;

	public static function findAll()
	{
		return Refund::All()->toarray();
	}


}


?>