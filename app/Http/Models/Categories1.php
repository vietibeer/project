<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 10/31/2017
 * Time: 8:44 PM
 */

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Categories extends Model {
	protected $table = 'tbl_category';
	protected $primaryKey = 'cat_id';
	public $timestamps = false;

	protected $fillable = [
		'cat_name', 'cat_detail', 'cat_img', 'parent_id',
	];

	public function validateCreate($input = array()) {
		$validator = Validator::make($input,
			[
				'cat_name' => 'required|unique:tbl_category,cat_name|min:3|max:20',
				'cat_detail' => 'required|min:5|max:255',
				'cat_img' => 'required',
				'parent_id' => 'required|numeric',
			],
			[
				'unique' => 'Tên này đã tồn tại',
				'digits_between' => 'Dữ liệu có độ dài không phù hợp',
				'required' => 'Dữ liệu không được để trống',
				'numeric' => 'Cần nhập số',
			]);
		return $validator;
	}

	public function saveCategories($input) {
		# code...
		$categories = new Categories($input);

		$categories->save();
		return $categories;
	}

	public function validateUpdate($input = array()) {
		$validator = Validator::make($input,
			[
				'cat_name' => 'min:3|max:20',
				'cat_detail' => 'min:5|max:255',
				'parent_id' => 'numeric',
			],
			[
				'unique' => 'Tên này đã tồn tại',
				'digits_between' => 'Dữ liệu có độ dài không phù hợp',
				'required' => 'Dữ liệu không được để trống',
				'numeric' => 'Cần nhập số',
			]);
		return $validator;
	}

	public function updateCategories($input, $id) {
		# code...
		$categories = Categories::find($id);

		$categories->update($input);
		return $categories;
	}

//    public function get_all_categories(){
	//        $categories = Categories::all();
	//        return $categories;
	//    }

}