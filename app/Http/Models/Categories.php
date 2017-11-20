<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model {

	protected $table = 'tbl_category';
	protected $primaryKey = 'cat_id';
	public $timestamps = false;

	protected $fillable = [
		'cat_name', 'cat_detail', 'cat_img', 'menu_id', 'parent_id',
	];

	public function menu() {
		return $this->belongsTo('App\Http\Models\Menu');
	}
}
