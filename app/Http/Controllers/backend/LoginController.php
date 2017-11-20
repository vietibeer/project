<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller {
	/** Show Login Form
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showLogin() {

		if (\Auth::check()) {
			return redirect()->route('name-backend-dashboard');
		}
		return view('backend.auth.login');
	}

	public function checkLogin(LoginRequest $request) {
		// dd($request->input('password'));
		$email = $request->input('user_email');
		$password = $request->input('password');

		$user = \Auth::attempt(['email' => $email, 'password' => $password]);
		// dd($request);
		if ($user) {
			\Auth::login(\Auth::user(), true);
			// dd($user);
			return redirect('/backend/dashboard');
		}
		return view('backend.auth.login', [
			'message' => "Email or password is incorrect",
		]);
	}

	public function logout() {
		\Auth::logout();
		return redirect()->route('name-backend-login');
	}
}
