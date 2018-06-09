<?php
namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class Tradelog extends Model{

	protected $table = 'trade_log';
	protected $primaryKey = 'tradeId';
	// protected $updated_at= false ;
 	// protected $created_at= false ;
    // public $timestamps = false;

	public function findAll()
	{
		return Tradelog::All()->toarray();
	}

	public function findWhere($proname)
	{
		return Tradelog::where('proname','like','%'.$proname.'%')->get()->toarray();
	}


}


?>