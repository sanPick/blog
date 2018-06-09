<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Demo extends Model{

	protected $table = 'name';

	// protected $primaryKey = 'id';
	// 
	public function findAll()
	{
		return Demo::All()->toarray();
	}

	
}


?>