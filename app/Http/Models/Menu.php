<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {
	protected $table = 'tbl_menu';
	protected $primaryKey = 'menu_id';
	public $timestamps = false;

	protected $fillable = [
		'is_home', 'menu_title', 'menu_img', 'menu_icon', 'menu_banner', 'parent_id', 'url', 'menu_position', 'menu_status',
	];

	public function menu() {
		return $this->hasOne('App\Http\Models\Categories');
	}
}
