<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model{

	protected $table = 'borrow';
	protected $primaryKey = 'bid';
	// protected $updated_at= false ;
 	// protected $created_at= false ;
    public $timestamps = false;

	public static function findAll()
	{
		return Borrow::All()->toarray();
	}

	public function saveStatus($id)
	{
		return $this->where('bid',$id)->update(['bstatus'=>1]);
	}

}


?>