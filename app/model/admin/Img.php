<?php
namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class Img extends Model{

	protected $table = 'img';
	protected $primaryKey = 'img_id';
	protected $fillable = ['img_path','img_html'];
	protected $updated_at= false ;
 	protected $created_at= false ;
    // public $timestamps = false;

	public function addImg($arr)
	{
		return Img::create($arr);
	}

	public function findAll()
	{
		return Img::All()->toarray();
	}

	public function delOne($id)
	{
		$sum = Img::destroy($id);
	}

}


?>