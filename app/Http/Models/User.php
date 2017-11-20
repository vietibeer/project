<?php

namespace App\Http\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Validator;

class User extends Authenticatable {
	protected $table = 'tbl_users';
	protected $primaryKey = 'user_id';
	public $timestamps = true;
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'email', 'password', 'role_id', 'user_fullname', 'user_image', 'birthday', 'address', 'phone', 'user_status', 'sex',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function validateCreate($input = array()) {
		$validator = Validator::make($input,
			[
				'email' => 'required|unique:tbl_users,email|email',
				'password' => 'required|alpha_dash|confirmed',
				'role_id' => 'required|numeric|min:1',
				'user_fullname' => 'required',
				'user_image' => 'required',
				'birthday' => 'nullable|date',
				'address' => 'nullable',
				'phone' => 'nullable|digits_between:3,20|numeric',
				'user_status' => 'required|numeric|min:1',
				'sex' => 'required|in:nam,nữ',
			],
			[
				'confirmed' => 'password chưa khớp dữ liệu',
				'unique' => 'Tên email đã tồn tại',
				'digits_between' => 'Dữ liệu có độ dài không phù hợp',
				'required' => 'Dữ liệu không được để trống',
				'alpha_dash' => 'Không hợp lệ',
				'numeric' => 'Trường phải là số',
				'min' => 'Quá lớn',
			]);
		return $validator;
	}

	//thực hiện lưu và trả về dữ liệu đã lưu
	public function saveUser($input, $filename) {
		# code...
		if ($filename) {
			$input['user_image'] = $filename;
		} else {
			$input['user_image'] = '';
		}
		$user = new User($input);
		$user->save();
		return $user;
	}

	public function validateUpdate($input = array()) {
		# code...
		//tham số đầu tiên là dữ liệu request,2 là các rules, 3 là tùy chỉnh lại tin nhắn trả về
		$validator = Validator::make($input,
			[
				'email' => 'email',
			],
			[
				'confirmed' => 'password chưa khớp dữ liệu',
				'unique' => 'Email đã tồn tại',
				'digits_between' => 'Dữ liệu có độ dài không phù hợp',
				'required' => 'Dữ liệu không được để trống',
				'alpha_dash' => 'Không hợp lệ',
				'numeric' => 'Trường phải là số',
			]);
		return $validator;
	}

	//thực hiện update và trả về dữ liệu đã update
	public function updateUser($input, $id, $filename = false) {
		# code...
		if ($filename) {
			$input['user_image'] = $filename;
		} else {
			$input['user_image'] = '';
		}
		$user = User::find($id);

		$user->update($input);
		return $user;
	}

	function setPasswordAttribute($password) {
		$this->attributes['password'] = bcrypt($password);
	}
}
