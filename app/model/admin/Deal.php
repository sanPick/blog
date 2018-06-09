<?php
namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model{

	protected $table = 'deal';
	protected $primaryKey = 'dealId';
	// protected $updated_at= false ;
 	// protected $created_at= false ;
    // public $timestamps = false;

	public function findAll()
	{
		return Deal::All()->toarray();
	}


}


?>