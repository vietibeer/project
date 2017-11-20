<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'user_email' => 'required|max:200',
			'password' => 'required',
		];
	}
	public function messages() {
		return [
			'user_email.required' => 'Bạn chưa nhập Email',
			'password.required' => 'Bạn chưa nhập mật khẩu',
		];
	}
}